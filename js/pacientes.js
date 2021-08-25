const formAgregar = document.querySelector('#form-agregar');
const formBuscar = document.querySelector('#form-buscar');
const searchIcon = document.querySelector('.fa-search');
const cancelarEditar = document.querySelector('#form-agregar i.cerrar-form');
const cancelarBuscar = document.querySelector('#form-buscar i.cerrar-form');
const tablaPacientes = document.querySelector('.table tbody');
const tablaResponsive = document.querySelector('.tabla-responsive');
const encabezadoTabla = document.querySelector('.encabezado-vista h2');
const iconLoader = document.querySelector('.loader-container');
const cerrarSesion = document.getElementById('cerrar-sesion');
let listaPermanente = [];
let listaPermanenteResponsive = [];
let modoBusqueda = false;
let url = window.location.href;

/***************
 * FUNCIONES   *
 ***************/
const eliminarPaciente = (e) => {
    if(e.target.parentElement.classList.contains('icono-eliminar')){
        Swal.fire({
            title: '¿Está seguro?',
            text: '¡Esta acción no se puede revertir!',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cancelar',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, borrar!'
        }).then((result) => {
            if(result.value) {
                var idPaciente = e.target.parentElement.id;
                iconLoader.classList.remove('d-none');

                fetch(`modelos/pacientes/eliminar_paciente.php?id_pac=${idPaciente}`)
                .then(res => res.json())
                .then(data => {
                    if (data.respuesta === 'Correcto') {
                        iconLoader.classList.add('d-none');
                        if (modoBusqueda) {
                            obtenerPacientes();
                        }
                        // Esto es para eliminar el paciente de la vista movil
                        // Aqui realmente estoy guardando los botones de eliminar de cada fila
                        // Para obtener el id del paciente
                        var idsPacientesResponsive = document.querySelectorAll('.tabla-responsive .fila-paciente .acciones span.icono-eliminar');
                        idsPacientesResponsive.forEach((itemR) => {
                            // console.log(itemR.getAttribute('data-id'));
                            if(itemR.id == idPaciente) {
                                itemR.parentElement.parentElement.parentElement.remove();
                            }

                        });

                        var idsPacientes = document.querySelectorAll('.table tbody tr td span.icono-eliminar');
                        idsPacientes.forEach((item) => {
                            if(item.id == idPaciente) {
                                item.parentElement.parentElement.remove();
                            }
                        });
                        Swal.fire({
                            type: 'success',
                            title: 'Paciente eliminado',
                            showConfirmButton: false,
                            timer: 2000
                        })
                    }
                });
            }
        }) 
    }
}

const romanize = (number) => {
    switch (number) {
        case '1':
            return 'I';
            break;
        case '2':
            return 'II';
            break;
        case '3':
            return 'III';
            break;
        case '4':
            return 'IV';
            break;
    
        default:
            return false;
    }
}

const editarPaciente = (datos) => {
    // console.log(datos.get('nombre_apellido'));
    iconLoader.classList.remove('d-none');
    fetch('modelos/pacientes/editar_paciente.php',{
        method: 'POST',
        body: datos
    })
    .then(res => res.json())
    .then(data => {
        if(data.respuesta === 'Correcto') {
            iconLoader.classList.add('d-none');


            Swal.fire({
                type: 'success',
                title: 'Se guardaron los cambios',
                showConfirmButton: false,
                timer: 2000
            }).then(() => {
                formAgregar.classList.remove('editar');
                formAgregar.querySelector('.cerrar-form').classList.add('d-none');
                formAgregar.reset();
                if(modoBusqueda){
                    formAgregar.classList.add('d-none');
                    formBuscar.classList.remove('d-none');
                }
                obtenerPacientes();
            });
        }
    })
}

const agregarPaciente = (datos) => {
    iconLoader.classList.remove('d-none');
    // console.log(typeof datos.get('nivel_educacional'));
    
    var sexoVistaPaciente, nivelEducacionalVistaPaciente;
    if(datos.get('sexo') == 1) {
        sexoVistaPaciente = 'M';
    } else {
        sexoVistaPaciente = 'F';
    }

    switch(+datos.get('nivel_educacional')){
        case 1:
            nivelEducacionalVistaPaciente = 'Primaria';
            break;
        case 2:
            nivelEducacionalVistaPaciente = 'Secundaria';
            break;
        case 3:
            nivelEducacionalVistaPaciente = 'Preuniversitario';
            break;
        case 4:
            nivelEducacionalVistaPaciente = 'Obrero calificado';
            break;
        case 5:
            nivelEducacionalVistaPaciente = 'Tecnico medio';
            break;
        case 6:
            nivelEducacionalVistaPaciente = 'Tecnico medio superior';
            break;
        case 7:
            nivelEducacionalVistaPaciente = 'Nivel superior';
            break;
    }

    fetch('modelos/pacientes/modelo_paciente.php', {
        method: 'POST',
        body: datos
    })
    .then(res => res.json())
    .then(data => {
        // console.log(data);
        if(data.respuesta === 'Correcto') {
            iconLoader.classList.add('d-none');
            var nuevaFila = document.createElement('tr');
            nuevaFila.classList.add(`grupo${datos.get('grupo_disp')}`);

            nuevaFila.innerHTML = `
            <td>${datos.get('nombre_apellido')}</td>
            <td>${sexoVistaPaciente}</td>
            <td>${romanize(datos.get('grupo_disp'))}</td>
            <td>${datos.get('direccion')}</td>
            <td>${data.datos.edad}</td>
            <td>${nivelEducacionalVistaPaciente}</td>
            <td>${datos.get('labor')}</td>
            <td>${datos.get('manzana')}</td>
            <td>${datos.get('diagnostico')}</td>
            <td>
				<span class="icono-editar" id="${data.datos.id_insertado}">
					<i class="fa fa-pencil"></i>
				</span>
			</td>
			<td>
				<span class="icono-eliminar" id="${data.datos.id_insertado}">
					<i class="fa fa-trash-o"></i>
				</span>
			</td>
            `;  

            tablaPacientes.appendChild(nuevaFila);
            listaPermanente.push(nuevaFila);
            
            Swal.fire({
                title: 'OK',
                text: 'Paciente guardado exitosamente',
                type: 'success',
                timer: 2000,
                showConfirmButton: false
            });

            formAgregar.reset();

            // ACTUALIZAR VISTA DE PACIENTES EN DISEÑO RESPONSIVE
            var nuevaFilaResponsive = document.createElement('div');
            nuevaFilaResponsive.setAttribute('data-id', data.datos.id_insertado);
            nuevaFilaResponsive.classList.add('fila-paciente', `grupo${datos.get('grupo_disp')}`);

            nuevaFilaResponsive.innerHTML = `
            <div class="campo">
                <h4>Nombre:</h4>
                <p>${datos.get('nombre_apellido')}</p>
                <span class="fa fa-caret-down"></span>
            </div>
            <div class="campo">
                <h4>Sexo:</h4>
                <p>${sexoVistaPaciente}</p>
            </div>
            <div class="campo">
                <h4>Grupo:</h4>
                <p>${romanize(datos.get('grupo_disp'))}</p>
            </div>
            <div class="campo">
                <h4>Dirección:</h4>
                <p>${datos.get('direccion')}</p>
             </div>
             <div class="campo">
                 <h4>Edad:</h4>
                 <p>${data.datos.edad}</p>
            </div>
            <div class="campo">
                <h4>Nivel:</h4>
                 <p>${nivelEducacionalVistaPaciente}</p>
             </div>
            <div class="campo">
                <h4>Ocupación:</h4>
                <p>${datos.get('labor')}</p>
            </div>
            <div class="campo">
                <h4>Manzana:</h4>
                <p>${datos.get('manzana')}</p>
             </div>
             <div class="campo">
                <h4>Diagnóstico:</h4>
                <p>${datos.get('diagnostico')}</p>
             </div>

             <div class="campo">
                <h4>Acciones:</h4>
                <div class="acciones">
                    <span class="icono-editar" id="${data.datos.id_insertado}">
                        <i class="fa fa-pencil"></i>
                    </span>
                    <span class="icono-eliminar" id="${data.datos.id_insertado}">
                        <i class="fa fa-trash-o"></i>
                    </span>
                </div>
            </div>
            `;

            tablaResponsive.appendChild(nuevaFilaResponsive);
            listaPermanenteResponsive.push(nuevaFilaResponsive);

        } else if(data.respuesta === 'Existente'){
            Swal.fire({
                title: 'Este paciente ya existe en la base de datos',
                text: 'Lo sentimos',
                type: 'error'
            });
        } else {
            Swal.fire({
                title: 'ERROR',
                text: 'Ha ocurrido un error al guardar este paciente',
                type: 'error'
            });
        }

        const botonesEditar = document.querySelectorAll('table tbody .icono-editar');
		const botonesEliminar = document.querySelectorAll('table tbody .icono-eliminar');
        const botonesEditarResponsive = document.querySelectorAll('.tabla-responsive .icono-editar');
        const botonesEliminarResponsive = document.querySelectorAll('.tabla-responsive .icono-eliminar');
		habilitarBotonesEditar(botonesEditar);
        habilitarBotonesEliminar(botonesEliminar);
		habilitarBotonesEditar(botonesEditarResponsive);
        habilitarBotonesEliminar(botonesEliminarResponsive);
    });
}

const validarYGuardar = (form) => {
    // if(form.classList.contains('editar')){
    //     var radioSexoMasculino = form.querySelector('#hombre2').checked;
    //     var radioSexoFemenino = form.querySelector('#mujer2').checked;
    // } else {
        var radioSexoMasculino = form.querySelector('#hombre').checked;
        var radioSexoFemenino = form.querySelector('#mujer').checked;
    // }

    // CAMPOS DEL FORMULARIO
    var nombre_apellido = form.querySelector('#nombre_apellido').value,
        fecha_nacimiento = form.querySelector('#fecha_nacimiento').value,
        direccion = form.querySelector('#direccion').value,
        nivel_educacional = form.querySelector('#nivel_educacional').value,
        diagnostico = form.querySelector('#diagnostico').value,
        manzana = form.querySelector('#manzana').value,
        labor = form.querySelector('#labor').value,
        grupo_disp = form.querySelector('#grupo_disp').value;

    var sexo;

    if(!radioSexoFemenino && !radioSexoMasculino) {
         // notificacion de error
         Swal.fire({
            title: 'Lo sentimos',
            text: 'Debe seleccionar el sexo del paciente',
            type: 'error'
         });
         // mostrarNotificacion('Lo sentimos','Debe seleccionar el sexo del paciente', 'error');
         return false;
    } else if(radioSexoMasculino) {
        sexo = 1;//id del registro masculino
    } else {
        sexo = 2;//id del resgistro femenino
    }

    if(diagnostico === '') {
        diagnostico = 'Sano';
    }

    if(labor === '') {
        labor = 'Sin trabajar';
    }

    var infoPaciente = new FormData();
        infoPaciente.append('nombre_apellido', nombre_apellido);
        infoPaciente.append('fecha_nacimiento', fecha_nacimiento);
        infoPaciente.append('direccion', direccion);
        infoPaciente.append('nivel_educacional', nivel_educacional);
        infoPaciente.append('diagnostico', diagnostico);
        infoPaciente.append('manzana', manzana);
        infoPaciente.append('labor', labor);
        infoPaciente.append('grupo_disp', grupo_disp);
        infoPaciente.append('sexo', sexo);

    return infoPaciente;
}

const obtenerPacientes = () => {
    iconLoader.classList.remove('d-none');
    fetch('modelos/pacientes/obtener_pacientes.php')
    .then(res => res.json())
    .then(data => {
        // console.log(data);
    	tablaPacientes.innerHTML = ``;
    	tablaResponsive.innerHTML = ``;
        while(listaPermanente[0]){
            listaPermanente.pop();
        }
        while(listaPermanenteResponsive[0]){
            listaPermanenteResponsive.pop();
        }

        let grupo = null;

        data.datos.forEach( paciente => {
            var fila = document.createElement('tr');
            fila.setAttribute('data-id', paciente.id_pac)
			fila.classList.add(`grupo${paciente.grupo_disponible_pac}`);

            switch(+paciente.grupo_disponible_pac) {
                case 1:
                    grupo = "I";
                    break;
                case 2:
                    grupo = "II";
                    break;
                case 3:
                    grupo = "III";
                    break;
                case 4:
                    grupo = "IV";
                    break;
            
                default:
                    break;
            }

            fila.innerHTML = `
            <td>${paciente.nombre_comp_pac}</td>
            <td>${paciente.genero}</td>
            <td>${grupo}</td>
            <td>${paciente.dir_nuc}</td>
            <td>${paciente.edad_pac}</td>
            <td>${paciente.nivel}</td>
            <td>${paciente.labor_pac}</td>
            <td>${paciente.no_nuc}</td>
            <td>${paciente.diagnostico_pac}</td>
            <td>
				<span class="icono-editar" id="${paciente.id_pac}">
					<i class="fa fa-pencil"></i>
				</span>
			</td>
			<td>
				<span class="icono-eliminar" id="${paciente.id_pac}">
					<i class="fa fa-trash-o"></i>
				</span>
			</td>
            `;

            tablaPacientes.appendChild(fila);
            listaPermanente.push(fila);

            var filaResponsive = document.createElement('div');
            filaResponsive.setAttribute('data-id', paciente.id_pac);
            filaResponsive.classList.add('fila-paciente',`grupo${paciente.grupo_disponible_pac}`);

            filaResponsive.innerHTML = `
            <div class="campo">
                <h4>Nombre:</h4>
                <p>${paciente.nombre_comp_pac}</p>
                <span class="fa fa-caret-down"></span>
            </div>
            <div class="campo">
				<h4>Sexo:</h4>
				<p>${paciente.genero}</p>
			</div>
            <div class="campo">
				<h4>Grupo:</h4>
				<p>${grupo}</p>
			</div>
            <div class="campo">
				<h4>Dirección:</h4>
				<p>${paciente.dir_nuc}</p>
			</div>
            <div class="campo">
				<h4>Edad:</h4>
				<p>${paciente.edad_pac}</p>
			</div>
            <div class="campo">
				<h4>Nivel:</h4>
				<p>${paciente.nivel}</p>
			</div>
            <div class="campo">
				<h4>Ocupación:</h4>
				<p>${paciente.labor_pac}</p>
			</div>
            <div class="campo">
				<h4>Manzana:</h4>
				<p>${paciente.no_nuc}</p>
			</div>
            <div class="campo">
				<h4>Diagnóstico:</h4>
				<p>${paciente.diagnostico_pac}</p>
			</div>
            <div class="campo">
				<h4>Acciones:</h4>
				<div class="acciones">
					<span class="icono-editar" id="${paciente.id_pac}">
						<i class="fa fa-pencil"></i>
					</span>
					<span class="icono-eliminar" id="${paciente.id_pac}">
						<i class="fa fa-trash-o"></i>
					</span>
				</div>
			</div>
            `;

            tablaResponsive.appendChild(filaResponsive);
            listaPermanenteResponsive.push(filaResponsive);
        });

        const botonesEditar = document.querySelectorAll('table tbody .icono-editar');
		const botonesEliminar = document.querySelectorAll('table tbody .icono-eliminar');
        const botonesEditarResponsive = document.querySelectorAll('.tabla-responsive .icono-editar');
        const botonesEliminarResponsive = document.querySelectorAll('.tabla-responsive .icono-eliminar');
		habilitarBotonesEditar(botonesEditar);
        habilitarBotonesEliminar(botonesEliminar);
		habilitarBotonesEditar(botonesEditarResponsive);
        habilitarBotonesEliminar(botonesEliminarResponsive);
        iconLoader.classList.add('d-none');

        if (modoBusqueda) {
            buscarPacientes();
        }

        if (url.indexOf('direccionNucleo') > -1) {
            var index = url.indexOf('direccionNucleo');
            // console.log('index', index);
            // console.log(url.slice(index+16));
            let direccion = url.slice(index+16);
            direccion = direccion.replace("%20"," ");
            entrarModoBusqueda();
            document.querySelector('#direccion_buscar').value = direccion;
            // formBuscar.submit();
            buscarPacientes();
            // console.log(url);
        }

    });
}

const habilitarBotonesEditar = (array) => {
    array.forEach( boton => {
        boton.addEventListener('click', e => {
            if (modoBusqueda) {
                formBuscar.classList.add('d-none');
                formAgregar.classList.remove('d-none');
            }

            formAgregar.reset();
            formAgregar.classList.add('editar');
            formAgregar.querySelector('.cerrar-form').classList.remove('d-none');
            window.scroll(0, 100);
            rellenarCamposFormEdit(e.target.parentElement.id);
        });
    });
}

const habilitarBotonesEliminar = (array) => {
    array.forEach( boton => {
        boton.addEventListener('click', eliminarPaciente);
    });
}

const rellenarCamposFormEdit = (id) => {
    iconLoader.classList.remove('d-none');
    const inputsFormEdit = document.querySelectorAll('#form-agregar input');
    const selectsFormEdit = document.querySelectorAll('#form-agregar select');
    fetch(`modelos/pacientes/obtener_paciente_unic.php?id=${id}`)
    .then(res => res.json())
    .then(data => {
        iconLoader.classList.add('d-none');
        // console.log(inputsFormEdit);
        inputsFormEdit[0].value = data.datos.nombre_comp_pac;
        inputsFormEdit[1].value = data.datos.fecha_nac_pac;
        inputsFormEdit[2].value = data.datos.dir_nuc;
        inputsFormEdit[3].value = data.datos.diagnostico_pac;
        inputsFormEdit[4].value = data.datos.no_nuc;
        inputsFormEdit[5].value = data.datos.labor_pac;
        if(data.datos.genero === 'M'){
            inputsFormEdit[6].checked = true;
        } else if(data.datos.genero === 'F'){
            inputsFormEdit[7].checked = true;
        }
        inputsFormEdit[8].value = data.datos.id_pac;
        inputsFormEdit[9].value = data.datos.no_nuc;
        inputsFormEdit[10].value = data.datos.dir_nuc;

        switch (data.datos.nivel) {
            case 'Primaria':
                selectsFormEdit[0].selectedIndex = 0;
                break;
            case 'Secundaria':
                selectsFormEdit[0].selectedIndex = 1;
                break;
            case 'Preuniversitario':
                selectsFormEdit[0].selectedIndex = 2;
                break;
            case 'Obrero calificado':
                selectsFormEdit[0].selectedIndex = 3;
                break;
            case 'Tecnico medio':
                selectsFormEdit[0].selectedIndex = 4;
                break;
            case 'Tecnico medio superior':
                selectsFormEdit[0].selectedIndex = 5;
                break;
            case 'Nivel superior':
                selectsFormEdit[0].selectedIndex = 6;
                break;
        
            default:
                break;
        }

        switch (+data.datos.grupo_disponible_pac) {
            case 1:
                selectsFormEdit[1].selectedIndex = 0;
                break;
            case 2:
                selectsFormEdit[1].selectedIndex = 1;
                break;
            case 3:
                selectsFormEdit[1].selectedIndex = 2;
                break;
            case 4:
                selectsFormEdit[1].selectedIndex = 3;
                break;
        
            default:
                break;
        }
    });
}

const buscarPacientes = (e) => {
    // console.log('buscando');
    iconLoader.classList.remove('d-none');

    if (e) {
        e.preventDefault();
    }

    let inputs = formBuscar.querySelectorAll('input');
    let selects = formBuscar.querySelectorAll('select');
    let sexo;
    let buscado = [];
    let buscadoCount = 0;
    let resultadosPreliminares = [];
    let resultadoFinal = [];

    // COMPROBANDO SI LOS INPUT DEL SEXO ESTAN ACTIVOS
    if(inputs[6].checked){
        sexo = 'M';
    } else if(inputs[7].checked){
        sexo = 'F';
    }

    // GUARDANDO LOS VALORES DE LOS INPUTS Y LOS SELECT EN UN ARRAY
    if(inputs[0].value){
        buscado.push(inputs[0].value.trim());
        buscadoCount++;
    } else {
        buscado.push('');
    }

    if(sexo != null){
        buscado.push(sexo);
        buscadoCount++;
    } else {
        buscado.push('');
    }

    if (selects[1].value != '0') {
        buscado.push(selects[1].value)
        buscadoCount++;
    } else {
        buscado.push('');
    }


    if (inputs[2].value) {
        buscado.push(inputs[2].value.trim());
        buscadoCount++;
    } else {
        buscado.push('');
    }

    if (inputs[1].value != '') {
        buscado.push(inputs[1].value.trim());
    } else {
        buscado.push('');
    }

    if (selects[0].value != '0') {
        buscado.push(selects[0].value);
        buscadoCount++;
    } else {
        buscado.push('');
    }

    if (inputs[5].value) {
        buscado.push(inputs[5].value.trim());
        buscadoCount++;
    } else {
        buscado.push('');
    }

    if (inputs[4].value) {
        buscado.push(inputs[4].value.trim());
        buscadoCount++;
    } else {
        buscado.push('');
    }

    if (inputs[3].value) {
        buscado.push(inputs[3].value.trim());
        buscadoCount++;
    } else {
        buscado.push('');
    }

    // RECORRO CADA FILA EN LA TABLA
    listaPermanente.forEach( fila => {
        let contadorInterno = 0;
        // POR CADA FILA RECORRO CADA UNA DE SUS COLUMNAS EN BUSCA DE COINCIDENCIAS
        for(var i = 0; i < 9; i++){
            // SI ES EL CAMPO EDAD, SALTARLO PARA UN ANALISIS POSTERIOR
            if (i == 4 || buscado[i] === '')
                continue;
            // *************

            let valorTabla = fila.children[i].textContent.toLowerCase();
            let valorBuscado = buscado[i].toLowerCase();
            
            if(valorTabla.indexOf(valorBuscado) > -1){
                contadorInterno++;
                // SI HAY COINCIDENCIAS EN EL CAMPO GRUPO DISP Y EL TAMAÑO 
                // DE LA CADENA COINCIDE TENERLO EN CUENTA, DE OTRA MANERA NO
                if(i == 2 && valorTabla.length != valorBuscado.length){
                    contadorInterno--;
                }
            }
        }

        // SI LA FILA COINCIDE CON TODOS LOS VALORES BUSCADOS, GUARDAR RESULTADOS
        if(contadorInterno == buscadoCount){
            resultadosPreliminares.push(fila);
        }

    });

    // MANEJANDO EL CAMPO EDAD
    if(buscado[4] === ''){
        resultadoFinal = resultadosPreliminares;
    } else if(buscado[4].length <= 2){
        // console.log('una edad');
        resultadosPreliminares.forEach( fila => {
            if(fila.children[4].textContent == buscado[4])
                resultadoFinal.push(fila);
        });
    } else {
        // console.log('entre dos edades');
        let edades = buscado[4].split('-');
        // console.log(edades[0], '-', edades[1]);
        resultadosPreliminares.forEach( fila => {
            if (+fila.children[4].textContent >= +edades[0] && 
                +fila.children[4].textContent <= +edades[1]) {
                resultadoFinal.push(fila);
            }
        });
    }

    // console.log(resultadoFinal);
    encabezadoTabla.innerText = `Resultados de Búsqueda: ${resultadoFinal.length} coincidencia/s`;

    mostrarResultadosBusqueda(resultadoFinal);
}

const mostrarResultadosBusqueda = (array) => {
    // console.log('mostrando resultados');
    Swal.fire({
       title: 'Búsqueda finalizada',
       type: 'info',
       showConfirmButton: false,
       timer: 1500
    });
    tablaPacientes.innerHTML = ``;
    tablaResponsive.innerHTML = ``;
    array.forEach( fila => {
        tablaPacientes.appendChild(fila);
        listaPermanenteResponsive.forEach((filaResponsive) => {
            if (filaResponsive.getAttribute('data-id') == fila.getAttribute('data-id')) {
                tablaResponsive.appendChild(filaResponsive);
            }
        });

    });

    iconLoader.classList.add('d-none');
}

const entrarModoBusqueda = () => {
    Swal.fire({
       title: 'Modo Búsqueda',
       type: 'info',
       showConfirmButton: false,
       timer: 1500
    });
    modoBusqueda = true;
    formAgregar.classList.add('d-none');
    formBuscar.classList.remove('d-none');
    formBuscar.reset();
    tablaPacientes.innerHTML = ``;
    tablaResponsive.innerHTML = ``;
    window.scroll(0, 100);
    encabezadoTabla.innerText = 'Resultados de Búsqueda';
}

/*********************
 *  FUNCIONES - FIN  *
 *********************/
 
/*********************** 
 *    LEER PACIENTE    *
 ***********************/
obtenerPacientes();

 /******************************** 
  *   AGREGAR - EDITAR PACIENTE  *
  ********************************/
formAgregar.addEventListener('submit', e => {
    e.preventDefault();
    if (formAgregar.classList.contains('editar')) {
    	var datosPacienteEditar = validarYGuardar(formAgregar);

    	if(datosPacienteEditar){
	        datosPacienteEditar.append('id_paciente', document.querySelector('#form-agregar #id-pac').value);
	        datosPacienteEditar.append('manzana_vieja', document.querySelector('#form-agregar #manzana-vieja').value);
	        datosPacienteEditar.append('direccion_vieja', document.querySelector('#form-agregar #direccion-vieja').value);
	        editarPaciente(datosPacienteEditar);
	    }

    } else {
    	var datosPacienteAgregar = validarYGuardar(formAgregar);

	    if(datosPacienteAgregar){
	        agregarPaciente(datosPacienteAgregar);
	    }
    }
 });

 /************************ 
  *   BUSCAR PACIENTES   *
  ************************/
formBuscar.addEventListener('submit', buscarPacientes);

searchIcon.addEventListener('click', entrarModoBusqueda);

cancelarEditar.addEventListener('click', function() {
    Swal.fire({
       title: 'No se guardaron los cambios',
       type: 'info',
       showConfirmButton: false,
       timer: 1500
    }).then(()=>{
        formAgregar.classList.remove('editar');
        formAgregar.querySelector('.cerrar-form').classList.add('d-none');
        formAgregar.reset();
    });
});

cancelarBuscar.addEventListener('click', function() {
    modoBusqueda = false;
    encabezadoTabla.innerText = 'Pacientes';

    if(url.indexOf('direccionNucleo') > -1){
        location.href = 'index.php';
    }

    obtenerPacientes();
    Swal.fire({
       title: 'Saliendo del modo Búsqueda',
       type: 'info',
       showConfirmButton: false,
       timer: 1500
    }).then(()=>{
        formBuscar.classList.add('d-none');
        formAgregar.classList.remove('d-none');
    });
});

// CERRAR SESION
cerrarSesion.addEventListener('click', (e) => {
    Swal.fire({
        title: 'Cerrar sesión',
        text: '¿Desea cerrar ls sesión?',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, cerrar!'
    })
    .then(result => {
        if(result.value){
            fetch('modelos/Sesion/cerrarSesion.php')
            .then(() => {
                window.location.href = 'pages/login.php';
            }); 
        }
    });
});

document.querySelector('h1').addEventListener('click', () => {
    location.href = 'index.php';
});
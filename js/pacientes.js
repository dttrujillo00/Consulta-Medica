/***************
 * FUNCIONES   *
 ***************/

const eliminarPaciente = e => {
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

                fetch(`modelos/pacientes/eliminar_paciente.php?id_pac=${idPaciente}`)
                .then(res => res.json())
                .then(data => {
                    if (data.respuesta === 'Correcto') {
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

    fetch('modelos/pacientes/editar_paciente.php',{
        method: 'POST',
        body: datos
    })
    .then(res => res.json())
    .then(data => {
        if(data.respuesta === 'Correcto') {
            obtenerPacientes();
            Swal.fire({
                type: 'success',
                title: 'Se guardaron los cambios',
                showConfirmButton: false,
                timer: 2000
            }).then(() => {
                formEditar.classList.add('d-none');
                formAgregar.classList.remove('d-none');
                formAgregar.reset();
            });
        }
    })
}

const agregarPaciente = (datos) => {
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
            nivelEducacionalVistaPaciente = 'Técnico medio';
            break;
        case 6:
            nivelEducacionalVistaPaciente = 'Técnico medio superior';
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
        if(data.respuesta === 'Correcto') {
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
    if(form.classList.contains('editar')){
        var radioSexoMasculino = form.querySelector('#hombre2').checked;
        var radioSexoFemenino = form.querySelector('#mujer2').checked;
    } else {
        var radioSexoMasculino = form.querySelector('#hombre').checked;
        var radioSexoFemenino = form.querySelector('#mujer').checked;
    }

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
    fetch('modelos/pacientes/obtener_pacientes.php')
    .then(res => res.json())
    .then(data => {
        while (tablaPacientes.firstChild) {
            tablaPacientes.removeChild(tablaPacientes.firstChild);
        }

        while (tablaResponsive.firstChild) {
            tablaResponsive.removeChild(tablaResponsive.firstChild);
        }

        let grupo = null;

        data.datos.forEach( paciente => {
            var fila = document.createElement('tr');
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

            var filaResponsive = document.createElement('div');
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
        });

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

const habilitarBotonesEditar = (array) => {
    array.forEach( boton => {
        boton.addEventListener('click', e => {
            formAgregar.classList.add('d-none');
            formEditar.classList.remove('d-none');
            // formEditar.reset();
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

const rellenarCamposFormEdit = id => {
    const inputsFormEdit = document.querySelectorAll('#form-editar input');
    const selectsFormEdit = document.querySelectorAll('#form-editar select');
    fetch(`modelos/pacientes/obtener_paciente_unic.php?id=${id}`)
    .then(res => res.json())
    .then(data => {
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
            case 'Técnico medio':
                selectsFormEdit[0].selectedIndex = 4;
                break;
            case 'Técnico medio superior':
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

const formAgregar = document.querySelector('#form-agregar');
const formEditar = document.querySelector('#form-editar');
const cancelarEditar = document.querySelector('#form-editar i.cerrar-form');
const tablaPacientes = document.querySelector('.table tbody');
const tablaResponsive = document.querySelector('.tabla-responsive');

/*********************** 
 *    LEER PACIENTE    *
 ***********************/
 obtenerPacientes();

/*********************** 
 *   EDITAR PACIENTE   *
 ***********************/
 formEditar.addEventListener('submit', e => {
    e.preventDefault();

    var datosPacienteEditar = validarYGuardar(formEditar);

    if(datosPacienteEditar){
        datosPacienteEditar.append('id_paciente', document.querySelector('#form-editar #id-pac').value);
        datosPacienteEditar.append('manzana_vieja', document.querySelector('#form-editar #manzana-vieja').value);
        datosPacienteEditar.append('direccion_vieja', document.querySelector('#form-editar #direccion-vieja').value);
        // console.log(datosPacienteEditar);
        editarPaciente(datosPacienteEditar);
    }

 });

 /*********************** 
  *   AGREGAR PACIENTE  *
  ***********************/
 formAgregar.addEventListener('submit', e =>{
    e.preventDefault();

    var datosPacienteAgregar = validarYGuardar(formAgregar);

    if(datosPacienteAgregar){
        agregarPaciente(datosPacienteAgregar);
    }
 });

 cancelarEditar.addEventListener('click', function() {
    Swal.fire({
       title: 'No se guardaron los cambios',
       type: 'info',
       showConfirmButton: false,
       timer: 1500
    }).then(()=>{
        formEditar.classList.add('d-none');
        formAgregar.classList.remove('d-none');
        formAgregar.reset();
    });
});
// Para guardar un paciente en la DB:
// Primeramente necesito validar el formulrio,
// luego si todo esta bien, preparar los datos para su envío,
// luego enviarlos a traves de ajax y responder en la vista en consecuencia a
// la respuesta del archivo que procesa y realiza la peticion al servidor

/***************
 * FUNCIONES   *
 ***************/

const eliminarPaciente = e => {
    if(e.target.parentElement.classList.contains('icono-eliminar')){
        // var fila = e.target.parentElement.parentElement.parentElement;
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
                var idPaciente = e.target.parentElement.getAttribute('data-id');

                var xhr = new XMLHttpRequest();

                xhr.open('GET', `modelos/pacientes/eliminar_paciente.php?id_pac=${idPaciente}`, true);

                xhr.onload = function() {
                    if (this.status === 200) {
                        var respuestaEliminarP = JSON.parse(xhr.responseText);
                        if (respuestaEliminarP.respuesta === 'Correcto') {
                            // Esto es para eliminar el paciente de la vista movil
                            // Aqui realmente estoy guardando los botones de eliminar de cada fila
                            // Para obtener el id del paciente
                            var idsPacientesResponsive = document.querySelectorAll('.tabla-responsive .fila-paciente .acciones span.icono-eliminar');
                            idsPacientesResponsive.forEach((itemR) => {
                                console.log(itemR.getAttribute('data-id'));
                                if(itemR.getAttribute('data-id') == idPaciente) {
                                    itemR.parentElement.parentElement.parentElement.remove();
                                }

                            });

                            var idsPacientes = document.querySelectorAll('.table tbody tr td span.icono-eliminar');
                            idsPacientes.forEach((item) => {
                                if(item.getAttribute('data-id') == idPaciente) {
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
                    }
                }

                xhr.send();
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
    console.log(datos.get('nombre_apellido'));

    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'modelos/pacientes/editar_paciente.php', true);

    xhr.onload = function(){
        if(this.status === 200){
            console.log(xhr.responseText);
            var respuesta = JSON.parse(xhr.responseText);
            if(respuesta.respuesta === 'Correcto') {
                Swal.fire({
                    type: 'success',
                    title: 'Se guardaron los cambios',
                    showConfirmButton: false,
                    timer: 2000
                }).then(() => {
                    window.location.href = 'index.php#encabezad-vista';
                });
            }
            
        }
    }

    xhr.send(datos);
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


    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'modelos/pacientes/modelo_paciente.php', true);

    xhr.onload = function() {
        if(this.status === 200){
            var respuesta = JSON.parse(xhr.responseText);
            // console.log(respuesta);
            if(respuesta.respuesta === 'Correcto') {
                var nuevaFila = document.createElement('tr');
                nuevaFila.classList.add(`grupo${datos.get('grupo_disp')}`);

                nuevaFila.innerHTML = `
                <td>${datos.get('nombre_apellido')}</td>
                <td>${sexoVistaPaciente}</td>
                <td>${romanize(datos.get('grupo_disp'))}</td>
                <td>${datos.get('direccion')}</td>
                <td>${respuesta.datos.edad}</td>
                <td>${nivelEducacionalVistaPaciente}</td>
                <td>${datos.get('labor')}</td>
                <td>${datos.get('manzana')}</td>
                <td>${datos.get('diagnostico')}</td>
                <td>
                    <span class="icono-editar">
                        <a href="index.php?id=${respuesta.datos.id_insertado}" >
                            <i class="fa fa-pencil"></i>
                        </a>
                    </span>
                </td>
                <td>
                    <span class="icono-eliminar" data-id="${respuesta.datos.id_insertado}">
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
                // mostrarNotificacion('OK', 'Paciente guardado exitosamente', 'success');

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
                     <p>${respuesta.datos.edad}</p>
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
                        <span class="icono-editar">
                            <a href="index.php?id=${respuesta.datos.id_insertado}" >
                                <i class="fa fa-pencil"></i>
                            </a>
                        </span>
                        <span class="icono-eliminar" data-id="${respuesta.datos.id_insertado}">
                            <i class="fa fa-trash-o"></i>
                        </span>
                    </div>
                </div>
                `;

                tablaResponsive.appendChild(nuevaFilaResponsive);

                formAgregar.reset();
            } else {
                Swal.fire({
                    title: 'ERROR',
                    text: 'Ha ocurrido un error al guardar este paciente',
                    type: 'error'
                });
                // mostrarNotificacion('ERROR', 'Ha ocurrido un error al guardar este paciente', 'error');
            }
            
        }
    }

    xhr.send(datos);
}

const validarYGuardar = (form) => {
    var radioSexoMasculino = form.querySelector('#hombre').checked;
    var radioSexoFemenino = form.querySelector('#mujer').checked;


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

const formAgregar = document.querySelector('#form-agregar');
const formEditar = document.querySelector('#form-editar');
const tablaPacientes = document.querySelector('.table tbody');
const tablaResponsive = document.querySelector('.tabla-responsive');
 
/*********************** 
 *  AGREGAR PACIENTE   *
 ***********************/
// formAgregar.addEventListener('submit', e => {
//     e.preventDefault();

//     var datosPaciente = validarYGuardar(formAgregar);

//     if(datosPaciente){
//         agregarPaciente(datosPaciente);
//     }
// });

/*********************** 
 *  EDITAR PACIENTE    *
 ***********************/
 // formEditar.addEventListener('submit', e => {
 //    e.preventDefault();

 //    var datosPacienteEditar = validarYGuardar(formEditar);

 //    if(datosPacienteEditar){
 //        console.log('Datos a edicion');
 //    }

 // });


/*********************** 
 *  ELIMINAR PACIENTE  *
 ***********************/
tablaPacientes.addEventListener('click', eliminarPaciente);
tablaResponsive.addEventListener('click', eliminarPaciente);
// Para guardar un paciente en la DB:
// Primeramente necesito validar el formulrio,
// luego si todo esta bien, preparar los datos para su envío,
// luego enviarlos a traves de ajax y responder en la vista en consecuencia a
// la respuesta del archivo que procesa y realiza la peticion al servidor


const formAgregar = document.querySelector('.form-agregar');
const tablaPacientes = document.querySelector('.table tbody');
 

formAgregar.addEventListener('submit', (e) => {
    e.preventDefault();

    var radioSexoMasculino = document.querySelector('#hombre').checked;
    var radioSexoFemenino = document.querySelector('#mujer').checked;


    // CAMPOS DEL FORMULARIO
    var nombre_apellido = document.querySelector('#nombre_apellido').value,
        fecha_nacimiento = document.querySelector('#fecha_nacimiento').value,
        direccion = document.querySelector('#direccion').value,
        nivel_educacional = document.querySelector('#nivel_educacional').value,
        diagnostico = document.querySelector('#diagnostico').value,
        manzana = document.querySelector('#manzana').value,
        labor = document.querySelector('#labor').value,
        grupo_disp = document.querySelector('#grupo_disp').value;

    var sexo;

    if(!radioSexoFemenino && !radioSexoMasculino) {
         // notificacion de error
         console.error('Recuerde seleccionar el sexo del paciente');
         return;
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

    	agregarPaciente(infoPaciente);
});

const agregarPaciente = (datos) => {
    console.log(typeof datos.get('nivel_educacional'));
    
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
            console.log(respuesta);
            if(respuesta.respuesta === 'Correcto') {
                alert('El paciente se guardó correctamente');
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
                `;

                // COLUMNA EDITAR CON ICONO Y TODO
                var tdEditar = document.createElement('td');

                var spanEditar = document.createElement('span');
                spanEditar.classList.add('icono-editar');

                var iconoEditar = document.createElement('i');
                iconoEditar.classList.add('fa', 'fa-pencil');

                spanEditar.appendChild(iconoEditar);
                tdEditar.appendChild(spanEditar);

                nuevaFila.appendChild(tdEditar);

                // COLUMNA ELIMINAR CON ICONO Y TODO
                var tdEliminar = document.createElement('td');

                var spanEliminar = document.createElement('span');
                spanEliminar.classList.add('icono-eliminar');

                var iconoEliminar = document.createElement('i');
                iconoEliminar.classList.add('fa', 'fa-trash-o');

                spanEliminar.appendChild(iconoEliminar);
                tdEliminar.appendChild(spanEliminar);

                nuevaFila.appendChild(tdEliminar);

                

                tablaPacientes.appendChild(nuevaFila);

                formAgregar.reset();
            } else {
                alert('Hubo un error al guardar el paciente');
            }
            
		}
	}

	xhr.send(datos);
}

// EDITAR PACIENTE
tablaPacientes.addEventListener('click', (e) => {
    if(e.target.parentElement.classList.contains('icono-eliminar')){
        var fila = e.target.parentElement.parentElement.parentElement;
        if(confirm('¿Quiere eliminar a un paciente?')){
            var idPaciente = e.target.parentElement.getAttribute('data-id');

            var xhr = new XMLHttpRequest();

            xhr.open('POST', 'modelos/modelo_Test.php', true);

            xhr.onload = function() {
                if (this.status === 200) {
                    if (xhr.responseText === 'Correcto') {
                        fila.remove();
                    }
                }
            }

            xhr.send(idPaciente);
        }
    }
});

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
// Para guardar un paciente en la DB:
// Primeramente necesito validar el formulrio,
// luego si todo esta bien, preparar los datos para su envío,
// luego enviarlos a traves de ajax y responder en la vista en consecuencia a
// la respuesta del archivo que procesa y realiza la peticion al servidor


const formAgregar = document.querySelector('.form-agregar');
const inputs = document.querySelectorAll('.form-agregar input');
 

formAgregar.addEventListener('submit', (e) => {
    e.preventDefault();

    var radioSexoMasculino = document.querySelector('#hombre').checked;
    var radioSexoFemenino = document.querySelector('#mujer').checked;
    console.log(radioSexoMasculino);


    // CAMPOS DEL FORMULARIO
    var nombre_apellido = inputs[0].value,
        fecha_nacimiento = inputs[1].value,
        direccion = inputs[2].value,
        nivel_educacional = inputs[3].value,
        diagnostico = inputs[4].value,
        manzana = inputs[5].value,
        grupo_disp = document.querySelector('#grupo_disp').value;

    var sexo;

    if(!radioSexoFemenino && !radioSexoMasculino) {
         // notificacion de error
         console.error('Todos los campos son obligatorios');
         return;
    } else if(radioSexoMasculino) {
        sexo = 'M';
    } else {
        sexo = 'F';
    }

    if(diagnostico === '') {
        diagnostico = 'Sano';
    }
    console.log(nombre_apellido);
    console.log(fecha_nacimiento);
    console.log(direccion);
    console.log(nivel_educacional);
    console.log(diagnostico);
    console.log(manzana);
    console.log(grupo_disp);
    console.log(sexo);

    var infoPaciente = new FormData();
    	infoPaciente.append('nombre_apellido', nombre_apellido);
    	infoPaciente.append('fecha_nacimiento', fecha_nacimiento);
    	infoPaciente.append('direccion', direccion);
    	infoPaciente.append('nivel_educacional', nivel_educacional);
    	infoPaciente.append('diagnostico', diagnostico);
    	infoPaciente.append('manzana', manzana);
    	infoPaciente.append('grupo_disp', grupo_disp);
    	infoPaciente.append('sexo', sexo);

    	agregarPaciente(infoPaciente);
});

const agregarPaciente = (datos) => {

	var xhr = new XMLHttpRequest();

	xhr.open('POST', 'modelos/modelo_paciente.php', true);

	xhr.onload = function() {
		if(this.status === 200){
			console.log(xhr.responseText);
		}
	}

	xhr.send(datos);
}
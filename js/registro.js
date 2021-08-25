const nombreCompleto = document.getElementById('user');
const nombreUsuario = document.getElementById('nick');
const numeroMedico = document.getElementById('number');
const password = document.getElementById('pass');
const consultorio = document.getElementById('consult');
const rol = document.getElementById('rol');
const formulario = document.querySelector('form');
const submitBoton = document.querySelector('button.btn');
const iconoOjo = document.getElementById('icono-ojo');
let formularioValido = true;

iconoOjo.addEventListener('click', switchFieldPassword);

formulario.addEventListener('submit', function(e) {
	e.preventDefault();

	checkRequired([nombreCompleto, nombreUsuario, password, numeroMedico, consultorio]);
	checkLength(nombreCompleto, 8);
	checkLength(nombreUsuario, 3);
	checkLength(password, 8);
	checkLength(numeroMedico, 5);

	if (formularioValido) {
		let data = prepareData([nombreCompleto, nombreUsuario, password, numeroMedico, consultorio, rol], 'registro');
		sendData('../modelos/Sesion/register.php',data, 'POST', 'registro');

	}

	formularioValido = true;
});
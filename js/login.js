const formulario = document.querySelector('form');
const usuario = document.getElementById('nick');
const password = document.getElementById('pass');
const submitBoton = document.querySelector('button.btn');
const respuestaSpan = document.querySelector('.respuesta');
const iconoOjo = document.getElementById('icono-ojo');
let formularioValido = true;


iconoOjo.addEventListener('click', switchFieldPassword);

formulario.addEventListener('submit', function(e) {
	e.preventDefault();

	checkRequired([usuario, password]);
	checkLength(usuario, 3);
	checkLength(password, 8);

	if (formularioValido) {
		let data = prepareData([usuario, password], 'login');
		sendData('../modelos/Sesion/login.php', data, 'POST');
	}

	formularioValido = true;
});
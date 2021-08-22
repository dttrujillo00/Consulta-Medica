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

// function prepareData(inputArr) {
// 	let formData = new FormData();
// 	inputArr.forEach( input => {
// 		formData.append(`${input.id}`, input.value);
// 	});

// 	return formData;
// }

// function sendData(url, data, method) {
// 	fetch(url,{
// 		body: data,
// 		method: method
// 	})
// 	.then(res => res.json())
// 	.then(data => {
// 		console.log(data);
// 		if(data.respuesta === 'Correcto'){
// 			modificarBotonUI(submitBoton, true, 'registro');
// 		} else {
// 			modificarBotonUI(submitBoton, false, 'registro');
// 		}
// 	})
// }

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
		sendData('../modelos/Sesion.register.php',data, 'POST');

	}

	formularioValido = true;
});
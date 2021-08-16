const formularioLogin = document.querySelector('form');
const usuario = document.getElementById('usuario');
const password = document.getElementById('password');
const submitBoton = document.querySelector('button.btn');
const respuestaSpan = document.querySelector('.respuesta');
const iconoOjo = document.getElementById('icono-ojo');
let formularioValido = true;

const showError = (input, message) => {
	const inputContainer = input.parentElement;
	inputContainer.className = 'input-container error';
	const small = inputContainer.querySelector('small');
	small.innerText = message;
}

const showSuccess = (input) => {
	const inputContainer = input.parentElement;

	inputContainer.className = 'input-container success';
}

function checkRequired(inputArr) {
	inputArr.forEach( input => {
		if(input.value.trim() === ''){
			showError(input, `${getFieldName(input)} es requerido`);
			formularioValido = false;
		} else {
			showSuccess(input);
		}
	});
}

const getFieldName = (input) => {
	return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}

const checkLength = (input, min) => {
	if(input.value.length < min){
		showError(input, `${getFieldName(input)} debe tener más de ${min} caracteres`);
		formularioValido = false;
	} else {
		showSuccess(input);
	}
}

function prepareSend(inputArr) {
	let data = new FormData();

	data.append('usuario', inputArr[0].value);
	data.append('password', inputArr[1].value);

	return true;
}

function modificarBotonUI(bool) {
	if (bool) {
		submitBoton.innerHTML = '<i class="fa fa-check"></i>';
		submitBoton.style.backgroundColor = '#28a745';
		respuestaSpan.innerText = 'Bienvenido';
		respuestaSpan.style.color = '#28a745';
		window.location.href = '../index.html';
	} else {
		submitBoton.innerHTML = '<i class="fa fa-close"></i>';
		submitBoton.style.backgroundColor = '#dc3545';
		respuestaSpan.innerText = 'Credenciales incorrectas';
		respuestaSpan.style.color = '#dc3545';
		setTimeout(() => {
			submitBoton.innerText = 'Iniciar sesión';
			submitBoton.style.backgroundColor = 'rgb(52, 152, 219)';
		}, 2000);
	}

}


iconoOjo.addEventListener('click', function(){

	if (iconoOjo.classList.contains('fa-eye-slash')) {
		iconoOjo.classList.remove('fa-eye-slash');
		iconoOjo.classList.add('fa-eye');
		password.type = 'text';
	} else {
		iconoOjo.classList.remove('fa-eye');
		iconoOjo.classList.add('fa-eye-slash');
		password.type = 'password';
	}
});



formularioLogin.addEventListener('submit', function(e) {
	e.preventDefault();

	checkRequired([usuario, password]);
	checkLength(usuario, 5);
	checkLength(password, 8);

	if (formularioValido) {
		modificarBotonUI(prepareSend([usuario, password]));
	}

	formularioValido = true;
});
function showError(input, message) {
	const inputContainer = input.parentElement;
	inputContainer.className = 'input-container error';
	const small = inputContainer.querySelector('small');
	small.innerText = message;
}

function showSuccess(input) {
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

function modificarBotonUI(button, bool, accion) {
	if (bool) {
		button.innerText = '';
		button.classList.add('fa', 'fa-check');
		button.style.backgroundColor = '#28a745';

		if(accion === 'login'){
			window.location.href = '../index.php';
		} else {
			setTimeout(() => {
				button.classList.remove('fa', 'fa-check');
				button.innerText = 'Crear Cuenta';
				button.style.backgroundColor = 'rgb(52, 152, 219)';
				formulario.reset();
			}, 2000);
		}

	} else {
		button.innerText = '';
		button.classList.add('fa', 'fa-close');
		button.style.backgroundColor = '#dc3545';
		setTimeout(() => {
			button.classList.remove('fa', 'fa-close');
			button.innerText = 'Iniciar sesión';
			button.style.backgroundColor = 'rgb(52, 152, 219)';
		}, 2000);
	}

}

function switchFieldPassword(){

	if (iconoOjo.classList.contains('fa-eye-slash')) {
		iconoOjo.classList.remove('fa-eye-slash');
		iconoOjo.classList.add('fa-eye');
		password.type = 'text';
	} else {
		iconoOjo.classList.remove('fa-eye');
		iconoOjo.classList.add('fa-eye-slash');
		password.type = 'password';
	}
}

function prepareData(inputArr, accion) {
	let formData = new FormData();
	let changed = false;
	let arroba = '@';

	if(accion === 'login'){
		if(inputArr[0].value.charAt(0) === arroba){
			formData.append('type', 'user');
			inputArr[0].value = inputArr[0].value.slice(1);
			changed = true;
		} else {
			formData.append('type', 'number');
			// inputArr[0].value = +inputArr[0].value;
		}
	}

	inputArr.forEach( input => {
		formData.append(`${input.id}`, input.value);
	});

	if(changed){
		inputArr[0].value = arroba.concat('', inputArr[0].value);
	}

	return formData;
}

function sendData(url, data, method) {
	fetch(url,{
		body: data,
		method: method
	})
	.then(res => res.json())
	.then(data => {
		console.log(data);
		if(data.respuesta === 'Correcto'){
			modificarBotonUI(submitBoton, true, 'login');
		} else {
			modificarBotonUI(submitBoton, false, 'login');
			if (data.respuesta === 'Password incorrecta') {
				showError(password, 'Contraseña incorrecta');
			}

			if(data.respuesta === 'Usuario inexistente'){
				showError(usuario, 'Usuario inexistente');
			}
		}
	})
}
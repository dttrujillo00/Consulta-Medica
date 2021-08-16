const formularioLogin = document.querySelector('form');
const inputs = document.querySelectorAll('form input');
const submitBoton = document.querySelector('button.btn');
const respuestaSpan = document.querySelector('.respuesta');
const iconoOjo = document.getElementById('icono-ojo');


formularioLogin.addEventListener('submit', function(e) {
	e.preventDefault();

	if(validar(inputs)){
		let data = new FormData();

		data.append('user', inputs[0].value);
		data.append('password', inputs[1].value);

		modificarBotonUI(enviarDatos(data));
	}
});

function validar(inputs) {

	if(inputs[0].value.trim() === ''){
		inputs[0].className = 'error';
		return false;
	} else {
		inputs[0].className = 'correcto';
	}

	if(inputs[1].value.trim() === ''){
		inputs[1].className = 'error';
		return false;
	} else {
		inputs[1].className = 'correcto';
	}

	return true;
}

function enviarDatos(data) {
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
		inputs[1].type = 'text';
	} else {
		iconoOjo.classList.remove('fa-eye');
		iconoOjo.classList.add('fa-eye-slash');
		inputs[1].type = 'password';
	}
});
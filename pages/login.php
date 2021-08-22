<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="rgb(6, 152, 87)">

	<link rel="stylesheet" href="../css/login.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">

	<title>Login</title>
</head>
<body>

	<div class="form-container">
		<h2>Inicio de Sesión</h2>

		<form>
			<div class="input-container">
				<input class="neutro" id="nick" type="text" placeholder="@usuario o número de médico">
				<small>Error Message</small>
				
			</div>

			<div class="input-container">
				
				<input class="neutro" id="pass" type="password" placeholder="contraseña">
				<i class="fa fa-eye-slash" id="icono-ojo"></i>
				<small>Error Message</small>
			</div>	


		    <button class="btn">Iniciar sesión</button>
		</form>

		<span class="respuesta"></span>
	</div>

	<script src="../js/funcionesLogin.js"></script>
	<script src="../js/login.js"></script>
	
</body>
</html>
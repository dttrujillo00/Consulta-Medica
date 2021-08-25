<?php
session_start();

// if ($_SESSION['rol'] != 'Administrador') {
// 	header('location:../index.php');
// }

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="rgb(6, 152, 87)">

	<link rel="stylesheet" href="../css/login.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">

	<title>Registro</title>
</head>
<body>

	<div class="form-container">
		<h2>Crear Cuenta</h2>

		<form>
			<div class="input-container">
				<input class="neutro" id="user" type="text" placeholder="Nombre completo">
				<small>Error Message</small>
			</div>

			<div class="input-container">
				<input class="neutro" id="nick" type="text" placeholder="Alias o nombre de usuario">
				<small>Error Message</small>
			</div>

			<div class="input-container">
				<input class="neutro" id="number" type="number" placeholder="Número de médico" min="0">
				<small>Error Message</small>
			</div>

			<div class="input-container">
				<input class="neutro" id="pass" type="password" placeholder="Contraseña">
				<i class="fa fa-eye-slash" id="icono-ojo"></i>
				<small>Error Message</small>
			</div>

			<div class="input-container">
				<input class="neutro" id="consult" type="number" placeholder="Consultorio" min="0">
				<small>Error Message</small>
			</div>

			<div class="input-container select-container">
				<select id="rol">
					<option value="2">Médico / Enfermera</option>
					<option value="1">Jefe</option>
					<option value="0">Administrador</option>
				</select>
			</div>	


		    <button class="btn" id="">Crear Cuenta</button>
		</form>

		<span class="respuesta"></span>
	</div>

	<script src="../js/funcionesLogin.js"></script>
	<script src="../js/registro.js"></script>
	
</body>
</html>
<?php 
	// INSTANCIANDO LA CONEXION 
	require_once('../database/conexion.php');
	require_once('../funciones/funciones.php');


	$nombre_apellido = filter_var($_POST['nombre_apellido'], FILTER_SANITIZE_STRING);
	$fecha_nacimiento = filter_var($_POST['fecha_nacimiento'], FILTER_SANITIZE_STRING);
	$direccion = filter_var($_POST['direccion'], FILTER_SANITIZE_STRING);
	$nivel_educacional = filter_var($_POST['nivel_educacional'], FILTER_SANITIZE_STRING);
	$diagnostico = filter_var($_POST['diagnostico'], FILTER_SANITIZE_STRING);
	$manzana = filter_var($_POST['manzana'], FILTER_SANITIZE_STRING);
	$grupo_disp = filter_var($_POST['grupo_disp'], FILTER_SANITIZE_STRING);
	$sexo = filter_var($_POST['sexo'], FILTER_SANITIZE_STRING);

	$edad = calcularEdad($_POST['fecha_nacimiento'], $today);

	try {
		$statement = $conn->prepare('INSERT INTO paciente (nombre_comp_pac, edad_pac, fecha_nac_pac, labor_pac) VALUES (?, ?, ?, ?)');
	} catch (Exception $e) {
		$respuesta = array(
            'error' => $e->getMessage()
        );
	}

?>
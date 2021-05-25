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
	$labor = filter_var($_POST['labor'], FILTER_SANITIZE_STRING);
	$grupo_disp = filter_var($_POST['grupo_disp'], FILTER_SANITIZE_STRING);
	$sexo = filter_var($_POST['sexo'], FILTER_SANITIZE_STRING);


	$edad = calcularEdad($_POST['fecha_nacimiento'], $today);

	try {
		$statement = $pdo->prepare('INSERT INTO paciente (nombre_comp_pac, edad_pac, fecha_nac_pac, labor_pac, diagnostico_pac, grupo_disponible_pac) VALUES (?, ?, ?, ?, ?, ?)');
		$statement->execute(array($nombre_apellido,$edad,$fecha_nacimiento,$labor,$diagnostico,$grupo_disp));		
		$statement = $pdo->prepare('INSERT INTO nucleo (dir_nuc, no_nuc) VALUES (?,?)');
		$statement->execute(array($direccion, $manzana));		
		$statement = $pdo->prepare('INSERT INTO nucleo_pac (id_pac, id_nuc) VALUES (?, ?)');
		$statement->execute(array(10, 2));			
		$statement = $pdo->prepare('INSERT INTO sexo (pac, gen) VALUES (?, ?)');
		$statement->execute(array(10, 1));					
		$statement = $pdo->prepare('INSERT INTO nivel_educacional_paciente (id_pac, id_ne) VALUES (?, ?)');
		$statement->execute(array(10, 1));			
	}
	catch (Exception $e) {
		$respuesta = array(
            'error' => $e->getMessage()
        );
	}

?>
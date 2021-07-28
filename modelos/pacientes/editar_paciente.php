<?php 
	// INSTANCIANDO LA CONEXION 
	require_once('../../database/conexion.php');
	require_once('../../funciones/funciones.php');


	$nombre_apellido = filter_var($_POST['nombre_apellido'], FILTER_SANITIZE_STRING);
	$fecha_nacimiento = filter_var($_POST['fecha_nacimiento'], FILTER_SANITIZE_STRING);
	$direccion = filter_var($_POST['direccion'], FILTER_SANITIZE_STRING);
	$nivel_educacional = filter_var($_POST['nivel_educacional'], FILTER_SANITIZE_STRING);
	$diagnostico = filter_var($_POST['diagnostico'], FILTER_SANITIZE_STRING);
	$manzana = filter_var($_POST['manzana'], FILTER_SANITIZE_STRING);
	$labor = filter_var($_POST['labor'], FILTER_SANITIZE_STRING);
	$grupo_disp = filter_var($_POST['grupo_disp'], FILTER_SANITIZE_STRING);
	$id_sexo = filter_var($_POST['sexo'], FILTER_SANITIZE_STRING);
	$id_pac = filter_var($_POST['id_paciente'], FILTER_SANITIZE_STRING);
	//HACE FALTA ESTO AHORA
	$manzana_vieja = filter_var($_POST['manzana_vieja'], FILTER_SANITIZE_STRING);
	$direccion_vieja = filter_var($_POST['direccion_vieja'], FILTER_SANITIZE_STRING);
	//NO HACE FALTA EL ID_NUC
    //$id_nuc = filter_var($_POST['id_nucleo'], FILTER_SANITIZE_STRING);

	$edad = calcularEdad($_POST['fecha_nacimiento'], $today);

	try {
		$statement = $pdo->prepare('UPDATE paciente SET nombre_comp_pac=?, edad_pac=?, fecha_nac_pac=?, labor_pac=?, diagnostico_pac=?, grupo_disponible_pac=?, sexo=?, nivel_educacional=? WHERE id_pac=?');
		$statement->execute(array($nombre_apellido,$edad,$fecha_nacimiento,$labor,$diagnostico,$grupo_disp,$pac, $id_sexo, $nivel_educacional));		
        
        if($direccion_vieja != $direccion || $manzana_vieja != $manzana){                
            $statement = $pdo->prepare('INSERT INTO nucleo (dir_nuc, no_nuc) VALUES (?,?)');
            $statement->execute(array($direccion, $manzana));
            $id_nuc = $pdo->lastInsertId();
            $statement = $pdo->prepare('UPDATE nucleo_pac SET id_nuc=? WHERE id_pac=?');
            $statement->execute(array($id_nuc, $id_pac));
        }		
		// $respuesta = 'Correcto';
		$respuesta = array(
			'respuesta' => 'Correcto',
			'datos' => array(
				'edad' => $edad
			)
		);
	}
	catch (Exception $e) {
		// $respuesta = 'Error'.$e->getMessage();
		$respuesta = array(
			'respuesta' => 'Error'.$e->getMessage()
		);
	}

	echo json_encode($respuesta);

?>
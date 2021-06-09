<?php 
	// INSTANCIANDO LA CONEXION 
	require_once('../../database/conexion.php');
        
    $id_pac = filter_var($_GET['id_pac'], FILTER_SANITIZE_STRING);

	try {
		$statement = $pdo->prepare('DELETE FROM paciente WHERE id_pac = ?');
		$statement->execute(array($id_pac));
		$statement = $pdo->prepare('DELETE FROM nucleo_pac WHERE id_pac = ?');
		$statement->execute(array($id_pac));			
		$statement = $pdo->prepare('DELETE FROM sexo WHERE pac = ?');
		$statement->execute(array($id_pac));					
		$statement = $pdo->prepare('DELETE FROM nivel_educacional_paciente WHERE id_pac = ?');
		$statement->execute(array($id_pac));			
		// $respuesta = 'Correcto';
		$respuesta = array(
			'respuesta' => 'Correcto'
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
<?php 
	// INSTANCIANDO LA CONEXION 
	require_once('../../database/conexion.php');
        
    $id_nuc = filter_var($_GET['id_nuc'], FILTER_SANITIZE_STRING);

	try {
		$statement = $pdo->prepare('DELETE FROM nucleo_pac WHERE id_nuc = ?');
		$statement->execute(array($id_nuc));			
		$statement = $pdo->prepare('DELETE FROM nucleo WHERE id_nuc = ?');
		$statement->execute(array($id_nuc));
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
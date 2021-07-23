<?php 
	// INSTANCIANDO LA CONEXION 
	require_once('../../database/conexion.php');
        
    $id_nuc = filter_var($_GET['id_nuc'], FILTER_SANITIZE_STRING);

	try {
		$statement = $pdo->prepare('DELETE FROM nucleo WHERE id_nuc = ?');
		$statement->execute(array($id_nuc));
		$statement = $pdo->prepare('SELECT id_pac FROM nucleo_pac WHERE id_nuc = ?');
		$statement->execute(array($id_nuc));
        $pac = $statement->fetchAll();	
        //Revisar ese foreach, primera vez que lo uso	
        foreach($pac as $indic=>$id){
            $statement = $pdo->prepare('DELETE FROM paciente WHERE id_pac = ?');
            $statement->execute(array($id));    
        }
		$statement = $pdo->prepare('DELETE FROM nucleo_pac WHERE id_nuc = ?');
		$statement->execute(array($id_nuc));			
		$statement = $pdo->prepare('DELETE FROM cond_estr_viv WHERE id_nuc = ?');
		$statement->execute(array($id_nuc));			
		$statement = $pdo->prepare('DELETE FROM indic_hac WHERE id_nuc = ?');
		$statement->execute(array($id_nuc));			
		$statement = $pdo->prepare('DELETE FROM eq_dom_bas WHERE id_nuc = ?');
		$statement->execute(array($id_nuc));			
		$statement = $pdo->prepare('DELETE FROM satis_ingreso_nucleo WHERE id_nuc = ?');
		$statement->execute(array($id_nuc));			
		$statement = $pdo->prepare('DELETE FROM funcionalidad_nucleo WHERE id_nuc = ?');
		$statement->execute(array($id_nuc));			
		$statement = $pdo->prepare('DELETE FROM eq_dom_bas WHERE id_nuc = ?');
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
<?php 
	// INSTANCIANDO LA CONEXION 
	require_once('../../database/conexion.php');
        
    $user = filter_var($_POST['user'], FILTER_SANITIZE_STRING);
    $nick = filter_var($_POST['nick'], FILTER_SANITIZE_STRING);
    $number = filter_var($_POST['number'], FILTER_SANITIZE_STRING);
    $pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
    $consult = filter_var($_POST['consult'], FILTER_SANITIZE_STRING);
    $rol = filter_var($_POST['rol'], FILTER_SANITIZE_STRING);

    $hash = password_hash($pass, PASSWORD_DEFAULT);
    try{
        $statement = $pdo->prepare('INSERT INTO usuario SET nombre_usuario = ?, alias_usuario = ?, numero_usuario = ?, contrasenna = ?, id_cons = ?, id_rol = ?');
        $statement->execute(array($user, $nick, $number, $hash, $consult, $rol));		
        $id_user = $pdo->lastInsertId();		
		
        $respuesta = array(
			'respuesta' => 'Correcto',
			'datos' => array(
				'id_insertado' => $id_user
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
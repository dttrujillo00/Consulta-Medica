<?php 
	// INSTANCIANDO LA CONEXION 
	require_once('../../database/conexion.php');
        
    $user = filter_var($_GET['user'], FILTER_SANITIZE_STRING);
    $nick = filter_var($_GET['nick'], FILTER_SANITIZE_STRING);
    $number = filter_var($_GET['number'], FILTER_SANITIZE_STRING);
    $pass = filter_var($_GET['pass'], FILTER_SANITIZE_STRING);
    $rol = filter_var($_GET['rol'], FILTER_SANITIZE_STRING);
    $consult = filter_var($_GET['consult'], FILTER_SANITIZE_STRING);

    $hash = password_hash($pass, PASSWORD_DEFAULT);
    try{
        $statement = $pdo->prepare('INSERT INTO usuario WHERE nombre_usuario = ?, alias_usuario = ?, numero usuario = ?, contrasenna = ?, id_cons = ?');
        $statement->execute(array($user, $nick, $number, $pass, $consult));		
        $id_user = $pdo->lastInsertId();
        $statement = $pdo->prepare('INSERT INTO usuario_rol WHERE id_us = ?, id_rol = ?');
        $statement->execute(array($id_user, $rol));		
		
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
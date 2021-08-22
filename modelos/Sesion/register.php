<?php 
	// INSTANCIANDO LA CONEXION 
	require_once('../../database/conexion.php');
        
    $user = filter_var($_GET['user'], FILTER_SANITIZE_STRING);
    $nick = filter_var($_GET['nick'], FILTER_SANITIZE_STRING);
    $number = filter_var($_GET['number'], FILTER_SANITIZE_STRING);
    $pass = filter_var($_GET['pass'], FILTER_SANITIZE_STRING);
    $consult = filter_var($_GET['consult'], FILTER_SANITIZE_STRING);
    $rol = filter_var($_GET['rol'], FILTER_SANITIZE_STRING);

    $hash = password_hash($pass, PASSWORD_DEFAULT);
    try{

        $statement = $pdo->prepare('SELECT id_cons FROM consultorio WHERE numero_consultorio = ?');
        $statement->execute(array($consult));
        $tabla_cons=$statement->fetch();
        if($tabla_cons==null){
            $statement = $pdo->prepare('INSERT INTO consultorio SET numero_consultorio = ?');
            $statement->execute(array($consult));		
            $id_cons = $pdo->lastInsertId();		
        }else{
            $id_cons = $tabla_cons['id_cons']
        }
        $statement = $pdo->prepare('INSERT INTO usuario SET nombre_usuario = ?, alias_usuario = ?, numero usuario = ?, contrasenna = ?, id_cons = ?, id_rol = ?');
        $statement->execute(array($user, $nick, $number, $hash, $id_cons, $rol));		
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
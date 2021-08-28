<?php 
	// INSTANCIANDO LA CONEXION 
	require_once('../../database/conexion.php');
    // var_dump($_POST);
        
    $user = filter_var($_POST['user'], FILTER_SANITIZE_STRING);
    $nick = filter_var($_POST['nick'], FILTER_SANITIZE_STRING);
    $number = filter_var($_POST['number'], FILTER_SANITIZE_STRING);
    $pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
    $consult = filter_var($_POST['consult'], FILTER_SANITIZE_STRING);
    $polic = filter_var($_POST['policlinico'], FILTER_SANITIZE_STRING);
    $rol = filter_var($_POST['rol'], FILTER_SANITIZE_STRING);

    $hash = password_hash($pass, PASSWORD_DEFAULT);
    try{
        $statement = $pdo->prepare('SELECT * FROM usuario WHERE alias_usuario = ? OR numero_usuario = ?');
        $statement->execute(array($nick, $number));
        $existe=$statement->fetch();
        if($existe == null)
        {
            $statement = $pdo->prepare('SELECT id_pol FROM policlinico WHERE nombre_pol = ?');
            $statement->execute(array($polic));
            $tabla_pol=$statement->fetch();
            if($tabla_pol==null){
                $statement = $pdo->prepare('INSERT INTO policlinico (nombre_pol) VALUES (?)');
                $statement->execute(array($polic));		
                $id_pol = $pdo->lastInsertId();		
            }else{
                $id_pol = $tabla_pol['id_pol'];
            }
            $statement = $pdo->prepare('SELECT id_cons FROM consultorio WHERE numero_consultorio = ? AND id_pol = ?');
            $statement->execute(array($consult, $id_pol));
            $tabla_cons=$statement->fetch();
            if($tabla_cons==null){
                $statement = $pdo->prepare('INSERT INTO consultorio (numero_consultorio, id_pol) VALUES (?, ?)');
                $statement->execute(array($consult, $id_pol));		
                $id_cons = $pdo->lastInsertId();		
            }else{
                $id_cons = $tabla_cons['id_cons'];
            }
            $statement = $pdo->prepare('INSERT INTO usuario (nombre_usuario, alias_usuario, numero_usuario, contrasenna, id_cons, id_rol) VALUES (?,?,?,?,?,?)');
            $statement->execute(array($user, $nick, $number, $hash, $id_cons, $rol));		
            $id_user = $pdo->lastInsertId();	
            $respuesta = array(
                'respuesta' => 'Correcto',
                'datos' => array(
                    'id_insertado' => $id_user
                   // 'id_consultorio_insertado' => $id_user
                    )
                );
            }
            else{
                // print("error");
                $respuesta = array(
                    'respuesta' => 'Error, numero de usuario o nick duplicado',
                    );
            }
        }
    catch (Exception $e) {
    // $respuesta = 'Error'.$e->getMessage();
    $respuesta = array(
    'respuesta' => 'Error'.$e->getMessage()
    );
    }
    
    echo json_encode($respuesta);
?>
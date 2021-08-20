<?php 
	// INSTANCIANDO LA CONEXION 
	require_once('../../database/conexion.php');
        
    $user = filter_var($_GET['user'], FILTER_SANITIZE_STRING);
    $type = filter_var($_GET['type'], FILTER_SANITIZE_STRING);
    $pass = filter_var($_GET['pass'], FILTER_SANITIZE_STRING);

    try{
        if(type)
            $statement = $pdo->prepare('SELECT u.nombre_usuario, r.rol FROM usuario u LEFT JOIN usuario_rol ur ON u.id_us = ur.id_us LEFT JOIN rol r ON ur.id_rol = r.id_rol WHERE alias_usuario = ?');
        else
            $statement = $pdo->prepare('SELECT u.nombre_usuario, r.rol FROM usuario u LEFT JOIN usuario_rol ur ON u.id_us = ur.id_us LEFT JOIN rol r ON ur.id_rol = r.id_rol WHERE numero_usuario = ?');
        $statement->execute(array($user));		
        $result = $statement->fetchAll(); 

        if(!$result){
            $respuesta = array(
                'respuesta' => 'Usuario inexistente',
                );
                die();
            }
            else{
                if(password_verify($pass, $resul[contrasenna])){

                    $respuesta = array(
                        'respuesta' => 'Correcto',
                        'datos' => $result
                    );
                }
                else{
                    $respuesta = array(
                        'respuesta' => 'Contraseña incorrecta',
                    );
                }
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
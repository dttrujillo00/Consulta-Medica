<?php  
    // INICIANDO LA SESIÓN
    session_start();

	// INSTANCIANDO LA CONEXION 
	require_once('../../database/conexion.php');
        
    $user = filter_var($_POST['nick'], FILTER_SANITIZE_STRING);
    $type = filter_var($_POST['type'], FILTER_SANITIZE_STRING);
    $pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);

    try{
        if($type  == 'user'){
            $statement = $pdo->prepare('SELECT u.nombre_usuario AS usuario, u.numero_usuario AS numero_usuario, u.contrasenna AS contrasenna, r.rol AS rol, c.id_cons AS consultorio FROM usuario u LEFT JOIN consultorio c ON u.id_cons = c.id_cons LEFT JOIN rol r ON u.id_rol = r.id_rol WHERE alias_usuario = ?');
        } else {
            $statement = $pdo->prepare('SELECT u.nombre_usuario AS usuario, u.numero_usuario AS numero_usuario, u.contrasenna AS contrasenna, r.rol AS rol, c.id_cons AS consultorio FROM usuario u LEFT JOIN consultorio c ON u.id_cons = c.id_cons LEFT JOIN rol r ON u.id_rol = r.id_rol WHERE numero_usuario = ?');
        }
        $statement->execute(array($user));		
        $result = $statement->fetch();

        if(!$result){
            $respuesta = array(
                'respuesta' => 'Usuario inexistente',
                );
                // die();
            }
            else{
                if(password_verify($pass, $result['contrasenna'])){
                    $_SESSION['usuario'] = $result['usuario'];
                    $_SESSION['rol'] = $result['rol'];
                    $_SESSION['consultorio'] = $result['consultorio'];
                    
                    $respuesta = array(
                        'respuesta' => 'Correcto',
                        'datos' => $result
                    );
                }
                else{
                    $respuesta = array(
                        'respuesta' => 'Password incorrecta',
                    );
                    // die();
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
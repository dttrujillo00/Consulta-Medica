<?php  
    // INICIANDO LA SESIÓN
    session_start();

	// INSTANCIANDO LA CONEXION 
	require_once('../../database/conexion.php');
        
    $user = filter_var($_GET['user'], FILTER_SANITIZE_STRING);
    $type = filter_var($_GET['type'], FILTER_SANITIZE_STRING);
    $pass = filter_var($_GET['pass'], FILTER_SANITIZE_STRING);

    try{
        if(type)
            $statement = $pdo->prepare('SELECT u.nombre_usuario AS usuario, u.contrasenna AS contrasenna, r.rol AS rol, c.numero_consultorio AS consultorio FROM usuario u LEFT JOIN consultorio c ON u.id_cons = c.id_cons LEFT JOIN rol r ON u.id_rol = r.id_rol WHERE alias_usuario = ?');
            else
            $statement = $pdo->prepare('SELECT u.nombre_usuario AS usuario, u.contrasenna AS contrasenna, r.rol AS rol, c.numero_consultorio AS consultorio FROM usuario u LEFT JOIN consultorio c ON u.id_cons = c.id_cons LEFT JOIN rol r ON u.id_rol = r.id_rol WHERE numero_usuario = ?');
        $statement->execute(array($user));		
        $result = $statement->fetchAll(); 

        if(!$result){
            $respuesta = array(
                'respuesta' => 'Usuario inexistente',
                );
                die();
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
                        'respuesta' => 'Contraseña incorrecta',
                    );
                    die();
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
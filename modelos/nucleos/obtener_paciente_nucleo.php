
<?php


require_once('database/conexion.php');


$id_nuc = filter_var($_POST['id_nuc'], FILTER_SANITIZE_STRING);

try{
    //Hice el inner join para si hace falta ya sacar los datos de ahi directamente
    $statement = $pdo->prepare('SELECT p.id_pac FROM nucleo n INNER JOIN nucleo_pac np ON n.id_nuc = np.id_nuc INNER JOIN paciente p ON np.id_pac = p.id_pac WHERE n.id_nuc = (?) AND n.id_cons');
    $statement->execute(array($id_nuc, $_SESSION['consultorio']));		
    $result = $statement->fetchAll(); 

    $respuesta = array(
        'respuesta' => 'Correcto',
        'datos' => $result
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
<?php 
	// INSTANCIANDO LA CONEXION 
	require_once('../../database/conexion.php');

	$direccion = filter_var($_POST['direccion'], FILTER_SANITIZE_STRING);
	$manzana = filter_var($_POST['manzana'], FILTER_SANITIZE_STRING);
	$id_condViv = filter_var($_POST['condiciones'], FILTER_SANITIZE_STRING);
	$id_indiceHac = filter_var($_POST['indice'], FILTER_SANITIZE_STRING);
	$id_equipBas = filter_var($_POST['equipamiento'], FILTER_SANITIZE_STRING);
    //En desarrollo
	/* $id_satisFam = filter_var($_POST['satisfaccion'], FILTER_SANITIZE_STRING);
	$id_funcFam = filter_var($_POST['funcionamiento'], FILTER_SANITIZE_STRING);
	$id_evalFam = filter_var($_POST['evaluacion'], FILTER_SANITIZE_STRING);
	$id_problema = filter_var($_POST['propblemas'], FILTER_SANITIZE_STRING); */

	try {
        $statement = $pdo->prepare('SELECT * FROM nucleo WHERE dir_nuc=? , no_nuc=?');
        $statement->execute(array($direccion, $manzana));
        $tabla_nucleo=$statement->fetch();        
        if($tabla_nucleo==null){          
		$statement = $pdo->prepare('INSERT INTO nucleo (dir_nuc, no_nuc) VALUES (?,?)');
		$statement->execute(array($direccion, $manzana));
		$id_nuc = $pdo->lastInsertId();			
        $statement = $pdo->prepare('INSERT INTO cond_estr_viv (id_pac, id_cal) VALUES (?, ?)');
        $statement->execute(array($id_nuc, $id_condViv));	
        $statement = $pdo->prepare('INSERT INTO nidic_hac (id_pac, id_cal) VALUES (?, ?)');
        $statement->execute(array($id_nuc, $id_indiceHac));	
        $statement = $pdo->prepare('INSERT INTO eq_dom_bas (id_pac, id_cal) VALUES (?, ?)');
        $statement->execute(array($id_nuc, $id_equipBas));	
        
		// $respuesta = 'Correcto';
		$respuesta = array(
            'respuesta' => 'Correcto',
			'datos' => array(
				'id_insertado' => $id_nuc
                )
            );
        }
        else{
            $respuesta = array(
                'respuesta' => 'Existente',
                'datos' => array(
                    'id_insertado' => $id_nuc
                    )
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
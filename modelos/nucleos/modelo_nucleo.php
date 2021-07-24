<?php 
	// INSTANCIANDO LA CONEXION 
	require_once('../../database/conexion.php');

    $id_nuc = filter_var($_POST['funcionamiento'], FILTER_SANITIZE_STRING);
	$direccion = filter_var($_POST['direccion'], FILTER_SANITIZE_STRING);
	$manzana = filter_var($_POST['manzana'], FILTER_SANITIZE_STRING);
	$id_condViv = filter_var($_POST['condiciones'], FILTER_SANITIZE_STRING);
	$id_indiceHac = filter_var($_POST['indice'], FILTER_SANITIZE_STRING);
	$id_equipBas = filter_var($_POST['equipamiento'], FILTER_SANITIZE_STRING);
	$id_satisFam = filter_var($_POST['satisfaccion'], FILTER_SANITIZE_STRING);
	$id_funcFam = filter_var($_POST['funcionamiento'], FILTER_SANITIZE_STRING);
	//hay 4 evalaciones: 1 Sin problemas, 2 Deficid..... 
	$id_evalFam = filter_var($_POST['evaluacion'], FILTER_SANITIZE_STRING);
    
	try {
        $statement = $pdo->prepare('INSERT INTO nucleo SET id_nuc=?, no_nuc=?, dir_nuc=?, funcionamiento_nucleo=?, cond_estr_viv=?, indic_hac=?, eq_dom_bas=?, satis_ingreso=?, eval_nuc=? ON DUPLICATE KEY UPDATE no_nuc=?, dir_nuc=?, funcionamiento_nucleo=?, cond_estr_viv=?, indic_hac=?, eq_dom_bas=?, satis_ingreso=?, eval_nuc=?');
        $statement->execute(array($id_nuc, $manzana, $direccion, $id_funcFam, $id_condViv, $id_indiceHac, $id_equipBas, $id_satisFam, $id_evalFam, $manzana, $direccion, $id_funcFam, $id_condViv, $id_indiceHac, $id_equipBas, $id_satisFam, $id_evalFam));
        $respuesta = array(
            'respuesta' => 'Correcto',
            'datos' => array(
                'id_editado' => $id_nuc
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
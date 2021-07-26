<?php 

require_once('../../database/conexion.php');

$id_nucleo_edit = $_GET['id'];

try{
	$statement_edit = $pdo->prepare('SELECT n.id_nuc AS idNuc, n.dir_nuc AS dirNuc, n.no_nuc AS manzana, cih.calificacion AS califIndicHac, ccev.calificacion AS califCondEstrucViv, cedb.calificacion AS califEqDomBas, si.satisfaccion AS satisIngr, ff.tipo_func AS funcFam, e.evaluacion AS eval FROM nucleo n LEFT JOIN calificativo cih ON n.indic_hac = cih.id_cal LEFT JOIN calificativo ccev ON n.cond_estr_viv = ccev.id_cal LEFT JOIN calificativo cedb ON n.eq_dom_bas = cedb.id_cal LEFT JOIN satis_ingreso si ON n.satis_ingreso = si.id_si LEFT JOIN funcionalidad ff ON n.funcionamiento_nucleo = ff.id_func LEFT JOIN evaluacion e ON n.eval_nuc = e.id_eval WHERE n.id_nuc = (?)');
    $statement_edit->execute(array($id_nucleo_edit));
    $result_edit = $statement_edit->fetch();

    $respuesta = array(
        'respuesta' => 'Correcto',
        'datos' => $result_edit
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
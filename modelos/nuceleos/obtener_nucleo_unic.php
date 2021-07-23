<?php 

require_once('../../database/conexion.php');

$id_nucleo_edit = $_GET['id'];

try{
	$statement_edit = $pdo->prepare('SELECT n.id_nuc AS idNuc, n.dir_nuc AS dirNuc, n.no_nuc AS manzana, cih.calificacion AS califIndicHac, ccev.calificacion AS califCondEstrucViv, cedb.calificacion AS califEqDomBas, si.satisfaccion AS satisIngr, ff.tipo_func AS funcFam, e.evaluacion AS eval FROM nucleo n LEFT JOIN indic_hac ih ON n.id_nuc = ih.id_nuc LEFT JOIN calificativo cih ON ih.id_cal = cih.id_cal LEFT JOIN cond_estr_viv cev ON n.id_nuc = cev.id_nuc LEFT JOIN calificativo ccev ON cev.id_cal = ccev.id_cal LEFT JOIN eq_dom_bas edb ON n.id_nuc = edb.id_nuc LEFT JOIN calificativo cedb ON cedb.id_cal = edb.id_cal LEFT JOIN satis_ingreso_nucleo sin ON sin.id_nuc = n.id_nuc LEFT JOIN satis_ingreso si ON si.id_si = sin.id_si LEFT JOIN funcionalidad_nucleo ffn ON ffn.id_nuc = n.id_nuc LEFT JOIN funcionalidad ff on ff.id_func = ffn.id_func LEFT JOIN eval_nuc en ON en.id_nuc = n.id_nuc LEFT JOIN evaluacion e ON e.id_eval = en.id_eval WHERE n.id_nuc = (?)');
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
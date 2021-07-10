
<?php


require_once('database/conexion.php');

try{
    $statement = $pdo->prepare('SELECT n.dir_nuc AS dirNuc, cih.calificacion AS califIndicHac, ccev.calificacion AS califCondEstrucViv, cedb.calificacion AS califEqDomBas, si.satisfaccion AS satisIngr, ff.tipo_func AS funcFam, e.evaluacion AS eval FROM nucleo n INNER JOIN indic_hac ih ON n.id_nuc = ih.id_nuc INNER JOIN calificativo cih ON ih.id_cal = cih.id_cal INNER JOIN cond_estr_viv cev ON n.id_nuc = cev.id_nuc INNER JOIN calificativo ccev ON cev.id_cal = ccev.id_cal INNER JOIN  eq_dom_bas edb ON n.id_nuc = edb.id_nuc INNER JOIN calificativo cedb ON cedb.id_cal = edb.id_cal INNER JOIN satis_ingreso_nucleo sin ON sin.id_nuc = n.id_nuc INNER JOIN satis_ingreso si ON si.id_si = sin.id_si INNER JOIN funcionalidad_nucleo ffn ON ffn.id_nuc = n.id_nuc INNER JOIN funcionalidad ff on ff.id_func = ffn.id_func INNER JOIN eval_nuc en ON en.id_nuc = n.id_nuc INNER JOIN evaluacion e ON e.id_eval = en.id_eval ORDER BY n.id_nuc');
    $statement->execute();		
    $result = $statement->fetchAll(); 

    $respuesta = array(
        'respuesta' => 'Correcto'
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
<?php 

require_once('../../database/conexion.php');

try{
    $statement = $pdo->prepare('SELECT p.id_pac, p.nombre_comp_pac, p.edad_pac, p.fecha_nac_pac, p.labor_pac, p.diagnostico_pac, p.grupo_disponible_pac, n.dir_nuc, n.no_nuc, g.genero, ne.nivel FROM paciente p LEFT JOIN nucleo_pac np ON p.id_pac = np.id_pac LEFT JOIN nucleo n ON np.id_nuc = n.id_nuc LEFT JOIN genero g ON p.sexo = g.id_gen LEFT JOIN nivel_educacional ne ON p.nivel_educacional = ne.id_ne ORDER BY p.id_pac');
    $statement->execute();		
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
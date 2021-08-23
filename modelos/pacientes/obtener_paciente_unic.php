<?php

require_once('../../database/conexion.php');

session_start();

try {
    $idUnico = $_GET['id'];
    $statementUnico = $pdo->prepare('SELECT p.id_pac, p.nombre_comp_pac, p.edad_pac, p.fecha_nac_pac, p.labor_pac, p.diagnostico_pac, p.grupo_disponible_pac, n.dir_nuc, n.no_nuc, g.genero, ne.nivel, ne.id_ne, np.id_nuc FROM paciente p LEFT JOIN nucleo_pac np ON p.id_pac = np.id_pac LEFT JOIN nucleo n ON np.id_nuc = n.id_nuc LEFT JOIN genero g ON p.sexo = g.id_gen LEFT JOIN nivel_educacional ne ON p.nivel_educacional = ne.id_ne WHERE p.id_pac = (?) AND n.id_cons = (?)');
    $statementUnico->execute(array($idUnico, $_SESSION['consultorio']));
    $resultUnico = $statementUnico->fetch();

    $respuesta = array(
        'respuesta' => 'Correcto',
        'datos' => $resultUnico
        );
} catch (Exception $e) {
    // $respuesta = 'Error'.$e->getMessage();
    $respuesta = array(
    'respuesta' => 'Error'.$e->getMessage()
    );
}

echo json_encode($respuesta);
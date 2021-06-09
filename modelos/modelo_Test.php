<?php 

// ESTE ARCHIVO ES SOLO PARA SIMULAR UNA RESPUESTA DEL SERVIDOR
$respuesta = array(
	'respuesta' => 'Correcto',
	'datos' => $_GET['id']
);
echo json_encode($respuesta);

?>
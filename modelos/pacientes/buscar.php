<?php

include_once '../../database/conexion.php';

$flag_edad = null;

//HACIENDO CONSULTA DE ACUERDO AL CAMPO EDAD

/*********BUSQUEDA DE UNA SOLA EDAD*********/	
if(strlen($_POST['buscar_edad']) <= 2 and strlen($_POST['buscar_edad']) >= 1){

	$sql_leer = 'SELECT p.id_pac, p.nombre_comp_pac, p.edad_pac, p.fecha_nac_pac, p.labor_pac, p.diagnostico_pac, p.grupo_disponible_pac, n.dir_nuc, n.no_nuc, g.genero, ne.nivel, ne.id_ne, np.id_nuc FROM paciente p LEFT JOIN nucleo_pac np ON p.id_pac = np.id_pac LEFT JOIN nucleo n ON np.id_nuc = n.id_nuc LEFT JOIN genero g ON p.sexo = g.id_gen LEFT JOIN nivel_educacional ne ON p.nivel_educacional = ne.id_ne WHERE p.edad_pac = (?)';
	$gsent = $pdo->prepare($sql_leer);
	$gsent->execute(array($_POST['buscar_edad']));
	$resultado = $gsent->fetchAll();

} else if(strlen($_POST['buscar_edad']) >= 3){  /********BUSQUEDA ENTRE 2 EDADES********/
	$edades = explode("-", $_POST['buscar_edad']);

	$sql_leer = 'SELECT p.id_pac, p.nombre_comp_pac, p.edad_pac, p.fecha_nac_pac, p.labor_pac, p.diagnostico_pac, p.grupo_disponible_pac, n.dir_nuc, n.no_nuc, g.genero, ne.nivel, ne.id_ne, np.id_nuc FROM paciente p LEFT JOIN nucleo_pac np ON p.id_pac = np.id_pac LEFT JOIN nucleo n ON np.id_nuc = n.id_nuc LEFT JOIN genero g ON p.sexo = g.id_gen LEFT JOIN nivel_educacional ne ON p.nivel_educacional = ne.id_ne WHERE p.edad_pac BETWEEN ? AND ? ORDER BY p.edad_pac';
	$gsent = $pdo->prepare($sql_leer);
	$gsent->execute(array($edades[0],$edades[1]));
	$resultado = $gsent->fetchAll();
} else {   /*********NO SE UTILIZÓ EL CAMPO EDAD*********/
	$sql_leer = 'SELECT p.id_pac, p.nombre_comp_pac, p.edad_pac, p.fecha_nac_pac, p.labor_pac, p.diagnostico_pac, p.grupo_disponible_pac, n.dir_nuc, n.no_nuc, g.genero, ne.nivel, ne.id_ne, np.id_nuc FROM paciente p LEFT JOIN nucleo_pac np ON p.id_pac = np.id_pac LEFT JOIN nucleo n ON np.id_nuc = n.id_nuc LEFT JOIN genero g ON p.sexo = g.id_gen LEFT JOIN nivel_educacional ne ON p.nivel_educacional = ne.id_ne ORDER BY p.edad_pac';
	$gsent = $pdo->prepare($sql_leer);
	$gsent->execute();
	$resultado = $gsent->fetchAll();
}
// echo "Resultado de consulta<br>";
// var_dump($resultado);

/**GUARDANDO TODOS LOS CAMPOS DE BUSQUEDA */
$buscar_nombre = $_POST['buscar_nombre'];
$buscar_sexo = $_POST['buscar_sexo'];
$buscar_grupo = $_POST['buscar_grupo'];
$buscar_direccion = $_POST['buscar_direccion'];
$buscar_n_educacional = $_POST['buscar_n_educacional'];
$buscar_manzana = $_POST['buscar_manzana'];
$buscar_diagnostico = $_POST['buscar_diagnostico'];
$buscar_labor = $_POST['buscar_labor'];

//CREANDO ARRAY PARA GUARDAR LOS CAMPOS
$buscado = array();

/** COMPROBANDO QUE CAMPOS SE ESTAN BUSCANDO **/
if ($_POST['buscar_nombre'] != '') {
    array_push($buscado, $_POST['buscar_nombre'], '1');
}

if ($_POST['buscar_sexo'] != '') {
     array_push($buscado, $_POST['buscar_sexo'], '2');
}

if ($_POST['buscar_grupo'] != '0') {
    array_push($buscado, $_POST['buscar_grupo'], '3');
}

if ($_POST['buscar_direccion'] != '') {
    array_push($buscado, $_POST['buscar_direccion'], '4');
}

if ($_POST['buscar_n_educacional'] != '0') {
    array_push($buscado, $_POST['buscar_n_educacional'], '6');
}

if($_POST['buscar_labor'] != ''){
	array_push($buscado, $_POST['buscar_labor'], '7');
}

if ($_POST['buscar_manzana'] != '') {
    array_push($buscado, $_POST['buscar_manzana'], '8');
}

if ($_POST['buscar_diagnostico'] != '') {
    array_push($buscado, $_POST['buscar_diagnostico'], '9');
}

if ($_POST['buscar_edad'] != '') {
    $flag_edad = true;
}

echo "Buscado<br>";
var_dump($buscado);

/**COMPROBANDO SI SOLO SE BUSCA EN EL CAMPO EDAD */
if ($flag_edad == true and empty($buscado)) {
    $ids_final = array();

	/**GUARDAR A TODOS LOS DEVUELTO POR LA CONSULTA EN EL ARREGLO DE $ids_final */
    foreach ($resultado as $fila) {
        array_push($ids_final, $fila['id_pac']);
    }
    
} else if(empty($buscado)){
    		// header('location:index.php');
		} else {

			//GUARDANDO LOS ID DE LAS FILAS QUE COINCIDEN CON LOS RESULTADOS DE BUSQUEDAS   
			$ids = array();

			foreach ($resultado as $fila) {
				/**REALIZO BUSQUEDA Y GUARDO EL ID DEL QUE COINCIDA EN $ids
				 * BUSCA EN UN MISMO PACIENTE LOS CAMPOS QUE LE COINCIDEN
				 */
				for ($i=0; $i <= count($buscado)/2; $i+=2) { 
					$index = stristr($fila[$buscado[$i+1]], $buscado[$i]);
					if($index){
						array_push($ids,$fila[0]);
					}
				}
			}
			// var_dump($ids);

			$ids_final = array();
			/**BUSCO CUALES ID SE REPITEN LA MISMA CANTIDAD DE VECES QUE LOS CAMPOS BUSCADOS
			 * QUE POR LO TANTO SON LOS RESULTADOS FINALES
			 * Y LOS GUARDO EN $ids_final
			 */
			for ($i=0; $i < count($ids); $i++) { 
				
				$conteo = 1;
				
				for($j=$i+1; $j < count($ids); $j++){
					if($ids[$i] == $ids[$j]){
						$conteo++;
					}
				}

				if($conteo == count($buscado)/2){
					array_push($ids_final,$ids[$i]);
				}
				
			}
}
echo "Ids final<br>";
var_dump($ids_final);
echo json_encode($ids_final);

//HACIENDO UNA ULTIMA CONSULTA DE LOS IDS RESULTANTES DE LA BUSQUEDA

// <?php

$sentencia_leer = null;
$sentencia_leer_resultado = null;
$pdo = null;

?>
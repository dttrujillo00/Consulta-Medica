<?php 
	// INSTANCIANDO LA CONEXION 
	require_once('../../database/conexion.php');

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
        $statement = $pdo->prepare('SELECT * FROM nucleo WHERE dir_nuc=? and no_nuc=?');
        $statement->execute(array($direccion, $manzana));
        $tabla_nucleo=$statement->fetch();        
        if($tabla_nucleo==null){          
    		$statement = $pdo->prepare('INSERT INTO nucleo (dir_nuc, no_nuc) VALUES (?,?)');
    		$statement->execute(array($direccion, $manzana));
    		$id_nuc = $pdo->lastInsertId();			
            $statement = $pdo->prepare('INSERT INTO cond_estr_viv (id_nuc, id_cal) VALUES (?, ?)');
            $statement->execute(array($id_nuc, $id_condViv));	
            $statement = $pdo->prepare('INSERT INTO indic_hac (id_nuc, id_cal) VALUES (?, ?)');
            $statement->execute(array($id_nuc, $id_indiceHac));	
            $statement = $pdo->prepare('INSERT INTO eq_dom_bas (id_nuc, id_cal) VALUES (?, ?)');
            $statement->execute(array($id_nuc, $id_equipBas));	
            $statement = $pdo->prepare('INSERT INTO satis_ingreso_nucleo (id_nuc, id_si) VALUES (?, ?)');
            $statement->execute(array($id_nuc, $id_satisFam));	
            $statement = $pdo->prepare('INSERT INTO funcionalidad_nucleo (id_nuc, id_func) VALUES (?, ?)');
            $statement->execute(array($id_nuc, $id_funcFam));	
            $statement = $pdo->prepare('INSERT INTO eq_dom_bas (id_nuc, id_eval) VALUES (?, ?)');
            $statement->execute(array($id_nuc, $id_evalFam));	
            
    		// $respuesta = 'Correcto';
    		$respuesta = array(
                'respuesta' => 'Correcto',
    			'datos' => array(
    				'id_insertado' => $id_nuc
                    )
                );

        }
        else{
            $id_nuc = $tabla_nucleo["id_nuc"];
            
            $statement = $pdo->prepare('SELECT * FROM cond_estr_viv WHERE id_nuc=?');
            $statement->execute(array($id_nuc));
            $tabla_cond_estr_viv=$statement->fetch();        
            if($tabla_cond_estr_viv==null){ 
                $statement = $pdo->prepare('INSERT INTO cond_estr_viv (id_pac, id_cal) VALUES (?, ?)');        
                $statement->execute(array($id_nuc, $id_condViv));	
            }else{
                $statement = $pdo->prepare('UPDATE cond_estr_viv SET id_cal=? WHERE id_nuc=?');
                $statement->execute(array($id_condViv, $id_nuc));		
            }

            $statement = $pdo->prepare('SELECT * FROM indic_hac WHERE id_nuc=?');
            $statement->execute(array($id_nuc));
            $tabla_indic_hac=$statement->fetch();      
            if($tabla_indic_hac==null){ 
            $statement = $pdo->prepare('INSERT INTO indic_hac (id_pac, id_cal) VALUES (?, ?)');
            $statement->execute(array($id_nuc, $id_indiceHac));	
            }else{
                $statement = $pdo->prepare('UPDATE indic_hac SET id_cal=? WHERE id_nuc=?');
                $statement->execute(array($id_indiceHac, $id_nuc));		
            }

            $statement = $pdo->prepare('SELECT * FROM eq_dom_bas WHERE id_nuc=?');
            $statement->execute(array($id_nuc));
            $tabla_eq_dom_bas=$statement->fetch();      
            if($tabla_eq_dom_bas==null){ 
                $statement = $pdo->prepare('INSERT INTO eq_dom_bas (id_pac, id_cal) VALUES (?, ?)');
                $statement->execute(array($id_nuc, $id_equipBas));	
            }else{
                $statement = $pdo->prepare('UPDATE eq_dom_bas SET id_cal=? WHERE id_nuc=?');
                $statement->execute(array($id_equipBas, $id_nuc));	
            }

            $statement = $pdo->prepare('SELECT * FROM satis_ingreso_nucleo WHERE id_nuc=?');
            $statement->execute(array($id_nuc));
            $tabla_satis_ingreso_nucleo=$statement->fetch();      
            if($tabla_satis_ingreso_nucleo==null){ 
                $statement = $pdo->prepare('INSERT INTO satis_ingreso_nucleo (id_nuc, id_si) VALUES (?, ?)');
                $statement->execute(array($id_nuc, $id_satisFam));	
            }else{
                $statement = $pdo->prepare('UPDATE eq_dom_bas SET id_si=? WHERE id_nuc=?');
                $statement->execute(array($id_nuc, $id_satisFam));
            }

            $statement = $pdo->prepare('SELECT * FROM funcionalidad_nucleo WHERE id_nuc=?');
            $statement->execute(array($id_nuc));
            $tabla_funcionalidad_nucleo=$statement->fetch();      
            if($tabla_funcionalidad_nucleo==null){ 
                $statement = $pdo->prepare('INSERT INTO funcionalidad_nucleo (id_nuc, id_func) VALUES (?, ?)');
                $statement->execute(array($id_nuc, $id_funcFam));	
            }else{
                $statement = $pdo->prepare('UPDATE funcionalidad_nucleo SET id_func=? WHERE id_nuc=?');
                $statement->execute(array($id_nuc, $id_funcFam));
            }

            $statement = $pdo->prepare('SELECT * FROM eq_dom_bas WHERE id_nuc=?');
            $statement->execute(array($id_nuc));
            $tabla_eq_dom_bas=$statement->fetch();      
            if($tabla_eq_dom_bas==null){ 
                $statement = $pdo->prepare('INSERT INTO eq_dom_bas (id_nuc, id_eval) VALUES (?, ?)');
                $statement->execute(array($id_nuc, $id_evalFam));	
            }else{
                $statement = $pdo->prepare('UPDATE eq_dom_bas SET id_eval=? WHERE id_nuc=?');
                $statement->execute(array($id_nuc, $id_evalFam));
            }

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
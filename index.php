<?php 
// include 'database/conexion.php' ;
// INSTANCIANDO LA CONEXION 
	require_once('database/conexion.php');

    
    $statement = $pdo->prepare('SELECT p.id_pac, p.nombre_comp_pac, p.edad_pac, p.fecha_nac_pac, p.labor_pac, p.diagnostico_pac, p.grupo_disponible_pac, n.dir_nuc, n.no_nuc, g.genero, ne.nivel FROM paciente p INNER JOIN nucleo_pac np ON p.id_pac = np.id_pac INNER JOIN nucleo n ON np.id_nuc = n.id_nuc INNER JOIN sexo s ON p.id_pac = s.pac INNER JOIN genero g ON s.gen = g.id_gen INNER JOIN nivel_educacional_paciente nep ON p.id_pac = nep.id_pac INNER JOIN nivel_educacional ne ON nep.id_ne = ne.id_ne');
    $statement->execute();		
    $result = $statement->fetchAll();
	?>		
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="rgb(6, 152, 87)">
    
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/elegant-icons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <title>Mi Consulta</title>
</head>
<body>

	<div class="scroll-up">
		<i class="fa fa-arrow-up"></i>
	</div>

	<section class="panel-de-notificaciones">

		<div class="header-panel-notificaciones">
			<h2>Notificaciones</h2>
			<i class="fa fa-close cerrar-panel"></i>
		</div>

		<div class="body-panel-notificaciones">
			<div class="consultas">
				<h3>Consultas este Mes</h3>
				<ul class="listado">
					<li>
						<p>Daniel Alberto Tamayo Trujillo</p>
						<div class="iconos">
							<i class="fa fa-check"></i>
							<i class="fa fa-close"></i>
						</div>
						
					</li>
					<li>
						<p>Daniel Alberto Tamayo Trujillo</p>
						<div class="iconos">
							<i class="fa fa-check"></i>
							<i class="fa fa-close"></i>
						</div>
					</li>
					<li>
						<p>Daniel Alberto Tamayo Trujillo</p>
						<div class="iconos">
							<i class="fa fa-check"></i>
							<i class="fa fa-close"></i>
						</div>
					</li>
					<li>
						<p>Daniel Alberto Tamayo Trujillo</p>
						<div class="iconos">
							<i class="fa fa-check"></i>
							<i class="fa fa-close"></i>
						</div>
					</li>
					<li>
						<p>Daniel Alberto Tamayo Trujillo</p>
						<div class="iconos">
							<i class="fa fa-check"></i>
							<i class="fa fa-close"></i>
						</div>
						
					</li>
					<li>
						<p>Daniel Alberto Tamayo Trujillo</p>
						<div class="iconos">
							<i class="fa fa-check"></i>
							<i class="fa fa-close"></i>
						</div>
						
					</li>
				</ul>
			</div>
			<div class="terrenos">
				<h3>Terrenos este Mes</h3>
				<ul class="listado">
					<li>
						<p>Daniel Alberto Tamayo Trujillo</p>
						<div class="iconos">
							<i class="fa fa-check"></i>
							<i class="fa fa-close"></i>
						</div>
					</li>
					<li>
						<p>Daniel Alberto Tamayo Trujillo</p>
						<div class="iconos">
							<i class="fa fa-check"></i>
							<i class="fa fa-close"></i>
						</div>
					</li>
					<li>
						<p>Daniel Alberto Tamayo Trujillo</p>
						<div class="iconos">
							<i class="fa fa-check"></i>
							<i class="fa fa-close"></i>
						</div>
					</li>
					<li>
						<p>Daniel Alberto Tamayo Trujillo</p>
						<div class="iconos">
							<i class="fa fa-check"></i>
							<i class="fa fa-close"></i>
						</div>
					</li>
					<li>
						<p>Daniel Alberto Tamayo Trujillo</p>
						<div class="iconos">
							<i class="fa fa-check"></i>
							<i class="fa fa-close"></i>
						</div>
						
					</li>
					<li>
						<p>Daniel Alberto Tamayo Trujillo</p>
						<div class="iconos">
							<i class="fa fa-check"></i>
							<i class="fa fa-close"></i>
						</div>
						
					</li>
				</ul>
			</div>
		</div>

	</section>

    <header>
        <div class="contenido-header container">
            <div class="logo">
            	<a href="#"><h1>Mi Consulta</h1></a>
            </div>
            
            <nav class="nav-botones-header">
                <ul>
                    <li><i class="fa fa-search"></i></li>
                    <li><i class="fa fa-bell campana"></i></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="imagen-fondo">

	    <article class="sub-header container">
	        <div class="contenido-sub-header">

				<ul>
					<li class="active"><a href="#" class="fa fa-user"></a></li>
					<li><a href="pages/nucleos.php" class="fa fa-home"></a></li>
					<li><a href="pages/graficos.php" class="fa fa-calendar-o"> C/T</a></li>
				</ul>

	        </div>
	    </article>

	    
	    	<div class="btn-desplegable container">
				<p>Colapsar</p>
			</div>
			<div class="body-desplegable container">
				<?php if(!$_GET): ?>
				<form class="form-agregar">

					<h2 class="col-md-12">Agregar Paciente</h2>

					<div class="campo-container col-md-8">
						<label for="nombre_apellido">Nombre completo:</label>
						<input required="" type="text" id="nombre_apellido">
					</div>

					<div class="campo-container col-md-4">
						<label for="fecha_nacimiento">Fecha de nacimiento</label>
						<input required="" type="date" id="fecha_nacimiento">
					</div>

					<div class="campo-container col-md-8">
						<label for="direccion">Dirección</label>
						<input required="" type="text" id="direccion">
					</div>

					<div class="campo-container col-md-4">
						<label>Nivel Educacional</label>
						<select id="nivel_educacional">
							<option value="1">Primaria</option>
							<option value="2">Secundaria</option>
							<option value="3">Preuniversitario</option>
							<option value="4">Obrero calificado</option>
							<option value="5">Técnico medio</option>
							<option value="6">Técnico medio superior</option>
							<option value="7">Nivel superior</option>
						</select>
					</div>

					<div class="campo-container col-md-8">
						<label for="diagnostico">Diagnóstico</label>
						<input id="diagnostico" type="text">
					</div>

					<div class="campo-container col-md-2">
						<label for="manzana">Manzana</label>
						<input required="" type="text" id="manzana">
					</div>

					<div class="campo-container col-md-2">
						<label>Grupo Disp.</label>
						<select id="grupo_disp">
								<option value="1">I</option>
								<option value="2">II</option>
								<option value="3">III</option>
								<option value="4">IV</option>
						</select>
					</div>

					<div class="campo-container col-md-8">
						<label for="labor">Ocupación</label>
						<input id="labor" type="text">
					</div>

					<div class="col-md-4">
						<div class="flex">
							<div class="radio-container">
								<label for="hombre">Masculino</label>
								<input type="radio" name="sexo" id="hombre">
							</div>
							<div class="radio-container">
								<label for="mujer">Femenino</label>
								<input type="radio" name="sexo" id="mujer">
							</div>		
						</div>	
					</div>

					<div class="div-button col-md-4">
						<button class="btn btn-guardar" id="btn_guardar">Guardar</button>
					</div>

				</form>	
				<?php endif ?>

				<?php if($_GET): ?>
				<form class="form-agregar editar">

					<h2 class="col-md-12">Editar Paciente</h2>

					<div class="campo-container col-md-8">
						<label for="nombre_apellido">Nombre completo:</label>
						<input required="" type="text" id="nombre_apellido">
					</div>

					<div class="campo-container col-md-4">
						<label for="fecha_nacimiento">Fecha de nacimiento</label>
						<input required="" type="date" id="fecha_nacimiento">
					</div>

					<div class="campo-container col-md-8">
						<label for="direccion">Dirección</label>
						<input required="" type="text" id="direccion">
					</div>

					<div class="campo-container col-md-4">
						<label>Nivel Educacional</label>
						<select id="nivel_educacional">
							<option value="1">Primaria</option>
							<option value="2">Secundaria</option>
							<option value="3">Preuniversitario</option>
							<option value="4">Obrero calificado</option>
							<option value="5">Técnico medio</option>
							<option value="6">Técnico medio superior</option>
							<option value="7">Nivel superior</option>
						</select>
					</div>

					<div class="campo-container col-md-8">
						<label for="diagnostico">Diagnóstico</label>
						<input id="diagnostico" type="text">
					</div>

					<div class="campo-container col-md-2">
						<label for="manzana">Manzana</label>
						<input required="" type="text" id="manzana">
					</div>

					<div class="campo-container col-md-2">
						<label>Grupo Disp.</label>
						<select id="grupo_disp">
								<option value="1">I</option>
								<option value="2">II</option>
								<option value="3">III</option>
								<option value="4">IV</option>
						</select>
					</div>

					<div class="campo-container col-md-8">
						<label for="labor">Ocupación</label>
						<input id="labor" type="text">
					</div>

					<div class="col-md-4">
						<div class="flex">
							<div class="radio-container">
								<label for="hombre">Masculino</label>
								<input type="radio" name="sexo" id="hombre">
							</div>
							<div class="radio-container">
								<label for="mujer">Femenino</label>
								<input type="radio" name="sexo" id="mujer">
							</div>		
						</div>	
					</div>

					<div class="div-button col-md-4">
						<button class="btn btn-guardar" id="btn_guardar">Guardar</button>
					</div>

				</form>
				<?php endif ?>
			</div>

    </div>


    <main>
	    <article>

		            <section class="vista-pacientes container">
		            	<div class="encabezado-vista">
							<h2>Pacientes</h2>
		            	</div>
		                <table class="table">
		                    <thead>
		                        <tr>
		                            <th>Nombre</th>
									<th>Sexo</th>
									<th>Grupo</th>
									<th>Dirección</th>
									<th>Edad</th>
									<th>Nivel</th>
									<th>Ocupación</th>
									<th>Manzana</th>
									<th>Diagnóstico</th>
									<th></th>
									<th></th>
		                        </tr>
		                    </thead>
		                    <tbody>
								<?php foreach($result as $dato): ?>
		                        <tr class="grupo<?php echo($dato['grupo_disponible_pac']) ?>">
		                            <td><?php echo $dato['nombre_comp_pac'] ?></td>
									<td><?php echo $dato['genero'] ?></td>
									<td>
										<?php
										 	switch ($dato['grupo_disponible_pac']) {
										 		case 1:
										 			echo "I";
										 			break;
										 		case 2:
										 			echo "II";
										 			break;
										 		case 3:
										 			echo "III";
										 			break;
										 		case 4:
										 			echo "IV";
										 			break;
										 		
										 		default:
										 			echo "undefined";
										 			break;
										 	} 
										?>
									 </td>
									<td><?php echo $dato['dir_nuc'] ?></td>
									<td><?php echo $dato['edad_pac'] ?></td>
									<td><?php echo $dato['nivel'] ?></td>
									<td><?php echo $dato['labor_pac'] ?></td>
									<td><?php echo $dato['no_nuc'] ?></td>
									<td><?php echo $dato['diagnostico_pac'] ?></td>
									<td>
										<span class="icono-editar">
											<a href="index.php?id=<?php echo $dato['id_pac'] ?>" >
												<i class="fa fa-pencil"></i>
											</a>
										</span>
									</td>
									<td>
										<span class="icono-eliminar" data-id="<?php echo $dato['id_pac'] ?>">
											<i class="fa fa-trash-o"></i>
										</span>
									</td>
		                        </tr>
								<?php endforeach ?>
		                    </tbody>
						</table>
						
						<div class="tabla-responsive">
							<div class="fila-paciente">
								<div class="campo">
									<h4>Nombre:</h4>
									<p>Daniel Alberto Tamayo Trujillo</p>
									<span class="fa fa-caret-down"></span>
								</div>
								<div class="campo">
									<h4>Sexo:</h4>
									<p>M</p>
								</div>
								<div class="campo">
									<h4>Dirección:</h4>
									<p>67 #13613 % 136 y 138</p>
								</div>
								<div class="campo">
									<h4>Edad:</h4>
									<p>21</p>
								</div>
								<div class="campo">
									<h4>Nivel:</h4>
									<p>Preuniversitario</p>
								</div>
								<div class="campo">
									<h4>Manzana:</h4>
									<p>100</p>
								</div>
								<div class="campo">
									<h4>Diagnóstico:</h4>
									<p>Sano</p>
								</div>
								<div class="campo">
									<h4>Acciones:</h4>
									<div class="acciones">
										<span class="fa fa-pencil"></span>
										<span class="fa fa-trash-o"></span>
									</div>
								</div>
							</div>
							<div class="fila-paciente">
								<div class="campo">
									<h4>Nombre:</h4>
									<p>Daniel Alberto Tamayo Trujillo</p>
									<span class="fa fa-caret-down"></span>
								</div>
								<div class="campo">
									<h4>Sexo:</h4>
									<p>M</p>
								</div>
								<div class="campo">
									<h4>Dirección:</h4>
									<p>67 #13613 % 136 y 138</p>
								</div>
								<div class="campo">
									<h4>Edad:</h4>
									<p>21</p>
								</div>
								<div class="campo">
									<h4>Nivel:</h4>
									<p>Preuniversitario</p>
								</div>
								<div class="campo">
									<h4>Manzana:</h4>
									<p>100</p>
								</div>
								<div class="campo">
									<h4>Diagnóstico:</h4>
									<p>Sano</p>
								</div>
								<div class="campo">
									<h4>Acciones:</h4>
									<div class="acciones">
										<span class="fa fa-pencil"></span>
										<span class="fa fa-trash-o"></span>
									</div>
								</div>
							</div>
							<div class="fila-paciente">
								<div class="campo">
									<h4>Nombre:</h4>
									<p>Daniel Alberto Tamayo Trujillo</p>
									<span class="fa fa-caret-down"></span>
								</div>
								<div class="campo">
									<h4>Sexo:</h4>
									<p>M</p>
								</div>
								<div class="campo">
									<h4>Dirección:</h4>
									<p>67 #13613 % 136 y 138</p>
								</div>
								<div class="campo">
									<h4>Edad:</h4>
									<p>21</p>
								</div>
								<div class="campo">
									<h4>Nivel:</h4>
									<p>Preuniversitario</p>
								</div>
								<div class="campo">
									<h4>Manzana:</h4>
									<p>100</p>
								</div>
								<div class="campo">
									<h4>Diagnóstico:</h4>
									<p>Sano</p>
								</div>
								<div class="campo">
									<h4>Acciones:</h4>
									<div class="acciones">
										<span class="fa fa-pencil"></span>
										<span class="fa fa-trash-o"></span>
									</div>
								</div>
							</div>
							<div class="fila-paciente">
								<div class="campo">
									<h4>Nombre:</h4>
									<p>Daniel Alberto Tamayo Trujillo</p>
									<span class="fa fa-caret-down"></span>
								</div>
								<div class="campo">
									<h4>Sexo:</h4>
									<p>M</p>
								</div>
								<div class="campo">
									<h4>Dirección:</h4>
									<p>67 #13613 % 136 y 138</p>
								</div>
								<div class="campo">
									<h4>Edad:</h4>
									<p>21</p>
								</div>
								<div class="campo">
									<h4>Nivel:</h4>
									<p>Preuniversitario</p>
								</div>
								<div class="campo">
									<h4>Manzana:</h4>
									<p>100</p>
								</div>
								<div class="campo">
									<h4>Diagnóstico:</h4>
									<p>Sano</p>
								</div>
								<div class="campo">
									<h4>Acciones:</h4>
									<div class="acciones">
										<span class="fa fa-pencil"></span>
										<span class="fa fa-trash-o"></span>
									</div>
								</div>
							</div>
							<div class="fila-paciente">
								<div class="campo">
									<h4>Nombre:</h4>
									<p>Daniel Alberto Tamayo Trujillo</p>
									<span class="fa fa-caret-down"></span>
								</div>
								<div class="campo">
									<h4>Sexo:</h4>
									<p>M</p>
								</div>
								<div class="campo">
									<h4>Dirección:</h4>
									<p>67 #13613 % 136 y 138</p>
								</div>
								<div class="campo">
									<h4>Edad:</h4>
									<p>21</p>
								</div>
								<div class="campo">
									<h4>Nivel:</h4>
									<p>Preuniversitario</p>
								</div>
								<div class="campo">
									<h4>Manzana:</h4>
									<p>100</p>
								</div>
								<div class="campo">
									<h4>Diagnóstico:</h4>
									<p>Sano</p>
								</div>
								<div class="campo">
									<h4>Acciones:</h4>
									<div class="acciones">
										<span class="fa fa-pencil"></span>
										<span class="fa fa-trash-o"></span>
									</div>
								</div>
							</div>
							<div class="fila-paciente">
								<div class="campo">
									<h4>Nombre:</h4>
									<p>Daniel Alberto Tamayo Trujillo</p>
									<span class="fa fa-caret-down"></span>
								</div>
								<div class="campo">
									<h4>Sexo:</h4>
									<p>M</p>
								</div>
								<div class="campo">
									<h4>Dirección:</h4>
									<p>67 #13613 % 136 y 138</p>
								</div>
								<div class="campo">
									<h4>Edad:</h4>
									<p>21</p>
								</div>
								<div class="campo">
									<h4>Nivel:</h4>
									<p>Preuniversitario</p>
								</div>
								<div class="campo">
									<h4>Manzana:</h4>
									<p>100</p>
								</div>
								<div class="campo">
									<h4>Diagnóstico:</h4>
									<p>Sano</p>
								</div>
								<div class="campo">
									<h4>Acciones:</h4>
									<div class="acciones">
										<span class="fa fa-pencil"></span>
										<span class="fa fa-trash-o"></span>
									</div>
								</div>
							</div>
							<div class="fila-paciente">
								<div class="campo">
									<h4>Nombre:</h4>
									<p>Daniel Alberto Tamayo Trujillo</p>
									<span class="fa fa-caret-down"></span>
								</div>
								<div class="campo">
									<h4>Sexo:</h4>
									<p>M</p>
								</div>
								<div class="campo">
									<h4>Dirección:</h4>
									<p>67 #13613 % 136 y 138</p>
								</div>
								<div class="campo">
									<h4>Edad:</h4>
									<p>21</p>
								</div>
								<div class="campo">
									<h4>Nivel:</h4>
									<p>Preuniversitario</p>
								</div>
								<div class="campo">
									<h4>Manzana:</h4>
									<p>100</p>
								</div>
								<div class="campo">
									<h4>Diagnóstico:</h4>
									<p>Sano</p>
								</div>
								<div class="campo">
									<h4>Acciones:</h4>
									<div class="acciones">
										<span class="fa fa-pencil"></span>
										<span class="fa fa-trash-o"></span>
									</div>
								</div>
							</div>
							<div class="fila-paciente">
								<div class="campo">
									<h4>Nombre:</h4>
									<p>Daniel Alberto Tamayo Trujillo</p>
									<span class="fa fa-caret-down"></span>
								</div>
								<div class="campo">
									<h4>Sexo:</h4>
									<p>M</p>
								</div>
								<div class="campo">
									<h4>Dirección:</h4>
									<p>67 #13613 % 136 y 138</p>
								</div>
								<div class="campo">
									<h4>Edad:</h4>
									<p>21</p>
								</div>
								<div class="campo">
									<h4>Nivel:</h4>
									<p>Preuniversitario</p>
								</div>
								<div class="campo">
									<h4>Manzana:</h4>
									<p>100</p>
								</div>
								<div class="campo">
									<h4>Diagnóstico:</h4>
									<p>Sano</p>
								</div>
								<div class="campo">
									<h4>Acciones:</h4>
									<div class="acciones">
										<span class="fa fa-pencil"></span>
										<span class="fa fa-trash-o"></span>
									</div>
								</div>
							</div>
							<div class="fila-paciente">
								<div class="campo">
									<h4>Nombre:</h4>
									<p>Daniel Alberto Tamayo Trujillo</p>
									<span class="fa fa-caret-down"></span>
								</div>
								<div class="campo">
									<h4>Sexo:</h4>
									<p>M</p>
								</div>
								<div class="campo">
									<h4>Dirección:</h4>
									<p>67 #13613 % 136 y 138</p>
								</div>
								<div class="campo">
									<h4>Edad:</h4>
									<p>21</p>
								</div>
								<div class="campo">
									<h4>Nivel:</h4>
									<p>Preuniversitario</p>
								</div>
								<div class="campo">
									<h4>Manzana:</h4>
									<p>100</p>
								</div>
								<div class="campo">
									<h4>Diagnóstico:</h4>
									<p>Sano</p>
								</div>
								<div class="campo">
									<h4>Acciones:</h4>
									<div class="acciones">
										<span class="fa fa-pencil"></span>
										<span class="fa fa-trash-o"></span>
									</div>
								</div>
							</div>
						</div>
					</section>

		</article>
	</main>
    

    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script src="js/script.js"></script>
	<script src="js/pacientes.js"></script>
    
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="rgb(6, 152, 87)">
    
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/elegant-icons.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">

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
                <a href="../index.php"><h1>Mi Consulta</h1></a>
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
					<li><a href="../index.php" class="fa fa-user"></a></li>
					<li class="active"><a href="#" class="fa fa-home"></a></li>
					<li><a href="./graficos.php" class="fa fa-calendar-o"> C/T</a></li>
				</ul>

	        </div>
	    </article>

	    <div class="btn-desplegable container">
			<p>Colapsar</p>
		</div>
		<div class="body-desplegable container">
				<form class="form-agregar">

					<h2 class="col-md-12">Agregar Núcleo</h2>

					<input  placeholder="Dirección..." type="text" name="direccion" id="direccion-nucleo">

					<div class="contenedor-select-nucleo">
						<h4>Condiciones de la Vivienda</h4>

						<div class="flex">
							<div class="radio-container">
								<label for="clasif-B-1">Bien</label>
								<input type="radio" name="clasif-condiciones" id="clasif-B-1">
							</div>
							<div class="radio-container">
								<label for="clasif-R-1">Regular</label>
								<input type="radio" name="clasif-condiciones" id="clasif-R-1">
							</div>
							<div class="radio-container">
								<label for="clasif-M-1">Mal</label>
								<input type="radio" name="clasif-condiciones" id="clasif-M-1">
							</div>		
						</div>
					</div>

					<div class="contenedor-select-nucleo">
						<h4>Indice de Hacinamiento</h4>

						<div class="flex">
							<div class="radio-container">
								<label for="clasif-B-2">Bien</label>
								<input type="radio" name="clasif-indice" id="clasif-B-2">
							</div>
							<div class="radio-container">
								<label for="clasif-R-2">Regular</label>
								<input type="radio" name="clasif-indice" id="clasif-R-2">
							</div>
							<div class="radio-container">
								<label for="clasif-M-2">Mal</label>
								<input type="radio" name="clasif-indice" id="clasif-M-2">
							</div>		
						</div>

					</div>

					<div class="contenedor-select-nucleo height-static-1">
						<h4>Equipamiento Doméstico Básico</h4>

						<div class="flex">
							<div class="radio-container">
								<label for="clasif-B-3">Bien</label>
								<input type="radio" name="clasif-equipamiento" id="clasif-B-3">
							</div>
							<div class="radio-container">
								<label for="clasif-R-3">Regular</label>
								<input type="radio" name="clasif-equipamiento" id="clasif-R-3">
							</div>
							<div class="radio-container">
								<label for="clasif-M-3">Mal</label>
								<input type="radio" name="clasif-equipamiento" id="clasif-M-3">
							</div>		
						</div>
					</div>

					<div class="contenedor-select-nucleo">
						<h4>Satisfacción de la Familia con los Ingresos</h4>

						<div class="flex">
							<div class="radio-container">
								<label for="clasif-satisfaccion-1">Satisfechos</label>
								<input type="radio" name="clasif-satisfaccion" id="clasif-satisfaccion-1">
							</div>
							<div class="radio-container">
								<label for="clasif-satisfaccion-2">M/Satisfechos</label>
								<input type="radio" name="clasif-satisfaccion" id="clasif-satisfaccion-2">
							</div>
							<div class="radio-container">
								<label for="clasif-satisfaccion-3">Insatisfechos</label>
								<input type="radio" name="clasif-satisfaccion" id="clasif-satisfaccion-3">
							</div>		
						</div>
					</div>

					<div class="contenedor-select-nucleo height-static">
						<h4>Funcionamiento Familiar</h4>

						<div class="flex">
							<div class="radio-container">
								<label for="clasif-funcionamiento-1">Funcional</label>
								<input type="radio" name="clasif-funcionamiento" id="clasif-funcionamiento-1">
							</div>
							<div class="radio-container">
								<label for="clasif-funcionamiento-2">Riesgo de Disfunc.</label>
								<input type="radio" name="clasif-funcionamiento" id="clasif-funcionamiento-2">
							</div>
							<div class="radio-container">
								<label for="clasif-funcionamiento-3">Disfuncional</label>
								<input type="radio" name="clasif-funcionamiento" id="clasif-funcionamiento-3">
							</div>		
						</div>
					</div>

					<div class="contenedor-select-nucleo">
						<h4>Evaluación Familiar</h4>

						<div class="flex">
							<div class="radio-container col-6">
								<label for="clasif-evaluacion-1">Sin Problemas</label>
								<input type="radio" name="clasif-evaluacion" id="clasif-evaluacion-1">
							</div>
							<div class="radio-container col-6">
								<label for="clasif-evaluacion-2">Con Problemas de Salud</label>
								<input type="radio" name="clasif-evaluacion" id="clasif-evaluacion-2">
							</div>
							<div class="radio-container col-12">
								<select id="select-evaluacion">
									<option>Dificultades c/ condiciones materiales</option>
									<option>Dificultades c/ la salud de los integrantes</option>
									<option>Dificultades c/ el funcionamiento de la familia</option>
								</select>
							</div>		
						</div>
					</div>

					<div class="div-button-nucleo">
						<button class="btn btn-guardar" id="btn_guardar-nucleo">Guardar</button>
					</div>

				</form>	
		</div>
	</div>

		<main>

			<article class="vista-nucleos container">
				<div class="encabezado-vista">
					<h2>Núcleos</h2>
	            </div>

	            <table class="table">
		        	<thead>
		                <tr>
		                    <th>Dirección</th>
							<th>Cond. Vivienda</th>
							<th>Indice Hacinamiento</th>
							<th>Equip. Dom. Básico</th>
							<th>Satisfacción Ingresos</th>
							<th>Funcionamineto Familiar</th>
							<th>Evaluación Familiar</th>
							<th></th>
							<th></th>
		                </tr>
		            </thead>
		                    <tbody>
		                        <tr data-id="1">
		                            <td>67 #13613 % 136 y 138</td>
									<td>Bien</td>
									<td>Bien</td>
									<td>Bien</td>
									<td>M/Satisfechos</td>
									<td>Funcional</td>
									<td>Sin Problemas</td>
									<td>
										<span class="icono-editar">
											<i class="fa fa-pencil"></i>
										</span>
									</td>
									<td>
										<span class="icono-eliminar">
											<i class="fa fa-trash-o"></i>
										</span>
									</td>
		                        </tr>
		                        <tr data-id="2">
		                            <td>67 #13613 % 136 y 138</td>
									<td>Bien</td>
									<td>Bien</td>
									<td>Bien</td>
									<td>M/Satisfechos</td>
									<td>Funcional</td>
									<td>Sin Problemas</td>
									<td>
										<span class="icono-editar">
											<i class="fa fa-pencil"></i>
										</span>
									</td>
									<td>
										<span class="icono-eliminar">
											<i class="fa fa-trash-o"></i>
										</span>
									</td>
		                        </tr>
		                        <tr data-id="3">
		                            <td>67 #13613 % 136 y 138</td>
									<td>Bien</td>
									<td>Bien</td>
									<td>Bien</td>
									<td>M/Satisfechos</td>
									<td>Funcional</td>
									<td>Sin Problemas</td>
									<td>
										<span class="icono-editar">
											<i class="fa fa-pencil"></i>
										</span>
									</td>
									<td>
										<span class="icono-eliminar">
											<i class="fa fa-trash-o"></i>
										</span>
									</td>
		                        </tr>
		                        <tr data-id="4">
		                            <td>67 #13613 % 136 y 138</td>
									<td>Bien</td>
									<td>Bien</td>
									<td>Bien</td>
									<td>M/Satisfechos</td>
									<td>Funcional</td>
									<td>Sin Problemas</td>
									<td>
										<span class="icono-editar">
											<i class="fa fa-pencil"></i>
										</span>
									</td>
									<td>
										<span class="icono-eliminar">
											<i class="fa fa-trash-o"></i>
										</span>
									</td>
		                        </tr>
		                        <tr data-id="4">
		                            <td>67 #13613 % 136 y 138</td>
									<td>Bien</td>
									<td>Bien</td>
									<td>Bien</td>
									<td>M/Satisfechos</td>
									<td>Funcional</td>
									<td>Sin Problemas</td>
									<td>
										<span class="icono-editar">
											<i class="fa fa-pencil"></i>
										</span>
									</td>
									<td>
										<span class="icono-eliminar">
											<i class="fa fa-trash-o"></i>
										</span>
									</td>
		                        </tr>
		                        <tr data-id="4">
		                            <td>67 #13613 % 136 y 138</td>
									<td>Bien</td>
									<td>Bien</td>
									<td>Bien</td>
									<td>M/Satisfechos</td>
									<td>Funcional</td>
									<td>Sin Problemas</td>
									<td>
										<span class="icono-editar">
											<i class="fa fa-pencil"></i>
										</span>
									</td>
									<td>
										<span class="icono-eliminar">
											<i class="fa fa-trash-o"></i>
										</span>
									</td>
		                        </tr>
		                        
		                    </tbody>
				</table>

				<div class="tabla-responsive">
							<div class="fila-paciente">
								<div class="campo">
									<h4>Dirección:</h4>
									<p>67 #13613 % 136 y 138</p>
									<span class="fa fa-caret-down"></span>
								</div>
								<div class="campo">
									<h4>Condiciones Vivienda:</h4>
									<p>Bien</p>
								</div>
								<div class="campo">
									<h4>Indice de Hacinamiento:</h4>
									<p>Bien</p>
								</div>
								<div class="campo">
									<h4>Equipamiento Doméstico Básico:</h4>
									<p>Bien</p>
								</div>
								<div class="campo">
									<h4>Satisfacción de la Familia c/ Ingresos:</h4>
									<p>M/Satisfechos</p>
								</div>
								<div class="campo">
									<h4>Funcionamiento Familiar:</h4>
									<p>Funcional</p>
								</div>
								<div class="campo">
									<h4>Evaluación Familiar:</h4>
									<p>Sin Problemas</p>
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
									<h4>Dirección:</h4>
									<p>67 #13613 % 136 y 138</p>
									<span class="fa fa-caret-down"></span>
								</div>
								<div class="campo">
									<h4>Condiciones Vivienda:</h4>
									<p>Bien</p>
								</div>
								<div class="campo">
									<h4>Indice de Hacinamiento:</h4>
									<p>Bien</p>
								</div>
								<div class="campo">
									<h4>Equipamiento Doméstico Básico:</h4>
									<p>Bien</p>
								</div>
								<div class="campo">
									<h4>Satisfacción de la Familia c/ Ingresos:</h4>
									<p>M/Satisfechos</p>
								</div>
								<div class="campo">
									<h4>Funcionamiento Familiar:</h4>
									<p>Funcional</p>
								</div>
								<div class="campo">
									<h4>Evaluación Familiar:</h4>
									<p>Sin Problemas</p>
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
									<h4>Dirección:</h4>
									<p>67 #13613 % 136 y 138</p>
									<span class="fa fa-caret-down"></span>
								</div>
								<div class="campo">
									<h4>Condiciones Vivienda:</h4>
									<p>Bien</p>
								</div>
								<div class="campo">
									<h4>Indice de Hacinamiento:</h4>
									<p>Bien</p>
								</div>
								<div class="campo">
									<h4>Equipamiento Doméstico Básico:</h4>
									<p>Bien</p>
								</div>
								<div class="campo">
									<h4>Satisfacción de la Familia c/ Ingresos:</h4>
									<p>M/Satisfechos</p>
								</div>
								<div class="campo">
									<h4>Funcionamiento Familiar:</h4>
									<p>Funcional</p>
								</div>
								<div class="campo">
									<h4>Evaluación Familiar:</h4>
									<p>Sin Problemas</p>
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
									<h4>Dirección:</h4>
									<p>67 #13613 % 136 y 138</p>
									<span class="fa fa-caret-down"></span>
								</div>
								<div class="campo">
									<h4>Condiciones Vivienda:</h4>
									<p>Bien</p>
								</div>
								<div class="campo">
									<h4>Indice de Hacinamiento:</h4>
									<p>Bien</p>
								</div>
								<div class="campo">
									<h4>Equipamiento Doméstico Básico:</h4>
									<p>Bien</p>
								</div>
								<div class="campo">
									<h4>Satisfacción de la Familia c/ Ingresos:</h4>
									<p>M/Satisfechos</p>
								</div>
								<div class="campo">
									<h4>Funcionamiento Familiar:</h4>
									<p>Funcional</p>
								</div>
								<div class="campo">
									<h4>Evaluación Familiar:</h4>
									<p>Sin Problemas</p>
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
									<h4>Dirección:</h4>
									<p>67 #13613 % 136 y 138</p>
									<span class="fa fa-caret-down"></span>
								</div>
								<div class="campo">
									<h4>Condiciones Vivienda:</h4>
									<p>Bien</p>
								</div>
								<div class="campo">
									<h4>Indice de Hacinamiento:</h4>
									<p>Bien</p>
								</div>
								<div class="campo">
									<h4>Equipamiento Doméstico Básico:</h4>
									<p>Bien</p>
								</div>
								<div class="campo">
									<h4>Satisfacción de la Familia c/ Ingresos:</h4>
									<p>M/Satisfechos</p>
								</div>
								<div class="campo">
									<h4>Funcionamiento Familiar:</h4>
									<p>Funcional</p>
								</div>
								<div class="campo">
									<h4>Evaluación Familiar:</h4>
									<p>Sin Problemas</p>
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
									<h4>Dirección:</h4>
									<p>67 #13613 % 136 y 138</p>
									<span class="fa fa-caret-down"></span>
								</div>
								<div class="campo">
									<h4>Condiciones Vivienda:</h4>
									<p>Bien</p>
								</div>
								<div class="campo">
									<h4>Indice de Hacinamiento:</h4>
									<p>Bien</p>
								</div>
								<div class="campo">
									<h4>Equipamiento Doméstico Básico:</h4>
									<p>Bien</p>
								</div>
								<div class="campo">
									<h4>Satisfacción de la Familia c/ Ingresos:</h4>
									<p>M/Satisfechos</p>
								</div>
								<div class="campo">
									<h4>Funcionamiento Familiar:</h4>
									<p>Funcional</p>
								</div>
								<div class="campo">
									<h4>Evaluación Familiar:</h4>
									<p>Sin Problemas</p>
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
									<h4>Dirección:</h4>
									<p>67 #13613 % 136 y 138</p>
									<span class="fa fa-caret-down"></span>
								</div>
								<div class="campo">
									<h4>Condiciones Vivienda:</h4>
									<p>Bien</p>
								</div>
								<div class="campo">
									<h4>Indice de Hacinamiento:</h4>
									<p>Bien</p>
								</div>
								<div class="campo">
									<h4>Equipamiento Doméstico Básico:</h4>
									<p>Bien</p>
								</div>
								<div class="campo">
									<h4>Satisfacción de la Familia c/ Ingresos:</h4>
									<p>M/Satisfechos</p>
								</div>
								<div class="campo">
									<h4>Funcionamiento Familiar:</h4>
									<p>Funcional</p>
								</div>
								<div class="campo">
									<h4>Evaluación Familiar:</h4>
									<p>Sin Problemas</p>
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
									<h4>Dirección:</h4>
									<p>67 #13613 % 136 y 138</p>
									<span class="fa fa-caret-down"></span>
								</div>
								<div class="campo">
									<h4>Condiciones Vivienda:</h4>
									<p>Bien</p>
								</div>
								<div class="campo">
									<h4>Indice de Hacinamiento:</h4>
									<p>Bien</p>
								</div>
								<div class="campo">
									<h4>Equipamiento Doméstico Básico:</h4>
									<p>Bien</p>
								</div>
								<div class="campo">
									<h4>Satisfacción de la Familia c/ Ingresos:</h4>
									<p>M/Satisfechos</p>
								</div>
								<div class="campo">
									<h4>Funcionamiento Familiar:</h4>
									<p>Funcional</p>
								</div>
								<div class="campo">
									<h4>Evaluación Familiar:</h4>
									<p>Sin Problemas</p>
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
				
			</article>

	        
	    </main>

    <script type="text/javascript">
    	var sinProblemasRadio = document.querySelector('#clasif-evaluacion-1'),
            conProblemasRadio = document.querySelector('#clasif-evaluacion-2'),
            selectEvaluacion = document.querySelector('#select-evaluacion');

             selectEvaluacion.setAttribute('disabled', '');

            sinProblemasRadio.addEventListener('click', function(){
                selectEvaluacion.setAttribute('disabled', '');
            });

            conProblemasRadio.addEventListener('click', function(){
                selectEvaluacion.removeAttribute('disabled');
            });
    </script>
    <script src="../js/script.js"></script>
</body>
</html>
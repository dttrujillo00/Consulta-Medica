<?php
session_start();

if (!$_SESSION['usuario']) {
	header('location:pages/login.php');
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="rgb(6, 152, 87)">
    
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/generales.css">
    <!-- <link rel="stylesheet" href="../css/nucleos.css"> -->
    <link rel="stylesheet" href="../css/elegant-icons.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">

    <title>Mi Consulta</title>
</head>
<body>
	<div class="scroll-up">
		<i class="fa fa-arrow-up"></i>
	</div>

	<div class="loader-container d-none">
		<div class="loader"></div>
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
                <h1>Mi Consulta</h1>
            </div>
            
            <nav class="nav-botones-header">
                <ul>
                	<li id="info-usuario" class="info-usuario">
                		<i class="fa fa-user"></i>
                		<div class="info">
                			<p>Nombre completo: <span><?php echo($_SESSION['usuario']) ?></span></p>
                			<p>Consultorio: <span><?php echo($_SESSION['consultorio']) ?></span></p>
                			<div id="cerrar-sesion" title="Cerrar sesión">
                				<i class="fa fa-power-off"></i>
                			</div>
                		</div>
                	</li>
                    <li>
                    	<i class="fa fa-search"></i>
                	</li>
                    <li>
                    	<i class="fa fa-bell campana"></i>
                    	<span>12</span>
                	</li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="imagen-fondo">

	    <article class="sub-header container">
	        <div class="contenido-sub-header">

				<ul>
					<li><a href="../index.php" class="fa fa-user"></a></li>
					<li class="active"><a href="./nucleos.php" class="fa fa-home"></a></li>
					<li><a href="./graficos.php" class="fa fa-calendar-o"> C/T</a></li>
				</ul>

	        </div>
	    </article>

	    <div class="cont-form-edit-nuc smallDot">
		    <div class="btn-desplegable container">
				<div class="content-text">
					<p>Ocultar</p>
					<P>Mostrar</P>
		    	</div>
			</div>
			<div class="body-desplegable container">
				
					<form class="form-agregar editar" id="form-editar">

						<h2 class="col-md-12 h2-editar">Editar Núcleo</h2>
						<i class="fa fa-close cerrar-form"></i>
						<input type="hidden">

						<input  
						placeholder="Dirección..." 
						type="text" 
						id="direccion-nucleo">

						<input  
						placeholder="Manzana..." 
						type="text" 
						id="manzana-nucleo">

						<div class="contenedor-select-nucleo">
							<h4>Condiciones de la Vivienda</h4>

							<div class="flex" id="condiciones">
								<div class="radio-container">
									<input data-value="1" type="radio" name="clasif-condiciones" id="clasif-B-1">
									<label for="clasif-B-1">Bien</label>
								</div>
								<div class="radio-container">
									<input data-value="2" type="radio" name="clasif-condiciones" id="clasif-R-1">
									<label for="clasif-R-1">Regular</label>
								</div>
								<div class="radio-container">
									<input data-value="3" type="radio" name="clasif-condiciones" id="clasif-M-1">
									<label for="clasif-M-1">Mal</label>
								</div>		
							</div>
						</div>

						<div class="contenedor-select-nucleo">
							<h4>Indice de Hacinamiento</h4>

							<div class="flex" id="hacinamiento">
								<div class="radio-container">
									<input data-value="1" type="radio" name="clasif-indice" id="clasif-B-2">
									<label for="clasif-B-2">Bien</label>
								</div>
								<div class="radio-container">
									<input data-value="2" type="radio" name="clasif-indice" id="clasif-R-2">
									<label for="clasif-R-2">Regular</label>
								</div>
								<div class="radio-container">
									<input data-value="3" type="radio" name="clasif-indice" id="clasif-M-2">
									<label for="clasif-M-2">Mal</label>
								</div>		
							</div>

						</div>

						<div class="contenedor-select-nucleo">
							<h4>Equipamiento Doméstico Básico</h4>

							<div class="flex" id="equipamiento">
								<div class="radio-container">
									<input data-value="1" type="radio" name="clasif-equipamiento" id="clasif-B-3">
									<label for="clasif-B-3">Bien</label>
								</div>
								<div class="radio-container">
									<input data-value="2" type="radio" name="clasif-equipamiento" id="clasif-R-3">
									<label for="clasif-R-3">Regular</label>
								</div>
								<div class="radio-container">
									<input data-value="3" type="radio" name="clasif-equipamiento" id="clasif-M-3">
									<label for="clasif-M-3">Mal</label>
								</div>		
							</div>
						</div>

						<div class="contenedor-select-nucleo">
							<h4>Funcionamiento Familiar</h4>

							<div class="flex" id="funcionamiento">
								<div class="radio-container">
									<input data-value="1" type="radio" name="clasif-funcionamiento" id="clasif-funcionamiento-1">
									<label for="clasif-funcionamiento-1">Funcional</label>
								</div>
								<div class="radio-container">
									<input data-value="2" type="radio" name="clasif-funcionamiento" id="clasif-funcionamiento-2">
									<label for="clasif-funcionamiento-2">Riesgo de Disfunc.</label>
								</div>
								<div class="radio-container">
									<input data-value="3" type="radio" name="clasif-funcionamiento" id="clasif-funcionamiento-3">
									<label for="clasif-funcionamiento-3">Disfuncional</label>
								</div>		
							</div>
						</div>

						<div class="contenedor-select-nucleo">
							<h4>Satisfacción de la Familia con los Ingresos</h4>

							<div class="flex" id="satisfaccion">
								<div class="radio-container">
									<input data-value="1" type="radio" name="clasif-satisfaccion" id="clasif-satisfaccion-1">
									<label for="clasif-satisfaccion-1">Satisfechos</label>
								</div>
								<div class="radio-container">
									<input data-value="2" type="radio" name="clasif-satisfaccion" id="clasif-satisfaccion-2">
									<label for="clasif-satisfaccion-2">M/Satisfechos</label>
								</div>
								<div class="radio-container">
									<input data-value="3" type="radio" name="clasif-satisfaccion" id="clasif-satisfaccion-3">
									<label for="clasif-satisfaccion-3">Insatisfechos</label>
								</div>		
							</div>
						</div>

						<div class="contenedor-select-nucleo">
							<h4>Evaluación Familiar</h4>

							<div class="flex" id="evaluacion">
								<div class="radio-container">
									<input data-value="1" type="radio" name="clasif-evaluacion" id="clasif-evaluacion-1">
									<label for="clasif-evaluacion-1">Sin Problemas</label>
								</div>
								<div class="radio-container">
									<input data-value="2" type="radio" name="clasif-evaluacion" id="clasif-evaluacion-2">
									<label for="clasif-evaluacion-2">Con Problemas de Salud</label>
								</div>
								<div class="radio-container col-12">
									<select id="select-evaluacion" disabled="">
										<option value="2">Dificultades c/ condiciones materiales</option>
										<option value="3">Dificultades c/ la salud de los integrantes</option>
										<option value="4">Dificultades c/ el funcionamiento de la familia</option>
									</select>
								</div>		
							</div>
						</div>

						<div class="div-button-nucleo">
							<button class="btn btn-guardar" id="btn_guardar-nucleo">Guardar</button>
						</div>

					</form>	

					<form class="form-buscar d-none" id="form-buscar">
						<h2 class="col-md-12 col-sm-12">Buscar Núcleos</h2>
						<i class="fa fa-close cerrar-form"></i>

						<input  
						placeholder="Dirección..." 
						type="text" 
						id="direccion-nucleo">

						<input  
						placeholder="Manzana..." 
						type="text" 
						id="manzana-nucleo">

						<div class="div-button col-md-4 col-sm-12">
							<button class="btn btn-buscar" id="btn_buscar">Buscar</button>
						</div>
					</form>
				
			</div>
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
		                    <th>Manzana</th>
							<th>Cond. Vivienda</th>
							<th>Indice Hacinamiento</th>
							<th>Equip. Dom. Básico</th>
							<th>Satisfacción Ingresos</th>
							<th>Funcionamineto Familiar</th>
							<th>Evaluación Familiar</th>
							<th></th>
							<th></th>
							<th></th>
		                </tr>
		            </thead>
		            <tbody>
		            	<!-- El body de la tabla es generado con javascript -->
		            </tbody>
				</table>

				<div class="tabla-responsive">
					<!-- El body de la tabla es generado con javascript -->
				</div>
				
			</article>

	        
	    </main>
	    	

    <script type="text/javascript">
		const contenedorEvaluacion = document.querySelector('#evaluacion');
    	const sinProblemasRadio = document.querySelector('#clasif-evaluacion-1');
        const conProblemasRadio = document.querySelector('#clasif-evaluacion-2');
        const selectEvaluacion = document.querySelector('#select-evaluacion');
		
		contenedorEvaluacion.addEventListener('click', () => {
			if(conProblemasRadio.checked){
        		selectEvaluacion.removeAttribute('disabled');
        	} else {
        		selectEvaluacion.setAttribute('disabled', '');
        	}
		});

    </script>
    <script src="../js/script.js"></script>
    <script src="../js/nucleos.js"></script>
    <script src="../js/sweetalert2.all.min.js"></script>
</body>
</html>
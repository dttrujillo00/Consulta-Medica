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
					<li class="active"><a href="#" class="fa fa-user"></a></li>
					<li><a href="pages/nucleos.php" class="fa fa-home"></a></li>
					<li><a href="pages/graficos.php" class="fa fa-calendar-o"> C/T</a></li>
				</ul>

	        </div>
	    </article>

	    
	    	<div class="btn-desplegable container">
	    		<div class="content-text">
					<p>Ocultar</p>
					<P>Mostrar</P>
	    		</div>
			</div>
			<div class="body-desplegable container">

				<form class="form-agregar" id="form-agregar">

					<h2 class="col-md-12 col-sm-12">Agregar Paciente</h2>
					<i class="fa fa-close cerrar-form d-none"></i>

					<div class="campo-container col-md-8 col-sm-12">
						<label for="nombre_apellido">Nombre completo:</label>
						<input autofocus="" required="" type="text" id="nombre_apellido">
					</div>

					<div class="campo-container col-md-4 col-sm-12">
						<label for="fecha_nacimiento">Fecha de nacimiento</label>
						<input required="" type="date" id="fecha_nacimiento">
					</div>

					<div class="campo-container col-md-8 col-sm-12">
						<label for="direccion">Dirección</label>
						<input required="" type="text" id="direccion">
					</div>

					<div class="campo-container col-md-4 col-sm-12">
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

					<div class="campo-container col-md-8 col-sm-12">
						<label for="diagnostico">Diagnóstico</label>
						<input id="diagnostico" type="text">
					</div>

					<div class="campo-container col-md-2 col-sm-12">
						<label for="manzana">Manzana</label>
						<input required="" type="text" id="manzana">
					</div>

					<div class="campo-container col-md-2 col-sm-12">
						<label>Grupo Disp.</label>
						<select id="grupo_disp">
								<option value="1">I</option>
								<option value="2">II</option>
								<option value="3">III</option>
								<option value="4">IV</option>
						</select>
					</div>

					<div class="campo-container col-md-8 col-sm-12">
						<label for="labor">Ocupación</label>
						<input id="labor" type="text">
					</div>

					<div class="col-md-4 col-sm-12">
						<div class="flex">
							<div class="radio-container col-md-6">								
								<input type="radio" name="sexo" id="hombre">
								<label for="hombre">Masculino</label>
							</div>
							<div class="radio-container col-md-6">								
								<input type="radio" name="sexo" id="mujer">
								<label for="mujer">Femenino</label>
							</div>		
						</div>	
					</div>

					<input type="hidden" value="" id="id-pac">
					<input type="hidden" value="" id="manzana-vieja">
					<input type="hidden" value="" id="direccion-vieja">

					<div class="div-button col-md-4 col-sm-12">
						<button class="btn btn-guardar" id="btn_guardar">Guardar</button>
					</div>

				</form>	

			</div>

    </div>


    <main>
	    <article>

		            <section class="vista-pacientes container">
		            	<div class="encabezado-vista" id="encabezado-vista">
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
								<!-- El body de la tabla es generado con javascript -->
		                    </tbody>
						</table>
						
						<div class="tabla-responsive">
							<!-- El body de la tabla es generado con javascript -->
						</div>
					</section>

		</article>
	</main>
   
	<script src="js/script.js"></script>
	<script src="js/pacientes.js"></script>
	<script src="js/sweetalert2.all.min.js"></script>    
</body>
</html>
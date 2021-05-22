<?php include 'database/conexion.php' ?>

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
				<form class="form-agregar">

					<h2 class="col-md-12">Agregar Paciente</h2>

					<input required="" class="col-md-8" type="text" name="nombre_apellido" id="nombre_apellido" placeholder="Nombre y Apellido...">

					<input required="" class="col-md-4"  placeholder="Fecha Nacimiento..." type="text" name="fecha_nacimiento" id="fecha_nacimiento">

					<input required="" class="col-md-8"  placeholder="Dirección..." type="text" name="direccion" id="direccion">

					<input required="" class="col-md-4"  placeholder="Nivel Educacional..." type="text" name="nivel_educacional" id="nivel_educacional">

					<input class="col-md-8" name="diagnostico" id="diagnostico" placeholder="Diagnóstico..." type="text">

					<input required="" class="col-md-4"  type="number" name="manzana" id="manzana" placeholder="Manzana...">

					<input class="col-md-8" name="labor" id="labor" placeholder="Labor..." type="text">


					<div class="contenedor-flex-select col-md-4">
						<div class="contenedor-select">
							<legend>Grupo Disp.</legend>

							<select name="grupo_disp" id="grupo_disp">
									<option value="1">I</option>
									<option value="2">II</option>
									<option value="3">III</option>
									<option value="4">IV</option>
							</select>
						</div>

						<div class="col-md-8">
							<div class="flex">
								<div class="radio-container">
									<label for="hombre">Hombre</label>
									<input type="radio" name="sexo" id="hombre">
								</div>
								<div class="radio-container">
									<label for="mujer">Mujer</label>
									<input type="radio" name="sexo" id="mujer">
								</div>		
							</div>	
						</div>
						
					</div>

					<div class="div-button col-md-4">
						<button class="btn btn-guardar" id="btn_guardar">Guardar</button>
					</div>

				</form>	
			</div>

	        
	    

  ...  </div>


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
									<th>Manzana</th>
									<th>Diagnóstico</th>
									<th></th>
									<th></th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                        <tr data-id="1">
		                            <td>Daniel Alberto Tamayo Trujillo</td>
									<td>M</td>
									<td>I</td>
									<td>67 #13613 % 136 y 138</td>
									<td>21</td>
									<td>Preuniversitario</td>
									<td>100</td>
									<td>Sano</td>
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
		                            <td>Daniel Alberto Tamayo Trujillo</td>
									<td>M</td>
									<td>I</td>
									<td>67 #13613 % 136 y 138</td>
									<td>21</td>
									<td>Preuniversitario</td>
									<td>100</td>
									<td>Sano</td>
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
		                            <td>Daniel Alberto Tamayo Trujillo</td>
									<td>M</td>
									<td>I</td>
									<td>67 #13613 % 136 y 138</td>
									<td>21</td>
									<td>Preuniversitario</td>
									<td>100</td>
									<td>Sano</td>
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
		                            <td>Daniel Alberto Tamayo Trujillo</td>
									<td>M</td>
									<td>I</td>
									<td>67 #13613 % 136 y 138</td>
									<td>21</td>
									<td>Preuniversitario</td>
									<td>100</td>
									<td>Sano</td>
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
		                            <td>Daniel Alberto Tamayo Trujillo</td>
									<td>M</td>
									<td>I</td>
									<td>67 #13613 % 136 y 138</td>
									<td>21</td>
									<td>Preuniversitario</td>
									<td>100</td>
									<td>Sano</td>
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
		                            <td>Daniel Alberto Tamayo Trujillo</td>
									<td>M</td>
									<td>I</td>
									<td>67 #13613 % 136 y 138</td>
									<td>21</td>
									<td>Preuniversitario</td>
									<td>100</td>
									<td>Sano</td>
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
	<script src="js/formulario.js"></script>
    
</body>
</html>
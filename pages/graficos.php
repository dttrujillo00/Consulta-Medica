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
    
    <!-- <link rel="stylesheet" href="../css/generales.css"> -->
    <link rel="stylesheet" href="../css/graficos.css">
    <link rel="stylesheet" href="../css/elegant-icons.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">

    <title>Mi Consulta</title>
</head>
<body>
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
                    	<i class="fa fa-bell campana"></i>
                    	<span class="notificaciones">12</span>
                	</li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="imagen-fondo">
    	<article class="sub-header container">
	        <div class="contenido-sub-header">

				<ul>
					<li><a href="../index.php" class="fa fa-group"></a></li>
					<li><a href="./nucleos.php" class="fa fa-home"></a></li>
					<li class="active"><a href="#" class="fa fa-calendar-o"> C/T</a></li>
				</ul>

	        </div>
	    </article>
    </div>

	<article class="contenedor-graficos container">
		
		<section class="grafico">
			<h2 style="text-align: center;">Consultas - Meses</h2>
			<ul>
				<li data-content="0"><p>E</p></li>
				<li data-content="0"><p>F</p></li>
				<li data-content="0"><p>M</p></li>
				<li data-content="0"><p>A</p></li>
				<li data-content="0"><p>M</p></li>
				<li data-content="0"><p>J</p></li>
				<li data-content="0"><p>J</p></li>
				<li data-content="0"><p>A</p></li>
				<li data-content="0"><p>S</p></li>
				<li data-content="0"><p>O</p></li>
				<li data-content="0"><p>N</p></li>
				<li data-content="0"><p>D</p></li>
			</ul>
		</section>

		
		<section class="grafico">
			<h2 style="text-align: center;">Terrenos - Meses</h2>
			<ul>
				<li data-content="0"><p>E</p></li>
				<li data-content="0"><p>F</p></li>
				<li data-content="0"><p>M</p></li>
				<li data-content="0"><p>A</p></li>
				<li data-content="0"><p>M</p></li>
				<li data-content="0"><p>J</p></li>
				<li data-content="0"><p>J</p></li>
				<li data-content="0"><p>A</p></li>
				<li data-content="0"><p>S</p></li>
				<li data-content="0"><p>O</p></li>
				<li data-content="0"><p>N</p></li>
				<li data-content="0"><p>D</p></li>
			</ul>
		</section>
	</article>

    
	

	<script src="../js/scriptGraficos.js"></script>
</body>
</html>
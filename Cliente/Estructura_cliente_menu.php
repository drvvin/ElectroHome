<?php
session_start();
//id lleva la id del usuario iniciado
$id = $_SESSION['id_usuario'];
//varsesion lleva el nombre del usuario
$varsesion = $_SESSION['usuario'];
if ($varsesion=null || $varsesion = '') {
	echo "No posee autorizacion para ingresar";
	die();
}
?>
<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" type="text/css" href="Estiloalternativo.css">
	<link rel="stylesheet" type="text/css" href="EstiloIniciovisita.css">
	<!-- Link para habilitar iconos-->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
</head>
<body>
	<!-- Entrada  de boton de despligue-->
	<input type="checkbox" id="check" hidden="true">
	<!--Header iniciado -->
	<header class="header">
		<div class="container">
			<div class="btn-menu">
				<label for="btn-menu">☰</label>
			</div>
			<div class="logo">
				<a href="Estructura_cliente_menu.php"><img src="ImagenesMenuCliente\logo.png"></a>
			</div>
			<nav class="menu">
				<table class="tabla_encabezado">
					<tr>
						<td class="columnaTabla">
							<a href="Estructura_cliente_Quienesomos.php"><input type="button" class="QuienesSomos_btn" value="Quienes somos"></a>
						</td>
						<td class="columnaTabla">
							<a href="Estructura_cliente_contactanos.php"><input type="button" class="Contactanos_btn" value="Contactanos"></a>
						</td>
						<td class="columnaTabla">
							<a href="https://www.facebook.com"><img src="ImagenesMenuCliente\Facebook.png" class="imgface"></a>
						</td>
						<td class="columnaTabla">
							<a href="https://www.instagram.com"><img src="ImagenesMenuCliente\Insta.png" class="imginsta"></a>
						</td>
						<td class="columnaTabla">
							<a href="https://twitter.com"><img src="ImagenesMenuCliente\Twitter.png" class="imgtwitter"></a>
						</td>
					</tr>
				</table>
			</nav>
			
		</div>
	</header>
	<!--Header terminado -->
	<div class="capa"></div>
	<!--	--------------->
	<input type="checkbox" id="btn-menu">
	<div class="container-menu">
		<div class="cont-menu">
			<nav>
				<!--<span><?php /*echo $_SESSION['usuario'];
				echo $_SESSION['id_usuario']; */?></span> -->
				<a href="Estructura_cliente_menu.php"><i class="fas fa-home"></i><span> Inicio</span></a>
				<a href="Estructura_cliente_agendarhora.php"><i class="fas fa-calendar-week"></i><span> Agendar solicitud</span></a>
				<a href="Estructura_cliente_versolicitudes.php"><i class="fas fa-eye"></i><span> Ver solicitudes</span></a>
				<a href="Estructura_cliente_micuenta.php"><i class="fas fa-address-card"></i><span> Mi cuenta</span></a>
				<a href="cerrarSesion.php" class="CS"><i class="fas fa-sign-out-alt"><span> Cerrar sesion</span></i></a>
			</nav>
			<label for="btn-menu">✖️</label>
		</div>
	</div>

	<!--barralateral terminado -->
	<div class="contenido">
		<div class="part1">
               
			<!--Primer parrafo de informacion del contenido -->
			<p class="parrafo">¡NO SALGAS DE TU CASA, REALIZA DE FORMA CÓMODA Y SENCILLA TUS  ONLINE!</p><br/>
		</div>

		<div class="part2">
			<h1>Guzmán SPA</h1><br/>
			<!--Primer parrafo de informacion del contenido -->
			<p class="p1">La Empresa Eléctrica Guzmán SPA Brinda Servicios A Los Clientes Que Necesiten Reparaciones O Instalaciones Eléctricas Domiciliarias, La Empresa Lleva Dentro Del Rubro 4  Años De Experiencia.</p><br/><br/>
		</div>	
		<div class="part3">
			<h1 class="titulo2">¿Que Servicios Ofrecemos?</h1><br/>
			<!--Primer parrafo de informacion del contenido -->
			<p class="p2">
				<ul type=”A”>
					<h3>Realizamos Los Siguientes Servicios:</h3><br/><br/>
					<li>Reparación De Circuitos Eléctricos</li>
					<li>Instalaciones De Equipos Eléctricos</li>
					<li>Empalme Eléctricos</li>
					<li>Decoración Lumínica Exterior/Interior</li>
					<li>Diagnóstico De Fallas Y Reparación De Motores</li>
				</ul>
			</p>
		</div>
		<div class="part4">
			<h1>¡Solicita Tu Servicio!</h1><br/>
			<!--Primer parrafo de informacion del contenido -->
			<p class="STS">¿Como Solicitar Tu Servicio?
			Es Muy Fácil, Solo Debes Registrarte E Iniciar Sesión Y Podrás Realizar Tu Solicitud.</p><br/>
			<a href="Estructura_cliente_agendarhora.php"><input type="button"  class="botonSolicitar" value="Solicita tu servicio Aqui">	</a>
		</div>	
	</div>
</body>
</html>

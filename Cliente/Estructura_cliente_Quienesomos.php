<?php
session_start();
$id = $_SESSION['id_usuario'];
//usuario lleva consigo el nombre
$varsesion = $_SESSION['usuario'];
if ($varsesion=null || $varsesion = '') {
	echo "No posee autorizacion para ingresar";
	die();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="Estiloalternativo.css">
	<link rel="stylesheet" type="text/css" href="EstiloQuieneSomos.css">
	<!-- Link para habilitar iconos-->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
	<!--Barra lateral iniciado -->
	<!--	--------------->
	<input type="checkbox" id="btn-menu">
	<div class="container-menu">
		<div class="cont-menu">
			<nav>
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
		<center>
			<!--Titulo Contenido -->
			<h1>¿ Quienes Somos ?</h1>
			<!--Importacion imagen contenido -->
			<div class="Top">
				<img src="ImagenesMenuCliente\Portada-ampolleta.jpg" class="Img-Top">
			</div>
			<div class="part1">
				<!--SubTitulo Contenido -->
				<h3>PERFIL</h3><br/>
				<!--Informacion dentro del contenido -->
				<p>
					Nuestra Organización
					Con 4 Años De Trayectoria Una Pyme Familiar Cuyo Principal Objetivo Es Satisfacer Las Necesidades De Nuestros Clientes, Así Prestando Nuestros Servicios A Disposición.
					En El Año 2017 Don Manuel Guzmán Junto A Sus Hijos Creo La Pyme Guzmán Spa, Para Poder Así Entregar Sus Servicios De Una Forma Más Formal Y Continuando Con Su Objetivo Principal Además De Agregando Valor En Estos.

				</p>
			</div>
		</center>		

		
	</div>
	

</body>
</html>

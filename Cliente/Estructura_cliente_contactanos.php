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
	<link rel="stylesheet" type="text/css" href="EstiloContactanos.css">
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

	<div class="contenido">
		<!--Formulario Login -->
		<center>
			<!--Titulo Contenido -->
			<h1>Contactanos</h1>
			<!--Importacion imagen contenido -->
			<div class="Top">
				<img src="ImagenesMenuCliente/Ampolleta.png" class="Img-Top">
			</div>
			<div class="part1">
				<!--SubTitulo Contenido -->
				<h3>CORREO</h3><br/>
				<!--Primer parrafo de informacion de contacto -->
				<p>
					Si Tienes Cualquier Duda, Puedes Escribirnos A Nuestro Correo. 
					<!--Etiqueta para correo electronico -->
					<br/><br/><a href="">Electrohome27@gmail.Com </a><br/><br/>
					<!--Insercion de icono -->
					<i class="fas fa-envelope" id="icono"></i>
				</p>
			</div>
			<div class="part2">
				<!--SubTitulo Contenido -->
				<br/><h3>REDES SOCIALES</h3><br/>
				<!--Segundo parrafo de informacion de contacto -->
				<p>
					Adicionalmente, Podemos Intentar Ayudarte A Través De Cualquiera De Nuestras Redes Sociales:
					<br/><br/>
					<!--Insercion de icono -->
					<i class="fab fa-instagram" id="icono"></i>
					<!--Etiqueta para red social Instagram -->
					<a href="https://www.instagram.com/">Instagram </a><br/>
					<!--Insercion de icono -->
					<i class="fab fa-facebook-f" id="icono" class="icon-facebook"></i>
					<!--Etiqueta para red social Facebook -->
					<a href="https://es-la.facebook.com/">Facebook </a><br/>
					<!--Insercion de icono -->
					<i class="fab fa-twitter" id="icono"></i>
					<!--Etiqueta para red social Twitter -->
					<a href="https://mobile.twitter.com/" class="icon-twitter" >Twitter </a><br/>
				</p>		
			</div><br/><br/><br/><br/>
			<div class="part3">
				<!--SubTitulo Contenido -->
				<h3>Servicio Técnico de móviles</h3><br/>
				<!--Tercer parrafo de informacion de contacto -->
				<p>Para tus consultas de telefonía móvil, servicios hogar y otras consultas.
					<br/><br/>
					<p class="phone">Desde celular o teléfono fijo :</p>
					<p class="cellphone">+56950146323</p><br/>
				</p>		
			</div>
		</center>		
	</div>
</body>
</html>
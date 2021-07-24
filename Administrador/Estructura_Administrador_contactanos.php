<?php
/**
*Comando para manejar el id de usuario atraves de las sessiones, en caso de que un usuario ingrese a una ventana sin permisos directos.
*/
session_start();
error_reporting(0);
$id_usuario = $_SESSION['id_usuario'];
$varsesion = $_SESSION['usuario'];
/**
*Sentencia if para confirmar que el usuario tenga permisos de autorizacion.
*/
if ($varsesion==null || $varsesion = '') {
	echo "No posee autorizacion para ingresar";
	die();
}
?>
<!DOCTYPE html>
<html>
<head>
	<!--Redirrecion a comandos css para modificar el estilo de la pagina-->
	<link rel="stylesheet" type="text/css" href="Estiloalternativo.css">
	<link rel="stylesheet" type="text/css" href="EstiloContactanos.css">
	
	<!--Link para habilitar iconos descargados de la pagina awesome-->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<!--Link para habilitar las interfaz con celulares-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<!--Entrada de boton para el menu lateral despligue-->
	<input type="checkbox" id="check" hidden="true">
	<!--Header iniciado -->
	<header class="header">
		<div class="container">
			<div class="btn-menu">
				<label for="btn-menu">☰</label>
			</div>
			<!--Logo de la empresa en la barra superior-->
			<div class="logo">
				<a href="Estructura_Administrador_menu"><img src="ImagenesMenu\logo.png"></a>
			</div>
			<nav class="menu">
				<table class="tabla_encabezado">
					<tr>
						<!--Boton quienes somos-->
						<td class="columnaTabla">
							<a href="Estructura_Administrador_Quienesomos.php"><input type="button" class="QuienesSomos_btn" value="Quienes somos"></a>
						</td>
						<!--Boton contactanos-->
						<td class="columnaTabla">
							<a href="Estructura_Administrador_contactanos.php"><input type="button" class="Contactanos_btn" value="Contactanos"></a>
						</td>
						<!--Boton icono de facebook-->
						<td class="columnaTabla">
							<a href="https://www.facebook.com"><img src="ImagenesMenu\Facebook.png" class="imgface"></a>
						</td>
						<!--Boton icono de instagram-->
						<td class="columnaTabla">
							<a href="https://www.instagram.com"><img src="ImagenesMenu\Insta.png" class="imginsta"></a>
						</td>
						<!--Boton icono de twiter-->
						<td class="columnaTabla">
							<a href="https://twitter.com"><img src="ImagenesMenu\Twitter.png" class="imgtwitter"></a>
						</td>
					</tr>
				</table>
			</nav>
			
		</div>
	</header>
	
	<!--Contenido del menu despegable-->
	<input type="checkbox" id="btn-menu">
	<div class="container-menu">
		<div class="cont-menu">
			<!--Redireccion para cada hreft del menu despegable-->
			<nav>
				<a href="Estructura_Administrador_menu.php"><i class="fas fa-home"></i><span> Inicio</span></a>
				<a href="Estructura_Administrador_VerSolicitudes.php"><i class="fas fa-calendar-week"></i><span> Buzon de solicitudes</span></a>
				<a href="Estructura_Administrador_AdministrarServicios.php"><i class="fas fa-eye"></i><span> Administrar servicios</span></a>
				<a href="Estructura_Administrador_AdministrarProductos.php"><i class="fas fa-address-card"></i><span> Administrar productos</span></a>
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
				<img src="ImagenesMenu/Ampolleta.png" class="Img-Top">
			</div>
			<div class="part1">
				<!--SubTitulo Contenido -->
				<h3>CORREO</h3><br/>
				<!--Primer parrafo de informacion de contacto -->
				<p>
					Si Tienes Cualquier Duda, Puedes Escribirnos A Nuestro Correo 
					<!--Etiqueta para correo electronico -->
					<br/><br/><a href="">Contacto@Electrohome.Cl </a><br/><br/>
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
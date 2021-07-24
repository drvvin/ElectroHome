<?php
session_start();
$id = $_SESSION['id_usuario']
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
	<link rel="stylesheet" type="text/css" href="ClienteRecuperar.css">
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
				<a href="Estructura_cliente_menu.html"><img src="ImagenesMenuCliente\logo.png"></a>
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
		<!--Formulario Cambio de contraseña -->
		<div class="tittle">
		<h1>Recuperar contraseña</h1>
		<h3>Ingresa tu correo electrónico para enviar tu nueva contraseña.</h3>
		</div>
		<!--Division para el contenido del cambio de contraseña-->
		<center>
			<form action="Recuperarpass.php" class="formulario" method="POST">
				<table class="tablaform">
					<br>
					<tr>
						<td  class="txcorreo">
							<i class="fas fa-user icon"></i>Correo Electrónico:
						</td>
						<td>
							<input type="text" id="text" placeholder="Correo electrónico">
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<br/><br/><input type="submit" value="Aceptar" class="button">
							<input type="submit" value="Cancelar" class="button2">
						</td>
					</tr>
				</table>
			</form>
		</center>


	</div>
	

</body>
</html>

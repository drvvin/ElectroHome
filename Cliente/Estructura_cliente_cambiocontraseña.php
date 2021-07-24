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
	<link rel="stylesheet" type="text/css" href="Estilocambiarcontra.css">
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
		<!--Formulario Cambio de contraseña -->
		<div class="tittle">
		<h1>Cambio de contraseña</h1>
		<h3>Se recomienda usar una contraseña segura que no uses en ningún otro sitio.</h3>
		</div>
		<!--Division para el contenido del cambio de contraseña-->
		<center>
			<form action="Cambiarpass.php" class="formulario" method="GET">
				<table class="tablaform">
					<br>
					<tr>
						<td  class="txpassac">
							<i class="fas fa-user icon"></i>Contraseña actual:
						</td>
						<td>
							<input type="password" id="text" name="password1" placeholder="Ingrese Contraseña actual" required>
						</td>
					</tr>
					<tr>
						<td class="txnewpass">
							<br/><br/><i class="fas fa-key icon"></i>Nueva Contraseña : 
						</td>
						<td>
							<br/><br/><input type="password" id="text" name="NewPassword" placeholder="Ingrese Nueva contraseña" required />
						</td>
					</tr>
					<tr>
						<td class="txconfirm">
							<br/><br/><i class="fas fa-key icon"></i>Confirmar Contraseña : 
						</td>
						<td>
							<br/><br/><input type="password" id="text" name="NewConfirmPassword" placeholder="Ingrese Confirmar contraseña" required/>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<br/><br/><input type="submit" value="Cambiar contraseña" class="button">
							<input type="button" onclick="location.href='Estructura_cliente_micuenta.php';" value="Cancelar" class="button2">
						</td>
					</tr>
				</table>
			</form>
		</center>

		
	</div>
	

</body>
</html>

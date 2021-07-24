<!DOCTYPE html>
<html>

<?php 
/*include("validar.php");
if ($mensaje!=null || $mensaje!="") {
	echo $mensaje;
}*/
 ?>
<head>
	<title>Iniciar sesión</title>
	<link rel="stylesheet" type="text/css" href="Estilovisita.css">
	<link rel="stylesheet" type="text/css" href="Estilologin.css">
	<!-- Link para habilitar iconos-->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--<script type="text/javascript" src="js\jquery.validate.js"></script>-->
	
</head>
<body>
	<center>
	<!- Entrada  de boton de despligue-->
	<input type="checkbox" id="check" hidden="true">
	<!--Header iniciado -->
	<header class="header">
		<div class="container">
			<div class="logo">
				<a href="Inicio.html"><img src="ImagenesMenu\logo.png"></a>
			</div>
			<nav class="menu">
				<table class="tabla_encabezado">
					<tr>
					<td class="columnaTabla">
						<a href="QuienesSomos.html"><input type="button" class="QuienesSomos_btn" value="Quienes somos"></a>
					</td>
					<td class="columnaTabla">
						<a href="Contactanos.html"><input type="button" class="Contactanos_btn" value="Contactanos"></a>
					</td>
					<td class="columnaTabla">
						<a href="Login.php"><input type="button" class="Login_btn" value="Iniciar sesión"></a>
					</td>
					<td class="columnaTabla">
						<a href="Registrarse.php"><input type="button" class="Registrarse_btn" value="Registrarse"></a>
					</td>
					<td class="columnaTabla">
						<a href="https://www.facebook.com"><img src="ImagenesMenu\Facebook.png" class="imgface"></a>
					</td>
					<td class="columnaTabla">
						<a href="https://www.instagram.com"><img src="ImagenesMenu\Insta.png" class="imginsta"></a>
					</td>
					<td class="columnaTabla">
						<a href="https://twitter.com"><img src="ImagenesMenu\Twitter.png" class="imgtwitter"></a>
					</td>
			</tr>
				</table>
			</nav>
			
		</div>
	</header>
	<!--Header terminado -->
	<!--Header terminado -->

	<!--Barra lateral iniciado -->
	

	<!--barralateral terminado -->
	<div class="contenido">
		<!--Formulario Login -->
		<h1>INICIAR SESIÓN</h1>
		<h3>Por favor ingresa tu e-mail y tu contraseña.</h3>
			<!--Division para el contenido del login-->
			<div class="contenedor">
				<div class="formulario">
					<center>
						<div>
							<form  action="validar.php" method="post" id="login">
								<table>
									<br>
									<tr>
										<td  class="txrut">
											<i class="fas fa-user icon"></i>Email : 
										</td>
										<td>
											<input type="email" id="email" class="validate" name="email" placeholder="Ingrese email" required>
										</td>
									</tr>
									<tr>
										<td class="txpass">
											<br/><br/><i class="fas fa-key icon"></i>Contraseña : 
										</td>
										<td>
											<br/><br/><input type="password" id="password" class="validate" name="password" placeholder="Ingrese contraseña" required />
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<br/><br/><input type="submit"  value="Iniciar sesión" class="button">
									
											<a href="Inicio.html"><input type="button" value="Cancelar" class="button2"></a>
										</td>
									</tr>
								</table>
						</form>
						</div>
					</center>
				</div>
			</div>
	</div>
	<div class="contenedor2">
		<p>¿No recuerdas tu contraseña?<a class="link" href="Recuperarcontraseña.php"> Recuperar Contraseña</a></p>
	</div>
	</center>
</body>
</html>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="Estilovisita.css">
	<link rel="stylesheet" type="text/css" href="ClienteRecuperar.css">
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

	<!--barralateral terminado -->
	<div class="contenido">
		<!--Formulario Cambio de contraseña -->
		<h1>Recuperar contraseña</h1>
         <h3>Ingresa tu correo electrónico para enviar tu nueva contraseña.</h3>
			<!--Division para el contenido del cambio de contraseña-->
					<center>
							<form action="Recuperarpass.php" class="formulario" method="POST">
								<table class="tablaform">
									<br>
									<tr>
										<td  class="txcorreo">
											<i class="fas fa-user icon"></i>Correo electronico:
										</td>
										<td>
											<input type="email" id="text" name ="correo" placeholder="Correo electrónico" required>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<br/><br/><input type="submit" value="Aceptar" class="button">
											<a href="Login.php"><input type="button" value="Cancelar" class="button2"></a>
										</td>
									</tr>
								</table>
							
							</form>
					</center>

	
	</div>
	

</body>
</html>

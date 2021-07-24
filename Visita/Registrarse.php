<!DOCTYPE html>
<html>
<head>
	
	<title></title>
	<link rel="stylesheet" type="text/css" href="Estilovisita.css">
	<link rel="stylesheet" type="text/css" href="EstiloRegistrar.css">
	<!-- Link para habilitar iconos-->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
		<script type="text/javascript">
$(function(){
  $('.Normal').keypress(function(e) {
    if(isNaN(this.value + String.fromCharCode(e.charCode))) 
     return false;
  })
  .on("cut copy paste",function(e){
    e.preventDefault();
  });

});
</script>
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
	<!--Header terminado -->

	<!--Barra lateral iniciado -->
	

	<!--barralateral terminado -->
	<div class="contenido">
		<!--Formulario Login -->
		<h1>REGISTRARSE</h1>
		<br><br>
		<h3>Por favor rellena el formulario.</h3>
		<br>
		<div class="formulario">
			<!--Division para el contenido del login-->
			<div class="contenedor">
				<div class="input-contenedor">
					<center>
						<div>
							<form action="validarRegis.php" method="POST">
								<table>
									<tr>
										<td class="tittle1" colspan="2">
											<h2>Información personal</h2> 
										
										</td>
									</tr>
									<tr>
										<td class="tx">
											Nombres  : <label>*</label>
										</td>
										<td class="tx">
											Apellidos  : <label>*</label>
										</td>
									</tr>
									<tr>
										<td>
											<input type="text" class="iN" id="nombres" name="nombres" placeholder="Ingrese Nombres (Obligatorio)" required>
										</td>
										<td>
											<input type="text" class="iN" id="apellidos" name="apellidos" placeholder="Ingrese Apellidos (Obligatorio)" required>
										</td>
									</tr>
									<tr>
										<td class="tx">
											<br/><br/>Rut : <label>*</label>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<input type="text" class="iN"  id="rut" name="rut" placeholder="Ingrese Rut (Obligatorio)" onKeyPress="if(this.value.length==10) return false;"><br/><br/><br/><br/>
										</td>
									</tr>
									
									<tr>
										<td class="tx">
											Ingrese correo electronico : <label>*</label>
										</td>
										<td class="tx">
											Confirmar Dirección de correo electrónico : <label>*</label>
										</td>

									</tr>
									<tr>
										<td>
											<input type="email" class="iN" id="correo1" name="correo1" placeholder="Ingrese Correo Electrónico (Obligatorio)" required>
										</td>
										<td>
											<input type="email" class="iN"  id="correo2" name="correo2" placeholder="Confirme Correo Electrónico (Obligatorio)" required>
										</td>
									</tr>
									<tr>
										<td class="tx">
											<br/><br/>Contraseña : <label>*</label>
										</td>
										<td class="tx">
											<br/><br/>Confirmar Contraseña : <label>*</label>
										</td>

									</tr>
									<tr>
										<td>
											<input type="password" class="iN" id="pass1" name="pass1" placeholder="Ingrese Contraseña (Obligatorio)"required >

										</td>
										<td>
											<input type="password" class="iN" id="pass2" name="pass2" placeholder="Confirmar Contraseña (Obligatorio)" required>
										</td>
									</tr>
										<td class="tx">
											<br/><br/>Dirección : <label>*</label>
										</td>
										<td class="tx">
											<br/><br/>Número de casa : <label>*</label>
										</td>

									</tr>
									<tr>
										<td>
											<input type="text" class="iN" id="direccion" name="direccion" placeholder="Ingrese Dirección (Obligatorio)" required>
										</td>
										<td>
											<input type="text" class="Normal"  id="nrocasa" name="nrocasa" placeholder="Ingrese Número de casa (Obligatorio)" onKeyPress="if(this.value.length==4) return false;">
										</td>
									</tr>
									<tr>
										<td class="tx">
											<br/><br/>Bloque : 
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<input type="text" class="iN" id="bloque" name="bloque" placeholder="Ingrese Bloque (Opcional)" >
										</td>
									<tr>
										<tr> 
										<td class="tx">
											<br/><br/>Teléfono : <label>*</label>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<!--se le coloca id nro de casa para que en el js detecte el campo y solo se puedan ingresar numeros -->
											<input type="text" class="Normal"  id="telefono" name="telefono" placeholder="Ingrese Teléfono (Obligatorio)" required onKeyPress="if(this.value.length==9) return false;">
										</td>
									<tr>
									<tr>
										<td colspan="2">
											<br/><br/><input type="submit" value="Registrarse" class="button">
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
	</div>

</body>
</html>
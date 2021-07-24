<?php
session_start();
$id = $_SESSION['id_usuario'];
//usuario lleva consigo el nombre
$varsesion = $_SESSION['usuario'];
if ($varsesion==null || $varsesion == '') {
	echo "No posee autorizacion para ingresar";
	die();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="EstiloalternativoMC.css">
	<link rel="stylesheet" type="text/css" href="ClienteMiCuenta.css">
	<!-- Link para habilitar iconos-->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
		<script type="text/javascript">
$(function(){
  $('.validanumericos').keypress(function(e) {
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
				<a href="Estructura_cliente_menu.php"><i class="fas fa-home"></i><span> Inicio</span></a>
				<a href="Estructura_cliente_agendarhora.php"><i class="fas fa-calendar-week"></i><span> Agendar solicitud</span></a>
				<a href="Estructura_cliente_versolicitudes.php"><i class="fas fa-eye"></i><span> Ver solicitudes</span></a>
				<a href="Estructura_cliente_micuenta.php"><i class="fas fa-address-card"></i><span> Mi cuenta</span></a>
				<a href="cerrarSesion.php" class="CS"><i class="fas fa-sign-out-alt"><span> Cerrar sesion</span></i></a>
			</nav>
			<label for="btn-menu">✖️</label>
		</div>
	</div>
	<br/>
	<div class="contenido">
		<center>
		<h1>Mi Cuenta</h1>
		<h3>Revisa o Actualiza tu informacion personal.</h3>
		<?php

		$enlace = mysqli_connect("localhost","root","");
		mysqli_select_db($enlace,"electricidad");
		$tilde = $enlace ->query("SET NAMES 'utf-8'");
		$result = mysqli_query($enlace,"SELECT * FROM usuario where ID_USUARIO='".$id."'");
		$extraido= mysqli_fetch_array($result);

		?>		
		<div class="envase">
			<div class="contenidodivmicuenta">
				<p class="subtitulosMiCuenta">Informacion personal</p>
				<form name="formulario" method="get" action="Update.php">
					<div class="detallesCajas">
						<img src="ImagenesMenuAdmin/barra.png" class="barra">
						<div class="cajas">
							<br><span class="detalle">Nombre</span>
							<?php
							echo "<input type='text' name='id' value=".$id." hidden>";
							?>
							<input type="text" name="NOMBRE" value="<?php echo $extraido['NOMBRE'] ?>" required>
						</div>
						<div class="cajas">
							<br><span class="detalle">Apellido</span>
							<input type="text" name="APELLIDOS" value="<?php echo $extraido['APELLIDOS'] ?>" required>
						</div>
						<div class="cajas">
							<span class="detalle">Rut</span>
							<input type="text" name="RUT" value="<?php echo $extraido['RUT'] ?>"  readonly>
						</div>
						<div class="cajas">
							<span class="detalle">Direccion de correo electronico</span>
							<input type="email" name="CORREO" value="<?php echo $extraido['CORREO'] ?>" required>
						</div>
						<div class="cajas">
							<span class="detalle">Contraseña</span>
							<input type="password" name="CONTRASENA" value="<?php echo $extraido['CONTRASENA'] ?>" readonly>
						</div>
						<div class="cajas">
							<br>
							<input type="button" onclick="location.href='Estructura_cliente_cambiocontraseña.php';" value="Cambiar Contraseña" />
						</div>
					</div>
					<p class="subtitulosMiCuenta">Informacion del domicilio</p>
					<div class="detallesCajas">
						<img src="ImagenesMenuAdmin/barra.png" class="barra">
						<div class="cajas">
							<br><span class="detalle">Dirección de domicilio</span>
							<input type="text" name="DIRECCION" value="<?php echo $extraido['DIRECCION'] ?>" required>
						</div>
						<div class="cajas">
							<br><span class="detalle">Número de casa</span>
							<input type="number" name="NRO_CASA" class="validanumericos" onKeyPress="if(this.value.length==4) return false;" value="<?php echo $extraido['NRO_CASA'] ?>"  required>
						</div>
						<div class="cajas">
							<span class="detalle">Bloque</span>
							<input type="text" name="BLOQUE" value="<?php echo $extraido['BLOQUE'] ?>">
						</div>
						<div class="cajas">
							<span class="detalle">Telefono</span>
							<input type="number" name="TELEFONO" class="validanumericos" onKeyPress="if(this.value.length==8) return false;" value="<?php echo $extraido['TELEFONO'] ?>" required>
						</div>
					</div>
					<div class="botonMiCuenta">
						<input type="submit" class="submit" value="Guardar">
					</div>
				</form>
			</div>
		</div>
		</form>
		</center>
	</div>

</body>
</html>
<?php
session_start();
$id = $_SESSION['id_usuario'];
//usuario lleva consigo el nombre
$varsesion = $_SESSION['usuario'];
if ($varsesion=null || $varsesion = '') {
	echo "No posee autorizacion para ingresar";
	die();
}
$conexion = mysqli_connect("localhost", "root","" ,"electricidad");
$consulta="SELECT * FROM servicios where ESTADO_SERVICIO= '1'";
  $resultado=mysqli_query($conexion,$consulta);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="EstiloalternativoAG.css">
	<link rel="stylesheet" type="text/css" href="ClienteAgendarHora.css">
	<!-- Link para habilitar iconos-->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
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
	<!--Primer div con class contenido para modificar los margenes de la plataforam-->
	<center>
	<div class="contenido">
		<div class="tittle">
		<h1>Agenda Web</h1>
		<h3>Solicita tus servicios aqui.</h3>
		</div>
		<div class="Contenedor">
			<div class="Formulario">	
				<div class="DatosDomicilio">
					<form name="formulario" method="post" action="AgregarHora.php">
					<center><h2>Solicitar servicio</h2></center>						<!--Cajas del fomrulario tipos de servicios-->	
					
							<br><span class="detalle"><blockquote>Selecciona el servicio</blockquote></span><br>
							<?php					
							echo"<select class='select-cssSer' id='TServicios' name='TServicios'>";
							while ($fila = mysqli_fetch_array($resultado)) {
								echo '<option value="'.$fila['ID_SERVICIO'].'">'.$fila['NOMBRE_SERVICO'].'</option>';
								
							}
							echo "</select>";
			                   
							?>	
								
					
							
				<div id="select2lista" class="cajas">
				</div>				
				
						
				<!--Cajas de texto del fomrulario datos domicilio-->		
				<input type="date" name="FechaDipo" placeholder="Fecha disponible" class="fecha">
				<input type="text" name="Direccion" placeholder="Direccion" class="direccion">
				<input type="submit" class="submit" value="Solicitar Hora">

				</form>
		</div>

	</div>
</div>
<!--Botones limpiar y volver al menu principal de la plataforma-->
<a href="Estructura_cliente_menu.php"><input type="submit" class="submitVolver" value="Volver al inicio" ></a>
</div>
<center/>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#TServicios').val(1);
		recargarLista();

		$('#TServicios').change(function(){
			recargarLista();
		});
	})
</script>

<script type="text/javascript">
	function recargarLista(){
		$.ajax({
			type:"POST",
			url:"ValidarSelectCliente.php",
			data:"continente=" + $('#TServicios').val(),
			success:function(r){
				$('#select2lista').html(r);
			}
		});
	}
</script>

</body>
</html>
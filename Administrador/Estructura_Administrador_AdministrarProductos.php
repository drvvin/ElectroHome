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
	<link rel="stylesheet" type="text/css" href="EstiloalternativoAA.css">
	<link rel="stylesheet" type="text/css" href="AdminProducto.css">
	<!--Link para habilitar iconos descargados de la pagina awesome-->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<!--Link para habilitar las interfaz con celulares-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--SCRIP que permite la funcion de actualizacion en los campos del combo box-->
	<script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
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
							<a href="Estructura_Administrador_contactanos.php"><input type="button" class="QuienesSomos_btn" value="Quienes somos"></a>
						</td>
						<!--Boton contactanos-->
						<td class="columnaTabla">
							<a href="Estructura_Administrador_Quienesomos.php"><input type="button" class="Contactanos_btn" value="Contactanos"></a>
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
			<nav>
				<!--Redireccion para cada hreft del menu despegable-->
				<a href="Estructura_Administrador_menu.php"><i class="fas fa-home"></i><span> Inicio</span></a>
				<a href="Estructura_Administrador_VerSolicitudes.php"><i class="fas fa-calendar-week"></i><span> Buzon de solicitudes</span></a>
				<a href="Estructura_Administrador_AdministrarServicios.php"><i class="fas fa-eye"></i><span> Administrar servicios</span></a>
				<a href="Estructura_Administrador_AdministrarProductos.php"><i class="fas fa-address-card"></i><span> Administrar productos</span></a>
				<a href="cerrarSesion.php" class="CS"><i class="fas fa-sign-out-alt"><span> Cerrar sesion</span></i></a>
			</nav>
			<label for="btn-menu">✖️</label>
		</div>
	</div>

	<!--Comienzo del contenido central de la pagina -->
	<div class="contenido">
		<div class="tittle">
		<!--Titulo del contenido central -->
		<br/><h1>Administrar Productos</h1>
		</div>
		<div class="envase">
			<div class="contenidodivmicuenta">
				<!--Subtitulo del div dentro del contenido central -->
				<p class="subtitulosMiCuenta">Agregar Producto</p>
				<form action="Validador/ValidarAdminProdAgreg.php" method="post">
					<div class="detallesCajas">
						<!--Caja de texto nombre del producto-->
						<div class="cajas">
							<span class="detalle">Nombre del producto</span>
							<input type="text" name="Nombre" placeholder="Ingrese el nombre del producto" required>
						</div>
						<!--Caja de texto descripcion-->
						<div class="cajas">
							<span class="detalle">Descripcion</span>
							<input type="text" name="Descripcion" placeholder="Ingrese alguna descripcion" required>
						</div>
						<!--Caja de texto precio-->
						<div class="cajas">
							<span class="detalle">Precio</span>
							<input type="number" name="Precio" placeholder="Ingrese un precio" required>
						</div>
						<!--Caja de texto cantidad-->
						<div class="cajas">
							<span class="detalle">Cantidad</span>
							<input type="number" name="Cantidad" min="1" max="250" placeholder="Ingrese un stock" equired>
						</div>
					</div>
					<!--Boton para guardar la agregacion de un producto-->
					<div class="botonMiCuenta">
						<input type="submit" value="Guardar">
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="contenido">
		<div class="envase">
			<div class="contenidodivmicuenta">
				<!--Subtitulo del div dentro del contenido central -->
				<p class="subtitulosMiCuenta">Modificar Producto</p>
				<div class="detallesCajas">
					<form action="Validador/ValidarAdminProdMod.php" class="formularioc" method="post">
						<div class="">
							<!--Combobox cargado con los productos de la base de datos-->
							<br><span class="detalle">Seleccion un producto para modificar</span>
							<?php	
							$enlace = mysqli_connect("localhost","root","");
							mysqli_select_db($enlace,"electricidad");
							$tilde = $enlace ->query("SET NAMES 'utf-8'");
							/**
							*Consulta a la base de datos todos los productos para ingresarlos al combobox.
							*/	
							$result = mysqli_query($enlace,"SELECT IDPRODUCT, PRODUCTO FROM productos");
							echo"<select class='select-cssSer' id='productos' name='Producto'>";
							while ($fila = mysqli_fetch_array($result)) {
								echo '<option value="'.$fila['IDPRODUCT'].'">'.$fila['PRODUCTO'].'</option>';
							}
							echo "</select>";
							mysqli_free_result($result);
							mysqli_close($enlace);
							?>	
						</div>
						<!--Div donde se ingresara la informacion y campo de texto que se iran actualizanda cada ves que el usuario selecciones otro producto en el combobox-->
						<div id="select2lista" class="cajas" >	
						</div>
					</div>
					<!--Boton para guardar la modificacion de un producto-->
					<div class="botonMiCuenta">
						<br><input type='submit' value='Modificar'>
					</div>
				</form>
			</div>
		</div>		
	</div>	
</body>
</html>

<script type="text/javascript">
	//Funcion rescatar la id del producto seleccionado en el combobox y enviarlo a la funcion recargarLista().
	$(document).ready(function(){
		$('#productos').val(1);
		recargarLista();

		$('#productos').change(function(){
			recargarLista();
		});
	})
</script>

<script type="text/javascript">
	//Funcion para enviar la informacion y la accion a ValidarFormMod.php para actualizar la informacion una ves seleccione un producto.
	function recargarLista(){
		$.ajax({			
			type:"POST",
			url:"Validador/ValidarFormMod.php",
			data:"continente=" + $('#productos').val(),
			success:function(r){
				$('#select2lista').html(r);
			}
		});
	}
</script>

<script type="text/javascript">
	//Funcion para escribir solo numeros.
			type:"POST",
	$(function(){
		$('.validanumericos').keypress(function(e) {
			if(isNaN(this.value + String.fromCharCode(e.charCode))) 
				return false;
		})
		.on("cut copy paste",function(e){
			e.preventDefault();
		});
</script>

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
/**
*Consulta a la base de datos para acceder a todas las solicitudes
*/
$idboleta=$_POST['boleta1'];
$conexion = mysqli_connect("localhost", "root","" ,"electricidad");
$consulta="SELECT * FROM productos_utilizados where NROBOL ='$idboleta'";
$resultado=mysqli_query($conexion,$consulta);
?>
<!DOCTYPE html>
<html>
<head>
	<!--Redirrecion a comandos css para modificar el estilo de la pagina-->
	<link rel="stylesheet" type="text/css" href="Estiloalternativo.css">
	<link rel="stylesheet" type="text/css" href="AdministradorBuzon.css">
	<!--Link para habilitar iconos descargados de la pagina awesome-->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<!--Link para habilitar las interfaz con celulares-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
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
	<center>
	<div class="contenido">
		<!--Titulo del contenido central-->
		<div class="tittle">
		<h1>Agregar productos</h1>
		</div>
		<div class="detallesCajas">
			<form action="Validador/agreProBol.php" class="formularioc" method="post">
				<div class="dv">
					<br><span class="detalle">Seleccion un producto para agregar a la boleta</span><br/><br/>
					<!--Rellenar un conbo box con consulta-->
					<?php	
					/**
					*Consulta a la base de datos todos los productos para ingresarlos al combobox.
					*/	
					echo "<input type='text' value='".$idboleta."' name='boleta5' hidden>";
					$consulta3="SELECT * FROM productos";
					$resultado3=mysqli_query($conexion,$consulta3);
					//Relleno del combobox.	
					echo"<select class='SelectCss' id='productos' name='producto'>";
					while ($fila = mysqli_fetch_array($resultado3)) {
						echo '<option value="'.$fila['IDPRODUCT'].'">'.$fila['PRODUCTO'].'</option>';	
					}
					echo "</select>";
					?>	
					<!--Div donde se ingresara la informacion y campo de texto que se iran actualizanda cada ves que el usuario selecciones otro producto en el combobox-->
					<div id="select2lista" class="cajas" >	
					</div>
				</div>
			</div>
			<!--Boton agregar producto-->
			<div class="botonMiCuenta">
				<br><input type='submit' class="bon" value='Agregar producto'>
			</div>
		</form>
	</div>

	<!--Funcion SCRIP para hacer el llamado a la funcion regarlista y enviar la id de productos-->
	<script type="text/javascript">
		$(document).ready(function(){
			$('#productos').val(1);
			recargarLista();

			$('#productos').change(function(){
				recargarLista();
			});
		})
	</script>
	<!--Funcion SCRIP para enviar el id producto con un metodo post a la url (Validador/ValidarSelectProd.php) para rescatar la informacion de dese producto-->
	<script type="text/javascript">
		function recargarLista(){
			$.ajax({
				type:"POST",
				url:"Validador/ValidarSelectProd.php",
				data:"continente=" + $('#productos').val(),
				success:function(r){
					$('#select2lista').html(r);
				}
			});
		}
	</script>
	<!--Funcion SCRIP para solo ingresar numeros en campo de textos-->
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

	<div id="main-container">
		<table class="tablaVerSolicitudes">
			<thead class="ThTablaVerSolicitudes">
				<tr class="trSolicitudes">
					<th class="thSolicitudes">Producto</th><th class="thSolicitudes">Cantidad</th><th class="thSolicitudes">Precio unitario</th>
					<th class="thSolicitudes">Eliminar producto</th>
				</tr>
			</thead>
			<tr>
				<?php 
				while ($row=mysqli_fetch_assoc($resultado)) {
					/*
					row1-- numero 1 es para primera quary (solicitudes realizadas)
					row2-- numero 2 es para 2da quary (productos)
					row3-- numero 3 es para 3ra quary (producto)
					row4-- numero 5 es para 4ta quary (Servicio)
					*/
					$idproduct=$row['IDPRODUCT'];
					$cant=$row['CANTIDADP'];
					/**
					*Consulta a la base de datos para buscar solicitudes atraves de su id.
					*/	       
					$consulta2="SELECT * FROM productos where IDPRODUCT ='$idproduct'";
					$resultado2=mysqli_query($conexion,$consulta2);
                 	//buscar id de producto
					while ($row2=mysqli_fetch_assoc($resultado2)) {
						echo "<td class='tdSolicitudes'>";  
						echo $row2['PRODUCTO']  ;
						echo "</td>";
						echo "<td class='tdSolicitudes'>"; 

						echo $cant;  
						echo "</td>";
						echo "<td class='tdSolicitudes'>";  
						echo $row2['VALOR']  ;
						echo "</td>";
					}
					echo "<form action='Validador/elimProBol.php' class='formularioc' method='post'>";
					echo "<td class='tdSolicitudes'>";  
					echo "<input type='text' class='tol' value='".$row['PRODUCT_UTI']."' name='idprel' hidden>";  
					echo "<input type='submit' class='tol' value='Eliminar producto' name='eliminar'>";  
					echo "</td>";
					echo "</form>";
					echo "</tr>";		     
				}
				?>
			</table>
		</div>
		</center>
	</div>

</body>
</html>
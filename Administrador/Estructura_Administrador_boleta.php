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
*Consulta a la base de datos para conseguir variable de solicitud.
*/
$idboleta=$_POST['boleta'];
$conexion = mysqli_connect("localhost", "root","" ,"electricidad");
$consulta="SELECT * FROM boleta where nrobol ='$idboleta'";
$resultado=mysqli_query($conexion,$consulta);
//buscar id de servicio
while ($row=mysqli_fetch_assoc($resultado)) {
	$servicio=$row['ID_SERVICIO'];
}
/**
*Consulta a la base de datos para buscar el servicio con la id anterior.
*/
$consulta2="SELECT * FROM servicios where ID_SERVICIO ='$servicio'";
$resultado2=mysqli_query($conexion,$consulta2);

/**
*Consulta a la base de datos para buscar las solicitudes echas para asi poder encontrar al cliente.
*/
$consulta3="SELECT * FROM solicitudes_realizadas where NROBOL ='$idboleta'";
$resultado3=mysqli_query($conexion,$consulta3);
//buscar la id del usuario
while ($row3=mysqli_fetch_assoc($resultado3)) {
	$idusu=$row3['ID_USUARIO'];
}
/**
*Consulta a la base de datos para buscar al usuario con su id para despues recorrer sus datos.
*/
$consulta4="SELECT * FROM usuario where ID_USUARIO ='$idusu'";
$resultado4=mysqli_query($conexion,$consulta4);
/**
*Consulta a la base de datos para selecionar los productos utilizados, se rescatan los productos y la cantidad de estos.
*/
$consulta5="SELECT * FROM productos_utilizados where NROBOL ='$idboleta'";
$resultado5=mysqli_query($conexion,$consulta5);
/**
*Consulta a la base de datos para selecionar los productos utilizados en una boleta.
*/
$consulta7="SELECT * FROM productos_utilizados where NROBOL ='$idboleta'";
$resultado7=mysqli_query($conexion,$consulta7);
?>
<!DOCTYPE html>
<html>
<head>
	<!--Redirrecion a comandos css para modificar el estilo de la pagina-->
	<link rel="stylesheet" type="text/css" href="Estiloalternativo.css">
	<link rel="stylesheet" type="text/css" href="AdminBoleta.css">
	<!--Link para habilitar iconos descargados de la pagina awesome-->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<!--Link para habilitar las interfaz con celulares-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
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
		<div class="envase">
			<div class="contenidodivmicuenta">
				<!--Titulo del encabezado del contenido-->
				<p class="TituloBoleta">BOLETA</p><br>
				<div class="detallesCajas" style="border: ridge #858543 2px;">
					<!--Informacion del cliente rescatada por php-->
					<h3>Informacion del cliente: </h3><br/>
					<img src="ImagenesMenuAdmin/barra.png" class="barra">
					<table>
						<tr>
							<td class="tabla_1">
						<span class="detalle">Nombre: </span>
					</td>

					<td class="tabla_2">
						<?php
							//Cargar el nombre del cliente
						while($row4=mysqli_fetch_assoc($resultado4)){
							echo "<input type='text' class='cajita' value=' ".$row4['NOMBRE']."' name='nombrescliente' readonly>";
							?>
						</td>
					</tr>
					<tr>
						<td class="tabla_1">
							<span class="detalle">Rut:</span>
						</td>
						<td class="tabla_2">
							<?php
							//Cargar el rut del cliente
							echo "<input type='text' class='cajita' value=' ".$row4['RUT']."' name='rut' readonly>";
							?>
						</td>
						</tr>
						<tr>
						<td class="tabla_1">
							<span class="detalle">Direccion: </span>
						</td>
						<td class="tabla_2">
							<?php
							//Cargar Dirrecion
							echo "<input type='text' class='cajita' value=' ".$row4['DIRECCION']."' name='direccion' readonly>";
						}
						?>
					</td>
				</tr>
					</table>	
				</div>
				<div class="detallesCajas" style="border: ridge #858543 2px;">
					<h3>Informacion servicio: </h3>

					<img src="ImagenesMenuAdmin/barra.png" class="barra">
					<table>
					<tr>
						<td class="tabla_1">
						<span class="detalle">Nombre de servicio: </span>
							</td>
						<td class="tabla_2">
						<?php
							//Cargar el nombre del servicio
						while($row2=mysqli_fetch_assoc($resultado2)){
							echo "<input type='text' class='cajita' value=' ".$row2['NOMBRE_SERVICO']."' name='nombreservicio' readonly>";
							?>
						</td>
						</tr>
						<tr>
						<td class="tabla_1">
							<span class="detalle">Descripcion:</span>
								</td>
								<td class="tabla_2">
							<?php
							//Cargar la descripcion del servicio
							echo "<input type='text' class='cajita' value=' ".$row2['DESCRIPCION']."' name='descservicio' readonly>";
							?>
						</td>
						</tr>
						<tr>
						<td class="tabla_1">
							<span class="detalle">Valor servicio: </span>
						</td>
						<td class="tabla_2">
							<?php
							//Cargar precio del servicio
							$precioservici=$row2['PRECIO_SERVICIO'];
							echo "<input type='text' class='cajita' value=' ".$row2['PRECIO_SERVICIO']."' name='precioservicio' readonly>";
						}
						?>
					   </td>
					</tr>
					</table>
					<div>
						<span class="detalle">Productos utilizados: </span>
						<br>
						<table border="solid">
							<tr class="trSolicitudes">
								<td class="thSolicitudes">Producto</td>
								<td class="thSolicitudes">Precio unitario</td>
								<td class="thSolicitudes">Cantidad</td>
								<td class="thSolicitudes">Precio total</td>
							</tr>
							<?php

							while($row7=mysqli_fetch_assoc($resultado7)){
							    //buscar id de producto

								$idproducto=$row7['IDPRODUCT'];
                 	            //Dentro de productos, se requiere sacar el nombre y precio
								$consulta6="SELECT * FROM productos where IDPRODUCT ='$idproducto'";
								$resultado6=mysqli_query($conexion,$consulta6);
								while($row6=mysqli_fetch_assoc($resultado6)){

									$preciopr=$row6['VALOR'];
									echo "<tr>";
									echo "<td class='tabla_2'>";
							        //Cargar el nombre del producto
									echo $row6['PRODUCTO'];
									echo "</td>";

									echo "<td class='tabla_2'>";
							        //Cargar el precio unitario
									echo  $preciopr;
									echo "</td>";
								}


								$cant=$row7['CANTIDADP'];
								echo "<td class='tabla_2'>";
							    //Cargar la cantidad
								echo $cant;
								echo "</td>";


								echo "<td class='tabla_2'>";
                       		    //Cargar precio total
								$preciototal=  $preciopr * $cant;
								$acumpreciototal = $acumpreciototal+$preciototal;
								echo $preciototal;
								echo "</td>";

								echo "</tr>";
							}
							?>
						</table>
						<br><br>
					</div>

					<form action='Validador\agregarDatosBol.php' method='POST'>
						<table>
							<tr>
						<td class="tabla_1">
							<span class="detalle">Costo IVA: </span>
						</td>
						<td class="tabla_2">
							<?php
							//Precio neto (suma de servicio mas los productos)
							$precioneto= $precioservici + $acumpreciototal;
							//Costo de iva
							$iva = (float)$precioneto*19; //  iva
							//Precio con iva
                        	$precioiva = $iva / 100;
                        	// Quitar los decimales
                       		$precioiva = round($precioiva, 0); 
                              $preciobruto = $precioiva+$precioneto; 
                              echo "<input type='text' class='cajita' value=' ".$precioiva."' name='costoiva' readonly>";
                              ?>
                          </td>
                          </tr>
                          <tr>
                          <td class="tabla_1">
                          	<span class="detalle">Precio NETO: </span>
                          </td>
                          	<!--Mostrar el precio neto-->
                          	<td class="tabla_2">
                          	<?php
                          	echo "<input type='text' class='cajita' value=' ".$precioneto."' name='precionetp' readonly>";
                          	?>
                          </td>
                          </tr>
                          <tr>
                          <td class="tabla_1">
                          	<span class="detalle">Precio total IVA: </span>
                          </td>
                          	<!--Mostrar el precio total del iva-->
                          	<td class="tabla_2">
                          	<?php
                          	echo "<input type='text' value='".$idboleta."' name='boleta3' hidden>";
                          	echo "<input type='text' class='cajita' value=' ".$preciobruto."' name='preciototal' readonly>";
                          	?>
                          </td>
                      </tr>
                      </table>
                      <br/>
                      <!--Boton agregar servicios para mandar los datos una ves terminado el formulario-->
                      <div class="botonAgregarServicio">
                      	<input type="submit" value="Guardar boleta">
                      </div>

                  </form>
              </div>
              </center>
          </div>
      </div>
  </body>
  </html>
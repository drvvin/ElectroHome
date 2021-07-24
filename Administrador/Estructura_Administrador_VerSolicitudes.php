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
*Conexion a la base de datos para rescatar todas las solicitudes realizadas.
*/
$conexion = mysqli_connect("localhost", "root","" ,"electricidad");
$consulta="SELECT * FROM solicitudes_realizadas";
$resultado=mysqli_query($conexion,$consulta);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!--Redirrecion a comandos css para modificar el estilo de la pagina-->
	<link rel="stylesheet" type="text/css" href="EstiloalternativoVS.css">
	<link rel="stylesheet" type="text/css" href="AdministradorBuzon.css">
	<!--Link para habilitar iconos descargados de la pagina awesome-->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<!--Link para habilitar las interfaz con celulares-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
	<script>
		function open_windows(){
			window.open("http://localhost/Administrador/Estructura_Administrador_AgendarHorasAdicionales.php");
		}
	</script>
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
			<div class="logo">
				<!--Logo de la empresa en la barra superior-->
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
			<!--Redireccion para cada hreft del menu despegable-->
			<nav>
				<a href="Estructura_Administrador_menu.php"><i class="fas fa-home"></i><span> Inicio</span></a>
				<a href="Estructura_Administrador_VerSolicitudes.php"><i class="fas fa-calendar-week"></i><span> Buzon de solicitudes</span></a>
				<a href="Estructura_Administrador_AdministrarServicios.php"><i class="fas fa-eye"></i><span> Administrar servicios</span></a>
				<a href="Estructura_Administrador_AdministrarProductos.php"><i class="fas fa-address-card"></i><span> Administrar productos</span></a>
			
				<a href="cerrarSesion.php" class="CS"><i class="fas fa-sign-out-alt"><span> Cerrar sesion</span></i></a>
			</nav>
			<label for="btn-menu">✖️</label>
		</div>
	</div>



	<!--barralateral terminado -->
	<center>
		<div class="contenido">
			<div class="tittle">
			<h1>Buzón de Solicitudes</h1>
			</div>
			<div id="main-container">
				<table class="tablaVerSolicitudes">
					<thead class="ThTablaVerSolicitudes">
						<tr class="trSolicitudes">
							<th class="thSolicitudes">Fecha</th><th class="thSolicitudes">Estado</th><th class="thSolicitudes">Tipo de servicio</th><th class="thSolicitudes">Nombre del cliente</th>
							<th class="thSolicitudes">Boleta</th><th class="thSolicitudes">Añadir productos</th><th class="thSolicitudes">Añadir horas adicionales</th></tr>
						</thead>

						<?php 

						while ($row=mysqli_fetch_assoc($resultado)) {
						/*
						vrow1-- numero 1 es para primera quary (solicitudes realizadas)
						* row2-- numero 2 es para 2da quary (Solicitud)
						* row3-- numero 3 es para 3ra quary (boleta)
						* row4-- numero 4 es para 4ta quary (Servicio)
						*/
						$nrosol=$row['NRO_SOL'];
						$idusu=$row['ID_USUARIO'];
               		    /*
						* Llamado a la base de datos para buscar una solicitud
						*/
						$consulta2="SELECT * FROM solicitud where nro_sol ='$nrosol'";
						$resultado2=mysqli_query($conexion,$consulta2);
                 		/*
						* Llamado a la base de datos para buscar una boleta dedicada a una solcitud
						*/
						$nrobol=$row['NROBOL'];
						$consulta3="SELECT * FROM boleta where nrobol ='$nrobol'";
						$resultado3=mysqli_query($conexion,$consulta3);
                		/*
						* Llamado a la base de datos para buscar id de un servicio
						*/
						while ($row3=mysqli_fetch_assoc($resultado3)) {
							$servicio=$row3['ID_SERVICIO'];
                 			//se rescata boleta para poder enviarla en los formularios de abajo
							$boleta=$row3['NROBOL'];
						}
         				/*
						* Llamado a la base de datos para buscar el servicio con la id anterior
						*/
						$consulta4="SELECT * FROM servicios where ID_SERVICIO ='$servicio'";
						$resultado4=mysqli_query($conexion,$consulta4);
                  	    /*
						* Llamado a la base de datos para buscar nombre del usuario
						*/
						$consulta5="SELECT * FROM usuario where ID_USUARIO ='$idusu'";
						$resultado5=mysqli_query($conexion,$consulta5);

                		//imprimir solicitudes
						while($row2=mysqli_fetch_assoc($resultado2)){

							echo "<tr class='trSolicitudes'>";
							echo "<td class='tdSolicitudes'> ";

							echo $row2['start'];

							echo " </td>";

							echo "<form action='Validador/ValidarSelectTabla.php' method='POST'>";
							echo "<td class='tdSolicitudes'> ";
							$idselect=$row2['NRO_SOL'];
							echo "<input type='text' value='".$idselect."' name='idfila' hidden>";
							echo"<select class='select-cssSer'  id='estado' name='estado'>";
							if ($row2['ESTADO_SOL'] == "Aceptado") {
								echo '<option value="Aceptado" value=Aceptado selected>'.$row2['ESTADO_SOL'].'</option>';
								echo '<option value="Rechazado" value=Rechazado >Rechazado</option>';
								echo '<option value="Pendiente" value=Pendiente>Pendiente</option>';

							}else if($row2['ESTADO_SOL'] == "Rechazado"){


								echo '<option value="Aceptado" value=Aceptado> Aceptado</option>';
								echo '<option value="Rechazado" value=Rechazado selected>'.$row2['ESTADO_SOL'].'</option>';
								echo '<option value="Pendiente" value=Pendiente>Pendiente</option>';
							}else{

								echo '<option value="Aceptado" value=Aceptado>Aceptado</option>';
								echo '<option value="Rechazado" value=Rechazado>Rechazado</option>';
								echo '<option value="Pendiente" value=Pendiente selected>'.$row2['ESTADO_SOL'].'</option>';
							}

							echo "</select>";
							echo"<input type='submit' value='Cambiar' class='button'>";
							echo "</form>";
							echo "</td>";  

						}
						echo "<td class='tdSolicitudes'>";    
          				/*
						* Llamado a la base de datos para buscar el nombre del servicio
						*/
						while ($row4=mysqli_fetch_assoc($resultado4)){                             
							echo $row4['NOMBRE_SERVICO'];
						}
						echo "</td>";
						echo "<td class='tdSolicitudes'>";    
                		//Mostrar el nombre y apellido del cliente
						while ($row5=mysqli_fetch_assoc($resultado5)) {
							echo $row5['NOMBRE']." ";
							echo $row5['APELLIDOS'];

						}
						echo "</td>";
                		//boleta
						echo "<form action='Estructura_Administrador_boleta.php' method='POST'>";
						echo "<td class='tdSolicitudes'> ";
						echo "<input type='text' value='".$boleta."' name='boleta' hidden>";
						echo "<input type='submit' value='Ver boleta'  class='button'>";
						echo "</td>";
						echo "</form>";

						echo "<form action='Estructura_Administrador_agregarprod.php' method='POST'>";
						echo "<td class='tdSolicitudes'> ";
						echo "<input type='text' value='".$boleta."' name='boleta1' hidden>";
						echo "<input type='submit' value='Añadir productos'  class='button'>";
						echo "</td>";
						echo "</form>";
						echo "<form action='Estructura_Administrador_AgendarHorasAdicionales.php' method='POST'>";
						echo "<td class='tdSolicitudes'> ";
						echo "<input type='text' value='".$nrosol."' name='nrosol' hidden>";
						echo "<input type='submit' value='Ingresar horas adicionales' class='button'>";
						echo "</td>";
						echo "</form>";
					}

					echo "</tr>";
					?>
				</center>
				</table>
			</div>
		</div>
	</body>
	</html>
<?php
session_start();
$id_usuario = $_SESSION['id_usuario'];
//usuario lleva consigo el nombre
$varsesion = $_SESSION['usuario'];
if ($varsesion=null || $varsesion = '') {
	echo "No posee autorizacion para ingresar";
	die();
}
$conexion = mysqli_connect("localhost", "root","" ,"electricidad");
//acceder a todas las solicitudes
$consulta="SELECT * FROM solicitudes_realizadas where id_usuario ='$id_usuario'";
$resultado=mysqli_query($conexion,$consulta);

//buscar solicitudes (id de solicitudes)


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="EstiloalternativoMS.css">
	<link rel="stylesheet" type="text/css" href="ClienteMisSolicitudes.css">
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
				<a href="Estructura_cliente_menu.html"><img src="ImagenesMenuCliente\logo.png"></a>
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

	<div class="contenido"><br/>
		<center>
		<h1>Mis solicitudes</h1>
		<h3>Acá podrás revisar y consultar acerca del estado de todas <br/> las solicitudes y consultas  que has realizado a través de nuestro sistema</h3>

		<div id="main-container">

			<table class="tablaVerSolicitudes">
				<thead class="ThTablaVerSolicitudes">
					<tr class="trSolicitudes">
						<th class="thSolicitudes">Fecha</th><th class="thSolicitudes">Estado</th><th class="thSolicitudes">Dirección</th><th class="thSolicitudes">Tipo de servicio</th>
					</tr>
				</thead>
				<?php 
				while ($row=mysqli_fetch_assoc($resultado)) {
/*
row1-- numero 1 es para primera quary (solicitudes realizadas)
row2-- numero 2 es para 2da quary (Solicitud)
row3-- numero 3 es para 3ra quary (boleta)
row4-- numero 4 es para 4ta quary (Servicio)
*/

$nrosol=$row['NRO_SOL'];

                 //buscar solicitudes
$consulta2="SELECT * FROM solicitud where nro_sol ='$nrosol'";
$resultado2=mysqli_query($conexion,$consulta2);
                  //Buscar boleta dedicada a solicitud
$nrobol=$row['NROBOL'];

$consulta3="SELECT * FROM boleta where nrobol ='$nrobol'";
$resultado3=mysqli_query($conexion,$consulta3);
                 //buscar id de servicio
while ($row3=mysqli_fetch_assoc($resultado3)) {
	$servicio=$row3['ID_SERVICIO'];

}
          //buscar el servicio con la id anterior
$consulta4="SELECT * FROM servicios where ID_SERVICIO ='$servicio'";
$resultado4=mysqli_query($conexion,$consulta4);

                 //imprimir solicitudes
while($row2=mysqli_fetch_assoc($resultado2)){

	echo "<tr class='trSolicitudes'>";
	echo "<td class='tdSolicitudes'> ";

	echo $row2['start'];

	echo " </td>";
	echo "<td class='tdSolicitudes'> ";
	echo $row2['ESTADO_SOL'];

	echo "</td>";
	echo "<td class='tdSolicitudes'>";
	echo $row2['DIRECCIONS'];

	echo "</td>";
}
echo "<td class='tdSolicitudes'>";    
           //buscar nombre del servicio
while ($row4=mysqli_fetch_assoc($resultado4)){                             
	echo $row4['NOMBRE_SERVICO'];

}
}

echo "</td>";
echo "</tr>";
?>


</table>
</center>
</div>

</div>

</body>
</html>
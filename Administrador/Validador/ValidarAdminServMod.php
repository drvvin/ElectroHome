<?php
$Id = $_POST["Id"];
$nombre = $_POST["Servicios"];
$descripcion = $_POST["Descripcion"];
$precio = $_POST["Precio"];
$estado = $_POST["estado"];

if ($estado == "Disponible") {
	$estadonum=1;
}else{
   $estadonum=0;
}

$enlace = mysqli_connect("localhost","root","");
mysqli_select_db($enlace,"electricidad");
$tilde = $enlace ->query("SET NAMES 'utf-8'");
$enlace ->query("UPDATE servicios set NOMBRE_SERVICO='".$nombre."', DESCRIPCION='".$descripcion."', PRECIO_SERVICIO='".$precio."', ESTADO_SERVICIO='".$estadonum."' where 	ID_SERVICIO='".$Id."'");

header( "refresh:0;url=../Estructura_Administrador_AdministrarServicios.php?" );
?>
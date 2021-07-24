<?php
$id= $_GET["id"];
$nombre = $_GET["NOMBRE"];
$apellido = $_GET["APELLIDOS"];
$rut = $_GET["RUT"];
$correo = $_GET["CORREO"];
$Contraseña = $_GET["CONTRASENA"];
$direccion = $_GET["DIRECCION"];
$nro_casa = $_GET["NRO_CASA"];
$bloque = $_GET["BLOQUE"];
$telefono = $_GET["TELEFONO"];
$enlace = mysqli_connect("localhost","root","");
mysqli_select_db($enlace,"electricidad");
$tilde = $enlace ->query("SET NAMES 'utf-8'");
$enlace ->query("UPDATE usuario set NOMBRE='".$nombre."', APELLIDOS='".$apellido."', RUT='".$rut."', CORREO='".$correo."', CONTRASENA='".$Contraseña."', DIRECCION='".$direccion."', NRO_CASA='".$nro_casa."', BLOQUE='".$bloque."', TELEFONO='".$telefono."' where ID_USUARIO='".$id."'");

header( "refresh:0;url=Estructura_cliente_micuenta.php?" );
?>
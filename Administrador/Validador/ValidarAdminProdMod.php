<?php
$Id = $_POST["Id"];
$Producto = $_POST["Producto"];
$Descripcion = $_POST["Descripcion"];
$Precio = $_POST["Precio"];
$Cantidad = $_POST["Cantidad"];

$enlace = mysqli_connect("localhost","root","");
mysqli_select_db($enlace,"electricidad");
$tilde = $enlace ->query("SET NAMES 'utf-8'");
$enlace ->query("UPDATE productos set PRODUCTO='".$Producto."', CANTIDAD='".$Cantidad."', VALOR='".$Precio."', DESCRIPCIONPROD='".$Descripcion."' where IDPRODUCT='".$Id."'");

header( "refresh:0;url=../Estructura_Administrador_AdministrarProductos.php?" );

?>
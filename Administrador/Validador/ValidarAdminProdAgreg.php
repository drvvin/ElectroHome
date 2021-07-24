<?php

$nombre = $_POST['Nombre'];
$descripcion = $_POST['Descripcion'];
$precio = $_POST['Precio'];
$cantidad = $_POST['Cantidad'];


//conexion a bd
$conexion = mysqli_connect("localhost", "root","" ,"electricidad");


//suma para clave primaria
$consulta="SELECT * FROM productos";
$resultado=mysqli_query($conexion,$consulta);
$filas=mysqli_num_rows($resultado);
$id =$filas+1 ;


//insertar nuevo producto cliente
$consulta2="INSERT INTO `productos` (`IDPRODUCT`, `PRODUCTO`, `CANTIDAD`, `VALOR`, `DESCRIPCIONPROD`) VALUES ('".$id."', '".$nombre."', '".$cantidad."', '".$precio."', '".$descripcion."') ";
$resultado=mysqli_query($conexion,$consulta2);
mysqli_close($conexion);

header( "refresh:0;url=../Estructura_Administrador_AdministrarProductos.php?" );
?>


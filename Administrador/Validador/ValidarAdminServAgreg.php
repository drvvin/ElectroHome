<?php

$nombre = $_POST['Nombre'];
$descripcion = $_POST['Descripcion'];
$precio = $_POST['Precio'];
$estado = $_POST['Estado'];

//conexion a bd
$conexion = mysqli_connect("localhost", "root","" ,"electricidad");

//suma para clave primaria
$consulta="SELECT * FROM servicios";
$resultado=mysqli_query($conexion,$consulta);
$filas=mysqli_num_rows($resultado);

$id =$filas+1 ;



//insertar nuevo producto cliente
$consulta2="INSERT INTO `servicios` (`ID_SERVICIO`, `NOMBRE_SERVICO`, `DESCRIPCION`, `PRECIO_SERVICIO`, `ESTADO_SERVICIO`) VALUES ('".$id."', '".$nombre."', '".$descripcion."', '".$precio."', '1') ";
$resultado=mysqli_query($conexion,$consulta2);
mysqli_close($conexion);

header( "refresh:0;url=../Estructura_Administrador_AdministrarServicios.php?" );
?>
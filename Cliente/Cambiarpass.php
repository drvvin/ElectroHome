<?php
echo "<meta charset='utf-8'>";
session_start();
$id = $_SESSION['id_usuario'];
//usuario lleva consigo el nombre
$varsesion = $_SESSION['usuario'];

$contraActual = $_GET["password1"];
$NuevaContra = $_GET["NewPassword"];
$NuevaConfirmContra = $_GET["NewConfirmPassword"];

$enlace = mysqli_connect("localhost","root","");
mysqli_select_db($enlace,"electricidad");
$tilde = $enlace ->query("SET NAMES 'utf-8'");
$result = mysqli_query($enlace,"SELECT * FROM usuario WHERE ID_USUARIO='".$id."'");
$extraido= mysqli_fetch_array($result);
$pass = $extraido['CONTRASENA'];

if ($pass == $contraActual) {
	if ($NuevaContra == $NuevaConfirmContra) {
		$enlace = mysqli_connect("localhost","root","");
		mysqli_select_db($enlace,"electricidad");
		$tilde = $enlace ->query("SET NAMES 'utf-8'");
		$enlace ->query("UPDATE usuario set CONTRASENA='".$NuevaConfirmContra."' WHERE ID_USUARIO='".$id."'");

		echo "<script>alert('Contraseña Cambiada Correctamente');</script>";
		header( "refresh:0;url=Estructura_cliente_micuenta.php?" );
	}else{
		echo "<script>alert('Las Contraseñas no son iguales');</script>";
		header( "refresh:0;url=Estructura_cliente_micuenta.php?" );
	}
}else{
	echo "<script>alert('La Contraseña Actual es incorrecta');</script>";
	header( "refresh:1;url=Estructura_cliente_micuenta.php?" );
}


?>
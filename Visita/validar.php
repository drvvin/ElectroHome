
<?php
$email = $_POST['email'];
$password = $_POST['password'];
//conexion a bd
$conexion = mysqli_connect("localhost", "root","" ,"electricidad");
$consulta3="SELECT * FROM usuario where correo ='$email' and contrasena='$password'";
$resultado3=mysqli_query($conexion,$consulta3);
//ver si se encontro o no

while ($row1 = mysqli_fetch_array($resultado3)) {
	if ($password == $row1['CONTRASENA']) {
		$acum= 1;
	}
}

if ($acum == 0) {
	echo "<script>alert('Contraseña Incorrecta');</script>";
	header( "refresh:0;url=Login.php?" );
	die();
}else{
$consulta="SELECT * FROM usuario where correo ='$email' and contrasena='$password'";
$resultado=mysqli_query($conexion,$consulta);
//ver si se encontro o no
$filas=mysqli_num_rows($resultado);	
if($filas>0){
	//se abre sesion luego se asigna la variable nombre de la persona encontrada
	session_start();
	while ($row=mysqli_fetch_assoc($resultado)) {
		$_SESSION['usuario'] = $row["NOMBRE"];
		$_SESSION['id_usuario'] = $row["ID_USUARIO"];
		$permisos = $row['IDPER'];
		if ($permisos == 2) {
			header("location:..\Administrador\Estructura_Administrador_menu.php");
		}else{
			header("location:..\Cliente\Estructura_cliente_menu.php");
		}

	}
}else{
	echo "<script>alert('Contraseña o correo invalido');</script>";
	/*       */
	header("location:Login.php");

}

}




/*function mostrarDatos ($resultSet) {
..\..\Cliente\Estructura_cliente_menu.html
	$var1 = 77;
	$var2 = 92;
	

	while ($fila = mysqli_fetch_array($resultSet)){
	if ($fila !=NULL) {
		echo "- Código: <a href='vistaEnlace.php?v1=$var1&v2=$var2'>".$fila['dp_codigo']."</a><br/> ";
		echo "- Nombre: <a href='vistaEnlace.php?v1=$var1&v2=$var2&ndep=".$fila['dp_nombre']."'>".$fila['dp_nombre']."</a><br/>";
		echo "- Ranking: ".$fila['dp_ranking']."<br/>";
		echo "**********************************<br/>";}
	else {
		echo "<br/>No hay más datos!!! <br/>";
	}
}
}


mysqli_select_db($enlace, "2411u3");

$tildes = $enlace->query("SET NAMES 'utf8'"); //Manejo de tildes
$result = mysqli_query($enlace, "SELECT * FROM deporte");

mostrarDatos($result);

mysqli_free_result($result);
mysqli_close($enlace);
*/

?>
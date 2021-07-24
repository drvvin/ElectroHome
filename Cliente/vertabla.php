
<?php
//conexion a bd
session_start();
$id_usuario = $_SESSION['id_usuario'];

$conexion = mysqli_connect("localhost", "root","" ,"electricidad");
//acceder a todas las solicitudes
$consulta="SELECT * FROM solicitudes_realizadas where id_usuario ='$id_usuario'";
$resultado=mysqli_query($conexion,$consulta);
//ver si se encontro o no



mysqli_free_result($resultado);
mysqli_close($conexion);
?>
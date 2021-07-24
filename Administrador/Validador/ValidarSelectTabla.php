<!DOCTYPE html>
<html>
<head>
	<script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
	
</head>
<body>

		<?php 
		$conexion=mysqli_connect("localhost", "root","" ,"electricidad");
		$valueselect=$_POST['estado'];
		$idselect=$_POST['idfila'];

	
   
                  //modificar dato estado de pag ver solicitudes
               $consulta6="UPDATE solicitud SET ESTADO_SOL='".$valueselect."' WHERE NRO_SOL='".$idselect."'";
                   $resultado6=mysqli_query($conexion,$consulta6);
            header("location:..\..\Administrador\Estructura_Administrador_VerSolicitudes.php");
		?>
    
</body>
</html>
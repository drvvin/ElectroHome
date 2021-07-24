
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
		$idbol=$_POST['boleta2'];
		$precioiva=$_POST['costoiva'];
		$precioneto=$_POST['precionetp'];
		$preciobrutot=$_POST['preciototal'];

                  //query para select y cambie en bd
               $consulta6="UPDATE boleta SET COSTO_IVA='".$precioiva."',PRECIO_NETO='".$precioneto."',PRECIO_TOTAL='".$preciobrutot."', WHERE NROBOL='".$idbol."'";
                   $resultado6=mysqli_query($conexion,$consulta6);
                   header( "refresh:5;url=..\..\Administrador\Estructura_Administrador_VerSolicitudes.php?" );
            //header("location:..\..\Administrador\Estructura_Administrador_VerSolicitudes.php");
		?>
    
</body>
</html>
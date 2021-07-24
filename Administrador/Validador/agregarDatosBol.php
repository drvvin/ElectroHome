

		<?php 
		$idbol=$_POST['boleta3'];
		$precioiva=$_POST['costoiva'];
		$precioneto=$_POST['precionetp'];
		$preciobrutot=$_POST['preciototal'];
		$conexion=mysqli_connect("localhost", "root","" ,"electricidad");
                  //query para select y cambie en bd
		
          $consulta="UPDATE boleta SET COSTO_IVA = '".$precioiva."', PRECIO_NETO = '".$precioneto."', PRECIO_TOTAL = '".$preciobrutot."' WHERE NROBOL = '".$idbol."'";
          $resultado=mysqli_query($conexion,$consulta);
                //   header( "refresh:5;url=..\..\Administrador\Estructura_Administrador_VerSolicitudes.php?" );
            header("location:..\..\Administrador\Estructura_Administrador_VerSolicitudes.php");
		?>

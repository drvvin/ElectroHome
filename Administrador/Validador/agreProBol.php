

		<?php 
		$idproducto=$_POST['producto'];
		$cantidad=$_POST['cantidad'];
		$idboleta=$_POST['boleta5'];
		
		$conexion=mysqli_connect("localhost", "root","" ,"electricidad");
      //obtener datos para poder hacer la id de tabla automatica
       $consulta2="SELECT * FROM productos_utilizados";
        $resultado2=mysqli_query($conexion,$consulta2);
        while ($row2=mysqli_fetch_array($resultado2)) {
          $id =$row2['PRODUCT_UTI'];
        }
        $id=$id+1;
       /*  $filas=mysqli_num_rows($resultado2);
       $id =$filas+1 ;*/
           //query para ingresar los productos a la boleta seleccionada
          $consulta5="INSERT INTO productos_utilizados (PRODUCT_UTI, NROBOL, IDPRODUCT, CANTIDADP) VALUES ('".$id."', '".$idboleta."', '".$idproducto."', '".$cantidad."')";
            $resultado5=mysqli_query($conexion,$consulta5);
 /* echo $idproducto;
  echo $cantidad;
  echo $idboleta;
  echo $id;
  echo "eeeee";*/
		//se consulta en los productos para poder restar la cantidad en stock y poder ingresarlos
		 $consulta="SELECT * FROM productos where IDPRODUCT='".$idproducto."'";
        $resultado=mysqli_query($conexion,$consulta);
        while ($row=mysqli_fetch_array($resultado)) {
        	$cantidadbd=$row['CANTIDAD'];
        }
        //se resta la cantidad de la bd con la cantidad que se ingreso , luego el total se modifica
         $cantidadtotal= $cantidadbd - $cantidad;
         //modifica cantidad
         $consulta4="UPDATE productos SET CANTIDAD='".$cantidadtotal."' WHERE IDPRODUCT='".$idproducto."'";
        $resultado4=mysqli_query($conexion,$consulta4);
        mysqli_close($conexion);
                   //header( "refresh:5;url=..\..\Administrador\Estructura_Administrador_agregarprod.php?" );
           header("location:..\..\Administrador\Estructura_Administrador_VerSolicitudes.php");

		?>

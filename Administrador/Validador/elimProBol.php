
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
    //id producto utilizados
		$idproducto=$_POST['idprel'];
		
		$conexion=mysqli_connect("localhost", "root","" ,"electricidad");
		/**
		* Se selecciona en los productos utilizados el elemento a eliminar, donde de este se rescata la cantidad 
		* y la id del producto para poder sumarle la cantidad
		*/
        $consulta="SELECT * FROM productos_utilizados where PRODUCT_UTI='".$idproducto."'";
        $resultado=mysqli_query($conexion,$consulta);
        while ($fila = mysqli_fetch_array($resultado)) {
			 $IDPRODUCT= $fila['IDPRODUCT'];
			 $CANTIDADP= $fila['CANTIDADP'];
			}
        /**
		* Se selecciona en los productos el elemento del producto para poder tener la cantidad y sumarselo a la cantidad que viene de vuelta a stock
		*/
		$consulta2="SELECT * FROM productos where IDPRODUCT='".$IDPRODUCT."'";
        $resultado2=mysqli_query($conexion,$consulta2);

        while ($fila2 = mysqli_fetch_array($resultado2)) {
			 $CANTIDAD= $fila2['CANTIDAD'];
			}
		$CANTIDADTOTAl= $CANTIDAD+$CANTIDADP;
		/**
		* Se modifica en la tabla productos la cantidad y se le asigna la suma de las 2 cantidades donde el producto seleccionado
		* 
		*/
		$consulta3="UPDATE productos set CANTIDAD='".$CANTIDADTOTAl."' where IDPRODUCT='".$IDPRODUCT."'";	
         $resultado3=mysqli_query($conexion,$consulta3);
		/**
		* Se elimina en los productos utilizados el elemento a eliminar
		*/
		 $consulta4="DELETE FROM productos_utilizados where PRODUCT_UTI='".$idproducto."'";
        $resultado4=mysqli_query($conexion,$consulta4);
        mysqli_close($conexion);
         
              //     header( "refresh:5;url=..\..\Administrador\Estructura_Administrador_VerSolicitudes.php?" );
            header("location:..\..\Administrador\Estructura_Administrador_VerSolicitudes.php");
		?>
    
</body>
</html>
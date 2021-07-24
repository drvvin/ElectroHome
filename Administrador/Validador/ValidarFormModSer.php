<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="AdminProducto.css">
	<script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(function(){
			$('.validanumericos').keypress(function(e) {
				if(isNaN(this.value + String.fromCharCode(e.charCode))) 
					return false;
			})
			.on("cut copy paste",function(e){
				e.preventDefault();
			});

		});
	</script>
</head>
<body>

	<?php	
	$conexion=mysqli_connect("localhost", "root","" ,"electricidad");

	$continente=$_POST['continente'];

	$sql="SELECT * FROM servicios WHERE ID_SERVICIO = '$continente'";

	$result=mysqli_query($conexion,$sql);

	while ($var=mysqli_fetch_array($result)) {
        echo "
        <br>
        <input type='text' name='Id'  value='".$continente."' hidden>
    
        <span class='detalle'>Servicios</span>
        <input type='text' name='Servicios' id='cajitas' value='".$var['NOMBRE_SERVICO']."' required>

    
        <br><span class='detalle'>Descripcion</span>
        <input type='text' name='Descripcion' id='cajitas' value='".$var['DESCRIPCION']."' required>
   

        <br><span class='detalle'>Precio</span>
        <input type='text' name='Precio' id='cajitas' value='".$var['PRECIO_SERVICIO']."' required>
  
        <br><span class='detalle' >Estado</span>
        	<td class='tdSolicitudes'> 
					<select class='select-cssSer'  id='estado' name='estado'>";

					if ($var['ESTADO_SERVICIO'] == 1) {			
						echo '<option value="Disponible"  selected> Disponible</option>';
						echo '<option value="No disponible"  >No disponible</option>';
					
					}else{
		
						echo '<option value="Disponible"  > Disponible</option>';
						echo '<option value="No disponible"  selected >No disponible</option>';
					}
					
					echo "</select>";
                    
                 echo "</td>";
  

	}
	?>

</body>
</html>
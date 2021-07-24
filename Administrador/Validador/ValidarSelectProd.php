 <!DOCTYPE html>
<html>
<head>
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

		//se selecciona los productos y la cantidad de estos para asi evitar que sobrepase el stock
		//contienente hace referencia a la id de cada producto, una vez se selecciona el select va cambiando la id y el contenido de esto
 $consulta="SELECT * FROM productos where IDPRODUCT='".$continente."'";
                $resultado=mysqli_query($conexion,$consulta);
							
		while ($var=mysqli_fetch_array($resultado)) {
				$cantidad= $var['CANTIDAD'];
			echo "
		     
			<input type='text' name='Id' value='".$continente."' hidden>
			<br><span class='detalle'>Cantidad</span>
			<input type='number' name='cantidad' class='validanumericos' id='cajitas' min='1' max='".$cantidad."' value='".$var['CANTIDAD']."' required>

			";
		}
		?>
    
</body>
</html>

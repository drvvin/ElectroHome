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

		$sql="SELECT * FROM productos WHERE IDPRODUCT = '$continente'";

		$result=mysqli_query($conexion,$sql);

		while ($var=mysqli_fetch_array($result)) {
			echo "
		     
			<input type='text' name='Id' value='".$continente."' hidden>
		
			<br><span class='detalle'>Producto</span>
			<input type='text' name='Producto' id='cajitas' value='".$var['PRODUCTO']."' required>
	
			<br><span class='detalle'>Descripcion</span>
			<input type='text' name='Descripcion' id='cajitas' value='".$var['DESCRIPCIONPROD']."' required>

			
			<br><span class='detalle'>Precio</span>
			<input type='text' name='Precio' class='validanumericos'  id='cajitas'value='".$var['VALOR']."' required>
			
		
			<br><span class='detalle'>Cantidad</span>
			<input type='number' name='Cantidad' class='validanumericos' id='cajitas' min='1' max='250' value='".$var['CANTIDAD']."' equired>

			";
		}
		?>
    
</body>
</html>
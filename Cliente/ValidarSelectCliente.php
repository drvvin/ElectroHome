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

		//se selecciona el servicio seleccionado en el select mediante su id
	
 $consulta="SELECT * FROM servicios where ID_SERVICIO='".$continente."'";
                $resultado=mysqli_query($conexion,$consulta);
							
		while ($var=mysqli_fetch_array($resultado)) {
			echo "
		     
			<input type='text' name='Id' value='".$continente."' hidden>
			<br><span class='detalle'>Precio servicio</span>
			<input type='number' name='PServicios' class='validanumericos' id='cajitas' value='".$var['PRECIO_SERVICIO']."' readonly>
			<input type='textarea' name='descServicios' class='validanumericos' id='cajitaArea' value='".$var['DESCRIPCION']."' readonly>

			";
		}
		?>
    
</body>
</html>

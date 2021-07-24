<?php
/**
*Conexion a la base de datos para realizar una consutla.
*/
header('Content-Type: application/json');
$pdo=new PDO("mysql:dbname=electricidad; host=127.0.0.1","root","");
$conexion=mysqli_connect("localhost", "root","" ,"electricidad");
$accion= (isset($_GET['accion']))?$_GET['accion']:'leer';

//Switch para reccibir la accion que desea hacer con el evento.
switch ($accion) {
	//En caso de agregar se agrega un evento dentro de la tabla solicitud y posteriormente en eventos.
	case 'agregar':
	$fecha = $_POST['start'];
	$descrip = $_POST['descripcion'];
	$consulta="SELECT * FROM solicitud";
	$resultado=mysqli_query($conexion,$consulta);
	while ($row=mysqli_fetch_assoc($resultado)) {
		$id =$row['NRO_SOL'] ;
	}
	$id = $id+1;
	/**
	*Conexion a la base de datos para agregar una solicutd.
	*/
	$consulta2="INSERT INTO solicitud(NRO_SOL,title,ESTADO_SOL,DIRECCIONS,start,color,textColor) VALUES('".$id."','Hora Extra Agendada','Aceptado','".$descrip."','".$fecha."','#000000','#FFFFFF')";
	$resultado2=mysqli_query($conexion,$consulta2);
	/**
	*Consulta a la base de datos para agregar un evento.
	*/
	$sentenciaSQL= $pdo->prepare("INSERT INTO eventos(title,descripcion,color,textColor,start,NRO_SOL) VALUES(:title,:descripcion,:color,:textColor,:start,:NRO_SOL)");
	$respuesta=$sentenciaSQL->execute(array(
		"title"=> $_POST['title'],
		"descripcion"=> $descrip,
		"color"=> $_POST['color'],
		"textColor"=> $_POST['textColor'],
		"start"=> $fecha,
		"NRO_SOL"=> $id,
	));	
	echo json_encode($respuesta);
	echo json_encode($resultado2);
	break;



	case 'eliminar':
	//En caso de eliminar evento este se verificara que no exita en otras tablas ya que si es asi se removera de estas primero para no tener problemas con claves foraneas.
	$respuesta=false;
	$NROsol = $_POST['id'];
	if (isset($NROsol)) {
		/**
		*Consulta a la base de datos buscar un numero de solucitud en solicitudes realizadas.
		*/
		$consulta5="SELECT * FROM solicitudes_realizadas where NRO_SOL =".$NROsol."";
		$resultado5=mysqli_query($conexion,$consulta5);
		$filas=mysqli_num_rows($resultado5);
		//Se consulta si el evento esta en la tabla de solicitudes_realizadas si es asi esta debe ser elimanada de la primera manera.
		if ($filas>0) {
			/**
			*Consulta a la base de datos para elimar la clave foranea NRO_SOL en la tabla solicitudes_realizadas.
			*/
			$consulta5="DELETE FROM solicitudes_realizadas where NRO_SOL =".$NROsol."";
			$resultado5=mysqli_query($conexion,$consulta5);
			/**
			*Consulta a la base de datos para elimar la clave foranea NRO_SOL en la tabla eventos.
			*/
			$consulta6="DELETE FROM eventos where NRO_SOL =".$NROsol."";
			$resultado6=mysqli_query($conexion,$consulta6);
			/**
			*Consulta a la base de datos para elimar la clave foranea NRO_SOL en la tabla solicitud.
			*/
			$consulta7="DELETE FROM solicitud where NRO_SOL =".$NROsol."";
			$resultado7=mysqli_query($conexion,$consulta7);
			
			//Enviar resultados
			echo json_encode($resultado5);
			echo json_encode($resultado6);
			echo json_encode($resultado7);

		}else{
			/**
			*Consulta a la base de datos para elimar la clave foranea NRO_SOL en la tabla eventos.
			*/
			$consulta8="DELETE FROM eventos where NRO_SOL =".$NROsol."";
			$resultado8=mysqli_query($conexion,$consulta8);
			/**
			*Consulta a la base de datos para elimar la clave foranea NRO_SOL en la tabla solicitud.
			*/
			$consulta9="DELETE FROM solicitud where NRO_SOL =".$NROsol."";
			$resultado9=mysqli_query($conexion,$consulta9);
			//Enviar resultados
			echo json_encode($resultado8);
			echo json_encode($resultado9);

		}
	}
	echo json_encode($respuesta);
	break;




	default:
	//Como por default seleccionaremos la sentecia realizada y mostraremos las fechas que se encuentran en la base de datos
	$sentenciaSQL->execute(); 
	$resultado= $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($resultado);
	break;
}
?>


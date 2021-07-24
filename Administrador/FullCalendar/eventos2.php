<?php
/**
*Conexion a la base de datos para realizar una consutla.
*/
header('Content-Type: application/json');
$pdo = new PDO("mysql:dbname=electricidad; host=127.0.0.1","root","");
	/**
	*Consulta a la base de datos para buscar todas las solicitudes.
	*/
	$sentenciaSQL=$pdo->prepare("SELECT * FROM solicitud");
	$sentenciaSQL->execute(); 

	$resultado= $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($resultado);


?>
<?php
session_start();
$ID_USUARIO = $_SESSION['id_usuario'];
//usuario lleva consigo el nombre
$varsesion = $_SESSION['usuario'];

$direccion = $_POST["Direccion"];
$fechaDispo = $_POST["FechaDipo"];
$ID_SERVICIO= $_POST["TServicios"];
$presioser= $_POST["PServicios"];

//Query seleccion numero solicitud
$enlace = mysqli_connect("localhost","root","");
mysqli_select_db($enlace,"electricidad");
$tilde = $enlace ->query("SET NAMES 'utf-8'");

$consulta="SELECT * FROM solicitud";
$resultado=mysqli_query($enlace,$consulta);

//Variable Auto-incremento numero solicitud 
while($row=mysqli_fetch_assoc($resultado)){
    $NRO_SOL =$row['NRO_SOL'];
}
$NRO_SOL= $NRO_SOL+1;

//Verificar fecha ingresada

$consulta2="SELECT * FROM solicitud";
$resultado2=mysqli_query($enlace,$consulta2);

if ($fechaDispo == null) {
    echo "<script>alert('Fecha no Disponible');</script>";
    header( "refresh:0;url=Estructura_cliente_agendarhora.php?" );
    die();
}
else{
    //Recorrido consulta para verificar fecha
    while($row2=mysqli_fetch_assoc($resultado2)){

        if ($row2['start'] == $fechaDispo) {
            echo "<script>alert('Fecha ya utilizada');</script>";
            header( "refresh:0;url=Estructura_cliente_agendarhora.php?" );
            die();
        }
    }

//Variable recibimiento de Datos
    $estado = "Pendiente";


//Query para Insertar la solicitud
    $enlace ->query("INSERT INTO solicitud VALUES ('$NRO_SOL','Hora agendada','$estado','$direccion','$fechaDispo','#858543','#FFFFFF')");

//Query seleccion numero boleta
    $consulta6="SELECT * FROM boleta";
    $resultado6=mysqli_query($enlace,$consulta6);

    while($row6=mysqli_fetch_assoc($resultado6)){
        $NROBOL =$row6['NROBOL'];
    }
//Variable Auto-incremento numero boleta
    $NROBOL= $NROBOL+1;
//Variable recibimiento de Datos
    
    $COSTO_IVA= 0;
    $PrecioServicio= $presioser;
    $PRECIO_NETO= 0;
    $PRECIO_TOTAL= $PrecioServicio+$COSTO_IVA+$PRECIO_NETO;

//Query para Insertar la boleta
    $consulta5="INSERT INTO boleta VALUES ('$NROBOL','$ID_SERVICIO','$COSTO_IVA','$PRECIO_NETO','$PRECIO_TOTAL')";
    $resultado5=mysqli_query($enlace,$consulta5);


//Query seleccion numero solicitudes realizadas
    $consulta4="SELECT * FROM solicitudes_realizadas";
    $resultado4=mysqli_query($enlace,$consulta4);


//Variable Auto-incremento numero solicitudes realizadas
    while ($row4=mysqli_fetch_assoc($resultado4)) {
        $SOL_REALIZADA= $row4['SOL_REALIZADA'];
    }
    $SOL_REALIZADA= $SOL_REALIZADA+1;

//Query para Insertar la solicitudes_realizadas
    $enlace ->query("INSERT INTO solicitudes_realizadas VALUES ('$SOL_REALIZADA','$NRO_SOL','$ID_USUARIO','$NROBOL')");


//Mensaje de para el cliente de confirmacion
    echo "<script>alert('Datos Ingresados Correctamente');</script>";
    header( "refresh:0;url=Estructura_cliente_agendarhora.php?" );
}
?>
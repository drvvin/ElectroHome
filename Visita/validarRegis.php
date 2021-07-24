<?php

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$rut = $_POST['rut'];
$correo1 = $_POST['correo1'];
$correo2 = $_POST['correo2'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
$direccion = $_POST['direccion'];
$nrocasa = $_POST['nrocasa'];

$bloque = $_POST['bloque'];
if ($bloque == "") {
  $bloque = "N/A";
}
$telefono = $_POST['telefono'];
//conexion a bd
$conexion = mysqli_connect("localhost", "root","" ,"electricidad");
//suma para clave primaria
$consulta="SELECT * FROM usuario";
$resultado=mysqli_query($conexion,$consulta);
/*$filas=mysqli_num_rows($resultado);
$id =$filas+1 ;*/

//validador Rut
while ($row = mysqli_fetch_array($resultado)) {
  $id =$row['ID_USUARIO'];
  if ($rut == $row['RUT']) {
    echo "<script>alert('Rut ingresado');</script>";
    header( "refresh:0;url=Registrarse.php?" );
     die();
  }
}
$id= $id+1;

//confirmacion de correo
if ($correo1 == $correo2) {
  if ($pass1 == $pass2) {
    if (!empty($nombres) && !empty($apellidos) &&!empty($rut)&&!empty($correo1)&&!empty($correo2)&&!empty($pass1)&&!empty($pass2)&&!empty($direccion)&&!empty($nrocasa)&&!empty($telefono)) {
          //insertar nuevo usuario cliente
      $consulta2="INSERT INTO `usuario` (`ID_USUARIO`, `IDPER`, `RUT`, `NOMBRE`, `CONTRASENA`, `CORREO`, `APELLIDOS`, `DIRECCION`, `NRO_CASA`, `BLOQUE`, `TELEFONO`) VALUES ('".$id."', '1', '".$rut."', '".$nombres."', '".$pass1."', '".$correo1."', '".$apellidos."', '".$direccion."', '".$nrocasa."', '".$bloque."', '".$telefono."') ";
      $resultado2=mysqli_query($conexion,$consulta2);
      echo "<script>alert('Datos registrados correctamente');</script>";
      //echo "INSERT INTO `usuario` (`ID_USUARIO`, `IDPER`, `RUT`, `NOMBRE`, `CONTRASENA`, `CORREO`, `APELLIDOS`, `DIRECCION`, `NRO_CASA`, `BLOQUE`, `TELEFONO`) VALUES ('".$id."', '1', '".$rut."', '".$nombres."', '".$pass1."', '".$correo1."', '".$apellidos."', '".$direccion."', '".$nrocasa."', '".$bloque."', '".$telefono."') ";
      header( "refresh:0;url=..\Visita\Login.php?");
    }else{
       echo "<script>alert('Complete todos los campos obligatorios');</script>";
    header( "refresh:0;url=Registrarse.php?" );
    }

  }else{
    echo "<script>alert('Las Contraseñas no son iguales');</script>";
    header( "refresh:0;url=Registrarse.php?" );
  }
}else{
  echo "<script>alert('Los correos no son iguales');</script>";
  header( "refresh:1;url=Registrarse.php?" );
}


?>
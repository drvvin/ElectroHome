<meta charset="utf-8">
<?php
//cargar datos de phpmailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
//confg de correos


//datos de formulario
$email = $_POST['correo'];

//validador correo
$conexion = mysqli_connect("localhost", "root","" ,"electricidad");

$acum=0; 
    //conexion a bd
$conexion = mysqli_connect("localhost", "root","" ,"electricidad");
$consulta3="SELECT * FROM usuario ";
$resultado3=mysqli_query($conexion,$consulta3);

while ($row3 = mysqli_fetch_array($resultado3)) {
  if ($email == $row3['CORREO']) {
    $acum= $acum+1;
  }
}

if ($acum == 0) {
    echo "<script>alert('Correo no Registrado, Intente nuevamente');</script>";
    header( "refresh:0;url=Inicio.html?" );
    die();
}else{

//ver si se encontro o no
$filas=mysqli_num_rows($resultado3);
if($filas>0){
    //modifica contraseña de usuario
    $newpass = rand(5,26);
    $consulta2="UPDATE usuario SET CONTRASENA = '$newpass' WHERE correo ='$email'";
    $resultado2=mysqli_query($conexion,$consulta2);
     $contenido= "Ingresa a tu cuenta con los siguientes digitos:  ".$newpass."    .";

    //contenido para el email
     $mail = new PHPMailer(true);
    try {
    //Server settings

    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'electrohome27@gmail.com';                     //SMTP username
    $mail->Password   = 'oracle_4U';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('electrohome27@gmail.com', 'Electrohome'); //correo institucional
    $mail->addAddress($email);     //destinatario

    /*Attachments archivos imagenes
    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
*/
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Recuperar contraseña';
    $mail->Body    = $contenido;


 

    $mail->send();

} catch (Exception $e) {
    echo "<script>alert('Error, usuario no encontrado, correo erroneo');</script>";

}
    echo "<script>alert('Contraseña reestablecida, revisa tu correo');</script>";
    header("location:Login.php");
   }else{
    /*   no ha encontrado nada    */
    echo "<script>alert('No hay usuario asociado a ese correo');</script>";
     
}
}




?>
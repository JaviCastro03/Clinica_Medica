<?php
require_once "../../models/ConexionDB.php";
require_once "../../models/UsuarioDDBB.php";
$conexion = new UsuarioDDBB();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
session_start();
if(isset($_POST["enviarCorreoNuevo"])){
    if($conexion->existeCorreo($_POST["email"])){
        $_SESSION['mensaje']="<p class='mensaje-error'>Este correo ya esta asociado a una cuenta</p>";
        header("location: cambiarEmail.php");
        exit();
    }
    $token = hash('sha512', rand(1, 15000));
    $mensaje = "<h1>Cambio de email | 4EverYoung</h1>Has recibido este correo para confirmar tu nuevo email, 
    pincha en el siguiente enlace para confirmarlo: http://localhost/clinica/controllers/verificar/verificarCambioEmail.php?email=".$_POST['email']."&token=".$token;
        if (enviarCorreoGmail($_POST['email'], "Verificar cambio de email", $mensaje)) {
        $_SESSION['mensaje'] = '<script>alert("Correo enviado para verificar el cambio de email")</script>';
    } else {
        $_SESSION['mensaje'] = '<script>alert("No se pudo enviar el correo de verificación, intentalo más tarde")</script>';
    }
}
require_once "../../views/vistaCambiarEmail.php";
function enviarCorreoGmail($email, $asunto, $mensaje)
{
    try {

        require '../../models/vendor/autoload.php';

//Create an instance; passing true enables exceptions
        $mail = new PHPMailer(true);


        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'alumnoantoniobolivar@gmail.com';                     //SMTP username
        $mail->Password = 'hnlx mims ngev usjm';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS

        //Recipients
        $mail->setFrom('noreply@gmail.com', 'Mailer');
        $mail->addAddress($email);               //Name is optional

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $asunto;
        $mail->Body = $mensaje;

        $mail->CharSet = 'UTF-8';          // Asegura que los acentos y eñes se muestren correctamente
        $mail->Encoding = 'base64';

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;

    }

}
?>


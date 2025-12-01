<?php
require_once "./models/conexionDB.php";
require_once "./models/UsuarioDDBB.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
session_start();
$conexion = new UsuarioDDBB();
    if(isset($_POST['enviarCorreo'])){
        if($conexion->existeCorreo($_POST['email'])){
            $token = hash('sha512', rand(1, 15000));
            $mensaje = "Has recibido este correo porque has solicitado cambiar la contraseña, 
            pincha en el siguiente enlace para confirmar el cambio de contraseña: http://localhost/clinica/cambiarPassword.php?email=".$_POST['email']."&token=".$token;
            if (enviarCorreoGmail($_POST['email'], "Verificación de cita", $mensaje)) {
                $_SESSION['mensaje'] = '<script>alert("Correo enviado para verificar el cambio de contraseña")</script>';
            } else {
                $_SESSION['mensaje'] = '<script>alert("No se pudo enviar el correo de verificación, intentalo más tarde")</script>';
            }



            $_SESSION['ruta'] = "usuario";
            header('location:index.php');
            exit();
        }
        else{
            $_SESSION['mensaje']="<p>El correo no existe</p>";
            header('location:olvidarPassword.php');
            exit();
        }
    }

function enviarCorreoGmail($email, $asunto, $mensaje)
{
    try {

        require './models/vendor/autoload.php';

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

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_SESSION['mensaje'])){
            echo $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);
        }
    ?>
    <form method="POST" action="olvidarPassword.php">
        <input type="email" name="email" placeholder="Email">
        <input type ="submit" name="enviarCorreo" value ="Enviar">
    </form>
</body>
</html>
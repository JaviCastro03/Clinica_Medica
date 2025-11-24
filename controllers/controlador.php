<?php
//Ficheros
require_once "models/ConexionDB.php";
require_once "models/UsuarioDDBB.php";
require_once "models/Usuario.php";

//Conexion
$conexion = new UsuarioDDBB();


//PHP Mailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



//Sesion
session_start();
if(isset($_SESSION["idU"])){
    $idU=$_SESSION["idU"];
}else{
    //idU para usuario invitado
    $idU=0;
}



//Rutas
if(!isset($_SESSION["ruta"]) || empty($_SESSION["ruta"]) || isset($_POST["login"])){
    $_SESSION["ruta"] = "landingpage";
}

if(isset($_POST["landingpage"])){
    $_SESSION["ruta"] = "landingpage";
}

if(isset($_POST["usuario"])){
    $_SESSION["ruta"] = "usuario";
}

if(isset($_POST["login"])){
    $_SESSION["ruta"] = "login";
}

if(isset($_POST["registro"])){
    $_SESSION["ruta"] = "registro";
}



//Landingpage
if($_SESSION["ruta"] == "landingpage"){
    require_once "./views/vistaLandingPage.php";
}

//Panel de usuario
if($_SESSION["ruta"] == "usuario"){
    //Va a haber dos vistas, usuario invitado y usuario logueado

    require_once "./views/vistaUsuario.php";
}

//Login
if($_SESSION["ruta"] == "login"){
    require_once "./views/vistaLogin.php";
}

//Registro
if($_SESSION["ruta"] == "registro"){
    if(isset($_POST["registrar"])){
        if($conexion->existeCorreo($_POST["correo"])){
            $_SESSION["mensaje"] = "El correo ya existe";
        }
        else {
            if (!Usuario::comprobarPassword($_POST["password"], $_POST["cpassword"])) {
                $_SESSION["mensaje"] = "<p id='error'>Las contraseñas no coinciden</p>";
            } else {
                $_SESSION["dni"] = $_POST["dni"];
                $_SESSION["nombre"] = $_POST["nombre"];
                $_SESSION["apellidos"] = $_POST["apellidos"];
                $_SESSION["email"] = $_POST["email"];
                $_SESSION["password"] = $_POST["password"];
                $_SESSION["cpassword"] = $_POST["cpassword"];
                $_SESSION["insertarUsuario"] = true;
            }

        }
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;

    }

    if(isset($_SESSION["insertarUsuario"])){
        $hash = password_hash($_SESSION["password"], PASSWORD_DEFAULT);
        $usuario = new Usuario($_SESSION["dni"], $_SESSION["apellidos"], $_SESSION["nombre"], $_SESSION["email"], $hash,2  );
        if ($conexion->insertarUsuario($usuario)) {


            $token=hash('sha512', rand(1,15000));
            $mensaje="Has recibido este correo porque has solicitado registrarte en la aplicación, 
            pincha en el siguiente enlace para confirmar tu correo: http://aula2gs.edu/clinica/verificar.php?email=".$_SESSION['email']."&token=".$token;
            if(enviarCorreoGmail($_SESSION["email"],"Verificación de cuenta",$mensaje)){
                $_SESSION['mensaje'] ='<script>alert("Correo enviado para verificar el usuario")</script>';
            }
            else{
                $_SESSION['mensaje'] = '<script>alert("No se pudo enviar el correo de verificación, intentalo más tarde")</script>';
            }
            unset($_SESSION["insertarUsuario"], $_SESSION["dni"], $_SESSION["apellidos"], $_SESSION["nombre"], $_SESSION["email"], $_SESSION["password"]);
            header("Location: index.php");
            exit;
        } else {
            $_SESSION["mensaje"] = "<p id='error'>Error al registrar usuario</p>";
            unset($_SESSION["insertarUsuario"], $_SESSION["dni"], $_SESSION["apellidos"], $_SESSION["nombre"], $_SESSION["email"], $_SESSION["password"]);
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        }
    }

    require_once "./views/vistaRegistro.php";

}
function enviarCorreoGmail($email, $asunto, $mensaje){
    try{

        require './models/vendor/autoload.php';

//Create an instance; passing true enables exceptions
        $mail = new PHPMailer(true);


        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'alumnoantoniobolivar@gmail.com';                     //SMTP username
        $mail->Password   = 'hnlx mims ngev usjm';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS

        //Recipients
        $mail->setFrom('noreply@gmail.com', 'Mailer');
        $mail->addAddress($email);               //Name is optional

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $asunto;
        $mail->Body    = $mensaje;

        $mail->CharSet = 'UTF-8';          // Asegura que los acentos y eñes se muestren correctamente
        $mail->Encoding = 'base64';

        $mail->send();
        return true;
    }
    catch (Exception $e) {
        return false;

    }


}



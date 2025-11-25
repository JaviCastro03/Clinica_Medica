<?php
//Ficheros
require_once "models/ConexionDB.php";
require_once "models/UsuarioDDBB.php";
require_once "models/Usuario.php";
require_once "models/EspecialidadDDBB.php";
require_once "models/MedicoDDBB.php";
require_once "models/CitaDDBB.php";

//Conexion
$conexion = new UsuarioDDBB();
$conexionEspecialidad = new EspecialidadDDBB();
$conexionMedico = new MedicoDDBB();
$conexionCita = new CitaDDBB();

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

if(isset($_POST["especialidades"])){
    $_SESSION["ruta"] = "especialidades";
}

if(isset($_POST["horas"])){
    $_SESSION["ruta"] = "horas";
}

if(isset($_POST["citas"])){
    $_SESSION["ruta"] = "citas";
}

if(isset($_POST["fechas"])){
    $_SESSION["ruta"] = "fechas";
}

if(isset($_POST["medicos"])){
    $_SESSION["ruta"] = "medicos";
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

if(isset($_POST["confirmarCita"])){
    $_SESSION["ruta"] = "confirmarCita";
}



//Landingpage
if($_SESSION["ruta"] == "landingpage"){
    require_once "./views/vistaLandingPage.php";
}

//Panel de usuario
if($_SESSION["ruta"] == "usuario"){
    //Va a haber dos vistas, usuario invitado y usuario logueado
    if($idU != 0){
        require_once "./views/vistaUsuario.php";
    }
    else{
        require_once "./views/vistaUsuarioInvitado.php";
    }

}

//Login
if($_SESSION["ruta"] == "login"){
    if ($_SERVER["REQUEST_METHOD"] == "POST"&&(!empty($_POST['iniciarSesion']))) {
        if (!$conexion->emailExiste($_POST["email"])) {
            $_SESSION["mensaje"] = "<p id='error'>Credenciales incorrectas.</p>";
            header("Location: index.php");
            exit();
        } else {
            $usuario = $conexion->getUsuario($_POST["email"]);

            if (password_verify($_POST["password"], $usuario->password)) {
               /* if (isset($_POST["rlogin"])) {
                    setcookie("email", $usuario->email, time() + (86400));
                    setcookie("password", $_POST["password"], time() + (86400));
                    setcookie("recordar", "checked", time() + (86400));
                } else {
                    setcookie("email", "", time() + (86400));
                    setcookie("password", "", time() + (86400));
                    setcookie("recordar", "", time() + (86400));
                }*/
                if($conexion->getRol($usuario->email)!=2){
                    $_SESSION["idU"] = $conexion->getIDUsuario($usuario->email);
                    $_SESSION["ruta"] = 'usuario';
                    $_SESSION["mensaje"] = "<p>Sesión iniciada correctamente.</p>";
                    header("Location: index.php");
                    exit;
                }
                else{
                    $_SESSION["mensaje"] = "<p >Este usuario no está verificado.</p>";
                    header("Location: index.php");
                    exit();
                }

            } else {
                $_SESSION["mensaje"] = "<p>Credenciales incorrectas.</p>";
                header("Location: index.php");
                exit;
            }


        }


    }

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
//Citas
if($_SESSION["ruta"] == "citas"){

    $consulta = $conexionCita->getCitas($idU);
    require_once "./views/vistaCitas.php";
}

//Especialidades
if($_SESSION["ruta"] == "especialidades"){
    if(isset($_POST["especialidad"])){
        $_SESSION["especialidad"] = $_POST["especialidad"];
        $_SESSION["ruta"] = 'medicos';
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }


    $consulta=$conexionEspecialidad->getEspecialidades();

    require_once "./views/vistaEspecialidad.php";
}


//Médicos
if($_SESSION["ruta"] == "medicos"){
    if(isset($_POST["doctor"])){
        $_SESSION['idMedico'] = $_POST["idM"];
        $_SESSION["ruta"] = 'fechas';
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }

    $idEspecialidad=$conexionEspecialidad->getId($_SESSION["especialidad"]);
    $consulta = $conexionMedico->getMedicosEspecialidad($idEspecialidad);
    require_once "./views/vistaMedicos.php";
}

//Fecha
if($_SESSION["ruta"] == "fechas"){
    $fechaHoy = new DateTime();
    $fechaFormateada = $fechaHoy->format('Y-m-d');
    if(isset($_POST["seleccionarFecha"])){
        $_SESSION["fecha"]=$_POST["fecha"];
        $_SESSION["ruta"]='horas';
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
    require_once "./views/vistaFecha.php";
}

//horas
if($_SESSION["ruta"] == "horas"){
    if(isset($_POST["hora"])){
        $_SESSION["hora"]=$_POST["hora"];
        $_SESSION["ruta"]='confirmarCita';
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }


    $consulta=$conexionCita->getHoras($_SESSION["idMedico"],$_SESSION["fecha"]);
    require_once "./views/vistaHora.php";
}

if($_SESSION["ruta"] == "confirmarCita"){
    if(isset($_POST["confirmarCita"])){
        $estado='Por verificar';
        $idHora=$conexionCita->getIdHora($_SESSION['hora']);
        $idEspecialidad=$conexionEspecialidad->getId($_SESSION["especialidad"]);
        $conexionCita->insertarCita($idU,$_SESSION['idMedico'],$_SESSION["fecha"],$idHora,$estado,$idEspecialidad);
        $idCita=$conexionCita->getIdCita($_SESSION['idMedico'],$idHora,$_SESSION["fecha"]);
        $token=hash('sha512', rand(1,15000));
        $mensaje="Has recibido este correo porque has solicitado una cita médica, 
            pincha en el siguiente enlace para confirmar tu cita: http://aula2gs.edu/clinica/verificarCita.php?idCita=".$idCita."&token=".$token;
        if(enviarCorreoGmail($conexion->getEmail($idU),"Verificación de cita",$mensaje)){
            $_SESSION['mensaje'] ='<script>alert("Correo enviado para verificar la cita")</script>';
        }
        else{
            $_SESSION['mensaje'] = '<script>alert("No se pudo enviar el correo de verificación, intentalo más tarde")</script>';
        }
        $_SESSION["ruta"] = 'citas';


        header("Location: index.php");
        exit;

    }
    require_once "./views/vistaConfirmarCita.php";
}


//Función enviar
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



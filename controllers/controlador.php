<?php

//Ficheros
require_once "models/ConexionDB.php";
require_once "models/UsuarioDDBB.php";
require_once "models/Usuario.php";
require_once "models/EspecialidadDDBB.php";
require_once "models/MedicoDDBB.php";
require_once "models/CitaDDBB.php";
require_once "models/InformesDDBB.php";
//Conexion
$conexion = new UsuarioDDBB();
$conexionEspecialidad = new EspecialidadDDBB();
$conexionMedico = new MedicoDDBB();
$conexionCita = new CitaDDBB();
$conexionInforme = new InformesDDBB();

//PHP Mailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


//Sesion
session_start();
if (isset($_SESSION["idU"])) {

    $idU = $_SESSION["idU"];
    $email = $conexion->getEmail($idU);
    $rol = $conexion->getRol($email);

} else {
    //idU para usuario invitado
    $idU = 0;
    $rol = 0;
    $email = "";
}


//Rutas
if (!isset($_SESSION["ruta"]) || empty($_SESSION["ruta"]) || isset($_POST["login"])) {
    $_SESSION["ruta"] = "landingpage";
}

if (isset($_POST["especialidades"])) {
    $_SESSION["ruta"] = "especialidades";
}

if(isset($_POST["loginMedico"])){
    $_SESSION["ruta"] = "loginMedico";
}

if(isset($_POST["usuarioMedico"])){
    $_SESSION["ruta"] = "usuarioMedico";
}

if(isset($_POST["citasMedico"])){
    $_SESSION["ruta"] = "citasMedico";
}

if(isset($_POST["informe"])){
    $_SESSION["ruta"] = "informe";
}

if(isset($_POST["crearInforme"])){
    $_SESSION["ruta"] = "crearInforme";
}

if (isset($_POST["editarUsuario"])) {
    $_SESSION["ruta"] = "editarUsuario";
}

if (isset($_POST["horas"])) {
    $_SESSION["ruta"] = "horas";
}

if (isset($_POST["citas"])) {
    $_SESSION["ruta"] = "citas";
}

if (isset($_POST["fechas"])) {
    $_SESSION["ruta"] = "fechas";
}

if (isset($_POST["medicos"])) {
    $_SESSION["ruta"] = "medicos";
}

if (isset($_POST["landingpage"])) {
    $_SESSION["ruta"] = "landingpage";
}

if (isset($_POST["usuariosAdmin"])) {
    $_SESSION["ruta"] = "usuariosAdmin";
}
if (isset($_POST["medicosAdmin"])) {
    $_SESSION["ruta"] = "medicosAdmin";
}

if (isset($_POST["usuario"])) {
    $_SESSION["ruta"] = "usuario";
}

if (isset($_POST["login"])) {
    $_SESSION["ruta"] = "login";
}

if (isset($_POST["registro"])) {
    $_SESSION["ruta"] = "registro";
}

if (isset($_POST["confirmarCita"])) {
    $_SESSION["ruta"] = "confirmarCita";
}


//Landingpage
if ($_SESSION["ruta"] == "landingpage") {
    if($idU != 0){
        if($conexion->getRol($email)==100){
            require_once "views/vistaLandingAdmin.php";
        }else{
            require_once "./views/vistaLandingPage.php";
        }

    }
    else{
        require_once "./views/vistaLandingPageInvitado.php";
    }

}

//Panel de usuario
if ($_SESSION["ruta"] == "usuario") {

    $consulta = $conexion->getInfoUsuario($idU);
    if($consulta ==null){
        header("Location:./controllers/logout.php");
        exit();
    }

    if ($rol==100) {
        require_once "./views/vistaUsuarioAdmin.php";
    }else{
        require_once "./views/vistaUsuario.php";

    }


}

if($_SESSION["ruta"] == "usuariosAdmin"){
    if(isset($_POST['guardar'])){
        $id=$_POST["id"];
        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $email = $_POST['email'];
        $rol = $_POST['rol'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $cp = $_POST['cp'];
        if($conexion->updateUsuariosAdmin($id,$dni,$nombre,$apellidos,$email,$rol,$telefono,$direccion,$cp)){
            $_SESSION["mensaje"] = "Usuario actualizado correctamente";

        }
        else{
            $_SESSION["mensaje"] = "Error al actualizar el usuario";
        }

        header("Location: index.php");
        exit();

    }
    if(isset($_POST['eliminar'])){
        $id=$_POST["id"];
        if($conexion->eliminarUsuario($id)){
            $_SESSION["mensaje"] = "Usuario eliminado correctamente";
        }
        else{
            $_SESSION["mensaje"] = "Error al eliminar el usuario";
        }
        header("Location: index.php");
    }

    if(isset($_POST['buscar'])){
        $consulta = $conexion->getUsuariosAdmin($_POST['email']);
    }
    else{
        $consulta = $conexion->getUsuariosAdmin("");
    }


    require_once "./views/vistaUsuariosAdmin.php";
}

if($_SESSION["ruta"] == "medicosAdmin"){
    require_once "./views/vistaMedicosAdmin.php";
}

if ($_SESSION["ruta"] == "usuarioMedico") {

    $consulta = $conexion->getInfoUsuario($idU);
    require_once "./views/vistaUsuarioMedico.php";



}

//Editar información del usuario
if ($_SESSION["ruta"] == "editarUsuario") {

    if (isset($_POST["cambiarPassword"])) {
        $token = hash('sha512', rand(1, 15000));
        $mensaje = "Has recibido este correo porque has solicitado cambiar tu contraseña, 
            pincha en el siguiente enlace para confirmar tu cambio de contraseña: http://localhost/clinica/controllers/verificar/cambiarPassword.php?email=".$conexion->getEmail($idU)."&token=".$token;
        if (enviarCorreoGmail($conexion->getEmail($idU), "Cambio de contraseña", $mensaje)) {
            $_SESSION['mensaje'] = '<script>alert("Correo enviado para verificar el cambio de contraseña")</script>';
        } else {
            $_SESSION['mensaje'] = '<script>alert("No se pudo enviar el correo de verificación, intentalo más tarde")</script>';
        }
    }

    if(isset($_POST["cambiarEmail"])){
        $token = hash('sha512', rand(1, 15000));
        $mensaje = "Has recibido este correo porque has solicitado un cambio de email, 
            pincha en el siguiente enlace para confirmar tu cambio de email: http://localhost/clinica/controllers/verificar/cambiarEmail.php?email=".$conexion->getEmail($idU)."&token=".$token;
        if (enviarCorreoGmail($conexion->getEmail($idU), "Cambio de email", $mensaje)) {
            $_SESSION['mensaje'] = '<script>alert("Correo enviado para verificar el cambio de email")</script>';
        } else {
            $_SESSION['mensaje'] = '<script>alert("No se pudo enviar el correo de verificación, intentalo más tarde")</script>';
        }
    }

    if (isset($_POST["editarInfoUsuario"])) {
        if ($conexion->actualizarDatosUsuario($_POST["apellidos"], $_POST["nombre"], $idU,$_POST["direccion"],$_POST["telefono"],$_POST["cp"])) {
            $_SESSION["mensaje"] = "<p>Usuario actualizado correctamente</p>";
            $_SESSION["ruta"] = "usuario";
        } else {
            $_SESSION["mensaje"] = "<p>Error al actualizar usuario</p>";
        }
        if($rol==3){
            if ($conexionMedico->actualizarDatosMedico($_POST["apellidos"], $_POST["nombre"], $idU,$_POST["direccion"],$_POST["telefono"],$_POST["cp"])) {
                $_SESSION["mensaje"] = "<p>Usuario actualizado correctamente</p>";
                $_SESSION["ruta"] = "usuarioMedico";
            } else {
                $_SESSION["mensaje"] = "<p>Error al actualizar usuario</p>";
            }
        }

        header("Location: index.php");
        exit();
    }
    $consulta = $conexion->getInfoUsuario($idU);
    require_once "./views/vistaEditarUsuario.php";
}

//Login


if ($_SESSION["ruta"] == "login") {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && (!empty($_POST['iniciarSesion']))) {
        if (!$conexion->emailExiste($_POST["email"])) {
            $_SESSION["mensaje"] = "<p id='error'>Credenciales incorrectas.</p>";
            header("Location: index.php");
            exit();
        } else {
            $usuario = $conexion->getUsuario($_POST["email"]);

            if (password_verify($_POST["password"], $usuario->password)) {
                if ($conexion->getRol($usuario->email) != 2) {
                    $_SESSION["idU"] = $conexion->getIDUsuario($usuario->email);
                    $_SESSION["ruta"] = 'usuario';
                    $_SESSION["mensaje"] = "<p>Sesión iniciada correctamente.</p>";
                    header("Location: index.php");
                    exit;
                } else {
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



if($_SESSION["ruta"] == "loginMedico") {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && (!empty($_POST['iniciarSesion']))) {
        if (!$conexion->emailExiste($_POST["email"])) {
            $_SESSION["mensaje"] = "<p id='error'>Credenciales incorrectas.</p>";
            header("Location: index.php");
            exit();
        } else {
            $usuario = $conexion->getUsuario($_POST["email"]);

            if (password_verify($_POST["password"], $usuario->password)) {
                if ($conexion->getRol($usuario->email) == 3) {
                    $_SESSION["idU"] = $conexion->getIDUsuario($usuario->email);
                    $_SESSION["ruta"] = 'usuarioMedico';
                    $_SESSION["mensaje"] = "<p>Sesión iniciada correctamente.</p>";
                    header("Location: index.php");
                    exit;
                } else {
                    $_SESSION["mensaje"] = "<p >Este usuario no es médico.</p>";
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
    require_once "./views/vistaLoginMedico.php";
}


//Registro
if ($_SESSION["ruta"] == "registro") {
    if (isset($_POST["registrar"])) {

        if ($conexion->existeCorreo($_POST["correo"]) || $conexion->existeDni($_POST["dni"])) {
            $_SESSION["mensaje"] = "El correo ya existe";
            if($conexion->existeDni($_POST["dni"])){
                $_SESSION["mensaje"] = "El dni ya se encuentra registrado";
            }
        } else {
            if (!Usuario::comprobarPassword($_POST["password"], $_POST["cpassword"])) {
                $_SESSION["mensaje"] = "<p id='error'>Las contraseñas no coinciden</p>";
            } else {
                $_SESSION["dni"] = $_POST["dni"];
                $_SESSION["nombre"] = $_POST["nombre"];
                $_SESSION["apellidos"] = $_POST["apellidos"];
                $_SESSION["direccion"] = $_POST["direccion"];
                $_SESSION["telefono"] = $_POST["telefono"];
                $_SESSION["cp"] = $_POST["cp"];
                $_SESSION["email"] = $_POST["email"];
                $_SESSION["password"] = $_POST["password"];
                $_SESSION["cpassword"] = $_POST["cpassword"];
                $_SESSION["insertarUsuario"] = true;
            }

        }
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;

    }

    if (isset($_SESSION["insertarUsuario"])) {
        $hash = password_hash($_SESSION["password"], PASSWORD_DEFAULT);
        $usuario = new Usuario($_SESSION["dni"], $_SESSION["apellidos"], $_SESSION["nombre"], $_SESSION["email"], $hash, $_SESSION['direccion'],$_SESSION['telefono'],$_SESSION['cp'],2);
        if ($conexion->insertarUsuario($usuario)) {


            $token = hash('sha512', rand(1, 15000));
            $mensaje = "Has recibido este correo porque has solicitado registrarte en la aplicación, 
            pincha en el siguiente enlace para confirmar tu correo: http://aula2gs.edu/clinica/controllers/verificar/verificar.php?email=" . $_SESSION['email'] . "&token=" . $token;
            if (enviarCorreoGmail($_SESSION["email"], "Verificación de cuenta", $mensaje)) {
                $_SESSION['mensaje'] = '<script>alert("Correo enviado para verificar el usuario")</script>';
            } else {
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
if ($_SESSION["ruta"] == "citas") {
    if($idU==0){
        $_SESSION["ruta"] = "login";
        header("Location: index.php");
        exit();
    }
    if (isset($_POST["cancelarCita"]) && isset($_POST["idMedicoC"]) && isset($_POST["idhoraC"]) && isset($_POST["fechaC"])) {
        if ($conexionCita->borrarCita($_POST["fechaC"], $_POST["idMedicoC"], $_POST["idhoraC"])) {
            $_SESSION["mensaje"] = "<p>Cita cancelada correctamente.</p>";
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        } else {
            $_SESSION["mensaje"] = "<p>No se ha podido cancelar la cita.</p>";
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        }

    }

    $consulta = $conexionCita->getCitas($idU);
    require_once "./views/vistaCitas.php";
}

if($_SESSION["ruta"] == "citasMedico"){
    if($idU==0){
        $_SESSION["ruta"] = "login";
        header("Location: index.php");
        exit();
    }
    if(isset($_POST["buscar"])){
        $fecha = $_POST["fecha"];
    }
    else{
        $fecha=null;
    }
    $consulta = $conexionCita->getCitasMedico($idU,$fecha);
    require_once "./views/vistaCitasMedico.php";
}

if($_SESSION["ruta"] == "informe"){
    if(isset($_POST["idPaciente"])){
        $_SESSION["idPaciente"] = $_POST["idPaciente"];
    }
    $idUsuario = $_SESSION["idPaciente"];
    $nombrePaciente = $conexion->getNombreUsuario($idUsuario);
    $apellidosPaciente = $conexion->getApellidosUsuario($idUsuario);
    $dni = $conexion->getDni($idUsuario);
    $consulta = $conexionInforme->getInformes($idUsuario);
    require_once "./views/vistaInforme.php";
}

if($_SESSION["ruta"] == "crearInforme"){
    if(isset($_POST["crear"])){
        $idPaciente = $_SESSION["idPaciente"];
        $motivo = $_POST["motivo"];
        $fecha = $_POST["fecha"];
        $diagnostico = $_POST["diagnostico"];
        if($conexionInforme->crearInforme($idPaciente,$idU, $motivo, $fecha, $diagnostico)){
            $_SESSION["mensaje"] = "<p>Informe creado correctamente.</p>";
        }else{
            $_SESSION["mensaje"] = "<p>No se pudo crear el informe.</p>";
        }
        $_SESSION["ruta"] = "informe";
        header("Location: index.php");
        exit;

    }
    require_once "./views/vistaCrearInforme.php";
}

//Especialidades
if ($_SESSION["ruta"] == "especialidades") {
    if($idU==0){
        $_SESSION["ruta"] = "login";
        header("Location: index.php");
        exit();
    }

    if (isset($_POST["especialidad"])) {
        $_SESSION["especialidad"] = $_POST["especialidad"];
        $_SESSION["ruta"] = 'medicos';
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }


    $consulta = $conexionEspecialidad->getEspecialidades();

    require_once "./views/vistaEspecialidad.php";
}


//Médicos
if ($_SESSION["ruta"] == "medicos") {
    if (isset($_POST["doctor"])) {
        $_SESSION['idMedico'] = $_POST["idM"];
        $_SESSION["ruta"] = 'fechas';
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }

    $idEspecialidad = $conexionEspecialidad->getId($_SESSION["especialidad"]);
    $consulta = $conexionMedico->getMedicosEspecialidad($idEspecialidad);
    require_once "./views/vistaMedicos.php";
}

//Fecha
if ($_SESSION["ruta"] == "fechas") {
    $fechaHoy = new DateTime();
    $fechaFormateada = $fechaHoy->format('Y-m-d');
    if (isset($_POST["seleccionarFecha"])) {
        $_SESSION["fecha"] = $_POST["fecha"];
        $_SESSION["ruta"] = 'horas';
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
    require_once "./views/vistaFecha.php";
}

//horas
if ($_SESSION["ruta"] == "horas") {
    if (isset($_POST["hora"])) {
        $_SESSION["hora"] = $_POST["hora"];
        $_SESSION["ruta"] = 'confirmarCita';
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }


    $consulta = $conexionCita->getHoras($_SESSION["idMedico"], $_SESSION["fecha"]);
    require_once "./views/vistaHora.php";
}

//Confirmar cita
if ($_SESSION["ruta"] == "confirmarCita") {
    $nombreUsuario=$conexion->getNombreUsuario($idU);
    $nombreMedico=$conexion->getNombreUsuario($_SESSION["idMedico"]);
    $apellidosMedico=$conexion->getApellidosUsuario($_SESSION["idMedico"]);
    $apellidosUsuario=$conexion->getApellidosUsuario($idU);
    if (isset($_POST["confirmarCita"])) {
        $estado = 'Por verificar';

        $idHora = $conexionCita->getIdHora($_SESSION['hora']);
        $idEspecialidad = $conexionEspecialidad->getId($_SESSION["especialidad"]);
        if ($conexionCita->insertarCita($idU, $_SESSION['idMedico'], $_SESSION["fecha"], $idHora, $estado, $idEspecialidad)) {
            $token = hash('sha512', rand(1, 15000));
            $mensaje = "<h1>Cita médica</h1> Hola ".$nombreUsuario.", has recibido este correo porque has solicitado una cita médica con el doctor/a ".$nombreMedico." ".$apellidosMedico." en ".strtolower($_SESSION['especialidad'])." el día ".$_SESSION['fecha']." a las ".$_SESSION['hora']."
            , pincha en el siguiente enlace para confirmar tu cita: http://aula2gs.edu/clinica/controllers/verificar/verificarCita.php?idMedicoC=" . $_SESSION['idMedico'] . "&fechaC=" . $_SESSION["fecha"] . "&idhora=" . $idHora . "&token=" . $token;
            if (enviarCorreoGmail($conexion->getEmail($idU), "Verificación de cita", $mensaje)) {
                $_SESSION['mensaje'] = '<script>alert("Correo enviado para verificar la cita")</script>';
            } else {
                $_SESSION['mensaje'] = '<script>alert("No se pudo enviar el correo de verificación, intentalo más tarde")</script>';
            }
            $_SESSION["ruta"] = 'citas';
        } else {
            $_SESSION['mensaje'] = "<p>No se ha podido registrar la cita.</p>";
        }


        header("Location: index.php");
        exit;

    }
    require_once "./views/vistaConfirmarCita.php";
}


//Función enviar
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
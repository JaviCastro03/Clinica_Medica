<?php
//Ficheros
require_once "models/ConexionDB.php";
require_once "models/UsuarioDDBB.php";


//PHP Mailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Sesion
session_start();
if(isset($_SESSION["idU"])){
    $idU=$_SESSION["idU"];
}else{
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
    require_once "./views/vistaUsuario.php";
}

//Login
if($_SESSION["ruta"] == "login"){
    require_once "./views/vistaLogin.php";
}

//Registro
if($_SESSION["ruta"] == "registro"){
    require_once "./views/vistaRegistro.php";
}
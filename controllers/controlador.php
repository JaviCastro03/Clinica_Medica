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

if(!isset($_SESSION["ruta"]) || empty($_SESSION["ruta"]) || isset($_POST["login"])){
    $_SESSION["ruta"] = "landingpage.php";
}

<?php
require_once "../../models/CitaDDBB.php";
require_once "../../models/ConexionDB.php";

session_start();
$conexion = new CitaDDBB();

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (isset($_GET["idMedicoC"]) && $conexion->setEstado("Confirmada", $_GET["fechaC"],$_GET["idMedicoC"],$_GET["idhora"])) {


        echo "Verificación exitosa <br>";
        echo "Serás redirigido en 5 segundos...";
        $_SESSION["mensajeCita"] = "<p class='mensaje-exito citas'>Cita registrada correctamente</p>";

        header("Refresh: 5; URL=../../index.php");
        exit;
    } else {

        echo "Error al verificar el usuario";
        header("Refresh: 5; URL=../../index.php");
        exit;
    }

} else {
    header("location: ../../index.php");
    exit();
}
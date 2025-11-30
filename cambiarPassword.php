
<?php
require_once "./models/Usuario.php";
require_once "./models/UsuarioDDBB.php";
require_once "./models/ConexionDB.php";
$conexion = new UsuarioDDBB();
session_start();
if (isset($_GET["email"])) {
    $_SESSION["email"] = $_GET["email"];
}

if(isset($_POST["confirmarCambioPassword"])&&isset($_SESSION["email"])){
    if(Usuario::comprobarPassword($_POST["npassword"],$_POST["ncpassword"])){
        $hash = password_hash($_POST["npassword"], PASSWORD_DEFAULT);
        $_SESSION["hash"] = $hash;
        $_SESSION["ruta"]="usuario";
        if ($conexion->actualizarPassword($_SESSION['email'], $hash)) {
            $_SESSION["mensaje"] = "<p>Contraseña actualizada correctamente</p>";

        } else {
            $_SESSION["mensaje"] = "<p>Error al cambiar contraseña, vuelve a intentarlo más tarde</p>";
        }
        unset($_SESSION["email"]);
        $_SESSION["ruta"]="usuario";
        header("Location: index.php");
        exit();
    }
    else{
        $_SESSION["mensaje"]="<p>Las contraseñas no coinciden</p>";
        header("Location: cambiarPassword.php");
        exit();
    }
}
require_once "./views/vistaCambiarPassword.php";
?>

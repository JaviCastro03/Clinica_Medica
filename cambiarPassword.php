
<?php
session_start();
require_once "./models/Usuario.php";
if(isset($_POST["confirmarCambioPassword"])){
    if(Usuario::comprobarPassword($_POST["npassword"],$_POST["ncpassword"])){
        $hash = password_hash($_POST["npassword"], PASSWORD_DEFAULT);
        $_SESSION["hash"] = $hash;
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

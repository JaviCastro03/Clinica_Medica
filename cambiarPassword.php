<!doctype html>
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
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Cambiar contraseña</h1>
    <form method="POST" action="cambiarPassword.php">
        <input type="password" name="npassword" placeholder="Nueva contraseña">
        <input type="password" name="ncpassword" placeholder="Confirmar contraseña">
        <input type="submit" name="confirmarCambioPassword" value="Confirmar">
    </form>

</body>
</html>
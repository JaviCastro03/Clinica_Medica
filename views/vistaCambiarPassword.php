<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./views/styles.css">
    <script src="./controllers/script/validacionesFormularios.js" defer></script>
    <title>Document</title>
</head>
<body>

<h1>Cambiar contraseña</h1>
<form method="POST" action="cambiarPassword.php">
    <input type="password" name="npassword" placeholder="Nueva contraseña" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+\-=\[\]{}|;:,.<>?]).{8}$">
    <div id="mensajeError-password"></div>
    <input type="password" name="ncpassword" placeholder="Confirmar contraseña">
    <input type="submit" name="confirmarCambioPassword" value="Confirmar">
    <?php if(isset($_SESSION['mensaje'])){
        echo $_SESSION['mensaje'];
        unset($_SESSION['mensaje']);
    } ?>
</form>

</body>
</html>
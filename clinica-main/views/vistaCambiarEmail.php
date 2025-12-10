<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
if(isset($_SESSION['mensaje'])){
    echo $_SESSION['mensaje'];
    unset($_SESSION['mensaje']);
}
?>
<form action="cambiarEmail.php" method="post">
    <input type="email" name="email" placeholder="Nuevo correo electrónico">
    <input type="submit" name="enviarCorreoNuevo" value="Enviar">
</form>
</body>
</html>



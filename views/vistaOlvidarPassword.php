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

<form method="POST" action="olvidarPassword.php">
    <?php
    if(isset($_SESSION['mensaje'])){
        echo $_SESSION['mensaje'];
        unset($_SESSION['mensaje']);
    }
    ?>
    <input type="email" name="email" placeholder="Email">
    <?php
    if(isset($_SESSION['mensaje'])){
        echo $_SESSION['mensaje'];
        unset($_SESSION['mensaje']);
    }
    ?>
    <input type ="submit" name="enviarCorreo" value ="Enviar">

</form>
<form method="post" action="../../index.php">
    <input type="submit" value ="Volver">
</form>
</body>
</html>
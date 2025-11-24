<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./views/style.css">
</head>
<body>
<header>
    <div>
        <h1>Registro</h1>
    </div>
    <?php if(isset($_SESSION["mensaje"])){
        echo $_SESSION["mensaje"];
        unset($_SESSION["mensaje"]);
    } ?>
</header>
<section class="contenedor__formulario">
    <form class="formulario" action="index.php" method="post">
        <input type="text" name="dni" placeholder="Dni">
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="text" name="apellidos" placeholder="Apellidos">
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Contraseña">
        <input type="password" name="cpassword" placeholder="Confirmar contraseña">
        <input type="submit" name="registrar" value="Registrar">
    </form>
</section>
<form action="index.php" method="post">
    <input type="submit" name="login" value="¿Ya tienes una cuenta?">
</form>
</body>
</html>
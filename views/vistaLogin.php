<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./views/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div>
            <h1>Login</h1>
        </div>
        <?php if(isset($_SESSION["mensaje"])){
            echo $_SESSION["mensaje"];
            unset($_SESSION["mensaje"]);
        } ?>
    </header>
    <section>
        <form action="index.php" method="post">
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Contraseña">
            <input type="submit" name="iniciarSesion" value="Iniciar Sesión">
        </form>
    </section>
    <form action="index.php" method="post">
        <input type="submit" name="registro" value="¿No tienes una cuenta?">
    </form>
    <form action="index.php" method="post">
        <input type="submit" name="loginMedico" value="¿Eres médico?">
    </form>
    <form action="index.php" method="post">
        <input type="submit" name="landingpage" value="Seguir como invitado">
    </form>
    <form action="./controllers/verificar/olvidarPassword.php" method="post">
        <input type="submit" name="landingpage" value="¿Has olvidado tu contraseña?">
    </form>

</body>
</html>
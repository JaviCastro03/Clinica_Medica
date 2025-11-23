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
    <header>
        <div>
            <h1>Login</h1>
        </div>
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
        <input type="submit" name="landingpage" value="Seguir como invitado">
    </form>

</body>
</html>
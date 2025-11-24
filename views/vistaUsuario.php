<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>4EverYoung</title>
</head>
<body>
    <header>
        <div>
            <h1>Panel de usuario</h1>
        </div>
        <?php if(isset($_SESSION["mensaje"])){
            echo $_SESSION["mensaje"];
            unset($_SESSION["mensaje"]);
        } ?>
    </header>


        <form method="POST" action="./controllers/logout.php">
        <input type="submit" value="Cerrar sesion">
        </form>


    <form action="index.php" method="post">
        <input type="submit" name="citas" value="Mis citas">
    </form>

</body>
</html>

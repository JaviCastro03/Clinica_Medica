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
            <h1>Hora</h1>
        </div>
    </header>
    <section>
        <?php echo "<h2>Día: ".$_SESSION['fecha']."</h2>"; ?>
        <form action="index.php" method="post">
            <input type="submit" name="fechas" value="Volver">
        </form>
    </section>
</body>
</html>
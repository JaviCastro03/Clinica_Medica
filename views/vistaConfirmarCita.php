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
            <h1>Confirmar cita</h1>
        </div>
        <?php echo "<h2>Especialidad: ".$_SESSION['especialidad']."</h2>" ?>
            <?php echo "<h2>Fecha: ".$_SESSION['fecha']."</h2>" ?>
        <?php echo "<h2>Hora: ".$_SESSION['hora']."</h2>" ?>

        <form action="index.php" method="post">
            <input type="submit" name="confirmarCita" value="Confirmar cita">
        </form>

        <form action="index.php" method="post">
            <input type="submit" name="horas" value="Volver">
        </form>
    </header>
</body>
</html>

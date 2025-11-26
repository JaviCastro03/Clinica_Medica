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
            <h1>Hora</h1>
        </div>
    </header>
    <section>
        <?php echo "<h2>Día: ".$_SESSION['fecha']."</h2>";
            if($consulta!=null){
                echo "<table border='1'>";
                $cont = 0;
                while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {

                    // Abrir fila si es el primer elemento de la fila
                    if ($cont % 4 == 0) {
                        echo "<tr>";
                    }

                    echo "<td>";
                    echo "<form action='index.php' method='POST'>";
                    echo "<input type='submit' name='hora' value='" . $fila['hora'] . "'>";
                    echo "</form>";
                    echo "</td>";

                    $cont++;

                    // Cerrar fila cuando YA tienes 3 columnas
                    if ($cont % 4 == 0) {
                        echo "</tr>";
                    }
                }
                echo "</table>";
            }
            else{
                "<h2>No hay horas disponibles</h2>";
            }
        ?>

        <form action="index.php" method="post">
            <input type="submit" name="fechas" value="Volver">
        </form>
    </section>
</body>
</html>
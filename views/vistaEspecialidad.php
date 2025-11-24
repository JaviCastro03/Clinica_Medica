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
        <h1>Especialidades</h1>

    </div>
</header>
<section>

    <?php
    $cont = 0;
    echo "<table>";

    while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {

        // Abrir fila si es el primer elemento de la fila
        if ($cont % 3 == 0) {
            echo "<tr>";
        }

        echo "<td>";
        echo "<form action='index.php' method='POST'>";
        echo "<input type='submit' name='especialidad' value='" . $fila['nombre'] . "'>";
        echo "</form>";
        echo "</td>";

        $cont++;

        // Cerrar fila cuando YA tienes 3 columnas
        if ($cont % 3 == 0) {
            echo "</tr>";
        }
    }

    echo "</table>";
    ?>
    <br><form action="index.php" method="post">
        <input type="submit" name="citas" value="Volver">
    </form>

</section>
</body>
</html>
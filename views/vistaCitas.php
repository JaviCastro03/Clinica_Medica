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
            <h1>Mis citas</h1>
            <?php echo
            "<table>
                <tr>
                    <th>Especialidad</th>
                    <th>Médico</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                </tr>";
            while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)) {

                echo "<tr>";
                echo "<td>".$fila["nombreEspecialidad"]."</td>";
                echo "<td>".$fila["nombreMedico"]." ".$fila["apellidos"] ."</td>";
                echo "<td>".$fila["fecha"]."</td>";
                echo "<td>".$fila["hora"]."</td>";
            }

            echo"</table>"; ?>



            <form action="index.php" method="post">
                <input type="submit" name="usuario" value="Volver al panel de usuario">

            </form>
            <form action="index.php" method="post">
                <input type="submit" name="especialidades" value="Pedir cita">

            </form>

            <form action="index.php" method="post">
                <input type="submit" name="usuario" value="Volver">
            </form>
        </div>
    </header>
</body>
</html>

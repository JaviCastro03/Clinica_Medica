<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
</head>
<body>
    <header>
        <div>
            <h1>Mis citas</h1>
            <?php
            if(isset($_SESSION["mensaje"])){
                echo $_SESSION["mensaje"];
                unset($_SESSION["mensaje"]);
            }
            if($consulta!=null){
                echo
                "<table class='table table-striped'>
                <tr>
                    <th>Especialidad</th>
                    <th>Médico</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>";
                while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)) {

                    echo "<tr>";
                    echo "<td>".$fila["nombreEspecialidad"]."</td>";
                    echo "<td>".$fila["nombreMedico"]." ".$fila["apellidos"] ."</td>";
                    echo "<td>".$fila["fecha"]."</td>";
                    echo "<td>".$fila["hora"]."</td>";
                    echo "<td>".$fila["estado"]."</td>";
                    echo "<td>
                    <form action='index.php' method='POST' onsubmit=\"return confirm('¿Seguro que quiere cancelar la cita?');\">
                        <input type='hidden' name='fechaC' value='".$fila["fecha"]."'>
                        <input type='hidden' name='idhoraC' value='".$fila["idhora"]."'>
                        <input type='hidden' name='idMedicoC' value='".$fila["idMedico"]."'>
                        <input type='submit' name='cancelarCita' value='Cancelar cita' class='btn btn-danger'>
                    </form>
                    </td>";
                }

                echo"</table>";
            }
            else{
                echo "<h2>No tienes citas</h2>";
            }
             ?>



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

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
            <h1>Médicos</h1>
        </div>
    </header>

    <?php
        echo "<h2>Especialidad: ".$_SESSION['especialidad']."</h2>";

        if($consulta!=null){
            echo "<table class='table table-striped'>";
            echo "<tr>";
            echo "<th>Nombre</th>";
            echo "<th>Apellido</th>";
            echo "<th>Email</th>";
            echo "</tr>";
            while($fila = $consulta->fetch(PDO::FETCH_ASSOC)){
                echo "<tr>";
                echo "<td>".$fila['nombre']."</td>";
                echo "<td>".$fila['apellidos']."</td>";
                echo "<td>".$fila['email']."</td>";
                echo "<td> <form action='index.php' method='post'>
                    <input type='hidden' name='idM' value='".$fila['id']."'>
                    <input type='submit' name='doctor' value='Seleccionar'>
                </form></td>";
                echo "</tr>";

            }
            echo "</table>";
        }
        else{
            echo"<h2>No hay médicos</h2>";
        }

    ?>

    <form action="index.php" method="post">
        <input type="submit" name="especialidades" value="Volver">
    </form>
</body>
</html>
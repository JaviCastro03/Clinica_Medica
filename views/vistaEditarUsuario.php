<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./views/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <header>
        <div>
            <h1>Editar información</h1>
        </div>

    </header>
    <?php
        if(isset($_SESSION["mensaje"])){
            echo $_SESSION["mensaje"];
            unset($_SESSION["mensaje"]);
        }
    ?>
    <section class="contenedor__formulario">
        <?php
            if($consulta != null){
                $fila=$consulta->fetch(PDO::FETCH_ASSOC);
                $dni = $fila["dni"];
                $nombre = $fila["nombre"];
                $apellidos = $fila["apellidos"];

                echo '
                <form class="formulario" action="index.php" method="post" onsubmit=\'return confirm("¿Quieres confirmar la información del usuario?");\'>
         
                    <input type="text" name="nombre" placeholder="nombre" value="'.$nombre.'">
                    <input type="text" name="apellidos" placeholder="apellidos" value="'.$apellidos.'">
                    <input type="submit" name="editarInfoUsuario" value="Guardar cambios">
                </form>
                ';

            }

        ?>


    </section>
    <form action="index.php" method="post">
        <input type="submit" name="usuario" value="Volver">
    </form>
    <form action="index.php" method="post">
        <input type="submit" name="cambiarPassword" value="Cambiar contraseña">
    </form>
    <form action="index.php" method="post">
        <input type="submit" name="cambiarEmail" value="Cambiar email">
    </form>
</body>
</html>

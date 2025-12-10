<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./views/style.css">
    <script src="./controllers/script/validacionesFormularios.js" defer></script>
    <link rel="stylesheet" href="./views/styles.css">

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
                $direccion = $fila["direccion"];
                $telefono = $fila["telefono"];
                $cp = $fila["cp"];

                echo '
                <form class="formulario" action="index.php" method="post" onsubmit=\'return confirm("¿Quieres confirmar la información del usuario?");\'>
         
                    <input  id="nombre"type="text" name="nombre" placeholder="Nombre" value="'.$nombre.'" pattern="^[A-Z][a-z]+(?: [A-Z][a-z]+)*$">
                    <div id="mensajeError-nombre"></div>
                    <input id="apellidos" type="text" name="apellidos" placeholder="Apellidos" value="'.$apellidos.'" pattern="^[A-Z][a-z]+(?: [A-Z][a-z]+)*$">
                    <div id="mensajeError-apellidos"></div>
                    <input id="telefono"type="tel" name="telefono" placeholder="Teléfono" value="'.$telefono.'"  pattern="^\+?[0-9][0-9\- ]{6,20}$">
                    <div id="mensajeError-telefono"></div>
                    <input id="codigopostal" type="text" name="cp" placeholder="Código postal" value="'.$cp.'" pattern="^[A-Za-z0-9][A-Za-z0-9\- ]{2,9}$">
                    <div id="mensajeError-codigopostal"></div>
                    <input type="text" name="direccion" placeholder="Direccion" value="'.$direccion.'" required>
                    <div id="mensajeError-direccion"></div>
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

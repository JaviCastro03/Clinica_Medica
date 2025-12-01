<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4Ever Young | Clínica Médica</title>
    <link rel="stylesheet" href="./views/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
    <link rel="icon" type="image" href="./views/images/logo/logoSinLetras.png">
</head>
<body>
<header class="header">
    <div class="header__logo">
        <img src="./views/images/logo/logo.webp" alt="Logo 4Ever Young">
    </div>

    <!-- BLOQUE: NAV -->
    <input type="checkbox" id="menu-toggle" class="nav__toggle">
    <label for="menu-toggle" class="nav__hamburger">
        <span></span>
        <span></span>
        <span></span>
    </label>

    <nav class="nav">
        <form action="index.php" method="post">
            <button type="submit" class="nav__item" name="landingpage" >Inicio</button>
        </form>
        <form action="index.php" method="post">
            <button id="#servicios" type="submit" class="nav__item" name="landingpage" >Servicios</button>
        </form>
        <form action="index.php" method="post">
            <button type="submit" class="nav__item" name="citas" >Mis citas</button>
        </form>


        <!-- ELEMENTO: Grupo de Autenticación -->
        <div class="nav__auth-group">
            <form action="index.php" method="post">
                <button type="submit" class="nav__item nav__item--active" name="usuario" >Panel de Usuario</button>
            </form>
        </div>

        <!-- BOTON PEDIR CITA -->
        <form action="index.php" method="post">
            <button type="submit" class="button" name="especialidades">
                <div class="wrap">
                    <p>
                        <span>✧</span>
                        <span>✦</span>
                        Solicitar Cita
                    </p>
                </div>
            </button>
        </form>
    </nav>
</header>
    <?php if(isset($_SESSION["mensaje"])){
        echo $_SESSION["mensaje"];
        unset($_SESSION["mensaje"]);
    } ?>
    <?php
        if($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
            $dni=$fila["dni"];
            $nombre=$fila["nombre"];
            $apellidos=$fila["apellidos"];
            $email=$fila["email"];
            echo "<div>
                <h3>Información: </h3>
                <p>DNI: ".$dni."</p>
                <p>Nombre: ".$nombre."</p>
                <p>Apellidos: ".$apellidos."</p>
                <p>Email: ".$email."</p>
            </div>";

        }

    ?>

    <form method="POST" action="./controllers/logout.php">
    <input type="submit" value="Cerrar sesion">
    </form>

    <form action="index.php" method="post">
        <input type="submit" name="editarUsuario" value="Editar información usuario">
    </form>

    <form action="index.php" method="post">
        <input type="submit" name="citas" value="Mis citas">
    </form>

</body>
</html>

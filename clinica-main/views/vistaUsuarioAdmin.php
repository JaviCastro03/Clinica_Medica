<!DOCTYPE html>
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

<!-- BLOQUE: HEADER -->
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
            <button type="submit" class="nav__item " name="landingpage" >Inicio</button>
        </form>
        <form action="index.php" method="post">
            <button type="submit" class="nav__item" name="usuariosAdmin" >Usuarios</button>
        </form>

        <form action="index.php" method="post">
            <button type="submit" class="nav__item" name="medicosAdmin" >Medicos</button>
        </form>


        <!-- ELEMENTO: Grupo de Autenticación -->
        <div class="nav__auth-group">
            <form action="index.php" method="post">
                <button type="submit" class="nav__item nav__item--active" name="usuario" >Mi cuenta</button>
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

<section>
    <?php
    if(isset($_SESSION['mensaje'])){
        echo $_SESSION['mensaje'];
        unset($_SESSION['mensaje']);
    }
    ?>
    <section id="servicios" class="services">

        <h2 class="services__title">Información usuario</h2>



        <div class="cita-info">



            <div class="task" draggable="true">

                <div class="tags">
                    <span class="tag">Usuario</span>
                    <button class="options">
                        <!-- SVG -->
                    </button>
                </div>
                <?php
                if($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
                    $dni=$fila["dni"];
                    $nombre=$fila["nombre"];
                    $apellidos=$fila["apellidos"];
                    $email=$fila["email"];
                    $telefono=$fila["telefono"];
                    $cp=$fila["cp"];
                    $direccion=$fila["direccion"];
                    echo "<div>
                <h3>Información: </h3>
                <p>DNI: ".$dni."</p>
                <p>Nombre: ".$nombre."</p>
                <p>Apellidos: ".$apellidos."</p>
                <p>Email: ".$email."</p>
                <p>Código Postal: ".$cp."</p>
                <p>Direccion:   ".$direccion."</p>
                <p>Telefono:   ".$telefono."</p>
                
            </div>";

                }

                ?>



                <div class="div__button-container">
                    <div class="div__button-table grid-1">
                        <form action="./controllers/logout.php" method="post">
                            <input class="button-table button__back" type="submit" value="Cerrar sesión">
                        </form>
                    </div>

                    <div class="grid-2"></div>

                    <div class="div__button-table grid-3">
                        <form action="index.php" method="post">
                            <input class="button-table button__back" type="submit" name="editarUsuario" value="Editar información">
                        </form>
                    </div>
                </div>
            </div> <!-- cierre correcto de .task -->

        </div> <!-- cierre de services__card-grid -->


    </section>
</section>
</body>
</html>

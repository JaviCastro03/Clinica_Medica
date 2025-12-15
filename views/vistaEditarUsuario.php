<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4Ever Young | Clínica Médica</title>
    <link rel="stylesheet" href="./views/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
    <script src="./controllers/script/validacionesFormularioEditarUsuario.js" defer></script>
    <link rel="icon" type="image" href="./views/images/logo/logoSinLetras.png">
</head>
<body >
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
            <button type="submit" class="nav__item" name="citas" >Mis citas</button>
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


    <section id="edit-info" class="services">
        <div class="login-card-container">
            <div class="login-left-side">
                <h2 class="login-left-side__title">Actualizar Datos</h2>
                <p class="login-left-side__subtitle">Modifica la información de tu cuenta.</p>


                <div class="formulario-login">
                    <?php
                    if(isset($_SESSION["mensaje"])){
                        echo $_SESSION["mensaje"];
                        unset($_SESSION["mensaje"]);
                    }
                    ?>
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
                            <form id="vistaEditarUsuario" class="login-form-group" action="index.php" method="post" novalidate onsubmit=\'return confirm("¿Quieres confirmar la información del usuario?");\' >
                                <input id="nombreE" type="text" name="nombre" placeholder="Nombre" value="'.$nombre.'" pattern="^[A-ZÁÉÍÓÚÑÜ][a-záéíóúñü]+(?: [A-ZÁÉÍÓÚÑÜ][a-záéíóúñü]+)*$" class="login-input-field">
                                <div id="mensajeError-nombreE"></div>
                                <input id="apellidosE" type="text" name="apellidos" placeholder="Apellidos" value="'.$apellidos.'" pattern="^[A-ZÁÉÍÓÚÑÜ][a-záéíóúñü]+(?: [A-ZÁÉÍÓÚÑÜ][a-záéíóúñü]+)*$" class="login-input-field">
                                <div id="mensajeError-apellidosE"></div>
                                <input id="telefonoE" type="tel" name="telefono" placeholder="Teléfono" value="'.$telefono.'"  pattern="^\+?[0-9][0-9\- ]{6,20}$" class="login-input-field">
                                <div id="mensajeError-telefonoE"></div>
                                <input id="codigopostalE" type="text" name="cp" placeholder="Código postal" value="'.$cp.'" pattern="^[A-Za-z0-9][A-Za-z0-9\- ]{2,9}$" class="login-input-field">
                                <div id="mensajeError-codigopostalE"></div>
                                <input id="direccionE" type="text" name="direccion" placeholder="Direccion" value="'.$direccion.'" required class="login-input-field">
                                <div id="mensajeError-direccionE"></div>
                                <button type="submit" name="editarInfoUsuario" class="btn--green">Guardar cambios</button>
                            </form>
                            ';

                    }

                    ?>

                    <div class="enlaces-login">
                        <form action="index.php" method="post">
                            <button type="submit" name="usuario" class="nav__auth-link">Volver al perfil</button>
                        </form>
                        <form action="index.php" method="post">
                            <button type="submit" name="cambiarPassword" class="nav__auth-link">Cambiar contraseña</button>
                        </form>
                        <form action="index.php" method="post">
                            <button type="submit" name="cambiarEmail" class="nav__auth-link">Cambiar email</button>
                        </form>
                    </div>


                </div>
            </div>

            <div class="login-right-side">
            </div>
        </div>
    </section>
</section>

</body>
</html>
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

        <h2 class="services__title">Login</h2>



        <div class="cita-info">



            <div class="task" draggable="true">
                <div class="formulario-login">
                <section >
                    <form action="index.php" method="post" class = "formulario-login-input">
                        <input type="text" name="email" placeholder="Email" required>
                        <input type="password" name="password" placeholder="Contraseña" required>
                        <input type="submit" name="iniciarSesion" value="Iniciar Sesión">
                    </form>
                </section>
                <form action="index.php" method="post">
                    <input type="submit" name="registro" value="¿No tienes una cuenta?">
                </form>
                <form action="index.php" method="post">
                    <input type="submit" name="loginMedico" value="¿Eres médico?">
                </form>
                <form action="index.php" method="post">
                    <input type="submit" name="landingpage" value="Seguir como invitado">
                </form>
                <form action="./controllers/verificar/olvidarPassword.php" method="post">
                    <input type="submit" name="landingpage" value="¿Has olvidado tu contraseña?">
                </form>
                </div>
            </div>


            </div> <!-- cierre correcto de .task -->

        </div> <!-- cierre de services__card-grid -->


    </section>
</section>


</body>
</html>
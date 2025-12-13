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



        <div class="nav__auth-group">
            <form action="index.php" method="post">
                <button type="submit" class="nav__item nav__item--active" name="usuario" >Acceder</button>
            </form>
        </div>

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

    <section>

        <section id="login" class="services">

            <div class="login-card-container">
                <div class="login-left-side">
                    <h2 class="login-left-side__title">Login</h2>
                    <p class="login-left-side__subtitle">Inicia sesión para gestionar tus citas.</p>


                    <div class="formulario-login">
                        <form action="index.php" method="post" class="login-form-group">
                            <input type="email" name="email" placeholder="Email Address" required class="login-input-field">
                            <input type="password" name="password" placeholder="Password" required class="login-input-field">
                            <button type="submit" name="iniciarSesion" class="btn--green">Log In</button>
                        </form>

                        <div class="enlaces-login">
                            <form action="index.php" method="post">
                                <button type="submit" name="registro" class="nav__auth-link">¿No tienes una cuenta?</button>
                            </form>
                            <form action="index.php" method="post">
                                <button type="submit" name="loginMedico" class="nav__auth-link">¿Eres médico?</button>
                            </form>

                            <form action="./controllers/verificar/olvidarPassword.php" method="post">
                                <button type="submit" name="olvidarPassword" class="nav__auth-link">¿Has olvidado tu contraseña?</button>
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
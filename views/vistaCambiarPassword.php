<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4Ever Young | Clínica Médica</title>
    <link rel="stylesheet" href="../../views/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
    <script src="./controllers/script/validacionesFormularioEditarUsuario.js" defer></script>
    <link rel="icon" type="image" href="../../views/images/logo/logoSinLetras.png">
</head>
<body >
<header class="header">
    <div class="header__logo">
        <img src="../../views/images/logo/logo.webp" alt="Logo 4Ever Young">
    </div>

</header>

<section id="change-password" class="services">

    <div class="login-card-container">

        <div class="login-left-side">
            <h2 class="login-left-side__title">Cambiar Contraseña</h2>
            <p class="login-left-side__subtitle">Introduce y confirma tu nueva contraseña.</p>

            <div class="formulario-login">

                <form method="POST" action="cambiarPassword.php" class="login-form-group">

                    <input type="password" name="npassword"
                           placeholder="Nueva contraseña"
                           pattern="^(?=.[a-z])(?=.[A-Z])(?=.[!@#$%^&()_+\-=\[\]{}|;:,.<>?]).{8}$"
                           required
                           class="login-input-field">

                    <div id="mensajeError-password" class="mensaje-error-validacion"></div>

                    <input type="password" name="ncpassword"
                           placeholder="Confirmar contraseña"
                           required
                           class="login-input-field">

                    <button type="submit" name="confirmarCambioPassword" class="btn--green">Confirmar</button>

                </form>

                <div>
                    <?php
                    if(isset($_SESSION['mensaje'])){
                        echo $_SESSION['mensaje'];
                        unset($_SESSION['mensaje']);
                    }
                    ?>
                </div>

            </div>
        </div>

        <div class="login-right-side">
        </div>

    </div>

</section>

</body>
</html>
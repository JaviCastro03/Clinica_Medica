<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../../views/styles.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
    <link rel="icon" type="image" href="../../views/images/logo/logoSinLetras.png">

    <title>4Ever Young | Cambiar Correo Electrónico</title>
</head>
<body>

<header class="header">
    <div class="header__logo">
        <img src="../../views/images/logo/logo.webp" alt="Logo 4Ever Young">
    </div>
    <nav class="nav">
    </nav>
</header>

<section id="change-email" class="services">

    <div class="login-card-container">

        <div class="login-left-side">
            <h2 class="login-left-side__title">Cambiar Correo Electrónico</h2>
            <p class="login-left-side__subtitle">Introduce tu nuevo correo electrónico.</p>

            <div class="formulario-login">

                <form action="cambiarEmail.php" method="post" class="login-form-group">

                    <input type="email" name="email" placeholder="Nuevo correo electrónico" required class="login-input-field">

                    <button type="submit" name="enviarCorreoNuevo" class="btn--green">Enviar</button>

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
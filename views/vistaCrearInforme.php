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

        <form action="index.php" method="post">
            <button type="submit" class="nav__item" name="citasMedico" >Mis citas</button>
        </form>

        <div class="nav__auth-group">
            <form action="index.php" method="post">
                <button type="submit" class="nav__item nav__item--active" name="usuarioMedico" >Mi cuenta</button>
            </form>
        </div>

        <button  class="boton-admin" >
            <div class="wrap">
                <p>
                    <span>✦</span>
                    Médico
                </p>
            </div>
        </button>
    </nav>
</header>

<section class="services">
    <div>
        <h1>Crear Informe</h1>
    </div>
    <div class="login-card-container">

        <div class="login-left-side">

            <div class="formulario-login">

                <form class="login-form-group" action="index.php" method="post">
                    <input type="date" name="fecha" placeholder="Fecha" required class="login-input-field">
                    <textarea name="motivo" cols="100" rows="3" placeholder="Motivo" required class="login-input-field"></textarea>
                    <textarea name="diagnostico" cols="100" rows="3" placeholder="Diagnóstico" required class="login-input-field"></textarea>
                    <textarea name="tratamiento" cols="100" rows="3" placeholder="Tratamiento" required class="login-input-field"></textarea>

                    <input type="submit" name="crear" value="Crear" class="btn--green">
                </form>
            </div>

            <?php if(isset($_SESSION["mensaje"])){
                echo $_SESSION["mensaje"];
                unset($_SESSION["mensaje"]);
            } ?>
        </div>

        <div class="login-right-side">
        </div>

    </div>
</section>

<div class="enlaces-login">
    <form action="index.php" method="post">
        <input type="submit" name="informe" value="Volver" class="nav__auth-link">
    </form>
</div>
</body>
</html>
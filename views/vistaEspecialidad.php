<!doctype html>
<html lang="en">
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
            <button type="submit" class="nav__item nav__item--active" name="citas" >Mis citas</button>
        </form>


        <!-- ELEMENTO: Grupo de Autenticación -->
        <div class="nav__auth-group">
            <form action="index.php" method="post">
                <button type="submit" class="nav__item" name="usuario" >Mi cuenta</button>
            </form>
        </div>

        <!-- BOTON PEDIR CITA -->
        <button class="button">
            <div class="wrap">
                <p>
                    <span>✧</span>
                    <span>✦</span>
                    Solicitar Cita
                </p>
            </div>
        </button>
    </nav>
</header>
<section>


    <section id="servicios" class="services">
        <h2 class="services__title">Especialidades Médicas</h2>
        <div class="stepper-wrapper">
            <div class="stepper-item ">
                <div class="step-counter">1</div>
                <div class="step-name">Especialidades</div>
            </div>
            <div class="stepper-item ">
                <div class="step-counter">2</div>
                <div class="step-name">Médicos</div>
            </div>
            <div class="stepper-item ">
                <div class="step-counter">3</div>
                <div class="step-name">Fecha</div>
            </div>
            <div class="stepper-item">
                <div class="step-counter">4</div>
                <div class="step-name">Hora</div>
            </div>
            <div class="stepper-item">
                <div class="step-counter">5</div>
                <div class="step-name">Confirmar</div>
            </div>
        </div>
        <div class="services__card-grid">
            <?php

            while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {

                echo "<form class='form' action='index.php' method='POST'>";
                echo "<input type='hidden' name='especialidad' value='".$fila['nombre']."'>";
                echo '<button class="button-especialidad" type="submit"><div class="card"><p class="card-title">'.$fila["nombre"].'</p><p class="small-desc">'.$fila['descripcion'].'</p><div class="go-corner"><div class="go-star">✦</div></div></div></button>';
                echo "</form>";




            }

            ?>
        </div>
        <div class="div__button-table">
            <form action="index.php" method="post">
                <input class="button-table button__back" type="submit" name="citas" value="Volver">
            </form>
        </div>
    </section>


</section>
</body>
</html>
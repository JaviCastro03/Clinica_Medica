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

        <h2 class="services__title">Confirmar cita</h2>

        <div class="stepper-wrapper">
            <div class="stepper-item completed">
                <div class="step-counter">1</div>
                <div class="step-name">Especialidades</div>
            </div>
            <div class="stepper-item completed">
                <div class="step-counter">2</div>
                <div class="step-name">Médicos</div>
            </div>
            <div class="stepper-item completed">
                <div class="step-counter">3</div>
                <div class="step-name">Fecha</div>
            </div>
            <div class="stepper-item completed">
                <div class="step-counter">4</div>
                <div class="step-name">Hora</div>
            </div>
            <div class="stepper-item active">
                <div class="step-counter">5</div>
                <div class="step-name">Confirmar</div>
            </div>
        </div>

        <div class="cita-info">



            <div class="task" draggable="true">

                <div class="tags">
                    <span class="tag">Cita</span>
                    <button class="options">
                        <!-- SVG -->
                    </button>
                </div>
                <?php echo "<p>Paciente: ".$nombreUsuario." ".$apellidosUsuario."</p>"; ?>
                <?php echo "<p>Médico: ".$nombreMedico." ".$apellidosMedico."</p>"; ?>
                <?php echo "<p>Especialidad: ".$_SESSION['especialidad']."</p>" ?>
                <?php echo "<p>Fecha: ".$_SESSION['fecha']."</p>" ?>
                <?php echo "<p>Hora: ".$_SESSION['hora']."</p>" ?>


                <div class="stats">
                    <div></div>
                    <div class="viewer"></div>
                </div>

            </div> <!-- cierre correcto de .task -->

        </div> <!-- cierre de services__card-grid -->

        <div class="div__button-container">
            <div class="div__button-table grid-1">
                <form action="index.php" method="post">
                    <input class="button-table button__back" type="submit" name="confirmarCita" value="Confirmar cita">
                </form>
            </div>
            <?php
            if(isset($_SESSION['mensaje'])){
                echo $_SESSION['mensaje'];
                unset($_SESSION['mensaje']);
            }
            ?>

            <div class="grid-2"></div>

            <div class="div__button-table grid-3">
                <form action="index.php" method="post">
                    <input class="button-table button__back" type="submit" name="horas" value="Volver">
                </form>
            </div>
        </div>

    </section>
</section>

</body>
</html>


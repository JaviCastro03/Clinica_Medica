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
            <button type="submit" class="nav__item nav__item--active" name="citas" >Mis citas</button>
        </form>


        <!-- ELEMENTO: Grupo de Autenticación -->
        <div class="nav__auth-group">
            <form action="index.php" method="post">
                <button type="submit" class="nav__item" name="usuario" >Mi cuenta</button>
            </form>
        </div>
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
        <h2 class="services__title">Horas</h2>
        <div class="stepper-wrapper">
            <div class="stepper-item completed ">
                <div class="step-counter ">1</div>
                <div class="step-name">Especialidades</div>
            </div>
            <div class="stepper-item completed">
                <div class="step-counter completed">2</div>
                <div class="step-name">Médicos</div>
            </div>
            <div class="stepper-item completed ">
                <div class="step-counter">3</div>
                <div class="step-name">Fecha</div>
            </div>
            <div class="stepper-item active">
                <div class="step-counter">4</div>
                <div class="step-name">Hora</div>
            </div>
            <div class="stepper-item">
                <div class="step-counter">5</div>
                <div class="step-name">Confirmar</div>
            </div>
        </div>
        <?php echo "<h2 class='h2-day'>Día: ".$_SESSION['fecha']."</h2> "?>

        <div class="services__card-grid">
            <?php

            if($consulta!=null){


                while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    echo "<form action='index.php' method='POST'>";
                    echo '<button type="submit" class="button-time" name="hora" value="' . $fila["hora"] . '">
                        <p>' . $fila["hora"] . '</p>
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M6 2C6 1.44772 6.44772 1 7 1C7.55228 1 8 1.44772 8 2V3H16V2C16 1.44772 16.4477 1 17 1C17.5523 1 18 1.44772 18 2V3H19C20.6569 3 22 4.34315 22 6V20C22 21.6569 20.6569 23 19 23H5C3.34315 23 2 21.6569 2 20V6C2 4.34315 3.34315 3 5 3H6V2ZM16 5V6C16 6.55228 16.4477 7 17 7C17.5523 7 18 6.55228 18 6V5H19C19.5523 5 20 5.44772 20 6V9H4V6C4 5.44772 4.44772 5 5 5H6V6C6 6.55228 6.44772 7 7 7C7.55228 7 8 6.55228 8 6V5H16ZM4 11V20C4 20.5523 4.44772 21 5 21H19C19.5523 21 20 20.5523 20 20V11H4Z" fill="#ffffff"></path> </g></svg>                    </button>';

                    echo "</form>";




                }

            }
            else{
                "<h2>No hay horas disponibles</h2>";
            }
            ?>
        </div>
        <div class="div__button-table">
            <form action="index.php" method="post">
                <input class="button-table button__back" type="submit" name="fechas" value="Volver">
            </form>
        </div>
    </section>


</section>
</body>
</html>



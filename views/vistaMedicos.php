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
            <h2 class="services__title">Médicos</h2>
            <div class="stepper-wrapper">
                <div class="stepper-item completed ">
                    <div class="step-counter ">1</div>
                    <div class="step-name">Especialidades</div>
                </div>
                <div class="stepper-item active">
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
            <div>
                <?php


                if($consulta!=null){
                    echo "<table class='tabla'>";
                    echo "<tr>";
                    echo "<th>Nombre</th>";
                    echo "<th>Apellido</th>";
                    echo "<th>Email</th>";
                    echo "<th></th>";
                    echo "</tr>";
                    while($fila = $consulta->fetch(PDO::FETCH_ASSOC)){
                        echo "<tr>";
                        echo "<td>".$fila['nombre']."</td>";
                        echo "<td>".$fila['apellidos']."</td>";
                        echo "<td>".$fila['email']."</td>";
                        echo "<td> <form action='index.php' method='post'>
                    <input type='hidden' name='idM' value='".$fila['id']."'>
             
                    <button class='button-table' type='submit' name='doctor'>Seleccionar</button>
                </form></td>";
                        echo "</tr>";

                    }
                    echo "</table>";
                }
                else{
                    echo"<h1>No hay médicos</h1>";
                }

                ?>

            </div>
            <div class="div__button-table">
                <form action="index.php" method="post">
                    <input class="button-table button__back" type="submit" name="especialidades" value="Volver">
                </form>
            </div>

        </section>
    </section>


</body>
</html>
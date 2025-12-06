<!doctype html>
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
            <button type="submit" class="nav__item nav__item--active" name="citasMedico" >Mis citas</button>
        </form>


        <!-- ELEMENTO: Grupo de Autenticación -->
        <div class="nav__auth-group">
            <form action="index.php" method="post">
                <button type="submit" class="nav__item" name="usuarioMedico" >Mi cuenta</button>
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
    if(isset($_SESSION["mensaje"])){
        echo $_SESSION["mensaje"];
        unset($_SESSION["mensaje"]);
    }
    ?>
    <section id="servicios" class="services">
        <h2 class="services__title">Mis citas</h2>
        <form action="index.php" method="post">
            <input type="date" name="fecha" placeholder="Fecha">
            <button type="submit" name="buscar" value="">Buscar</button>
        </form>
        <div>
            <?php

            if($consulta!=null){
                echo
                "<table class='tabla'>
                <tr>
         
                    <th>Paciente</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>";
                while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)) {

                    echo "<tr>";

                    echo "<td>".$fila["nombrePaciente"]." ".$fila["apellidosPaciente"] ."</td>";
                    echo "<td>".$fila["fecha"]."</td>";
                    echo "<td>".$fila["hora"]."</td>";
                    echo "<td>".$fila["estado"]."</td>";
                    echo "<td>
                    <form action='index.php' method='POST' >
                        <input type='hidden' name='fechaC' value='".$fila["fecha"]."'>
                        <input type='hidden' name='idhoraC' value='".$fila["idhora"]."'>
                        <input type='hidden' name='idMedicoC' value='".$fila["idMedico"]."'>
                        <input type='hidden' name = 'idPaciente' value='".$fila["idPaciente"]."'>
                        <button class='button-table button__back' type='submit' name='informe'>Informe</button>
                    </form>
                    </td>";
                }

                echo"</table>";
            }
            else{
                echo "<h2>No tienes citas</h2>";
            }
            ?>

        </div>



    </section>
</section>

</body>
</html>

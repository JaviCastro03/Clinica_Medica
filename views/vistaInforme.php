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
            <button type="submit" class="nav__item nav__item--active" name="citasMedico" >Mis citas</button>
        </form>


        <!-- ELEMENTO: Grupo de Autenticación -->
        <div class="nav__auth-group">
            <form action="index.php" method="post">
                <button type="submit" class="nav__item" name="usuarioMedico" >Mi cuenta</button>
            </form>
        </div>

        <!-- BOTON PEDIR CITA -->
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
<body>
<div class="pagina-usuarios-admin">
<section>

    <section id="servicios" class="services">
        <h2 class="services__title">Informes</h2>
        <?php echo"<h2>". $nombrePaciente." ".$apellidosPaciente." | ".$dni."</h2>"; ?>

        <div>
            <?php
            if(isset($_SESSION["mensaje"])){
                echo $_SESSION["mensaje"];
                unset($_SESSION["mensaje"]);
            }
            ?>
            <?php

            if($consulta!=null){

                echo "<div class='tabla-responsive-container'>";
                echo "<table class='tabla'
                <tr>
         
                    <th>Código de médico</th>
                    <th>Fecha</th>
                    <th>Motivo</th>
                    <th>Diagnóstico</th>
                    <th>Tratamiento</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>";
                while($fila = $consulta->fetch(PDO::FETCH_ASSOC)){
                    echo "<form action='index.php' method='post'>";
                    echo "<tr>";
                    echo "<input type='hidden' name='id' value='".$fila["id"]."'>";
                    echo "<td>".$fila["idMedico"]."</td>";
                    echo "<td>".$fila["fecha"]."</td>";
                    echo "<td>".$fila["motivo"]."</td>";
                    echo "<td>".$fila["diagnostico"]."</td>";
                    echo "<td>".$fila["tratamiento"]."</td>";
                    if($fila["idMedico"]==$idU){
                        echo "<td><button type='submit' class='button-table button__back' name='editar'>Editar</button></td>";
                        echo "<td><button type='submit' class='button-table button__danger' name='eliminar'>Eliminar</button></td>";
                    }
                    else{
                        echo "<td><button type='submit' class='button-table button__back' name='editar' disabled>Editar</button></td>";
                        echo "<td><button type='submit' class='button-table button__danger' name='eliminar' disabled>Eliminar</button></td>";
                    }

                    echo "</tr>";
                    echo "</form>";
                }

                echo"</table>";
                echo "</div>";
            }
            else{
                echo "<h2>No tiene informes</h2>";
            }
            ?>

        </div>
        <div class="div__button-container ">
            <div class="div__button-table grid-3">
                <form action="index.php" method="post">
                    <input class="button-table button__back " type="submit" name="citasMedico" value="Volver">
                </form>

            </div>
            <div class="grid-2"></div>
            <div class="div__button-table grid-1">
                <form action="index.php" method="post">
                    <input class="button-table button__back " type="submit" name="crearInforme" value="Crear informe">
                </form>
            </div>

        </div>


    </section>
</section>
</div>
</body>
</html>


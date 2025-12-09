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

<!-- BLOQUE: HEADER -->
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
            <button type="submit" class="nav__item " name="landingpage" >Inicio</button>
        </form>
        <form action="index.php" method="post">
            <button type="submit" class="nav__item nav__item--active" name="usuariosAdmin" >Usuarios</button>
        </form>

        <form action="index.php" method="post">
            <button type="submit" class="nav__item" name="medicosAdmin" >Medicos</button>
        </form>


        <!-- ELEMENTO: Grupo de Autenticación -->
        <div class="nav__auth-group">
            <form action="index.php" method="post">
                <button type="submit" class="nav__item " name="usuario" >Mi cuenta</button>
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
    <section id="servicios" class="usuarios-admin">
        <h2 class="services__title">Usuarios</h2>
        <form action="index.php" method="post">
            <input type="date" name="fecha" placeholder="Fecha">
            <button type="submit" name="buscar" value="">Buscar</button>
        </form>

            <?php

            if($consulta!=null){

                echo "<table class='tabla'>";
                echo "<tr>";
                echo "<th>Id</th>";
                echo "<th>Dni</th>";
                echo "<th>Nombre</th>";
                echo "<th>Apellidos</th>";
                echo "<th>Email</th>";
                echo "<th>Rol</th>";
                echo "<th>Teléfono</th>";
                echo "<th>Direccion</th>";
                echo "<th>CP</th>";
                echo "<th>Guardar</th>";
                echo "<th>Eliminar</th>";
                while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
                    echo "<form action='index.php' method='post'>";
                    echo "<tr>";
                    echo "<td><input type='hidden' name='id' value='".$fila["id"]."'>".$fila["id"]."</td>";
                    echo "<td> <input type='text' name='dni' value='".$fila["dni"]."'></td>";
                    echo "<td> <input type='text' name='nombre' value='".$fila["nombre"]."'></td>";
                    echo "<td> <input type='text' name='apellidos' value='".$fila["apellidos"]."'></td>";
                    echo "<td> <input type='email' name='email' value='".$fila["email"]."'></td>";
                    echo "<td> <input type='number' name='rol' value='".$fila["rol"]."'></td>";
                    echo "<td> <input type='text' name='telefono' value='".$fila["telefono"]."'></td>";
                    echo "<td> <input type='text' name='direccion' value='".$fila["direccion"]."'></td>";
                    echo "<td> <input type='number' name='cp' value='".$fila["cp"]."'></td>";

                    echo "<td><button type='submit' class='button-table button__back' name='guardar' value='Guardar'>Guardar</button></td>";
                    echo "<td><button type='submit' class='button-table button__danger' name='eliminar'>Eliminar</button></td>";
                    echo "</form>";
                    echo "</tr>";
                }
                echo "</table>";


            }
            else{
                echo "<h2>No hay usuarios</h2>";
            }
            ?>





    </section>
</section>
</body>
</html>


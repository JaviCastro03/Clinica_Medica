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
            <button type="submit" class="nav__item" name="landingpage">Inicio</button>
        </form>

        <form action="index.php" method="post">
            <button type="submit" class="nav__item " name="usuariosAdmin">Usuarios</button>
        </form>

        <form action="index.php" method="post">
            <button type="submit" class="nav__item nav__item--active" name="medicosAdmin">Medicos</button>
        </form>

        <div class="nav__auth-group">
            <form action="index.php" method="post">
                <button type="submit" class="nav__item" name="usuario">Mi cuenta</button>
            </form>
        </div>

        <button  class="boton-admin" >
            <div class="wrap">
                <p>
                    <span>✦</span>
                    Administrador
                </p>
            </div>
        </button>

    </nav>
</header>


<div class="pagina-usuarios-admin">

    <section>


        <section id="servicios" class="usuarios-admin">

            <h2 class="services__title">Medicos</h2>

            <form action="index.php" method="post" class="form-buscar">
                <input type="email" name="email" placeholder="Email">
                <button type="submit" name="buscar">Buscar</button>
            </form>
            <form action="index.php" method="post" class="form-crearMedico">
                <input type="email" name="email" placeholder="Email">
                <select name="especialidad" required>

                    <option value="" disabled selected>Especialidad</option>
                    <?php
                    if(isset($_SESSION["mensaje"])){
                        echo $_SESSION["mensaje"];
                        unset($_SESSION["mensaje"]);
                    }
                    ?>
                    <?php
                        while($fila=$especialidades->fetch(PDO::FETCH_ASSOC)){
                            echo '<option value="'.$fila['id'].'">'.$fila['nombre'].'</option>';
                        }
                    ?>
                </select>
                <button type="submit" name="addMedico">Añadir médico</button>
            </form>

            <?php

            if($consulta != null){

                echo "<div class='tabla-responsive-container'>";

                echo "<table class='tabla'>";
                echo "<tr>";
                echo "<th>Id</th>";
                echo "<th>Dni</th>";
                echo "<th>Nombre</th>";
                echo "<th>Apellidos</th>";
                echo "<th>Email</th>";
                echo "<th>Teléfono</th>";
                echo "<th>Direccion</th>";
                echo "<th>CP</th>";
                echo "<th>Especialidad</th>";
                echo "<th>Guardar</th>";
                echo "<th>Eliminar</th>";

                while($fila = $consulta->fetch(PDO::FETCH_ASSOC)){
                    $especialidadesA=$conexionMedico->getEspecialidades();
                    echo "<form action='index.php' method='post' onsubmit=\"return confirm('¿Seguro que quiere realizar esta acción?');\">";
                    echo "<tr>";
                    echo "<input type='hidden' name='id' value='".$fila["id"]."'>";
                    echo "<td>".$fila["id"]."</td>";
                    echo "<td>".$fila["dni"]."</td>";
                    echo "<td>".$fila["nombre"]."</td>";
                    echo "<td>".$fila["apellidos"]."</td>";
                    echo "<td>".$fila["email"]."</td>";
                    echo "<td>".$fila["telefono"]."</td>";
                    echo "<td>".$fila["direccion"]."</td>";

                    echo "<td>".$fila["cp"]."</td>";
                    echo "<td>";
                    echo "<select name='especialidadM' required>";

                    $especialidadesA = $conexionMedico->getEspecialidades();
                    while ($esp = $especialidadesA->fetch(PDO::FETCH_ASSOC)) {

                        $selected = ($esp['nombre'] == $fila['nombreE']) ? "selected" : "";

                        echo "<option value='".$esp['id']."' $selected>".$esp['nombre']."</option>";
                    }

                    echo "</select>";

                    echo "</td>";
                    echo "<td><button type='submit' class='button-table button__back' name='guardar'>Guardar</button></td>";
                    echo "<td><button type='submit' class='button-table button__danger' name='eliminar'>Eliminar</button></td>";

                    echo "</tr>";
                    echo "</form>";
                }

                echo "</table>";

                echo "</div>";

            } else {
                echo "<h2>No hay medicos</h2>";
            }

            ?>

        </section>
    </section>

</div> </body>
</html>
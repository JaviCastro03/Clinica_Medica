<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4Ever Young | Clínica Médica</title>
    <link rel="stylesheet" href="./views/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
    <link rel="icon" type="image" href="./views/images/logo/logoSinLetras.png">
    <script src="./controllers/script/validacionesFormularios.js" defer></script>
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



        <div class="nav__auth-group">
            <form action="index.php" method="post">
                <button type="submit" class="nav__item nav__item--active" name="usuario" >Acceder</button>
            </form>
        </div>

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
    if(isset($_SESSION['mensaje'])){
        echo $_SESSION['mensaje'];
        unset($_SESSION['mensaje']);
    }
    ?>
        <section id="login" class="services">

            <div class="login-card-container">
                <div class="login-left-side">
                    <h2 class="login-left-side__title">Registro</h2>
                    <p class="login-left-side__subtitle">Regístrate para gestionar tus citas.</p>


                    <div class="formulario-login">
                        <form action="index.php" method="post" id="vistaRegistro" class="login-form-group"" novalidate>
                            <input id="dni" type="text" name="dni" placeholder="Dni" required pattern="^[0-9]{8}[A-Z]" class="login-input-field">
                            <div id="mensajeError-dni"></div>
                            <!--Hace que el nombre y apellidos solo tengan letras, ademas de permitir nombres compuestos y los dos empiezen por mayusuculas-->
                            <input id="nombre" type="text" name="nombre" placeholder="Nombre" required pattern="^[A-ZÁÉÍÓÚÑÜ][a-záéíóúñü]+(?: [A-ZÁÉÍÓÚÑÜ][a-záéíóúñü]+)*$" class="login-input-field">
                            <div id="mensajeError-nombre"></div>
                            <input  id="apellidos" type="text" name="apellidos" placeholder="Apellidos" required pattern="^[A-ZÁÉÍÓÚÑÜ][a-záéíóúñü]+(?: [A-ZÁÉÍÓÚÑÜ][a-záéíóúñü]+)*$" class="login-input-field">
                            <div id="mensajeError-apellidos"></div>
                            <!--Permite telefonos internacionales ademas de permitir los telefonos con + y permiten tambien espacios y --->
                            <input id="telefono" type="text" name="telefono" placeholder="Teléfono" required pattern="^\+?[0-9][0-9\- ]{6,20}$" class="login-input-field">
                            <div id="mensajeError-telefono"></div>
                            <!--Permite que el codigo postal pueda ser internacional-->
                            <input id="codigopostal" type="text" name="cp" placeholder="Código postal" required pattern="^[A-Za-z0-9][A-Za-z0-9\- ]{2,9}$" class="login-input-field">
                            <div id="mensajeError-codigopostal"></div>
                            <input id="direccion" type="text" name="direccion" placeholder="Direccion" required  class="login-input-field">
                            <div id="mensajeError-direccion"></div>
                            <input id="email" type="email" name="email" placeholder="Email" required class="login-input-field">
                            <div id="mensajeError-email"></div>
                            <!--Hace que sea de 8 caracteres, y contengan al menos 1 mayusucula, 1 minuscula y 1 caracter especial-->
                            <input id="password" type="password" name="password" placeholder="Contraseña" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+\-=\[\]{}|;:,.<>?]).{8}$" class="login-input-field">
                            <div id="mensajeError-password"></div>
                            <input id="passwordConfirm" type="password" name="cpassword" placeholder="Confirmar contraseña" required class="login-input-field">
                            <div id="mensajeError-passwordConfirm"></div>
                            <button type="submit" name="registrar" class="btn--green">Sign In</button>
                        </form>


                        <div class="enlaces-login">
                            <form action="index.php" method="post">
                                <button type="submit" name="login" class="nav__auth-link">¿Ya tienes una cuenta?</button>
                            </form>

                        </div>


                    </div>
                </div>

                <div class="login-right-side">

                </div>
            </div>

        </section>
    </section>


</body>
</html>






<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./views/styles.css">
    <script src="./controllers/script/validacionesFormularios.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
<header>
    <div>
        <h1>Registro</h1>
    </div>
    <?php if(isset($_SESSION["mensaje"])){
        echo $_SESSION["mensaje"];
        unset($_SESSION["mensaje"]);
    } ?>
</header>
<section class="contenedor__formulario">
    <form id="vistaRegistro" class="formulario" action="index.php" method="post" novalidate>
        <!--Hace que el DNI solo tenga 8 letras y una letra en mayuscla-->
        <input id="dni" type="text" name="dni" placeholder="Dni" required pattern="^[0-9]{8}[A-Z]">
        <div id="mensajeError-dni"></div>
        <!--Hace que el nombre y apellidos solo tengan letras, ademas de permitir nombres compuestos y los dos empiezen por mayusuculas-->
        <input id="nombre" type="text" name="nombre" placeholder="Nombre" required pattern="^[A-Z][a-z]+(?: [A-Z][a-z]+)*$">
        <div id="mensajeError-nombre"></div>
        <input  id="apellidos" type="text" name="apellidos" placeholder="Apellidos" required pattern="^[A-Z][a-z]+(?: [A-Z][a-z]+)*$">
        <div id="mensajeError-apellidos"></div>
        <!--Permite telefonos internacionales ademas de permitir los telefonos con + y permiten tambien espacios y --->
        <input id="telefono" type="text" name="telefono" placeholder="Teléfono" required pattern="^\+?[0-9][0-9\- ]{6,20}$">
        <div id="mensajeError-telefono"></div>
        <!--Permite que el codigo postal pueda ser internacional-->
        <input id="codigopostal" type="text" name="cp" placeholder="Código postal" required pattern="^[A-Za-z0-9][A-Za-z0-9\- ]{2,9}$">
        <div id="mensajeError-codigopostal"></div>
        <input id="direccion" type="text" name="direccion" placeholder="Direccion"required >
        <div id="mensajeError-direccion"></div>
        <input id="email" type="email" name="email" placeholder="Email" required>
        <div id="mensajeError-email"></div>
        <!--Hace que sea de 8 caracteres, y contengan al menos 1 mayusucula, 1 minuscula y 1 caracter especial-->
       <input id="password" type="password" name="password" placeholder="Contraseña" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+\-=\[\]{}|;:,.<>?]).{8}$">
       <div id="mensajeError-password"></div>
       <input id="passwordConfrim" type="password" name="cpassword" placeholder="Confirmar contraseña" required>
       <div id="mensajeError-passwordConfrim"></div>
       <input type="submit" name="registrar" value="Registrar">
   </form>
</section>
<form action="index.php" method="post">
   <input type="submit" name="login" value="¿Ya tienes una cuenta?">
</form>
</body>
</html>
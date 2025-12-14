<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./views/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
<header>
    <div>
        <h1>Registro</h1>
    </div>

</header>
<section class="contenedor__formulario">
    <form class="formulario" action="index.php" method="post">
        <input type="date" name="fecha" placeholder="Fecha">
        <textarea name="motivo" cols="100" rows="3" placeholder="Motivo"></textarea>
        <textarea name="diagnostico" cols="100" rows="3" placeholder="Diagnóstico"></textarea>
        <textarea name="tratamiento" cols="100" rows="3" placeholder="Tratamiento"></textarea>
        <input type="submit" name="crear" value="Crear">
    </form>
    <?php if(isset($_SESSION["mensaje"])){
        echo $_SESSION["mensaje"];
        unset($_SESSION["mensaje"]);
    } ?>
</section>

<form action="index.php" method="post">
    <input type="submit" name="informe" value="Volver">
</form>
</body>
</html>
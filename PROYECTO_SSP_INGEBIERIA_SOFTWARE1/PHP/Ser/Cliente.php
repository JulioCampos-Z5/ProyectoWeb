<?php
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Paginas.css">
    <title>Membrecias</title>
</head>

<body>
    <h1></h1>
    <main>
        <form action="" method="post">
            <legend>Registro de clientes</legend>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre">
            <label for="correo">Correo:</label>
            <input type="text" id="correo" name="correo">
            <label for="preferencias">Preferencias:</label>
            <input type="text" id="preferencias" name="preferencias">
            <label for="vigencia">Vigencia:</label>
            <input type="date" name="vigencia" id="vigencia">
            <button>Registrar</button>
        </form>
    </main>
</body>

</html>
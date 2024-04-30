<?php
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Paginas.css">
    <title>Renta de libros</title>
</head>

<body>
    <h1> </h1>
    <nav></nav>
    <main>
        <div>
            <legend>Renta de libros</legend>
            <label for="codigo">Codigo:</label>
            <input type="text" name="codigo">
            <button>Registrar</button>
            <label for="buscador">Buscar</label>
            <input type="text" name="buscador" id="buscador">
        </div>
        <br>
        <div>
            <table>
                <tr>
                    <td>Titulo</td>
                    <td>Stock</td>
                    <td>Precio</td>
                </tr>
                <tr>
                    <td>Juan Perez y sus aventuras</td>
                    <td>5</td>
                    <td>$300</td>
                </tr>
                <tr>
                    <td>La vida es dificil</td>
                    <td>8</td>
                    <td>$500</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Total:$800</td>
                </tr>
            </table>
        </div>
    </main>
</body>

</html>
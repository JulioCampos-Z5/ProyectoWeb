<?php
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>no entrar</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            border: 0;
            padding: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            /* Combina los bordes de las celdas adyacentes */
        }

        tr {
            height: 30px;
            color: black;
        }

        td {
            border: 1px solid black;
            /* Cambié 10000PX a 2px solid black */
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <td>N</td>
            <td>Producto</td>
            <td>Categoria</td>
            <td>Talla</td>
            <td>Precio</td>
        </tr>
        <?php
        $numero_de_tablas = 3; // Define el número de tablas que deseas generar

        // Bucle para generar múltiples tablas
        for ($i = 0; $i < $numero_de_tablas; $i++) { ?>
            <tr>
                <td>1</td>
                <td>xxx</td>
                <td>Playera</td>
                <td>M</td>
                <td>499</td>
            </tr>
            <tr>
                <td>2</td>
                <td>xxx</td>
                <td>Playera</td>
                <td>M</td>
                <td>499</td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>
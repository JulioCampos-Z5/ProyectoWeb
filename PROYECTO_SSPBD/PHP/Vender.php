<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No entrar</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            border: 0;
            padding: 0;
            background-color: #C0C9CD;
        }

        nav {
            margin: 15px;
            border-top-left-radius: 15px;
            border-bottom-left-radius: 15px;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        nav ul li {
            margin: 0;
            padding: 0;
        }

        nav ul li a {
            display: block;
            color: black;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        nav ul li a:hover {
            background-color: #ddd;
            color: black;
            border-radius: 50px;
        }

        a {
            background-color: #DADFE1;
            border-radius: 50px;
        }

        main {
            display: flex;
        }

        .Venta {
            margin: 0px 10px 0px 20px;
            border-radius: 20px;
            background-color: #DADFE1;
            width: calc(50% - 10px);
            max-width: 300px;
            padding: 20px;
            box-sizing: border-box;
        }

        .Venta h1 {
            font-size: 24px;
            text-align: center;
            margin-top: 0;
        }

        table {
            margin: 0px 20px 0px 0px;
            width: calc(100% - 10px);

        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        td {
            background-color: #fff;
        }

        .Boton {
            margin: 10px 5px;
            background-color: #C0C9CD;
            border-radius: 50px;
            font-size: 15px;
            height: 54px;
            width: calc(50% - 10px);
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .Boton1 {
            margin: 0px 5px;
            background-color: #DADFE1;
            border-radius: 50px;
            font-size: 15px;
            height: 54px;
            width: calc(100% - 10px);
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .Boton:hover {
            background-color: #ffffff;
        }

        .Boton1:hover {
            background-color: #ffffff;
        }

        @media screen and (max-width: 600px) {
            nav ul li {
                float: none;
                width: auto;
                text-align: center;
            }

            .Venta,
            table {
                width: 100%;
                max-width: none;
            }
        }
    </style>
</head>

<body>
    <nav>
        <ul>
            <li><input class="Boton1" type="button" value="Vender"></li>
            <li><input class="Boton1" type="button" value="Devolución"></li>
        </ul>
    </nav>
    <main>
        <div class="Venta">
            <h1>Ingrese código del producto</h1>
            <input type="text" name="Barra" id="Barra"> <br>
            <input class="Boton" type="button" value="Agregar">
            <input class="Boton" type="button" value="Escanear producto"> <br>
            <input class="Boton" type="button" value="Eliminar">
            <input class="Boton" type="button" value="Cobrar">
        </div>
        <table>
            <tr>
                <th>N</th>
                <th>Producto</th>
                <th>Categoría</th>
                <th>Talla</th>
                <th>Precio</th>
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
    </main>
</body>

</html>
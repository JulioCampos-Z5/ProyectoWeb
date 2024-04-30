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
            background-color: #C0C9CD;
            float: left;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            float: left;
        }

        nav ul li a {
            display: block;
            color: rgb(0, 0, 0);
            text-align: center;
            padding: 20px 70px;
            text-decoration: none;
        }

        nav ul li a:hover {
            background-color: #ffffff;
            color: black;
            border-radius: 50px;
        }

        li {
            margin: 5px;
        }

        a {
            background-color: #DADFE1;
            border-radius: 50px;
        }

        main {
            display: grid;
            grid-template-columns: 427px 1px;
        }

        .Venta {
            margin: 5px;
            border-radius: 40px;
            background-color: #DADFE1;
            width: 414px;
            height: 480px;
        }

        .Venta h1 {
            padding: 13px 0px 0px 0px;
            font-size: 28px;
            text-align: center;
        }

        table {
            margin: 10px 0px 0px 6px;
            background-color: #DADFE1;
            border-radius: 50px;
            height: 480px;
            width: 1000px;

        }

        #Barra {
            margin: 10px;
            border-radius: 15px;
            font-size: 30px;
            height: 54px;
            width: 92%;
        }

        .Boton {
            margin: 10px;
            background-color: #C0C9CD;
            /* Cambiado el color de fondo */
            border-radius: 50px;
            font-size: 15px;
            height: 54px;
            width: 177px;
            border: none;
            /* Eliminar el borde */
            cursor: pointer;
            /* Cambiar el cursor al pasar sobre los botones */
            transition: background-color 0.3s ease;
            /* Transición suave para el cambio de color de fondo */
        }

        .Boton:hover {
            background-color: #ffffff;
            /* Cambiar el color de fondo al pasar el cursor */
        }


        table {
            width: 1000px;
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
    <nav>
        <ul>
            <li><a href="#">Vender</a></li>
            <li><a href="#">Devolución</a></li>
        </ul>
    </nav>
    <br>
    <br>
    <Br>
    <Br>
    <main>
        <div class="Venta">
            <h1>ingrece código del producto</h1>
            <input type="text" name="Barra" id="Barra"> <br>
            <input class="Boton" type="button" value="Agregar">
            <input class="Boton" type="button" value="Escanear producto"> <br>
            <input class="Boton" type="button" value="Eliminar">
            <input class="Boton" type="button" value="Cobrar">
        </div>
        <main>
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
        </main>
</body>

</html>
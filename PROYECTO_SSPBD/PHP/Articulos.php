<?php
$host = '127.0.0.1'; // Cambiar según tu configuración
$usuario = 'root'; // Cambiar según tu configuración
$contraseña = '5544'; // Cambiar según tu configuración
$base_de_datos = 'tienda_de_ropa'; // Cambiar según tu configuración

// Crear una conexión
$conexion = new mysqli($host, $usuario, $contraseña, $base_de_datos);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// echo "Conexión exitosa";
$sql = "SELECT ID_PRODUCTO, NOMBRE, DESCRIPCCION, PRECIO, TALLA, COLOR, ID_CATEGORIA, ESTADO FROM articulos"; // Corregir el nombre de la tabla
$result = $conexion->query($sql); // Utilizar $conexion en lugar de $conn
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

        tr {
            height: 30px;
            background-color: #DADFE1;
            color: black;
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

        input {
            margin: 5px 0px 0px 5px;
            border-radius: 15px 15px;
            font-size: 30px;
            height: 54px;
            width: 300px;
        }

        .Boton {
            margin: 5px 5px;
            background-color: #DADFE1;
            border-radius: 50px;
            font-size: 15px;
            height: 54px;
            width: calc(170% - 10px);
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .Boton:hover {
            background-color: #ffffff;
        }

        a {
            background-color: #DADFE1;
            border-radius: 50px;
        }
    </style>
</head>

<body>
    <nav>
        <ul>
            <li><input type="text" name="" id=""></li>
            <li><input class="Boton" type="button" value="Agregar"></li>
        </ul>
    </nav>
    <table>
        <tr>
            <td>N</td>
            <td>Nombre</td>
            <td>Descripción</td>
            <td>Precio</td>
            <td>Talla</td>
            <td>Color</td>
            <td>Categoria</td>
            <td>Estado</td>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Mostrar los datos de cada usuario
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["ID_PRODUCTO"] . "</td><td>" . $row["NOMBRE"] . "</td><td>" . $row["DESCRIPCCION"] . "</td><td>" . $row["PRECIO"] . "</td><td>" . $row["TALLA"] . "</td><td>" . $row["COLOR"] . "</td><td>" . $row["ID_CATEGORIA"] . "</td><td>" . $row["ESTADO"]  . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='4'>0 resultados</td></tr>";
        }
        ?>
    </table>
    <?php $conexion->close(); ?>
</body>

</html>
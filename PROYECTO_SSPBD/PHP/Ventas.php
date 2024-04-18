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

echo "Conexión exitosa";
$sql = "SELECT ID_VENTAS, ID_PRODUCTO, FECHA_DE_VENTA, CANTIDAD_VENDIDAD, PRECIO_DE_VENTA, ID_CLIENTE, ID_EMPLEADO, ID_METODOPAGO FROM ventas"; // Corregir el nombre de la tabla
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
        }

        table {
            width: 100%;
            background-color: black;
        }

        tr {
            height: 30px;
            background-color: #DADFE1;
            color: black;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <td>N Ventas</td>
            <td>Producto</td>
            <td>Fecha de venta</td>
            <td>Cantidad</td>
            <td>Precio</td>
            <td>Cliente</td>
            <td>Empleado</td>
            <td>Método de pago</td>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Mostrar los datos de cada usuario
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["ID_VENTAS"] . "</td><td>" . $row["ID_PRODUCTO"] . "</td><td>" . $row["FECHA_DE_VENTA"] . "</td><td>" . $row["CANTIDAD_VENDIDAD"] . "</td><td>" . $row["PRECIO_DE_VENTA"] . "</td><td>" . $row["ID_CLIENTE"] . "</td><td>" . $row["ID_EMPLEADO"] . "</td><td>" . $row["ID_METODOPAGO"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='4'>0 resultados</td></tr>";
        }
        ?>
    </table>
    <?php $conexion->close(); ?>
</body>

</html>
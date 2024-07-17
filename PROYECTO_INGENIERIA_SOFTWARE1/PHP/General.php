<?php
include("BD.php");

function Empleado()
{
    global $conexion;

    if (!$conexion) {
        echo "Conexión no válida";
        return;
    }

    $sql = "SELECT NOMBRE, NSS, HORARIO, CARGO, SUELDO FROM empleado";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        echo "<table>
            <tr>
                <td>Nombre</td>
                <td>NSS</td>
                <td>Horario</td>
                <td>Cargo</td>
                <td>Sueldo</td>
            </tr>";

        while ($Datos = $resultado->fetch_assoc()) {
            echo "<tr>
                <td>" . htmlspecialchars($Datos["NOMBRE"]) . "</td>
                <td>" . htmlspecialchars($Datos["NSS"]) . "</td>
                <td>" . htmlspecialchars($Datos["HORARIO"]) . "</td>
                <td>" . htmlspecialchars($Datos["CARGO"]) . "</td>
                <td>" . htmlspecialchars($Datos["SUELDO"]) . "</td>
            </tr>";
        }

        echo "</table>";
    } else {
        echo "0 Datos";
    }

    $conexion->close();
}

function Proveedor()
{
    global $conexion;

    if (!$conexion) {
        echo "Conexión no válida";
        return;
    }

    $sql = "SELECT MARCA, CORREO, DIRECCION FROM proveedor";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        echo "<table>
            <tr>
                <td>MARCA</td>
                <td>CORREO</td>
                <td>DIRECCIÓN</td>
            </tr>";

        while ($Datos = $resultado->fetch_assoc()) {
            echo "<tr>
                <td>" . htmlspecialchars($Datos["MARCA"]) . "</td>
                <td>" . htmlspecialchars($Datos["CORREO"]) . "</td>
                <td>" . htmlspecialchars($Datos["DIRECCION"]) . "</td>
            </tr>";
        }

        echo "</table>";
    } else {
        echo "0 Datos";
    }

    $conexion->close();
}

function Venta()
{
    global $conexion;

    if (!$conexion) {
        echo "Conexión no válida";
        return;
    }

    $sql = "SELECT ventas.ID, ventas.ID_EMPLEADO, ventas.FECHA, prendas_vendidas.ID_PRENDAS, prendas_vendidas.CANTIDAD, prendas_vendidas.PRECIO, prendas.TIPO, empleado.NOMBRE 
            FROM ventas
            JOIN prendas_vendidas ON ventas.ID = prendas_vendidas.ID_VENTAS
            JOIN prendas ON prendas_vendidas.ID_PRENDAS = prendas.ID
            JOIN empleado ON ventas.ID_EMPLEADO = empleado.ID";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        echo "<table>
            <tr>
                <td>ID Venta</td>
                <td>Nombre Empleado</td>
                <td>Tipo</td>
                <td>Fecha</td>
                <td>Cantidad</td>
                <td>Precio</td>
            </tr>";

        while ($Datos = $resultado->fetch_assoc()) {
            echo "<tr>
                <td>" . htmlspecialchars($Datos["ID"]) . "</td>
                <td>" . htmlspecialchars($Datos["NOMBRE"]) . "</td>
                <td>" . htmlspecialchars($Datos["TIPO"]) . "</td>
                <td>" . htmlspecialchars($Datos["FECHA"]) . "</td>
                <td>" . htmlspecialchars($Datos["CANTIDAD"]) . "</td>
                <td>$" . htmlspecialchars($Datos["PRECIO"]) . "</td>
            </tr>";
        }

        echo "</table>";
    } else {
        echo "0 Datos";
    }

    $conexion->close();
}

function Prendas()
{
    global $conexion;

    if (!$conexion) {
        echo "Conexión no válida";
        return;
    }

    $sql = "SELECT MARCA, TIPO, DESCRIPCION, PRECIO, STOCK FROM prendas";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        echo "<table>
            <tr>
                <td>MARCA</td>
                <td>TIPO</td>
                <td>DESCRIPCION</td>
                <td>PRECIO</td>
                <td>STOCK</td>
            </tr>";

        while ($Datos = $resultado->fetch_assoc()) {
            echo "<tr>
                <td>" . htmlspecialchars($Datos["MARCA"]) . "</td>
                <td>" . htmlspecialchars($Datos["TIPO"]) . "</td>
                <td>" . htmlspecialchars($Datos["DESCRIPCION"]) . "</td>
                <td>" . htmlspecialchars($Datos["PRECIO"]) . "</td>
                <td>" . htmlspecialchars($Datos["STOCK"]) . "</td>
            </tr>";
        }

        echo "</table>";
    } else {
        echo "0 Datos";
    }

    $conexion->close();
}

function Compra()
{
    global $conexion;

    if (!$conexion) {
        echo "Conexión no válida";
        return;
    }

    $sql = "SELECT compra.ID AS COMPRA_ID, proveedor.MARCA, compra.FECHA, prendas.DESCRIPCION, prendas_compradas.CANTIDAD, prendas_compradas.COSTO 
            FROM compra
            JOIN prendas_compradas ON compra.ID = prendas_compradas.ID_COMPRA
            JOIN prendas ON prendas_compradas.ID_PRENDAS = prendas.ID
            JOIN proveedor ON compra.ID_PROVEEDOR = proveedor.ID";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        echo "<table>
            <tr>
                <th>ID Compra</th>
                <th>Proveedor</th>
                <th>Fecha</th>
                <th>Prenda</th>
                <th>Cantidad</th>
                <th>Costo</th>
            </tr>";

        while ($Datos = $resultado->fetch_assoc()) {
            echo "<tr>
                <td>" . htmlspecialchars($Datos["COMPRA_ID"]) . "</td>
                <td>" . htmlspecialchars($Datos["MARCA"]) . "</td>
                <td>" . htmlspecialchars($Datos["FECHA"]) . "</td>
                <td>" . htmlspecialchars($Datos["DESCRIPCION"]) . "</td>
                <td>" . htmlspecialchars($Datos["CANTIDAD"]) . "</td>
                <td>$" . htmlspecialchars($Datos["COSTO"]) . "</td>
            </tr>";
        }

        echo "</table>";
    } else {
        echo "0 Datos";
    }

    $conexion->close();
}

function Devolucion()
{
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap");

        body {
            font-family: Poppins, sans-serif;
        }

        nav {
            overflow: hidden;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            float: left;
        }

        nav ul li {
            display: block;
            color: black;
            text-align: center;
            text-decoration: none;
        }

        label {
            font: inherit;
        }

        input[type="button"] {
            margin: 0px 5px;
            border: 0;
            padding: 0;
            border-radius: 10px;
            width: 100px;
            height: 50px;
        }

        input[type="button"]:hover {
            background-color: #fff;
        }

        input[type="submit"] {
            margin: 0px 5px;
            border: 0;
            padding: 0;
            border-radius: 10px;
            width: 100px;
            height: 50px;
        }

        input[type="submit"]:hover {
            background-color: #fff;
        }

        input[type="text"] {
            margin: 0;
            border: 0;
            padding: 0;
        }

        table {
            width: 100%;
            background-color: #fff;
            border-collapse: collapse;
        }

        th,
        td {
            border-bottom: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Todos los Registros</h1>
    <nav>
        <ul>
            <li><input type="button" value="Venta" name="Venta"></li>
            <li><input type="button" value="Compra" name="Compra"></li>
            <li><input type="button" value="Prendas" name="Prendas"></li>
            <li><input type="button" value="Proveedor" name="Proveedor"></li>
            <li><input type="button" value="Devolucion" name="Devolucion"></li>
            <li><input type="button" value="Empleado" name="Empleado"></li>
        </ul>
    </nav>
    <?php
    $variable = isset($_GET['action']) ? $_GET['action'] : 'default';

    switch ($variable) {
        case 'Venta':
            echo "<h2>Contenido para Venta</h2>";
            Venta();
            break;
        case 'Compra':
            echo "<h2>Contenido para Compra</h2>";
            Compra();
            break;
        case 'Proveedor':
            echo "<h2>Contenido para Proveedor</h2>";
            Proveedor();
            break;
        case 'Prendas':
            echo "<h2>Contenido para Prendas</h2>";
            Prendas();
            break;
        case 'Devolucion':
            echo "<h2>Contenido para Devolución</h2>";
            Devolucion();
            break;
        case 'Empleado':
            echo "<h2>Contenido para Empleado</h2>";
            Empleado();
            break;
        default:
            echo "<h2>Selecciona una opción del menú</h2>";
            break;
    }
    ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Obtener todos los botones del menú
            const buttons = document.querySelectorAll('input[type="button"]');

            // Función para manejar el clic en los botones del menú
            function handleButtonClick(event) {
                const action = event.target.name;
                window.location.href = window.location.pathname + '?action=' + action;
            }

            // Agregar un event listener a cada botón del menú
            buttons.forEach(button => {
                button.addEventListener('click', handleButtonClick);
            });
        });
    </script>
</body>

</html>
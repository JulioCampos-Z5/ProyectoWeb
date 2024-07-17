<?php
include("BD.php");

function Empleado()
{
    global $conexion;

    if (!$conexion) {
        echo "Conexión no válida";
        return;
    }

    $sql = "SELECT NOMBRE, NSS, HORARIO, CARGO, SUELDO FROM personal";
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
    </style>
</head>

<body>
    <h1>Todos los Registros</h1>
    <nav>
        <ul>
            <li><input type="button" value="Empleado" name="Empleado"></li>
            <li><input type="button" value="Proveedor" name="Proveedor"></li>
            <li><input type="button" value="Compra" name="Compra"></li>
            <li><input type="button" value="Cliente" name="Cliente"></li>
            <li><input type="button" value="Venta" name="Venta"></li>
            <li><input type="button" value="Devolucion" name="Devolucion"></li>
        </ul>
    </nav>
    <?php
    $variable = isset($_GET['action']) ? $_GET['action'] : 'default';

    switch ($variable) {
        case 'Empleado':
            echo "<h2>Contenido para Empleado</h2>";
            Empleado();
            break;
        case 'Proveedor':
            echo "<h2>Contenido para Proveedor</h2>";
            break;
        case 'Compra':
            echo "<h2>Contenido para Compra</h2>";
            break;
        case 'Cliente':
            echo "<h2>Contenido para Cliente</h2>";
            break;
        case 'Venta':
            echo "<h2>Contenido para Venta</h2>";
            break;
        case 'Devolucion':
            echo "<h2>Contenido para Devolución</h2>";
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
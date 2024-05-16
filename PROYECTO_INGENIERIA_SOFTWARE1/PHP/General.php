<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
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

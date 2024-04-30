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
$sql = "SELECT ID_EMPLEADO, NOMBRE, CARGO, TELEFONO FROM empleados"; // Corregir el nombre de la tabla
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
            <td>N</td>
            <td>Nombre</td>
            <td>Cargo</td>
            <td>Teléfono</td>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Mostrar los datos de cada usuario
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["ID_EMPLEADO"] . "</td><td>" . $row["NOMBRE"] . "</td><td>" . $row["CARGO"] . "</td><td>" . $row["TELEFONO"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='4'>0 resultados</td></tr>";
        }
        ?>
        <?php if (isset($_POST['boton'])) {
            $boton = $_POST['boton'];
            if ($boton === "Agregar") { ?>
                <tr>
                    <td><button name="guardar" id="guardar">Guardar</button></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                </tr>
        <?php }
        } ?>
    </table>
    <?php $conexion->close(); ?>
</body>

</html>
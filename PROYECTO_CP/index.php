<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de estacionamiento</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="button"] {
            padding: 10px;
            margin: 5px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <h2>Control de estacionamiento</h2>

    <!-- Botones -->
    <input type="button" value="Abrir" onclick="incrementarEntrada()">
    <input type="button" value="Cerrar">
    <input type="button" value="Desbloquear">
    <input type="button" value="Bloquear">

    <!-- Tabla de entradas -->
    <h3>Tabla de entradas</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Entrada</th>
        </tr>
        <?php
        // Conectar a la base de datos
        $conexion = new mysqli("localhost", "root", "5544", "arduino");

        // Comprobar la conexión
        if ($conexion->connect_error) {
            die("Error en la conexión: " . $conexion->connect_error);
        }

        // Consulta SQL para obtener las entradas
        $sql = "SELECT id, Entrada FROM entrada";
        $result = $conexion->query($sql);

        // Mostrar los resultados en la tabla
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["Entrada"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No hay entradas</td></tr>";
        }
        $conexion->close();
        ?>
    </table>

    <!-- Tabla de salidas -->
    <h3>Tabla de salidas</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Salida</th>
        </tr>
        <?php
        // Conectar a la base de datos
        $conexion = new mysqli("localhost", "root", "5544", "arduino");

        // Comprobar la conexión
        if ($conexion->connect_error) {
            die("Error en la conexión: " . $conexion->connect_error);
        }

        // Consulta SQL para obtener las salidas
        $sql = "SELECT id, Salida FROM salida";
        $result = $conexion->query($sql);

        // Mostrar los resultados en la tabla
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["Salida"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No hay salidas</td></tr>";
        }
        $conexion->close();
        ?>
    </table>

    <iframe src="http://localhost/Proyectos_Web/PROYECTO_CP/incrementar_entrada.php" frameborder="0"></iframe>

    <script>
        function incrementarEntrada() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Actualizar la página después de realizar la operación
                    location.reload();
                }
            };
            // Enviar una solicitud GET al servidor para incrementar la entrada en la base de datos
            xmlhttp.open("GET", "incrementar_entrada.php", true);
            xmlhttp.send();
        }
    </script>
</body>

</html>

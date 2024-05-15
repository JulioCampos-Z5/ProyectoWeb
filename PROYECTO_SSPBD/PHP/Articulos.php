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
$sql = "SELECT ID_PRODUCTO, NOMBRE, DESCRIPCION, PRECIO, TALLA, COLOR, ID_CATEGORIA, ESTADO FROM articulos"; // Corregir el nombre de la tabla
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
            margin: 0px 20px 0px 5px;
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
            height: 3px;
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

        input[type="text"] {
            margin: 0;
            border: 0;
            border-radius: 0;
            width: 100%;
            height: 100%;
            font-size: 20px;
        }

        .G {
            margin: 0;
            border: 0;
            border-radius: 0;
            width: 100%;
            height: 100%;
            font-size: 20px;
        }

        .G:hover {
            background-color: #ffffff;
        }

        input[type="search"] {
            margin: 5px 0px 0px 5px;
            border: 0;
            border-radius: 50;
            width: 100%;
            height: 54px;
            font-size: 20px;
        }

        /* Ocultar la fila por defecto */
        #filaAgregar {
            display: none;
        }
    </style>
</head>

<body>
    <nav>
        <ul>
            <li><input type="search" name="" id=""></li>
            <li><input class="Boton" type="button" value="Agregar" onclick="mostrarFilaAgregar()"></li>
        </ul>
    </nav>
    <table>
        <tr>
            <th>N</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Talla</th>
            <th>Color</th>
            <th>Categoria</th>
            <th>Estado</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Mostrar los datos de cada usuario
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["ID_PRODUCTO"] . "</td>
                <td>" . $row["NOMBRE"] . "</td>
                <td>" . $row["DESCRIPCION"] . "</td>
                <td>" . $row["PRECIO"] . "</td>
                <td>" . $row["TALLA"] . "</td>
                <td>" . $row["COLOR"] . "</td>
                <td>" . $row["ID_CATEGORIA"] . "</td>
                <td>" . $row["ESTADO"]  . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='4'>0 resultados</td></tr>";
        }
        ?>
        <?php $conexion->close(); ?>
        <?php
        // aqui se hara la inset sql
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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $talla = $_POST['talla'];
            $color = $_POST['color'];
            $id_categoria = $_POST['id_categoria'];
            $estado = $_POST['estado'];

            $sql_insert = "INSERT INTO articulos (NOMBRE, DESCRIPCION, PRECIO, TALLA, COLOR, ID_CATEGORIA, ESTADO) VALUES ('$nombre', '$descripcion', '$precio', '$talla', '$color', '$id_categoria', '$estado')";

            if ($conexion->query($sql_insert) === TRUE) {
                echo "Registro insertado correctamente.";
            } else {
                echo "Error al insertar el registro: " . $conexion->error;
            }
        }
        ?>
        <tr id="filaAgregar">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <td><input class="G" type="submit" value="Guardar"></td>
                <td><input type="text" name="nombre"></td>
                <td><input type="text" name="descripcion"></td>
                <td><input type="text" name="precio"></td>
                <td><input type="text" name="talla"></td>
                <td><input type="text" name="color"></td>
                <td><input type="text" name="id_categoria"></td>
                <td><input type="text" name="estado"></td>
            </form>
        </tr>
    </table>
    <script>
        function mostrarFilaAgregar() {
            var filaAgregar = document.getElementById('filaAgregar');
            // Alternar la visibilidad de la fila al hacer clic en el botón
            filaAgregar.style.display = filaAgregar.style.display === 'none' ? 'table-row' : 'none';
        }
    </script>
</body>

</html>
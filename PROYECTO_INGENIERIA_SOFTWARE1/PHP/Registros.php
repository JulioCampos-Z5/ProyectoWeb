<?php
include("BD.php"); ?>
<?php
function Venta()
{
    global $conexion;

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['prenda'])) {
        $prenda = $conexion->real_escape_string($_POST['prenda']);
        $idEmpleado = 1; // replace with the actual employee ID
        $fecha = date('Y-m-d H:i:s');

        $sql = "INSERT INTO ventas (ID_EMPLEADO, FECHA) VALUES ('$idEmpleado', '$fecha')";
        if ($conexion->query($sql) === TRUE) {
            $idVenta = $conexion->insert_id;
            $sqlPrendasVendidas = "INSERT INTO prendas_vendidas (ID_VENTAS, ID_PRENDAS, CANTIDAD, PRECIO) VALUES ('$idVenta', '$prenda', 1, 100)"; // replace quantity and price with actual values
            $conexion->query($sqlPrendasVendidas);
            echo "Venta realizada correctamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
    }
?>
    <form method="POST" action="">
        <label for="prenda">Codigo producto</label>
        <input type="text" name="prenda" id="prenda">
        <input type="submit" value="Guardar">
    </form>
<?php } ?>

<?php
function Devolucion()
{
    global $conexion;

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['prenda'])) {
        $prenda = $conexion->real_escape_string($_POST['prenda']);
        $idEmpleado = 1; // replace with the actual employee ID
        $fecha = date('Y-m-d H:i:s');

        $sql = "INSERT INTO devoluciones (ID_EMPLEADO, FECHA) VALUES ('$idEmpleado', '$fecha')";
        if ($conexion->query($sql) === TRUE) {
            $idDevolucion = $conexion->insert_id;
            $sqlPrendasDevueltas = "INSERT INTO prendas_devueltas (ID_DEVOLUCION, ID_PRENDAS, ID_PRENDAS_VENDIDAS, CANTIDAD, CONCEPTO, DINERO_DEVUELTO) VALUES ('$idDevolucion', '$prenda', 1, 1, 'Defecto', 100)"; // replace ID_PRENDAS_VENDIDAS, quantity, concept, and refunded money with actual values
            $conexion->query($sqlPrendasDevueltas);
            echo "Devolución realizada correctamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
    }
?>
    <form method="POST" action="">
        <label for="prenda">Codigo producto</label>
        <input type="text" name="prenda" id="prenda">
        <input type="submit" value="Guardar">
    </form>
<?php } ?>

<?php 

function Empleado() {
    global $conexion;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = $_POST['nombre'];
        $nss = $_POST['nss'];
        $horario = $_POST['horario'];
        $cargo = $_POST['cargo'];
        $sueldo = $_POST['sueldo'];

        // Use prepared statements
        $sql = $conexion->prepare("INSERT INTO empleado (NOMBRE, NSS, HORARIO, CARGO, SUELDO) VALUES (?, ?, ?, ?, ?)");
        $sql->bind_param("sssss", $nombre, $nss, $horario, $cargo, $sueldo);

        if ($sql->execute()) {
            echo "Empleado registrado correctamente";
        } else {
            echo "Error: " . $sql->error;
        }
    }
?>
    <form method="POST" action="">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre">
        <label for="nss">NSS</label>
        <input type="text" name="nss" id="nss">
        <label for="horario">Horario</label>
        <input type="text" name="horario" id="horario">
        <label for="cargo">Cargo</label>
        <input type="text" name="cargo" id="cargo">
        <label for="sueldo">Sueldo</label>
        <input type="text" name="sueldo" id="sueldo">
        <input type="submit" value="Guardar">
    </form>
<?php 
} ?>

<?php
function Prendas()
{
    global $conexion;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $marca = $conexion->real_escape_string($_POST['marca']);
        $tipo = $conexion->real_escape_string($_POST['tipo']);
        $descripcion = $conexion->real_escape_string($_POST['descripcion']);
        $precio = $conexion->real_escape_string($_POST['precio']);
        $stock = $conexion->real_escape_string($_POST['stock']);

        $sql = "INSERT INTO prendas (MARCA, TIPO, DESCRIPCION, PRECIO, STOCK) VALUES ('$marca', '$tipo', '$descripcion', '$precio', '$stock')";
        if ($conexion->query($sql) === TRUE) {
            echo "Prenda registrada correctamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
    }
?>
    <form method="POST" action="">
        <label for="marca">Marca</label>
        <input type="text" name="marca" id="marca">
        <label for="tipo">Tipo</label>
        <input type="text" name="tipo" id="tipo">
        <label for="descripcion">Descripcion</label>
        <input type="text" name="descripcion" id="descripcion">
        <label for="precio">Precio</label>
        <input type="text" name="precio" id="precio">
        <label for="stock">Stock</label>
        <input type="text" name="stock" id="stock">
        <input type="submit" value="Guardar">
    </form>
<?php } ?>

<?php
function Proveedor()
{
    global $conexion;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $marca = $conexion->real_escape_string($_POST['marca']);
        $correo = $conexion->real_escape_string($_POST['correo']);
        $direccion = $conexion->real_escape_string($_POST['direccion']);

        $sql = "INSERT INTO proveedor (MARCA, CORREO, DIRECCION) VALUES ('$marca', '$correo', '$direccion')";
        if ($conexion->query($sql) === TRUE) {
            echo "Proveedor registrado correctamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
    }
?>
    <form method="POST" action="">
        <label for="marca">Marca</label>
        <input type="text" name="marca" id="marca">
        <label for="correo">Correo</label>
        <input type="text" name="correo" id="correo">
        <label for="direccion">Dirección</label>
        <input type="text" name="direccion" id="direccion">
        <input type="submit" value="Guardar">
    </form>
<?php } ?>

<?php
function Compra()
{
    global $conexion;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $proveedor = $conexion->real_escape_string($_POST['proveedor']);
        $prenda = $conexion->real_escape_string($_POST['prenda']);
        $cantidad = $conexion->real_escape_string($_POST['cantidad']);
        $costo = $conexion->real_escape_string($_POST['costo']);
        $fecha = date('Y-m-d H:i:s');

        $sql = "INSERT INTO compra (ID_PROVEEDOR, FECHA) VALUES ('$proveedor', '$fecha')";
        if ($conexion->query($sql) === TRUE) {
            $idCompra = $conexion->insert_id;
            $sqlPrendasCompradas = "INSERT INTO prendas_compradas (ID_COMPRA, ID_PRENDAS, CANTIDAD, COSTO) VALUES ('$idCompra', '$prenda', '$cantidad', '$costo')";
            $conexion->query($sqlPrendasCompradas);
            echo "Compra realizada correctamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
    }
?>
    <p>Antes de hacer una compra primero debe estar registrada la Prenda y el proveedor.</p>
    <form method="POST" action="">
        <label for="proveedor">Proveedor</label>
        <input type="text" name="proveedor" id="proveedor">
        <label for="prenda">Prenda</label>
        <input type="text" name="prenda" id="prenda">
        <label for="cantidad">Cantidad</label>
        <input type="text" name="cantidad" id="cantidad">
        <label for="costo">Costo</label>
        <input type="text" name="costo" id="costo">
        <input type="submit" value="Guardar">
    </form>
<?php } ?>



<?php function opc()
{ ?>
    <nav>
        <ul>
            <li><input type="button" value="Compras" name="Compras" onclick="showSubSection('Compras')"></li>
            <li><input type="button" value="Proveedor" name="Proveedor" onclick="showSubSection('Proveedor')"></li>
            <li><input type="button" value="Prendas" name="Prendas" onclick="showSubSection('Prendas')"></li>
        </ul>
    </nav>
    <div id="subsection-content">
        <h2>Selecciona una subacción del menú</h2>
    </div>
<?php } ?>
<!-- 
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

        input[type="submit"] {
            margin: 0px 5px;
            border: 0;
            padding: 0;
            border-radius: 5px;
            width: 100px;
            height: 20px;
        }

        input[type="button"]:hover,
        input[type="submit"]:hover {
            background-color: #fff;
        }

        input[type="text"] {
            margin: 0;
            border: 0;
            padding: 0;
            height: 20px;
            border-radius: 5px;
            font-size: 14PX;
        }
    </style>
</head>

<body>
    <h1>Registros</h1>
    <nav>
        <ul>
            <li><input type="button" value="Venta" name="Venta" onclick="navigate('Venta')"></li>
            <li><input type="button" value="Devolucion" name="Devolucion" onclick="navigate('Devolucion')"></li>
            <li><input type="button" value="Compra" name="Compra" onclick="navigate('Compra')"></li>
            <li><input type="button" value="Empleado" name="Empleado" onclick="navigate('Empleado')"></li>
            <li><input type="button" value="Cliente" name="Cliente" onclick="navigate('Cliente')"></li>
        </ul>
    </nav>
    <div id="main-content">
        <h2>Selecciona una opción del menú</h2>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.navigate = function(action) {
                const mainContent = document.getElementById('main-content');
                switch (action) {
                    case 'Venta':
                        mainContent.innerHTML = `<h2>Contenido para Venta</h2><?php Venta(); ?>`;
                        break;
                    case 'Devolucion':
                        mainContent.innerHTML = `<h2>Contenido para Devolución</h2><?php Devolucion(); ?>`;
                        break;
                    case 'Compra':
                        mainContent.innerHTML = `<h2>Contenido para Compra</h2><?php opc(); ?>`;
                        break;
                    case 'Empleado':
                        mainContent.innerHTML = `<h2>Contenido para Empleado</h2><?php Empleado(); ?>`;
                        break;
                        break;
                    case 'Cliente':
                        mainContent.innerHTML = `<h2>Contenido para Cliente</h2><?php Cliente(); ?>`;
                        break;
                    default:
                        mainContent.innerHTML = `<h2>Selecciona una opción del menú</h2>`;
                        break;
                }
            };

            window.showSubSection = function(subaction) {
                const subsectionContent = document.getElementById('subsection-content');
                switch (subaction) {
                    case 'Compras':
                        subsectionContent.innerHTML = `<?php Compra(); ?>`;
                        break;
                    case 'Proveedor':
                        subsectionContent.innerHTML = `<?php Proveedor(); ?>`;
                        break;
                    case 'Prendas':
                        subsectionContent.innerHTML = `<?php Prendas(); ?>`;
                        break;
                    default:
                        subsectionContent.innerHTML = `<h2>Selecciona una subacción del menú</h2>`;
                        break;
                }
            };
        });
    </script>
</body>

</html> -->
<?php
include("BD.php");

// Funciones PHP
function Venta()
{
    global $conexion;
    $id_cliente = $_POST[''];
    $id_empleado = $_POST[''];
    $fecha = $_POST['fecha'];
    $id_Venta = $_POST[''];
    $id_libro = $_POST[''];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];


?>
    <input type="text" name="" required>
    <input type="date" name="" required>
    <input type="text" name="fecha" required>
    <input type="text" name="" required>
    <input type="text" name="" required>
    <input type="text" name="precio" required>
    <input type="text" name="cantidad" required>
    <input class="G" type="submit" value="Guardar">
<?php }

function Renta()
{
    // Código para la función Renta
}

function Empleado()
{
    global $conexion;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = htmlspecialchars($_POST['nombre']);
        $cargo = htmlspecialchars($_POST['cargo']);
        $nss = htmlspecialchars($_POST['nss']);
        $sueldo = htmlspecialchars($_POST['sueldo']);
        $horario = htmlspecialchars($_POST['horario']);

        $stmt = $conexion->prepare("INSERT INTO empleados (Nombre, NSS, Horario, Cargo, Sueldo) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nombre, $nss, $horario, $cargo, $sueldo);

        if ($stmt->execute()) {
            echo "Empleado Registrado";
        } else {
            echo "Error de Registro de empleado: " . $conexion->error;
        }
    }

    echo '
    <form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">
        <label for="nombre">Nombre<br><input type="text" name="nombre" id="nombre"><br></label>
        <label for="cargo">Cargo<br><input type="text" name="cargo" id="cargo"><br></label>
        <label for="nss">NSS<br><input type="text" name="nss" id="nss"><br></label>
        <label for="sueldo">Sueldo<br><input type="text" name="sueldo" id="sueldo"><br></label>
        <label for="horario">Horario<br><input type="text" name="horario" id="horario"><br></label>
        <input type="submit" value="Guardar">
    </form>';
}

function Libros()
{
    global $conexion;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $titulo = htmlspecialchars($_POST['titulo']);
        $editorial = htmlspecialchars($_POST['editorial']);
        $autor = htmlspecialchars($_POST['autor']);
        $genero = htmlspecialchars($_POST['genero']);
        $edicion = htmlspecialchars($_POST['edicion']);
        $precio = htmlspecialchars($_POST['precio']);
        $stock = htmlspecialchars($_POST['stock']);

        $stmt = $conexion->prepare("INSERT INTO libros (Titulo, ID_Editorial, Autor, Genero, Edicion, Precio, Stock) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $titulo, $editorial, $autor, $genero, $edicion, $precio, $stock);

        if ($stmt->execute()) {
            echo "Libro Registrado";
        } else {
            echo "Error de Registro de libro: " . $conexion->error;
        }
    }

    echo '
    <form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">
        <label for="titulo">Titulo<br><input type="text" name="titulo" id="titulo"><br></label>
        <label for="editorial">Editorial<br><input type="text" name="editorial" id="editorial"><br></label>
        <label for="autor">Autor<br><input type="text" name="autor" id="autor"><br></label>
        <label for="genero">Genero<br><input type="text" name="genero" id="genero"><br></label>
        <label for="edicion">Edicion<br><input type="text" name="edicion" id="edicion"><br></label>
        <label for="precio">Precio<br><input type="text" name="precio" id="precio"><br></label>
        <label for="stock">Stock<br><input type="text" name="stock" id="stock"><br></label>
        <input type="submit" value="Guardar">
    </form>';
}

function Editorial()
{
    global $conexion;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = htmlspecialchars($_POST['nombre']);
        $contacto = htmlspecialchars($_POST['contacto']);
        $direccion = htmlspecialchars($_POST['direccion']);

        $stmt = $conexion->prepare("INSERT INTO editorial (Nombre, Contacto, Direccion) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nombre, $contacto, $direccion);

        if ($stmt->execute()) {
            echo "Editorial Registrada";
        } else {
            echo "Error de Registro de editorial: " . $conexion->error;
        }
    }
    echo '
    <form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">
        <label for="nombre">Nombre<br><input type="text" name="nombre" id="nombre"><br></label>
        <label for="contacto">Contacto<br><input type="text" name="contacto" id="contacto"><br></label>
        <label for="direccion">Dirección<br><input type="text" name="direccion" id="direccion"><br></label>
        <input type="submit" value="Guardar">
    </form>';
}

function Compra()
{
    echo '
    <p>Antes de hacer una compra primero debe estar registrada la Editorial y luego el libro.</p>
    <label for="editorial">Editorial<input type="text" name="editorial" id="editorial"></label>
    <input type="button" value="Seleccionar">';
}

function Cliente()
{
    global $conexion;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = htmlspecialchars($_POST['nombre']);
        $vigencia = htmlspecialchars($_POST['vigencia']);
        $correo = htmlspecialchars($_POST['correo']);
        $preferencias = htmlspecialchars($_POST['preferencias']);

        $stmt = $conexion->prepare("INSERT INTO cliente (Nombre, Vigencia, Correo, Preferencias) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nombre, $vigencia, $correo, $preferencias);

        if ($stmt->execute()) {
            echo "Cliente Registrado";
        } else {
            echo "Error de Registro de cliente: " . $conexion->error;
        }
    }
    echo '
    <form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">
        <label for="nombre">Nombre<br><input type="text" name="nombre" id="nombre"><br></label>
        <label for="vigencia">Vigencia<br><input type="date" name="vigencia" id="vigencia"><br></label>
        <label for="correo">Correo<br><input type="email" name="correo" id="correo"><br></label>
        <label for="preferencias">Preferencias<br><input type="text" name="preferencias" id="preferencias"><br></label>
        <input type="submit" value="Guardar">
    </form>';
}

function opc()
{
    echo '
    <nav>
        <ul>
            <li><input type="button" value="Compras" name="Compras" onclick="showSubSection(\'Compras\')"></li>
            <li><input type="button" value="Editorial" name="Editorial" onclick="showSubSection(\'Editorial\')"></li>
            <li><input type="button" value="Libros" name="Libros" onclick="showSubSection(\'Libros\')"></li>
        </ul>
    </nav>
    <div id="subsection-content">
        <h2>Selecciona una subacción del menú</h2>
    </div>';
}

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'Venta':
            Venta();
            break;
        case 'Renta':
            Renta();
            break;
        case 'Compra':
            opc();
            break;
        case 'Empleado':
            Empleado();
            break;
        case 'Cliente':
            Cliente();
            break;
        default:
            echo '<h2>Selecciona una opción del menú</h2>';
            break;
    }
}

if (isset($_GET['subaction'])) {
    switch ($_GET['subaction']) {
        case 'Compras':
            Compra();
            break;
        case 'Editorial':
            Editorial();
            break;
        case 'Libros':
            Libros();
            break;
        default:
            echo '<h2>Selecciona una subacción del menú</h2>';
            break;
    }
}

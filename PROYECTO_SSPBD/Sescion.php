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

// Recibir los datos del formulario
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

// Consultar si el usuario y la contraseña existen en la base de datos
$sql = "SELECT * FROM Secion WHERE Usuario = '$usuario' AND Contrasena = '$clave'";
$resultado = $conexion->query($sql);

// Verificar si se encontraron registros
if ($resultado->num_rows > 0) {
    // Usuario y contraseña correctos, iniciar sesión
    session_start();
    $_SESSION['usuario'] = $usuario;
    header("Location: index.html"); // Redirigir al usuario a la página de bienvenida
} else {
    // Usuario o contraseña incorrectos, mostrar mensaje de error
    echo "Usuario o contraseña incorrectos";
}

$conexion->close();

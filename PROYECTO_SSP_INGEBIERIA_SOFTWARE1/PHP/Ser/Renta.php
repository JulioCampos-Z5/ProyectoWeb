<?php
$host = '127.0.0.1'; // Cambiar según tu configuración
$usuario = 'root'; // Cambiar según tu configuración
$contraseña = '5544'; // Cambiar según tu configuración
$base_de_datos = 'bibloteca'; // Cambiar según tu configuración

// Crear una conexión
$conexion = new mysqli($host, $usuario, $contraseña, $base_de_datos);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

echo "Conexión exitosa";
$sql = "SELECT ID_PRODUCTO, NOMBRE, DESCRIPCCION, PRECIO, TALLA, COLOR, ID_CATEGORIA, ESTADO FROM articulos"; // Corregir el nombre de la tabla
$result = $conexion->query($sql); // Utilizar $conexion en lugar de $conn
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/Proyectos_Web/PROYECTO_SSP_INGEBIERIA_SOFTWARE1/CSs/Paginas.css">
    <title>Renta de libros</title>
</head>

<body>
    <h1> </h1>
    <nav></nav>
<main></main>
</body>

</html>
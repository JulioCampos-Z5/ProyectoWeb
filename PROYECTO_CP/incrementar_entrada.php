<?php
// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "5544", "arduino");

// Comprobar la conexión
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Consulta SQL para incrementar la entrada en la base de datos
$sql = "UPDATE entrada SET Entrada = Entrada + 1";
if ($conexion->query($sql) === TRUE) {
    echo "Entrada incrementada exitosamente";
} else {
    echo "Error al incrementar la entrada: " . $conexion->error;
}
$conexion->close();
?>

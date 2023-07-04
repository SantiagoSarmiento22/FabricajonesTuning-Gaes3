<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fabricajones";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si se ha enviado el formulario de borrado
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    // Obtener el ID del registro a borrar
    $id = $_GET["id"];

    // Consulta SQL para borrar el registro
    $sql = "DELETE FROM empleado_venta WHERE id = $id";

    // Ejecutar la consulta SQL
    if ($conn->query($sql) === TRUE) {
        echo "El registro se ha borrado correctamente.";
    } else {
        echo "Error al borrar el registro: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>

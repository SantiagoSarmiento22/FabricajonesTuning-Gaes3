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

// Verificar si se ha enviado el parámetro "id" en la URL
if (isset($_GET["id"])) {
    // Obtener el valor del parámetro "id"
    $id = $_GET["id"];

    // Consulta SQL para eliminar el registro correspondiente al ID
    $sql = "DELETE FROM datos_personales WHERE id = '$id'";

    // Ejecutar la consulta SQL
    if ($conn->query($sql) === TRUE) {
        echo "El registro se ha borrado correctamente.";
    } else {
        echo "Error al borrar el registro: " . $conn->error;
    }
} else {
    echo "No se ha especificado un ID para borrar.";
}

// Cerrar la conexión
$conn->close();
?>

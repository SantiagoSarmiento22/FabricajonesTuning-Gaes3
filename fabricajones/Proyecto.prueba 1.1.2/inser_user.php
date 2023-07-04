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

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];

    // Consulta SQL para insertar los datos en la base de datos
    $sql = "INSERT INTO datos_personales (id, nombre, apellido, correo, telefono, fecha_nacimiento)
            VALUES ('$id', '$nombre', '$apellido', '$correo', '$telefono', '$fecha_nacimiento')";

    // Ejecutar la consulta SQL
    if ($conn->query($sql) === TRUE) {
        echo "Los datos se han insertado correctamente.";
    } else {
        echo "Error al insertar los datos: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>

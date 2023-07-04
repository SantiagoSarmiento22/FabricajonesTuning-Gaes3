<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fabricajones";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$nombre = cleanInput($_POST['nombre'], $conn);
$apellido = cleanInput($_POST['apellido'], $conn);
$correo = cleanInput($_POST['correo'], $conn);
$contra = cleanInput($_POST['contra'], $conn);
$fecha_nacimiento = cleanInput($_POST['fecha_nacimiento'], $conn);
$rol = cleanInput($_POST['rol'], $conn);

$stmt = $conn->prepare("INSERT INTO usuarios_registrados (nombre, apellido, correo, contra, fecha_nacimiento, rol) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $nombre, $apellido, $correo, $contra, $fecha_nacimiento, $rol);

if ($stmt->execute()) {
    echo "Registro guardado exitosamente";
} else {
    echo "Error al guardar el registro: " . $stmt->error;
}

$stmt->close();
$conn->close();

function cleanInput($data, $conn) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = $conn->real_escape_string($data);
    return $data;
}
?>


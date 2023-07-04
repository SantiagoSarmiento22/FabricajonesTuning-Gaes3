<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fabricajones";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$correo = cleanInput($_POST['correo'], $conn);
$contra = cleanInput($_POST['contra'], $conn);

$stmt = $conn->prepare("SELECT rol FROM usuarios_registrados WHERE correo = ? AND contra = ?");
$stmt->bind_param("ss", $correo, $contra);
$stmt->execute();
$stmt->bind_result($rol);

if ($stmt->fetch()) {
    switch ($rol) {
        case 'admin':
            header("Location: Admin_Cliente.php");
            break;
        case 'empleado':
            header("Location: EmpleadoInventario.php");
            break;
        case 'usuario':
            header("Location: MenuCliente.html");
            break;
    }
} else {
    echo "Credenciales inválidas";
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

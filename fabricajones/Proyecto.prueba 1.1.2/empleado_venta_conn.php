<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fabricajones";

// Crear una conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si hay errores de conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $numero = $_POST["numero"];
    $fecha = $_POST["fecha"];
    $impuestos = $_POST["impuestos"];
    $total = $_POST["total"];
    $forma_pago = $_POST["forma_pago"];
    $pedido = $_POST["pedido"];

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO empleado_venta (numero, fecha, impuestos, total, forma_pago, pedido) VALUES ('$numero', '$fecha', '$impuestos', '$total', '$forma_pago', '$pedido')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro insertado correctamente";
    } else {
        echo "Error al insertar el registro: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>
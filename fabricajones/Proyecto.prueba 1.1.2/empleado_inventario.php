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
    $codigo = $_POST["codigo"];
    $numero = $_POST["numero"];
    $cantidad = $_POST["cantidad"];
    $precio = $_POST["precio"];
    $marca = $_POST["marca"];
    $tipoProducto = $_POST["tipo_producto"];

    // Consulta SQL para insertar los datos en la base de datos
    $sql = "INSERT INTO empleado_inventario (codigo, numero, cantidad, precio, marca, tipo_producto)
            VALUES ('$codigo', '$numero', '$cantidad', '$precio', '$marca', '$tipoProducto')";

    // Ejecutar la consulta SQL
    if ($conn->query($sql) === TRUE) {
        echo "Los datos se han insertado correctamente.";
    } else {
        echo "Error al insertar los datos: " . $conn->error;
    }
}

// Consulta SQL para obtener los datos de la tabla empleado_inventario
$sql = "SELECT * FROM empleado_inventario";
$result = $conn->query($sql);

?>
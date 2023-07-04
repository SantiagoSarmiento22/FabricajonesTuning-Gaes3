<?php
// Verificar si se ha enviado el parámetro "id" en la URL
if (isset($_GET["id"])) {
    // Obtener el ID del cliente a borrar
    $id = $_GET["id"];

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

    // Consulta SQL para borrar el cliente con el ID proporcionado
    $sql = "DELETE FROM cliente WHERE id = '$id'";

    // Ejecutar la consulta SQL
    if ($conn->query($sql) === TRUE) {
        // Cerrar la conexión
        $conn->close();
        
        // Redireccionar de vuelta a la página principal de administración de clientes
        header("Location: Admin_Cliente.php?message=Borrado exitoso");
        exit();
    } else {
        echo "Error al borrar el cliente: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    echo "ID de cliente no especificado.";
}
?>


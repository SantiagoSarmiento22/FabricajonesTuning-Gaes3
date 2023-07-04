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

// Verificar si se ha enviado el formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];

    // Consulta SQL para actualizar los datos en la base de datos
    $sql = "UPDATE proveedor SET nombre = '$nombre', direccion = '$direccion', correo = '$correo', telefono = '$telefono' WHERE id = '$id'";

    // Ejecutar la consulta SQL
    if ($conn->query($sql) === TRUE) {
        echo "Los datos se han actualizado correctamente.";
    } else {
        echo "Error al actualizar los datos: " . $conn->error;
    }
}

// Verificar si se ha enviado el parámetro "id" en la URL
if (isset($_GET["id"])) {
    // Obtener el valor del parámetro "id"
    $id = $_GET["id"];

    // Consulta SQL para obtener los datos del registro correspondiente al ID
    $sql = "SELECT * FROM proveedor WHERE id = '$id'";

    // Ejecutar la consulta SQL
    $result = $conn->query($sql);

    // Verificar si se encontraron resultados
    if ($result !== false && $result->num_rows > 0) {
        // Obtener los datos del registro
        $row = $result->fetch_assoc();

        // Mostrar el formulario de edición con los datos prellenados
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Editar Empleado</title>
            <!-- BOX ICONS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
            <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
            <link rel="stylesheet" href="css/editar_cliente.css">


            <!-- CUSTOM CSS -->
        </head>

        <body>
            <div class="container">
                <h2>Editar Proveedor</h2>
                <form action="editar_Admin_Proveedor.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" value="<?php echo $row["nombre"]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Direccion:</label>
                        <input type="text" id="direccion" name="direccion" value="<?php echo $row["direccion"]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo electrónico:</label>
                        <input type="email" id="correo" name="correo" value="<?php echo $row["correo"]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono:</label>
                        <input type="tel" id="telefono" name="telefono" value="<?php echo $row["telefono"]; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Guardar cambios">
                    </div>
                </form>
            </div>
        </body>

        </html>
<?php
    } else {
        echo "No se encontró el cliente con el ID especificado.";
    }
}

// Cerrar la conexión
$conn->close();
?>

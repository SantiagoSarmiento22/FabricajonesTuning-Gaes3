<?php
// Verificar si se ha enviado el parámetro "id" en la URL
if (isset($_GET["id"]))
    // Obtener el ID del cliente a editar
    $id = $_GET["id"];

// Verificar si se ha enviado el formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores actualizados del formulario
    $nuevoNombre = $_POST["nombre"];
    $nuevoApellido = $_POST["apellido"];
    $nuevoCorreo = $_POST["correo"];
    $nuevoTelefono = $_POST["telefono"];
    $nuevaFechaNacimiento = $_POST["fecha_nacimiento"];

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

    // Consulta SQL para actualizar los datos del cliente con el ID proporcionado
    $sql = "UPDATE cliente SET nombre = '$nuevoNombre', apellido = '$nuevoApellido', correo = '$nuevoCorreo', telefono = '$nuevoTelefono', fecha_nacimiento = '$nuevaFechaNacimiento' WHERE id = '$id'";

    // Ejecutar la consulta SQL
    if ($conn->query($sql) === TRUE) {
        echo "Los datos del cliente se han actualizado correctamente.";
    } else {
        echo "Error al actualizar los datos del cliente: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();

    // Redireccionar de vuelta a la página principal de administración de clientes
    header("Location: Admin_Cliente.php");
    exit();
} else {
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

    // Consulta SQL para obtener los datos del cliente con el ID proporcionado
    $sql = "SELECT * FROM cliente WHERE id = '$id'";

    // Ejecutar la consulta SQL
    $result = $conn->query($sql);

    // Verificar si se encontraron resultados
    if ($result->num_rows > 0) {
        // Obtener los datos del cliente
        $cliente = $result->fetch_assoc();

        // Cerrar la conexión
        $conn->close();

        // Mostrar el formulario de edición con los datos del cliente
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Editar Cliente</title>
            <!-- bootstrap -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
            <!-- BOX ICONS -->
            <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
            <link rel="stylesheet" href="css/editar_cliente.css">

        </head>

        <body>

            <div class="container">
                <h1>Editar Cliente</h1>
                <form action="editar.php?id=<?php echo $id; ?>" method="POST">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" value="<?php echo $cliente['nombre']; ?>" required><br>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido:</label>
                        <input type="text" id="apellido" name="apellido" value="<?php echo $cliente['apellido']; ?>" required><br>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo electrónico:</label>
                        <input type="email" id="correo" name="correo" value="<?php echo $cliente['correo']; ?>" required><br>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono:</label>
                        <input type="tel" id="telefono" name="telefono" value="<?php echo $cliente['telefono']; ?>" required><br>
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $cliente['fecha_nacimiento']; ?>" required><br>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Guardar cambios">
                    </div>
                </form>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        </body>

        </html>

<?php
    } else {
        echo "No se encontró el cliente con el ID especificado.";
    }
}
?>
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
    $codigo = $_POST["codigo"];
    $numero = $_POST["numero"];
    $cantidad = $_POST["cantidad"];
    $precio = $_POST["precio"];
    $marca = $_POST["marca"];
    $tipo_producto = $_POST["tipo_producto"];

    // Consulta SQL para actualizar los datos en la base de datos
    $sql = "UPDATE empleado_inventario SET codigo='$codigo', numero='$numero', cantidad='$cantidad', precio='$precio', marca='$marca', tipo_producto='$tipo_producto' WHERE id='$id'";

    // Ejecutar la consulta SQL
    if ($conn->query($sql) === TRUE) {
        echo "Los datos se han actualizado correctamente.";
    } else {
        echo "Error al actualizar los datos: " . $conn->error;
    }
}

// Obtener el ID del registro a editar desde la URL
$id = $_GET["id"];

// Consulta SQL para obtener los datos del registro a editar
$sql = "SELECT * FROM empleado_inventario WHERE id='$id'";
$result = $conn->query($sql);

// Verificar si se encontró el registro
if ($result !== false && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $codigo = $row["codigo"];
    $numero = $row["numero"];
    $cantidad = $row["cantidad"];
    $precio = $row["precio"];
    $marca = $row["marca"];
    $tipo_producto = $row["tipo_producto"];
} else {
    echo "No se encontró el registro.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/editar_cliente.css">
</head>

<body>
    <div class="container">
        <h2>Editar Producto</h2>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <label for="codigo">Código:</label>
                <input type="text" name="codigo" id="codigo" value="<?php echo $codigo; ?>" required>
            </div>
            <div class="form-group">
                <label for="numero">Número:</label>
                <input type="number" name="numero" id="numero" value="<?php echo $numero; ?>" required>
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="number" name="cantidad" id="cantidad" value="<?php echo $cantidad; ?>" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" step="0.01" name="precio" id="precio" value="<?php echo $precio; ?>" required>
            </div>
            <div class="form-group">
                <label for="marca">Marca:</label>
                <input type="text" name="marca" id="marca" value="<?php echo $marca; ?>" required>
            </div>
            <div class="form-group">
                <label for="tipo_producto">Tipo de producto:</label>
                <select name="tipo_producto" id="tipo_producto" required>
                    <option value="">Seleccionar</option>
                    <option value="Electrónica" <?php if ($tipo_producto === 'Electrónica') echo 'selected'; ?>>Caja de sonido</option>
                    <option value="Ropa" <?php if ($tipo_producto === 'Ropa') echo 'selected'; ?>>Solo caja</option>
                    <option value="Alimentos" <?php if ($tipo_producto === 'Alimentos') echo 'selected'; ?>>Partes diferentes</option>
                    <!-- Agrega más opciones según tus necesidades -->
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Guardar cambios">
            </div>
        </form>
    </div>
</body>

</html>
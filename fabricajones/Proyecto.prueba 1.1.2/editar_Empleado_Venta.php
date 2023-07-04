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
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id"])) {
    // Obtener los valores del formulario
    $id = $_POST["id"];
    $numero = $_POST["numero"];
    $fecha = $_POST["fecha"];
    $impuestos = $_POST["impuestos"];
    $total = $_POST["total"];
    $forma_pago = $_POST["forma_pago"];
    $pedido = $_POST["pedido"];

    // Consulta SQL para actualizar los datos en la base de datos
    $sql = "UPDATE empleado_venta SET numero='$numero', fecha='$fecha', impuestos='$impuestos', total='$total', forma_pago='$forma_pago', pedido='$pedido' WHERE id=$id";

    // Ejecutar la consulta SQL
    if ($conn->query($sql) === TRUE) {
        echo "Los datos se han actualizado correctamente.";
    } else {
        echo "Error al actualizar los datos: " . $conn->error;
    }
}

// Verificar si se ha recibido el parámetro de ID
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
    // Obtener el ID del registro a editar
    $id = $_GET["id"];

    // Consulta SQL para obtener los datos del registro
    $sql = "SELECT * FROM empleado_venta WHERE id=$id";
    $result = $conn->query($sql);

    // Verificar si se encontró el registro
    if ($result !== false && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No se encontró el registro.";
    }
}

// Cerrar la conexión
$conn->close();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empleado Venta</title>
    <!-- BOX ICONS -->
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet">
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="css/editar_cliente.css">
    <!-- CUSTOM JS -->
    <script src="js/menu.js" defer></script>
</head>

<body>
    <div class="container">
        <h1>Editar Pedido</h1>
        <form action="editar_Empleado_Venta.php" method="POST">
            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo isset($row['id']) ? $row['id'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="numero">Número de Pedido:</label>
                <input type="text" id="numero" name="numero" value="<?php echo isset($row['numero']) ? $row['numero'] : ''; ?>" required><br>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha" value="<?php echo isset($row['fecha']) ? $row['fecha'] : ''; ?>" required><br>
            </div>
            <div class="form-group">
                <label for="impuestos">Impuestos:</label>
                <input type="number" id="impuestos" name="impuestos" step="0.01" value="<?php echo isset($row['impuestos']) ? $row['impuestos'] : ''; ?>" required><br>
            </div>
            <div class="form-group">
                <label for="total">Total:</label>
                <input type="number" id="total" name="total" step="0.01" value="<?php echo isset($row['total']) ? $row['total'] : ''; ?>" required><br>
            </div>
            <div class="form-group">
                <label for="forma_pago">Forma de Pago:</label>
                <select id="forma_pago" name="forma_pago" class="campo-forma-pago" required>
                    <option value="">Seleccionar</option>
                    <option value="efectivo" <?php if (isset($row['forma_pago']) && $row['forma_pago'] === "efectivo") echo "selected"; ?>>Efectivo</option>
                    <option value="tarjeta" <?php if (isset($row['forma_pago']) && $row['forma_pago'] === "tarjeta") echo "selected"; ?>>Tarjeta de Crédito</option>
                    <option value="transferencia" <?php if (isset($row['forma_pago']) && $row['forma_pago'] === "transferencia") echo "selected"; ?>>Transferencia Bancaria</option>
                </select><br>
            </div>
            <div class="form-group">
                <label for="pedido">Pedido:</label>
                <textarea id="pedido" name="pedido" class="campo-pedido" rows="4" cols="8" required><?php echo isset($row['pedido']) ? $row['pedido'] : ''; ?></textarea><br>
            </div>
            <div class="form-group">
                <input type="submit" value="Guardar Cambios">
            </div>
        </form>
    </div>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

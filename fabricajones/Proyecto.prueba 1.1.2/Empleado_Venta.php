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
    $numero = $_POST["numero"];
    $fecha = $_POST["fecha"];
    $impuestos = $_POST["impuestos"];
    $total = $_POST["total"];
    $forma_pago = $_POST["forma_pago"];
    $pedido = $_POST["pedido"];

    // Consulta SQL para insertar los datos en la base de datos
    $sql = "INSERT INTO empleado_venta (numero, fecha, impuestos, total, forma_pago, pedido)
            VALUES ('$numero', '$fecha', '$impuestos', '$total', '$forma_pago', '$pedido')";

    // Ejecutar la consulta SQL
    if ($conn->query($sql) === TRUE) {
        echo "Los datos se han insertado correctamente.";
    } else {
        echo "Error al insertar los datos: " . $conn->error;
    }
}

// Consulta SQL para obtener los datos de la tabla empleado_venta
$sql = "SELECT * FROM empleado_venta";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleado_venta</title>
    <!-- BOX ICONS -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="css/EstilosAdmin.css">
    <!-- CUSTOM JS -->
    <script src="js/menu.js" defer></script>
</head>

<body>

    <div class="menu-dashboard">
        <!-- TOP MENU -->
        <div class="top-menu">
            <div class="logo">
                <img src="img/logito.png" alt="">
                <span>FabriCajones</span>
            </div>
            <div class="toggle">
                <i class='bx bx-menu bx-tada'></i>
            </div>
        </div>
        <!-- INPUT SEARCH -->
        <div class="input-search">

        </div>
        <!-- MENU -->
        <div class="menu">
        <div class="enlace">
                <i class='bx bxs-user-account' style='color: #f6f2f2'></i>
                <span><a href="Empleado_Proveedor.php"> Proveedor</a></span>
            </div>

            <div class="enlace">
                <i class='bx bx-book-open'></i>
                <span><a href="Empleado_Catalogo.html"> Catalogo</a></span>
            </div>

            <div class="enlace">
                <i class='bx bxs-calendar-event'></i>
                <span><a href="Empleado_servicios.html"> Servicios</a></span>
            </div>

            <div class="enlace">
                <i class="bx bxs-box"></i>
                <span><a href="EmpleadoInventario.php"> Inventario</a></span>
            </div>

            <div class="enlace">
                <i class='bx bxs-user-detail'></i>
                <span><a href="Empleado_Venta.php"> Venta</a></span>
            </div>

            <div class="cerrar">
                <div class="enlace">
                    <i class='bx bxs-chevrons-left'></i>
                    <span><a href="Login.php">Cerrar Sesión</a></span>
                </div>
                <div class="enlace">
                    <i class='bx bx-cog'></i>
                    <span>Configuración</span>
                </div>
            </div>
        </div>
    </div>
    <div class="formulario">
        <h1>Formulario de Pedido</h1>
        <form action="empleado_venta_conn.php" method="POST">
            <label for="numero">Nº:</label>
            <input type="text" id="numero" name="numero" pattern="[0-9]+" required><br>

            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" required><br>

            <label for="impuestos">Impuestos:</label>
            <input type="text" id="impuestos" name="impuestos" pattern="[0-9]+(\.[0-9]{1,2})?" required><br>

            <label for="total">Total:</label>
            <input type="text" id="total" name="total" pattern="[0-9]+(\.[0-9]{1,2})?" required><br>

            <label for="forma_pago">Forma de Pago:</label>
            <select id="forma_pago" name="forma_pago" class="campo-forma-pago" required>
                <option value="">Seleccionar</option>
                <option value="efectivo">Efectivo</option>
                <option value="tarjeta">Tarjeta de Crédito</option>
                <option value="transferencia">Transferencia Bancaria</option>
            </select><br>

            <label for="pedido">Pedido:</label>
            <textarea id="pedido" name="pedido" class="campo-pedido" rows="4" cols="8" required></textarea><br>



            <input type="submit" value="Enviar Pedido">
        </form>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col"></div>
            <div class="col-lg-10">
                <table class="table table-lg">
                    <thead>
                        <tr>
                            <th scope="col">Nº</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Impuestos</th>
                            <th scope="col">Total</th>
                            <th scope="col">Forma de Pago</th>
                            <th scope="col">Pedido</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Verificar si se encontraron resultados
                        if ($result !== false && $result->num_rows > 0) {
                            // Recorrer los resultados y mostrar los datos en la tabla
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["numero"] . "</td>";
                                echo "<td>" . $row["fecha"] . "</td>";
                                echo "<td>" . $row["impuestos"] . "</td>";
                                echo "<td>" . $row["total"] . "</td>";
                                echo "<td>" . $row["forma_pago"] . "</td>";
                                echo "<td>" . $row["pedido"] . "</td>";
                                echo "<td>";
                                echo "<a href='editar_Empleado_Venta.php?id=" . $row["id"] . "' class='btn btn-small btn-warning'><i class='bx bx-edit'></i></a>";
                                echo "<a href='borrar_Empleado_Venta.php?id=" . $row["id"] . "' class='btn btn-small btn-danger'><i class='bx bx-trash'></i></a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>No se encontraron resultados</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>
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
    $tipo_producto = $_POST["tipo_producto"];

    // Consulta SQL para insertar los datos en la base de datos
    $sql = "INSERT INTO empleado_inventario (codigo, numero, cantidad, precio, marca, tipo_producto)
            VALUES ('$codigo', '$numero', '$cantidad', '$precio', '$marca', '$tipo_producto')";

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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleado_inventario</title>
    <!-- BOX ICONS -->
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="css/EstilosAdmin.css">
    <!-- CUSTOM JS -->
    <script src="js/menu.js" defer></script>
</head>

<body>
    <div class="row">
        <div class="menu-dashboard">
            <!-- TOP MENU -->
            <div class="top-menu">
                <div class="logo">
                    <img src="img/logito.png" alt="">
                    <span>FabriCajones</span>
                </div>
                <div class="toggle">
                    <i class="bx bx-menu bx-tada"></i>
                </div>
            </div>
            <!-- INPUT SEARCH -->
            <div class="input-search">

            </div>
            <!-- MENU -->
            <div class="menu">
                <br>
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
    </div>

    <div class="formulario">
        <h1>Formulario Productos</h1>
        <form action="empleado_inventario.php" method="POST">
            <label for="codigo">Código:</label>
            <input type="text" id="codigo" name="codigo" pattern="[a-zA-Z0-9]+" required><br>

            <label for="numero">Número:</label>
            <input type="number" id="numero" name="numero" required><br>

            <label for="cantidad">Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad" required><br>

            <label for="precio">Precio:</label>
            <input type="number" step="0.01" id="precio" name="precio" required><br>

            <label for="marca">Marca:</label>
            <input type="text" id="marca" name="marca" pattern="[a-zA-Z\s]+" required><br>

            <label for="tipo_producto">Tipo de producto:</label>
            <select id="tipo_producto" name="tipo_producto" class="campo-forma-pago" required>
                <option value="">Seleccionar</option>
                <option value="Electrónica">Caja de sonido</option>
                <option value="Ropa">Solo caja</option>
                <option value="Alimentos">Partes diferentes</option>
                <!-- Agrega más opciones según tus necesidades -->
            </select><br>

            <input type="submit" value="Enviar">
        </form>

    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col"></div>
            <div class="col-lg-10">
                <table class="table table-lg">
                    <thead>
                        <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Número</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Tipo de Producto</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Consulta SQL para obtener los datos de la tabla empleado_inventario
                        $sql = "SELECT * FROM empleado_inventario";
                        $result = $conn->query($sql);
                        // Verificar si se encontraron resultados
                        if ($result !== false && $result->num_rows > 0) {
                            // Recorrer los resultados y mostrar los datos en la tabla
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["codigo"] . "</td>";
                                echo "<td>" . $row["numero"] . "</td>";
                                echo "<td>" . $row["cantidad"] . "</td>";
                                echo "<td>" . $row["precio"] . "</td>";
                                echo "<td>" . $row["marca"] . "</td>";
                                echo "<td>" . $row["tipo_producto"] . "</td>";
                                echo "<td>";
                                echo "<a href='editar_Empleado_Inventario.php?id=" . $row["id"] . "' class='btn btn-small btn-warning'><i class='bx bx-edit'></i></a>";
                                echo "<a href='borrar_Empleado_Inventario.php?id=" . $row["id"] . "' class='btn btn-small btn-danger'><i class='bx bx-trash'></i></a>";
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
</body>

</html>

</div>
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
    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];

    // Consulta SQL para insertar los datos en la base de datos
    $sql = "INSERT INTO epleado_proveedor (id, nombre, direccion,correo, telefono)
            VALUES ('$id', '$nombre', '$direccion', '$correo', '$telefono')";

    // Ejecutar la consulta SQL
    if ($conn->query($sql) === TRUE) {
        // Cerrar la conexión
        $conn->close();

        // Mostrar el mensaje de éxito
        echo "Los datos se han insertado correctamente.";
    } else {
        echo "Error al insertar los datos: " . $conn->error;
    }
}

// Consulta SQL para obtener los datos de la tabla epleado_proveedor
$sql = "SELECT * FROM epleado_proveedor";
$result = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleado_proveedor</title>
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
        <br>
        <br>
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
        <h1>Formulario  Proveedor</h1>
        <form action="Epleado_proveedor.php" method="POST">

            <label for="id">N°:</label>
            <input type="text" id="id" name="id" required><br>

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br>

            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" required><br>

            <label for="correo">Correo electrónico:</label>
            <input type="email" id="correo" name="correo" required><br>

            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" required><br>
            <input type="submit" value="Enviar">
        </form>
    </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col"></div>
            <div class="col-lg-10">
                <table class="table table-lg">
                    <thead>
                        <tr>
                            <th scope="col">N°</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Correo electrónico</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
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

                        // Consulta SQL para obtener los datos de la base de datos
                        $sql = "SELECT * FROM epleado_proveedor";
                        $result = $conn->query($sql);

                        // Verificar si se encontraron resultados
                        if ($result !== false && $result->num_rows > 0) {
                            // Mostrar los datos en la tabla HTML
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["id"] . "</td>";
                                echo "<td>" . $row["nombre"] . "</td>";
                                echo "<td>" . $row["direccion"] . "</td>";
                                echo "<td>" . $row["correo"] . "</td>";
                                echo "<td>" . $row["telefono"] . "</td>";
                                echo "<td>";
                                echo "<a href='editar_Empleado_Proveedor.php?id=" . $row["id"] . "' class='btn btn-small btn-warning'><i class='bx bx-edit'></i></a>";
                                echo "<a href='borrar_Empleado_Proveedor.php?id=" . $row["id"] . "' class='btn btn-small btn-danger'><i class='bx bx-trash'></i></a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>No se encontraron registros.</td></tr>";
                        }

                        // Cerrar la conexión
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col"></div>
        </div>
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>
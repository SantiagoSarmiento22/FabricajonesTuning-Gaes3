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
    $apellido = $_POST["apellido"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];

    // Consulta SQL para insertar los datos en la base de datos
    $sql = "INSERT INTO datos_personales (id, nombre, apellido, correo, telefono, fecha_nacimiento)
            VALUES ('$id', '$nombre', '$apellido', '$correo', '$telefono', '$fecha_nacimiento')";

    // Ejecutar la consulta SQL
    if ($conn->query($sql) === TRUE) {
        echo "Los datos se han insertado correctamente.";
    } else {
        echo "Error al insertar los datos: " . $conn->error;
    }
}

// Consulta SQL para obtener los datos de la tabla cliente
$sql = "SELECT * FROM datos_personales";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Empleados</title>
    <!-- BOX ICONS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

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
            <br>
            <div class="enlace">
                <i class='bx bx-book-open'></i>
                <span> <a href="Administrador_Catalogo.html">Catálogo</a></span>
            </div>

            <div class="enlace">
                <i class='bx bxs-calendar-event'></i>
                <span> <a href="Empleado_servicios.html">Servicios</a></span>
            </div>

            <div class="enlace">
                <i class="bx bxs-box"></i>
                <span><a href="Admin_Proveedor.php">Proveedor</a></span>
            </div>

            <div class="enlace">
                <i class='bx bxs-user-detail'></i>
                <span><a href="Admin_Cliente.php">Clientes</a></span>
            </div>

            <div class="enlace">
                <i class='bx bx-briefcase-alt-2'></i>
                <span> <a href="Admin_Empleados.php">Empleados</a></span>
            </div>

            <div class="cerrar">
                <div class="enlace">
                    <i class='bx bxs-chevrons-left'></i>
                    <span><a href="Login.php">CerrarSesion</a></span>
                </div>
                <div class="enlace">
                    <i class='bx bx-cog'></i>
                    <span>Configuracion</span>
                </div>
            </div>
        </div>
    </div>

    <div class="formulario">
        <h1>Formulario Empleados</h1>
        <form action="inser_user.php" method="POST">
            <label for="id">Nº:</label>
            <input type="text" id="id" name="id" pattern="[0-9]+" required><br>

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" pattern="[A-Za-z\s]+" required><br>

            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" pattern="[A-Za-z\s]+" required><br>

            <label for="correo">Correo electrónico:</label>
            <input type="email" id="correo" name="correo" required><br>

            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" pattern="[0-9]+" required><br>

            <label for="fecha_nacimiento">Fecha de nacimiento:</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required><br>

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
                            <th scope="col">Nº</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Correo electrónico</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Fecha de nacimiento</th>
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
                        $sql = "SELECT * FROM datos_personales";
                        $result = $conn->query($sql);

                        // Verificar si se encontraron resultados
                        if ($result !== false && $result->num_rows > 0) {
                            // Mostrar los datos en la tabla HTML
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["id"] . "</td>";
                                echo "<td>" . $row["nombre"] . "</td>";
                                echo "<td>" . $row["apellido"] . "</td>";
                                echo "<td>" . $row["correo"] . "</td>";
                                echo "<td>" . $row["telefono"] . "</td>";
                                echo "<td>" . $row["fecha_nacimiento"] . "</td>";
                                echo "<td>";
                                echo "<a href='editar_Admin_Empleados.php?id=" . $row["id"] . "' class='btn btn-small btn-warning'><i class='bx bx-edit'></i></a>";
                                echo "<a href='borrar_Admin_Empleados.php?id=" . $row["id"] . "' class='btn btn-small btn-danger'><i class='bx bx-trash'></i></a>";
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
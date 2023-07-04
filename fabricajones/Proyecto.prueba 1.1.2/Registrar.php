<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrarse</title> 
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="css/EstilosLogin.css">
    <link rel="icon" type="image/npg" href="Images/Favicon.png"/>
</head>  
<body>
    <form action="guardar_usuario.php" method="POST" class="formulario">
        <h1>Registrarse</h1>
        <div class="contenedor">
            <div class="input-contenedor">
                <i class="fas fa-envelope icon"></i>
                <input name="nombre" type="text" placeholder="Nombre" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ\s]+" title="Solo se permiten letras y espacios" autocomplete="off" required>
            </div>
            <div class="input-contenedor">
                <i class="fas fa-key icon"></i>
                <input name="apellido" type="text" placeholder="Apellido" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ\s]+" title="Solo se permiten letras y espacios" required>
            </div>
            <div class="input-contenedor">
                <i class="fas fa-key icon"></i>
                <input name="correo" type="email" placeholder="Correo Electrónico" required>
            </div>
            <div class="input-contenedor">
                <i class="fas fa-key icon"></i>
                <input name="contra" type="password" placeholder="Contraseña" pattern="^[a-zA-Z0-9]+$" title="Solo se permiten letras y números" minlength="8" required>
            </div>
            <div class="input-contenedor">
                <i class="fas fa-key icon"></i>
                <input name="fecha_nacimiento" type="date" placeholder="Fecha de Nacimiento" required>
            </div>
            <div class="input-contenedor">
                <i class="fas fa-key icon"></i>
                <select name="rol" required>
                    <option value="" selected disabled>Seleccionar Rol</option>
                    <option value="admin">Administrador</option>
                    <option value="empleado">Empleado</option>
                    <option value="usuario">Usuario</option>
                </select>
            </div>
            <br>
            <div>
                <button type="submit" class="btn btn-lg btn-dark">Registrarse</button >
            </div>
        </div>
    </form>
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title> 
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0,image minimum-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="css/EstilosLogin.css">
    <link rel="icon" type="image/npg" href="Images/Favicon.png"/>
</head>  
<body>
    <form action="loginuser.php" method="POST" class="formulario" onsubmit="return validarFormulario()">
        <h1>Login</h1>
        <div class="contenedor">
            <div class="input-contenedor">
                <i class="fas fa-envelope icon"></i>
                <input id="correo" name="correo" type="email" placeholder="Correo Electrónico" autocomplete="off" required>
            </div>
            <div class="input-contenedor">
                <i class="fas fa-key icon"></i>
                <input id="contraseña" name="contra" type="password" placeholder="Contraseña" required>
            </div>
            <div>
                <input type="submit" value="Entrar" name="Entrar" class="btn btn-lg btn-dark">
                <br>
                <br>
                <a class="btnRegistrar" href="registrar.html">Registrar</a>
            </div>
        </div>
    </form>

    <script>
        function validarFormulario() {
            var correo = document.getElementById('correo').value;
            var contra = document.getElementById('contraseña').value;

            // Validar el campo de correo electrónico
            if (correo.trim() === '') {
                alert('Por favor, ingresa tu correo electrónico.');
                return false;
            } else if (!validarCorreoElectronico(correo)) {
                alert('Por favor, ingresa un correo electrónico válido.');
                return false;
            }

            // Validar el campo de contraseña
            if (contra.trim() === '') {
                alert('Por favor, ingresa tu contraseña.');
                return false;
            }

            return true;
        }

        function validarCorreoElectronico(correo) {
            // Expresión regular para validar un correo electrónico
            var expresion = /\S+@\S+\.\S+/;
            return expresion.test(correo);
        }
    </script>
</body>
</html>

<?php
    session_start();
    if (isset($_SESSION['usuario'])) {
        header("location: CRUD/bienvenida.php");
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="ASSETS/CSS/estilos.css?v=<?php echo time(); ?>">

    <title>Login Pienza</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
    <main>
        <div class="contenedor__todo" strong>

            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para entrar a la pagina</p>
                    <button id="btn__iniciar-sesion">Iniciar sesión</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Registrate para que puedas iniciar sesión</p>
                    <button id="btn__registrarse">Registrarse</button>
                </div>
            </div>
            <div class="contenedor__login-register">
                <!--Login-->
                <form action="php/login_usuario.php" method="POST" class="formulario__login">
                    <h2>INICIAR SESION</h2>
                    <input type="text" placeholder="Correo electronico" name="correo">
                    <input type="password" placeholder="Contraseña" name="contrasena">
                    <button type="submit">Entrar</button>
                </form>
                <!--Registro-->
                <form action="php/registro_usuario.php" method="POST" class="formulario__register">
                    <h2>Registrarse</h2>
                    <input type="text" placeholder="Nombre completo" name="nombre_completo">
                    <input type="text" placeholder="Correo electronico" name="correo">
                    <input type="text" placeholder="Nombre usuario" name="usuario">
                    <input type="password" placeholder="Contraseña" name="contrasena">
                    <button>Registrarse</button>
                </form>
            </div>
        </div>      
    </main>
<script src="ASSETS/JS/script.js"></script>
</body>
</html>
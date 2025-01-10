<?php

    session_start();

    include 'conexion.php';
    
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $contrasena_e = hash('sha512', $contrasena);

    $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo' 
    AND contrasena = '$contrasena_e'");

    if (mysqli_num_rows($validar_login) > 0) {
        $_SESSION['usuario'] = $correo;
        header("location: ../CRUD/bienvenida.php");
        exit();
    } else {
        echo '
            <script>
                alert("Usuario no existe, verifique sus datos");
                window.location = "../index.php";
            </script>
        ';
        exit();
    }

?>
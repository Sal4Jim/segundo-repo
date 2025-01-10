<?php
    include 'conexion.php';

    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    
    //Encriptar contraseña
    $contrasena_e = hash('sha512', $contrasena);

    $query = "INSERT INTO usuarios(nombre_completo, correo, usuario, contrasena) VALUES ('$nombre_completo', '$correo', '$usuario', '$contrasena_e')";

    //Verificar que el correo no se repita
    $consulta_correo = "SELECT * FROM usuarios WHERE correo = '$correo' ";
    $verificar_correo = mysqli_query($conexion, $consulta_correo);

    if (mysqli_num_rows($verificar_correo) > 0) {
        echo '
            <script>
                alert("Este correo ya está registrado");
                window.location = "../index.php";
            </script>
        ';
        exit();
    } 

    //Verificar que el usuario no se repita
    $consulta_usuario = "SELECT * FROM usuarios WHERE usuario = '$usuario' ";
    $verificar_usuario = mysqli_query($conexion, $consulta_usuario);

    if (mysqli_num_rows($verificar_usuario) > 0) {
        echo '
            <script>
                alert("Este usuario ya está registrado");
                window.location = "../index.php";
            </script>
        ';
        exit();
    }

    $ejecutar = mysqli_query($conexion, $query);

    if ($ejecutar) {
        echo '
            <script>
                alert("Usuario almacenado correctamente");
                window.location = "../index.php";
            </script>       
        ';
    } else {
        echo '
             <script>
                alert("Intentelo nuevamente, usuario no almacenado");
                window.location = "../index.php";
             </script>      
        ';
    }

    mysqli_close($conexion);
    
?>
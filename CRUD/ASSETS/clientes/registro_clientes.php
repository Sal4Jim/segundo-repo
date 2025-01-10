<?php 
if (isset($_POST["btnRegistrar"])) {
    // Limpieza y validación de datos
    $campos_requeridos = [
        'nombre_comercial',
        'razon_social',
        'ruc',
        'cate_clie',
        'depto_resp',
        'tel_depto_resp',
        'dueño_emp',
        'dni_dueño'
    ];

    $errores = [];
    $datos = [];

    // Validar campos requeridos y limpiar datos
    foreach ($campos_requeridos as $campo) {
        if (empty($_POST[$campo])) {
            $errores[] = "El campo " . str_replace('_', ' ', $campo) . " es requerido";
        } else {
            $datos[$campo] = trim(htmlspecialchars($_POST[$campo]));
        }
    }

    // Validación específica para RUC (11 dígitos en Perú)
    if (!empty($_POST['ruc']) && !preg_match('/^[0-9]{11}$/', $_POST['ruc'])) {
        $errores[] = "El RUC debe tener 11 dígitos numéricos";
    }

    // Validación básica para documento de identidad
    if (!empty($_POST['dni_dueño'])) {
        $dni = trim($_POST['dni_dueño']);
        if (strlen($dni) < 5 || strlen($dni) > 20) {
            $errores[] = "El documento de identidad debe tener entre 5 y 20 caracteres";
        }
    }

    // Validación básica para teléfono
    if (!empty($_POST['tel_depto_resp'])) {
        $telefono = trim($_POST['tel_depto_resp']);
        // Eliminar espacios y caracteres especiales comunes en números de teléfono
        $telefono = preg_replace('/[^0-9+]/', '', $telefono);
        if (strlen($telefono) < 9 || strlen($telefono) > 15) {
            $errores[] = "El teléfono debe tener entre 9 y 15 dígitos";
        }
        // Guardar el teléfono limpio
        $datos['tel_depto_resp'] = $telefono;
    }

    // Descripción (opcional)
    $descripcion = !empty($_POST['descripcion']) ? trim(htmlspecialchars($_POST['descripcion'])) : '';

    if (empty($errores)) {
        try {
            $sql = $conexion->prepare("INSERT INTO clientes(
                NOMB_COMER, RAZON_SOCIAL, RUC, CAT_CLIENTE, 
                DPTO_RESP, TLF_DPTO, NOMB_DUENO, DNI_DUENO, DESCRIPCION
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $sql->bind_param("sssssssss", 
                $datos['nombre_comercial'],
                $datos['razon_social'],
                $datos['ruc'],
                $datos['cate_clie'],
                $datos['depto_resp'],
                $datos['tel_depto_resp'],
                $datos['dueño_emp'],
                $datos['dni_dueño'],
                $descripcion
            );

            if ($sql->execute()) {
                echo '<div class="alert alert-success" style="width: 50%; margin: 40px auto; padding: 15px; border-radius: 10px;">Cliente registrado correctamente</div>';
                echo "<script>
                    setTimeout(function() {
                        window.location.href = window.location.href;
                    }, 1500);
                </script>";
            } else {
                echo '<div class="alert alert-danger">Error al registrar el cliente: ' . $conexion->error . '</div>';
            }
        } catch (Exception $e) {
            echo '<div class="alert alert-danger">Error en la base de datos: ' . $e->getMessage() . '</div>';
        }
    } else {
        echo '<div class="alert alert-warning" style="width: 50%; margin: 40px auto; padding: 15px; border-radius: 10px;">';
        foreach ($errores as $error) {
            echo $error . '<br>';
        }
        echo '</div>';
    }
}
?>
<?php 
/* if (!empty($_POST["btnRegistrar"])) {

    if (!empty($_POST["nombre_comercial"]) and !empty($_POST["razon_social"]) and !empty($_POST["ruc"]) and !empty($_POST["cate_clie"]) and !empty($_POST["depto_resp"])
        and !empty($_POST["tel_depto_resp"]) and !empty($_POST["dueño_emp"]) and !empty($_POST["dni_dueño"]) and !empty($_POST["descripcion"])) {

        
        $nombre_comercial =$_POST["nombre_comercial"]; 
        $razon_social =$_POST["razon_social"];
        $ruc =$_POST["ruc"]; 
        $cate_clie =$_POST["cate_clie"]; 
        $depto_resp =$_POST["depto_resp"]; 
        $tel_depto_resp =$_POST["tel_depto_resp"]; 
        $dueño_emp =$_POST["dueño_emp"]; 
        $dni_dueño =$_POST["dni_dueño"]; 
        $descripcion =$_POST["descripcion"];
        

        $sql = $conexion->query("insert into clientes(NOMB_COMER, RAZON_SOCIAL, RUC, CAT_CLIENTE, DPTO_RESP, TLF_DPTO, NOMB_DUENO, DNI_DUENO, DESCRIPCION ) 
                                values('$nombre_comercial', '$razon_social', '$ruc', '$cate_clie', '$depto_resp', '$tel_depto_resp', '$dueño_emp', '$dni_dueño', '$descripcion')");
            if ($sql == 1) {
                echo '<div class="alert alert-success">cliente registrado correctamente </div>';
            } else {
                echo '<div class="alert alert-danger">cliente no registrado </div>';
            }
            
    }else {
        echo '<div class="alert alert-warning">Falta completar campos</div>';
    }
} */
?>

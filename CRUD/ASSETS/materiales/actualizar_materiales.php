<?php
date_default_timezone_set('America/Lima');

if (isset($_POST["btnActualizar"]) && isset($_POST["id_material"])) {
    $campos_requeridos = [
        'nombre',
        'tipo',
        'almacen',
        'unidad_medida',
        'total_agregado',
        'cantidad',
        'descripcion'
    ];

    $errores = [];
    $datos = [];
    $id_material = $_POST["id_material"];

    // Validar campos requeridos y limpiar datos
    foreach ($campos_requeridos as $campo) {
        if (empty($_POST[$campo])) {
            $errores[] = "El campo " . str_replace('_', ' ', $campo) . " es requerido";
        } else {
            $datos[$campo] = trim(htmlspecialchars($_POST[$campo]));
        }
    }

    // Validar que total_agregado sea numérico
    if (!is_numeric($datos['total_agregado'])) {
        $errores[] = "El campo total agregado debe ser un número";
    }

    if (empty($errores)) {
        try {
            // Obtener la cantidad actual
            $consulta = $conexion->prepare("SELECT CANTIDAD FROM materiales WHERE ID_MAT = ?");
            $consulta->bind_param("i", $id_material);
            $consulta->execute();
            $resultado = $consulta->get_result();
            $material = $resultado->fetch_object();
            
            // Calcular la nueva cantidad
            $cantidad_actual = $material->CANTIDAD;
            $ajuste = $datos['total_agregado']; // Puede ser positivo o negativo
            $nueva_cantidad = $cantidad_actual + $ajuste;
            
            // Obtener fecha actual
            $fecha_actual = date('Y-m-d H:i:s');
            
            $sql = $conexion->prepare("UPDATE materiales SET 
                NOMBRE = ?, 
                TIPO = ?, 
                ALMACEN = ?, 
                UND_MEDIDA = ?, 
                TTL_AGREGADO = ?, 
                FECHA_AGREG = ?,
                CANTIDAD = ?, 
                DESCRIPCION = ?
                WHERE ID_MAT = ?");

            $sql->bind_param("ssssssssi", 
                $datos['nombre'],
                $datos['tipo'],
                $datos['almacen'],
                $datos['unidad_medida'],
                $datos['total_agregado'], // Guardamos el valor ingresado en TTL_AGREGADO
                $fecha_actual,  // Actualizamos la fecha
                $nueva_cantidad, // La cantidad se actualiza con la suma
                $datos['descripcion'],
                $id_material
            );

            if ($sql->execute()) {
                echo '<div class="alert alert-success" style="width: 50%; margin: 40px auto; padding: 15px; border-radius: 10px;">
                        Material actualizado correctamente
                      </div>';
                echo "<script>
                    setTimeout(function() {
                        window.location.href = 'materiales.php';
                    }, 1500);
                </script>";
            } else {
                echo '<div class="alert alert-danger">Error al actualizar el material: ' . $conexion->error . '</div>';
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

// Agregar el manejo de la eliminación
if (isset($_POST["btnEliminar"]) && isset($_POST["id_material"])) {
    $id_material = $_POST["id_material"];
    
    try {
        $sql = $conexion->prepare("DELETE FROM materiales WHERE ID_MAT = ?");
        $sql->bind_param("i", $id_material);
        
        if ($sql->execute()) {
            echo '<div class="alert alert-success" style="width: 50%; margin: 40px auto; padding: 15px; border-radius: 10px;">
                    Material eliminado correctamente
                  </div>';
            echo "<script>
                setTimeout(function() {
                    window.location.href = 'materiales.php';
                }, 1500);
            </script>";
        } else {
            echo '<div class="alert alert-danger">Error al eliminar el material: ' . $conexion->error . '</div>';
        }
    } catch (Exception $e) {
        echo '<div class="alert alert-danger">Error en la base de datos: ' . $e->getMessage() . '</div>';
    }
}

// Agregar función para limpiar formulario
if (isset($_POST['btnLimpiar'])) {
    echo "<script>
        window.location.href = 'materiales.php';
    </script>";
}
?> 
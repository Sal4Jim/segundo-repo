<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIENZA DATABASE - Nuevo Material</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../CSS/NuevoMaterialStyles.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300..700&display=swap" rel="stylesheet">

</head>
<body>
    <div class="container">
        <h1 class="text-center p-3">PIENZA BASE</h1>
        <h3 class="text-center ">AGREGAR NUEVO MATERIAL</h3>
        
        <form class="col-8 p-3 m-auto" method="POST">
            <?php
            include "../../Conexion07.php";
            date_default_timezone_set('America/Lima');
            
            if (isset($_POST["btnRegistrar"])) {
                $campos_requeridos = [
                    'nombre',
                    'tipo', 
                    'almacen',
                    'unidad_medida',
                    'total_agregado',
                    'fecha_registro',
                    'descripcion'
                ];

                $errores = [];
                $datos = [];

                foreach ($campos_requeridos as $campo) {
                    if (empty($_POST[$campo])) {
                        $errores[] = "El campo " . str_replace('_', ' ', $campo) . " es requerido";
                    } else {
                        $datos[$campo] = trim(htmlspecialchars($_POST[$campo]));
                    }
                }

                if (!empty($datos['total_agregado']) && !is_numeric($datos['total_agregado'])) {
                    $errores[] = "El campo total agregado debe ser un número";
                }

                if (empty($errores)) {
                    try {
                        $fecha_actual = date('Y-m-d H:i:s');
                        $cantidad_inicial = $datos['total_agregado'];
                        $nuevo_total = $cantidad_inicial;

                        $sql = $conexion->prepare("INSERT INTO materiales(
                            NOMBRE, TIPO, ALMACEN, UND_MEDIDA, 
                            TTL_AGREGADO, FECHA_AGREG, CANTIDAD, DESCRIPCION
                        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

                        $sql->bind_param("ssssssss", 
                            $datos['nombre'],
                            $datos['tipo'],
                            $datos['almacen'],
                            $datos['unidad_medida'],
                            $nuevo_total,
                            $fecha_actual,
                            $cantidad_inicial,
                            $datos['descripcion']
                        );

                        if ($sql->execute()) {
                            echo '<div class="alert alert-success">Material registrado correctamente</div>';
                            echo "<script>
                                setTimeout(function() {
                                    window.location.href = '../materiales.php';
                                }, 1500);
                            </script>";
                        } else {
                            echo '<div class="alert alert-danger">Error al registrar el material: ' . $conexion->error . '</div>';
                        }
                    } catch (Exception $e) {
                        echo '<div class="alert alert-danger">Error en la base de datos: ' . $e->getMessage() . '</div>';
                    }
                } else {
                    echo '<div class="alert alert-warning">';
                    foreach ($errores as $error) {
                        echo $error . '<br>';
                    }
                    echo '</div>';
                }
            }
            ?>

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">NOMBRE</label>
                        <input type="text" class="form-control" name="nombre" maxlength="100" required>
                    </div>
                    <div class="mb-3">
                        <label for="tipo" class="form-label">TIPO</label>
                        <input type="text" class="form-control" name="tipo" maxlength="50" required>
                    </div>
                    <div class="mb-3">
                        <label for="almacen" class="form-label">ALMACEN</label>
                        <input type="text" class="form-control" name="almacen" maxlength="30" required>
                    </div>
                    <div class="mb-3">
                        <label for="unidad_medida" class="form-label">UNIDAD DE MEDIDA</label>
                        <select class="form-control" name="unidad_medida" required>
                            <option value="">Seleccione una unidad</option>
                            <option value="kg">Kilogramo (kg)</option>
                            <option value="g">Gramo (g)</option>
                            <option value="mg">Miligramo (mg)</option>
                            <option value="lb">Libra (lb)</option>
                            <option value="oz">Onza (oz)</option>
                            <option value="t">Tonelada (t)</option>
                            <option value="l">Litro (l)</option>
                            <option value="ml">Mililitro (ml)</option>
                            <option value="gal">Galón (gal)</option>
                            <option value="m">Metro (m)</option>
                            <option value="cm">Centímetro (cm)</option>
                            <option value="mm">Milímetro (mm)</option>
                            <option value="in">Pulgada (in)</option>
                            <option value="ft">Pie (ft)</option>
                            <option value="yd">Yarda (yd)</option>
                            <option value="m2">Metro cuadrado (m²)</option>
                            <option value="cm2">Centímetro cuadrado (cm²)</option>
                            <option value="ft2">Pie cuadrado (ft²)</option>
                            <option value="m3">Metro cúbico (m³)</option>
                            <option value="cm3">Centímetro cúbico (cm³)</option>
                            <option value="L3">Litro cúbico (L³)</option>
                            <option value="pcs">Piezas (pcs)</option>
                            <option value="und">Unidad (und)</option>
                            <option value="par">Par</option>
                            <option value="doc">Docena</option>
                            <option value="caja">Caja</option>
                            <option value="pqt">Paquete</option>
                            <option value="rollo">Rollo</option>
                            <option value="bobina">Bobina</option>
                            <option value="lata">Lata</option>
                            <option value="barril">Barril</option>
                            <option value="bolsa">Bolsa</option>
                            <option value="saco">Saco</option>
                            <option value="kit">Kit</option>
                            <option value="set">Set</option>
                            <option value="lote">Lote</option>
                            <option value="pack">Pack</option>
                            <option value="ciento">Ciento</option>
                            <option value="millar">Millar</option>
                            <option value="resma">Resma</option>
                            <option value="pliego">Pliego</option>
                            <option value="tira">Tira</option>
                            <option value="plancha">Plancha</option>
                            <option value="lamina">Lámina</option>
                            <option value="balde">Balde</option>
                            <option value="bidon">Bidón</option>
                            <option value="tambor">Tambor</option>
                            <option value="contenedor">Contenedor</option>
                            <option value="pallet">Pallet</option>
                            <option value="jgo">Juego</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="total_agregado" class="form-label">TOTAL AGREGADO</label>
                        <input type="text" class="form-control" name="total_agregado" maxlength="20" required>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_registro" class="form-label">FECHA DE REGISTRO</label>
                        <input type="text" class="form-control" name="fecha_registro" 
                               value="<?php echo date('Y-m-d H:i:s'); ?>" 
                               readonly style="background-color: #e9ecef;">
                    </div>
                    <div class="mb-3">
                        <label for="cantidad" class="form-label">CANTIDAD</label>
                        <input type="text" class="form-control" name="cantidad" value="0" 
                               readonly style="background-color: #e9ecef;">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">DESCRIPCION</label>
                        <input type="text" class="form-control" name="descripcion" maxlength="200">
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary" name="btnRegistrar" value="ok" style="width:120px; height:45px; margin-right: 20px;">Registrar</button>
                <button type="button" class="btn btn-warning" onclick="window.location.href='../materiales.php'" style="width:120px; height:45px;">Regresar</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="CSS/materialStyles.css">

    <title>PIENZA DATABASE</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/7435201435.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
    <H1 class="text-center materialesH1">PIENZA BASE</H1>
    
    <div class="container-fluid row">
        <?php if (isset($_GET['id'])): ?>
        <!-- Formulario de modificación - solo se muestra cuando hay un ID -->
        <h3 class="text-center">MODIFICAR MATERIALES</h3>
        <form class="col-11 p-3" method="POST">
            <?php
            include "../Conexion07.php";
            date_default_timezone_set('America/Lima');
            include "materiales/actualizar_materiales.php";
            
            $id = $_GET['id'];
            $consulta = $conexion->query("SELECT * FROM materiales WHERE ID_MAT = $id");
            $datos_material = $consulta->fetch_object();
            ?>
            
            <div id="form_materiales" class="row">
                <div class="col-4">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">NOMBRE</label>
                        <input type="text" class="form-control" name="nombre" maxlength="100" 
                               value="<?= $datos_material ? $datos_material->NOMBRE : '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">TIPO</label>
                        <input type="text" class="form-control" name="tipo" maxlength="50" 
                               value="<?= $datos_material ? $datos_material->TIPO : '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">ALMACEN</label>
                        <input type="text" class="form-control" name="almacen" maxlength="30" 
                               value="<?= $datos_material ? $datos_material->ALMACEN : '' ?>" required>
                    </div>  
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">UNIDAD DE MEDIDA</label>
                        <select class="form-control" name="unidad_medida" required>
                            <option value="<?= $datos_material ? $datos_material->UND_MEDIDA : '' ?>" selected>
                                <?= $datos_material ? $datos_material->UND_MEDIDA : 'Seleccione una unidad' ?>
                            </option>
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
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">TOTAL AGREGADO</label>
                        <input type="text" class="form-control" name="total_agregado" maxlength="20" 
                               value="0" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">FECHA DE REGISTRO</label>
                        <input type="text" class="form-control" name="fecha_registro" 
                               value="<?= $datos_material ? $datos_material->FECHA_AGREG : '' ?>" 
                               readonly style="background-color: #e9ecef;">
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">CANTIDAD</label>
                        <input type="text" class="form-control" name="cantidad" maxlength="50" 
                               value="<?= $datos_material ? $datos_material->CANTIDAD : '' ?>" 
                               readonly style="background-color: #e9ecef;" required>
                    </div>  
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">DESCRIPCION</label>
                        <input type="text" class="form-control" name="descripcion" maxlength="200" 
                               value="<?= $datos_material ? $datos_material->DESCRIPCION : '' ?>">
                    </div>
                </div>
            </div>
            
            <input type="hidden" name="id_material" value="<?= $datos_material->ID_MAT ?>">
            
            <div class="row mt-4 flex_between">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary" name="btnActualizar" value="ok" 
                            style="width:120px; height:45px; margin-right: 200px;">Actualizar</button>
                    <button type="submit" class="btn btn-danger" name="btnEliminar" value="ok" 
                            style="width:155px; height:45px; margin-right: 200px;"
                            onclick="return confirm('¿Estás seguro de que deseas eliminar este material?')">
                        Eliminar Material
                    </button>
                    <button type="submit" class="btn btn-secondary" name="btnLimpiar" value="ok" 
                            style="width:120px; height:45px; margin-right: 200px;">Limpiar</button>
                </div>
            </div>
        </form>
        
        <?php else: ?>
        <!-- Botones que se muestran cuando no hay modificación -->
        <div class="col-12 text-center mb-4">
            <button type="button" class="btn btn-primary" 
                    onclick='window.location.href="materiales/nuevo_material.php"' 
                    name="btnNuevo" value="ok" 
                    style="width:150px; height:45px; margin-right: 200px;">
                Nuevo Material
            </button>
            <button type="button" class="btn btn-warning" onclick='window.location.href="../bienvenida.php"' 
                    value="ok" style="width:120px; height:45px;">Regresar</button>
        </div>
        <?php endif; ?>

        <!-- Tabla de materiales - siempre visible -->
        <div class="col-12 p-4">
            <table class="table">
                <thead class="table-info">
                    <tr>
                        <th scope="col" style="max-width: 20px;">ID</th>
                        <th scope="col" style="max-width: 120px; text-align: center;">NOMBRE</th>
                        <th scope="col" style="max-width: 120px; text-align: center;">TIPO</th>
                        <th scope="col" style="max-width: 50px; text-align: center;">ALMACEN</th>
                        <th scope="col" style="max-width: 50px; text-align: center;">UNIDAD</th>
                        <th scope="col" style="max-width: 120px; text-align: center;">TOTAL AGREGADO</th>
                        <th scope="col" style="max-width: 100px; text-align: center;">FECHA DE REGISTRO</th>
                        <th scope="col" style="max-width: 100px; text-align: center;">CANTIDAD</th>
                        <th scope="col" style="max-width: 200px; text-align: center;">DESCRIPCION</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include "../Conexion07.php";   
                    $sql = $conexion->query("select * from materiales");
                    while ($datos=$sql->fetch_object()) {  ?>
                        <tr>
                            <td><?= $datos-> ID_MAT  ?></td>
                            <td><?= $datos-> NOMBRE ?></td>
                            <td><?= $datos-> TIPO ?></td>
                            <td><?= $datos-> ALMACEN ?></td>
                            <td><?= $datos-> UND_MEDIDA ?></td>
                            <td><?= $datos-> TTL_AGREGADO ?></td>
                            <td><?= $datos-> FECHA_AGREG ?></td>
                            <td><?= $datos-> CANTIDAD ?></td>
                            <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" 
                                title="<?= htmlspecialchars($datos->DESCRIPCION) ?>">
                                <?= substr($datos->DESCRIPCION, 0, 100) . (strlen($datos->DESCRIPCION) > 100 ? '...' : '') ?>
                            </td>
                            <td>
                                <a href="materiales.php?id=<?= $datos->ID_MAT ?>" class="btn btn-small btn-warning">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } //cierre del ciclo While
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

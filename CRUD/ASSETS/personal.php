<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="CSS/personalStyles.css">

    <title>PIENZA DATABASE</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/7435201435.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
    <H1 class="text-center personalH1">PIENZA BASE</H1>
    <h3 class="text-center">REGISTRO DEL PERSONAL</h3>
    
    <div class="container-fluid row">
        <form class="col-11 p-3" method="POST">
            <?php
            include "../Conexion07.php";
            include "personal/registro_personal.php";
            ?>
            <div class="row">
                <div class="col-3">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">NOMBRES</label>
                        <input type="text" class="form-control" name="nombre" maxlength="50" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">APELLIDO</label>
                        <input type="text" class="form-control" name="apellido" maxlength="50" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">DNI</label>
                        <input type="text" class="form-control" name="dni" maxlength="12" required>
                    </div>  
                </div>
                <div class="col-3">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">TELEFONO</label>
                        <input type="text" class="form-control" name="telefono" maxlength="12" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">ÁREA</label>
                        <input type="text" class="form-control" name="area" maxlength="30" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">CARGO</label>
                        <input type="text" class="form-control" name="cargo" maxlength="30" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">PERFIL</label>
                        <input type="text" class="form-control" name="descripcion" maxlength="200">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">FECHA DE INGRESO</label>
                        <input type="date" class="form-control" name="fecha_ingreso" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">AFP</label>
                        <input type="text" class="form-control" name="afp" maxlength="50">
                    </div>
                </div>
                <div class="col-3">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">SEGURO</label>
                        <input type="text" class="form-control" name="seguro" maxlength="50">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">ALERGIAS</label>
                        <input type="text" class="form-control" name="alergias" maxlength="200">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">CONDICIÓN PSICOLÓGICA</label>
                        <input type="text" class="form-control" name="cond_psico" maxlength="200">
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary" name="btnRegistrar" value="ok" style="width:120px; height:45px; margin-right: 200px;">Registrar</button>
                    <button type="button" class="btn btn-warning" onclick='window.location.href="../bienvenida.php"' value="ok" style="width:120px; height:45px;">Regresar</button>
                </div>
            </div>
        </form>
    </div>

    <div class="col-12 p-4">
        <table class="table">
            <thead class="table-info">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">APELLIDOS</th>
                    <th scope="col">DNI</th>
                    <th scope="col">TELEFONO</th>
                    <th scope="col">AREA</th>
                    <th scope="col">CARGO</th>
                    <th scope="col" style="max-width: 200px;">PERFIL</th>
                    <th scope="col" style="width: 116px;"></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include "../Conexion07.php";   
                $sql = $conexion->query("select * from personal");
                while ($datos=$sql->fetch_object()) {  ?>
                    <tr>
                        <td><?= $datos-> ID_PERS ?></td>
                        <td><?= $datos-> NOMBRE ?></td>
                        <td><?= $datos-> APELLIDOS ?></td>
                        <td><?= $datos-> DNI ?></td>
                        <td><?= $datos-> TELF ?></td>
                        <td><?= $datos-> AREA ?></td>
                        <td><?= $datos-> CARGO ?></td>
                        <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" 
                            title="<?= htmlspecialchars($datos->DESCRIP) ?>">
                            <?= substr($datos->DESCRIP, 0, 100) . (strlen($datos->DESCRIP) > 100 ? '...' : '') ?>
                        </td>
                        <td style="width: 116px;">
                            <a href="personal/modificar_personal.php?id=<?= $datos->ID_PERS ?>" class="btn btn-small btn-warning" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="personal/detalle_personal.php?id=<?= $datos->ID_PERS ?>" class="btn btn-small btn-info" title="Ver detalles"><i class="fa-solid fa-circle-info"></i></a>
                        </td>
                    </tr>
                <?php } //cierre del ciclo While
                ?>
            </tbody>
        </table>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
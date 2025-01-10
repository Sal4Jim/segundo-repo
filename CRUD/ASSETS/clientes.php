<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="CSS/clientesStyles.css">

    <title>PIENZA DATABASE</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/7435201435.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300..700&display=swap" rel="stylesheet">

</head>
<body>
    <H1 class="text-center clientesH1">PIENZA BASE</H1>
    <h3 class="text-center ">REGISTRO DE CLIENTES</h3>
    <div class="container-fluid row">
    <form class="col-11 p-3" method="POST">
        <?php
        include "../Conexion07.php";
        include "clientes/registro_clientes.php";
        ?>
        <div class="row">
            <div class="col-4">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">NOMBRE COMERCIAL DE LA EMPRESA</label>
                    <input type="text" class="form-control" name="nombre_comercial" maxlength="50" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">RAZON SOCIAL</label>
                    <input type="text" class="form-control" name="razon_social" maxlength="100" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">RUC</label>
                    <input type="text" class="form-control" name="ruc" maxlength="11" required>
                </div>  
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">CATEGORIA DEL CLIENTE</label>
                    <input type="text" class="form-control" name="cate_clie" maxlength="30" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">DEPARTAMENTO RESPONSABLE</label>
                    <input type="text" class="form-control" name="depto_resp" maxlength="20" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">TELEFONO DEL DEPARTAMENTO RESPONSABLE</label>
                    <input type="text" class="form-control" name="tel_depto_resp" maxlength="15" required>
                </div>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">NOMBRE DEL DUEÑO DE LA EMPRESA</label>
                    <input type="text" class="form-control" name="dueño_emp" maxlength="50" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">DNI DEL DUEÑO</label>
                    <input type="text" class="form-control" name="dni_dueño" maxlength="20" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">DESCRIPCION</label>
                    <input type="text" class="form-control" name="descripcion" maxlength="200">
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
                        <th scope="col" style="max-width: 20px;">ID</th>
                        <th scope="col" style="max-width: 120px; text-align: center;">NOMBRE COMERCIAL</th>
                        <th scope="col" style="max-width: 120px; text-align: center;">RAZÓN SOCIAL</th>
                        <th scope="col" style="max-width: 30px; text-align: center;">RUC</th>
                        <th scope="col" style="max-width: 50px; text-align: center;">CATEGORIA DEL CLIENTE</th>
                        <th scope="col" style="max-width: 120px; text-align: center;">DEPARTAMENTO RESPONSABLE</th>
                        <th scope="col" style="max-width: 100px; text-align: center;">TELEFONO DEL DEPARTAMENTO</th>
                        <th scope="col" style="max-width: 100px; text-align: center;">NOMBRE DEL DUEÑO DE LA EMPRESA</th>
                        <th scope="col" style="max-width: 30px; text-align: center;">DNI DEL DUEÑO</th>
                        <th scope="col" style="max-width: 200px; text-align: center;">DESCRIPCION</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include "../Conexion07.php";   
                    $sql = $conexion->query("select * from clientes");
                    while ($datos=$sql->fetch_object()) {  ?>
                        <tr>
                            <td><?= $datos-> ID_CLIENTE ?></td>
                            <td><?= $datos-> NOMB_COMER ?></td>
                            <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" 
                                title="<?= htmlspecialchars($datos->RAZON_SOCIAL) ?>">
                                <?= substr($datos->RAZON_SOCIAL, 0, 100) . (strlen($datos->RAZON_SOCIAL) > 100 ? '...' : '') ?>
                            </td>
                            <td><?= $datos-> RUC ?></td>
                            <td><?= $datos-> CAT_CLIENTE ?></td>
                            <td><?= $datos-> DPTO_RESP ?></td>
                            <td><?= $datos-> TLF_DPTO ?></td>
                            <td><?= $datos-> NOMB_DUENO ?></td>
                            <td><?= $datos-> DNI_DUENO ?></td>
                            <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" 
                                title="<?= htmlspecialchars($datos->DESCRIPCION) ?>">
                                <?= substr($datos->DESCRIPCION, 0, 100) . (strlen($datos->DESCRIPCION) > 100 ? '...' : '') ?>
                            </td>
                            <td>
                                <a href="clientes/modificar_clientes.php?id=<?= $datos->ID_CLIENTE ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')" href="clientes/eliminar_clientes.php?id=<?= $datos->ID_CLIENTE ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
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
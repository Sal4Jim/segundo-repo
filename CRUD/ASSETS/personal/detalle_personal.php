<?php 
include "../../Conexion07.php";
$Id = $_GET["id"];
$sql = $conexion->query("select * from personal where ID_PERS=$Id");
$datos = $sql->fetch_object();
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../CSS/detallePersonalStyles.css">

    <title>detalles del personal</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/7435201435.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Información Detallada del Personal</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>ID:</strong> <?= $datos->ID_PERS ?></p>
                        <p><strong>Nombre:</strong> <?= $datos->NOMBRE ?></p>
                        <p><strong>Apellidos:</strong> <?= $datos->APELLIDOS ?></p>
                        <p><strong>DNI:</strong> <?= $datos->DNI ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Teléfono:</strong> <?= $datos->TELF ?></p>
                        <p><strong>Área:</strong> <?= $datos->AREA ?></p>
                        <p><strong>Cargo:</strong> <?= $datos->CARGO ?></p>
                        <p><strong>Fecha de Ingreso:</strong> <?= date('d/m/Y', strtotime($datos->JOIN_DATE)) ?></p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <h5>Información de Seguros:</h5>
                        <p><strong>AFP:</strong> <?= $datos->AFP ?></p>
                        <p><strong>Seguro:</strong> <?= $datos->SEGURO ?></p>
                    </div>
                    <div class="col-md-6">
                        <h5>Información Médica:</h5>
                        <p><strong>Alergias:</strong> <?= $datos->ALERGIAS ?: 'Ninguna registrada' ?></p>
                        <p><strong>Condición Psicológica:</strong> <?= $datos->COND_PSICO ?: 'Ninguna registrada' ?></p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <h5>Perfil/Descripción:</h5>
                        <p class="border p-3 bg-light"><?= $datos->DESCRIP ?></p>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <a href="../personal.php" class="btn btn-warning">Regresar</a>
            </div>
        </div>
    </div>
</body>
</html> 
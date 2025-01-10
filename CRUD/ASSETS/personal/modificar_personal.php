<?php 
include "../../Conexion07.php";
$Id = $_GET["id"];
echo $Id;
$sql = $conexion->query("select * from personal where ID_PERS=$Id");

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../CSS/modifPersonalStyles.css">

    <title>Modificar personal</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/7435201435.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
    <form class="col-4 p-3 m-auto" method="POST">
        <h3 class="text-center">MODIFICAR PERSONAL</h3>
        <?php
            while ($datos=$sql->fetch_object()) {
                
        ?>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">NOMBRES</label>
            <input type="text" class="form-control" name="nombre" maxlength="50" value="<?= $datos->NOMBRE ?>" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">APELLIDO</label>
            <input type="text" class="form-control" name="apellido" maxlength="50" value="<?= $datos->APELLIDOS ?>" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">DNI</label>
            <input type="text" class="form-control" name="dni" maxlength="12" value="<?= $datos->DNI ?>" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">TELEFONO</label>
            <input type="text" class="form-control" name="telefono" maxlength="12" value="<?= $datos->TELF ?>" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">AREA</label>
            <input type="text" class="form-control" name="area" maxlength="35" value="<?= $datos->AREA ?>" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">CARGO</label>
            <input type="text" class="form-control" name="cargo" maxlength="12" value="<?= $datos->CARGO ?>" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">DESCRIPCION</label>
            <input type="text" class="form-control" name="descripcion" maxlength="200" value="<?= $datos->DESCRIP ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">AFP</label>
            <input type="text" class="form-control" name="afp" maxlength="50" value="<?= $datos->AFP ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">SEGURO</label>
            <input type="text" class="form-control" name="seguro" maxlength="50" value="<?= $datos->SEGURO ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">ALERGIAS</label>
            <input type="text" class="form-control" name="alergias" maxlength="200" value="<?= $datos->ALERGIAS ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">CONDICIÓN PSICOLÓGICA</label>
            <input type="text" class="form-control" name="cond_psico" maxlength="200" value="<?= $datos->COND_PSICO ?>">
        </div>
        <?php } ?>

        <button type="submit" class="btn btn-primary" name="btnModificar" value="ok">MODIFICAR</button>
        <a onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')" 
           href="eliminar_personal.php?id=<?= $Id ?>" 
           class="btn btn-danger">ELIMINAR</a>
        <a href="../personal.php" class="btn btn-warning float-end">REGRESAR</a>

        <?php 
        if (isset($_POST["btnModificar"])) {
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $dni = $_POST["dni"];
            $telefono = $_POST["telefono"];
            $area = $_POST["area"];
            $cargo = $_POST["cargo"];
            $descripcion = $_POST["descripcion"];
            $afp = $_POST["afp"];
            $seguro = $_POST["seguro"];
            $alergias = $_POST["alergias"];
            $cond_psico = $_POST["cond_psico"];
            
            $sql = $conexion->query("update personal set NOMBRE='$nombre',APELLIDOS='$apellido',DNI='$dni', TELF='$telefono', AREA='$area', CARGO='$cargo', DESCRIP='$descripcion', AFP='$afp', SEGURO='$seguro', ALERGIAS='$alergias', COND_PSICO='$cond_psico' where ID_PERS=$Id");
            if ($sql) {
                echo "<script>alert('Datos actualizados correctamente');</script>";
                echo "<script>window.location='../personal.php';</script>";
            }
        }
        ?>
    </form>
</body>
</html>
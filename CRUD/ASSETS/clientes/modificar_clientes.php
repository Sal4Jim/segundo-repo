<?php 
include "../../Conexion07.php";
$Id = $_GET["id"];
echo $Id;
$sql = $conexion->query("select * from clientes where ID_CLIENTE =$Id");

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIENZA DATABASE - Actualizar Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../CSS/ModificarClientesStyles.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
    <form class="col-5 p-3 m-auto" method="POST">
        <h1 class="text-center ModificarClientesH1">MODIFICAR CLIENTES</h1>
        <?php
            while ($datos=$sql->fetch_object()) {
                
        ?>

            <div class="mb-3" p>
                <label for="exampleInputEmail1" class="form-label">NOMBRE COMERCIAL DE LA EMPRESA</label>
                <input type="text" class="form-control" name="nombre_comercial" maxlength="50" value="<?= $datos->NOMB_COMER ?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">RAZON SOCIAL</label>
                <input type="text" class="form-control" name="razon_social" maxlength="100" value="<?= $datos->RAZON_SOCIAL ?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">RUC</label>
                <input type="text" class="form-control" name="ruc" maxlength="11" value="<?= $datos->RUC ?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">CATEGORIA DEL CLIENTE</label>
                <input type="text" class="form-control" name="cate_clie" maxlength="30" value="<?= $datos->CAT_CLIENTE ?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">DEPARTAMENTO RESPONSABLE</label>
                <input type="text" class="form-control" name="depto_resp" maxlength="20" value="<?= $datos->DPTO_RESP ?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">TELEFONO DEL DEPARTAMENTO RESPONSABLE</label>
                <input type="text" class="form-control" name="tel_depto_resp" maxlength="12" value="<?= $datos->TLF_DPTO ?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">NOMBRE DEL DUEÑO DE LA EMPRESA</label>
                <input type="text" class="form-control" name="dueño_emp" maxlength="50" value="<?= $datos->NOMB_DUENO ?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">DNI DEL DUEÑO</label>
                <input type="text" class="form-control" name="dni_dueño" maxlength="12" value="<?= $datos->DNI_DUENO ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">DESCRIPCION</label>
                <input type="text" class="form-control" name="descripcion" maxlength="200" value="<?= $datos->DESCRIPCION ?>">
            </div>

        <?php } ?>

        <button type="submit" class="btn btn-primary" name="btnModificar" value="ok">MODIFICAR</button>
        <?php 
        if (isset($_POST["btnModificar"])) {
            $nombre_comercial =$_POST["nombre_comercial"]; 
            $razon_social =$_POST["razon_social"];
            $ruc =$_POST["ruc"]; 
            $cate_clie =$_POST["cate_clie"]; 
            $depto_resp =$_POST["depto_resp"]; 
            $tel_depto_resp =$_POST["tel_depto_resp"]; 
            $dueño_emp =$_POST["dueño_emp"]; 
            $dni_dueño =$_POST["dni_dueño"]; 
            $descripcion =$_POST["descripcion"];  
            
            $sql = $conexion->query("update clientes set NOMB_COMER='$nombre_comercial', RAZON_SOCIAL='$razon_social', RUC='$ruc', CAT_CLIENTE='$cate_clie', DPTO_RESP='$depto_resp',
                                                         TLF_DPTO='$tel_depto_resp', NOMB_DUENO='$dueño_emp', DNI_DUENO='$dni_dueño', DESCRIPCION='$descripcion'  where ID_CLIENTE = $Id");
            if ($sql) {
                echo "<script>alert('Datos actualizados correctamente');</script>";
                echo "<script>window.location='../clientes.php';</script>";
            }
        }
        ?>
    </form>
</body>
</html>
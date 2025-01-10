
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida - Panel de Control</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="ASSETS/CSS/estilosBienv.css">
    <?php
    session_start();
    if(!isset($_SESSION['usuario'])){
        header('Location: ../../index.php');
        exit();
    }
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1>BIENVENIDO <?php echo $_SESSION['usuario']; ?> A SU BASE DE DATOS</h1>
                <h4>QUE DESEA HACER HOY?</h4>
                <!-- Aquí puedes agregar una tabla para mostrar los datos -->
                <table id="tabla" class="table table-striped" strong>
                    <div class="buttons d-flex justify-content-between mt-5 mb-4">
                        <div></div>
                        <div>
                            <a href="ASSETS/clientes.php" class="btn btn-success">CLIENTES</a>       
                        </div>
                        <div>
                            <a href="ASSETS/personal.php" class="btn btn-success">PERSONAL</a>       
                        </div>
                        <div>
                            <a href="ASSETS/materiales.php" class="btn btn-success">MATERIALES</a>       
                        </div>
                        <div></div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center mb-4">
                        <a href=" ../php/cerrar_sesion.php" class="btn btn-danger">Cerrar sesión</a>
                        <!-- <a href="fpdf/PruebaH.php" class="btn btn-success">Generar Reporte PDF</a> -->
                    </div>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
<?php 
if (!empty($_POST["btnRegistrar"])) {

    if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["dni"]) and !empty($_POST["telefono"]) 
    and !empty($_POST["area"]) and !empty($_POST["cargo"])) {

        $nombre =$_POST["nombre"]; 
        $apellido =$_POST["apellido"]; 
        $dni =$_POST["dni"]; 
        $telefono =$_POST["telefono"]; 
        $area =$_POST["area"];
        $cargo =$_POST["cargo"];
        $descripcion =$_POST["descripcion"];
        $fecha_ingreso = $_POST["fecha_ingreso"];
        $afp = $_POST["afp"];
        $seguro = $_POST["seguro"];
        $alergias = $_POST["alergias"];
        $cond_psico = $_POST["cond_psico"];
        

        $sql = $conexion->query("insert into personal(NOMBRE, APELLIDOS, DNI, TELF, AREA, CARGO, DESCRIP, JOIN_DATE, AFP, SEGURO, ALERGIAS, COND_PSICO) values('$nombre', '$apellido', $dni, '$telefono', '$area', '$cargo', '$descripcion', '$fecha_ingreso', '$afp', '$seguro', '$alergias', '$cond_psico')");
            if ($sql == 1) {
                echo '<div class="alert alert-success">persona registrada correctamente </div>';
                header("location:personal.php");
            } else {
                echo '<div class="alert alert-danger">persona no registrada </div>';
            }
            
    }else {
        echo '<div class="alert alert-warning">Falta completar campos obligatorios</div>';
    }
}
?>
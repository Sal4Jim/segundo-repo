<?php
include "../../Conexion07.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = $conexion->query("DELETE FROM materiales WHERE ID_MAT = $id");
    
    if ($sql) {
        header("Location: ../materiales.php");
    } else {
        echo "Error al eliminar el registro";
    }
}
?> 
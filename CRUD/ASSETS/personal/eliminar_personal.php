<?php
include "../../Conexion07.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = $conexion->query("DELETE FROM personal WHERE ID_PERS = $id");
    
    if ($sql) {
        header("Location: ../personal.php");
    } else {
        echo "Error al eliminar el registro";
    }
}
?> 
<?php
include "../../Conexion07.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = $conexion->query("DELETE FROM clientes WHERE ID_CLIENTE = $id");
    
    if ($sql) {
        header("Location: ../clientes.php");
    } else {
        echo "Error al eliminar el registro";
    }
}
?> 
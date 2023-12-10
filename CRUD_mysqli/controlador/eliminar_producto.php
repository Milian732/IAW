<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM productos where id = $id";
    if (mysqli_query($conn, $sql)) {
        echo '<div class="alert alert-success">Producto eliminado correctamente</div>';
    }else{
        echo '<div class="alert alert-danger">Error al eliminar producto</div>';
    }
}
?>
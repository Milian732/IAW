<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $sql = "DELETE FROM productos WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            echo '<div class="alert alert-success">Producto eliminado correctamente</div>';
        } else {
            echo '<div class="alert alert-danger">Error al eliminar producto</div>';
        }
    } catch (PDOException $e) {
        echo '<div class="alert alert-danger">Error: ' . $e->getMessage() . '</div>';
    }
}
?>
<?php
if (!empty($_POST["modificar"])) {
    if (!empty($_POST["nombre"]) and !empty($_POST["precio"]) and !empty($_POST["categoria"]) and !empty($_POST["proveedor"])){
        
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $precio = $_POST["precio"];
        $categoria = $_POST["categoria"];
        $proveedor = $_POST["proveedor"];

        try {
            $sql = "UPDATE productos SET nombre=:nombre, precio=:precio, id_categoria=(SELECT id FROM categorias WHERE nombre = :categoria), id_proveedor=(SELECT id FROM proveedores WHERE nombre = :proveedor) WHERE id = :id";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':precio', $precio);
            $stmt->bindParam(':categoria', $categoria);
            $stmt->bindParam(':proveedor', $proveedor);
            $stmt->bindParam(':id', $id);

            $stmt->execute();

            header("location:index.php");
        } catch (PDOException $e) {
            echo '<div class="alert alert-danger">Error al modificar producto: ' . $e->getMessage() . '</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Alguno de los campos está vacío</div>';
    }
}
?>
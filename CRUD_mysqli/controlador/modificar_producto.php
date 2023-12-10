<?php
if (!empty($_POST["modificar"])) {
    if (!empty($_POST["nombre"]) and !empty($_POST["precio"]) and !empty($_POST["categoria"]) and !empty($_POST["proveedor"])){
        
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $precio = $_POST["precio"];
        $categoria = $_POST["categoria"];
        $proveedor = $_POST["proveedor"];

        $sql = "UPDATE productos SET nombre='$nombre', precio='$precio', id_categoria=(SELECT id FROM categorias WHERE nombre = '$categoria'), id_proveedor=(SELECT id FROM proveedores WHERE nombre = '$proveedor') WHERE id = $id";

        if (mysqli_query($conn, $sql)) {
            header("location:index.php");
        } else {
            echo '<div class="alert alert-danger">Error al modificar producto</div>';
        }
    }else{
        echo '<div class="alert alert-warning">Alguno de los campos está vacio</div>';
    }

}
?>
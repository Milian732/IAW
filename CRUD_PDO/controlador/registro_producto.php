<?php
if (!empty($_POST["registrar"])) {
    if (!empty($_POST["nombre"]) and !empty($_POST["precio"]) and !empty($_POST["categoria"]) and !empty($_POST["proveedor"])) {

        $nombre = $_POST["nombre"];
        $precio = $_POST["precio"];
        $categoria = $_POST["categoria"];
        $proveedor = $_POST["proveedor"];

        $precioFormateado = number_format($precio, 0) . "€";

        try {
            $sql = "INSERT INTO productos(nombre, precio, id_categoria, id_proveedor) 
                    VALUES (:nombre, :precio, (SELECT id FROM categorias WHERE nombre = :categoria), 
                            (SELECT id FROM proveedores WHERE nombre = :proveedor))";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':precio', $precioFormateado);
            $stmt->bindParam(':categoria', $categoria);
            $stmt->bindParam(':proveedor', $proveedor);

            if ($stmt->execute()) {
                echo '<div class="alert alert-success">Producto registrado correctamente</div>';
            } else {
                echo '<div class="alert alert-danger">Error al registrar producto</div>';
            }
        } catch (PDOException $e) {
            echo '<div class="alert alert-danger">Error: ' . $e->getMessage() . '</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Alguno de los campos está vacío</div>';
    }
}
?>
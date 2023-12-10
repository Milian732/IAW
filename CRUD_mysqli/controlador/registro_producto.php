<?php
if (!empty($_POST["registrar"])) {
    if (!empty($_POST["nombre"]) and !empty($_POST["precio"]) and !empty($_POST["categoria"]) and !empty($_POST["proveedor"])){
        
        $nombre = $_POST["nombre"];
        $precio = $_POST["precio"];
        $categoria = $_POST["categoria"];
        $proveedor = $_POST["proveedor"];
        
        $precioFormateado = number_format($precio, 0) . "€";

        $sql = "INSERT INTO productos(nombre, precio, id_categoria, id_proveedor) VALUES ('$nombre', '$precioFormateado', (SELECT id FROM categorias WHERE nombre = '$categoria'), (SELECT id FROM proveedores WHERE nombre = '$proveedor'))";

        if (mysqli_query($conn, $sql)) {
          echo '<div class="alert alert-success">Producto registrado correctamente</div>';
        } else {
          echo '<div class="alert alert-danger">Error al registrar producto</div>';
        }
    }else{
         echo '<div class="alert alert-warning">Alguno de los campos está vacio</div>';
    }
}
?>
<?php
include "conexion.php";
$id = $_GET["id"];
$sql = "SELECT * FROM productos WHERE id = :id";
try {
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<form class="col-4 p-3 m-auto" method="post">
      <h3 class="text-center text-secondary">Modificar Producto</h3>
      <div class="mb-3">
        <label for="id" class="form-label">ID del producto</label>
        <input type="text" class="form-control" name="id" value="<?= $id ?>" readonly>
      </div>
      <?php
      include "conexion.php";
      include "controlador/modificar_producto.php";
      foreach ($result as $row) {
      ?>
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre del producto</label>
        <input type="text" class="form-control" name="nombre" value="<?= $row['nombre'] ?>">
      </div>
      <div class="mb-3">
        <label for="precio" class="form-label">Precio del producto</label>
        <input type="text" class="form-control" name="precio" value="<?= $row['precio'] ?>">
      </div>
      <div class="mb-3">
        <label for="categoria" class="form-label">categoria</label>
        <select class="form-select" aria-label="Default select example" name="categoria" value="<?= $result['categoria'] ?>">
        <?php
        include "conexion.php";
        try {
            $sql = "SELECT * FROM categorias";
            $stmt = $conn->query($sql);
        
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                <option value="<?= $row["nombre"] ?>"><?= $row["nombre"] ?></option>
            <?php }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="proveedor" class="form-label">Proveedor</label>
        <select class="form-select" aria-label="Default select example" name="proveedor" value="<?= $result['proveedor'] ?>">
        <?php
        include "conexion.php";
        try {
            $sql = "SELECT * FROM proveedores";
            $stmt = $conn->query($sql);
        
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                <option value="<?= $row["nombre"] ?>"><?= $row["nombre"] ?></option>
            <?php }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
        </select>
      </div>
      <?php } 
      ?>
      <button type="submit" class="btn btn-primary" name="modificar" value="ok">Modificar</button>
    </form>
</body>
</html>
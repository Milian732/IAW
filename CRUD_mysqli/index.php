<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD mysqli</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/fff3f38556.js" crossorigin="anonymous"></script>
</head>
<body>
  <h1 class="text-center p-3">CRUD MYSQLI PROCEDURAL</h1>
  <script>
    function eliminar(){
      var respuesta = confirm("Estas seguro que deseas eliminar este producto?");
      return respuesta;
    }
  </script>
  <div class="container-fluid row">
    <form class="col-3 p-3" method="post">
      <h3 class="text-center text-secondary">Registro de Productos</h3>
      <?php
      include "conexion.php";
      include "controlador/eliminar_producto.php";
      ?>
      <?php
      include "conexion.php";
      include "controlador/registro_producto.php";
      ?>
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre del producto</label>
        <input type="text" class="form-control" name="nombre">
      </div>
      <div class="mb-3">
        <label for="precio" class="form-label">Precio del producto</label>
        <input type="number" class="form-control" name="precio">
      </div>
      <div class="mb-3">
        <label for="categoria" class="form-label">categoria</label>
        <select class="form-select" aria-label="Default select example" name="categoria">
        <?php
        include "conexion.php";
        $sql = "SELECT nombre FROM categorias";
          $result = mysqli_query($conn, $sql);
          while($row = mysqli_fetch_assoc($result)) { ?>
            <option value="<?= $row["nombre"] ?>"><?= $row["nombre"] ?></option>
        <?php }
        ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="proveedor" class="form-label">Proveedor</label>
        <select class="form-select" aria-label="Default select example" name="proveedor">
        <?php
        include "conexion.php";
        $sql = "SELECT nombre FROM proveedores";
          $result = mysqli_query($conn, $sql);
          while($row = mysqli_fetch_assoc($result)) { ?>
            <option value="<?= $row["nombre"] ?>"><?= $row["nombre"] ?></option>
        <?php }
        ?>
        </select>
      </div>
      <button type="submit" class="btn btn-primary" name="registrar" value="ok">Registrar</button>
    </form>
    <div class="col-9 p-4">
      <table class="table">
        <thead class="table-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Precio</th>
            <th scope="col">Categoria</th>
            <th scope="col">Proveedor</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php
          include "conexion.php";
          $sql = "SELECT p.id AS id_producto, p.nombre AS nombre_producto, p.precio, c.nombre AS nombre_categoria, ps.nombre AS nombre_proveedor
          FROM productos p
          JOIN proveedores ps
          on p.id_proveedor = ps.id
          JOIN categorias c
          on p.id_categoria = c.id
          ORDER BY p.id";
          $result = mysqli_query($conn, $sql);
          while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <th><?= $row["id_producto"] ?></th>
              <td><?= $row["nombre_producto"] ?></td>
              <td><?= $row["precio"] ?></td>
              <td><?= $row["nombre_categoria"] ?></td>
              <td><?= $row["nombre_proveedor"] ?></td>
              <td>
                <a href="modificar_producto.php?id=<?= $row['id_producto'] ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                <a onclick="return eliminar()" href="index.php?id=<?= $row['id_producto'] ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
              </td>
            </tr>

          <?php }
          ?>
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>
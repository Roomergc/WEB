<?php 
include '../../config/bd.php'; 
include '../includes/header.php'; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="../css/agregar_producto.css">
</head>
<body>
<div class="main">
    <h1>Agregar Producto</h1>
    <form action="../controllers/productos_controller.php" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre del Producto:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="categoria">Categoría:</label>
        <select id="categoria" name="categoria">
            <option value="electronica">Electrónica</option>
            <option value="ropa">Ropa</option>
            <option value="hogar">Hogar</option>
        </select>

        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" step="0.01" required>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea>

        <label for="imagen">Imagen del Producto:</label>
        <input type="file" id="imagen" name="imagen" accept="image/*" required>

        <button type="submit" name="action" value="create">Guardar Producto</button>
    </form>
</div>
<?php include '../includes/footer.php'; ?>

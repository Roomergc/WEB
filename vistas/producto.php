<?php include 'header.php'; ?>

<div class="container">
    <div class="flex">
        <?php
        // Aquí iría la lógica para obtener los detalles del producto
        $producto = [
            'id' => 1,
            'nombre' => 'Producto de Ejemplo',
            'descripcion' => 'Esta es una descripción detallada del producto. Aquí puedes incluir todas las características y beneficios que ofrece el producto.',
            'precio' => 99.99,
            'imagen' => 'producto_ejemplo.jpg'
        ];
        ?>
        
        <div class="product-image">
            <img src="img/<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>">
        </div>
        
        <div class="product-details">
            <h1><?php echo $producto['nombre']; ?></h1>
            <p><?php echo $producto['descripcion']; ?></p>
            <p class="price">$<?php echo number_format($producto['precio'], 2); ?></p>
            <form action="carrito.php" method="post">
                <input type="hidden" name="producto_id" value="<?php echo $producto['id']; ?>">
                <input type="number" name="cantidad" value="1" min="1">
                <button type="submit" class="btn">Añadir al Carrito</button>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
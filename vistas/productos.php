<?php include '/includes/header.php'; ?>

<div class="container">
    <div class="flex">
        <aside class="sidebar">
            <h2>Filtros</h2>
            <form>
                <h3>Categorías</h3>
                <label><input type="checkbox" name="categoria[]" value="electronica"> Electrónica</label>
                <label><input type="checkbox" name="categoria[]" value="ropa"> Ropa</label>
                <label><input type="checkbox" name="categoria[]" value="hogar"> Hogar</label>
                
                <h3>Rango de precio</h3>
                <input type="range" min="0" max="1000" value="500" class="slider" id="priceRange">
                <p>Precio máximo: $<span id="priceValue"></span></p>
            </form>
        </aside>
        
        <main class="products grid">
            <?php
            // Aquí iría la lógica para obtener y mostrar los productos
            $productos = [
                ['id' => 1, 'nombre' => 'Producto 1', 'precio' => 19.99, 'imagen' => 'producto1.jpg'],
                ['id' => 2, 'nombre' => 'Producto 2', 'precio' => 29.99, 'imagen' => 'producto2.jpg'],
                // Más productos...
            ];
            
            foreach ($productos as $producto): ?>
                <div class="product-card">
                    <img src="img/<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>">
                    <div class="product-info">
                        <h3><?php echo $producto['nombre']; ?></h3>
                        <p>$<?php echo number_format($producto['precio'], 2); ?></p>
                        <a href="producto.php?id=<?php echo $producto['id']; ?>" class="btn">Ver detalles</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </main>
    </div>
</div>

<script>
    const slider = document.getElementById("priceRange");
    const output = document.getElementById("priceValue");
    output.innerHTML = slider.value;

    slider.oninput = function() {
        output.innerHTML = this.value;
    }
</script>

<?php include 'footer.php'; ?>
<?php 
require_once 'config/bd.php';
require_once 'includes/funciones.php';
include 'includes/header.php';

$db = new Database();
$conn = $db->conectar();

// Obtener filtros
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : null;
$precio_max = isset($_GET['precio_max']) ? $_GET['precio_max'] : null;

// Obtener productos
$productos = obtenerProductos($conn, $categoria, $precio_max);
?>

<div class="container">
    <div class="flex">
        <aside class="sidebar">
            <h2>Filtros</h2>
            <form method="GET" action="productos.php">
                <h3>Categorías</h3>
                <?php
                $categorias = $conn->query("SELECT * FROM categorias")->fetchAll();
                foreach ($categorias as $cat): ?>
                    <label>
                        <input type="checkbox" name="categoria[]" 
                               value="<?php echo $cat['id']; ?>"
                               <?php echo (isset($_GET['categoria']) && in_array($cat['id'], $_GET['categoria'])) ? 'checked' : ''; ?>>
                        <?php echo $cat['nombre']; ?>
                    </label>
                <?php endforeach; ?>
                
                <h3>Rango de precio</h3>
                <input type="range" name="precio_max" min="0" max="1000" 
                       value="<?php echo $precio_max ?? 500; ?>" class="slider" id="priceRange">
                <p>Precio máximo: $<span id="priceValue"></span></p>
                
                <button type="submit" class="btn">Aplicar filtros</button>
            </form>
        </aside>
        
        <main class="products grid">
            <?php foreach ($productos as $producto): ?>
                <div class="product-card">
                    <img src="img/productos/<?php echo $producto['imagen']; ?>" 
                         alt="<?php echo $producto['nombre']; ?>">
                    <div class="product-info">
                        <h3><?php echo $producto['nombre']; ?></h3>
                        <p>$<?php echo number_format($producto['precio'], 2); ?></p>
                        <a href="producto.php?id=<?php echo $producto['id']; ?>" 
                           class="btn">Ver detalles</a>
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

<?php include 'includes/footer.php'; ?>
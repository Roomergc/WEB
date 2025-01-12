<?php
require_once 'config/bd.php';
require_once 'includes/funciones.php';
include 'includes/header.php';

$db = new Database();
$conn = $db->conectar();

// Obtener productos destacados
$stmt = $conn->prepare("
    SELECT p.*, c.nombre as categoria_nombre 
    FROM productos p 
    JOIN categorias c ON p.categoria_id = c.id 
    WHERE p.destacado = 1 
    LIMIT 8
");
$stmt->execute();
$productos_destacados = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Obtener categorías principales
$stmt = $conn->prepare("
    SELECT c.*, COUNT(p.id) as total_productos 
    FROM categorias c 
    LEFT JOIN productos p ON c.id = p.categoria_id 
    GROUP BY c.id 
    HAVING total_productos > 0 
    LIMIT 6
");
$stmt->execute();
$categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<main>
    <!-- Banner Principal -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1>Bienvenido a City Store</h1>
                <p>Descubre nuestros productos destacados y las mejores ofertas</p>
                <a href="/productos.php" class="btn btn-primary">Ver Catálogo</a>
            </div>
        </div>
    </section>

    <!-- Categorías Principales -->
    <section class="categories-section">
        <div class="container">
            <h2>Categorías Populares</h2>
            <div class="categories-grid">
                <?php foreach ($categorias as $categoria): ?>
                    <a href="/productos.php?categoria=<?php echo $categoria['id']; ?>" class="category-card">
                        <div class="category-image">
                            <img src="/img/categorias/<?php echo $categoria['imagen']; ?>" 
                                 alt="<?php echo $categoria['nombre']; ?>">
                        </div>
                        <h3><?php echo $categoria['nombre']; ?></h3>
                        <span class="product-count"><?php echo $categoria['total_productos']; ?> productos</span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Productos Destacados -->
    <section class="featured-products">
        <div class="container">
            <h2>Productos Destacados</h2>
            <div class="products-grid">
                <?php foreach ($productos_destacados as $producto): ?>
                    <div class="product-card">
                        <div class="product-image">
                            <img src="/img/productos/<?php echo $producto['imagen']; ?>" 
                                 alt="<?php echo $producto['nombre']; ?>">
                            <?php if ($producto['descuento'] > 0): ?>
                                <span class="discount-badge">-<?php echo $producto['descuento']; ?>%</span>
                            <?php endif; ?>
                        </div>
                        <div class="product-info">
                            <span class="category"><?php echo $producto['categoria_nombre']; ?></span>
                            <h3><?php echo $producto['nombre']; ?></h3>
                            <div class="price">
                                <?php if ($producto['descuento'] > 0): ?>
                                    <span class="original-price">$<?php echo number_format($producto['precio'], 2); ?></span>
                                    <span class="final-price">
                                        $<?php echo number_format($producto['precio'] * (1 - $producto['descuento']/100), 2); ?>
                                    </span>
                                <?php else: ?>
                                    <span class="final-price">$<?php echo number_format($producto['precio'], 2); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="product-actions">
                                <a href="/producto.php?id=<?php echo $producto['id']; ?>" class="btn btn-secondary">Ver Detalles</a>
                                <form action="/carrito.php" method="POST" class="add-to-cart-form">
                                    <input type="hidden" name="producto_id" value="<?php echo $producto['id']; ?>">
                                    <input type="hidden" name="cantidad" value="1">
                                    <button type="submit" class="btn btn-primary">Agregar al Carrito</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="view-all">
                <a href="/productos.php" class="btn btn-outline">Ver todos los productos</a>
            </div>
        </div>
    </section>

    <!-- Sección de Beneficios -->
    <section class="benefits-section">
        <div class="container">
            <div class="benefits-grid">
                <div class="benefit-card">
                    <i class="icon-shipping"></i>
                    <h3>Envío Gratis</h3>
                    <p>En compras mayores a $999</p>
                </div>
                <div class="benefit-card">
                    <i class="icon-security"></i>
                    <h3>Pago Seguro</h3>
                    <p>Transacciones 100% seguras</p>
                </div>
                <div class="benefit-card">
                    <i class="icon-support"></i>
                    <h3>Soporte 24/7</h3>
                    <p>Atención al cliente permanente</p>
                </div>
                <div class="benefit-card">
                    <i class="icon-warranty"></i>
                    <h3>Garantía</h3>
                    <p>30 días de garantía en productos</p>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
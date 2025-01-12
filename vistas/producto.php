<?php 
require_once 'config/bd.php';
require_once 'includes/funciones.php';
include 'includes/header.php';

$db = new Database();
$conn = $db->conectar();

$id = isset($_GET['id']) ? $_GET['id'] : 0;
$producto = obtenerProducto($conn, $id);

if (!$producto) {
    header('Location: productos.php');
    exit;
}

// Procesar formulario de agregar al carrito
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cantidad = isset($_POST['cantidad']) ? (int)$_POST['cantidad'] : 1;
    agregarAlCarrito($id, $cantidad);
    header('Location: carrito.php');
    exit;
}
?>

<div class="container">
    <div class="flex">
        <div class="product-image">
            <img src="img/productos/<?php echo $producto['imagen']; ?>" 
                 alt="<?php echo $producto['nombre']; ?>">
        </div>
        
        <div class="product-details">
            <h1><?php echo $producto['nombre']; ?></h1>
            <p><?php echo $producto['descripcion']; ?></p>
            <p class="price">$<?php echo number_format($producto['precio'], 2); ?></p>
            <form action="" method="post">
                <input type="number" name="cantidad" value="1" min="1" 
                       max="<?php echo $producto['stock']; ?>">
                <button type="submit" class="btn">Añadir al Carrito</button>
            </form>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
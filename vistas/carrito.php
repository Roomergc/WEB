<?php 
require_once 'config/bd.php';
require_once 'includes/funciones.php';
include 'includes/header.php';

$db = new Database();
$conn = $db->conectar();

// Procesar actualizaciones de cantidad
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['actualizar'])) {
    foreach ($_POST['cantidad'] as $producto_id => $cantidad) {
        if ($cantidad > 0) {
            $_SESSION['carrito'][$producto_id] = $cantidad;
        } else {
            unset($_SESSION['carrito'][$producto_id]);
        }
    }
}

$carrito = obtenerCarrito();
$items_carrito = array();
$total = 0;

foreach ($carrito as $producto_id => $cantidad) {
    $producto = obtenerProducto($conn, $producto_id);
    if ($producto) {
        $subtotal = $producto['precio'] * $cantidad;
        $total += $subtotal;
        $items_carrito[] = array(
            'producto' => $producto,
            'cantidad' => $cantidad,
            'subtotal' => $subtotal
        );
    }
}
?>

<div class="container">
    <h1>Carrito de Compras</h1>
    
    <?php if (empty($items_carrito)): ?>
        <p>Tu carrito está vacío</p>
        <a href="productos.php" class="btn">Ver productos</a>
    <?php else: ?>
        <form method="post" action="">
            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items_carrito as $item): ?>
                        <tr>
                            <td><?php echo $item['producto']['nombre']; ?></td>
                            <td>$<?php echo number_format($item['producto']['precio'], 2); ?></td>
                            <td>
                                <input type="number" 
                                       name="cantidad[<?php echo $item['producto']['id']; ?>]" 
                                       value="<?php echo $item['cantidad']; ?>" 
                                       min="0">
                            </td>
                            <td>$<?php echo number_format($item['subtotal'], 2); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
            <div class="cart-total">
                <p>Total: $<?php echo number_format($total, 2); ?></p>
                <button type="submit" name="actualizar" class="btn">Actualizar Carrito</button>
                <a href="pago.php" class="btn">Proceder al Pago</a>
            </div>
        </form>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>
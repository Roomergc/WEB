<?php 
require_once 'config/bd.php';
require_once 'includes/funciones.php';
include 'includes/header.php';

$db = new Database();
$conn = $db->conectar();

if (empty($_SESSION['carrito'])) {
    header('Location: carrito.php');
    exit;
}

$total = calcularTotalCarrito($conn);
$envio = 5.00;
$total_final = $total + $envio;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Procesar el pago
    $numero_pedido = generarNumeroPedido();
    
    try {
        $conn->beginTransaction();
        
        // Crear el pedido
        $stmt = $conn->prepare("INSERT INTO pedidos (numero_pedido, usuario_id, total, estado) VALUES (?, ?, ?, 'pendiente')");
        $stmt->execute([$numero_pedido, $_SESSION['usuario_id'] ?? null, $total_final]);
        
        $pedido_id = $conn->lastInsertId();
        
        // Insertar items del pedido
        $stmt = $conn->prepare("INSERT INTO items_pedido (pedido_id, producto_id, cantidad, precio) VALUES (?, ?, ?, ?)");
        
        foreach ($_SESSION['carrito'] as $producto_id => $cantidad) {
            $producto = obtenerProducto($conn, $producto_id);
            if ($producto) {
                $stmt->execute([$pedido_id, $producto_id, $cantidad, $producto['precio']]);
            }
        }
        
        $conn->commit();
        
        // Limpiar carrito y redirigir a confirmación
        $_SESSION['carrito'] = array();
        $_SESSION['ultimo_pedido'] = $numero_pedido;
        
        header('Location: confirmacion.php');
        exit;
        
    } catch (Exception $e) {
        $conn->rollBack();
        $error = "Error al procesar el pedido. Por favor, intente nuevamente.";
    }
}
?>

<div class="container">
    <h1>Métodos de Pago</h1>
    
    <div class="flex">
        <form action="" method="post" class="payment-form">
            <h2>Seleccione un método de pago</h2>
            <label>
                <input type="radio" name="metodo_pago" value="tarjeta" checked>
                Tarjeta de Crédito/Débito
            </label>
            <label>
                <input type="radio" name="metodo_pago" value="paypal">
                PayPal
            </label>
            <label>
                <input type="radio" name="metodo_pago" value="transferencia">
                Transferencia Bancaria
            </label>
            
            <?php if (isset($error)): ?>
                <p class="error"><?php echo $error; ?></p>
            <?php endif; ?>
            
            <button type="submit" class="btn">Confirmar Pago</button>
        </form>
        
        <div class="order-summary">
            <h2>Resumen del Pedido</h2>
            <p>Subtotal: $<?php echo number_format($total, 2); ?></p>
            <p>Envío: $<?php echo number_format($envio, 2); ?></p>
            <p><strong>Total: $<?php echo number_format($total_final, 2); ?></strong></p>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
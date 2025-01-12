<?php 
require_once 'config/bd.php';
require_once 'includes/funciones.php';
include 'includes/header.php';

if (!isset($_SESSION['ultimo_pedido'])) {
    header('Location: productos.php');
    exit;
}

$numero_pedido = $_SESSION['ultimo_pedido'];
unset($_SESSION['ultimo_pedido']); // Limpiar después de usar

$db = new Database();
$conn = $db->conectar();

// Obtener detalles del pedido
$stmt = $conn->prepare("SELECT * FROM pedidos WHERE numero_pedido = ?");
$stmt->execute([$numero_pedido]);
$pedido = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<div class="container">
    <div class="confirmation-message">
        <h1>¡Gracias por tu compra!</h1>
        <p>Tu pedido ha sido confirmado.</p>
        <p>Número de pedido: <strong><?php echo $numero_pedido; ?></strong></p>
        <p>Total pagado: <strong>$<?php echo number_format($pedido['total'], 2); ?></strong></p>
        <p>Recibirás un correo electrónico con los detalles de tu compra.</p>
        <a href="productos.php" class="btn">Volver a la Tienda</a>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
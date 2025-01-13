<?php 
include '../../config/bd.php'; 
include '../includes/header.php'; 

// Consultar pedidos
//$pedidos = $conn->query("SELECT * FROM pedidos")->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Pedidos</title>
    <link rel="stylesheet" href="../css/pedidos.css">
</head>
<body>
<div class="main">
    <h1>Gestión de Pedidos</h1>
    <table>
        <thead>
            <tr>
                <th>ID Pedido</th>
                <th>Cliente</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($pedidos): ?>
                <?php foreach ($pedidos as $pedido): ?>
                    <tr>
                        <td><?php echo $pedido['id']; ?></td>
                        <td><?php echo $pedido['cliente']; ?></td>
                        <td>$<?php echo number_format($pedido['total'], 2); ?></td>
                        <td><?php echo $pedido['estado']; ?></td>
                        <td>
                            <form action="../controllers/pedidos_controller.php" method="POST">
                                <select name="estado">
                                    <option value="Pendiente" <?php echo $pedido['estado'] == 'Pendiente' ? 'selected' : ''; ?>>Pendiente</option>
                                    <option value="Enviado" <?php echo $pedido['estado'] == 'Enviado' ? 'selected' : ''; ?>>Enviado</option>
                                    <option value="Entregado" <?php echo $pedido['estado'] == 'Entregado' ? 'selected' : ''; ?>>Entregado</option>
                                </select>
                                <button type="submit" name="id" value="<?php echo $pedido['id']; ?>">Actualizar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No hay pedidos disponibles.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php include '../includes/footer.php'; ?>

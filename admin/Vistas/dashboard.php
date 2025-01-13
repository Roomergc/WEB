<?php 
include '../../config/bd.php';
include '../includes/header.php';

// Consultas dinámicas
//$ingresos_totales = $conn->query("SELECT SUM(total) AS total FROM pedidos")->fetch_assoc()['total'] ?? 0;
//$nuevos_clientes = $conn->query("SELECT COUNT(*) AS clientes FROM clientes WHERE fecha_registro >= DATE_SUB(NOW(), INTERVAL 1 MONTH)")->fetch_assoc()['clientes'] ?? 0;
//$ventas_totales = $conn->query("SELECT COUNT(*) AS ventas FROM pedidos")->fetch_assoc()['ventas'] ?? 0;
//$productos_activos = $conn->query("SELECT COUNT(*) AS productos FROM productos WHERE estado = 'activo'")->fetch_assoc()['productos'] ?? 0;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
<div class="main">
    <h1>Dashboard</h1>
    <div class="stats">
        <div class="stat-box">
            <h3>Ingresos Totales</h3>
            <p>$<?php echo number_format($ingresos_totales, 2); ?></p>
        </div>
        <div class="stat-box">
            <h3>Nuevos Clientes</h3>
            <p>+<?php echo $nuevos_clientes; ?></p>
        </div>
        <div class="stat-box">
            <h3>Ventas</h3>
            <p>+<?php echo $ventas_totales; ?></p>
        </div>
        <div class="stat-box">
            <h3>Productos Activos</h3>
            <p>+<?php echo $productos_activos; ?></p>
        </div>
    </div>
    <div class="chart">
        <h3>Vista General</h3>
        <canvas id="salesChart"></canvas>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="../scripts/dashboard.js"></script>
<?php include '../includes/footer.php'; ?>

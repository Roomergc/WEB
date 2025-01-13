<?php 
include '../../config/bd.php'; 
include '../includes/header.php'; 

// Consultas para obtener datos dinámicos
$ventas_mensuales = [];
$visitantes_mensuales = [];

// Ventas por mes
//$ventas_result = $conn->query("SELECT MONTH(fecha) AS mes, SUM(total) AS total FROM pedidos GROUP BY MONTH(fecha) ORDER BY MONTH(fecha)");
if ($ventas_result) {
    while ($row = $ventas_result->fetch_assoc()) {
        $ventas_mensuales[intval($row['mes']) - 1] = floatval($row['total']);
    }
}

// Inicializar meses vacíos con 0
for ($i = 0; $i < 12; $i++) {
    if (!isset($ventas_mensuales[$i])) {
        $ventas_mensuales[$i] = 0;
    }
}

// Visitantes por mes
//$visitantes_result = $conn->query("SELECT MONTH(fecha_visita) AS mes, COUNT(*) AS total FROM visitantes GROUP BY MONTH(fecha_visita) ORDER BY MONTH(fecha_visita)");
if ($visitantes_result) {
    while ($row = $visitantes_result->fetch_assoc()) {
        $visitantes_mensuales[intval($row['mes']) - 1] = intval($row['total']);
    }
}

// Inicializar meses vacíos con 0
for ($i = 0; $i < 12; $i++) {
    if (!isset($visitantes_mensuales[$i])) {
        $visitantes_mensuales[$i] = 0;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas</title>
    <link rel="stylesheet" href="../css/estadisticas.css">
</head>
<body>
<div class="main">
    <h1>Estadísticas</h1>
    <div class="chart-container">
        <div class="chart">
            <h3>Ventas Mensuales</h3>
            <canvas id="ventasChart"></canvas>
        </div>
        <div class="chart">
            <h3>Visitantes Mensuales</h3>
            <canvas id="visitantesChart"></canvas>
        </div>
    </div>
</div>

<!-- Pasar datos dinámicos a JavaScript -->
<script>
    const ventasMensuales = <?php echo json_encode(array_values($ventas_mensuales)); ?>;
    const visitantesMensuales = <?php echo json_encode(array_values($visitantes_mensuales)); ?>;
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="../scripts/dashboard.js"></script>

<?php include '../includes/footer.php'; ?>

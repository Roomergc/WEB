<?php 
include '../../config/bd.php'; 
include '../includes/header.php'; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soporte al Cliente</title>
    <link rel="stylesheet" href="../css/soporte.css">
</head>
<body>
<div class="main">
    <h1>Soporte al Cliente</h1>
    <form action="../controllers/soporte_controller.php" method="POST">
        <textarea name="mensaje" placeholder="Escribe tu mensaje aquí" required></textarea>
        <button type="submit">Enviar Mensaje</button>
    </form>
</div>
<?php include '../includes/footer.php'; ?>

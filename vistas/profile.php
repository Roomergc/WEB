<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="styles.css">
  <title>Perfil de Usuario</title>
</head>
<body>
<div class="profile_container">
  <h1>Hola, <?php echo htmlspecialchars($user['name']); ?></h1>
  <h2>Bienvenid@ a CITY Store</h2> </div>
  <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
  <a href="logout.php">Cerrar Sesión</a>
  <a href="index.php"></a>
  <a href="footer.php">2025 City Store. Todos los derechos reservados.</a>
</body>
</html>

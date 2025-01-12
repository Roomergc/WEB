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
  <title>Perfil de Usuario</title>
</head>
<body>
  <h1>Hola, <?php echo htmlspecialchars($user['name']); ?></h1>
  <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
  <a href="logout.php">Cerrar Sesión</a>
</body>
</html>

<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user'] = $user;
        header('Location: profile.php');
    } else {
        $error = "Correo o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <div class="login">
<link rel="stylesheet" href="styles.css">
  <title>Iniciar Sesión</title>
</head>
<body>
  <form method="POST">
  <div class="login_img">
  <img src="logo_citystore.jpg" alt="Logo City Store" class="logo">
    <h2>Iniciar Sesión</h2></div>
    <?php if (!empty($error)) echo "<p>$error</p>"; ?>
    <input type="email" name="email" placeholder="Correo" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <button type="submit">Entrar</button>
  </form>
  <a href="reset_password.php">Olvidé mi contraseña</a>
</body>
</div>
</html>

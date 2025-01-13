<?php
// Inicia sesión si es necesario
session_start();
require 'db.php'; // Archivo con la configuración de la base de datos

// Verifica si se ha enviado un formulario de solicitud de restablecimiento
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email'])) {
        // Paso 1: Validar correo y generar token
        $email = trim($_POST['email']);
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Generar un token único
            $token = bin2hex(random_bytes(50));
            $expires = date("Y-m-d H:i:s", strtotime('+1 hour')); // Token válido por 1 hora

            // Guardar el token en la base de datos
            $stmt = $pdo->prepare("UPDATE users SET reset_token = :token, token_expiration = :expires WHERE email = :email");
            $stmt->execute([
                'token' => $token,
                'expires' => $expires,
                'email' => $email
            ]);

            // Enviar el correo con el enlace de restablecimiento
            $resetLink = "http://localhost/reset_password.php?token=$token";
            mail($email, "Restablecer contraseña", "Haz clic en el enlace para restablecer tu contraseña: $resetLink");

            echo "Se ha enviado un enlace de restablecimiento a tu correo.";
        } else {
            echo "El correo no está registrado.";
        }
    } elseif (isset($_POST['new_password']) && isset($_POST['token'])) {
        // Paso 2: Procesar la nueva contraseña
        $token = $_POST['token'];
        $newPassword = password_hash($_POST['new_password'], PASSWORD_BCRYPT);

        // Verificar si el token es válido y no ha expirado
        $stmt = $pdo->prepare("SELECT * FROM users WHERE reset_token = :token AND token_expiration > NOW()");
        $stmt->execute(['token' => $token]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Actualizar la contraseña
            $stmt = $pdo->prepare("UPDATE users SET password = :password, reset_token = NULL, token_expiration = NULL WHERE reset_token = :token");
            $stmt->execute([
                'password' => $newPassword,
                'token' => $token
            ]);

            echo "Tu contraseña ha sido restablecida.";
        } else {
            echo "El token es inválido o ha expirado.";
        }
    }
}
?>

<!-- HTML para el formulario -->
<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <title>Restablecer contraseña</title>
</head>
<body>
    <img src="Logo.jpg" alt="Logo City Store" class="logo">
    <?php if (!isset($_GET['token'])): ?>
        <!-- Formulario para enviar el correo -->
        <h2>Restablecer contraseña</h2>
        <form method="POST" action="reset_password.php">
            <input type="email" name="email" placeholder="Ingresa tu correo electrónico" required>
            <button type="submit">Enviar enlace</button>
        </form>
    <?php else: ?>
        <!-- Formulario para ingresar nueva contraseña -->
        <h2>Ingresa tu nueva contraseña</h2>
        <form method="POST" action="reset_password.php">
            <input type="hidden" name="token" value="<?= htmlspecialchars($_GET['token']) ?>">
            <input type="password" name="new_password" placeholder="Nueva contraseña" required>
            <button type="submit">Restablecer contraseña</button>
        </form>
    <?php endif; ?>
<a href="footer.php">2025 City Store. Todos los derechos reservados.</a>
</body>
</html>

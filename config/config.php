<?php
session_start();

define('BASE_URL', 'http://localhost/citystore');
define('SITE_NAME', 'City Store');
define('ADMIN_EMAIL', 'admin@citystore.com');

// Configuración de correo
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_USER', 'tu_correo@gmail.com');
define('SMTP_PASS', 'tu_contraseña');
define('SMTP_PORT', 587);

// Rutas del sistema
define('VIEWS_PATH', __DIR__ . '/../views/');
define('INCLUDES_PATH', __DIR__ . '/../includes/');
define('UPLOADS_PATH', __DIR__ . '/../uploads/');
?>

<?php require_once 'config/config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITE_NAME; ?></title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/styles.css">
</head>
<body>
    <header>
        <nav>
            <div class="container">
                <a href="<?php echo BASE_URL; ?>" class="logo">City Store</a>
                <div class="search-bar">
                    <input type="text" placeholder="Buscar productos...">
                </div>
                <div class="nav-links">
                    <?php if(isLoggedIn()): ?>
                        <a href="<?php echo BASE_URL; ?>/profile">Mi Cuenta</a>
                        <a href="<?php echo BASE_URL; ?>/cart">Carrito</a>
                        <a href="<?php echo BASE_URL; ?>/logout">Salir</a>
                    <?php else: ?>
                        <a href="<?php echo BASE_URL; ?>/login">Iniciar Sesión</a>
                        <a href="<?php echo BASE_URL; ?>/register">Registrarse</a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </header>
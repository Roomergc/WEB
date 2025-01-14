<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City Store</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <header class="main-header">
        <div class="container">
            <div class="header-content">
                <a href="/" class="logo">
                    <img src="/img/Logo.jpg" alt="City Store Logo" class="logo-image">
                </a>
                <div class="search-bar">
                    <form action="/productos.php" method="GET">
                        <input type="search" name="buscar" placeholder="Buscar productos...">
                        <button type="submit">Buscar</button>
                    </form>
                </div>
                <nav class="main-nav">
                    <ul>
                        <li><a href="/productos.php">Categorías</a></li>
                        <li><a href="/productos.php?oferta=1">Ofertas</a></li>
                        <li><a href="/carrito.php" class="cart-link">
                            Carrito
                            <?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0): ?>
                                <span class="cart-count"><?php echo count($_SESSION['carrito']); ?></span>
                            <?php endif; ?>
                        </a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
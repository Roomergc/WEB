<?php
// Iniciar sesión para almacenar el carrito
session_start();
include './WEB/includes/header.php';
include './WEB/includes/footer.php';
// Productos disponibles en la tienda
$all_products = [
    ['id' => 1, 'name' => 'Producto 1', 'price' => 29.99, 'image' => 'cuaderno.jpg'],
    ['id' => 2, 'name' => 'Producto 2', 'price' => 49.99, 'image' => 'termo.jpg'],
    ['id' => 3, 'name' => 'Producto 3', 'price' => 19.99, 'image' => 'vans.jpg']
];

// Inicializar el carrito si no existe
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Agregar un producto al carrito
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    $product_id = $_POST['add_to_cart'];
    // Buscar el producto
    foreach ($all_products as $product) {
        if ($product['id'] == $product_id) {
            $_SESSION['cart'][] = $product; // Agregar el producto al carrito
        }
    }
}

// Eliminar un producto del carrito
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['remove_id'])) {
    $remove_id = $_POST['remove_id'];
    // Eliminar el producto del carrito
    foreach ($_SESSION['cart'] as $key => $cart_item) {
        if ($cart_item['id'] == $remove_id) {
            unset($_SESSION['cart'][$key]);
        }
    }
    $_SESSION['cart'] = array_values($_SESSION['cart']); // Reindexar el array
}

// Eliminar todos los productos del carrito
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['clear_all'])) {
    $_SESSION['cart'] = []; // Vaciar el carrito
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="./Styles.css/StilesUG.css">
    <style>
        /* Estilos básicos */
        .top-bar {
            position: absolute;
            top: 0;
            right: 20px;
            display: flex;
            gap: 10px;
            margin: 10px;
        }

        .top-bar .btn {
            background-color: #278a3a; /* Verde */
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            font-size: 14px;
            cursor: pointer;
        }

        .top-bar .btn:hover {
            background-color: #1e5631; /* Verde más oscuro */
        }
    </style>
</head>
<body>
<div class="layout">

    <!-- Botones de sesión -->
    <div class="top-bar">
        <a href="login.html" class="btn">Iniciar Sesión</a>
        <a href="register.html" class="btn">Registrarse</a>
    </div>

    <!-- Barra lateral -->
    <aside class="sidebar">
        <div class="logo">
            <img src="logo.jpg" alt="Logo de la tienda">
            <h2>Tienda Online</h2>
        </div>
        <nav>
            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="#">Categorías</a></li>
                <li><a href="#">Ofertas</a></li>
                <li><a href="#">Mis Productos</a></li>
                <li><a href="favoritos.php" class="active">Carrito</a></li>
                <li><a href="contacto.html">Contacto</a></li>
                <li><a href="politica-privacidad.html">Política de Privacidad</a></li>
            </ul>
        </nav>
    </aside>

    <!-- Contenido principal -->
    <div class="main-content">
        <header class="header">
            <h1>Carrito de Compras</h1>
        </header>

        <section class="favorites">
            <div class="favorites-list">
                <!-- Mostrar los productos del carrito -->
                <?php if (count($_SESSION['cart']) > 0): ?>
                    <?php foreach ($_SESSION['cart'] as $favorite): ?>
                        <div class="favorite-item">
                            <img src="<?= $favorite['image'] ?>" alt="<?= $favorite['name'] ?>" class="item-image">
                            <div class="item-details">
                                <h3><?= $favorite['name'] ?></h3>
                                <p>Precio: $<?= number_format($favorite['price'], 2) ?></p>
                                <form method="POST" action="favoritos.php">
                                    <input type="hidden" name="remove_id" value="<?= $favorite['id'] ?>">
                                    <button type="submit" class="btn btn-remove">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No tienes productos en tu carrito.</p>
                <?php endif; ?>
            </div>

            <div class="favorites-actions">
                <!-- Botón para comprar todo -->
                <button class="btn btn-buy-all">Comprar todo</button>
                
                <!-- Botón para eliminar todos -->
                <form method="POST" action="favoritos.php">
                    <button type="submit" name="clear_all" class="btn btn-clear">Eliminar todos</button>
                </form>
            </div>
        </section>

        <section class="product-list">
            <h2>Productos disponibles</h2>
            <div class="product-grid">
                <?php foreach ($all_products as $product): ?>
                    <div class="product-item">
                        <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>" class="item-image">
                        <div class="item-details">
                            <h3><?= $product['name'] ?></h3>
                            <p>Precio: $<?= number_format($product['price'], 2) ?></p>
                            <form method="POST" action="favoritos.php">
                                <input type="hidden" name="add_to_cart" value="<?= $product['id'] ?>">
                                <button type="submit" class="btn btn-add">Agregar al carrito</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </div>
</div>

<!-- JavaScript -->
<script>
    // Aquí puedes agregar más lógica de JS si es necesario
</script>
</body>
</html>

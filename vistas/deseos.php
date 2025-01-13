<?php
// Iniciar sesión para almacenar las listas
session_start();

	include './WEB/includes/header.php';
include './WEB/includes/footer.php';

$all_products = [
    ['id' => 1, 'name' => 'Producto 1', 'price' => 29.99, 'image' => 'producto1.jpg'],
    ['id' => 2, 'name' => 'Producto 2', 'price' => 49.99, 'image' => 'producto2.jpg'],
    ['id' => 3, 'name' => 'Producto 3', 'price' => 19.99, 'image' => 'producto3.jpg']
];

// Inicializar la lista de deseos si no existe
if (!isset($_SESSION['wishlist'])) {
    $_SESSION['wishlist'] = [];
}

// Inicializar los favoritos si no existen
if (!isset($_SESSION['favorites'])) {
    $_SESSION['favorites'] = [];
}

// Agregar un producto a la lista de deseos
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_wishlist'])) {
    $product_id = $_POST['add_to_wishlist'];
    // Buscar el producto y agregarlo a la lista de deseos
    foreach ($all_products as $product) {
        if ($product['id'] == $product_id) {
            $_SESSION['wishlist'][] = $product; // Agregar a la lista de deseos
            break; // Detener la búsqueda
        }
    }
}

// Eliminar un producto de la lista de deseos
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['remove_wishlist_id'])) {
    $remove_id = $_POST['remove_wishlist_id'];
    // Eliminar el producto de la lista de deseos
    foreach ($_SESSION['wishlist'] as $key => $wishlist_item) {
        if ($wishlist_item['id'] == $remove_id) {
            unset($_SESSION['wishlist'][$key]);
        }
    }
    $_SESSION['wishlist'] = array_values($_SESSION['wishlist']); // Reindexar el array
}

// Agregar un producto a los favoritos
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_favorites'])) {
    $product_id = $_POST['add_to_favorites'];
    // Buscar el producto y agregarlo a los favoritos
    foreach ($all_products as $product) {
        if ($product['id'] == $product_id) {
            $_SESSION['favorites'][] = $product; // Agregar a los favoritos
            break; // Detener la búsqueda
        }
    }
}

// Eliminar un producto de los favoritos
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['remove_favorite_id'])) {
    $remove_id = $_POST['remove_favorite_id'];
    // Eliminar el producto de los favoritos
    foreach ($_SESSION['favorites'] as $key => $favorite_item) {
        if ($favorite_item['id'] == $remove_id) {
            unset($_SESSION['favorites'][$key]);
        }
    }
    $_SESSION['favorites'] = array_values($_SESSION['favorites']); // Reindexar el array
}

?>

<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Deseos y Favoritos</title>
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
                <li><a href="wishlist.php" class="active">Lista de Deseos</a></li>
                <li><a href="favorites.php">Favoritos</a></li>
                <li><a href="contacto.html">Contacto</a></li>
                <li><a href="politica-privacidad.html">Política de Privacidad</a></li>
            </ul>
        </nav>
    </aside>

    <!-- Contenido principal -->
    <div class="main-content">
        <header class="header">
            <h1>Lista de Deseos</h1>
        </header>

        <section class="wishlist">
            <div class="wishlist-list">
                <!-- Mostrar los productos de la lista de deseos -->
                <?php if (count($_SESSION['wishlist']) > 0): ?>
                    <?php foreach ($_SESSION['wishlist'] as $wishlist_item): ?>
                        <div class="wishlist-item">
                            <img src="<?= $wishlist_item['image'] ?>" alt="<?= $wishlist_item['name'] ?>" class="item-image">
                            <div class="item-details">
                                <h3><?= $wishlist_item['name'] ?></h3>
                                <p>Precio: $<?= number_format($wishlist_item['price'], 2) ?></p>
                                <form method="POST" action="wishlist.php">
                                    <input type="hidden" name="remove_wishlist_id" value="<?= $wishlist_item['id'] ?>">
                                    <button type="submit" class="btn btn-remove">Eliminar de la lista de deseos</button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No tienes productos en tu lista de deseos.</p>
                <?php endif; ?>
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
                            <!-- Botón para agregar a la lista de deseos -->
                            <form method="POST" action="wishlist.php">
                                <input type="hidden" name="add_to_wishlist" value="<?= $product['id'] ?>">
                                <button type="submit" class="btn btn-add">Agregar a la lista de deseos</button>
                            </form>
                            <!-- Botón para agregar a favoritos -->
                            <form method="POST" action="favorites.php">
                                <input type="hidden" name="add_to_favorites" value="<?= $product['id'] ?>">
                                <button type="submit" class="btn btn-add">Agregar a Favoritos</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </div>
</div>

</body>
</html>

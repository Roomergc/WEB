<?php
include './WEB/includes/header.php';
include './WEB/includes/footer.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Misión, Visión y Objetivos - City Store</title>
    <link rel="stylesheet" href="./Styles.css/StilesUG.css">
    <style>
        /* Logo */
        .logo {
            width: 100px;  /* Tamaño reducido del logo */
            height: auto;  /* Mantener la proporción */
        }
    </style>
</head>
<body>

<!-- Contenedor Layout -->
<div class="layout">

    <!-- Barra de navegación lateral -->
    <nav class="sidebar">
        <ul>
            <li><a href="index.html">Inicio</a></li>
            <li><a href="#">Categorías</a></li>
            <li><a href="#">Ofertas</a></li>
            <li><a href="#">Mis Productos</a></li>
            <li><a href="contacto.html">Contacto</a></li>
            <li><a href="politica-privacidad.html">Política de Privacidad</a></li>
            <li><a href="mision-vision-objetivos.php" class="active">Misión, Visión y Objetivos</a></li>
        </ul>
    </nav>

    <!-- Contenido Principal -->
    <main class="main-content">

        <!-- Encabezado -->
        <header class="header">
            <img src="logo.jpg" alt="Logo de la tienda" class="logo">
            <div class="header-buttons">
                <button class="btn">Iniciar Sesión</button>
                <button class="btn">Registrarse</button>
            </div>
        </header>

        <!-- Título principal -->
        <h1 class="main-title">Misión, Visión y Objetivos de Nuestra Tienda Departamental</h1>

        <!-- Sección de Misión, Visión y Objetivos -->
        <section class="section-container">
            <!-- Misión -->
            <div class="section-box">
                <h2>Misión</h2>
                <p>
                    Nuestra misión es ofrecer productos de alta calidad a precios competitivos, con un enfoque en la satisfacción del cliente. Buscamos ser una tienda accesible y confiable para las familias, brindando un servicio excepcional tanto en línea como en nuestras tiendas físicas.
                </p>
            </div>

            <!-- Visión -->
            <div class="section-box">
                <h2>Visión</h2>
                <p>
                    Ser la tienda departamental líder en el mercado, reconocida por su compromiso con la innovación, la calidad de sus productos y su excelente atención al cliente. Nos visualizamos como una empresa que constantemente se adapta a las necesidades de nuestros consumidores y se expande con éxito a nivel nacional e internacional.
                </p>
            </div>

            <!-- Objetivos -->
            <div class="section-box">
                <h2>Objetivos</h2>
                <ul>
                    <li>Expandir nuestra presencia en el mercado nacional mediante la apertura de nuevas tiendas físicas y la optimización de nuestra tienda en línea.</li>
                    <li>Ofrecer un catálogo de productos cada vez más amplio, diversificando nuestras categorías para satisfacer las necesidades de todos los consumidores.</li>
                    <li>Mantener un alto nivel de satisfacción del cliente, garantizando un servicio postventa efectivo y constante.</li>
                    <li>Fortalecer nuestras alianzas con proveedores para obtener productos de calidad a mejores precios.</li>
                    <li>Fomentar la responsabilidad social empresarial y contribuir al bienestar de nuestras comunidades a través de iniciativas y programas de apoyo.</li>
                </ul>
            </div>
        </section>

    </main>
</div>

</body>
</html>

<?php
include './WEB/includes/header.php';
include './WEB/includes/footer.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Política de Privacidad y Términos</title>
    <link rel="stylesheet" href="./Styles.css/StilesUG.css">
    <style>
        /* Estilos adicionales */
        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            background-color: #f4f4f4;
        }

        header img {
            width: 150px; /* Ajustar el tamaño del logo */
            height: auto;
        }

        .header-buttons .btn {
            background-color: #278a3a;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 14px;
        }

        .header-buttons .btn:hover {
            background-color: #1e5631;
        }

        nav {
            background-color: #333;
            padding: 10px;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 20px;
        }

        nav ul li {
            display: inline;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }

        nav ul li a.active {
            font-weight: bold;
        }

        main {
            padding: 20px;
        }

        .legal {
            max-width: 1200px;
            margin: 0 auto;
        }

        .legal h2 {
            font-size: 24px;
            color: #278a3a;
            margin-bottom: 10px;
        }

        .legal h3 {
            font-size: 20px;
            color: #1e5631;
            margin-bottom: 10px;
        }

        .legal p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .legal ul {
            margin-left: 20px;
        }
    </style>
</head>
<body>

<header>
    <img src="logo.jpg" alt="Logo de la tienda">
    <div class="header-buttons">
        <button class="btn">Iniciar Sesión</button>
        <button class="btn">Carrito</button>
    </div>
</header>

<nav>
    <ul>
        <li><a href="index.html">Inicio</a></li>
        <li><a href="#">Categorías</a></li>
        <li><a href="#">Ofertas</a></li>
        <li><a href="#">Mis Productos</a></li>
        <li><a href="contacto.html">Contacto</a></li>
        <li><a href="politica-privacidad.php" class="active">Política de Privacidad</a></li>
    </ul>
</nav>

<main>
    <div class="legal">
        <h1>Política de Privacidad y Términos</h1>

        <section>
            <h2>Política de Privacidad</h2>
            <p>
                En City Store, valoramos tu privacidad. Toda la información personal que recolectamos se utiliza exclusivamente para mejorar nuestros servicios y ofrecer una experiencia personalizada. No compartiremos tus datos con terceros sin tu consentimiento explícito, salvo cuando sea requerido por la ley.
            </p>
            <h3>Recolección de Información</h3>
            <p>
                Recopilamos información personal como nombre, dirección de correo electrónico y número de teléfono solo cuando nos la proporcionas voluntariamente a través de formularios de registro, compras u otros medios.
            </p>
            <h3>Uso de la Información</h3>
            <p>
                La información que recopilamos se utiliza para:
                <ul>
                    <li>Procesar tus pedidos y transacciones.</li>
                    <li>Proveer soporte al cliente.</li>
                    <li>Enviar comunicaciones sobre promociones y actualizaciones.</li>
                </ul>
            </p>
        </section>

        <section>
            <h2>Términos y Condiciones</h2>
            <h3>Introducción</h3>
            <p>
                Al utilizar este sitio web, aceptas los siguientes términos y condiciones. Si no estás de acuerdo con alguno de estos términos, te pedimos que no utilices este sitio.
            </p>
            <h3>Uso del Sitio</h3>
            <p>
                Este sitio está destinado únicamente para uso personal y no comercial. No se permite copiar, distribuir, modificar o publicar ningún contenido sin el consentimiento explícito de City Store.
            </p>
            <h3>Limitación de Responsabilidad</h3>
            <p>
                City Store no se hace responsable por daños directos, indirectos, incidentales o consecuentes que resulten del uso de este sitio.
            </p>
            <p>
                Para más información, puedes ponerte en contacto con nosotros a través de nuestra página de <a href="contacto.php">Contacto</a>.
            </p>
        </section>
    </div>
</main>

</body>
</html>

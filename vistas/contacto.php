<?php
// Incluir el archivo del header
include './WEB/includes/header.php';

// Si el formulario es enviado, procesar la información
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recoger los datos del formulario
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Validar que los campos no estén vacíos
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Aquí puedes hacer algo con los datos, como enviar un correo electrónico o guardarlos en una base de datos
        $to = 'info@tiendaonline.com';  // Dirección de correo donde recibirás los mensajes
        $subject = 'Nuevo mensaje de contacto';
        $body = "Nombre: $name\nCorreo: $email\n\nMensaje:\n$message";
        $headers = 'From: ' . $email;

        if (mail($to, $subject, $body, $headers)) {
            $success_message = "¡Gracias por tu mensaje! Nos pondremos en contacto contigo pronto.";
        } else {
            $error_message = "Hubo un problema al enviar tu mensaje. Por favor, intenta nuevamente más tarde.";
        }
    } else {
        $error_message = "Por favor, completa todos los campos del formulario.";
    }
}
include './WEB/includes/footer.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Tienda en Línea</title>
    <link rel="stylesheet" href="./Styles.css/StilesUG.css">
</head>
<body>
<div class="layout">

    <!-- Barra lateral -->
    <aside class="sidebar">
        <div class="logo">
            <img src="logo.jpg" alt="Logo de la tienda">
            <h2>City Store</h2>
        </div>
        <nav>
            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="#">Categorías</a></li>
                <li><a href="#">Ofertas</a></li>
                <li><a href="#">Mis Productos</a></li>
                <li><a href="contacto.php" class="active">Contacto</a></li>
                <li><a href="politica-privacidad.html">Política de Privacidad</a></li>
            </ul>
        </nav>
    </aside>

    <!-- Contenido principal -->
    <div class="main-content">
        <header class="header">
            <h1>Contacto</h1>
        </header>

        <section class="contact-info">
            <div class="cards">
                <!-- Soporte al cliente -->
                <div class="card">
                    <h3>Soporte al Cliente</h3>
                    <p>¿Tienes alguna pregunta o necesitas ayuda con tu pedido? Estamos aquí para ayudarte.</p>
                    <button class="btn">Contactar Soporte</button>
                </div>

                <!-- Envíos y Devoluciones -->
                <div class="card">
                    <h3>Envíos y Devoluciones</h3>
                    <p>Obtén información sobre tus pedidos, devoluciones o problemas de envío.</p>
                    <button class="btn">Información de Envíos</button>
                </div>

                <!-- Información General -->
                <div class="card">
                    <h3>Información General</h3>
                    <p>Consulta nuestras políticas, términos o cualquier duda sobre nuestra tienda.</p>
                    <button class="btn">Más Información</button>
                </div>
            </div>
        </section>

        <section class="contact-form">
            <h2>Envíanos un Mensaje</h2>
            
            <!-- Mostrar mensajes de éxito o error -->
            <?php if (isset($success_message)): ?>
                <p class="success"><?= $success_message ?></p>
            <?php elseif (isset($error_message)): ?>
                <p class="error"><?= $error_message ?></p>
            <?php endif; ?>

            <!-- Formulario de contacto -->
            <form action="contacto.php" method="POST">
                <div>
                    <label for="name">Nombre</label><br>
                    <input type="text" id="name" name="name" required>
                </div>
                <div>
                    <label for="email">Correo Electrónico</label><br>
                    <input type="email" id="email" name="email" required>
                </div>
                <div>
                    <label for="message">Mensaje</label><br>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>
                <div>
                    <button type="submit" class="btn">Enviar Mensaje</button>
                </div>
            </form>
        </section>
    </div>
</div>
</body>
</html>

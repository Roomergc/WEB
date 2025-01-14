<?php
// Configuración de la base de datos
$host = '127.0.0.1'; // Cambia si usas un servidor remoto
$port = '5432'; // Puerto por defecto de PostgreSQL
$dbname = 'city_store'; // Cambia al nombre exacto de tu base de datos
$username = 'postgres'; // Usuario de PostgreSQL
$password = 'tu_contraseña'; // Contraseña del usuario

try {
    // Conexión usando PDO para PostgreSQL
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa a PostgreSQL";
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}
?>

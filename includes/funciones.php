<?php
function cleanInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function isAdmin() {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';
}

function redirect($url) {
    header("Location: " . BASE_URL . $url);
    exit();
}

function generateToken() {
    return bin2hex(random_bytes(32));
}

function sendEmail($to, $subject, $message) {
    // Implementar envío de correo usando PHPMailer
    return true;
}
?>
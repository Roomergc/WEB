// includes/funciones.php
<?php
session_start();

function obtenerProductos($db, $categoria = null, $precio_max = null) {
    try {
        $sql = "SELECT * FROM productos WHERE 1=1";
        $params = array();

        if ($categoria) {
            $sql .= " AND categoria_id = ?";
            $params[] = $categoria;
        }

        if ($precio_max) {
            $sql .= " AND precio <= ?";
            $params[] = $precio_max;
        }

        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        return array();
    }
}

function obtenerProducto($db, $id) {
    try {
        $stmt = $db->prepare("SELECT * FROM productos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        return null;
    }
}

function obtenerCarrito() {
    return isset($_SESSION['carrito']) ? $_SESSION['carrito'] : array();
}

function agregarAlCarrito($producto_id, $cantidad) {
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();
    }
    
    if (isset($_SESSION['carrito'][$producto_id])) {
        $_SESSION['carrito'][$producto_id] += $cantidad;
    } else {
        $_SESSION['carrito'][$producto_id] = $cantidad;
    }
}

function calcularTotalCarrito($db) {
    $total = 0;
    $carrito = obtenerCarrito();
    
    foreach ($carrito as $producto_id => $cantidad) {
        $producto = obtenerProducto($db, $producto_id);
        if ($producto) {
            $total += $producto['precio'] * $cantidad;
        }
    }
    
    return $total;
}

function generarNumeroPedido() {
    return 'PED-' . date('Ymd') . '-' . substr(uniqid(), -5);
}
?>
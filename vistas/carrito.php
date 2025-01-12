<?php include 'header.php'; ?>

<div class="container">
    <h1>Carrito de Compras</h1>
    
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Aquí iría la lógica para obtener los items del carrito
            $items_carrito = [
                ['id' => 1, 'nombre' => 'Producto 1', 'precio' => 19.99, 'cantidad' => 2],
                ['id' => 2, 'nombre' => 'Producto 2', 'precio' => 29.99, 'cantidad' => 1],
                // Más items...
            ];
            
            $total = 0;
            foreach ($items_carrito as $item): 
                $subtotal = $item['precio'] * $item['cantidad'];
                $total += $subtotal;
            ?>
                <tr>
                    <td><?php echo $item['nombre']; ?></td>
                    <td>$<?php echo number_format($item['precio'], 2); ?></td>
                    <td>
                        <input type="number" value="<?php echo $item['cantidad']; ?>" min="1">
                    </td>
                    <td>$<?php echo number_format($subtotal, 2); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <div class="cart-total">
        <p>Total: $<?php echo number_format($total, 2); ?></p>
        <a href="pago.php" class="btn">Proceder al Pago</a>
    </div>
</div>

<?php include 'footer.php'; ?>
<?php include 'header.php'; ?>

<div class="container">
    <h1>Métodos de Pago</h1>
    
    <div class="flex">
        <form action="confirmacion.php" method="post" class="payment-form">
            <h2>Seleccione un método de pago</h2>
            <label>
                <input type="radio" name="metodo_pago" value="tarjeta" checked>
                Tarjeta de Crédito/Débito
            </label>
            <label>
                <input type="radio" name="metodo_pago" value="paypal">
                PayPal
            </label>
            <label>
                <input type="radio" name="metodo_pago" value="transferencia">
                Transferencia Bancaria
            </label>
            
            <button type="submit" class="btn">Confirmar Pago</button>
        </form>
        
        <div class="order-summary">
            <h2>Resumen del Pedido</h2>
            <p>Subtotal: $99.99</p>
            <p>Envío: $5.00</p>
            <p><strong>Total: $104.99</strong></p>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
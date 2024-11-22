<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&family=Road+Rage&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Delius+Unicase:wght@400;700&display=swap" rel="stylesheet">
    <title>Luz Pitty</title>
    <link rel="icon" href="../Images/marcador.ico">
    <link rel="stylesheet" href="EstiloCarrito.css">
</head>
<body>
    
<?php
session_start();
require '../Model/carrito.php';

$carrito = new Carrito();
$productos = $carrito->obtenerProductos();
$total = $carrito->obtenerTotal();

if (!empty($productos)): ?>
    <h2>Tu carrito de compras</h2>
    <table>
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Acción</th>
            </tr>
        </thead>
    <tbody>
    <?php foreach ($productos as $producto): ?>
    <tr>
        <td><img src="<?php echo './' . $producto['image']; ?>" alt="<?php echo $producto['name']; ?>" width="50"></td>
        <td><?php echo $producto['name']; ?></td>
        <td><?php echo number_format($producto['price'], 2); ?> $</td>
        <td>
            <form action="../Controller/controllerCarrito.php?action=update" method="POST">
                <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                <input type="number" name="quantity" value="<?php echo $producto['quantity']; ?>" min="1" style="width: 50px;">
                <button type="submit">Actualizar</button>
            </form>
        </td>
        <td><?php echo number_format($producto['price'] * $producto['quantity'], 2); ?> $</td>
        <td><a href="../Controller/controllerCarrito.php?action=remove&id=<?php echo $producto['id']; ?>">Eliminar</a></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
        <p><strong>Total: </strong><?php echo number_format($total, 2); ?> $</p>
        <a href="../index.php">Finalizar compra</a>
    <?php else: ?>
        <p>Tu carrito está vacío.</p>
        <a href="../index.php">Ir al inicio</a>
    <?php endif; ?>
</body>
</html>

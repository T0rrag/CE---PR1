<?php
require_once "config.php";
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: adminLogin.php");
    exit;
}

if (!isset($_GET['id'])) {
    die("ID de pedido no especificado.");
}

$pedido_id = intval($_GET['id']);

$sqlPedido = "SELECT pedido.id, pedido.fecha, pedido.total, 
                     cliente.nombre, cliente.email, cliente.direccion, cliente.telefono
              FROM pedido
              INNER JOIN cliente ON pedido.cliente_id = cliente.id
              WHERE pedido.id = $pedido_id";

$pedido = $conn->query($sqlPedido)->fetch_assoc();

$sqlLineas = "SELECT producto.nombre, linea_pedido.cantidad, linea_pedido.precio
              FROM linea_pedido
              INNER JOIN producto ON linea_pedido.producto_id = producto.id
              WHERE linea_pedido.pedido_id = $pedido_id";

$lineas = $conn->query($sqlLineas);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles del Pedido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5">

    <h2 class="mb-4">Detalles del pedido #<?= $pedido['id'] ?></h2>

    <a href="adminPanel.php" class="btn btn-secondary mb-3">Volver</a>

    <div class="card mb-4">
        <div class="card-header bg-dark text-white">Datos del cliente</div>
        <div class="card-body">
            <p><strong>Nombre: </strong><?= $pedido['nombre'] ?></p>
            <p><strong>Email: </strong><?= $pedido['email'] ?></p>
            <p><strong>Dirección: </strong><?= $pedido['direccion'] ?></p>
            <p><strong>Teléfono: </strong><?= $pedido['telefono'] ?></p>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-primary text-white">Productos del pedido</div>

        <table class="table table-bordered m-0">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio unidad</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($l = $lineas->fetch_assoc()): ?>
                <tr>
                    <td><?= $l['nombre'] ?></td>
                    <td><?= $l['cantidad'] ?></td>
                    <td><?= number_format($l['precio'], 2) ?> €</td>
                    <td><?= number_format($l['precio'] * $l['cantidad'], 2) ?> €</td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-4 text-end">
        <h3>Total pagado: <?= number_format($pedido['total'], 2) ?> €</h3>
    </div>

</div>

<a href="adminLogout.php" class="btn btn-danger btn-lg position-fixed" 
   style="bottom: 20px; right: 20px;">
    <i class="fa-solid fa-sign-out-alt"></i> Cerrar sesión
</a>


</body>
</html>

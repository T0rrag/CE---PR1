<?php
require_once "config.php";
session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: adminLogin.php");
    exit;
}

$sql = "SELECT pedido.id, pedido.fecha, cliente.nombre AS cliente, pedido.total
        FROM pedido
        INNER JOIN cliente ON pedido.cliente_id = cliente.id
        ORDER BY pedido.id DESC";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Admin - Pedidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .logout-btn {
            position: fixed;
            bottom: 25px;
            right: 25px;
            z-index: 999;
        }
    </style>
</head>

<body>

<div class="container mt-5">

    <h2 class="mb-4">📦 Gestión de pedidos</h2>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID Pedido</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Total (€)</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
        <?php while ($fila = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $fila['id'] ?></td>
                <td><?= $fila['fecha'] ?></td>
                <td><?= $fila['cliente'] ?></td>
                <td><?= number_format($fila['total'], 2) ?></td>
                <td>
                    <a href="adminDetalles.php?id=<?= $fila['id'] ?>" class="btn btn-primary btn-sm">
                        Ver detalles
                    </a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

</div>

<!-- BOTÓN FLOTANTE DE LOG OUT -->
<a href="adminLogout.php" class="btn btn-danger btn-lg position-fixed" 
   style="bottom: 20px; right: 20px;">
    <i class="fa-solid fa-sign-out-alt"></i> Cerrar sesión
</a>


</body>
</html>

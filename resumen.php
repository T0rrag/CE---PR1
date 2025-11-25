<?php
include "header.php";

if (empty($_SESSION['carrito'])) {
    echo "El carrito está vacío";
    include "footer.php";
    exit;
}

$nombre    = $_POST['nombre'];
$email     = $_POST['email'];
$direccion = $_POST['direccion'];
$telefono  = $_POST['telefono'];

$conn->query("INSERT INTO cliente (nombre,email,direccion,telefono)
VALUES ('$nombre','$email','$direccion','$telefono')");
$cliente_id = $conn->insert_id;

$total = 0;
foreach ($_SESSION['carrito'] as $id => $cant) {
    $precio = $conn->query("SELECT precio FROM producto WHERE id=$id")->fetch_assoc()['precio'];
    $total += $precio * $cant;
}

$conn->query("INSERT INTO pedido (cliente_id, total) VALUES ($cliente_id, $total)");
$pedido_id = $conn->insert_id;

foreach ($_SESSION['carrito'] as $id => $cant) {
    $precio = $conn->query("SELECT precio FROM producto WHERE id=$id")->fetch_assoc()['precio'];
    $conn->query("INSERT INTO linea_pedido (cantidad, pedido_id, producto_id, precio)
    VALUES ($cant, $pedido_id, $id, $precio)");
}

echo "<h2>Compra realizada</h2>";
echo "<p>Pedido nº $pedido_id</p>";
echo "<p>Total: $total €</p>";

$_SESSION['carrito'] = [];

include "footer.php";


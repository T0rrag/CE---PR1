<?php include "header.php"; ?>

<?php
if (isset($_GET['add'])) {
    $id = intval($_GET['add']);
    $_SESSION['carrito'][$id] = ($_SESSION['carrito'][$id] ?? 0) + 1;
}

echo "<h2>Carrito</h2>";

if (empty($_SESSION['carrito'])) {
    echo "<p>El carrito está vacío.</p>";
} else {
    foreach ($_SESSION['carrito'] as $id => $cant) {
        $q = $conn->query("SELECT nombre, precio FROM producto WHERE id=$id");
        $p = $q->fetch_assoc();

        echo "<div class='item'>";
        echo $p['nombre'] . " — " . $cant . " ud — " . ($p['precio'] * $cant) . " €";
        echo " <a href='editarcarrito.php?del=$id'>Eliminar</a>";
        echo "</div>";
    }

    echo "<a href='confirmarcompra.php' class='boton'>Realizar compra</a>";
}

include "footer.php";
?>


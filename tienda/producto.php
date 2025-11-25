<?php include "header.php"; ?>

<?php
$cat = intval($_GET['cat']);
$sql = "SELECT * FROM producto WHERE categoriaID=$cat";
$res = $conn->query($sql);

echo "<h2>Productos</h2>";

while ($p = $res->fetch_assoc()) {
    echo "<div class='producto'>";
    echo "<h3>" . $p['nombre'] . "</h3>";
    echo "<p>" . $p['descripcion'] . "</p>";
    echo "<p>Precio: " . $p['precio'] . " €</p>";
    echo "<a href='carrito.php?add=" . $p['id'] . "'>Añadir al carrito</a>";
    echo "</div>";
}
?>

<?php include "footer.php"; ?>


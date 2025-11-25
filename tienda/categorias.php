<?php include "header.php"; ?>

<h2>Categorías</h2>

<?php
$sql = "SELECT * FROM categoria";
$result = $conn->query($sql);

while ($cat = $result->fetch_assoc()) {
    echo "<div class='categoria'>";
    echo "<a href='producto.php?cat=" . $cat['id'] . "'>";
    echo "<h3>" . $cat['nombre'] . "</h3>";
    echo "</a>";
    echo "</div>";
}
?>

<?php include "footer.php"; ?>


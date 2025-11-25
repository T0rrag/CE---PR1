<?php
require_once "config.php";
include "header.php";

// Acepta ?categoria=X o ?id=X
$categoria_id = $_GET['categoria'] ?? $_GET['id'] ?? null;

if (!$categoria_id) {
    echo "<div class='container mt-5'><h3>Error: Categoría no especificada.</h3></div>";
    include "footer.php";
    exit;
}

$categoria_id = intval($categoria_id);

// Obtener nombre de la categoría
$catQuery = $conn->prepare("SELECT nombre FROM categoria WHERE id = ?");
$catQuery->bind_param("i", $categoria_id);
$catQuery->execute();
$result = $catQuery->get_result();

if ($result->num_rows === 0) {
    echo "<div class='container mt-5'><h3>Error: La categoría no existe.</h3></div>";
    include "footer.php";
    exit;
}

$categoria = $result->fetch_assoc()['nombre'];

// Mostrar título
echo "<div class='container mt-4'>";
echo "<h2 class='text-center mb-4'>$categoria</h2>";
echo "<hr>";

// Obtener productos (máximo 3)
$query = $conn->prepare("SELECT * FROM producto WHERE categoriaID = ? LIMIT 3");
$query->bind_param("i", $categoria_id);
$query->execute();
$productos = $query->get_result();

if ($productos->num_rows === 0) {
    echo "<p class='text-center mt-4'>No hay productos en esta categoría.</p>";
} else {
    echo "<div class='row'>";

    while ($p = $productos->fetch_assoc()) {


$defaultImage = "https://via.placeholder.com/200x200?text=Sin+Imagen";

if (empty($p['imagen'])) {

    $imagen = $defaultImage;

} else {

    // Si empieza con http, es URL externa válida
    if (preg_match('/^https?:\/\//', $p['imagen'])) {

        $imagen = $p['imagen'];

    } else {

        // Imagen local en /imagenes/
        $imagen = "imagenes/" . trim($p['imagen']);
    }
}


        // Tarjeta de producto
        echo "
        <div class='col-md-4 mb-4'>
            <div class='card shadow-sm h-100'>
                <img src='$imagen' class='card-img-top' style='height:200px; object-fit:contain;'>
                <div class='card-body text-center'>
                    <h5 class='card-title'>{$p['nombre']}</h5>
                    <p class='fw-bold text-success'>{$p['precio']} €</p>

                    <a href='carrito.php?add={$p['id']}' class='btn btn-primary btn-sm'>
                        <i class='fa-solid fa-cart-plus'></i> Añadir al carrito
                    </a>
                </div>
            </div>
        </div>";
    }

    echo "</div>";
}

echo "</div>";

include "footer.php";
?>

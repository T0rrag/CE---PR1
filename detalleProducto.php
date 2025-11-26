<?php
require_once "config.php";
include "header.php";

// Validar producto
if (!isset($_GET['id'])) {
    echo "<div class='container mt-5'><h3>Error: Producto no especificado.</h3></div>";
    include "footer.php";
    exit;
}

$id = intval($_GET['id']);

// Consulta del producto
$stmt = $conn->prepare("SELECT * FROM producto WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "<div class='container mt-5'><h3>Error: El producto no existe.</h3></div>";
    include "footer.php";
    exit;
}

$producto = $result->fetch_assoc();

// Imagen
$imagen = (!empty($producto['imagen']))
    ? $producto['imagen']
    : "https://placehold.co/300x300?text=Sin+Imagen";

?>

<div class="container mt-5">

    <div class="row">

        <!-- IMAGEN -->
        <div class="col-md-6 text-center">
            <img src="<?php echo $imagen; ?>" 
                 alt="imagen producto" 
                 class="img-fluid border p-2 shadow-sm"
                 style="max-height: 350px; object-fit: contain;">
        </div>

        <!-- DETALLES DEL PRODUCTO -->
        <div class="col-md-6">

            <h2><?php echo $producto['nombre']; ?></h2>

            <p class="text-muted mt-2" style="font-size: 1.1em;">
                <?php echo nl2br($producto['descripcion']); ?>
            </p>

            <hr>

            <div class="d-flex justify-content-between align-items-center mt-4">

                <!-- BOTÓN AÑADIR AL CARRITO -->
                <a href="carrito.php?add=<?php echo $producto['id']; ?>" 
                   class="btn btn-primary btn-lg">
                    <i class="fa-solid fa-cart-plus"></i> Añadir al carrito
                </a>

                <!-- PRECIO -->
                <span class="fw-bold text-success" style="font-size: 1.8em;">
                    <?php echo $producto['precio']; ?> €
                </span>

            </div>

        </div>

    </div>

</div>

<?php include "footer.php"; ?>

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
?>

<!-- ========== MINI HERO / BANNER SUPERIOR ========== -->
<div class="hero-small d-flex align-items-center justify-content-center text-center"
     style="background: linear-gradient(90deg, #1b0033, #3a0066);
            height: 160px;
            color: white;
            text-shadow: 1px 1px 6px black;">

    <div>
        <h2 class="fw-bold"><?= $categoria ?></h2>
        <p class="m-0">Explora nuestra selección de productos de esta categoría</p>
    </div>
</div>

<!-- ========== CONTENIDO PRINCIPAL ========== -->
<div class="container mt-4">

    <div class="row">

        <?php
        // Obtener productos (máximo 3 o todos si quieres luego cambiarlo)
        $query = $conn->prepare("SELECT * FROM producto WHERE categoriaID = ? LIMIT 3");
        $query->bind_param("i", $categoria_id);
        $query->execute();
        $productos = $query->get_result();

        if ($productos->num_rows === 0) {
            echo "<p class='text-center mt-4'>No hay productos disponibles.</p>";
        } else {
            while ($p = $productos->fetch_assoc()) {

                // Imagen (usa valor literal de la BD)
                $imagen = (!empty($p['imagen']))
                    ? $p['imagen']
                    : "https://placehold.co/200x200?text=Sin+Imagen";

                echo "
                <div class='col-md-4 mb-4'>
                    <div class='card shadow-sm h-100'>
                        <img src='$imagen' class='card-img-top' style='height:200px; object-fit:contain;'>

                        <div class='card-body text-center'>
                            <h5 class='card-title'>{$p['nombre']}</h5>
                            <p class='fw-bold text-success'>{$p['precio']} €</p>

                            <a href='detalleProducto.php?id={$p['id']}' class='btn btn-outline-primary btn-sm'>
                                <i class='fa-solid fa-eye'></i> Ver producto
                            </a>
                        </div>
                    </div>
                </div>";
            }
        }
        ?>

    </div>

</div>

<?php include "footer.php"; ?>

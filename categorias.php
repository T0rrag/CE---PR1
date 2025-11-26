<?php 
require_once "config.php"; 
include "header.php"; 
?>

<!-- ========================= MINI HERO ========================= -->
<div class="hero-small d-flex align-items-center justify-content-center text-center"
     style="background: linear-gradient(90deg, #3d0066, #5a0099);
            height: 180px; 
            color: white; 
            text-shadow: 1px 1px 6px black;">

    <div>
        <h2 class="fw-bold">Categorías de Productos</h2>
        <p class="m-0">Explora nuestra selección de juegos y coleccionables</p>
    </div>
</div>

<!-- ========================= LISTA DE CATEGORÍAS ========================= -->
<div class="container mt-5 mb-5">

    <div class="row g-4">

        <!-- MAGIC -->
        <div class="col-md-3">
            <div class="card shadow-sm text-center py-4 border-0 category-card"
                 style="background: #efe6ff;">
                <i class="fa-solid fa-hat-wizard fa-3x mb-3 text-primary"></i>
                <h5 class="fw-bold">Magic: The Gathering</h5>
                <p class="text-muted">Cartas, sobres y accesorios</p>
                <a href="productos.php?categoria=1" 
                   class="btn btn-outline-primary btn-sm w-75 mx-auto">
                    Ver productos
                </a>
            </div>
        </div>

        <!-- WARHAMMER -->
        <div class="col-md-3">
            <div class="card shadow-sm text-center py-4 border-0 category-card"
                 style="background: #fff0e6;">
                <i class="fa-solid fa-crosshairs fa-3x mb-3 text-danger"></i>
                <h5 class="fw-bold">Warhammer 40.000</h5>
                <p class="text-muted">Miniaturas y ejércitos</p>
                <a href="productos.php?categoria=2" 
                   class="btn btn-outline-danger btn-sm w-75 mx-auto">
                    Ver productos
                </a>
            </div>
        </div>

        <!-- D&D -->
        <div class="col-md-3">
            <div class="card shadow-sm text-center py-4 border-0 category-card"
                 style="background: #e6f7ff;">
                <i class="fa-solid fa-dragon fa-3x mb-3 text-info"></i>
                <h5 class="fw-bold">Dungeons & Dragons</h5>
                <p class="text-muted">Manuals, dados y aventuras</p>
                <a href="productos.php?categoria=3" 
                   class="btn btn-outline-info btn-sm w-75 mx-auto">
                    Ver productos
                </a>
            </div>
        </div>

        <!-- CLÁSICOS -->
        <div class="col-md-3">
            <div class="card shadow-sm text-center py-4 border-0 category-card"
                 style="background: #f3ffe6;">
                <i class="fa-solid fa-chess fa-3x mb-3 text-success"></i>
                <h5 class="fw-bold">Juegos Clásicos</h5>
                <p class="text-muted">Ajedrez, damas, backgammon</p>
                <a href="productos.php?categoria=4" 
                   class="btn btn-outline-success btn-sm w-75 mx-auto">
                    Ver productos
                </a>
            </div>
        </div>

    </div>

</div>

<?php include "footer.php"; ?>

<?php 
require_once "config.php"; 
include "header.php"; 
?>

<div class="container">

    <div class="text-center mt-4">
        <h2>Categorías de Critical Role</h2>
        <p class="lead">Explora las diferentes líneas de productos disponibles.</p>
    </div>

    <div class="row mt-5">

        <!-- Magic -->
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <i class="fa-solid fa-hat-wizard fa-2x mb-3"></i>
                    <h5 class="card-title">Magic: The Gathering</h5>
                    <a href="productos.php?categoria=1" class="btn btn-primary btn-sm">Ver productos</a>
                </div>
            </div>
        </div>

        <!-- Warhammer -->
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <i class="fa-solid fa-crosshairs fa-2x mb-3"></i>
                    <h5 class="card-title">Warhammer 40.000</h5>
                    <a href="productos.php?categoria=2" class="btn btn-primary btn-sm">Ver productos</a>
                </div>
            </div>
        </div>

        <!-- Dungeons & Dragons -->
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <i class="fa-solid fa-dragon fa-2x mb-3"></i>
                    <h5 class="card-title">Dungeons & Dragons</h5>
                    <a href="productos.php?categoria=3" class="btn btn-primary btn-sm">Ver productos</a>
                </div>
            </div>
        </div>

        <!-- Juegos Clásicos -->
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <i class="fa-solid fa-chess fa-2x mb-3"></i>
                    <h5 class="card-title">Juegos Clásicos</h5>
                    <a href="productos.php?categoria=4" class="btn btn-primary btn-sm">Ver productos</a>
                </div>
            </div>
        </div>
        
    </div>

</div>

<?php include "footer.php"; ?>

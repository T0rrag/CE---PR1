<?php 
require_once "config.php"; 
include "header.php"; 
?>

//apartado del banner//

<div class="hero d-flex align-items-center justify-content-center text-center"
     style="background: url('imagenes/banner_hero.jpg') center/cover no-repeat; 
            height: 380px; 
            color: white; 
            text-shadow: 2px 2px 10px black;">

    <div>
        <h1 class="display-4 fw-bold">Bienvenido a Critical Role</h1>
        <p class="fs-4">La tienda definitiva para fans de Magic, Warhammer y D&D</p>
        <a href="categorias.php" class="btn btn-primary btn-lg mt-3">
            <i class="fa-solid fa-shop"></i> Explorar tienda
        </a>
    </div>
</div>

//apartado de carrusel// *comprobar con 6 imágenes*

<div class="container mt-4">
    <div id="promoCarousel" class="carousel slide rounded shadow" data-bs-ride="carousel">
        <div class="carousel-inner">

            <div class="carousel-item active">
                <img src="imagenes/carousel1.jpg" 
                     class="d-block w-100" 
                     style="height: 350px; object-fit: cover;">
            </div>

            <div class="carousel-item">
                <img src="imagenes/carousel2.jpg" 
                     class="d-block w-100" 
                     style="height: 350px; object-fit: cover;">
            </div>

            <div class="carousel-item">
                <img src="imagenes/carousel3.jpg" 
                     class="d-block w-100" 
                     style="height: 350px; object-fit: cover;">
            </div>
            
            <div class="carousel-item">
                <img src="imagenes/carousel4.jpg" 
                     class="d-block w-100" 
                     style="height: 350px; object-fit: cover;">
            </div>
            
            <div class="carousel-item">
                <img src="imagenes/carousel5.jpg" 
                     class="d-block w-100" 
                     style="height: 350px; object-fit: cover;">
            </div>
            
            <div class="carousel-item">
                <img src="imagenes/carousel6.jpg" 
                     class="d-block w-100" 
                     style="height: 350px; object-fit: cover;">
            </div>

        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#promoCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#promoCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</div>

//apartado de destacados//

<div class="container mt-5 mb-5">
    <h2 class="text-center mb-4">Productos Destacados</h2>

    <div class="row">

    <?php
    //elegir 4 productos aleatorios de la base de datos//
    $sql = "SELECT * FROM producto ORDER BY RAND() LIMIT 4";
    $res = $conn->query($sql);

    while ($p = $res->fetch_assoc()):
        $img = !empty($p['imagen']) ? $p['imagen'] : "https://placehold.co/250x250?text=Sin+Imagen";
    ?>

        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <img src="<?= $img ?>" 
                     class="card-img-top" 
                     style="height:230px; object-fit:contain;">

                <div class="card-body text-center">
                    <h6><?= $p['nombre'] ?></h6>
                    <p class="text-success fw-bold"><?= $p['precio'] ?> €</p>
                    <a href="detalleProducto.php?id=<?= $p['id'] ?>" class="btn btn-primary btn-sm">
                        <i class="fa-solid fa-eye"></i> Ver producto
                    </a>
                </div>
            </div>
        </div>
        

    <?php endwhile; ?>

    </div>
</div>

//apartado de por qué elegirnos//

<div class="container mt-5">
    <h2 class="text-center mb-4">¿Por qué elegir Critical Role?</h2>

    <div class="row text-center">

        <div class="col-md-4 mb-4">
            <i class="fa-solid fa-shield-halved fa-3x mb-3 text-primary"></i>
            <h5>Productos Originales</h5>
            <p>Garantizamos calidad oficial en Magic, Warhammer y D&D.</p>
        </div>

        <div class="col-md-4 mb-4">
            <i class="fa-solid fa-truck-fast fa-3x mb-3 text-primary"></i>
            <h5>Envíos Rápidos</h5>
            <p>Entrega en 24/48h en toda España.</p>
        </div>

        <div class="col-md-4 mb-4">
            <i class="fa-solid fa-wand-magic-sparkles fa-3x mb-3 text-primary"></i>
            <h5>Expertos en Rol y Miniaturas</h5>
            <p>Te ayudamos a elegir el mejor producto para tus campañas y ejércitos.</p>
        </div>

    </div>
</div>

<?php include "footer.php"; ?>

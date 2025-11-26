<?php
require_once "config.php";
include "header.php";

// AÑADIR uno
if (isset($_GET['add'])) {
    $id = intval($_GET['add']);

    // Si ya existe, aumentar
    if (isset($_SESSION['carrito'][$id])) {
        $_SESSION['carrito'][$id]++;
    } else {
        $_SESSION['carrito'][$id] = 1;
    }

    header("Location: carrito.php"); 
    exit;
}

// RESTAR uno
if (isset($_GET['restar'])) {
    $id = intval($_GET['restar']);

    if (isset($_SESSION['carrito'][$id])) {

        // Si queda más de 1, restamos
        if ($_SESSION['carrito'][$id] > 1) {
            $_SESSION['carrito'][$id]--;
        } else {
            // Si es 1 → eliminar
            unset($_SESSION['carrito'][$id]);
        }
    }

    header("Location: carrito.php");
    exit;
}

// ELIMINAR por completo
if (isset($_GET['eliminar'])) {
    $id = intval($_GET['eliminar']);
    unset($_SESSION['carrito'][$id]);
    header("Location: carrito.php");
    exit;
}

// VACIAR CARRITO
if (isset($_GET['vaciar'])) {
    unset($_SESSION['carrito']);
    header("Location: carrito.php");
    exit;
}


if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
    echo "
    <div class='container mt-5 text-center'>
        <h2>🛒 Tu carrito está vacío</h2>
        <p class='text-muted'>Explora nuestros productos y añade algo al carrito.</p>
        <a href='categorias.php' class='btn btn-primary mt-3'>
            <i class='fa-solid fa-shop'></i> Ir a la tienda
        </a>
    </div>";
    include "footer.php";
    exit;
}

?>

<div class="container mt-4">

    <!-- BOTÓN VACIAR CARRITO -->
    <a href="carrito.php?vaciar=1" 
       class="btn btn-danger btn-sm mb-3"
       onclick="return confirm('¿Vaciar todo el carrito?');">
        <i class="fa-solid fa-trash"></i> Vaciar carrito
    </a>

    <div class="row">

        <?php
        $total = 0;

        foreach ($_SESSION['carrito'] as $id => $cantidad) {

            $stmt = $conn->prepare("SELECT * FROM producto WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $p = $result->fetch_assoc();

            $imagen = (!empty($p['imagen'])) ? $p['imagen'] : "https://placehold.co/100x100?text=Sin+Imagen";

            $subtotal = $p['precio'] * $cantidad;
            $total += $subtotal;
        ?>

        <div class="col-md-12 mb-3">
            <div class="card shadow-sm p-3">

                <div class="row align-items-center">

                    <!-- FOTO -->
                    <div class="col-md-2 text-center">
                        <img src="<?= $imagen ?>" class="img-fluid" style="max-height: 100px;">
                    </div>

                    <!-- INFO -->
                    <div class="col-md-4">
                        <h5><?= $p['nombre'] ?></h5>
                        <p class="text-muted m-0">Precio: <?= $p['precio'] ?> €</p>
                    </div>

                    <!-- CANTIDAD -->
                    <div class="col-md-3 text-center">
                        <div class="d-flex justify-content-center">

                            <a href="carrito.php?restar=<?= $id ?>" class="btn btn-outline-secondary btn-sm">−</a>

                            <span class="px-3 fs-5"><?= $cantidad ?></span>

                            <a href="carrito.php?add=<?= $id ?>" class="btn btn-outline-secondary btn-sm">+</a>

                        </div>
                        <small class="text-muted">Subtotal: <?= $subtotal ?> €</small>
                    </div>

                    <!-- ELIMINAR -->
                    <div class="col-md-3 text-end">
                        <a href="carrito.php?eliminar=<?= $id ?>" 
                           class="btn btn-outline-danger btn-sm"
                           onclick="return confirm('¿Eliminar este producto?');">
                            <i class="fa-solid fa-xmark"></i> Quitar
                        </a>
                    </div>

                </div>
            </div>
        </div>

        <?php } ?>

    </div>

    <!-- TOTAL -->
    <div class="text-end mt-4">
        <h3>Total: <?= number_format($total, 2) ?> €</h3>

        <a href="confirmarcompra.php" class="btn btn-success btn-lg mt-3">
            <i class="fa-solid fa-credit-card"></i> Proceder al pago
        </a>
    </div>

</div>

<?php include "footer.php"; ?>

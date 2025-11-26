<?php
require_once "config.php";
include "header.php";

// Si el carrito está vacío → redirigir
if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
    echo "<div class='container mt-5 text-center'>
            <h2>Tu carrito está vacío</h2>
            <a href='categorias.php' class='btn btn-primary mt-3'>Volver a la tienda</a>
          </div>";
    include "footer.php";
    exit;
}

// Obtener productos del carrito
$total = 0;
$items = [];

foreach ($_SESSION['carrito'] as $id => $cantidad) {
    $stmt = $conn->prepare("SELECT * FROM producto WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $producto = $result->fetch_assoc();

    if ($producto) {
        $subtotal = $producto['precio'] * $cantidad;
        $total += $subtotal;
        $items[] = [
            "id" => $producto['id'],
            "nombre" => $producto['nombre'],
            "cantidad" => $cantidad,
            "precio" => $producto['precio'],
            "subtotal" => $subtotal
        ];
    }
}
?>

<div class="container mt-5">

    <!-- TÍTULO -->
    <div class="text-center mb-4">
        <h2 class="fw-bold">Finalizar compra</h2>
        <p class="text-muted">Revisa tu pedido y completa tus datos para continuar</p>
    </div>

    <div class="row">

        <!-- FORMULARIO DE DATOS DEL CLIENTE -->
        <div class="col-md-7">

            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <strong>Datos del cliente</strong>
                </div>

                <div class="card-body">

                    <form action="resumen.php" method="POST">

                        <div class="mb-3">
                            <label class="form-label">Nombre completo</label>
                            <input type="text" class="form-control" name="nombre" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email de contacto</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Dirección de envío</label>
                            <textarea class="form-control" name="direccion" rows="2" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Teléfono</label>
                            <input type="text" class="form-control" name="telefono" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Método de pago</label>

                            <select class="form-select" name="pago" required>
                                <option value="" disabled selected>Selecciona método de pago</option>
                                <option value="visa">💳 Tarjeta Visa</option>
                                <option value="mastercard">💳 MasterCard</option>
                                <option value="paypal">🟦 PayPal</option>
                                <option value="transferencia">🏦 Transferencia bancaria</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success btn-lg w-100 mt-3">
                            Confirmar compra <i class="fa-solid fa-check"></i>
                        </button>

                    </form>

                </div>
            </div>
        </div>

        <!-- RESUMEN DEL PEDIDO -->
        <div class="col-md-5">

            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    <strong>Resumen del pedido</strong>
                </div>

                <ul class="list-group list-group-flush">

                    <?php foreach ($items as $item): ?>

                    <li class="list-group-item">
                        <div class="d-flex justify-content-between">
                            <div>
                                <strong><?= $item['nombre']; ?></strong><br>
                                <small class="text-muted">Cantidad: <?= $item['cantidad']; ?></small>
                            </div>

                            <div class="text-end fw-bold">
                                <?= number_format($item['subtotal'], 2); ?> €
                            </div>
                        </div>
                    </li>

                    <?php endforeach; ?>

                    <li class="list-group-item bg-light">
                        <div class="d-flex justify-content-between">
                            <strong>Total a pagar:</strong>
                            <span class="fw-bold text-success"><?= number_format($total, 2); ?> €</span>
                        </div>
                    </li>

                </ul>

            </div>

        </div>

    </div>

</div>

<?php include "footer.php"; ?>

<?php include "header.php"; ?>

<h2>Confirmar compra</h2>

<form action="resumen.php" method="POST">
    Nombre: <input type="text" name="nombre" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Dirección: <input type="text" name="direccion"><br><br>
    Teléfono: <input type="text" name="telefono"><br><br>

    <button type="submit">Finalizar compra</button>
</form>

<?php include "footer.php"; ?>


<?php require_once "config.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tienda Online</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<header>
    <h1>Tienda de Juegos de Mesa</h1>
    <nav>
        <a href="inicio.php">Inicio</a>
        <a href="categorias.php">Categorías</a>
        <a href="carrito.php">Carrito (<?php echo isset($_SESSION['carrito']) ? count($_SESSION['carrito']) : 0; ?>)</a>
    </nav>
</header>

<hr>


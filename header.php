<?php require_once "config.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Critical Role - Tienda Online</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <!-- Estilos -->
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>

<header class="bg-dark text-white py-3 mb-4">
    <div class="container d-flex justify-content-between align-items-center">

        <!-- LOGO -->
        <h1 class="h3 m-0">
            <i class="fa-brands fa-critical-role"></i> Critical Role
        </h1>

        <!-- NAV -->
        <nav class="d-flex gap-3">
            <a class="text-white text-decoration-none" href="inicio.php">Inicio</a>
            <a class="text-white text-decoration-none" href="categorias.php">Categorías</a>
            <a class="text-white text-decoration-none" href="carrito.php">
                Carrito (<?php echo isset($_SESSION['carrito']) ? count($_SESSION['carrito']) : 0; ?>)
            </a>
        </nav>

    </div>
</header>

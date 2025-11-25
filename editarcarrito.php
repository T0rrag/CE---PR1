<?php
include "header.php";

if (isset($_GET['del'])) {
    unset($_SESSION['carrito'][$_GET['del']]);
}

header("Location: carrito.php");
exit;


<?php
session_start();

// Cerrar sesión del administrador
unset($_SESSION['admin']);
session_destroy();

// Redirigir al login
header("Location: adminLogin.php");
exit;
?>

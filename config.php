<?php
$host = "localhost";
$user = "admin";
$pass = "admin12345";
$db   = "tienda";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

session_start();
?>

<?php
session_start();

// Credenciales *IMPORTANTE NO TENER LAS MISMAS CREDENCIALES QUE PUSE EN PHPMYADMIN por motivos de seguridad
$ADMIN_USER = "admin";
$ADMIN_PASS = "1234";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['usuario'];
    $pass = $_POST['password'];

    if ($user === $ADMIN_USER && $pass === $ADMIN_PASS) {
        $_SESSION['admin'] = true;
        header("Location: adminPanel.php");
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Admin - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card shadow" style="width:350px;">
        <div class="card-header bg-dark text-white text-center">
            <h4>Panel de Administración</h4>
        </div>

        <div class="card-body">

            <?php if (isset($error)): ?>
                <div class="alert alert-danger text-center"><?= $error ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Usuario</label>
                    <input type="text" name="usuario" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Contraseña</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <button class="btn btn-primary w-100">Entrar</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>

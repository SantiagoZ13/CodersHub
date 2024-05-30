<?php
session_start();
$usuarioLogueado = isset($_SESSION["id"]);
$esAdministrador = isset($_SESSION["rol"]) && $_SESSION["rol"] === 'administrador';
$rutaActual = basename($_SERVER['PHP_SELF']);

?>
<!DOCTYPE html> 
<html lang="es">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/jgthms/minireset.css@master/minireset.min.css">
    <title>CodersHub</title>
  <script type="module" crossorigin src="assets/index-BJpZiUtB.js"></script>
  <link rel="stylesheet" crossorigin href="assets/index-B7NzZS0j.css">
</head>
<body class="<?= ($rutaActual == 'login.php' || $rutaActual == 'register.php') ? 'img-login' : '' ?>">
    <div class="main-container">
        <header class="main-header">
            <img class="nav-logo" src="assets/CodersHub-YupultAJ.png" alt="Logo de CodersHub">
            <div class="off-screen-mobile-menu">
                <ul class="nav-mobile">

                    <?php if ($usuarioLogueado): ?>
                        <li class=""><a class="link <?= $rutaActual == 'index.php' ? 'link-active'  : '' ?>" href="index.php">Blog</a></li>
                        <li class=""><a class="link <?= $rutaActual == 'about-us.php' ? 'link-active' : '' ?>" href="about-us.php">Quienes somos</a></li>
                        <?php if ($esAdministrador): ?>
                            <li class=""><a class="link" target="_blank" href="/codershub_zeus/">Admin Panel </a></li>
                        <?php endif; ?>
                        <li class=""><a class="link" href="assets/config/controlador-cerrar-sesion.php">Salir</a></li>
                        
                    <?php else: ?>
                        <li class=""><a class="link <?= $rutaActual == 'about-us.php' ? 'link-active' : '' ?>" href="about-us.php">Quienes somos</a></li>
                        <li class=""><a class="link <?= $rutaActual == 'register.php' ? 'link-active' : '' ?>" href="register.php">Registro</a></li>
                        <li class=""><a class="link <?= $rutaActual == 'login.php' ? 'link-active' : '' ?>" href="login.php">Ingreso</a></li>
                    <?php endif; ?>
                    <li class=""><a class="link <?= $rutaActual == 'contact.php' ? 'link-active' : '' ?>" href="contact.php">Contáctame</a></li>
                </ul>
            </div>
            <nav>
                <ul class="nav-list">
                    <?php if ($usuarioLogueado): ?>
                        <li class="nav-item"><a class="link <?= $rutaActual == 'index.php' ? 'link-active'  : '' ?>" href="index.php">Blog</a></li>
                        <li class="nav-item"><a class="link <?= $rutaActual == 'about-us.php' ? 'link-active' : '' ?>" href="about-us.php">Quienes somos</a></li>
                        <?php if ($esAdministrador): ?>
                            <li class="nav-item"><a target="_blank" class="link" href="/codershub_zeus/">Admin Panel </a></li>
                        <?php endif; ?>
                        <li class="nav-item"><a class="link" href="assets/config/controlador-cerrar-sesion.php">Salir</a></li>
                        
                    <?php else: ?>
                        <li class="nav-item"><a class="link <?= $rutaActual == 'about-us.php' ? 'link-active' : '' ?>" href="about-us.php">Quienes somos</a></li>
                        <li class="nav-item"><a class="link <?= $rutaActual == 'register.php' ? 'link-active' : '' ?>" href="register.php">Registro</a></li>
                        <li class="nav-item"><a class="link <?= $rutaActual == 'login.php' ? 'link-active' : '' ?>" href="login.php">Ingreso</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
            <a class="link link-bold <?= $rutaActual == 'contact.php' ? 'link-active' : '' ?>" href="contact.php">Contáctame</a>
            <img class="menu-mobile" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAACXBIWXMAAAHYAAAB2AH6XKZyAAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAAAy5JREFUeJztm7uPTVEUxr9vnTPxujMU3lGYKfgDiATxqDwqUylQqIhMoUBCQkQmMZVoJB4FUwkqggmTCCKDkHg1OjdUhCjmZYx79qeYe86ce+bei6gme/+affc66661v13ttbI3EAgEfIbpj0VvNefn6PBWkO1KEFv6wU0MlvsNV5gDiJKCf9EXhbmr9UcyNWbdGFVblPPLvieFeSGWiAqcyjY6cv/dkcUj2Qa0vRzZzkS9FBZCAFXdHQHZvNHYwG+KDX8Rq4Hfv+Rt7Kd8rC9w3PvuYOke5z4fWQVqgA4zPBGfjmN0XGuiTnooHhRmAjpp5rDRQ/Fp3s0GIfZUPCDERuClp+JB4IVR6KEg78QLTuJp+76+1C+nLgrjHon/CeHA60OlB9lBaN7DH8sjJjsptZtg+UNEmgQO2SHDCrYsUNVuOV/kfJn+p2q3nG9qy2IVYljOVrOuqt3q5avV4ehUFlquvz486yMCgUAgEAgEAoFAwFeywmtx39CCOLFOQu3KVYNpa7qm+kOTNnmdljRzlV4+5pQWehqrTuu8psprFqNYnea+E3CEK0djvPmkp/VrtgHL7g7vkuNFQqVpUs//7/qGIOx72t16jUvuDG4w2UMCkSfi07yVyGlTHMmOwz/xoBA74IQBWOuh+Oqc68xf8ROjUXjqq3hKA0a4bgoV/8SjQqLbPu1oG5DTHgKDHokfhLD7cU/bs+y8sPTq4PwZLVEn4NoJRtPtkJOuodEdA3OApITQBxvHrUdn2r4hEAgEAoFAIBAIBHwlK6xWXB7rACs7TVoOgf97ISlfmVmhYmT+UhQmW+5WL1+z9rybLIuzWHUuZ6X5KAhQmXQ3+s/NK2cbsKJ3qIviWQot06Se/6Nf07zAOB0O3j/feoErrwxvA9BHgV6In5wLCbfEAI56KB4UCNOxmMJqD8Wn4xqDUPFUPCBUDNJjT8WDwiNjYqc4cXnYN/FjSHjK3u+f84oOnRS+eCT+Mx07+3pLb7KD0KqLmj2ejG4B1AG4lrotafzheZoDIuQofM9iJYV5IcaUJ3tNnshF9dbX4OkdYb/k3Ic4au2/fYmjCAQC3vMbyoqqqb9ufWcAAAAASUVORK5CYII=" alt="menu-mobile">
        </header>
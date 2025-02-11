<?php

if (isset($_SESSION['login'])) {
    $haylogin = $_SESSION['login'];
    $admin = $_SESSION['rol'];
} else {
    $haylogin = false;
}

$carrito_count = isset($_SESSION['carrito']) ? count($_SESSION['carrito']) : 0;

?>

<nav class="navbar navbar-expand-md bg-dark sticky-top border-bottom" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand d-md-none" href="#">
            <svg class="bi" width="24" height="24">
                <use xlink:href="#aperture"></use>
            </svg>
            Aperture
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasLabel">Aperture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav flex-grow-1 justify-content-between">
                    <li class="nav-item"><a class="nav-link" href="#">
                            <svg class="bi" width="24" height="24">
                                <use xlink:href="#aperture"></use>
                            </svg>
                            <?php
                            if (!$haylogin) {
                            ?>
                    <li class="nav-item"><a class="nav-link" href="main.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="contacto.php">Contacto</a></li>
                    <li class="nav-item"><a class="nav-link" href="registro.php">Registrarse</a></li>
                    <li class="nav-item"><a class="nav-link" href="loginweb.php">Login</a></li>
                <?php
                            } else {
                ?>
                    <li class="nav-item"><a class="nav-link" href="main.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="producto.php?categoria=1">Hombre</a></li>
                    <li class="nav-item"><a class="nav-link" href="producto.php?categoria=2">Mujer</a></li>
                    <li class="nav-item"><a class="nav-link" href="producto.php?categoria=ofertas">Ofertas</a></li>
                    <li class="nav-item"><a class="nav-link" href="contacto.php">Contacto</a></li>
                    <?php if ($admin == 1) { ?>
                        <li class="nav-item"><a class="nav-link" href="admin/panel.php">Administrar web</a></li>
                    <?php } ?>
                    <li class="nav-item"><a class="nav-link" href="pedidos.php"><?= $_SESSION['nombre'] ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="logica/logout.php">Cerrar Sesión</a></li>
                <?php
                            }
                ?>
                <li class="nav-item">
                    <a class="nav-link position-relative" href="carrito.php">
                        <i class="bi bi-cart3" style="font-size: 1.2rem;"></i>
                        <span id="carrito-count"
                            class="position-absolute top-60 start-100 translate-middle badge bg-danger"
                            style="font-size: 0.7rem; padding: 0.25rem 0.4rem; border-radius: 50%;">
                            <?= $carrito_count ?>
                        </span>
                    </a>
                </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
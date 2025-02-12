<?php session_start(); ?>
<?php include 'logica/logincheck.php' ?>
<?php define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/7PHPSQL/examen-refactor/admin/'); ?>
<?php include 'database/product_queries.php' ?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lateral Navbar</title>
  <!-- Vincular Bootstrap CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
  <!-- Vincular Bootstrap Icons -->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.min.css" />
  <link rel="stylesheet" href="partials/style.css">

</head>

<body class="bg-dark container ">
  <?php include 'partials/navbar.php' ?>


  <!-- Contenedor principal -->
  <div class="container my-5">
    <!-- Aquí se mostrará la frase aleatoria -->
    <!-- <div id="frase-container" class="p-4 bg-white border rounded shadow-sm fs-4 fw-bold text-dark"></div> -->
  </div>
  <!-- Panel Productos -->
  <div id="panel-productos">
    <?php include BASE_PATH . 'partials/panel_productos.php'; ?>
  </div>
  <!-- Panel Categorías -->
  <div id="panel-categorias" style="display: none;">
    <?php include BASE_PATH . 'partials/panel_categorias.php'; ?>
  </div>
  <!-- Panel Usuarios -->
  <div id="panel-usuarios" style="display: none;">
    <?php include BASE_PATH . 'partials/panel_usuarios.php'; ?>
  </div>
  <!-- Panel Pedidos -->
  <div id="panel-pedidos" style="display: none;">
    <?php include BASE_PATH . 'partials/panel_pedidos.php'; ?>
  </div>
  


  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="partials/navbar.js"></script>
  <script src="partials/modals/modal.js"></script>
  <!-- <script src="partials/frase.js"></script> -->



</body>

</html>
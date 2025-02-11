<?php
session_start();
require_once('logica/logincheck.php');
require_once('database/product_queries.php');

// Validar categoría

$categoria = $_GET['categoria'];


if ($categoria !== 'ofertas') {
    try {
        $productos = getProductosbyCategory($pdo, $categoria);
        $productosRecomendados = getProductosRecomendados($pdo, $categoria);
    } catch (PDOException $e) {
        die('Error al conectar con la base de datos: ' . $e->getMessage());
    }
   
}else{
    try {
        $productos = getProductosOfertas($pdo, $categoria);
        $productosRecomendados = getProductosRecomendados($pdo, $categoria);
    } catch (PDOException $e) {
        die('Error al conectar con la base de datos: ' . $e->getMessage());
    }
}

// try {
//     $productos = getProductosbyCategory($pdo, $categoria);
//     $productosRecomendados = getProdcutosRecomendados($pdo, $categoria);
//     $productosOfertas = getProductosOfertas($pdo, $categoria);
// } catch (PDOException $e) {
//     die('Error al conectar con la base de datos: ' . $e->getMessage());
// }

?>

<!DOCTYPE html>
<html lang="es">
<?php include('partials/head.php'); ?>

<body>
    <?php include('partials/navbar.php'); ?>

    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <!-- Productos principales -->
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-3 justify-content-center">
                <?php if (empty($productos)): ?>
                    <p>No hay productos disponibles en esta categoría.</p>
                <?php else: ?>
                    <?php foreach ($productos as $producto): ?>
                        <?php include('partials/product_card.php'); ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- Productos recomendados -->
            <h3 class="text-center">Productos sugeridos</h3>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-3 justify-content-center">
                <?php foreach ($productosRecomendados as $producto): ?>
                    <?php include('partials/product_sugeridos.php'); ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <script src="logica/carrito.js"></script>

    <?php include('partials/footer.php'); ?>
</body>
</html>

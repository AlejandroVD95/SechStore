<?php
session_start();

if (!isset($_SESSION["carrito"])) {
    $_SESSION["carrito"] = [];
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['nombre'], $_POST['precio'])) {
    $producto = [
        'id' => $_POST['id'],
        'nombre' => $_POST['nombre'],
        'precio' => $_POST['precio'],
        'cantidad' => 1
    ];

    array_push($_SESSION['carrito'], $producto);
}

if (isset($_GET['eliminar'])) {
    array_splice(
        $_SESSION['carrito'],
        $_GET['eliminar'],
        1
    );
}

$total = array_sum(array_column($_SESSION['carrito'], 'precio'));
?>


<!DOCTYPE html>
<html lang="es">
<?php include('partials/head.php') ?>

<body>
    <?php include('partials/navbar.php') ?>

    <main class="container d-flex justify-content-center align-items-center" style="height: 70vh;">
        <div class="card shadow-lg" style="width: 100%; max-width: 400px; border-radius: 15px;">
            <div class="card-body" style="max-height: 60vh; overflow-y: auto;">
                <h5 class="card-title text-center mb-4">Carrito</h5>
                <table class="table table-bordered text-center align-middle">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if (!isset($_SESSION['carrito']) || count($_SESSION['carrito']) === 0) { ?>
                            <tr>
                                <td colspan="3" class="text-center">
                                    <p>El carrito está vacío.</p>
                                </td>
                            </tr>
                        <?php } else { ?>
                            <?php foreach ($_SESSION['carrito'] as $i => $produc) { ?>
                                <tr>
                                    <td><?= htmlspecialchars($produc['nombre']) ?></td>
                                    <td><?= htmlspecialchars($produc['precio']) ?>€</td>
                                    <td><a href="carrito.php?eliminar=<?= $i ?>">Eliminar</a></td>
                                </tr>
                            <?php } ?>
                        <?php } ?>

                    </tbody>
                </table>
                <form method="post" action="finalizar.php">
                    <button class="btn btn-dark w-100 py-2" type="submit">Finalizar Compra</button>
                </form>
            </div>
        </div>
    </main>

    <?php include('partials/footer.php') ?>

</body>

</html>
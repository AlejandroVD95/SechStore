<?php
session_start();
require 'logica/db_config.php';

// Obtener el ID del pedido de la URL
$pedido_id = $_GET['id'];

// Obtener los detalles del pedido desde la base de datos
$stmt = $pdo->prepare("SELECT p.id, p.nombre, p.precio, f.url
                       FROM productos p
                       JOIN detalles_pedido dp ON dp.id_producto = p.id
                       LEFT JOIN fotos f ON f.id_producto = p.id
                       WHERE dp.id_pedido = :id_pedido");
$stmt->execute(['id_pedido' => $pedido_id]);
$productos_del_pedido = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Obtener los detalles del pedido (total y fecha)
$stmt = $pdo->prepare("SELECT * FROM pedidos WHERE id = :id_pedido");
$stmt->execute(['id_pedido' => $pedido_id]);
$pedido = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<?php include('partials/head.php') ?>

<body>
    <?php include('partials/navbar.php') ?>

    <main class="container d-flex justify-content-center align-items-center" style="height: 70vh;">
        <div class="card shadow-lg" style="width: 100%; max-width: 600px; border-radius: 15px;">
            <div class="card-body" style="max-height: 60vh; overflow-y: auto;">
                <h5 class="card-title text-center mb-4">Detalles del Pedido #<?= $pedido['id'] ?></h5>
                <p><strong>Total:</strong> <?= htmlspecialchars($pedido['total']) ?>€</p>
                <p><strong>Fecha:</strong> <?= htmlspecialchars($pedido['fecha']) ?></p>

                <div class="d-flex justify-content-end">
                    <a href="pedidos.php" class="btn btn-info btn-dark">Volver</a>
                </div>

                <h5 class="card-title text-center mb-4">Productos en este Pedido</h5>
                <table class="table table-bordered text-center align-middle">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($productos_del_pedido)) { ?>
                            <tr>
                                <td colspan="3">No hay productos en este pedido.</td>
                            </tr>
                        <?php } else { ?>
                            <?php foreach ($productos_del_pedido as $producto) { ?>
                                <tr>
                                    <td><img src="<?= htmlspecialchars($producto['url']) ?>" alt="Imagen del producto" class="img-fluid" style="width: 80px;"></td>
                                    <td><?= htmlspecialchars($producto['nombre']) ?></td>
                                    <td><?= htmlspecialchars($producto['precio']) ?>€</td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <?php include('partials/footer.php') ?>

</body>

</html>
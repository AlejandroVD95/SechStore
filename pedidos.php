<?php
session_start();
require 'logica/db_config.php';


// Obtener los pedidos de la base de datos
$stmt = $pdo->prepare("SELECT * FROM pedidos WHERE email_usuario = :email_usuario ORDER BY fecha DESC");
$stmt->execute([
    'email_usuario' => $_SESSION['email']
]);
$pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<?php include('partials/head.php') ?>

<body>
    <?php include('partials/navbar.php') ?>

    <main class="container d-flex justify-content-center align-items-center" style="height: 70vh;">
        <div class="card shadow-lg" style="width: 100%; max-width: 600px; border-radius: 15px;">
            <div class="card-body" style="max-height: 60vh; overflow-y: auto;">
                <h5 class="card-title text-center mb-4">Mis Pedidos</h5>
                <table class="table table-bordered text-center align-middle">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Total</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if (empty($pedidos)) { ?>
                            <tr>
                                <td colspan="5" class="text-center">
                                    <p>No tienes pedidos registrados.</p>
                                </td>
                            </tr>
                        <?php } else { ?>
                            <?php foreach ($pedidos as $pedido) { ?>
                                <tr>
                                    <td><?= htmlspecialchars($pedido['id']) ?></td>
                                    <td><?= htmlspecialchars($pedido['total']) ?>€</td>
                                    <td><?= htmlspecialchars($pedido['fecha']) ?></td>
                                    <td><a href="detalles_pedido.php?id=<?= $pedido['id'] ?>" class="btn btn-info btn-dark">Ver detalles</a></td>
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
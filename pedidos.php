<!DOCTYPE html>
<html lang="es">
<?php include('partials/head.php') ?>
<?php
session_start();
$total = array_sum(array_column($_SESSION['carrito'], 'precio'));
$stmt = $pdo->prepare("SELECT * FROM pedidos WHERE email = :email");
$stmt->execute([
    'email_usuario' => $_SESSION['email']
]);
$pedidos = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<body>
    <?php include('partials/navbar.php') ?>

    <main class="container d-flex justify-content-center align-items-center" style="height: 70vh;">
        <div class="card shadow-lg" style="width: 100%; max-width: 400px; border-radius: 15px;">
            <div class="card-body">
                <h5 class="card-title text-center mb-4">Mis pedidos</h5>
                <table class='table'>
                    <tr>
                        <th>ID</th>
                        <th>Total</th>
                        <th>Fecha</th>
                    </tr>
                    <?php foreach ($pedidos as $pedido): ?>

                        <?php if (!isset($_SESSION['carrito']) || count($_SESSION['carrito']) === 0) { ?>
                            <p>El carrito está vacío.</p>
                            exit;
                        <?php } else { ?>
                            <tr>
                                <td><?= $pedido['id'] ?></td>
                                <td><?= $pedido['total'] ?>€</td>
                                <td><?= $pedido['fecha'] ?>€</td>
                                
                            </tr>
                        <?php } ?>
                        <tr>
                            <td></td>
                        </tr>
                    <?php endforeach; ?>
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
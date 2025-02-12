<?php include 'partials/modals/pedido_modal_view.php' ?>
<?php

try {
    $pedidos = getPedidos($pdo);
} catch (PDOException $e) {
    die('Error al conectar con la base de datos: ' . $e->getMessage());
}

?>
<div class="header-container d-flex bg-white p-3">
    <h2 class="h2 flex-grow-1 text-center bg-white">Pedidos</h2>
</div>

<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Total</th>
            <th>Fecha</th>
            <th>Email Usuario</th>
            <th>Ajustes</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($pedidos)): ?>
            <tr>
                <td colspan="5" class="text-center">No hay pedidos disponibles.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($pedidos as $pedido): ?>
                <tr>
                    <td><?= $pedido['id'] ?></td>
                    <td><?= $pedido['total'] ?>€</td>
                    <td><?= $pedido['fecha'] ?></td>
                    <td><?= $pedido['email_usuario'] ?></td>
                    <td class="btn_table">
                        <!-- Botón Detalles -->
                        <button type="button" class="btn btn-link nav-link" data-bs-toggle="modal" data-bs-target="#pedidosModalView" data-bs-id="<?= $pedido['id'] ?>">
                            <i class="bi bi-receipt icon_table"></i>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
<?php include 'partials/modals/product_modal_borrar.php' ?>
<?php include 'modals/product_modal_update.php' ?>
<?php include 'modals/product_modal_insert.php' ?>
<?php
try {
    $productos = getProductos($pdo);
} catch (PDOException $e) {
    die('Error al conectar con la base de datos: ' . $e->getMessage());
}
?>
<div class="header-container d-flex bg-white p-3">
    <h2 class="h2 flex-grow-1 text-center bg-white">Productos</h2>
    <a href="#productModalInsert" data-bs-toggle="modal" class="nav-link ms-auto p-2">
        <i class="bi bi-plus-circle icon_table"></i>
    </a>
</div>

<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Precio</th>
            <th>Ajustes</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($productos)): ?>
            <tr>
                <td colspan="5" class="text-center">No hay productos disponibles en esta categoría.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?= $producto['id'] ?></td>
                    <td><img src="../<?= $producto['url'] ?>" alt="Foto de <?= $producto['nombre'] ?>" class="img-thumbnail" style="width: 50px;" id="imagen<?= $producto['id'] ?>"></td>
                    <td id="nombre<?= $producto['id'] ?>"><?= $producto['nombre'] ?></td>
                    <td id="categoria<?= $producto['id'] ?>"><?= $producto['categoria'] ?></td>
                    <td id="precio<?= $producto['id'] ?>"><?= $producto['precio'] ?>€</td>
                    <td class="btn_table">

                        <!-- Botón Borrar -->
                        <button type="button" class="btn btn-link nav-link" data-bs-toggle="modal" data-bs-target="#modalDeleteProduct" data-bs-id="<?= $producto['id'] ?>">
                            <i class="bi bi-trash-fill icon_table"></i>
                        </button>

                        <!-- Botón Actualizar -->
                        <button type="button" class="btn btn-link nav-link" data-bs-toggle="modal" data-bs-target="#modalUpdateProduct" data-bs-id="<?= $producto['id'] ?>">
                            <i class="bi bi-pencil-square icon_table"></i>
                        </button>
                    </td>
                    <!-- Líneas ocultas -->
                    <input class="descCorta" id="descCorta<?= $producto['id'] ?>" type="hidden" value="<?= $producto['desc_corta'] ?>">
                    <input class="descLarga" id="descLarga<?= $producto['id'] ?>" type="hidden" value="<?= $producto['desc_larga'] ?>">
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
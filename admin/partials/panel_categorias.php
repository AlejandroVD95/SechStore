<?php include 'partials/modals/cat_modal_borrar.php' ?>
<?php include 'partials/modals/cat_modal_update.php' ?>
<?php include 'partials/modals/cat_modal_insert.php' ?>

<?php
try {
  $categorias = getCategorias($pdo);
} catch (PDOException $e) {
  die('Error al conectar con la base de datos: ' . $e->getMessage());
}
?>
<div class="header-container d-flex bg-white p-3">
    <h2 class="h2 flex-grow-1 text-center bg-white">Categorias</h2>
    <a class="nav-link ms-auto p-2">
        <i class="bi bi-plus-circle icon_table"></i>
    </a>
</div>

<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Ajustes</th>

        </tr>
    </thead>
    <tbody>
        <?php if (empty($categorias)): ?>
            <tr>
                <td colspan="5" class="text-center">No hay productos disponibles en esta categoría.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($categorias as $categoria): ?>
                <tr>
                    <td><?= $categoria['id_categoria'] ?></td>
                    <td id="nombre<?= $categoria['id_categoria'] ?>"><?= $categoria['nombre_categoria'] ?></td>

                    <td class="btn_table">
                        <!-- Botón Borrar -->
                        <a href="#categoriaModalDelete" class="nav-link" data-bs-toggle="modal" data-bs-id="<?= $categoria['id_categoria'] ?>">
                            <i class="bi bi-trash-fill icon_table"></i>
                        </a>
                        <!-- Botón Actualizar -->
                        <a href="#categoriaModalUpdate" class="nav-link" data-bs-toggle="modal" data-bs-id="<?= $categoria['id_categoria'] ?>">
                            <i class="bi bi-pencil-square icon_table"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
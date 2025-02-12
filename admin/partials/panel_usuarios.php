<?php include 'partials/modals/user_modal_borrar.php' ?>
<?php include 'partials/modals/user_modal_update.php' ?>
<?php include 'partials/modals/user_modal_insert.php' ?>

<?php
try {
    $usuarios = getUsuarios($pdo);
} catch (PDOException $e) {
    die('Error al conectar con la base de datos: ' . $e->getMessage());
}
?>
<div class="header-container d-flex bg-white p-3">
    <h2 class="h2 flex-grow-1 text-center bg-white">Usuarios</h2>
    <a href="#userModalInsert" data-bs-toggle="modal" class="nav-link ms-auto p-2">
        <i class="bi bi-plus-circle icon_table"></i>
    </a>
</div>

<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>Rol</th>
            <th>Email</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>Provincia</th>
            <th>Ajustes</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($usuarios)): ?>
            <tr>
                <td colspan="5" class="text-center">No hay usuarios disponibles.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>

                    <td id="rol_<?= $usuario['email'] ?>"><?= $usuario['rol'] ?></td>
                    <td id="<?= $usuario['email'] ?>"><?= $usuario['email'] ?></td>
                    <td id="nombre<?= $usuario['email'] ?>"><?= $usuario['nombre'] ?></td>
                    <td id="telefono<?= $usuario['email'] ?>"><?= $usuario['telef'] ?></td>
                    <td id="direccion<?= $usuario['email'] ?>"><?= $usuario['direccion'] ?></td>
                    <td id="provincia<?= $usuario['email'] ?>"><?= $usuario['provincia'] ?></td>
                    <td class="btn_table">
                        <!-- Botón Borrar -->
                        <a href="#userModalBorrar" class="nav-link btn btn-link nav-link" data-bs-toggle="modal" data-bs-id="<?= $usuario['email'] ?>">
                            <i class="bi bi-trash-fill icon_table"></i>
                        </a>
                        <!-- Botón Actualizar -->
                        <a href="#userModalUpdate" class="nav-link btn btn-link nav-link" data-bs-toggle="modal" data-bs-id="<?= $usuario['email'] ?>">
                            <i class="bi bi-pencil-square icon_table"></i>
                        </a>
                    </td>
                    <!-- Líneas ocultas -->
                    <input class="direccion" id="direccion<?= $usuario['email'] ?>" type="hidden" value="<?= $usuario['direccion'] ?>">
                    <input class="cp" id="cp<?= $usuario['email'] ?>" type="hidden" value="<?= $usuario['cp'] ?>">
                    <input class="password" id="password<?= $usuario['email'] ?>" type="hidden" value="<?= $usuario['password'] ?>">
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
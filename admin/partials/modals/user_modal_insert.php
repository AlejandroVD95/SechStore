<div class="modal fade" id="userModalInsert" tabindex="-1" aria-labelledby="modalUserInsertNombreTittle" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="modalUserInsertNombreTittle"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <!-- Formulario de insertar usuario -->
                <div class="col-md-8">
                    <form action="/7PHPSQL/examen-refactor/admin/logica/validations.php" method="POST" enctype="multipart/form-data">
                        <!-- Id oculta -->
                        <input id="hiddenIdInsertUser" type="hidden" name="insert_user" value="insert">
                        
                        <!-- Nombre -->
                        <div class="mb-8">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="modalUserInsertNombre" value="" required>
                        </div>

                        <!-- Correo electrónico -->
                        <div class="mb-8">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="modalUserInsertEmail" value="" required>
                        </div>

                        <!-- Password -->
                        <div class="mb-8">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" name="password" id="modalUserInsertPass" value="" required>
                        </div>

                        <!-- Teléfono -->
                        <div class="mb-8">
                            <label for="telef" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" name="telef" id="modalUserInsertTelef" value="" required>
                        </div>

                        <!-- Dirección -->
                        <div class="mb-8">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="text" class="form-control" name="direccion" id="modalUserInsertDireccion" value="" required>
                        </div>

                        <!-- Código Postal -->
                        <div class="mb-8">
                            <label for="cp" class="form-label">Código Postal</label>
                            <input type="text" class="form-control" name="cp" id="modalUserInsertCp" value="">
                        </div>

                        <!-- Provincia -->
                        <div class="mb-8">
                            <label for="provincia" class="form-label">Provincia</label>
                            <input type="text" class="form-control" name="provincia" id="modalUserInsertProvincia" value="">
                        </div>

                        <!-- Rol -->
                        <div class="mb-8">
                            <label for="rol" class="form-label">Rol</label>
                            <select class="form-control" name="rol" id="modalUserInsertRol">
                                <option value="1">Administrador</option>
                                <option value="2">Usuario</option>
                            </select>
                        </div>

                        <!-- Botón de enviar -->
                        <button type="submit" class="btn btn-dark w-100">Confirmar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

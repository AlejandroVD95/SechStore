<div class="modal fade" id="productModalInsert" tabindex="-1" aria-labelledby="modalInsertNombreTittle" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="modalInsertNombreTittle"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body ">
                <!-- Formalario editar -->
                <div class="col-md-8">
                    <form action="/7PHPSQL/examen-refactor/admin/logica/validations.php" method="POST" enctype="multipart/form-data">
                        <!-- Id oculta -->
                        <input id="hiddenIdInsertProduct" type="hidden" name="insert_producto" value="insert">
                        <!-- Nombre -->
                        <div class="mb-8">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="modalInsertNombre" value="" required>
                        </div>

                        <!-- Correo electrónico -->
                        <div class="mb-8">
                            <label for="categoria" class="form-label">Categoria</label>
                            <input type="text" class="form-control" name='categoria' id="modalInsertCategoria" value="" required>
                        </div>

                        <!-- Precio -->
                        <div class="mb-8">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="text" class="form-control" name='precio' id="modalInsertPrecio" value="" required>
                        </div>
                        <!-- desc_corta -->
                        <div class="mb-8">
                            <label for="desc_corta" class="form-label">Descripcion Corta</label>
                            <textarea class="form-control" id="modalInsertDescCorta" rows="5" name="desc_corta" id="modalInsertDescCorta" required></textarea>
                        </div>

                        <!-- desc_larga -->
                        <div class="mb-8">
                            <label for="desc_larga" class="form-label">Descripcion Larga</label>
                            <textarea class="form-control" id="modalInsertDescLarga" rows="5" name="desc_larga" required></textarea>
                        </div>
                        <!-- insertar imagen -->
                        <div class="mb-8">
                            <label for="imagen" class="form-label">Imagen</label>
                            <input type="file" class="form-control" id="modalInsertImagen" name="foto" accept="image/*" required aria-label="Sube tu foto de perfil">
                        </div>
                        <!-- Botón de enviar -->
                        <button type="submit" class="btn btn-dark w-100">Confirmar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
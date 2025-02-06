<div class="modal fade" id="modalUpdateProduct" tabindex="-1" aria-labelledby="modalUpdateNombreTittle" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="modalUpdateProductoNombreTittle"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body row">
                <!-- Espacio para las fotos del producto -->
                <div class="col-md-4">
                    <img id="modalUpdateProductoImg" src="../" alt="Imagen de producto" class="img-fluid mb-3">
                </div>
                <!-- Formalario editar -->
                <div class="col-md-8">
                    <form action="/7PHPSQL/examen-refactor/admin/logica/validations.php" method="POST" enctype="multipart/form-data">
                        <!-- Id oculta -->
                        <input id="hiddenIDProductoupdate" type="hidden" name="update_producto" value="">
                        <!-- Nombre -->
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="modalUpdateProductoNombre" value="" required>
                        </div>

                        <!-- Categoria -->
                        <div class="mb-3">
                            <label for="categoria" class="form-label">Categoria</label>
                            <input type="text" class="form-control" name='categoria' id="modalUpdateProductoCategoria" value="" >
                        </div>

                        <!-- Precio -->
                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="text" class="form-control" name='precio' id="modalUpdateProductoPrecio" value="" required>
                        </div>
                        <!-- desc_corta -->
                        <div class="mb-3">
                            <label for="desc_corta" class="form-label">Descripcion Corta</label>
                            <textarea class="form-control" rows="5" name="desc_corta" id="modalUpdateProductoDescCorta" required></textarea>
                        </div>

                        <!-- desc_larga -->
                        <div class="mb-3">
                            <label for="desc_larga" class="form-label">Descripcion Larga</label>
                            <textarea class="form-control" id="modalUpdateProductoDescLarga" rows="5" name="desc_larga" required></textarea>
                        </div>
                        <!-- insertar imagen -->
                        <div class="mb-3">
                            <label for="imagen" class="form-label">Imagen</label>
                            <input type="file" class="form-control" id="modalUpdateProductoImagen" name="foto" accept="image/*"  aria-label="Sube tu foto de perfil" >
                        </div>
                        <!-- Botón de enviar -->
                        <button type="submit" class="btn btn-dark w-100">Confirmar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
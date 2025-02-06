<div class="modal fade" id="productoModal<?= $producto['id'] ?>" tabindex="-1" aria-labelledby="productoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="productoModalLabel"><?= $producto['nombre'] ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body row">
                <!-- Espacio para las fotos del producto -->
                <div class="col-md-6">
                    <img src="<?= $producto['url'] ?>" alt="Imagen de producto" class="img-fluid mb-3">
                    
                </div>
                <!-- Detalles del producto -->
                <div class="col-md-6">
                    <p><strong>Precio:</strong> <?= $producto['precio'] ?>€</p>
                    <p><strong>Detalles:</strong> <?= $producto['desc_larga'] ?></p>
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-dark">Añadir al carrito</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
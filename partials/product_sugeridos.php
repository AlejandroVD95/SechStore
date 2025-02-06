<div class="col-6 col-md-4 col-lg-3 mb-4">
    <div class="card h-100 d-flex flex-row">
        <img class="card-img-left" src="<?= $producto['url'] ?>" alt="Imagen de producto" style="width: 120px; height: 120px; object-fit: cover;">
        <div class="card-body p-3 d-flex flex-column justify-content-between">
            <div class="text-left">
                <h6 class="fw-bolder" style="font-size: 0.9rem;"><?= $producto['nombre'] ?></h6>
                <p class="mb-1" style="font-size: 0.9rem;"><?= $producto['precio'] ?></p>
                <p class="text-muted" style="font-size: 0.8rem;"><?= $producto['desc_corta'] ?></p>
            </div>
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center p-1">
                    <a class="btn btn-dark mt-auto" href="#">Añadir al carrito</a>
                </div>
                <div class="text-center">
                    <a class="btn btn-light btn-sm" data-bs-toggle="modal" href="#productoModal<?= $producto['id'] ?>">Detalles</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('modal.php'); ?>

<div class="col mb-5">
    <div class="card h-100">
        <img class="card-img-top" src="<?= $producto['url'] ?>" alt="...">
        <div class="card-body p-4">
            <div class="text-center">
                <h5 class="fw-bolder"><?= $producto['nombre'] ?></h5>
                <p><?= $producto['precio'] ?>€</p>
                <p><?= $producto['desc_corta'] ?></p>
            </div>
        </div>
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center p-1">
                <a class="btn btn-dark mt-auto" onclick="agregarAlCarritoFetch(<?= $producto['id'] ?>, '<?= $producto['nombre'] ?>', <?= $producto['precio'] ?>)">Añadir al carrito</a>
            </div>
            <div class="text-center">
                <a class="btn btn-light btn-sm" data-bs-toggle="modal" href="#productoModal<?= $producto['id'] ?>" >Detalles</a>
            </div>
        </div>
    </div>
</div>
<?php include('modal.php'); ?>
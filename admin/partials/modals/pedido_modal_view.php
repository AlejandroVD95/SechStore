<!-- Modal de Detalles del Pedido -->
<div class="modal fade" id="pedidosModalView" tabindex="-1" aria-labelledby="pedidosModalViewLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="pedidosModalViewLabel">Detalles del Pedido</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <!-- Información general del pedido -->
                <!-- <p id="pedidoModalTitle" class="fw-bold"></p>
                <p id="pedidoTotal"></p>
                <p id="pedidoEmail"></p>
                <p id="pedidoFecha"></p> -->

                <!-- Tabla de Detalles del Pedido -->
                <table class="table table-bordered text-center align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody id="productosPedido">
                        <tr>
                            <td class="id-pedido"></td>
                            <td><img style="width: 50px;" class="url" src=""></td>
                            <td class="nombre"></td>
                            <td class="precio"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

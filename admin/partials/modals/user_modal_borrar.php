<div class="modal fade" id="userModalBorrar" tabindex="-1" aria-labelledby="productoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-s">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="productoUserModalLabel">Atención!</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form action="/7PHPSQL/examen-refactor/admin/logica/validations.php" method="POST">
                    <!-- Id oculta -->
                    <input id="modalDeleteIdHidden" type="hidden" name="delete_user" value="">
                    <!-- Nombre -->
                    <div class="mb-3">
                        <h5 id="modalDeleteNombreUserTittle"></h2>
                    </div>
                    <!-- Botón de confirmar -->
                    <button type="submit" class="btn btn-dark w-100">Confirmar</button>
                </form>
            </div>
        </div>
    </div>
</div>
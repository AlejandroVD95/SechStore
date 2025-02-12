// Modal para Borrar Producto
const modalDeleteProduct = document.getElementById('modalDeleteProduct');

// Verifica si el modal existe antes de añadir el evento
if (modalDeleteProduct) {
    modalDeleteProduct.addEventListener('show.bs.modal', event => {
        // Obtiene el botón que activó el modal
        const btnDelete = event.relatedTarget;
        
        // Extrae el ID del producto a borrar desde el atributo data-bs-id del botón
        const IdProduct = btnDelete.getAttribute('data-bs-id');
        
        // Referencia a los elementos del modal donde se van a insertar los datos
        const modalDeleteHidden = document.getElementById('modalDeleteHidden');
        const modalDeleteTitle = document.getElementById('modalDeleteTitle');

        console.log(IdProduct);

        // Actualiza el título del modal con el ID del producto a borrar
        modalDeleteTitle.textContent = `¿Seguro que deseas borrar el producto con ID: ${IdProduct}?`;
        
        // Asigna el ID del producto al campo oculto para enviarlo al backend
        modalDeleteHidden.value = IdProduct;
    });
}

// Modal para Actualizar Producto
const modalUpdateProduct = document.getElementById('modalUpdateProduct');

// Verifica si el modal existe antes de añadir el evento
if (modalUpdateProduct) {
    modalUpdateProduct.addEventListener('show.bs.modal', event => {
        // Obtiene el botón que activó el modal
        const btnUpdate = event.relatedTarget;
        
        // Extrae el ID del producto a actualizar desde el atributo data-bs-id del botón
        const IdProduct = btnUpdate.getAttribute('data-bs-id');

        // Obtiene los valores actuales del producto desde la tabla
        const nombreProducto = document.getElementById(`nombre${IdProduct}`).innerText;
        const categoriaProducto = document.getElementById(`categoria${IdProduct}`).innerText;
        const descripcionCorta = document.getElementById(`descCorta${IdProduct}`).value;
        const descripcionLarga = document.getElementById(`descLarga${IdProduct}`).value;
        const precioProducto = document.getElementById(`precio${IdProduct}`).innerText;
        const imagenProducto = document.getElementById(`imagen${IdProduct}`).src;

        // Rellenar los campos del modal con los valores obtenidos
        document.getElementById('hiddenIDProductoupdate').value = IdProduct;
        document.getElementById('modalUpdateProductoNombre').value = nombreProducto;
        document.getElementById('modalUpdateProductoNombreTittle').innerText = nombreProducto;
        document.getElementById('modalUpdateProductoCategoria').value = categoriaProducto;
        document.getElementById('modalUpdateProductoDescCorta').value = descripcionCorta;
        document.getElementById('modalUpdateProductoDescLarga').value = descripcionLarga;
        document.getElementById('modalUpdateProductoPrecio').value = precioProducto;
        document.getElementById('modalUpdateProductoImg').src = imagenProducto;
    });
}

// Modal para Borrar Usuario
const userModalBorrar = document.getElementById('userModalBorrar');

// Verifica si el modal existe antes de añadir el evento
if (userModalBorrar) {
    userModalBorrar.addEventListener('show.bs.modal', event => {
        // Obtiene el botón que activó el modal
        const botonBorrarUsuario = event.relatedTarget;
        
        // Extrae el email del usuario a borrar desde el atributo data-bs-id del botón
        const usuarioEmail = botonBorrarUsuario.getAttribute('data-bs-id');
        
        // Referencias a los elementos del modal donde se van a insertar los datos
        const hiddenDeleteId = document.getElementById('modalDeleteIdHidden');
        const modalDeleteTitleUsuario = document.getElementById('modalDeleteNombreUserTittle');

        // Actualiza el título del modal con el email del usuario a borrar
        modalDeleteTitleUsuario.textContent = `¿Seguro que deseas borrar el usuario con email: ${usuarioEmail}?`;
        
        // Asigna el email del usuario al campo oculto para enviarlo al backend
        hiddenDeleteId.value = usuarioEmail;
    });
}

// Modal para Actualizar Usuario
const userModalUpdate = document.getElementById('userModalUpdate');

// Verifica si el modal existe antes de añadir el evento
if (userModalUpdate) {
    userModalUpdate.addEventListener('show.bs.modal', event => {
        // Obtiene el botón que activó el modal
        const botonActualizarUsuario = event.relatedTarget;
        
        // Extrae el email del usuario a actualizar desde el atributo data-bs-id del botón
        const usuarioEmail = botonActualizarUsuario.getAttribute('data-bs-id');

        // Obtiene los valores actuales del usuario desde la tabla
        const nombreUsuario = document.getElementById(`nombre${usuarioEmail}`).innerText;
        const passwordUsuario = document.getElementById(`password${usuarioEmail}`).value;
        const telefonoUsuario = document.getElementById(`telefono${usuarioEmail}`).innerText;
        const direccionUsuario = document.getElementById(`direccion${usuarioEmail}`).value;
        const codigoPostalUsuario = document.getElementById(`cp${usuarioEmail}`).value;
        const provinciaUsuario = document.getElementById(`provincia${usuarioEmail}`).innerText;
        const rolUsuario = document.getElementById(`rol_${usuarioEmail}`).innerText;

        console.log(passwordUsuario);

        // Rellenar los campos del modal con los valores obtenidos
        document.getElementById('hiddenIDUserUpdate').value = usuarioEmail;
        document.getElementById('modalUpdateUserNombre').value = nombreUsuario;
        document.getElementById('modalUpdateNombreUserTittle').innerText = nombreUsuario;
        document.getElementById('modalUpdateUserPassword').value = passwordUsuario;
        document.getElementById('modalUpdateUserEmail').value = usuarioEmail;
        document.getElementById('modalUpdateUserTelef').value = telefonoUsuario;
        document.getElementById('modalUpdateUserDireccion').value = direccionUsuario;
        document.getElementById('modalUpdateUserCp').value = codigoPostalUsuario;
        document.getElementById('modalUpdateUserProvincia').value = provinciaUsuario;
        document.getElementById('modalUpdateUserRol').value = rolUsuario;
    });
}

// Evento para cuando se muestra el modal de detalles del pedido
const pedidosModalView = document.getElementById('pedidosModalView');

// Verifica si el modal existe antes de añadir el evento
if (pedidosModalView) {
    pedidosModalView.addEventListener('show.bs.modal', event => {
        // Obtiene el botón que activó el modal
        const botonVerDetalles = event.relatedTarget;
        
        // Extrae los datos del pedido desde los atributos 'data-bs-*' del botón
        const pedidoId = botonVerDetalles.getAttribute('data-bs-id');

        fetch(`./partials/modals/query_modal.php?id=${pedidoId}`)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            // Asigna los valores a los elementos del modal
            document.querySelector('.id-pedido').innerText = data.pedido[0].id;
            document.querySelector('.nombre').innerText = data.pedido[0].nombre;
            document.querySelector('.precio').innerText =`${data.pedido[0].precio}€`;
            document.querySelector('.url').src = `../${data.pedido[0].url}`;

            
        });
        
    });
}
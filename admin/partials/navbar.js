// Obtener los botones y los paneles
const btnProductos = document.getElementById('btn-productos');
const btnCategorias = document.getElementById('btn-categorias');
const btnUsuarios = document.getElementById('btn-usuarios');
const btnPedidos = document.getElementById('btn-pedidos');

console.log(btnPedidos);

const panelProductos = document.getElementById('panel-productos');
const panelCategorias = document.getElementById('panel-categorias');
const panelUsuarios = document.getElementById('panel-usuarios');
const panelPedidos = document.getElementById('panel-pedidos');

console.log(panelPedidos);

// Función para ocultar todos los paneles
function hideAllPanels() {
    panelProductos.style.display = 'none';
    panelCategorias.style.display = 'none';
    panelUsuarios.style.display = 'none';
    panelPedidos.style.display = 'none';
}

// Evento para el botón Productos
btnProductos.addEventListener('click', (e) => {
    e.preventDefault(); // Evita el comportamiento predeterminado del enlace
    hideAllPanels();
    panelProductos.style.display = 'block'; // Muestra el panel de Productos
    setActiveButton(btnProductos); // Marca el botón como activo
});

// Evento para el botón Categorías
btnCategorias.addEventListener('click', (e) => {
    e.preventDefault();
    hideAllPanels();
    panelCategorias.style.display = 'block'; // Muestra el panel de Categorías
    setActiveButton(btnCategorias);
});

// Evento para el botón Usuarios
btnUsuarios.addEventListener('click', (e) => {
    e.preventDefault();
    hideAllPanels();
    panelUsuarios.style.display = 'block'; // Muestra el panel de Usuarios
    setActiveButton(btnUsuarios);
});

// Evento para el botón Pedidos
btnPedidos.addEventListener('click', (e) => {
    e.preventDefault();
    hideAllPanels();
    panelPedidos.style.display = 'block'; // Muestra el panel de Pedidos
    setActiveButton(btnPedidos);
});

// Función para establecer el botón activo
function setActiveButton(activeButton) {
    const buttons = document.querySelectorAll('.nav-link'); // Selecciona todos los botones
    buttons.forEach(button => button.classList.remove('active')); // Quita la clase "active" de todos
    activeButton.classList.add('active'); // Agrega la clase "active" al botón clicado
}
function agregarAlCarritoFetch(id, nombre, precio) {
    fetch(`logica/actualizar_carrito.php?id=${id}&nombre=${nombre}&precio=${precio}`, {
        'method': 'GET',
        'headers': { 'Content-Type': 'application/x-www-form-urlencoded' }
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            document.getElementById('carrito-count').textContent = data.carrito_count;
        });
}


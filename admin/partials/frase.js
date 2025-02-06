fetch('http://127.0.0.1:8000/api/frases?page=1', {
  method: 'GET',
  headers: {
    'Accept': 'application/ld+json', // Este encabezado es el que estás usando en `curl`
  },
})
  .then(response => response.json()) // Convertimos la respuesta a JSON
  .then(data => {
    // Obtenemos una frase aleatoria de `data.member`
    const randomIndex = Math.floor(Math.random() * data.member.length); // Generamos un índice aleatorio
    const randomFrase = data.member[randomIndex].cita; // Accedemos a la cita en ese índice aleatorio

    // Mostramos la frase aleatoria en un elemento del HTML
    document.getElementById('frase-container').textContent = randomFrase; // Escribimos la frase en el elemento con id 'frase-container'
  })
  .catch(error => console.error('Error:', error)); // Manejo de errores

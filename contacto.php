<?php
session_start();

?>


<!DOCTYPE html>
<html lang="es">
<?php include('partials/head.php') ?>

<body>
  <?php include('partials/navbar.php') ?>
<div class="container my-5">
    <div class="row">
      <div class="col-md-6">
        <h2 class="text-center mb-4">Contáctanos</h2>
        <form action="#" method="POST">
          <!-- Nombre -->
          <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" placeholder="Tu nombre" required>
          </div>
          
          <!-- Correo electrónico -->
          <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="email" placeholder="Tu correo electrónico" required>
          </div>

          <!-- Mensaje -->
          <div class="mb-3">
            <label for="message" class="form-label">Mensaje</label>
            <textarea class="form-control" id="message" rows="5" placeholder="Escribe tu mensaje" required></textarea>
          </div>

          <!-- Botón de enviar -->
          <button type="submit" class="btn btn-dark w-100">Enviar mensaje</button>
        </form>
      </div>
      <div class="col-md-6">
        <h2 class="text-center mb-4">Información de contacto</h2>
        <ul class="list-unstyled">
          <li><strong>Dirección:</strong> Calle Ficticia 123, Ciudad, País</li>
          <li><strong>Teléfono:</strong> +1 (234) 567 890</li>
          <li><strong>Correo electrónico:</strong> contacto@aperture.com</li>
        </ul>

        <!-- Mapa o ubicación (Opcional) -->
        <div class="mt-4">
          <h4 class="text-center mb-3">Nuestra ubicación</h4>
          <!-- Puedes incrustar un mapa de Google aquí -->
          <iframe class="w-100" height="250" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3154.653470681014!2d144.9556514153157!3d-37.817327779751946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d43f5fd0b93%3A0x5045675218c6f57!2sAperture%20Corp!5e0!3m2!1sen!2sus!4v1616011634092!5m2!1sen!2sus" allowfullscreen="" loading="lazy"></iframe>
        </div>
      </div>
    </div>
  </div>
<?php include('partials/footer.php') ?>

</body>

</html>
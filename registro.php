<?php include('partials/navbar.php') ?>

<!DOCTYPE html>
<html lang="es">
<?php include('partials/head.php') ?>

<body>
  <main class="container d-flex justify-content-center align-items-center my-5">
    <div class="card shadow-lg" style="width: 100%; max-width: 400px; border-radius: 15px;">
      <div class="card-body">
        <h5 class="card-title text-center mb-4">Registro</h5>
        <form action="logica/registroPDO.php" method="post">
          <div class="form-floating">
            <input type="text" class="form-control" placeholder="nombre" name="nombre">
            <label for="floatingInput">Nombre</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" placeholder="password" name="password">
            <label for="floatingPassword">Contraseña</label>
          </div>
          <div class="form-floating">
            <input type="text" class="form-control" placeholder="Email" name="email">
            <label for="floatingInput">Email</label>
          </div>
          <div class="form-floating">
            <input type="text" class="form-control" placeholder="Telefono" name="telefono">
            <label for="floatingPassword">Telefono</label>
          </div>
          <div class="form-floating">
            <input type="text" class="form-control" placeholder="Direccion" name="direccion">
            <label for="floatingInput">Direccion</label>
          </div>
          <div class="form-floating">
            <input type="text" class="form-control" placeholder="Codigo Postal" name="cp">
            <label for="floatingPassword">Codigo postal</label>
          </div>
          <div class="form-floating">
            <input type="text" class="form-control" placeholder="Provincia" name="provincia">
            <label for="floatingInput">Provincia</label>
          </div>
          <button class="btn btn-dark w-100 py-2" type="submit">Entrar</button>
        </form>
      </div>
    </div>
  </main>


  <?php include('partials/footer.php') ?>

</body>

</html>
<!DOCTYPE html>
<html lang="es">
<?php include('partials/head.php') ?>

<body>
  <?php include('partials/navbar.php') ?>

  <main class="container d-flex justify-content-center align-items-center" style="height: 70vh;">
    <div class="card shadow-lg" style="width: 100%; max-width: 400px; border-radius: 15px;">
      <div class="card-body">
        <h5 class="card-title text-center mb-4">Iniciar sesión</h5>
        <form action="logica/loginPDOcomprobar.php" method="post">
          <div class="form-floating">
            <input type="text" class="form-control" placeholder="Email" name="email">
            <label for="floatingInput">Email</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" placeholder="Contraseña" name="password">
            <label for="floatingPassword">Contraseña</label>
          </div>
          <div class="form-check text-start my-3">
            <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Recordar
            </label>
          </div>
          <button class="btn btn-dark w-100 py-2" type="submit">Entrar</button>
        </form>
        <?php if (isset($_GET['e']) && $_GET['e'] == 1): ?>
          <div class="alert alert-danger py-1" role="alert">
            Error: Usuario o contraseña incorrectos.
          </div>
        <?php endif; ?>
        
      </div>
    </div>
  </main>

  <?php include('partials/footer.php') ?>

</body>

</html>
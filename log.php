    <?php
    session_start();

    if ($_SESSION['rol'] == 2) {
        header('Location: main.php');
        exit();
    }

    try {
        $mbd = new PDO('mysql:host=localhost;dbname=bd_tienda', 'root', '');
    } catch (PDOException $e) {
        print $e->getMessage();
        die('Error: intenta más tarde');
    }

    try {
        $stm = $mbd->query('SELECT * FROM acceso');
    } catch (\Throwable $th) {
        die('Error: pongase en contacto');
    }

    if (!$stm) die('ERROR');

    ?>
    
    <!DOCTYPE html>
    <html lang="es">

    <?php include('partials/head.php') ?>

    <body>
        <?php include('partials/navbar.php') ?>

        <table class="table table-striped">
            <tr>
                <th>Email</th>
                <th>Password</th>
                <th>Fecha</th>
                <th>Correcto</th>
                <th>Ip</th>
                <th>Id</th>
            </tr>
            <?php while ($fila = $stm->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?= $fila['email'] ?></td>
                    <td><?= $fila['password'] ?></td>
                    <td><?= $fila['fecha'] ?></td>
                    <td><?= $fila['correcto'] ?></td>
                    <td><?= $fila['ip'] ?></td>
                    <td><?= $fila['id'] ?></td>
                </tr>
            <?php endwhile; ?>
        </table>

        <?php include('partials/footer.php') ?>

    </body>

    </html>

<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['email']) && isset($_POST['password'])) {
        // Configuración
        require_once('db_config.php');

        // Recogida de datos del formulario
        $email = trim($_POST['email']);
        $pass = trim($_POST['password']);

        try {
            // Consulta para verificar usuario
            $sql = 'SELECT * FROM usuario WHERE email = :email';
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);

            // Ejecución
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verificación de contraseña (hash)
            // $loginCorrecto = $result && password_verify($pass, $result['password']);

            // Registro de accesos
            $ip = $_SERVER['REMOTE_ADDR'];
            $sqlaccess = 'INSERT INTO acceso (email,password, correcto, ip) VALUES (:email, :password, :correcto, :ip)';
            $stmtaccess = $pdo->prepare($sqlaccess);
            $stmtaccess->bindParam(':email', $email, PDO::PARAM_STR);
            $stmtaccess->bindParam(':password', $pass, PDO::PARAM_STR);
            $stmtaccess->bindParam(':correcto', $result, PDO::PARAM_BOOL);
            $stmtaccess->bindParam(':ip', $ip, PDO::PARAM_STR);
            $stmtaccess->execute();



            // Redirección según el resultado del login
            if ($result) {
                $_SESSION['nombre'] = $result['nombre'];
                $_SESSION['rol'] = $result['rol'];
                $_SESSION['login'] = true;


                header("Location: ../main.php");
                exit;
            } else {
                header('Location: ../loginweb.php?e=1'); // Error de login
                exit;
            }
        } catch (Exception $e) {
            // Manejo de errores (opcional: puedes registrar el error en un archivo de log)
            die('Error en la conexión o consulta: ' . $e->getMessage());
        }
    } else {
        header('Location: ../loginweb.php?e=2'); // Datos incompletos
        exit;
    }
}

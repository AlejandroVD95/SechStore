<?php
session_start();
require 'logica/db_config.php';

if (!isset($_SESSION['carrito']) || count($_SESSION['carrito']) === 0) {
    header("Location: producto.php");
    exit();
}

try {

    $total = array_sum(array_column($_SESSION['carrito'], 'precio'));

    $stmt = $pdo->prepare("INSERT INTO pedidos (total, email_usuario) VALUES (:total, :email_usuario)");
    $stmt->execute([
        'total' => $total,
        'email_usuario' => $_SESSION['email']  
    ]);
    $id_pedido = $pdo->lastInsertId();

    $stmt = $pdo->prepare("INSERT INTO detalles_pedido (id_pedido, id_producto) VALUES (:id_pedido, :id_producto)");

    foreach ($_SESSION['carrito'] as $item) {
        $stmt->execute([
            'id_pedido' => $id_pedido,
            'id_producto' => $item['id']
        ]);
    }

    $_SESSION['carrito'] = [];
} catch (Exception $e) {
 
    die("Error al procesar la compra: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Compra Finalizada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1 style="margin-top: 2em;">¡Gracias por tu compra!</h1>
    <p>Tu pedido ha sido registrado.</p>
    <a href="producto.php" class="btn btn-primary" >Volver a la tienda</a>
</body>
</html>
<?php
require_once '../../database/product_queries.php';

$id = $_GET['id'];

$resultado = [
    'error' => true,
    'mensaje' => 'Error al obtener el pedido',
    'pedido' => []
];

try {
    $pedidos = getPedidosModal($pdo, $id);

    if ($pedidos) {
        $resultado['error'] = false;
        $resultado['mensaje'] = 'Pedido obtenido correctamente';
        $resultado['pedido'] = $pedidos;
    }
} catch (PDOException $e) {
    
}

header('Content-Type: application/json');
echo json_encode($resultado);

?>
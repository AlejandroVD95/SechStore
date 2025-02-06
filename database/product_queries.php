<?php
require_once('logica/db_config.php');

// Obtiene productos por categoría
function getProductosbyCategory($pdo, $categoria) {
    $sql = 'SELECT * FROM productos AS p
            LEFT JOIN fotos AS f
            ON p.id = f.id_producto
            WHERE p.categoria = :categoria';

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':categoria', $categoria, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getProductosRecomendados($pdo, $categoria) {
    $sql = 'SELECT * FROM productos AS p
            LEFT JOIN fotos AS f
            ON p.id = f.id_producto
            WHERE NOT p.categoria = :categoria
            ORDER BY RAND()
            LIMIT 2';

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':categoria', $categoria, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getProductosOfertas($pdo) {

    $sql = 'SELECT * FROM productos AS p
            LEFT JOIN fotos AS f
            ON p.id = f.id_producto
            WHERE p.ofertas = 1';

    $stmt = $pdo->query($sql);

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
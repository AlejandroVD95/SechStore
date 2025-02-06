<?php

$dsn = 'mysql:host=localhost;dbname=bd_tienda';
$username = 'root';
$password = '';

//conexion
try {
    $pdo = new PDO($dsn, $username, $password);
    // echo 'Conexion exitosa' ;
} catch (PDOException $e) {
    //control de errores
    echo 'Error ' . $e->getMessage();
    die();
}

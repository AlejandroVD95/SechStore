<?php

if (
    isset($_POST['nombre']) &&
    isset($_POST['password']) &&
    isset($_POST['email']) &&
    isset($_POST['telefono']) &&
    isset($_POST['direccion']) &&
    isset($_POST['cp']) &&
    isset($_POST['email']) 

) {

    require_once('db_config.php');

    $insert = 'INSERT INTO usuario (nombre, password, email, telef, direccion, cp) VALUES (:nombre, :password, :email, :telefono, :direccion, :cp) ';

    $stm_insert = $pdo->prepare($insert);

    $stm_insert->bindValue(':nombre',  $_POST['nombre']);
    $stm_insert->bindValue(':password', $_POST['password']);
    $stm_insert->bindValue(':email', $_POST['email']);
    $stm_insert->bindValue(':telefono', $_POST['telefono']);
    $stm_insert->bindValue(':direccion', $_POST['direccion']);
    $stm_insert->bindValue(':cp', $_POST['cp']);
    $stm_insert->bindValue(':email', $_POST['email']);
 

    try {
        $ok = $stm_insert->execute();
    } catch (\Throwable $th) {
        $ok = false;
        echo $th;
    }

    if ($ok) {

?>      <div class="alert alert-success alert-dismissible fade show" role="alert">
            USUARIO CREADO!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div><?php
            } else {
                ?> <div class="alert alert-danger alert-dismissible fade show" role="alert">
            ERROR AL CREAR EL USUARIO!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div><?php
            }
        }

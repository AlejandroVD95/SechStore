<?php

if (!isset($_SESSION['login'])) {
    header('Location: ../main.php');
    exit();
} else {
    $haylogin = $_SESSION['login'];
    $admin = $_SESSION['rol'];
    
    if ($admin != 1) {
        header('Location: ../main.php');
        exit();
    }
}

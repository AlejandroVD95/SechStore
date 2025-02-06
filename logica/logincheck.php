<?php

if (!isset($_SESSION['login'])) {
    header('Location: loginweb.php');
    exit();
}

?>
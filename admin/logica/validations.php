<?php

include '../database/product_queries.php';

if (isset($_POST['insert_producto'])) {
    $shortRutaImg = imagenSubir();
    if ($shortRutaImg) {
        addProductos($pdo, $shortRutaImg);
    }
}
if (isset($_POST['update_producto'])) {

    // Comprobar si se ha subido una nueva imagen
    if (isset($_FILES['foto'])) {
        $shortRutaImg = imagenSubir();
    } else {
        // Si no se subió una nueva imagen, no se actualiza la foto
        $shortRutaImg = null;
    }
    updateProductos($pdo, $shortRutaImg);
}

if (isset($_POST['delete_producto'])) {
    deleteProductos($pdo);
}

function imagenSubir()
{
    $file = $_FILES['foto'];
    $categoria = $_POST['categoria'];

    // Verificar si el archivo existe
    if (!isset($file)) {
        echo "Error: No se detectó un archivo para subir.";
        return null;
    }

    $fileTemp = $file['tmp_name'];
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    // Validar extensión del archivo
    if (!in_array($fileExtension, $allowedExtensions)) {
        echo "Error: Formato de archivo no permitido.";
        return null;
    }

    // Sanitizar el nombre del archivo
    $fileName = preg_replace("/[^a-zA-Z0-9\._-]/", "", basename($file['name']));
    $uniqueFileName = uniqid() . '_' . $fileName;

    // Directorio base donde guardarás las imágenes
    if ($categoria == 1) {
        $uploadDir = 'C:/xampp/htdocs/7PHPSQL/examen-refactor/IMG/HOMBRE/';
        $shortRutaImg = 'IMG/HOMBRE/';
    }else{
        $uploadDir = 'C:/xampp/htdocs/7PHPSQL/examen-refactor/IMG/MUJER/';
        $shortRutaImg = 'IMG/MUJER/';
    }

    // Crear la ruta completa al archivo
    $rutaImg = $uploadDir . $uniqueFileName;
    $shortRutaImg = $shortRutaImg . $uniqueFileName;

    // Crear el directorio si no existe
    if (!is_dir($uploadDir)) {
        if (!mkdir($uploadDir, 0777, true)) {
            echo "Error: No se pudo crear el directorio de subida.";
            return null;
        }
    }

    // Mover el archivo al directorio especificado
    if (move_uploaded_file($fileTemp, $rutaImg)) {
        echo "El archivo ha sido subido correctamente.";
        return $shortRutaImg; // Devolver la ruta completa del archivo
    } else {
        echo "Error al guardar el archivo.";
        return null;
    }
}


if (isset($_POST['insert_user'])) {
    addUsuario($pdo);
}

if (isset($_POST['update_user'])) {
    updateUsuario($pdo);
}

if (isset($_POST['delete_user'])) {
    deleteUsuario($pdo);
}
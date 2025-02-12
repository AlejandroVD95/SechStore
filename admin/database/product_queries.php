<?php
require_once('db_config.php');
// PRODUCTOS

// Obtiene productos 
function getProductos($pdo)
{
    $sql = 'SELECT * FROM productos AS p
            LEFT JOIN fotos AS f
            ON p.id = f.id_producto';

    $stmt = $pdo->query($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Actualizar productos
function updateProductos($pdo, $nameProduct = null)
{
    $id = $_POST['update_producto'];

    // Actualización de los datos del producto
    $sql = 'UPDATE productos SET nombre = :nombre,  
                                  categoria = :categoria, 
                                  desc_corta = :desc_corta,
                                  desc_larga = :desc_larga,
                                  precio = :precio
                                  WHERE id = :identificador';

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nombre', $_POST['nombre'], PDO::PARAM_STR);
    $stmt->bindParam(':categoria', $_POST['categoria'], PDO::PARAM_STR);
    $stmt->bindParam(':desc_corta', $_POST['desc_corta'], PDO::PARAM_STR);
    $stmt->bindParam(':desc_larga', $_POST['desc_larga'], PDO::PARAM_STR);
    $stmt->bindParam(':precio', $_POST['precio'], PDO::PARAM_INT);
    $stmt->bindParam(':identificador', $id, PDO::PARAM_INT);

    // Ejecutar la actualización del producto
    $stmt->execute();

    // Solo actualizar la foto si se ha subido una nueva imagen
    if ($nameProduct) {
        $sql = 'UPDATE fotos SET url = :url WHERE id_producto = :identificador';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':url', $nameProduct, PDO::PARAM_STR);
        $stmt->bindParam(':identificador', $id, PDO::PARAM_INT);

        // Si la actualización de la foto es exitosa
        if ($stmt->execute()) {
            $_SESSION['producto_actualizado'] = true;
            header('location: /7PHPSQL/examen-refactor/admin/panel.php');
            exit(); // Evitar que el script siga ejecutándose después del redireccionamiento
        } else {
            $_SESSION['producto_actualizado'] = false;
            header('location: /7PHPSQL/examen-refactor/admin/panel.php');
            exit();
        }
    } else {
        // Si no hay nueva foto, redirige sin actualizar la foto
        $_SESSION['producto_actualizado'] = true;
        header('location: /7PHPSQL/examen-refactor/admin/panel.php');
        exit();
    }
}

function deleteProductos($pdo)
{
    $id = $_POST['delete_producto'];

    $sql = 'DELETE FROM productos WHERE id = :identificador;';

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':identificador', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        $_SESSION['producto_borrado'] = true;
        header('location:/7PHPSQL/examen-refactor/admin/panel.php');
    } else {
        $_SESSION['producto_borrado'] = false;
        header('location:./7PHPSQL/examen-refactor/admin/panel.php');
    }
}



function addProductos($pdo, $nameProduct)
{
    // Inserción en productos
    $sql = 'INSERT INTO productos (nombre, categoria, desc_corta, desc_larga, precio) VALUES (:nombre, :categoria, :desc_corta, :desc_larga, :precio);';

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nombre', $_POST['nombre'], PDO::PARAM_STR);
    $stmt->bindParam(':categoria', $_POST['categoria'], PDO::PARAM_INT);
    $stmt->bindParam(':desc_corta', $_POST['desc_corta'], PDO::PARAM_STR);
    $stmt->bindParam(':desc_larga', $_POST['desc_larga'], PDO::PARAM_STR);
    $stmt->bindParam(':precio', $_POST['precio'], PDO::PARAM_INT);

    if ($stmt->execute()) {
        $id_anterior = $pdo->lastInsertId();

        // Validar que se obtuvo un ID válido
        if (!$id_anterior) {
            echo "Error: No se pudo obtener el ID del producto insertado.";
            return;
        }

        // Inserción en fotos
        $sql = 'INSERT INTO fotos (url, id_producto) VALUES (:url, :id_producto);';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_producto', $id_anterior, PDO::PARAM_INT);
        $stmt->bindParam(':url', $nameProduct, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $_SESSION['producto_insertado'] = true;
            header('location: /7PHPSQL/examen-refactor/admin/panel.php');
        } else {
            $_SESSION['producto_insertado'] = false;
            header('location: /7PHPSQL/examen-refactor/admin/panel.php');
        }
    } else {
        echo "Error al insertar el producto.";
    }
}

// USUARIOS

function getUsuarios($pdo)
{
    $sql = 'SELECT * FROM usuario';

    $stmt = $pdo->query($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function addUsuario($pdo)
{
    // Verificar si el email ya existe
    $email = $_POST['email'];

    // Consulta SQL para verificar si ya existe un usuario con el mismo email
    $sql = 'SELECT COUNT(*) FROM usuario WHERE email = :email';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    // Obtener el resultado de la consulta
    $count = $stmt->fetchColumn();

    // Si el email ya existe, devolver un error
    if ($count > 0) {
        $_SESSION['error_email'] = 'Este email ya está registrado.';
        header('Location: /7PHPSQL/examen-refactor/admin/panel.php');
        exit();
    }

    // Si el email no existe, proceder a la inserción
    $sql = 'INSERT INTO usuario (nombre, password, email, telef, direccion, cp, provincia, rol) 
            VALUES (:nombre, :password, :email, :telef, :direccion, :cp, :provincia, :rol)';

    // Preparamos la consulta
    $stmt = $pdo->prepare($sql);

    // Vinculamos los parámetros con los valores del formulario
    $stmt->bindParam(':nombre', $_POST['nombre'], PDO::PARAM_STR);
    $stmt->bindParam(':password', $_POST['password'], PDO::PARAM_STR);
    $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
    $stmt->bindParam(':telef', $_POST['telef'], PDO::PARAM_STR);
    $stmt->bindParam(':direccion', $_POST['direccion'], PDO::PARAM_STR);
    $stmt->bindParam(':cp', $_POST['cp'], PDO::PARAM_STR);
    $stmt->bindParam(':provincia', $_POST['provincia'], PDO::PARAM_STR);
    $stmt->bindParam(':rol', $_POST['rol'], PDO::PARAM_STR);

    // Ejecutamos la consulta
    if ($stmt->execute()) {
        // Si la inserción fue exitosa, redirigimos
        $_SESSION['user_insertado'] = true;
        header('Location: /7PHPSQL/examen-refactor/admin/panel.php');
    } else {
        // Si ocurrió un error, lo notificamos
        $_SESSION['user_insertado'] = false;
        header('Location: /7PHPSQL/examen-refactor/admin/panel.php');
    }
}

function updateUsuario($pdo)
{
    // Obtenemos el email desde el formulario
    $email = $_POST['email'];
    $id = $_POST['update'];

    // Verificar si el email ya existe en otro usuario
    $sql = 'SELECT COUNT(*) FROM usuario WHERE email = :email AND email != :current_email';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':current_email', $id, PDO::PARAM_STR); // Verificar contra el email actual
    $stmt->execute();

    // Obtener el resultado de la consulta
    $count = $stmt->fetchColumn();

    // Si el email ya existe, devolver un error
    if ($count > 0) {
        $_SESSION['error_email'] = 'Este email ya está registrado.';
        header('Location: /7PHPSQL/examen-refactor/admin/panel.php');
        exit();
    }

    // Si el email no existe, proceder a la actualización
    $sql = 'UPDATE usuario SET 
                nombre = :nombre,
                password = :password,
                telef = :telef,
                direccion = :direccion,
                cp = :cp,
                provincia = :provincia,
                rol = :rol
            WHERE email = :email';

    // Preparamos la consulta
    $stmt = $pdo->prepare($sql);

    // Vinculamos los parámetros con los valores del formulario
    $stmt->bindParam(':nombre', $_POST['nombre'], PDO::PARAM_STR);
    $stmt->bindParam(':password', $_POST['password'], PDO::PARAM_STR);
    $stmt->bindParam(':telef', $_POST['telef'], PDO::PARAM_STR);
    $stmt->bindParam(':direccion', $_POST['direccion'], PDO::PARAM_STR);
    $stmt->bindParam(':cp', $_POST['cp'], PDO::PARAM_STR);
    $stmt->bindParam(':provincia', $_POST['provincia'], PDO::PARAM_STR);
    $stmt->bindParam(':rol', $_POST['rol'], PDO::PARAM_STR);
    $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);

    // Ejecutamos la consulta
    if ($stmt->execute()) {
        // Si la actualización fue exitosa, redirigimos
        $_SESSION['user_actualizado'] = true;
        header('Location: /7PHPSQL/examen-refactor/admin/panel.php');
    } else {
        // Si ocurrió un error, lo notificamos
        $_SESSION['user_actualizado'] = false;
        header('Location: /7PHPSQL/examen-refactor/admin/panel.php');
    }
}

function deleteUsuario($pdo)
{
    $sql = 'DELETE FROM usuario WHERE email = :email';

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $_POST['delete_user'], PDO::PARAM_STR);

    if ($stmt->execute()) {
        $_SESSION['user_borrado'] = true;
        header('Location: /7PHPSQL/examen-refactor/admin/panel.php');
    } else {
        $_SESSION['user_borrado'] = false;
        header('Location: /7PHPSQL/examen-refactor/admin/panel.php');
    }
}

// FUNCIONES PARA CATEGORÍAS

// Obtener todas las categorías
function getCategorias($pdo) {
    $sql = 'SELECT * FROM categorias';
    $stmt = $pdo->query($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Añadir nueva categoría
function addCategoria($pdo) {
    $nombre = $_POST['nombre_categoria'];

    // Verificar si la categoría ya existe
    $sql = 'SELECT COUNT(*) FROM categorias WHERE nombre_categoria = :nombre';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->execute();

    $count = $stmt->fetchColumn();

    if ($count > 0) {
        $_SESSION['error_categoria'] = 'Esta categoría ya existe.';
        header('Location: /7PHPSQL/examen-refactor/admin/panel.php');
        exit();
    }

    // Insertar nueva categoría
    $sql = 'INSERT INTO categoria (nombre_categoria) VALUES (:nombre)';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);

    if ($stmt->execute()) {
        $_SESSION['categoria_insertada'] = true;
    } else {
        $_SESSION['categoria_insertada'] = false;
    }
    header('Location: /7PHPSQL/examen-refactor/admin/panel.php');
}

// Actualizar categoría
function updateCategoria($pdo) {
    $id = $_POST['update'];
    $nuevoNombre = $_POST['nombre_categoria'];

    // Verificar si el nuevo nombre ya existe en otra categoría
    $sql = 'SELECT COUNT(*) FROM categorias 
            WHERE nombre_categoria = :nombre 
            AND id_categoria != :id';
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nombre', $nuevoNombre, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $count = $stmt->fetchColumn();

    if ($count > 0) {
        $_SESSION['error_categoria'] = 'Este nombre de categoría ya existe.';
        header('Location: /7PHPSQL/examen-refactor/admin/panel.php');
        exit();
    }

    // Actualizar categoría
    $sql = 'UPDATE categorias SET nombre_categoria = :nombre 
            WHERE id_categoria = :id';
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nombre', $nuevoNombre, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        $_SESSION['categoria_actualizada'] = true;
    } else {
        $_SESSION['categoria_actualizada'] = false;
    }
    header('Location: /7PHPSQL/examen-refactor/admin/panel.php');
}

// Eliminar categoría
function deleteCategoria($pdo) {
    $sql = 'DELETE FROM categorias WHERE id_categoria = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $_POST['delete_categoria'], PDO::PARAM_INT);

    if ($stmt->execute()) {
        $_SESSION['categoria_borrada'] = true;
    } else {
        $_SESSION['categoria_borrada'] = false;
    }
    header('Location: /7PHPSQL/examen-refactor/admin/panel.php');
}

// FUNCIONES PARA PEDIDOS

// Obtener todas los pedidos

function getPedidos($pdo)
{
    // Consulta SQL para obtener todos los pedidos de la base de datos
    $sql = 'SELECT * FROM pedidos';

    // Ejecutamos la consulta
    $stmt = $pdo->query($sql);
    $stmt->execute();

    // Retornamos los resultados
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
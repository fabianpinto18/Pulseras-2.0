<?php
include("conexion.php");
include("funciones.php");
if ($_POST["operacion"] == "Crear") {
    $imagen = '';
    if ($_FILES["imagen"]["name"] != '') {
        $imagen = subir_imagen();
    }
    echo $_POST["nombre"];
    echo $_POST["precio"];
    echo $_POST["categoria"];
    echo $imagen;
    $stmt = $mbd->prepare("INSERT INTO productos(nombre,precio,imagen_id,categoria_id)VALUES (:nombre,:precio,:imagen,:categoria)");
    $stmt->bindParam(':nombre', $_POST["nombre"]);
    $stmt->bindParam(':precio', $_POST["precio"]);
    $stmt->bindParam(':imagen', $imagen);
    $stmt->bindParam(':categoria', $_POST["categoria"]);
    $resultado = $stmt->execute();
    if (!empty($resultado)) {
        echo 'registros Creados';
    }
}


if ($_POST["operacion"] == "Editar") {
    $imagen = '';
    if ($_FILES["imagen"]["name"] != '') {
        $imagen = subir_imagen();
    }else{
        $imagen = $_POST["imagen_producto_oculta"];

    }


    $stmt = $mbd->prepare("UPDATE productos SET nombre=:nombre,precio=:precio,imagen_id=:imagen,categoria_id=:categoria WHERE id =:id");
    $stmt->bindParam(':nombre', $_POST["nombre"]);
    $stmt->bindParam(':precio', $_POST["precio"]);
    $stmt->bindParam(':imagen', $imagen);
    $stmt->bindParam(':categoria', $_POST["categoria"]);
    $stmt->bindParam(':id', $_POST["id_producto"]);
    $resultado = $stmt->execute();
    if (!empty($resultado)) {
        echo 'registros Actualizado';
    }
}



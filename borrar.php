<?php

include("conexion.php");
include("funciones.php");

if (isset($_POST["id_producto"])) {
    $imagen = obtener_nombre_imagen($_POST["id_producto"]);
    if ($imagen!="") {
        unlink("imagenes/productos/".$imagen);
    }


    $stmt = $mbd->prepare("DELETE FROM productos WHERE id =:id");
    $stmt->bindParam(':id', $_POST["id_producto"]);
    $resultado = $stmt->execute();
    if (!empty($resultado)) {
        echo 'registros Borrado';
    }
}
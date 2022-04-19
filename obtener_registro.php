<?php

include_once("conexion.php");
include_once("funciones.php");

if (isset($_POST["id_producto"])) {
    $salida = array();
    $stmt = $mbd->prepare("SELECT * FROM productos WHERE id = '" . $_POST["id_producto"] . "' LIMIT 1");
    $stmt->execute();
    $resultado = $stmt->fetchAll();

    foreach ($resultado as $fila) {
        $salida["id"] = $fila["id"];
        $salida["nombre"] = $fila["nombre"];
        $salida["precio"] = $fila["precio"];
        $salida["categoria_id"] = $fila["categoria_id"];
        if ($fila["imagen_id"] != "") {
            $salida["imagen_id"] = '<img src="imagenes/productos/' . $fila["imagen_id"] . ' " class="img-thumbnail" width="50" height="50" /><input type="hidden" name="imagen_producto_oculta" value="' . $fila["imagen_id"] . '"';
        }else{
            $salida["imagen_id"] = '<input type="hidden" name="imagen_producto_oculta" value="' . $fila["imagen_id"] . '"';
        }
        
    }
}
echo json_encode($salida);
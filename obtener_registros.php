<?php
include_once("conexion.php");
include_once("funciones.php");
$query = "";
$salida = array();
$query = "SELECT * FROM productos ";

if (isset($_POST["search"]["value"])) {
    $query .= ' WHERE nombre LIKE "%' . $_POST["search"]["value"] . '%" ';
    
}

if (isset($_POST["order"])) {
    $query .= ' ORDER BY ' . $_POST["order"]['0']["column"] . ' ' . $_POST["order"][0]['dir'] . ' ';
} else {
    $query .= ' ORDER BY id DESC';
}

if ($_POST["length"] != -1) {
    $query .= ' LIMIT ' . $_POST["start"] . ',' . $_POST["length"];
}
$stmt =$mbd->prepare($query);
$stmt->execute();
$resultado = $stmt->fetchAll();
$datos = array();
$filtered_rows = $stmt->rowCount();
foreach ($resultado as $fila) {
    $imagen = '';
    if ($fila["imagen_id"] != '') {
        $imagen = '<img src="imagenes/productos/' . $fila["imagen_id"] . ' " class="img-thumbnail" width="50" height="50" />';
    } else {
        $imagen = '';
    }

    $sub_array = array();
    $sub_array[] = $fila["id"];
    $sub_array[] = $fila["nombre"];
    $sub_array[] = $fila["precio"];
    $sub_array[] = $imagen;
    $sub_array[] = '<button type="button" name="editar" id="' . $fila["id"] . ' " class="btn btn-warning btn-xs editar">Editar</button>';
    $sub_array[] = '<button type="button" name="borrar" id="' . $fila["id"] . ' " class="btn btn-danger btn-xs borrar">Borrar</button>';
    $datos[]=$sub_array;
}

$salida = array(
    "draw" => intval($_POST["draw"]),
    "recordsTotal" => $filtered_rows,
    "recordsFiltered" => obtener_todos_registros(),
    "data" => $datos
);

echo json_encode($salida);
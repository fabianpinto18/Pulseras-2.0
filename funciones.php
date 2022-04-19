<?php 

function subir_imagen(){
    if(isset($_FILES["imagen"])){

        $extension = explode('.',$_FILES["imagen"]["name"]);
        $nuevo_nombre = rand() .'.'.$extension[1];
        $ubicacion = './imagenes/productos/'.$nuevo_nombre;
        move_uploaded_file($_FILES["imagen"]["tmp_name"],$ubicacion);
        return $nuevo_nombre;
    }
}

function obtener_nombre_imagen($id_producto){
    include("conexion.php");
    $stmp = $mbd->prepare("SELECT imagen_id FROM productos WHERE id = '$id_producto' ");
    $stmp->execute();
    $resultado = $stmp->fetchAll();
    foreach ($resultado as $value) {
        return $value["imagen_id"];
    }
}


function obtener_todos_registros(){
    include("conexion.php");
    $stmp =  $mbd->prepare("SELECT * FROM productos  ");
    $stmp->execute();
    $resultado = $stmp->fetchAll();
    return $stmp->rowCount();
}
?>
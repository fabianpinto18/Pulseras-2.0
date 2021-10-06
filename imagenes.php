<?php

use function PHPSTORM_META\type;

include("conexion.php");


if ($_FILES["imagen"]["error"]>0) {
    echo"Error al cargar el archivo";
}else{
    $imagenes_permitidas = array("image/gif","image/png","aplication/pdf",);
     $limite_imagen = 200;
    // if (in_array($_FILES["imagen"]["type"],$imagenes_permitidas) && $_FILES["imagen"]["size"]<=$limite_imagen*1024) {
        $ruta="imagenes/";
        $archivo=$ruta.$_FILES["imagen"]["name"];
        if (!file_exists($ruta)) {
            mkdir($ruta);
        }if (!file_exists($archivo)) {
            $resultado=@move_uploaded_file($_FILES["imagen"]["tmp_name"],$archivo);
            if ($resultado) {
                echo"Se ha guardado la imagen";
                $imagen_2=$_FILES["imagen"]["name"];
                $sql = "INSERT INTO `imagenes`(`nombre`) VALUES ('$imagen_2')";
                $res = $mbd -> prepare($sql);
                // $res -> bindParam(':nombre',$_FILES["imagen"]["name"],PDO::PARAM_STR, 12);
                if ($res -> execute()) {
                    header("location:config.php");
                }
                
            }else{
                echo"Puto niño";
            }
        }
    // }else{
    //     echo"El tipo de imagen no es correcta";
    // // }
}




?>
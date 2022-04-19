<?php

use function PHPSTORM_META\type;

include("conexion.php");

$sql = "SELECT `nombre` FROM `imagenes` " ;
$llamado_1 = $mbd->prepare($sql);
$llamado_1->execute();
$imagenes_bd = $llamado_1->fetchAll();
$imagenes_repetida="";
$descripcion="";


if ($_FILES["imagen"]["error"]>0) {
    echo"Error al cargar el archivo";
}else{
    $imagenes_permitidas = array("image/gif","image/png","aplication/pdf","image/jpge",);
     $limite_imagen = 200;
    // if (in_array($_FILES["imagen"]["type"],$imagenes_permitidas) && $_FILES["imagen"]["size"]<=$limite_imagen*1024) {
        $ruta="imagenes/";
        foreach ($imagenes_bd as $buscar_repetidas):

            
        if($buscar_repetidas["nombre"] == $_FILES["imagen"]["name"] ){
            $imagenes_repetida="Se repitio la imagen ";
        }



        endforeach;
        
        $archivo=$ruta.$_FILES["imagen"]["name"];
        $imagen_2=$_FILES["imagen"]["name"];
        if(!empty($_POST["descripcion"])){
            $descripcion=$_POST["descripcion"];
        }else{
            $descripcion="Nada";
        }

        if (!file_exists($ruta)) {
            mkdir($ruta);
        }if (!file_exists($archivo)) {
            $resultado=@move_uploaded_file($_FILES["imagen"]["tmp_name"],$archivo);
            if ($resultado) {
                echo"Se ha guardado la imagen";
                
                
               
                if(!empty($imagenes_repetida)){
                    echo "error";
                    $sql = "UPDATE `imagenes` SET `categoria`='$descripcion' WHERE `nombre` = '$imagen_2' ";
                    $res = $mbd -> prepare($sql);
                    $res -> execute();
                    // $res -> bindParam(':nombre',$_FILES["imagen"]["name"],PDO::PARAM_STR, 12);
                    if (!empty($_POST["descripcion"])){
                        header("location:config_2.php");
                    }
                }else{
                    $sql = "INSERT INTO `imagenes`(`nombre`,`categoria`) VALUES ('$imagen_2','$descripcion')";
                $res = $mbd -> prepare($sql);
                $res -> execute();
                // $res -> bindParam(':nombre',$_FILES["imagen"]["name"],PDO::PARAM_STR, 12);
                if (!empty($_POST["descripcion"])){
                    header("location:config_2.php");
                }
                }
                
                
            }else{
                header("location:image.php");
            }
        }
    else{
        echo "error";
                    $sql = "UPDATE `imagenes` SET `categoria`='$descripcion' WHERE `nombre` = '$imagen_2' ";
                    $res = $mbd -> prepare($sql);
                    $res -> execute();
                    if (!empty($_POST["descripcion"])){
                        header("location:config_2.php");
                    }
                    // $res -> bindParam(':nombre',$_FILES["imagen"]["name"],PDO::PARAM_STR, 12);
                    // if (!empty($_POST["descripcion"])){
                    //     header("location:config_2.php");
                    // }
    }
}




?>
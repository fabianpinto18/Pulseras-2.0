<?php 
include('conexion.php');

$titulo1= $_POST["title1"];
$sql = "UPDATE `descripcion` SET `id`='1',`titulo`='$titulo1' WHERE id= 1";
$res = $mbd -> prepare($sql);
$res -> execute();

$tendencia1= $_POST["tendencia1"];
$costo1= $_POST["costo1"];
$sql = "UPDATE `descripcion` SET `id`='2',`titulo`='$tendencia1',`descripcion`='$costo1' WHERE id= 2";
$res = $mbd -> prepare($sql);
$res -> execute();


$tendencia2= $_POST["tendencia2"];
$costo2= $_POST["costo2"];
$sql = "UPDATE `descripcion` SET `id`='3',`titulo`='$tendencia2',`descripcion`='$costo2' WHERE id= 3";
$res = $mbd -> prepare($sql);
$res -> execute();


$tendencia3= $_POST["tendencia3"];
$costo3= $_POST["costo3"];
$sql = "UPDATE `descripcion` SET `id`='4',`titulo`='$tendencia3',`descripcion`='$costo3' WHERE id= 4";
$res = $mbd -> prepare($sql);
$res -> execute();

$tendencia4= $_POST["tendencia4"];
$costo4= $_POST["costo4"];
$sql = "UPDATE `descripcion` SET `id`='5',`titulo`='$tendencia4',`descripcion`='$costo4' WHERE id= 5";
$res = $mbd -> prepare($sql);
$res -> execute();

$titulo2= $_POST["title2"];
$descripcion2= $_POST["descripcion2"];
$sql = "UPDATE `descripcion` SET `id`='6',`titulo`='$titulo2',`descripcion`='$descripcion2' WHERE id= 6";
$res = $mbd -> prepare($sql);
$res -> execute();

$titulo3= $_POST["title3"];
$descripcion3= $_POST["descripcion3"];
$sql = "UPDATE `descripcion` SET `id`='7',`titulo`='$titulo3',`descripcion`='$descripcion3'  WHERE id= 7";
$res = $mbd -> prepare($sql);
if ($res -> execute()) {
    header("location:config_2.php");
}

// $res -> bindParam(':nombre',$_FILES["imagen"]["name"],PDO::PARAM_STR, 12);

// $sql = "INSERT INTO `imagenes`(`nombre`) VALUES ('$imagen_2')";
// $res = $mbd -> prepare($sql);
// // $res -> bindParam(':nombre',$_FILES["imagen"]["name"],PDO::PARAM_STR, 12);
// if ($res -> execute()) {
//     header("location:config.php");
// }


?>
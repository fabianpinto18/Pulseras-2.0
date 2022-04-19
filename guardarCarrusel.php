<?php
include('conexion.php');

if(isset($_POST['imagen'])){
    
$imagen1= $_POST['imagen'][0] ;
$imagen2= $_POST['imagen'][1] ;
$imagen3= $_POST['imagen'][2] ;


$sql = "UPDATE `imagenes` SET `categoria`='Nada' WHERE categoria='Carrusel'";
$res = $mbd -> prepare($sql);
$res -> execute();

$sql = "UPDATE `imagenes` SET `categoria`='Carrusel' WHERE nombre='$imagen1'";
$res = $mbd -> prepare($sql);
$res -> execute();

$sql = "UPDATE `imagenes` SET `categoria`='Carrusel' WHERE nombre='$imagen2'";
$res = $mbd -> prepare($sql);
$res -> execute();

$sql = "UPDATE `imagenes` SET `categoria`='Carrusel' WHERE nombre='$imagen3'";
$res = $mbd -> prepare($sql);
if ($res -> execute()) {
    header("location:image.php");
}
}










?>
<?php
include("conexion.php");
$sql = "SELECT * FROM categorias";
$sentencia = $mbd->prepare($sql);
$sentencia -> execute();
$datos=$sentencia->fetchAll();



echo json_encode($datos);


?>
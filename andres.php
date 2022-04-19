<?php
include("conexion.php");
$sql = "SELECT * FROM productos WHERE id="+ $_GET["datos"];
$sentencia = $mbd->prepare($sql);
$sentencia -> execute();
$datos=$sentencia->fetchAll();



// echo json_encode($datos);
// if (!empty($_POST["id"])) {
//     echo"Entre viva cristo rey";
//     $id=$_POST["id"];
//     $nombre=$_POST["nombre"];
//     $sql = "UPDATE categorias SET nombre=:nombre WHERE id=:id";
//     $sentencia = $mbd->prepare($sql);
//     $sentencia ->bindParam(':id',$_POST["id"]);
//     $sentencia ->bindParam(':nombre',$_POST["nombre"]);
//     $sentencia -> execute();
//     echo $nombre;
//     echo $id;
//   };
?>
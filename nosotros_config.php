<?php 

session_start();
include('conexion.php');
include_once('header.php');


if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $sql = "SELECT `id`, `correo`,  `nombre`, `contraseña` FROM `users` WHERE `id`= '$id'";
    $sentencia = $mbd->prepare($sql);
    // $sentencia -> bindParam (':id',$_SESSION["id"]);
    $sentencia->execute();
    $result = $sentencia->fetch(PDO::FETCH_ASSOC);
  
    if (count($result) > 0) {
      $users = $result;
    } else {
      echo "Mensaje bla bla bla";
    }
  }else{
    header("location:admin.php");
  }
  


?>
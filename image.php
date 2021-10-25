<?php
session_start();
include('conexion.php');
include_once('header.php');

$sql = "SELECT  * FROM `descripcion`  ";
$llamado = $mbd->prepare($sql);
$llamado->execute();
$descripcion = $llamado->fetchAll();
$sql = "SELECT  `nombre` FROM `imagenes`";
$llamado_1 = $mbd->prepare($sql);
$llamado_1->execute();
$imagenes = $llamado_1->fetchAll();
// foreach($descripcion as $titulo){
//   echo var_dump($titulo);
// }
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
}


?>

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Collapsible sidebar using Bootstrap 4</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <title>Este si es</title>
</head>
<body>


  <header>
   



  </header>

  


  

  
  
  <div class="wrapper">

<!-- Sidebar -->
<nav id="sidebar">
    <div class="sidebar-header">
        <h3>Barra lateral</h3>
    </div>

    <ul class="list-unstyled components">
        <p>Pagina de Joyas</p>
        <li class="active">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="index.php">Principal</a>
                </li>
                <li>
                    <a href="colecciones.php">Coleeciones</a>
                </li>
                <li>
                    <a href="coleccion-pulseras.php">Coleccion pulseras</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="image.php">Carrusel</a>
        </li>
        <!-- <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
            </ul>
        </li> -->
        <li>
            <a href="ejemplos.php">Formulario Andres</a>
        </li>
        <li>
            <a href="#">Contact</a>
        </li>
    </ul>
</nav>

<div class="ventana" id="vent">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/carrusel/carrusel8.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/carrusel/carrusel8.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/carrusel/carrusel8.png" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  </div>
</div>








   <!-- <div class="">
   <form class="imagenes_base" enctype="multipart/form-data" action="imagenes.php" method="POST">
    <label for="">Imagen</label>
    <input accept="image/*" name="imagen" type="file">
    <button type="submit">ENVIAR</button>
  </form>
  
    <?php


    foreach ($imagenes as $imagen) :

    ?>
  
  <img  src="imagenes/<?= $imagen["nombre"] ?>" alt="">
  <?php endforeach ?> 
  </div>  -->

  

 
  <!-- <form enctype="multipart/form-data" action="imagenes.php" method="POST">
    <div class="input-group flex-nowrap imagenes_base">
      <div class="input-group-prepend">
        <span class="input-group-text" id="addon-wrapping">Imagen</span>
      </div>
      <input accept="image/*" name="imagen" type="file" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
      <button class="btn btn-danger" type="submit">ENVIAR</button>

    </div>
  </form>  -->
   <?php
        foreach ($imagenes as $imagen) :

        ?>
  <!-- <div class="img_bd">
  <img  class="imagenes_bd" src="imagenes/<?= $imagen["nombre"] ?>" alt="">
  </div> -->
  <?php endforeach ?>  

 
  <script src="codigo.js"></script>
      <!-- jQuery CDN - Slim version (=without AJAX) -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <!-- Popper.JS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
      <!-- Bootstrap JS -->
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  <footer>



  </footer>
</body>
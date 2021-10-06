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


<body>


  <header>
   



  </header>

  


  <div class="ventana" id="vent">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/Pulsera_4.jpeg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/Pulsera_4.jpeg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/Pulsera_4.jpeg" class="d-block w-100" alt="...">
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

  
<div id="sidebar">
 
  <ul class="barra_lateral">
    <li> <img src="https://cdn.shopify.com/s/files/1/2362/1703/files/darklogo_100x.png?v=1505495250" alt=""></li>
    <a href=""><li>Texto 1</li></a>
    <a href=""><li>Texto 2</li></a>
    <a href=""><li>texto 3</li></a>
    <a href=""><li>texto 4</li></a>
    <a href=""><li>texto 5</li></a>
  </ul>
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

  

 
  <form enctype="multipart/form-data" action="imagenes.php" method="POST">
    <div class="input-group flex-nowrap imagenes_base">
      <div class="input-group-prepend">
        <span class="input-group-text" id="addon-wrapping">Imagen</span>
      </div>
      <input accept="image/*" name="imagen" type="file" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
      <button class="btn btn-danger" type="submit">ENVIAR</button>

    </div>
  </form> 
   <?php
        foreach ($imagenes as $imagen) :

        ?>
  <div class="img_bd">
  <img  class="imagenes_bd" src="imagenes/<?= $imagen["nombre"] ?>" alt="">
  </div>
  <?php endforeach ?>  

  <!-- jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

  <!-- Popper and Bootstrap JS -->

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
  <script src="codigo.js"></script>
  <Script>
    $('.dropdown-toggle').dropdown();
  </Script>
  <footer>



  </footer>
</body>
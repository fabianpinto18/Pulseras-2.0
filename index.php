<?php
session_start();
include('conexion.php');
include_once('header.php');
$sql = "SELECT  * FROM `descripcion`  ";
$llamado = $mbd->prepare($sql);
$llamado->execute();
$descripcion = $llamado->fetchAll();
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
    <nav class="navbar navbar-expand-lg navbar-light  mx-auto">
      <a class="navbar-brand" href="#">
        <img src="img/IllumTech.png" height="90" alt="">
      </a>
      <a class="navbar-brand  ml-5" href="nuevo.php">Nuevo</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="navbar-brand" href="colecciones.php">Colecciones<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="navbar-brand" href="#">Sobre nosotros</a>
          </li>

        </ul>
        <div class="d-grid gap-2  ml-5">

          <?php if (!empty($users)) : ?>
            <div class="btn-group">
            <button style="opacity: 0.5;" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Hola <?= $users["nombre"]; 
            ?>
         
            </button>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="config.php" class="dropdown-item btn btn-mute" type="button">Configuracion</a>
              <a href="logout.php" class="dropdown-item btn btn-mute" type="button">Salir</a>
              
            </div>
          </div>
            <?php else :  ?>
              <p style="display: inline; color:lightslategray"><?= "Ingresar" ?></p>
              <a style="display: inline-flex; color:lightslategray" href="/Pulseras/admin.php"><i class="fal fa-user icono"></i> </a>
            <?php endif ?>
          

           <div style="color: red;" id="menu">

            <p class="h4" style="display: inline; color:lightslategray"></p>
            <!-- <a style="display: inline-flex; color:lightslategray" href="/Pulseras/admin.php"><i class="fas fa-angle-down icono"></i> </a> -->

            

          </div> 
          
        </div>
      </div>
    </nav>





    <!-- Carrusel -->
    <div class="container-carousel mb-4">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active carousel1">

          </div>
          <div class="carousel-item carousel2 ">

          </div>
          <div class="carousel-item carousel3 ">

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
  </header>

  <div style="cursor: pointer;"  class="section--divider">
    <div class="container">
      <div class="row">
      <a class="catalogo1 catalogos" href="coleccion-amigos.php"><div >Pulseras</div></a>

       <a class="catalogo2 catalogos" href="coleccion-anillos.php"> <div >Anillos</div></a>

      <a class="catalogo3 catalogos " href="coleccion-pulseras.php">  <div >Pulseras/Pañoleteros</div></a>

      <a class="catalogo4 catalogos" href="coleccion-collares.php">  <div >Collares</div></a>
      </div>
    </div>
  </div>
  
  
  <div style="display: inline; margin:90px ">
    <div>
      <h2 style="float: left;margin-left: 80px; ">Nueva Coleccion - Navidad</h2>
    </div>
    <div>
      <P style="float: right;margin-right: 80px; ">Todos</P><br>
    </div>
  </div>

  <div class="section--divider">
    <div class="container">
      <div class="row">
        <div>
          <div class="muestras arete1">

          </div>
          <div class="precios">
            <p>Amuleto m·o·m</p>
            <h6>$30.000,00</h6>

            <div class="box-color" style="  background-color: #9384;"></div>
            <div class="box-color" style="background-color: blue;"></div>
          </div>
        </div>
        <div>
          <div class="arete2 muestras"> </div>
          <div class="precios">
            <p>Aretes Alianza</p>
            <h6>$178.000,00</h6>
            <div class="box-color" style="background-color: #9384;"></div>

          </div>
        </div>

        <div>
          <div class="arete3 muestras "></div>
          <div class="precios">
            <p>Topos Unión m·o·m</p>
            <h6>$87.000,00</h6>
            <div class="box-color" style="background-color: gold;;"></div>
            <div class="box-color" style="background-color: white;"></div>
          </div>

        </div>

        <div>
          <div class="arete4 muestras"> </div>
          <div class="precios">
            <p>Aretes Lazos de azúcar</p>
            <h6>$187.000,00</h6>
            <div class="box-color" style="  background-color: green;"></div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <hr />
  <!-- Inicio del Cuerpo -->

  <?php foreach ($descripcion as $value) :
    $valor = intval($value["id"])

  ?>
  <p style="display:none" id=""><?= $value["id"] ?></p>
    <?php if ($valor % 2 == 0) : ?>

      <div class="container">

        <div class="row">
          <div class="col">
            <img class="img-anillos" src="Img/Pulsera_1" alt="" width="350px">
          </div>
          <div class="col description-ring">
            <h3> <?= $value["titulo"] ?> </h3>
            <p><?= $value["subtitulo"] ?></p>

            <br>
            <p>
              <?= $value["descripcion"] ?>
            </p>
            <br>


          </div>
        </div>
        <hr>

      </div>
    <?php else :
    ?>
      <div class="container">
        <div class="capa-basicos mb-5">
          <div class="row">
            <div class="col-md-6 col-sm-12 mt-5">


              <h1>Titulo normal</h1>
              <p>Candongas de diferentes formas y anillos martillados hacen parte de nuestros básicos. Son pensados para un uso cotidiano que complementen tu look de manera fresca y relajada.</p>
              <!-- <button class="btn btn-info rounded-0">Ver todos los basicos <i class="fa fa-arrow-right" aria-hidden="true"></i></button> -->

            </div>
            <div class="col text-center">
              <img src="Img/7.png" width="350px" alt="" srcset="">
            </div>
          </div>
        </div>

      </div>
    <?php endif ?>

  <?php endforeach ?>
 
<!-- Fin del cuepo -->
  <div id="carousel4" class="text-center mt-4">
    <h1 class="display-2">P O L I S</h1>
    <h3>Pulseras para para toda ocasion</h3>
    <button class="btn btn-outline-light">Ver los marcadores</button>
  </div>
  <footer>

    <div class="container-footer">
      <div class="img-icono">
        <div class="imagen-footer">
          <img src="https://cdn.shopify.com/s/files/1/2362/1703/files/darklogo_100x.png?v=1505495250" alt="">
        </div>
        <div class="colum1">

          <div class="icono-face">
            <a href=""><i class="fab fa-facebook-square iconos-footer"></i></a>

          </div>
          <div class="icono-whats">
            <a href=""><i class="fab fa-whatsapp-square iconos-footer"></i></a>

          </div>
          <div class="icono-ins">
            <a href=""><i class="fab fa-instagram-square iconos-footer"></i></a>
          </div>
        </div>
      </div>
      <div class="footer-copy">
        <div class="copy mr-2">
          Copyright © Todos los derechos reservados <a style="color: black;" href="">|</a>
        </div>
        <div class="informacion">
          <a style="color: black;" href="sobre_nosotros.php"> Informcaion de la compañia </a> | <a style="color: black;" href="">Terminos y Condiciones</a>
        </div>
      </div>
    </div>


  </footer>
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

</body>

</html>
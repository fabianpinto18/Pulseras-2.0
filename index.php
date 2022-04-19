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



$sql = "SELECT `nombre` FROM `imagenes` WHERE categoria ='Carrusel'" ;
$llamado_1 = $mbd->prepare($sql);
$llamado_1->execute();
$imagenes = $llamado_1->fetchAll();
$array_imagenes=array();
foreach($imagenes as $titulo):
  array_push($array_imagenes, $titulo["nombre"]);
endforeach;

$sql ="SELECT nombre FROM imagenes WHERE last_updated IN (SELECT MAX(last_updated) FROM imagenes GROUP BY categoria) ORDER BY categoria DESC";
$collares = $mbd->prepare($sql);
$collares->execute();
$collares2 = $collares->fetchAll();




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
    <nav class="navbar navbar-expand-lg navbar-light nav-tamaño ">
      <a class="navbar-brand" href="#">
        <img src="img/Celeste_page-0001 (1).jpg" class="img-tam" " alt="">
      </a>
      <a class="navbar-brand  ml-1" href="nuevo.php">Nuevo</a>
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
              <a href="config_2.php" class="dropdown-item btn btn-mute" type="button">Configuracion</a>
              <a href="logout.php" class="dropdown-item btn btn-mute" type="button">Salir</a>
              
            </div>
          </div>
            <?php else :  ?>
              <div class="btn-salir">
              <p class="texto-i" style="display: inline; color:lightslategray"><?= "Ingresar" ?></p>
              <a style="display: inline-flex; color:lightslategray" href="/Pulseras/admin.php"><i class="fal fa-user icono"></i> </a>
              </div> 
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
        <ul class="carousel-inner">
          <li class="carousel-item active carousel1 ">

            </li>
          <li class="carousel-item  carousel2 ">

            </li>
          <li class="carousel-item carousel3 ">

            </li>
        </ul>
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
      <h2 style="float: left;margin-left: 80px; "><?= $descripcion[0][1]?></h2>
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
            <p><?= $descripcion[1][1]?></p>
            <h6><?= $descripcion[1][3]?>0</h6>

            <div class="box-color" style="  background-color: #9384;"></div>
            <div class="box-color" style="background-color: blue;"></div>
          </div>
        </div>
        <div>
          <div class="arete2 muestras"> </div>
          <div class="precios">
          <p><?= $descripcion[2][1]?></p>
            <h6><?= $descripcion[2][3]?>0</h6>
            <div class="box-color" style="background-color: #9384;"></div>

          </div>
        </div>

        <div>
          <div class="arete3 muestras "></div>
          <div class="precios">
          <p><?= $descripcion[3][1]?></p>
            <h6><?= $descripcion[3][3]?>0</h6>
            <div class="box-color" style="background-color: gold;;"></div>
            <div class="box-color" style="background-color: white;"></div>
          </div>

        </div>

        <div>
          <div class="arete4 muestras"> </div>
          <div class="precios">
          <p><?= $descripcion[4][1]?></p>
            <h6><?= $descripcion[4][3]?>0</h6>
            <div class="box-color" style="  background-color: green;"></div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <hr />
  <!-- Inicio del Cuerpo -->

  
  <p style="display:none" id=""></p>
    
  <div class="container">
        <div class="capa-basicos mb-5">
          <div class="row">
            <div class="col-md-6 col-sm-12 mt-5">


              <h1><?= $descripcion[5][1]?></h1>
              <p><?= $descripcion[5][3]?></p>
              <!-- <button class="btn btn-info rounded-0">Ver todos los basicos <i class="fa fa-arrow-right" aria-hidden="true"></i></button> -->

            </div>
            <div class="col text-center">
              <img src="Img/7.png" width="350px" alt="" srcset="">
            </div>
          </div>
        </div>

      </div>  
      <div class="container">

        <div class="row">
          <div class="col">
            <img class="img-anillos" src="Img/carrusel/carrusel8.png" alt="" width="350px">
          </div>
          <div class="col description-ring">
            <h3> <?= $descripcion[6][1]?> </h3>
          
            <br>
            <p>
            <?= $descripcion[6][3]?>
            </p>
            <br>


          </div>
        </div>
        <hr>

      </div>
    
      
    
 
<!-- Fin del cuepo -->
  <div id="carousel4" class="text-center mt-4">
    <h1 class="display-2">C E L E S T E</h1>
    <h3>Pulseras para para toda ocasion</h3>
    <button class="btn btn-outline-light">Ver los marcadores</button>
  </div>
  <footer>

    <div class="container-footer">
      <div class="img-icono">
        <div class="imagen-footer">
          <img class="img-tam" src="img/Celeste_page-0001 (1).jpg "alt="">
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
<script>
var ul1 = document.querySelector(".carousel1");
ul1.style.cssText = 'background-image: url("imagenes/<?php if(isset($array_imagenes[0])){
  echo $array_imagenes[0];
}else{
  echo "mantenimiento.png";
}  ?>");';



var ul2 = document.querySelector(".carousel2");
ul2.style.cssText = 'background-image: url("imagenes/<?php if(isset($array_imagenes[1])){
  echo $array_imagenes[1];
}else{
  echo "mantenimiento.png";
}  ?>");';

var ul3 = document.querySelector(".carousel3");
ul3.style.cssText = 'background-image: url("imagenes/<?php if(isset($array_imagenes[2])){
  echo $array_imagenes[2];
}else{
  echo "mantenimiento.png";
}  ?>");';


var pulseras = document.querySelector(".catalogo1");
pulseras.style.cssText = 'background-image: url("imagenes/<?=  $collares2[0][0] ?>");';



var anillos = document.querySelector(".catalogo2");
anillos.style.cssText = 'background-image: url("imagenes/<?=  $collares2[7][0] ?>");';

var pañoleteros = document.querySelector(".catalogo3");
pañoleteros.style.cssText = 'background-image: url("imagenes/<?=   $collares2[1][0]?>");';

var collares = document.querySelector(".catalogo4");
collares.style.cssText = 'background-image: url("imagenes/<?=  $collares2[3][0] ?>");';



</script>

</body>

</html>
<?php
session_start();
include('conexion.php');
include_once('header.php');
$sql = "SELECT  * FROM `descripcion`  ";
$llamado = $mbd->prepare($sql);
$llamado->execute();
$descripcion = $llamado->fetchAll();

$sql ="SELECT nombre FROM imagenes WHERE last_updated IN (SELECT MAX(last_updated) FROM imagenes GROUP BY categoria) ORDER BY categoria DESC";
$collares = $mbd->prepare($sql);
$collares->execute();
$collares2 = $collares->fetchAll();
var_dump($collares2);
// echo $collares2[2][0];




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

  <div style="cursor: pointer;" class="section--divider">
    <div class="container">
      <div class="row">
        <a class="catalogo1 catalogos" href="coleccion-amigos.php">
          <div>Pulseras
            <form enctype="multipart/form-data" action="imagenes.php" method="POST">
              <div class="input-group ">
                <input type="text" name="descripcion" style="display: none;" value="Pulseras">
                <input accept="image/*" name="imagen" type="file" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                <button class="btn btn-danger" type="submit">Guardar</button>

              </div>
            </form>
          </div>
        </a>

        <a class="catalogo2 catalogos" href="coleccion-anillos.php">
          <div>Anillos
             <form enctype="multipart/form-data" action="imagenes.php" method="POST">
              <div class="input-group ">
                <input type="text" name="descripcion" style="display: none;" value="Anillos">
                <input accept="image/*" name="imagen" type="file" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                <button class="btn btn-danger" type="submit">Guardar</button>

              </div>
            </form>
          </div>
        </a>

        <a class="catalogo3 catalogos " href="coleccion-pulseras.php">
          <div>Pulseras/Pañoleteros 
            <form enctype="multipart/form-data" action="imagenes.php" method="POST">
              <div class="input-group ">
                <input type="text" name="descripcion" style="display: none;" value="Pañoleteros">
                <input accept="image/*" name="imagen" type="file" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                <button class="btn btn-danger" type="submit">Guardar</button>

              </div>
            </form>
          </div>
        </a>

        <a class="catalogo4 catalogos" href="coleccion-collares.php">
          <div>Collares <form enctype="multipart/form-data" action="imagenes.php" method="POST">
              <div class="input-group ">
                <input type="text" name="descripcion" style="display: none;" value="Collares">
                <input accept="image/*" name="imagen" type="file" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                <button class="btn btn-danger" type="submit">Guardar</button>

              </div>
            </form>
          </div>
        </a>
      </div>
    </div>
  </div>


  <!-- /////Incio cuerpo -->
  <form action="formulario_cambios.php" method="post">
    <div style="display: inline; margin:90px ">
      <div>
        <input type="text" name="title1" value="<?= $descripcion[0][1] ?>" style="float: left;margin-left: 80px; "></h2>

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
              <input type="text" name="tendencia1" value="<?= $descripcion[1][1] ?>"></input>
              <br />
              <input type="text" name="costo1" value="<?= $descripcion[1][3] ?>"></input>
              <br />

              <div class="box-color" style="  background-color: #9384;"></div>
              <div class="box-color" style="background-color: blue;"></div>
            </div>
          </div>
          <div>
            <div class="arete2 muestras"> </div>
            <div class="precios">
              <input type="text" name="tendencia2" value="<?= $descripcion[2][1] ?>"></input>
              <br />
              <input type="text" name="costo2" value="<?= $descripcion[2][3] ?>"></input>
              <br />
              <div class="box-color" style="background-color: #9384;"></div>

            </div>
          </div>

          <div>
            <div class="arete3 muestras "></div>
            <div class="precios">
              <input type="text" name="tendencia3" value="<?= $descripcion[3][1] ?>"></input>
              <br />
              <input type="text" name="costo3" value="<?= $descripcion[3][3] ?>"></input>
              <br />

              <div class="box-color" style="background-color: gold;;"></div>
              <div class="box-color" style="background-color: white;"></div>
            </div>

          </div>

          <div>
            <div class="arete4 muestras"> </div>
            <div class="precios">
              <input type="text" name="tendencia4" value="<?= $descripcion[4][1] ?>"></input>
              <br />
              <input type="text" name="costo4" value="<?= $descripcion[4][3] ?>"></input>
              <br />

              <div class="box-color" style="  background-color: green;"></div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <hr />
    <!-- Inicio del Cuerpo -->


    <p style="display:none" </p>
    <div class="container">
      <div class="capa-basicos mb-5">
        <div class="row">
          <div class="col-md-6 col-sm-12 mt-5">


            <input type="text" name="title2" value=<?= $descripcion[5][1] ?>></input>
            <br />
            <textarea type="text" name="descripcion2"><?= $descripcion[5][3] ?></textarea>

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
          <img class="img-anillos" src="Img/Pulsera_1" alt="" width="350px">
        </div>
        <div class="col description-ring">
          <input type="text" name="title3" value="<?= $descripcion[6][1] ?>"> </input>


          <br>
          <textarea name="descripcion3">
            <?= $descripcion[6][3] ?>
            </textarea>
          <br>


        </div>
      </div>
      <hr>

    </div>





    <button type="submit">Actualizar</button>
  </form>
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
  <script>
var ul1 = document.querySelector(".catalogo1");
ul1.style.cssText = 'background-image: url("imagenes/<?=  $collares2[0][0] ?>");';



var ul2 = document.querySelector(".catalogo2");
ul2.style.cssText = 'background-image: url("imagenes/<?=  $collares2[7][0] ?>");';

var ul3 = document.querySelector(".catalogo3");
ul3.style.cssText = 'background-image: url("imagenes/<?=   $collares2[1][0]?>");';

var ul4 = document.querySelector(".catalogo4");
ul4.style.cssText = 'background-image: url("imagenes/<?=  $collares2[3][0] ?>");';

</script>
  <script src="codigo.js"></script>
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
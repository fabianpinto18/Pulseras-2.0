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
  <nav class="navbar navbar-expand-lg navbar-light nav-tamaño ">
      <a class="navbar-brand" href="index.php">
        <img src="img/003-Final.png" class="img-tam" " alt="">
      </a>
      
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="navbar-brand" href="colecciones.php">Colecciones<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="navbar-brand" href="#">Sobre Nosotros</a>
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
              <div class="btn-salir">
              <a class="texto-i mt-1" style="display: inline; color:lightslategray" href="/Pulseras/admin.php"><?= "Ingresar" ?></a>
              <a  style="display: inline-flex; color:lightslategray" href="/Pulseras/admin.php"><i class="fal fa-user icono"></i> </a>
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
   
  </header>

  <div style="cursor: pointer;"  class="section--divider">
    <div class="container">
      <div class="row">
      <a class="catalogo1 catalogos" href="coleccion-pulseras.php"><div >Pulseras</div></a>

       <a class="catalogo2 catalogos" href="coleccion-anillos.php"> <div >Anillos</div></a>

      <a class="catalogo3 catalogos " href="coleccion-amigos.php">  <div >Pañoleteros</div></a>

      <a class="catalogo4 catalogos" href="coleccion-collares.php">  <div >Collares</div></a>
      </div>
    </div>
  </div>
  

  <div style="display: inline; margin:90px ">
    <div>
      <h2 style="float: left;margin-left: 80px; ">Nueva Coleccion</h2>
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

            
          </div>
        </div>
        <div>
          <div class="arete2 muestras"> </div>
          <div class="precios">
            <p>Aretes Alianza</p>
            <h6>$178.000,00</h6>
            

          </div>
        </div>

        <div>
          <div class="arete3 muestras "></div>
          <div class="precios">
            <p>Topos Unión m·o·m</p>
            <h6>$87.000,00</h6>
            
          </div>

        </div>

        <div>
          <div class="arete4 muestras"> </div>
          <div class="precios">
            <p>Aretes Lazos de azúcar</p>
            <h6>$187.000,00</h6>
            
          </div>

        </div>
        <div>
          <div class="muestras arete5">

          </div>
          <div class="precios">
            <p>Amuleto m·o·m</p>
            <h6>$30.000,00</h6>

            <!-- <div class="box-color" style="  background-color: #9384;"></div>
            <div class="box-color" style="background-color: blue;"></div> -->
          </div>
        </div>
        <div>
          <div class="muestras arete6">

          </div>
          <div class="precios">
            <p>Amuleto m·o·m</p>
            <h6>$30.000,00</h6>

            
            
          </div>
        </div>
        <div>
          <div class="muestras arete7">

          </div>
          <div class="precios">
            <p>Amuleto m·o·m</p>
            <h6>$30.000,00</h6>

            <!-- <div class="box-color" style="  background-color: #9384;"></div>
            <div class="box-color" style="background-color: blue;"></div> -->
          </div>
        </div>
        <div>
          <div class="muestras arete8">

          </div>
          <div class="precios">
            <p>Amuleto m·o·m</p>
            <h6>$30.000,00</h6>

            <!-- <div class="box-color" style="  background-color: #9384;"></div>
            <div class="box-color" style="background-color: blue;"></div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr />
  <!-- Inicio del Cuerpo -->

  
<!-- Fin del cuepo -->
  <div id="carousel4" class="text-center mt-4">
    <h1 class="display-2">Capa Hogar</h1>
    <h3>Joyería para el hogar</h3>
    <button class="btn btn-outline-light">Ver los marcadores</button>
  </div>
  <footer class="pie-pagina"> 
              <div class="grupo-1">
                <div class="box">
                  <figure>
                    <a href="#">
                        <img src="img/003-Final.png" alt="Imagen del Footer">
                    </a>
                  </figure>
                </div>
                <div class="box">
                  <h2>SOBRE NOSOTROS</h2>
                  <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laborum, pariatur.</p>
                  <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laborum, pariatur.</p>
                </div>
                <div class="box">
                  <h2>CONTACTANOS</h2>
                  <div class="red-social">
                    <a href="" class="fa fa-facebook"></a>
                    <a href="" class="fa fa-instagram"></a>
                    <a href="" class="fa fa-youtube"></a>
                  </div>
                </div>
              </div>
              <div class="grupo-2">
                  <small>&COPY; 2021 <b>IllumTech.com</b> - Todo los derechos Reservados</small>

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
  <script src="js/codigo.js"></script>
  <Script>
    $('.dropdown-toggle').dropdown();
</Script>

</body>

</html>
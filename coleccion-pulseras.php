<?php
session_start();
include('conexion.php');
include_once('header.php');
$sql = "SELECT p.* FROM productos p LEFT JOIN categorias c ON p.categoria_id= c.id WHERE p.categoria_id=33 ";


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
  <nav class="navbar navbar-expand-lg navbar-light nav-tamaño">

        <div class="contenedor-img-nav">

          <img src="img/003-Final.png" class="img-tam" alt="">

        </div>

        <div class="contenedor-grande-nav">
          <ul class="menu_items">
            <li class="active">
              <a class="navbar-brand" href="nuevo.php">Nuevo</a>
            </li>
            <li>
              <a class="navbar-brand" href="colecciones.php">Colecciones</a>
            </li>
            <li>
              <a class="navbar-brand" href="#">Sobre nosotros</a>
            </li>
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
                <a class="texto-i mt-1" style="display: inline; color:lightslategray" href="/Pulseras/admin.php"><?= "Ingresar" ?></a>
                <a style="display: inline-flex; color:lightslategray" href="/Pulseras/admin.php"><i class="fal fa-user icono"></i> </a>
              </div>
            <?php endif ?>


            <div style="color: red;" id="menu">

              <p class="h4" style="display: inline; color:lightslategray"></p>
              <!-- <a style="display: inline-flex; color:lightslategray" href="/Pulseras/admin.php"><i class="fas fa-angle-down icono"></i> </a> -->
            </div>
          </ul>


        </div>
        <span class="btn_menu">
          <i class="fa fa-bars"></i>
        </span>

      </nav>




    <!-- Carrusel -->
    
  </header>

  <div style="cursor: pointer;" class="section--divider">
      <div class="container catalogo-responsive">
        
          <div class="cat">
            <a class="catalogo1 catalogos dog" href="coleccion-amigos.php">
              <div>Pulseras</div>
            </a>
            <a class="catalogo2 catalogos2 dog" href="coleccion-anillos.php">
              <div>Anillos</div>
            </a>
          </div>
          <div class="cat2">
            <a class="catalogo3 catalogos3 " href="coleccion-pulseras.php">
              <div>Pulseras/Pañoleteros</div>
            </a>
            <a class="catalogo4 catalogos4" href="coleccion-collares.php">
              <div>Collares</div>
            </a>
          </div>
        
      </div>
    </div>

  <div style="display: inline; margin:90px ">
    <div>
      <h2 style="float: left;margin-left: 80px; ">Nueva Coleccion - Pulseras</h2>
    </div>
    <div>
      <P style="float: right;margin-right: 80px; ">Todos</P><br>
    </div>
  </div>

  
  <div class="section--divider">
    <div class="container">
      <div class="row">
      <?php
        foreach ($descripcion as $producto):
        ?>
        <div>
        <!-- <div style="background-image: url(https://www.hola.com/imagenes/belleza/actualidad/20210318186309/billie-eilish-cambio-de-look-radical-rubia/0-932-93/billie-eilish-getty2-t.jpg);" class="muestras"> -->

          <div style="background-image:url(imagenes/productos/<?= $producto["imagen_id"]?>)" class="muestras ">

          </div>
          <div class="precios">
            <p><?=$producto["nombre"]?></p>
            <h6>$<?= number_format(floatval($producto["precio"]))?></h6>

            
          </div>
        </div>
        <?php
        endforeach;
        ?>
      </div>
    </div>
  </div>
  <hr />
  <!-- Inicio del Cuerpo -->

  
 
<!-- Fin del cuepo -->
 
<footer class="pie-pagina">
      <div class="grupo-1">
        <div class="box">
          <figure class="img-tam-footer">
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
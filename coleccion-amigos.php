<?php
session_start();
include('conexion.php');
include_once('header.php');
$sql = "SELECT  * FROM `descripcion`  ";
$llamado = $mbd->prepare($sql);
$llamado->execute();
$descripcion = $llamado->fetchAll();


$sql = "SELECT * FROM `productos`";
$llamado1 = $mbd->prepare($sql);
$llamado1->execute();
$productos = $llamado1->fetchAll();
$imagenes_por_tabla =2;
$total_imagenes = $llamado1->rowCount();
$paginas = $total_imagenes/2;
$paginas = ceil($paginas);

//var_dump($productos);
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
      <a class="navbar-brand" href="index.php">
        <img src="https://cdn.shopify.com/s/files/1/2362/1703/files/darklogo_100x.png?v=1505495250" height="70" alt="">
      </a>
      <a class="navbar-brand  ml-5" href="nuevo.php">Nuevo</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="navbar-brand" href="#">Colecciones<span class="sr-only">(current)</span></a>
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
    
  </header>

  <div style="cursor: pointer;"  class="section--divider">
    <div class="container">
      <div class="row">
      <a class="catalogo1 catalogos" href="coleccion-amigos.php"><div >M·O·M</div></a>

       <a class="catalogo2 catalogos" href="coleccion-anillos.php"> <div >Anillos</div></a>

      <a class="catalogo3 catalogos " href="coleccion-pulseras.php">  <div >Pulseras/Pañoleteros</div></a>

      <a class="catalogo4 catalogos" href="coleccion-collares.php">  <div >Collares</div></a>
      </div>
    </div>
  </div>

  <div style="display: inline; margin:90px ">
    <div>
      <h2 style="float: left;margin-left: 80px; ">Nueva Coleccion - Amigos</h2>
    </div>
    <div>
      <P style="float: right;margin-right: 80px; ">Todos</P><br>
    </div>
  </div>

  
  <div class="section--divider">
    <div class="container">
      <img src="" alt="">
      <div class="row">
      <?php if(!$_GET){
        header('Location:coleccion-amigos.php?pagina=1');
      }
      $sql = 'SELECT * FROM productos LIMIT 0,3';
      $sentencia_sql = $mbd->prepare($sql);
      $sentencia_sql -> execute();
      $resultado_sql =  $sentencia_sql->fetchAll();

      ?>
        <?php foreach($resultado_sql as $dato): ?>
        <div class="l"> 
          
          <div class="muestras <?php echo $dato['nombre'] ?>">
           
          </div>
          <div class="precios">
            <p>Amuleto m·o·m</p>
            <h6>$30.000,00</h6>

            
          </div>
        </div>
       
        <?php endforeach ?>
        <?php foreach ($resultado_sql as $dato):  ?>
          <script>
          var ul1 = document.querySelector(".<?php echo $dato['nombre']?>");
          ul1.style.cssText = 'background-image: url("imagenes/productos/<?php echo $dato['imagen_id']; ?>")';
           
        </script> 
         <?php endforeach ?> 
        </div>
      </div>
    </div>
    <nav aria-label="Page navigation example">
    
  <ul class="pagination">
    <li class="page-item 
    <?php echo $_GET['pagina']<=1? 'disabled' :''  ?>" >
      <a class="page-link" 
    href="coleccion-amigos.php?pagina=<?php echo $_GET['pagina']-1 ?>">Previous</a></li>
    <?php for($i=0;$i<$paginas;$i++): ?>
    <li class="page-item
    <?php echo $_GET['pagina']==$i+1 ? 'active' :''?>">
    <a class="page-link" 
    href="coleccion-amigos.php?pagina=<?php echo $i+1?>">
    <?php echo $i+1?></a></li>
    <?php endfor?>
    
    <li class="page-item 
    <?php echo $_GET['pagina']>=$paginas? 'disabled' :''  ?>">
      <a class="page-link"
    href="coleccion-amigos.php?pagina=<?php echo $_GET['pagina']+1 ?>">Next</a></li>
  </ul>
</nav>
  </div>
  <hr />
 
 
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
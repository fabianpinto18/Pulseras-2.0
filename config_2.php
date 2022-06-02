<?php
session_start();
include('conexion.php');
include_once('header.php');
$sql = "SELECT  * FROM `descripcion`  ";
$llamado = $mbd->prepare($sql);
$llamado->execute();
$descripcion = $llamado->fetchAll();

$sql ="SELECT nombre,categoria FROM imagenes WHERE last_updated IN (SELECT MAX(last_updated) FROM imagenes GROUP BY categoria) AND categoria != 'Carrusel'  AND categoria != 'Nada' ORDER BY categoria DESC";
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
}else{
  // Este else se utiliza para las validaciones de sesiones 
  header("location:admin.php");
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
      <a class="navbar-brand" href="image.php">Carrusel</a>
    </li>
    <li>
      <a class="navbar-brand" href="ejemplos.php">Registrar producto</a>
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
    <div class="container">
      <div class="row">
        <div class="catalogo1 catalogos" >
          <div>Pulseras
            <form enctype="multipart/form-data" action="imagenes.php" method="POST">
              <div class="input-group ">
                <input type="text" name="descripcion" style="display: none;" value="Pulseras">
                <input accept="image/*" name="imagen" type="file" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                <button class="btn btn-danger" type="submit">Guardar</button>

              </div>
            </form>
          </div>
        </div>

        <div class="catalogo2 catalogos" >
          <div>Anillos
             <form enctype="multipart/form-data" action="imagenes.php" method="POST">
              <div class="input-group ">
                <input type="text" name="descripcion" style="display: none;" value="Anillos">
                <input accept="image/*" name="imagen" type="file" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                <button class="btn btn-danger" type="submit">Guardar</button>

              </div>
            </form>
          </div>
        </div>

        <div class="catalogo3 catalogos ">
          <div>Pulseras/Pañoleteros 
            <form enctype="multipart/form-data" action="imagenes.php" method="POST">
              <div class="input-group ">
                <input type="text" name="descripcion" style="display: none;" value="Pañoleteros">
                <input accept="image/*" name="imagen" type="file" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                <button class="btn btn-danger" type="submit">Guardar</button>

              </div>
            </form>
          </div>
        </div>

        <div class="catalogo4 catalogos" >
          <div>Collares 
            <form enctype="multipart/form-data" action="imagenes.php" method="POST">
              <div class="input-group ">
                <input type="text" name="descripcion" style="display: none;" value="Collares">
                <input accept="image/*" name="imagen" type="file" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                <button class="btn btn-danger" type="submit">Guardar</button>

              </div>
            </form>
          </div>
        </div>
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

  
    <hr />
    <!-- Inicio del Cuerpo -->


    <p style="display:none"> </p>
    <div class="container">
      <div class="capa-basicos mb-5">
        <div class="row">
          <div class="col-md-6 col-sm-12 mt-5">


          <center>  <input type="text" name="title2"  class="title1" value=<?= $descripcion[5][1] ?>></input></center>
            <br />
            <textarea type="text" class="textarea1" name="descripcion2"><?= $descripcion[5][3] ?></textarea>

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
          <div class="col   order-12 description-ring"><center>
          <input type="text" class="title1 mb-4" name="title3" value="<?= $descripcion[6][1] ?>"> </input>
          <br>
          <textarea class="textarea2" name="descripcion3">
            <?= $descripcion[6][3] ?>
            </textarea>
          <br>
          <button type="submit">Actualizar</button></center>
  </form>

        </div>
        <div class="col order-1" >
        <div class="catalogo8" >
          
            <form enctype="multipart/form-data" action="imagenes.php" method="POST">
              <div class="input-group ">
                <input type="text" name="descripcion" style="display: none;" value="Inicio">
                <input accept="image/*" name="imagen" type="file" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                <button class="btn btn-danger" type="submit">Guardar</button>

              </div>
            </form>
          
        </div>

        </div>
      
      </div>
     

    </div>
 <hr>




    
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
  <script>
var ul1 = document.querySelector(".catalogo1");
ul1.style.cssText = 'background-image: url("imagenes/<?=  $collares2[0][0] ?>");';


//imagen Inicio
var ul8 = document.querySelector(".catalogo8");
ul8.style.cssText = 'background-image: url("imagenes/<?=  $collares2[2][0] ?>");';




var ul2 = document.querySelector(".catalogo2");
ul2.style.cssText = 'background-image: url("imagenes/<?=  $collares2[4][0] ?>");';

var ul3 = document.querySelector(".catalogo3");
ul3.style.cssText = 'background-image: url("imagenes/<?=   $collares2[1][0]?>");';

var ul4 = document.querySelector(".catalogo4");
ul4.style.cssText = 'background-image: url("imagenes/<?=  $collares2[3][0] ?>");';

</script>
  <script src="js/codigo.js"></script>
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
<?php
session_start();
include('conexion.php');
include_once('header.php');

$sql = "SELECT  * FROM `descripcion`  ";
$llamado = $mbd->prepare($sql);
$llamado->execute();
$descripcion = $llamado->fetchAll();

$sql ="SELECT nombre FROM imagenes WHERE last_updated IN (SELECT MAX(last_updated) FROM imagenes GROUP BY categoria) AND categoria != 'Carrusel'  AND categoria != 'Nada' ORDER BY categoria DESC";
$collares = $mbd->prepare($sql);
$collares->execute();
$collares2 = $collares->fetchAll();

$sql = "SELECT   `id`,`nombre`,`categoria` FROM `imagenes` ";
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
}else{
  header("location:admin.php");
}

?>

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <title>Collapsible sidebar using Bootstrap 4</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <title>Este si es</title>
</head>
<body>


  <header>
  <nav class="navbar navbar-expand-lg navbar-light nav-tamaño">

        <div class="contenedor-img-nav">

          <img src="img/003-Final.png" class="img-tam" alt="">

        </div>

        <div class="contenedor-grande-nav">
          <ul class="menu_items">
            <li class="active">
              <a class="navbar-brand" href="ejemplos.php">Registrar productos</a>
            </li>
            <li>
              <a class="navbar-brand" href="config_2.php">Configuración Index</a>
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



  </header>
  <form enctype="multipart/form-data"  class="form_img mb-5" action="imagenes.php" method="POST">
<div class="input-group flex-nowrap">
  <div class="input-group-prepend">
    <span class="input-group-text" id="addon-wrapping">Imagen</span>
  </div>
  <input accept="image/*" name="imagen" type="file" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
  <button class="btn btn-danger" type="submit">ENVIAR</button>

</div>
</form> 
<form action="guardarCarrusel.php" method="post">
  <center>
  <h1>Seleccione las imagenes para el carrusel</h1>
    <input type="submit">

  <br>
  </center>
  
<input style="display: none;"  type="number" min="1" max="8" id="boleto_2d" size="5" name="boletos[2D][cantidad]" value="3" onchange="checkItems(this)">
<div class="checkboxs">
 <?php


    foreach ($imagenes as $imagen) {
      $validacion = false;
      foreach ($collares2 as $perro){
        if($imagen["nombre"] == $perro["nombre"]){
          $validacion=true;

        }
       
      }  if(!$validacion){?>

      <div class="checkbox" style="background-image:url(imagenes/<?= $imagen["nombre"] ?>) ;">
    


<input style="display: inline-block;position:absolute;float:right"<?php if($imagen["categoria"]==="Carrusel"){
  echo "checked";
}  ?> type="checkbox" name="imagen[]" onclick="limitCheck(this)" value="<?=
$imagen["nombre"]?>" >

    <button class="botonCarrusel"type="submit" name="boton_imagen" value="<?=$imagen['id']?>" >X</button>
  
    

</div>  
<?php }}?>


      

      
    
    
 
</div>
</form>

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

 <script>function checkItems(sel){
  // obtener los checkboxes
  var checks=document.querySelectorAll("input[type='checkbox']");
  var checked=0;
  for(var i=0; i<checks.length; i++){
    // mantener chequeado si el valor del item es menor que el seleccionado
     if (checked>=sel.value){
        checks[i].checked=false;
        continue;
    }
    if (checks[i].checked){
      checked++;
    }
  }
 

}

function limitCheck(chk){
  // obtener los checkboxes
  var checks=document.querySelectorAll("input[type='checkbox']");
  var checked=0;
  for(var i=0; i<checks.length; i++){
    // mantener chequeado si el valor del item es menor que el seleccionado
    if (checks[i].checked){
      checked++;
    }
  }
  var boletos=document.getElementById("boleto_2d").value;

  if (checked>boletos){
     chk.checked=false;
  }

}

</script>
  <script src="js/codigo.js"></script>
      <!-- jQuery CDN - Slim version (=without AJAX) -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <!-- Popper.JS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
      <!-- Bootstrap JS -->
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
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
</body>
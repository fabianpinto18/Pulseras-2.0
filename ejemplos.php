<?php
session_start();
include('conexion.php');
include_once('header.php');


$sql = "SELECT * FROM `categorias`  ";
$llamado = $mbd->prepare($sql);
$llamado->execute();
$categorias = $llamado->fetchAll();

$sql = "SELECT * FROM `productos` p LEFT JOIN `categorias` c ON p.categoria_id = c.id  ";
$llamado = $mbd->prepare($sql);
$llamado->execute();
$productos = $llamado->fetchAll();

// $sql = "SELECT `nombre` FROM `imagenes` ";
// $llamado_1 = $mbd->prepare($sql);
// $llamado_1->execute();
// $imagenes_bd = $llamado_1->fetchAll();

// if (!empty($_POST["nombre"])) {

//   $imagenes_repetida = "";



//   if ($_FILES["imagen"]["error"] > 0) {
//     echo "Error al cargar el archivo";
//   } else {
//     $imagenes_permitidas = array("image/gif", "image/png", "aplication/pdf", "image/jpge",);
//     $limite_imagen = 200;
//     // if (in_array($_FILES["imagen"]["type"],$imagenes_permitidas) && $_FILES["imagen"]["size"]<=$limite_imagen*1024) {
//     $ruta = "imagenes/productos/";
//     foreach ($imagenes_bd as $buscar_repetidas) :


//       if ($buscar_repetidas["nombre"] == $_FILES["imagen"]["name"]) {
//         $imagenes_repetida = "Se repitio la imagen ";
//       }



//     endforeach;

//     $archivo = $ruta . $_FILES["imagen"]["name"];
//     $imagen_2 = $_FILES["imagen"]["name"];


//     if (!file_exists($ruta)) {
//       mkdir($ruta);
//     }
//     if (!file_exists($archivo)) {
//       $resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $archivo);
//       if ($resultado) {
//         echo "Se ha guardado la imagen";


//         $sql = "INSERT INTO productos (nombre,precio,imagen_id,categoria_id) VALUES(:alias1,:alias2,:alias3,:alias4)";
//         $sentencia = $mbd->prepare($sql);
//         $sentencia->bindParam(':alias1', $_POST["nombre"]);
//         $sentencia->bindParam(':alias2', $_POST["precio"]);
//         $sentencia->bindParam(':alias3', $imagen_2);
//         $sentencia->bindParam(':alias4', $_POST["categoria"]);
//         $sentencia->execute();

//         // $res -> bindParam(':nombre',$_FILES["imagen"]["name"],PDO::PARAM_STR, 12);
//         header("location:ejemplos.php");
//       } else {
//         header("location:image.php");
//       }
//     }
//   }
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
<!DOCTYPE html>
<html lang="en">

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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <!-- Our Custom CSS -->
  <link rel="stylesheet" href="css/style.css">

  <!-- Font Awesome JS -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
  <title>Este si es</title>
</head>
<header>
<nav class="navbar navbar-expand-lg navbar-light nav-tamaño">

<div class="contenedor-img-nav">

  <img src="img/003-Final.png" class="img-tam" alt="">

</div>

<div class="contenedor-grande-nav">
  <ul class="menu_items">
    <li class="active">
      <a class="navbar-brand" href="image.php">Carrulser</a>
    </li>
    <li>
      <a class="navbar-brand" href="config_2.php">configuración index</a>
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

<body>



  <div class="container">
    <h1 class="text-center">Productos</h1>

    <div class="row">
      <div class="col-2 offset-10">
        <div class="text-center">
          <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalProducto" id="botonCrear">
            <i class="bi bi-plus-circle-fill"></i>Crear

          </button>
        </div>
      </div>
    </div>

    <br><br>
    <div class="table-responsive">
      <table id="datos_productos" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>Editar</th>
            <th>Borrar</th>
          </tr>
        </thead>
      </table>
    </div>

    <div class="modal fade" id="modalProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Crear Productos</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <form method="POST" id="formulario" enctype="multipart/form-data">
            <div class="modal-content">
              <div class="modal-body">
                <label for="nombre">Ingrese el nombre </label>
                <input type="text" name="nombre" id="nombre" class="form-control">
                <br>

                <label for="apellido">Ingrese el precio </label>
                <input type="number" name="precio" id="precio" class="form-control">
                <br>

                <label for="imagen">Seleccione una imagen </label>
                <input type="file" name="imagen" id="imagen" class="form-control">
                <span id="imagen_subida"></span>
                <br>

                <select id="categoria" name="categoria" class="form-select" aria-label="Default select example">
                  <option selected>Categoria</option>
                  <?php
                  foreach ($categorias as $categoria) :
                  ?>
                    <option name="categoria" value="<?= $categoria["id"] ?>"><?= $categoria["nombre"] ?></option>

                  <?php
                  endforeach;
                  ?>
                </select>



              </div>

              <div class="modal-footer">
                <input type="hidden" name="id_producto" id="id_producto">
                <input type="hidden" name="operacion" id="operacion">
                <input type="submit" value="Crear" class="btn btn-success" name="action" id="action">
              </div>
            </div>
          </form>


        </div>
      </div>
    </div>
  </div>

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

 
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#botonCrear").click(function() {
        $("#formulario")[0].reset();
        $(".modal-title").text("Crear Productos");
        $("#action").val("Crear");
        $("#operacion").val("Crear");
        $("#imagen").html("");
      })
      var dataTable = $('#datos_productos').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          url: "obtener_registros.php",
          type: "POST"
        },
        "columnsDefs": [{
          "targets": [0, 3, 4],
          "orderable": false,
        }, ],
        "language": {
          "thousands": ".",
          "decimal": ",",
          "processing": "Procesando...",
          "lengthMenu": "Mostrar _MENU_ registros",
          "zeroRecords": "No se encontraron resultados",
          "emptyTable": "Ningún dato disponible en esta tabla",
          "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
          "infoFiltered": "(filtrado de un total de _MAX_ registros)",
          "search": "Buscar:",
          "infoThousands": ",",
          "loadingRecords": "Cargando...",
          "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
          }
        }
      });

      ////////////////////////////
      ///CREAR UN PRODUCTO///
      ////////////////////////////

      $(document).on('submit', '#formulario', function(event) {
        event.preventDefault();
        var nombre = $("#nombre").val();
        var precio = $("#precio").val();
        var categoria = $("#categoria").val();
        var extension = $("#imagen").val().split('.').pop().toLowerCase();
        if (extension != '') {
          if (jQuery.inArray(extension, ['gif', "png", "jpg", "jpeg"]) == -1) {
            alert("Formato de imagen Invalido");
            $("#imagen").val('');
            return false;
          }
        }
        if (nombre != '' && precio != '' && categoria != '') {
          $.ajax({
            url: "crear.php",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(data) {
              alert(data);
              $('#formulario')[0].reset();
              $('#modalProducto').modal('hide');
              dataTable.ajax.reload();
            },
            error: function(error) {
              console.log("error");
            }

          });
        } else {
          alert("algunos campos son Obligatorios");
        }
      });

      ////////////////////////////
      ///ACTUALIZAR UN PRODUCTO///
      ////////////////////////////


      $(document).on('click', '.editar', function() {
        var id_producto = $(this).attr("id");

        if (nombre != '' && precio != '' && categoria != '') {
          $.ajax({
            url: "obtener_registro.php",
            method: "POST",
            data: {
              id_producto: id_producto
            },
            dataType: "json",
            success: function(data) {
              $('#modalProducto').modal('show');
              $('#nombre').val(data.nombre);
              $('#precio').val(data.precio);
              $('#categoria').val(data.categoria_id);
              $('#imagen_subida').html(data.imagen_id);
              $(".modal-title").text("Editar Productos");
              $('#id_producto').val(data.id);
              $("#action").val("Editar");
              $("#operacion").val("Editar");
            },
            error: function(error) {
              console.log("error");
            }

          });
        } else {
          alert("algunos campos son Obligatorios");
        }
      });

      ////////////////////////////
      ///ELIMINAR UN PRODUCTO/////
      ////////////////////////////

      $(document).on('click', '.borrar', function() {
        var id_producto = $(this).attr("id");

        if (confirm("Esta seguro de borrar este producto ")) {
          $.ajax({
            url: "borrar.php",
            method: "POST",
            data: {
              id_producto: id_producto
            },
            success: function(data) {
              alert(data);
              dataTable.ajax.reload();
            },
            error: function(error) {
              console.log("error");
            }

          });
        } else {
          return false;
        }


      });

    });
  </script>
  
</body>

</html>
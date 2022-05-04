<?php
include('conexion.php');
include_once('header.php');


$message = null;

if (!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
    $password = password_hash($_POST["password"],PASSWORD_DEFAULT);
    $sql = "INSERT INTO `users` (`nombre`,`correo`,`contraseña`)  VALUES (?,?,?)";

    $sentencia = $mbd->prepare($sql);
    $sentencia->bindParam(1, $_POST["name"]);
    $sentencia->bindParam(2, $_POST["email"]);
    $sentencia->bindParam(3, $password);
    
    if($sentencia->execute()){
         $message=" Si se esta registrando";

    }else{
          $message="No se esta ejecutando";
    }

} 
 


?>


<body class="bg-muted">

    <nav class="nav-login">
        <a href="index.php"><img  class="ml-3 mt-2 img-tam-login" src="img/003-Final.png"></a>
    </nav>
    <div  class="container">
        

            
            <div style=" margin-left: 25%; margin-top:5%;" class=" col-5 bg-muted">
                <div class="container rounded border border-secondary">

                    <form action="register.php" method="POST">
                        <div class="mt-4"> 
                            <?php if (!empty($message)): ?>
                            <p> <?= $message; ?> </p>
               
                            <?php endif ?>
                            <p>Registro de pagina de Pulseras</p>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputNombre1">Nombre</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Correo Electronico</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <!-- <small id="emailHelp" class="form-text text-muted">Nun</small> -->
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Contraseña</label>
                            <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                        </div>
                        
                       <a href="index.php"> <button  type="submit" class="btn btn-success rounded-pill btn-block mb-4 mt-5"><strong>Registrarse</strong> </button></a>
                    </form>
                </div>
            </div>
        
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


</body>
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
        <a href="index.php"><img  class="ml-3 mt-2 img-tam-login" src="img/Celeste_page-0001 (1).jpg"></a>
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




</body>
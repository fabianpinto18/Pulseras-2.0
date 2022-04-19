<?php
session_start();
include('conexion.php');
include_once('header.php');
$message="";
if(isset($_SESSION["id"])){
    header("location:index.php");
  
}
if(!empty($_POST["email"]) && !empty($_POST["password"])){
    $name=$_POST["email"];

    $sql = "SELECT `id` , `correo` , `contraseña` FROM `users` WHERE `correo` = '$name' ";

    $sentencia = $mbd -> prepare($sql);
    // $sentencia-> bindParam(1, $_POST["email"]);
    $sentencia-> execute();
    $result=$sentencia->fetch(PDO::FETCH_ASSOC);
    if($sentencia ->rowCount()==1 && password_verify ($_POST["password"],$result["contraseña"] )){
        $_SESSION["id"]=$result["id"];
        header("location:index.php");
        
    }else{
         $message="Las credenciales no son validas";   
    }

    
}

?>


<body class="bg-muted">

    <nav class="nav-login">
        <img  class="ml-3 mt-2 img-tam-login" src="img/Celeste_page-0001 (1).jpg">
    </nav>
    <div style=" margin-top:10%;" class="container mr-5">
        <div class="row">

            <div style="display: inline-table;" class=" col-4">

                <h4 class="text-muted" style="display: table-cell; vertical-align: middle;">Bienbenido a la pagina de Pulseras, con diseños exclusivos e inovadores</h4>

            </div>
            <div class=" col-5 bg-muted">
                <div class="container rounded border border-secondary">

                    <form action="admin.php" method="POST">
                        <div>
                            <?php if(!empty($message)):
                                
                             ?>
                            <p><?= $message ?></p>
                            <?php endif ?>
                            <p class="text-center">Iniciar Sesion</p>

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
                       
                        <div>
                            <a href="register.php" class="text-success">Crear Cuenta</a>
                        </div>
                        <button type="submit" class="btn btn-success rounded-pill btn-block mb-3 mt-5"><strong>Siguiente</strong> </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


  
<script>$('.dropdown-toggle').dropdown()</script>
</body>
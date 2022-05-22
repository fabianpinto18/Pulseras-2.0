<?php
 try {$mbd = new PDO('mysql:host=localhost;dbname=manillas', "root", "");
    //try {$mbd = new PDO('mysql:host=localhost;dbname=u407694396_manillas', "root", "Cadcmillos1821#");
    
 } catch (PDOException $e) {
     echo"error:" .$e -> getMessage();
     
 }

?>



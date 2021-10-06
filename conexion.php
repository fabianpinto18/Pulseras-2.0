<?php
 try {$mbd = new PDO('mysql:host=localhost;dbname=manillas', "root", "");
    
 } catch (PDOException $e) {
     echo"error:" .$e -> getMessage();
     
 }

?>


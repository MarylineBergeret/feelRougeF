<?php
 //On se connecte à la BDD
    $bdd = new PDO("mysql:host=localhost;dbname=fellrouge", "root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $bdd->exec("set names utf8");
?>
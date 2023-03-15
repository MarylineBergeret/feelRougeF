<?php
 //On se connecte à la BDD (nouvel objet pdo crée)
    $bdd = new PDO("mysql:host=localhost;dbname=filr", "root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $bdd->exec("set names utf8");
?>
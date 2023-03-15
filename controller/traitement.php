<?php
session_start();
if(isset($_SESSION['user'])){
    include '../model/connect.php';
    include '../model/get.php';
    include '../model/insert.php';

    if(!empty($_POST['concert1']) AND !empty($_POST['concert2']) AND !empty($_POST['concert3']) AND !empty($_POST['concert4']) AND !empty($_POST['concert5'])){
        $concert1 = htmlspecialchars($_POST['concert1']);
        $concert2 = htmlspecialchars($_POST['concert2']);
        $concert3 = htmlspecialchars($_POST['concert3']);
        $concert4 = htmlspecialchars($_POST['concert4']);
        $concert5 = htmlspecialchars($_POST['concert5']);
        insereConcert();
        $message="Vos concerts préférés ont été enregistrés dans la base de données.";
        return $message;
    }
}
?>





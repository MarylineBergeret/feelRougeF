<?php
session_start();
if($_SESSION['id_role'] = '1'){
    // $_SESSION['id_role'] = '1';
    // L'utilisateur est un administrateur, rediriger vers la page d'administration
    include '../view/view.header.php';
    include '../model/connect.php';
    include '../model/get.php';
    
    $users = getAllUser($bdd);
    include '../view/v.admin.php';
    
    include '../view/foot.php';
    exit();
} else {
   
    // L'utilisateur n'est pas un administrateur, rediriger vers la page d accueil.
    header('Location: accueil.php');
    exit();
}


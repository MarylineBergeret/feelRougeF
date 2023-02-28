<?php
session_start();

include '../view/view.header.php';

    if(isset($_SESSION['user'])){
        include "../view/profil.php";
    }else{
        header('Location: ../view/accueil.php');

    }


<?php
session_start();
include '../model/connect.php';
include '../model/get.php';

$style = "accueil";
include "../view/view.header.php";
include "../view/accueil.php";
?>
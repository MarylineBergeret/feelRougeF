<?php
session_start();
include '../model/connect.php';
include '../model/get.php';
include "../view/view.header.php";


$most_liked_festival = getMostLikedFestival($bdd);
// Appeler la fonction getCardFestival pour récupérer les données des festivals
$cardFestivals = getCardFestival($bdd);
// Inclure la vue qui affiche les données des festivals
include "../view/test.php";
?>


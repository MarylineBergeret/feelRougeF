<?php
session_start();

include '../model/connect.php';

include '../model/get.php';
include '../view/view.header.php';
$cardFestivals = getCardFestival($bdd);

include '../view/v.festival.php';


?>

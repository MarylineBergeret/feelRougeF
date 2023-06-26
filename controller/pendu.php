<?php
session_start();
include "../view/view.header.php";

// // Vérifier si l'utilisateur est connecté
// if (!isset($_SESSION['user']['id_user'])) {
//   // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
//   header('Location: connexion.php');
//   exit();
// }

include "../view/v.pendu.php";
include "../view/v.foot.php";
?>

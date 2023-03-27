<?php
session_start();

include '../model/connect.php';

include '../model/get.php';
include '../view/view.header.php';
$cardFestivals = getCardFestival($bdd);
include '../view/v.festival.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id_cardFestival'])) {
    $id_cardFestival = $_GET['id_cardFestival'];
    if (incrementLikes($bdd,$id_cardFestival)) {
        $likes = getLikes($bdd,$id_cardFestival); // suppose que vous avez une fonction qui récupère le nombre de likes pour cette carte depuis la base de données
        $response = array('success' => true, 'likes' => $likes);
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        $response = array('success' => false);
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}

// Vérifier que le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Vérifier si l'utilisateur est connecté
    if (!isset($_SESSION['user'])) {
        $erreur = 'Vous devez être connecté pour poster un commentaire';
    } else {
        // Récupérer les données du formulaire
        $content_commentCard = $_POST['content_commentCard'];
        $id_cardFestival = $_POST['id_cardFestival'];

        // Vérifier que les données sont valides
        if (empty($commentaire)) {
            $erreur = 'Le commentaire ne peut pas être vide';
        } else {

            // Ajouter le commentaire à la base de données
            ajouterCommentaire($bdd,$content_commentCard,$id_carFestival);

            // Rediriger l'utilisateur vers la page de la carte de festival
            $comSucces = "Commentaire envoyé avec succès";
            return $comSucces;
            exit;
        }
    }
}



include '../view/foot.php';


?>

<?php
session_start();

include '../model/connect.php';

include '../model/get.php';
include '../model/insert.php';
include '../model/delete.php';
include '../view/view.header.php';
$cardFestivals = getCardFestival($bdd);
getComments($bdd);

if(isset($_POST['state']) AND isset($_POST["likeIdFestival"]) AND isset($_POST["likeIdUser"])){
    $idUser = $_POST["likeIdUser"];
    $idCardfestival = $_POST["likeIdFestival"];
    $state = $_POST['state'];
    if($state = 'like'){
        deleteLike($bdd, $idUser, $idCardfestival);
    }else{
        insertLike($bdd, $idUser, $idCardfestival);
    }
}
include '../view/v.festival.php';
// Vérifier que le formulaire a été soumis
if (isset($_POST['submit'])) {
    // Vérifier si l'utilisateur est connecté
    if (!isset($_SESSION['user'])) {
        $erreur = 'Vous devez être connecté pour poster un commentaire';
    } else {
        // Récupérer les données du formulaire
        $content_commentCard = $_POST['content_commentCard'];
        $id_cardFestival = $_POST['id_cardFestival'];

        // Vérifier que les données sont valides
        if (empty($content_commentCard)) {
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

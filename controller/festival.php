<?php
session_start();

include '../model/connect.php';
include '../model/get.php';
include '../model/insert.php';
include '../model/delete.php';
include '../model/update.php';
include '../view/view.header.php';

$users = getAllUsers($bdd); // Récupérer tous les utilisateurs
foreach ($users as &$user) {
    $userId = $user['id_user'];
    $userConcerts = getConcertsById($bdd, $userId); // Récupérer les concerts préférés de l'utilisateur
    $user['concerts'] = $userConcerts; // Ajouter les concerts préférés à l'array de l'utilisateur   // $user['image_url'] = $imageUrl; // Ajouter l'URL de l'image à l'array de l'utilisateur
}

$cardFestivals = getTotalLikes($bdd);
$comments = getComments($bdd);

if(isset($_POST["likeIdFestival"]) AND isset($_POST["likeIdUser"])){
    $idUser = $_POST["likeIdUser"];
    $idCardfestival = $_POST["likeIdFestival"];
    $state = getLikes($bdd, $idUser, $idCardFestival);
    if(!$state){
        insertLike($bdd, $idUser, $idCardfestival);
    }else{
        deleteLike($bdd, $idUser, $idCardfestival);
    }
}


// Vérifie que le formulaire a été soumis
if (isset($_POST['submit'])) {
    // Vérifie si l'utilisateur est connecté
    if (!isset($_SESSION['user'])) {
        $erreur = 'Vous devez être connecté pour poster un commentaire';
    } else {
        // Récupérer les données du formulaire
        $content_commentCard = $_POST['content_commentCard'];
        $id_cardFestival = $_POST['id_cardFestival'];
        $id_user = $_SESSION['user']['id_user'];

        // Vérifier que les données sont valides
        if (empty($content_commentCard)) {
            $erreur = 'Le commentaire ne peut pas être vide';
        } else {

            // Ajouter le commentaire à la base de données
            ajouterCommentaire($bdd,$content_commentCard,$id_cardFestival,$id_user);
            
            // Rediriger l'utilisateur vers la page de la carte de festival
            $comSucces = "Commentaire envoyé avec succès";
            getComments($bdd);
            return $comSucces;
            exit;
        }
    }
}


include '../view/v.festival.php';

include '../view/v.foot.php';
?>

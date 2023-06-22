<?php
session_start();

if(isset($_SESSION['user']['id_role']) && $_SESSION['user']['id_role'] == 1 ) {
    // $_SESSION['id_role'] = '1';
    // L'utilisateur est un administrateur, rediriger vers la page d'administration
    include '../view/view.header.php';
    include '../model/connect.php';
    include '../model/get.php';
    include '../model/delete.php';
    $users = getAllUser($bdd);
    include '../view/v.admin.php';   

    // Vérifier si la requête est de type POST
    if(isset($_POST['idUser'])) {
        // Récupère l'ID de l'utilisateur à supprimer depuis la requête POST
        $userId = intval($_POST['idUser']);
        // Appelle la fonction pour supprimer l'utilisateur de la base de données
        deleteUserDTB($bdd, $userId);

        // Envoyer une réponse JSON
        // header('Content-Type: application/json');
        // echo json_encode(['message' => $deleteResult]);
        // exit;
    }
    include '../view/v.foot.php';   
} else {
   
    // L'utilisateur n'est pas un administrateur, rediriger vers la page d accueil.
    header('Location: accueil.php');
    exit();
}


?>


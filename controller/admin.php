<?php
session_start();
if($_SESSION['id_role'] == '1'){
    // $_SESSION['id_role'] = '1';
    // L'utilisateur est un administrateur, rediriger vers la page d'administration
    include '../view/view.header.php';
    include '../model/connect.php';
    include '../model/get.php';
    include '../model/delete.php';
    
    $users = getAllUser($bdd);
    include '../view/v.admin.php';   
    include '../view/v.foot.php';
    exit();
} else {
   
    // L'utilisateur n'est pas un administrateur, rediriger vers la page d accueil.
    header('Location: accueil.php');
    exit();
}

// Vérifier si la requête est de type POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupère l'ID de l'utilisateur à supprimer depuis la requête POST
    $userId = $_POST['userId'];
    // Appelle la fonction pour supprimer l'utilisateur de la base de données
    $deleteResult = deleteUserDTB($bdd, $userId);

    // Envoyer une réponse JSON
    header('Content-Type: application/json');
    echo json_encode(['message' => $deleteResult]);
    exit;
}
?>


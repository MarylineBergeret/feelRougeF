<?php
session_start();
include '../model/connect.php';
include '../model/get.php';

if(isset($_SESSION['user'])){
    include '../view/view.update.php';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifie si les champs sont définis et non vides
    if (isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['password'])) {
        // Récupère les données soumises par le formulaire
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mail = htmlspecialchars($_POST['email']);
        $pwd = htmlspecialchars($_POST['password']);
        $id_user = $_SESSION['id_user'];
        
        // Appelle la fonction updateUser pour mettre à jour les informations de l'utilisateur
        updateUser($bdd, $id_user, $pseudo, $mail, $pwd);

        // Redirige vers la page de profil de l'utilisateur avec un message de succès
        header('Location: profil.php?message=Mise à jour effectuée avec succès');
        exit;
    } else {
        // Si les champs ne sont pas définis ou vides, affiche un message d'erreur
        echo "Tous les champs sont obligatoires";
    }
}

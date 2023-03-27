<?php
session_start();
include '../view/view.header.php';
include '../view/pwd.php';
include '../model/connect.php';
include '../model/get.php';

if(!empty($_POST['mail']) AND !empty($_POST['new_password']) AND !empty($_POST['new_password1'])){

// Récupère les valeurs des champs du formulaire
$mail = filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL);
$newPassword = filter_var($_POST['new_password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$newPassword1 = filter_var($_POST['new_password1'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Vérifie si le code de réinitialisation est valide pour l'adresse e-mail donnée
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        // Si l'adresse e-mail n'est pas valide, affiche un message d'erreur
        echo "Adresse e-mail invalide";
    } else {
        // Interroge la base de données pour récupérer l'utilisateur correspondant à l'adresse e-mail
        $user = getUserByMail($bdd,$mail);
        if ($user && $newPassword == $newPassword1 ) {
            // Vérifie que le nouveau mot de passe respecte les critères de sécurité (par exemple, au moins 8 caractères, contient au moins une lettre maj ou min et un chiffre avec (?=.*\d) )
            if (preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', $newPassword)) {
                // Hash le nouveau mot de passe avant de le stocker dans la base de données
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                updateUserPassword($bdd, $id_user, $hashedPassword);
    
                echo "Mot de passe mis à jour avec succès";
            } else {
                // Si le nouveau mot de passe ne respecte pas les critères de sécurité, affiche un message d'erreur
                echo "Le nouveau mot de passe doit comporter au moins 8 caractères et contenir au moins une lettre et un chiffre";
            }
        } else {
            //  affiche un message d'erreur
            echo "vérifier si le password = à la vérification du password";
        }
    }
}
<?php
session_start();
include '../view/view.header.php';
include '../model/connect.php';
include '../view/v.connexion.php';

// CONNEXION //

if(isset($_SESSION['user'])){
    
    // L'utilisateur est déjà connecté
    echo "User is already connected.";
    if(isset($_SESSION['role']) && $_SESSION['role'] === '1'){
    
        // L'utilisateur est un administrateur, rediriger vers la page d'administration
        echo  "User is an admin.";
        header('Location: admin.php');
       
    } else {
        // L'utilisateur n'est pas un administrateur, rediriger vers la page de profil.
        echo "User is not an admin.";
        header('Location: profil.php');
        exit();
    }
} else {
    include '../model/connect.php';
    include '../model/get.php';

    $errors = [];
    $success = '';

    if(isset($_POST['submit'])){

        // nettoyage des données entrantes
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $pwd = htmlspecialchars($_POST['pwd']);

        if(!empty($pseudo) && !empty($pwd)){
            $user = getUser($bdd, $pseudo);

            if($user){
                $hashed_password = $user['pwd_user'];

                if(password_verify($pwd, $hashed_password)) {
                    // stockage des informations de profil dans la variable de session
                    $_SESSION['user'] = $user['pseudo_user'];
                    $_SESSION['mail'] = $user['mail_user'];
                    $_SESSION['id'] = $user['id_user'];
                    $_SESSION['role'] = $user['id_role'];

                    // message de succès
                    $success = "Vous êtes maintenant connecté.";
                    echo $success;

                    if($user['id_role'] === 1 ){
                        $_SESSION['id_role'] = '1';
                        // L'utilisateur est un administrateur, rediriger vers la page d'administration
                        echo "User is an admin.";

                        header('Location: admin.php');
                        
                        exit();
                    } else {
                        $_SESSION['id_role'] = '10';
                        // L'utilisateur n'est pas un administrateur, rediriger vers la page de profil.
                        echo "User is not an admin.";
                        header('Location: profil.php');
                        exit();
                    }
                } else {
                    // message d'erreur
                    $errors[] = "Vos informations de connexion sont incorrectes.";
                }
            } else { 
                // message d'erreur
                $errors[] = "Aucun utilisateur avec ce nom n'a été trouvé.";
            }
        } else {
            // message d'erreur
            $errors[] = "Veuillez compléter tous les champs.";
        }
    }
}

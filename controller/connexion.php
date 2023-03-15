<?php
session_start();
include '../view/view.header.php';
include '../view/connexion.php';
// CONNEXION //

if(isset($_SESSION['user'])){
    header('Location: view\profil.php');
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
            $reqUser = getUser($bdd, $pseudo);

            if($reqUser->rowCount() > 0){
                $user = $reqUser->fetch();
                $hashed_password = $user['pwd_user'];

                if(password_verify($pwd, $hashed_password)) {
                    // stockage des informations de profil dans la variable de session
                    $_SESSION['user'] = $user['pseudo_user'];
                    $_SESSION['mail'] = $user['mail_user'];
                    $_SESSION['id'] = $user['id_user'];
                    $_SESSION['role'] = (string)$user['id_role'];

                    // message de succès
                    $success = "Vous êtes maintenant connecté.";
                    echo $success;
                    header('Location: view\profil.php');
                    exit();
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

    $style = "style";

    // include '../view/view.footer.php';
}

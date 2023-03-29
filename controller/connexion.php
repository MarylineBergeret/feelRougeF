<?php
// session_set_cookie_params([
//     'lifetime' => 86400,
//     'path' => '/',
//     'domain' => $_SERVER['HTTP_HOST'],
//     'secure' => true,
//     'httponly' => true,
//     'samesite' => 'Strict'
//   ]);
session_start();
include '../view/view.header.php';
include '../model/connect.php';
include '../view/v.connexion.php';

// CONNEXION //

if(isset($_SESSION['user'])){
    if(isset($_SESSION['user']['id_role']) && $_SESSION['role'] === '1'){  
        // L'utilisateur est un administrateur, rediriger vers la page d'administration      
        header('Location: admin.php');      
    } else {
        // L'utilisateur n'est pas un administrateur, rediriger vers la page de profil.
        
        header('Location: profil.php');
        exit();
    }
} else {  
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
                // $hashed_password = password_hash($pwd, PASSWORD_BCRYPT);

                if(password_verify($pwd, $hashed_password)) {
                    // stockage des informations de profil dans la variable de session
                    /*$_SESSION['user'] = $user['pseudo_user'];
                    $_SESSION['mail'] = $user['mail_user'];
                    $_SESSION['id'] = $user['id_user'];
                    $_SESSION['role'] = $user['id_role'];*/
                    $_SESSION['user'] = $user;

                    // message de succès
                    $success = "Vous êtes maintenant connecté.";
                    

                    if(isset($_SESSION['user']['id_role']) && $_SESSION['user']['id_role'] == '1' ){
                        //$_SESSION['id_role'] = '1';
                        // L'utilisateur est un administrateur, rediriger vers la page d'administration
                        header('Location: admin.php');
                        exit();
                    } elseif(isset($_SESSION['user']['id_role']) && $_SESSION['user']['id_role'] === '10') {
                        //$_SESSION['id_role'] = '10';
                        // L'utilisateur n'est pas un administrateur, rediriger vers la page de profil.
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
include '../view/foot.php';
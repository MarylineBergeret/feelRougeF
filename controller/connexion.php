<?php
session_start();
include '../view/view.header.php';
include '../model/connect.php';

// CONNEXION //
if(isset($_SESSION['user'])){
    if(isset($_SESSION['user']['id_role']) && $_SESSION['role'] == 1){  
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
                // 
                if(password_verify($pwd, $hashed_password)) {           
                    $_SESSION['user'] = $user;                    
                    header('Location: profil.php');
                } else {
                    // message d'erreur
                    $errors[] = "Ca le fait pas, vos informations de connexion sont incorrectes ! ";
                }
            } else { 
                // message d'erreur
                $errors[] = "J'ai cherché partout mais aucun utilisateur avec ce nom n'a été trouvé.";
            }
        } else {
            // message d'erreur
            $errors[] = "Il en manque la moitié ! Veuillez compléter tous les champs.";
        }
    }
}
include '../view/v.connexion.php';
include '../view/v.foot.php';



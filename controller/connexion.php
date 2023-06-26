<?php
session_start();
include '../view/view.header.php';
include '../model/connect.php';

if(isset($_SESSION['user'])){
    if(isset($_SESSION['user']['id_role']) && $_SESSION['role'] == 1){  
        // L'utilisateur est un administrateur, redirigé vers la page d'administration      
        header('Location: admin.php');      
    } else {
        // L'utilisateur n'est pas un administrateur, redirigé vers la page de profil.        
        header('Location: profil.php');
        exit();
    }
} else {  
    include '../model/get.php';
    $errors = [];
    $success = '';
    // Vérifier le nombre de tentatives de connexion
    if (!isset($_SESSION['login_attempts'])) {
        $_SESSION['login_attempts'] = 0;
    }
    $max_login_attempts = 5; // Nombre maximal de tentatives de connexion autorisées

    if ($_SESSION['login_attempts'] >= $max_login_attempts) {
        // Bloquer temporairement l'accès à l'interface de connexion
        $_SESSION['login_blocked'] = true;
        $_SESSION['block_start_time'] = time(); // Ajout de cette ligne
    
        header('Location: login_blocked.php');
        exit();
    }
    // si le formulaire est soumis en vérifiant si la clé 'submit' existe dans le tableau $_POST
    if(isset($_POST['submit'])){
        // nettoyage des données entrantes
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $pwd = htmlspecialchars($_POST['pwd']);
        // si les données demandées ne sont pas vident on récupère les données de l'user selon son pseudo
        if(!empty($pseudo) && !empty($pwd)){
            $user = getUser($bdd, $pseudo);
            // Si l'utilisateur existe, 
            if($user){
                $hashed_password = $user['pwd_user'];
                // le mdp fourni est vérifié avec la fonction password_verify() avec le mot de passe
                // fourni et le mot de passe haché stocké dans la bdd.
                if(password_verify($pwd, $hashed_password)) {   
                    $_SESSION['login_attempts'] = 0;        
                    $_SESSION['user'] = $user;                    
                    header('Location: profil.php');
                } else { // Authentification échouée, incrémentation du compteur de tentatives
                    $_SESSION['login_attempts']++;
                    $errors[] = "Ca le fait pas, vos informations de connexion sont incorrectes ! ";
                }
            } else { 
                $_SESSION['login_attempts']++;
                $errors[] = "J'ai cherché partout mais aucun utilisateur avec ce nom n'a été trouvé.";
            }
        } else {
            $_SESSION['login_attempts']++;
            $errors[] = "Il en manque la moitié ! Veuillez compléter tous les champs.";
        }
    }
}
include '../view/v.connexion.php';
include '../view/v.foot.php';



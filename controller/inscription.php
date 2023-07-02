<?php
session_start();
    if(isset($_SESSION['user'])){
        header('Location: accueil.php');
    }else{
        include '../model/connect.php';
        include '../model/get.php';
        include '../model/insert.php';
        $errors = [];   
        if(isset($_POST['submit'])){
            $pseudo = htmlspecialchars($_POST['pseudo']);           
            $mail = htmlspecialchars($_POST['mail']);
            $pwd = htmlspecialchars($_POST['pwd']);
            $bio = htmlspecialchars($_POST['bio']);
            if($pseudo == null || $mail == null || $pwd == null){
                $error1 = "hop hop hop, veuillez remplir tous les champs !";
                $errors[] = $error1;
            }else{// fonctions natives de PHP
                if(strlen($pseudo)<5){
                    $error2 = "Un petit effort, le nom d'utilisateur doit contenir AU MOINS 5 caractères.";
                    $errors[] = $error2;
                }
                if(strlen($pseudo)>20){
                    $error3 = "On se calme, le nom d'utilisateur ne doit pas dépasser 20 caractères.";
                    $errors[] = $error3;
                }
                if(!ctype_alnum($pseudo)){
                    $error4 = "Le nom d'utilisateur ne peut PAS contenir de caractères spéciaux.";
                    $errors[] = $error4;
                } 
                if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){ //filtre prédéfini de PHP 
                    $error5 = "What ? Entrez une adresse mail avec un format valide (-----@----.fr), c'est mieux.";
                    $errors[] = $error5;
                }
                // Regex Expression régulière avec arguments : min 5 caractères, 1 caractère spécial au moins une lettre maj. et un chiffre
                if (strlen($pwd) < 5 || !preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@#$%^&!\+=])(?=.*[A-Z]).{5,}$/', $pwd)) {
                    $error6 = "Alors oui mais non, le mot de passe doit contenir AU MOINS 5 caractères, un caractère spécial et une majuscule.";
                    $errors[] = $error6;
                }
                $fetchMail = getMail($bdd, $mail);// Vérifie si l'adresse e-mail existe déjà dans la base de données
                $fetchPseudo = getUser($bdd, $pseudo);
                if ($fetchPseudo !== false) {
                    $fetchPseudo = $fetchPseudo['pseudo_user'];
                }
                if($fetchPseudo >=1 || $fetchMail >=1){
                    $error7 = "Ca va pas être possible... le nom d'utilisateur ou l'adresse mail sont déjà existants !";
                    $errors[] = $error7;
                }elseif($errors == null){
                    $pwd = (password_hash($pwd, PASSWORD_BCRYPT));// Hash le mot de passe avant de l'insérer dans la base de données                    
                    createUser($bdd, $pseudo, $mail, $pwd, $bio);                   
                    unset($errors);  // Supprime les erreurs, car l'inscription a réussi                 
                }
            }
        }
    }
    include '../view/view.header.php';
    include '../view/v.inscription.php';
    include '../view/v.foot.php';
    

 
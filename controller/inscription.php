<?php
// INSCRIPTION //
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
            $pwd = htmlspecialchars($_POST['pwd']);
            $mail = htmlspecialchars($_POST['mail']);
            $bio = htmlspecialchars($_POST['bio']);

            if($pseudo == null || $pwd == null || $mail == null){
                $error1 = "Veuillez remplir tous les champs.";
                $errors[] = $error1;
            }else{
                if(strlen($pseudo)<5){
                    $error2 = "Le nom d'utilisateur doit contenir AU MOINS 5 caractères.";
                    $errors[] = $error2;
                }
                if(strlen($pseudo)>20){
                    $error3 = "Le nom d'utilisateur ne doit pas dépasser 20 caractères.";
                    $errors[] = $error3;
                }
                if(!ctype_alnum($pseudo)){
                    $error4 = "Le nom d'utilisateur ne peut PAS contenir de caractères spéciaux.";
                    $errors[] = $error4;
                }
                if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
                    $error5 = "Entrez une adresse mail avec un format valide (-----@----.fr)";
                    $errors[] = $error5;
                }
                if(strlen($pwd)<5){
                    $error6 = "Le mot de passe doit contenir AU MOINS 5 caractères.";
                    $errors[] = $error6;
                }
                $fetchMail = getMail($bdd, $mail)->fetchColumn();
                $fetchPseudo = getUser($bdd, $pseudo)->fetchColumn();
                

                if($fetchPseudo >=1 || $fetchMail >=1){
                    $error7 = "Le nom d'utilisateur ou l'adresse mail sont déjà existants";
                    $errors[] = $error7;
                }
                elseif($errors == null){
                    $pwd = (password_hash($pwd, PASSWORD_BCRYPT));
                    // $role = 10;
                    createUser($bdd, $pseudo, $pwd, $mail, $bio, 1, 10);
                    
                    unset($errors);
                    
                    
                }
            }
        }
        
        include '../view/view.header.php';
        include '../view/inscription.php';
    }

 
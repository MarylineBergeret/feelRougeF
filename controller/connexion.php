<?php
//Variable de SESSION par id utilisateurs et verifications de connexion
session_start();

// CONNEXION //
    if(isset($_SESSION['user'])){
        header('Location: view.profil.php');
    }else{
        include '../model/connect.php';
        include '../model/get.php';

        if(isset($_POST['submit'])){
            $errors = [];
    
            if(!empty($_POST['pseudo']) AND !empty($_POST['pwd'])){
                $pseudo = ($_POST['pseudo']);
                $pwd = ($_POST['pwd']);
                
                $reqUser = getUser($bdd, $pseudo);
        
                if($reqUser->rowCount() > 0){
                    $user = $reqUser->fetch();
                    $hashed_password = $user['pwd_user'];
                        if(password_verify($pwd, $hashed_password)) {
                            $_SESSION['user'] = $user['pseudo_user'];
                            $_SESSION['pwd'] = $user['pwd_user'];
                            $_SESSION['mail'] = $user['mail_user'];
                            $_SESSION['id'] = $user['id_user'];
                            $_SESSION['role'] = (string)$user['id_role'];
                            header('Location: view.profil.php');
                        }else{
                            $error3 = "Vos informations sont incorrectes.";
                            $errors[] = $error3;
                        }
                }else{ 
                    $error2 = "Aucun utilisateur avec ce nom n'a été trouvé.";
                    $errors[] = $error2;
                }
            }else{
                    $error1 = "Veuillez compléter tous les champs.";
                    $errors[] = $error1;
            }
        }


        $style = "connexion";
        include '../view/view.header.php';
        include '../view/connexion.php';
        // include '../view/view.footer.php';
}




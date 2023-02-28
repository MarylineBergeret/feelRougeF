<?php
//Variable de SESSION par id utilisateurs et verifications de connexion
session_start();

// CONNEXION //
    if(isset($_SESSION['user'])){
        header('Location: controller.accueil.php');
    }else{
        include '../model/connect.php';
        include '../model/get.php';

        if(isset($_POST['submit'])){
            $errors = [];
    
            if(!empty($_POST['mail']) AND !empty($_POST['pwd'])){
                $mail = htmlspecialchars($_POST['mail']);
                $pwd = htmlspecialchars($_POST['pwd']);
                
                $reqMail = getUserMail($bdd, $mail);
        
                if($reqMail->rowCount() > 0){
                    $user = $reqMail->fetch();
                    $hashed_password = $user['pwd_user'];
                        if(password_verify($pwd, $hashed_password)) {
                            $_SESSION['user'] = $mail;

                            $_SESSION['pwd'] = $pwd;
                            $_SESSION['id'] = $user['id_user'];
                            $_SESSION['role'] = (string)$user['id_role'];
                            header('Location: controller.php');
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




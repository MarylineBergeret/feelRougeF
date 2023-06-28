<?php
session_start();
include '../view/view.header.php';
include '../model/connect.php';

if(isset($_SESSION['user'])){
    if(isset($_SESSION['user']['id_role']) && $_SESSION['role'] == 1){  
          // User is an administrator, redirect to the admin page       
        header('Location: admin.php');      
    } else {
        // User is not an administrator, redirect to the profile page          
        header('Location: profil.php');
        exit();
    }
} else {  
    include '../model/get.php';
    $errors = [];
    $success = '';
    // Check login attempts
    if (!isset($_SESSION['login_attempts'])) {
        $_SESSION['login_attempts'] = 0;
    }
    $max_login_attempts = 5; // Maximum number of allowed login attempts

    if ($_SESSION['login_attempts'] >= $max_login_attempts) {
         // Temporarily block access to the login interface
        $_SESSION['login_blocked'] = true;
        $_SESSION['block_start_time'] = time(); 
    
        header('Location: login_blocked.php');
        exit();
    }
    // Check if the form is submitted by checking if the 'submit' key exists in the $_POST array
    if(isset($_POST['submit'])){
         // Clean incoming data
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $pwd = htmlspecialchars($_POST['pwd']);
        // If the requested data is not empty, retrieve user data based on their username
        if(!empty($pseudo) && !empty($pwd)){
            $user = getUser($bdd, $pseudo);
            // If the user exists,
            if($user){
                $hashed_password = $user['pwd_user'];
                // Verify the provided password using the password_verify() function with the provided password
                // and the hashed password stored in the database.
                if(password_verify($pwd, $hashed_password)) {   
                    $_SESSION['login_attempts'] = 0;        
                    $_SESSION['user'] = $user;                    
                    header('Location: profil.php');
                } else {  // Authentication failed, increment login attempts counter
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



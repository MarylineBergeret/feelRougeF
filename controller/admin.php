<?php
session_start();

if(isset($_SESSION['user']['id_role']) && $_SESSION['user']['id_role'] == 1 ) {
    // If the user is an administrator, redirect to the administration page
    include '../view/view.header.php';
    include '../model/connect.php';
    include '../model/get.php';
    include '../model/delete.php';
   
    // Retrieve user data by calling the function and store it in a variable
    $users = getAllUser($bdd);
    include '../view/v.admin.php';   

    // Check if the request is of type POST
    if(isset($_POST['idUser'])) {
        // Get the user ID to delete from the POST request
        $userId = intval($_POST['idUser']);
        // Call the function to delete the user from the database
        deleteUserDTB($bdd, $userId);
    }
    include '../view/v.foot.php';   
} else {  
    // The user is not an administrator, redirect to the home page
    header('Location: accueil.php');
    exit();
}

?>


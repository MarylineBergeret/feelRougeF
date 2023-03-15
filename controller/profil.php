<?php
include '../model/connect.php';
include '../model/get.php';
include '../model/insert.php';
include '../view/view.header.php';
include '../view/profil.php';


// if (!empty($_POST['pseudo']) || !empty($_POST['email']) || !empty($_POST['password'])) {

// // Appeler la fonction getUser pour récupérer les informations de l'utilisateur
// $user = getUser($bdd, $pseudo);
//     // Afficher le formulaire pour modifier les informations de l'utilisateur
//     $pseudo = htmlspecialchars($_POST['pseudo']);
//     $mail = htmlspecialchars($_POST['email']);
//     $pwd = htmlspecialchars($_POST['password']);
//     updateUser($bdd, $pseudo, $mail, $pwd); // Correction : appel de la fonction updateUser
//     $answer = "Vos données ont été mises à jour";
//     echo $answer; // Correction : utilisation de echo
// } else {
//     $messagePb = "Problème lors de la mise à jour des données.";
//     echo $messagePb; // Correction : utilisation de echo
// }

if (!empty($_POST['concert1']) && !empty($_POST['concert1_band']) && !empty($_POST['concert1_location']) && !empty($_POST['concert1_year'])
    && !empty($_POST['concert2']) && !empty($_POST['concert2_band']) && !empty($_POST['concert2_location']) && !empty($_POST['concert2_year'])
    && !empty($_POST['concert3']) && !empty($_POST['concert3_band']) && !empty($_POST['concert3_location']) && !empty($_POST['concert3_year'])
    && !empty($_POST['concert4']) && !empty($_POST['concert4_band']) && !empty($_POST['concert4_location']) && !empty($_POST['concert4_year'])
    && !empty($_POST['concert5']) && !empty($_POST['concert5_band']) && !empty($_POST['concert5_location']) && !empty($_POST['concert5_year'])) {

    $concerts = array();

    for ($i = 1; $i <= 5; $i++) {
        $concert_name = 'concert' . $i;
        $band_name = 'concert' . $i . '_band';
        $location_name = 'concert' . $i . '_location';
        $year_name = 'concert' . $i . '_year';

        $concert = array(
            'name' => $_POST[$concert_name],
            'band' => $_POST[$band_name],
            'location' => $_POST[$location_name],
            'year' => $_POST[$year_name]
        );

        $concerts[] = $concert;
    }


    foreach($concerts as $concert) {
        $name = htmlspecialchars($concert['name']);
        $band = htmlspecialchars($concert['band']);
        $location = htmlspecialchars($concert['location']);
        $year = htmlspecialchars($concert['year']);
        insereConcert($bdd,$band,$location,$year);
    }
    $message = "Vos concerts préférés ont été enregistrés dans la base de données.";
    return $message;
}





?>


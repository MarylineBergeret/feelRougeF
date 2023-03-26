<?php
session_start();
include '../model/connect.php';
include '../model/get.php';
include '../model/read.php';
include '../model/insert.php';
include '../view/view.header.php';
// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    // Rediriger l'utilisateur vers la page de connexion
    header('Location: connexion.php');
    exit();
}
$id_user = $_SESSION['id'];


    $user = getUserById($bdd,$id_user);
    $imageUrl = getUserImage($bdd,$id_user);
    $concerts = getConcertsById($bdd, $id_user);
    $pos = strpos($user['mail_user'], '@');
include '../view/v.profil.php';

if (!empty($_POST['concert1']) && !empty($_POST['concert1_band']) && !empty($_POST['concert1_location']) && !empty($_POST['concert1_year'])
    && !empty($_POST['concert2']) && !empty($_POST['concert2_band']) && !empty($_POST['concert2_location']) && !empty($_POST['concert2_year'])
    && !empty($_POST['concert3']) && !empty($_POST['concert3_band']) && !empty($_POST['concert3_location']) && !empty($_POST['concert3_year'])
    && !empty($_POST['concert4']) && !empty($_POST['concert4_band']) && !empty($_POST['concert4_location']) && !empty($_POST['concert4_year'])
    && !empty($_POST['concert5']) && !empty($_POST['concert5_band']) && !empty($_POST['concert5_location']) && !empty($_POST['concert5_year'])) {
        // Stocker les données utilisateur dans la session
    $_SESSION['user_data'] = array();

    for ($i = 1; $i <= 5; $i++) {
        $concert = "concert{$i}";
        $band = "concert{$i}_band";
        $location = "concert{$i}_location";
        $year = "concert{$i}_year";
    
        // Vérifier si l'année est valide (comprise entre 1960 et 2023)
        if (isset($_POST[$year]) && $_POST[$year] >= 1960 && $_POST[$year] <= 2023) {
            $_SESSION['user_data'][$concert] = $_POST[$concert];
            $_SESSION['user_data'][$band] = $_POST[$band];
            $_SESSION['user_data'][$location] = $_POST[$location];
            $_SESSION['user_data'][$year] = $_POST[$year];
        } else {
            // Si l'année n'est pas valide, stocker un message d'erreur
            $_SESSION['user_data']['error'] = "L'année du concert n°{$i} doit être comprise entre 1960 et 2023.";
            // Rediriger l'utilisateur vers la page de formulaire
            header('Location: formulaire.php');
            exit();
        }
    }
   
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
        $concerts_pref = getConcertsById($bdd, $id_user); 
        if(count($concerts_pref) > 0){
           
        // Mettre à jour les données existantes
            foreach($concerts_pref as $i => $concert) {
                $id_concert = $concert['id_concert'];
                $band = htmlspecialchars($concert['band_concert']);
                $location = htmlspecialchars($concert['location_concert']);
                $year = htmlspecialchars($concert['year_concert']);
                updateConcert($bdd, $id_concert, $band, $location, $year);           
            }
            $message = "Vos concerts préférés ont été mis à jour dans la base de données.";   
        } else {
        // Insérer de nouvelles données
            
            foreach($concerts as $concert) {
                $name = htmlspecialchars($concert['name']);
                $band = htmlspecialchars($concert['band']);
                $location = htmlspecialchars($concert['location']);
                $year = htmlspecialchars($concert['year']);
                $id_concert = insereConcerts($bdd,$band,$location,$year);
                inserePrefere($bdd, $id_user, $id_concert);   
        }
        $message = "Vos concerts préférés ont été enregistrés dans la base de données.";
    }
    return $message;
         
}else{
    echo "Veuillez remplir tous les champs.";
}




// Vérifie si le formulaire a été soumis
if (isset($_POST['submit'])) {
    // Vérifie si un fichier a été sélectionné
    if (isset($_FILES['image'])) {
        // Récupère les informations sur le fichier
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_size = $_FILES['image']['size'];
        $file_error = $_FILES['image']['error'];

        // Vérifie s'il y a une erreur dans le fichier
        if ($file_error === 0) {
            // Vérifie la taille de fichier
            if ($file_size <= 5000000) {
                // Crée un nom de fichier unique
                $file_destination = 'uploads/' . uniqid('', true) . '.' . strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                // Déplace le fichier dans le dossier "uploads"
                if (move_uploaded_file($file_tmp, $file_destination)) {
                    // Le fichier a été téléchargé avec succès
                    echo 'Le fichier a été téléchargé avec succès.';
                } else {
                    // Une erreur s'est produite lors du téléchargement du fichier
                    echo 'Une erreur s\'est produite lors du téléchargement du fichier.';
                }
            } else {
                // Le fichier est trop volumineux
                echo 'Le fichier est trop volumineux.';
            }
        } else {
            // Une erreur s'est produite lors du téléchargement du fichier
            echo 'Une erreur s\'est produite lors du téléchargement du fichier.';
        }
    }
}

?>



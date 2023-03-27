<?php
session_start();
include '../model/connect.php';
include '../model/get.php';
include '../model/insert.php';

if(isset($_SESSION['user'])){
   
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Vérifie si les champs sont définis et non vides
        if (isset($_POST['new_pseudo']) && isset($_POST['new_email']) && isset($_POST['new_bio'])) {
            // Récupère les données soumises par le formulaire
            $pseudo = htmlspecialchars($_POST['new_pseudo']);
            $mail = htmlspecialchars($_POST['new_email']);
            $bio = htmlspecialchars($_POST['new_bio']);
            $id_user = $_SESSION['id_user'];
            
            // Appelle la fonction updateUser pour mettre à jour les informations de l'utilisateur
            updateUser($bdd, $id_user, $pseudo, $mail, $bio);

            // Redirige vers la page de profil de l'utilisateur avec un message de succès
            header('Location: profil.php?message=Mise à jour effectuée avec succès');
            exit;
        } else {
            // Si les champs ne sont pas définis ou vides, affiche un message d'erreur
            echo "Tous les champs sont obligatoires";
        }
    
        // Vérifie si le formulaire a été soumis
        if (isset($_POST['submit'])) {
            // Vérifie si un fichier a été sélectionné
            if (isset($_FILES['image'])) {
                // Récupère les informations sur le fichier
                $file_name = $_FILES['image']['name'];
                $file_tmp = $_FILES['image']['tmp_name'];
                $file_size = $_FILES['image']['size'];
                $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
            
                $extensions= array("jpeg","jpg","png","gif");
                $file_error = $_FILES['image']['error'];

                // Vérifie s'il y a une erreur dans le fichier
                if ($file_error === 0) {
                    // Vérifie la taille de fichier
                    if(in_array($file_ext,$extensions)=== false){
                        echo "Extension de fichier non autorisée, veuillez télécharger une image JPEG, PNG ou GIF.";
                    }    
                    if ($file_size <= 5000000) {
                    // Crée un nom de fichier unique
                        $file_destination = '../assets/image' . uniqid('', true) . '.' . strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                    // Déplace le fichier dans le dossier "image"
                        if (move_uploaded_file($file_tmp, $file_destination)) {
                        // Le fichier a été téléchargé avec succès
                            echo 'Le fichier a été téléchargé avec succès.';
                            insertImage($bdd, $file_name);
                            updateUserImage($bdd, $id_user, $id_image);
                            getUserImage($bdd,$id_user);
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
    }
}
include '../view/v.profil.php';
    
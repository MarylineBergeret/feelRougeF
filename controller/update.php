<?php
session_start();
include '../model/connect.php';
include '../model/get.php';
include '../model/insert.php';
include '../model/update.php';
include '../view/v.header.php';
include '../view/v.profil.php';

if(isset($_SESSION['user']['id_user'])){
   
    if (isset($_FILES['file'])) {
        // Récupère les informations sur le fichier
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_size = $_FILES['file']['size'];
        $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
    
        $extensions= array("jpeg","jpg","png","gif");
        $file_error = $_FILES['file']['error'];

        // Vérifie s'il y a une erreur dans le fichier
        if ($file_error === 0) {
            // Vérifie la taille de fichier
            if(in_array($file_ext,$extensions)=== false){
                echo "Extension de fichier non autorisée, veuillez télécharger une image JPEG, PNG ou GIF.";
            }    
            if ($file_size <= 5000000) {
            // Crée un nom de fichier unique
            $file_destination = "../import/image/$file_name";
                // $file_destination = '../assets/image' . uniqid('', true) . '.' . strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
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
    


include '../view/v.foot.php';
    
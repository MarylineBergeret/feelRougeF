<?php
session_start();
include "../view/view.header.php";

// Inclure le fichier de configuration de la base de données
require_once '../model/connect.php';
require_once '../model/insert.php';

$status = ""; // Variable pour stocker le message d'erreur ou de succès

if (isset($_POST['submit'])) {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    $message = htmlspecialchars($_POST['textarea']);

    // Validation de l'adresse e-mail
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $status = "Entrez une adresse e-mail avec un format valide (exemple@example.com).";
    } else {
        // Appel de la fonction sendMessage et stockage du statut de l'envoi
        $status = sendMessage($bdd, $pseudo, $mail, $message);
    }
}
include "../view/v.contact.php";
include "../view/v.foot.php";
?>

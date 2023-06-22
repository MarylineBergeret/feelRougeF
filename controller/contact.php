<?php
session_start();
include "../view/view.header.php";
include "../view/v.contact.php";

if (isset($_POST['submit'])) {
    $pseudo = $_POST['pseudo'];
    $mail = $_POST['mail'];
    $message = $_POST['textarea'];

    $to = 'maryline.mourgues@outlook.fr'; // Adresse e-mail de destination
    $subject = 'Nouveau message de formulaire de contact';
    $body = "Pseudo: $pseudo\n\nE-mail: $mail\n\nMessage:\n$message";

    // Envoyer l'e-mail
    if (mail($to, $subject, $body)) {
        echo 'Le message a été envoyé avec succès.';
    } else {
        echo 'Une erreur s\'est produite lors de l\'envoi du message.';
    }
}
include "../view/v.foot.php";
?>
<?php
session_start();
include "../view/view.header.php";

// Include the database configuration file
require_once '../model/connect.php';
require_once '../model/insert.php';

$status = ""; // Variable to store error or success message

if (isset($_POST['submit'])) {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    $message = htmlspecialchars($_POST['textarea']);

    // Validate email address
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $status = "Entrez une adresse e-mail avec un format valide (exemple@example.com).";
    } else {
         // Call the sendMessage function and store the send status
        $status = sendMessage($bdd, $pseudo, $mail, $message);
    }
}
include "../view/v.contact.php";
include "../view/v.foot.php";
?>

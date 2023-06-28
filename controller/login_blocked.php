<?php
include "../view/view.header.php";
session_start();
// Vérifier si la variable de blocage de connexion est définie dans la session
if (isset($_SESSION['login_blocked']) && $_SESSION['login_blocked']) {
// Calculer le temps restant avant de réinitialiser le compteur de tentatives de connexion
    $block_duration = 60 * 60; // Durée de blocage en secondes 
    $time_elapsed = time() - $_SESSION['block_start_time'];
    $time_remaining = $block_duration - $time_elapsed;
    // Afficher un message de blocage et le temps restant
    echo '<p style="color: red; font-weight: bold;">Accès temporairement bloqué en raison de tentatives de connexion infructueuses. Veuillez réessayer après ' . $time_remaining . ' secondes. Vous pourrez envoyer un message via le formulaire de contact.</p>';
} else {
    // Rediriger vers l'interface de connexion si la session de blocage n'est pas définie
    header('Location: login.php');
    exit();
}
include "../view/v.foot.php";
?>

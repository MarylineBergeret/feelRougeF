<?php
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}
$max_login_attempts = 5; // Nombre maximal de tentatives de connexion autorisées

if ($_SESSION['login_attempts'] >= $max_login_attempts) {
    // Bloquer temporairement l'accès à l'interface de connexion
    $_SESSION['login_blocked'] = true;
    header('Location: login_blocked.php');
    exit();
}
if (password_verify($pwd, $hashed_password)) {
    // Authentification réussie
    // Réinitialiser le compteur de tentatives de connexion
    $_SESSION['login_attempts'] = 0;
    // Rediriger vers la page de profil
    header('Location: profil.php');
    exit();
} else {
    // Authentification échouée, incrémentation du compteur de tentatives
    $_SESSION['login_attempts']++;
    // Message d'erreur
    $errors[] = "Ca le fait pas, vos informations de connexion sont incorrectes ! ";
}
// Réinitialiser le compteur de tentatives de connexion après 24 heures
if (isset($_SESSION['login_blocked']) && $_SESSION['login_blocked']) {
    $block_duration = 60 * 60; // Durée de blocage en secondes (24 heures)
    if (time() - $_SESSION['block_start_time'] >= $block_duration) {
        // Temps écoulé, réinitialiser le compteur de tentatives et autoriser la connexion
        $_SESSION['login_attempts'] = 0;
        $_SESSION['login_blocked'] = false;
        // Rediriger vers l'interface de connexion
        header('Location: login.php');
        exit();
    }
}

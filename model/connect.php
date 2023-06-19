<?php
// Connexion à la base de données
$dsn = 'mysql:host=localhost;dbname=filr;charset=utf8';
$username = 'root';
$password = '';

try {
    $bdd = new PDO($dsn, $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
}

?>

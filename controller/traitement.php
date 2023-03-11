<?php
$bdd = new PDO("mysql:host=localhost;dbname=nom_de_la_base_de_donnees", "nom_d_utilisateur", "mot_de_passe");

$concert1 = $_POST['concert1'];
$concert2 = $_POST['concert2'];
$concert3 = $_POST['concert3'];
$concert4 = $_POST['concert4'];
$concert5 = $_POST['concert5'];
// paramètres de liaison. Ils sont utilisés pour spécifier les valeurs qui seront insérées dans les champs de la table lors de l'exécution de la requête.
$req = $bdd->prepare("INSERT INTO concert (groupe, lieu, annee) VALUES (?, ?, ?)");

$req->execute(array($concert1, "lieu1", "annee1"));
$req->execute(array($concert2, "lieu2", "annee2"));
$req->execute(array($concert3, "lieu3", "annee3"));
$req->execute(array($concert4, "lieu4", "annee4"));
$req->execute(array($concert5, "lieu5", "annee5"));

echo "Vos concerts préférés ont été enregistrés dans la base de données.";
?>





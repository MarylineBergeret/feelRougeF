<?php

function createUser($bdd, $pseudo, $pwd, $mail, $bio, $id_image, $id_role)
{
    try
    {
        $req = $bdd->prepare(
            "INSERT INTO `users`(pseudo_user,pwd_user,mail_user,bio_user,id_image,id_role, id_cardfestival) values
        (:pseudo_user,:pwd_user,:mail_user,:bio_user,:id_image,:id_role,:id_cardfestival)"
        );
        $req->execute(array(
            'pseudo_user' => $pseudo,
            'pwd_user' => $pwd,
            'mail_user' => $mail,
            'bio_user' => $bio,
            'id_image' => $id_image,
            'id_role' => $id_role,
            'id_cardfestival' => $id_cardfestival
        ));
        $req->closeCursor();
        $good = "it's good";
        return $good;
    }
    catch(Exception $e){
        die('Erreur: ' .$e->getMessage());
        $bad = "it's bad";
        return $bad;
    }
}


<?php
$bdd = new PDO("mysql:host=localhost;dbname=nom_de_la_base_de_donnees", "nom_d_utilisateur", "mot_de_passe");

$concert1 = $_POST['concert1'];
$concert2 = $_POST['concert2'];
$concert3 = $_POST['concert3'];
$concert4 = $_POST['concert4'];
$concert5 = $_POST['concert5'];

$req = $bdd->prepare("INSERT INTO concert (groupe, lieu, annee) VALUES (?, ?, ?)");

$req->execute(array($concert1, "lieu1", "annee1"));
$req->execute(array($concert2, "lieu2", "annee2"));
$req->execute(array($concert3, "lieu3", "annee3"));
$req->execute(array($concert4, "lieu4", "annee4"));
$req->execute(array($concert5, "lieu5", "annee5"));

echo "Vos concerts préférés ont été enregistrés dans la base de données.";
?>



// Requête UPDATE pour mettre à jour les informations de l'utilisateur
$req = $bdd->prepare("UPDATE users SET name = ?, password = ?, email = ? WHERE id = ?");
$req->execute(array($_POST['name'], $_POST['password'], $_POST['email'], $id_utilisateur)); // $id_utilisateur est l'ID de l'utilisateur connecté
// function insert_vote($bdd, $id_cardfestival){
//     $insert = $bdd->prepare("INSERT INTO users where id_user=:id_user (id_cardfestival) VALUES (:id_cardfestival)");
//     $insert->execute(array(
//         'id_user' => $id_user,
//         'id_cardfestival' => $id_img
//     ));
// }
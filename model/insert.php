<?php

function createUser($bdd, $pseudo, $mail, $pwd, $bio){
    try
    { // Prepare the SQL query to insert a new user into the 'users' table
        $req = $bdd->prepare(
            "INSERT INTO `users`(pseudo_user,mail_user,pwd_user,bio_user) values
        (:pseudo_user,:mail_user,:pwd_user,:bio_user)"
        );
        $req->execute(array(
            'pseudo_user' => $pseudo,
            'mail_user' => $mail,
            'pwd_user' => $pwd,            
            'bio_user' => $bio,                                           
        ));
        // Close the database connection
        $req->closeCursor();
        // Return a message indicating that the user has been successfully created
        $good = "user create";
        return $good;
    }
    // In case of an error, display the error and return a message indicating that the user was not created
    catch(Exception $e){
        die('Erreur: ' .$e->getMessage());
        $bad = "user NO create";
        return $bad;
    }
}
function insereConcerts($bdd, $band, $location, $year) {
    try {
        $sql = "INSERT INTO concerts (band_concert, location_concert, year_concert) VALUES (:band, :location, :year)";
        $stmt = $bdd->prepare($sql);
        $stmt->bindParam(':band', $band);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':year', $year);
        $stmt->execute();
        return $bdd->lastInsertId();
    } catch(PDOException $e) {
        die('Erreur: ' . $e->getMessage());
        // Gérer les erreurs de la base de données
    }
}
function inserePrefere($bdd, $id_user, $id_concert) {
    try {
        $stmt = $bdd->prepare("INSERT INTO prefere (id_user, id_concert) VALUES (:id_user, :id_concert)");
        $stmt->bindParam(':id_user', $id_user);
        $stmt->bindParam(':id_concert', $id_concert);
        $stmt->execute();
    } catch(PDOException $e) {
        die('Erreur: ' . $e->getMessage());
        // Gérer les erreurs de la base de données
    }
}
function ajouterCommentaire($bdd, $content_commentCard, $id_cardFestival, $id_user) {
    try {
        $req = $bdd->prepare("INSERT INTO commentCard (content_commentCard, date_commentCard, id_cardFestival, id_user) VALUES (:content_commentCard, NOW(), :id_cardFestival, :id_user)");
        $req->bindParam(':content_commentCard', $content_commentCard);
        $req->bindParam(':id_cardFestival', $id_cardFestival);
        $req->bindParam(':id_user', $id_user);
        $req->execute();
    } catch(PDOException $e) {
        // Gérer l'erreur de l'insertion
        echo "Erreur : " . $e->getMessage();
    }
}
function insertImage($bdd, $file_name) {
    try {
        $file_destination = "..\import\image/$file_name";
        $req = $bdd->prepare('INSERT INTO images (url_image) VALUES (?)');
        $req->execute([$file_destination]);
        $id_image = $bdd->lastInsertId();
        return $id_image;
    } catch (PDOException $e) {
        echo 'Erreur ' . $e->getMessage();
        exit;
    }
}
function insertLike($bdd, $idUser, $idCardFestival) {
    try {
        $request = $bdd->prepare("INSERT INTO likes (id_user, id_cardFestival) VALUES (:idUser, :idCardFestival)");
        $request->execute(array(
            "idUser" => $idUser,
            "idCardFestival" => $idCardFestival
        ));
    } catch(PDOException $e) {
        die('Erreur: ' . $e->getMessage());
        // Gérer les erreurs de la base de données
    }
}
function sendMessage($bdd, $pseudo, $mail, $message) {
    try {
        // Préparer la requête d'insertion des données
        $stmt = $bdd->prepare("INSERT INTO contact (pseudo_contact, mail_contact, messages_contact) VALUES (:pseudo_contact, :mail_contact, :messages_contact)");

        // Lie les valeurs aux paramètres de la requête
        $stmt->bindParam(':pseudo_contact', $pseudo);
        $stmt->bindParam(':mail_contact', $mail);
        $stmt->bindParam(':messages_contact', $message);

        // Exécuter la requête
        if ($stmt->execute()) {
            $status = "Message envoyé avec succès.";
        } else {
            $status = "Erreur lors de l'envoi du message. Veuillez réessayer.";
        }
    } catch(PDOException $e) {
        die('Erreur: ' . $e->getMessage());
        // Gère les erreurs de la base de données
    }
    // Renvoie le statut de l'envoi du message
    return $status;
}



// Requête UPDATE pour mettre à jour les informations de l'utilisateur
// $req = $bdd->prepare("UPDATE `users` SET name_user = ?, pwd_user = ?, mail_user = ? WHERE id_user = ?");
// $req->execute(array($_POST['name_user'], $_POST['pwd_user'], $_POST['mail_user'], $id_user)); // $id_utilisateur est l'ID de l'utilisateur connecté
// function insert_vote($bdd, $id_cardfestival){
//     $insert = $bdd->prepare("INSERT INTO users where id_user=:id_user (id_cardfestival) VALUES (:id_cardfestival)");
//     $insert->execute(array(
//         'id_user' => $id_user,
//         'id_cardfestival' => $id_img
//     ));
// }
?>
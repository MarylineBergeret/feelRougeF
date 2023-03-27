<?php

function createUser($bdd, $pseudo, $mail, $pwd, $bio, $id_role, $id_image)
{
    try
    {
        $req = $bdd->prepare(
            "INSERT INTO `users`(pseudo_user,mail_user,pwd_user,bio_user,id_role,id_image) values
        (:pseudo_user,:mail_user,:pwd_user,:bio_user,:id_role,:id_image)"
        );
        $req->execute(array(
            'pseudo_user' => $pseudo,
            'mail_user' => $mail,
            'pwd_user' => $pwd,            
            'bio_user' => $bio,            
            'id_role' => $id_role,
            'id_image' => $id_image,            
           
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
};
function insereConcerts($bdd, $band, $location, $year) {
    $sql = "INSERT INTO concerts (band_concert, location_concert, year_concert) VALUES (:band, :location, :year)";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':band', $band);
    $stmt->bindParam(':location', $location);
    $stmt->bindParam(':year', $year);
    $stmt->execute();
    return $bdd->lastInsertId();
}

function inserePrefere($bdd, $id_user, $id_concert) {
    $stmt = $bdd->prepare("INSERT INTO prefere (id_user, id_concert) VALUES (:id_user, :id_concert)");
    $stmt->bindParam(':id_user', $id_user);
    $stmt->bindParam(':id_concert', $id_concert);
    $stmt->execute();
}

function ajouterCommentaire($bdd, $content_commentCard, $id_cardFestival) {
    try {
        $stmt = $bdd->prepare("INSERT INTO commentCard (content_commentCard, date_commentCard, id_cardFestival) VALUES (:content_commentCard, NOW(), :id_cardFestival)");
        $stmt->bindParam(':content_commentCard', $content_commentCard);
        $stmt->bindParam(':id_cardFestival', $id_cardFestival);
        $stmt->execute();
    } catch(PDOException $e) {
        // Gérer l'erreur de l'insertion
        echo "Erreur : " . $e->getMessage();
    }
}

function insertImage($bdd, $file_name) {
    try {
        $stmt = $bdd->prepare('INSERT INTO images (url_image) VALUES (:url_image)');
        $stmt->bindValue(':url_image', "images/".$file_name, PDO::PARAM_STR);
        $stmt->execute();
        $id_image = $bdd->lastInsertId();
        return $id_image;
    } catch (PDOException $e) {
        echo 'Une erreur est survenue lors de l\'insertion de l\'image : ' . $e->getMessage();
        exit;
    }
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
<?php

function getUser($bdd, $pseudo){
    try {
        $req = $bdd->prepare("SELECT * FROM users WHERE pseudo_user = :pseudo_user");
        $req->execute(array(
            'pseudo_user' => $pseudo
        ));
        return $req->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        die("error : " . $e->getMessage());
    }
}
function getAllUser($bdd) {
    try {
        // Requête SQL pour récupérer tous les utilisateurs et leur rôle
        $req = $bdd->prepare("SELECT users.*, roles.name_role FROM users JOIN roles ON users.id_role = roles.id_role");
        $req->execute();
        $results = $req->fetchAll();
        return $results;

    } catch (Exception $e) {
        die("Error : " . $e->getMessage());
    }
}

function getUserImage($bdd,$id_user) {
    try {
        $stmt = $bdd->prepare('SELECT images.url_image FROM users INNER JOIN images ON users.id_image = images.id_image WHERE users.id_user = :id_user');
        $stmt->bindValue(':id_user', $id_user, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['url_image'];
    } catch (PDOException $e) {
        echo 'Une erreur est survenue : ' . $e->getMessage();
        exit;
    }
}


function getUserMail($bdd, $mail){
    $reqUserMail = $bdd->prepare("SELECT * FROM users WHERE mail_user = :mail_user");
    $reqUserMail->execute(array(
        'mail_user' => $mail
    ));
    return $reqUserMail;
}

function getMail($bdd, $mail){
    $reqMail = $bdd->prepare("SELECT COUNT(mail_user) FROM users WHERE mail_user = :mail_user");
    $reqMail->execute(array(
        'mail_user' => $mail
    ));
    return $reqMail->fetchColumn();
}


function getPwd($bdd, $pwd){
    $reqPwd = $bdd->prepare("SELECT COUNT(pwd_user) FROM users WHERE pwd_user = :pwd_user");
    $reqPwd->execute(array(
        'pwd_user' => $pwd
    ));
    return $reqPwd;
}
function getAllUsers($bdd) {
    try {
        $req = $bdd->query('SELECT * FROM users');
        $users = $req->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération des informations des utilisateurs: " . $e->getMessage();
    }
}

function getUserById($bdd, $id_user)
{
    try {
        //On recherche tout de l'utilisateur par son id
        $req = $bdd->prepare("SELECT * FROM users where id_user = :id_user");
        $req->execute(array(
            "id_user" => $id_user
        ));
        // On récupère les données de l'utilisateur sous forme de tableau associatif
        $user = $req->fetch(PDO::FETCH_ASSOC);
        return $user;
    } catch (Exception $e) {
        die("error : " . $e->getMessage());
    }
}

function getUserByMail($bdd, $mail_user)
{
    try {
        //On recherche tout de l'utilisateur par son mail
        $req = $bdd->prepare("SELECT * FROM users where mail_user = :mail_user");
        $req->execute(array(
            "mail_user" => $mail_user
        ));
        // On récupère les données de l'utilisateur sous forme de tableau associatif
        $user = $req->fetch(PDO::FETCH_ASSOC);
        return $user;
    } catch (Exception $e) {
        die("error : " . $e->getMessage());
    }
}

function getComments($bdd) {
    try {
        $req = $bdd->prepare("SELECT commentCard.id_commentCard, commentCard.content_commentCard, commentCard.date_commentCard, cardFestivals.name_cardFestival, users.pseudo_user
        FROM commentCard
        INNER JOIN cardFestivals ON commentCard.id_cardFestival = cardFestivals.id_cardFestival
        INNER JOIN users ON commentCard.id_user = users.id_user");

      $req->execute(); // exécuter la requête SQL
  
      $comments = $req->fetchAll(PDO::FETCH_ASSOC);
  
      return $comments;
    } catch(PDOException $e) {
      echo "Erreur : " . $e->getMessage();
    }
  }
  

function getCardFestival($bdd) {
    try {
        $sql = $bdd->prepare("  SELECT *
                                FROM cardFestivals
                            ");
        $sql->execute();
        $results = $sql->fetchAll();
        return $results;
    } catch (Exception $e) {
        die("error : " . $e->getMessage());
    }
}

function getConcertsById($bdd, $id_user) {
    try {
        $req = $bdd->prepare('SELECT DISTINCT concerts.* 
                              FROM concerts 
                              INNER JOIN prefere ON concerts.id_concert = prefere.id_concert 
                              WHERE prefere.id_user = :id_user');
        $req->execute(array('id_user' => $id_user));
        $concerts = $req->fetchAll(PDO::FETCH_ASSOC);
        return $concerts;
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération des informations de concerts: " . $e->getMessage();
    }
}

function incrementLikes($bdd,$id_cardFestival) {
    try {
        $request = $bdd->prepare("UPDATE cardFestivals SET likes_cardFestival = likes_cardFestival + 1 WHERE id_cardFestival = :id_cardFestival");
        $request->bindParam(':id_cardFestival', $id_cardFestival);
        $request->execute();

        return true;
    } catch (PDOException $e) {
        // Log or display the error message
        echo "Error: " . $e->getMessage();
        return false;
    }
}


// ------------------- NOUVELLES REQUETES
function getLikes($bdd, $idUser, $idCardFestival){
    $request = $bdd->prepare("SELECT COUNT(*) 
                            FROM likes 
                            WHERE id_user = :idUser 
                            AND id_cardFestival = :idCardFestival");
    $request->execute(array(
        "idUser" => $idUser,
        "idCardFestival" => $idCardFestival
    ));
    $request = $request->fetchColumn();
    return $request>0;
}


function getTotalLikes($bdd){
    try{
    $request = $bdd->prepare("SELECT *, COUNT(likes.id_cardFestival) as nblikes
                            FROM cardFestivals
                            LEFT JOIN likes
                            ON likes.id_cardFestival = cardFestivals.id_cardFestival
                            GROUP BY cardFestivals.id_cardFestival
                            ORDER BY nblikes DESC");
    $request->execute();
    return $request->fetchAll();
    } catch (PDOException $e) {
        // Log or display the error message
        echo "Error: " . $e->getMessage();
        return false;
    }
}

function getCountLikes($bdd, $idCardFestival){
    try{
        $request = $bdd->prepare("SELECT COUNT(*) as num_likes 
                                FROM likes 
                                WHERE id_cardFestival = :id_cardFestival");
        $request->execute(array(
        "id_cardFestival" => $idCardFestival
        ));
        $result = $request->fetch();
        $num_likes = $result['num_likes'];
        return $num_likes;
    } catch (PDOException $e) {
        // Log or display the error message
        echo "Error: " . $e->getMessage();
        return false;
    }
}



<?php

function getUser($bdd, $pseudo){
    $req = $bdd->prepare("SELECT * FROM users WHERE pseudo_user = :pseudo_user");
    $req->execute(array(
        'pseudo_user' => $pseudo
    ));
    return $req->fetch(PDO::FETCH_ASSOC);
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
    return $reqMail;
}
function getPwd($bdd, $pwd){
    $reqPwd = $bdd->prepare("SELECT COUNT(pwd_user) FROM users WHERE pwd_user = :pwd_user");
    $reqPwd->execute(array(
        'pwd_user' => $pwd
    ));
    return $reqPwd;
}

function getAllUserById($bdd, $id_user)
{
    try {
        //On recherche tout de l utilisateur par son id
        $req = $bdd->prepare("SELECT * FROM users where id_user = :id_user");
        $req->execute(array(
            "id_user" => $id_user
        ));
        return $req;
    } catch (Exception $e) {
        die("error : " . $e->getMessage());
    }
}
function getAllUserByPseudo($bdd, $pseudo)
{
    try {
        //On recherche tout de l utilisateur par son nom
        $req = $bdd->prepare("SELECT * FROM users where pseudo_user = :pseudo_user");
        $req->execute(array(
            "pseudo_user" => $pseudo
        ));
        return $req;
    } catch (Exception $e) {
        die("error : " . $e->getMessage());
    }
}


function getCardFestival1($bdd) {
    try {
        $sql = $bdd->prepare("SELECT cardFestivals.name_cardFestival, commentCard.content_commentCard, commentCard.date_commentCard 
                              FROM cardFestivals 
                              INNER JOIN commentCard ON cardFestivals.id_cardFestival = commentCard.id_cardFestival");
        $sql->execute();
        $results = $sql->fetchAll();
        return $results;
    } catch (Exception $e) {
        die("error : " . $e->getMessage());
    }
}

function getCardFestival($bdd) {
    try {
        $sql = $bdd->prepare("SELECT cardFestivals.name_cardFestival, commentCard.content_commentCard, commentCard.date_commentCard 
                              FROM cardFestivals 
                              INNER JOIN commentCard ON cardFestivals.id_cardFestival = commentCard.id_cardFestival");
        $sql->execute();
        $results = $sql->fetchAll();

        $cardFestivals = array(); // tableau pour stocker les résultats

        foreach ($results as $result) {
            $name = $result['name_cardFestival'];
            $comment = $result['content_commentCard'];
            $date = $result['date_commentCard'];

            // Vérifiez si la carte de festival existe déjà dans le tableau, sinon l'ajoutez
            if (!isset($cardFestivals[$name])) {
                $cardFestivals[$name] = array();
            }

            // Ajoutez le commentaire et la date au tableau de commentaires de la carte de festival
            $cardFestivals[$name][] = array('comment' => $comment, 'date' => $date);
        }

        return $cardFestivals;
    } catch (Exception $e) {
        die("error : " . $e->getMessage());
    }
}



function getCardFestival11($bdd)
{
    try {
        //On recherche toutes les cardfestivals
        $reqFest = $bdd->prepare("SELECT * FROM cardFestivals");
        $reqFest->execute();
        $cardFestivals = $reqFest->fetchAll();

        //On recherche les commentaires associés à chaque cardfestival
        foreach ($cardFestivals as &$cardFestival) {
            $reqComments = $bdd->prepare("SELECT * FROM `commentCard`
                                          JOIN cardfestival_commentCard ON commentCard.id_cardFestival = cardfestival.id_commentaire 
                                          WHERE cardfestival_comments.id_cardfestival = ?");
            $reqComments->execute(array($cardfestival['id_cardfestival']));
            $cardfestival['comments'] = $reqComments->fetchAll();
        }

        return $cardfestivals;
    } catch (Exception $e) {
        die("error : " . $e->getMessage());
    }
}
function getMostLikedFestival($bdd)
{
  try {
    $reqFest = $bdd->prepare("SELECT * FROM cardFestivals ORDER BY likes_cardFestival DESC LIMIT 1");
    $reqFest->execute();
    $most_liked_festival = $reqFest->fetch();
    return $most_liked_festival;
  } catch (Exception $e) {
    die("error : " . $e->getMessage());
  }
}
function updateUser($bdd, $id_user, $pseudo, $mail, $pwd) {
    try {
        $sql = $bdd->prepare("UPDATE users SET pseudo_user=?, mail_user=?, pwd_user=? WHERE id_user=?");
        // Exécuter la requête SQL avec les valeurs des paramètres
        $sql->execute(array($pseudo, $mail, $pwd, $id_user));
        return $sql;
    } catch (Exception $e) {
        die("error : " . $e->getMessage());
    }
}

// SELECT * FROM cardFestivals ORDER BY likes_cardFestival DESC LIMIT 8;
<?php

function getUser($bdd, $pseudo){
    $req = $bdd->prepare("SELECT * FROM users WHERE pseudo_user = :pseudo_user");
    $req->execute(array(
        'pseudo_user' => $pseudo
    ));
    return $req;
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

function getCardFestival1($bdd)
{
    try {
        //On recherche tout de l'utilisateur par son nom
        $reqFest = $bdd->prepare("SELECT * FROM cardfestivals");
        $reqFest->execute();
        $cardfestival = $reqFest->fetchAll();
        return $cardfestival;
    } catch (Exception $e) {
        die("error : " . $e->getMessage());
    }
}
function getCardFestival($bdd)
{
    try {
        //On recherche toutes les cardfestivals
        $reqFest = $bdd->prepare("SELECT * FROM cardfestivals");
        $reqFest->execute();
        $cardfestivals = $reqFest->fetchAll();

        //On recherche les commentaires associés à chaque cardfestival
        foreach ($cardfestivals as &$cardfestival) {
            $reqComments = $bdd->prepare("SELECT * FROM commentaires 
                                          JOIN cardfestival_commentaire ON commentaires.id_commentaire = cardfestival_commentaire.id_commentaire 
                                          WHERE cardfestival_commentaire.id_cardfestival = ?");
            $reqComments->execute(array($cardfestival['id_cardfestival']));
            $cardfestival['commentaires'] = $reqComments->fetchAll();
        }

        return $cardfestivals;
    } catch (Exception $e) {
        die("error : " . $e->getMessage());
    }
}
function getMostLikedFestival($bdd)
{
  try {
    $reqFest = $bdd->prepare("SELECT * FROM cardfestivals ORDER BY likes_count DESC LIMIT 1");
    $reqFest->execute();
    $most_liked_festival = $reqFest->fetch();
    return $most_liked_festival;
  } catch (Exception $e) {
    die("error : " . $e->getMessage());
  }
}

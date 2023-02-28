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


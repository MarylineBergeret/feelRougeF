<?php

function createUser($bdd, $pseudo, $pwd, $mail, $id_image, $id_role)
{
    try
    {
        $req = $bdd->prepare(
            "INSERT INTO `users`(pseudo_user,pwd_user,mail_user,bio_user,id_image,id_role) values
        (:pseudo_user,:pwd_user,:mail_user,:bio_user,:id_image,:id_role)"
        );
        $req->execute(array(
            'pseudo_user' => $pseudo,
            'pwd_user' => $pwd,
            'mail_user' => $mail,
            'bio_user' => $bio,
            'id_image' => $id_image,
            'id_role' => $id_role
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
// function insert_likes($bdd, $id_user, $id_cardfestival){
//     $insert = $bdd->prepare("INSERT INTO likes(id_user, id_image) VALUES (:id_user, :id_img)");
//     $insert->execute(array(
//         'id_user' => $id_user,
//         'id_img' => $id_img
//     ));
// }
?>
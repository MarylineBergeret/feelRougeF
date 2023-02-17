<?php
function getAllUserByName($bdd, $name_user)
{
    try {
        //On recherche tout de l utilisateur par son nom
        $req = $bdd->prepare("SELECT * FROM users where name_user = :name_user");
        $req->execute(array(
            "name_user" => $name_user
        ));
        return $req;
    } catch (Exception $e) {
        die("error : " . $e->getMessage());
    }
}

function getIdImg($bdd, $url_image)
{
    try {
        //On recherche l id de l image par son url
        $req = $bdd->prepare("SELECT id_image FROM images where url_image = :url_image");
        $req->execute(array(
            "url_image" => $url_image
        ));
        return $req;
    } catch (Exception $e) {
        die("error : " . $e->getMessage());
    }
}


?>
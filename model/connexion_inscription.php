<?php
//Variable de SESSION par id utilisateurs et verifications de connexion
function verifConnexion($bdd, $user){
    $data = getAllUserById($bdd, $user["id_user"]);
    $data = $data ->fetch();
    $_SESSION["id"] = $data["id_user"];
    $_SESSION["pseudo"] = $data["pseudo_user"];
    $_SESSION["role"] = $data["id_role"];
    $_SESSION["mail"] = $data["mail_user"];

}
?>
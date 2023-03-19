<?php
function deleteUser($bdd, $id_user) {
    try {
        $stmt = $bdd->prepare("DELETE FROM users WHERE id_user = :id_user");
        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $stmt->execute();
        
        $deleteOk = "L'utilisateur a été supprimé avec succès";
        return $deleteOk;
    } catch (PDOException $e) {
        // Gestion de l'erreur en cas de problème avec la requête SQL
        $deleteFail = "Une erreur est survenue lors de la suppression de l'utilisateur : " . $e->getMessage();
        return $deleteFail;
    }
}
?>
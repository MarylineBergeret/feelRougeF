<?php
function updateUserImage($bdd, $id_user, $id_image) {
    try {
        $stmt = $bdd->prepare('UPDATE users SET id_image = :id_image WHERE id_user = :id_user');
        $stmt->bindValue(':id_image', $id_image, PDO::PARAM_INT);
        $stmt->bindValue(':id_user', $id_user, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        echo 'Une erreur est survenue : ' . $e->getMessage();
        exit;
    }
}

function updateUser($bdd, $id_user, $pseudo, $mail, $pwd) {
    try {
        $sql = $bdd->prepare("UPDATE users SET pseudo_user=?, mail_user=?, pwd_user=? WHERE id_user=?");
        // Exécuter la requête SQL avec les valeurs des paramètres
        $sql->execute(array($id_user, $pseudo, $mail, $pwd));
        return $sql;
    } catch (Exception $e) {
        die("error : " . $e->getMessage());
    }
}

function updateConcert($bdd, $id_concert, $band, $location, $year) {
    // Préparer la requête SQL
    $query = "UPDATE concerts SET band_concert = :band, location_concert = :location, year_concert = :year WHERE id_concert = :id_concert";
    $statement = $bdd->prepare($query);

    // Exécuter la requête en liant les paramètres
    $result = $statement->execute(array(
        ':id_concert' => $id_concert,
        ':band' => $band,
        ':location' => $location,
        ':year' => $year
    ));

    // Vérifier si la mise à jour a réussi et renvoyer le résultat
    if ($result) {
        return true;
    } else {
        return false;
    }
}

function updateUserPassword($bdd, $id_user, $hashedPassword) {

    try {
        $stmt = $bdd->prepare("UPDATE users SET pwd_user = :pwd_user WHERE id_user = :id_user");
        $stmt->bindParam(':pwd_user', $hashedPassword);
        $stmt->bindParam(':id_user', $id_user);
        $stmt->execute();
    } catch(PDOException $e) {
        // Gérer l'exception selon les besoins
        echo "Erreur lors de la mise à jour du mot de passe : " . $e->getMessage();
    }
}
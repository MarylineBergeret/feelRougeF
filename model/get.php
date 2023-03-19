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
function getUser1($bdd, $pseudo) {
    $query = $bdd->prepare('SELECT * FROM users WHERE pseudo_user = :pseudo');
    $query->execute(array(
        'pseudo' => $pseudo
    ));
    $result = $query->fetch(PDO::FETCH_OBJ); // Renvoi un objet
    return $result;
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

function getAllUser($bdd) {
    try {
        // Requête SQL pour récupérer tous les utilisateurs et leur rôle
        $req = $bdd->query("SELECT users.*, roles.name_role FROM users JOIN roles ON users.id_role = roles.id_role");

        // Stockage des résultats dans une variable
        $tableau = "<table class='separate'>";
        $tableau .= "<tr><th>ID USER</th><th>PSEUDO</th><th>MAIL</th><th>ROLE</th><th>ACTIONS</th><th></th><tr>";
        while ($user = $req->fetch(PDO::FETCH_ASSOC)) {
            $tableau .= "<tr>";
            $tableau .= "<td>".$user['id_user']."</td>";
            $tableau .= "<td>".$user['pseudo_user']."</td>";
            $tableau .= "<td>".$user['mail_user']."</td>";
            $tableau .= "<td>".$user['name_role']."</td>";
            $tableau .= "<td>";
            $tableau .= "<select class='form-select form-role' aria-label='Default select example'>
                            <option selected>Choisir un rôle</option>
                            <option value='1'>Administrateur</option>
                            <option value='2'>Utilisateur</option>
                        </select>";
            $tableau .= "<button class='btn'><i class='bi bi-trash-fill'></i></button>";
            $tableau .= "</td>";
            $tableau .= "</tr>";
        }
        $tableau .= "</table>";

    } catch (Exception $e) {
        die("Error : " . $e->getMessage());
    }

    // Affichage du tableau plus tard dans votre code
    return $tableau;
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

function getCardFestival2($bdd) {
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



function getCardFestival($bdd) {
    try {
        // Set PDO to throw exceptions on error
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Query to retrieve all festival cards and their associated comments
        $query = "SELECT cf.*, c.id_commentCard, c.content_commentCard, c.date_commentCard FROM cardFestivals cf LEFT JOIN commentCard c ON cf.id_cardFestival = c.id_cardFestival";

        // Prepare and execute the query
        $stmt = $bdd->prepare($query);
        $stmt->execute();

        // Initialize an empty array to hold the results
        $results = array();

        // Iterate over each row returned by the query
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Extract the fields for the festival card from the row
            $id_cardFestival = $row['id_cardFestival'];
            $name_cardFestival = $row['name_cardFestival'];
            $content_cardFestival = $row['content_cardFestival'];
            $img_cardFestival = $row['img_cardFestival'];
            $likes_cardFestival = $row['likes_cardFestival'];

            // Initialize an empty array to hold the comments for the festival card
            $comments = array();

            // If the row has comment information, extract it and add it to the comments array
            if (!empty($row['id_commentCard'])) {
                $comment = array(
                    'id_commentCard' => $row['id_commentCard'],
                    'content_commentCard' => $row['content_commentCard'],
                    'date_commentCard' => $row['date_commentCard']
                );
                $comments[] = $comment;
            }

            // If the festival card is not yet in the results array, add it with its comments
            if (!array_key_exists($id_cardFestival, $results)) {
                $cardFestival = array(
                    'id_cardFestival' => $id_cardFestival,
                    'name_cardFestival' => $name_cardFestival,
                    'content_cardFestival' => $content_cardFestival,
                    'img_cardFestival' => $img_cardFestival,
                    'likes_cardFestival' => $likes_cardFestival,
                    'comments' => $comments
                );
                $results[$id_cardFestival] = $cardFestival;
            }
            // If the festival card is already in the results array, add its comments to the existing comments array
            else {
                $results[$id_cardFestival]['comments'] = array_merge($results[$id_cardFestival]['comments'], $comments);
            }
        }

        // Return the results as an array of festival cards
        return $results;
    } catch (PDOException $e) {
        // If an exception occurs, catch it and echo an error message
        echo "Erreur : " . $e->getMessage();
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
        $stmt->bindParam(':id_user', $userId);
        $stmt->execute();
    } catch(PDOException $e) {
        // Gérer l'exception selon les besoins
        echo "Erreur lors de la mise à jour du mot de passe : " . $e->getMessage();
    }
}




//<?php
// Vérifier que le fichier a été téléchargé correctement
// if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
//   die('Erreur de téléchargement');
// }

// // Vérifier que le fichier est une image
// $image_info = getimagesize($_FILES['image']['tmp_name']);
// if (!$image_info) {
//   die('Le fichier n\'est pas une image');
// }

// // Vérifier la sécurité du fichier
// if ($_FILES['image']['size'] > 1000000) {
//   die('Le fichier est trop gros');
// }

// // Générer un nom de fichier unique
// $filename = uniqid() . '.jpg';

// Copier le fichier dans un dossier sécurisé
// if (!move_uploaded_file($_FILES['image']['tmp_name'], '/chemin/vers/dossier/securise/' . $filename)) {
//   die('Erreur lors de la copie du fichier');
// }

// // Mettre à jour la base de données avec le nouveau chemin de l'image
// // ...

// // Rediriger l'utilisateur vers la page de profil
// header('Location: profil.php');
// exit();
// 





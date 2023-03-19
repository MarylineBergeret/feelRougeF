<?php
function afficheConcerts($bdd, $id_user) {
    try {
        $user = getUserById($bdd,$id_user);
        $imageUrl = getUserImage($bdd,$id_user);
        $concerts = getConcertsById($bdd, $id_user);

        // Initialiser la variable $output en dehors de la boucle
        $output = '';
        $output .= "<div class='card' id='cardAfficheConcerts'>";
        $output .= "<div class='card-header'><h2> " . $user['pseudo_user'] . " : SON TOP 5 </h2></div>";
        $output .= "<div class='card-body'>";
        $output .= "<div class='row'>";
        $output .= "<div class='col-sm-3'><img src='" . $imageUrl . "' class='img-thumbnail'></div>";
        $output .= "<div class='col-sm-9' id='pCard2'>";
        foreach ($concerts as $concert) {
            // Concaténer le contenu de chaque carte concert à la variable $output
            $output .= "<p>" . $concert['band_concert'] . " " . $concert['location_concert'] . " " . $concert['year_concert'] . "</p>";
        }
        $output .= "</div>"; // end col-sm-9
        $output .= "</div>"; // end row
        $output .= "</div>"; // end card-body
        $output .= "</div>"; // end card
        return $output;
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération des informations de concerts: " . $e->getMessage();
    }
}

function afficheUser($bdd,$id_user) {
    $user = getUserById($bdd,$id_user);
    $imageUrl = getUserImage($bdd,$id_user);

    $pos = strpos($user['mail_user'], '@');

    $output = "<div class='card' id='cardAfficheUser'>";
    $output .= "<div class='card-header'><h2>Profil : " . $user['pseudo_user'] . "</h2></div>";
    $output .= "<div class='card-body'>";
    $output .= "<div class='row'>";
    $output .= "<div class='col-sm-3'><img src='" . $imageUrl . "' class='img-thumbnail'></div>";
    $output .= "<div class='col-sm-9' id='pCard1'>";
    $output .= "<p>Pseudo : " . $user['pseudo_user'] . "</p>";
    $output .= "<p>Adresse e-mail : " . substr_replace(substr_replace($user['mail_user'], str_repeat('*', $pos-1), 1, $pos-1), str_repeat('*', $pos+2), $pos+1, 4) . "</p>";
    $output .= "<p>Biographie : " . $user['bio_user'] . "</p>";
    $output .= "<form action='update_pseudo.php' method='post'>";
    $output .= "<div class='form-group'>";
    $output .= "<label for='new_pseudo'>Nouveau pseudo :</label>";
    $output .= "<input type='text' class='form-control' id='new_pseudo' name='new_pseudo' value='" . $user['pseudo_user'] . "'>";
    $output .= "</div>";
    $output .= "<div class='form-group'>";
    $output .= "<label for='new_bio'>Modifier Bio :</label>";
    $output .= "<input type='text' class='form-control' id='new_bio' name='new_bio' value='" . $user['bio_user'] . "'>";
    $output .= "</div>";
    $output .= "<div class='form-group'>";
    $output .= "<form action='upload_image.php' method='post' enctype='multipart/form-data'>";
    $output .= "<label for='image'>Changer l'image :</label><br>";
    $output .= "<input type='file' id='image' name='image' accept='image/*'><br>";
    $output .= "</div>";
    $output .= "<button type='submit' class='btn btn-primary' id='buttonSendProfil'>Enregistrer</button>";
    $output .= "</form>";
    $output .= "</div>"; // end col-sm-9
    $output .= "</div>"; // end row
    $output .= "</div>"; // end card-body
    $output .= "</div>"; // end card
    return $output;
}
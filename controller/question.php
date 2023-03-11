<?php
// Connexion à la base de données
$servername = "localhost";
$username = "nom_utilisateur";
$password = "mot_de_passe";
$dbname = "nom_de_la_base_de_données";
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifie la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Récupération des réponses de l'utilisateur spécifié
$id_utilisateur = $_GET["id"];
$sql = "SELECT * FROM questionnaire WHERE id_utilisateur = '$id_utilisateur'";
$result = $conn->query($sql);

// Affichage des réponses dans un tableau
if ($result->num_rows > 0) {
    echo "<table><tr><th>Question</th><th>Réponse</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["question"]."</td><td>".$row["answer"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "Aucune réponse trouvée pour cet utilisateur.";
}

// Fermeture de la connexion
$conn->close();
?>

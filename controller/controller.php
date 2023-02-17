<?php
session_start();
include("../model/model.php");
include("../model/connexion_inscription.php");
//formulaire contact
if(isset($_POST['pseudo']) && isset($_POST['mail']) && isset($_POST['textarea'])){
    $pseudo = $_POST['pseudo_user'];
    $mail = $_POST['mail_user'];
    $textarea = $_POST['textarea'];
   
    try
    {
        $requete = $bdd->prepare("INSERT INTO employees(nom_employee,poste_employee,salaire_employee) values (:nom_employee,:poste_employee,:salaire_employee)");
        $requete->execute(array('nom_employee' => $name,'poste_employee' => $poste,'salaire_employee' => $salaire));
        echo "enregistrement exécuté";
    }

    catch(Exception $e){
        die('Erreur: ' .$e->getMessage());
    }
}


//inscription :

if(isset($_POST['pseudo']) && isset($_POST['mail']) && isset($_POST['pwd']) && isset($_POST['bio'])){
    $pseudo = $_POST['pseudo'];
    $mail = $_POST['mail'];
    $pwd = $_POST['pwd'];
    $bio = $_POST['bio'];
    if(strpos($email,"@")===false){
        $erreurs="";
        extract($_POST);
	    if(empty($pseudo) || empty($mail) || empty($pwd)){
	    	$erreurs.="Le formulaire est incomplet : Certains champs sont obligatoires<br>";
	    }
	    if(strpos($email,"@")===false){
	    	$erreurs.="l'adresse email n'est pas sous le bon format<br>";
	    }
        if($erreurs==""){
            // echo "<table border="1"  >";
            echo "<caption><b>Confirmation de vos coordonnées</b></caption>";
            foreach($_POST as $cle=>$val)
            {

              echo "<tr> <td> $cle : &nbsp;</td> <td>".$val 
            ."</td></tr>"; 
            }
            echo "</table>"; 
    }
    else
        echo $erreurs;
    }
};


?>



if (isset($_GET["page"])) {
    $page = $_GET["page"];
    $style = $page . ".css";
    verifInscription($bdd);
    connexion($bdd);
    include("../view/header.php");

    if (isset($_SESSION["role"])) {
        user();
        if ($_SESSION["role"] == 1) {
            admin();
        }
    } else {
        visit();
    }
    fermerNav();

    switch ($page) {
        case "dashboard":
            $style = $page;
            $page .= ".php";
            if (!isset($_SESSION) and $_SESSION["role"] != 1) {
                header("../view/accueil.php");
            }
            include("../view/$page");
            break;
        case "galerie":
            $style = $page;
            $page .= ".php";
            include("../view/$page");
            break;
        case "profil":
            $info = infoUser($bdd);
            $style = $page;
            $page .= ".php";
            include("../view/$page");
            addImage($bdd);
            break;
        case "deconnexion":
            session_destroy();
            header("refresh:0;url=controller.php?page=accueil");
            break;
        default:
            $page .= ".php";
            include("../view/$page");
    }
} else {
    $page = "accueil";
    $style = $page;
    $page .= ".php";
    verifInscription($bdd);
    connexion($bdd);
    include("../view/header.php");
    if (isset($_SESSION["role"])) {
        user();
        if ($_SESSION["role"] == 10) {
            admin();
        }
    } else {
        visit();
    }
    fermerNav();
    include("../view/$page");
}

include("../view/footer.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quel festival de Métal Européen choisir et pourquoi ?</title>
    <meta name="description" content="6 'Hellfest' au compteur, go l'Europe! 
    Votez pour les festivals incontournables selon vous! Heavy Métal, Hard Rock, progressif...">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <!-- Inclue le lien vers la bibliothèque d'icônes de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="..\assets\css\header.css">
    <link rel="stylesheet" href="..\assets\css\responsive.css">
    <link rel="icon" type="image/png" href="../assets/image/icons8-rock.png">  
    <title>BLOG METALWAY</title>
</head>
<body>
    <header>
        <nav class="navbar">
            <a href="../controller/accueil.php" class="logo">Accueil</a>
            <div class="nav-links">
                <ul>
                    <!-- Liens de navigation -->
                    <li class="active"><a href="../controller/metal.php">Le Métal</a></li>
                    <li><a href="../controller/festival.php">Festival</a></li>
                    <li><a href="../controller/salon.php">Salon d'écoute</a></li>
                    <li><a href="../controller/contact.php">Contact</a></li>
                    
                    <?php if(!isset($_SESSION['user'])): ?>
                    <!-- Affiche les liens d'inscription et de connexion si l'utilisateur n'est pas connecté -->
                        <li><a href="../controller/inscription.php">Inscription</a></li>
                    <li><a href="../controller/connexion.php">Connexion</a></li>
                    
                    <?php endif ?>
                    <?php if(isset($_SESSION['user']['id_role']) && $_SESSION['user']['id_role'] == 10 ):?>
                    <!-- Affiche les liens de profil et de déconnexion si l'utilisateur est connecté -->
                    <li><a href="../controller/profil.php">Mon profil</a></li>
                    <li><a href="../controller/deconnexion.php">Déconnexion</a></li>
                    <?php endif ?>
                    <?php if(isset($_SESSION['user']['id_role']) && $_SESSION['user']['id_role'] == 1 ):?>
                     <!-- Affiche le lien du tableau de bord si l'utilisateur a un rôle d'administrateur -->
                        <li><a href="../controller/admin.php">Dashboard</a></li>
                    <?php endif ?>
                   
                </ul>
            </div>
            <img src="..\assets\image\menu-btn.png" alt="menu hamburger" class="menu-hamburger">
        </nav>
    </header>
    

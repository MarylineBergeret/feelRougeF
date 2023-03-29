<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <!-- Inclure le lien vers la bibliothèque d'icônes de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="..\assets\css\header.css">
    <link rel="stylesheet" href="..\assets\css\responsive.css">
<title>BLOG</title>
</head>
<body>
    <header>
        <nav class="navbar">
            <a href="../controller/accueil.php" class="logo">Accueil</a>
            <div class="nav-links">
                <ul>
                    <li class="active"><a href="../controller/metal.php">Le Metal</a></li>
                    <li><a href="../controller/festival.php">Festival</a></li>
                    <li><a href="../controller/salon.php">Salon d'écoute</a></li>
                    <li><a href="../controller/contact.php">Contact</a></li>
                    
                    <?php if(!isset($_SESSION['user'])): ?>
                    <li><a href="../controller/inscription.php">Inscription</a></li>
                    <li><a href="../controller/connexion.php">Connexion</a></li>
                    
                    <?php endif ?>
                    <?php if(isset($_SESSION['user'])){ ?>
                    <li><a href="../controller/profil.php">Mon profil</a></li>
                    <li><a href="../controller/deconnexion.php">Déconnexion</a></li>
                    <?php } ?>
                    <?php if(isset($_SESSION['user']['id_role']) && $_SESSION['user']['id_role'] == 1 ):?>
                    <li><a href="../controller/admin.php">Dashboard</a></li>
                    <?php endif ?>
                   
                </ul>
            </div>
            <img src="..\assets\image\menu-btn.png" alt="menu hamburger" class="menu-hamburger">
        </nav>
    </header>
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <!-- Inclure le lien vers la bibliothèque d'icônes de Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.6.0/font/bootstrap-icons.min.css" integrity="sha512-1F6Djdl53UOtwJUot9XUwyN6Lrj6lYLoI1z+8ySpJ04y4o4QvA/Aj+L8ZJUnJeZnoS+KjZZNTWgJIMQ2o2RyRQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="..\assets\css\header.css">
    <link rel="stylesheet" href="..\assets\css\responsive.css">
<title>BLOG</title>
</head>
<body>
    <header>
        <nav class="navbar">
            <a href="../controller/accueil.php" class="logo">METAL</a>
            <div class="nav-links">
                <ul>
                    <li class="active"><a href="../controller/metal.php">Le Metal</a></li>
                    <li><a href="../controller/festival.php">Festival</a></li>
                    <li><a href="#">Contact</a></li>
                    
                    <li><a href="../controller/inscription.php">Inscription</a></li>
                    <li><a href="../controller/connexion.php">Connexion</a></li>
                    <?php if(isset($_SESSION['user'])) { ?>
                    <li><a href="../controller/profil.php">Mon profil</a></li>
                    <?php if($_SESSION['id_role'] = '1'){ ?>
                    <li><a href="../controller/admin.php">Dashboard</a></li>
                    <?php } ?>
                    <?php } ?>


                </ul>
            </div>
            <img src="..\assets\image\menu-btn.png" alt="menu hamburger" class="menu-hamburger">
        </nav>
    </header>
    

    <script>
            const menuHamburger = document.querySelector(".menu-hamburger")
            const navLinks = document.querySelector(".nav-links")
    
            menuHamburger.addEventListener('click',()=>{
            navLinks.classList.toggle('mobile-menu')
            });
    </script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\assets\css\header.css">
    <link rel="stylesheet" href="bootstrap-5.0.2-dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>BLOG</title>
</head>
<body>
    <header>
        <nav class="navbar">
            <a href="#" class="logo">METAL</a>
            <div class="nav-links">
                <ul>
                    <li class="active"><a href="#">Le Metal</a></li>
                    <li><a href="#">Festival</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="../controller/inscription.php">Inscription</a></li>
                    <li><a href="../controller/connexion.php">Connexion</a></li>
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

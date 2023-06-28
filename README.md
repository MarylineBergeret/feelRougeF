# feelRougeF
# Mon Blog

Mon Blog est un site web qui permet aux utilisateurs de s'inscrire, de contacter l'admin, se connecter, se déconnecter et de publier des articles. 
Il utilise la structure PHP Controller Model View et est écrit en HTML, CSS, Bootstrap, JavaScript.

## Techno
Langage de programmation : PHP / Structure => Model - View  - Controller
Base de données : MySQL
Utilisation de requêtes AJAX pour des interactions asynchrones avec le serveur.
Utilisation de sessions PHP pour gérer l'authentification des utilisateurs.
liens Bootstrap :
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quel festival de Métal Européen choisir et pourquoi ?</title>
    <meta name="description" content="6 'Hellfest' au compteur, go l'Europe! Votez pour les festivals incontournables selon vous! Heavy Métal, Hard Rock, progressif..." />
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <!-- Inclue le lien vers la bibliothèque d'icônes de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="..\assets\css\header.css">
    <link rel="stylesheet" href="..\assets\css\responsive.css">
    <link rel="icon" type="image/png" href="../assets/image/icons8-rock.png">  
    <title>BLOG METALWAY</title>
</head>
```
lien j-Query:
```html
    <script src="../bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/nav.js"></script>
    <script src="../assets/js/likes.js"></script>
    <script src="../assets/js/music.js"></script>
    <script src="../assets/js/footer.js"></script>
    <script src="../assets/js/admin.js"></script>
</body>
<footer>
    <img id="footer" src="..\assets\image\fotor_2023-3-24_17_12_40.png" alt="vibrations">
</footer>
</html>
```
## Structure du projet

Le projet est organisé selon la structure MVC (Model View Controller), qui sépare la logique de l'application en trois couches distinctes :

## Utilisation
Voici comment utiliser mon projet :

1. Ouvrez le fichier `accueil.php` dans votre navigateur.
2. Explorez les différentes fonctionnalités en fonction de votre rôle utilisateur.
3. Utilisez le formulaire de contact pour envoyer vos questions ou commentaires.
4. Utilisez le formulaire du top 5 des concerts pour saisir et enregistrer vos préférences.
5. Voter pour le festival préféré

## Fonctionnalités

- Système d'inscription et de connexion pour les utilisateurs.
- Déconnexion.
- Formulaire de contact pour permettre aux utilisateurs de vous contacter.
- Système de vote avec une requête AJAX pour récupérer les données via PHP.
- Formulaire pour saisir et enregistrer le top 5 des concerts autorisé aux utilisateurs connectés.

- Gestion des rôles utilisateur (visiteur, admin) pour afficher des pages adaptées.
- Publication d'articles
- Affichage des articles
- Gestion des utilisateurs et des articles
- Suppression des users


## Auteurs

- Maryline Mourgues


# feelRougeF
# My Blog

My Blog is a website that allows users to register, log in, and publish articles. It follows the PHP Controller Model View (MVC) structure and is written in HTML, CSS, Bootstrap, and JavaScript.


## Technology

Programming Language: PHP / Structure: Model - View - Controller
Database: MySQL
Use of AJAX requests for asynchronous interactions with the server.
Use of PHP sessions to manage user authentication.
Bootstrap links:
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Which European Metal Festival to Choose and Why?</title>
    <meta name="description" content="6 'Hellfest' under my belt, let's go to Europe! Vote for the must-attend festivals according to you! Heavy Metal, Hard Rock, progressive..." />
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <!-- Include the Bootstrap icon library link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="..\assets\css\header.css">
    <link rel="stylesheet" href="..\assets\css\responsive.css">
    <link rel="icon" type="image/png" href="../assets/image/icons8-rock.png">  
    <title>METALWAY BLOG</title>
</head>
```

jQuery link:
```html
    <script src="../bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/nav.js"></script>
    <script src="../assets/js/likes.js"></script>
    <script src="../assets/js/music.js"></script>
    <script src="../assets/js/footer.js"></script>
    <script src="../assets/js/admin.js"></script>

</body>
<footer>
    <img id="footer" src="..\assets\image\fotor_2023-3-24_17_12_40.png" alt="vibrations">
</footer>
</html>
```


## Usage

Here's how you can use my project:

1. Open the `accueil.php` file in your browser.
2. Explore the different functionalities based on your user role.
3. Use the contact form to send us your questions or comments.
4. Use the top 5 concerts form to enter and save your preferences.

## Features

- User registration and login system.
- Management of user roles (visitor, admin) to display appropriate pages.
- Contact form to allow users to contact you
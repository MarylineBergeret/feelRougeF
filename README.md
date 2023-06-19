# feelRougeF
# Mon Blog

Mon Blog est un site web qui permet aux utilisateurs de s'inscrire, se connecter et de publier des articles. Il utilise la structure PHP Controller Model View et est écrit en HTML, CSS, Bootstrap, JavaScript.

## Prérequis

Pour exécuter ce projet, vous aurez besoin de :

- PHP 7.2 ou supérieur
- MySQL 5.7 ou supérieur
- Un serveur web compatible avec PHP, comme Apache ou Nginx

## Installation

1. Cloner le dépôt GitHub sur votre ordinateur :
git clone https://github.com/mon-blog.git

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

- `app`: contient les fichiers PHP du modèle, du contrôleur et du routeur.
- `public`: contient les fichiers accessibles publiquement, tels que les fichiers CSS, JS et les images.
- `views`: contient les fichiers HTML avec des fragments de code PHP qui sont affichés à l'utilisateur.

## Utilisation

Voici comment utiliser mon projet :

1. Ouvrez le fichier `accueil.php` dans votre navigateur.
2. Explorez les différentes fonctionnalités en fonction de votre rôle utilisateur.
3. Utilisez le formulaire de contact pour nous envoyer vos questions ou commentaires.
4. Utilisez le formulaire du top 5 des concerts pour saisir et enregistrer vos préférences.

## Fonctionnalités

- Système d'inscription et de connexion pour les utilisateurs.
- Gestion des rôles utilisateur (visiteur, admin) pour afficher des pages adaptées.
- Formulaire de contact pour permettre aux utilisateurs de vous contacter.
- Système de vote avec une requête AJAX pour récupérer les données via PHP.
- Formulaire pour saisir et enregistrer le top 5 des concerts autorisé aux utilisateurs connectés.

- Inscription et connexion utilisateur
- Publication d'articles
- Affichage des articles
- Gestion des utilisateurs et des articles

## Contributions

Les contributions sont les bienvenues! Si vous souhaitez apporter des modifications ou ajouter de nouvelles fonctionnalités, veuillez créer une nouvelle branche à partir de la branche principale (`master`) et soumettre une demande de fusion (`pull request`).

## Auteurs

- Jean Dupont
- Pierre Martin

## Licence

Ce projet est sous licence MIT. Voir le fichier `LICENSE` pour plus d'informations.
N'oubliez pas d'adapter les instructions et les informations de votre projet spécifique.
# feelRougeF
# Mon Blog

Mon Blog est un site web de blog qui permet aux utilisateurs de s'inscrire, de se connecter et de publier des articles. Il utilise la structure PHP Controller Model View et est écrit en HTML, CSS, Bootstrap, JavaScript et Vue.js.

## Prérequis

Pour exécuter ce projet, vous aurez besoin de :

- PHP 7.2 ou supérieur
- MySQL 5.7 ou supérieur
- Un serveur web compatible avec PHP, comme Apache ou Nginx

## Installation

1. Cloner le dépôt GitHub sur votre ordinateur :
git clone https://github.com/mon-blog.git

markdown
Copy code

2. Créer une base de données MySQL pour le blog et importer le fichier `database.sql` situé dans le dossier `database` :
mysql -u root -p < mon_blog/database/database.sql

markdown
Copy code

3. Modifier les informations de connexion à la base de données dans le fichier `config.php` situé dans le dossier `app/config`.

4. Lancez un serveur local pour exécuter le projet :
php -S localhost:8000 -t public

markdown
Copy code

5. Accédez au site web en entrant l'URL suivante dans votre navigateur : `http://localhost:8000`

## Structure du projet

Le projet est organisé selon la structure MVC (Model View Controller), qui sépare la logique de l'application en trois couches distinctes :

- `app`: contient les fichiers PHP du modèle, du contrôleur et du routeur.
- `public`: contient les fichiers accessibles publiquement, tels que les fichiers CSS, JS et les images.
- `views`: contient les fichiers HTML avec des fragments de code PHP qui sont affichés à l'utilisateur.

## Fonctionnalités

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
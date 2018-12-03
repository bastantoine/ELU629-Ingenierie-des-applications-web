# ELU629 : Ingenierie des applications web

Repository lié à l'UV élective 629 : Ingénierie des applications web suivie au semestre d'automne 2018 à IMT Atlantique - Brest.

1. Sujet du projet
2. Utilisation du repository

## Sujet du projet

Le sujet du fil conducteur porte sur la création d’un site web participatif pour le partage de recettes culinaires entre les internautes du site. On distingue 4 catégories d’utilisateurs : l’administrateur, les contributeurs, les commentateurs et les visiteurs. Hormis les visiteurs, les trois autres catégories d’utilisateur devront s’authentifier pour accéder aux fonctionnalités du site. On dénombre trois fonctionnalités principales :

1. La gestion des utilisateurs authentifiés est assurée par l’administrateur. Ce dernier peut consulter la liste des utilisateurs, supprimer un utilisateur et bloquer le compte d’un utilisateur. La création d’un compte est faite automatiquement par le système sur demande des visiteurs. Les utilisateurs authentifiés peuvent modifier les informations de leur compte.
2. La gestion des recettes partagées par les contributeurs. Chaque contributeur gère (opérations CRUD) ses propres recettes. Un utilisateur authentifié devient contributeur dès qu’il dépose une recette sur le site. L’administrateur peut visualiser les recettes déposées par contributeur tandis que les visiteurs et les commentateurs peuvent consulter toutes les recettes disponibles ou effectuer des recherches sur les titres des recettes.
3. La gestion des commentaires associés aux recettes. Chaque utilisateur authentifié devient commentateur dès qu’il rédige un commentaire sur une recette donnée. Un contributeur ne peut pas commenter ses propres recettes mais il a la possibilité de commenter les recettes d’autrui. La gestion d’un commentaire (opérations CRUD) est assurée pas son commentateur ou l’administrateur qui joue ainsi le rôle de modérateur. Les visiteurs peuvent consulter les commentaires associés à une recette donnée.

Pour s’inscrire, un visiteur doit renseigner ses noms, prénoms, son adresse mail et son mot de passe. L’authentification se fait avec l’adresse mail et le mot de passe.

Un commentaire a un contenu et une date de rédaction. Il est associé à son rédacteur.

Une recette dispose au minium d’un titre, d’une liste d’ingrédients et d’un ensemble d’étapes ordonnées à suivre. Il est possible d’enrichir les caractéristiques d’une recette selon vos convenances. Vous avez aussi la possibilité de vous baser sur les caractéristiques d’une recette pratiqués durant les séances de travaux pratiques.

L’implémentation de la gestion des droits d’accès est facultative.

## Base de données à utiliser

La base de données concue pour cette application contient 4 tables :



## Utilisation du repository

Pour pouvoir réutiliser le repository, il convient tout d'abord d'ajouter un fichier de configuration nommé `config.ini` dans le dossier `includes` à la racine. Ce fichier contient les paramètres suivants :

Paramètre | Explication | Exemple
--- | --- | ---
`root_folder` | La racine du site | `/`
`include_path` | Le chemin absolu du dossier où est stocké le site, doit inclure un `/` à la fin | `/var/www/html/`
`path` | L'URL de connexion à la base de données | `localhost`
`port` | Le port de connexion à la base de données | `3306`
`database` | La base de données utilisée | `base_de_donnees`
`user` | Le nom de l'utilisateur à utiliser pour accéder et utiliser la base de données | `user`
`password` | Le mot de passe à utiliser pour l'authentification de l'utilisateur dans la base de données | `password`

Il faut ensuite créer les 4 tables suivantes :

**userClasses** contient le nom des catégories d'utilisateurs :

Nom du champ | Type | Utilisation | Commentaire
--- | --- | --- | ---
`id` | `int` | Identifiant unique de chaque entrée | Clé primaire
`name` | `varchar(255)`| Nom d'affichage de la catégorie | Interclassement en `utf8_general_ci`

**users** contient la liste des utilisateurs :

Nom du champ | Type | Utilisation | Commentaire
--- | --- | --- | ---
`id` | `int` | Identifiant unique de chaque entrée | Clé primaire
`name` | `varchar(255)`| Nom de l'utilisateur | Interclassement en `utf8_general_ci`
`email` | `varchar(255)`| Email de l'utilisateur, utilisé pour l'authentification | Interclassement en `utf8_general_ci`
`password` | `varchar(255)`| Mot de passe de l'utilisateur hashé, utilisé pour l'authentification | Interclassement en `utf8_general_ci`
`userClass` | `int`| La catégorie de l'utilisateur | Clé étrangère liée à `userClasses.id`

**recipes** contient la liste des recettes :

Nom du champ | Type | Utilisation | Commentaire
--- | --- | --- | ---
`id` | `int` | Identifiant unique de chaque entrée | Clé primaire
`name` | `varchar(255)`| Nom de la recette | Interclassement en `utf8_general_ci`
`author` | `int `| L'identifiant de l'auteur de la recette | Clé étrangère liée à `users.id`
`ingredients` | `varchar(255)`| La liste des ingrédients de la recette | Interclassement en `utf8_general_ci`
`steps` | `int`| Le nombre d'étapes | Clé étrangère liée à `userClasses.id`

**comments** contient la liste des commentaires postés :

Nom du champ | Type | Utilisation | Commentaire
--- | --- | --- | ---
`id` | `int` | Identifiant unique de chaque entrée | Clé primaire
`author` | `int`| L'auteur du commentaire | Clé étrangère liée à `users.id`
`recipe` | `int `| La recette où a été postée le commentaire | Clé étrangère liée à `recipes.id`
`date_written` | `varchar(255) `| La date à laquelle a été postée le commentaire | Interclassement en `utf8_general_ci`
`comment` | `varchar(255)`| Le commentaire | Interclassement en `utf8_general_ci`
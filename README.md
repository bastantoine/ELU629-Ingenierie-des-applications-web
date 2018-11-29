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

## Utilisation du repository

Pour pouvoir réutiliser le repository, il convient d'ajouter un fichier de configuration nommé `config.ini` dans le dossier `includes` à la racine. Ce fichier contient les paramètres suivants :

Paramètre | Explication | Exemple
--- | --- | ---
`root_folder` | La racine du site | `/`
`include_path` | Le chemin absolu du dossier où est stocké le site, doit inclure un `/` à la fin | `/var/www/html/`
`path` | L'URL de connexion à la base de données | `localhost`
`port` | Le port de connexion à la base de données | `3306`
`database` | La base de données utilisée | `base_de_donnees`
`user` | Le nom de l'utilisateur à utiliser pour accéder et utiliser la base de données | `user`
`password` | Le mot de passe à utiliser pour l'authentification de l'utilisateur dans la base de données | `password`
-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Ven 21 Décembre 2018 à 23:30
-- Version du serveur :  5.7.24-0ubuntu0.18.04.1
-- Version de PHP :  7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `siteRecettesGroupe`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `idAuteur` int(11) NOT NULL,
  `idRecette` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `commentaire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `idAuteur`, `idRecette`, `date`, `commentaire`) VALUES
(1, 3, 1, '2018-12-21 23:25:45', 'Super bon ! J’ai mis des kiwis jaunes c’était parfait comme petite entré ! '),
(2, 4, 2, '2018-12-21 23:27:15', 'Excellent ! Par contre, pour moi, 5 min sur chaque face, c\'est beaucoup trop ! 2 min seulement sur la face sans peau, c\'est bien suffisant !');

-- --------------------------------------------------------

--
-- Structure de la table `recettes`
--

CREATE TABLE `recettes` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `entree` tinyint(1) NOT NULL,
  `plat` tinyint(1) NOT NULL,
  `dessert` tinyint(1) NOT NULL,
  `cout` int(11) NOT NULL,
  `difficulte` int(11) NOT NULL,
  `idAuteur` int(11) NOT NULL,
  `temps` int(11) NOT NULL,
  `ingredients` text NOT NULL,
  `recette` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `recettes`
--

INSERT INTO `recettes` (`id`, `nom`, `entree`, `plat`, `dessert`, `cout`, `difficulte`, `idAuteur`, `temps`, `ingredients`, `recette`) VALUES
(1, 'Verrines bicolores kiwi-saumon', 1, 0, 0, 3, 1, 2, 15, '- 4 kiwis\r\n- 6 tranches de saumon fumé\r\n- 5 cl de crème fraîche liquide\r\n- 10 g de mayonnaise\r\n- Ciboulette', '- Couper les kiwis et les traches de saumon en dés.\r\n- Disposer dans les verrines. (kiwi en-dessous, saumon au-dessus.\r\n- Pour la sauce, mélanger la crème liquide et la mayonnaise avec la ciboulette et un filet de jus de citron.\r\n- Verser la sauce sur le saumon.\r\n- Et voilà !\r\n\r\n'),
(2, 'Magrets de canard au miel', 0, 1, 0, 5, 2, 2, 20, '- 2 Magrets de canard gras\r\n- 3 cuillères à soupe de miel \'mille fleurs\' ou autre\r\n- 3 cuillères à café de vinaigre balsamique\r\n- Sel', '- Inciser les magrets côté peau en quadrillage sans couper la viande.\r\n- Cuire les magrets à feu vif dans une cocotte en fonte, en commençant par le coté peau.\r\n- Le temps de cuisson dépend du fait qu\'on aime la viande plus ou moins saignante. Compter environ 5 min de chaque côté. Retirer régulièrement la graisse en cours de cuisson.\r\n- Réserver les magrets au chaud (au four, couverts par une feuille d\'aluminium).\r\n- Déglacer la cocotte avec le miel et le vinaigre balsamique. Ne pas faire bouillir, la préparation tournerait au caramel. Bien poivrer.\r\n- Mettre en saucière accompagnant le magret coupé en tranches.\r\n- Comme accompagnement, je suggère des petits navets glacés (cuits à l\'eau puis passés au beurre avec un peu de sucre). ');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `mdp`, `type`, `statut`) VALUES
(1, 'admin', 'admin', 'admin@admin.fr', 'admin', 'admin', 'OK'),
(2, 'Antoine', 'Bastien', 'bastien@antoine.fr', 'bastien', 'contributeur', 'OK'),
(3, 'Valois', 'Paul', 'paul@valois.fr', 'paul', 'commentateur', 'OK'),
(4, 'Nicolas', 'Corentine', 'corentine@nicolas.fr', 'corentine', 'utilisateur', 'OK');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_idAuteurCommentaire` (`idAuteur`),
  ADD KEY `FK_idRecette` (`idRecette`);

--
-- Index pour la table `recettes`
--
ALTER TABLE `recettes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_idAuteur` (`idAuteur`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `recettes`
--
ALTER TABLE `recettes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `FK_idAuteurCommentaire` FOREIGN KEY (`idAuteur`) REFERENCES `utilisateurs` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_idRecette` FOREIGN KEY (`idRecette`) REFERENCES `recettes` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `recettes`
--
ALTER TABLE `recettes`
  ADD CONSTRAINT `FK_idAuteur` FOREIGN KEY (`idAuteur`) REFERENCES `utilisateurs` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

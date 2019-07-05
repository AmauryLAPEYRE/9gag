-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  ven. 05 juil. 2019 à 16:02
-- Version du serveur :  10.3.16-MariaDB
-- Version de PHP :  7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `9gag`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `ID` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `image_categorie` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`ID`, `name`, `image_categorie`) VALUES
(15, 'Animaux', 'clown-fish.png'),
(16, 'Sport', 'medal.png'),
(17, 'Jeux', 'game-controller.png'),
(18, 'Comics', 'marvel.png'),
(19, 'Nourriture', 'fast-food.png'),
(20, 'Dessin', 'pencil.png'),
(21, 'caca', 'fast-food copie.png');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `ID` int(11) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `pseudo` varchar(21) NOT NULL,
  `email` varchar(60) NOT NULL,
  `mdp` varchar(21) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`ID`, `profile_image`, `pseudo`, `email`, `mdp`, `admin`) VALUES
(1, '', 'amaury', 'amaury_lapeyre@hotmail.fr', '21081992', 0),
(11, NULL, 'admin', 'admin@gmail.com', '000000', 1);

-- --------------------------------------------------------

--
-- Structure de la table `postSujet`
--

CREATE TABLE `postSujet` (
  `ID` int(11) NOT NULL,
  `propri` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `date` datetime NOT NULL,
  `sujet` varchar(50) NOT NULL,
  `image_sujet` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `postSujet`
--

INSERT INTO `postSujet` (`ID`, `propri`, `contenu`, `date`, `sujet`, `image_sujet`) VALUES
(101, 9, 'rhtht', '2019-07-04 12:21:40', 'gjfgjgh', 'marvel copie.png'),
(102, 9, 'gjghj', '2019-07-04 12:27:18', 'gdfh', 'marvel_copie.png'),
(103, 9, 'dfghdfgh', '2019-07-04 13:07:27', 'fdhfgdfhfh', 'marvel_cpie.png'),
(104, 9, 'gjfghj', '2019-07-04 14:11:39', 'fdhfgdfhfh', NULL),
(105, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2019-07-04 15:22:03', 'Ours', 'ours.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `sujet`
--

CREATE TABLE `sujet` (
  `ID` int(11) NOT NULL,
  `name` varchar(21) NOT NULL,
  `categorie` varchar(21) NOT NULL,
  `image_sujet` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sujet`
--

INSERT INTO `sujet` (`ID`, `name`, `categorie`, `image_sujet`) VALUES
(28, 'gjfgjgh', 'Animaux', NULL),
(29, 'gdfh', 'Animaux', NULL),
(30, 'fdhfgdfhfh', 'Animaux', 'marvel_cpie.png'),
(31, 'Ours', 'Animaux', 'ours.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `postSujet`
--
ALTER TABLE `postSujet`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `sujet`
--
ALTER TABLE `sujet`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `postSujet`
--
ALTER TABLE `postSujet`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT pour la table `sujet`
--
ALTER TABLE `sujet`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

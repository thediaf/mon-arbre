-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 03 oct. 2019 à 15:50
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `arbre`
--

-- --------------------------------------------------------

--
-- Structure de la table `family`
--

CREATE TABLE `family` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `self` int(11) DEFAULT NULL,
  `father` int(11) DEFAULT NULL,
  `mother` int(11) DEFAULT NULL,
  `joint` int(11) DEFAULT NULL,
  `son` int(11) DEFAULT NULL,
  `daughter` int(11) DEFAULT NULL,
  `brother` int(11) DEFAULT NULL,
  `sister` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `family`
--

INSERT INTO `family` (`id`, `idUser`, `self`, `father`, `mother`, `joint`, `son`, `daughter`, `brother`, `sister`) VALUES
(1, 2, 3, 1, 5, 6, 7, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `persons`
--

CREATE TABLE `persons` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `birthDay` date NOT NULL,
  `birthLocality` varchar(255) NOT NULL,
  `sex` varchar(200) NOT NULL,
  `description` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `persons`
--

INSERT INTO `persons` (`id`, `firstName`, `lastName`, `birthDay`, `birthLocality`, `sex`, `description`, `photo`) VALUES
(1, 'Moussa', 'Waiga', '1960-12-31', 'kaedi, Gorgol, Mauritanie ', 'father', 'Enseignant', '../assets/images/photo2.png'),
(3, 'Amadou', 'Waiga', '1996-12-31', 'Sebkha, Nouakchott, Mauritanie', 'self', 'Etudiant', '../assets/images/photo.png'),
(5, 'Hawa', 'Sall', '1966-12-31', 'Bababé, Gorgol, Mauritanie ', 'mother', 'Femme au foyer', '../assets/images/photo.png'),
(6, 'Mariam', 'mint Mahmoud', '1995-12-31', 'Rosso, Trarza, Mauritanie ', 'joint', 'Etudiante', '../assets/images/photo1.png'),
(7, 'Samba', 'Waiga', '2018-12-31', 'El mina, Nouakchott, Mauritanie', 'son', 'bébé', '../assets/images/photo.png');

-- --------------------------------------------------------

--
-- Structure de la table `picts`
--

CREATE TABLE `picts` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `picts`
--

INSERT INTO `picts` (`id`, `idUser`, `image`) VALUES
(1, 2, '../assets/images/photo.png'),
(2, 2, '../assets/images/image1.jpg'),
(3, 2, '../assets/images/image.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `passWord` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `login`, `passWord`, `admin`) VALUES
(1, 'Mamadou', 'Sall', 'Salass', 's@l@ss', 0),
(2, 'diafra', 'soumare', 'thediaf', 'thediaff98', 1),
(3, 'bechir', 'ba', 'randomDev', 'random0', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `family`
--
ALTER TABLE `family`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `picts`
--
ALTER TABLE `picts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `family`
--
ALTER TABLE `family`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `persons`
--
ALTER TABLE `persons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `picts`
--
ALTER TABLE `picts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

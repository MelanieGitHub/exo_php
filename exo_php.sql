-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 03 déc. 2019 à 22:50
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `exo_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `ID_Compte` int(11) NOT NULL,
  `Pseudo` varchar(50) NOT NULL,
  `Mail` varchar(150) NOT NULL,
  `Password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`ID_Compte`, `Pseudo`, `Mail`, `Password`) VALUES
(1, 'M', 'no-mail', '42'),
(2, 'Leonard', 'leonard@gmail.com', '123Aze!!'),
(5, 'Pierrick', 'p@mail.com', 'sebN1qzz251!');

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

CREATE TABLE `ingredient` (
  `ID_Ingredient` int(11) NOT NULL,
  `Libelle` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ingredient`
--

INSERT INTO `ingredient` (`ID_Ingredient`, `Libelle`) VALUES
(1, 'Blanquette de veau'),
(2, 'Citron'),
(3, 'Oignon'),
(4, 'Champignons'),
(5, 'Crème fraîche'),
(6, 'Jaune d\'oeuf'),
(7, 'Farine'),
(8, 'Vin blanc'),
(9, 'Sel'),
(10, 'Poivre'),
(11, 'Dorade'),
(12, 'Huile'),
(13, 'Tagliatelles'),
(14, 'Lardons fumés'),
(15, 'Oeufs'),
(16, 'Ail'),
(17, 'Chocolat'),
(18, 'Poire'),
(19, 'Boudoirs'),
(20, 'Pommes'),
(21, 'Beurre'),
(22, 'Sucre'),
(23, 'pate feuilleté'),
(24, 'Courgettes'),
(25, 'Feta'),
(26, 'Lait'),
(27, 'Origan');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`ID_Compte`);

--
-- Index pour la table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`ID_Ingredient`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `ID_Compte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `ID_Ingredient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

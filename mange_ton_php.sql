-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 06 déc. 2019 à 15:25
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mange_ton_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `ID_Commande` int(11) NOT NULL,
  `Cle_Compte` int(11) NOT NULL,
  `Total_Commande` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`ID_Commande`, `Cle_Compte`, `Total_Commande`) VALUES
(1, 1, 54.79),
(2, 1, 30.9),
(3, 2, 15.99),
(4, 2, 15.99);

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
(1, 'Dinde'),
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
(12, 'Huile d\'olive'),
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
(23, 'Pâte feuilleté'),
(24, 'Courgettes'),
(25, 'Feta'),
(26, 'Lait'),
(27, 'Origan'),
(28, 'Pain hamburger'),
(29, 'Viande hachée'),
(30, 'Cheddar'),
(31, 'Tomate'),
(32, 'Salade'),
(33, 'Moutarde'),
(34, 'Ketshup'),
(35, 'Pommes de terre'),
(36, 'Carottes'),
(37, 'Thym'),
(38, 'Laurier'),
(39, 'Poireau'),
(40, 'Céleri'),
(41, 'Écorce d\'orange'),
(42, 'Crevettes'),
(43, 'Bar');

-- --------------------------------------------------------

--
-- Structure de la table `ingredient_plat`
--

CREATE TABLE `ingredient_plat` (
  `ID` int(11) NOT NULL,
  `Cle_Plat` int(11) NOT NULL,
  `Cle_Ingredient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ingredient_plat`
--

INSERT INTO `ingredient_plat` (`ID`, `Cle_Plat`, `Cle_Ingredient`) VALUES
(1, 1, 1),
(2, 1, 4),
(3, 2, 20),
(4, 2, 23),
(5, 5, 28),
(6, 5, 29),
(7, 5, 3),
(8, 5, 30),
(9, 5, 31),
(10, 5, 32),
(11, 5, 33),
(12, 5, 34),
(13, 3, 43),
(14, 3, 36),
(15, 3, 39),
(16, 3, 40),
(17, 4, 36),
(18, 4, 16),
(19, 4, 2),
(20, 4, 35),
(21, 6, 11),
(22, 6, 21),
(23, 6, 37),
(24, 6, 38);

-- --------------------------------------------------------

--
-- Structure de la table `origine`
--

CREATE TABLE `origine` (
  `ID_Origine` int(11) NOT NULL,
  `Libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `origine`
--

INSERT INTO `origine` (`ID_Origine`, `Libelle`) VALUES
(1, 'Europe'),
(2, 'France'),
(3, 'Chine'),
(4, 'Espagne'),
(5, 'Asie'),
(6, 'Italie');

-- --------------------------------------------------------

--
-- Structure de la table `plat`
--

CREATE TABLE `plat` (
  `ID` int(11) NOT NULL,
  `Libelle` varchar(3000) NOT NULL,
  `Type` int(11) NOT NULL,
  `Origine` int(11) NOT NULL,
  `Prix` float NOT NULL,
  `Poids` int(11) NOT NULL,
  `Image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `plat`
--

INSERT INTO `plat` (`ID`, `Libelle`, `Type`, `Origine`, `Prix`, `Poids`, `Image`) VALUES
(1, 'Blanquette de dinde', 7, 2, 15.99, 200, 'images/blanquette_dinde.jpg'),
(2, 'Tartes aux pommes', 2, 4, 8.5, 100, 'images/tarte_pomme.jpg'),
(3, 'Soupe de Bar', 3, 5, 16.6, 120, 'images/soupe_bar.jpg'),
(4, 'Curry Végé', 1, 1, 11.2, 230, 'images/curry_vege.jpg'),
(5, 'Hamburger', 7, 1, 6.5, 200, 'images/burger.jpg'),
(6, 'Dorade au four', 6, 3, 19.4, 500, 'images/dorade_four.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `plat_commande`
--

CREATE TABLE `plat_commande` (
  `ID` int(11) NOT NULL,
  `Cle_plat` int(11) NOT NULL,
  `Cle_Commande` int(11) NOT NULL,
  `Quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `plat_commande`
--

INSERT INTO `plat_commande` (`ID`, `Cle_plat`, `Cle_Commande`, `Quantite`) VALUES
(1, 1, 1, 1),
(2, 4, 2, 2),
(3, 5, 3, 1),
(4, 3, 4, 1),
(5, 6, 1, 2),
(6, 2, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `ID_Type` int(11) NOT NULL,
  `Libelle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`ID_Type`, `Libelle`) VALUES
(1, 'Végétarien'),
(2, 'Dessert'),
(3, 'Entrée'),
(4, 'Plat chaud'),
(5, 'Plat froid'),
(6, 'Poisson'),
(7, 'Viande');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`ID_Commande`),
  ADD KEY `Cle_Compte` (`Cle_Compte`);

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
-- Index pour la table `ingredient_plat`
--
ALTER TABLE `ingredient_plat`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `cle_plat` (`Cle_Plat`),
  ADD KEY `cle_ingredient` (`Cle_Ingredient`);

--
-- Index pour la table `origine`
--
ALTER TABLE `origine`
  ADD PRIMARY KEY (`ID_Origine`);

--
-- Index pour la table `plat`
--
ALTER TABLE `plat`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `cle_origine_plat` (`Origine`),
  ADD KEY `cle_type_plat` (`Type`);

--
-- Index pour la table `plat_commande`
--
ALTER TABLE `plat_commande`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Cle_Commande` (`Cle_Commande`),
  ADD KEY `Cle_plat` (`Cle_plat`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`ID_Type`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `ID_Commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `ID_Compte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `ID_Ingredient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `ingredient_plat`
--
ALTER TABLE `ingredient_plat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `origine`
--
ALTER TABLE `origine`
  MODIFY `ID_Origine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `plat`
--
ALTER TABLE `plat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `plat_commande`
--
ALTER TABLE `plat_commande`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `ID_Type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`Cle_Compte`) REFERENCES `compte` (`ID_Compte`);

--
-- Contraintes pour la table `ingredient_plat`
--
ALTER TABLE `ingredient_plat`
  ADD CONSTRAINT `cle_ingredient` FOREIGN KEY (`Cle_Ingredient`) REFERENCES `ingredient` (`ID_Ingredient`),
  ADD CONSTRAINT `cle_plat` FOREIGN KEY (`Cle_Plat`) REFERENCES `plat` (`ID`);

--
-- Contraintes pour la table `plat`
--
ALTER TABLE `plat`
  ADD CONSTRAINT `cle_origine_plat` FOREIGN KEY (`Origine`) REFERENCES `origine` (`ID_Origine`),
  ADD CONSTRAINT `cle_type_plat` FOREIGN KEY (`Type`) REFERENCES `type` (`ID_Type`);

--
-- Contraintes pour la table `plat_commande`
--
ALTER TABLE `plat_commande`
  ADD CONSTRAINT `plat_commande_ibfk_1` FOREIGN KEY (`Cle_Commande`) REFERENCES `commande` (`ID_Commande`),
  ADD CONSTRAINT `plat_commande_ibfk_2` FOREIGN KEY (`Cle_plat`) REFERENCES `plat` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

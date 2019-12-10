-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 09 déc. 2019 à 22:50
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
-- Base de données :  `mange_ton_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `ID_Commande` int(11) NOT NULL,
  `Cle_Compte` int(11) NOT NULL,
  `Total_Commande` float NOT NULL,
  `Date_commande` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`ID_Commande`, `Cle_Compte`, `Total_Commande`, `Date_commande`) VALUES
(1, 1, 15.8, '2019-11-25'),
(2, 1, 13.4, '2019-11-12'),
(3, 2, 4.5, '2019-10-02'),
(4, 2, 5.8, '2019-12-05'),
(5, 1, 18.2, '2019-12-08');

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
(1, 'M', 'no-mail@truc.com', '42'),
(2, 'L', 'l.f@gmail.com', '42');

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
(2, 'Steack'),
(4, 'Tomate'),
(5, 'Salade'),
(6, 'Ketshup'),
(7, 'Mayo'),
(8, 'Oeuf'),
(9, 'Poulet'),
(10, 'Cheddar'),
(11, 'Bacon'),
(12, 'Sauce stylée'),
(13, 'Pain hamburger'),
(14, 'Pain muffin'),
(15, 'Galette'),
(16, 'Fromage raclette'),
(17, 'Oignon'),
(18, 'Chocolat'),
(19, 'Noisette'),
(20, 'Sucre'),
(21, 'Beurre'),
(22, 'Farine'),
(23, 'Eau');

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
(25, 4, 17),
(26, 4, 2),
(27, 4, 6),
(28, 4, 5),
(29, 4, 10),
(30, 4, 4),
(31, 6, 9),
(32, 6, 7),
(33, 6, 13),
(34, 6, 5),
(35, 2, 14),
(36, 2, 8),
(37, 2, 7),
(38, 2, 11),
(49, 3, 16),
(50, 3, 15),
(51, 3, 5),
(52, 3, 4),
(53, 3, 12),
(54, 1, 15),
(55, 1, 10),
(56, 1, 8),
(57, 1, 5),
(58, 1, 4),
(59, 5, 13),
(60, 5, 4),
(61, 5, 7),
(62, 5, 6),
(63, 5, 2),
(72, 7, 8),
(73, 7, 20),
(74, 8, 22),
(75, 9, 18),
(76, 9, 19),
(77, 8, 21),
(78, 8, 20),
(79, 10, 19),
(80, 11, 23),
(81, 12, 20);

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
(1, 'McWrap Indian Veggie', 1, 2, 5.8, 200, 'images/mcwrap-indian.png'),
(2, 'McMuffin Egg & Bacon', 1, 2, 3.4, 100, 'images/mcmuffin-egg.jpg'),
(3, 'McWrap Crispy Raclette Bacon', 1, 2, 5.8, 120, 'images/mcwrap-raclette.png'),
(4, 'Big Mac', 1, 2, 5, 230, 'images/big-mac.png'),
(5, 'Triple Cheesburger', 1, 2, 4.5, 200, 'images/triple-cheese.jpg'),
(6, 'McChicken', 1, 2, 5, 500, 'images/mc-chicken.jpg'),
(7, 'Donut confetti', 2, 2, 2, 100, 'images/donut.png'),
(8, 'Duo de macarons', 2, 2, 2, 50, 'images/macaron.png'),
(9, 'Muffin Chocolat noisette', 2, 2, 2.8, 60, 'images/muffin.png'),
(10, 'Cookie choconuts', 2, 2, 2.2, 55, 'images/cookie.jpg'),
(11, 'Evian', 6, 2, 2.7, 50, 'images/evian.png'),
(12, 'Coca-Cola', 6, 2, 2.5, 25, 'images/coca.png');

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
(6, 2, 2, 1),
(10, 3, 5, 1),
(11, 5, 5, 2),
(12, 2, 5, 1);

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
(1, 'Burgers'),
(2, 'Dessert'),
(6, 'Boisson');

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
  MODIFY `ID_Commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `ID_Compte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `ID_Ingredient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `ingredient_plat`
--
ALTER TABLE `ingredient_plat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT pour la table `origine`
--
ALTER TABLE `origine`
  MODIFY `ID_Origine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `plat`
--
ALTER TABLE `plat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `plat_commande`
--
ALTER TABLE `plat_commande`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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

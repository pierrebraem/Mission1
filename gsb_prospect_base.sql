-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 24 sep. 2020 à 18:03
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gsb_prospect`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_Praticien` int(11) NOT NULL,
  PRIMARY KEY (`id_Praticien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_Praticien`) VALUES
(3),
(4),
(7),
(9),
(10),
(11),
(12),
(13),
(17),
(20),
(21),
(24),
(25),
(29),
(32),
(33),
(34),
(35),
(37),
(41),
(42),
(43),
(44),
(45),
(46),
(50),
(51);

--
-- Déclencheurs `client`
--
DROP TRIGGER IF EXISTS `client_ai`;
DELIMITER $$
CREATE TRIGGER `client_ai` AFTER INSERT ON `client` FOR EACH ROW DELETE FROM prospect WHERE id_Praticien = NEW.id_Praticien
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

DROP TABLE IF EXISTS `etat`;
CREATE TABLE IF NOT EXISTS `etat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etat`
--

INSERT INTO `etat` (`id`, `nom`) VALUES
(1, 'nouveau'),
(2, 'à rappeler'),
(3, 'rendez-vous en attente'),
(4, 'rendez-vous à confirmer'),
(5, 'rendez-vous confirmé');

-- --------------------------------------------------------

--
-- Structure de la table `interesser`
--

DROP TABLE IF EXISTS `interesser`;
CREATE TABLE IF NOT EXISTS `interesser` (
  `id_Client` int(11) NOT NULL,
  `id_Prestation` int(11) NOT NULL,
  PRIMARY KEY (`id_Prestation`,`id_Client`),
  KEY `id_Client` (`id_Client`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `interesser`
--

INSERT INTO `interesser` (`id_Client`, `id_Prestation`) VALUES
(4, 1),
(9, 1),
(10, 1),
(11, 1),
(13, 1),
(17, 1),
(25, 1),
(29, 1),
(32, 1),
(33, 1),
(37, 1),
(41, 1),
(42, 1),
(43, 1),
(46, 1),
(50, 1),
(51, 1),
(4, 2),
(7, 2),
(9, 2),
(12, 2),
(20, 2),
(21, 2),
(25, 2),
(29, 2),
(32, 2),
(34, 2),
(37, 2),
(43, 2),
(44, 2),
(51, 2),
(3, 3),
(7, 3),
(9, 3),
(12, 3),
(24, 3),
(25, 3),
(29, 3),
(35, 3),
(45, 3);

-- --------------------------------------------------------

--
-- Structure de la table `praticien`
--

DROP TABLE IF EXISTS `praticien`;
CREATE TABLE IF NOT EXISTS `praticien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `id_Ville` int(11) DEFAULT NULL,
  `id_Type_Praticien` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Praticien_id_Ville` (`id_Ville`),
  KEY `FK_Praticien_id_Type_Praticien` (`id_Type_Praticien`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `praticien`
--

INSERT INTO `praticien` (`id`, `nom`, `prenom`, `adresse`, `id_Ville`, `id_Type_Praticien`) VALUES
(1, 'Notini', 'Alain', '114 r Authie', 1, 1),
(2, 'Gosselin', 'Albert', '13 r Devon', 2, 2),
(3, 'Delahaye', 'André', '36 av 6 Juin', 3, 5),
(4, 'Leroux', 'André', '47 av Robert Schuman', 4, 3),
(5, 'Desmoulins', 'Anne', '31 r St Jean', 5, 4),
(6, 'Mouel', 'Anne', '27 r Auvergne', 6, 1),
(7, 'Desgranges-Lentz', 'Antoine', '1 r Albert de Mun', 7, 2),
(8, 'Marcouiller', 'Arnaud', '31 r St Jean', 8, 5),
(9, 'Dupuy', 'Benoit', '9 r Demolombe', 9, 3),
(10, 'Lerat', 'Bernard', '31 r St Jean', 10, 4),
(11, 'Marçais-Lefebvre', 'Bertrand', '86Bis r Basse', 11, 1),
(12, 'Boscher', 'Bruno', '94 r Falaise', 12, 2),
(13, 'Morel', 'Catherine', '21 r Chateaubriand', 13, 5),
(14, 'Guivarch', 'Chantal', '4 av Gén Laperrine', 14, 3),
(15, 'Bessin-Grosdoit', 'Christophe', '92 r Falaise', 15, 4),
(16, 'Rossa', 'Claire', '14 av Thiès', 15, 1),
(17, 'Cauchy', 'Denis', '5 av Ste Thérèse', 16, 2),
(18, 'Gaffé', 'Dominique', '9 av 1ère Armée Française', 17, 5),
(19, 'Guenon', 'Dominique', '98 bd Mar Lyautey', 18, 3),
(20, 'Prévot', 'Dominique', '29 r Lucien Nelle', 19, 4),
(21, 'Houchard', 'Eliane', '9 r Demolombe', 20, 1),
(22, 'Desmons', 'Elisabeth', '51 r Bernières', 21, 2),
(23, 'Flament', 'Elisabeth', '11 r Pasteur', 17, 5),
(24, 'Goussard', 'Emmanuel', '9 r Demolombe', 2, 3),
(25, 'Desprez', 'Eric', '9 r Vaucelles', 22, 4),
(26, 'Coste', 'Evelyne', '29 r Lucien Nelle', 23, 1),
(27, 'Lefebvre', 'Frédéric', '2 pl Wurzburg', 24, 2),
(28, 'Lemée', 'Frédéric', '29 av 6 Juin', 25, 5),
(29, 'Martin', 'Frédéric', 'Bât A 90 r Bayeux', 26, 3),
(30, 'Marie', 'Frédérique', '172 r Caponière', 26, 4),
(31, 'Rosenstech', 'Geneviève', '27 r Auvergne', 13, 1),
(32, 'Pontavice', 'Ghislaine', '8 r Gaillon', 27, 2),
(33, 'Leveneur-Mosquet', 'Guillaume', '47 av Robert Schuman', 28, 5),
(34, 'Blanchais', 'Guy', '30 r Authie', 29, 3),
(35, 'Leveneur', 'Hugues', '7 pl St Gilles', 30, 4),
(36, 'Mosquet', 'Isabelle', '22 r Jules Verne', 31, 1),
(37, 'Giraudon', 'Jean-Christophe', '1 r Albert de Mun', 32, 2),
(38, 'Marie', 'Jean-Claude', '26 r Hérouville', 33, 5),
(39, 'Maury', 'Jean-François', '5 r Pierre Girard', 34, 3),
(40, 'Dennel', 'Jean-Louis', '7 pl St Gilles', 35, 4),
(41, 'Ain', 'Jean-Pierre', '4 résid Olympia', 36, 1),
(42, 'Chemery', 'Jean-Pierre', '51 pl Ancienne Boucherie', 37, 2),
(43, 'Comoz', 'Jean-Pierre', '35 r Auguste Lechesne', 38, 5),
(44, 'Desfaudais', 'Jean-Pierre', '7 pl St Gilles', 39, 3),
(45, 'Phan', 'JérÃ´me', '9 r Clos Caillet', 40, 4),
(46, 'Riou', 'Line', '43 bd Gén Vanier', 41, 1),
(47, 'Chubilleau', 'Louis', '46 r Eglise', 42, 2),
(48, 'Lebrun', 'Lucette', '178 r Auge', 43, 5),
(49, 'Goessens', 'Marc', '6 av 6 Juin', 44, 3),
(50, 'Laforge', 'Marc', '5 résid Prairie', 45, 4),
(51, 'Millereau', 'Marc', '36 av 6 Juin', 46, 1),
(52, 'Dauverne', 'Marie-Christine', '69 av Charlemagne', 47, 2),
(53, 'Vittorio', 'Myriam', '3 pl Champlain', 48, 5),
(54, 'Lapasset', 'Nhieu', '31 av 6 Juin', 49, 3),
(55, 'Plantet-Besnier', 'Nicole', '10 av 1ère Armée Française', 50, 4),
(56, 'Chubilleau', 'Pascal', '3 r Hastings', 51, 1),
(57, 'Robert', 'Pascal', '31 r St Jean', 52, 2),
(58, 'Jean', 'Pascale', '114 r Authie', 53, 5),
(59, 'Chanteloube', 'Patrice', '14 av Thiès', 54, 3),
(60, 'Lecuirot', 'Patrice', 'résid St Pères 55 r Pigacière', 43, 4),
(61, 'Gandon', 'Patrick', '47 av Robert Schuman', 55, 1),
(62, 'Mirouf', 'Patrick', '22 r Puits Picard', 56, 2),
(63, 'Boireaux', 'Philippe', '14 av Thiès', 57, 5),
(64, 'Cendrier', 'Philippe', '7 pl St Gilles', 58, 3),
(65, 'Duhamel', 'Philippe', '114 r Authie', 9, 4),
(66, 'Grigy', 'Philippe', '15 r Mélingue', 59, 1),
(67, 'Linard', 'Philippe', '1 r Albert de Mun', 60, 2),
(68, 'Lozier', 'Philippe', '8 r Gaillon', 61, 5),
(69, 'Dechâtre', 'Pierre', '63 av Thiès', 62, 3),
(70, 'Goessens', 'Pierre', '22 r Jean Romain', 63, 4),
(71, 'Leménager', 'Pierre', '39 av 6 Juin', 64, 1),
(72, 'Née', 'Pierre', '39 av 6 Juin', 65, 2),
(73, 'Guyot', 'Pierre-Laurent', '43 bd Gén Vanier', 66, 5),
(74, 'Chauchard', 'Roger', '9 r Vaucelles', 54, 3),
(75, 'Mabire', 'Roland', '11 r Boutiques', 11, 4),
(76, 'Leroy', 'Soazig', '45 r Boutiques', 67, 1),
(77, 'Guyot', 'Stéphane', '26 r Hérouville', 68, 2),
(78, 'Delposen', 'Sylvain', '39 av 6 Juin', 69, 5),
(79, 'Rault', 'Sylvie', '15 bd Richemond', 70, 3),
(80, 'Renouf', 'Sylvie', '98 bd Mar Lyautey', 71, 4),
(81, 'Alliet-Grach', 'Thierry', '14 av Thiès', 72, 1),
(82, 'Bayard', 'Thierry', '92 r Falaise', 73, 2),
(83, 'Gauchet', 'Thierry', '7 r Desmoueux', 74, 5),
(84, 'Bobichon', 'Tristan', '219 r Caponière', 75, 3),
(85, 'Duchemin-Laniel', 'Véronique', '130 r St Jean', 76, 4),
(86, 'Laurent', 'Younès', '34 r Demolombe', 77, 1);

-- --------------------------------------------------------

--
-- Structure de la table `prestation`
--

DROP TABLE IF EXISTS `prestation`;
CREATE TABLE IF NOT EXISTS `prestation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `prestation`
--

INSERT INTO `prestation` (`id`, `nom`) VALUES
(1, 'visite'),
(2, 'conférence'),
(3, 'formation');

-- --------------------------------------------------------

--
-- Structure de la table `prospect`
--

DROP TABLE IF EXISTS `prospect`;
CREATE TABLE IF NOT EXISTS `prospect` (
  `id_Praticien` int(11) NOT NULL,
  `id_Etat` int(11) NOT NULL,
  PRIMARY KEY (`id_Praticien`),
  KEY `FK_Prospect_id_Etat` (`id_Etat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `prospect`
--

INSERT INTO `prospect` (`id_Praticien`, `id_Etat`) VALUES
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(53, 2),
(55, 2),
(56, 2),
(57, 2),
(59, 2),
(60, 2),
(61, 2),
(62, 2),
(52, 3),
(54, 3),
(58, 3);

-- --------------------------------------------------------

--
-- Structure de la table `type_praticien`
--

DROP TABLE IF EXISTS `type_praticien`;
CREATE TABLE IF NOT EXISTS `type_praticien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(6) NOT NULL,
  `libelle` varchar(25) NOT NULL,
  `lieu` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_praticien`
--

INSERT INTO `type_praticien` (`id`, `code`, `libelle`, `lieu`) VALUES
(1, 'MH', 'Médecin Hospitalier', 'Hopital ou Clinique'),
(2, 'MV', 'Médecine de Ville', 'Cabinet'),
(3, 'PH', 'Pharmacien Hospitalier', 'Hopital ou Clinique'),
(4, 'PO', 'Pharmacien Officine', 'Pharmacie'),
(5, 'PS', 'Personnel de santé', 'Centre Paramédical');

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

DROP TABLE IF EXISTS `ville`;
CREATE TABLE IF NOT EXISTS `ville` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `code_postal` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`id`, `nom`, `code_postal`) VALUES
(1, 'LA ROCHE SUR YON', '85000'),
(2, 'BLOIS', '41000'),
(3, 'BESANCON', '25000'),
(4, 'BEAUVAIS', '60000'),
(5, 'NIMES', '30000'),
(6, 'AMIENS', '80000'),
(7, 'MORLAIX', '29000'),
(8, 'MULHOUSE', '68000'),
(9, 'MONTPELLIER', '34000'),
(10, 'LILLE', '59000'),
(11, 'STRASBOURG', '67000'),
(12, 'TROYES', '10000'),
(13, 'PARIS', '75000'),
(14, 'ORLEANS', '45000'),
(15, 'NICE', '6000'),
(16, 'NARBONNE', '11000'),
(17, 'RENNES', '35000'),
(18, 'NANTES', '44000'),
(19, 'LIMOGES', '87000'),
(20, 'ANGERS', '49100'),
(21, 'QUIMPER', '29000'),
(22, 'BORDEAUX', '33000'),
(23, 'TULLE', '19000'),
(24, 'VERDUN', '55000'),
(25, 'VANNES', '56000'),
(26, 'VESOUL', '70000'),
(27, 'POITIERS', '86000'),
(28, 'PAU', '64000'),
(29, 'SEDAN', '8000'),
(30, 'ARRAS', '62000'),
(31, 'ROUEN', '76000'),
(32, 'VIENNE', '38100'),
(33, 'LYON', '69000'),
(34, 'CHALON SUR SAONE', '71000'),
(35, 'CHARTRES', '28000'),
(36, 'LAON', '2000'),
(37, 'CAEN', '14000'),
(38, 'BOURGES', '18000'),
(39, 'BREST', '29000'),
(40, 'NIORT', '79000'),
(41, 'MARNE LA VALLEE', '77000'),
(42, 'SAINTES', '17000'),
(43, 'NANCY', '54000'),
(44, 'DOLE', '39000'),
(45, 'SAINT LO', '50000'),
(46, 'LA FERTE BERNARD', '72000'),
(47, 'DIJON', '21000'),
(48, 'BOISSY SAINT LEGER', '94000'),
(49, 'CHAUMONT', '52000'),
(50, 'CHATELLEREAULT', '86000'),
(51, 'AURRILLAC', '15000'),
(52, 'BOBIGNY', '93000'),
(53, 'SAUMUR', '49100'),
(54, 'MARSEILLE', '13000'),
(55, 'TOURS', '37000'),
(56, 'ANNECY', '74000'),
(57, 'CHALON EN CHAMPAGNE', '10000'),
(58, 'RODEZ', '12000'),
(59, 'CLISSON', '44000'),
(60, 'ALBI', '81000'),
(61, 'TOULOUSE', '31000'),
(62, 'MONTLUCON', '23000'),
(63, 'MONT DE MARSAN', '40000'),
(64, 'METZ', '57000'),
(65, 'MONTAUBAN', '82000'),
(66, 'MENDE', '48000'),
(67, 'ALENCON', '61000'),
(68, 'FIGEAC', '46000'),
(69, 'DREUX', '27000'),
(70, 'SOISSON', '2000'),
(71, 'EPINAL', '88000'),
(72, 'PRIVAS', '7000'),
(73, 'SAINT ETIENNE', '42000'),
(74, 'GRENOBLE', '38100'),
(75, 'FOIX', '9000'),
(76, 'LIBOURNE', '33000'),
(77, 'MAYENNE', '53000');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `FK_Client_id_Praticien` FOREIGN KEY (`id_Praticien`) REFERENCES `praticien` (`id`);

--
-- Contraintes pour la table `interesser`
--
ALTER TABLE `interesser`
  ADD CONSTRAINT `FK_interesser_id_Prestation` FOREIGN KEY (`id_Prestation`) REFERENCES `prestation` (`id`),
  ADD CONSTRAINT `interesser_ibfk_1` FOREIGN KEY (`id_Client`) REFERENCES `client` (`id_Praticien`);

--
-- Contraintes pour la table `praticien`
--
ALTER TABLE `praticien`
  ADD CONSTRAINT `FK_Praticien_id_Type_Praticien` FOREIGN KEY (`id_Type_Praticien`) REFERENCES `type_praticien` (`id`),
  ADD CONSTRAINT `FK_Praticien_id_Ville` FOREIGN KEY (`id_Ville`) REFERENCES `ville` (`id`);

--
-- Contraintes pour la table `prospect`
--
ALTER TABLE `prospect`
  ADD CONSTRAINT `FK_Prospect_id_Etat` FOREIGN KEY (`id_Etat`) REFERENCES `etat` (`id`),
  ADD CONSTRAINT `FK_Prospect_id_Praticien` FOREIGN KEY (`id_Praticien`) REFERENCES `praticien` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

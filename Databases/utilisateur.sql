-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 27 avr. 2021 à 08:14
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `naturimal`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `Id_utilisateur` int(99) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `LastName` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `Role` int(99) NOT NULL,
  PRIMARY KEY (`Id_utilisateur`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`Id_utilisateur`, `FirstName`, `LastName`, `Email`, `Password`, `Role`) VALUES
(33, 'Admin', 'Admin', 'Admin@Admin.com', 'Admin', 1),
(47, 'fezf', 'hjhgjg', 'semah@gmail.com', 'S@m123456789', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

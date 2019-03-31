-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 31 mars 2019 à 10:27
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `busy`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `idcontact` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ct_nom` varchar(45) COLLATE utf8_bin NOT NULL,
  `ct_prenom` varchar(45) COLLATE utf8_bin DEFAULT 'Non Renseigné',
  `ct_email` varchar(45) COLLATE utf8_bin NOT NULL,
  `ct_tel` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idcontact`),
  UNIQUE KEY `idemails_UNIQUE` (`idcontact`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `models`
--

DROP TABLE IF EXISTS `models`;
CREATE TABLE IF NOT EXISTS `models` (
  `idmodels` int(11) NOT NULL AUTO_INCREMENT,
  `mod_presentation` tinytext COLLATE utf8_bin,
  `mod_fichier` tinytext COLLATE utf8_bin,
  `mod_name` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idmodels`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `realisations`
--

DROP TABLE IF EXISTS `realisations`;
CREATE TABLE IF NOT EXISTS `realisations` (
  `idrealisations` int(11) NOT NULL AUTO_INCREMENT,
  `real_name` tinytext COLLATE utf8_bin,
  `real_pres` tinytext COLLATE utf8_bin,
  `real_photos` tinytext COLLATE utf8_bin,
  `real_photos2` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idrealisations`),
  UNIQUE KEY `idrealisations_UNIQUE` (`idrealisations`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `realisations`
--

INSERT INTO `realisations` (`idrealisations`, `real_name`, `real_pres`, `real_photos`, `real_photos2`) VALUES
(1, 'super', 'test', 'testaussi', NULL),
(6, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_pseudo` varchar(100) COLLATE utf8_bin NOT NULL,
  `user_password` longtext COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `user_pseudo` (`user_pseudo`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `user_pseudo`, `user_password`) VALUES
(1, 'test', 'pkpkpoko'),
(20, 'azerty123', '$2y$10$cZ7GurnJfWe4geReKKWDUuT8sztyqbGaHmMbBYftHkqOcO2s27zK2'),
(26, 'azerty', '$2y$10$jyaRAuoz.m976W0GXXsoveTsTP7podWidrhV9ZIc6JrsA69bNc5YC');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 26 Mai 2021 à 15:55
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `acheteurs`
--

-- --------------------------------------------------------

--
-- Structure de la table `acheteurs`
--

CREATE TABLE IF NOT EXISTS `acheteurs` (
  `Nom et prénom` varchar(255) NOT NULL,
  `adresse Ligne 1` varchar(255) NOT NULL,
  `adresse ligne 2` varchar(255) NOT NULL,
  `Ville` varchar(255) NOT NULL,
  `Code postal` int(5) NOT NULL,
  `Pays` varchar(255) NOT NULL,
  `Numéro de telephone` int(10) NOT NULL,
  `type de carte de paiement` varchar(255) NOT NULL,
  `numéro de carte` int(12) NOT NULL,
  `Nom sur la carte` varchar(255) NOT NULL,
  `date d'expiration` date NOT NULL,
  `Code sécurité` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

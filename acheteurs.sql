-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 27 Mai 2021 à 14:59
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
  `Nometprenom` varchar(255) NOT NULL,
  `adresseligne1` varchar(255) NOT NULL,
  `adresseligne2` varchar(255) NOT NULL,
  `Ville` varchar(255) NOT NULL,
  `Codepostale` int(5) NOT NULL,
  `Pays` varchar(255) NOT NULL,
  `Numerodetelephone` int(10) NOT NULL,
  `typedecartedepaiement` varchar(255) NOT NULL,
  `numerodecarte` int(16) NOT NULL,
  `Nomsurlacarte` varchar(255) NOT NULL,
  `datedexpiration` date NOT NULL,
  `Codesecurite` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `acheteurs`
--

INSERT INTO `acheteurs` (`Nometprenom`, `adresseligne1`, `adresseligne2`, `Ville`, `Codepostale`, `Pays`, `Numerodetelephone`, `typedecartedepaiement`, `numerodecarte`, `Nomsurlacarte`, `datedexpiration`, `Codesecurite`) VALUES
('DER MATHEOSSIAN Hugo', '28,rue Vauquelin', '4ème étage', 'Paris', 75005, 'France', 752625212, 'VISA', 0, 'DER MATHEOSSIAN HUGO', '2023-03-01', 1234),
('DER MATHEOSSIAN Hugo', '28,rue Vauquelin', '4ème étage', 'Paris', 75005, 'France', 752625212, 'VISA', 2147483647, 'DER MATHEOSSIAN HUGO', '2023-03-01', 1234),
('Jean Dupont', '', 'RDC', 'Paris', 0, 'France', 746342898, 'VISA', 2147483647, 'JEAN DUPONT', '2023-12-12', 1234),
('Jean Dupont', '', 'RDC', 'Paris', 0, 'France', 746342898, 'VISA', 2147483647, 'JEAN DUPONT', '2023-12-12', 1234),
('Pierre Lamarche', '', '2e etage', 'Tours', 3700, 'France', 613455678, 'VISA', 2147483647, 'PIERRE LAMARCHE', '2023-01-01', 1111),
('Pierre Lamarche', '', '2e etage', 'Tours', 3700, 'France', 613455678, 'VISA', 2147483647, 'PIERRE LAMARCHE', '2023-01-01', 1111),
('Imbe Cil', '', 'premier carrefour', 'Lille', 0, 'France', 789883336, 'VISA', 2147483647, 'IMBE CIL', '2022-09-11', 2356),
('Imbe Cil', '', 'premier carrefour', 'Lille', 0, 'France', 789883336, 'VISA', 2147483647, 'IMBE CIL', '2022-09-11', 2356);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

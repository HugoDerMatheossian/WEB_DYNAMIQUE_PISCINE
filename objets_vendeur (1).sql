-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 27 mai 2021 à 20:25
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `objets vendeur`
--

-- --------------------------------------------------------

--
-- Structure de la table `objets vendeur`
--

DROP TABLE IF EXISTS `objets vendeur`;
CREATE TABLE IF NOT EXISTS `objets vendeur` (
  `ID` int(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `unites` int(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `objets vendeur`
--

INSERT INTO `objets vendeur` (`ID`, `nom`, `description`, `prix`, `unites`, `categorie`, `image`) VALUES
(1, 'Style BIC bleu', 'Un stylo BIC bleu', 2, 1, 'materiels scolaires', 'BIC bleu.jpg'),
(1, 'Cahier Oxford 96pages', 'Un cahier Oxford de 96 pages.', 5, 1, 'materiels scolaires', 'cahier Oxford.jpg'),
(1, 'Taille crayon', 'Un taille crayon', 2, 3, 'materiels scolaires', 'taille crayon.jpg'),
(4, 'Tableau Picasso', 'Un tableau de Picasso', 500000, 1, 'meubles et objets d art', 'Tableau Picasso.jpg'),
(1, 'Bracelet en argent', 'Un bracelet en argent', 250, 2, 'accessoire vip', 'Bracelet en argent.jpg'),
(1, 'Crayon de papier', 'Un crayon de papier', 1, 5, 'materiels scolaires', 'Crayon de papier.png'),
(1, 'Gomme', 'Une gomme Staedler', 1, 3, 'materiels scolaires', 'Gomme Staedler.jpg'),
(3, 'Chaine en or', 'Une chaine en or 24 cara', 1500, 1, 'accessoire vip', 'chaine en or.jpg'),
(2, 'La joconde', 'La fameuse peinture', 1000000, 1, 'meubles et objets d art', 'La joconde.jpg'),
(1, 'colle', 'Une colle de la marque Scotch', 1, 2, 'materiels scolaires', 'colle.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

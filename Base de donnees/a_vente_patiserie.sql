-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 14 nov. 2018 à 16:57
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `a_vente_patiserie`
--

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codProd` int(11) NOT NULL,
  `prix_total` int(11) NOT NULL,
  `qte_com` int(11) NOT NULL,
  `supplement` int(11) NOT NULL,
  `date_vente` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `codProd` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `quantite` int(11) NOT NULL,
  `unite` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `prixUnitaire` int(11) NOT NULL,
  PRIMARY KEY (`codProd`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`codProd`, `designation`, `quantite`, `unite`, `prixUnitaire`) VALUES
(1, 'Lait sachet 25 gr', 15, 'sachet', 100),
(3, 'Pomme de terre', 40, 'kg', 400),
(5, 'pain', 120, 'kg', 150);

-- --------------------------------------------------------

--
-- Structure de la table `type_unite_produit`
--

DROP TABLE IF EXISTS `type_unite_produit`;
CREATE TABLE IF NOT EXISTS `type_unite_produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `type_unite_produit`
--

INSERT INTO `type_unite_produit` (`id`, `type`) VALUES
(1, 'kg'),
(2, 'sachet');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` text COLLATE utf8_unicode_ci NOT NULL,
  `date_inscription` date NOT NULL,
  `type_groupe` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `email`, `nom`, `prenom`, `adresse`, `date_inscription`, `type_groupe`) VALUES
(1, 'badara', '81bce1f3bf343c464685d875c626820cdb58e309', 'badara@gmail.com', 'badiane', 'charles', 'Ngor village', '2017-05-30', 1),
(8, 'zeyna', '81bce1f3bf343c464685d875c626820cdb58e309', 'nabou@gmail.com', 'Gueye', 'Seynabou', 'Liberte 6 extension', '2017-06-06', 2),
(11, 'lamine', '9b162e1f779fbe6bd0d8432db5e6ed925e86943c', 'alami256@gmail.com', 'diallo', 'lamine', 'cite ndeye marie', '2018-07-10', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user_groupe`
--

DROP TABLE IF EXISTS `user_groupe`;
CREATE TABLE IF NOT EXISTS `user_groupe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupe` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user_groupe`
--

INSERT INTO `user_groupe` (`id`, `groupe`) VALUES
(1, 'administrateur'),
(2, 'utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

DROP TABLE IF EXISTS `vente`;
CREATE TABLE IF NOT EXISTS `vente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codProd` int(11) NOT NULL,
  `qte_vente` int(11) NOT NULL,
  `prix_total` int(11) NOT NULL,
  `date_vente` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `vente`
--

INSERT INTO `vente` (`id`, `codProd`, `qte_vente`, `prix_total`, `date_vente`) VALUES
(1, 3, 3, 1300, '2018-11-14'),
(2, 5, 2, 800, '2018-11-14'),
(3, 1, 3, 800, '2018-11-14'),
(4, 1, 1, 200, '2018-11-14'),
(5, 5, 1, 350, '2018-11-14');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

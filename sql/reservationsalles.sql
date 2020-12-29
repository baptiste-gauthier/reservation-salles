-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 29 déc. 2020 à 10:19
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
-- Base de données : `reservationsalles`
--

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `debut` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES
(1, 'restau', 'teeeeeeest', '2020-12-21 12:00:00', '2020-12-21 13:00:00', 7),
(2, 'anniv', 'deeeeeeeee', '2020-12-22 14:00:00', '2020-12-22 15:00:00', 8),
(3, 'teeeest', 'teeeeeeeeeeeeeeeeeeeeeeeeeeestseee', '2020-12-24 08:00:00', '2020-12-24 09:00:00', 9),
(4, 'Cuisine', 'lorem ', '2020-12-23 17:00:00', '2020-12-22 18:00:00', 10),
(5, 'burger', 'descriptiiiiiiiiiion', '2020-12-25 08:00:00', '2020-12-25 10:00:00', 10),
(6, 'Cuisine', 'Piraterie', '2020-12-21 16:00:00', '2020-12-21 18:00:00', 9),
(7, 'test', 'test', '2020-12-21 17:00:00', '2020-12-23 18:00:00', 9),
(8, 'test', 'teset', '2020-12-21 08:00:00', '2020-12-21 10:00:00', 9),
(9, 'test', 'teset', '2020-12-21 08:00:00', '2020-12-21 10:00:00', 9),
(10, 'test', 'yo 2h', '2020-12-24 10:00:00', '2020-12-24 12:00:00', 9),
(11, 'test', 'testttttttttt', '2020-12-25 14:00:00', '2020-12-25 16:00:00', 9),
(12, 'test', 'testttttttttt', '2020-12-25 15:00:00', '2020-12-25 16:00:00', 9),
(13, 'test', '2h', '2020-12-24 14:00:00', '2020-12-24 16:00:00', 9),
(14, 'test', '2h', '2020-12-24 15:00:00', '2020-12-24 16:00:00', 9),
(15, 'yooooooooooooooo', 'yooooooooooooooooooo', '2020-12-23 10:40:00', '2020-12-23 11:34:00', 9),
(16, 'test', 'test', '2020-12-21 11:00:00', '2020-12-21 12:00:00', 12);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'bapt', 'pass'),
(2, 'batman', 'joker'),
(3, 'toto', 'toto'),
(4, 'test', 'test'),
(5, 'yo', 'mdp'),
(6, 'Luffy', '$2y$10$Kqo818UW7rtvwmfk88XrFuyrl7LK5Qxs5f4qo5EEgJ/EVMxPpKjg2'),
(7, 'John', '$2y$10$dzm8joFH0kD8J47dJzYbzOEmGvPg1UuNXVK/9TA9cmZeVvtrbA336'),
(8, 'Chuck', '$2y$10$KnnxWwE2RHoKVVfu0X3mMOHCYKLIG2h6MIXmfelQDpqjkmP0xmKJu'),
(9, 'Sanji', '$2y$10$6U03638rUtNTG6WHHBtoMuio3/ZvTaS/GOiNdWPoENsSh9zzVPXUa'),
(10, 'Walter', '$2y$10$kWstkDax80cHj.YB6cHJIe54CZ8tZI4MFXeces1fbJvJ3CY5zbTxO'),
(11, 'Joker', '$2y$10$KAUcusd7ydiSmZBf3Qj8.OjPOSW3soVh4eO79cpHzmmO7DFpYEKo2'),
(12, 'Brook', '$2y$10$my9QxZJQzPPoILHoqTRIQ.eHoyZCSaiwls6FNqnf1zZWxacoPoy.W');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 02 avr. 2020 à 22:02
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `threejs`
--

-- --------------------------------------------------------

--
-- Structure de la table `configurations`
--

CREATE TABLE `configurations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `configurations`
--

INSERT INTO `configurations` (`id`, `user_id`, `code`, `value`) VALUES
(1, 1, 'EDITOR_THEME', 'night');

-- --------------------------------------------------------

--
-- Structure de la table `presentations`
--

CREATE TABLE `presentations` (
  `id` smallint(6) NOT NULL,
  `user_id` tinyint(4) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `presentations`
--

INSERT INTO `presentations` (`id`, `user_id`, `title`) VALUES
(29, 1, 'Bonjour'),
(30, 0, 'Working with Eloquent Without PHP'),
(31, 0, 'Working with Eloquent Without PHP'),
(32, 0, 'Working with Eloquent Without PHP'),
(33, 17, 'Working with Eloquent Without PHP'),
(34, 20, 'Working with Eloquent Without PHP');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(8) DEFAULT NULL,
  `password` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'Bertha', 'RZ'),
(3, 'Scott', 'XL'),
(4, 'Patrick', 'BB'),
(5, 'Odysseus', 'JG'),
(6, 'Erin', 'OM'),
(7, 'Palmer', 'IP'),
(8, 'TaShya', 'FH'),
(9, 'Noelani', 'TG'),
(10, 'Eric', 'RE'),
(11, 'Maggy', 'DN'),
(12, 'Mohammad', 'YL'),
(13, 'Olympia', 'PY'),
(14, 'Denton', 'II'),
(15, 'Nadine', 'AP'),
(16, 'Ocean', 'KO'),
(18, 'Kshiitj ', '$2y$1'),
(19, 'Kshiitj ', '$2y$1'),
(20, 'Kshiitj ', '$2y$1');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `configurations`
--
ALTER TABLE `configurations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `presentations`
--
ALTER TABLE `presentations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `configurations`
--
ALTER TABLE `configurations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `presentations`
--
ALTER TABLE `presentations`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

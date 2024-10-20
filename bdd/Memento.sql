-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : dim. 20 oct. 2024 à 22:13
-- Version du serveur : 8.0.35
-- Version de PHP : 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Memento`
--

-- --------------------------------------------------------

--
-- Structure de la table `Card`
--

CREATE TABLE `Card` (
  `id` int NOT NULL,
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Card`
--

INSERT INTO `Card` (`id`, `name`, `image`) VALUES
(1, '1', '1.png'),
(2, '2', '2.png'),
(3, '3', '3.png'),
(4, '4', '4.png'),
(5, '5', '5.png'),
(6, '6', '6.png'),
(7, '7', '7.png'),
(8, '8', '8.png'),
(9, '9', '9.png'),
(10, '10', '10.png'),
(11, '11', '11.png'),
(12, '12', '12.png'),
(13, 'back', 'back.png');

-- --------------------------------------------------------

--
-- Structure de la table `Game`
--

CREATE TABLE `Game` (
  `id` int NOT NULL,
  `nb_paire` int DEFAULT NULL,
  `nb_tour` int DEFAULT NULL,
  `user_id` int NOT NULL,
  `date` date NOT NULL,
  `is_finished` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Game`
--

INSERT INTO `Game` (`id`, `nb_paire`, `nb_tour`, `user_id`, `date`, `is_finished`) VALUES
(1, 3, NULL, 1, '2024-10-20', NULL),
(2, 3, NULL, 1, '2024-10-20', NULL),
(3, 3, NULL, 1, '2024-10-20', NULL),
(4, 3, NULL, 1, '2024-10-20', NULL),
(5, 3, NULL, 1, '2024-10-20', NULL),
(6, 3, NULL, 1, '2024-10-20', NULL),
(7, 3, NULL, 1, '2024-10-20', NULL),
(8, 3, NULL, 1, '2024-10-20', NULL),
(9, 3, NULL, 1, '2024-10-20', NULL),
(10, 3, NULL, 1, '2024-10-20', NULL),
(11, 3, NULL, 1, '2024-10-20', NULL),
(12, 3, NULL, 1, '2024-10-20', NULL),
(13, 3, NULL, 1, '2024-10-20', NULL),
(14, 3, NULL, 1, '2024-10-20', NULL),
(15, 3, NULL, 1, '2024-10-20', NULL),
(16, 3, NULL, 1, '2024-10-20', NULL),
(17, 3, NULL, 1, '2024-10-20', NULL),
(18, 3, NULL, 1, '2024-10-20', NULL),
(19, 3, NULL, 1, '2024-10-20', NULL),
(20, 3, NULL, 1, '2024-10-20', NULL),
(21, 3, NULL, 1, '2024-10-20', NULL),
(22, 3, NULL, 1, '2024-10-20', NULL),
(23, 3, NULL, 1, '2024-10-20', NULL),
(24, NULL, 11, 1, '2024-10-20', 1),
(25, NULL, 11, 1, '2024-10-20', 1),
(26, 3, NULL, 1, '2024-10-20', NULL),
(27, NULL, 6, 1, '2024-10-20', 1);

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE `User` (
  `id` int NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `User`
--

INSERT INTO `User` (`id`, `firstname`, `lastname`, `login`, `password`) VALUES
(1, 'toms', 'seleexct', 'tomSelect', 'Azerty1234/'),
(2, 'tomsy', 'seleexct2', 'tomSelect3', 'Azert123456/');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Card`
--
ALTER TABLE `Card`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Game`
--
ALTER TABLE `Game`
  ADD PRIMARY KEY (`id`),
  ADD KEY `winner_id` (`user_id`);

--
-- Index pour la table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Card`
--
ALTER TABLE `Card`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `Game`
--
ALTER TABLE `Game`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `User`
--
ALTER TABLE `User`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Game`
--
ALTER TABLE `Game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

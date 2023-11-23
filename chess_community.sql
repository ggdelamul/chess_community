-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 04 sep. 2023 à 10:56
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `chess_community`
--

-- --------------------------------------------------------

--
-- Structure de la table `blacklist`
--

CREATE TABLE `blacklist` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `date_attempt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `navigateur` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `blacklist`
--

INSERT INTO `blacklist` (`id`, `ip`, `date_attempt`, `navigateur`) VALUES
(1, '127.0.0.1', '2023-09-04 07:37:22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/117.0'),
(2, '127.0.0.1', '2023-09-04 07:38:55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/117.0'),
(3, '127.0.0.1', '2023-09-04 07:40:57', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/117.0'),
(4, '127.0.0.1', '2023-09-04 08:25:46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/117.0'),
(5, '127.0.0.1', '2023-09-04 08:34:37', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/117.0'),
(6, '127.0.0.1', '2023-09-04 08:36:38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/117.0'),
(7, '127.0.0.1', '2023-09-04 08:38:23', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/117.0'),
(8, '127.0.0.1', '2023-09-04 08:40:47', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/117.0'),
(9, '127.0.0.1', '2023-09-04 08:41:58', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/117.0'),
(10, '127.0.0.1', '2023-09-04 08:43:17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/117.0'),
(11, '127.0.0.1', '2023-09-04 08:45:04', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/117.0'),
(12, '127.0.0.1', '2023-09-04 08:46:11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/117.0'),
(13, '127.0.0.1', '2023-09-04 08:47:07', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/117.0'),
(14, '127.0.0.1', '2023-09-04 08:48:53', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/117.0');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date_publication` datetime DEFAULT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_statut` int(11) NOT NULL,
  `id_partie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `comment`, `date_publication`, `id_utilisateur`, `id_statut`, `id_partie`) VALUES
(22, '\r\n                jhjgjhg        ', '2023-09-04 10:42:12', 79, 1, 42);

-- --------------------------------------------------------

--
-- Structure de la table `partie`
--

CREATE TABLE `partie` (
  `id` int(11) NOT NULL,
  `couleur_joue` varchar(10) DEFAULT NULL,
  `elo_utilisateur` int(11) DEFAULT NULL,
  `elo_adversaire` int(11) DEFAULT NULL,
  `file_path` varchar(250) DEFAULT NULL,
  `date_de_publication` date DEFAULT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `partie`
--

INSERT INTO `partie` (`id`, `couleur_joue`, `elo_utilisateur`, `elo_adversaire`, `file_path`, `date_de_publication`, `id_utilisateur`, `id_statut`) VALUES
(38, 'blanc', 1000, 1200, 'partie/FabianoCaruana_vs_JoseRafaelGasconDelNogal_2023.01.03.pgn', '2023-08-23', 53, 2),
(42, 'blanc', 900, 900, 'partie/AlexanderAlekhine_vs_LupiFrancesco_1946...pgn', '2023-08-31', 78, 2);

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE `statut` (
  `id` int(11) NOT NULL,
  `nom_statut` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`id`, `nom_statut`) VALUES
(1, 'en attente '),
(2, 'valide');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `mail` varchar(200) DEFAULT NULL,
  `pseudo` varchar(30) DEFAULT NULL,
  `mot_de_passe` varchar(255) DEFAULT NULL,
  `role_utilisateur` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `mail`, `pseudo`, `mot_de_passe`, `role_utilisateur`) VALUES
(53, 'projeremylegendre@gmail.com', 'admingg', '56d9b79c2c7974daec89e814ac15f6f1776e888528295f3c4333ce44b8099e9f', 'admin'),
(67, 'gg@gmail.com', 'gg', 'cbd3cfb9b9f51bbbfbf08759e243f5b3519cbf6ecc219ee95fe7c667e32c0a8d', 'inscrit'),
(77, 're@re.com', 're', '3ac1ecbd2220c6757eb9f289fee88c4068c6791c5b0affef7644e77adfc97b45', 'inscrit'),
(78, 'testP@gmail.com', 'testP2', '0a7cc3488e6f1d2c2b9b4137efae76098d65968b62213865c44d97cb34d0791b', 'inscrit'),
(79, 'testsecu@gmail.com', 'testsecu', 'b2b3e9a3dfb026a974c0986b5405df189292c892d9d11bad6a34f02ad1f8cfef', 'inscrit');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `blacklist`
--
ALTER TABLE `blacklist`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_statut` (`id_statut`),
  ADD KEY `id_partie` (`id_partie`);

--
-- Index pour la table `partie`
--
ALTER TABLE `partie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_statut` (`id_statut`);

--
-- Index pour la table `statut`
--
ALTER TABLE `statut`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `blacklist`
--
ALTER TABLE `blacklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `partie`
--
ALTER TABLE `partie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `statut`
--
ALTER TABLE `statut`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`id_statut`) REFERENCES `statut` (`id`),
  ADD CONSTRAINT `commentaire_ibfk_3` FOREIGN KEY (`id_partie`) REFERENCES `partie` (`id`);

--
-- Contraintes pour la table `partie`
--
ALTER TABLE `partie`
  ADD CONSTRAINT `partie_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `partie_ibfk_2` FOREIGN KEY (`id_statut`) REFERENCES `statut` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

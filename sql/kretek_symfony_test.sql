-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 09 avr. 2022 à 16:56
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `kretek_symfony_test`
--
CREATE DATABASE IF NOT EXISTS `kretek_symfony_test` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `kretek_symfony_test`;

-- --------------------------------------------------------

--
-- Structure de la table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `invoice_date` date DEFAULT NULL,
  `invoice_number` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `invoice`
--

INSERT INTO `invoice` (`id`, `invoice_date`, `invoice_number`, `customer_id`) VALUES
(1, '2022-04-04', 1, 1),
(2, '2022-04-13', 12, 12),
(3, '2022-04-25', 12, 12),
(4, '2022-07-06', 2, 9),
(5, '2022-06-30', 9, 8),
(6, '2022-06-28', 9, 8),
(7, '2022-04-22', 9, 8),
(8, '2022-06-30', 1, 1),
(9, '2022-04-02', 1, 1),
(10, '2022-06-10', 1, 1),
(12, '2022-06-10', 1, 1),
(13, '2022-04-02', 1, 1),
(14, '2022-03-30', 2, 2),
(15, '2022-03-30', 2, 2),
(16, '2022-03-30', 2, 2),
(17, '2022-04-14', 1, 1),
(18, '2022-04-29', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `invoice_line`
--

CREATE TABLE `invoice_line` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `quantity` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `vat_amount` double DEFAULT NULL,
  `total_vat` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `invoice_line`
--

INSERT INTO `invoice_line` (`id`, `invoice_id`, `description`, `quantity`, `amount`, `vat_amount`, `total_vat`) VALUES
(1, 12, 'Pencil', 10, 100, 30, 1300),
(2, 13, 'Car', 1, 100000, 20000, 120000),
(3, 18, 'Phone', 1, 2400, 400, 2800);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `invoice_line`
--
ALTER TABLE `invoice_line`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D3D1D6932989F1FD` (`invoice_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `invoice_line`
--
ALTER TABLE `invoice_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `invoice_line`
--
ALTER TABLE `invoice_line`
  ADD CONSTRAINT `FK_D3D1D6932989F1FD` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 11 nov. 2023 à 17:38
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestion_cacao`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `prix` double NOT NULL,
  `statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `designation`, `prix`, `statut`) VALUES
(1, 'cacao', 12, 0),
(2, 'cafe', 100, 0),
(3, 'cafe', 100, 0),
(4, 'k', 1, 0),
(5, '', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `postnom` varchar(50) NOT NULL,
  `adress` text NOT NULL,
  `telephone` text NOT NULL,
  `statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `postnom`, `adress`, `telephone`, `statut`) VALUES
(1, 'rachuu', 'sergine', 'kambali', '0987645367', 0),
(2, 'Gad', 'kombi', 'kambali', '0987645367', 0),
(3, 'sergine', 'sikuli', 'njiapanda', '0987645367', 0);

-- --------------------------------------------------------

--
-- Structure de la table `entree`
--

CREATE TABLE `entree` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `article` int(11) NOT NULL,
  `quantite` double NOT NULL,
  `founisseur` int(11) NOT NULL,
  `utilisateur` int(11) NOT NULL,
  `statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `entree`
--

INSERT INTO `entree` (`id`, `date`, `article`, `quantite`, `founisseur`, `utilisateur`, `statut`) VALUES
(1, '2023-10-09', 1, 11, 7, 1, 0),
(2, '2023-10-09', 1, 13, 9, 2, 0),
(3, '2023-10-09', 1, 43, 10, 3, 0),
(4, '2023-10-10', 1, 100, 9, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `postnom` varchar(50) NOT NULL,
  `adress` text NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id`, `nom`, `postnom`, `adress`, `telephone`, `statut`) VALUES
(7, 'julien', 'kilima', 'malkia', '0987645367', 0),
(8, 'Glad', 'kombi', 'njiapanda', '0997019883', 0),
(9, 'Albert', 'alba', 'malera', '0987645367', 0),
(10, 'Providence', 'glo', 'vungi', '0997019883', 0),
(11, 'SERAPHINE', 'Sera', 'lusando', '0987645367', 0);

-- --------------------------------------------------------

--
-- Structure de la table `planteur`
--

CREATE TABLE `planteur` (
  `idplan` int(11) NOT NULL,
  `code` text NOT NULL,
  `nom` text NOT NULL,
  `postnom` text NOT NULL,
  `prenom` text NOT NULL,
  `photo` text NOT NULL,
  `village` int(11) NOT NULL,
  `telephone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `planteur`
--

INSERT INTO `planteur` (`idplan`, `code`, `nom`, `postnom`, `prenom`, `photo`, `village`, `telephone`) VALUES
(1, '1kIpKAmbM', 'Kambale', 'Kamala', 'Albert', 'predication admin.jpg', 5, '0977139499');

-- --------------------------------------------------------

--
-- Structure de la table `pret`
--

CREATE TABLE `pret` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `fourniseur` int(11) NOT NULL,
  `montant` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pret`
--

INSERT INTO `pret` (`id`, `date`, `fourniseur`, `montant`) VALUES
(1, '2023-10-08', 7, 400),
(2, '2023-10-09', 8, 200),
(3, '2023-10-10', 7, 234);

-- --------------------------------------------------------

--
-- Structure de la table `prets`
--

CREATE TABLE `prets` (
  `idpre` int(11) NOT NULL,
  `datepret` date NOT NULL,
  `planteurs` int(11) NOT NULL,
  `quantite` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `prets`
--

INSERT INTO `prets` (`idpre`, `datepret`, `planteurs`, `quantite`) VALUES
(1, '2023-11-06', 1, 10);

-- --------------------------------------------------------

--
-- Structure de la table `sortie`
--

CREATE TABLE `sortie` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `article` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  `utilisateur` int(11) NOT NULL,
  `statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sortie`
--

INSERT INTO `sortie` (`id`, `date`, `article`, `quantite`, `client`, `utilisateur`, `statut`) VALUES
(1, '2023-10-11', 1, 15, 1, 1, 0),
(2, '2023-10-17', 1, 4, 1, 1, 0),
(4, '2023-10-17', 1, 5, 1, 2, 0),
(5, '2023-10-17', 1, 1, 1, 2, 0),
(6, '2023-10-17', 1, 2, 1, 2, 0),
(7, '2023-10-17', 1, 1, 1, 2, 0),
(8, '2023-10-17', 1, 1, 1, 2, 0),
(9, '2023-10-17', 1, 1, 1, 2, 0),
(10, '2023-10-17', 1, 2, 1, 2, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `fonction` varchar(50) NOT NULL,
  `psw` text NOT NULL,
  `statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `fonction`, `psw`, `statut`) VALUES
(1, 'Site Butembo', 'Site', '1234', 0),
(2, 'Site Beni', 'Site', '1234', 0),
(3, 'Site wicha', 'Site', '1234', 0),
(4, 'PDG', 'admin', '0202', 0),
(5, 'Site GOMA', 'Site', '1234', 0);

-- --------------------------------------------------------

--
-- Structure de la table `village`
--

CREATE TABLE `village` (
  `idvi` int(11) NOT NULL,
  `nomvillage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `village`
--

INSERT INTO `village` (`idvi`, `nomvillage`) VALUES
(1, 'maboya'),
(4, 'nnn'),
(5, 'kipese');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `entree`
--
ALTER TABLE `entree`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `planteur`
--
ALTER TABLE `planteur`
  ADD PRIMARY KEY (`idplan`);

--
-- Index pour la table `pret`
--
ALTER TABLE `pret`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `prets`
--
ALTER TABLE `prets`
  ADD PRIMARY KEY (`idpre`);

--
-- Index pour la table `sortie`
--
ALTER TABLE `sortie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `village`
--
ALTER TABLE `village`
  ADD PRIMARY KEY (`idvi`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `entree`
--
ALTER TABLE `entree`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `planteur`
--
ALTER TABLE `planteur`
  MODIFY `idplan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `pret`
--
ALTER TABLE `pret`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `prets`
--
ALTER TABLE `prets`
  MODIFY `idpre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `sortie`
--
ALTER TABLE `sortie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `village`
--
ALTER TABLE `village`
  MODIFY `idvi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

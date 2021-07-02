-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 02 juil. 2021 à 17:18
-- Version du serveur :  5.7.31
-- Version de PHP : 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `aid` int(100) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `created` varchar(250) NOT NULL,
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`aid`, `name`, `email`, `password`, `created`, `status`) VALUES
(1, 'admin', 'admin@outlook.com', '0c7540eb7e65b553ec1ba6b20de79608', '2021-03-24', 1);

-- --------------------------------------------------------

--
-- Structure de la table `conge`
--

CREATE TABLE `conge` (
  `cid` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `datedeb` varchar(250) NOT NULL,
  `datefin` varchar(250) NOT NULL,
  `cause` varchar(250) NOT NULL,
  `reponse` varchar(250) NOT NULL,
  `created` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `conge`
--

INSERT INTO `conge` (`cid`, `pid`, `datedeb`, `datefin`, `cause`, `reponse`, `created`) VALUES
(1, 6, '2021-06-01', '2021-06-05', 'maladie', '0', '2021-06-25'),
(2, 6, '2021-06-01', '2021-06-30', 'vacances', '2', '2021-06-25'),
(3, 6, '2021-06-01', '2021-06-26', 'aaa', '1', '2021-06-30');

-- --------------------------------------------------------

--
-- Structure de la table `ds`
--

CREATE TABLE `ds` (
  `dsid` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `periode` varchar(250) NOT NULL,
  `cause` varchar(250) NOT NULL,
  `reponse` varchar(250) NOT NULL,
  `created` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ds`
--

INSERT INTO `ds` (`dsid`, `pid`, `periode`, `cause`, `reponse`, `created`) VALUES
(1, 6, '15', 'tttaaa', '0', '2021-06-30'),
(2, 7, '2020-06-12', 'annulation', '2', '2020-06-12');

-- --------------------------------------------------------

--
-- Structure de la table `fdp`
--

CREATE TABLE `fdp` (
  `fpid` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `periode` varchar(250) NOT NULL,
  `reponse` varchar(250) NOT NULL,
  `created` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fdp`
--

INSERT INTO `fdp` (`fpid`, `pid`, `periode`, `reponse`, `created`) VALUES
(2, 6, '2021-06-05 vers 2021-06-12', '2', '2021-06-25'),
(3, 6, '2021-06-10 vers 2021-06-20', '1', '2021-06-30');

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

CREATE TABLE `personnel` (
  `pid` int(100) NOT NULL,
  `matricule` varchar(250) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `motdepasse` varchar(250) NOT NULL,
  `datenaissance` varchar(250) NOT NULL,
  `adresse` varchar(250) NOT NULL,
  `dateembauche` varchar(250) NOT NULL,
  `poste` varchar(250) NOT NULL,
  `creation` varchar(250) NOT NULL,
  `statut` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `personnel`
--

INSERT INTO `personnel` (`pid`, `matricule`, `nom`, `prenom`, `email`, `motdepasse`, `datenaissance`, `adresse`, `dateembauche`, `poste`, `creation`, `statut`) VALUES
(6, '123', 'hammas', 'rafik', 'rafik.hammas@outlook.com', '123456', '2021-06-02', 'number 42', '2021-06-24', 'pdg', '2021-06-04', 1),
(7, '124', 'raf', 'raf', 'raf', '123456', '2020-06-12', 'tunis', '2020-06-12', 'gestionnaire', '2020-06-12', 1);

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

CREATE TABLE `rdv` (
  `rdvid` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `sujet` varchar(250) NOT NULL,
  `reponse` varchar(250) NOT NULL,
  `created` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `rdv`
--

INSERT INTO `rdv` (`rdvid`, `pid`, `sujet`, `reponse`, `created`) VALUES
(1, 6, 'annulation de contrat', '1', '2021-06-25'),
(2, 6, 'annulation ', '1', '2021-06-30');

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

CREATE TABLE `reclamation` (
  `reclamationid` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `cause` varchar(250) NOT NULL,
  `reponse` varchar(250) NOT NULL,
  `created` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reclamation`
--

INSERT INTO `reclamation` (`reclamationid`, `pid`, `cause`, `reponse`, `created`) VALUES
(1, 6, 'annulation de congÃ© ', '2', '2021-06-30'),
(2, 7, 'test', '2', 'reclamatio');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`aid`);

--
-- Index pour la table `conge`
--
ALTER TABLE `conge`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `fk_conge_personnel` (`pid`);

--
-- Index pour la table `ds`
--
ALTER TABLE `ds`
  ADD PRIMARY KEY (`dsid`),
  ADD KEY `fk_ds_personnel` (`pid`);

--
-- Index pour la table `fdp`
--
ALTER TABLE `fdp`
  ADD PRIMARY KEY (`fpid`),
  ADD KEY `fk_fdp_personnel` (`pid`);

--
-- Index pour la table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `matricule` (`matricule`);

--
-- Index pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD PRIMARY KEY (`rdvid`),
  ADD KEY `fk_rdv_personnel` (`pid`);

--
-- Index pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`reclamationid`),
  ADD KEY `fk_reclamation_personnel` (`pid`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `aid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `conge`
--
ALTER TABLE `conge`
  MODIFY `cid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `ds`
--
ALTER TABLE `ds`
  MODIFY `dsid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `fdp`
--
ALTER TABLE `fdp`
  MODIFY `fpid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `pid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `rdv`
--
ALTER TABLE `rdv`
  MODIFY `rdvid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `reclamationid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `conge`
--
ALTER TABLE `conge`
  ADD CONSTRAINT `fk_conge_personnel` FOREIGN KEY (`pid`) REFERENCES `personnel` (`pid`);

--
-- Contraintes pour la table `ds`
--
ALTER TABLE `ds`
  ADD CONSTRAINT `fk_ds_personnel` FOREIGN KEY (`pid`) REFERENCES `personnel` (`pid`);

--
-- Contraintes pour la table `fdp`
--
ALTER TABLE `fdp`
  ADD CONSTRAINT `fk_fdp_personnel` FOREIGN KEY (`pid`) REFERENCES `personnel` (`pid`);

--
-- Contraintes pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD CONSTRAINT `fk_rdv_personnel` FOREIGN KEY (`pid`) REFERENCES `personnel` (`pid`);

--
-- Contraintes pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD CONSTRAINT `fk_reclamation_personnel` FOREIGN KEY (`pid`) REFERENCES `personnel` (`pid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

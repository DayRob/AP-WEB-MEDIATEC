-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 10 mars 2022 à 16:30
-- Version du serveur :  10.1.35-MariaDB
-- Version de PHP :  7.1.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mediateq`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `nbExemplaire` int(11) DEFAULT NULL,
  `dateCommande` date DEFAULT NULL,
  `montant` double DEFAULT NULL,
  `idDocument` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `descripteur`
--

CREATE TABLE `descripteur` (
  `id` varchar(5) NOT NULL,
  `libelle` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `descripteur`
--

INSERT INTO `descripteur` (`id`, `libelle`) VALUES
('00001', 'Presse économique'),
('00002', 'Presse culturelle'),
('00003', 'Presse sportive'),
('00004', 'Presse loisir'),
('00005', 'Presse Actualités'),
('10000', 'Humour'),
('10001', 'Bande dessinée'),
('10002', 'Science Fiction'),
('10003', 'Biographie'),
('10004', 'Historique'),
('10006', 'Roman'),
('10007', 'Aventures'),
('10008', 'Essai'),
('10009', 'Documentaire'),
('10010', 'Technique'),
('10011', 'Voyages'),
('10012', 'Drame'),
('10013', 'Comédie'),
('10014', 'Policier');

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

CREATE TABLE `document` (
  `id` varchar(10) NOT NULL,
  `titre` varchar(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `commandeEnCours` int(11) DEFAULT NULL,
  `idPublic` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `document`
--

INSERT INTO `document` (`id`, `titre`, `image`, `commandeEnCours`, `idPublic`) VALUES
('00001', 'Quand sort la recluse', '', NULL, '00002'),
('00002', 'Un pays à l\'aube', '', NULL, '00002'),
('00003', 'Et je danse aussi', '', NULL, '00003'),
('00004', 'L\'armée furieuse', '', NULL, '00002'),
('00005', 'Les anonymes', '', NULL, '00002'),
('00006', 'La marque jaune', '', NULL, '00003'),
('00007', 'Dans les coulisses du musée', 'lien vers l\'image de c elivre', NULL, '00003'),
('00008', 'Histoire du juif errant', 'lien', NULL, '00002'),
('00009', 'Pars vite et reviens tard', '', 0, '00002'),
('00010', 'Le vestibule des causes perdues', '', 0, '00002'),
('00011', 'L\'ile des oublies', '', 0, '00002'),
('00012', 'La souris bleue', '', 0, '00002'),
('00013', 'Sacré Pêre Noël', '', 0, '00002'),
('00014', 'Mauvaise étoile', '', 0, '00002'),
('00015', 'La confrérie des téméraires', '', 0, '00002'),
('00016', 'Le butin du requin', '', 0, '00002'),
('00017', 'Catastrophes au Brésil', '', 0, '00002'),
('00018', 'Le Routard - Maroc', '', 0, '00002'),
('00019', 'Guide Vert - Iles Canaries', '', 0, '00002'),
('00020', 'Guide Vert - Irlande', '', 0, '00002'),
('00021', 'Les déferlantes', '', 0, '00002'),
('00022', 'Une part de Ciel', '', 0, '00002'),
('00023', 'Le secret du janissaire', '', 0, '00002'),
('00024', 'Pavillon noir', '', 0, '00002'),
('00025', 'L\'archipel du danger', '', 0, '00002');

-- --------------------------------------------------------

--
-- Structure de la table `dvd`
--

CREATE TABLE `dvd` (
  `idDocument` varchar(10) NOT NULL,
  `synopsis` varchar(100) DEFAULT NULL,
  `réalisateur` varchar(20) DEFAULT NULL,
  `duree` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `est_décrit_par_2`
--

CREATE TABLE `est_décrit_par_2` (
  `idDocument` varchar(10) NOT NULL,
  `idDescripteur` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

CREATE TABLE `etat` (
  `id` char(5) NOT NULL,
  `libelle` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etat`
--

INSERT INTO `etat` (`id`, `libelle`) VALUES
('00001', 'neuf'),
('00002', 'usagé'),
('00003', 'détérioré'),
('00004', 'inutilisable');

-- --------------------------------------------------------

--
-- Structure de la table `exemplaire`
--

CREATE TABLE `exemplaire` (
  `idDocument` varchar(10) NOT NULL,
  `numero` varchar(50) NOT NULL,
  `dateAchat` date DEFAULT NULL,
  `idRayon` char(5) NOT NULL,
  `idEtat` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `idDocument` varchar(10) NOT NULL,
  `ISBN` char(13) DEFAULT NULL,
  `auteur` varchar(20) DEFAULT NULL,
  `collection` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`idDocument`, `ISBN`, `auteur`, `collection`) VALUES
('00001', '1234569877896', 'Fred Vargas', 'Commissaire Adamsberg'),
('00002', '1236547896541', 'Dennis Lehanne', ''),
('00003', '6541236987410', 'Anne-Laure Bondoux', ''),
('00004', '3214569874123', 'Fred Vargas', 'Commissaire Adamsberg'),
('00005', '3214563214563', 'RJ Ellory', ''),
('00006', '3213213211232', 'Edgar P. Jacobs', 'Blake et Mortimer'),
('00007', '6541236987541', 'Kate Atkinson', ''),
('00008', '1236987456321', 'Jean d\'Ormesson', ''),
('00009', '3,21E+12', 'Fred Vargas', 'Commissaire Adamsberg'),
('00010', '3,21E+12', 'Manon Moreau', ''),
('00011', '3,21E+12', 'Victoria Hislop', ''),
('00012', '3,21E+12', 'Kate Atkinson', ''),
('00013', '3,21E+12', 'Raymond Briggs', ''),
('00014', '3,21E+12', 'RJ Ellory', ''),
('00015', '3,21E+12', 'Floriane Turmeau', ''),
('00016', '3,21E+12', 'Julian Press', ''),
('00017', '3,21E+12', 'Philippe Masson', ''),
('00018', '3,21E+12', '', 'Guide du Routard'),
('00019', '3,21E+12', '', 'Guide Vert'),
('00020', '3,21E+12', '', 'Guide Vert'),
('00021', '3,21E+12', 'Claudie Gallay', ''),
('00022', '3,21E+12', 'Claudie Gallay', ''),
('00023', '3,21E+12', 'Ayrolles - Masbou', 'De cape et de crocs'),
('00024', '3,21E+12', 'Ayrolles - Masbou', 'De cape et de crocs'),
('00025', '3,21E+12', 'Ayrolles - Masbou', 'De cape et de crocs');

-- --------------------------------------------------------

--
-- Structure de la table `parution`
--

CREATE TABLE `parution` (
  `idRevue` char(5) NOT NULL,
  `numero` varchar(5) NOT NULL,
  `dateParution` date DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `idEtat` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `parution`
--

INSERT INTO `parution` (`idRevue`, `numero`, `dateParution`, `photo`, `idEtat`) VALUES
('10001', '154', '2021-07-01', NULL, '00001'),
('10001', '155', '2021-08-01', NULL, '00001'),
('10001', '156', '2021-09-01', NULL, '00001'),
('10001', '157', '2021-10-01', NULL, '00001'),
('10001', '158', '2021-11-01', NULL, '00001'),
('10001', '159', '2021-12-01', NULL, '00001'),
('10002', '2154', '2021-07-01', 'lien vers la photo de juillet 2021', '00001'),
('10002', '2155', '2021-08-01', NULL, '00001'),
('10002', '2156', '2021-09-01', NULL, '00001'),
('10002', '2157', '2021-10-01', NULL, '00001'),
('10002', '2158', '2021-11-01', NULL, '00001'),
('10002', '2159', '2021-12-01', NULL, '00001'),
('10003', '215', '2021-02-01', NULL, '00001'),
('10003', '216', '2021-03-01', NULL, '00001'),
('10003', '217', '2021-04-01', NULL, '00001'),
('10003', '218', '2021-05-01', NULL, '00001'),
('10003', '219', '2021-06-01', NULL, '00001'),
('10003', '220', '2021-07-01', NULL, '00001'),
('10005', '3215', '2021-11-20', NULL, '00001'),
('10005', '3216', '2021-11-21', NULL, '00001'),
('10005', '3217', '2021-11-22', NULL, '00001'),
('10005', '3218', '2021-11-23', NULL, '00001'),
('10005', '3219', '2021-11-24', NULL, '00001'),
('10005', '3220', '2021-11-25', NULL, '00001');

-- --------------------------------------------------------

--
-- Structure de la table `public`
--

CREATE TABLE `public` (
  `id` varchar(5) NOT NULL,
  `libelle` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `public`
--

INSERT INTO `public` (`id`, `libelle`) VALUES
('00001', 'Jeunesse'),
('00002', 'Adultes'),
('00003', 'Tous publics'),
('00004', 'Ados');

-- --------------------------------------------------------

--
-- Structure de la table `rayon`
--

CREATE TABLE `rayon` (
  `id` char(5) NOT NULL,
  `libelle` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `revue`
--

CREATE TABLE `revue` (
  `id` char(5) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `empruntable` char(1) DEFAULT NULL,
  `periodicite` varchar(2) DEFAULT NULL,
  `delai_miseadispo` int(11) DEFAULT NULL,
  `dateFinAbonnement` date DEFAULT NULL,
  `idDescripteur` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `revue`
--

INSERT INTO `revue` (`id`, `titre`, `empruntable`, `periodicite`, `delai_miseadispo`, `dateFinAbonnement`, `idDescripteur`) VALUES
('10001', 'Arts Magazine', 'O', 'MS', 52, '2022-03-31', '00002'),
('10002', 'Alternatives Economiques', 'O', 'HB', 52, '2022-04-30', '00001'),
('10003', 'Challenges', 'O', 'HB', 26, '2022-02-28', '00001'),
('10004', 'Rock and Folk', 'O', 'MS', 52, '2022-10-31', '00002'),
('10005', 'Les Echos', 'N', 'QT', 5, '2022-12-31', '00001'),
('10006', 'L\'Equipe', 'N', 'QT', 5, '2022-01-31', '00003'),
('10007', 'Telerama', 'O', 'HB', 26, '2022-01-31', '00002'),
('10008', 'L\'Obs', 'O', 'HB', 26, '2022-01-31', '00005'),
('10009', 'Le Monde', 'N', 'QT', 5, '2022-01-31', '00005'),
('10010', 'L\'Equipe Magazine', 'O', 'HB', 12, '2022-01-31', '00003'),
('10011', 'Geo', 'O', 'MS', 52, '2022-01-31', '00002');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_1` (`idDocument`);

--
-- Index pour la table `descripteur`
--
ALTER TABLE `descripteur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_1` (`idPublic`);

--
-- Index pour la table `dvd`
--
ALTER TABLE `dvd`
  ADD PRIMARY KEY (`idDocument`);

--
-- Index pour la table `est_décrit_par_2`
--
ALTER TABLE `est_décrit_par_2`
  ADD PRIMARY KEY (`idDocument`,`idDescripteur`),
  ADD KEY `id_1` (`idDescripteur`);

--
-- Index pour la table `etat`
--
ALTER TABLE `etat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `exemplaire`
--
ALTER TABLE `exemplaire`
  ADD PRIMARY KEY (`idDocument`,`numero`),
  ADD KEY `id` (`idRayon`),
  ADD KEY `id_1` (`idEtat`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`idDocument`);

--
-- Index pour la table `parution`
--
ALTER TABLE `parution`
  ADD PRIMARY KEY (`idRevue`,`numero`),
  ADD KEY `id` (`idEtat`);

--
-- Index pour la table `public`
--
ALTER TABLE `public`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rayon`
--
ALTER TABLE `rayon`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `revue`
--
ALTER TABLE `revue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_1` (`idDescripteur`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`idDocument`) REFERENCES `document` (`id`);

--
-- Contraintes pour la table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `document_ibfk_1` FOREIGN KEY (`idPublic`) REFERENCES `public` (`id`);

--
-- Contraintes pour la table `dvd`
--
ALTER TABLE `dvd`
  ADD CONSTRAINT `dvd_ibfk_1` FOREIGN KEY (`idDocument`) REFERENCES `document` (`id`);

--
-- Contraintes pour la table `est_décrit_par_2`
--
ALTER TABLE `est_décrit_par_2`
  ADD CONSTRAINT `est_décrit_par_2_ibfk_1` FOREIGN KEY (`idDocument`) REFERENCES `document` (`id`),
  ADD CONSTRAINT `est_décrit_par_2_ibfk_2` FOREIGN KEY (`idDescripteur`) REFERENCES `descripteur` (`id`);

--
-- Contraintes pour la table `exemplaire`
--
ALTER TABLE `exemplaire`
  ADD CONSTRAINT `exemplaire_ibfk_1` FOREIGN KEY (`idDocument`) REFERENCES `document` (`id`),
  ADD CONSTRAINT `exemplaire_ibfk_2` FOREIGN KEY (`idRayon`) REFERENCES `rayon` (`id`),
  ADD CONSTRAINT `exemplaire_ibfk_3` FOREIGN KEY (`idEtat`) REFERENCES `etat` (`id`);

--
-- Contraintes pour la table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `livre_ibfk_1` FOREIGN KEY (`idDocument`) REFERENCES `document` (`id`);

--
-- Contraintes pour la table `parution`
--
ALTER TABLE `parution`
  ADD CONSTRAINT `parution_ibfk_1` FOREIGN KEY (`idRevue`) REFERENCES `revue` (`id`),
  ADD CONSTRAINT `parution_ibfk_2` FOREIGN KEY (`idEtat`) REFERENCES `etat` (`id`);

--
-- Contraintes pour la table `revue`
--
ALTER TABLE `revue`
  ADD CONSTRAINT `revue_ibfk_2` FOREIGN KEY (`idDescripteur`) REFERENCES `descripteur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

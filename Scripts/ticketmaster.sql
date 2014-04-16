-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 04 Avril 2014 à 14:45
-- Version du serveur :  5.6.12-log
-- Version de PHP :  5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ticketmaster`
--

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE IF NOT EXISTS `employe` (
  `idEmploye` int(11) NOT NULL AUTO_INCREMENT,
  `admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idEmploye`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `employe`
--

INSERT INTO `employe` (`idEmploye`, `admin`) VALUES
(1, 1),
(2, 1),
(3, 0),
(4, 1),
(5, 0),
(6, 0),
(7, 0),
(12, 0);

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE IF NOT EXISTS `evenement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateDebutVente` datetime DEFAULT NULL,
  `dateFinVente` datetime DEFAULT NULL,
  `dateDebutEvenement` datetime DEFAULT NULL,
  `dateFinEvenement` datetime DEFAULT NULL,
  `libelle` varchar(250) DEFAULT NULL,
  `idEmploye` int(11) NOT NULL,
  `idSalle` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `evenement_employe` (`idEmploye`),
  KEY `idSalle` (`idSalle`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `evenement`
--

INSERT INTO `evenement` (`id`, `dateDebutVente`, `dateFinVente`, `dateDebutEvenement`, `dateFinEvenement`, `libelle`, `idEmploye`, `idSalle`) VALUES
(1, '2014-04-02 00:00:00', '2014-04-04 00:00:00', '2014-04-05 00:00:00', '2014-04-05 00:00:00', 'Concert SuperZik', 1, 6),
(2, '2014-04-07 00:00:00', '2014-04-11 00:00:00', '2014-04-19 00:00:00', '2014-04-19 00:00:00', 'Theatre Moliere', 1, 6),
(3, '2014-05-19 00:00:00', '2014-05-23 00:00:00', '2014-05-24 00:00:00', '2014-05-24 00:00:00', 'Gospel BelleVoix', 5, 7),
(5, '2014-04-07 00:00:00', '2014-04-11 00:00:00', '2014-04-12 00:00:00', '2014-04-06 00:00:00', 'Concert Rock''n Rolla', 1, 7);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE IF NOT EXISTS `personne` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `adresseMail` varchar(250) DEFAULT NULL,
  `telephone` varchar(10) DEFAULT NULL,
  `login` varchar(100) NOT NULL,
  `motDePasse` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `personne`
--

INSERT INTO `personne` (`id`, `nom`, `prenom`, `adresseMail`, `telephone`, `login`, `motDePasse`) VALUES
(1, 'Morane', 'Bob', 'bob.morane@free.fr', '0556304050', 'bob33', 'azertyuiop'),
(2, 'jacques', 'delatour', 'jacques@gmail.com', '0557423892', 'jacques_de', 'root'),
(3, 'bon', 'jean', 'jean.bon@free.fr', '0666543433', 'jean33', 'azertyuiop'),
(4, 'defer', 'xavier', 'xaxa@free.fr', '0544444444', 'xdefer', '4dd7b59d5d2fddfc4294c145784a3fb7aab50c29bb16e5aa2f6113152519a51f'),
(5, '', '', '', '', '', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855'),
(6, '', '', '', '', '', '4e07408562bedb8b60ce05c1decfe3ad16b72230967de01f640b7e4729b49fce'),
(7, '', '', '', '', '', 'a871c47a7f48a12b38a994e48a9659fab5d6376f3dbce37559bcb617efe8662d'),
(12, '', 'gfg', '', '', '', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE IF NOT EXISTS `salle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `salle`
--

INSERT INTO `salle` (`id`, `libelle`) VALUES
(6, 'salle 3'),
(7, 'salle 4'),
(8, 'salle 2'),
(9, 'salle 1'),
(10, 'salle 5');

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(250) DEFAULT NULL,
  `libelle` varchar(250) DEFAULT NULL,
  `etat` tinyint(1) DEFAULT NULL,
  `dateValidation` datetime DEFAULT NULL,
  `idUtilisateur` int(11) DEFAULT NULL,
  `idEvenement` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ticket_utilisateur` (`idUtilisateur`),
  KEY `ticket_evenement` (`idEvenement`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `ticket`
--

INSERT INTO `ticket` (`id`, `numero`, `libelle`, `etat`, `dateValidation`, `idUtilisateur`, `idEvenement`) VALUES
(1, 'N0001', 'place 32', 1, '2014-04-03 00:00:00', 2, 1),
(2, 'N0003', 'place 33', 1, '2014-04-02 00:00:00', 2, 1),
(3, 'N0003', 'place 52', 0, '2014-03-19 00:00:00', 2, 1),
(4, 'N0004', 'place 53', 1, '2014-03-20 00:00:00', 2, 1),
(5, 'N0007', 'place 44', 1, '2014-03-29 00:00:00', 2, 1),
(6, 'N0012', 'place 21', 1, '0000-00-00 00:00:00', NULL, 2),
(7, 'N0013', 'place 20', 1, '0000-00-00 00:00:00', NULL, 2),
(8, 'N0043', 'place 54', 1, '0000-00-00 00:00:00', NULL, 2),
(9, 'N0054', 'place 30', 1, '0000-00-00 00:00:00', NULL, 2),
(10, 'N0047', 'place 78', 1, '0000-00-00 00:00:00', NULL, 2),
(11, 'N0020', 'place 90', 0, '0000-00-00 00:00:00', NULL, 2),
(12, 'N0032', 'place 1', 1, '0000-00-00 00:00:00', NULL, 3);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `dateDeNaissance` date DEFAULT NULL,
  `adresse` varchar(250) DEFAULT NULL,
  `complementAdresse` varchar(250) DEFAULT NULL,
  `codePostal` varchar(5) DEFAULT NULL,
  `ville` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `dateDeNaissance`, `adresse`, `complementAdresse`, `codePostal`, `ville`) VALUES
(2, '2014-03-11', '4 delaroche ', NULL, '33240', 'saint romain la virvée');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `employe`
--
ALTER TABLE `employe`
  ADD CONSTRAINT `employe_personne` FOREIGN KEY (`idEmploye`) REFERENCES `personne` (`id`);

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `evenement_employe` FOREIGN KEY (`idEmploye`) REFERENCES `employe` (`idEmploye`),
  ADD CONSTRAINT `evenement_salle` FOREIGN KEY (`idSalle`) REFERENCES `salle` (`id`);

--
-- Contraintes pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_evenement` FOREIGN KEY (`idEvenement`) REFERENCES `evenement` (`id`),
  ADD CONSTRAINT `ticket_utilisateur` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_personne` FOREIGN KEY (`idUtilisateur`) REFERENCES `personne` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.1-dev
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 12, 2018 at 04:32 PM
-- Server version: 5.7.20-19-log
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u143944db1`
--

-- --------------------------------------------------------

--
-- Table structure for table `Client`
--

CREATE TABLE `Client` (
  `idClient` int(11) NOT NULL,
  `nomClient` varchar(250) DEFAULT NULL,
  `prenomClient` varchar(250) DEFAULT NULL,
  `adresseClient` varchar(250) DEFAULT NULL,
  `villeClient` varchar(250) DEFAULT NULL,
  `codePostalClient` varchar(5) DEFAULT NULL,
  `telClient` varchar(16) DEFAULT NULL,
  `mailClient` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Client`
--

INSERT INTO `Client` (`idClient`, `nomClient`, `prenomClient`, `adresseClient`, `villeClient`, `codePostalClient`, `telClient`, `mailClient`) VALUES
(4, 'Piscine 64', NULL, '52 Bis Avenue Lasbordes', 'Soumoulou', '64420', '0559041642', 'contact@bearneo.fr'),
(6, 'Lasky', 'Thomas', 'testadresepau', 'mimizan', '40200', '0783008136', 'dqihfdqifg@gmail.com'),
(7, 'maria', 'DB', 'adressedb', 'paris', '75000', '054642523', 'sdqgfdfqgsdfg@gmail.com'),
(8, 'staphano', 'polo', 'avenue coucou bravo', 'Bordeaux', '50000', '0452365441', 'sdfqqsdfqsdf@gmail.com\r\n'),
(9, 'Brin', 'Alain', '14 rue des arbres clos', 'Accolay', '89460', '0123456789', 'alain.brin@sasociete.com'),
(10, 'Blanc', 'Etienne', '7 cours des dammes', 'Pau', '64000', '0123456789', 'etienne.blanc@ltrille.com');

-- --------------------------------------------------------

--
-- Table structure for table `Depense`
--

CREATE TABLE `Depense` (
  `idDepense` int(11) NOT NULL,
  `dateDepense` date DEFAULT NULL,
  `montantRemboursement` double DEFAULT NULL,
  `etatValidation` enum('En cours','Validé','Refusé') DEFAULT 'En cours',
  `dateValidation` date DEFAULT NULL,
  `montantDepense` double DEFAULT NULL,
  `codeFrais` int(11) NOT NULL,
  `idUtilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Depense`
--

INSERT INTO `Depense` (`idDepense`, `dateDepense`, `montantRemboursement`, `etatValidation`, `dateValidation`, `montantDepense`, `codeFrais`, `idUtilisateur`) VALUES
(190, '2018-07-13', NULL, 'Validé', NULL, 100, 146, 2),
(191, '2018-07-13', NULL, 'Validé', NULL, 100, 146, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Entreprise`
--

CREATE TABLE `Entreprise` (
  `idEntreprise` int(11) NOT NULL,
  `raisonSociale` varchar(100) DEFAULT NULL,
  `noSiret` int(11) DEFAULT NULL,
  `adresseEntreprise` varchar(200) DEFAULT NULL,
  `codePostalUtilisateur` varchar(5) DEFAULT NULL,
  `villeEnteprise` varchar(100) DEFAULT NULL,
  `telEntreprise` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Entreprise`
--

INSERT INTO `Entreprise` (`idEntreprise`, `raisonSociale`, `noSiret`, `adresseEntreprise`, `codePostalUtilisateur`, `villeEnteprise`, `telEntreprise`) VALUES
(1, 'GRETA SUD AQUITAINE', 7264, '3 bis avenue Nitot', '64015', 'Pau Cedex', '0559841507');

-- --------------------------------------------------------

--
-- Table structure for table `Frais`
--

CREATE TABLE `Frais` (
  `libelleFrais` varchar(250) DEFAULT NULL,
  `detailsFrais` varchar(250) DEFAULT NULL,
  `dateFrais` date DEFAULT NULL,
  `idDepense` int(11) NOT NULL,
  `codeFrais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Frais`
--

INSERT INTO `Frais` (`libelleFrais`, `detailsFrais`, `dateFrais`, `idDepense`, `codeFrais`) VALUES
('Restaurant', '', '2018-07-15', 190, 146);

-- --------------------------------------------------------

--
-- Table structure for table `Justificatif`
--

CREATE TABLE `Justificatif` (
  `idJustificatif` int(11) NOT NULL,
  `titreJustificatif` varchar(500) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `urlJustificatif` varchar(255) DEFAULT NULL,
  `idDepense` int(11) DEFAULT NULL,
  `codeFrais` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `NoteDeFrais`
--

CREATE TABLE `NoteDeFrais` (
  `codeFrais` int(11) NOT NULL,
  `libelleNote` varchar(200) DEFAULT NULL,
  `dateFrais` date DEFAULT NULL,
  `villeFrais` varchar(250) DEFAULT NULL,
  `dateSoumission` date DEFAULT NULL,
  `commentaireFrais` text,
  `etat` enum('En Cours','Validé','Refusé') NOT NULL DEFAULT 'En Cours',
  `idUtilisateur` int(11) DEFAULT NULL,
  `idClient` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `NoteDeFrais`
--

INSERT INTO `NoteDeFrais` (`codeFrais`, `libelleNote`, `dateFrais`, `villeFrais`, `dateSoumission`, `commentaireFrais`, `etat`, `idUtilisateur`, `idClient`) VALUES
(146, 'Note de frais du mois de test 2018', '2018-07-15', 'null', '2018-07-15', '', 'Validé', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Trajet`
--

CREATE TABLE `Trajet` (
  `libelleTrajet` varchar(250) NOT NULL,
  `dureeTrajet` float DEFAULT NULL,
  `villeDepart` varchar(250) DEFAULT NULL,
  `villeArrivee` varchar(250) DEFAULT NULL,
  `dateAller` date DEFAULT NULL,
  `dateRetour` date DEFAULT NULL,
  `distanceKilometres` double DEFAULT NULL,
  `idDepense` int(11) NOT NULL,
  `codeFrais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Trajet`
--

INSERT INTO `Trajet` (`libelleTrajet`, `dureeTrajet`, `villeDepart`, `villeArrivee`, `dateAller`, `dateRetour`, `distanceKilometres`, `idDepense`, `codeFrais`) VALUES
('Demarche administratif', 10, 'Pau', 'Bordeaux', '2018-07-11', '2018-07-12', 500, 191, 146);

-- --------------------------------------------------------

--
-- Table structure for table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `mailUtilisateur` varchar(200) NOT NULL,
  `mdpUtilisateur` text NOT NULL,
  `adresseUtilisateur` varchar(250) DEFAULT NULL,
  `codePostalUtilisateur` varchar(5) DEFAULT NULL,
  `villeUtilisateur` varchar(100) DEFAULT NULL,
  `telUtilisateur` varchar(16) DEFAULT NULL,
  `typeCompte` enum('Commercial','Comptable','Administrateur Entreprise') DEFAULT 'Commercial',
  `nomUtilisateur` varchar(100) DEFAULT NULL,
  `prenomUtilisateur` varchar(100) DEFAULT NULL,
  `idEntreprise` int(11) DEFAULT NULL,
  `AuthToken` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Utilisateur`
--

INSERT INTO `Utilisateur` (`idUtilisateur`, `mailUtilisateur`, `mdpUtilisateur`, `adresseUtilisateur`, `codePostalUtilisateur`, `villeUtilisateur`, `telUtilisateur`, `typeCompte`, `nomUtilisateur`, `prenomUtilisateur`, `idEntreprise`, `AuthToken`) VALUES
(2, 'ibragim.abubakarov@greta-sud-aquitaine.academy', '123', '25 route de bayonne', '64000', 'PAU', '0659733087', 'Commercial', 'Abubakarov', 'Ibragim', 1, 'aWJyYWdpbS5hYnViYWthcm92QGdyZXRhLXN1ZC1hcXVpdGFpbmUuYWNhZGVteTEyMw=='),
(3, 'vincent.nicolau@greta-sud-aquitaine.academy', '123', '17 avenue Bié Moulié', '64000', 'Pau', '0686246503', 'Commercial', 'Nicolau', 'Vincent', 1, 'dmluY2VudC5uaWNvbGF1QGdyZXRhLXN1ZC1hcXVpdGFpbmUuYWNhZGVteToxMjM='),
(4, 'pierre.gyejacquot@greta-sud-aquitaine.academy', '123', '26 rue de la Paix', '64000', 'Pau', '0618237118', 'Comptable', 'Gyejacquot', 'Pierre', 1, 'Basic cGllcnJlLmd5ZWphY3F1b3RAZ3JldGEtc3VkLWFxdWl0YWluZS5hY2FkZW15OjEyMw=='),
(5, 'test@test.fr', 'test', '26 rue du Test', '64000', 'Pau', '0559980388', 'Commercial', 'NomTest', 'PrenomTest', 1, 'dGVzdEB0ZXN0LmZyOnRlc3Q='),
(8, 'f.nunes@live.fr', '123', '2 rue de la Paix', '64000', 'Pau', '0689652145', 'Comptable', 'Nunes', 'Florence', 1, ''),
(9, 'stephane.genvrin@greta-sud-aquitaine.academy', '0123456789', '16 bd du recteur jean sarrailh', '64000', 'pau', '0213456789', 'Comptable', 'genvrin', 'stephane', 1, ''),
(10, 'cabanel.maxime@greta-sud-aquitaine.academy', '0123456789', '7 rue du gaulois', '64120', 'Lons', '1234567890', 'Commercial', 'cabanel', 'maxime', 1, ''),
(11, 'joshua.dealmeida@greta-sud-aqutaine.academy', '0123456789', '22 allé les queufs', '21214', 'Montillot', '0213456789', 'Commercial', 'de almeida', 'joshua', 1, ''),
(12, 'matthieu.delporte@live.fr', '0123456789', '54 rue du goulot', '89450', 'Vézelay', '0536789512', 'Commercial', 'delporte', 'joshua', 1, ''),
(13, 'cyril.descat@greta-sud-aquitaine.academy', '0123456789', '31 rue du maquis', '64130', 'Ainharp', '3245166781', 'Commercial', 'descat', 'cyril', 1, ''),
(14, 'pierre.gyejacquot@live.fr', '0123456789', '25 bd des abeilles', '64350', 'Annoye', '7546842335', 'Commercial', 'gyejacquot', 'pierre', 1, ''),
(15, 'marie.morales@greta-sud-aquitaine.academy', '0123456789', '20 rue des tulipes', '64420', 'andoins', '4562312448', 'Comptable', 'morales', 'marie', 1, ''),
(16, 'jdoe@gmail.com', '123', '2 route de bordeaux', '64000', 'PAU', '0659595959', 'Comptable', 'DOE', 'John', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`idClient`);

--
-- Indexes for table `Depense`
--
ALTER TABLE `Depense`
  ADD PRIMARY KEY (`idDepense`,`codeFrais`),
  ADD KEY `FK_Depense_codeFrais` (`codeFrais`),
  ADD KEY `FK_Depense_idUtilisateur` (`idUtilisateur`);

--
-- Indexes for table `Entreprise`
--
ALTER TABLE `Entreprise`
  ADD PRIMARY KEY (`idEntreprise`);

--
-- Indexes for table `Frais`
--
ALTER TABLE `Frais`
  ADD PRIMARY KEY (`idDepense`,`codeFrais`),
  ADD KEY `FK_Frais_codeFrais` (`codeFrais`);

--
-- Indexes for table `Justificatif`
--
ALTER TABLE `Justificatif`
  ADD PRIMARY KEY (`idJustificatif`),
  ADD KEY `FK_Justificatif_idDepense` (`idDepense`),
  ADD KEY `FK_Justificatif_codeFrais` (`codeFrais`);

--
-- Indexes for table `NoteDeFrais`
--
ALTER TABLE `NoteDeFrais`
  ADD PRIMARY KEY (`codeFrais`),
  ADD KEY `FK_NoteDeFrais_idUtilisateur` (`idUtilisateur`),
  ADD KEY `FK_NoteDeFrais_idClient` (`idClient`);

--
-- Indexes for table `Trajet`
--
ALTER TABLE `Trajet`
  ADD PRIMARY KEY (`idDepense`,`codeFrais`),
  ADD KEY `FK_Trajet_codeFrais` (`codeFrais`);

--
-- Indexes for table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`),
  ADD UNIQUE KEY `mail` (`mailUtilisateur`),
  ADD KEY `FK_Utilisateur_idEntreprise` (`idEntreprise`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Client`
--
ALTER TABLE `Client`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Depense`
--
ALTER TABLE `Depense`
  MODIFY `idDepense` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `Entreprise`
--
ALTER TABLE `Entreprise`
  MODIFY `idEntreprise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Justificatif`
--
ALTER TABLE `Justificatif`
  MODIFY `idJustificatif` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `NoteDeFrais`
--
ALTER TABLE `NoteDeFrais`
  MODIFY `codeFrais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Depense`
--
ALTER TABLE `Depense`
  ADD CONSTRAINT `FK_Depense_codeFrais` FOREIGN KEY (`codeFrais`) REFERENCES `NoteDeFrais` (`codeFrais`),
  ADD CONSTRAINT `FK_Depense_idUtilisateur` FOREIGN KEY (`idUtilisateur`) REFERENCES `Utilisateur` (`idUtilisateur`);

--
-- Constraints for table `Frais`
--
ALTER TABLE `Frais`
  ADD CONSTRAINT `FK_Frais_codeFrais` FOREIGN KEY (`codeFrais`) REFERENCES `NoteDeFrais` (`codeFrais`),
  ADD CONSTRAINT `FK_Frais_idDepense` FOREIGN KEY (`idDepense`) REFERENCES `Depense` (`idDepense`);

--
-- Constraints for table `Justificatif`
--
ALTER TABLE `Justificatif`
  ADD CONSTRAINT `FK_Justificatif_codeFrais` FOREIGN KEY (`codeFrais`) REFERENCES `NoteDeFrais` (`codeFrais`),
  ADD CONSTRAINT `FK_Justificatif_idDepense` FOREIGN KEY (`idDepense`) REFERENCES `Depense` (`idDepense`);

--
-- Constraints for table `NoteDeFrais`
--
ALTER TABLE `NoteDeFrais`
  ADD CONSTRAINT `FK_NoteDeFrais_idClient` FOREIGN KEY (`idClient`) REFERENCES `Client` (`idClient`),
  ADD CONSTRAINT `FK_NoteDeFrais_idUtilisateur` FOREIGN KEY (`idUtilisateur`) REFERENCES `Utilisateur` (`idUtilisateur`);

--
-- Constraints for table `Trajet`
--
ALTER TABLE `Trajet`
  ADD CONSTRAINT `FK_Trajet_codeFrais` FOREIGN KEY (`codeFrais`) REFERENCES `NoteDeFrais` (`codeFrais`),
  ADD CONSTRAINT `FK_Trajet_idDepense` FOREIGN KEY (`idDepense`) REFERENCES `Depense` (`idDepense`);

--
-- Constraints for table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD CONSTRAINT `FK_Utilisateur_idEntreprise` FOREIGN KEY (`idEntreprise`) REFERENCES `Entreprise` (`idEntreprise`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

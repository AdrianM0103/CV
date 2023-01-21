-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 12, 2023 at 08:31 AM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20024164_phpbbdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `comentarii`
--

CREATE TABLE `comentarii` (
  `IdComentariu` int(11) NOT NULL,
  `Comentariu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `IdAutor` int(11) NOT NULL,
  `IdSarcina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `liste`
--

CREATE TABLE `liste` (
  `IdLista` int(11) NOT NULL,
  `DenumireLista` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `IdProiect` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `obiective`
--

CREATE TABLE `obiective` (
  `IdObiectiv` int(11) NOT NULL,
  `DenumireObiectiv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Indeplinit` tinyint(1) NOT NULL,
  `IdSarcina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proiecte`
--

CREATE TABLE `proiecte` (
  `IdProiect` int(11) NOT NULL,
  `DenumireProiect` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DataFinalizare` date NOT NULL,
  `IdAdministrator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proiecte_semiadmin`
--

CREATE TABLE `proiecte_semiadmin` (
  `IdProiect` int(11) NOT NULL,
  `IdUtilizator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proiecte_utilizatori`
--

CREATE TABLE `proiecte_utilizatori` (
  `IdProiect` int(11) NOT NULL,
  `IdUtilizator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sarcini`
--

CREATE TABLE `sarcini` (
  `IdSarcina` int(11) NOT NULL,
  `DenumireSarcina` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DescriereSarcina` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `IdLista` int(11) NOT NULL,
  `IdAdministrator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sarcini_utilizatori`
--

CREATE TABLE `sarcini_utilizatori` (
  `IdSarcina` int(11) NOT NULL,
  `IdUtilizator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `utilizatori`
--

CREATE TABLE `utilizatori` (
  `Id` int(11) NOT NULL,
  `Username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentarii`
--
ALTER TABLE `comentarii`
  ADD PRIMARY KEY (`IdComentariu`),
  ADD KEY `fk_comentarii_utilizatori` (`IdAutor`),
  ADD KEY `fk_comentarii_sarcini` (`IdSarcina`);

--
-- Indexes for table `liste`
--
ALTER TABLE `liste`
  ADD PRIMARY KEY (`IdLista`),
  ADD KEY `fk_liste_proiecte` (`IdProiect`);

--
-- Indexes for table `obiective`
--
ALTER TABLE `obiective`
  ADD PRIMARY KEY (`IdObiectiv`),
  ADD KEY `fk_obiective_sarcini` (`IdSarcina`);

--
-- Indexes for table `proiecte`
--
ALTER TABLE `proiecte`
  ADD PRIMARY KEY (`IdProiect`);

--
-- Indexes for table `proiecte_semiadmin`
--
ALTER TABLE `proiecte_semiadmin`
  ADD KEY `fk_proiecte_proiecte_semiadmin` (`IdProiect`),
  ADD KEY `fk_utilizatori_proiecte_semiadmin` (`IdUtilizator`);

--
-- Indexes for table `proiecte_utilizatori`
--
ALTER TABLE `proiecte_utilizatori`
  ADD KEY `fk_proiecte_proiecte_utilizator` (`IdProiect`),
  ADD KEY `fk_utilizatori_proiecte_utilizator` (`IdUtilizator`);

--
-- Indexes for table `sarcini`
--
ALTER TABLE `sarcini`
  ADD PRIMARY KEY (`IdSarcina`),
  ADD KEY `fk_sarcini_liste` (`IdLista`),
  ADD KEY `fk_sarcini_utilizatori` (`IdAdministrator`);

--
-- Indexes for table `sarcini_utilizatori`
--
ALTER TABLE `sarcini_utilizatori`
  ADD KEY `fk_sarcini_utilizatori_utilizatori` (`IdUtilizator`),
  ADD KEY `fk_sarcini_utilizatori_sarcini` (`IdSarcina`);

--
-- Indexes for table `utilizatori`
--
ALTER TABLE `utilizatori`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentarii`
--
ALTER TABLE `comentarii`
  MODIFY `IdComentariu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `liste`
--
ALTER TABLE `liste`
  MODIFY `IdLista` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `obiective`
--
ALTER TABLE `obiective`
  MODIFY `IdObiectiv` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proiecte`
--
ALTER TABLE `proiecte`
  MODIFY `IdProiect` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sarcini`
--
ALTER TABLE `sarcini`
  MODIFY `IdSarcina` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utilizatori`
--
ALTER TABLE `utilizatori`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comentarii`
--
ALTER TABLE `comentarii`
  ADD CONSTRAINT `fk_comentarii_sarcini` FOREIGN KEY (`IdSarcina`) REFERENCES `sarcini` (`IdSarcina`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_comentarii_utilizatori` FOREIGN KEY (`IdAutor`) REFERENCES `utilizatori` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `liste`
--
ALTER TABLE `liste`
  ADD CONSTRAINT `fk_liste_proiecte` FOREIGN KEY (`IdProiect`) REFERENCES `proiecte` (`IdProiect`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `obiective`
--
ALTER TABLE `obiective`
  ADD CONSTRAINT `fk_obiective_sarcini` FOREIGN KEY (`IdSarcina`) REFERENCES `sarcini` (`IdSarcina`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proiecte_semiadmin`
--
ALTER TABLE `proiecte_semiadmin`
  ADD CONSTRAINT `fk_proiecte_proiecte_semiadmin` FOREIGN KEY (`IdProiect`) REFERENCES `proiecte` (`IdProiect`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_utilizatori_proiecte_semiadmin` FOREIGN KEY (`IdUtilizator`) REFERENCES `utilizatori` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proiecte_utilizatori`
--
ALTER TABLE `proiecte_utilizatori`
  ADD CONSTRAINT `fk_proiecte_proiecte_utilizator` FOREIGN KEY (`IdProiect`) REFERENCES `proiecte` (`IdProiect`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_utilizatori_proiecte_utilizator` FOREIGN KEY (`IdUtilizator`) REFERENCES `utilizatori` (`Id`);

--
-- Constraints for table `sarcini`
--
ALTER TABLE `sarcini`
  ADD CONSTRAINT `fk_sarcini_liste` FOREIGN KEY (`IdLista`) REFERENCES `liste` (`IdLista`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sarcini_utilizatori` FOREIGN KEY (`IdAdministrator`) REFERENCES `utilizatori` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sarcini_utilizatori`
--
ALTER TABLE `sarcini_utilizatori`
  ADD CONSTRAINT `fk_sarcini_utilizatori_sarcini` FOREIGN KEY (`IdSarcina`) REFERENCES `sarcini` (`IdSarcina`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sarcini_utilizatori_utilizatori` FOREIGN KEY (`IdUtilizator`) REFERENCES `utilizatori` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

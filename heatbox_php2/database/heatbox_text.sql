-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 31. Mai 2017 um 11:19
-- Server-Version: 10.1.9-MariaDB
-- PHP-Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `heatbox_text`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `admin_rules`
--

CREATE TABLE `admin_rules` (
  `admin_rulesid` int(11) NOT NULL,
  `rulenr` int(11) NOT NULL,
  `rulename` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `admin_rules`
--

INSERT INTO `admin_rules` (`admin_rulesid`, `rulenr`, `rulename`, `status`) VALUES
(1, 1, 'showsysinfopage', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kommentar`
--

CREATE TABLE `kommentar` (
  `kommentarid` int(11) NOT NULL,
  `text` varchar(1024) NOT NULL,
  `knr` varchar(255) NOT NULL,
  `kommentarnr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `seiten`
--

CREATE TABLE `seiten` (
  `seitenid` int(11) NOT NULL,
  `seitennr` int(11) NOT NULL,
  `seitenname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Seiten, denen Texte zugeordnet werden können';

--
-- Daten für Tabelle `seiten`
--

INSERT INTO `seiten` (`seitenid`, `seitennr`, `seitenname`) VALUES
(1, 1, 'sysinfopage');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sprachen`
--

CREATE TABLE `sprachen` (
  `sprachid` int(11) NOT NULL,
  `sprachnr` int(11) NOT NULL,
  `sprache` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Verfügbare Sprachen';

--
-- Daten für Tabelle `sprachen`
--

INSERT INTO `sprachen` (`sprachid`, `sprachnr`, `sprache`) VALUES
(1, 1, 'Deutsch'),
(2, 2, 'Englisch');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `texte`
--

CREATE TABLE `texte` (
  `textid` int(11) NOT NULL,
  `textnr` int(11) NOT NULL,
  `text` varchar(1024) DEFAULT NULL,
  `seitennr` int(11) DEFAULT NULL,
  `sprachnr` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Texte, die auf den Seiten angezeigt werden';

--
-- Daten für Tabelle `texte`
--

INSERT INTO `texte` (`textid`, `textnr`, `text`, `seitennr`, `sprachnr`) VALUES
(1, 1, 'Dies ist ein Test.', 1, 1),
(3, 1, 'This is a test.', 1, 2);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `admin_rules`
--
ALTER TABLE `admin_rules`
  ADD PRIMARY KEY (`admin_rulesid`),
  ADD UNIQUE KEY `rulenr` (`rulenr`);

--
-- Indizes für die Tabelle `kommentar`
--
ALTER TABLE `kommentar`
  ADD PRIMARY KEY (`kommentarid`),
  ADD UNIQUE KEY `kommentarnr` (`kommentarnr`),
  ADD KEY `knr` (`knr`);

--
-- Indizes für die Tabelle `seiten`
--
ALTER TABLE `seiten`
  ADD PRIMARY KEY (`seitenid`),
  ADD UNIQUE KEY `seitenname` (`seitenname`),
  ADD UNIQUE KEY `seitennr` (`seitennr`);

--
-- Indizes für die Tabelle `sprachen`
--
ALTER TABLE `sprachen`
  ADD PRIMARY KEY (`sprachid`),
  ADD UNIQUE KEY `sprachnr` (`sprachnr`),
  ADD UNIQUE KEY `sprache` (`sprache`);

--
-- Indizes für die Tabelle `texte`
--
ALTER TABLE `texte`
  ADD PRIMARY KEY (`textid`),
  ADD KEY `seitennr` (`seitennr`),
  ADD KEY `sprachnr` (`sprachnr`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `admin_rules`
--
ALTER TABLE `admin_rules`
  MODIFY `admin_rulesid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `kommentar`
--
ALTER TABLE `kommentar`
  MODIFY `kommentarid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `seiten`
--
ALTER TABLE `seiten`
  MODIFY `seitenid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `sprachen`
--
ALTER TABLE `sprachen`
  MODIFY `sprachid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `texte`
--
ALTER TABLE `texte`
  MODIFY `textid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `texte`
--
ALTER TABLE `texte`
  ADD CONSTRAINT `texte_ibfk_1` FOREIGN KEY (`seitennr`) REFERENCES `seiten` (`seitennr`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `texte_ibfk_2` FOREIGN KEY (`sprachnr`) REFERENCES `sprachen` (`sprachnr`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

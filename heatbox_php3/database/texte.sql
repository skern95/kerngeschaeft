-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 01. Jun 2017 um 14:54
-- Server-Version: 10.1.21-MariaDB
-- PHP-Version: 5.6.30

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
(3, 1, 'This is a test.', 1, 2),
(4, 1, 'Startseite | HeatBox', 4, 1),
(5, 1, 'Home| HeatBox', 4, 2),
(6, 1, 'Startseite', 2, 1),
(7, 1, 'Home', 2, 2),
(8, 2, 'Allgemeines', 2, 1),
(9, 2, 'General', 2, 2),
(10, 3, 'Heatbox', 2, 1),
(11, 3, 'Heatbox', 2, 2),
(12, 4, 'Heatbox', 2, 1),
(13, 4, 'Heatbox', 2, 2),
(14, 5, 'Technische Daten', 2, 1),
(15, 5, 'Technical specifications', 2, 2),
(16, 6, 'Anleitungen', 2, 1),
(17, 6, 'Manuals', 2, 2),
(18, 7, 'Heatbox Compact', 2, 1),
(19, 7, 'Heatbox Compact', 2, 2),
(20, 8, 'Technische Daten', 2, 1),
(21, 8, 'Technical specifications', 2, 2),
(22, 9, 'Anleitungen', 2, 1),
(23, 9, 'Manuals', 2, 2),
(24, 10, 'Heatbox Eco', 2, 1),
(25, 10, 'Heatbox Eco', 2, 2),
(26, 11, 'Technische Daten', 2, 1),
(27, 11, 'Technical specifications', 2, 2),
(29, 12, 'Anleitungen', 2, 1),
(30, 12, 'Manuals', 2, 2),
(31, 13, 'Downloads', 2, 1),
(32, 13, 'Downloads', 2, 2),
(33, 14, 'Geschichte', 2, 1),
(34, 14, 'History', 2, 2),
(35, 15, 'Testberichte', 2, 1),
(36, 15, 'Reviews', 2, 2),
(37, 16, 'FAQ', 2, 1),
(38, 16, 'FAQ', 2, 2),
(39, 17, 'Spende', 2, 1),
(40, 17, 'Donate', 2, 2),
(41, 18, 'Kommentare', 2, 1),
(42, 18, 'Comments', 2, 2),
(43, 19, 'Kontakt', 2, 1),
(44, 19, 'Contact', 2, 2),
(45, 20, 'Impressum', 2, 1),
(46, 20, 'Impressum', 2, 2);

--
-- Indizes der exportierten Tabellen
--

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
-- AUTO_INCREMENT für Tabelle `texte`
--
ALTER TABLE `texte`
  MODIFY `textid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
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

-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 02. Jun 2017 um 09:04
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
(46, 20, 'Impressum', 2, 2),
(47, 1, 'ADRESSE', 3, 1),
(48, 1, 'ADRESS', 3, 2),
(49, 2, 'Straße', 3, 1),
(50, 2, 'Street', 3, 2),
(51, 3, 'Hüttenstraße 13', 3, 1),
(52, 3, 'Hüttenstraße 13', 3, 2),
(53, 4, 'PLZ/Ort', 3, 1),
(54, 4, 'Postcode/City', 3, 2),
(55, 5, '35708 Haiger', 3, 1),
(56, 5, '35708 Haiger', 3, 2),
(57, 6, 'Land', 3, 1),
(58, 6, 'Country', 3, 2),
(59, 7, 'Deutschland', 3, 1),
(60, 7, 'Germany', 3, 2),
(61, 8, 'ANSPRECHPARTNER', 3, 1),
(62, 8, 'CONTACT PERSON', 3, 2),
(63, 9, 'Christian Domes', 3, 1),
(64, 9, 'Christian Domes', 3, 2),
(65, 10, 'Website', 3, 1),
(66, 10, 'Website', 3, 2),
(67, 11, 'Email', 3, 1),
(68, 11, 'Email', 3, 2),
(69, 12, 'Telefon', 3, 1),
(70, 12, 'Phone', 3, 2),
(71, 13, '+49 2773 912030', 3, 1),
(72, 13, '+49 2773 912030', 3, 2),
(73, 14, 'Fax', 3, 1),
(74, 14, 'Fax', 3, 2),
(75, 15, '+49 02773 912031', 3, 1),
(76, 15, '+49 02773 912031', 3, 2),
(77, 16, 'INFORMATIONEN', 3, 1),
(78, 16, 'INFORMATIONS', 3, 2),
(79, 17, 'Impressum', 3, 1),
(80, 17, 'Impressum', 3, 2),
(81, 18, 'Kontakt', 3, 1),
(82, 18, 'Contact', 3, 2),
(83, 19, 'Shopseite', 3, 1),
(84, 19, 'Shop', 3, 2),
(85, 20, 'Facebook', 3, 1),
(86, 20, 'Facebook', 3, 2),
(87, 21, 'Google+', 3, 1),
(88, 21, 'Google+', 3, 2),
(89, 22, 'SPENDEN', 3, 1),
(90, 22, 'DONATE', 3, 2),
(91, 23, 'HeatBox', 3, 1),
(92, 23, 'HeatBox', 3, 2),
(93, 2, 'Willkommen bei HaDi-RC Wiki !', 4, 1),
(94, 2, 'Welcome to HaDi-RC Wiki !', 4, 2),
(95, 3, 'Wir wollen Ihnen hier gebündelt eingestellte Informationen zu unseren aktuellen Elektronik-Projekten geben, inklusive der aktuellen Updates bei Firmware-Änderungen.', 4, 1),
(96, 3, 'On this site we want to give you all informatins to our current electronical projects including the latest updates of the firmware.', 4, 2),
(97, 4, 'Diese Seite ist rein informell und beinhaltet den jeweils aktuellen Status / Firmware-Revision.', 4, 1),
(98, 4, 'This site is for information only and contains the current status / firmware-revision.', 4, 2),
(99, 5, 'HaDi-RC Wiki ist eine rein informelle Plattform ohne Diskussionsmöglichkeit. Im Fall von Supportanfragen nutzen Sie bitte das Kontaktformular.', 4, 1),
(100, 5, 'HaDi-RC Wiki is an platform for information and does not give the possibilty of discussion. If there are any questions please use the contact form.', 4, 2),
(101, 6, 'Die HeatBox', 4, 1),
(102, 6, 'The HeatBox', 4, 2),
(103, 7, 'Hier sind ein paar Bilder der Heatbox', 4, 1),
(104, 7, 'Here you can see a few pictures of the HeatBox', 4, 2);

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
  MODIFY `textid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
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

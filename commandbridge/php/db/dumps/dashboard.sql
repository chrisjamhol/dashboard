-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 25. Mrz 2013 um 09:09
-- Server Version: 5.5.27
-- PHP-Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `dashboard`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userId` int(5) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `pass` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`userId`, `email`, `pass`) VALUES
(1, 'chrisjamhol@gmail.com', 'pass');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `widget`
--

CREATE TABLE IF NOT EXISTS `widget` (
  `widgetId` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `path` varchar(500) NOT NULL,
  PRIMARY KEY (`widgetId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `widget`
--

INSERT INTO `widget` (`widgetId`, `name`, `path`) VALUES
(1, 'spotify', '/spotify/widget.php'),
(2, 'weather', '/weather/widget.php');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `widget_user`
--

CREATE TABLE IF NOT EXISTS `widget_user` (
  `userId` int(5) NOT NULL,
  `widgetId` int(5) NOT NULL,
  `rowspan` int(2) NOT NULL DEFAULT '1',
  `collspan` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `widget_user`
--

INSERT INTO `widget_user` (`userId`, `widgetId`, `rowspan`, `collspan`) VALUES
(0, 0, 2, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 3.3.7deb8
-- http://www.phpmyadmin.net
--
-- Host: wp057.webpack.hosteurope.de
-- Erstellungszeit: 24. Januar 2015 um 06:52
-- Server Version: 5.5.38
-- PHP-Version: 5.3.3-7+squeeze20

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `db11197344-wptools`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `short` varchar(64) NOT NULL,
  `comment` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `short` (`short`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `group`
--

INSERT INTO `group` (`id`, `short`, `comment`) VALUES
(1, 'root', 'root'),
(2, 'projowner', 'Project Owner'),
(3, 'projmember', 'Project Member');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `projid` int(11) NOT NULL AUTO_INCREMENT,
  `projshort` varchar(64) NOT NULL,
  `projlong` varchar(256) DEFAULT NULL,
  `ownid` int(11) NOT NULL,
  `ownshort` varchar(64) NOT NULL,
  PRIMARY KEY (`projid`),
  UNIQUE KEY `short` (`projshort`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `project`
--

INSERT INTO `project` (`projid`, `projshort`, `projlong`, `ownid`, `ownshort`) VALUES
(1, 'BMW VSC', 'BMW Vehicle Small Cell', 1, 'wopl'),
(2, 'Dept', 'Bluefish Department', 1, 'wopl'),
(3, 'P3', 'Project3', 0, '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `projgroup`
--

CREATE TABLE IF NOT EXISTS `projgroup` (
  `groupid` int(11) NOT NULL AUTO_INCREMENT,
  `projid` int(11) NOT NULL,
  `prio` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`groupid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Daten für Tabelle `projgroup`
--

INSERT INTO `projgroup` (`groupid`, `projid`, `prio`, `name`) VALUES
(1, 1, 2, 'Business Stream'),
(2, 1, 3, 'Technical Stream'),
(3, 1, 4, 'Wi-Fi Calling'),
(4, 1, 5, 'Meeting 7.7.2014'),
(5, 1, 6, 'Meeting 30.1.2015'),
(6, 1, 1, 'BMW and Supplier'),
(7, 2, 10, 'Core BF CE Team'),
(8, 2, 30, 'Vodafone Assistance'),
(9, 2, 20, 'extended BF Team');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `teamid` int(11) NOT NULL AUTO_INCREMENT,
  `projid` int(11) NOT NULL,
  `title` varchar(32) DEFAULT NULL,
  `firstname` varchar(64) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `company` varchar(128) DEFAULT NULL,
  `location` varchar(64) DEFAULT NULL,
  `dept` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `phone` varchar(128) DEFAULT NULL,
  `position` varchar(128) DEFAULT NULL,
  `remarks` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`teamid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Daten für Tabelle `team`
--

INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES
(1, 1, NULL, 'Wolfram', 'Plettscher', 'Bluefish Communications', 'Düsseldorf', '', 'wolfram.plettscher@bluefishplc.com', '+49 173 3140 659', 'Principal Consultant', NULL),
(2, 1, NULL, 'Oliver', 'Masuck', '', 'München', '', 'oliver.masuck@vodafone.com', '', '', ''),
(3, 1, NULL, 'Stephen', 'McCartney', 'Bluefish Communications', 'Düsseldorf', '', 'stephen.mccartney@bluefishplc.com', '+49 173 532 2735', 'Client Partner', ''),
(4, 1, NULL, 'Rüdiger', 'Scholz', '', '', 'M2M', '', '', '', NULL),
(5, 1, NULL, 'Marco', 'Faulhammer', '', 'Düsseldorf', '', '', '', '', NULL),
(6, 1, NULL, 'Marcel', 'Kubon', 'Vodafone Group Services', 'Düsseldorf', 'Terminals - Innovation & Development', 'marcel.kubon@vodafone.com', '+49 172 256 6692', 'Connected Devices Manager', NULL),
(7, 1, NULL, 'Heinz', 'Becker', '', '', '', '', '', '', NULL),
(8, 1, NULL, 'Jürgen', 'Caldenhoven', '', '', '', '', '', '', NULL),
(9, 1, NULL, 'Claus', 'Keuker', 'Nash Tech', 'Nuremberg', '', '', '+49 151 5500 3352', '', NULL),
(10, 1, NULL, 'Thomas', 'Krauß', 'BMW', 'München', 'Research & Technology', 'thomas.krauss@bmw.de', '+49 89 382 27143', '', NULL),
(11, 1, NULL, 'Walter', 'Bindrim', 'Vodafone Group Services', 'Düsseldorf', 'Strategy & Planning', 'walter.bindrim@vodafone.com', '+49 172 2077970', 'Pr Core Network & FMC Architecture Manager', NULL),
(12, 1, NULL, 'Nick', 'Burmester', '', 'Düsseldorf', 'TGCC', 'nick.burmester@vodafone.com', '', '', ''),
(13, 1, NULL, 'Simon', 'Richartz', '', 'Düsseldorf', 'DCCC', 'simon.richartz@vodafone.com', '+49 174 202 9800', 'Network Demand Specialist', 'test'),
(14, 1, NULL, 'Alan', 'Law', 'Vodafone Group Services', 'Newbury', 'Technology Strategy and Operation', 'alan.law@vodafone.com', '+44 7748938884', 'Distinguished Engineer', NULL),
(15, 1, NULL, 'Michael', 'Suellwold', '', '', '', '', '', '', NULL),
(16, 1, NULL, 'Michael Andreas', 'Bösinger', 'Vodafone DE', 'Düsseldorf', '', '', '', '', NULL),
(17, 1, NULL, 'Mamoon', 'Rassa', 'Vodafone', 'Düsseldorf', '', 'mamoon.rassa@vodafone.com', '', '', NULL),
(18, 1, NULL, 'Mihai', 'Steingruebner', 'BMW', '', '', 'mihai.steingruebner@bmw.de', '', '', NULL),
(19, 1, NULL, 'Peter', 'Fertl', 'BMW', 'München', 'Research & Technology', 'peter.fertl@bmw.de', '+49 89 382 27143', '', NULL),
(20, 1, NULL, 'Markus', 'Kaindl', 'BMW', '', '', 'markus.ka.kaindl@bmw.de', '', '', NULL),
(21, 1, NULL, 'Gill', 'Chinderpal', 'Vodafone Group', '', '', 'chinderpal.gill@vodafone.com', '', '', NULL),
(22, 1, NULL, 'Christina', 'Ambos', '', '', '', '', '', '', NULL),
(23, 1, NULL, 'Guido', 'Gehlen, Dr.', 'Vodafone Group Services', 'Düsseldorf', 'Connected Product & App Development', 'gueido.gehlen@vodafone.com', '+49 172 250 8270', 'M2M Product Incubation Lead', NULL),
(24, 0, NULL, 'Karl-Ludwig', 'Wagner', 'Nash-Tech', NULL, NULL, 'karl.wagner@nachtech.com', NULL, NULL, NULL),
(25, 1, NULL, 'Karl-Ludwig', 'Wagner', 'Nash Tech', 'Nuremberg', '', 'karl.wagner@nashtech.com', '', '', NULL),
(26, 1, NULL, 'Andreas', 'Schwarzmeier', 'BMW', 'München', '', '', '', '', NULL),
(27, 1, NULL, 'Lars', 'Boesa', '', '', 'M2M', '', '', '', NULL),
(28, 1, NULL, 'Mike', 'Prinz', '', '', 'M2M', '', '', '', NULL),
(29, 1, NULL, 'Marc', 'Sauter', '', '', '', '', '', '', NULL),
(30, 2, NULL, 'Noel', 'Desnos', 'Bluefish Communication CE', '', '', 'noel.desnos@bluefishplc.com', '+49 162 9705526', 'Principal Consultant', 'UK phone: +44 7881 383315'),
(31, 2, NULL, 'Lakotta', 'Torsten', 'Bluefish Communication CE', 'Hamburg', '', 'torsten.lakotta@bluefishplc.com', '', 'Principal Consultant', ''),
(32, 2, NULL, 'Stephen', 'Mc Cartney', 'Bluefish Communication CE', 'Düsseldorf', '', 'stephen.mccartney@bluefishplc.com', '+49 173 5322735', 'Client Partner', ''),
(33, 2, NULL, 'Roderich', 'Pilars', 'Bluefish Communication CE', 'Düsseldorf', '', 'roderich.pilars@bluefishplc.com', '+49 173 5489898', 'Client Partner', ''),
(34, 2, NULL, 'Wolfram', 'Plettscher', 'Bluefish Communication CE', 'Düsseldorf', '', 'wolfram@plettscher.de', '+49 173 3140659', 'Principal Consultant', ''),
(35, 2, NULL, 'Jörg', 'Refeld', 'Bluefish Communication CE', 'Düsseldorf', '', 'joerg.refeld@bluefishplc.com', '+49 171 5425000', 'Principal Consultant', ''),
(36, 2, NULL, 'Günter', 'Brast', 'Bluefish Communication CE', 'Düsseldorf', '', 'guenter.brast@bluefishplc.com', '+49 173 5900895', 'Principal Consultant', ''),
(37, 2, NULL, 'Vedrana', 'Bogdan', 'Bluefish Communication CE', 'Düsseldorf', '', 'vedrana.bogdan@bluefishplc.com', '+49 152 09104956', 'Sales Coordinator CE', ''),
(38, 2, NULL, 'Thomas', 'Wolfram', 'Bluefish Communication CE', 'Düsseldorf', '', 'thomas.wolfram@bluefishplc.com', '+49 172 5745434', 'Principal Consultant', ''),
(39, 2, NULL, 'Giles', 'Wake', 'Bluefish Communication CE', 'Düsseldorf', '', 'giles.wake@bluefishplc.com', '+49 173 7333017', 'Manager', ''),
(40, 2, NULL, 'Evangelos', 'Zesakes', 'Bluefish Communication CE', 'München', '', 'evangelos.zesakes@bluefishplc.com', '+49 162 2816457', 'Principal Consultant', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `team2group`
--

CREATE TABLE IF NOT EXISTS `team2group` (
  `projid` int(11) NOT NULL,
  `teamid` int(11) NOT NULL,
  `groupid` int(11) NOT NULL,
  `role` varchar(256) DEFAULT NULL,
  `remarks` varchar(256) DEFAULT NULL,
  UNIQUE KEY `projid` (`projid`,`teamid`,`groupid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `team2group`
--

INSERT INTO `team2group` (`projid`, `teamid`, `groupid`, `role`, `remarks`) VALUES
(1, 1, 1, '', ''),
(1, 1, 2, NULL, NULL),
(1, 1, 3, NULL, NULL),
(1, 3, 1, NULL, NULL),
(1, 15, 3, 'koordiniert die Abnahme/Test Aktivitäten zu VoWifi ', 'von M. Bösinger genannt'),
(1, 27, 1, NULL, NULL),
(1, 11, 3, 'Wifi Calling technical Architect', 'Empfehlung Alan Law; Patent für Wifi-Calling; Mgr Ahmed Hafez'),
(1, 12, 3, 'Engineering', 'Team Simon Richartz; tief technisch Wifi-Calling'),
(1, 13, 3, 'Project Manager Wifi Calling Germany', NULL),
(1, 14, 2, NULL, NULL),
(1, 16, 2, NULL, NULL),
(1, 5, 1, NULL, NULL),
(1, 17, 3, 'tief technisch Wifi Calling', 'Kollege Nick Burmester'),
(1, 18, 6, NULL, NULL),
(1, 19, 6, 'Gesamtprojektleiter VSC', NULL),
(1, 20, 6, NULL, 'Mgr von P. Fertl'),
(1, 2, 1, NULL, NULL),
(1, 21, 1, NULL, NULL),
(1, 22, 1, NULL, NULL),
(1, 4, 1, NULL, NULL),
(1, 23, 1, NULL, NULL),
(1, 6, 1, 'Business Case Femto-Cell', 'wollte Elmar Kinkel ansprechen'),
(1, 7, 2, NULL, NULL),
(1, 8, 2, NULL, NULL),
(1, 9, 6, NULL, NULL),
(1, 10, 6, NULL, NULL),
(1, 25, 6, NULL, NULL),
(1, 26, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `travel`
--

CREATE TABLE IF NOT EXISTS `travel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `usershort` varchar(64) NOT NULL,
  `date_start` date DEFAULT NULL,
  `time_start` time DEFAULT NULL,
  `km_start` int(11) DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  `km_end` int(11) DEFAULT NULL,
  `route` varchar(256) DEFAULT NULL,
  `purpose` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Daten für Tabelle `travel`
--

INSERT INTO `travel` (`id`, `userid`, `usershort`, `date_start`, `time_start`, `km_start`, `date_end`, `time_end`, `km_end`, `route`, `purpose`) VALUES
(3, 1, 'wopl', '2014-08-26', '14:00:00', 0, '2014-08-26', '18:00:00', 74, 'Lohmar - E - Lohmar', 'Thyssen'),
(2, 1, 'wopl', '2014-11-10', '16:00:00', 150762, '2014-11-11', '16:30:00', 151456, 'Lohmar - W - H - W - Lohmar', 'Kone (Mr. Vitt)'),
(4, 1, 'wopl', '2014-06-11', '11:00:00', 96025, '2014-06-11', '20:15:00', 96395, 'Lohmar - Bad-Homburg - Lohmar', 'HP (Lufthansa Bid)'),
(9, 1, 'wopl', '2014-12-12', '17:52:00', 104813, '0000-00-00', '00:00:00', 0, '', ''),
(8, 1, 'wopl', '2014-12-11', '14:00:00', 104795, '0000-00-00', '00:00:00', 0, 'DUS - M - DUS', 'BMW Fertl, Kaindl');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(64) NOT NULL,
  `password` varchar(256) DEFAULT NULL,
  `firstname` varchar(64) DEFAULT NULL,
  `lastname` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `phone` varchar(64) DEFAULT NULL,
  `sessionctr` int(11) NOT NULL DEFAULT '0',
  `sessionts` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `addedby` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user` (`user`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `user`, `password`, `firstname`, `lastname`, `email`, `phone`, `sessionctr`, `sessionts`, `addedby`) VALUES
(1, 'wopl', '4ece1414a52ad88ec5222b80eafeb380', 'Wolfram', 'Plettscher', 'wolfram.plettscher@bluefishplc.com', '+49 2206 9054862', 100, '2015-01-24 06:36:27', ''),
(17, 'mawi', NULL, 'Martin', 'Wieschollek', 'martin.wieschollek@quinscape.de', '49231533831416', 0, NULL, ''),
(12, 'wl', '7fde9a45d4629dc4647d6f6345e00b53', 'Walburga', 'Lindemann', 'w@l.com', '', 0, '2014-10-15 17:33:14', ''),
(14, 'stmc', NULL, 'Stephen', 'Mc Cartney', 'stephen.mccartney@bluefishplc.com', '', 0, NULL, ''),
(15, 'mm', 'b3cd915d758008bd19d0f2428fbb354a', 'Max', 'Mustermann', '', '', 0, '2014-10-15 17:39:44', ''),
(18, 'padmin', '6589c59cab273225e6662a1b1558e92b', 'padmin', 'padmin', '', '', 2, '2014-12-04 20:34:54', ''),
(20, 'vebo', '5ebe2294ecd0e0f08eab7690d2a6ee69', 'Vedrana', 'Bogdan', '', '', 2, '2015-01-23 16:06:41', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user2group`
--

CREATE TABLE IF NOT EXISTS `user2group` (
  `userid` int(11) NOT NULL,
  `usershort` varchar(64) NOT NULL,
  `groupid` int(11) NOT NULL,
  `groupshort` varchar(64) NOT NULL,
  PRIMARY KEY (`userid`,`usershort`,`groupid`,`groupshort`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user2group`
--

INSERT INTO `user2group` (`userid`, `usershort`, `groupid`, `groupshort`) VALUES
(1, 'wopl', 1, 'root'),
(18, 'padmin', 2, 'projowner'),
(20, 'vebo', 3, 'projmember');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user2proj`
--

CREATE TABLE IF NOT EXISTS `user2proj` (
  `userid` int(11) NOT NULL,
  `usershort` varchar(64) NOT NULL,
  `projid` int(11) NOT NULL,
  `projshort` varchar(64) NOT NULL,
  `defaultproj` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userid`,`usershort`,`projid`,`projshort`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user2proj`
--

INSERT INTO `user2proj` (`userid`, `usershort`, `projid`, `projshort`, `defaultproj`) VALUES
(1, 'wopl', 1, 'BMW VSC', 1),
(1, 'wopl', 2, 'Dept', 0),
(1, 'wopl', 3, 'P3', 0),
(20, 'vebo', 2, 'Dept', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `_counter`
--

CREATE TABLE IF NOT EXISTS `_counter` (
  `id` varchar(20) NOT NULL,
  `clicks` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `_counter`
--

INSERT INTO `_counter` (`id`, `clicks`) VALUES
('home', 238);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `_idval`
--

CREATE TABLE IF NOT EXISTS `_idval` (
  `category` varchar(256) NOT NULL,
  `id` varchar(256) NOT NULL,
  `value` varchar(256) DEFAULT NULL,
  KEY `category` (`category`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `_idval`
--


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `_step2work`
--

CREATE TABLE IF NOT EXISTS `_step2work` (
  `workid` int(11) NOT NULL,
  `stepid` varchar(8) NOT NULL,
  `short` varchar(64) NOT NULL,
  `description` varchar(256) DEFAULT NULL,
  `status` varchar(16) NOT NULL DEFAULT 'nicht begonnen',
  PRIMARY KEY (`workid`,`stepid`,`short`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `_step2work`
--

INSERT INTO `_step2work` (`workid`, `stepid`, `short`, `description`, `status`) VALUES
(6, '11', 'AS11', 'Arbeitsschritt 1 erweitert', 'nicht begonnen'),
(5, '10', 'AS1', 'Arbeitsschritt 1', 'nicht begonnen'),
(1, '30', 'AS3', 'Arbeitsschritt 3', 'nicht begonnen'),
(1, '20', 'AS2', 'Arbeitsschritt 2', 'beendet'),
(1, '40', 'AS4', 'Arbeitsschritt 4', 'nicht begonnen'),
(5, '11', 'AS11', 'Arbeitsschritt 1 erweitert', 'nicht begonnen'),
(11, '30', 'AS3', 'Arbeitsschritt 3', 'nicht begonnen'),
(11, '40', 'AS4', 'Arbeitsschritt 4', 'nicht begonnen'),
(1, '11', 'AS11', 'Arbeitsschritt 1 erweitert', 'beendet');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `_timerecord`
--

CREATE TABLE IF NOT EXISTS `_timerecord` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `custid` int(11) DEFAULT NULL,
  `custshort` varchar(256) NOT NULL,
  `userid` int(11) NOT NULL,
  `usershort` varchar(64) NOT NULL,
  `stepid` varchar(8) NOT NULL,
  `stepshort` varchar(64) NOT NULL,
  `t_date` date DEFAULT NULL,
  `t_start` time DEFAULT NULL,
  `t_end` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=62 ;

--
-- Daten für Tabelle `_timerecord`
--

INSERT INTO `_timerecord` (`id`, `custid`, `custshort`, `userid`, `usershort`, `stepid`, `stepshort`, `t_date`, `t_start`, `t_end`) VALUES
(57, 1, 'def', 1, 'def', '11', 'def', '2014-09-30', '11:39:09', '11:39:11'),
(58, 1, 'def', 1, 'def', '11', 'def', '2014-09-30', '00:00:00', '11:39:14'),
(52, 1, 'def', 1, 'def', '10', 'def', '2014-09-30', '00:00:00', '10:38:12'),
(56, 1, 'def', 1, 'def', '11', 'def', '2014-09-30', '11:39:04', '11:39:06'),
(51, 1, 'def', 1, 'def', '10', 'def', '2014-09-30', '07:38:01', '10:38:09'),
(43, 1, 'def', 1, 'def', '10', 'def', '2014-09-28', '13:30:00', '16:45:00'),
(42, 1, 'def', 1, 'def', '10', 'def', '2014-09-27', '00:00:00', '17:48:00'),
(41, 1, 'def', 1, 'def', '10', 'def', '2014-09-26', '11:05:25', '00:00:00'),
(44, 1, 'def', 1, 'def', '10', 'def', '2014-09-28', '07:25:00', '11:20:57'),
(30, 5, 'def', 15, 'def', '11', 'def', '2014-09-20', '20:00:00', '23:00:00'),
(28, 5, 'def', 15, 'def', '11', 'def', '2014-09-21', '20:16:28', '00:00:00'),
(54, 1, 'def', 1, 'def', '20', 'def', '2014-09-30', '00:00:00', '10:40:21'),
(53, 1, 'abc', 1, 'abc', '20', 'abc', '2014-10-01', '13:00:00', '17:00:00'),
(59, 1, 'def', 1, 'def', '11', 'def', '2014-09-30', '00:00:00', '11:39:16'),
(60, 1, 'def', 1, 'def', '11', 'def', '2014-09-30', '00:00:00', '11:39:19'),
(61, 1, 'def', 1, 'def', '11', 'def', '2014-09-30', '11:39:21', '11:39:22');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `_user2work`
--

CREATE TABLE IF NOT EXISTS `_user2work` (
  `workid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `user` varchar(64) DEFAULT NULL,
  `firstname` varchar(64) DEFAULT NULL,
  `lastname` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`workid`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `_user2work`
--

INSERT INTO `_user2work` (`workid`, `userid`, `user`, `firstname`, `lastname`) VALUES
(1, 1, 'wopl', 'Wolfram', 'Plettscher'),
(6, 1, 'wopl', 'Wolfram', 'Plettscher'),
(11, 14, 'stmc', 'Stephen', 'Mc Cartney'),
(5, 15, 'mm', 'Max', 'Mustermann'),
(1, 14, 'stmc', 'Stephen', 'Mc Cartney');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `_workplace`
--

CREATE TABLE IF NOT EXISTS `_workplace` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `short` varchar(256) DEFAULT NULL,
  `kunde` varchar(256) DEFAULT NULL,
  `country` varchar(8) DEFAULT NULL,
  `zip` varchar(32) DEFAULT NULL,
  `town` varchar(256) DEFAULT NULL,
  `street` varchar(256) DEFAULT NULL,
  `number` varchar(16) DEFAULT NULL,
  `locremark` varchar(256) DEFAULT NULL,
  `contact` varchar(256) DEFAULT NULL,
  `phone` varchar(256) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `flags` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Daten für Tabelle `_workplace`
--

INSERT INTO `_workplace` (`id`, `short`, `kunde`, `country`, `zip`, `town`, `street`, `number`, `locremark`, `contact`, `phone`, `active`, `flags`) VALUES
(1, 'bluefish', 'Bluefish Communications', 'D', '40549', 'Düsseldorf', 'Ferdinand-Braun-Platz', '1', 'sieht man schon von Weitem', 'Wolfram Plettscher', '0173-3140 659', 1, '111111'),
(3, 'newcust', '', 'D', '12345', 'newTown', 'newStreet', '1234', 'very hard to find', 'Mr. Customer', '012345-6789', 0, '123456'),
(5, 'kürzel', 'Kunde', 'GB', '543212', 'This is a very important town', 'do you know this street?', '43212', 'I couldnt find this street the first time', 'otto', '(012345) 45453', 1, 'myflags'),
(6, 'bluefish1', 'Bluefish Communications', 'D', '53797', 'Lohmar', 'Krebsaueler Str.', '22d', '2. Reihe', 'Wolfram', '0172-4560452', 1, '111111'),
(18, 'qs', 'QuinScape', '', 'D-44319', 'Dortmund', 'Wittekindstraße 30', '', '', '', '', 0, ''),
(10, 'bluefish2', 'Bluefish Communications', 'D', '53797', 'Lohmar', 'Krebsaueler Str.', '22d', '2. Reihe', 'Wolfram', '0172-4560452', 0, '111111'),
(11, 'bluefish3', 'Bluefish Communications', 'D', '53797', 'Lohmar', 'Krebsaueler Str.', '22d', '2. Reihe', 'Wolfram', '0172-4560452', 1, '111111');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `_worksteps`
--

CREATE TABLE IF NOT EXISTS `_worksteps` (
  `id` varchar(8) NOT NULL,
  `short` varchar(64) NOT NULL,
  `budget` decimal(3,1) NOT NULL DEFAULT '0.0',
  `description` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `short` (`short`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `_worksteps`
--

INSERT INTO `_worksteps` (`id`, `short`, `budget`, `description`) VALUES
('10', 'AS1', 8.0, 'Arbeitsschritt 1'),
('20', 'AS2', 5.0, 'Arbeitsschritt 2'),
('11', 'AS11', 42.8, 'Arbeitsschritt 1 erweitert'),
('30', 'AS3', 0.4, 'Arbeitsschritt 3'),
('40', 'AS4', 8.0, 'Arbeitsschritt 4');

-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 26. Dez 2015 um 10:51
-- Server-Version: 5.6.24
-- PHP-Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `wptools`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `id` int(11) NOT NULL,
  `short` varchar(64) NOT NULL,
  `comment` varchar(256) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `group`
--

INSERT INTO `group` (`id`, `short`, `comment`) VALUES(1, 'root', 'root');
INSERT INTO `group` (`id`, `short`, `comment`) VALUES(2, 'projowner', 'Project Owner');
INSERT INTO `group` (`id`, `short`, `comment`) VALUES(3, 'projmember', 'Project Member');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `keyval`
--

CREATE TABLE IF NOT EXISTS `keyval` (
  `id` int(11) NOT NULL,
  `category` varchar(64) NOT NULL,
  `mykey` varchar(64) NOT NULL,
  `subkey` varchar(64) DEFAULT NULL,
  `value` varchar(256) DEFAULT NULL,
  `prio` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `keyval`
--

INSERT INTO `keyval` (`id`, `category`, `mykey`, `subkey`, `value`, `prio`) VALUES(1, 'task', 'severity', NULL, 'green', 10);
INSERT INTO `keyval` (`id`, `category`, `mykey`, `subkey`, `value`, `prio`) VALUES(2, 'task', 'severity', NULL, 'amber', 20);
INSERT INTO `keyval` (`id`, `category`, `mykey`, `subkey`, `value`, `prio`) VALUES(3, 'task', 'severity', NULL, 'red', 30);
INSERT INTO `keyval` (`id`, `category`, `mykey`, `subkey`, `value`, `prio`) VALUES(4, 'task', 'type', NULL, 'Log', 20);
INSERT INTO `keyval` (`id`, `category`, `mykey`, `subkey`, `value`, `prio`) VALUES(5, 'task', 'type', NULL, 'Issue', 30);
INSERT INTO `keyval` (`id`, `category`, `mykey`, `subkey`, `value`, `prio`) VALUES(6, 'task', 'status', NULL, 'open', 10);
INSERT INTO `keyval` (`id`, `category`, `mykey`, `subkey`, `value`, `prio`) VALUES(7, 'task', 'type', NULL, 'Generic', 10);
INSERT INTO `keyval` (`id`, `category`, `mykey`, `subkey`, `value`, `prio`) VALUES(8, 'task', 'type', NULL, 'Task', 60);
INSERT INTO `keyval` (`id`, `category`, `mykey`, `subkey`, `value`, `prio`) VALUES(9, 'task', 'severity', NULL, 'blue', 40);
INSERT INTO `keyval` (`id`, `category`, `mykey`, `subkey`, `value`, `prio`) VALUES(10, 'task', 'severity', NULL, 'grey', 50);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `projid` int(11) NOT NULL,
  `projshort` varchar(64) NOT NULL,
  `projlong` varchar(256) DEFAULT NULL,
  `ownid` int(11) NOT NULL,
  `ownshort` varchar(64) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `project`
--

INSERT INTO `project` (`projid`, `projshort`, `projlong`, `ownid`, `ownshort`) VALUES(1, 'BMW VSC', 'BMW Vehicle Small Cell', 1, 'wopl');
INSERT INTO `project` (`projid`, `projshort`, `projlong`, `ownid`, `ownshort`) VALUES(2, 'Dept', 'Bluefish Department', 1, 'wopl');
INSERT INTO `project` (`projid`, `projshort`, `projlong`, `ownid`, `ownshort`) VALUES(3, 'P3', 'Playground', 1, 'wopl');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `projgroup`
--

CREATE TABLE IF NOT EXISTS `projgroup` (
  `groupid` int(11) NOT NULL,
  `projid` int(11) NOT NULL,
  `prio` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `projgroup`
--

INSERT INTO `projgroup` (`groupid`, `projid`, `prio`, `name`) VALUES(1, 1, 2, 'Business Stream');
INSERT INTO `projgroup` (`groupid`, `projid`, `prio`, `name`) VALUES(2, 1, 3, 'Technical Stream');
INSERT INTO `projgroup` (`groupid`, `projid`, `prio`, `name`) VALUES(3, 1, 4, 'Wi-Fi Calling');
INSERT INTO `projgroup` (`groupid`, `projid`, `prio`, `name`) VALUES(4, 1, 5, 'Meeting 7.7.2014');
INSERT INTO `projgroup` (`groupid`, `projid`, `prio`, `name`) VALUES(5, 1, 6, 'Meeting 30.1.2015');
INSERT INTO `projgroup` (`groupid`, `projid`, `prio`, `name`) VALUES(6, 1, 1, 'BMW and Supplier');
INSERT INTO `projgroup` (`groupid`, `projid`, `prio`, `name`) VALUES(7, 2, 10, 'Core BF CE Team');
INSERT INTO `projgroup` (`groupid`, `projid`, `prio`, `name`) VALUES(8, 2, 30, 'Vodafone Assistance');
INSERT INTO `projgroup` (`groupid`, `projid`, `prio`, `name`) VALUES(9, 2, 20, 'extended BF Team');
INSERT INTO `projgroup` (`groupid`, `projid`, `prio`, `name`) VALUES(10, 3, 1, 'standard');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `task1`
--

CREATE TABLE IF NOT EXISTS `task1` (
  `id` int(11) NOT NULL,
  `projid` int(11) NOT NULL,
  `task_date` date DEFAULT NULL,
  `task_time` time DEFAULT NULL,
  `task_type` varchar(64) NOT NULL,
  `category` varchar(64) DEFAULT NULL,
  `subcat` varchar(64) DEFAULT NULL,
  `task_active` tinyint(1) DEFAULT '1',
  `severity` varchar(32) DEFAULT NULL,
  `status` varchar(64) NOT NULL DEFAULT 'new',
  `topic` varchar(256) DEFAULT NULL,
  `owner` varchar(256) DEFAULT NULL,
  `duedate` date DEFAULT NULL,
  `resolved_date` date DEFAULT NULL,
  `resolved_time` time DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `task1`
--

INSERT INTO `task1` (`id`, `projid`, `task_date`, `task_time`, `task_type`, `category`, `subcat`, `task_active`, `severity`, `status`, `topic`, `owner`, `duedate`, `resolved_date`, `resolved_time`) VALUES(1, 3, '2015-12-26', NULL, 'Log', '', '', 1, 'blue', 'open', 'test3', '', NULL, NULL, NULL);
INSERT INTO `task1` (`id`, `projid`, `task_date`, `task_time`, `task_type`, `category`, `subcat`, `task_active`, `severity`, `status`, `topic`, `owner`, `duedate`, `resolved_date`, `resolved_time`) VALUES(2, 2, '2015-12-26', NULL, 'Generic', '', '', 1, 'green', 'open', 'Bluefish generic Log', '', NULL, NULL, NULL);
INSERT INTO `task1` (`id`, `projid`, `task_date`, `task_time`, `task_type`, `category`, `subcat`, `task_active`, `severity`, `status`, `topic`, `owner`, `duedate`, `resolved_date`, `resolved_time`) VALUES(3, 3, '2015-12-26', NULL, 'Task', '', '', 1, 'red', 'open', 'test4', '', NULL, NULL, NULL);
INSERT INTO `task1` (`id`, `projid`, `task_date`, `task_time`, `task_type`, `category`, `subcat`, `task_active`, `severity`, `status`, `topic`, `owner`, `duedate`, `resolved_date`, `resolved_time`) VALUES(4, 2, '2015-12-26', NULL, 'generic', NULL, NULL, 1, NULL, 'new', 'new', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `task2`
--

CREATE TABLE IF NOT EXISTS `task2` (
  `id` int(11) NOT NULL,
  `projid` int(11) NOT NULL,
  `task1_id` int(11) NOT NULL,
  `task2_date` date DEFAULT NULL,
  `task2_time` time DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `remarks` varchar(1024) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `task2`
--

INSERT INTO `task2` (`id`, `projid`, `task1_id`, `task2_date`, `task2_time`, `active`, `remarks`) VALUES(1, 3, 1, '2015-12-26', NULL, NULL, 'first remark for issue test3');
INSERT INTO `task2` (`id`, `projid`, `task1_id`, `task2_date`, `task2_time`, `active`, `remarks`) VALUES(2, 3, 1, '2015-12-26', NULL, NULL, 'und noch eine neue Information');
INSERT INTO `task2` (`id`, `projid`, `task1_id`, `task2_date`, `task2_time`, `active`, `remarks`) VALUES(3, 3, 3, '2015-12-26', NULL, NULL, 'angelegt am 26.12.2015');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `teamid` int(11) NOT NULL,
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
  `remarks` varchar(256) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `team`
--

INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(1, 1, NULL, 'Wolfram', 'Plettscher', 'Bluefish Communications', 'Düsseldorf', '', 'wolfram.plettscher@bluefishplc.com', '+49 173 3140 659', 'Principal Consultant', NULL);
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(2, 1, NULL, 'Oliver', 'Masuck', '', 'München', '', 'oliver.masuck@vodafone.com', '', '', '');
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(3, 1, NULL, 'Stephen', 'McCartney', 'Bluefish Communications', 'Düsseldorf', '', 'stephen.mccartney@bluefishplc.com', '+49 173 532 2735', 'Client Partner', '');
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(4, 1, NULL, 'Rüdiger', 'Scholz', '', '', 'M2M', '', '', '', NULL);
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(5, 1, NULL, 'Marco', 'Faulhammer', '', 'Düsseldorf', '', '', '', '', NULL);
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(6, 1, NULL, 'Marcel', 'Kubon', 'Vodafone Group Services', 'Düsseldorf', 'Terminals - Innovation & Development', 'marcel.kubon@vodafone.com', '+49 172 256 6692', 'Connected Devices Manager', NULL);
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(7, 1, NULL, 'Heinz', 'Becker', '', '', '', '', '', '', NULL);
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(8, 1, NULL, 'Jürgen', 'Caldenhoven', '', '', '', '', '', '', NULL);
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(9, 1, NULL, 'Claus', 'Keuker', 'Nash Tech', 'Nuremberg', '', '', '+49 151 5500 3352', '', NULL);
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(10, 1, NULL, 'Thomas', 'Krauß', 'BMW', 'München', 'Research & Technology', 'thomas.krauss@bmw.de', '+49 89 382 27143', '', NULL);
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(11, 1, NULL, 'Walter', 'Bindrim', 'Vodafone Group Services', 'Düsseldorf', 'Strategy & Planning', 'walter.bindrim@vodafone.com', '+49 172 2077970', 'Pr Core Network & FMC Architecture Manager', NULL);
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(12, 1, NULL, 'Nick', 'Burmester', '', 'Düsseldorf', 'TGCC', 'nick.burmester@vodafone.com', '', '', '');
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(13, 1, NULL, 'Simon', 'Richartz', '', 'Düsseldorf', 'DCCC', 'simon.richartz@vodafone.com', '+49 174 202 9800', 'Network Demand Specialist', 'test');
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(14, 1, NULL, 'Alan', 'Law', 'Vodafone Group Services', 'Newbury', 'Technology Strategy and Operation', 'alan.law@vodafone.com', '+44 7748938884', 'Distinguished Engineer', NULL);
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(15, 1, NULL, 'Michael', 'Suellwold', '', '', '', '', '', '', NULL);
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(16, 1, NULL, 'Michael Andreas', 'BÃ¶singer', 'Vodafone DE', 'Dï¿½sseldorf', '', '', '', '', '');
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(17, 1, NULL, 'Mamoon', 'Rassa', 'Vodafone', 'Düsseldorf', '', 'mamoon.rassa@vodafone.com', '', '', NULL);
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(18, 1, NULL, 'Mihai', 'Steingruebner', 'BMW', '', '', 'mihai.steingruebner@bmw.de', '', '', NULL);
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(19, 1, NULL, 'Peter', 'Fertl', 'BMW', 'München', 'Research & Technology', 'peter.fertl@bmw.de', '+49 89 382 27143', '', NULL);
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(20, 1, NULL, 'Markus', 'Kaindl', 'BMW', '', '', 'markus.ka.kaindl@bmw.de', '', '', NULL);
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(21, 1, NULL, 'Gill', 'Chinderpal', 'Vodafone Group', '', '', 'chinderpal.gill@vodafone.com', '', '', NULL);
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(22, 1, NULL, 'Christina', 'Ambos', '', '', '', '', '', '', NULL);
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(23, 1, NULL, 'Guido', 'Gehlen, Dr.', 'Vodafone Group Services', 'Düsseldorf', 'Connected Product & App Development', 'gueido.gehlen@vodafone.com', '+49 172 250 8270', 'M2M Product Incubation Lead', NULL);
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(24, 0, NULL, 'Karl-Ludwig', 'Wagner', 'Nash-Tech', NULL, NULL, 'karl.wagner@nachtech.com', NULL, NULL, NULL);
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(25, 1, NULL, 'Karl-Ludwig', 'Wagner', 'Nash Tech', 'Nuremberg', '', 'karl.wagner@nashtech.com', '', '', NULL);
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(26, 1, NULL, 'Andreas', 'Schwarzmeier', 'BMW', 'München', '', '', '', '', NULL);
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(27, 1, NULL, 'Lars', 'Boesa', '', '', 'M2M', '', '', '', NULL);
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(28, 1, NULL, 'Mike', 'Prinz', '', '', 'M2M', '', '', '', NULL);
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(29, 1, NULL, 'Marc', 'Sauter', '', '', '', '', '', '', NULL);
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(30, 2, NULL, 'Noel', 'Desnos', 'Bluefish Communication CE', '', '', 'noel.desnos@bluefishplc.com', '+49 162 9705526', 'Principal Consultant', 'UK phone: +44 7881 383315');
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(31, 2, NULL, 'Lakotta', 'Torsten', 'Bluefish Communication CE', 'Hamburg', '', 'torsten.lakotta@bluefishplc.com', '', 'Principal Consultant', '');
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(32, 2, NULL, 'Stephen', 'Mc Cartney', 'Bluefish Communication CE', 'Düsseldorf', '', 'stephen.mccartney@bluefishplc.com', '+49 173 5322735', 'Client Partner', '');
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(33, 2, NULL, 'Roderich', 'Pilars', 'Bluefish Communication CE', 'Düsseldorf', '', 'roderich.pilars@bluefishplc.com', '+49 173 5489898', 'Client Partner', '');
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(34, 2, NULL, 'Wolfram', 'Plettscher', 'Bluefish Communication CE', 'Düsseldorf', '', 'wolfram@plettscher.de', '+49 173 3140659', 'Principal Consultant', '');
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(35, 2, NULL, 'Jörg', 'Refeld', 'Bluefish Communication CE', 'Düsseldorf', '', 'joerg.refeld@bluefishplc.com', '+49 171 5425000', 'Principal Consultant', '');
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(36, 2, NULL, 'Günter', 'Brast', 'Bluefish Communication CE', 'Düsseldorf', '', 'guenter.brast@bluefishplc.com', '+49 173 5900895', 'Principal Consultant', '');
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(37, 2, NULL, 'Vedrana', 'Bogdan', 'Bluefish Communication CE', 'Düsseldorf', '', 'vedrana.bogdan@bluefishplc.com', '+49 152 09104956', 'Sales Coordinator CE', '');
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(38, 2, NULL, 'Thomas', 'Wolfram', 'Bluefish Communication CE', 'Düsseldorf', '', 'thomas.wolfram@bluefishplc.com', '+49 172 5745434', 'Principal Consultant', '');
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(39, 2, NULL, 'Giles', 'Wake', 'Bluefish Communication CE', 'Düsseldorf', '', 'giles.wake@bluefishplc.com', '+49 173 7333017', 'Manager', '');
INSERT INTO `team` (`teamid`, `projid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES(40, 2, NULL, 'Evangelos', 'Zesakes', 'Bluefish Communication CE', 'München', '', 'evangelos.zesakes@bluefishplc.com', '+49 162 2816457', 'Principal Consultant', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `team2group`
--

CREATE TABLE IF NOT EXISTS `team2group` (
  `projid` int(11) NOT NULL,
  `teamid` int(11) NOT NULL,
  `groupid` int(11) NOT NULL,
  `role` varchar(256) DEFAULT NULL,
  `remarks` varchar(256) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `team2group`
--

INSERT INTO `team2group` (`projid`, `teamid`, `groupid`, `role`, `remarks`) VALUES(1, 1, 1, '', '');
INSERT INTO `team2group` (`projid`, `teamid`, `groupid`, `role`, `remarks`) VALUES(1, 1, 2, NULL, NULL);
INSERT INTO `team2group` (`projid`, `teamid`, `groupid`, `role`, `remarks`) VALUES(1, 1, 3, NULL, NULL);
INSERT INTO `team2group` (`projid`, `teamid`, `groupid`, `role`, `remarks`) VALUES(1, 3, 1, NULL, NULL);
INSERT INTO `team2group` (`projid`, `teamid`, `groupid`, `role`, `remarks`) VALUES(1, 15, 3, 'koordiniert die Abnahme/Test Aktivitäten zu VoWifi ', 'von M. Bösinger genannt');
INSERT INTO `team2group` (`projid`, `teamid`, `groupid`, `role`, `remarks`) VALUES(1, 27, 1, NULL, NULL);
INSERT INTO `team2group` (`projid`, `teamid`, `groupid`, `role`, `remarks`) VALUES(1, 11, 3, 'Wifi Calling technical Architect', 'Empfehlung Alan Law; Patent für Wifi-Calling; Mgr Ahmed Hafez');
INSERT INTO `team2group` (`projid`, `teamid`, `groupid`, `role`, `remarks`) VALUES(1, 12, 3, 'Engineering', 'Team Simon Richartz; tief technisch Wifi-Calling');
INSERT INTO `team2group` (`projid`, `teamid`, `groupid`, `role`, `remarks`) VALUES(1, 13, 3, 'Project Manager Wifi Calling Germany', NULL);
INSERT INTO `team2group` (`projid`, `teamid`, `groupid`, `role`, `remarks`) VALUES(1, 14, 2, NULL, NULL);
INSERT INTO `team2group` (`projid`, `teamid`, `groupid`, `role`, `remarks`) VALUES(1, 16, 2, NULL, NULL);
INSERT INTO `team2group` (`projid`, `teamid`, `groupid`, `role`, `remarks`) VALUES(1, 5, 1, NULL, NULL);
INSERT INTO `team2group` (`projid`, `teamid`, `groupid`, `role`, `remarks`) VALUES(1, 17, 3, 'tief technisch Wifi Calling', 'Kollege Nick Burmester');
INSERT INTO `team2group` (`projid`, `teamid`, `groupid`, `role`, `remarks`) VALUES(1, 18, 6, NULL, NULL);
INSERT INTO `team2group` (`projid`, `teamid`, `groupid`, `role`, `remarks`) VALUES(1, 19, 6, 'Gesamtprojektleiter VSC', NULL);
INSERT INTO `team2group` (`projid`, `teamid`, `groupid`, `role`, `remarks`) VALUES(1, 20, 6, NULL, 'Mgr von P. Fertl');
INSERT INTO `team2group` (`projid`, `teamid`, `groupid`, `role`, `remarks`) VALUES(1, 2, 1, NULL, NULL);
INSERT INTO `team2group` (`projid`, `teamid`, `groupid`, `role`, `remarks`) VALUES(1, 21, 1, NULL, NULL);
INSERT INTO `team2group` (`projid`, `teamid`, `groupid`, `role`, `remarks`) VALUES(1, 22, 1, NULL, NULL);
INSERT INTO `team2group` (`projid`, `teamid`, `groupid`, `role`, `remarks`) VALUES(1, 4, 1, NULL, NULL);
INSERT INTO `team2group` (`projid`, `teamid`, `groupid`, `role`, `remarks`) VALUES(1, 23, 1, NULL, NULL);
INSERT INTO `team2group` (`projid`, `teamid`, `groupid`, `role`, `remarks`) VALUES(1, 6, 1, 'Business Case Femto-Cell', 'wollte Elmar Kinkel ansprechen');
INSERT INTO `team2group` (`projid`, `teamid`, `groupid`, `role`, `remarks`) VALUES(1, 7, 2, NULL, NULL);
INSERT INTO `team2group` (`projid`, `teamid`, `groupid`, `role`, `remarks`) VALUES(1, 8, 2, NULL, NULL);
INSERT INTO `team2group` (`projid`, `teamid`, `groupid`, `role`, `remarks`) VALUES(1, 9, 6, NULL, NULL);
INSERT INTO `team2group` (`projid`, `teamid`, `groupid`, `role`, `remarks`) VALUES(1, 10, 6, NULL, NULL);
INSERT INTO `team2group` (`projid`, `teamid`, `groupid`, `role`, `remarks`) VALUES(1, 25, 6, NULL, NULL);
INSERT INTO `team2group` (`projid`, `teamid`, `groupid`, `role`, `remarks`) VALUES(1, 26, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `travel`
--

CREATE TABLE IF NOT EXISTS `travel` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `usershort` varchar(64) NOT NULL,
  `date_start` date DEFAULT NULL,
  `time_start` time DEFAULT NULL,
  `km_start` int(11) DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  `km_end` int(11) DEFAULT NULL,
  `route` varchar(256) DEFAULT NULL,
  `purpose` varchar(256) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `travel`
--

INSERT INTO `travel` (`id`, `userid`, `usershort`, `date_start`, `time_start`, `km_start`, `date_end`, `time_end`, `km_end`, `route`, `purpose`) VALUES(3, 1, 'wopl', '2014-08-26', '14:00:00', 0, '2014-08-26', '18:00:00', 74, 'Lohmar - E - Lohmar', 'Thyssen');
INSERT INTO `travel` (`id`, `userid`, `usershort`, `date_start`, `time_start`, `km_start`, `date_end`, `time_end`, `km_end`, `route`, `purpose`) VALUES(2, 1, 'wopl', '2014-11-10', '16:00:00', 150762, '2014-11-11', '16:30:00', 151456, 'Lohmar - W - H - W - Lohmar', 'Kone (Mr. Vitt)');
INSERT INTO `travel` (`id`, `userid`, `usershort`, `date_start`, `time_start`, `km_start`, `date_end`, `time_end`, `km_end`, `route`, `purpose`) VALUES(4, 1, 'wopl', '2014-06-11', '11:00:00', 96025, '2014-06-11', '20:15:00', 96395, 'Lohmar - Bad-Homburg - Lohmar', 'HP (Lufthansa Bid)');
INSERT INTO `travel` (`id`, `userid`, `usershort`, `date_start`, `time_start`, `km_start`, `date_end`, `time_end`, `km_end`, `route`, `purpose`) VALUES(9, 1, 'wopl', '2014-12-12', '17:52:00', 104813, '0000-00-00', '00:00:00', 0, '', '');
INSERT INTO `travel` (`id`, `userid`, `usershort`, `date_start`, `time_start`, `km_start`, `date_end`, `time_end`, `km_end`, `route`, `purpose`) VALUES(8, 1, 'wopl', '2014-12-11', '14:00:00', 104795, '0000-00-00', '00:00:00', 0, 'DUS - M - DUS', 'BMW Fertl, Kaindl');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `user` varchar(64) NOT NULL,
  `password` varchar(256) DEFAULT NULL,
  `firstname` varchar(64) DEFAULT NULL,
  `lastname` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `phone` varchar(64) DEFAULT NULL,
  `sessionctr` int(11) NOT NULL DEFAULT '0',
  `sessionts` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `addedby` varchar(64) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `user`, `password`, `firstname`, `lastname`, `email`, `phone`, `sessionctr`, `sessionts`, `addedby`) VALUES(1, 'wopl', '4ece1414a52ad88ec5222b80eafeb380', 'Wolfram', 'Plettscher', 'wolfram@plettscher.de', '+49 2206 9054862', 144, '2015-12-26 09:32:06', '');
INSERT INTO `user` (`id`, `user`, `password`, `firstname`, `lastname`, `email`, `phone`, `sessionctr`, `sessionts`, `addedby`) VALUES(17, 'mawi', NULL, 'Martin', 'Wieschollek', 'martin.wieschollek@quinscape.de', '49231533831416', 0, NULL, '');
INSERT INTO `user` (`id`, `user`, `password`, `firstname`, `lastname`, `email`, `phone`, `sessionctr`, `sessionts`, `addedby`) VALUES(12, 'wl', '7fde9a45d4629dc4647d6f6345e00b53', 'Walburga', 'Lindemann', 'w@l.com', '', 0, '2014-10-15 15:33:14', '');
INSERT INTO `user` (`id`, `user`, `password`, `firstname`, `lastname`, `email`, `phone`, `sessionctr`, `sessionts`, `addedby`) VALUES(14, 'stmc', NULL, 'Stephen', 'Mc Cartney', 'stephen.mccartney@bluefishplc.com', '', 0, NULL, '');
INSERT INTO `user` (`id`, `user`, `password`, `firstname`, `lastname`, `email`, `phone`, `sessionctr`, `sessionts`, `addedby`) VALUES(15, 'mm', 'b3cd915d758008bd19d0f2428fbb354a', 'Max', 'Mustermann', '', '', 0, '2015-12-21 07:05:17', '');
INSERT INTO `user` (`id`, `user`, `password`, `firstname`, `lastname`, `email`, `phone`, `sessionctr`, `sessionts`, `addedby`) VALUES(18, 'padmin', '6589c59cab273225e6662a1b1558e92b', 'padmin', 'padmin', '', '', 2, '2014-12-04 19:34:54', '');
INSERT INTO `user` (`id`, `user`, `password`, `firstname`, `lastname`, `email`, `phone`, `sessionctr`, `sessionts`, `addedby`) VALUES(20, 'vebo', '5ebe2294ecd0e0f08eab7690d2a6ee69', 'Vedrana', 'Bogdan', '', '', 2, '2015-01-23 15:06:41', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user2group`
--

CREATE TABLE IF NOT EXISTS `user2group` (
  `userid` int(11) NOT NULL,
  `usershort` varchar(64) NOT NULL,
  `groupid` int(11) NOT NULL,
  `groupshort` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user2group`
--

INSERT INTO `user2group` (`userid`, `usershort`, `groupid`, `groupshort`) VALUES(1, 'wopl', 1, 'root');
INSERT INTO `user2group` (`userid`, `usershort`, `groupid`, `groupshort`) VALUES(18, 'padmin', 2, 'projowner');
INSERT INTO `user2group` (`userid`, `usershort`, `groupid`, `groupshort`) VALUES(20, 'vebo', 3, 'projmember');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user2proj`
--

CREATE TABLE IF NOT EXISTS `user2proj` (
  `userid` int(11) NOT NULL,
  `usershort` varchar(64) NOT NULL,
  `projid` int(11) NOT NULL,
  `projshort` varchar(64) NOT NULL,
  `defaultproj` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user2proj`
--

INSERT INTO `user2proj` (`userid`, `usershort`, `projid`, `projshort`, `defaultproj`) VALUES(1, 'wopl', 1, 'BMW VSC', 0);
INSERT INTO `user2proj` (`userid`, `usershort`, `projid`, `projshort`, `defaultproj`) VALUES(1, 'wopl', 2, 'Dept', 0);
INSERT INTO `user2proj` (`userid`, `usershort`, `projid`, `projshort`, `defaultproj`) VALUES(1, 'wopl', 3, 'P3', 1);
INSERT INTO `user2proj` (`userid`, `usershort`, `projid`, `projshort`, `defaultproj`) VALUES(20, 'vebo', 2, 'Dept', 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `short` (`short`);

--
-- Indizes für die Tabelle `keyval`
--
ALTER TABLE `keyval`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`projid`), ADD UNIQUE KEY `short` (`projshort`);

--
-- Indizes für die Tabelle `projgroup`
--
ALTER TABLE `projgroup`
  ADD PRIMARY KEY (`groupid`);

--
-- Indizes für die Tabelle `task1`
--
ALTER TABLE `task1`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `task2`
--
ALTER TABLE `task2`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`teamid`);

--
-- Indizes für die Tabelle `team2group`
--
ALTER TABLE `team2group`
  ADD UNIQUE KEY `projid` (`projid`,`teamid`,`groupid`);

--
-- Indizes für die Tabelle `travel`
--
ALTER TABLE `travel`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user` (`user`);

--
-- Indizes für die Tabelle `user2group`
--
ALTER TABLE `user2group`
  ADD PRIMARY KEY (`userid`,`usershort`,`groupid`,`groupshort`);

--
-- Indizes für die Tabelle `user2proj`
--
ALTER TABLE `user2proj`
  ADD PRIMARY KEY (`userid`,`usershort`,`projid`,`projshort`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT für Tabelle `keyval`
--
ALTER TABLE `keyval`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT für Tabelle `project`
--
ALTER TABLE `project`
  MODIFY `projid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT für Tabelle `projgroup`
--
ALTER TABLE `projgroup`
  MODIFY `groupid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT für Tabelle `task1`
--
ALTER TABLE `task1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT für Tabelle `task2`
--
ALTER TABLE `task2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT für Tabelle `team`
--
ALTER TABLE `team`
  MODIFY `teamid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT für Tabelle `travel`
--
ALTER TABLE `travel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

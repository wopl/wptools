-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 12. Feb 2016 um 12:12
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
-- Tabellenstruktur für Tabelle `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `acc_uuid` char(36) NOT NULL,
  `acc_name` varchar(64) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `inv_company` varchar(128) NOT NULL,
  `inv_at` varchar(128) NOT NULL,
  `inv_add1` varchar(128) NOT NULL,
  `inv_add2` varchar(128) NOT NULL,
  `inv_street` varchar(128) NOT NULL,
  `inv_streetno` varchar(16) NOT NULL,
  `inv_town` varchar(128) NOT NULL,
  `inv_zip` varchar(16) NOT NULL,
  `inv_country` varchar(128) NOT NULL,
  `added_at` date NOT NULL,
  `added_by` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `keyval`
--

CREATE TABLE IF NOT EXISTS `keyval` (
  `keyval_uuid` char(36) NOT NULL,
  `category` varchar(64) NOT NULL,
  `mykey` varchar(64) NOT NULL,
  `subkey` varchar(64) DEFAULT NULL,
  `value` varchar(256) DEFAULT NULL,
  `prio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `acc_uuid` char(36) NOT NULL,
  `proj_uuid` char(36) NOT NULL,
  `projshort` varchar(64) NOT NULL,
  `projlong` varchar(256) DEFAULT NULL,
  `ownid` int(11) NOT NULL,
  `ownshort` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `projgroup`
--

CREATE TABLE IF NOT EXISTS `projgroup` (
  `acc_uuid` char(36) NOT NULL,
  `proj_uuid` char(36) NOT NULL,
  `projgroup_uuid` char(36) NOT NULL,
  `prio` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `task1`
--

CREATE TABLE IF NOT EXISTS `task1` (
  `acc_uuid` char(36) NOT NULL,
  `proj_uuid` char(36) NOT NULL,
  `task1_uuid` char(36) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `task2`
--

CREATE TABLE IF NOT EXISTS `task2` (
  `acc_uuid` char(36) NOT NULL,
  `proj_uuid` char(36) NOT NULL,
  `task1_uuid` char(36) NOT NULL,
  `task2_uuid` char(36) NOT NULL,
  `task2_date` date DEFAULT NULL,
  `task2_time` time DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `remarks` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `acc_uuid` char(36) NOT NULL,
  `proj_uuid` char(36) NOT NULL,
  `teammember_uuid` char(36) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `team2group`
--

CREATE TABLE IF NOT EXISTS `team2group` (
  `acc_uuid` char(36) NOT NULL,
  `proj_uuid` char(36) NOT NULL,
  `teammember_uuid` char(36) NOT NULL,
  `projgroup_uuid` char(36) NOT NULL,
  `role` varchar(256) DEFAULT NULL,
  `remarks` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `travel`
--

CREATE TABLE IF NOT EXISTS `travel` (
  `acc_uuid` char(36) NOT NULL,
  `user_uuid` char(36) NOT NULL,
  `travel_uuid` char(36) NOT NULL,
  `usershort` varchar(64) NOT NULL,
  `date_start` date DEFAULT NULL,
  `time_start` time DEFAULT NULL,
  `km_start` int(11) DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  `km_end` int(11) DEFAULT NULL,
  `route` varchar(256) DEFAULT NULL,
  `purpose` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `acc_uuid` char(36) NOT NULL,
  `user_uuid` char(36) NOT NULL,
  `user` varchar(64) NOT NULL,
  `user_role` varchar(64) NOT NULL,
  `password` varchar(256) DEFAULT NULL,
  `firstname` varchar(64) DEFAULT NULL,
  `lastname` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `phone` varchar(64) DEFAULT NULL,
  `sessionctr` int(11) NOT NULL DEFAULT '0',
  `sessionts` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `added_by` varchar(64) NOT NULL,
  `added_at` date NOT NULL,
  `validuntil` date NOT NULL,
  `signature` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user2proj`
--

CREATE TABLE IF NOT EXISTS `user2proj` (
  `acc_uuid` char(36) NOT NULL,
  `user_uuid` char(36) NOT NULL,
  `proj_uuid` char(36) NOT NULL,
  `usershort` varchar(64) NOT NULL,
  `projshort` varchar(64) NOT NULL,
  `defaultproj` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`acc_uuid`), ADD UNIQUE KEY `name` (`acc_name`);

--
-- Indizes für die Tabelle `keyval`
--
ALTER TABLE `keyval`
  ADD PRIMARY KEY (`keyval_uuid`);

--
-- Indizes für die Tabelle `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`proj_uuid`), ADD UNIQUE KEY `short` (`projshort`), ADD UNIQUE KEY `proj_uuid` (`proj_uuid`), ADD KEY `acc_uuid` (`acc_uuid`);

--
-- Indizes für die Tabelle `projgroup`
--
ALTER TABLE `projgroup`
  ADD PRIMARY KEY (`projgroup_uuid`), ADD KEY `proj_uuid` (`proj_uuid`), ADD KEY `acc_uuid` (`acc_uuid`);

--
-- Indizes für die Tabelle `task1`
--
ALTER TABLE `task1`
  ADD PRIMARY KEY (`task1_uuid`), ADD KEY `acc_uuid` (`acc_uuid`), ADD KEY `proj_uuid` (`proj_uuid`);

--
-- Indizes für die Tabelle `task2`
--
ALTER TABLE `task2`
  ADD PRIMARY KEY (`task2_uuid`), ADD KEY `acc_uuid` (`acc_uuid`), ADD KEY `proj_uuid` (`proj_uuid`), ADD KEY `task1_uuid` (`task1_uuid`);

--
-- Indizes für die Tabelle `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`teammember_uuid`), ADD KEY `acc_uuid` (`acc_uuid`), ADD KEY `proj_uuid` (`proj_uuid`);

--
-- Indizes für die Tabelle `team2group`
--
ALTER TABLE `team2group`
  ADD PRIMARY KEY (`acc_uuid`,`proj_uuid`,`teammember_uuid`,`projgroup_uuid`), ADD KEY `proj_uuid` (`proj_uuid`), ADD KEY `teammember_uuid` (`teammember_uuid`), ADD KEY `projgroup_uuid` (`projgroup_uuid`);

--
-- Indizes für die Tabelle `travel`
--
ALTER TABLE `travel`
  ADD PRIMARY KEY (`travel_uuid`), ADD KEY `acc_uuid` (`acc_uuid`), ADD KEY `user_uuid` (`user_uuid`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_uuid`), ADD UNIQUE KEY `user` (`user`), ADD KEY `acc_uuid` (`acc_uuid`);

--
-- Indizes für die Tabelle `user2proj`
--
ALTER TABLE `user2proj`
  ADD PRIMARY KEY (`acc_uuid`,`user_uuid`,`proj_uuid`), ADD KEY `up2proj` (`proj_uuid`), ADD KEY `up2user` (`user_uuid`);

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `project`
--
ALTER TABLE `project`
ADD CONSTRAINT `acc2proj` FOREIGN KEY (`acc_uuid`) REFERENCES `account` (`acc_uuid`) ON UPDATE CASCADE;

--
-- Constraints der Tabelle `projgroup`
--
ALTER TABLE `projgroup`
ADD CONSTRAINT `projgroup_ibfk_1` FOREIGN KEY (`acc_uuid`) REFERENCES `account` (`acc_uuid`) ON UPDATE CASCADE,
ADD CONSTRAINT `projgroup_ibfk_2` FOREIGN KEY (`proj_uuid`) REFERENCES `project` (`proj_uuid`) ON UPDATE CASCADE;

--
-- Constraints der Tabelle `task1`
--
ALTER TABLE `task1`
ADD CONSTRAINT `task1_ibfk_1` FOREIGN KEY (`acc_uuid`) REFERENCES `account` (`acc_uuid`) ON UPDATE CASCADE,
ADD CONSTRAINT `task1_ibfk_2` FOREIGN KEY (`proj_uuid`) REFERENCES `project` (`proj_uuid`) ON UPDATE CASCADE;

--
-- Constraints der Tabelle `task2`
--
ALTER TABLE `task2`
ADD CONSTRAINT `task2_ibfk_1` FOREIGN KEY (`acc_uuid`) REFERENCES `account` (`acc_uuid`) ON UPDATE CASCADE,
ADD CONSTRAINT `task2_ibfk_2` FOREIGN KEY (`proj_uuid`) REFERENCES `project` (`proj_uuid`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `task2_ibfk_3` FOREIGN KEY (`task1_uuid`) REFERENCES `task1` (`task1_uuid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `team`
--
ALTER TABLE `team`
ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`acc_uuid`) REFERENCES `account` (`acc_uuid`) ON UPDATE CASCADE,
ADD CONSTRAINT `team_ibfk_2` FOREIGN KEY (`proj_uuid`) REFERENCES `project` (`proj_uuid`) ON UPDATE CASCADE;

--
-- Constraints der Tabelle `team2group`
--
ALTER TABLE `team2group`
ADD CONSTRAINT `team2group_ibfk_1` FOREIGN KEY (`acc_uuid`) REFERENCES `account` (`acc_uuid`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `team2group_ibfk_2` FOREIGN KEY (`proj_uuid`) REFERENCES `project` (`proj_uuid`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `team2group_ibfk_3` FOREIGN KEY (`teammember_uuid`) REFERENCES `team` (`teammember_uuid`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `team2group_ibfk_4` FOREIGN KEY (`projgroup_uuid`) REFERENCES `projgroup` (`projgroup_uuid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `travel`
--
ALTER TABLE `travel`
ADD CONSTRAINT `travel_ibfk_1` FOREIGN KEY (`acc_uuid`) REFERENCES `account` (`acc_uuid`) ON UPDATE CASCADE,
ADD CONSTRAINT `travel_ibfk_2` FOREIGN KEY (`user_uuid`) REFERENCES `user` (`user_uuid`) ON UPDATE CASCADE;

--
-- Constraints der Tabelle `user`
--
ALTER TABLE `user`
ADD CONSTRAINT `user2acc` FOREIGN KEY (`acc_uuid`) REFERENCES `account` (`acc_uuid`) ON UPDATE CASCADE;

--
-- Constraints der Tabelle `user2proj`
--
ALTER TABLE `user2proj`
ADD CONSTRAINT `up2acc` FOREIGN KEY (`acc_uuid`) REFERENCES `account` (`acc_uuid`) ON UPDATE CASCADE,
ADD CONSTRAINT `up2proj` FOREIGN KEY (`proj_uuid`) REFERENCES `project` (`proj_uuid`) ON UPDATE CASCADE,
ADD CONSTRAINT `up2user` FOREIGN KEY (`user_uuid`) REFERENCES `user` (`user_uuid`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

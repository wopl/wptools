-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 12. Feb 2016 um 12:19
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

--
-- Daten für Tabelle `account`
--

INSERT INTO `account` (`acc_uuid`, `acc_name`, `active`, `inv_company`, `inv_at`, `inv_add1`, `inv_add2`, `inv_street`, `inv_streetno`, `inv_town`, `inv_zip`, `inv_country`, `added_at`, `added_by`) VALUES
('1', 'wp', 1, '', '', '', '', '', '', '', '', '', '0000-00-00', ''),
('777', 'test', 1, '', '', '', '', '', '', '', '', '', '0000-00-00', '');

--
-- Daten für Tabelle `keyval`
--

INSERT INTO `keyval` (`keyval_uuid`, `category`, `mykey`, `subkey`, `value`, `prio`) VALUES
('1', 'task', 'severity', NULL, 'green', 10),
('10', 'task', 'severity', NULL, 'grey', 50),
('2', 'task', 'severity', NULL, 'amber', 20),
('3', 'task', 'severity', NULL, 'red', 30),
('39fc565e-c424-11e5-b407-00ffab08c142', 'task', 'status', NULL, 'open', 10),
('4', 'task', 'type', NULL, 'Log', 20),
('5', 'task', 'type', NULL, 'Issue', 30),
('58099d02-c423-11e5-b407-00ffab08c142', 'account', 'user_role', NULL, 'root', 10),
('6c6eb64a-c423-11e5-b407-00ffab08c142', 'account', 'user_role', NULL, 'owner', 20),
('7', 'task', 'type', NULL, 'Generic', 10),
('8', 'task', 'type', NULL, 'Task', 60),
('9', 'task', 'severity', NULL, 'blue', 40),
('934676c6-c423-11e5-b407-00ffab08c142', 'account', 'user_role', NULL, 'admin', 30),
('9d598941-c423-11e5-b407-00ffab08c142', 'account', 'user_role', NULL, 'user', 40),
('a87ce3c7-c423-11e5-b407-00ffab08c142', 'account', 'user_role', NULL, 'read_only', 50);

--
-- Daten für Tabelle `project`
--

INSERT INTO `project` (`acc_uuid`, `proj_uuid`, `projshort`, `projlong`, `ownid`, `ownshort`) VALUES
('1', '1', 'BMW VSC', 'BMW Vehicle Small Cell', 1, 'wopl'),
('777', '123', '', NULL, 1, ''),
('1', '2', 'Dept', 'Bluefish Department', 1, 'wopl'),
('1', '3', 'P3', 'Playground', 1, 'wopl'),
('1', '4', 'DBSIP', 'Deutsche Bank SIP', 1, 'wopl');

--
-- Daten für Tabelle `projgroup`
--

INSERT INTO `projgroup` (`acc_uuid`, `proj_uuid`, `projgroup_uuid`, `prio`, `name`) VALUES
('1', '1', '1', 2, 'Business Stream'),
('1', '3', '10', 1, 'standard'),
('1', '4', '100ee994-c4e1-11e5-a0e8-00ffab08c142', 0, 'test'),
('1', '4', '11', 11, 'test'),
('1', '4', '12', 20, 'technical'),
('1', '4', '13', 30, 'business'),
('1', '4', '14', 40, 'management'),
('1', '1', '2', 3, 'Technical Stream'),
('1', '1', '3', 4, 'Wi-Fi Calling'),
('1', '1', '4', 5, 'Meeting 7.7.2014'),
('1', '1', '5', 6, 'Meeting 30.1.2015'),
('1', '1', '6', 1, 'BMW and Supplier'),
('1', '2', '7', 10, 'Core BF CE Team'),
('1', '2', '8', 30, 'Vodafone Assistance'),
('1', '2', '9', 20, 'extended BF Team'),
('1', '2', 'd0107ec0-c438-11e5-b407-00ffab08c142', 40, 'test');

--
-- Daten für Tabelle `task1`
--

INSERT INTO `task1` (`acc_uuid`, `proj_uuid`, `task1_uuid`, `task_date`, `task_time`, `task_type`, `category`, `subcat`, `task_active`, `severity`, `status`, `topic`, `owner`, `duedate`, `resolved_date`, `resolved_time`) VALUES
('1', '3', '1', '2015-12-26', NULL, 'Log', '', '', 1, 'blue', 'open', 'test3', '', NULL, NULL, NULL),
('1', '4', '10', '2016-01-07', NULL, 'Task', 'SIP-I', '', 1, 'green', 'open', 'Org Chart', '', NULL, NULL, NULL),
('1', '2', '2', '2015-12-26', NULL, 'Generic', '', '', 1, 'green', 'open', 'Bluefish generic Log', '', NULL, NULL, NULL),
('1', '3', '3', '2015-12-26', NULL, 'Task', '', '', 1, 'red', 'open', 'test4', '', NULL, NULL, NULL),
('1', '2', '4', '2015-12-26', NULL, 'generic', NULL, NULL, 1, NULL, 'new', 'new', NULL, NULL, NULL, NULL),
('1', '4', '5', '2016-01-04', NULL, 'Log', 'SIP general', '', 1, 'green', 'open', 'SIP Overall Progress Log', '', NULL, NULL, NULL),
('1', '3', '5e3d3337-c5a5-11e5-a1ef-00ffab08c142', '2016-01-28', NULL, 'Generic', '', '', 1, 'amber', 'open', 'Ã¶ljÃ¶  jf akjj kfj sf sfkjs fskf skfj ksfjksfjlaj Ã¶fd', '', NULL, NULL, NULL),
('1', '4', '6', '2016-01-04', NULL, 'Task', 'SIP-I', '', 1, 'green', 'open', 'SIP Infrastructure Project Charter', '', '2016-01-31', NULL, NULL),
('1', '4', '7', '2016-01-05', NULL, 'Task', 'SIP-RfP', '', 1, 'green', 'open', 'SIP RfP Vendor information', '', '2016-01-31', NULL, NULL),
('1', '4', '8', '2016-01-07', NULL, 'Task', 'SIP-I', '', 1, 'green', 'open', 'develop detailed project plan', '', NULL, NULL, NULL),
('1', '4', '9', '2016-01-07', NULL, 'Task', 'SIP-I', '', 1, 'green', 'open', 'refine and finalize SIP architecture scenarios', '', NULL, NULL, NULL);

--
-- Daten für Tabelle `task2`
--

INSERT INTO `task2` (`acc_uuid`, `proj_uuid`, `task1_uuid`, `task2_uuid`, `task2_date`, `task2_time`, `active`, `remarks`) VALUES
('1', '3', '1', '1', '2015-12-26', NULL, NULL, 'first remark for issue test3'),
('1', '3', '1', '2', '2015-12-26', NULL, NULL, 'und noch eine neue Information'),
('1', '3', '3', '3', '2015-12-26', NULL, NULL, 'angelegt am 26.12.2015'),
('1', '4', '5', '4', '2016-01-04', NULL, NULL, 'first conversation: build a project charter, budget 2016/2017 for SIP deployment for Germany only '),
('1', '3', '3', '4f6f622d-c5a5-11e5-a1ef-00ffab08c142', '2016-01-28', NULL, NULL, 'another test'),
('1', '4', '6', '5', '2016-01-05', NULL, NULL, 'received SIP RfP project charter for reference'),
('1', '4', '7', '6', '2016-01-05', NULL, NULL, 'first discussion with Noel'),
('1', '4', '7', '7', '2016-01-06', NULL, NULL, 'delivering 3page PPT first version'),
('1', '3', '5e3d3337-c5a5-11e5-a1ef-00ffab08c142', '85a22f0a-c5a5-11e5-a1ef-00ffab08c142', '2016-01-28', NULL, NULL, 'bla bla bla lksk lks df jaÃ¶slkf adskjf flksajf lkd lkf alkf flkjdlkajf lkf Ã¶lkds flksa flka jflka jflkasjd flk alksd flkajdsflkj aÃ¶lkdsj flks dflka dflk asdflka lkdf lksd flkasd flksaf lka flkasfd Ã¶lkajd flkajdf lkajfd lkasjd flka flkad flkaj fÃ¶lkajds Ã¶flka Ã¶dslkf Ã¶alkdsj fÃ¶lkadsf'),
('1', '2', '2', '9616ab60-c5a4-11e5-a1ef-00ffab08c142', '2016-01-27', NULL, 1, 'test'),
('1', '2', '2', 'fbbc2668-c5a4-11e5-a1ef-00ffab08c142', '2016-01-28', NULL, NULL, 'blabla');

--
-- Daten für Tabelle `team`
--

INSERT INTO `team` (`acc_uuid`, `proj_uuid`, `teammember_uuid`, `title`, `firstname`, `lastname`, `company`, `location`, `dept`, `email`, `phone`, `position`, `remarks`) VALUES
('1', '1', '1', NULL, 'Wolfram', 'Plettscher', 'Bluefish Communications', 'Düsseldorf', '', 'wolfram.plettscher@bluefishplc.com', '+49 173 3140 659', 'Principal Consultant', NULL),
('1', '1', '10', NULL, 'Thomas', 'Krauß', 'BMW', 'München', 'Research & Technology', 'thomas.krauss@bmw.de', '+49 89 382 27143', '', NULL),
('1', '1', '11', NULL, 'Walter', 'Bindrim', 'Vodafone Group Services', 'Düsseldorf', 'Strategy & Planning', 'walter.bindrim@vodafone.com', '+49 172 2077970', 'Pr Core Network & FMC Architecture Manager', NULL),
('1', '1', '12', NULL, 'Nick', 'Burmester', '', 'Düsseldorf', 'TGCC', 'nick.burmester@vodafone.com', '', '', ''),
('1', '1', '13', NULL, 'Simon', 'Richartz', '', 'Düsseldorf', 'DCCC', 'simon.richartz@vodafone.com', '+49 174 202 9800', 'Network Demand Specialist', 'test'),
('1', '1', '14', NULL, 'Alan', 'Law', 'Vodafone Group Services', 'Newbury', 'Technology Strategy and Operation', 'alan.law@vodafone.com', '+44 7748938884', 'Distinguished Engineer', NULL),
('1', '1', '15', NULL, 'Michael', 'Suellwold', '', '', '', '', '', '', NULL),
('1', '1', '16', NULL, 'Michael Andreas', 'BÃ¶singer', 'Vodafone DE', 'Dï¿½sseldorf', '', '', '', '', 'den hab ich besonders gern'),
('1', '1', '17', NULL, 'Mamoon', 'Rassa', 'Vodafone', 'Düsseldorf', '', 'mamoon.rassa@vodafone.com', '', '', NULL),
('1', '1', '18', NULL, 'Mihai', 'Steingruebner', 'BMW', '', '', 'mihai.steingruebner@bmw.de', '', '', NULL),
('1', '1', '19', NULL, 'Peter', 'Fertl', 'BMW', 'München', 'Research & Technology', 'peter.fertl@bmw.de', '+49 89 382 27143', '', NULL),
('1', '1', '2', NULL, 'Oliver', 'Masuck', '', 'München', '', 'oliver.masuck@vodafone.com', '', '', ''),
('1', '1', '20', NULL, 'Markus', 'Kaindl', 'BMW', '', '', 'markus.ka.kaindl@bmw.de', '', '', NULL),
('1', '1', '21', NULL, 'Gill', 'Chinderpal', 'Vodafone Group', '', '', 'chinderpal.gill@vodafone.com', '', '', NULL),
('1', '1', '22', NULL, 'Christina', 'Ambos', '', '', '', '', '', '', NULL),
('1', '1', '23', NULL, 'Guido', 'Gehlen, Dr.', 'Vodafone Group Services', 'Düsseldorf', 'Connected Product & App Development', 'gueido.gehlen@vodafone.com', '+49 172 250 8270', 'M2M Product Incubation Lead', NULL),
('1', '1', '24', NULL, 'Karl-Ludwig', 'Wagner', 'Nash-Tech', NULL, NULL, 'karl.wagner@nachtech.com', NULL, NULL, NULL),
('1', '1', '25', NULL, 'Karl-Ludwig', 'Wagner', 'Nash Tech', 'Nuremberg', '', 'karl.wagner@nashtech.com', '', '', NULL),
('1', '1', '26', NULL, 'Andreas', 'Schwarzmeier', 'BMW', 'München', '', '', '', '', NULL),
('1', '1', '27', NULL, 'Lars', 'Boesa', '', '', 'M2M', '', '', '', NULL),
('1', '1', '28', NULL, 'Mike', 'Prinz', '', '', 'M2M', '', '', '', NULL),
('1', '1', '29', NULL, 'Marc', 'Sauter', '', '', '', '', '', '', NULL),
('1', '1', '3', NULL, 'Stephen', 'McCartney', 'Bluefish Communications', 'Düsseldorf', '', 'stephen.mccartney@bluefishplc.com', '+49 173 532 2735', 'Client Partner', ''),
('1', '2', '30', NULL, 'Noel', 'Desnos', 'Bluefish Communication CE', '', '', 'noel.desnos@bluefishplc.com', '+49 162 9705526', 'Principal Consultant', 'UK phone: +44 7881 383315'),
('1', '2', '31', NULL, 'Lakotta', 'Torsten', 'Bluefish Communication CE', 'Hamburg', '', 'torsten.lakotta@bluefishplc.com', '', 'Principal Consultant', ''),
('1', '2', '32', NULL, 'Stephen', 'Mc Cartney', 'Bluefish Communication CE', 'Düsseldorf', '', 'stephen.mccartney@bluefishplc.com', '+49 173 5322735', 'Client Partner', ''),
('1', '2', '33', NULL, 'Roderich', 'Pilars', 'Bluefish Communication CE', 'Düsseldorf', '', 'roderich.pilars@bluefishplc.com', '+49 173 5489898', 'Client Partner', ''),
('1', '2', '34', NULL, 'Wolfram', 'Plettscher', 'Bluefish Communication CE', 'Düsseldorf', '', 'wolfram@plettscher.de', '+49 173 3140659', 'Principal Consultant', ''),
('1', '2', '35', NULL, 'Jörg', 'Refeld', 'Bluefish Communication CE', 'Düsseldorf', '', 'joerg.refeld@bluefishplc.com', '+49 171 5425000', 'Principal Consultant', ''),
('1', '2', '36', NULL, 'Günter', 'Brast', 'Bluefish Communication CE', 'Düsseldorf', '', 'guenter.brast@bluefishplc.com', '+49 173 5900895', 'Principal Consultant', ''),
('1', '2', '37', NULL, 'Vedrana', 'Bogdan', 'Bluefish Communication CE', 'Düsseldorf', '', 'vedrana.bogdan@bluefishplc.com', '+49 152 09104956', 'Sales Coordinator CE', ''),
('1', '2', '38', NULL, 'Thomas', 'Wolfram', 'Bluefish Communication CE', 'Düsseldorf', '', 'thomas.wolfram@bluefishplc.com', '+49 172 5745434', 'Principal Consultant', ''),
('1', '2', '39', NULL, 'Giles', 'Wake', 'Bluefish Communication CE', 'Düsseldorf', '', 'giles.wake@bluefishplc.com', '+49 173 7333017', 'Manager', ''),
('1', '1', '4', NULL, 'Rüdiger', 'Scholz', '', '', 'M2M', '', '', '', NULL),
('1', '2', '40', NULL, 'Evangelos', 'Zesakes', 'Bluefish Communication CE', 'München', '', 'evangelos.zesakes@bluefishplc.com', '+49 162 2816457', 'Principal Consultant', ''),
('1', '4', '41', NULL, 'Peter', 'Kroengen', 'Bluefish', '', '', 'peter.kroengen@db.com', '+49 157 32398407', '', ''),
('1', '4', '42', NULL, 'Maximilian', 'ZÃ¶ller', '', '', '', '', '', '', 'SIP Experte'),
('1', '4', '43', NULL, 'Thomas', 'Urner', '', '', '', '', '', '', ''),
('1', '4', '44', NULL, 'Wolfram', 'Plettscher', 'Bluefish', '', '', 'wolfram.plettscher@db.com', '+49 173 3140659', '', ''),
('1', '4', '45', NULL, 'Noel', 'Desnos', 'Bluefish', '', '', 'noel.desnos@db.com', '+49 162 9705526', 'SIP RFP Manager', ''),
('1', '4', '46', NULL, 'Peter', 'Rupp', 'Deutsche Bank', '', '', 'peter-w.rupp@db.com', '', '', ''),
('1', '4', '47', NULL, 'Fiona', 'Hertwig', 'Bluefish', '', '', 'fiona.hertwig@db.com', '+49 69 910 67835', 'PMO', ''),
('1', '4', '48', NULL, 'Nicolas', 'Nin', '', '', '', '', '', '', ''),
('1', '4', '49', NULL, 'Philipp', 'Moerschel', '', '', '', '', '', '', ''),
('1', '1', '5', NULL, 'Marco', 'Faulhammer', '', 'Düsseldorf', '', '', '', '', NULL),
('1', '4', '50', NULL, 'Simon', 'Gould', '', '', '', '', '', '', ''),
('1', '4', '51', NULL, 'Grischa', 'Studzinski', '', '', '', '', '', '', ''),
('1', '4', '52', NULL, 'Martin', 'East', '', '', '', '', '', '', ''),
('1', '1', '6', NULL, 'Marcel', 'Kubon', 'Vodafone Group Services', 'Düsseldorf', 'Terminals - Innovation & Development', 'marcel.kubon@vodafone.com', '+49 172 256 6692', 'Connected Devices Manager', NULL),
('1', '1', '7', NULL, 'Heinz', 'Becker', '', '', '', '', '', '', NULL),
('1', '1', '8', NULL, 'Jürgen', 'Caldenhoven', '', '', '', '', '', '', NULL),
('1', '1', '9', NULL, 'Claus', 'Keuker', 'Nash Tech', 'Nuremberg', '', '', '+49 151 5500 3352', '', NULL);

--
-- Daten für Tabelle `team2group`
--

INSERT INTO `team2group` (`acc_uuid`, `proj_uuid`, `teammember_uuid`, `projgroup_uuid`, `role`, `remarks`) VALUES
('1', '1', '1', '1', '', ''),
('1', '1', '1', '2', NULL, NULL),
('1', '1', '1', '3', NULL, NULL),
('1', '1', '10', '6', NULL, NULL),
('1', '1', '11', '3', 'Wifi Calling technical Architect', 'Empfehlung Alan Law; Patent für Wifi-Calling; Mgr Ahmed Hafez'),
('1', '1', '12', '3', 'Engineering', 'Team Simon Richartz; tief technisch Wifi-Calling'),
('1', '1', '13', '3', 'Project Manager Wifi Calling Germany', NULL),
('1', '1', '14', '2', NULL, NULL),
('1', '1', '15', '3', 'koordiniert die Abnahme/Test Aktivitäten zu VoWifi ', 'von M. Bösinger genannt'),
('1', '1', '16', '2', NULL, NULL),
('1', '1', '17', '3', 'tief technisch Wifi Calling', 'Kollege Nick Burmester'),
('1', '1', '18', '6', NULL, NULL),
('1', '1', '19', '6', 'Gesamtprojektleiter VSC', NULL),
('1', '1', '2', '1', NULL, NULL),
('1', '1', '20', '6', NULL, 'Mgr von P. Fertl'),
('1', '1', '21', '1', NULL, NULL),
('1', '1', '22', '1', NULL, NULL),
('1', '1', '23', '1', NULL, NULL),
('1', '1', '25', '6', NULL, NULL),
('1', '1', '26', '6', NULL, NULL),
('1', '1', '27', '1', NULL, NULL),
('1', '1', '3', '1', NULL, NULL),
('1', '1', '4', '1', NULL, NULL),
('1', '1', '5', '1', NULL, NULL),
('1', '1', '6', '1', 'Business Case Femto-Cell', 'wollte Elmar Kinkel ansprechen'),
('1', '1', '7', '2', NULL, NULL),
('1', '1', '8', '2', NULL, NULL),
('1', '1', '9', '6', NULL, NULL),
('1', '2', '36', '7', NULL, NULL),
('1', '2', '37', '7', NULL, NULL),
('1', '2', '37', '9', NULL, NULL),
('1', '4', '41', '11', NULL, NULL),
('1', '4', '41', '12', NULL, NULL),
('1', '4', '42', '11', NULL, NULL),
('1', '4', '42', '12', NULL, NULL),
('1', '4', '43', '11', NULL, NULL),
('1', '4', '43', '12', NULL, NULL),
('1', '4', '44', '11', NULL, NULL),
('1', '4', '44', '14', NULL, NULL),
('1', '4', '45', '11', NULL, NULL),
('1', '4', '45', '12', NULL, NULL),
('1', '4', '45', '13', NULL, NULL),
('1', '4', '45', '14', NULL, NULL),
('1', '4', '46', '11', NULL, NULL),
('1', '4', '46', '14', NULL, NULL),
('1', '4', '47', '11', NULL, NULL),
('1', '4', '47', '14', NULL, NULL),
('1', '4', '48', '13', NULL, NULL);

--
-- Daten für Tabelle `travel`
--

INSERT INTO `travel` (`acc_uuid`, `user_uuid`, `travel_uuid`, `usershort`, `date_start`, `time_start`, `km_start`, `date_end`, `time_end`, `km_end`, `route`, `purpose`) VALUES
('1', '1', '2', 'wopl', '2014-11-10', '16:00:00', 150762, '2014-11-11', '16:30:00', 151456, 'Lohmar - W - H - W - Lohmar', 'Kone (Mr. Vitt)'),
('1', '1', '3', 'wopl', '2014-08-26', '14:00:00', 0, '2014-08-26', '18:00:00', 74, 'Lohmar - E - Lohmar', 'Thyssen'),
('1', '1', '4', 'wopl', '2014-06-11', '11:00:00', 96025, '2014-06-11', '20:15:00', 96395, 'Lohmar - Bad-Homburg - Lohmar', 'HP (Lufthansa Bid)'),
('1', '1', '8', 'wopl', '2014-12-11', '14:00:00', 104795, '0000-00-00', '00:00:00', 0, 'DUS - M - DUS', 'BMW Fertl, Kaindl'),
('1', '1', '9', 'wopl', '2014-12-12', '17:52:00', 104813, '0000-00-00', '00:00:00', 0, '', ''),
('1', '1', 'b69943b6-d177-11e5-9969-00ffab08c142', 'wopl', '2016-02-12', '00:00:00', 1234, '0000-00-00', '00:00:00', 2345, '', '');

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`acc_uuid`, `user_uuid`, `user`, `user_role`, `password`, `firstname`, `lastname`, `email`, `phone`, `sessionctr`, `sessionts`, `added_by`, `added_at`, `validuntil`, `signature`) VALUES
('1', '1', 'wopl', 'root', '4ece1414a52ad88ec5222b80eafeb380', 'Wolfram', 'Plettscher', 'wolfram@plettscher.de', '+49 2206 9054862', 190, '2016-02-12 10:57:40', '', '0000-00-00', '0000-00-00', ''),
('1', '12', 'wl', 'user', '7fde9a45d4629dc4647d6f6345e00b53', 'Walburga', 'Lindemann', 'w@l.com', '', 0, '2016-01-26 12:27:37', '', '0000-00-00', '0000-00-00', ''),
('1', '14', 'stmc', 'user', NULL, 'Stephen', 'Mc Cartney', 'stephen.mccartney@bluefishplc.com', '', 0, '2016-01-26 12:27:37', '', '0000-00-00', '0000-00-00', ''),
('1', '15', 'mm', 'user', 'b3cd915d758008bd19d0f2428fbb354a', 'Max', 'Mustermann', '', '', 0, '2016-01-26 12:27:37', '', '0000-00-00', '0000-00-00', ''),
('1', '17', 'mawi', 'user', NULL, 'Martin', 'Wieschollek', 'martin.wieschollek@quinscape.de', '49231533831416', 0, '2016-01-26 12:27:37', '', '0000-00-00', '0000-00-00', ''),
('1', '18', 'padmin', 'user', '6589c59cab273225e6662a1b1558e92b', 'padmin', 'padmin', '', '', 2, '2016-01-26 15:22:34', '', '0000-00-00', '0000-00-00', ''),
('1', '20', 'vebo', 'user', '5ebe2294ecd0e0f08eab7690d2a6ee69', 'Vedrana', 'Bogdan', '', '', 2, '2016-01-26 12:27:37', '', '0000-00-00', '0000-00-00', '');

--
-- Daten für Tabelle `user2proj`
--

INSERT INTO `user2proj` (`acc_uuid`, `user_uuid`, `proj_uuid`, `usershort`, `projshort`, `defaultproj`) VALUES
('1', '1', '1', 'wopl', 'BMW VSC', 0),
('1', '1', '2', 'wopl', 'Dept', 1),
('1', '1', '3', 'wopl', 'P3', 0),
('1', '1', '4', 'wopl', 'DBSIP', 0),
('1', '20', '2', 'vebo', 'Dept', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

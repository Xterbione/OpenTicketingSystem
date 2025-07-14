-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 14, 2025 at 11:46 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `databasewebapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `file_locations`
--

CREATE TABLE IF NOT EXISTS `file_locations` (
  `FLNum` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(255) NOT NULL,
  PRIMARY KEY (`FLNum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `file_locations`
--

INSERT INTO `file_locations` (`FLNum`, `location`) VALUES
(1, '/uploads/kennisitems/');

-- --------------------------------------------------------

--
-- Table structure for table `kennisitems`
--

CREATE TABLE IF NOT EXISTS `kennisitems` (
  `Item_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Item_Name` varchar(255) NOT NULL,
  `FileName` varchar(255) NOT NULL,
  `FLNum` int(11) DEFAULT NULL,
  PRIMARY KEY (`Item_ID`),
  KEY `FLNum` (`FLNum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `kennisitems`
--

INSERT INTO `kennisitems` (`Item_ID`, `Item_Name`, `FileName`, `FLNum`) VALUES
(0, 'No item selected', 'None', 1),
(1, 'test123', '575015eea84850342d5234824bc06c9967922a851fd62201e9220236cfb809e6.docx', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE IF NOT EXISTS `login_history` (
  `user_id` text NOT NULL,
  `LastLoginDate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_history`
--

INSERT INTO `login_history` (`user_id`, `LastLoginDate`) VALUES
('1', '2025-07-13 17:55:36'),
('1', '2025-07-13 18:03:50'),
('2', '2025-07-13 18:12:01'),
('1', '2025-07-13 18:20:01'),
('1', '2025-07-13 18:56:49'),
('2', '2025-07-13 20:23:18'),
('1', '2025-07-14 08:49:52'),
('2', '2025-07-14 09:24:32'),
('1', '2025-07-14 10:23:53'),
('2', '2025-07-14 10:29:32'),
('2', '2025-07-14 10:44:47'),
('1', '2025-07-14 10:46:33'),
('2', '2025-07-14 10:46:58'),
('2', '2025-07-14 10:48:04'),
('1', '2025-07-14 11:24:19'),
('2', '2025-07-14 11:25:00'),
('2', '2025-07-14 11:25:20'),
('1', '2025-07-14 11:25:34'),
('2', '2025-07-14 11:26:15'),
('1', '2025-07-14 11:29:14'),
('2', '2025-07-14 11:29:25'),
('2', '2025-07-14 11:30:06'),
('2', '2025-07-14 11:32:19'),
('1', '2025-07-14 11:32:32'),
('2', '2025-07-14 11:33:04'),
('1', '2025-07-14 11:33:41'),
('2', '2025-07-14 11:34:13'),
('1', '2025-07-14 11:34:44'),
('2', '2025-07-14 11:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `Notify_ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_ID` int(11) NOT NULL,
  `Notify_title` varchar(255) NOT NULL,
  `Notify_content` text NOT NULL,
  `dateofcreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Notify_ID`),
  KEY `User_ID` (`User_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`Notify_ID`, `User_ID`, `Notify_title`, `Notify_content`, `dateofcreation`) VALUES
(10, 2, 'Koppeling gemaakt', 'u bent gekoppeld aan ticket: <a href=''ticketview.php?ticketid=78a28551d07476916ff9f9e385f65f0a''> 78a28551d07476916ff9f9e385f65f0a</a>', '2025-07-14 09:33:24'),
(11, 2, 'Nieuwe reactie!', 'er is een nieuwe reactie toegevoegd:  <a href=''ticketview.php?ticketid=78a28551d07476916ff9f9e385f65f0a''> 78a28551d07476916ff9f9e385f65f0a</a>', '2025-07-14 09:33:57');

-- --------------------------------------------------------

--
-- Table structure for table `onderwerpen`
--

CREATE TABLE IF NOT EXISTS `onderwerpen` (
  `onderwerpnr` int(11) NOT NULL AUTO_INCREMENT,
  `onderwerptitel` varchar(254) NOT NULL,
  `enabled` int(1) NOT NULL,
  PRIMARY KEY (`onderwerpnr`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `onderwerpen`
--

INSERT INTO `onderwerpen` (`onderwerpnr`, `onderwerptitel`, `enabled`) VALUES
(1, 'BSO', 1),
(2, 'Yellowyard', 1),
(3, 'DETA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `SettingName` varchar(255) NOT NULL,
  `SettingValue` text,
  `LastEditBy` int(11) DEFAULT NULL,
  `LastEditOn` datetime DEFAULT NULL,
  PRIMARY KEY (`SettingName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`SettingName`, `SettingValue`, `LastEditBy`, `LastEditOn`) VALUES
('BrandCollor', '#b51248', 2, '2025-07-14 11:31:49'),
('BrandCollor2', '#b51248', 2, '2025-07-14 11:31:49'),
('CompanyName', 'Pink Company', 2, '2025-07-14 10:47:52'),
('LogoLink', '.', 2, '2025-07-14 10:40:10'),
('MailDomain', 'example.comm', 2, '2025-07-13 18:16:55'),
('MailEnabled', '0', 2, '2025-07-13 18:16:54'),
('MailFromName', 'Ergolabs Bot', 2, '2025-07-13 18:29:01'),
('MailHost', 'smtp.example.com', 1, '2025-07-13 10:00:00'),
('MailPassword', 'password123m', 2, '2025-07-13 18:29:01'),
('MailPort', '587', 1, '2025-07-13 10:00:00'),
('MailSMTPauthentication', '1', 1, '2025-07-13 10:00:00'),
('MailUser', 'user@example.comm', 2, '2025-07-13 18:29:01'),
('MenuCustomize', 'https://code.getmdl.io/1.3.0/material.pink-indigo.min.css', 2, '2025-07-14 11:30:39'),
('SMTPSecure', 'SSL', 2, '2025-07-13 18:16:55');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `Ticket_ID` varchar(32) NOT NULL,
  `onderwerp` varchar(254) NOT NULL,
  `aanmaakdatum` text NOT NULL,
  `Titel` varchar(254) NOT NULL,
  `content` text NOT NULL,
  `Status` varchar(254) NOT NULL,
  `Creator_ID` text NOT NULL,
  `gearchiveerd` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Ticket_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`Ticket_ID`, `onderwerp`, `aanmaakdatum`, `Titel`, `content`, `Status`, `Creator_ID`, `gearchiveerd`) VALUES
('13849c3d11835419a0d14ed89cd1e3a3', 'Yellowyard', '2025-07-14 11:35:24', 'uren registreren', 'ik kan mijn uren niet registreren? veld is niet aanklickbaar.. kom net terug van ziekte.', 'open', '1', 0),
('78a28551d07476916ff9f9e385f65f0a', 'DETA', '2025-07-14 11:32:55', 'Applicatie offline', 'ik kan niet bij de app! help!', 'gesloten', '1', 1),
('cb053cf52f5e37e4b8ffbec74f0857f2', 'BSO', '2025-07-14 11:24:53', 'krijg de mail niet', 'de mail van BSO komt niet binnen...', 'gesloten', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_comments`
--

CREATE TABLE IF NOT EXISTS `ticket_comments` (
  `Ticket_ID` varchar(32) NOT NULL,
  `Comment_ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_ID` int(11) NOT NULL,
  `PostDatum` varchar(254) NOT NULL,
  `Comment` text NOT NULL,
  `kennisitem_id` int(11) NOT NULL,
  PRIMARY KEY (`Comment_ID`),
  KEY `fk_kennisitem` (`kennisitem_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `ticket_comments`
--

INSERT INTO `ticket_comments` (`Ticket_ID`, `Comment_ID`, `User_ID`, `PostDatum`, `Comment`, `kennisitem_id`) VALUES
('cb053cf52f5e37e4b8ffbec74f0857f2', 52, 2, '2025-07-14 11:25:10', 'heb je de spam al gecontrolleerd?', 0),
('cb053cf52f5e37e4b8ffbec74f0857f2', 53, 1, '2025-07-14 11:25:45', 'oh, hah! thx!', 0),
('78a28551d07476916ff9f9e385f65f0a', 54, 2, '2025-07-14 11:33:24', 'kijk even naar het bijgevoegde document..', 1),
('78a28551d07476916ff9f9e385f65f0a', 55, 1, '2025-07-14 11:33:57', 'thanks!', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_koppelingen`
--

CREATE TABLE IF NOT EXISTS `ticket_koppelingen` (
  `Ticket_ID` varchar(32) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `ToegevoegdOp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `koppel_ID` int(11) NOT NULL AUTO_INCREMENT,
  `hide` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`koppel_ID`),
  KEY `Ticket_ID` (`Ticket_ID`),
  KEY `User_ID` (`User_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ticket_koppelingen`
--

INSERT INTO `ticket_koppelingen` (`Ticket_ID`, `User_ID`, `ToegevoegdOp`, `koppel_ID`, `hide`) VALUES
('cb053cf52f5e37e4b8ffbec74f0857f2', 2, '2025-07-14 09:25:11', 4, 1),
('78a28551d07476916ff9f9e385f65f0a', 2, '2025-07-14 09:33:24', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `User_ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `MailAddress` varchar(255) NOT NULL,
  `password` varchar(10000) NOT NULL,
  `salt` varchar(1000) NOT NULL,
  `Groupnum` int(11) NOT NULL,
  `DateOfCreation` datetime NOT NULL,
  `mailme` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`User_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `UserName`, `name`, `MailAddress`, `password`, `salt`, `Groupnum`, `DateOfCreation`, `mailme`) VALUES
(1, 'test123', 'test123', 'test123@test123.nl', '1160b8f962cb5556f484a185372fb49d6678421f61bbfd3e5b39009b38cbc33d', 'ÃšÃºÂŠÃ¨Â‡Â•Ã³sUÃ’]Ã­Ã¦Â€Ã¶Â›Â¡Â”Ã¦Â‘+Â¼m?@-f', 0, '2025-07-13 17:54:08', 1),
(2, 'oger', 'ergolabs', 'noreply@ergolabs.nl', '2ecf72939faa4520665cb812c8f6e95efab4c727011ddd0b0b0cc8e34b936a66', 'Â±ÂŽÃÂ›\nYo-Ã‰Â‚2"Ã Ã™Â„"Ã­ÂÃ¾ZÃ“_Â¼Â”Ã‡\ZÃŒUÃ‘Ã½', 1, '2025-07-13 18:11:22', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kennisitems`
--
ALTER TABLE `kennisitems`
  ADD CONSTRAINT `kennisitems_ibfk_1` FOREIGN KEY (`FLNum`) REFERENCES `file_locations` (`FLNum`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket_comments`
--
ALTER TABLE `ticket_comments`
  ADD CONSTRAINT `fk_kennisitem` FOREIGN KEY (`kennisitem_id`) REFERENCES `kennisitems` (`Item_ID`);

--
-- Constraints for table `ticket_koppelingen`
--
ALTER TABLE `ticket_koppelingen`
  ADD CONSTRAINT `ticket_koppelingen_ibfk_1` FOREIGN KEY (`Ticket_ID`) REFERENCES `tickets` (`Ticket_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `ticket_koppelingen_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

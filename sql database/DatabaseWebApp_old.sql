-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 03 apr 2018 om 09:54
-- Serverversie: 5.7.21-0ubuntu0.17.10.1
-- PHP-versie: 7.1.15-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DatabaseWebApp`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Login_History`
--

CREATE TABLE `Login_History` (
  `user_id` text NOT NULL,
  `LastLoginDate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Login_History`
--

INSERT INTO `Login_History` (`user_id`, `LastLoginDate`) VALUES
('25', '2018-03-26 13:49:23'),
('12', '2018-03-26 13:49:32'),
('12', '2018-03-26 13:49:41'),
('12', '2018-03-26 13:49:43'),
('12', '2018-03-26 13:49:45'),
('25', '2018-03-26 13:52:44'),
('12', '2018-03-26 13:54:43'),
('25', '2018-03-26 13:56:50'),
('12', '2018-03-26 14:04:14'),
('25', '2018-03-26 14:04:23'),
('12', '2018-03-26 14:47:57'),
('12', '2018-03-26 14:48:32'),
('12', '2018-03-27 09:14:02'),
('25', '2018-03-27 09:28:19'),
('12', '2018-03-27 11:52:53'),
('25', '2018-03-27 12:09:16'),
('12', '2018-03-27 12:29:41'),
('25', '2018-03-27 12:42:23'),
('12', '2018-03-27 13:18:42'),
('25', '2018-03-27 13:18:48'),
('25', '2018-03-27 13:29:10'),
('12', '2018-03-27 13:39:01'),
('25', '2018-03-27 13:41:58'),
('12', '2018-03-27 14:24:08'),
('25', '2018-03-27 14:24:25'),
('12', '2018-03-27 14:33:59'),
('12', '2018-03-27 14:37:36'),
('25', '2018-03-27 14:38:04'),
('12', '2018-03-27 14:41:19'),
('12', '2018-03-27 14:41:30'),
('25', '2018-03-27 14:41:37'),
('12', '2018-03-27 14:42:22'),
('25', '2018-03-27 14:42:33'),
('12', '2018-03-27 14:42:43'),
('25', '2018-03-27 14:50:52'),
('12', '2018-03-27 14:52:01'),
('25', '2018-03-27 14:52:06'),
('12', '2018-03-27 14:52:15'),
('12', '2018-03-27 16:20:15'),
('25', '2018-03-27 16:20:36'),
('12', '2018-03-28 09:25:08'),
('25', '2018-03-28 09:27:04'),
('12', '2018-03-28 10:12:51'),
('12', '2018-03-28 11:35:46'),
('25', '2018-03-28 12:16:32'),
('12', '2018-03-28 12:18:15'),
('12', '2018-03-28 12:25:39'),
('12', '2018-03-28 12:27:04'),
('12', '2018-03-28 13:12:06'),
('25', '2018-03-28 14:30:31'),
('12', '2018-03-28 14:32:32'),
('12', '2018-03-28 14:38:07'),
('12', '2018-03-28 14:47:09'),
('12', '2018-03-28 14:47:22'),
('25', '2018-03-28 14:47:30'),
('12', '2018-03-28 14:48:19'),
('12', '2018-03-28 15:36:59'),
('25', '2018-03-28 15:37:27'),
('12', '2018-03-28 16:45:06'),
('12', '2018-03-28 16:57:07'),
('25', '2018-03-28 16:59:51'),
('12', '2018-03-28 17:07:38'),
('25', '2018-03-28 17:15:47'),
('25', '2018-03-28 17:22:17'),
('12', '2018-03-28 17:22:32'),
('25', '2018-03-28 17:30:59'),
('12', '2018-03-28 17:40:36'),
('25', '2018-03-28 17:41:35'),
('12', '2018-03-28 17:46:04'),
('25', '2018-03-28 17:46:09'),
('12', '2018-03-28 17:46:21'),
('12', '2018-03-28 17:55:14'),
('25', '2018-03-28 18:13:24'),
('12', '2018-03-28 18:15:41'),
('25', '2018-03-28 18:30:04'),
('12', '2018-03-28 18:30:27'),
('12', '2018-03-28 18:32:46'),
('25', '2018-03-28 18:33:02'),
('12', '2018-03-28 18:34:30'),
('25', '2018-03-28 18:36:50'),
('12', '2018-03-28 18:38:39'),
('25', '2018-03-28 18:39:21'),
('12', '2018-03-28 18:43:28'),
('12', '2018-03-29 09:12:49'),
('25', '2018-03-29 09:13:03'),
('12', '2018-03-29 09:15:28'),
('25', '2018-03-29 09:17:56'),
('12', '2018-03-29 09:25:59'),
('12', '2018-03-29 10:39:14'),
('25', '2018-03-29 10:46:18'),
('12', '2018-03-29 10:46:34'),
('25', '2018-03-29 10:49:25'),
('12', '2018-03-29 10:56:53'),
('12', '2018-03-29 11:42:03'),
('12', '2018-03-29 12:13:05'),
('12', '2018-03-29 12:18:15'),
('12', '2018-03-29 13:17:05'),
('25', '2018-03-29 13:48:00'),
('12', '2018-03-29 13:50:25'),
('12', '2018-03-29 13:53:29'),
('12', '2018-03-29 13:54:53'),
('26', '2018-03-29 13:55:35'),
('12', '2018-03-29 14:01:17'),
('25', '2018-03-29 14:13:58'),
('12', '2018-03-29 14:14:18'),
('25', '2018-03-29 14:17:56'),
('12', '2018-03-29 14:18:20'),
('26', '2018-03-29 14:45:21'),
('25', '2018-03-29 14:46:10'),
('12', '2018-03-29 14:46:55'),
('25', '2018-03-29 14:50:56'),
('12', '2018-03-29 14:51:13'),
('12', '2018-03-29 16:22:41'),
('12', '2018-03-29 16:30:02'),
('12', '2018-03-30 09:21:30'),
('12', '2018-03-30 10:21:40'),
('25', '2018-03-30 10:21:48'),
('12', '2018-03-30 10:27:54'),
('12', '2018-03-30 11:29:08'),
('25', '2018-03-30 11:29:12'),
('12', '2018-03-30 11:31:32'),
('12', '2018-03-30 13:09:57'),
('12', '2018-03-30 13:58:23'),
('26', '2018-03-30 14:33:20'),
('12', '2018-03-30 14:33:52'),
('25', '2018-03-30 14:35:06'),
('12', '2018-03-30 14:36:06'),
('25', '2018-03-30 21:33:30'),
('12', '2018-03-30 21:34:05'),
('12', '2018-03-31 21:20:30'),
('25', '2018-03-31 22:01:43'),
('12', '2018-04-02 12:53:58'),
('12', '2018-04-02 13:11:46'),
('26', '2018-04-02 13:12:29'),
('12', '2018-04-02 16:00:56'),
('26', '2018-04-02 20:09:29'),
('12', '2018-04-02 20:10:21'),
('12', '2018-04-03 09:16:34');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Notifications`
--

CREATE TABLE `Notifications` (
  `User_ID` text NOT NULL,
  `notify_ID` int(11) NOT NULL,
  `Notify_title` text NOT NULL,
  `Notify_content` text NOT NULL,
  `dateofcreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Notifications`
--

INSERT INTO `Notifications` (`User_ID`, `notify_ID`, `Notify_title`, `Notify_content`, `dateofcreation`) VALUES
('14', 24, 'Koppeling gemaakt', 'u bent gekoppeld aan ticket: <a href=\'ticketview.php?ticketid=686b156b9f91b41a8c530407d742ce69\'> 686b156b9f91b41a8c530407d742ce69</a>', '2018-03-28 15:55:28'),
('14', 28, 'Koppeling gemaakt', 'u bent gekoppeld aan ticket: <a href=\'ticketview.php?ticketid=667dc1a6df09604df167ff180e04e75a\'> 667dc1a6df09604df167ff180e04e75a</a>', '2018-03-28 16:39:08'),
('22', 30, 'Koppeling gemaakt', 'u bent gekoppeld aan ticket: <a href=\'ticketview.php?ticketid=667dc1a6df09604df167ff180e04e75a\'> 667dc1a6df09604df167ff180e04e75a</a>', '2018-03-28 16:44:24'),
('24', 31, 'Koppeling gemaakt', 'u bent gekoppeld aan ticket: <a href=\'ticketview.php?ticketid=667dc1a6df09604df167ff180e04e75a\'> 667dc1a6df09604df167ff180e04e75a</a>', '2018-03-28 16:45:09'),
('18', 32, 'Koppeling gemaakt', 'u bent gekoppeld aan ticket: <a href=\'ticketview.php?ticketid=667dc1a6df09604df167ff180e04e75a\'> 667dc1a6df09604df167ff180e04e75a</a>', '2018-03-28 16:45:27'),
('14', 37, 'Koppeling gemaakt', 'u bent gekoppeld aan ticket: <a href=\'ticketview.php?ticketid=fc99d6e26a97ef63d815c1a5be359ea3\'> fc99d6e26a97ef63d815c1a5be359ea3</a>', '2018-03-29 07:33:35'),
('22', 40, 'Koppeling gemaakt', 'u bent gekoppeld aan ticket: <a href=\'ticketview.php?ticketid=2bc43b5fbf53598b451b43d505f34c5f\'> 2bc43b5fbf53598b451b43d505f34c5f</a>', '2018-03-29 08:47:53'),
('14', 41, 'Koppeling gemaakt', 'u bent gekoppeld aan ticket: <a href=\'ticketview.php?ticketid=2bc43b5fbf53598b451b43d505f34c5f\'> 2bc43b5fbf53598b451b43d505f34c5f</a>', '2018-03-29 09:25:22'),
('18', 43, 'Koppeling gemaakt', 'u bent gekoppeld aan ticket: <a href=\'ticketview.php?ticketid=c211bc13628eb04c07676014d798ed14\'> c211bc13628eb04c07676014d798ed14</a>', '2018-03-29 12:07:09'),
('14', 45, 'Koppeling gemaakt', 'u bent gekoppeld aan ticket: <a href=\'ticketview.php?ticketid=1ab62019bb79af3024c05131bec8f2c1\'> 1ab62019bb79af3024c05131bec8f2c1</a>', '2018-03-29 12:14:58'),
('24', 48, 'Koppeling gemaakt', 'u bent gekoppeld aan ticket: <a href=\'ticketview.php?ticketid=328aa1e9024bcf0d9fe821035981d4ad\'> 328aa1e9024bcf0d9fe821035981d4ad</a>', '2018-03-29 12:54:33'),
('14', 49, 'Koppeling gemaakt', 'u bent gekoppeld aan ticket: <a href=\'ticketview.php?ticketid=c211bc13628eb04c07676014d798ed14\'> c211bc13628eb04c07676014d798ed14</a>', '2018-03-30 11:42:42'),
('24', 57, 'Koppeling gemaakt', 'u bent gekoppeld aan ticket: <a href=\'ticketview.php?ticketid=c211bc13628eb04c07676014d798ed14\'> c211bc13628eb04c07676014d798ed14</a>', '2018-04-02 11:08:08'),
('18', 58, 'Koppeling gemaakt', 'u bent gekoppeld aan ticket: <a href=\'ticketview.php?ticketid=c211bc13628eb04c07676014d798ed14\'> c211bc13628eb04c07676014d798ed14</a>', '2018-04-02 11:09:08');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `onderwerpen`
--

CREATE TABLE `onderwerpen` (
  `onderwerpnr` int(11) NOT NULL,
  `onderwerptitel` varchar(254) NOT NULL,
  `enabled` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `onderwerpen`
--

INSERT INTO `onderwerpen` (`onderwerpnr`, `onderwerptitel`, `enabled`) VALUES
(1, 'BSO', 1),
(2, 'Yellowyard', 1),
(3, 'DETA', 1),
(4, 'TicketingSystem', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tickets`
--

CREATE TABLE `tickets` (
  `Ticket_ID` varchar(32) NOT NULL,
  `onderwerp` varchar(254) NOT NULL,
  `aanmaakdatum` text NOT NULL,
  `Titel` varchar(254) NOT NULL,
  `content` text NOT NULL,
  `Status` varchar(254) NOT NULL,
  `Creator_ID` text NOT NULL,
  `gearchiveerd` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tickets`
--

INSERT INTO `tickets` (`Ticket_ID`, `onderwerp`, `aanmaakdatum`, `Titel`, `content`, `Status`, `Creator_ID`, `gearchiveerd`) VALUES
('13d5a25a0ee5d18b45acd9f8c926a2ad', 'BSO', '2018-03-30 14:33:48', 'test ticket', 'plaatshouder voor ticketing system', 'behandelen', '26', 0),
('1ab62019bb79af3024c05131bec8f2c1', 'BSO', '2018-03-29 14:14:13', 'test ticket', 'cbuidbsuew', 'gesloten', '25', 1),
('2bc43b5fbf53598b451b43d505f34c5f', 'BSO', '2018-03-29 10:46:31', 'random ticket', 'hioepfhwoqiphfew', 'gesloten', '25', 1),
('328aa1e9024bcf0d9fe821035981d4ad', 'Yellowyard', '2018-03-29 14:51:09', 'yellowyard', 'eem testn', 'gesloten', '25', 0),
('468b9ba8a27288e117ce92e92cdfb3cc', 'Yellowyard', '2018-03-28 17:46:17', 'test 3', 'test 3', 'gesloten', '25', 1),
('667dc1a6df09604df167ff180e04e75a', 'DETA', '2018-03-28 18:34:17', 'test', 'testest', 'gesloten', '25', 1),
('686b156b9f91b41a8c530407d742ce69', 'Yellowyard', '2018-03-28 17:40:09', 'test', 'even testen', 'gesloten', '25', 1),
('73f8b153571d738de9e2e501546248dc', 'TicketingSystem', '2018-03-30 21:33:48', 'ndkjvhpiwehi', 'hciorqhfoiqep', 'behandelen', '25', 0),
('74c47232ba22323c56571975f5da8fa1', 'Yellowyard', '2018-03-28 17:44:48', 'kijken of fix werkt', 'fix werkt?', 'gesloten', '25', 1),
('ab2328771ec2c25d1c72b2b3aa2ad99c', 'BSO', '2018-03-28 17:45:48', 'test', 'test', 'gesloten', '25', 1),
('b4a44bda5b8658807b34a2a594fb8fea', 'BSO', '2018-03-28 18:15:12', 'inloggen', 'ik kan niet inloggen op de BSO. weten jullie hier wat van?', 'gesloten', '25', 1),
('c211bc13628eb04c07676014d798ed14', 'TicketingSystem', '2018-03-29 13:56:15', 'handleiding', 'waar kan ik een handleiding vinden over dit systeem voor mijn personeel?\r\nM.v.g\r\nM.Ruyter', 'behandelen', '26', 0),
('fc99d6e26a97ef63d815c1a5be359ea3', 'Yellowyard', '2018-03-29 09:15:25', 'test', 'test', 'gesloten', '25', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Ticket_Comments`
--

CREATE TABLE `Ticket_Comments` (
  `Ticket_ID` varchar(32) NOT NULL,
  `Comment_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `PostDatum` varchar(254) NOT NULL,
  `Comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Ticket_Comments`
--

INSERT INTO `Ticket_Comments` (`Ticket_ID`, `Comment_ID`, `User_ID`, `PostDatum`, `Comment`) VALUES
('2bc43b5fbf53598b451b43d505f34c5f', 42, 12, '2018-03-29 13:17:31', 'test'),
('2bc43b5fbf53598b451b43d505f34c5f', 43, 12, '2018-03-29 13:18:11', 'test'),
('c211bc13628eb04c07676014d798ed14', 44, 12, '2018-03-29 14:06:46', 'beste M.Ruyter,\r\n\r\ner is momenteel nog geen handleiding beschikbaar. maar volgensmij is dit systeem zo simpel dat die eigenlijk ook niet nodig is.\r\n\r\nM.v.g \r\nbryan koolman'),
('1ab62019bb79af3024c05131bec8f2c1', 45, 12, '2018-03-29 14:14:34', 'test'),
('c211bc13628eb04c07676014d798ed14', 46, 26, '2018-03-29 14:45:53', 'ok. laten we daar dan maar op hopen.'),
('328aa1e9024bcf0d9fe821035981d4ad', 47, 12, '2018-03-30 14:37:58', 'hallo paul'),
('73f8b153571d738de9e2e501546248dc', 48, 12, '2018-03-30 21:36:25', 'MOIiiiIIII');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Users`
--

CREATE TABLE `Users` (
  `User_ID` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `MailAddress` varchar(255) NOT NULL,
  `password` varchar(10000) NOT NULL,
  `salt` varchar(1000) NOT NULL,
  `Groupnum` int(11) NOT NULL,
  `DateOfCreation` datetime NOT NULL,
  `mailme` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Users`
--

INSERT INTO `Users` (`User_ID`, `UserName`, `name`, `MailAddress`, `password`, `salt`, `Groupnum`, `DateOfCreation`, `mailme`) VALUES
(12, 'root', 'bryan koolman', 'bryan_k_@hotmail.com', '42ac502fc0b4ed3d3a679184c165aca090983ec51ff56505dec067621efbb472', 'Ã‘ÃšÃÃ½Â•Ã§ÂªÃ„bÃ†Ã™xÂªÂ½ÃŽRÃ‚Â—8Ã°.Â¾%iWÃŒÃ®Ã‘Âˆ', 1, '2018-02-22 12:13:11', 1),
(13, 'lol', 'lol depro', 'lol@gmail.com', '3c38e4ad7f74b2f54380556ffa2cc688ff5fd769387ed289410d2bd5e42946d6', '@Â»bÂ©Ã•ÃŸKOÂ‡Ã½1DÂœodÃ•82Ã¸Â©@;oÃŸÂ·JÃ³MÂm', 0, '2018-02-23 10:03:39', 1),
(14, 'Silviahidding', 'Silvia hidding', 'marketing@brainconsultant.nl', '4707fee50f17a5dc424749c22e1e094c1a5a301e73f3eb59632200fc09a61b33', 'Âž\"IMÂ»,Ã“GI]vÂ¦Â¹Ã»ÂŠÃ¼Âƒ\' Â›	Â²Ã²Â±7yVÃº', 1, '2018-02-28 14:15:02', 1),
(15, 'markdepro', 'markdepro', 'aa@a.a', '40fb453dc40092e663dea6db08e5d856e273bd3ba6e51837dad294feba2f8072', 'Ã¿Â¿Â’Â™ÂµÂŒÃ®Â¦Âš1dÃ»/Ã¥Ã§Ã¨Ã€Ã‰qb=ÂªÃ¯/D<Ã¹qÃ…Ã©', 0, '2018-03-02 09:50:02', 1),
(16, 'Yorick', 'Yorick Schoel', 'Yorickschoel1@gmail.com', '2fe81d417f6edc854f844ceea733656eca563f649f6aa2df42d133aaf8126fb2', '/Â›Â™Ã°#Â…Ã¯ÃÂ»Ã…Â®Â¸Â¾)Â˜ÃÂŠXÂ«MÃ²{Â´H\0s', 0, '2018-03-05 10:15:01', 1),
(17, 'testgebruiker', 'deze man', 'testgebruiker@example.com', '5422004c598856c6fd9fb4f0bccf574efa467508963f83d8ac3f05aef7e47b2c', 'ÃƒÂ™Ã˜RÂŸ_Ã“Â›6\"ÂºÂš0XÂ Â¼!ÂŠ;HÂ`Ã¨Ãƒ>Ã‚O5Ã”Â¬', 0, '2018-03-05 14:54:38', 1),
(18, 'Gebruiker', 'bryan odin ict koolman', 'olaf.pomp@gmail.com', 'eca29402b47c47dd15e5bac7b5c320d812495cec0d051978106c4a53da98d09b', 'XÂ—Âª{Â¾Ã‘#VÂ„?@Ã‹2@*Ã¥Ã„Â™\r\nN&$o)hYÃ”Â—', 1, '2018-02-23 10:03:39', 1),
(19, 'lol2', 'lol depro', 'bryan_K_@hotmail.com', '20a010dd65ce64c0e3bbb26a0f3b8fde3d3a5f9be524680833dfb887652aa797', 'Â–^$Ã¥^jÂ›Ã½g<Â”]Â´Ã½Ã—Ã¢?Â…ÂŒÃ¦E32xÂ¼WÂ·:G', 0, '2018-02-23 10:03:39', 1),
(20, 'lol3', 'lol depro', 'bryan_K_@hotmail.com', 'eca29402b47c47dd15e5bac7b5c320d812495cec0d051978106c4a53da98d09b', 'XÂ—Âª{Â¾Ã‘#VÂ„?@Ã‹2@*Ã¥Ã„Â™\r\nN&$o)hYÃ”Â—', 0, '2018-02-23 10:03:39', 1),
(21, 'lol4', 'lol depro', 'bryan_K_@hotmail.com', 'eca29402b47c47dd15e5bac7b5c320d812495cec0d051978106c4a53da98d09b', 'XÂ—Âª{Â¾Ã‘#VÂ„?@Ã‹2@*Ã¥Ã„Â™\r\nN&$o)hYÃ”Â—', 0, '2018-02-23 10:03:39', 1),
(22, 'Olaf', 'Olaf Pomp', 'olaf.pomp@brainconsultant.nl', '71848b297d70db1d203ec9af51a764383bb06545a147070e5aefce92a8762498', '^)5Â³Ã±Ã·&:CÃ^\r\rZ\0^ÂˆuÂ1Â³Ãž	Ã”Ã´Â†pÃ¡', 1, '2018-03-07 12:05:41', 1),
(23, 'testmaster', 'test master', 'bryan_k_@hotmail.com', 'c9fc1f84a57a72dbd49dc0cecc92a8b7b3c4df575c73fecb159c656ad91a4153', 'Â¤Â†Ã¹Ã¡Â³;ÃÂœ}dÃ¹_Â\ZÃ„\ZÂ—Â½VÃ‚Ã–dÂŠI\ZÃ(Ã‡', 0, '2018-03-07 12:07:05', 1),
(24, 'Kees', 'Kees Kaas', 'bryan_K_@hotmail.com', '617db280286797dce3cb8d2f77022e270bb823c30a8ddcd3de817150c424a4fd', 'Â»vÂš:=Ã³&Ã’BD\rÃ–ox`/LÂšÃÂ•ÃŽÂŒÂ<lP$Ã­Ã™MÂ‹Â¾', 1, '2018-03-07 12:08:04', 1),
(25, 'normaal', 'paul normaal', 'bryan_K_@hotmail.com', 'e6cbb3080916e5c476dbf68bae90b6a442f8404bb2e842c90db8e71d17694a0e', 'Â¸Â¶FSÃ£qÂ™Âª5Â©Â¢#Â›}Â¦ÂžÂ³\rÂ‰ÂŽ.Ã‚Â™Â²Ã¸Ã©7rÂ›1', 0, '2018-03-07 14:27:40', 1),
(26, 'mruyter', 'marianne de ruyter', 'mruyter@mygmail.com', '79db62946536d86b57ae6f877e1aec17abb301ca8f066d3121057915a72f667e', 'ÂŽAÂ±Ã¬Â¥Ã±ÃÂ»CÃ½Ã»Â­Ã¿ÃªÃ‰Â¬Â³.Ã¶ÃÂº-Ãºxa_', 0, '2018-03-29 13:53:20', 1);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `Notifications`
--
ALTER TABLE `Notifications`
  ADD PRIMARY KEY (`notify_ID`);

--
-- Indexen voor tabel `onderwerpen`
--
ALTER TABLE `onderwerpen`
  ADD PRIMARY KEY (`onderwerpnr`);

--
-- Indexen voor tabel `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`Ticket_ID`);

--
-- Indexen voor tabel `Ticket_Comments`
--
ALTER TABLE `Ticket_Comments`
  ADD PRIMARY KEY (`Comment_ID`);

--
-- Indexen voor tabel `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `Notifications`
--
ALTER TABLE `Notifications`
  MODIFY `notify_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT voor een tabel `onderwerpen`
--
ALTER TABLE `onderwerpen`
  MODIFY `onderwerpnr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT voor een tabel `Ticket_Comments`
--
ALTER TABLE `Ticket_Comments`
  MODIFY `Comment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT voor een tabel `Users`
--
ALTER TABLE `Users`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

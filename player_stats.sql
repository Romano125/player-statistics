-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2018 at 10:58 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `player_stats`
--

-- --------------------------------------------------------

--
-- Table structure for table `ages`
--

CREATE TABLE `ages` (
  `ID` int(11) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `ages`
--

INSERT INTO `ages` (`ID`, `age`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20),
(21, 21),
(22, 22),
(23, 23),
(24, 24),
(25, 25),
(26, 26),
(27, 27),
(28, 28),
(29, 29),
(30, 30),
(31, 31),
(32, 32),
(33, 33),
(34, 34),
(35, 35),
(36, 36),
(37, 37),
(38, 38),
(39, 39),
(40, 40),
(41, 41),
(42, 42),
(43, 43),
(44, 44),
(45, 45),
(46, 46),
(47, 47),
(48, 48),
(49, 49),
(50, 50),
(51, 51),
(52, 52),
(53, 53),
(54, 54),
(55, 55),
(56, 56),
(57, 57),
(58, 58),
(59, 59),
(60, 60),
(61, 61),
(62, 62),
(63, 63),
(64, 64),
(65, 65),
(66, 66),
(67, 67),
(68, 68),
(69, 69),
(70, 70),
(71, 71),
(72, 72),
(73, 73),
(74, 74),
(75, 75),
(76, 76),
(77, 77),
(78, 78),
(79, 79),
(80, 80),
(81, 81),
(82, 82),
(83, 83),
(84, 84),
(85, 85),
(86, 86),
(87, 87),
(88, 88),
(89, 89),
(90, 90),
(91, 91),
(92, 92),
(93, 93),
(94, 94),
(95, 95),
(96, 96),
(97, 97),
(98, 98),
(99, 99),
(100, 100);

-- --------------------------------------------------------

--
-- Table structure for table `igrac`
--

CREATE TABLE `igrac` (
  `reg_br_igr` varchar(20) NOT NULL,
  `ime` varchar(25) NOT NULL,
  `prezime` varchar(25) NOT NULL,
  `br_dres` int(11) NOT NULL,
  `br_gol` int(11) DEFAULT '0',
  `br_asist` int(11) DEFAULT '0',
  `br_zkarton` int(11) DEFAULT '0',
  `br_ckarton` int(11) DEFAULT '0',
  `br_obrane` int(11) DEFAULT '0',
  `pozicija_id` varchar(10) NOT NULL,
  `klub_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `igrac`
--

INSERT INTO `igrac` (`reg_br_igr`, `ime`, `prezime`, `br_dres`, `br_gol`, `br_asist`, `br_zkarton`, `br_ckarton`, `br_obrane`, `pozicija_id`, `klub_id`) VALUES
('AA000', 'Keylor', 'Navas', 1, 0, 0, 0, 0, 3, 'GK', 'RM'),
('AA001', 'Luka', 'Modric', 10, 0, 2, 1, 0, 0, 'MID', 'RM'),
('AA002', 'Daniel ', 'Carvajal', 2, 0, 0, 0, 0, 0, 'DEF', 'RM'),
('AA003', 'Da Silva', 'Marcelo', 12, 0, 0, 0, 0, 0, 'DEF', 'RM'),
('AA004', 'Sergio', 'Ramos', 4, 0, 0, 1, 0, 0, 'DEF', 'RM'),
('AA005', 'Raphael', 'Varane', 4, 0, 0, 0, 0, 0, 'DEF', 'RM'),
('AA006', 'Toni ', 'Kroos', 8, 0, 0, 0, 0, 0, 'MID', 'RM'),
('AA007', 'Alcaron', 'Isco', 22, 0, 0, 0, 0, 0, 'MID', 'RM'),
('AA008', 'Mateo', 'Kovacic', 23, 0, 0, 0, 0, 0, 'MID', 'RM'),
('AA009', 'Cristiano', 'Ronaldo', 7, 2, 1, 0, 0, 0, 'FWD', 'RIJ'),
('AA010', 'Karim', 'Benzema', 9, 3, 0, 1, 0, 0, 'FWD', 'RM'),
('BB000', 'Simon', 'Sluga', 12, 0, 0, 0, 0, 4, 'GK', 'RIJ'),
('BB001', 'Josip', 'Elez', 18, 0, 0, 0, 0, 0, 'DEF', 'RIJ'),
('BB002', 'Leonard', 'Zuta', 8, 0, 0, 1, 0, 0, 'DEF', 'RIJ'),
('BB003', 'Dario', 'Zuparic', 13, 0, 0, 1, 0, 0, 'DEF', 'RIJ'),
('BB004', 'Filip', 'Bradaric', 28, 0, 0, 0, 0, 0, 'MID', 'RIJ'),
('BB005', 'Zoran', 'Kvrzic', 7, 0, 0, 1, 0, 0, 'FWD', 'RIJ'),
('BB006', 'Mate', 'Males', 26, 0, 0, 0, 0, 0, 'MID', 'RIJ'),
('BB007', 'Marko', 'Vesovic', 29, 0, 0, 1, 0, 0, 'MID', 'RIJ'),
('BB008', 'Maxwell', 'Acosti', 14, 0, 0, 0, 0, 0, 'FWD', 'RIJ'),
('BB009', 'Mario', 'Gavranovic', 17, 0, 0, 0, 0, 0, 'FWD', 'RIJ'),
('BB010', 'Alexandar', 'Gorgon', 11, 0, 0, 0, 0, 0, 'FWD', 'RIJ'),
('CC000', 'Marc', 'Ter Stegen', 1, 0, 0, 0, 0, 2, 'GK', 'BAR'),
('CC001', 'Nelson', 'Semedo', 2, 0, 0, 0, 0, 0, 'DEF', 'BAR'),
('CC002', 'Gerard', 'Pique', 3, 1, 0, 1, 0, 0, 'DEF', 'BAR'),
('CC003', 'Javier ', 'Mascherano', 14, 0, 0, 0, 0, 0, 'DEF', 'BAR'),
('CC004', 'Jordi', 'Alba', 18, 0, 0, 0, 0, 0, 'DEF', 'BAR'),
('CC005', 'Ivan', 'Rakitic', 4, 0, 0, 0, 0, 0, 'MID', 'BAR'),
('CC006', 'Denis', 'Suarez', 6, 0, 0, 0, 0, 0, 'MID', 'BAR'),
('CC007', 'Andres', 'Iniesta', 8, 0, 0, 0, 0, 0, 'MID', 'BAR'),
('CC008', 'Lionel ', 'Messi', 10, 2, 1, 1, 0, 0, 'FWD', 'BAR'),
('CC009', 'Luis', 'Suarez', 9, 0, 0, 0, 0, 0, 'FWD', 'BAR'),
('CC010', 'Sergio', 'Busquets', 5, 0, 0, 0, 2, 0, 'MID', 'BAR'),
('DD000', 'Dominik', 'Livakovic', 40, 0, 0, 0, 0, 0, 'GK', 'DZG'),
('DD001', 'Arijan ', 'Ademi', 5, 0, 0, 0, 0, 0, 'DEF', 'DZG'),
('DD002', 'Filip', 'Benkovic', 26, 0, 0, 0, 0, 0, 'DEF', 'DZG'),
('DD003', 'Adnan', 'Hodzic', 15, 0, 1, 1, 0, 0, 'FWD', 'DZG'),
('DD004', 'Nikola', 'Moro', 27, 0, 0, 0, 0, 0, 'MID', 'DZG'),
('DD005', 'Dani', 'Olmo', 7, 0, 0, 0, 0, 0, 'MID', 'DZG'),
('DD006', 'Ante', 'Coric', 10, 1, 1, 1, 0, 0, 'FWD', 'DZG'),
('DD007', 'Borna', 'Sosa', 3, 0, 0, 0, 0, 0, 'DEF', 'DZG'),
('DD008', 'El Arbi', 'Soudani', 2, 3, 1, 0, 0, 0, 'FWD', 'DZG'),
('DD009', 'Tongo', 'Doumbia', 4, 0, 0, 0, 0, 0, 'MID', 'DZG'),
('DD010', 'Marko ', 'Leskovic', 31, 0, 0, 0, 0, 0, 'DEF', 'DZG');

-- --------------------------------------------------------

--
-- Table structure for table `klub`
--

CREATE TABLE `klub` (
  `klub_id` varchar(10) NOT NULL,
  `klub_ime` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `klub`
--

INSERT INTO `klub` (`klub_id`, `klub_ime`) VALUES
('BAR', 'Barcelona'),
('DZG', 'Dinamo Zagreb'),
('RIJ', 'Rijeka'),
('RM', 'Real Madrid'),
('BAR', 'Barcelona'),
('DZG', 'Dinamo Zagreb'),
('RIJ', 'Rijeka'),
('RM', 'Real Madrid'),
('BAR', 'Barcelona'),
('DZG', 'Dinamo Zagreb'),
('RIJ', 'Rijeka'),
('RM', 'Real Madrid');

-- --------------------------------------------------------

--
-- Table structure for table `natjecanja_kluba`
--

CREATE TABLE `natjecanja_kluba` (
  `klub_id` varchar(10) NOT NULL,
  `natj_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `natjecanja_kluba`
--

INSERT INTO `natjecanja_kluba` (`klub_id`, `natj_id`) VALUES
('BAR', 'LaLiga'),
('BAR', 'LP'),
('DZG', 'HNL'),
('RIJ', 'EL'),
('RIJ', 'HNL'),
('RM', 'LaLiga'),
('RM', 'LP'),
('BAR', 'LaLiga'),
('BAR', 'LP'),
('DZG', 'HNL'),
('RIJ', 'EL'),
('RIJ', 'HNL'),
('RM', 'LaLiga'),
('RM', 'LP'),
('BAR', 'LaLiga'),
('BAR', 'LP'),
('DZG', 'HNL'),
('RIJ', 'EL'),
('RIJ', 'HNL'),
('RM', 'LaLiga'),
('RM', 'LP');

-- --------------------------------------------------------

--
-- Table structure for table `natjecanje`
--

CREATE TABLE `natjecanje` (
  `natj_id` varchar(10) NOT NULL,
  `ime_natj` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `natjecanje`
--

INSERT INTO `natjecanje` (`natj_id`, `ime_natj`) VALUES
('EL', 'Europska Liga'),
('HNL', 'Hrvatska Nogometna Liga'),
('LaLiga', 'Spanjolska Liga'),
('LP', 'Liga Prvaka'),
('EL', 'Europska Liga'),
('HNL', 'Hrvatska Nogometna Liga'),
('LaLiga', 'Spanjolska Liga'),
('LP', 'Liga Prvaka'),
('EL', 'Europska Liga'),
('HNL', 'Hrvatska Nogometna Liga'),
('LaLiga', 'Spanjolska Liga'),
('LP', 'Liga Prvaka');

-- --------------------------------------------------------

--
-- Table structure for table `pozicija`
--

CREATE TABLE `pozicija` (
  `pozicija_id` varchar(10) NOT NULL,
  `ime_poz` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pozicija`
--

INSERT INTO `pozicija` (`pozicija_id`, `ime_poz`) VALUES
('DEF', 'Obrambeni'),
('FWD', 'Napadac'),
('GK', 'Golman'),
('MID', 'Vezni'),
('DEF', 'Obrambeni'),
('FWD', 'Napadac'),
('GK', 'Golman'),
('MID', 'Vezni'),
('DEF', 'Obrambeni'),
('FWD', 'Napadac'),
('GK', 'Golman'),
('MID', 'Vezni');

-- --------------------------------------------------------

--
-- Table structure for table `service_table`
--

CREATE TABLE `service_table` (
  `idService` int(11) NOT NULL,
  `pagination` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_table`
--

INSERT INTO `service_table` (`idService`, `pagination`) VALUES
(1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `statistika_igraca`
--

CREATE TABLE `statistika_igraca` (
  `reg_br_igr` varchar(20) NOT NULL,
  `stat_uta_id` int(11) NOT NULL,
  `igr_br_gol` int(11) DEFAULT '0',
  `igr_br_asist` int(11) DEFAULT '0',
  `igr_br_zkarton` int(11) DEFAULT '0',
  `igr_br_ckarton` int(11) DEFAULT '0',
  `igr_br_obrana` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statistika_igraca`
--

INSERT INTO `statistika_igraca` (`reg_br_igr`, `stat_uta_id`, `igr_br_gol`, `igr_br_asist`, `igr_br_zkarton`, `igr_br_ckarton`, `igr_br_obrana`) VALUES
('AA000', 1, 0, 0, 0, 0, 1),
('AA000', 2, 0, 0, 0, 0, 2),
('AA001', 1, 0, 1, 1, 0, 0),
('AA001', 2, 0, 1, 0, 0, 0),
('AA004', 1, 0, 0, 1, 0, 0),
('AA009', 1, 2, 1, 0, 0, 0),
('AA010', 1, 1, 0, 0, 0, 0),
('AA010', 2, 2, 0, 1, 0, 0),
('BB000', 3, 0, 0, 0, 0, 4),
('BB002', 3, 0, 0, 1, 0, 0),
('BB003', 3, 0, 0, 1, 0, 0),
('BB005', 3, 0, 0, 1, 0, 0),
('BB007', 3, 0, 0, 1, 0, 0),
('CC000', 1, 0, 0, 0, 0, 2),
('CC002', 1, 1, 0, 1, 0, 0),
('CC008', 1, 1, 1, 1, 0, 0),
('CC008', 2, 1, 0, 0, 0, 0),
('CC010', 1, 0, 0, 0, 1, 0),
('CC010', 2, 0, 0, 0, 1, 0),
('DD003', 3, 0, 1, 1, 0, 0),
('DD006', 3, 1, 1, 1, 0, 0),
('DD008', 3, 3, 1, 0, 0, 0),
('AA000', 1, 0, 0, 0, 0, 1),
('AA000', 2, 0, 0, 0, 0, 2),
('AA001', 1, 0, 1, 1, 0, 0),
('AA001', 2, 0, 1, 0, 0, 0),
('AA004', 1, 0, 0, 1, 0, 0),
('AA009', 1, 2, 1, 0, 0, 0),
('AA010', 1, 1, 0, 0, 0, 0),
('AA010', 2, 2, 0, 1, 0, 0),
('BB000', 3, 0, 0, 0, 0, 4),
('BB002', 3, 0, 0, 1, 0, 0),
('BB003', 3, 0, 0, 1, 0, 0),
('BB005', 3, 0, 0, 1, 0, 0),
('BB007', 3, 0, 0, 1, 0, 0),
('CC000', 1, 0, 0, 0, 0, 2),
('CC002', 1, 1, 0, 1, 0, 0),
('CC008', 1, 1, 1, 1, 0, 0),
('CC008', 2, 1, 0, 0, 0, 0),
('CC010', 1, 0, 0, 0, 1, 0),
('CC010', 2, 0, 0, 0, 1, 0),
('DD003', 3, 0, 1, 1, 0, 0),
('DD006', 3, 1, 1, 1, 0, 0),
('DD008', 3, 3, 1, 0, 0, 0),
('AA000', 1, 0, 0, 0, 0, 1),
('AA000', 2, 0, 0, 0, 0, 2),
('AA001', 1, 0, 1, 1, 0, 0),
('AA001', 2, 0, 1, 0, 0, 0),
('AA004', 1, 0, 0, 1, 0, 0),
('AA009', 1, 2, 1, 0, 0, 0),
('AA010', 1, 1, 0, 0, 0, 0),
('AA010', 2, 2, 0, 1, 0, 0),
('BB000', 3, 0, 0, 0, 0, 4),
('BB002', 3, 0, 0, 1, 0, 0),
('BB003', 3, 0, 0, 1, 0, 0),
('BB005', 3, 0, 0, 1, 0, 0),
('BB007', 3, 0, 0, 1, 0, 0),
('CC000', 1, 0, 0, 0, 0, 2),
('CC002', 1, 1, 0, 1, 0, 0),
('CC008', 1, 1, 1, 1, 0, 0),
('CC008', 2, 1, 0, 0, 0, 0),
('CC010', 1, 0, 0, 0, 1, 0),
('CC010', 2, 0, 0, 0, 1, 0),
('DD003', 3, 0, 1, 1, 0, 0),
('DD006', 3, 1, 1, 1, 0, 0),
('DD008', 3, 3, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `statistika_utakmice`
--

CREATE TABLE `statistika_utakmice` (
  `stat_uta_id` int(11) NOT NULL,
  `utak_id` varchar(10) NOT NULL,
  `domaci_gol` int(2) DEFAULT NULL,
  `domaci_asist` int(2) DEFAULT NULL,
  `domaci_zkarton` int(2) DEFAULT NULL,
  `domaci_ckarton` int(2) DEFAULT NULL,
  `domaci_obrana` int(2) DEFAULT NULL,
  `gosti_gol` int(2) DEFAULT NULL,
  `gosti_asist` int(2) DEFAULT NULL,
  `gosti_zkarton` int(2) DEFAULT NULL,
  `gosti_ckarton` int(2) DEFAULT NULL,
  `gosti_obrane` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statistika_utakmice`
--

INSERT INTO `statistika_utakmice` (`stat_uta_id`, `utak_id`, `domaci_gol`, `domaci_asist`, `domaci_zkarton`, `domaci_ckarton`, `domaci_obrana`, `gosti_gol`, `gosti_asist`, `gosti_zkarton`, `gosti_ckarton`, `gosti_obrane`) VALUES
(1, 'UTA1', 3, 2, 2, 0, 1, 2, 1, 2, 1, 2),
(2, 'UTA2', 1, 0, 0, 1, 0, 2, 1, 1, 0, 2),
(3, 'UTA3', 0, 0, 4, 0, 4, 4, 3, 2, 0, 0),
(1, 'UTA1', 3, 2, 2, 0, 1, 2, 1, 2, 1, 2),
(2, 'UTA2', 1, 0, 0, 1, 0, 2, 1, 1, 0, 2),
(3, 'UTA3', 0, 0, 4, 0, 4, 4, 3, 2, 0, 0),
(1, 'UTA1', 3, 2, 2, 0, 1, 2, 1, 2, 1, 2),
(2, 'UTA2', 1, 0, 0, 1, 0, 2, 1, 1, 0, 2),
(3, 'UTA3', 0, 0, 4, 0, 4, 4, 3, 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `name` varchar(15) COLLATE utf8_croatian_ci NOT NULL,
  `last_name` varchar(15) COLLATE utf8_croatian_ci NOT NULL,
  `gender` varchar(1) COLLATE utf8_croatian_ci NOT NULL,
  `age` int(11) NOT NULL,
  `password` varchar(18) COLLATE utf8_croatian_ci NOT NULL,
  `e_mail` varchar(18) COLLATE utf8_croatian_ci NOT NULL,
  `user_photo` mediumtext COLLATE utf8_croatian_ci NOT NULL,
  `back_photo` mediumtext COLLATE utf8_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `name`, `last_name`, `gender`, `age`, `password`, `e_mail`, `user_photo`, `back_photo`) VALUES
(1, 'k', 'k', 'M', 18, 'k', 'k', '', ''),
(4, 'kk', 'kk', 'M', 18, 'kk', 'kk', '', ''),
(5, 'Ana', 'Anic', 'F', 25, 'hello', 'ana.anic@gmail.com', 'data:image/jpg;base64,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', ''),
(6, 'Mirko', 'Mirkic', 'M', 18, 'k', 'k', 'data:image/jpg;base64,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', 'data:image/jpg;base64,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'),
(7, 'a', 'a', 'M', 18, 'a', 'a', '', ''),
(8, 'Iva', 'Polic', 'F', 18, 'iva', 'poli.iva@gmail.com', '', ''),
(9, 'p', 'p', 'M', 18, 'p', 'p', '', ''),
(10, 'Nikola', 'Samardzic', 'M', 20, 't', 'nikola@gmail.com', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_igrac`
--

CREATE TABLE `users_igrac` (
  `ID` int(11) NOT NULL,
  `reg_br_igr` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `utakmica`
--

CREATE TABLE `utakmica` (
  `utak_id` varchar(10) NOT NULL,
  `domaci` varchar(25) NOT NULL,
  `gosti` varchar(25) NOT NULL,
  `natj_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utakmica`
--

INSERT INTO `utakmica` (`utak_id`, `domaci`, `gosti`, `natj_id`) VALUES
('UTA1', 'Real Madrid', 'Barcelona', 'LaLiga'),
('UTA2', 'Barcelona', 'Real Madrid', 'LP'),
('UTA3', 'Rijeka', 'Dinamo Zagreb', 'HNL');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ages`
--
ALTER TABLE `ages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `igrac`
--
ALTER TABLE `igrac`
  ADD PRIMARY KEY (`reg_br_igr`),
  ADD KEY `fk_Igrac_Pozicija1_idx` (`pozicija_id`),
  ADD KEY `fk_Igrac_Klub1_idx` (`klub_id`);

--
-- Indexes for table `service_table`
--
ALTER TABLE `service_table`
  ADD PRIMARY KEY (`idService`);

--
-- Indexes for table `statistika_utakmice`
--
ALTER TABLE `statistika_utakmice`
  ADD KEY `fk_Statistika_utakmice_Utakmica1` (`utak_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users_igrac`
--
ALTER TABLE `users_igrac`
  ADD PRIMARY KEY (`ID`,`reg_br_igr`) USING BTREE,
  ADD KEY `reg_br_igr` (`reg_br_igr`);

--
-- Indexes for table `utakmica`
--
ALTER TABLE `utakmica`
  ADD PRIMARY KEY (`utak_id`),
  ADD KEY `fk_Utakmica_Natjecanje1_idx` (`natj_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ages`
--
ALTER TABLE `ages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `statistika_utakmice`
--
ALTER TABLE `statistika_utakmice`
  ADD CONSTRAINT `fk_Statistika_utakmice_Utakmica1` FOREIGN KEY (`utak_id`) REFERENCES `utakmica` (`utak_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_igrac`
--
ALTER TABLE `users_igrac`
  ADD CONSTRAINT `users_igrac_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_igrac_ibfk_2` FOREIGN KEY (`reg_br_igr`) REFERENCES `igrac` (`reg_br_igr`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

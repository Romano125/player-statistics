-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2018 at 03:34 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

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
('MID', 'Vezni');

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
  `e_mail` varchar(18) COLLATE utf8_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `name`, `last_name`, `gender`, `age`, `password`, `e_mail`) VALUES
(5, 'ana', 'anic', 'F', 20, 'hello', 'ana@ccc.com'),
(6, 'a', 'd', 'M', 18, 'k', 'k'),
(7, 'a', 'a', 'M', 18, 'a', 'a'),
(8, 'Iva', 'Polic', 'F', 18, 'iva', 'poli.iva@gmail.com'),
(9, 'p', 'p', 'M', 18, 'p', 'p'),
(10, 'Nikola', 'Samardzic', 'M', 20, 't', 'nikola@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ages`
--
ALTER TABLE `ages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

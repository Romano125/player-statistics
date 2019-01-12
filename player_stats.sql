-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2019 at 11:56 PM
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
-- Table structure for table `followers_pending`
--

CREATE TABLE `followers_pending` (
  `ID` int(11) NOT NULL,
  `want_follow` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `goal_of_the_week`
--

CREATE TABLE `goal_of_the_week` (
  `link` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `goal_of_the_week`
--

INSERT INTO `goal_of_the_week` (`link`) VALUES
('https://www.youtube.com/embed/Imcc-TLGGOY');

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
  `br_utakmica` int(11) NOT NULL,
  `votes` int(11) NOT NULL,
  `pozicija_id` varchar(10) NOT NULL,
  `klub_id` varchar(10) NOT NULL,
  `price` varchar(11) NOT NULL,
  `pImage` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `igrac`
--

INSERT INTO `igrac` (`reg_br_igr`, `ime`, `prezime`, `br_dres`, `br_gol`, `br_asist`, `br_zkarton`, `br_ckarton`, `br_obrane`, `br_utakmica`, `votes`, `pozicija_id`, `klub_id`, `price`, `pImage`) VALUES
('AA000', 'Keylor', 'Navas', 1, 0, 0, 0, 0, 3, 0, 0, 'GK', 'RM', '15,00M', 'https://tmssl.akamaized.net//images/portrait/header/79422-1413205936.jpg?lm=1433144964'),
('AA001', 'Luka', 'Modric', 10, 0, 5, 1, 1, 0, 0, 0, 'MID', 'RM', '25.00M', 'https://tmssl.akamaized.net//images/portrait/header/27992-1543926073.jpg?lm=1543926085'),
('AA002', 'Daniel ', 'Carvajal', 2, 4, 0, 0, 0, 0, 0, 0, 'DEF', 'RM', '60.00M', 'https://tmssl.akamaized.net//images/portrait/header/138927-1413206306.jpg?lm=1433143630'),
('AA003', 'Da Silva', 'Marcelo', 12, 0, 0, 0, 0, 0, 0, 0, 'DEF', 'RM', '70.00M', 'https://tmssl.akamaized.net//images/portrait/header/44501-1413206117.jpg?lm=1433144595'),
('AA004', 'Sergio', 'Ramos', 4, 0, 0, 1, 0, 0, 0, 0, 'DEF', 'RM', '30.00M', 'https://tmssl.akamaized.net//images/portrait/header/25557-1413190249.jpg?lm=1433144128'),
('AA005', 'Raphael', 'Varane', 4, 0, 0, 0, 0, 0, 0, 0, 'DEF', 'RM', '80.00M', 'https://tmssl.akamaized.net//images/portrait/header/164770-1413206196.jpg?lm=1433143763'),
('AA006', 'Toni ', 'Kroos', 8, 0, 1, 0, 0, 0, 0, 0, 'MID', 'RM', '80.00M', 'https://tmssl.akamaized.net//images/portrait/header/31909-1519743952.jpg?lm=1519743979'),
('AA007', 'Alcaron', 'Isco', 22, 0, 0, 0, 0, 0, 0, 0, 'MID', 'RM', '75.00M', 'https://tmssl.akamaized.net//images/portrait/header/85288-1523366774.jpg?lm=1523366787'),
('AA008', 'Mateo', 'Kovacic', 23, 0, 0, 0, 0, 0, 0, 0, 'MID', 'RM', '35.00M', 'https://tmssl.akamaized.net//images/portrait/header/51471-1410339990.jpg?lm=1433144687'),
('AA009', 'Cristiano', 'Ronaldo', 7, 2, 1, 0, 0, 0, 0, 0, 'FWD', 'RM', '100.00M', 'https://tmssl.akamaized.net//images/portrait/header/8198-1515761767.jpg?lm=1515761786'),
('AA010', 'Karim', 'Benzema', 9, 11, 0, 2, 1, 0, 0, 0, 'FWD', 'RM', '40.00M', 'https://tmssl.akamaized.net//images/portrait/header/18922-1544774342.jpg?lm=1544774361'),
('BB000', 'Simon', 'Sluga', 12, 0, 0, 0, 0, 4, 0, 1, 'GK', 'RIJ', '1.00M', 'https://tmssl.akamaized.net//images/portrait/header/188201-1515140102.jpg?lm=1515140127'),
('BB001', 'Josip', 'Elez', 18, 0, 0, 0, 0, 0, 0, 0, 'DEF', 'RIJ', '4.00M', 'https://tmssl.akamaized.net//images/portrait/header/179895-1532072097.jpg?lm=1532072195'),
('BB002', 'Leonard', 'Zuta', 8, 0, 0, 1, 0, 0, 0, 0, 'DEF', 'RIJ', '999M', 'https://tmssl.akamaized.net//images/portrait/header/214625-1497515701.jpg?lm=1497515721'),
('BB003', 'Dario', 'Zuparic', 13, 0, 0, 1, 0, 0, 0, 0, 'DEF', 'RIJ', '1.50M', 'https://tmssl.akamaized.net//images/portrait/header/165381-1515140234.jpg?lm=1515140266'),
('BB004', 'Filip', 'Bradaric', 28, 0, 0, 0, 0, 0, 0, 0, 'MID', 'RIJ', '5.00M', 'https://tmssl.akamaized.net//images/portrait/header/238486-1532949045.jpg?lm=1532949058'),
('BB005', 'Zoran', 'Kvrzic', 7, 0, 0, 1, 0, 0, 0, 0, 'FWD', 'RIJ', '800k', 'https://tmssl.akamaized.net//images/portrait/header/159839-1468316892.jpg?lm=1468316906'),
('BB006', 'Mate', 'Males', 26, 0, 0, 0, 0, 0, 0, 0, 'MID', 'RIJ', '999M', 'https://tmssl.akamaized.net//images/portrait/header/44230-1517827308.jpg?lm=1517827330'),
('BB007', 'Marko', 'Vesovic', 29, 0, 0, 1, 0, 0, 0, 0, 'MID', 'RIJ', '2.00M', 'https://tmssl.akamaized.net//images/portrait/header/98101-1408715742.jpg?lm=1433145107'),
('BB008', 'Maxwell', 'Acosti', 14, 0, 0, 0, 0, 0, 0, 0, 'FWD', 'RIJ', '1.25M', 'https://tmssl.akamaized.net//images/portrait/header/102249-1451058822.png?lm=1451058834'),
('BB009', 'Mario', 'Gavranovic', 17, 0, 0, 0, 0, 0, 0, 0, 'FWD', 'RIJ', '3.00M', 'https://tmssl.akamaized.net//bilder/spielerfotos/s_61380_260_2012_11_20_1.jpg?lm=0'),
('BB010', 'Alexandar', 'Gorgon', 11, 0, 0, 0, 0, 0, 0, 0, 'FWD', 'RIJ', '2.00M', 'https://tmssl.akamaized.net//images/portrait/header/45425-1437398493.jpg?lm=1437398583'),
('CC000', 'Marc', 'Ter Stegen', 1, 0, 0, 3, 0, 2, 0, 1, 'GK', 'BAR', '80.00M', 'https://tmssl.akamaized.net//images/portrait/header/74857-1476949803.jpg?lm=1476949839'),
('CC001', 'Nelson', 'Semedo', 2, 0, 0, 0, 0, 0, 0, 0, 'DEF', 'BAR', '35.00M', 'https://tmssl.akamaized.net//images/portrait/header/231572-1474546433.jpg?lm=1474546447'),
('CC002', 'Gerard', 'Pique', 3, 1, 0, 1, 0, 0, 0, 0, 'DEF', 'BAR', '40.00M', 'https://tmssl.akamaized.net//images/portrait/header/18944-1454670060.jpg?lm=1454670159'),
('CC003', 'Javier ', 'Mascherano', 14, 0, 0, 0, 0, 0, 0, 0, 'DEF', 'BAR', '2.00M', 'https://tmssl.akamaized.net//images/portrait/header/19981-1465280515.jpg?lm=1465280533'),
('CC004', 'Jordi', 'Alba', 18, 0, 0, 0, 0, 0, 0, 0, 'DEF', 'BAR', '70.00M', 'https://tmssl.akamaized.net//images/portrait/header/69751-1454079452.jpg?lm=1454079477'),
('CC005', 'Ivan', 'Rakitic', 4, 0, 0, 0, 0, 0, 0, 0, 'MID', 'BAR', '65.00M', 'https://tmssl.akamaized.net//images/portrait/header/32467-1533819327.jpg?lm=1533819348'),
('CC006', 'Denis', 'Suarez', 6, 0, 0, 0, 0, 0, 0, 0, 'MID', 'BAR', '12.00M', 'https://tmssl.akamaized.net//images/portrait/header/165007-1447239749.jpg?lm=1447239790'),
('CC007', 'Andres', 'Iniesta', 8, 0, 0, 0, 0, 0, 0, 0, 'MID', 'BAR', '6.75M', 'https://tmssl.akamaized.net//images/portrait/header/7600-1464872266.jpg?lm=1464872283'),
('CC008', 'Lionel ', 'Messi', 10, 5, 1, 1, 0, 0, 0, 0, 'FWD', 'BAR', '160.00M', 'https://tmssl.akamaized.net//images/portrait/header/28003-1510231943.jpg?lm=1510231982'),
('CC009', 'Luis', 'Suarez', 9, 0, 0, 0, 0, 0, 0, 0, 'FWD', 'BAR', '60.00M', 'https://tmssl.akamaized.net//images/portrait/header/44352-1453896733.jpg?lm=1453896745'),
('CC010', 'Sergio', 'Busquets', 5, 0, 0, 0, 2, 0, 0, 0, 'MID', 'BAR', '75.00M', 'https://tmssl.akamaized.net//images/portrait/header/65230-1453896822.jpg?lm=1453896799'),
('DD000', 'Dominik', 'Livakovic', 40, 0, 0, 0, 0, 0, 0, 0, 'GK', 'DZG', '1.75M', 'https://tmssl.akamaized.net//images/portrait/header/205927-1525072466.jpg?lm=1525072478'),
('DD001', 'Arijan ', 'Ademi', 5, 0, 0, 0, 0, 0, 0, 0, 'DEF', 'DZG', '4.50M', 'https://tmssl.akamaized.net//images/portrait/header/71542-1537875033.jpg?lm=1537875046'),
('DD002', 'Filip', 'Benkovic', 26, 0, 0, 0, 0, 0, 0, 0, 'DEF', 'DZG', '11.00M', 'https://tmssl.akamaized.net//images/portrait/header/293168-1524751819.jpg?lm=1524751837'),
('DD003', 'Armin', 'Hodzic', 15, 0, 1, 1, 0, 0, 0, 0, 'FWD', 'DZG', '2.00M', 'https://tmssl.akamaized.net//images/portrait/header/166753-1545842984.jpg?lm=1545842994'),
('DD004', 'Nikola', 'Moro', 0, 0, 0, 0, 0, 0, 0, 0, 'MID', 'DZG', '2.50M', 'https://tmssl.akamaized.net//images/portrait/header/316934-1446037549.jpg?lm=1446037603'),
('DD005', 'Dani', 'Olmo', 7, 0, 0, 0, 0, 0, 0, 0, 'MID', 'DZG', '6.50M', 'https://tmssl.akamaized.net//images/portrait/header/293385-1537950178.jpg?lm=1537950199'),
('DD006', 'Ante', 'Coric', 10, 1, 1, 1, 0, 0, 0, 0, 'FWD', 'DZG', '7.00M', 'https://tmssl.akamaized.net//images/portrait/header/96630-1535016269.jpg?lm=1535016307'),
('DD007', 'Borna', 'Sosa', 3, 0, 0, 0, 0, 0, 0, 0, 'DEF', 'DZG', '6.00M', 'https://tmssl.akamaized.net//images/portrait/header/293194-1532078159.jpg?lm=1532078231'),
('DD008', 'El Arbi', 'Soudani', 2, 3, 1, 0, 0, 0, 0, 0, 'FWD', 'DZG', '3.50M', 'https://tmssl.akamaized.net//images/portrait/header/174842-1541149776.JPG?lm=1541149799'),
('DD009', 'Tongo', 'Doumbia', 4, 0, 0, 0, 0, 0, 0, 0, 'MID', 'DZG', '700k', 'https://tmssl.akamaized.net//images/portrait/header/103563-1410775269.jpg?lm=1433143441'),
('DD010', 'Marko ', 'Leskovic', 31, 0, 0, 0, 0, 0, 0, 0, 'DEF', 'DZG', '0.01k', 'https://tmssl.akamaized.net//bilder/spielerfotos/s_133834_144_2014_05_18_1.jpg?lm=0');

-- --------------------------------------------------------

--
-- Table structure for table `igrac_natjecanje`
--

CREATE TABLE `igrac_natjecanje` (
  `reg_br_igr` varchar(20) CHARACTER SET utf8 NOT NULL,
  `ime_natj` varchar(30) CHARACTER SET utf8 NOT NULL,
  `br_gol` int(11) NOT NULL,
  `br_asist` int(11) NOT NULL,
  `br_ckarton` int(11) NOT NULL,
  `br_zkarton` int(11) NOT NULL,
  `br_obrane` int(11) NOT NULL,
  `br_utakmica` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `igrac_natjecanje`
--

INSERT INTO `igrac_natjecanje` (`reg_br_igr`, `ime_natj`, `br_gol`, `br_asist`, `br_ckarton`, `br_zkarton`, `br_obrane`, `br_utakmica`) VALUES
('AA000', 'Liga Prvaka', 0, 0, 0, 0, 0, 0),
('AA000', 'Spanjolska Liga', 0, 0, 0, 0, 0, 0),
('AA001', 'Liga Prvaka', 3, 3, 0, 0, 0, 2),
('AA001', 'Spanjolska Liga', 0, 0, 1, 0, 0, 2),
('AA002', 'Liga Prvaka', 0, 0, 0, 0, 0, 0),
('AA002', 'Spanjolska Liga', 0, 0, 0, 0, 0, 0),
('AA003', 'Liga Prvaka', 0, 0, 0, 0, 0, 0),
('AA003', 'Spanjolska Liga', 0, 0, 0, 0, 0, 0),
('AA004', 'Liga Prvaka', 0, 0, 0, 0, 0, 0),
('AA004', 'Spanjolska Liga', 0, 0, 0, 0, 0, 0),
('AA005', 'Liga Prvaka', 0, 0, 0, 0, 0, 0),
('AA005', 'Spanjolska Liga', 0, 0, 0, 0, 0, 0),
('AA006', 'Liga Prvaka', 0, 0, 0, 0, 0, 0),
('AA006', 'Spanjolska Liga', 0, 0, 0, 0, 0, 0),
('AA007', 'Liga Prvaka', 0, 0, 0, 0, 0, 0),
('AA007', 'Spanjolska Liga', 0, 0, 0, 0, 0, 0),
('AA008', 'Liga Prvaka', 0, 0, 0, 0, 0, 0),
('AA008', 'Spanjolska Liga', 0, 0, 0, 0, 0, 0),
('AA009', 'Liga Prvaka', 0, 0, 0, 0, 0, 0),
('AA009', 'Spanjolska Liga', 0, 0, 0, 0, 0, 0),
('AA010', 'Liga Prvaka', 0, 0, 0, 0, 0, 0),
('AA010', 'Spanjolska Liga', 0, 0, 0, 0, 0, 0),
('BB000', 'Europska Liga', 0, 0, 0, 0, 5, 0),
('BB000', 'Hrvatska Nogometna Liga', 0, 0, 0, 0, 0, 0),
('BB001', 'Europska Liga', 0, 0, 0, 0, 0, 0),
('BB001', 'Hrvatska Nogometna Liga', 0, 0, 0, 0, 0, 0),
('BB002', 'Europska Liga', 0, 0, 0, 0, 0, 0),
('BB002', 'Hrvatska Nogometna Liga', 0, 0, 0, 0, 0, 0),
('BB003', 'Europska Liga', 0, 0, 0, 0, 0, 0),
('BB003', 'Hrvatska Nogometna Liga', 0, 0, 0, 0, 0, 0),
('BB004', 'Europska Liga', 0, 0, 0, 0, 0, 0),
('BB004', 'Hrvatska Nogometna Liga', 0, 0, 0, 0, 0, 0),
('BB005', 'Europska Liga', 0, 0, 0, 0, 0, 0),
('BB005', 'Hrvatska Nogometna Liga', 0, 0, 0, 0, 0, 0),
('BB006', 'Europska Liga', 0, 0, 0, 0, 0, 0),
('BB006', 'Hrvatska Nogometna Liga', 0, 0, 0, 0, 0, 0),
('BB007', 'Europska Liga', 0, 0, 0, 0, 0, 0),
('BB007', 'Hrvatska Nogometna Liga', 0, 0, 0, 0, 0, 0),
('BB008', 'Europska Liga', 0, 0, 0, 0, 0, 0),
('BB008', 'Hrvatska Nogometna Liga', 0, 0, 0, 0, 0, 0),
('BB009', 'Europska Liga', 0, 0, 0, 0, 0, 0),
('BB009', 'Hrvatska Nogometna Liga', 0, 0, 0, 0, 0, 0),
('BB010', 'Europska Liga', 0, 0, 0, 0, 0, 0),
('BB010', 'Hrvatska Nogometna Liga', 0, 0, 0, 0, 0, 0),
('CC000', 'Liga Prvaka', 0, 0, 0, 0, 0, 0),
('CC000', 'Spanjolska Liga', 0, 0, 0, 0, 0, 0),
('CC001', 'Liga Prvaka', 0, 0, 0, 0, 0, 0),
('CC001', 'Spanjolska Liga', 0, 0, 0, 0, 0, 0),
('CC002', 'Liga Prvaka', 0, 0, 0, 0, 0, 0),
('CC002', 'Spanjolska Liga', 0, 0, 0, 0, 0, 0),
('CC003', 'Liga Prvaka', 0, 0, 0, 0, 0, 0),
('CC003', 'Spanjolska Liga', 0, 0, 0, 0, 0, 0),
('CC004', 'Liga Prvaka', 0, 0, 0, 0, 0, 0),
('CC004', 'Spanjolska Liga', 0, 0, 0, 0, 0, 0),
('CC005', 'Liga Prvaka', 0, 0, 0, 0, 0, 0),
('CC005', 'Spanjolska Liga', 0, 0, 0, 0, 0, 0),
('CC006', 'Liga Prvaka', 0, 0, 0, 0, 0, 0),
('CC006', 'Spanjolska Liga', 0, 0, 0, 0, 0, 0),
('CC007', 'Liga Prvaka', 0, 0, 0, 0, 0, 0),
('CC007', 'Spanjolska Liga', 0, 0, 0, 0, 0, 0),
('CC008', 'Liga Prvaka', 0, 0, 0, 0, 0, 0),
('CC008', 'Spanjolska Liga', 0, 0, 0, 0, 0, 0),
('CC009', 'Liga Prvaka', 0, 0, 0, 0, 0, 0),
('CC009', 'Spanjolska Liga', 0, 0, 0, 0, 0, 0),
('CC010', 'Liga Prvaka', 0, 0, 0, 0, 0, 0),
('CC010', 'Spanjolska Liga', 0, 0, 0, 0, 0, 0),
('DD000', 'Hrvatska Nogometna Liga', 0, 0, 0, 0, 0, 0),
('DD001', 'Hrvatska Nogometna Liga', 0, 0, 0, 0, 0, 0),
('DD002', 'Hrvatska Nogometna Liga', 0, 0, 0, 0, 0, 0),
('DD003', 'Hrvatska Nogometna Liga', 0, 0, 0, 0, 0, 0),
('DD004', 'Hrvatska Nogometna Liga', 0, 0, 0, 0, 0, 0),
('DD005', 'Hrvatska Nogometna Liga', 0, 0, 0, 0, 0, 0),
('DD006', 'Hrvatska Nogometna Liga', 0, 0, 0, 0, 0, 0),
('DD007', 'Hrvatska Nogometna Liga', 0, 0, 0, 0, 0, 0),
('DD008', 'Hrvatska Nogometna Liga', 0, 0, 0, 0, 0, 0),
('DD009', 'Hrvatska Nogometna Liga', 0, 0, 0, 0, 0, 0),
('DD010', 'Hrvatska Nogometna Liga', 0, 0, 0, 0, 0, 0);

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
  `val` int(11) NOT NULL,
  `txt` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_table`
--

INSERT INTO `service_table` (`idService`, `val`, `txt`) VALUES
(1, 10, NULL),
(2, 2, NULL),
(3, 0, 'm'),
(4, 0, 'Spanjolska Liga'),
(5, 0, 'Dinamo Zagreb'),
(6, 1, 'k'),
(7, 4, NULL);

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
  `igr_br_obrana` int(11) NOT NULL DEFAULT '0',
  `igr_igrao` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statistika_igraca`
--

INSERT INTO `statistika_igraca` (`reg_br_igr`, `stat_uta_id`, `igr_br_gol`, `igr_br_asist`, `igr_br_zkarton`, `igr_br_ckarton`, `igr_br_obrana`, `igr_igrao`) VALUES
('AA000', 1, 0, 0, 0, 0, 1, 0),
('AA000', 2, 0, 0, 0, 0, 2, 0),
('AA001', 1, 0, 1, 1, 0, 0, 0),
('AA001', 2, 0, 1, 0, 0, 0, 0),
('AA004', 1, 0, 0, 1, 0, 0, 0),
('AA009', 1, 2, 1, 0, 0, 0, 0),
('AA010', 1, 1, 0, 0, 0, 0, 0),
('AA010', 2, 2, 0, 1, 0, 0, 0),
('BB000', 3, 0, 0, 0, 0, 4, 0),
('BB002', 3, 0, 0, 1, 0, 0, 0),
('BB003', 3, 0, 0, 1, 0, 0, 0),
('BB005', 3, 0, 0, 1, 0, 0, 0),
('BB007', 3, 0, 0, 1, 0, 0, 0),
('CC000', 1, 0, 0, 0, 0, 2, 0),
('CC002', 1, 1, 0, 1, 0, 0, 0),
('CC008', 1, 1, 1, 1, 0, 0, 0),
('CC008', 2, 1, 0, 0, 0, 0, 0),
('CC010', 1, 0, 0, 0, 1, 0, 0),
('CC010', 2, 0, 0, 0, 1, 0, 0),
('DD003', 3, 0, 1, 1, 0, 0, 0),
('DD006', 3, 1, 1, 1, 0, 0, 0),
('DD008', 3, 3, 1, 0, 0, 0, 0),
('AA000', 1, 0, 0, 0, 0, 1, 0),
('AA000', 2, 0, 0, 0, 0, 2, 0),
('AA001', 1, 0, 1, 1, 0, 0, 0),
('AA001', 2, 0, 1, 0, 0, 0, 0),
('AA004', 1, 0, 0, 1, 0, 0, 0),
('AA009', 1, 2, 1, 0, 0, 0, 0),
('AA010', 1, 1, 0, 0, 0, 0, 0),
('AA010', 2, 2, 0, 1, 0, 0, 0),
('BB000', 3, 0, 0, 0, 0, 4, 0),
('BB002', 3, 0, 0, 1, 0, 0, 0),
('BB003', 3, 0, 0, 1, 0, 0, 0),
('BB005', 3, 0, 0, 1, 0, 0, 0),
('BB007', 3, 0, 0, 1, 0, 0, 0),
('CC000', 1, 0, 0, 0, 0, 2, 0),
('CC002', 1, 1, 0, 1, 0, 0, 0),
('CC008', 1, 1, 1, 1, 0, 0, 0),
('CC008', 2, 1, 0, 0, 0, 0, 0),
('CC010', 1, 0, 0, 0, 1, 0, 0),
('CC010', 2, 0, 0, 0, 1, 0, 0),
('DD003', 3, 0, 1, 1, 0, 0, 0),
('DD006', 3, 1, 1, 1, 0, 0, 0),
('DD008', 3, 3, 1, 0, 0, 0, 0),
('AA000', 1, 0, 0, 0, 0, 1, 0),
('AA000', 2, 0, 0, 0, 0, 2, 0),
('AA001', 1, 0, 1, 1, 0, 0, 0),
('AA001', 2, 0, 1, 0, 0, 0, 0),
('AA004', 1, 0, 0, 1, 0, 0, 0),
('AA009', 1, 2, 1, 0, 0, 0, 0),
('AA010', 1, 1, 0, 0, 0, 0, 0),
('AA010', 2, 2, 0, 1, 0, 0, 0),
('BB000', 3, 0, 0, 0, 0, 4, 0),
('BB002', 3, 0, 0, 1, 0, 0, 0),
('BB003', 3, 0, 0, 1, 0, 0, 0),
('BB005', 3, 0, 0, 1, 0, 0, 0),
('BB007', 3, 0, 0, 1, 0, 0, 0),
('CC000', 1, 0, 0, 0, 0, 2, 0),
('CC002', 1, 1, 0, 1, 0, 0, 0),
('CC008', 1, 1, 1, 1, 0, 0, 0),
('CC008', 2, 1, 0, 0, 0, 0, 0),
('CC010', 1, 0, 0, 0, 1, 0, 0),
('CC010', 2, 0, 0, 0, 1, 0, 0),
('DD003', 3, 0, 1, 1, 0, 0, 0),
('DD006', 3, 1, 1, 1, 0, 0, 0),
('DD008', 3, 3, 1, 0, 0, 0, 0);

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
  `gender` varchar(2) COLLATE utf8_croatian_ci NOT NULL,
  `age` int(11) NOT NULL,
  `password` varchar(18) COLLATE utf8_croatian_ci NOT NULL,
  `e_mail` varchar(18) COLLATE utf8_croatian_ci NOT NULL,
  `user_photo` mediumtext COLLATE utf8_croatian_ci,
  `back_photo` mediumtext COLLATE utf8_croatian_ci,
  `privilage` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `name`, `last_name`, `gender`, `age`, `password`, `e_mail`, `user_photo`, `back_photo`, `privilage`) VALUES
(4, 'kk', 'kk', 'M', 18, 'kk', 'kk', '', '', 0),
(5, 'Ana', 'Anic', 'F', 25, 'hello', 'ana.anic@gmail.com', 'data:image/jpg;base64,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', '', 0),
(6, 'Mirko', 'Mirkic', 'M', 18, 'k', 'k', 'data:image/jpg;base64,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', 'data:image/jpeg;base64,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', 1),
(7, 'a', 'a', 'M', 18, 'a', 'a', '', '', 0),
(8, 'Iva', 'Polic', 'F', 18, 'iva', 'poli.iva@gmail.com', '', '', 0),
(9, 'p', 'p', 'M', 18, 'p', 'p', '', '', 0),
(10, 'Nikola', 'Samardzic', 'M', 20, 't', 'nikola@gmail.com', '', '', 0),
(11, 'Izbornik', 'Dena', 'M', 29, '1234', 'dena@aa.com', 'http://www.evolvefish.com/thumbnail.asp?file=assets/images/vinyl%20decals/EF-VDC-00035(black).jpg&maxx=300&maxy=0', 'http://www.evolvefish.com/thumbnail.asp?file=assets/images/vinyl%20decals/EF-VDC-00035(black).jpg&maxx=300&maxy=0', 0),
(12, 'Vanja', 'Kosovic', 'NN', 33, '1234', 'vanja@vanja.com', 'http://www.evolvefish.com/thumbnail.asp?file=assets/images/vinyl%20decals/EF-VDC-00035(black).jpg&maxx=300&maxy=0', 'http://www.evolvefish.com/thumbnail.asp?file=assets/images/vinyl%20decals/EF-VDC-00035(black).jpg&maxx=300&maxy=0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_followers`
--

CREATE TABLE `users_followers` (
  `ID` int(11) NOT NULL,
  `follows` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_followers`
--

INSERT INTO `users_followers` (`ID`, `follows`) VALUES
(6, 5),
(6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users_igrac`
--

CREATE TABLE `users_igrac` (
  `ID` int(11) NOT NULL,
  `reg_br_igr` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_igrac`
--

INSERT INTO `users_igrac` (`ID`, `reg_br_igr`) VALUES
(5, 'DD002'),
(6, 'AA001'),
(6, 'CC002');

-- --------------------------------------------------------

--
-- Table structure for table `users_votes`
--

CREATE TABLE `users_votes` (
  `ID` int(11) NOT NULL,
  `reg_br_igr` varchar(15) NOT NULL,
  `voteDate` date NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_votes`
--

INSERT INTO `users_votes` (`ID`, `reg_br_igr`, `voteDate`, `active`) VALUES
(6, 'CC008', '2019-01-12', 0),
(7, 'AA001', '2019-01-12', 0),
(6, 'CC000', '2019-01-12', 0),
(6, 'CC003', '2019-01-12', 0),
(6, 'CC001', '2019-01-12', 0),
(6, 'CC001', '2019-01-12', 0),
(6, 'CC001', '2019-01-12', 0),
(6, 'AA001', '2019-01-12', 0),
(6, 'CC000', '2019-01-12', 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `weeks`
--

CREATE TABLE `weeks` (
  `weekNo` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `igrac_natjecanje`
--
ALTER TABLE `igrac_natjecanje`
  ADD KEY `reg_br_igr` (`reg_br_igr`,`ime_natj`);

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
-- Indexes for table `weeks`
--
ALTER TABLE `weeks`
  ADD PRIMARY KEY (`weekNo`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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

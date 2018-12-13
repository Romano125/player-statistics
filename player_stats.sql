-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2018 at 03:25 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

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
  `name` varchar(40) NOT NULL,
  `surname` varchar(40) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `age` int(11) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `igrac`
--
ALTER TABLE `igrac`
  ADD PRIMARY KEY (`reg_br_igr`),
  ADD KEY `fk_Igrac_Pozicija1_idx` (`pozicija_id`),
  ADD KEY `fk_Igrac_Klub1_idx` (`klub_id`);

--
-- Indexes for table `klub`
--
ALTER TABLE `klub`
  ADD PRIMARY KEY (`klub_id`);

--
-- Indexes for table `natjecanja_kluba`
--
ALTER TABLE `natjecanja_kluba`
  ADD PRIMARY KEY (`klub_id`,`natj_id`),
  ADD KEY `fk_Klub_has_Natjecanje_Natjecanje1_idx` (`natj_id`),
  ADD KEY `fk_Klub_has_Natjecanje_Klub1_idx` (`klub_id`);

--
-- Indexes for table `natjecanje`
--
ALTER TABLE `natjecanje`
  ADD PRIMARY KEY (`natj_id`);

--
-- Indexes for table `pozicija`
--
ALTER TABLE `pozicija`
  ADD PRIMARY KEY (`pozicija_id`);

--
-- Indexes for table `statistika_igraca`
--
ALTER TABLE `statistika_igraca`
  ADD PRIMARY KEY (`reg_br_igr`,`stat_uta_id`),
  ADD KEY `fk_Statistika_igraca_statistika_utakmice1_idx` (`stat_uta_id`),
  ADD KEY `fk_Statistika_igraca_igrac1_idx` (`reg_br_igr`);

--
-- Indexes for table `statistika_utakmice`
--
ALTER TABLE `statistika_utakmice`
  ADD PRIMARY KEY (`stat_uta_id`),
  ADD KEY `fk_Statistika_utakmice_Utakmica1_idx` (`utak_id`);

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `igrac`
--
ALTER TABLE `igrac`
  ADD CONSTRAINT `fk_Igrac_Klub1` FOREIGN KEY (`klub_id`) REFERENCES `klub` (`klub_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Igrac_Pozicija1` FOREIGN KEY (`pozicija_id`) REFERENCES `pozicija` (`pozicija_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `natjecanja_kluba`
--
ALTER TABLE `natjecanja_kluba`
  ADD CONSTRAINT `fk_Klub_has_Natjecanje_Klub1` FOREIGN KEY (`klub_id`) REFERENCES `klub` (`klub_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Klub_has_Natjecanje_Natjecanje1` FOREIGN KEY (`natj_id`) REFERENCES `natjecanje` (`natj_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `statistika_igraca`
--
ALTER TABLE `statistika_igraca`
  ADD CONSTRAINT `fk_Statistika_igraca_igrac1` FOREIGN KEY (`reg_br_igr`) REFERENCES `igrac` (`reg_br_igr`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Statistika_igraca_statistika_utakmice1` FOREIGN KEY (`stat_uta_id`) REFERENCES `statistika_utakmice` (`stat_uta_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Constraints for table `utakmica`
--
ALTER TABLE `utakmica`
  ADD CONSTRAINT `fk_Utakmica_Natjecanje1` FOREIGN KEY (`natj_id`) REFERENCES `natjecanje` (`natj_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

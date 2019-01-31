-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 31, 2019 at 07:36 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `P4`
--

-- --------------------------------------------------------

--
-- Table structure for table `Resultat_Jeu`
--

CREATE TABLE `Resultat_Jeu` (
  `ID` int(11) NOT NULL,
  `NOM_JOUEUR` varchar(50) NOT NULL,
  `SCORE` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Resultat_Jeu`
--

INSERT INTO `Resultat_Jeu` (`ID`, `NOM_JOUEUR`, `SCORE`) VALUES
(1, 'anass', 2),
(2, 'hakim', 0),
(6, 'zakaria', 1),
(7, 'oumaima', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Resultat_Jeu`
--
ALTER TABLE `Resultat_Jeu`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `NOM_JOUEUR` (`NOM_JOUEUR`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Resultat_Jeu`
--
ALTER TABLE `Resultat_Jeu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

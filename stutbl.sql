-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2023 at 03:41 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stuman`
--

-- --------------------------------------------------------

--
-- Table structure for table `stutbl`
--

CREATE TABLE `stutbl` (
  `ID` int(11) NOT NULL,
  `fullName` varchar(60) NOT NULL,
  `stuID` varchar(10) NOT NULL,
  `class` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `stutbl`
--

INSERT INTO `stutbl` (`ID`, `fullName`, `stuID`, `class`) VALUES
(6, 'Example1', '11111', 'CC01'),
(7, 'Example 2', '22222', 'CC01'),
(8, 'Example 3', '33333', 'CC02'),
(12, 'Example 4', '44444', 'CC03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stutbl`
--
ALTER TABLE `stutbl`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `stuID` (`stuID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stutbl`
--
ALTER TABLE `stutbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

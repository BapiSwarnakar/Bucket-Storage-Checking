-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2022 at 07:04 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bucket_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `TOKEN` varchar(255) DEFAULT NULL,
  `SUPER_ID` int(11) NOT NULL,
  `NAME` varchar(255) DEFAULT NULL,
  `COMPANY_NAME` varchar(500) DEFAULT NULL,
  `ADDRESS` varchar(500) DEFAULT NULL,
  `MOBILE` varchar(15) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `STATUS` int(2) DEFAULT NULL,
  `DATE` date NOT NULL DEFAULT current_timestamp(),
  `TIME` time(6) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ball`
--

CREATE TABLE `ball` (
  `BALL_ID` int(11) NOT NULL,
  `BALL_NAME` varchar(100) NOT NULL,
  `BALL_SIZE` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ball`
--

INSERT INTO `ball` (`BALL_ID`, `BALL_NAME`, `BALL_SIZE`) VALUES
(1, 'PINK', 2.5),
(2, 'RED', 2),
(3, 'BLUE', 1),
(4, 'ORANGE', 0.8),
(5, 'GREEN', 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `bucket`
--

CREATE TABLE `bucket` (
  `ID` int(11) NOT NULL,
  `B_NAME` varchar(100) NOT NULL,
  `B_SIZE` float NOT NULL,
  `B_SPACE` float NOT NULL DEFAULT 0,
  `B_LOAD` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bucket`
--

INSERT INTO `bucket` (`ID`, `B_NAME`, `B_SIZE`, `B_SPACE`, `B_LOAD`) VALUES
(2, 'A', 20, 0, 0),
(3, 'B', 18, 0, 0),
(4, 'C', 12, 0, 0),
(5, 'D', 10, 0, 0),
(6, 'E', 8, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bucket_history`
--

CREATE TABLE `bucket_history` (
  `H_ID` int(11) NOT NULL,
  `B_ID` int(11) NOT NULL,
  `BALL_ID` int(11) NOT NULL,
  `BALL_COUNT` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE `super_admin` (
  `ID` int(11) NOT NULL,
  `TOKEN` varchar(255) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `STATUS` int(2) NOT NULL DEFAULT 1,
  `DATE` date NOT NULL DEFAULT current_timestamp(),
  `TIME` time(6) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`ID`, `TOKEN`, `NAME`, `USERNAME`, `PASSWORD`, `STATUS`, `DATE`, `TIME`) VALUES
(1, 'UTg0cDFKZjdKc0JXN1E9PQ==', 'Bapi Swarnakar', 'Bapi', 'UThVbzFKYz0=', 1, '2022-08-12', '15:57:49.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ball`
--
ALTER TABLE `ball`
  ADD PRIMARY KEY (`BALL_ID`);

--
-- Indexes for table `bucket`
--
ALTER TABLE `bucket`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `bucket_history`
--
ALTER TABLE `bucket_history`
  ADD PRIMARY KEY (`H_ID`);

--
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ball`
--
ALTER TABLE `ball`
  MODIFY `BALL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bucket`
--
ALTER TABLE `bucket`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bucket_history`
--
ALTER TABLE `bucket_history`
  MODIFY `H_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `super_admin`
--
ALTER TABLE `super_admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

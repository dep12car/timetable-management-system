-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 15, 2023 at 05:21 PM
-- Server version: 10.5.19-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u451789675_tms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` bigint(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Name`, `Email`, `Password`) VALUES
(1, 'Deepak Cardoza', 'deepakcardoza12@gmail.com', 'Dep12car');

-- --------------------------------------------------------

--
-- Table structure for table `all_courses`
--

CREATE TABLE `all_courses` (
  `Course_ID` varchar(5) NOT NULL,
  `Subject_Short` varchar(10) NOT NULL,
  `Subject_Long` varchar(50) NOT NULL,
  `Faculty` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `all_courses`
--

INSERT INTO `all_courses` (`Course_ID`, `Subject_Short`, `Subject_Long`, `Faculty`) VALUES
('C101', 'CFOS(SDK)', 'Computer Fundamentals and Operating System', 'Ms. Sadhana Kumble'),
('C101', 'CFOS(GRS)', 'Computer Fundamentals and Operating System', 'Mr. Gururaj S'),
('C101', 'DSA(SKT)', 'Data Structures with Algorithms', 'Mr. Sunith Kumar T'),
('C101', 'WT(HRB)', 'Web Technologies', 'Mr. Hareesh B'),
('C101', 'DBMS(RGR)', 'Database Management System', 'Mr. Ragesh Raju'),
('C101', 'DMS(JAB)', 'Discrete Mathematics and Statistics', 'Dr. Jagadeesha B'),
('C101', 'IOT-1(SVS)', 'Industry Oriented Training-1', 'Dr. Shubha V S'),
('', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `Course_ID` varchar(5) NOT NULL,
  `Branch` varchar(6) NOT NULL,
  `Semester` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`Course_ID`, `Branch`, `Semester`) VALUES
('C101', 'MCA', 'I');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `Course_ID` varchar(6) NOT NULL,
  `Subject_Short` varchar(20) NOT NULL,
  `Subject_Long` varchar(60) NOT NULL,
  `Faculty` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`Course_ID`, `Subject_Short`, `Subject_Long`, `Faculty`) VALUES
('C101', 'DSA Lab (SKT+SMN)', 'Data Structures with Algorithms Lab', 'Mr Sunith Kumar T & Ms Sumangala N'),
('C101', 'Web Lab (HRB+GRS)', 'Web Technologies Lab with Mini Project', 'Mr Hareesh B & Mr Gururaja s'),
('C101', 'TECH SEM(SMN+SKT)', 'Technical Seminar', 'Ms Sumangala N & Mr Sunith Kumar T'),
('C101', 'DBMS Lab', 'DBMS Laboratory', 'Mr Ragesh Raju & Ms Sadhana Kumble');

-- --------------------------------------------------------

--
-- Table structure for table `main_tt`
--

CREATE TABLE `main_tt` (
  `TT_ID` varchar(15) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Date` varchar(15) NOT NULL,
  `Time` varchar(15) NOT NULL,
  `Faculty` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE `slots` (
  `Slot_ID` varchar(4) NOT NULL,
  `Slot1` varchar(15) NOT NULL,
  `Slot2` varchar(15) NOT NULL,
  `Slot3` varchar(15) NOT NULL,
  `Slot4` varchar(15) NOT NULL,
  `Slot5` varchar(15) NOT NULL,
  `Slot6` varchar(15) NOT NULL,
  `Slot7` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slots`
--

INSERT INTO `slots` (`Slot_ID`, `Slot1`, `Slot2`, `Slot3`, `Slot4`, `Slot5`, `Slot6`, `Slot7`) VALUES
('S101', '9:00 - 9:55', '9:55 - 10:50', '11:10 - 12:05', '12:05 - 1:00', '2:00 - 3:00', '3:00 - 4:00', '4:00 - 5:00');

-- --------------------------------------------------------

--
-- Table structure for table `time_table`
--

CREATE TABLE `time_table` (
  `TT_ID` varchar(10) NOT NULL,
  `Day` varchar(15) NOT NULL,
  `Slot1` varchar(15) NOT NULL,
  `Slot2` varchar(15) NOT NULL,
  `Slot3` varchar(15) NOT NULL,
  `Slot4` varchar(15) NOT NULL,
  `Slot5` varchar(15) NOT NULL,
  `Slot6` varchar(15) NOT NULL,
  `Slot7` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `main_tt`
--
ALTER TABLE `main_tt`
  ADD PRIMARY KEY (`TT_ID`);

--
-- Indexes for table `slots`
--
ALTER TABLE `slots`
  ADD PRIMARY KEY (`Slot_ID`);

--
-- Indexes for table `time_table`
--
ALTER TABLE `time_table`
  ADD PRIMARY KEY (`TT_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

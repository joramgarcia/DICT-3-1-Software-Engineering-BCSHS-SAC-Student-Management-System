-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2024 at 05:11 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Birthday` varchar(10) NOT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Birthday`, `Email`, `Password`, `AdminRegdate`) VALUES
(4, 'Anamarie Mendez', 'anamarie', NULL, '2002-09-07', 'anamarie@gmail.com', '773522a697d4432e783dcf3893ee26be', '2024-02-08 08:41:36'),
(11, 'Joram Garcia', 'jgred09', 9512252520, '2002-10-09', 'jgred091002@gmail.com', 'dcd54f0c073f9a80ae25fc4e5903fc9c', '2024-02-08 21:21:16'),
(12, 'Fernalyn Lonquias', 'fernfern', 9058048723, '2002-07-07', 'fernalynepilonquias@gmail.com', '70569f70f391d58b0f167ba329bd1c2a', '2024-02-08 21:23:29'),
(13, 'Marissa Libot', 'issayie', 9123456789, '2002-07-19', 'marissalibot@gmail.com', 'e4a844133546f98214b40a39ff8f1dc0', '2024-02-08 21:24:20'),
(14, 'Paul Joseph Calagos', 'paulj', 987654321, '2003-07-09', 'pauljosephcalagos@gmail.com', '41f5a6b37e5986e7b83ac67e2f3e1b7b', '2024-02-08 21:25:17');

-- --------------------------------------------------------

--
-- Table structure for table `tblattendance`
--

CREATE TABLE `tblattendance` (
  `StudentName` varchar(100) NOT NULL,
  `StudentClass` varchar(50) NOT NULL,
  `StuID` varchar(50) NOT NULL,
  `Status` text NOT NULL,
  `Date` varchar(15) NOT NULL,
  `TimeIN` time NOT NULL,
  `TimeOUT` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblattendance`
--

INSERT INTO `tblattendance` (`StudentName`, `StudentClass`, `StuID`, `Status`, `Date`, `TimeIN`, `TimeOUT`) VALUES
('Joram A. Garcia', '12-TVL HE 2', '', 'Present', '2002-02-02', '07:13:00', '17:13:00'),
('Joram A. Garcia', '12-TVL HE 2', '', 'Present', '2002-02-02', '07:13:00', '17:13:00'),
('Joram A. Garcia', '12-TVL HE 2', '', 'Present', '2002-02-02', '07:13:00', '17:13:00'),
('Joram A. Garcia', '12-TVL HE 2', '', 'Present', '2002-02-02', '07:13:00', '17:13:00'),
('Joram A. Garcia', '12-TVL HE 2', '', 'Present', '2002-02-02', '07:13:00', '17:13:00'),
('Joram A. Garcia', '12-TVL HE 2', '', 'Present', '2002-02-02', '07:13:00', '17:13:00'),
('Joram A. Garcia', '12-TVL HE 2', 'Present', '2002-02-02', '07:13', '17:13:00', '00:00:00'),
('Joram A. Garcia', '12-TVL HE 2', '', 'Present', '2002-02-02', '07:13:00', '17:13:00'),
('Joram A. Garcia', '12-TVL HE 2', '', 'Present', '2002-02-02', '07:13:00', '17:13:00'),
('Joram A. Garcia', '12-TVL HE 2', '', 'Absent', '2002-08-02', '10:24:00', '15:24:00'),
('Joram A. Garcia', '12-TVL HE 2', '50250400157', 'Absent', '2024-01-07', '08:00:00', '10:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblclass`
--

CREATE TABLE `tblclass` (
  `ID` int(5) NOT NULL,
  `ClassName` varchar(50) DEFAULT NULL,
  `Section` varchar(20) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblclass`
--

INSERT INTO `tblclass` (`ID`, `ClassName`, `Section`, `CreationDate`) VALUES
(1, '11-TVL HE 1', NULL, '2024-02-09 17:22:59'),
(2, '11-TVL HE 2', NULL, '2024-02-09 17:23:05'),
(3, '11-TVL HE 3', NULL, '2024-02-09 17:23:20'),
(4, '11-ICT 1', NULL, '2024-02-09 17:23:26'),
(5, '11-ICT 2', NULL, '2024-02-09 17:23:32'),
(6, '11-ICT 3', NULL, '2024-02-09 17:23:36'),
(7, '11-IA 1', NULL, '2024-02-09 17:23:39'),
(8, '11-IA 2', NULL, '2024-02-09 17:23:44'),
(9, '11-IA 3', NULL, '2024-02-09 17:23:48'),
(10, '11-EIM 1', NULL, '2024-02-09 17:23:53'),
(11, '11-EIM 2', NULL, '2024-02-09 17:23:58'),
(12, '11-EIM 3', NULL, '2024-02-09 17:24:03'),
(13, '12-TVL HE 1', NULL, '2024-02-09 17:24:08'),
(14, '12-TVL HE 2', NULL, '2024-02-09 17:24:13'),
(15, '12-TVL HE 3', NULL, '2024-02-09 17:24:17'),
(16, '12-ICT 1', NULL, '2024-02-09 17:24:21'),
(17, '12-ICT 2', NULL, '2024-02-09 17:24:26'),
(18, '12-ICT 3', NULL, '2024-02-09 17:24:30'),
(19, '12-IA 1', NULL, '2024-02-09 17:24:35'),
(20, '12-IA 2', NULL, '2024-02-09 17:24:39'),
(21, '12-IA 3', NULL, '2024-02-09 17:24:45'),
(22, '12-EIM 1', NULL, '2024-02-09 17:24:49'),
(23, '12-EIM 2', NULL, '2024-02-09 17:24:55'),
(24, '12-EIM 3', NULL, '2024-02-09 17:25:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblnotice`
--

CREATE TABLE `tblnotice` (
  `ID` int(5) NOT NULL,
  `NoticeTitle` mediumtext DEFAULT NULL,
  `ClassId` int(10) DEFAULT NULL,
  `NoticeMsg` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblnotice`
--

INSERT INTO `tblnotice` (`ID`, `NoticeTitle`, `ClassId`, `NoticeMsg`, `CreationDate`) VALUES
(1, 'GO TO PRINCIPAL\'S OFFICE', 2, 'Important discussion related to the upcoming event on Feb 14, 2024', '2024-02-09 17:32:57');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(15) DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'About Us', '<div style=\"text-align: start;\"><span style=\"font-size: 20px; letter-spacing: 1px;\"><font color=\"#000000\" style=\"\" face=\"verdana\">The Biñan City Senior High School – San Antonio Campus, one of the Stand-Alone schools in the city, has been fully operating since June 13, 2016. It is located near San Antonio de Padua Parish Church and 850 meters away from the city’s main plaza. The recent rising Stand-Alone urban school continues to provide service that focuses on Technical-Vocational Education with a very large population. It offers three strands, namely Home Economics (HE), Information and Communication Technology (ICT), and Industrial Arts (IA). Also, the school opens a total of fifteen courses. The school widely reaches its eight catchment areas such as Dela Paz, Malaban, San Antonio, Canlalay, Tagapo, Langkiwa, Mamplasan, and San Jose.</font></span><br></div><div style=\"text-align: start;\"><font color=\"#000000\"><span style=\"font-size: 20px; letter-spacing: 1px;\"><div style=\"font-family: helvetica;\"><br></div><div style=\"\"><font face=\"verdana\">With more or less than 1,500 students, San Antonio Campus is composed of 51 teaching staff (four MTII, one MTI, three TIII, 42 TII and one TI), 10 non-teaching (one School Nurse, one Administration Officer, one Registrar, three ADAS, two security men, and two utility men), and one School Head. In a span of three-year operation, the school has been recognized in 2019 by International School Awards Global-India as “Outstanding Stand-Alone School.” San Antonio Campus further supports the advocacy of Sulong Edukalidad Pagtataguyod sa Kinabukasan ng Bayan and vows to maximize its effort to provide solutions and give the best quality education amidst the pandemic.</font></div></span></font></div><div style=\"text-align: start;\"><span style=\"font-family: poppins-extralight, poppins, sans-serif; font-size: 20px; letter-spacing: 1px;\"><font color=\"#000000\"><br></font></span></div>', NULL, NULL, NULL),
(2, 'contactus', 'Contact Us', 'Pedro H. Esqueta St., San Antonio Binan City of Laguna 4024', '342242@deped.gov.ph', 495118614, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblpublicnotice`
--

CREATE TABLE `tblpublicnotice` (
  `ID` int(5) NOT NULL,
  `NoticeTitle` varchar(200) DEFAULT NULL,
  `NoticeMessage` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpublicnotice`
--

INSERT INTO `tblpublicnotice` (`ID`, `NoticeTitle`, `NoticeMessage`, `CreationDate`) VALUES
(3, 'May Valentine ka na ba? ', 'Humanap na ng ka-Valentines mo this Feb. 14, 2024', '2024-02-09 17:34:33'),
(4, 'TEST ANNOUNCEMENT', 'TESTING NGA KASE', '2024-02-09 17:34:54');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `ID` int(10) NOT NULL,
  `StudentName` varchar(200) DEFAULT NULL,
  `StudentEmail` varchar(200) DEFAULT NULL,
  `StudentClass` varchar(100) DEFAULT NULL,
  `Gender` varchar(50) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `StuID` varchar(200) DEFAULT NULL,
  `FatherName` mediumtext DEFAULT NULL,
  `MotherName` mediumtext DEFAULT NULL,
  `ContactNumber` bigint(10) DEFAULT NULL,
  `AltenateNumber` bigint(10) DEFAULT NULL,
  `Address` mediumtext DEFAULT NULL,
  `UserName` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `Image` varchar(200) DEFAULT NULL,
  `DateofAdmission` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`ID`, `StudentName`, `StudentEmail`, `StudentClass`, `Gender`, `DOB`, `StuID`, `FatherName`, `MotherName`, `ContactNumber`, `AltenateNumber`, `Address`, `UserName`, `Password`, `Image`, `DateofAdmission`) VALUES
(1, 'Joram A. Garcia', 'joram11@testingmail.com', '14', 'Male', '2002-10-09', '50250400157', 'Francisco Garcia', 'Dolores Garcia', 99333, 91233, 'SV', 'testuser', 'f925916e2754e5e03f75dd58a5733251', '18c306208e1527c0a5ba9f1ea7bc66781707499844.png', '2024-02-09 17:30:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Password` (`Password`);

--
-- Indexes for table `tblclass`
--
ALTER TABLE `tblclass`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblnotice`
--
ALTER TABLE `tblnotice`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpublicnotice`
--
ALTER TABLE `tblpublicnotice`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblclass`
--
ALTER TABLE `tblclass`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tblnotice`
--
ALTER TABLE `tblnotice`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpublicnotice`
--
ALTER TABLE `tblpublicnotice`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblstudent`
--
ALTER TABLE `tblstudent`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

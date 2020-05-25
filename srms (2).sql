-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2020 at 06:15 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblclasses`
--

CREATE TABLE `tblclasses` (
  `id` int(11) NOT NULL,
  `ClassName` varchar(80) DEFAULT NULL,
  `ClassNameNumeric` int(4) DEFAULT NULL,
  `Section` varchar(5) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblclasses`
--

INSERT INTO `tblclasses` (`id`, `ClassName`, `ClassNameNumeric`, `Section`, `CreationDate`) VALUES
(16, 'Paraleli B', 2, 'A1', '2020-05-21 20:16:29'),
(17, 'Paraleli ', 1, 'A2', '2020-05-21 20:17:35'),
(18, 'Paraleli', 1, 'B1', '2020-05-21 20:20:01'),
(19, 'Paraleli', 1, 'B2', '2020-05-21 20:20:15'),
(20, 'Paraleli', 2, 'A2', '2020-05-21 20:20:56'),
(21, 'Paraleli', 2, 'B1', '2020-05-21 20:21:08'),
(22, 'Paraleli', 3, 'A1', '2020-05-21 20:21:30'),
(23, 'Paraleli', 3, 'B1', '2020-05-21 20:22:30'),
(24, 'Paraleli', 3, 'A2', '2020-05-21 20:23:20'),
(25, 'Paraleli ', 3, 'B2', '2020-05-21 20:24:37'),
(26, 'Paraleli A', 1, 'A1', '2020-05-21 20:33:28'),
(32, 'Paraleli', 4, 'A1', '2020-05-21 20:54:48'),
(37, 'Master', 1, 'A1', '2020-05-22 16:25:20'),
(43, 'Paraleli ', 1, 'A1', '2020-05-22 19:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblresult`
--

CREATE TABLE `tblresult` (
  `id` int(11) NOT NULL,
  `StudentId` int(11) DEFAULT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `SubjectId` int(11) DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblresult`
--

INSERT INTO `tblresult` (`id`, `StudentId`, `ClassId`, `SubjectId`, `marks`, `PostingDate`, `UpdationDate`) VALUES
(2, 1, 1, 2, 100, '2017-08-24 17:54:09', '2017-08-28 18:34:32'),
(3, 1, 1, 1, 80, '2017-08-24 17:54:09', '2017-08-28 18:34:25'),
(4, 1, 1, 5, 78, '2017-08-24 17:54:09', '2017-08-28 18:34:26'),
(5, 1, 1, 4, 60, '2017-08-24 17:54:09', '2017-08-28 18:34:26'),
(6, 2, 4, 2, 90, '2017-08-28 18:38:18', NULL),
(7, 2, 4, 1, 75, '2017-08-28 18:38:18', NULL),
(8, 2, 4, 5, 56, '2017-08-28 18:38:18', '2017-08-28 19:26:42'),
(9, 2, 4, 4, 80, '2017-08-28 18:38:18', '2017-08-28 19:26:42'),
(10, 4, 7, 2, 54, '2017-08-28 18:56:21', '2017-08-28 19:03:10'),
(11, 4, 7, 1, 85, '2017-08-28 18:56:21', NULL),
(12, 4, 7, 5, 55, '2017-08-28 18:56:21', '2017-08-28 19:03:10'),
(13, 4, 7, 7, 65, '2017-08-28 18:56:21', '2017-08-28 19:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjectcombination`
--

CREATE TABLE `tblsubjectcombination` (
  `id` int(11) NOT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `SubjectId` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `Updationdate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubjectcombination`
--

INSERT INTO `tblsubjectcombination` (`id`, `ClassId`, `SubjectId`, `status`, `CreationDate`, `Updationdate`) VALUES
(33, 23, 15, 0, '2020-05-22 12:06:15', '2020-05-22 20:57:04'),
(34, 19, 19, 1, '2020-05-22 13:10:37', '2020-05-22 17:00:42'),
(35, 17, 15, 0, '2020-05-22 13:11:46', '2020-05-22 16:47:26'),
(36, 26, 18, 1, '2020-05-22 13:12:00', '2020-05-22 16:59:17'),
(37, 37, 16, 1, '2020-05-22 16:26:34', '2020-05-22 16:48:23'),
(38, 22, 11, 0, '2020-05-22 16:27:48', '2020-05-22 17:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjects`
--

CREATE TABLE `tblsubjects` (
  `id` int(11) NOT NULL,
  `SubjectName` varchar(100) NOT NULL,
  `SubjectCode` varchar(100) DEFAULT NULL,
  `Creationdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubjects`
--

INSERT INTO `tblsubjects` (`id`, `SubjectName`, `SubjectCode`, `Creationdate`) VALUES
(11, 'Analize Numerike', 'AN-Inf_3', '2020-04-18 15:20:56'),
(15, 'Elektronike', 'El_Inf4', '2020-05-21 21:07:19'),
(16, 'Rrjeta', 'RR_INF', '2020-05-22 13:08:48'),
(17, 'Baza Informatike', 'Baza_Info', '2020-05-22 13:09:24'),
(18, 'Strukture te Dhenash', 'Str & Gjuhe C', '2020-05-22 13:09:43'),
(19, 'Fizike', 'F_Inf2', '2020-05-22 13:10:15'),
(20, 'Analize 1', 'Analize', '2020-05-22 16:26:06'),
(22, 'Gjermanisht', 'GJ_Inf', '2020-05-22 18:54:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `ClassId` int(10) NOT NULL,
  `DOB` varchar(20) NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `username`, `email`, `gender`, `ClassId`, `DOB`, `role`, `status`) VALUES
(2, 'boni1234', 'Boni10', '', '', 2, '0', 'Teacher', 0),
(3, 'c93ccd78b2076528346216b3b2f701e6', 'Admin10', '', '', 0, '0', 'Admin', 0),
(37, 'cd73502828457d15655bbd7a63fb0bc8', 'Albiona', 'a.g@fshnstudent.info', 'Female', 37, '1998-01-24', 'Student', 0),
(38, 'cd73502828457d15655bbd7a63fb0bc8', 'Elena', 'el.b@fshnstudent.info', 'Female', 16, '1999-01-19', 'Student', 0),
(39, 'cd73502828457d15655bbd7a63fb0bc8', 'Artenisa', 'a.g@fshnstudent.info', 'Female', 43, '1999-09-18', 'Student', 0),
(40, 'cd73502828457d15655bbd7a63fb0bc8', 'Aferdita', 'a.h@fshnstudent.info', 'Female', 37, '1998-01-17', 'Student', 0),
(41, 'cd73502828457d15655bbd7a63fb0bc8', 'Eliana', 'e.k@fshnstudent.info', 'Female', 23, '1999-09-11', 'Student', 0),
(42, 'cd73502828457d15655bbd7a63fb0bc8', 'Eni', 'eni.e@fshnstudent.info', 'Male', 18, '1998-07-07', 'Student', 0),
(45, 'cd73502828457d15655bbd7a63fb0bc8', 'Biorni', 'b.b@fshnstudent.info', 'Male', 26, '1998-01-18', 'Student', 0),
(54, 'student', 'un', 'Albiona.guri@fshnstudent.info', 'male', 26, '1999-12-12', 'Student', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblclasses`
--
ALTER TABLE `tblclasses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblresult`
--
ALTER TABLE `tblresult`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubjectcombination`
--
ALTER TABLE `tblsubjectcombination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `c` (`SubjectName`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cnst` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblclasses`
--
ALTER TABLE `tblclasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tblresult`
--
ALTER TABLE `tblresult`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblsubjectcombination`
--
ALTER TABLE `tblsubjectcombination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

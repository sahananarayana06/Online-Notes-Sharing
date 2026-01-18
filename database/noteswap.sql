-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2025 at 11:13 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `noteswap`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tblfaculty`
--

CREATE TABLE `tblfaculty` (
  `id` int(100) NOT NULL,
  `regno` varchar(100) NOT NULL,
  `fac_name` varchar(100) NOT NULL,
  `fac_phone` varchar(100) NOT NULL,
  `fac_email` varchar(100) NOT NULL,
  `fac_address` varchar(100) NOT NULL,
  `fac_username` varchar(100) NOT NULL,
  `fac_password` varchar(100) NOT NULL,
  `fac_gender` varchar(100) NOT NULL,
  `fac_image` varchar(100) NOT NULL,
  `resettoken` varchar(255) DEFAULT NULL,
  `resettokenexpire` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblfaculty`
--

INSERT INTO `tblfaculty` (`id`, `regno`, `fac_name`, `fac_phone`, `fac_email`, `fac_address`, `fac_username`, `fac_password`, `fac_gender`, `fac_image`, `resettoken`, `resettokenexpire`) VALUES
(14, 'FS821694340862', 'Sandeep', '9574831768', 'sandeep747@gmail.com', 'Mangalore', 'sandeep23', '1234', 'Female', 'dummy.jpg', '01ce31bbb542d9be85fce7a478f06319', '2025-10-10'),
(17, 'FS761696488953', 'Akshatha', '9923831868', 'akshatha747@gmail.com', 'Moodbidri', 'Akshatha23', '1234', 'Female', 'c.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblnotes`
--

CREATE TABLE `tblnotes` (
  `srno` int(100) NOT NULL,
  `UploadedBy` varchar(255) NOT NULL,
  `Uploadedon` date NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Notes` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblnotes`
--

INSERT INTO `tblnotes` (`srno`, `UploadedBy`, `Uploadedon`, `Subject`, `Notes`, `Type`, `Description`) VALUES
(7, 'Akshatha ', '2025-10-04', 'Network Technology', 'phpproblemsheet.pdf', 'pdf', 'php nt'),
(8, 'Sandeep', '2025-10-04', 'Artificial Intelligence', 'magazine.docx', 'docx', 'docx file');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `id` int(100) NOT NULL,
  `regno` varchar(100) NOT NULL,
  `stud_name` varchar(100) NOT NULL,
  `stud_phone` varchar(100) NOT NULL,
  `stud_email` varchar(100) NOT NULL,
  `stud_address` varchar(100) NOT NULL,
  `stud_username` varchar(100) NOT NULL,
  `stud_password` varchar(100) NOT NULL,
  `stud_gender` varchar(100) NOT NULL,
  `stud_image` varchar(100) NOT NULL,
  `resettoken` varchar(255) DEFAULT NULL,
  `resettokenexpire` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`id`, `regno`, `stud_name`, `stud_phone`, `stud_email`, `stud_address`, `stud_username`, `stud_password`, `stud_gender`, `stud_image`, `resettoken`, `resettokenexpire`) VALUES
(26, 'TS701694335364', 'Sahana', '9574871868', 'sahana747@gmail.com', 'Naravi', 'sahana.23', '1234', 'Female', 'dummy.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubject`
--

CREATE TABLE `tblsubject` (
  `id` int(100) NOT NULL,
  `subjectname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblsubject`
--

INSERT INTO `tblsubject` (`id`, `subjectname`) VALUES
(3, 'Network Technology'),
(4, 'Unix & Shell Programming'),
(6, 'Advance Web Technology'),
(7, 'Artificial Inteelligence'),
(8, 'PHP WebFramework & Services'),
(10, 'ASP.NET ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblfaculty`
--
ALTER TABLE `tblfaculty`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_fac_email` (`id`,`fac_email`);

--
-- Indexes for table `tblnotes`
--
ALTER TABLE `tblnotes`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_regno` (`id`,`regno`);

--
-- Indexes for table `tblsubject`
--
ALTER TABLE `tblsubject`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblfaculty`
--
ALTER TABLE `tblfaculty`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblnotes`
--
ALTER TABLE `tblnotes`
  MODIFY `srno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblstudent`
--
ALTER TABLE `tblstudent`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tblsubject`
--
ALTER TABLE `tblsubject`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

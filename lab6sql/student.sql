-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2017 at 04:10 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration2`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `credit` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `title`, `credit`) VALUES
('322236', 'WEB APPLICATION PROGRAMMING', 3),
('322431', 'WEB TECHNOLOGY', 3),
('322372', 'SYSTEMS ANALYSIS AND DESIGN', 3),
('322224', 'DIGITAL LOGIC AND COMPUTER INTERFACING', 3),
('322114', 'STRUCTURED PROGRAMMING', 3),
('322473', 'SOFTWARE DEVELOPMENT AND PROJECT MANAGEMENT', 3);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `std_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `course_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`std_id`, `course_id`) VALUES
('5001100348', '322236'),
('5001100348', '322114'),
('5001100348', '322224'),
('5001104807', '322236'),
('5001104807', '322431'),
('5001101634', '322236'),
('5001101634', '322431'),
('5001101811', '322236'),
('5001101811', '322224'),
('5001101811', '322114'),
('5001120060', '322372'),
('5001120060', '322114');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `std_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `std_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`std_id`, `std_name`, `province`) VALUES
('5001100348', 'นุชนารถ ขําทอง', 'ขอนแก่น'),
('5001104807', 'มัณฑนา ทองอยู่', 'เลย'),
('5001101634', 'จักรพงศ์ คนล่ํ่ำ', 'กรุงเทพฯ'),
('5001101811', 'นัยนา คําภู', 'ขอนแก่น'),
('5001102962', 'พรเทพ ชัยราชย์', 'อุดรธานี'),
('5001120060', 'มงคล บัวขาว', 'อุบลราชธานี'),
('5001130201', 'ชํานาญ  สุ่มนุช', 'นครราชสีมา');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

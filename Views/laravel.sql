-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 16, 2024 at 07:30 AM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminuser`
--

DROP TABLE IF EXISTS `adminuser`;
CREATE TABLE IF NOT EXISTS `adminuser` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role_id` tinyint NOT NULL DEFAULT '0' COMMENT '0:admin 1:superadmin',
  `fname` varchar(252) NOT NULL,
  `lname` varchar(252) NOT NULL,
  `loginid` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `adminuser`
--

INSERT INTO `adminuser` (`id`, `role_id`, `fname`, `lname`, `loginid`, `password`) VALUES
(1, 1, '', '', 'admin', 'f865b53623b121fd34ee5426c792e5c33af8c227'),
(2, 1, '', '', 'admin', '9f41fb6efb82c784896332204f85984bbe6b5d4c'),
(3, 0, 'mondal', 'coaching', 'mondalcoaching', '331fd0b6099c12c7f70f828cc438fb5e9a70246b'),
(5, 0, 'nilima', 'sarkar', 'nilima123', '1d13711824fc73e510c39f32d4e4a051c2c975ad');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL,
  `paymentdate` date NOT NULL,
  `semester` varchar(550) NOT NULL,
  `rupees` varchar(250) NOT NULL,
  `paymenttype` varchar(250) NOT NULL,
  `paymentcount` varchar(250) NOT NULL,
  `recivedby` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `userid`, `paymentdate`, `semester`, `rupees`, `paymenttype`, `paymentcount`, `recivedby`) VALUES
(1, 4, '2024-01-16', '3rd', '1350', 'cash', 'partial', 'mondalcoaching'),
(2, 4, '2024-01-16', '1st', '1500', 'cash', 'full', 'mondalcoaching');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `fathername` varchar(500) NOT NULL,
  `emailid` varchar(500) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(900) NOT NULL,
  `subject` varchar(900) NOT NULL,
  `dob` date NOT NULL,
  `pic` varchar(500) NOT NULL,
  `class` varchar(250) NOT NULL,
  `year` varchar(250) NOT NULL,
  `admissiondate` date NOT NULL,
  `addedby` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `fathername`, `emailid`, `phone`, `address`, `subject`, `dob`, `pic`, `class`, `year`, `admissiondate`, `addedby`) VALUES
(1, 'test name', 'test name', 'testnamelord@gmail.com', '9382040686', 'adbajdb', 'jadgadbkaig', '2003-11-05', 'easyit.png', 'ba', '2021', '2024-01-15', 'admin'),
(2, 'test name ', 'heymeta', 'hello@eptphuket.com', '9382040682', 'davadbjk', 'babjkdbaig', '2008-05-11', 'eer.png', 'ba', '2020', '2024-01-15', 'admin'),
(3, 'test1', 'test', '', '', '', '', '1970-01-01', '', '0', '0', '2024-01-16', 'mondalcoaching'),
(4, 'test', 'testname', 'test@test.com', '5154445454', 'adkbabdkbgih', 'cvuachbakhg', '2000-11-11', 'anuratural.png', 'ma', '2023', '2024-01-16', 'mondalcoaching'),
(5, 'new student', 'father', 'email@mail.com', '1234567890', 'bfahgafjjagf,faoifafh', 'fgagfjaigafkb,afugafh', '2003-10-22', 'Screenshot 2023-05-17 110857.png', 'ba', '2024', '2024-01-16', 'mondalcoaching');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

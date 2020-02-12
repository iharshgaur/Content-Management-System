-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 26, 2018 at 03:12 AM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpapplication`
--

-- --------------------------------------------------------

--
-- Table structure for table `UploadFile`
--

CREATE TABLE `UploadFile` (
  `userid` bigint(20) UNSIGNED NOT NULL,
  `FileName` varchar(500) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `UploadFile`
--

INSERT INTO `UploadFile` (`userid`, `FileName`, `Time`) VALUES
(1, 'scheirer2014(1).pdf', '2018-10-25 21:06:28'),
(2, 'uniliver.pdf', '2018-10-25 21:07:22'),
(3, 'Thamme-Gowda-N-Resume.pdf', '2018-10-25 21:23:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `UploadFile`
--
ALTER TABLE `UploadFile`
  ADD UNIQUE KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `UploadFile`
--
ALTER TABLE `UploadFile`
  MODIFY `userid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

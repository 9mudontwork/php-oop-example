-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2017 at 10:51 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mywork`
--

-- --------------------------------------------------------

--
-- Table structure for table `human`
--

CREATE TABLE `human` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `bloodtype` varchar(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `human`
--

INSERT INTO `human` (`id`, `name`, `surname`, `age`, `sex`, `bloodtype`) VALUES
(39, 'htyokfyu', 'esrgh', 17, 'Women', 'AB'),
(38, 'kyuyuk', 'setghy', 15, 'Men', 'O'),
(37, 'raerg', 'serthsrth', 16, 'Women', 'B'),
(36, 'dfg', 'haerg', 12, 'Men', 'A'),
(35, 'htyokfyu', 'esrgh', 17, 'Women', 'AB'),
(34, 'kyuyuk', 'setghy', 15, 'Men', 'O'),
(33, 'raerg', 'serthsrth', 16, 'Women', 'B'),
(32, 'dfg', 'haerg', 12, 'Men', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `human`
--
ALTER TABLE `human`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `human`
--
ALTER TABLE `human`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

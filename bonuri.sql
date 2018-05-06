-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2018 at 04:57 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bonuri`
--

-- --------------------------------------------------------

--
-- Table structure for table `bonuri`
--

CREATE TABLE `bonuri` (
  `id` int(11) NOT NULL,
  `valoare` int(11) NOT NULL,
  `zi` int(11) NOT NULL,
  `luna` int(11) NOT NULL,
  `adaugat_la` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `descriere` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bonuri`
--

INSERT INTO `bonuri` (`id`, `valoare`, `zi`, `luna`, `adaugat_la`, `descriere`) VALUES
(7, 39, 7, 3, '2018-04-08 15:03:11', ''),
(8, 55, 6, 4, '2018-04-08 15:03:22', ''),
(9, 29, 7, 4, '2018-04-08 15:04:26', ''),
(10, 29, 2, 4, '2018-04-08 15:05:07', ''),
(11, 25, 15, 3, '2018-04-08 15:07:02', ''),
(12, 30, 28, 3, '2018-04-08 15:07:40', ''),
(13, 9, 30, 3, '2018-04-08 15:23:22', ''),
(14, 7, 3, 4, '2018-04-08 15:25:27', ''),
(15, 368, 7, 4, '2018-04-08 15:26:29', ''),
(16, 12, 4, 4, '2018-04-08 15:27:23', ''),
(17, 3, 7, 4, '2018-04-08 15:35:01', ''),
(18, 160, 12, 1, '2018-04-08 15:35:47', ''),
(19, 3, 11, 3, '2018-04-08 15:35:58', ''),
(20, 429, 11, 2, '2018-04-08 15:37:13', ''),
(21, 168, 13, 1, '2018-04-08 15:37:29', ''),
(25, 120, 23, 3, '2018-04-08 16:37:12', 'Carlig remorca - manopera'),
(26, 999, 9, 1, '2018-04-08 16:38:00', 'Boxa jbl'),
(27, 51, 15, 4, '2018-04-19 17:32:35', ''),
(28, 149, 18, 4, '2018-04-19 17:33:09', ''),
(29, 17, 16, 4, '2018-04-19 17:34:13', ''),
(30, 25, 16, 4, '2018-04-19 17:34:27', ''),
(31, 9, 13, 4, '2018-04-19 17:34:44', ''),
(32, 13, 12, 4, '2018-04-19 17:35:10', ''),
(33, 13, 18, 4, '2018-04-19 17:35:30', ''),
(34, 48, 14, 4, '2018-04-23 15:00:56', ''),
(35, 40, 11, 4, '2018-04-23 15:01:47', ''),
(36, 14, 17, 4, '2018-04-23 15:02:02', ''),
(37, 6, 23, 4, '2018-04-23 15:02:23', ''),
(38, 12, 23, 4, '2018-04-23 15:02:39', ''),
(39, 16, 20, 4, '2018-04-23 15:03:04', ''),
(40, 15, 20, 3, '2018-04-23 15:03:43', ''),
(41, 9, 11, 4, '2018-04-23 15:04:12', ''),
(42, 225, 17, 4, '2018-04-23 15:04:29', ''),
(43, 251, 13, 4, '2018-04-23 15:05:03', ''),
(44, 299, 1, 4, '2018-04-23 15:05:46', ''),
(45, 4, 19, 4, '2018-04-23 15:05:59', ''),
(46, 24, 16, 4, '2018-04-23 15:06:18', ''),
(47, 5, 10, 4, '2018-04-23 15:06:45', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bonuri`
--
ALTER TABLE `bonuri`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bonuri`
--
ALTER TABLE `bonuri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

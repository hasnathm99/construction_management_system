-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2018 at 12:03 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `construction`
--

-- --------------------------------------------------------

--
-- Table structure for table `machines`
--

CREATE TABLE `machines` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `machines`
--

INSERT INTO `machines` (`id`, `name`, `category`) VALUES
(11, 'CAT E200B (A)', 'excavator'),
(12, 'CAT E200B (B)', 'excavator'),
(13, 'Hitachi EX1502C', 'excavator'),
(14, 'Caterpillar 225', 'excavator'),
(15, 'Hanta Pavers 3.1m', 'paver'),
(16, 'Hanta Pavers 2.50m', 'paver'),
(17, 'Barber Green', 'paver'),
(18, 'TCM 850', 'payloader'),
(19, 'Volvo BM4400', 'payloader'),
(20, 'Kanto Roller', 'roller'),
(21, 'Sakai Roller 9 tyre', 'roller'),
(22, 'SM  Roller', 'roller'),
(23, '2 wheel steal Sakai Roller', 'roller'),
(24, '2 wheel JM  Roller', 'roller'),
(25, '3 wheel Sheet metal Roller', 'roller'),
(26, '3 wheel Dynapac Roller', 'roller'),
(27, '3 wheel Joseph Roller', 'roller'),
(28, 'Baby Roller', 'roller'),
(29, 'Vibromax Roller', 'roller'),
(30, 'Bedford Truck', 'truck');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `machines`
--
ALTER TABLE `machines`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `machines`
--
ALTER TABLE `machines`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

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
-- Table structure for table `equipment_oil`
--

CREATE TABLE `equipment_oil` (
  `id` int(10) NOT NULL,
  `oil_name` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `amount` int(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment_oil`
--

INSERT INTO `equipment_oil` (`id`, `oil_name`, `type`, `amount`, `date`) VALUES
(8, 'mobil', 'Barber Green', 100, '2018-09-02'),
(9, 'mobil', 'Barber Green', 100, '2018-09-02'),
(10, 'mobil', 'SM  Roller', 1000, '2018-09-02'),
(11, 'mobil', 'Baby Roller', 100, '2018-09-02'),
(12, 'mobil', 'Barber Green', 100, '2018-09-02'),
(13, 'mobil', '2 wheel Sakai Roller', 1000, '2018-09-02'),
(14, 'mobil', '2 wheel JM  Roller', 100, '2018-09-02'),
(15, 'mobil', '2 wheel Sakai Roller', 100, '2018-09-04'),
(16, 'mobil', '2 wheel JM  Roller', 120, '2018-09-02'),
(17, 'mobil', '2 wheel Sakai Roller', 120, '2018-09-02'),
(18, 'mobil', '2 wheel JM  Roller', 100, '2018-09-04'),
(19, 'petrol', 'Baby Roller', 500, '2018-09-02'),
(24, 'mobil', 'CAT E200B (A)', 123, '2018-09-19'),
(25, 'petrol', 'Baby Roller', 120, '2018-09-09'),
(26, 'petrol', 'Baby Roller', 900, '2018-09-09'),
(27, 'mobil', 'TCM 850', 500, '2018-09-09'),
(28, 'mobil', 'TCM 850', 500, '2018-09-09'),
(29, 'mobil', 'Vibromax Roller', 500, '2018-09-09'),
(30, 'mobil', 'Bedford Truck', 500, '2018-09-09'),
(31, 'mobil', 'CAT E200B (A)', 500, '2018-09-09'),
(32, 'grees', 'CAT E200B (A)', 200, '2018-09-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipment_oil`
--
ALTER TABLE `equipment_oil`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipment_oil`
--
ALTER TABLE `equipment_oil`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3305
-- Generation Time: Oct 08, 2024 at 12:38 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diligent`
--

-- --------------------------------------------------------

--
-- Table structure for table `delievery_items`
--

CREATE TABLE `delievery_items` (
  `id` int(11) NOT NULL,
  `title` text,
  `qty` int(11) DEFAULT NULL,
  `challan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_services`
--

INSERT INTO `delievery_items` (`id`, `title`, `qty`, `challan_id`) VALUES
(1, 'w2', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delievery_items`
--
ALTER TABLE `delievery_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quotation_id` (`challan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `delievery_items`
--
ALTER TABLE `delievery_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

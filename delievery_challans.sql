-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3305
-- Generation Time: Oct 08, 2024 at 12:36 PM
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
-- Table structure for table `delievery_challans`
--

CREATE TABLE `delievery_challans` (
  `id` int(11) NOT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `clientname` varchar(255) DEFAULT '',
  `for_building` varchar(255) DEFAULT '',
  `office` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT '',
  `trn_number` varchar(255) DEFAULT '',
  `ref_number` varchar(255) NOT NULL,
  `prepared_by` int(11) DEFAULT NULL,
  `quotation_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delievery_challans`
--

INSERT INTO `delievery_challans` (`id`, `month`, `year`, `clientname`, `for_building`, `office`, `phone`, `trn_number`, `ref_number`, `prepared_by`, `quotation_id`, `created_at`, `updated_at`) VALUES
(1, 'JAN', 2023, 'random', '3r3r3', '3r3r3r', '03000000000', '334', '334', 1, 4, '2024-10-03 02:01:42', '2024-10-03 09:01:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delievery_challans`
--
ALTER TABLE `delievery_challans`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `delievery_challans`
--
ALTER TABLE `delievery_challans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

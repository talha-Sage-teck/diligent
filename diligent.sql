-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3305
-- Generation Time: Oct 10, 2024 at 02:46 PM
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
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('mh53dgtt2ns7j18p9397j42356i71te7', '::1', 1728547052, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732383534373035323b6964656e746974797c733a333a22616c69223b757365726e616d657c733a333a22616c69223b656d61696c7c733a31373a22616c6940736167652d7465636b2e636f6d223b757365725f69647c693a323b6f6c645f6c6173745f6c6f67696e7c693a313732383339363831393b6c6173745f636865636b7c693a313732383534373035323b),
('un73havm0a52k46575oars442m4uqqa7', '::1', 1728547052, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732383534373035323b6964656e746974797c733a333a22616c69223b757365726e616d657c733a333a22616c69223b656d61696c7c733a31373a22616c6940736167652d7465636b2e636f6d223b757365725f69647c693a323b6f6c645f6c6173745f6c6f67696e7c693a313732383534373035323b6c6173745f636865636b7c693a313732383534373035323b),
('80bk191lk115vv6dm7j7s2d1l0876qi1', '::1', 1728547126, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732383534373132363b6964656e746974797c733a333a22616c69223b757365726e616d657c733a333a22616c69223b656d61696c7c733a31373a22616c6940736167652d7465636b2e636f6d223b757365725f69647c693a323b6f6c645f6c6173745f6c6f67696e7c693a313732383534373035323b6c6173745f636865636b7c693a313732383534373132363b),
('50983t6qts4bu5o1n8an1ppc321pa5i7', '::1', 1728547126, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732383534373132363b6964656e746974797c733a333a22616c69223b757365726e616d657c733a333a22616c69223b656d61696c7c733a31373a22616c6940736167652d7465636b2e636f6d223b757365725f69647c693a323b6f6c645f6c6173745f6c6f67696e7c693a313732383534373132363b6c6173745f636865636b7c693a313732383534373132363b),
('g1o7aktsog7ji80rp36te58hui060t03', '::1', 1728547144, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732383534373134343b6964656e746974797c733a333a22616c69223b757365726e616d657c733a333a22616c69223b656d61696c7c733a31373a22616c6940736167652d7465636b2e636f6d223b757365725f69647c693a323b6f6c645f6c6173745f6c6f67696e7c693a313732383534373132363b6c6173745f636865636b7c693a313732383534373134343b72656665727265725f75726c7c733a34363a22687474703a2f2f6c6f63616c686f73743a383038302f64696c6967656e7467726f7570732f696e73706563746f72223b),
('tn5o57htjk29h7qkfifb6dm1d32cg5m4', '::1', 1728547144, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732383534373134343b6964656e746974797c733a333a22616c69223b757365726e616d657c733a333a22616c69223b656d61696c7c733a31373a22616c6940736167652d7465636b2e636f6d223b757365725f69647c693a323b6f6c645f6c6173745f6c6f67696e7c693a313732383534373134343b6c6173745f636865636b7c693a313732383534373134343b72656665727265725f75726c7c733a34363a22687474703a2f2f6c6f63616c686f73743a383038302f64696c6967656e7467726f7570732f696e73706563746f72223b),
('8tkaa3sga2h0bs336vmgr8t0bmi1tfej', '::1', 1728547152, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732383534373135323b6964656e746974797c733a333a22616c69223b757365726e616d657c733a333a22616c69223b656d61696c7c733a31373a22616c6940736167652d7465636b2e636f6d223b757365725f69647c693a323b6f6c645f6c6173745f6c6f67696e7c693a313732383534373134343b6c6173745f636865636b7c693a313732383534373135323b72656665727265725f75726c7c733a34363a22687474703a2f2f6c6f63616c686f73743a383038302f64696c6967656e7467726f7570732f696e73706563746f72223b),
('9do624v8df6cj844ngqg25r5i73sfi1q', '::1', 1728547152, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732383534373135323b6964656e746974797c733a333a22616c69223b757365726e616d657c733a333a22616c69223b656d61696c7c733a31373a22616c6940736167652d7465636b2e636f6d223b757365725f69647c693a323b6f6c645f6c6173745f6c6f67696e7c693a313732383534373135323b6c6173745f636865636b7c693a313732383534373135323b72656665727265725f75726c7c733a34363a22687474703a2f2f6c6f63616c686f73743a383038302f64696c6967656e7467726f7570732f696e73706563746f72223b),
('mevkk1oe0l3pup3h37abucp4p969mvpb', '::1', 1728547288, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732383534373238383b6964656e746974797c733a333a22616c69223b757365726e616d657c733a333a22616c69223b656d61696c7c733a31373a22616c6940736167652d7465636b2e636f6d223b757365725f69647c693a323b6f6c645f6c6173745f6c6f67696e7c693a313732383534373135323b6c6173745f636865636b7c693a313732383534373238383b72656665727265725f75726c7c733a34363a22687474703a2f2f6c6f63616c686f73743a383038302f64696c6967656e7467726f7570732f696e73706563746f72223b),
('vkfasc2hdni19m4d4hvassfoodecauci', '::1', 1728547288, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732383534373238383b6964656e746974797c733a333a22616c69223b757365726e616d657c733a333a22616c69223b656d61696c7c733a31373a22616c6940736167652d7465636b2e636f6d223b757365725f69647c693a323b6f6c645f6c6173745f6c6f67696e7c693a313732383534373238383b6c6173745f636865636b7c693a313732383534373238383b72656665727265725f75726c7c733a34363a22687474703a2f2f6c6f63616c686f73743a383038302f64696c6967656e7467726f7570732f696e73706563746f72223b),
('ccgd3acpocmskhrt1fe1ihkkalp5ncbs', '::1', 1728547366, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732383534373336363b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c693a313b6f6c645f6c6173745f6c6f67696e7c693a313732383339363835323b6c6173745f636865636b7c693a313732383534373336363b72656665727265725f75726c7c733a34353a22687474703a2f2f6c6f63616c686f73743a383038302f64696c6967656e7467726f7570732f657870656e736573223b),
('vmooen5vehcejhh7l609g8c10c53s1uc', '::1', 1728547366, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732383534373336363b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c693a313b6f6c645f6c6173745f6c6f67696e7c693a313732383534373336363b6c6173745f636865636b7c693a313732383534373336363b72656665727265725f75726c7c733a34353a22687474703a2f2f6c6f63616c686f73743a383038302f64696c6967656e7467726f7570732f657870656e736573223b),
('0aeadlp31mnp1e2cj9vgbghta4qmk5a4', '::1', 1728547418, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732383534373431383b6964656e746974797c733a333a22616c69223b757365726e616d657c733a333a22616c69223b656d61696c7c733a31373a22616c6940736167652d7465636b2e636f6d223b757365725f69647c693a323b6f6c645f6c6173745f6c6f67696e7c693a313732383534373238383b6c6173745f636865636b7c693a313732383534373431383b),
('99l911b7vac71sjs43dkqkhdl2deda5n', '::1', 1728547418, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732383534373431383b6964656e746974797c733a333a22616c69223b757365726e616d657c733a333a22616c69223b656d61696c7c733a31373a22616c6940736167652d7465636b2e636f6d223b757365725f69647c693a323b6f6c645f6c6173745f6c6f67696e7c693a313732383534373431383b6c6173745f636865636b7c693a313732383534373431383b),
('tmsph1bu1tfh6h0pu7246u4cjih9doq4', '::1', 1728548111, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732383534383131313b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c693a313b6f6c645f6c6173745f6c6f67696e7c693a313732383534373336363b6c6173745f636865636b7c693a313732383534383131313b),
('edea87ujms6qqvqn6f8ootbak152bhft', '::1', 1728548111, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732383534383131313b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c693a313b6f6c645f6c6173745f6c6f67696e7c693a313732383534383131313b6c6173745f636865636b7c693a313732383534383131313b),
('csaecm5vga6hetj39ksh2g0e310ro1c4', '::1', 1728553854, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732383534383131313b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c693a313b6f6c645f6c6173745f6c6f67696e7c693a313732383534383131313b6c6173745f636865636b7c693a313732383534383131313b),
('2u19m3e84umbq9kb219vsn0jq9dj160h', '::1', 1728549023, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732383534393032333b6964656e746974797c733a353a2273616c6573223b757365726e616d657c733a353a2273616c6573223b656d61696c7c733a31353a2273616c657340676d61696c2e636f6d223b757365725f69647c693a333b6f6c645f6c6173745f6c6f67696e7c4e3b6c6173745f636865636b7c693a313732383534393032333b),
('prive41adjf7ivsof3uhuemp7q1gqc6r', '::1', 1728549023, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732383534393032333b6964656e746974797c733a353a2273616c6573223b757365726e616d657c733a353a2273616c6573223b656d61696c7c733a31353a2273616c657340676d61696c2e636f6d223b757365725f69647c693a333b6f6c645f6c6173745f6c6f67696e7c693a313732383534393032333b6c6173745f636865636b7c693a313732383534393032333b),
('7cjkcag42sb95pmvvnbgtcod7c9jkv1k', '::1', 1728553886, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732383534393032333b6964656e746974797c733a353a2273616c6573223b757365726e616d657c733a353a2273616c6573223b656d61696c7c733a31353a2273616c657340676d61696c2e636f6d223b757365725f69647c693a333b6f6c645f6c6173745f6c6f67696e7c693a313732383534393032333b6c6173745f636865636b7c693a313732383534393032333b),
('ldv60fep46ltdohmvppveerqlj4gq415', '::1', 1728562569, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732383536323536393b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c693a313b6f6c645f6c6173745f6c6f67696e7c693a313732383534383131313b6c6173745f636865636b7c693a313732383536323536393b),
('qk76kk5ak33q31feaiq9jar8dmlka598', '::1', 1728562569, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732383536323536393b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c693a313b6f6c645f6c6173745f6c6f67696e7c693a313732383536323536393b6c6173745f636865636b7c693a313732383536323536393b),
('en5h8evdih8fdu6i93hpgp1ajlls85jm', '::1', 1728564359, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732383536323536393b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c693a313b6f6c645f6c6173745f6c6f67696e7c693a313732383536323536393b6c6173745f636865636b7c693a313732383536323536393b),
('nneik9jfgdorkgcu5v8r0cpnnm0v9csp', '::1', 1728562589, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732383536323538393b6964656e746974797c733a353a2273616c6573223b757365726e616d657c733a353a2273616c6573223b656d61696c7c733a31353a2273616c657340676d61696c2e636f6d223b757365725f69647c693a333b6f6c645f6c6173745f6c6f67696e7c693a313732383534393032333b6c6173745f636865636b7c693a313732383536323538393b),
('4u6ofrajoa8djgugp9g78j319s6ch34m', '::1', 1728562589, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732383536323538393b6964656e746974797c733a353a2273616c6573223b757365726e616d657c733a353a2273616c6573223b656d61696c7c733a31353a2273616c657340676d61696c2e636f6d223b757365725f69647c693a333b6f6c645f6c6173745f6c6f67696e7c693a313732383536323538393b6c6173745f636865636b7c693a313732383536323538393b),
('79j7mbcaj02jrnlf20i5g4cme3vcri5c', '::1', 1728562821, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732383536323538393b6964656e746974797c733a353a2273616c6573223b757365726e616d657c733a353a2273616c6573223b656d61696c7c733a31353a2273616c657340676d61696c2e636f6d223b757365725f69647c693a333b6f6c645f6c6173745f6c6f67696e7c693a313732383536323538393b6c6173745f636865636b7c693a313732383536323538393b);

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
-- Dumping data for table `delievery_items`
--

INSERT INTO `delievery_items` (`id`, `title`, `qty`, `challan_id`) VALUES
(2, 'w2', 110, 1),
(3, 'A11', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `price` decimal(10,0) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `title`, `description`, `image`, `created_at`, `price`, `updated_at`) VALUES
(1, 'abc', 'abc..........................', 'FYPPoster.png', '2024-10-01 03:14:42', '12000', '2024-10-01 10:14:42');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(4, 'salesman', 'Salesman');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
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
  `grand_total` decimal(10,0) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `inv_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `month`, `year`, `clientname`, `for_building`, `office`, `phone`, `trn_number`, `ref_number`, `prepared_by`, `quotation_id`, `grand_total`, `created_at`, `updated_at`, `inv_status`) VALUES
(1, 'JAN', 2023, 'random', '3r3r3', '3r3r3r', '03000000000', '334', '334', 1, 4, '105', '2024-10-03 02:01:42', '2024-10-10 09:22:55', 'Paid'),
(2, 'JAN', 2023, 'Ali', '3r3r3', '3r3r3r', '03000000000', '1', '1', 1, 22, '1050', '2024-10-08 05:36:49', '2024-10-10 12:43:26', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_services`
--

CREATE TABLE `invoice_services` (
  `id` int(11) NOT NULL,
  `title` text,
  `rate` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `tax_amount` decimal(10,0) DEFAULT NULL,
  `total_amount` decimal(10,0) DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_services`
--

INSERT INTO `invoice_services` (`id`, `title`, `rate`, `qty`, `price`, `tax_amount`, `total_amount`, `invoice_id`) VALUES
(1, 'w2', 100, 1, NULL, '5', '105', 1),
(2, 'A11', 100, 10, NULL, '50', '1050', 2);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `brand` text NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `title`, `description`, `created_at`, `updated_at`, `brand`, `category`) VALUES
(1, 'A11', '911.......................', '0000-00-00 00:00:00', '2024-10-01 14:20:42', '', '0'),
(2, 'A1', 'Abc....', '0000-00-00 00:00:00', '2024-10-01 14:34:56', 'Abc....', '0'),
(3, 'A2', 'A2 description', '0000-00-00 00:00:00', '2024-10-01 14:35:32', 'A2 brand', '0'),
(4, 'A11', 'A11 description', '0000-00-00 00:00:00', '2024-10-01 14:36:57', 'A11 brand', 'A11 category');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `key_title` varchar(255) NOT NULL,
  `key_value` text NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `key_title`, `key_value`, `description`) VALUES
(1, 'site_title', 'Diligent Energy', NULL),
(15, 'currency', 'PKR', NULL),
(16, 'currency_position', 'left', NULL),
(17, 'date_short', 'd M, Y', NULL),
(18, 'date_long', 'd-m-Y', NULL),
(19, 'contact_no', '+971 4 321 1234', NULL),
(20, 'site_email', 'operations@mycoinpay.com', NULL),
(21, 'app_android_link', '', NULL),
(22, 'app_iphone_link', '', NULL),
(23, 'facebook_link', '#', NULL),
(24, 'instagram_link', '', NULL),
(25, 'linkedin_link', '', NULL),
(26, 'twitter_link', '', NULL),
(27, 'footer_about', 'Our digital gifting platform is used by individuals and businesses to celebrate, reward, motivate and show appreciation to friends, loved ones, employees, customers and business partners.', NULL),
(28, 'sst', '3', NULL),
(29, 'service_fee', '50', NULL),
(30, 'youtube_link', 'https://www.youtube.com/channel/UC6rYZM8zFXQ-4xjfQ4zziNA', NULL),
(31, 'admin_info_email', 'admin1@localhost', NULL),
(47, 'min_withdraw', '1', NULL),
(48, 'referral_first_commission', '5', 'Use numbers without % sign'),
(49, 'withdraw_referral_fee', '5', 'just enter numbers no % sign'),
(50, 'withdraw_admin_fee', '3', 'value is in %'),
(51, 'bitcoin_xpub_key', 'xpub6CkyUirYD9MXWnDomqnHg9BwafVaqJZ5U7b9C5hfnzef87vVJh5Yj7WWJST83DXJ5kMbcEiBoqGxoHxJ3WgCC3jCuPzBkGzyxZnMWZDDycR', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

CREATE TABLE `quotations` (
  `id` int(11) NOT NULL,
  `clientname` varchar(255) DEFAULT NULL,
  `attention` varchar(255) DEFAULT NULL,
  `project` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `validity_days` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mobduration` varchar(255) DEFAULT NULL,
  `workduration` int(11) DEFAULT NULL,
  `prepared_by` int(11) DEFAULT NULL,
  `inspection_id` int(11) DEFAULT NULL,
  `quotation_text` text NOT NULL,
  `status` enum('accepted','rejected','reprice','new') DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quotations`
--

INSERT INTO `quotations` (`id`, `clientname`, `attention`, `project`, `location`, `validity_days`, `created_at`, `updated_at`, `mobduration`, `workduration`, `prepared_by`, `inspection_id`, `quotation_text`, `status`) VALUES
(1, 'Irtiqa', 'i Att', 'i project', 'inloc', '15 Days', '2024-10-01 03:49:00', '2024-10-03 12:05:04', '1', 7, 1, NULL, '<h3>Client Supplied Equipment & Resources</h3>\r\n<p><strong>BETTER ACCESS</strong> understand that the following items will be supplied at site</p>\r\n<ul>\r\n  <li>Plant Air/Electricity& water as required.</li>\r\n  <li>Free & unrestricted access to structure.</li>\r\n  <li>Entry permits for our personnel to the site.</li>\r\n  <li>Sufficient secure storage space for our Material on site.</li>\r\n</ul>\r\n<p>Further to above, it is assumed that the end user will supply the <strong>BETTER ACCESS</strong> Team with assistance as required and all necessary job specific tooling to complete required tasks.</p>\r\n<h3>SAFETY</h3>\r\n<p><strong>BETTER ACCESS</strong> Personnel will operate under the control of the Site Permit System to Work as required. Further to this, all <strong>BETTER ACCESS</strong> operations will be fully risk assessed and the team will ensure that all parameters of the scope and individual roles and responsibilities are covered in toolbox talks prior to any work commencing. This area will be covered in more detail in our technical proposal.</p>\r\n<h3>Terms & Conditions</h3>\r\n<p>The following terms are also applicable</p>\r\n<ol>\r\n  <li>Above Rates are with Accommodation & Transportation.</li>\r\n  <li>Invoice will be submitted after the completion of the job.</li>\r\n  <li>This quotation is valid for 30 days from the above date.</li>\r\n  <li>Plant, utility air, water and electricity will be available free of charge to BAC On site if required</li>\r\n  <li>Payment: Payment will be payable within 30 days after submission of invoice.</li>\r\n  <li>Permissions & NOC: Any kind of permission/NOC if required from Municipality & RTA, will be provided by Client.</li>\r\n</ol>\r\n<p>We therefore trust that the above proposal is of interest to your company We may look forward to receiving your further instructions in due course.</p>\r\n', 'new'),
(2, 'Ali', 'xyz', 'Abc', 'Abc', '15 Days', '2024-10-01 03:49:18', '2024-10-01 10:49:18', '2', 11, 1, NULL, '<h3>Client Supplied Equipment & Resources</h3>\r\n<p><strong>BETTER ACCESS</strong> understand that the following items will be supplied at site</p>\r\n<ul>\r\n  <li>Plant Air/Electricity& water as required.</li>\r\n  <li>Free & unrestricted access to structure.</li>\r\n  <li>Entry permits for our personnel to the site.</li>\r\n  <li>Sufficient secure storage space for our Material on site.</li>\r\n</ul>\r\n<p>Further to above, it is assumed that the end user will supply the <strong>BETTER ACCESS</strong> Team with assistance as required and all necessary job specific tooling to complete required tasks.</p>\r\n<h3>SAFETY</h3>\r\n<p><strong>BETTER ACCESS</strong> Personnel will operate under the control of the Site Permit System to Work as required. Further to this, all <strong>BETTER ACCESS</strong> operations will be fully risk assessed and the team will ensure that all parameters of the scope and individual roles and responsibilities are covered in toolbox talks prior to any work commencing. This area will be covered in more detail in our technical proposal.</p>\r\n<h3>Terms & Conditions</h3>\r\n<p>The following terms are also applicable</p>\r\n<ol>\r\n  <li>Above Rates are with Accommodation & Transportation.</li>\r\n  <li>Invoice will be submitted after the completion of the job.</li>\r\n  <li>This quotation is valid for 30 days from the above date.</li>\r\n  <li>Plant, utility air, water and electricity will be available free of charge to BAC On site if required</li>\r\n  <li>Payment: Payment will be payable within 30 days after submission of invoice.</li>\r\n  <li>Permissions & NOC: Any kind of permission/NOC if required from Municipality & RTA, will be provided by Client.</li>\r\n</ol>\r\n<p>We therefore trust that the above proposal is of interest to your company We may look forward to receiving your further instructions in due course.</p>\r\n', 'new'),
(3, 'Akbar', 'xyz', 'Abc', 'Abc', '15 Days', '2024-10-01 04:48:36', '2024-10-01 11:48:36', '1', 7, 1, NULL, '<h3>Client Supplied Equipment & Resources</h3>\r\n<p><strong>BETTER ACCESS</strong> understand that the following items will be supplied at site</p>\r\n<ul>\r\n  <li>Plant Air/Electricity& water as required.</li>\r\n  <li>Free & unrestricted access to structure.</li>\r\n  <li>Entry permits for our personnel to the site.</li>\r\n  <li>Sufficient secure storage space for our Material on site.</li>\r\n</ul>\r\n<p>Further to above, it is assumed that the end user will supply the <strong>BETTER ACCESS</strong> Team with assistance as required and all necessary job specific tooling to complete required tasks.</p>\r\n<h3>SAFETY</h3>\r\n<p><strong>BETTER ACCESS</strong> Personnel will operate under the control of the Site Permit System to Work as required. Further to this, all <strong>BETTER ACCESS</strong> operations will be fully risk assessed and the team will ensure that all parameters of the scope and individual roles and responsibilities are covered in toolbox talks prior to any work commencing. This area will be covered in more detail in our technical proposal.</p>\r\n<h3>Terms & Conditions</h3>\r\n<p>The following terms are also applicable</p>\r\n<ol>\r\n  <li>Above Rates are with Accommodation & Transportation.</li>\r\n  <li>Invoice will be submitted after the completion of the job.</li>\r\n  <li>This quotation is valid for 30 days from the above date.</li>\r\n  <li>Plant, utility air, water and electricity will be available free of charge to BAC On site if required</li>\r\n  <li>Payment: Payment will be payable within 30 days after submission of invoice.</li>\r\n  <li>Permissions & NOC: Any kind of permission/NOC if required from Municipality & RTA, will be provided by Client.</li>\r\n</ol>\r\n<p>We therefore trust that the above proposal is of interest to your company We may look forward to receiving your further instructions in due course.</p>\r\n', 'new'),
(4, 'random', 'random', 'random', 'random', '15 Days', '2024-10-01 05:41:12', '2024-10-01 13:28:14', '1', 7, 1, NULL, '<h3>Client Supplied Equipment & Resources</h3>\r\n<p><strong>BETTER ACCESS</strong> understand that the following items will be supplied at site</p>\r\n<ul>\r\n  <li>Plant Air/Electricity& water as required.</li>\r\n  <li>Free & unrestricted access to structure.</li>\r\n  <li>Entry permits for our personnel to the site.</li>\r\n  <li>Sufficient secure storage space for our Material on site.</li>\r\n</ul>\r\n<p>Further to above, it is assumed that the end user will supply the <strong>BETTER ACCESS</strong> Team with assistance as required and all necessary job specific tooling to complete required tasks.</p>\r\n<h3>SAFETY</h3>\r\n<p><strong>BETTER ACCESS</strong> Personnel will operate under the control of the Site Permit System to Work as required. Further to this, all <strong>BETTER ACCESS</strong> operations will be fully risk assessed and the team will ensure that all parameters of the scope and individual roles and responsibilities are covered in toolbox talks prior to any work commencing. This area will be covered in more detail in our technical proposal.</p>\r\n<h3>Terms & Conditions</h3>\r\n<p>The following terms are also applicable</p>\r\n<ol>\r\n  <li>Above Rates are with Accommodation & Transportation.</li>\r\n  <li>Invoice will be submitted after the completion of the job.</li>\r\n  <li>This quotation is valid for 30 days from the above date.</li>\r\n  <li>Plant, utility air, water and electricity will be available free of charge to BAC On site if required</li>\r\n  <li>Payment: Payment will be payable within 30 days after submission of invoice.</li>\r\n  <li>Permissions & NOC: Any kind of permission/NOC if required from Municipality & RTA, will be provided by Client.</li>\r\n</ol>\r\n<p>We therefore trust that the above proposal is of interest to your company We may look forward to receiving your further instructions in due course.</p>\r\n', 'accepted'),
(5, 'Ali Khizar', 'xyz', 'project', 'location', '15 Days', '2024-10-03 00:09:52', '2024-10-03 07:09:52', '4', 28, 1, NULL, '<h3>Client Supplied Equipment & Resources</h3>\r\n<p><strong>BETTER ACCESS</strong> understand that the following items will be supplied at site</p>\r\n<ul>\r\n  <li>Plant Air/Electricity& water as required.</li>\r\n  <li>Free & unrestricted access to structure.</li>\r\n  <li>Entry permits for our personnel to the site.</li>\r\n  <li>Sufficient secure storage space for our Material on site.</li>\r\n</ul>\r\n<p>Further to above, it is assumed that the end user will supply the <strong>BETTER ACCESS</strong> Team with assistance as required and all necessary job specific tooling to complete required tasks.</p>\r\n<h3>SAFETY</h3>\r\n<p><strong>BETTER ACCESS</strong> Personnel will operate under the control of the Site Permit System to Work as required. Further to this, all <strong>BETTER ACCESS</strong> operations will be fully risk assessed and the team will ensure that all parameters of the scope and individual roles and responsibilities are covered in toolbox talks prior to any work commencing. This area will be covered in more detail in our technical proposal.</p>\r\n<h3>Terms & Conditions</h3>\r\n<p>The following terms are also applicable</p>\r\n<ol>\r\n  <li>Above Rates are with Accommodation & Transportation.</li>\r\n  <li>Invoice will be submitted after the completion of the job.</li>\r\n  <li>This quotation is valid for 30 days from the above date.</li>\r\n  <li>Plant, utility air, water and electricity will be available free of charge to BAC On site if required</li>\r\n  <li>Payment: Payment will be payable within 30 days after submission of invoice.</li>\r\n  <li>Permissions & NOC: Any kind of permission/NOC if required from Municipality & RTA, will be provided by Client.</li>\r\n</ol>\r\n<p>We therefore trust that the above proposal is of interest to your company We may look forward to receiving your further instructions in due course.</p>\r\n', 'new'),
(11, 'wrwrqe', 'qeqe', 'qeqe', 'qeqe', '15 Days', '2024-10-03 01:04:22', '2024-10-03 08:04:22', '1', 34, 1, NULL, '<h3>Client Supplied Equipment & Resources</h3>\r\n<p><strong>BETTER ACCESS</strong> understand that the following items will be supplied at site</p>\r\n<ul>\r\n  <li>Plant Air/Electricity& water as required.</li>\r\n  <li>Free & unrestricted access to structure.</li>\r\n  <li>Entry permits for our personnel to the site.</li>\r\n  <li>Sufficient secure storage space for our Material on site.</li>\r\n</ul>\r\n<p>Further to above, it is assumed that the end user will supply the <strong>BETTER ACCESS</strong> Team with assistance as required and all necessary job specific tooling to complete required tasks.</p>\r\n<h3>SAFETY</h3>\r\n<p><strong>BETTER ACCESS</strong> Personnel will operate under the control of the Site Permit System to Work as required. Further to this, all <strong>BETTER ACCESS</strong> operations will be fully risk assessed and the team will ensure that all parameters of the scope and individual roles and responsibilities are covered in toolbox talks prior to any work commencing. This area will be covered in more detail in our technical proposal.</p>\r\n<h3>Terms & Conditions</h3>\r\n<p>The following terms are also applicable</p>\r\n<ol>\r\n  <li>Above Rates are with Accommodation & Transportation.</li>\r\n  <li>Invoice will be submitted after the completion of the job.</li>\r\n  <li>This quotation is valid for 30 days from the above date.</li>\r\n  <li>Plant, utility air, water and electricity will be available free of charge to BAC On site if required</li>\r\n  <li>Payment: Payment will be payable within 30 days after submission of invoice.</li>\r\n  <li>Permissions & NOC: Any kind of permission/NOC if required from Municipality & RTA, will be provided by Client.</li>\r\n</ol>\r\n<p>We therefore trust that the above proposal is of interest to your company We may look forward to receiving your further instructions in due course.</p>\r\n', 'new'),
(12, 'vssfs', 'sfsf', 'sfsf', 'ssf', '15 Days', '2024-10-03 01:09:46', '2024-10-03 08:09:46', '1', 33, 1, NULL, '<h3>Client Supplied Equipment & Resources</h3>\r\n<p><strong>BETTER ACCESS</strong> understand that the following items will be supplied at site</p>\r\n<ul>\r\n  <li>Plant Air/Electricity& water as required.</li>\r\n  <li>Free & unrestricted access to structure.</li>\r\n  <li>Entry permits for our personnel to the site.</li>\r\n  <li>Sufficient secure storage space for our Material on site.</li>\r\n</ul>\r\n<p>Further to above, it is assumed that the end user will supply the <strong>BETTER ACCESS</strong> Team with assistance as required and all necessary job specific tooling to complete required tasks.</p>\r\n<h3>SAFETY</h3>\r\n<p><strong>BETTER ACCESS</strong> Personnel will operate under the control of the Site Permit System to Work as required. Further to this, all <strong>BETTER ACCESS</strong> operations will be fully risk assessed and the team will ensure that all parameters of the scope and individual roles and responsibilities are covered in toolbox talks prior to any work commencing. This area will be covered in more detail in our technical proposal.</p>\r\n<h3>Terms & Conditions</h3>\r\n<p>The following terms are also applicable</p>\r\n<ol>\r\n  <li>Above Rates are with Accommodation & Transportation.</li>\r\n  <li>Invoice will be submitted after the completion of the job.</li>\r\n  <li>This quotation is valid for 30 days from the above date.</li>\r\n  <li>Plant, utility air, water and electricity will be available free of charge to BAC On site if required</li>\r\n  <li>Payment: Payment will be payable within 30 days after submission of invoice.</li>\r\n  <li>Permissions & NOC: Any kind of permission/NOC if required from Municipality & RTA, will be provided by Client.</li>\r\n</ol>\r\n<p>We therefore trust that the above proposal is of interest to your company We may look forward to receiving your further instructions in due course.</p>\r\n', 'new'),
(13, 'dvsggw', 'wfwrwrw', 'wwetwtwtr', 'wrwrwr', '15 Days', '2024-10-03 01:17:17', '2024-10-03 08:17:17', '1', 5, 1, NULL, '<h3>Client Supplied Equipment & Resources</h3>\r\n<p><strong>BETTER ACCESS</strong> understand that the following items will be supplied at site</p>\r\n<ul>\r\n  <li>Plant Air/Electricity& water as required.</li>\r\n  <li>Free & unrestricted access to structure.</li>\r\n  <li>Entry permits for our personnel to the site.</li>\r\n  <li>Sufficient secure storage space for our Material on site.</li>\r\n</ul>\r\n<p>Further to above, it is assumed that the end user will supply the <strong>BETTER ACCESS</strong> Team with assistance as required and all necessary job specific tooling to complete required tasks.</p>\r\n<h3>SAFETY</h3>\r\n<p><strong>BETTER ACCESS</strong> Personnel will operate under the control of the Site Permit System to Work as required. Further to this, all <strong>BETTER ACCESS</strong> operations will be fully risk assessed and the team will ensure that all parameters of the scope and individual roles and responsibilities are covered in toolbox talks prior to any work commencing. This area will be covered in more detail in our technical proposal.</p>\r\n<h3>Terms & Conditions</h3>\r\n<p>The following terms are also applicable</p>\r\n<ol>\r\n  <li>Above Rates are with Accommodation & Transportation.</li>\r\n  <li>Invoice will be submitted after the completion of the job.</li>\r\n  <li>This quotation is valid for 30 days from the above date.</li>\r\n  <li>Plant, utility air, water and electricity will be available free of charge to BAC On site if required</li>\r\n  <li>Payment: Payment will be payable within 30 days after submission of invoice.</li>\r\n  <li>Permissions & NOC: Any kind of permission/NOC if required from Municipality & RTA, will be provided by Client.</li>\r\n</ol>\r\n<p>We therefore trust that the above proposal is of interest to your company We may look forward to receiving your further instructions in due course.</p>\r\n', 'new'),
(14, 'dvsggw', 'wfwrwrw', 'wwetwtwtr', 'wrwrwr', '15 Days', '2024-10-03 01:17:22', '2024-10-03 08:17:22', '1', 5, 1, NULL, '<h3>Client Supplied Equipment & Resources</h3>\r\n<p><strong>BETTER ACCESS</strong> understand that the following items will be supplied at site</p>\r\n<ul>\r\n  <li>Plant Air/Electricity& water as required.</li>\r\n  <li>Free & unrestricted access to structure.</li>\r\n  <li>Entry permits for our personnel to the site.</li>\r\n  <li>Sufficient secure storage space for our Material on site.</li>\r\n</ul>\r\n<p>Further to above, it is assumed that the end user will supply the <strong>BETTER ACCESS</strong> Team with assistance as required and all necessary job specific tooling to complete required tasks.</p>\r\n<h3>SAFETY</h3>\r\n<p><strong>BETTER ACCESS</strong> Personnel will operate under the control of the Site Permit System to Work as required. Further to this, all <strong>BETTER ACCESS</strong> operations will be fully risk assessed and the team will ensure that all parameters of the scope and individual roles and responsibilities are covered in toolbox talks prior to any work commencing. This area will be covered in more detail in our technical proposal.</p>\r\n<h3>Terms & Conditions</h3>\r\n<p>The following terms are also applicable</p>\r\n<ol>\r\n  <li>Above Rates are with Accommodation & Transportation.</li>\r\n  <li>Invoice will be submitted after the completion of the job.</li>\r\n  <li>This quotation is valid for 30 days from the above date.</li>\r\n  <li>Plant, utility air, water and electricity will be available free of charge to BAC On site if required</li>\r\n  <li>Payment: Payment will be payable within 30 days after submission of invoice.</li>\r\n  <li>Permissions & NOC: Any kind of permission/NOC if required from Municipality & RTA, will be provided by Client.</li>\r\n</ol>\r\n<p>We therefore trust that the above proposal is of interest to your company We may look forward to receiving your further instructions in due course.</p>\r\n', 'new'),
(15, 'bbdbd', 'gdgdg', 'gdgdg', 'dgdgdg', '15 Days', '2024-10-03 01:19:03', '2024-10-03 09:14:14', '1', 4, 1, NULL, '<h3>Client Supplied Equipment & Resources</h3>\r\n<p><strong>BETTER ACCESS</strong> understand that the following items will be supplied at site</p>\r\n<ul>\r\n  <li>Plant Air/Electricity& water as required.</li>\r\n  <li>Free & unrestricted access to structure.</li>\r\n  <li>Entry permits for our personnel to the site.</li>\r\n  <li>Sufficient secure storage space for our Material on site.</li>\r\n</ul>\r\n<p>Further to above, it is assumed that the end user will supply the <strong>BETTER ACCESS</strong> Team with assistance as required and all necessary job specific tooling to complete required tasks.</p>\r\n<h3>SAFETY</h3>\r\n<p><strong>BETTER ACCESS</strong> Personnel will operate under the control of the Site Permit System to Work as required. Further to this, all <strong>BETTER ACCESS</strong> operations will be fully risk assessed and the team will ensure that all parameters of the scope and individual roles and responsibilities are covered in toolbox talks prior to any work commencing. This area will be covered in more detail in our technical proposal.</p>\r\n<h3>Terms & Conditions</h3>\r\n<p>The following terms are also applicable</p>\r\n<ol>\r\n  <li>Above Rates are with Accommodation & Transportation.</li>\r\n  <li>Invoice will be submitted after the completion of the job.</li>\r\n  <li>This quotation is valid for 30 days from the above date.</li>\r\n  <li>Plant, utility air, water and electricity will be available free of charge to BAC On site if required</li>\r\n  <li>Payment: Payment will be payable within 30 days after submission of invoice.</li>\r\n  <li>Permissions & NOC: Any kind of permission/NOC if required from Municipality & RTA, will be provided by Client.</li>\r\n</ol>\r\n<p>We therefore trust that the above proposal is of interest to your company We may look forward to receiving your further instructions in due course.</p>\r\n', 'rejected'),
(16, 'gdgedg', 'dgdgdg', 'dgdgdg', 'dgdgdg', '15 Days', '2024-10-03 01:20:29', '2024-10-03 09:13:39', '1', 7575757, 1, NULL, '<h3>Client Supplied Equipment & Resources</h3>\r\n<p><strong>BETTER ACCESS</strong> understand that the following items will be supplied at site</p>\r\n<ul>\r\n  <li>Plant Air/Electricity& water as required.</li>\r\n  <li>Free & unrestricted access to structure.</li>\r\n  <li>Entry permits for our personnel to the site.</li>\r\n  <li>Sufficient secure storage space for our Material on site.</li>\r\n</ul>\r\n<p>Further to above, it is assumed that the end user will supply the <strong>BETTER ACCESS</strong> Team with assistance as required and all necessary job specific tooling to complete required tasks.</p>\r\n<h3>SAFETY</h3>\r\n<p><strong>BETTER ACCESS</strong> Personnel will operate under the control of the Site Permit System to Work as required. Further to this, all <strong>BETTER ACCESS</strong> operations will be fully risk assessed and the team will ensure that all parameters of the scope and individual roles and responsibilities are covered in toolbox talks prior to any work commencing. This area will be covered in more detail in our technical proposal.</p>\r\n<h3>Terms & Conditions</h3>\r\n<p>The following terms are also applicable</p>\r\n<ol>\r\n  <li>Above Rates are with Accommodation & Transportation.</li>\r\n  <li>Invoice will be submitted after the completion of the job.</li>\r\n  <li>This quotation is valid for 30 days from the above date.</li>\r\n  <li>Plant, utility air, water and electricity will be available free of charge to BAC On site if required</li>\r\n  <li>Payment: Payment will be payable within 30 days after submission of invoice.</li>\r\n  <li>Permissions & NOC: Any kind of permission/NOC if required from Municipality & RTA, will be provided by Client.</li>\r\n</ol>\r\n<p>We therefore trust that the above proposal is of interest to your company We may look forward to receiving your further instructions in due course.</p>\r\n', 'reprice'),
(17, 'jjgh', 'gjgjgj', 'gjgj', 'ggjgjg', '15 Days', '2024-10-03 03:22:15', '2024-10-03 10:22:15', '1', 6, 1, NULL, '<h3>Client Supplied Equipment & Resources</h3>\r\n<p><strong>BETTER ACCESS</strong> understand that the following items will be supplied at site</p>\r\n<ul>\r\n  <li>Plant Air/Electricity& water as required.</li>\r\n  <li>Free & unrestricted access to structure.</li>\r\n  <li>Entry permits for our personnel to the site.</li>\r\n  <li>Sufficient secure storage space for our Material on site.</li>\r\n</ul>\r\n<p>Further to above, it is assumed that the end user will supply the <strong>BETTER ACCESS</strong> Team with assistance as required and all necessary job specific tooling to complete required tasks.</p>\r\n<h3>SAFETY</h3>\r\n<p><strong>BETTER ACCESS</strong> Personnel will operate under the control of the Site Permit System to Work as required. Further to this, all <strong>BETTER ACCESS</strong> operations will be fully risk assessed and the team will ensure that all parameters of the scope and individual roles and responsibilities are covered in toolbox talks prior to any work commencing. This area will be covered in more detail in our technical proposal.</p>\r\n<h3>Terms & Conditions</h3>\r\n<p>The following terms are also applicable</p>\r\n<ol>\r\n  <li>Above Rates are with Accommodation & Transportation.</li>\r\n  <li>Invoice will be submitted after the completion of the job.</li>\r\n  <li>This quotation is valid for 30 days from the above date.</li>\r\n  <li>Plant, utility air, water and electricity will be available free of charge to BAC On site if required</li>\r\n  <li>Payment: Payment will be payable within 30 days after submission of invoice.</li>\r\n  <li>Permissions & NOC: Any kind of permission/NOC if required from Municipality & RTA, will be provided by Client.</li>\r\n</ol>\r\n<p>We therefore trust that the above proposal is of interest to your company We may look forward to receiving your further instructions in due course.</p>\r\n', 'new'),
(18, 'Irtiqa', 'i Att', 'i project', 'inloc', '15 Days', '2024-10-03 05:03:38', '2024-10-03 12:03:38', '1', 7, 1, NULL, '<h3>Client Supplied Equipment & Resources</h3>\r\n<p><strong>BETTER ACCESS</strong> understand that the following items will be supplied at site</p>\r\n<ul>\r\n  <li>Plant Air/Electricity& water as required.</li>\r\n  <li>Free & unrestricted access to structure.</li>\r\n  <li>Entry permits for our personnel to the site.</li>\r\n  <li>Sufficient secure storage space for our Material on site.</li>\r\n</ul>\r\n<p>Further to above, it is assumed that the end user will supply the <strong>BETTER ACCESS</strong> Team with assistance as required and all necessary job specific tooling to complete required tasks.</p>\r\n<h3>SAFETY</h3>\r\n<p><strong>BETTER ACCESS</strong> Personnel will operate under the control of the Site Permit System to Work as required. Further to this, all <strong>BETTER ACCESS</strong> operations will be fully risk assessed and the team will ensure that all parameters of the scope and individual roles and responsibilities are covered in toolbox talks prior to any work commencing. This area will be covered in more detail in our technical proposal.</p>\r\n<h3>Terms & Conditions</h3>\r\n<p>The following terms are also applicable</p>\r\n<ol>\r\n  <li>Above Rates are with Accommodation & Transportation.</li>\r\n  <li>Invoice will be submitted after the completion of the job.</li>\r\n  <li>This quotation is valid for 30 days from the above date.</li>\r\n  <li>Plant, utility air, water and electricity will be available free of charge to BAC On site if required</li>\r\n  <li>Payment: Payment will be payable within 30 days after submission of invoice.</li>\r\n  <li>Permissions & NOC: Any kind of permission/NOC if required from Municipality & RTA, will be provided by Client.</li>\r\n</ol>\r\n<p>We therefore trust that the above proposal is of interest to your company We may look forward to receiving your further instructions in due course.</p>\r\n', 'new'),
(19, 'farjad', 'iyuk', 'hgm', 'mghmgh', '15 Days', '2024-10-03 05:26:34', '2024-10-03 12:26:34', '1', 5, 1, NULL, '<h3>Client Supplied Equipment & Resources</h3>\r\n<p><strong>BETTER ACCESS</strong> understand that the following items will be supplied at site</p>\r\n<ul>\r\n  <li>Plant Air/Electricity& water as required.</li>\r\n  <li>Free & unrestricted access to structure.</li>\r\n  <li>Entry permits for our personnel to the site.</li>\r\n  <li>Sufficient secure storage space for our Material on site.</li>\r\n</ul>\r\n<p>Further to above, it is assumed that the end user will supply the <strong>BETTER ACCESS</strong> Team with assistance as required and all necessary job specific tooling to complete required tasks.</p>\r\n<h3>SAFETY</h3>\r\n<p><strong>BETTER ACCESS</strong> Personnel will operate under the control of the Site Permit System to Work as required. Further to this, all <strong>BETTER ACCESS</strong> operations will be fully risk assessed and the team will ensure that all parameters of the scope and individual roles and responsibilities are covered in toolbox talks prior to any work commencing. This area will be covered in more detail in our technical proposal.</p>\r\n<h3>Terms & Conditions</h3>\r\n<p>The following terms are also applicable</p>\r\n<ol>\r\n  <li>Above Rates are with Accommodation & Transportation.</li>\r\n  <li>Invoice will be submitted after the completion of the job.</li>\r\n  <li>This quotation is valid for 30 days from the above date.</li>\r\n  <li>Plant, utility air, water and electricity will be available free of charge to BAC On site if required</li>\r\n  <li>Payment: Payment will be payable within 30 days after submission of invoice.</li>\r\n  <li>Permissions & NOC: Any kind of permission/NOC if required from Municipality & RTA, will be provided by Client.</li>\r\n</ol>\r\n<p>We therefore trust that the above proposal is of interest to your company We may look forward to receiving your further instructions in due course.</p>\r\n', 'new'),
(20, 'talha', 'wfwrwrw', 'Abc', 'wrwrwr', '15 Days', '2024-10-03 05:27:42', '2024-10-04 14:55:51', '1', 12, 1, NULL, '<h3>Client Supplied Equipment & Resources</h3>\r\n<p><strong>BETTER ACCESS</strong> understand that the following items will be supplied at site</p>\r\n<ul>\r\n  <li>Plant Air/Electricity& water as required.</li>\r\n  <li>Free & unrestricted access to structure.</li>\r\n  <li>Entry permits for our personnel to the site.</li>\r\n  <li>Sufficient secure storage space for our Material on site.</li>\r\n</ul>\r\n<p>Further to above, it is assumed that the end user will supply the <strong>BETTER ACCESS</strong> Team with assistance as required and all necessary job specific tooling to complete required tasks.</p>\r\n<h3>SAFETY</h3>\r\n<p><strong>BETTER ACCESS</strong> Personnel will operate under the control of the Site Permit System to Work as required. Further to this, all <strong>BETTER ACCESS</strong> operations will be fully risk assessed and the team will ensure that all parameters of the scope and individual roles and responsibilities are covered in toolbox talks prior to any work commencing. This area will be covered in more detail in our technical proposal.</p>\r\n<h3>Terms & Conditions</h3>\r\n<p>The following terms are also applicable</p>\r\n<ol>\r\n  <li>Above Rates are with Accommodation & Transportation.</li>\r\n  <li>Invoice will be submitted after the completion of the job.</li>\r\n  <li>This quotation is valid for 30 days from the above date.</li>\r\n  <li>Plant, utility air, water and electricity will be available free of charge to BAC On site if required</li>\r\n  <li>Payment: Payment will be payable within 30 days after submission of invoice.</li>\r\n  <li>Permissions & NOC: Any kind of permission/NOC if required from Municipality & RTA, will be provided by Client.</li>\r\n</ol>\r\n<p>We therefore trust that the above proposal is of interest to your company We may look forward to receiving your further instructions in due course.</p>\r\n', 'accepted'),
(21, 'Ali', 'i Att', 'i project', 'l1', '15 Days', '2024-10-03 05:33:12', '2024-10-03 12:33:12', '1', 12, 1, NULL, '<h3>Client Supplied Equipment & Resources</h3>\r\n<p><strong>BETTER ACCESS</strong> understand that the following items will be supplied at site</p>\r\n<ul>\r\n  <li>Plant Air/Electricity& water as required.</li>\r\n  <li>Free & unrestricted access to structure.</li>\r\n  <li>Entry permits for our personnel to the site.</li>\r\n  <li>Sufficient secure storage space for our Material on site.</li>\r\n</ul>\r\n<p>Further to above, it is assumed that the end user will supply the <strong>BETTER ACCESS</strong> Team with assistance as required and all necessary job specific tooling to complete required tasks.</p>\r\n<h3>SAFETY</h3>\r\n<p><strong>BETTER ACCESS</strong> Personnel will operate under the control of the Site Permit System to Work as required. Further to this, all <strong>BETTER ACCESS</strong> operations will be fully risk assessed and the team will ensure that all parameters of the scope and individual roles and responsibilities are covered in toolbox talks prior to any work commencing. This area will be covered in more detail in our technical proposal.</p>\r\n<h3>Terms & Conditions</h3>\r\n<p>The following terms are also applicable</p>\r\n<ol>\r\n  <li>Above Rates are with Accommodation & Transportation.</li>\r\n  <li>Invoice will be submitted after the completion of the job.</li>\r\n  <li>This quotation is valid for 30 days from the above date.</li>\r\n  <li>Plant, utility air, water and electricity will be available free of charge to BAC On site if required</li>\r\n  <li>Payment: Payment will be payable within 30 days after submission of invoice.</li>\r\n  <li>Permissions & NOC: Any kind of permission/NOC if required from Municipality & RTA, will be provided by Client.</li>\r\n</ol>\r\n<p>We therefore trust that the above proposal is of interest to your company We may look forward to receiving your further instructions in due course.</p>\r\n', 'new'),
(22, 'Ali', 'xyz', 'Abc', 'la', '15 Days', '2024-10-03 05:37:23', '2024-10-04 06:09:30', '1', 16, 1, NULL, '<h3>Client Supplied Equipment & Resources</h3>\r\n<p><strong>BETTER ACCESS</strong> understand that the following items will be supplied at site</p>\r\n<ul>\r\n  <li>Plant Air/Electricity& water as required.</li>\r\n  <li>Free & unrestricted access to structure.</li>\r\n  <li>Entry permits for our personnel to the site.</li>\r\n  <li>Sufficient secure storage space for our Material on site.</li>\r\n</ul>\r\n<p>Further to above, it is assumed that the end user will supply the <strong>BETTER ACCESS</strong> Team with assistance as required and all necessary job specific tooling to complete required tasks.</p>\r\n<h3>SAFETY</h3>\r\n<p><strong>BETTER ACCESS</strong> Personnel will operate under the control of the Site Permit System to Work as required. Further to this, all <strong>BETTER ACCESS</strong> operations will be fully risk assessed and the team will ensure that all parameters of the scope and individual roles and responsibilities are covered in toolbox talks prior to any work commencing. This area will be covered in more detail in our technical proposal.</p>\r\n<h3>Terms & Conditions</h3>\r\n<p>The following terms are also applicable</p>\r\n<ol>\r\n  <li>Above Rates are with Accommodation & Transportation.</li>\r\n  <li>Invoice will be submitted after the completion of the job.</li>\r\n  <li>This quotation is valid for 30 days from the above date.</li>\r\n  <li>Plant, utility air, water and electricity will be available free of charge to BAC On site if required</li>\r\n  <li>Payment: Payment will be payable within 30 days after submission of invoice.</li>\r\n  <li>Permissions & NOC: Any kind of permission/NOC if required from Municipality & RTA, will be provided by Client.</li>\r\n</ol>\r\n<p>We therefore trust that the above proposal is of interest to your company We may look forward to receiving your further instructions in due course.</p>\r\n', 'accepted'),
(26, 'abcde', 'dgb', 'xyz', 'abc', '15 Days', '2024-10-10 05:20:16', '2024-10-10 12:20:16', '1', 11, 3, NULL, '<h3>Client Supplied Equipment & Resources</h3>\r\n<p><strong>DILIGENT ENERGY</strong> understand that the following items will be supplied at site</p>\r\n<ul>\r\n  <li>Plant Air/Electricity& water as required.</li>\r\n  <li>Free & unrestricted access to structure.</li>\r\n  <li>Entry permits for our personnel to the site.</li>\r\n  <li>Sufficient secure storage space for our Material on site.</li>\r\n</ul>\r\n<p>Further to above, it is assumed that the end user will supply the<strong>DILIGENT ENERGY</strong> Team with assistance as required and all necessary job specific tooling to complete required tasks.</p>\r\n<h3>SAFETY</h3>\r\n<p><strong>DILIGENT ENERGY</strong> Personnel will operate under the control of the Site Permit System to Work as required. Further to this, all <strong>DILIGENT ENERGY ACCESS</strong> operations will be fully risk assessed and the team will ensure that all parameters of the scope and individual roles and responsibilities are covered in toolbox talks prior to any work commencing. This area will be covered in more detail in our technical proposal.</p>\r\n<h3>Terms & Conditions</h3>\r\n<p>The following terms are also applicable</p>\r\n<ol>\r\n  <li>Above Rates are with Accommodation & Transportation.</li>\r\n  <li>Invoice will be submitted after the completion of the job.</li>\r\n  <li>This quotation is valid for 30 days from the above date.</li>\r\n  <li>Plant, utility air, water and electricity will be available free of charge to BAC On site if required</li>\r\n  <li>Payment: Payment will be payable within 30 days after submission of invoice.</li>\r\n  <li>Permissions & NOC: Any kind of permission/NOC if required from Municipality & RTA, will be provided by Client.</li>\r\n</ol>\r\n<p>We therefore trust that the above proposal is of interest to your company We may look forward to receiving your further instructions in due course.</p>\r\n', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `quotation_services`
--

CREATE TABLE `quotation_services` (
  `id` int(11) NOT NULL,
  `title` text,
  `frequency` int(11) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `quotation_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quotation_services`
--

INSERT INTO `quotation_services` (`id`, `title`, `frequency`, `price`, `quotation_id`) VALUES
(2, 'Abc', 11, '12122121', 2),
(3, 'Abc', 1, '47', 3),
(4, 'random', 9, '110', 4),
(5, 's1', 1, '1', 5),
(6, 's2', 2, '2', 5),
(7, 's3', 3, '3', 5),
(8, 's4', 4, '4', 5),
(9, 's5', 5, '5', 5),
(10, 's6', 6, '6', 5),
(11, 's7', 7, '7', 5),
(13, 'wrre', 1, '2', 11),
(15, 'rwrwr', 5, '5', 13),
(16, 'rwrwr', 5, '5', 14),
(18, 'dgdgegeg', 45354, '6666664646', 16),
(19, 'gjgjgjg', 5, '56', 17),
(22, 'sf', 32, '31', 12),
(23, 'dgdgdg', 3, '4', 15),
(24, 'jdfkjjsfvcsdv bjvdvjsd njv djv jd jvnjdjsdvjbvjdvjj', 121, '121242424', 15),
(27, '4', 11, '11111', 18),
(28, '3', 11, '11111', 1),
(29, '1', 546, '7656', 19),
(30, 'asfsfsfaf', 2, '2', 19),
(31, '4', 4, '4', 20),
(32, 'abcdefghij', 12, '1212', 20),
(33, '4', 110, '110', 21),
(34, '4', 1, '1', 22),
(38, 'A11', 1, '1', 26);

-- --------------------------------------------------------

--
-- Table structure for table `quotation_status`
--

CREATE TABLE `quotation_status` (
  `id` int(11) NOT NULL,
  `status` enum('accepted','rejected','reprice') DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `description` text,
  `counter_price` decimal(10,0) DEFAULT NULL,
  `quotation_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quotation_status`
--

INSERT INTO `quotation_status` (`id`, `status`, `created_at`, `description`, `counter_price`, `quotation_id`) VALUES
(1, 'accepted', '2024-10-01 06:28:14', '', NULL, 4),
(2, 'reprice', '2024-10-03 02:13:39', '', '6666664666', 16),
(3, 'rejected', '2024-10-03 02:14:14', '', NULL, 15),
(5, 'accepted', '2024-10-03 23:09:30', '', NULL, 22),
(6, 'accepted', '2024-10-04 07:55:51', '', NULL, 20);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` text,
  `description` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'abc', 'abc..........................', '2024-10-01 03:15:52', '2024-10-01 10:15:52'),
(2, 'Abcxyz', 'Abcxyz...........................', '2024-10-01 05:40:20', '2024-10-01 12:40:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(10) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(10) UNSIGNED NOT NULL,
  `last_login` int(10) UNSIGNED DEFAULT NULL,
  `active` tinyint(3) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `cnic` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `approve_status` tinyint(4) DEFAULT '0' COMMENT 'if documents are submitted then approved otherwise not approved',
  `active_reason` varchar(255) DEFAULT NULL,
  `oauth_provider` enum('web','google','facebook') DEFAULT 'web',
  `refcode` varchar(100) DEFAULT '0',
  `referrer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `salt`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `cnic`, `city`, `approve_status`, `active_reason`, `oauth_provider`, `refcode`, `referrer_id`) VALUES
(1, '127.0.0.1', 'admin', '$2y$08$J00Is9DvUyaJn964om4JteOsDyiwELKcKsfRzazcz42VmTb9qUNwS', 'admin@admin.com', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1728562569, 1, 'Admin', 'istrator', 'ADMIN', '24523532532', NULL, NULL, 0, NULL, NULL, '0', NULL),
(2, '::1', 'ali', '$2y$08$mgLW2T3aiix4iLMhvYjDWeRbT1NwIlfCrvMws5kL4HO4WXZC.CQwa', 'ali@sage-teck.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1727772246, 1728547418, 1, 'Ali', 'Khizar', 'Better Access', '03000000000', NULL, NULL, 0, NULL, 'web', '393f22834279344ffd6bbf098b2bf793', NULL),
(3, '::1', 'sales', '$2y$08$bs/TCxBFTwrVHGeNrI2RGu3VxRqFjABe5FWwnkeSCNVLWZpUmAjBS', 'sales@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1728549004, 1728562589, 1, 'Ali', 'Khizar', 'DILIGENT ENERGY', '', NULL, NULL, 0, NULL, 'web', '5373a1ec960f163d136cd9a6dc426d19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(118, 1, 1),
(116, 2, 4),
(117, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `workcompletion_certificate`
--

CREATE TABLE `workcompletion_certificate` (
  `id` int(11) NOT NULL,
  `job_ref` varchar(255) DEFAULT NULL,
  `job_number` int(11) DEFAULT NULL,
  `clientname` varchar(255) DEFAULT NULL,
  `project` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `description` text,
  `compiled_by` varchar(255) DEFAULT NULL,
  `comments` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `workcompletion_gallery`
--

CREATE TABLE `workcompletion_gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `report_id` int(11) DEFAULT NULL,
  `type` enum('before','during','after','broken') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `workcompletion_report`
--

CREATE TABLE `workcompletion_report` (
  `id` int(11) NOT NULL,
  `content` text,
  `completed_by` varchar(255) DEFAULT NULL,
  `job_ref` varchar(255) NOT NULL,
  `job_number` int(11) NOT NULL,
  `clientname` varchar(255) NOT NULL,
  `project` varchar(200) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `comments` text NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `delievery_challans`
--
ALTER TABLE `delievery_challans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delievery_items`
--
ALTER TABLE `delievery_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quotation_id` (`challan_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_services`
--
ALTER TABLE `invoice_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quotation_id` (`invoice_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotations`
--
ALTER TABLE `quotations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation_services`
--
ALTER TABLE `quotation_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quotation_id` (`quotation_id`);

--
-- Indexes for table `quotation_status`
--
ALTER TABLE `quotation_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quotation_id` (`quotation_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `workcompletion_certificate`
--
ALTER TABLE `workcompletion_certificate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workcompletion_gallery`
--
ALTER TABLE `workcompletion_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workcompletion_report`
--
ALTER TABLE `workcompletion_report`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `delievery_challans`
--
ALTER TABLE `delievery_challans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `delievery_items`
--
ALTER TABLE `delievery_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `invoice_services`
--
ALTER TABLE `invoice_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `quotations`
--
ALTER TABLE `quotations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `quotation_services`
--
ALTER TABLE `quotation_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `quotation_status`
--
ALTER TABLE `quotation_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT for table `workcompletion_certificate`
--
ALTER TABLE `workcompletion_certificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `workcompletion_gallery`
--
ALTER TABLE `workcompletion_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `workcompletion_report`
--
ALTER TABLE `workcompletion_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `quotation_services`
--
ALTER TABLE `quotation_services`
  ADD CONSTRAINT `quotation_services_ibfk_2` FOREIGN KEY (`quotation_id`) REFERENCES `quotations` (`id`);

--
-- Constraints for table `quotation_status`
--
ALTER TABLE `quotation_status`
  ADD CONSTRAINT `quotation_status_ibfk_1` FOREIGN KEY (`quotation_id`) REFERENCES `quotations` (`id`);

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `users_groups_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_groups_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

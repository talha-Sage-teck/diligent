-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3305
-- Generation Time: Oct 03, 2024 at 08:49 AM
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
('p51dbs1gff8umtjsj6dn9h749m9hqp37', '::1', 1727772367, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732373736353231353b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c693a313b6f6c645f6c6173745f6c6f67696e7c693a313732373736353231353b6c6173745f636865636b7c693a313732373736353231353b),
('tmmvivf472sjcanr761s4d1bskbgjrve', '::1', 1727772278, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732373737323237383b6964656e746974797c733a333a22616c69223b757365726e616d657c733a333a22616c69223b656d61696c7c733a31373a22616c6940736167652d7465636b2e636f6d223b757365725f69647c693a323b6f6c645f6c6173745f6c6f67696e7c4e3b6c6173745f636865636b7c693a313732373737323237383b),
('0rv5o8rqeam2khstrh7q1spfcmisckdt', '::1', 1727772278, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732373737323237383b6964656e746974797c733a333a22616c69223b757365726e616d657c733a333a22616c69223b656d61696c7c733a31373a22616c6940736167652d7465636b2e636f6d223b757365725f69647c693a323b6f6c645f6c6173745f6c6f67696e7c693a313732373737323237383b6c6173745f636865636b7c693a313732373737323237383b),
('m7q57mlsql33cthvhtg28i2v3740n84n', '::1', 1727778283, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732373737323237383b6964656e746974797c733a333a22616c69223b757365726e616d657c733a333a22616c69223b656d61696c7c733a31373a22616c6940736167652d7465636b2e636f6d223b757365725f69647c693a323b6f6c645f6c6173745f6c6f67696e7c693a313732373737323237383b6c6173745f636865636b7c693a313732373737323237383b),
('j5oldiq6ql67sf9q8lg5po1uaediquqe', '::1', 1727777238, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732373737373233383b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c693a313b6f6c645f6c6173745f6c6f67696e7c693a313732373736353231353b6c6173745f636865636b7c693a313732373737373233383b),
('284dl7hej38e7fdmo7m01ovafhhjpdi8', '::1', 1727777238, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732373737373233383b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c693a313b6f6c645f6c6173745f6c6f67696e7c693a313732373737373233383b6c6173745f636865636b7c693a313732373737373233383b),
('psm4qfjo40kt82c2rmjuth2f0lm9t6kv', '::1', 1727779522, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732373737393532323b6964656e746974797c733a333a22616c69223b757365726e616d657c733a333a22616c69223b656d61696c7c733a31373a22616c6940736167652d7465636b2e636f6d223b757365725f69647c693a323b6f6c645f6c6173745f6c6f67696e7c693a313732373737393531363b6c6173745f636865636b7c693a313732373737393532323b),
('1tcibob6efp5dt21achdr8tgddk2utma', '::1', 1727779516, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732373737393531363b6964656e746974797c733a333a22616c69223b757365726e616d657c733a333a22616c69223b656d61696c7c733a31373a22616c6940736167652d7465636b2e636f6d223b757365725f69647c693a323b6f6c645f6c6173745f6c6f67696e7c693a313732373737393531363b6c6173745f636865636b7c693a313732373737393531363b),
('l3868m207qkt25o46q2gbtachjun4p2f', '::1', 1727779516, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732373737393531363b6964656e746974797c733a333a22616c69223b757365726e616d657c733a333a22616c69223b656d61696c7c733a31373a22616c6940736167652d7465636b2e636f6d223b757365725f69647c693a323b6f6c645f6c6173745f6c6f67696e7c693a313732373737393531363b6c6173745f636865636b7c693a313732373737393531363b),
('fll9mjdkiq8r900gmiar596bhslvh97l', '::1', 1727779522, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732373737393532323b6964656e746974797c733a333a22616c69223b757365726e616d657c733a333a22616c69223b656d61696c7c733a31373a22616c6940736167652d7465636b2e636f6d223b757365725f69647c693a323b6f6c645f6c6173745f6c6f67696e7c693a313732373737393532323b6c6173745f636865636b7c693a313732373737393532323b),
('gpq5gs18egorlnqi2iu5ac4tamcv16tg', '::1', 1727786687, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732373737393532323b6964656e746974797c733a333a22616c69223b757365726e616d657c733a333a22616c69223b656d61696c7c733a31373a22616c6940736167652d7465636b2e636f6d223b757365725f69647c693a323b6f6c645f6c6173745f6c6f67696e7c693a313732373737393532323b6c6173745f636865636b7c693a313732373737393532323b),
('sra6bk0puevk6grh2qhgir2hla6lmf1c', '::1', 1727786518, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732373738363531383b6964656e746974797c733a333a22616c69223b757365726e616d657c733a333a22616c69223b656d61696c7c733a31373a22616c6940736167652d7465636b2e636f6d223b757365725f69647c693a323b6f6c645f6c6173745f6c6f67696e7c693a313732373737393532323b6c6173745f636865636b7c693a313732373738363531383b),
('tnbcvtb3tsp8qn77p852ipecicko815c', '::1', 1727786518, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732373738363531383b6964656e746974797c733a333a22616c69223b757365726e616d657c733a333a22616c69223b656d61696c7c733a31373a22616c6940736167652d7465636b2e636f6d223b757365725f69647c693a323b6f6c645f6c6173745f6c6f67696e7c693a313732373738363531383b6c6173745f636865636b7c693a313732373738363531383b),
('7kt5ja3obtk07mosrq03n1vdc2himbo3', '::1', 1727786539, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732373738363533393b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c693a313b6f6c645f6c6173745f6c6f67696e7c693a313732373737373233383b6c6173745f636865636b7c693a313732373738363533393b),
('ovoa524c465jsompsfudubh6pv131bro', '::1', 1727786539, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732373738363533393b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c693a313b6f6c645f6c6173745f6c6f67696e7c693a313732373738363533393b6c6173745f636865636b7c693a313732373738363533393b),
('vddcla4fiv66al63h9tvc0nepjogf2o2', '::1', 1727793448, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732373738363533393b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c693a313b6f6c645f6c6173745f6c6f67696e7c693a313732373738363533393b6c6173745f636865636b7c693a313732373738363533393b),
('ktg2rhrpqmn2025iok0prq0oj916soiv', '::1', 1727788839, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732373738383833393b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c693a313b6f6c645f6c6173745f6c6f67696e7c693a313732373738363533393b6c6173745f636865636b7c693a313732373738383833393b),
('ho7vdgr5ibbcllm55fmr4p60bsh1gntr', '::1', 1727788839, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732373738383833393b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c693a313b6f6c645f6c6173745f6c6f67696e7c693a313732373738383833393b6c6173745f636865636b7c693a313732373738383833393b),
('t798mpo873uvkud87a194p9drpc3fqha', '::1', 1727788866, 0x5f5f63695f6c6173745f726567656e65726174657c693a313732373738383833393b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c693a313b6f6c645f6c6173745f6c6f67696e7c693a313732373738383833393b6c6173745f636865636b7c693a313732373738383833393b);

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
(4, 'inspector', 'Inspector');

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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Ali', 'xyz', 'Abc', 'Abc', '15 Days', '2024-10-01 03:49:00', '2024-10-01 10:49:00', '2', 11, 1, NULL, '<h3>Client Supplied Equipment & Resources</h3>\r\n<p><strong>BETTER ACCESS</strong> understand that the following items will be supplied at site</p>\r\n<ul>\r\n  <li>Plant Air/Electricity& water as required.</li>\r\n  <li>Free & unrestricted access to structure.</li>\r\n  <li>Entry permits for our personnel to the site.</li>\r\n  <li>Sufficient secure storage space for our Material on site.</li>\r\n</ul>\r\n<p>Further to above, it is assumed that the end user will supply the <strong>BETTER ACCESS</strong> Team with assistance as required and all necessary job specific tooling to complete required tasks.</p>\r\n<h3>SAFETY</h3>\r\n<p><strong>BETTER ACCESS</strong> Personnel will operate under the control of the Site Permit System to Work as required. Further to this, all <strong>BETTER ACCESS</strong> operations will be fully risk assessed and the team will ensure that all parameters of the scope and individual roles and responsibilities are covered in toolbox talks prior to any work commencing. This area will be covered in more detail in our technical proposal.</p>\r\n<h3>Terms & Conditions</h3>\r\n<p>The following terms are also applicable</p>\r\n<ol>\r\n  <li>Above Rates are with Accommodation & Transportation.</li>\r\n  <li>Invoice will be submitted after the completion of the job.</li>\r\n  <li>This quotation is valid for 30 days from the above date.</li>\r\n  <li>Plant, utility air, water and electricity will be available free of charge to BAC On site if required</li>\r\n  <li>Payment: Payment will be payable within 30 days after submission of invoice.</li>\r\n  <li>Permissions & NOC: Any kind of permission/NOC if required from Municipality & RTA, will be provided by Client.</li>\r\n</ol>\r\n<p>We therefore trust that the above proposal is of interest to your company We may look forward to receiving your further instructions in due course.</p>\r\n', 'new'),
(2, 'Ali', 'xyz', 'Abc', 'Abc', '15 Days', '2024-10-01 03:49:18', '2024-10-01 10:49:18', '2', 11, 1, NULL, '<h3>Client Supplied Equipment & Resources</h3>\r\n<p><strong>BETTER ACCESS</strong> understand that the following items will be supplied at site</p>\r\n<ul>\r\n  <li>Plant Air/Electricity& water as required.</li>\r\n  <li>Free & unrestricted access to structure.</li>\r\n  <li>Entry permits for our personnel to the site.</li>\r\n  <li>Sufficient secure storage space for our Material on site.</li>\r\n</ul>\r\n<p>Further to above, it is assumed that the end user will supply the <strong>BETTER ACCESS</strong> Team with assistance as required and all necessary job specific tooling to complete required tasks.</p>\r\n<h3>SAFETY</h3>\r\n<p><strong>BETTER ACCESS</strong> Personnel will operate under the control of the Site Permit System to Work as required. Further to this, all <strong>BETTER ACCESS</strong> operations will be fully risk assessed and the team will ensure that all parameters of the scope and individual roles and responsibilities are covered in toolbox talks prior to any work commencing. This area will be covered in more detail in our technical proposal.</p>\r\n<h3>Terms & Conditions</h3>\r\n<p>The following terms are also applicable</p>\r\n<ol>\r\n  <li>Above Rates are with Accommodation & Transportation.</li>\r\n  <li>Invoice will be submitted after the completion of the job.</li>\r\n  <li>This quotation is valid for 30 days from the above date.</li>\r\n  <li>Plant, utility air, water and electricity will be available free of charge to BAC On site if required</li>\r\n  <li>Payment: Payment will be payable within 30 days after submission of invoice.</li>\r\n  <li>Permissions & NOC: Any kind of permission/NOC if required from Municipality & RTA, will be provided by Client.</li>\r\n</ol>\r\n<p>We therefore trust that the above proposal is of interest to your company We may look forward to receiving your further instructions in due course.</p>\r\n', 'new'),
(3, 'Akbar', 'xyz', 'Abc', 'Abc', '15 Days', '2024-10-01 04:48:36', '2024-10-01 11:48:36', '1', 7, 1, NULL, '<h3>Client Supplied Equipment & Resources</h3>\r\n<p><strong>BETTER ACCESS</strong> understand that the following items will be supplied at site</p>\r\n<ul>\r\n  <li>Plant Air/Electricity& water as required.</li>\r\n  <li>Free & unrestricted access to structure.</li>\r\n  <li>Entry permits for our personnel to the site.</li>\r\n  <li>Sufficient secure storage space for our Material on site.</li>\r\n</ul>\r\n<p>Further to above, it is assumed that the end user will supply the <strong>BETTER ACCESS</strong> Team with assistance as required and all necessary job specific tooling to complete required tasks.</p>\r\n<h3>SAFETY</h3>\r\n<p><strong>BETTER ACCESS</strong> Personnel will operate under the control of the Site Permit System to Work as required. Further to this, all <strong>BETTER ACCESS</strong> operations will be fully risk assessed and the team will ensure that all parameters of the scope and individual roles and responsibilities are covered in toolbox talks prior to any work commencing. This area will be covered in more detail in our technical proposal.</p>\r\n<h3>Terms & Conditions</h3>\r\n<p>The following terms are also applicable</p>\r\n<ol>\r\n  <li>Above Rates are with Accommodation & Transportation.</li>\r\n  <li>Invoice will be submitted after the completion of the job.</li>\r\n  <li>This quotation is valid for 30 days from the above date.</li>\r\n  <li>Plant, utility air, water and electricity will be available free of charge to BAC On site if required</li>\r\n  <li>Payment: Payment will be payable within 30 days after submission of invoice.</li>\r\n  <li>Permissions & NOC: Any kind of permission/NOC if required from Municipality & RTA, will be provided by Client.</li>\r\n</ol>\r\n<p>We therefore trust that the above proposal is of interest to your company We may look forward to receiving your further instructions in due course.</p>\r\n', 'new'),
(4, 'random', 'random', 'random', 'random', '15 Days', '2024-10-01 05:41:12', '2024-10-01 13:28:14', '1', 7, 1, NULL, '<h3>Client Supplied Equipment & Resources</h3>\r\n<p><strong>BETTER ACCESS</strong> understand that the following items will be supplied at site</p>\r\n<ul>\r\n  <li>Plant Air/Electricity& water as required.</li>\r\n  <li>Free & unrestricted access to structure.</li>\r\n  <li>Entry permits for our personnel to the site.</li>\r\n  <li>Sufficient secure storage space for our Material on site.</li>\r\n</ul>\r\n<p>Further to above, it is assumed that the end user will supply the <strong>BETTER ACCESS</strong> Team with assistance as required and all necessary job specific tooling to complete required tasks.</p>\r\n<h3>SAFETY</h3>\r\n<p><strong>BETTER ACCESS</strong> Personnel will operate under the control of the Site Permit System to Work as required. Further to this, all <strong>BETTER ACCESS</strong> operations will be fully risk assessed and the team will ensure that all parameters of the scope and individual roles and responsibilities are covered in toolbox talks prior to any work commencing. This area will be covered in more detail in our technical proposal.</p>\r\n<h3>Terms & Conditions</h3>\r\n<p>The following terms are also applicable</p>\r\n<ol>\r\n  <li>Above Rates are with Accommodation & Transportation.</li>\r\n  <li>Invoice will be submitted after the completion of the job.</li>\r\n  <li>This quotation is valid for 30 days from the above date.</li>\r\n  <li>Plant, utility air, water and electricity will be available free of charge to BAC On site if required</li>\r\n  <li>Payment: Payment will be payable within 30 days after submission of invoice.</li>\r\n  <li>Permissions & NOC: Any kind of permission/NOC if required from Municipality & RTA, will be provided by Client.</li>\r\n</ol>\r\n<p>We therefore trust that the above proposal is of interest to your company We may look forward to receiving your further instructions in due course.</p>\r\n', 'accepted');

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
(1, 'Abc', 11, '12122121', 1),
(2, 'Abc', 11, '12122121', 2),
(3, 'Abc', 1, '47', 3),
(4, 'random', 9, '110', 4);

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
(1, 'accepted', '2024-10-01 06:28:14', '', NULL, 4);

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
(1, '127.0.0.1', 'admin', '$2y$08$J00Is9DvUyaJn964om4JteOsDyiwELKcKsfRzazcz42VmTb9qUNwS', 'admin@admin.com', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1727788839, 1, 'Admin', 'istrator', 'ADMIN', '24523532532', NULL, NULL, 0, NULL, NULL, '0', NULL),
(2, '::1', 'ali', '$2y$08$mgLW2T3aiix4iLMhvYjDWeRbT1NwIlfCrvMws5kL4HO4WXZC.CQwa', 'ali@sage-teck.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1727772246, 1727786518, 1, 'Ali', 'Khizar', 'Better Access', '03000000000', NULL, NULL, 0, NULL, 'web', '393f22834279344ffd6bbf098b2bf793', NULL);

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
(114, 1, 1),
(116, 2, 4);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invoice_services`
--
ALTER TABLE `invoice_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `quotation_services`
--
ALTER TABLE `quotation_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `quotation_status`
--
ALTER TABLE `quotation_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
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

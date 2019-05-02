-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 06, 2016 at 12:48 PM
-- Server version: 5.5.48-37.8
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `appointment`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_datetime` datetime NOT NULL,
  `updated_user_id` int(11) NOT NULL,
  `updated_datetime` datetime NOT NULL,
  `approved_status` int(11) NOT NULL COMMENT '0: Waiting, 1: Approved',
  `status` int(11) NOT NULL COMMENT '1: Active, 0: Inactive'
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `service_id`, `date`, `time`, `firstname`, `lastname`, `email`, `created_datetime`, `updated_user_id`, `updated_datetime`, `approved_status`, `status`) VALUES
(1, 3, '2016-08-06', '00:30:00', 'Toh', 'Jack', 'too@gmail.com', '2016-08-06 19:23:40', 0, '0000-00-00 00:00:00', 0, 1),
(2, 2, '2016-08-06', '13:30:00', 'David', 'Tom', 'wi7@gmail.com', '2016-08-06 19:25:26', 0, '0000-00-00 00:00:00', 0, 1),
(3, 3, '2016-08-31', '02:00:00', 'KK', 'Kh', 'kk@gmail.com', '2016-08-06 19:26:41', 0, '0000-00-00 00:00:00', 0, 1),
(4, 2, '2016-08-31', '01:30:00', 'Ei', 'Pyain', 'ei@gmai.com', '2016-08-06 19:28:05', 0, '0000-00-00 00:00:00', 0, 1),
(5, 2, '2016-08-07', '07:00:00', 'Eait', 'Kay', 'ek@gmail.sg', '2016-08-07 00:21:20', 0, '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL,
  `service_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `updated_user_id` int(11) NOT NULL,
  `updated_datetime` datetime NOT NULL,
  `status` int(11) NOT NULL COMMENT '0: Inactive, 1: Active'
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `created_user_id`, `created_datetime`, `updated_user_id`, `updated_datetime`, `status`) VALUES
(1, 'Blood Test', 1, '2016-08-06 18:40:52', 0, '0000-00-00 00:00:00', 1),
(2, 'Medical Check Up', 1, '2016-08-06 18:41:14', 0, '0000-00-00 00:00:00', 1),
(3, 'X-Ray Test', 1, '2016-08-06 18:41:31', 1, '2016-08-06 18:52:31', 1),
(4, 'Dental Check Up', 1, '2016-08-06 19:28:56', 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `site_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `site_url` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `dateformat` int(11) NOT NULL COMMENT '1: Y-M-D H:i:S'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `logo`, `site_name`, `site_url`, `dateformat`) VALUES
(1, 'logo.jpg', 'Appointment Management System', 'http://demo.appointment.prosoft-apps.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(499) COLLATE utf8_unicode_ci NOT NULL,
  `user_group_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `updated_user_id` int(11) NOT NULL,
  `updated_datetime` datetime NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `user_group_id`, `email`, `created_user_id`, `created_datetime`, `updated_user_id`, `updated_datetime`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'admin@gmail.com', 1, '2016-08-05 00:00:00', 1, '2016-08-07 01:43:25', 1),
(2, 'abc', '594f803b380a41396ed63dca39503542', 1, 'abc@gmail.com', 1, '2016-08-07 00:56:50', 1, '2016-08-07 01:43:48', 1),
(3, 'def', '25d946e922c65529faa50ba0e9f64f16', 1, 'def@gmail.com.sg', 1, '2016-08-07 00:59:34', 1, '2016-08-07 01:43:59', 1),
(4, 'kk', '25d946e922c65529faa50ba0e9f64f16', 1, 'kk@gmail.com', 1, '2016-08-07 01:00:08', 0, '0000-00-00 00:00:00', 1),
(5, 'test', '21232f297a57a5a743894a0e4a801fc3', 1, 'test@gmail.com', 1, '2016-08-07 01:44:18', 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE IF NOT EXISTS `user_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `updated_user_id` int(11) NOT NULL,
  `updated_datetime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`), ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

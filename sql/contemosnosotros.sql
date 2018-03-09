-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 07, 2018 at 12:41 AM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.28-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contemosnosotros`
--

-- --------------------------------------------------------

--
-- Table structure for table `digitaciones`
--

DROP TABLE IF EXISTS `digitaciones`;
CREATE TABLE `digitaciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `acta_id` int(11) NOT NULL,
  `diputado` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `digitado` float NOT NULL,
  `origin` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hash_table`
--

DROP TABLE IF EXISTS `hash_table`;
CREATE TABLE `hash_table` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `acta` int(10) UNSIGNED NOT NULL,
  `diputado` int(10) UNSIGNED NOT NULL,
  `hashvalue` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `valid_until` datetime DEFAULT NULL,
  `completed` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `digitaciones`
--
ALTER TABLE `digitaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hash_table`
--
ALTER TABLE `hash_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `acta_diputado_idx` (`acta`,`diputado`),
  ADD KEY `hash_idx` (`hashvalue`),
  ADD KEY `datetime_idx` (`valid_until`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `digitaciones`
--
ALTER TABLE `digitaciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `hash_table`
--
ALTER TABLE `hash_table`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

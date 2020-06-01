-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2018 at 01:22 PM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


DROP DATABASE IF EXISTS schema;
CREATE DATABASE schema;
USE schema;

--
-- Database: `schema`
--

-- --------------------------------------------------------

--
-- Table structure for table `Jobs`
--

CREATE TABLE IF NOT EXISTS `Jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_title` varchar(200) COLLATE utf8_bin NOT NULL,
  `job_description` varchar(2000) COLLATE utf8_bin NOT NULL,
  `category` varchar(200) COLLATE utf8_bin NOT NULL,
  `company_name` varchar(200) COLLATE utf8_bin NOT NULL,
  `company_location` varchar(200) COLLATE utf8_bin NOT NULL,
  `date_post` varchar(200) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Jobs_Applied_For`
--

CREATE TABLE IF NOT EXISTS `Jobs_Applied_For` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `date_applied` varchar(200) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(200) COLLATE utf8_bin NOT NULL,
  `lastname` varchar(200) COLLATE utf8_bin NOT NULL,
  `password` varchar(200) COLLATE utf8_bin NOT NULL,
  `telephone` varchar(200) COLLATE utf8_bin NOT NULL,
  `email` varchar(200) COLLATE utf8_bin NOT NULL,
  `data_joined` varchar(200) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `password` (`password`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `firstname`, `lastname`, `password`, `telephone`, `email`, `data_joined`) VALUES
(1, '', '', 'password123', '', 'admin@hireme.com', '2018-12-02');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Jobs_Applied_For`
--
ALTER TABLE `Jobs_Applied_For`
  ADD CONSTRAINT `Jobs_Applied_For_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`),
  ADD CONSTRAINT `Jobs_Applied_For_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `Jobs` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
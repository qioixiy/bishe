-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 20, 2015 at 12:29 PM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `c9`
--
--
-- Database: `ecu`
--

-- --------------------------------------------------------

--
-- Table structure for table `loginStatus`
--

CREATE TABLE IF NOT EXISTS `loginStatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id count',
  `username` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=112 ;

--
-- Dumping data for table `loginStatus`
--

INSERT INTO `loginStatus` (`id`, `username`, `token`, `timestamp`) VALUES
(110, 'test', '5e62ab9e129e47dec87bca0e86253abb', '2015-12-20 11:06:36'),
(111, 'test', '9f42884748cffda46bc389cff86f24fa', '2015-12-20 11:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE IF NOT EXISTS `manager` (
  `id` int(11) NOT NULL DEFAULT '0',
  `name` text,
  `password` text,
  `email` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `name`, `password`, `email`) VALUES
(0, 'root', 'password', 'zhouxueyuan1106');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text,
  `password` text,
  `email` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`),
  KEY `id_3` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'test', 'password', 'test@test.com'),
(2, 'test2', 'password', 'test@test.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

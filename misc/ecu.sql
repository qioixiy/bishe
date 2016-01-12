-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 12, 2016 at 11:03 PM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=342 ;

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
-- Table structure for table `uploadStatus`
--

CREATE TABLE IF NOT EXISTS `uploadStatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(128) NOT NULL,
  `size` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `version` varchar(128) NOT NULL,
  `md5` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `uploadStatus`
--

INSERT INTO `uploadStatus` (`id`, `filename`, `size`, `time`, `version`, `md5`) VALUES
(8, 'v0.1.s19', 4, '2015-12-27 06:22:06', 'v0.1.s19', '65e9ab3f2fe408f533a10119d758f081'),
(9, 'v0.2.s19', 4, '2015-12-27 06:23:49', 'v0.2.s19', '7e49d62a908cdf10a250f4e58d78e13d'),
(10, 'v0.3.s19', 4, '2015-12-27 06:53:32', 'v0.3.s19', 'f8aba9603ba0eeb9b8a532837b22cb2e'),
(11, 'v0.4.s19', 4, '2015-12-27 10:07:59', 'v0.4.s19', 'db27175e9dbd83fc8bcf4544efe0b958'),
(12, 'v0.5.s19', 4, '2015-12-27 10:32:19', 'v0.5.s19', 'e0f38bb802c60777c085906a814b12a0'),
(13, 'v0.6.s19', 4, '2015-12-27 11:00:21', 'v0.6.s19', 'a572fd8d5c14aea54fefb5364b3437eb'),
(14, 'v0.7.s19', 4, '2015-12-27 11:11:30', 'v0.7.s19', '1b49e1bc9d1de00d4e07e70e08a92a53');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'test', 'password', 'test@test.com'),
(6, 'u', 'ps', 'zhouxueyuan1106@163.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

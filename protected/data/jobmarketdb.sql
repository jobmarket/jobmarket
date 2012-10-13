-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 13, 2012 at 10:53 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jobmarketdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

DROP TABLE IF EXISTS `job`;
CREATE TABLE IF NOT EXISTS `job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(127) NOT NULL,
  `price` double NOT NULL,
  `description` text NOT NULL,
  `featured` int(11) DEFAULT '0' COMMENT '0 Normal, 1 Featured',
  `type` int(11) DEFAULT '0' COMMENT '0 Fixed price, 1 Hourly',
  `attach_file_path` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `duration` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0' COMMENT '0 Open, 1 Ingrogress, 2 Suppend, 3 Finish, 4 Close',
  `category_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `freelancer_id` int(11) DEFAULT NULL,
  `freelancer_rating` float DEFAULT NULL,
  `client_rating` float DEFAULT NULL,
  `freelancer_feedback` varchar(255) DEFAULT NULL,
  `client_feedback` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

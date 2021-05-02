-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 02, 2021 at 07:32 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `house_rental_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Duplex'),
(2, 'Single-Family Home'),
(3, 'Multi-Family Home'),
(4, '2-story house');

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

DROP TABLE IF EXISTS `houses`;
CREATE TABLE IF NOT EXISTS `houses` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `house_no` varchar(50) NOT NULL,
  `category_id` int(30) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `house_no`, `category_id`, `description`, `price`) VALUES
(1, '623', 4, 'Sample', 2500),
(2, '621', 2, '2 rooms electricity single meter', 150000),
(3, '622', 3, 'sinle meter usage', 120000),
(4, '630', 1, 'one usage', 100000),
(5, '311', 4, 'good', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `maintains`
--

DROP TABLE IF EXISTS `maintains`;
CREATE TABLE IF NOT EXISTS `maintains` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `house_no` varchar(50) NOT NULL,
  `electricity` varchar(100) NOT NULL,
  `e_price` double NOT NULL,
  `furniture` varchar(100) NOT NULL,
  `f_price` double NOT NULL,
  `drainage` varchar(100) NOT NULL,
  `d_price` double NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maintains`
--

INSERT INTO `maintains` (`id`, `house_no`, `electricity`, `e_price`, `furniture`, `f_price`, `drainage`, `d_price`, `date_created`) VALUES
(3, '630', 'new', 4, 'new', 4, 'new', 4, '2021-04-26 18:04:47');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `tenant_id` int(30) NOT NULL,
  `amount` float NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `tenant_id`, `amount`, `invoice`, `date_created`) VALUES
(3, 4, 360000, '12298', '2021-03-24 08:23:14'),
(6, 7, -10000, '9911', '2021-04-24 16:16:09'),
(7, 8, 1111, '22145', '2021-04-26 17:50:39'),
(8, 9, 300000, '3333333', '2021-04-28 10:58:10'),
(9, 10, 300000, '22222', '2021-04-28 11:44:28'),
(10, 11, 300000, '8787', '2021-04-28 11:50:32'),
(11, 12, 600000, '9989', '2021-04-28 11:58:37'),
(12, 13, 100000, '4332', '2021-04-28 13:42:14'),
(13, 14, 100000, '556445', '2021-04-28 14:40:45'),
(14, 15, 2500, '434', '2021-04-30 16:48:45'),
(15, 16, 2500, '4555', '2021-04-30 16:51:52'),
(16, 17, 100000, '554432', '2021-04-30 16:53:57'),
(17, 18, 150000, '6877', '2021-04-30 16:56:13'),
(18, 19, 2500, '321', '2021-04-30 16:58:05'),
(19, 20, 100000, '2221', '2021-04-30 16:59:39'),
(20, 21, 2500, '665', '2021-04-30 17:11:43'),
(21, 22, 150000, '975', '2021-04-30 17:12:36'),
(22, 23, 2500, '432', '2021-04-30 17:27:46'),
(23, 24, 150000, '221334', '2021-04-30 17:28:32'),
(24, 25, 100000, '5', '2021-04-30 17:29:12'),
(25, 26, 2500, '87', '2021-04-30 17:41:30'),
(26, 27, 150000, '11', '2021-04-30 17:43:46'),
(27, 28, 2500, '2500', '2021-04-30 17:46:14');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

DROP TABLE IF EXISTS `system_settings`;
CREATE TABLE IF NOT EXISTS `system_settings` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'APARTMENT MANAGEMENT SYSTEM', 'code3teck@gmail.com', '255743997716', '1619278500_download.jpg', 'Managing your apartments and rents anytime anywhere.');

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

DROP TABLE IF EXISTS `tenants`;
CREATE TABLE IF NOT EXISTS `tenants` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `house_id` int(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = active, 0= inactive',
  `date_in` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`id`, `firstname`, `middlename`, `lastname`, `email`, `contact`, `house_id`, `status`, `date_in`) VALUES
(4, 'juma', 'lungo', 'mtei', 'makurumakuru97@gmail.com', '0766125533', 3, 1, '2020-11-24'),
(14, 'Daniel', 'john', 'mmbuji', 'code3teck@gmail.com', '255743997716', 5, 1, '2021-03-26'),
(28, 'abed', 'juma', 'ali', 'code3teck@gmail.com', '255743997716', 1, 1, '2021-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `username` varchar(200) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '2' COMMENT '1=Admin,2=Staff',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `phone`, `password`, `type`) VALUES
(11, 'daniel', 'admin', '', '0192023a7bbd73250516f069df18b500', 1),
(20, 'John', 'admin11', '', '827ccb0eea8a706c4c34a16891f84e7b', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

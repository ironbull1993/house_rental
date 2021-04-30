-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 27, 2021 at 01:27 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `house_no`, `category_id`, `description`, `price`) VALUES
(1, '623', 4, 'Sample', 2500),
(2, '621', 2, '2 rooms electricity single meter', 150000),
(3, '622', 3, 'sinle meter usage', 120000),
(4, '630', 1, 'one usage', 100000);

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
(1, '623', 'dd', 2, 'dd', 2, 'dd', 2, '2021-04-26 17:23:46'),
(2, '623', 'dd', 3, 'dd', 3, 'dd', 3, '2021-04-26 17:33:00'),
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `tenant_id`, `amount`, `invoice`, `date_created`) VALUES
(3, 4, 360000, '12298', '2021-03-24 08:23:14'),
(6, 7, -10000, '9911', '2021-04-24 16:16:09'),
(7, 8, 1111, '22145', '2021-04-26 17:50:39');

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
(1, 'APARTMENT MANAGEMENT SYSTEM', 'code3teck@gmail.com', '+255713616639', '1619278500_download.jpg', '&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: 400; text-align: justify; color: rgb(0, 0, 0);&quot;&gt;&lt;span style=&quot;color:rgb(204,0,0);font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: 400; text-align: justify;&quot;&gt;&amp;nbsp;&lt;/span&gt;&amp;nbsp;&lt;/span&gt;&lt;br&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative; color: rgb(51, 51, 51);&quot;&gt;&lt;span style=&quot;color:rgb(204,0,0);text-align: center; background: transparent; position: relative;&quot;&gt;Your apartments on your hands anywhere anytime&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`id`, `firstname`, `middlename`, `lastname`, `email`, `contact`, `house_id`, `status`, `date_in`) VALUES
(4, 'juma', 'lungo', 'mtei', 'makurumakuru97@gmail.com', '0766125533', 3, 1, '2020-11-24'),
(6, 'aj', 'dj', 'jj', 'Tash4business@gmail.com', '13243344', 2, 0, '2021-03-30'),
(7, 'daniel', 'obed', 'mmbuji', 'code3teck@gmail.com', '0766125533', 1, 1, '2021-04-24'),
(8, 'juma', 'ema', 'mushi', 'mmbuji88@gmail.com', '0766125533', 4, 1, '2021-05-26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '2' COMMENT '1=Admin,2=Staff',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`) VALUES
(11, 'daniel', 'admin', '0192023a7bbd73250516f069df18b500', 1),
(20, 'John', 'admin11', '827ccb0eea8a706c4c34a16891f84e7b', 2),
(21, 'kelvin', 'admin33', 'c8cd08c1984282bea030ae551b812cff', 1),
(22, 'papa', 'code3', 'a384b6463fc216a5f8ecb6670f86456a', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

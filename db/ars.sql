-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 30, 2016 at 05:07 PM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ars`
--

-- --------------------------------------------------------

--
-- Table structure for table `ars_accommodation`
--

CREATE TABLE IF NOT EXISTS `ars_accommodation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acc_price` decimal(10,2) DEFAULT NULL,
  `acc_bathroom` int(11) DEFAULT NULL,
  `acc_description` varchar(250) DEFAULT NULL,
  `acc_status` varchar(100) DEFAULT NULL,
  `acc_dateAdded` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `acc_postcode` int(20) DEFAULT NULL,
  `acc_city` varchar(100) DEFAULT NULL,
  `acc_state` varchar(100) DEFAULT NULL,
  `acc_noRoom` int(11) DEFAULT NULL,
  `acc_title` varchar(250) DEFAULT NULL,
  `acc_preference` varchar(50) DEFAULT NULL,
  `acc_seksyen` int(11) DEFAULT NULL,
  `acc_address` varchar(250) DEFAULT NULL,
  `acc_typeAcc` int(11) DEFAULT NULL,
  `acc_image` varchar(100) DEFAULT NULL,
  `acc_lat` varchar(50) DEFAULT NULL,
  `acc_long` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `ars_accommodation`
--

INSERT INTO `ars_accommodation` (`id`, `acc_price`, `acc_bathroom`, `acc_description`, `acc_status`, `acc_dateAdded`, `user_id`, `acc_postcode`, `acc_city`, `acc_state`, `acc_noRoom`, `acc_title`, `acc_preference`, `acc_seksyen`, `acc_address`, `acc_typeAcc`, `acc_image`, `acc_lat`, `acc_long`) VALUES
(31, 800.00, 2, 'fully furnish', 'Publish', '30/06/2016', 9, 40000, 'Shah Alam', 'Selangor', 3, 'Rumah Sewa Flat PKNS Seksyen 7', 'Male', 7, 'Blok 11, Jalan Plumbum 7/95,\r\nSeksyen 7 \r\n40000 Shah Alam, Selangor.', 3, 'images/588606065152194.jpg', '3.071101', '101.48361');

-- --------------------------------------------------------

--
-- Table structure for table `ars_booking`
--

CREATE TABLE IF NOT EXISTS `ars_booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_date` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `acc_id` int(11) DEFAULT NULL,
  `book_status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `ars_booking`
--

INSERT INTO `ars_booking` (`id`, `book_date`, `user_id`, `acc_id`, `book_status`) VALUES
(17, '30/06/2016', 10, 31, 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `ars_passwordReference`
--

CREATE TABLE IF NOT EXISTS `ars_passwordReference` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password_reference` varchar(20) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `ars_passwordReference`
--

INSERT INTO `ars_passwordReference` (`id`, `password_reference`, `user_id`) VALUES
(9, 'shahril9', 9),
(10, 'izzat', 10);

-- --------------------------------------------------------

--
-- Table structure for table `ars_user`
--

CREATE TABLE IF NOT EXISTS `ars_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(250) DEFAULT NULL,
  `user_icno` varchar(20) DEFAULT NULL,
  `user_phone` varchar(20) DEFAULT NULL,
  `user_email` varchar(200) DEFAULT NULL,
  `user_address` varchar(250) DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `auth_key` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT '10',
  `role` int(11) DEFAULT NULL,
  `user_dateReg` varchar(50) DEFAULT NULL,
  `user_nickname` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `ars_user`
--

INSERT INTO `ars_user` (`id`, `user_name`, `user_icno`, `user_phone`, `user_email`, `user_address`, `password_hash`, `auth_key`, `status`, `role`, `user_dateReg`, `user_nickname`) VALUES
(9, 'shahril anuar bin md din', '910420081234', '0191234567', 'silenttech9@gmail.com', 'seksyen 7', '$2y$13$rmHJh7QbbpY0moKb3ENkZOdSrqTWuKD3FkMufIoaPYxaWlIJjg5i6', 'eZoF3qVoZQDXkWzVzL5RI5eVf6iefI8t', 10, 2, '30/06/2016', 'shahril'),
(10, 'Muhammad Izzat Bin Abd Samad', '950808081234', '0171234565', 'shahrilwanie@gmail.com', 'Kuala Kangsar', '$2y$13$ALvesimWoCz5Sa3iV4xcG.2/A.PKFmxJ1svvO21H4WNG.m55q8V4y', 'ZqtPSkejMnZunPfphs7Y5tuw9a1LMnBW', 10, 3, '30/06/2016', 'Izzat');

-- --------------------------------------------------------

--
-- Table structure for table `lookup_accommodation`
--

CREATE TABLE IF NOT EXISTS `lookup_accommodation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `lookup_accommodation`
--

INSERT INTO `lookup_accommodation` (`id`, `type_name`) VALUES
(1, 'Terrace'),
(2, 'Condominium'),
(3, 'Flat'),
(4, 'Apartment');

-- --------------------------------------------------------

--
-- Table structure for table `lookup_area`
--

CREATE TABLE IF NOT EXISTS `lookup_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seksyen_area` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `lookup_area`
--

INSERT INTO `lookup_area` (`id`, `seksyen_area`) VALUES
(1, 'Seksyen 1'),
(2, 'Seksyen 2'),
(3, 'Seksyen 3'),
(4, 'Seksyen 4'),
(5, 'Seksyen 5'),
(6, 'Seksyen 6'),
(7, 'Seksyen 7'),
(8, 'Seksyen 8'),
(9, 'Seksyen 9'),
(10, 'Seksyen 10'),
(11, 'Seksyen 11'),
(12, 'Seksyen 12'),
(13, 'Seksyen 13'),
(14, 'Seksyen 14');

-- --------------------------------------------------------

--
-- Table structure for table `lookup_role`
--

CREATE TABLE IF NOT EXISTS `lookup_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `lookup_role`
--

INSERT INTO `lookup_role` (`id`, `role`) VALUES
(2, 'Landlord'),
(3, 'Student');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.1.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 05, 2020 at 08:37 PM
-- Server version: 5.1.62
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kapilphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `date_created`, `time_created`) VALUES
(1, 'Belloafeez7@gmail.com', '$2y$10$dsdyV5FgLChxjL5w.7f0C.J5PyksHG7gn2nOfzqGyj5.AaaUEqjJS', '2020-03-31', '17:41:39'),
(8, 'Bellz@gmail.com', '$2y$10$nY.7EmC8utFbYtQVzFvlTOh3mzUB.SIndLG2kbJgZ9H1P3koIWk4q', '2020-04-05', '14:20:16');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE IF NOT EXISTS `logo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `img`) VALUES
(1, 'IMG-20200405-WA0057.jpg'),
(2, 'images (10).jpeg'),
(3, 'IMG-20200405-WA0024.jpg'),
(4, 'IMG-20200405-WA0225.jpg'),
(5, 'IMG-20200405-WA0225.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(225) NOT NULL,
  `content` text NOT NULL,
  `date_created` date NOT NULL,
  `time_created` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `title`, `content`, `date_created`, `time_created`) VALUES
(1, 'About Us', '<p><b>About Us</b><p>\r\n\r\n<p>This is our about is page</>', '2020-04-03', '23:02:07'),
(2, 'Contact Us ', '\r\n<p>This is our contact us page</p> welcome">">', '2020-04-03', '23:10:03');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

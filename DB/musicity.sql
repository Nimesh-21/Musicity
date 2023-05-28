-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 18, 2022 at 03:54 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `musicity`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` varchar(15) NOT NULL,
  `admin_password` varchar(10) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_password`) VALUES
('omkar', 'omkar'),
('deven', 'deven');

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

DROP TABLE IF EXISTS `artist`;
CREATE TABLE IF NOT EXISTS `artist` (
  `artist_id` int(11) NOT NULL AUTO_INCREMENT,
  `artist_name` varchar(25) NOT NULL,
  `artist_username` varchar(20) NOT NULL,
  PRIMARY KEY (`artist_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`artist_id`, `artist_name`, `artist_username`) VALUES
(2, 'Nimesh Nikhil', 'nimesh'),
(3, 'Omkar Wadekar', 'omkar2003'),
(4, 'Deven Nehete', 'deven1999'),
(5, 'Dhruv Ghevariya', 'confusedBall'),
(6, 'Naman Bhagat', 'silkyHair69'),
(7, 'Saurabh Nagpure', 'bouncyHair420'),
(8, 'Omkar Wadekar', 'omkar'),
(9, 'sammy', 'samarth123');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
CREATE TABLE IF NOT EXISTS `genres` (
  `genre_name` varchar(15) NOT NULL,
  `genre_id` int(3) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`genre_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`genre_name`, `genre_id`) VALUES
('Romance', 1),
('Pop', 2),
('Classical', 3),
('Rock', 4),
('Electronic', 5),
('Hip-Hop', 6),
('Bollywood', 7),
('Hollywood', 8),
('Jazz', 9),
('Indie Rock', 10),
('Deven', 11),
('Funk', 12),
('Metal', 13);

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

DROP TABLE IF EXISTS `song`;
CREATE TABLE IF NOT EXISTS `song` (
  `song_id` int(11) NOT NULL AUTO_INCREMENT,
  `song_name` varchar(20) DEFAULT NULL,
  `song_path` text,
  `song_photo_path` text,
  `artist_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `genre` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`song_id`),
  KEY `art_id` (`artist_id`),
  KEY `uid` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `user_password` varchar(10) NOT NULL,
  `username` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int(3) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `user_password`, `username`, `gender`, `age`) VALUES
(19, 'Nimesh Nikhil', 'nimesh', 'nimesh', 'male', 45),
(20, 'Omkar Wadekar', 'omkar', 'omkar', 'male', 19),
(21, 'goodboy', '12345', 'google', 'male', 18),
(22, 'sammy', 'sammy', 'samarth123', 'female', 80);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

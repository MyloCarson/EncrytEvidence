-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2018 at 03:56 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `encrypt_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `evidence`
--

CREATE TABLE IF NOT EXISTS `evidence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `about` text NOT NULL,
  `filename` text NOT NULL,
  `path` text NOT NULL,
  `evidence_key` text NOT NULL,
  `date_created` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `fullname` text,
  `password` text NOT NULL,
  `date_created` datetime NOT NULL,
  `Email` varchar(40) DEFAULT NULL,
  `verification_code` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `password`, `date_created`, `Email`, `verification_code`) VALUES
(1, 'Abraham', '0', 'ab101', '0000-00-00 00:00:00', 'siracube@gmail.com', NULL),
(2, 'Kola', '0', 'kola222', '0000-00-00 00:00:00', NULL, NULL),
(3, 'Kunle001', '0', 'kunlex105', '0000-00-00 00:00:00', 'kunlex105@gmail.com', '345NHGHG5656L'),
(4, 'femi222', '0', 'fe9u3349nnfk94', '0000-00-00 00:00:00', 'femoginni@yahoo.com', 'dfds'),
(5, 'femi222', 'Femi Oginni', 'fe9u3349nnfk94', '0000-00-00 00:00:00', 'femoginni@yahoo.com', 'dfds');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `evidence`
--
ALTER TABLE `evidence`
  ADD CONSTRAINT `evidence_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

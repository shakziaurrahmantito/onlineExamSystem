-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 03, 2020 at 07:14 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `adminId` int(11) NOT NULL AUTO_INCREMENT,
  `adminUser` varchar(50) NOT NULL,
  `adminPass` varchar(32) NOT NULL,
  PRIMARY KEY (`adminId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminUser`, `adminPass`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ans`
--

DROP TABLE IF EXISTS `tbl_ans`;
CREATE TABLE IF NOT EXISTS `tbl_ans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quesNo` int(11) NOT NULL,
  `rightAns` int(11) NOT NULL DEFAULT '0',
  `ans` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=119 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ans`
--

INSERT INTO `tbl_ans` (`id`, `quesNo`, `rightAns`, `ans`) VALUES
(101, 1, 1, 'Highest Priority'),
(100, 1, 0, 'Minimal code duplication'),
(99, 1, 0, 'Clean separation of design & content'),
(104, 2, 1, 'Text decoration: in-line'),
(102, 1, 0, 'Reduces page download time'),
(103, 2, 0, 'Text decoration: line-through'),
(105, 2, 0, 'Text decoration: over line'),
(112, 4, 1, 'Style'),
(111, 4, 0, 'Class'),
(110, 3, 0, 'Speak'),
(109, 3, 1, 'Load'),
(108, 3, 0, 'Voice family'),
(107, 3, 0, 'Cue'),
(106, 2, 0, 'Text decoration: underline'),
(113, 4, 0, 'Span'),
(114, 4, 0, 'Link'),
(115, 5, 0, 'Slow'),
(116, 5, 1, 'Normal'),
(117, 5, 0, 'Fast'),
(118, 5, 0, 'None');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ques`
--

DROP TABLE IF EXISTS `tbl_ques`;
CREATE TABLE IF NOT EXISTS `tbl_ques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quesNo` int(11) NOT NULL,
  `ques` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ques`
--

INSERT INTO `tbl_ques` (`id`, `quesNo`, `ques`) VALUES
(28, 5, 'What is The initial value of The Marquee-Speed Property?'),
(24, 1, 'Which of the following does not apply to external styles?'),
(25, 2, 'Which of the following is not a valid text decoration option?'),
(26, 3, 'Which of the following is not a valid text-decoration option?'),
(27, 4, 'Which element property is required to define internal style?');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userId`, `name`, `username`, `password`, `email`, `status`) VALUES
(9, 'Md. Deluar Rahman', 'mddeluarrahmantito', 'e10adc3949ba59abbe56e057f20f883e', 'mddeluarrahmantito@gmail.com', 0),
(7, 'Md. Jiyaur Rahman', 'mdjiyarahmantito', 'e10adc3949ba59abbe56e057f20f883e', 'mdjiyarahmantito@gmail.com', 1),
(8, 'Md. Ziaur Rahman', 'mdziaurrahmantito', 'e10adc3949ba59abbe56e057f20f883e', 'mdziaurrahmantito@gmail.com', 1),
(6, 'Md. Rajibul Rahman', 'mdrajibulrahmantito', 'e10adc3949ba59abbe56e057f20f883e', 'mdrajibulrahmantito@gmail.com', 1),
(27, 'admin', 'admin', '202cb962ac59075b964b07152d234b70', 'admin@gmail.com', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

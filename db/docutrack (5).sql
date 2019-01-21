-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 15, 2019 at 07:40 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `docutrack`
--
CREATE DATABASE IF NOT EXISTS `docutrack` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `docutrack`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_office`
--

CREATE TABLE IF NOT EXISTS `admin_office` (
  `admin_office_ID` int(11) NOT NULL AUTO_INCREMENT,
  `admin_office_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`admin_office_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `admin_office`
--

INSERT INTO `admin_office` (`admin_office_ID`, `admin_office_name`) VALUES
(1, 'Bids and Awards Committee'),
(2, 'Procurement Office'),
(3, 'Office of the President'),
(4, 'Budget'),
(5, 'Accounting'),
(6, 'BAC Chairman'),
(7, 'Final Proc');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE IF NOT EXISTS `admin_user` (
  `admin_user_ID` int(11) NOT NULL AUTO_INCREMENT,
  `admin_user_name` varchar(20) DEFAULT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `admin_office_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`admin_user_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`admin_user_ID`, `admin_user_name`, `user_ID`, `admin_office_ID`) VALUES
(1, 'Sotelo', 1, 1),
(2, 'Aggabao', 2, 2),
(3, 'Amador', 3, 1),
(4, 'TUP PRES', 4, 3),
(5, 'Head of Budgt', 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `attached_files`
--

CREATE TABLE IF NOT EXISTS `attached_files` (
  `file_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PR_No` int(11) DEFAULT NULL,
  `file_name` varchar(50) DEFAULT NULL,
  `date_attached` datetime DEFAULT NULL,
  PRIMARY KEY (`file_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `attached_files`
--

INSERT INTO `attached_files` (`file_ID`, `PR_No`, `file_name`, `date_attached`) VALUES
(1, 1, 'doc1', '0000-00-00 00:00:00'),
(2, 1, 'ppt1', '0000-00-00 00:00:00'),
(3, 2, 'doc2', '0000-00-00 00:00:00'),
(4, 2, 'ppt2', '0000-00-00 00:00:00'),
(5, 3, 'pdf1', '0000-00-00 00:00:00'),
(6, 3, 'pdf2', '0000-00-00 00:00:00'),
(7, 4, 'trialdoc', '0000-00-00 00:00:00'),
(8, 1, 'excel1', '0000-00-00 00:00:00'),
(9, 3, '123', '2019-01-09 00:00:00'),
(10, 3, 'excel22', '2019-01-09 11:11:15'),
(11, 3, 'qwerty', '2019-01-09 11:12:01'),
(12, 3, 'oioi', '2019-01-09 11:13:08'),
(13, 3, '', '2019-01-09 11:17:41'),
(14, 3, 'new', '2019-01-09 12:29:16'),
(15, 3, 'new', '2019-01-09 12:29:26'),
(16, 1, 'excel22', '2019-01-10 02:07:22'),
(17, 1, 'qwerty', '2019-01-10 02:46:16'),
(18, 4, 'madz', '2019-01-10 05:31:56');

-- --------------------------------------------------------

--
-- Table structure for table `bidders`
--

CREATE TABLE IF NOT EXISTS `bidders` (
  `bidders_ID` int(11) NOT NULL AUTO_INCREMENT,
  `bidders_name` varchar(50) DEFAULT NULL,
  `contact_no` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`bidders_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `bidders`
--

INSERT INTO `bidders` (`bidders_ID`, `bidders_name`, `contact_no`, `email`) VALUES
(1, 'bidder1', 12345, 'bid1@gmail.com'),
(2, 'bidder2', 12344, 'bid2@gmail.com'),
(3, 'bidder3', 123, NULL),
(4, 'bidder4', 111, NULL),
(5, 'bidder5', 222, NULL),
(6, 'madz', 123, 'madz@gmail.com'),
(7, 'Madelind', 123, '123@gmail.com'),
(8, 'docu', 123, 'docu@gmail.com'),
(9, 'docu', 123, 'docu@gmail.com'),
(10, 'biddertrial', 123, 'l'),
(11, 'biddertrial', 123, 'l');

-- --------------------------------------------------------

--
-- Table structure for table `bidder_transaction`
--

CREATE TABLE IF NOT EXISTS `bidder_transaction` (
  `transaction_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PR_No` int(11) DEFAULT NULL,
  `bidders_ID` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT 'N',
  `date_added` datetime DEFAULT NULL,
  PRIMARY KEY (`transaction_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `bidder_transaction`
--

INSERT INTO `bidder_transaction` (`transaction_ID`, `PR_No`, `bidders_ID`, `amount`, `status`, `date_added`) VALUES
(1, 2, 1, 100000, 'N', NULL),
(2, 2, 2, 123, 'N', NULL),
(3, 2, 3, 3, 'N', NULL),
(4, 3, 1, 123, 'N', NULL),
(5, 3, 2, NULL, 'N', NULL),
(6, 3, 3, NULL, 'N', NULL),
(7, 4, 2, NULL, 'N', NULL),
(8, 4, 4, NULL, 'N', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE IF NOT EXISTS `colleges` (
  `college_ID` int(11) NOT NULL AUTO_INCREMENT,
  `college_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`college_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`college_ID`, `college_name`) VALUES
(1, 'College of Science'),
(2, 'College of Liberal Arts'),
(3, 'College of Industrial Education'),
(4, 'College of Industrial Technology'),
(5, 'College of Engineering'),
(6, 'College of Architecture and Fine Arts');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `department_ID` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(20) DEFAULT NULL,
  `college_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`department_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_ID`, `department_name`, `college_ID`) VALUES
(1, 'Math Dept', 1),
(2, 'Physics', 1),
(3, 'Chemistry', 1),
(4, 'SS', 2),
(5, 'English', 2),
(6, 'Filipino', 2),
(7, 'Electronics', 5),
(8, 'Mechanical', 5),
(9, 'Electical', 5),
(10, 'civil', 5);

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `PR_No` int(11) NOT NULL AUTO_INCREMENT,
  `ref_no` int(11) DEFAULT NULL,
  `date_submitted` datetime DEFAULT NULL,
  `status` varchar(10) DEFAULT 'A',
  `amount` float DEFAULT NULL,
  `remarks` varchar(50) DEFAULT NULL,
  `awards` varchar(50) DEFAULT NULL,
  `resolution` varchar(50) DEFAULT NULL,
  `proj_name` varchar(50) DEFAULT NULL,
  `proj_description` varchar(50) DEFAULT NULL,
  `mode_ID` int(11) DEFAULT '0',
  `end_user_ID` int(11) DEFAULT NULL,
  `cur_loc` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`PR_No`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`PR_No`, `ref_no`, `date_submitted`, `status`, `amount`, `remarks`, `awards`, `resolution`, `proj_name`, `proj_description`, `mode_ID`, `end_user_ID`, `cur_loc`) VALUES
(1, 1, '0000-00-00 00:00:00', 'A', 1, NULL, NULL, NULL, NULL, 'trial4insert', 1, 1, NULL),
(2, 1, '0000-00-00 00:00:00', 'A', 1, NULL, NULL, NULL, NULL, 'trial1insert', 1, 1, NULL),
(3, 1, '0000-00-00 00:00:00', 'A', 101, NULL, NULL, NULL, NULL, 'trial2insert', 1, 1, NULL),
(4, 1, '0000-00-00 00:00:00', 'A', 121, NULL, NULL, NULL, NULL, '1stTrial', 2, 2, NULL),
(5, 1, '0000-00-00 00:00:00', 'A', 121, NULL, NULL, NULL, NULL, '1stTrial', 1, 3, NULL),
(6, 1, '0000-00-00 00:00:00', 'A', 121, NULL, NULL, NULL, NULL, '1stTrial', 1, 4, NULL),
(7, 1, '0000-00-00 00:00:00', 'A', 912, NULL, NULL, NULL, NULL, '2ndTrial', 2, 4, NULL),
(8, 1, '0000-00-00 00:00:00', 'A', 912, NULL, NULL, NULL, NULL, '2ndTrial', 2, 3, NULL),
(9, 1, '0000-00-00 00:00:00', 'A', 3333, NULL, NULL, NULL, NULL, '3rdTrial', 1, 2, NULL),
(10, 1, '0000-00-00 00:00:00', 'A', 3333, NULL, NULL, NULL, NULL, '3rdTrial', 1, 1, NULL),
(11, 1, '0000-00-00 00:00:00', 'A', 3333, NULL, NULL, NULL, NULL, '3rdTrial', 2, 1, NULL),
(12, 1, '0000-00-00 00:00:00', 'A', 4444, NULL, NULL, NULL, NULL, '4thTrial', 2, 2, NULL),
(13, 1, '0000-00-00 00:00:00', 'A', 4444, NULL, NULL, NULL, NULL, '4thTrial', 1, 3, NULL),
(14, 1, '0000-00-00 00:00:00', 'A', 5555, NULL, NULL, NULL, NULL, '5thTrial', 1, 4, NULL),
(15, 1, '0000-00-00 00:00:00', 'A', 666, NULL, NULL, NULL, NULL, '6thTrial', 2, 4, NULL),
(16, 1, '0000-00-00 00:00:00', 'A', 12, NULL, NULL, NULL, NULL, '7thTrial', 2, 3, NULL),
(17, 1, '0000-00-00 00:00:00', 'A', 888, NULL, NULL, NULL, NULL, '8thTrial', 1, 2, NULL),
(18, 1, '0000-00-00 00:00:00', 'A', 999, NULL, NULL, NULL, NULL, '9thTrial', 1, 1, NULL),
(19, 1, '0000-00-00 00:00:00', 'A', 1010, NULL, NULL, NULL, NULL, '10thTrial', 2, 4, NULL),
(20, 1, '0000-00-00 00:00:00', 'A', 1010, NULL, NULL, NULL, NULL, '10thTrial', 2, 3, NULL),
(21, 1, '0000-00-00 00:00:00', 'A', 101011, NULL, NULL, NULL, NULL, '11thTrial', 1, 2, NULL),
(22, 1, '0000-00-00 00:00:00', 'A', 1212, NULL, NULL, NULL, NULL, '12thTrial', 1, 4, NULL),
(23, 1, '0000-00-00 00:00:00', 'A', 1313, NULL, NULL, NULL, NULL, '13thTrial', 2, 3, NULL),
(24, 1, '0000-00-00 00:00:00', 'A', 1313, NULL, NULL, NULL, NULL, '13thTrial', 2, 2, NULL),
(25, 1, '0000-00-00 00:00:00', 'A', 14, NULL, NULL, NULL, NULL, '14thTrial', 1, 1, NULL),
(26, 1, '0000-00-00 00:00:00', 'A', 15, NULL, NULL, NULL, NULL, '15thTrial', 0, NULL, NULL),
(27, NULL, '0000-00-00 00:00:00', 'A', 1616, NULL, NULL, NULL, NULL, '16thTrial', 0, NULL, NULL),
(28, NULL, '0000-00-00 00:00:00', 'A', 1717, NULL, NULL, NULL, NULL, '17thTrial', 0, NULL, NULL),
(29, NULL, '0000-00-00 00:00:00', 'A', 0, NULL, NULL, NULL, NULL, '', 0, NULL, NULL),
(30, NULL, '0000-00-00 00:00:00', 'A', 0, NULL, NULL, NULL, NULL, '', 0, NULL, NULL),
(31, NULL, '0000-00-00 00:00:00', 'A', 0, NULL, NULL, NULL, NULL, '', 0, NULL, NULL),
(32, NULL, '0000-00-00 00:00:00', 'A', 1, NULL, NULL, NULL, 'Lyle1', 'Lyle1', 1, 1, NULL),
(33, NULL, '0000-00-00 00:00:00', 'A', NULL, NULL, NULL, NULL, 'Project 1', 'Project 1', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `duration`
--

CREATE TABLE IF NOT EXISTS `duration` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `mode_ID` int(11) DEFAULT NULL,
  `admin_office_ID` int(11) DEFAULT NULL,
  `duration` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `end_user`
--

CREATE TABLE IF NOT EXISTS `end_user` (
  `end_user_ID` int(11) NOT NULL AUTO_INCREMENT,
  `end_user_name` varchar(20) DEFAULT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `college_ID` int(11) DEFAULT NULL,
  `department_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`end_user_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `end_user`
--

INSERT INTO `end_user` (`end_user_ID`, `end_user_name`, `user_ID`, `college_ID`, `department_ID`) VALUES
(1, 'Vargas', 6, 1, 1),
(2, 'Villalobos', 7, 2, 4),
(3, 'Renegado', 8, 1, 1),
(4, 'Garcia', 9, 1, 1),
(5, 'Dela Cruz', 10, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fixed_route`
--

CREATE TABLE IF NOT EXISTS `fixed_route` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `mode_ID` int(11) DEFAULT NULL,
  `sequence` int(11) DEFAULT NULL,
  `admin_office_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `fixed_route`
--

INSERT INTO `fixed_route` (`ID`, `mode_ID`, `sequence`, `admin_office_ID`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 2),
(3, 1, 3, 6),
(4, 1, 4, 3),
(5, 1, 5, 7),
(6, 2, 1, 1),
(7, 2, 2, 2),
(8, 2, 3, 6),
(9, 2, 4, 3),
(10, 2, 5, 7);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `location_ID` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `scanner_no` varchar(20) DEFAULT NULL,
  `admin_user_ID` int(11) DEFAULT NULL,
  `PR_No` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`location_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mode_of_procurement`
--

CREATE TABLE IF NOT EXISTS `mode_of_procurement` (
  `mode_ID` int(11) NOT NULL AUTO_INCREMENT,
  `mode_of_procurement` varchar(20) DEFAULT NULL,
  `process` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`mode_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mode_of_procurement`
--

INSERT INTO `mode_of_procurement` (`mode_ID`, `mode_of_procurement`, `process`) VALUES
(0, 'none', NULL),
(1, 'Small Value Shopping', NULL),
(2, 'Negotiated', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `remarks`
--

CREATE TABLE IF NOT EXISTS `remarks` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PR_No` int(11) DEFAULT NULL,
  `remarks` varchar(50) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `admin_user_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `remarks`
--

INSERT INTO `remarks` (`ID`, `PR_No`, `remarks`, `date_added`, `admin_user_ID`) VALUES
(1, 1, 'trial1', '0000-00-00 00:00:00', 1),
(2, 1, 'trial11', '0000-00-00 00:00:00', 1),
(3, 1, 'new', '2019-01-09 16:20:38', 1),
(4, 1, 'new 2', '2019-01-09 16:21:25', 2),
(5, 3, 'hey', '2019-01-10 01:29:44', 1),
(6, 3, 'sfdf', '2019-01-10 01:29:57', 1),
(7, 1, 'new', '2019-01-10 01:53:53', 1),
(8, 1, '123', '2019-01-10 01:55:50', 1),
(9, 1, '123', '2019-01-10 01:56:41', 1),
(10, 1, 'new', '2019-01-10 02:45:33', 1),
(11, 1, 'maya', '2019-01-10 02:47:52', 1),
(12, 3, 'hey', '2019-01-10 02:57:51', 1),
(13, 3, '4', '2019-01-10 02:58:14', 1),
(14, 4, 'madz', '2019-01-10 05:32:08', 1),
(15, 1, '1', '2019-01-13 17:02:33', 1),
(16, 1, '1', '2019-01-13 17:03:16', 1),
(17, 1, '1', '2019-01-14 06:30:30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `route_per_scanned`
--

CREATE TABLE IF NOT EXISTS `route_per_scanned` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PR_No` int(11) DEFAULT NULL,
  `admin_office_ID` int(11) DEFAULT NULL,
  `admin_user_ID` varchar(30) DEFAULT NULL,
  `status_if_scanned` varchar(10) DEFAULT 'NS',
  `date_scanned` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `route_per_scanned`
--

INSERT INTO `route_per_scanned` (`ID`, `PR_No`, `admin_office_ID`, `admin_user_ID`, `status_if_scanned`, `date_scanned`) VALUES
(1, 1, 1, '1', 'NS', '2019-01-07 07:54:00'),
(2, 1, 2, NULL, 'NS', '0000-00-00 00:00:00'),
(3, 1, 6, NULL, 'NS', '0000-00-00 00:00:00'),
(4, 1, 3, NULL, 'NS', '0000-00-00 00:00:00'),
(5, 1, 7, NULL, 'NS', '0000-00-00 00:00:00'),
(6, 2, 1, '1', 'NS', '2019-01-07 07:59:10'),
(7, 2, 2, NULL, 'NS', '0000-00-00 00:00:00'),
(8, 2, 6, NULL, 'NS', '0000-00-00 00:00:00'),
(9, 2, 3, NULL, 'NS', '0000-00-00 00:00:00'),
(10, 2, 7, NULL, 'NS', '0000-00-00 00:00:00'),
(11, 3, 1, '1', 'NS', '2019-01-10 07:59:57'),
(12, 3, 2, NULL, 'NS', '0000-00-00 00:00:00'),
(13, 3, 6, NULL, 'NS', '0000-00-00 00:00:00'),
(14, 3, 3, NULL, 'NS', '0000-00-00 00:00:00'),
(15, 3, 7, NULL, 'NS', '0000-00-00 00:00:00'),
(16, 4, 1, '1', 'NS', '2019-01-10 08:02:41'),
(17, 4, 2, NULL, 'NS', '0000-00-00 00:00:00'),
(18, 4, 6, NULL, 'NS', '0000-00-00 00:00:00'),
(19, 4, 3, NULL, 'NS', '0000-00-00 00:00:00'),
(20, 4, 7, NULL, 'NS', '0000-00-00 00:00:00'),
(25, 32, 1, NULL, 'NS', NULL),
(26, 32, 2, NULL, 'NS', NULL),
(27, 32, 6, NULL, 'NS', NULL),
(28, 32, 3, NULL, 'NS', NULL),
(29, 32, 7, NULL, 'NS', NULL),
(33, 33, 1, NULL, 'NS', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `user_type_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_ID`, `username`, `password`, `user_type_ID`) VALUES
(1, 'BAC1', '123', 1),
(2, 'PROC1', '123', 1),
(3, 'BAC2', '123', 1),
(4, 'OP1', '123', 1),
(5, 'BDGT1', '123', 1),
(6, 'EUSER1', '321', 2),
(7, 'EUSER2', '321', 2),
(8, 'EUSER3', '321', 2),
(9, 'EUSER4', '321', 2),
(10, 'EUSER5', '321', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `user_type_ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_type_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`user_type_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_type_ID`, `user_type_name`) VALUES
(1, 'Admin'),
(2, 'End user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

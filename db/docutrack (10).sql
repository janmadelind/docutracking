-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 28, 2019 at 05:49 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`admin_user_ID`, `admin_user_name`, `user_ID`, `admin_office_ID`) VALUES
(1, 'Sotelo', 1, 1),
(2, 'Aggabao', 2, 2),
(3, 'Amador', 3, 1),
(4, 'TUP PRES', 4, 3),
(5, 'Head of Budgt', 5, 4),
(6, 'President', 11, 3);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

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
(11, 'biddertrial', 123, 'l'),
(12, 'Madelind', 123, 'madz@gmail.com'),
(13, 'madz', 123, 'admin@admin.com'),
(14, 'docu', 123, 'docu@gmail.com'),
(15, 'docu', 123, 'docu@gmail.com'),
(16, 'docu1', 123, 'docu@gmail.com'),
(17, 'lyle', 0, 'lyle'),
(18, 'lyle', 0, 'lyle'),
(19, '', 0, '');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `department_name` varchar(50) DEFAULT NULL,
  `college_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`department_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_ID`, `department_name`, `college_ID`) VALUES
(1, 'Mathematics', 1),
(2, 'Physics', 1),
(3, 'Chemistry', 1),
(4, 'Social Science', 2),
(5, 'English', 2),
(6, 'Filipino', 2),
(7, 'Physical Education', 2),
(8, 'Mechanical Engineering', 5),
(9, 'Electical Engineering', 5),
(10, 'Civil Engineering', 5),
(11, 'Electronics Engineering', 5),
(12, 'Civil Engineering Technology', 4),
(13, 'Electrical Engineering Technology', 4),
(14, 'Electronics Engineering Technology', 4),
(15, 'Food And Apparel Technology', 4),
(16, 'Graphic Arts And Printing Technology', 4),
(17, 'Mechanical Engineering Technology', 4),
(18, 'Power Plant Engineering Technology', 4),
(19, 'Basic Industrial Technology', 4),
(20, 'Technical Arts', 3),
(21, 'Home Economics', 3),
(22, 'Professional Industrial Education', 3),
(23, 'Student Teaching', 3),
(24, 'Fine Arts', 6),
(25, 'Graphics', 6),
(26, 'Architecture', 2);

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `PR_No` int(11) NOT NULL AUTO_INCREMENT,
  `ref_no` int(11) DEFAULT NULL,
  `date_submitted` datetime DEFAULT NULL,
  `status` varchar(10) DEFAULT 'pending',
  `amount` float DEFAULT NULL,
  `awards` varchar(50) DEFAULT NULL,
  `resolution` varchar(50) DEFAULT NULL,
  `proj_name` varchar(50) DEFAULT NULL,
  `proj_description` text,
  `mode_ID` int(11) DEFAULT '0',
  `type_ID` int(11) DEFAULT '0',
  `end_user_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`PR_No`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`PR_No`, `ref_no`, `date_submitted`, `status`, `amount`, `awards`, `resolution`, `proj_name`, `proj_description`, `mode_ID`, `type_ID`, `end_user_ID`) VALUES
(1, NULL, '2019-01-26 12:49:11', 'approved', NULL, NULL, NULL, 'Trial1', 'Trial1', 1, 1, 1),
(2, NULL, '2019-01-26 13:30:30', 'approved', NULL, NULL, NULL, 'Trial2', 'Trial2', 1, 3, 1),
(3, NULL, '2019-01-26 13:33:17', 'pending', NULL, NULL, NULL, 'Trial3', 'Trial3', 0, 0, 1),
(4, NULL, '2019-01-26 13:41:10', 'pending', NULL, NULL, NULL, 'Trial4', 'Trial4', 0, 0, 1),
(5, NULL, '2019-01-26 13:41:31', 'pending', NULL, NULL, NULL, 'Trial5', 'Trial5', 0, 0, 1),
(6, NULL, '2019-01-26 13:53:32', 'pending', NULL, NULL, NULL, 'Trial6', 'Trial6', 0, 0, 1),
(7, NULL, '2019-01-26 13:53:49', 'pending', NULL, NULL, NULL, 'Trial7', 'Trial7', 0, 0, 1),
(8, NULL, '2019-01-26 13:54:23', 'pending', NULL, NULL, NULL, 'Trial8', 'Trial8', 0, 0, 1);

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
  `type_ID` int(11) DEFAULT NULL,
  `sequence` int(11) DEFAULT NULL,
  `admin_office_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `fixed_route`
--

INSERT INTO `fixed_route` (`ID`, `mode_ID`, `type_ID`, `sequence`, `admin_office_ID`) VALUES
(1, 1, 3, 1, 1),
(2, 1, 3, 2, 2),
(3, 1, 3, 3, 6),
(4, 1, 3, 4, 3),
(5, 1, 3, 5, 7),
(6, 1, 4, 1, 1),
(7, 1, 4, 2, 2),
(8, 1, 4, 3, 6),
(9, 1, 4, 4, 3),
(10, 1, 4, 5, 7),
(11, 1, 1, 1, 1),
(12, 1, 1, 2, 3),
(13, 1, 1, 3, 6),
(14, 1, 2, 1, 1),
(15, 1, 2, 2, 3),
(16, 1, 2, 3, 6),
(17, 2, 1, 1, 1),
(18, 2, 1, 2, 3),
(19, 2, 1, 3, 6),
(20, 2, 2, 1, 1),
(21, 2, 2, 2, 3),
(22, 2, 2, 3, 6),
(23, 2, 3, 1, 1),
(24, 2, 3, 2, 2),
(25, 2, 3, 3, 6),
(26, 2, 3, 4, 3),
(27, 2, 3, 5, 7),
(28, 2, 4, 1, 1),
(29, 2, 4, 2, 2),
(30, 2, 4, 3, 6),
(31, 2, 4, 4, 3),
(32, 2, 4, 5, 7);

-- --------------------------------------------------------

--
-- Table structure for table `mode_of_procurement`
--

CREATE TABLE IF NOT EXISTS `mode_of_procurement` (
  `mode_ID` int(11) NOT NULL AUTO_INCREMENT,
  `mode_of_procurement` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`mode_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mode_of_procurement`
--

INSERT INTO `mode_of_procurement` (`mode_ID`, `mode_of_procurement`) VALUES
(1, 'Small Value Shopping'),
(2, 'Negotiated Procurement');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PR_No` int(11) DEFAULT NULL,
  `message_subject` varchar(200) DEFAULT NULL,
  `message_description` varchar(200) DEFAULT NULL,
  `status` varchar(5) DEFAULT 'NS',
  `created_at` datetime DEFAULT NULL,
  `admin_office_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`ID`, `PR_No`, `message_subject`, `message_description`, `status`, `created_at`, `admin_office_ID`) VALUES
(1, 2, 'Wrong Sequence', 'PR 2 did not went to BAC office', 'NS', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `remarks`
--

CREATE TABLE IF NOT EXISTS `remarks` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PR_No` int(11) DEFAULT NULL,
  `remarks` text,
  `date_added` datetime DEFAULT NULL,
  `admin_user_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `route_per_scanned`
--

CREATE TABLE IF NOT EXISTS `route_per_scanned` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PR_No` int(11) DEFAULT NULL,
  `admin_office_ID` int(11) DEFAULT NULL,
  `admin_user_ID` int(11) DEFAULT NULL,
  `status_if_scanned` varchar(10) DEFAULT 'NS',
  `date_scanned` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `route_per_scanned`
--

INSERT INTO `route_per_scanned` (`ID`, `PR_No`, `admin_office_ID`, `admin_user_ID`, `status_if_scanned`, `date_scanned`) VALUES
(1, 1, 1, NULL, 'NS', NULL),
(3, 3, 1, NULL, 'NS', NULL),
(4, 4, 1, NULL, 'NS', NULL),
(5, 5, 1, NULL, 'NS', NULL),
(6, 6, 1, NULL, 'NS', NULL),
(7, 7, 1, NULL, 'NS', NULL),
(8, 8, 1, NULL, 'NS', NULL),
(9, 1, 1, NULL, 'NS', NULL),
(10, 1, 3, NULL, 'NS', NULL),
(11, 1, 1, NULL, 'NS', NULL),
(12, 2, 1, 1, 'NS', '2019-01-27 06:54:47'),
(13, 2, 2, NULL, 'NS', NULL),
(14, 2, 6, 1, 'NS', '2019-01-27 06:54:47'),
(15, 2, 3, NULL, 'NS', NULL),
(16, 2, 7, NULL, 'NS', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `type_of_pr`
--

CREATE TABLE IF NOT EXISTS `type_of_pr` (
  `type_ID` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`type_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `type_of_pr`
--

INSERT INTO `type_of_pr` (`type_ID`, `type_name`) VALUES
(1, 'food'),
(2, 'lease of venue'),
(3, 'supplies and materials'),
(4, 'equipment');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

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
(10, 'EUSER5', '321', 2),
(11, 'OP2', '123', 1);

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

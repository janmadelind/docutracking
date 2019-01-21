-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 27, 2018 at 09:18 AM
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
  `scanner_no` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`admin_office_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `admin_office`
--

INSERT INTO `admin_office` (`admin_office_ID`, `admin_office_name`, `scanner_no`) VALUES
(1, 'BAC', '1'),
(2, 'Procurement Office', '2'),
(3, 'Office of the President', '3'),
(4, 'Budget', '4'),
(5, 'Accounting', '5');

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
(1, 'Sotello', 1, 1),
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
  `date_attached` date DEFAULT NULL,
  PRIMARY KEY (`file_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `attached_files`
--

INSERT INTO `attached_files` (`file_ID`, `PR_No`, `file_name`, `date_attached`) VALUES
(1, 1, 'doc1', NULL),
(2, 1, 'pdf1', NULL),
(3, 1, 'doc2', NULL),
(4, 2, 'doc3', NULL),
(5, 3, 'doc4', NULL),
(6, 4, 'doc5', NULL),
(7, 2, 'ppt1', NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `bidders`
--

INSERT INTO `bidders` (`bidders_ID`, `bidders_name`, `contact_no`, `email`) VALUES
(1, 'bidder1', 12345, 'bid1@gmail.com'),
(2, 'bidder2', 12344, 'bid2@gmail.com'),
(3, 'bidder3', 123, NULL),
(4, 'bidder4', 111, NULL),
(5, 'bidder5', 222, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bidder_transaction`
--

CREATE TABLE IF NOT EXISTS `bidder_transaction` (
  `transaction_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PR_No` int(11) DEFAULT NULL,
  `bidders_ID` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`transaction_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `bidder_transaction`
--

INSERT INTO `bidder_transaction` (`transaction_ID`, `PR_No`, `bidders_ID`, `amount`, `status`) VALUES
(1, 1, 1, 100000, 'W'),
(2, 2, 2, 123, NULL),
(3, 3, 3, 3, ''),
(4, 4, 1, 123, NULL),
(5, 2, 4, NULL, NULL),
(6, 2, 3, NULL, NULL),
(7, 1, 2, NULL, NULL),
(8, 1, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE IF NOT EXISTS `colleges` (
  `college_ID` int(11) NOT NULL AUTO_INCREMENT,
  `college_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`college_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`college_ID`, `college_name`) VALUES
(1, 'COS'),
(2, 'CLA'),
(3, 'CIE'),
(4, 'CIT'),
(5, 'COE'),
(6, 'CIT');

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
  `date_submitted` date DEFAULT NULL,
  `status` varchar(10) DEFAULT 'A',
  `amount` float DEFAULT NULL,
  `remarks` varchar(50) DEFAULT NULL,
  `awards` varchar(50) DEFAULT NULL,
  `resolution` varchar(50) DEFAULT NULL,
  `proj_description` varchar(50) DEFAULT NULL,
  `mode_ID` int(11) DEFAULT NULL,
  `end_user_ID` int(11) DEFAULT NULL,
  `cur_loc` varchar(50) DEFAULT NULL,
  `QR_code` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`PR_No`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`PR_No`, `ref_no`, `date_submitted`, `status`, `amount`, `remarks`, `awards`, `resolution`, `proj_description`, `mode_ID`, `end_user_ID`, `cur_loc`, `QR_code`) VALUES
(1, 1, '0000-00-00', 'A', 1000, '1', '1', '1', 'trial1', 1, 1, '1', '1'),
(2, 2, '0000-00-00', 'A', 2000, '1', '1', '1', 'trial2', 1, 1, NULL, NULL),
(3, 3, '0000-00-00', 'A', 3000.09, '1', '1', '1', 'trial3', 2, 1, NULL, NULL),
(4, 4, '0000-00-00', 'A', 40, '1', '1', '1', 'trial4', 2, 2, NULL, NULL),
(5, 5, '0000-00-00', 'A', NULL, '1', NULL, NULL, NULL, 1, 3, NULL, NULL),
(6, 6, '0000-00-00', 'A', NULL, '1', NULL, NULL, NULL, 1, 4, NULL, NULL),
(7, 7, '0000-00-00', 'A', NULL, '1', NULL, NULL, NULL, 2, 2, NULL, NULL),
(8, 8, '0000-00-00', 'A', NULL, '1', NULL, NULL, NULL, 2, 3, NULL, NULL),
(9, NULL, NULL, 'A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, NULL, NULL, 'A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `fixed_route`
--

INSERT INTO `fixed_route` (`ID`, `mode_ID`, `sequence`, `admin_office_ID`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 2),
(3, 1, 3, 3),
(4, 2, 1, 1),
(5, 2, 2, 2),
(6, 2, 3, 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mode_of_procurement`
--

INSERT INTO `mode_of_procurement` (`mode_ID`, `mode_of_procurement`, `process`) VALUES
(1, 'Small Value Shopping', NULL),
(2, 'Negotiated', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `route_per_scanned`
--

CREATE TABLE IF NOT EXISTS `route_per_scanned` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PR_No` int(11) DEFAULT NULL,
  `admin_office_ID` int(11) DEFAULT NULL,
  `status_if_scanned` varchar(10) DEFAULT 'NS',
  `date_scanned` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `route_per_scanned`
--

INSERT INTO `route_per_scanned` (`ID`, `PR_No`, `admin_office_ID`, `status_if_scanned`, `date_scanned`) VALUES
(1, 2, 1, 'S', '0000-00-00 00:00:00'),
(2, 2, 2, 'S', '0000-00-00 00:00:00'),
(3, 2, 3, 'S', '0000-00-00 00:00:00'),
(4, 1, 1, 'S', '0000-00-00 00:00:00'),
(5, 1, 2, 'S', '0000-00-00 00:00:00'),
(6, 1, 3, 'NS', '0000-00-00 00:00:00'),
(7, 3, 1, 'S', '0000-00-00 00:00:00'),
(8, 3, 2, 'NS', NULL),
(9, 3, 3, 'NS', NULL),
(10, 6, 1, 'S', NULL),
(11, 6, 2, 'NS', NULL),
(12, 6, 3, 'NS', NULL),
(13, 5, 1, 'S', NULL),
(14, 5, 2, 'NS', NULL),
(15, 5, 3, 'NS', NULL);

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

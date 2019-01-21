-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 27, 2018 at 04:59 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `admin_office`
--

INSERT INTO `admin_office` (`admin_office_ID`, `admin_office_name`) VALUES
(1, 'BAC'),
(2, 'Procurement Office'),
(3, 'Office of the President'),
(4, 'Budget'),
(5, 'Accounting');

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
-- Table structure for table `attached files`
--

CREATE TABLE IF NOT EXISTS `attached files` (
  `file_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PR_No` int(11) DEFAULT NULL,
  `file_name` varchar(50) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_ID`, `department_name`, `college_ID`) VALUES
(1, 'Math Dept', 1),
(2, 'Physics', 1),
(3, 'Chemistry', 1),
(4, 'SS', 2),
(5, 'English', 2),
(6, 'Filipino', 2);

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `PR_No` int(11) NOT NULL AUTO_INCREMENT,
  `ref_no` int(11) DEFAULT NULL,
  `date_submitted` date DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `remarks` varchar(50) DEFAULT NULL,
  `awards` varchar(50) DEFAULT NULL,
  `resolution` varchar(50) DEFAULT NULL,
  `proj_description` varchar(50) DEFAULT NULL,
  `mode_ID` int(11) DEFAULT NULL,
  `end_user_ID` int(11) DEFAULT NULL,
  `location_ID` int(11) DEFAULT NULL,
  `QR_code` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`PR_No`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`PR_No`, `ref_no`, `date_submitted`, `status`, `amount`, `remarks`, `awards`, `resolution`, `proj_description`, `mode_ID`, `end_user_ID`, `location_ID`, `QR_code`) VALUES
(1, 1, '0000-00-00', '1', 1, '1', '1', '1', '1', 1, 1, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `end_user`
--

CREATE TABLE IF NOT EXISTS `end_user` (
  `end_user_ID` int(11) NOT NULL AUTO_INCREMENT,
  `end_user_name` varchar(20) DEFAULT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `college_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`end_user_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `location_ID` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `admin_user_ID` int(11) DEFAULT NULL,
  `PR_No` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`location_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mode of procuremnet`
--

CREATE TABLE IF NOT EXISTS `mode of procuremnet` (
  `mode_ID` int(11) NOT NULL AUTO_INCREMENT,
  `mode_of_procurement` varchar(20) DEFAULT NULL,
  `process` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`mode_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_ID`, `username`, `password`, `user_type_ID`) VALUES
(1, 'BAC1', '123', 1),
(2, 'PROC1', '123', 1),
(3, 'BAC2', '123', 1),
(4, 'OP1', '321', 1),
(5, 'BDGT1', '321', 1);

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

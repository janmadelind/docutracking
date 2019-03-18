-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2019 at 04:52 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `docutrack`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_office`
--

CREATE TABLE `admin_office` (
  `admin_office_ID` int(11) NOT NULL,
  `admin_office_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_office`
--

INSERT INTO `admin_office` (`admin_office_ID`, `admin_office_name`) VALUES
(1, 'Bids and Awards Committee'),
(2, 'Procurement Office'),
(3, 'Office Of The President'),
(4, 'Bids and Awards Committee(for signature)'),
(5, 'Procurement Office'),
(6, 'ICO'),
(7, 'Budget'),
(8, 'Accounting'),
(9, 'Cashier');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `admin_user_ID` int(11) NOT NULL,
  `admin_user_name` varchar(50) DEFAULT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `admin_office_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`admin_user_ID`, `admin_user_name`, `user_ID`, `admin_office_ID`) VALUES
(1, 'Sotelo', 1, 1),
(2, 'Aggabao', 2, 2),
(3, 'Amador', 3, 1),
(4, 'Dr. Jesus', 4, 3),
(5, 'Head of Budgt', 5, 4),
(6, 'President', 11, 3),
(7, 'ICO', 17, 6),
(8, 'Budget Office Member', 18, 7),
(9, 'Accounting Ofiice Member', 19, 8),
(10, 'Cashier Accountant', 20, 9);

-- --------------------------------------------------------

--
-- Table structure for table `attached_files`
--

CREATE TABLE `attached_files` (
  `file_ID` int(11) NOT NULL,
  `PR_No` int(11) DEFAULT NULL,
  `file_name` varchar(50) DEFAULT NULL,
  `admin_office_ID` int(11) DEFAULT NULL,
  `admin_user_ID` int(11) DEFAULT NULL,
  `date_attached` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attached_files`
--

INSERT INTO `attached_files` (`file_ID`, `PR_No`, `file_name`, `admin_office_ID`, `admin_user_ID`, `date_attached`) VALUES
(1, 2, 'reso for pr2 file', 2, 2, '2019-02-10 03:11:22'),
(2, 2, 'reso for pr2 file', 2, 2, '2019-02-10 03:11:36'),
(3, 4, '2019-RESO', 1, 1, '2019-02-10 15:28:05'),
(4, 11, '2019-RESO-02-SVP file', 2, 2, '2019-02-11 03:43:52'),
(5, 11, '2019-RESO-award file', 2, 2, '2019-02-11 03:44:08');

-- --------------------------------------------------------

--
-- Table structure for table `bidders`
--

CREATE TABLE `bidders` (
  `bidders_ID` int(11) NOT NULL,
  `bidders_name` varchar(50) DEFAULT NULL,
  `contact_no` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidders`
--

INSERT INTO `bidders` (`bidders_ID`, `bidders_name`, `contact_no`, `email`) VALUES
(1, 'NEW', 123, '123'),
(2, 'maru', 123, '123'),
(3, 'bona', 123, '123'),
(4, 'matz', 123, '123');

-- --------------------------------------------------------

--
-- Table structure for table `bidder_transaction`
--

CREATE TABLE `bidder_transaction` (
  `transaction_ID` int(11) NOT NULL,
  `PR_No` int(11) DEFAULT NULL,
  `bidders_ID` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT 'Nominated',
  `date_added` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidder_transaction`
--

INSERT INTO `bidder_transaction` (`transaction_ID`, `PR_No`, `bidders_ID`, `amount`, `status`, `date_added`) VALUES
(1, 2, 1, 123, 'Approved', '2019-02-10 03:11:52'),
(2, 11, 2, 123, 'Approved', '2019-02-11 03:44:37'),
(3, 11, 3, 123, 'Nominated', '2019-02-11 03:44:52'),
(4, 11, 4, 123, 'Nominated', '2019-02-11 03:45:06');

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `college_ID` int(11) NOT NULL,
  `college_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`college_ID`, `college_name`) VALUES
(1, 'COS'),
(2, 'CLA'),
(3, 'CIE'),
(4, 'CIT'),
(5, 'COE'),
(6, 'CAFA');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_ID` int(11) NOT NULL,
  `department_name` varchar(50) DEFAULT NULL,
  `college_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(26, 'Architecture', 6);

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `PR_No` int(11) NOT NULL,
  `ref_no` int(11) DEFAULT NULL,
  `date_submitted` datetime DEFAULT NULL,
  `status` varchar(20) DEFAULT 'pending',
  `amount` float DEFAULT NULL,
  `bidders_ID` int(11) DEFAULT NULL,
  `proj_description` text,
  `mode_ID` int(11) DEFAULT '0',
  `type_ID` int(11) DEFAULT '0',
  `end_user_ID` int(11) DEFAULT NULL,
  `proj_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`PR_No`, `ref_no`, `date_submitted`, `status`, `amount`, `bidders_ID`, `proj_description`, `mode_ID`, `type_ID`, `end_user_ID`, `proj_name`) VALUES
(1, NULL, '2019-02-10 00:17:08', 'pending', 0, NULL, '', 1, 2, 1, NULL),
(2, NULL, '2019-02-10 00:17:17', 'to be returned', 0, NULL, '', 1, 4, 1, NULL),
(3, NULL, '2019-02-10 00:17:29', 'pending', 0, NULL, '', 1, 3, 1, NULL),
(4, NULL, '2019-02-10 00:17:39', 'pending', 0, 1, '', 1, 1, 1, NULL),
(5, NULL, '2019-02-11 02:17:57', 'pending', 0, NULL, '', 0, 0, 1, NULL),
(6, NULL, '2019-02-11 02:37:52', 'pending', 0, NULL, 'for cos', 1, 3, 1, NULL),
(7, NULL, '2019-02-11 02:47:18', 'pending', 0, NULL, 'for cos', 0, 0, 1, NULL),
(8, NULL, '2019-02-11 03:00:33', 'pending', 0, NULL, '', 0, 0, 1, NULL),
(9, NULL, '2019-02-11 03:08:39', 'pending', 0, NULL, 'trial for total', 0, 0, 1, NULL),
(10, NULL, '2019-02-11 03:37:25', 'pending', 0, NULL, '', 0, 0, 1, NULL),
(11, NULL, '2019-02-11 03:39:34', 'Approved', 0, 2, '  For YOU', 1, 3, 1, NULL),
(12, NULL, '2019-02-11 04:33:57', 'pending', 0, NULL, ' for cos cos', 1, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `end_user`
--

CREATE TABLE `end_user` (
  `end_user_ID` int(11) NOT NULL,
  `end_user_name` varchar(20) DEFAULT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `college_ID` int(11) DEFAULT NULL,
  `department_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `end_user`
--

INSERT INTO `end_user` (`end_user_ID`, `end_user_name`, `user_ID`, `college_ID`, `department_ID`) VALUES
(1, 'Vargas', 6, 1, 1),
(2, 'Villalobos', 7, 2, 4),
(3, 'Renegado', 8, 1, 1),
(4, 'Garcia', 9, 1, 1),
(5, 'Dela Cruz', 10, 1, 1),
(6, 'CIE1', 12, 3, 20),
(7, 'CAFA1', 13, 6, 26),
(8, 'CIT1', 14, 4, 18),
(9, 'COE1', 15, 5, 8),
(10, 'COE2', 16, 5, 9);

-- --------------------------------------------------------

--
-- Table structure for table `eu_seen_notif`
--

CREATE TABLE `eu_seen_notif` (
  `ID` int(11) NOT NULL,
  `notif_ID` int(11) DEFAULT NULL,
  `department_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eu_seen_notif`
--

INSERT INTO `eu_seen_notif` (`ID`, `notif_ID`, `department_ID`) VALUES
(1, 0, 0),
(2, 6, 1),
(3, 7, 1),
(4, 8, 1),
(5, 9, 1),
(6, 10, 1),
(7, 11, 1),
(8, 12, 1),
(9, 13, 1),
(10, 14, 1),
(11, 15, 1),
(12, 16, 1),
(13, 17, 1),
(14, 18, 1),
(15, 19, 1),
(16, 20, 1),
(17, 21, 1),
(18, 22, 1),
(19, 23, 1),
(20, 24, 1),
(21, 25, 1),
(22, 26, 1),
(23, 27, 1),
(24, 28, 1),
(25, 29, 1),
(26, 30, 1),
(27, 31, 1),
(28, 32, 1),
(29, 33, 1),
(30, 34, 1),
(31, 35, 1),
(32, 36, 1),
(33, 37, 1),
(34, 38, 1),
(35, 39, 1),
(36, 40, 1),
(37, 41, 1),
(38, 42, 1),
(39, 43, 1),
(40, 44, 1),
(41, 46, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fixed_route`
--

CREATE TABLE `fixed_route` (
  `ID` int(11) NOT NULL,
  `mode_ID` int(11) DEFAULT NULL,
  `type_ID` int(11) DEFAULT NULL,
  `sequence` int(11) DEFAULT NULL,
  `admin_office_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fixed_route`
--

INSERT INTO `fixed_route` (`ID`, `mode_ID`, `type_ID`, `sequence`, `admin_office_ID`) VALUES
(1, 1, 3, 1, 1),
(2, 1, 3, 2, 2),
(3, 1, 3, 3, 4),
(4, 1, 3, 4, 6),
(5, 1, 3, 5, 3),
(6, 1, 3, 6, 5),
(7, 1, 3, 7, 7),
(8, 1, 3, 8, 8),
(9, 1, 3, 9, 9),
(10, 1, 4, 1, 1),
(11, 1, 4, 2, 2),
(12, 1, 4, 3, 4),
(13, 1, 4, 4, 6),
(14, 1, 4, 5, 3),
(15, 1, 4, 6, 5),
(16, 1, 4, 7, 7),
(17, 1, 4, 8, 8),
(18, 1, 4, 9, 9),
(25, 1, 1, 1, 1),
(26, 1, 1, 2, 6),
(27, 1, 1, 3, 3),
(28, 1, 1, 4, 4),
(29, 1, 1, 5, 7),
(30, 1, 1, 6, 8),
(31, 1, 1, 7, 9),
(32, 3, 3, 1, 1),
(33, 3, 3, 2, 2),
(34, 3, 3, 3, 4),
(35, 3, 3, 4, 6),
(36, 3, 3, 5, 3),
(37, 3, 3, 6, 5),
(38, 3, 3, 7, 7),
(39, 3, 3, 8, 8),
(40, 3, 3, 9, 9),
(41, 3, 4, 1, 1),
(42, 3, 4, 2, 2),
(43, 3, 4, 3, 4),
(44, 3, 4, 4, 6),
(45, 3, 4, 5, 3),
(46, 3, 4, 6, 5),
(47, 3, 4, 7, 7),
(48, 3, 4, 8, 8),
(49, 3, 4, 9, 9),
(50, 3, 1, 1, 1),
(51, 3, 1, 2, 6),
(52, 3, 1, 3, 3),
(53, 3, 1, 4, 4),
(54, 3, 1, 5, 7),
(55, 3, 1, 6, 8),
(56, 3, 1, 7, 9),
(63, 4, 3, 1, 1),
(64, 4, 3, 2, 2),
(65, 4, 3, 3, 4),
(66, 4, 3, 4, 6),
(67, 4, 3, 5, 3),
(68, 4, 3, 6, 5),
(69, 4, 3, 7, 7),
(70, 4, 3, 8, 8),
(71, 4, 3, 9, 9),
(72, 4, 4, 1, 1),
(73, 4, 4, 2, 2),
(74, 4, 4, 3, 4),
(75, 4, 4, 4, 6),
(76, 4, 4, 5, 3),
(77, 4, 4, 6, 5),
(78, 4, 4, 7, 7),
(79, 4, 4, 8, 8),
(80, 4, 4, 9, 9),
(81, 4, 1, 1, 1),
(82, 4, 1, 2, 6),
(83, 4, 1, 3, 3),
(84, 4, 1, 4, 4),
(85, 4, 1, 5, 7),
(86, 4, 1, 6, 8),
(87, 4, 1, 7, 9),
(94, 2, 0, 1, 1),
(95, 2, 0, 2, 2),
(96, 2, 0, 3, 4),
(97, 2, 0, 4, 6),
(98, 2, 0, 5, 3),
(99, 2, 0, 6, 5),
(100, 2, 0, 7, 7),
(101, 2, 0, 8, 8),
(102, 2, 0, 9, 9);

-- --------------------------------------------------------

--
-- Table structure for table `mode_of_procurement`
--

CREATE TABLE `mode_of_procurement` (
  `mode_ID` int(11) NOT NULL,
  `mode_of_procurement` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mode_of_procurement`
--

INSERT INTO `mode_of_procurement` (`mode_ID`, `mode_of_procurement`) VALUES
(1, 'Small Value Procurement'),
(2, 'Negotiated Procurement'),
(3, 'Shopping'),
(4, 'Direct Contracting');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notif_ID` int(11) NOT NULL,
  `PR_No` int(11) DEFAULT NULL,
  `message_subject` varchar(200) DEFAULT NULL,
  `message_description` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `admin_office_ID` int(11) DEFAULT '0',
  `department_ID` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notif_ID`, `PR_No`, `message_subject`, `message_description`, `created_at`, `admin_office_ID`, `department_ID`) VALUES
(6, 4, 'Status Change', 'PR4 of Mathematics', '2019-02-10 02:13:19', 0, 1),
(7, 4, 'Status Change', 'PR4 of Mathematics', '2019-02-10 02:13:26', 0, 1),
(8, 4, 'Status Change', 'PR4 of Mathematics', '2019-02-10 02:15:44', 0, 1),
(9, 4, 'Status Change', 'PR4 of Mathematics', '2019-02-10 02:48:52', 0, 1),
(10, 4, 'Status Change', 'PR4 of Mathematics', '2019-02-10 02:49:06', 0, 1),
(11, 4, 'Status Change', 'PR4 of Mathematics', '2019-02-10 02:49:13', 0, 1),
(12, 4, 'Status Change', 'PR4 of Mathematics', '2019-02-10 02:52:35', 0, 1),
(13, 4, 'Status Change', 'PR4 of Mathematics', '2019-02-10 02:52:48', 0, 1),
(14, 4, 'Status Change', 'PR4 of Mathematics', '2019-02-10 02:53:12', 0, 1),
(15, 4, 'Status Change', 'PR4 of Mathematics', '2019-02-10 02:53:46', 0, 1),
(16, 4, 'Status Change', 'PR4 of Mathematics', '2019-02-10 02:54:20', 0, 1),
(17, 4, 'Status Change', 'PR4 of Mathematics', '2019-02-10 02:54:30', 0, 1),
(18, 4, 'Status Change', 'PR4 of Mathematics', '2019-02-10 02:54:43', 0, 1),
(19, 4, 'Status Change', 'PR4 of Mathematics', '2019-02-10 02:56:45', 0, 1),
(20, 4, 'Status Change', 'PR4 of Mathematics', '2019-02-10 02:58:14', 0, 1),
(21, 4, 'Status Change', 'PR4 of Mathematics', '2019-02-10 02:58:14', 0, 1),
(22, 4, 'Status Change', 'PR4 of Mathematics', '2019-02-10 02:58:14', 0, 1),
(23, 4, 'Status Change', 'PR4 of Mathematics', '2019-02-10 02:58:15', 0, 1),
(24, 4, 'Status Change', 'PR4 of Mathematics', '2019-02-10 02:58:15', 0, 1),
(25, 4, 'Status Change', 'PR4 of Mathematics', '2019-02-10 02:58:15', 0, 1),
(26, 4, 'Status Change', 'PR4 of Mathematics', '2019-02-10 02:58:15', 0, 1),
(27, 4, 'Status Change', 'PR4 of Mathematics', '2019-02-10 02:58:16', 0, 1),
(28, 4, 'Status Change', 'PR4 of Mathematics', '2019-02-10 02:58:16', 0, 1),
(29, 4, 'Status Change', 'PR4 of Mathematics', '2019-02-10 02:58:16', 0, 1),
(30, 4, 'Status Change', 'PR4 of Mathematics', '2019-02-10 02:58:16', 0, 1),
(31, 4, 'Status Change', 'PR4 of Mathematics', '2019-02-10 02:58:17', 0, 1),
(32, 4, 'Status Change', 'PR4 of Mathematics', '2019-02-10 02:58:17', 0, 1),
(33, 4, 'Status Change', 'PR4 of Mathematics', '2019-02-10 02:58:17', 0, 1),
(34, 4, 'Status Change', 'PR4 of Mathematics', '2019-02-10 02:58:17', 0, 1),
(35, 4, 'Status Change', 'PR4 of Mathematics', '2019-02-10 02:58:18', 0, 1),
(36, 4, 'Status Change', 'PR4 of Mathematics', '2019-02-10 02:58:18', 0, 1),
(37, 4, 'Status Change', 'PR4 of Mathematics', '2019-02-10 02:58:18', 0, 1),
(38, 4, 'Status Change', 'PR4 of Mathematics', '2019-02-10 02:58:18', 0, 1),
(39, 4, 'Status Change', 'PR4 of Mathematics', '2019-02-10 02:58:18', 0, 1),
(40, 4, 'Status Change', 'PR4 of Mathematics', '2019-02-10 02:59:33', 0, 1),
(41, 4, 'Status Change', 'PR4 of Mathematics', '2019-02-10 03:05:59', 0, 1),
(42, 4, 'Status Change', 'PR4 of Mathematics', '2019-02-10 03:06:17', 0, 1),
(43, 3, 'Status Change', 'PR3 of Mathematics', '2019-02-10 15:25:08', 0, 1),
(44, 2, 'Status Change', 'PR2 of Mathematics', '2019-02-10 16:13:08', 0, 1),
(45, 2, 'PR Returned', '', '2019-02-10 16:13:08', 6, 0),
(46, 0, 'Status Change', 'PR of Mathematics', '2019-02-10 16:13:08', 0, 1),
(47, 11, 'Wrong Sequence', 'PR 11 did not went to proper office', '2019-02-11 04:04:04', 6, 0),
(48, 11, 'Wrong Sequence', 'PR 11 did not went to proper office', '2019-02-11 04:04:42', 6, 0),
(49, 11, 'Wrong Sequence', 'PR 11 did not went to proper office', '2019-02-11 04:05:15', 1, 0),
(50, 11, 'Wrong Sequence', 'PR 11 did not went to proper office', '2019-02-11 04:11:11', 1, 0),
(51, 12, 'Wrong Sequence', 'PR 12 did not went to proper office', '2019-02-11 04:42:16', 1, 0),
(52, 12, 'Wrong Sequence', 'PR 12 did not went to proper office', '2019-02-11 04:42:44', 1, 0),
(53, 12, 'Wrong Sequence', 'PR 12 did not went to proper office', '2019-02-11 04:43:17', 1, 0),
(54, 12, 'Wrong Sequence', 'PR 12 did not went to proper office', '2019-02-11 04:45:17', 7, 0),
(55, 12, 'Wrong Sequence', 'PR 12 did not went to proper office', '2019-02-11 04:47:15', 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `remarks`
--

CREATE TABLE `remarks` (
  `ID` int(11) NOT NULL,
  `PR_No` int(11) DEFAULT NULL,
  `remarks` text,
  `date_added` datetime DEFAULT NULL,
  `admin_user_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `remarks`
--

INSERT INTO `remarks` (`ID`, `PR_No`, `remarks`, `date_added`, `admin_user_ID`) VALUES
(1, 1, 'added Small Value Procurement - supplies and materials', '2019-02-10 00:21:49', 1),
(2, 2, 'added Small Value Procurement - supplies and materials', '2019-02-10 00:22:43', 1),
(3, 3, 'added Small Value Procurement - supplies and materials', '2019-02-10 00:23:29', 1),
(4, 1, 'added  - ', '2019-02-10 00:25:41', 1),
(5, 2, 'added Small Value Procurement - equipment', '2019-02-10 00:27:28', 1),
(6, 4, 'added Small Value Procurement - food', '2019-02-10 00:39:55', 1),
(7, 4, 'Change status to pending', '2019-02-10 02:15:44', 7),
(8, 4, 'Change status to pending', '2019-02-10 02:48:52', 7),
(9, 4, 'Change status to pending', '2019-02-10 02:49:06', 7),
(10, 4, 'Change status to pending', '2019-02-10 02:49:13', 7),
(11, 4, 'Change status to pending', '2019-02-10 02:52:35', 7),
(12, 4, 'Change status to pending', '2019-02-10 02:52:48', 7),
(13, 4, 'Change status to pending', '2019-02-10 02:53:12', 7),
(14, 4, 'Change status to To Be Returned', '2019-02-10 02:53:46', 7),
(15, 4, 'Change status to pending', '2019-02-10 02:54:20', 7),
(16, 4, 'Change status to pending', '2019-02-10 02:54:30', 7),
(17, 4, 'Change status to pending', '2019-02-10 02:54:43', 7),
(18, 4, 'Change status to pending', '2019-02-10 02:56:45', 7),
(19, 4, 'Change status to pending', '2019-02-10 02:58:14', 7),
(20, 4, 'Change status to ', '2019-02-10 02:58:14', 7),
(21, 4, 'Change status to ', '2019-02-10 02:58:14', 7),
(22, 4, 'Change status to ', '2019-02-10 02:58:15', 7),
(23, 4, 'Change status to ', '2019-02-10 02:58:15', 7),
(24, 4, 'Change status to ', '2019-02-10 02:58:15', 7),
(25, 4, 'Change status to ', '2019-02-10 02:58:15', 7),
(26, 4, 'Change status to ', '2019-02-10 02:58:16', 7),
(27, 4, 'Change status to ', '2019-02-10 02:58:16', 7),
(28, 4, 'Change status to ', '2019-02-10 02:58:16', 7),
(29, 4, 'Change status to ', '2019-02-10 02:58:16', 7),
(30, 4, 'Change status to ', '2019-02-10 02:58:17', 7),
(31, 4, 'Change status to ', '2019-02-10 02:58:17', 7),
(32, 4, 'Change status to ', '2019-02-10 02:58:17', 7),
(33, 4, 'Change status to ', '2019-02-10 02:58:17', 7),
(34, 4, 'Change status to ', '2019-02-10 02:58:18', 7),
(35, 4, 'Change status to ', '2019-02-10 02:58:18', 7),
(36, 4, 'Change status to ', '2019-02-10 02:58:18', 7),
(37, 4, 'Change status to ', '2019-02-10 02:58:18', 7),
(38, 4, 'Change status to ', '2019-02-10 02:58:18', 7),
(39, 4, 'Change status to pending', '2019-02-10 02:59:33', 7),
(40, 4, 'Change status to To Be Returned', '2019-02-10 03:05:59', 7),
(41, 4, 'Change status to pending', '2019-02-10 03:06:16', 7),
(42, 3, 'Change status to pending', '2019-02-10 15:25:08', 1),
(43, 2, 'Change status to to be returned', '2019-02-10 16:13:08', 7),
(44, 6, 'added Small Value Procurement - supplies and materials', '2019-02-11 02:40:54', 1),
(45, 11, 'added Small Value Procurement - supplies and materials', '2019-02-11 03:42:04', 1),
(46, 12, 'added Small Value Procurement - food', '2019-02-11 04:35:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `resolution`
--

CREATE TABLE `resolution` (
  `ID` int(11) NOT NULL,
  `reso_num` varchar(100) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `PR_No` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resolution`
--

INSERT INTO `resolution` (`ID`, `reso_num`, `type`, `PR_No`, `date_created`) VALUES
(1, 'reso for pr2', 'Mode', 2, '2019-02-10 03:11:22'),
(2, 'reso for pr2', 'Award', 2, '2019-02-10 03:11:36'),
(3, '2019-RESO-02-SVP', 'Mode', 11, '2019-02-11 03:43:52'),
(4, '2019-RESO-award', 'Award', 11, '2019-02-11 03:44:08');

-- --------------------------------------------------------

--
-- Table structure for table `route_per_scanned`
--

CREATE TABLE `route_per_scanned` (
  `ID` int(11) NOT NULL,
  `PR_No` int(11) DEFAULT NULL,
  `admin_office_ID` int(11) DEFAULT NULL,
  `admin_user_ID` int(11) DEFAULT NULL,
  `status_if_scanned` varchar(10) DEFAULT 'NS',
  `date_scanned` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `is_expired` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route_per_scanned`
--

INSERT INTO `route_per_scanned` (`ID`, `PR_No`, `admin_office_ID`, `admin_user_ID`, `status_if_scanned`, `date_scanned`, `date_end`, `is_expired`) VALUES
(5, 3, 1, 1, 'S', '2019-02-10 00:23:14', '2019-02-17 00:23:14', 0),
(7, 4, 1, 1, 'S', '2019-02-10 00:39:27', '2019-02-17 00:39:27', 0),
(10, 1, 1, 1, 'S', '2019-02-10 00:25:18', '2019-02-17 00:25:18', 0),
(25, 2, 1, 1, 'S', '2019-02-10 00:25:31', '2019-02-17 00:25:31', 0),
(40, 3, 2, NULL, 'NS', NULL, NULL, 0),
(41, 3, 4, NULL, 'NS', NULL, NULL, 0),
(42, 3, 6, NULL, 'NS', NULL, NULL, 0),
(43, 3, 3, NULL, 'NS', NULL, NULL, 0),
(44, 3, 5, NULL, 'NS', NULL, NULL, 0),
(45, 3, 7, NULL, 'NS', NULL, NULL, 0),
(46, 3, 8, NULL, 'NS', NULL, NULL, 0),
(47, 3, 9, NULL, 'NS', NULL, NULL, 0),
(55, 2, 2, 2, 'NS', '2019-02-10 03:10:31', '2019-02-17 03:10:31', 0),
(56, 2, 4, NULL, 'NS', NULL, NULL, 0),
(57, 2, 6, NULL, 'NS', NULL, NULL, 0),
(58, 2, 3, NULL, 'NS', NULL, NULL, 0),
(59, 2, 5, NULL, 'NS', NULL, NULL, 0),
(60, 2, 7, NULL, 'NS', NULL, NULL, 0),
(61, 2, 8, NULL, 'NS', NULL, NULL, 0),
(62, 2, 9, NULL, 'NS', NULL, NULL, 0),
(70, 4, 6, NULL, 'S', NULL, NULL, 0),
(71, 4, 3, NULL, 'NS', NULL, NULL, 0),
(72, 4, 4, NULL, 'NS', NULL, NULL, 0),
(73, 4, 7, NULL, 'NS', NULL, NULL, 0),
(74, 4, 8, NULL, 'NS', NULL, NULL, 0),
(75, 4, 9, NULL, 'NS', NULL, NULL, 0),
(76, 5, 1, NULL, 'NS', NULL, NULL, 0),
(77, 5, 2, NULL, 'NS', NULL, NULL, 0),
(78, 6, 1, 1, 'S', '2019-02-11 02:38:34', '2019-02-18 02:38:34', 0),
(81, 6, 2, 2, 'S', '2019-02-11 02:42:22', '2019-02-18 02:42:22', 0),
(82, 6, 4, NULL, 'NS', NULL, NULL, 0),
(83, 6, 6, NULL, 'NS', NULL, NULL, 0),
(84, 6, 3, NULL, 'NS', NULL, NULL, 0),
(85, 6, 5, NULL, 'NS', NULL, NULL, 0),
(86, 6, 7, NULL, 'NS', NULL, NULL, 0),
(87, 6, 8, NULL, 'NS', NULL, NULL, 0),
(88, 6, 9, NULL, 'NS', NULL, NULL, 0),
(95, 7, 1, NULL, 'NS', NULL, NULL, 0),
(96, 7, 2, NULL, 'NS', NULL, NULL, 0),
(97, 8, 1, NULL, 'NS', NULL, NULL, 0),
(98, 8, 2, NULL, 'NS', NULL, NULL, 0),
(99, 9, 1, NULL, 'NS', NULL, NULL, 0),
(100, 10, 1, NULL, 'NS', NULL, NULL, 0),
(101, 10, 2, NULL, 'NS', NULL, NULL, 0),
(102, 11, 1, 1, 'S', '2019-02-11 03:39:55', '2019-02-18 03:39:55', 0),
(105, 11, 2, 2, 'S', '2019-02-11 04:06:31', '2019-02-18 04:06:31', 0),
(106, 11, 4, 1, 'S', '2019-02-11 04:15:43', '2019-02-18 04:15:43', 0),
(107, 11, 6, 7, 'S', '2019-02-11 04:16:05', '2019-02-18 04:16:05', 0),
(108, 11, 3, 4, 'S', '2019-02-11 04:16:37', '2019-02-18 04:16:37', 0),
(109, 11, 5, 2, 'S', '2019-02-11 04:28:10', '2019-02-18 04:28:10', 0),
(110, 11, 7, 8, 'S', '2019-02-11 04:29:10', '2019-02-18 04:29:10', 0),
(111, 11, 8, 9, 'S', '2019-02-11 04:30:04', '2019-02-18 04:30:04', 0),
(112, 11, 9, 10, 'S', '2019-02-11 04:31:56', '2019-02-18 04:31:56', 0),
(119, 12, 1, 1, 'S', '2019-02-11 04:34:13', '2019-02-18 04:34:13', 0),
(122, 12, 6, 7, 'S', '2019-02-11 04:40:10', '2019-02-18 04:40:10', 0),
(123, 12, 3, 4, 'S', '2019-02-11 04:42:02', '2019-02-18 04:42:02', 0),
(124, 12, 4, 1, 'S', '2019-02-11 04:44:40', '2019-02-18 04:44:40', 0),
(125, 12, 7, 8, 'S', '2019-02-11 04:46:02', '2019-02-18 04:46:02', 0),
(126, 12, 8, NULL, 'NS', NULL, NULL, 0),
(127, 12, 9, NULL, 'NS', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `seen_notif`
--

CREATE TABLE `seen_notif` (
  `ID` int(11) NOT NULL,
  `notif_ID` int(11) DEFAULT NULL,
  `admin_office_ID` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seen_notif`
--

INSERT INTO `seen_notif` (`ID`, `notif_ID`, `admin_office_ID`) VALUES
(1, 0, 0),
(2, 45, 6),
(3, 47, 6),
(4, 48, 6),
(5, 54, 7),
(6, 55, 7);

-- --------------------------------------------------------

--
-- Table structure for table `type_of_pr`
--

CREATE TABLE `type_of_pr` (
  `type_ID` int(11) NOT NULL,
  `type_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_of_pr`
--

INSERT INTO `type_of_pr` (`type_ID`, `type_name`) VALUES
(1, 'food'),
(3, 'supplies and materials'),
(4, 'equipment');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_ID` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `user_type_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(11, 'OP2', '123', 1),
(12, 'EUSER6', '321', 2),
(13, 'EUSER7', '321', 2),
(14, 'EUSER8', '321', 2),
(15, 'EUSER9', '321', 2),
(16, 'EUSER10', '321', 2),
(17, 'ICO1', '123', 1),
(18, 'BUDGET1', '123', 1),
(19, 'ACC1', '123', 1),
(20, 'CASH1', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `user_type_ID` int(11) NOT NULL,
  `user_type_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_type_ID`, `user_type_name`) VALUES
(1, 'Admin'),
(2, 'End user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_office`
--
ALTER TABLE `admin_office`
  ADD PRIMARY KEY (`admin_office_ID`);

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`admin_user_ID`);

--
-- Indexes for table `attached_files`
--
ALTER TABLE `attached_files`
  ADD PRIMARY KEY (`file_ID`);

--
-- Indexes for table `bidders`
--
ALTER TABLE `bidders`
  ADD PRIMARY KEY (`bidders_ID`);

--
-- Indexes for table `bidder_transaction`
--
ALTER TABLE `bidder_transaction`
  ADD PRIMARY KEY (`transaction_ID`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`college_ID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_ID`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`PR_No`);

--
-- Indexes for table `end_user`
--
ALTER TABLE `end_user`
  ADD PRIMARY KEY (`end_user_ID`);

--
-- Indexes for table `eu_seen_notif`
--
ALTER TABLE `eu_seen_notif`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `fixed_route`
--
ALTER TABLE `fixed_route`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `mode_of_procurement`
--
ALTER TABLE `mode_of_procurement`
  ADD PRIMARY KEY (`mode_ID`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notif_ID`);

--
-- Indexes for table `remarks`
--
ALTER TABLE `remarks`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `resolution`
--
ALTER TABLE `resolution`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `route_per_scanned`
--
ALTER TABLE `route_per_scanned`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `seen_notif`
--
ALTER TABLE `seen_notif`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `type_of_pr`
--
ALTER TABLE `type_of_pr`
  ADD PRIMARY KEY (`type_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_ID`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`user_type_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_office`
--
ALTER TABLE `admin_office`
  MODIFY `admin_office_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `admin_user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `attached_files`
--
ALTER TABLE `attached_files`
  MODIFY `file_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `bidders`
--
ALTER TABLE `bidders`
  MODIFY `bidders_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `bidder_transaction`
--
ALTER TABLE `bidder_transaction`
  MODIFY `transaction_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `college_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `PR_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `end_user`
--
ALTER TABLE `end_user`
  MODIFY `end_user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `eu_seen_notif`
--
ALTER TABLE `eu_seen_notif`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `fixed_route`
--
ALTER TABLE `fixed_route`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `mode_of_procurement`
--
ALTER TABLE `mode_of_procurement`
  MODIFY `mode_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notif_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `remarks`
--
ALTER TABLE `remarks`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `resolution`
--
ALTER TABLE `resolution`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `route_per_scanned`
--
ALTER TABLE `route_per_scanned`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
--
-- AUTO_INCREMENT for table `seen_notif`
--
ALTER TABLE `seen_notif`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `type_of_pr`
--
ALTER TABLE `type_of_pr`
  MODIFY `type_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `user_type_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

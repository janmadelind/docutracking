-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2019 at 02:41 AM
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
(4, 'Bids and Awards Committee'),
(5, 'Procurement Office'),
(6, 'ICO'),
(7, 'Budget Office'),
(8, 'Accounting Office'),
(9, 'Cashier Office');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `admin_user_ID` int(11) NOT NULL,
  `admin_user_name` varchar(100) DEFAULT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `admin_office_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`admin_user_ID`, `admin_user_name`, `user_ID`, `admin_office_ID`) VALUES
(1, 'Priscilla Sotelo', 1, 1),
(2, 'Ruel Aggabao', 2, 2),
(3, 'Peregrino Amador', 3, 1),
(4, 'Dr. Jesus Rodrigo F. Torres', 4, 3),
(6, 'President', 11, 3),
(7, 'ICO', 17, 6),
(8, 'Cataino A. Fortes Jr.', 18, 7),
(9, 'Vivian C. Santos', 19, 8),
(10, 'Cashier Accountant', 20, 9);

-- --------------------------------------------------------

--
-- Table structure for table `attached_files`
--

CREATE TABLE `attached_files` (
  `file_ID` int(11) NOT NULL,
  `PR_No` int(11) DEFAULT NULL,
  `file_name` varchar(200) DEFAULT NULL,
  `admin_office_ID` int(11) DEFAULT NULL,
  `admin_user_ID` int(11) DEFAULT NULL,
  `date_attached` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bidders`
--

CREATE TABLE `bidders` (
  `bidders_ID` int(11) NOT NULL,
  `bidders_name` varchar(200) DEFAULT NULL,
  `contact_no` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `college_ID` int(11) NOT NULL,
  `college_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`college_ID`, `college_name`) VALUES
(1, 'College of Science'),
(2, 'College of Liberal Arts'),
(3, 'College of Industrial Education'),
(4, 'College of Industrial Technology'),
(5, 'College of Engineering'),
(6, 'College of Fine Arts and Architecture');

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
(1, NULL, '2019-03-14 16:24:59', 'pending', 0, NULL, 'Revision 1', 1, 3, 1, NULL),
(2, NULL, '2019-03-14 16:25:09', 'pending', 0, NULL, 'Revision 2', 1, 1, 1, NULL),
(3, NULL, '2019-03-14 16:25:25', 'pending', 0, NULL, 'Revision 3', 1, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `duration`
--

CREATE TABLE `duration` (
  `ID` int(11) NOT NULL,
  `PR_No` int(11) DEFAULT NULL,
  `admin_office_ID` int(11) DEFAULT NULL,
  `days` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `duration`
--

INSERT INTO `duration` (`ID`, `PR_No`, `admin_office_ID`, `days`) VALUES
(1, 1, 1, 2),
(2, 1, 4, 2),
(3, 1, 2, 2),
(4, 1, 3, 2),
(5, 1, 5, 2),
(6, 1, 6, 2),
(7, 1, 7, 2),
(8, 1, 8, 2),
(9, 1, 9, 2),
(37, 3, 1, 4),
(38, 3, 4, 4),
(39, 3, 3, 4),
(40, 3, 6, 4),
(41, 3, 7, 4),
(42, 3, 8, 4),
(43, 3, 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `end_user`
--

CREATE TABLE `end_user` (
  `end_user_ID` int(11) NOT NULL,
  `end_user_name` varchar(100) DEFAULT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `college_ID` int(11) DEFAULT NULL,
  `department_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `end_user`
--

INSERT INTO `end_user` (`end_user_ID`, `end_user_name`, `user_ID`, `college_ID`, `department_ID`) VALUES
(1, 'Fernando Renegado', 6, 1, 1),
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
-- Table structure for table `eu_route_per_scanned`
--

CREATE TABLE `eu_route_per_scanned` (
  `ID` int(11) NOT NULL,
  `PR_No` int(11) DEFAULT NULL,
  `end_user_name` varchar(100) DEFAULT NULL,
  `status_if_returned` varchar(10) DEFAULT 'NR',
  `date_added` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 0, 0);

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
  `department_ID` int(11) DEFAULT '0',
  `got` tinyint(5) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notif_ID`, `PR_No`, `message_subject`, `message_description`, `created_at`, `admin_office_ID`, `department_ID`, `got`) VALUES
(1, 1, 'Wrong Sequence', 'PR 1 did not went to proper office', '2019-03-14 16:27:01', 1, 0, 0),
(2, 1, 'Wrong Sequence', 'PR 1 did not went to proper office', '2019-03-14 17:12:45', 2, 0, 0),
(3, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:11:12', 1, 0, 1),
(4, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:11:12', 1, 0, 1),
(1074, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:18:45', 1, 0, 1),
(1075, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:18:45', 1, 0, 1),
(1077, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:18:46', 1, 0, 1),
(1078, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:18:46', 1, 0, 1),
(1080, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:18:47', 1, 0, 1),
(1081, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:18:47', 1, 0, 1),
(1083, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:18:48', 1, 0, 1),
(1084, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:18:48', 1, 0, 1),
(1086, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:18:49', 1, 0, 1),
(1087, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:18:49', 1, 0, 1),
(1089, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:18:50', 1, 0, 1),
(1090, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:18:50', 1, 0, 1),
(1092, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:18:51', 1, 0, 1),
(1093, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:18:51', 1, 0, 1),
(1095, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:18:52', 1, 0, 1),
(1096, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:18:52', 1, 0, 1),
(1098, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:18:53', 1, 0, 1),
(1099, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:18:53', 1, 0, 1),
(1101, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:18:54', 1, 0, 1),
(1102, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:18:54', 1, 0, 1),
(1104, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:18:55', 1, 0, 1),
(1105, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:18:55', 1, 0, 1),
(1107, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:18:56', 1, 0, 1),
(1108, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:18:56', 1, 0, 1),
(1110, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:18:57', 1, 0, 1),
(1111, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:18:57', 1, 0, 1),
(1113, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:18:58', 1, 0, 1),
(1114, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:18:58', 1, 0, 1),
(1116, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:18:59', 1, 0, 1),
(1117, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:18:59', 1, 0, 1),
(1119, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:19:00', 1, 0, 1),
(1120, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:19:00', 1, 0, 1),
(1122, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:19:01', 1, 0, 1),
(1123, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:19:01', 1, 0, 1),
(1125, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:19:02', 1, 0, 1),
(1126, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:19:02', 1, 0, 1),
(1128, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:19:03', 1, 0, 0),
(1129, 1, 'Due Date', 'PR1 is due at Bids and Awards Committee', '2019-03-17 20:19:03', 1, 0, 0);

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
(1, 1, 'added mode of PR# 1 to Small Value Procurement - supplies and materials', '2019-03-14 16:25:57', 1),
(2, 1, 'Returned: for questioning 1', '2019-03-14 16:26:28', 1),
(3, 1, 'Returned: for questioning 2', '2019-03-14 16:28:57', 1),
(4, 1, 'Returned for bac', '2019-03-14 16:31:20', 2),
(5, 1, 'Returned for bac', '2019-03-14 16:31:20', 2),
(6, 2, 'added mode of PR# 2 to Small Value Procurement - food', '2019-03-14 16:32:38', 1),
(7, 2, 'added mode of PR# 2 to Small Value Procurement - food', '2019-03-14 16:33:30', 1),
(8, 3, 'added mode of PR# 3 to Small Value Procurement - food', '2019-03-14 16:34:25', 1),
(9, 3, 'added mode of PR# 3 to Small Value Procurement - supplies and materials', '2019-03-14 16:35:08', 1),
(10, 3, 'added mode of PR# 3 to Small Value Procurement - food', '2019-03-14 16:37:28', 1),
(11, 1, 'Returned for questioning ', '2019-03-14 16:48:49', 2),
(12, 1, 'Returned: mahdklaj', '2019-03-14 17:12:37', 2),
(13, 1, 'Returned ,.jdajss', '2019-03-14 17:13:02', 2);

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
  `status_if_returned` varchar(5) DEFAULT 'NR',
  `days` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route_per_scanned`
--

INSERT INTO `route_per_scanned` (`ID`, `PR_No`, `admin_office_ID`, `admin_user_ID`, `status_if_scanned`, `date_scanned`, `date_end`, `status_if_returned`, `days`) VALUES
(1, 1, 1, 1, 'S', '2019-03-14 16:25:41', '2019-03-16 16:25:41', 'NR', NULL),
(3, 2, 1, 1, 'S', '2019-03-14 16:32:26', '2019-03-21 16:32:26', 'NR', NULL),
(5, 3, 1, 1, 'S', '2019-03-14 16:34:15', '2019-03-21 16:34:15', 'NR', NULL),
(8, 1, 2, 2, 'S', '2019-03-14 16:29:50', '2019-03-16 16:29:50', 'NR', NULL),
(9, 1, 4, NULL, 'NS', NULL, '2019-03-16 16:25:41', 'NR', NULL),
(10, 1, 6, NULL, 'NS', NULL, '2019-03-16 16:25:41', 'NR', NULL),
(11, 1, 3, NULL, 'NS', NULL, '2019-03-16 16:25:41', 'NR', NULL),
(12, 1, 5, NULL, 'NS', NULL, '2019-03-16 16:25:41', 'NR', NULL),
(13, 1, 7, NULL, 'NS', NULL, '2019-03-16 16:25:41', 'NR', NULL),
(14, 1, 8, NULL, 'NS', NULL, '2019-03-16 16:25:41', 'NR', NULL),
(15, 1, 9, NULL, 'NS', NULL, '2019-03-16 16:25:41', 'NR', NULL),
(23, 2, 6, NULL, 'NS', NULL, NULL, 'NR', NULL),
(24, 2, 3, NULL, 'NS', NULL, NULL, 'NR', NULL),
(25, 2, 4, NULL, 'NS', NULL, NULL, 'NR', NULL),
(26, 2, 7, NULL, 'NS', NULL, NULL, 'NR', NULL),
(27, 2, 8, NULL, 'NS', NULL, NULL, 'NR', NULL),
(28, 2, 9, NULL, 'NS', NULL, NULL, 'NR', NULL),
(45, 3, 4, NULL, 'NS', NULL, NULL, 'NR', NULL),
(46, 3, 6, NULL, 'NS', NULL, NULL, 'NR', NULL),
(47, 3, 3, NULL, 'NS', NULL, NULL, 'NR', NULL),
(48, 3, 5, NULL, 'NS', NULL, NULL, 'NR', NULL),
(49, 3, 7, NULL, 'NS', NULL, NULL, 'NR', NULL),
(50, 3, 8, NULL, 'NS', NULL, NULL, 'NR', NULL),
(51, 3, 9, NULL, 'NS', NULL, NULL, 'NR', NULL),
(59, 3, 6, NULL, 'NS', NULL, NULL, 'NR', NULL),
(60, 3, 3, NULL, 'NS', NULL, NULL, 'NR', NULL),
(61, 3, 4, NULL, 'NS', NULL, NULL, 'NR', NULL),
(62, 3, 7, NULL, 'NS', NULL, NULL, 'NR', NULL),
(63, 3, 8, NULL, 'NS', NULL, NULL, 'NR', NULL),
(64, 3, 9, NULL, 'NS', NULL, NULL, 'NR', NULL);

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
(1, 0, 0);

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
-- Indexes for table `duration`
--
ALTER TABLE `duration`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `end_user`
--
ALTER TABLE `end_user`
  ADD PRIMARY KEY (`end_user_ID`);

--
-- Indexes for table `eu_route_per_scanned`
--
ALTER TABLE `eu_route_per_scanned`
  ADD PRIMARY KEY (`ID`);

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
  MODIFY `file_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bidders`
--
ALTER TABLE `bidders`
  MODIFY `bidders_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bidder_transaction`
--
ALTER TABLE `bidder_transaction`
  MODIFY `transaction_ID` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `PR_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `duration`
--
ALTER TABLE `duration`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `end_user`
--
ALTER TABLE `end_user`
  MODIFY `end_user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `eu_route_per_scanned`
--
ALTER TABLE `eu_route_per_scanned`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `eu_seen_notif`
--
ALTER TABLE `eu_seen_notif`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `notif_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1130;
--
-- AUTO_INCREMENT for table `remarks`
--
ALTER TABLE `remarks`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `resolution`
--
ALTER TABLE `resolution`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `route_per_scanned`
--
ALTER TABLE `route_per_scanned`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `seen_notif`
--
ALTER TABLE `seen_notif`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3723;
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

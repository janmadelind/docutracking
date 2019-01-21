/*
SQLyog Enterprise - MySQL GUI v7.02 
MySQL - 5.7.21 : Database - docutrack
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`docutrack` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `docutrack`;

/*Table structure for table `admin_office` */

DROP TABLE IF EXISTS `admin_office`;

CREATE TABLE `admin_office` (
  `admin_office_ID` int(11) NOT NULL AUTO_INCREMENT,
  `admin_office_name` varchar(50) DEFAULT NULL,
  `scanner_no` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`admin_office_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `admin_office` */

insert  into `admin_office`(`admin_office_ID`,`admin_office_name`,`scanner_no`) values (1,'BAC','1'),(2,'Procurement Office','2'),(3,'Office of the President','3'),(4,'Budget','4'),(5,'Accounting','5');

/*Table structure for table `admin_user` */

DROP TABLE IF EXISTS `admin_user`;

CREATE TABLE `admin_user` (
  `admin_user_ID` int(11) NOT NULL AUTO_INCREMENT,
  `admin_user_name` varchar(20) DEFAULT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `admin_office_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`admin_user_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `admin_user` */

insert  into `admin_user`(`admin_user_ID`,`admin_user_name`,`user_ID`,`admin_office_ID`) values (1,'Sotello',1,1),(2,'Aggabao',2,2),(3,'Amador',3,1),(4,'TUP PRES',4,3),(5,'Head of Budgt',5,4);

/*Table structure for table `attached files` */

DROP TABLE IF EXISTS `attached files`;

CREATE TABLE `attached files` (
  `file_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PR_No` int(11) DEFAULT NULL,
  `file_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`file_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `attached files` */

/*Table structure for table `bidder_transaction` */

DROP TABLE IF EXISTS `bidder_transaction`;

CREATE TABLE `bidder_transaction` (
  `transaction_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PR_No` int(11) DEFAULT NULL,
  `bidders_ID` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`transaction_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `bidder_transaction` */

/*Table structure for table `bidders` */

DROP TABLE IF EXISTS `bidders`;

CREATE TABLE `bidders` (
  `bidders_ID` int(11) NOT NULL AUTO_INCREMENT,
  `bidders_name` varchar(50) DEFAULT NULL,
  `contact_no` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`bidders_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `bidders` */

/*Table structure for table `colleges` */

DROP TABLE IF EXISTS `colleges`;

CREATE TABLE `colleges` (
  `college_ID` int(11) NOT NULL AUTO_INCREMENT,
  `college_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`college_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `colleges` */

insert  into `colleges`(`college_ID`,`college_name`) values (1,'COS'),(2,'CLA'),(3,'CIE'),(4,'CIT'),(5,'COE'),(6,'CIT');

/*Table structure for table `department` */

DROP TABLE IF EXISTS `department`;

CREATE TABLE `department` (
  `department_ID` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(20) DEFAULT NULL,
  `college_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`department_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `department` */

insert  into `department`(`department_ID`,`department_name`,`college_ID`) values (1,'Math Dept',1),(2,'Physics',1),(3,'Chemistry',1),(4,'SS',2),(5,'English',2),(6,'Filipino',2),(7,'Electronics',5),(8,'Mechanical',5),(9,'Electical',5),(10,'civil',5);

/*Table structure for table `document` */

DROP TABLE IF EXISTS `document`;

CREATE TABLE `document` (
  `PR_No` int(11) NOT NULL AUTO_INCREMENT,
  `ref_no` int(11) DEFAULT NULL,
  `date_submitted` date DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `document` */

insert  into `document`(`PR_No`,`ref_no`,`date_submitted`,`status`,`amount`,`remarks`,`awards`,`resolution`,`proj_description`,`mode_ID`,`end_user_ID`,`cur_loc`,`QR_code`) values (1,1,'0000-00-00','A',1000,'1','1','1','trial1',1,6,'1','1'),(2,2,'0000-00-00','A',2000,'1','1','1','trial2',1,6,NULL,NULL),(3,3,'0000-00-00','A',3000.09,'1','1','1','trial3',2,7,NULL,NULL),(4,4,'0000-00-00','A',40,'1','1','1','trial4',2,8,NULL,NULL),(5,5,'0000-00-00',NULL,NULL,'1',NULL,NULL,NULL,1,6,NULL,NULL),(6,6,'0000-00-00',NULL,NULL,'1',NULL,NULL,NULL,1,7,NULL,NULL),(7,7,'0000-00-00',NULL,NULL,'1',NULL,NULL,NULL,2,8,NULL,NULL),(8,8,'0000-00-00',NULL,NULL,'1',NULL,NULL,NULL,2,8,NULL,NULL);

/*Table structure for table `duration` */

DROP TABLE IF EXISTS `duration`;

CREATE TABLE `duration` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `mode_ID` int(11) DEFAULT NULL,
  `admin_office_ID` int(11) DEFAULT NULL,
  `duration` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `duration` */

/*Table structure for table `end_user` */

DROP TABLE IF EXISTS `end_user`;

CREATE TABLE `end_user` (
  `end_user_ID` int(11) NOT NULL AUTO_INCREMENT,
  `end_user_name` varchar(20) DEFAULT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `college_ID` int(11) DEFAULT NULL,
  `department_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`end_user_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `end_user` */

insert  into `end_user`(`end_user_ID`,`end_user_name`,`user_ID`,`college_ID`,`department_ID`) values (1,'Vargas',6,1,1),(2,'Villalobos',7,2,4),(3,'Renegado',8,1,1),(4,'Garcia',9,1,1),(5,'Dela Cruz',10,1,1);

/*Table structure for table `fixed_route` */

DROP TABLE IF EXISTS `fixed_route`;

CREATE TABLE `fixed_route` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `mode_ID` int(11) DEFAULT NULL,
  `sequence` int(11) DEFAULT NULL,
  `admin_office_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `fixed_route` */

insert  into `fixed_route`(`ID`,`mode_ID`,`sequence`,`admin_office_ID`) values (1,1,1,1),(2,1,2,2),(3,1,3,3),(4,2,1,1),(5,2,2,2),(6,2,3,3);

/*Table structure for table `location` */

DROP TABLE IF EXISTS `location`;

CREATE TABLE `location` (
  `location_ID` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `scanner_no` varchar(20) DEFAULT NULL,
  `admin_user_ID` int(11) DEFAULT NULL,
  `PR_No` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`location_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `location` */

/*Table structure for table `mode_of_procurement` */

DROP TABLE IF EXISTS `mode_of_procurement`;

CREATE TABLE `mode_of_procurement` (
  `mode_ID` int(11) NOT NULL AUTO_INCREMENT,
  `mode_of_procurement` varchar(20) DEFAULT NULL,
  `process` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`mode_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `mode_of_procurement` */

insert  into `mode_of_procurement`(`mode_ID`,`mode_of_procurement`,`process`) values (1,'Small Value Shopping',NULL),(2,'Negotiated',NULL);

/*Table structure for table `route_per_scanned` */

DROP TABLE IF EXISTS `route_per_scanned`;

CREATE TABLE `route_per_scanned` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PR_No` int(11) DEFAULT NULL,
  `admin_office_ID` int(11) DEFAULT NULL,
  `status_if_scanned` varchar(10) DEFAULT 'NS',
  `date_scanned` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `route_per_scanned` */

insert  into `route_per_scanned`(`ID`,`PR_No`,`admin_office_ID`,`status_if_scanned`,`date_scanned`) values (1,2,1,'S','0000-00-00 00:00:00'),(2,2,2,'S','0000-00-00 00:00:00'),(3,2,3,'S','0000-00-00 00:00:00'),(4,1,1,'S','0000-00-00 00:00:00'),(5,1,2,'S','0000-00-00 00:00:00'),(6,1,3,'NS','0000-00-00 00:00:00'),(7,3,1,'S','0000-00-00 00:00:00'),(8,3,2,'S',NULL),(9,3,3,'NS',NULL),(10,6,1,'NS',NULL),(11,6,2,'NS',NULL),(12,6,3,'NS',NULL),(13,5,1,'NS',NULL),(14,5,2,'NS',NULL),(15,5,3,'NS',NULL);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `user_type_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`user_ID`,`username`,`password`,`user_type_ID`) values (1,'BAC1','123',1),(2,'PROC1','123',1),(3,'BAC2','123',1),(4,'OP1','123',1),(5,'BDGT1','123',1),(6,'EUSER1','321',2),(7,'EUSER2','321',2),(8,'EUSER3','321',2),(9,'EUSER4','321',2),(10,'EUSER5','321',2);

/*Table structure for table `user_type` */

DROP TABLE IF EXISTS `user_type`;

CREATE TABLE `user_type` (
  `user_type_ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_type_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`user_type_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `user_type` */

insert  into `user_type`(`user_type_ID`,`user_type_name`) values (1,'Admin'),(2,'End user');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;

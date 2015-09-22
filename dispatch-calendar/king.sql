-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2015 at 10:34 AM
-- Server version: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `king`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE IF NOT EXISTS `calendar` (
  `CALENDAR_NAME` varchar(25) COLLATE utf8_bin NOT NULL,
  `CALENDAR_ID` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`CALENDAR_ID`),
  UNIQUE KEY `CALENDAR_NAME` (`CALENDAR_NAME`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`CALENDAR_NAME`, `CALENDAR_ID`) VALUES
('GEORGE', 1),
('KING', 2),
('XDELETED', 3);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `CONTACT_ID` int(10) NOT NULL AUTO_INCREMENT,
  `NAME1` varchar(100) COLLATE utf8_bin NOT NULL,
  `NAME2` varchar(500) COLLATE utf8_bin NOT NULL,
  `ADDRESS1` varchar(100) COLLATE utf8_bin NOT NULL,
  `ADDRESS2` varchar(500) COLLATE utf8_bin NOT NULL,
  `PHONE1` varchar(100) COLLATE utf8_bin NOT NULL,
  `PHONE2` varchar(100) COLLATE utf8_bin NOT NULL,
  `PHONE3` varchar(500) COLLATE utf8_bin NOT NULL,
  `EMAIL1` varchar(100) COLLATE utf8_bin NOT NULL,
  `EMAIL2` varchar(500) COLLATE utf8_bin NOT NULL,
  `LINE1` varchar(50) COLLATE utf8_bin NOT NULL,
  `LINE2` varchar(50) COLLATE utf8_bin NOT NULL,
  `LINE3` varchar(50) COLLATE utf8_bin NOT NULL,
  `LINE4` varchar(50) COLLATE utf8_bin NOT NULL,
  `LINE5` varchar(50) COLLATE utf8_bin NOT NULL,
  `COMMENT` varchar(2000) COLLATE utf8_bin NOT NULL,
  `SOCIAL_NETWORK` varchar(500) COLLATE utf8_bin NOT NULL,
  `CONTACT_TYPE` varchar(25) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`CONTACT_ID`),
  KEY `NAME1` (`NAME1`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`CONTACT_ID`, `NAME1`, `NAME2`, `ADDRESS1`, `ADDRESS2`, `PHONE1`, `PHONE2`, `PHONE3`, `EMAIL1`, `EMAIL2`, `LINE1`, `LINE2`, `LINE3`, `LINE4`, `LINE5`, `COMMENT`, `SOCIAL_NETWORK`, `CONTACT_TYPE`) VALUES
(1, 'KING TRANSFER', 'GERRICK ANGEL  :LOCAL DISPATCH\r\nALLAN NICHOLLS :LONG DISTANCE DISPATCH\r\nGLENDA SOAPE   :SALES\r\nCAROLYNN          :COORDINATOR\r\nJANE CORDERO  :BOOKKEEPING', '7232 Grand Ave\r\nBILLINGS MT 59106', '', 'Work: 406-656-5464', 'Fax: 406-652-7280', '', 'united728a@yahoo.com', 'N/A', '', '', '', '', '', 'this is a test coordinator', 'kingtransfer@unitedvanlines.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `employee_names`
--

CREATE TABLE IF NOT EXISTS `employee_names` (
  `EMPLOYEE_ID` int(5) NOT NULL AUTO_INCREMENT,
  `CALENDAR_USER` varchar(1) COLLATE utf8_bin NOT NULL,
  `EMPLOYEE_NAME` varchar(50) COLLATE utf8_bin NOT NULL,
  `EMPLOYEE_SOCIAL_SECURITY` varchar(15) COLLATE utf8_bin NOT NULL,
  `EMPLOYEE_ADDRESS` varchar(100) COLLATE utf8_bin NOT NULL,
  `EMPLOYEE_PHONE1` varchar(25) COLLATE utf8_bin NOT NULL,
  `EMPLOYEE_PHONE2` varchar(25) COLLATE utf8_bin NOT NULL,
  `EMPLOYEE_PHONE3` varchar(25) COLLATE utf8_bin NOT NULL,
  `EMPLOYEE_EMAIL1` varchar(100) COLLATE utf8_bin NOT NULL,
  `EMPLOYEE_EMAIL2` varchar(100) COLLATE utf8_bin NOT NULL,
  `EMPLOYEE_EMAIL3` varchar(100) COLLATE utf8_bin NOT NULL,
  `COMMENT` varchar(1000) COLLATE utf8_bin NOT NULL,
  `DATE_ENTERED` datetime NOT NULL,
  `DEFAULT_CALENDAR` int(5) NOT NULL,
  PRIMARY KEY (`EMPLOYEE_ID`),
  KEY `CALENDAR_USER` (`CALENDAR_USER`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=20 ;

--
-- Dumping data for table `employee_names`
--

INSERT INTO `employee_names` (`EMPLOYEE_ID`, `CALENDAR_USER`, `EMPLOYEE_NAME`, `EMPLOYEE_SOCIAL_SECURITY`, `EMPLOYEE_ADDRESS`, `EMPLOYEE_PHONE1`, `EMPLOYEE_PHONE2`, `EMPLOYEE_PHONE3`, `EMPLOYEE_EMAIL1`, `EMPLOYEE_EMAIL2`, `EMPLOYEE_EMAIL3`, `COMMENT`, `DATE_ENTERED`, `DEFAULT_CALENDAR`) VALUES
(1, 'Y', 'ALLAN NICHOLLS', '', '', '', '', '', '', '', '', '', '2014-10-13 00:00:00', 0),
(2, 'Y', 'GEORGE SPEARS', 'na', '7232 GRAND AVE', 'N/A', 'N/A', 'Work 406-656-5464', 'united728g@gmail,com', '', '', 'yes', '2014-11-04 23:52:48', 2),
(8, 'Y', 'CAROLYN', '', '', '406-656-5464', '', '', '', '', '', '', '2014-11-05 00:00:17', 1),
(10, 'Y', 'GERRICK ANGEL', '', '', '', '', '', '', '', '', '', '2014-11-05 00:32:33', 2),
(11, 'N', 'BOB SCHAEFER', '', '', 'CELL: 406-690-4449', '', '', '', '', '', '', '2014-11-05 09:23:52', 0),
(12, 'Y', 'EVERYBODY', '', '', '', '', '', '', '', '', '', '2014-11-14 06:17:47', 0),
(13, 'N', 'SHANE SPEARS', '', '', 'work: 406-656-5464', '', '', '', '', '', '', '2015-01-06 15:07:12', 2),
(14, 'N', 'KELLY SPEARS', '', '', '', '', '', '', '', '', '', '2015-01-06 15:07:25', 2),
(15, 'N', 'JASON JAM', '', '', '', '', '', '', '', '', '', '2015-01-06 19:07:05', 2),
(16, 'N', 'KELLY SPEAR', '', '', '', '', '', '', '', '', '', '2015-01-06 19:07:24', 2),
(17, 'N', 'asdlkfjklj', '', '', '', '', '', '', '', '', '', '2015-01-06 19:18:54', 2),
(18, 'N', 'LEE WHITE BEAR', '', '', '', '', '', '', '', '', '', '2015-01-06 23:27:49', 2),
(19, 'N', 'test', '', '', '', '', '', '', '', '', '', '2015-01-06 23:39:21', 2);

-- --------------------------------------------------------

--
-- Table structure for table `employee_note_id`
--

CREATE TABLE IF NOT EXISTS `employee_note_id` (
  `EMPLOYEE_ID` int(5) NOT NULL,
  `NOTE_ID` int(15) NOT NULL,
  KEY `EMPLOYEE_ID` (`EMPLOYEE_ID`),
  KEY `NOTE_ID` (`NOTE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `employee_note_id`
--

INSERT INTO `employee_note_id` (`EMPLOYEE_ID`, `NOTE_ID`) VALUES
(2, 1),
(2, 2),
(2, 3),
(1, 4),
(1, 5),
(0, 0),
(0, 0),
(0, 0),
(2, 16),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(1, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(2, 37),
(2, 38),
(2, 39),
(2, 40),
(2, 41),
(2, 42),
(2, 43),
(2, 44),
(1, 45),
(2, 46),
(10, 47),
(12, 48),
(1, 49),
(1, 50),
(2, 51),
(2, 52),
(10, 53),
(2, 54),
(10, 55),
(2, 56),
(2, 57),
(1, 58),
(1, 59),
(10, 60),
(10, 61),
(10, 62),
(1, 63),
(1, 64),
(2, 65),
(2, 66),
(1, 67),
(10, 68),
(1, 69),
(2, 70),
(10, 71),
(12, 72),
(1, 73),
(2, 74),
(2, 75),
(2, 76),
(8, 77);

-- --------------------------------------------------------

--
-- Table structure for table `estimate_setup`
--

CREATE TABLE IF NOT EXISTS `estimate_setup` (
  `ESTIMATE_SETUP_NUMBER` int(5) NOT NULL AUTO_INCREMENT,
  `PATH` varchar(100) COLLATE utf8_bin NOT NULL,
  `AGENT_NUMBER` varchar(10) COLLATE utf8_bin NOT NULL,
  `AGENT_NAME` varchar(75) COLLATE utf8_bin NOT NULL,
  `AGENT_ADDRESS` varchar(300) COLLATE utf8_bin NOT NULL,
  `PHONE1` varchar(25) COLLATE utf8_bin NOT NULL,
  `PHONE2` varchar(25) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ESTIMATE_SETUP_NUMBER`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE IF NOT EXISTS `job` (
  `JOB_NUMBER` int(15) NOT NULL,
  `CALENDAR_ID` int(10) NOT NULL,
  `JOB_TYPE` varchar(15) COLLATE utf8_bin NOT NULL,
  `LOCATION_TYPE` varchar(25) COLLATE utf8_bin NOT NULL,
  `BOOKING_AGENT` varchar(300) COLLATE utf8_bin NOT NULL,
  `ORIGIN_AGENT` varchar(300) COLLATE utf8_bin NOT NULL,
  `DESTINATION_AGENT` varchar(300) COLLATE utf8_bin NOT NULL,
  `HAULING_AGENT` varchar(300) COLLATE utf8_bin NOT NULL,
  `NAME1` varchar(100) COLLATE utf8_bin NOT NULL,
  `COMPANY_NAME` varchar(100) COLLATE utf8_bin NOT NULL,
  `NAME2` varchar(300) COLLATE utf8_bin NOT NULL,
  `ORIGIN_ADDRESS1` varchar(200) COLLATE utf8_bin NOT NULL,
  `ORIGIN_ADDRESS2` varchar(300) COLLATE utf8_bin NOT NULL,
  `DESTINATION_INFO1` varchar(300) COLLATE utf8_bin NOT NULL,
  `DESTINATION_INFO2` varchar(300) COLLATE utf8_bin NOT NULL,
  `PHONE1` varchar(100) COLLATE utf8_bin NOT NULL,
  `PHONE2` varchar(100) COLLATE utf8_bin NOT NULL,
  `PHONE3` varchar(300) COLLATE utf8_bin NOT NULL,
  `EMAIL1` varchar(100) COLLATE utf8_bin NOT NULL,
  `EMAIL2` varchar(300) COLLATE utf8_bin NOT NULL,
  `DO_NOT_PRINT` varchar(3) COLLATE utf8_bin NOT NULL,
  `TENTITIVE` varchar(3) COLLATE utf8_bin NOT NULL,
  `CANCELLED` varchar(3) COLLATE utf8_bin NOT NULL,
  `OUT_OF_AREA` int(1) NOT NULL,
  `PERMANENT_STORAGE` int(1) NOT NULL,
  `TRAILER_STORAGE` int(1) NOT NULL,
  `TARRIF` varchar(20) COLLATE utf8_bin NOT NULL,
  `CUBE` int(5) NOT NULL,
  `WEIGHT` varchar(8) COLLATE utf8_bin NOT NULL,
  `VALUATION` int(10) NOT NULL,
  `MILES` int(5) NOT NULL,
  `ORDER_NUMBER` varchar(25) COLLATE utf8_bin NOT NULL,
  `PENDING_DELIVERY_DATE` int(1) NOT NULL,
  `STORAGE_IN_DATE` date NOT NULL,
  `STORAGE_OUT_DATE` date NOT NULL,
  `NUMBER_OF_DAYS_IN_STORAGE` int(10) NOT NULL,
  `COORDINATOR_NOTE` varchar(2000) COLLATE utf8_bin NOT NULL,
  `HAULING` varchar(10) COLLATE utf8_bin NOT NULL,
  `BOOKING` varchar(10) COLLATE utf8_bin NOT NULL,
  `NOTE` varchar(1200) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`JOB_NUMBER`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`JOB_NUMBER`, `CALENDAR_ID`, `JOB_TYPE`, `LOCATION_TYPE`, `BOOKING_AGENT`, `ORIGIN_AGENT`, `DESTINATION_AGENT`, `HAULING_AGENT`, `NAME1`, `COMPANY_NAME`, `NAME2`, `ORIGIN_ADDRESS1`, `ORIGIN_ADDRESS2`, `DESTINATION_INFO1`, `DESTINATION_INFO2`, `PHONE1`, `PHONE2`, `PHONE3`, `EMAIL1`, `EMAIL2`, `DO_NOT_PRINT`, `TENTITIVE`, `CANCELLED`, `OUT_OF_AREA`, `PERMANENT_STORAGE`, `TRAILER_STORAGE`, `TARRIF`, `CUBE`, `WEIGHT`, `VALUATION`, `MILES`, `ORDER_NUMBER`, `PENDING_DELIVERY_DATE`, `STORAGE_IN_DATE`, `STORAGE_OUT_DATE`, `NUMBER_OF_DAYS_IN_STORAGE`, `COORDINATOR_NOTE`, `HAULING`, `BOOKING`, `NOTE`) VALUES
(1421181262, 0, 'Interstate', '4 Bedroom House', '', '', '', '', 'JOHN WAYNE', '', '', '1515 PINE ST\r\nBILLINGS MT 59102', '', 'DENVER CO', '', '406-555-8888', '406-782-5543', '', '', '', 'no', 'yes', 'no', 0, 0, 0, ' ', 0, '', 0, 15000, '', 0, '0000-00-00', '0000-00-00', 0, '', 'King', 'King', ''),
(1421276718, 0, 'Local', '1 Bedroom House', '', '', '', '', 'JASON JAM', '', '', '402 CLARK', '', '', '', '406-555-4466', '', '', '', '', 'no', 'no', '', 0, 0, 0, ' ', 0, '', 0, 0, '', 0, '0000-00-00', '0000-00-00', 0, '', 'King', 'King', ''),
(1421466226, 0, 'Local', '-- Select --', '', '', '', '', 'MIKE GOMEZ', 'BILLINGS SAINT VINCENT HOSPITAL', '', '401 LACEY ROAD\r\nBILLINGS MT', '', '', '', 'H 406-647-5054', '', '', '', '', 'no', 'no', 'no', 0, 0, 0, ' ', 0, '', 0, 0, '', 0, '0000-00-00', '0000-00-00', 0, '', 'King', 'King', ''),
(1421467387, 0, 'Local', '-- Select --', '', '', '', '', '', 'WESTERN SUGAR', '', '', '', '', '', '', '', '', '', '', 'no', 'no', 'no', 0, 0, 0, ' ', 0, '', 0, 0, '', 0, '0000-00-00', '0000-00-00', 0, '', 'King', 'King', ''),
(1421469069, 0, 'Driver', '-- Select --', '', '', '', '', 'DRIVER HENRY MEYER', 'DARRYL FLOOD', '', '3785 VISTA ROAD\r\nBILLINGS MT 59102', '', '', '', '573-647-6820', '', '', '', '', 'no', 'no', 'no', 0, 0, 0, ' ', 0, '', 0, 0, '', 0, '0000-00-00', '0000-00-00', 0, '', 'King', 'King', ''),
(1421469309, 0, 'Interstate', '2 Bedroom House', '', '', '', '', 'JAMES HARDIN', '', '', '5 PINEY AVE\r\nSTORY, WY 82842', '', 'NORTH LITTLE ROCK, AR 72118', 'NATIONAL ACCT- VA-GOV', 'H 307-683-6373', 'C 307-461-3488', '', 'JAMES.HARDIN@VA.GOV', '', 'no', 'no', 'no', 0, 0, 0, ' ', 0, '8,458', 0, 0, 'U-591-30956-4', 0, '0000-00-00', '0000-00-00', 0, 'PBO/TOTES- COORDINATOR SAYS CHECK THEM & SEND. MORE THAN 25 WE COULD GET EXTRA LABOR APPROVED**\r\nUNITED SPECIAL INSTRUCTIONS-FULL PACK BY CARTON. HAS 2 DOUBLE & 2 QUEEN NOTED BUT SURVEY DIDN''T HAVE ANY MATTS. GLENDA DID SURVEY, MAYBE THEY DECIDED TO TAKE BEDS.**\r\nsdfgsdgf\r\nsdfg\r\nsdfg\r\nsdfg', 'Pending', 'King', 'ANOTHER TEST'),
(1421469805, 0, 'Local', '-- Select --', '', '', '', '', 'BUCK BROWN', 'DIEBOLD', '', '2021 MAIN STREET WELLS FARGO\r\nBillings,Mt', '', '', '', 'C 406-839-4674', '', '', '', '', 'no', 'no', 'no', 0, 0, 0, ' ', 0, '', 0, 0, '', 0, '0000-00-00', '0000-00-00', 0, '', 'King', 'King', ''),
(1421472091, 0, 'Interstate', '-- Select --', '', '', '', '', 'JESS ANDERSON', '', '', '309 W 111 ST #4\r\nMANHATTAN, NY 10026', '', '421 5TH STREET WEST\r\nBILLINGS MT 59102', '', '406-671-1114', '', '', '', '', 'no', 'no', 'no', 0, 0, 0, ' ', 0, '2800', 0, 0, 'U343-19136-4', 0, '0000-00-00', '0000-00-00', 0, '', 'Other', 'Other', ''),
(1421476278, 0, 'Interstate', '-- Select --', '', '', '', '', 'test', '', '', '', '', '', '', '', '', '', '', '', 'no', 'no', 'no', 0, 0, 0, ' ', 0, '', 0, 0, '', 0, '0000-00-00', '0000-00-00', 0, '', 'King', 'Other', '');

-- --------------------------------------------------------

--
-- Table structure for table `job_date`
--

CREATE TABLE IF NOT EXISTS `job_date` (
  `AUTOMATIC_NUMBER` int(15) NOT NULL AUTO_INCREMENT,
  `JOB_NUMBER` int(15) NOT NULL,
  `DATE` date NOT NULL,
  `DATE_TIME` datetime NOT NULL,
  `CALENDAR_ID` int(11) NOT NULL,
  `CALENDAR_NAME` varchar(25) COLLATE utf8_bin NOT NULL,
  `ENTERED_BY` varchar(50) COLLATE utf8_bin NOT NULL,
  `ENTERED_BY_ID` int(5) NOT NULL,
  `JOB_DAY_TYPE` varchar(20) COLLATE utf8_bin NOT NULL,
  `JOB_HOURS` varchar(10) COLLATE utf8_bin NOT NULL,
  `DAY_WEIGHT` varchar(8) COLLATE utf8_bin NOT NULL,
  `RATE` decimal(10,2) NOT NULL,
  `COST` decimal(10,2) NOT NULL,
  `NUMBER_OF_MEN` int(3) NOT NULL,
  `NAMES_OF_MEN` varchar(150) COLLATE utf8_bin NOT NULL,
  `DRIVER` varchar(50) COLLATE utf8_bin NOT NULL,
  `DRIVER_NUMBER` varchar(25) COLLATE utf8_bin NOT NULL,
  `TRUCK_NUMBER` varchar(25) COLLATE utf8_bin NOT NULL,
  `TRAILER_NUMBER` varchar(25) COLLATE utf8_bin NOT NULL,
  `HAULING` varchar(10) COLLATE utf8_bin NOT NULL,
  `DAY_NOTE` varchar(1000) COLLATE utf8_bin NOT NULL,
  `NUMBER_OF_DAYS` varchar(6) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`AUTOMATIC_NUMBER`),
  KEY `CALENDAR_ID` (`CALENDAR_ID`),
  KEY `JOB_NUMBER` (`JOB_NUMBER`),
  KEY `DATE_CALENDAR_ID` (`DATE`,`CALENDAR_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=514 ;

--
-- Dumping data for table `job_date`
--

INSERT INTO `job_date` (`AUTOMATIC_NUMBER`, `JOB_NUMBER`, `DATE`, `DATE_TIME`, `CALENDAR_ID`, `CALENDAR_NAME`, `ENTERED_BY`, `ENTERED_BY_ID`, `JOB_DAY_TYPE`, `JOB_HOURS`, `DAY_WEIGHT`, `RATE`, `COST`, `NUMBER_OF_MEN`, `NAMES_OF_MEN`, `DRIVER`, `DRIVER_NUMBER`, `TRUCK_NUMBER`, `TRAILER_NUMBER`, `HAULING`, `DAY_NOTE`, `NUMBER_OF_DAYS`) VALUES
(492, 1421181262, '9999-12-31', '9999-12-31 12:00:00', 3, 'XDELETED', 'GEORGE SPEARS', 2, 'Deleted', '', '', '0.00', '0.00', 3, '', '', '', '', '', '', '', '1/2'),
(493, 1421181262, '2015-01-23', '2015-01-23 08:00:00', 2, 'KING', 'GEORGE SPEARS', 2, 'Pack', '', '', '0.00', '0.00', 3, '', '', '', '', '', '', '', '1/3'),
(494, 1421181262, '2015-01-26', '2015-01-26 08:00:00', 2, 'KING', 'GEORGE SPEARS', 2, 'Pack', '', '', '0.00', '0.00', 3, '', '', '', '', '', '', '', '3/3'),
(495, 1421181262, '2015-01-27', '2015-01-27 08:00:00', 2, 'KING', 'GEORGE SPEARS', 2, 'Load', '', '', '0.00', '0.00', 0, '', '', '', '', '', '', '', '1/2'),
(496, 1421181262, '2015-01-28', '2015-01-28 08:00:00', 2, 'KING', 'GEORGE SPEARS', 2, 'Load', '', '', '0.00', '0.00', 0, '', '', '', '', '', '', '', '2/2'),
(497, 1421181262, '9999-12-31', '9999-12-31 12:00:00', 2, 'KING', 'GEORGE SPEARS', 2, 'Deleted', '', '', '0.00', '0.00', 0, '', '', '', '', '', '', '', '2/2'),
(498, 1421276718, '2015-01-23', '2015-01-23 08:00:00', 2, 'KING', 'GEORGE SPEARS', 2, 'Load/Unload', '4', '5000', '0.00', '0.00', 0, 'Matt', 'Keef', '', '', '', '', '', '1/1'),
(499, 1421181262, '2015-01-24', '2015-01-24 08:00:00', 2, 'KING', 'GEORGE SPEARS', 2, 'Pack', '', '', '0.00', '0.00', 0, '', '', '', '', '', '', '', '2/3'),
(500, 1421350455, '2015-01-15', '2015-01-15 08:00:00', 2, 'KING', 'GEORGE SPEARS', 2, 'Pack', '', '', '0.00', '0.00', 0, '', '', '', '', '', '', '', '1/1'),
(501, 1421466226, '2015-01-19', '2015-01-19 07:00:00', 2, 'KING', 'GEORGE SPEARS', 2, 'Unload', '', '', '0.00', '0.00', 3, '', 'KEEFER', 'MATT/ANGLE', '', '', '', 'LOCAL**UNLOADING A 53 FOOT TRAILER FOR SHIPPER**\r\nTAKE LIFTGATE TRAILER AND 16 FOOT RAMPS** \r\n6-8 HOURS**\r\nSHIPPER HAS A LARGE TOOL BOX THAT WILL REQUIRE LIFTGATE TRAILER AND A PIANO ALSO**\r\n\r\nLAST HOUSE ON LEFT (COMES UP ON GOOGLE MAPS INCORRECT PER SHIPPER)', '1/1'),
(502, 1421467387, '2015-01-19', '2015-01-19 07:00:00', 2, 'KING', 'GEORGE SPEARS', 2, 'Load', '', '', '0.00', '0.00', 1, '', '', '', '', '', '', '5 LOADS A DAY', '1/5'),
(503, 1421467387, '2015-01-20', '2015-01-20 07:00:00', 2, 'KING', 'GEORGE SPEARS', 2, 'Load', '', '', '0.00', '0.00', 1, '', '', '', '', '', '', '5 LOADS A DAY', '2/5'),
(504, 1421467387, '2015-01-21', '2015-01-21 07:00:00', 2, 'KING', 'GEORGE SPEARS', 2, 'Load', '', '', '0.00', '0.00', 1, '', '', '', '', '', '', '5 LOADS A DAY', '3/5'),
(505, 1421467387, '2015-01-22', '2015-01-22 07:00:00', 2, 'KING', 'GEORGE SPEARS', 2, 'Load', '', '', '0.00', '0.00', 1, '', '', '', '', '', '', '5 LOADS A DAY', '4/5'),
(506, 1421467387, '2015-01-23', '2015-01-23 07:00:00', 2, 'KING', 'GEORGE SPEARS', 2, 'Load', '', '', '0.00', '0.00', 1, '', '', '', '', '', '', '5 LOADS A DAY', '5/5'),
(507, 1421469069, '2015-01-19', '2015-01-19 11:30:00', 2, 'KING', 'GEORGE SPEARS', 2, 'Unload', '', '16000', '0.00', '0.00', 3, 'GEORGE 3/ MARSHAL', '', '', '', '', '', 'MEET AT KINGS', '1/1'),
(508, 1421469309, '2015-01-19', '2015-01-19 08:00:00', 2, 'KING', 'GEORGE SPEARS', 2, 'Pack', '', '', '0.00', '0.00', 0, 'KIM', 'FLINT', '', '', '', '', 'PBO/TOTES- COORDINATOR SAYS CHECK THEM & SEND. MORE THAN 25 WE COULD GET EXTRA LABOR APPROVED**\r\nUNITED SPECIAL INSTRUCTIONS-FULL PACK BY CARTON. HAS 2 DOUBLE & 2 QUEEN NOTED BUT SURVEY DIDN''T HAVE ANY MATTS. GLENDA DID SURVEY, MAYBE THEY DECIDED TO TAKE BEDS.**', '1/1'),
(509, 1421469309, '2015-01-20', '2015-01-20 08:00:00', 2, 'KING', 'GEORGE SPEARS', 2, 'Load', '', '', '0.00', '0.00', 0, '', 'FLINT', '', '', '', '', '', '1/1'),
(510, 1421469805, '2015-01-19', '2015-01-19 12:00:00', 2, 'KING', 'GEORGE SPEARS', 2, 'Other', '', '', '0.00', '0.00', 4, '', 'KEEFER', '', '', '', '', 'JOB CAN BE DONE 12:00-2:00 JUST KEEP BUCK POSTED**\r\nTAKE 1"PLYWOOD AND ITEMS FROM FRIDAYS JOB**', '1/1'),
(511, 1421472091, '2015-01-19', '2015-01-19 13:00:00', 2, 'KING', 'GEORGE SPEARS', 2, 'Storage Out', '', '', '0.00', '0.00', 2, '', '', '', '', '', '', 'INTER** DELIVER CAREVAN SHIPMENT**\r\nUNPACK 2 DOUBLE MATTS ONLY, TAKE HAND TOOLS AND HEX/ALLAN KEYS PER COORDINATOR**\r\n\r\n1/7 5PM CV-WILL BE STORED HERE AT KING TRANSFER PER ALLAN**', '1/1'),
(512, 1421476278, '2015-01-19', '2015-01-19 08:00:00', 2, 'KING', 'GEORGE SPEARS', 2, 'Pack', '', '', '0.00', '0.00', 0, '', '', '', '', '', '', '', '1/1'),
(513, 1421476278, '2015-01-20', '2015-01-20 08:00:00', 2, 'KING', 'GEORGE SPEARS', 2, 'Load', '', '', '0.00', '0.00', 0, '', '', '', '', '', '', '', '1/1');

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE IF NOT EXISTS `note` (
  `NOTE_ID` int(15) NOT NULL AUTO_INCREMENT,
  `JOB_NUMBER` int(15) NOT NULL,
  `DATE_TIME` datetime NOT NULL,
  `NOTE_SENT_BY_ID` int(5) NOT NULL,
  `NOTE_SENT_BY_NAME` varchar(50) COLLATE utf8_bin NOT NULL,
  `NOTE` varchar(2000) COLLATE utf8_bin NOT NULL,
  `VIEWED` int(1) NOT NULL,
  `EMPLOYEE_ID` int(5) NOT NULL,
  `NOTE_SENT_TO_NAME` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`NOTE_ID`),
  KEY `JOB_NUMBER` (`JOB_NUMBER`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=78 ;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`NOTE_ID`, `JOB_NUMBER`, `DATE_TIME`, `NOTE_SENT_BY_ID`, `NOTE_SENT_BY_NAME`, `NOTE`, `VIEWED`, `EMPLOYEE_ID`, `NOTE_SENT_TO_NAME`) VALUES
(1, 1, '2014-10-14 00:00:00', 3, 'CAROLYNN', 'CALL ON ESTIMATE FOR TEST ', 0, 0, ''),
(2, 2, '2014-10-14 00:00:00', 3, 'CAROLYNN', 'TEST9', 0, 0, ''),
(3, 2, '2014-10-14 00:00:00', 3, 'CAROLYNN', 'TEST2 test 30j;lkjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', 0, 0, ''),
(4, 2, '2014-10-14 00:00:00', 3, 'CAROLYNN', 'TEST3', 0, 0, ''),
(5, 1, '2014-10-14 00:00:00', 3, 'GEORGE', 'TEST4', 0, 0, ''),
(6, 0, '2014-10-27 00:00:00', 5, 'GEORGE', 'ASDFAFAF', 0, 0, ''),
(17, 0, '2014-10-30 00:00:00', 2, 'GEORGE SPEARS', 'this is a new test of the date time', 0, 2, ''),
(18, 0, '2014-10-30 00:00:00', 2, 'GEORGE SPEARS', 'ok lets try this', 0, 2, ''),
(19, 0, '2014-10-30 00:00:00', 2, 'GEORGE SPEARS', 'lkjhlkjhlkjhlkjh', 0, 2, ''),
(20, 0, '2014-10-30 00:00:00', 2, 'GEORGE SPEARS', '', 0, 2, ''),
(22, 0, '2014-10-30 03:24:11', 1, 'george', 'asdfasdf', 0, 1, ''),
(23, 0, '2014-10-30 22:41:07', 2, 'GEORGE SPEARS', '', 0, 2, ''),
(24, 0, '2014-10-30 22:42:27', 2, 'GEORGE SPEARS', 'ok', 0, 2, ''),
(25, 0, '2014-10-30 22:44:06', 2, 'GEORGE SPEARS', 'khkjhkjhkjhkjhkjhkhlkjhllllllllllllllrrrrrrrrrrrrrrrrrrrrrrr', 0, 2, ''),
(26, 0, '2014-10-30 15:55:05', 2, 'GEORGE SPEARS', 'jjjjju', 0, 2, ''),
(27, 0, '2014-10-30 16:12:01', 2, 'GEORGE SPEARS', 'bbbbnnnnnnnnnn', 0, 2, ''),
(28, 0, '2014-10-30 18:30:31', 2, 'GEORGE SPEARS', 'this is test 22', 0, 2, ''),
(29, 0, '2014-10-30 18:31:35', 2, 'GEORGE SPEARS', 'this is test 23', 0, 2, ''),
(30, 0, '2014-10-30 18:32:49', 2, 'GEORGE SPEARS', 'this is test24', 0, 2, ''),
(31, 0, '2014-10-30 19:03:39', 2, 'GEORGE SPEARS', 'test25', 0, 2, ''),
(32, 0, '2014-10-30 19:06:23', 2, 'GEORGE SPEARS', 'test26\r\n', 0, 2, ''),
(33, 0, '2014-10-30 19:08:09', 2, 'GEORGE SPEARS', 'test27', 0, 2, ''),
(34, 0, '2014-10-30 20:22:53', 2, 'GEORGE SPEARS', 'TONIGHT', 0, 2, ''),
(35, 0, '2014-10-30 20:28:33', 2, 'GEORGE SPEARS', 'YESSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS', 0, 2, ''),
(36, 0, '2014-10-30 20:31:53', 2, 'GEORGE SPEARS', 'LJKHLKJHLKJH', 0, 2, ''),
(37, 0, '2014-10-30 20:35:43', 2, 'GEORGE SPEARS', 'testet123 jkjhkjhkjhkjh\r\n123123', 0, 2, ''),
(38, 0, '2014-11-01 10:38:20', 2, 'GEORGE SPEARS', 'new\r\nkljhlkjhlkj yes\r\nkljhlkjhljkhasd', 0, 2, ''),
(39, 0, '2014-11-01 10:40:07', 2, 'GEORGE SPEARS', 'new', 0, 2, ''),
(40, 0, '2014-11-01 10:40:18', 2, 'GEORGE SPEARS', '1', 0, 2, ''),
(41, 0, '2014-11-01 10:48:12', 2, 'GEORGE SPEARS', 'w', 0, 2, ''),
(42, 0, '2014-11-01 10:49:44', 2, 'GEORGE SPEARS', '6', 0, 2, ''),
(43, 0, '2014-11-01 11:05:52', 2, 'GEORGE SPEARS', 'OK yes', 0, 2, ''),
(44, 0, '2014-11-11 00:22:35', 2, 'GEORGE SPEARS', 'jhgggjgjgjgjgjgjgjjg', 0, 2, ''),
(45, 0, '2014-11-14 07:08:20', 2, 'GEORGE SPEARS', 'THIS IS A TEST FOR EVERYBODY', 0, 1, ''),
(46, 0, '2014-11-14 07:08:20', 2, 'GEORGE SPEARS', 'THIS IS A TEST FOR EVERYBODY', 0, 2, ''),
(47, 0, '2014-11-14 07:08:20', 2, 'GEORGE SPEARS', 'THIS IS A TEST FOR EVERYBODY', 0, 10, ''),
(48, 0, '2014-11-14 07:08:20', 2, 'GEORGE SPEARS', 'THIS IS A TEST FOR EVERYBODY', 0, 12, ''),
(49, 0, '2014-11-14 07:09:15', 2, 'GEORGE SPEARS', 'THIS IS A TEST FOR ALLAN', 0, 1, ''),
(50, 0, '2014-11-14 16:39:05', 2, 'GEORGE SPEARS', '', 0, 1, ''),
(51, 0, '2014-11-14 16:39:54', 2, 'GEORGE SPEARS', '', 0, 2, ''),
(52, 0, '2014-11-14 17:32:35', 2, 'GEORGE SPEARS', '1', 0, 2, ''),
(53, 0, '2014-11-14 17:35:10', 2, 'GEORGE SPEARS', '', 0, 10, ''),
(54, 0, '2014-11-14 17:38:20', 2, 'GEORGE SPEARS', '', 0, 2, ''),
(55, 0, '2014-11-14 17:41:09', 2, 'GEORGE SPEARS', '', 0, 10, ''),
(56, 0, '2014-11-14 17:42:53', 2, 'GEORGE SPEARS', 'on', 0, 2, ''),
(57, 0, '2014-11-14 17:46:14', 2, 'GEORGE SPEARS', 'on', 0, 2, ''),
(58, 0, '2014-11-14 17:59:17', 2, 'on', '', 0, 1, ''),
(59, 0, '2014-11-14 18:08:19', 2, 'on', '', 0, 1, ''),
(60, 0, '2014-11-14 18:11:28', 2, 'GEORGE SPEARS', '', 0, 10, ''),
(61, 0, '2014-11-14 18:14:21', 2, 'GEORGE SPEARS', '', 0, 10, ''),
(62, 0, '2014-11-14 18:21:24', 2, 'GEORGE SPEARS', 'on', 0, 10, ''),
(63, 0, '2014-11-14 18:24:49', 2, 'GEORGE SPEARS', '1', 0, 1, ''),
(64, 0, '2014-11-14 18:25:58', 2, 'GEORGE SPEARS', '1', 0, 1, ''),
(65, 0, '2014-11-14 18:39:39', 2, 'GEORGE SPEARS', ';lkjl;kj;lkj;ljk', 0, 2, ''),
(66, 0, '2014-11-14 18:41:32', 2, 'GEORGE SPEARS', 'kjhlkjhlkjhlkjh', 0, 2, ''),
(67, 0, '2014-11-14 18:41:47', 2, 'GEORGE SPEARS', 'jhljhgjkhgkjhgjkhg', 0, 1, ''),
(68, 0, '2014-11-14 18:41:47', 2, 'GEORGE SPEARS', 'jhljhgjkhgkjhgjkhg', 0, 10, ''),
(69, 0, '2014-11-14 18:43:21', 2, 'GEORGE SPEARS', 'ggggggg', 0, 1, ''),
(70, 0, '2014-11-14 18:43:21', 2, 'GEORGE SPEARS', 'ggggggg', 0, 2, ''),
(71, 0, '2014-11-14 18:43:21', 2, 'GEORGE SPEARS', 'ggggggg', 0, 10, ''),
(72, 0, '2014-11-14 18:43:21', 2, 'GEORGE SPEARS', 'ggggggg', 0, 12, ''),
(73, 0, '2014-11-14 19:36:44', 2, 'GEORGE SPEARS', 'Please call jane\r\n406-656-5464', 0, 1, ''),
(74, 0, '2015-01-01 21:29:59', 2, 'GEORGE SPEARS', 'test', 0, 2, ''),
(75, 0, '2015-01-02 15:11:01', 2, 'GEORGE SPEARS', 'test', 0, 2, ''),
(76, 0, '2015-01-15 22:48:14', 2, 'GEORGE SPEARS', 'hi george', 0, 2, 'GEORGE SPEARS'),
(77, 0, '2015-01-15 23:04:29', 2, 'GEORGE SPEARS', 'test agine', 0, 8, 'CAROLYN');

--
-- Triggers `note`
--
DROP TRIGGER IF EXISTS `H`;
DELIMITER //
CREATE TRIGGER `H` AFTER INSERT ON `note`
 FOR EACH ROW INSERT INTO employee_note_id (EMPLOYEE_ID, NOTE_ID) VALUES (NEW.EMPLOYEE_ID, NEW.NOTE_ID)
//
DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 28, 2022 at 10:14 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `researcher`
--

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

DROP TABLE IF EXISTS `library`;
CREATE TABLE IF NOT EXISTS `library` (
  `recordid` int(11) NOT NULL AUTO_INCREMENT,
  `dt` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  PRIMARY KEY (`recordid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`recordid`, `dt`, `filename`) VALUES
(8, 1667380451, '1667380451 - ONLINE RESEARCH PROJECT MANAGEMENT SYSTEM KABUGO HERBERT 2019000977 MRU.docx'),
(9, 1667382513, '1667382513 - ONLINE RESEARCH PROJECT MANAGEMENT SYSTEM KABUGO HERBERT 2019000977 MRU.docx'),
(10, 1668263182, '1668263182 - Proposal Format for MRU.docx'),
(11, 1668263190, '1668263190 - ONLINE TAXI MANAGEMENT SYSTEM rsch for KABUGO HERBERT pdf.pdf'),
(12, 1668263197, '1668263197 - Research Guidelines_Muteesa-.docx'),
(13, 1668263203, '1668263203 - SUPERVIORS MRU IT.docx'),
(14, 1669114210, '1669114210 - SUPERVIORS MRU IT.docx');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `recordid` int(11) NOT NULL AUTO_INCREMENT,
  `dt` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `repositoryID` varchar(100) NOT NULL,
  `repositoryNotes` longblob NOT NULL,
  `studentID` varchar(100) NOT NULL,
  `respo_date` varchar(100) NOT NULL,
  `reg_no` varchar(50) NOT NULL,
  `project` varchar(100) NOT NULL,
  `research_approved` varchar(55) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`recordid`),
  UNIQUE KEY `repositoryID` (`repositoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`recordid`, `dt`, `title`, `repositoryID`, `repositoryNotes`, `studentID`, `respo_date`, `reg_no`, `project`, `research_approved`, `status`) VALUES
(18, 1669473168, 'It Support tech', 'uDJf3Sk7kYrj6hdVNr2zPgcuDZiNxT', 0x537570706f7274696e67204954, 'TQCYStvO9l6K3SPsTd4nuWhX51ytc8LL', '13/12/2017', '19/U/BIT/0954/M/DAY', '', 'FALSE', 1),
(23, 1669479190, 'Online Reservation System', 'xSZHMA1kBRBqRzy4V3p4Zu2ioScgba', 0x4b4a534e, 'TQCYStvO9l6K3SPsTd4nuWhX51ytc8LL', '26/11/2022', '19/U/BIT/0954/M/DAY', '', 'FALSE', 1),
(84, 1669548297, 'New Trends in Business Computing', '65bgdPJwtbcKCgAuBe9DEDJm0fkGhf', 0x4b4b4b4b4b, 'YSvcRbW5jEmUxE4nzkQW9l62QRA10POT', '12/12/2010', '20/U/BBA/2121/M', '762878910CHAPTER 4.docx', 'TRUE', 1),
(85, 1669672093, 'MRU Time table IMS', 'MqCEQPvfJnQa9coSt46g7HPIzNd8k1', 0x4d52552054696d65207461626c6520696e666f726d6174696f6e204d616e6167656d656e742053797374656d, 'e4j1KydvWEcL3YMXSF8rUb8z7JPmIz0b', '10/10/2022', '19/U/BIT/0235/M/DAY', '967307931CHAPTER 3.docx', 'FALSE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `recordid` int(11) NOT NULL AUTO_INCREMENT,
  `dt` int(15) NOT NULL,
  `account_id` varchar(50) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `reg_no` varchar(50) NOT NULL,
  `student_pwd` varchar(100) NOT NULL,
  `account_status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`recordid`),
  UNIQUE KEY `account_id` (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`recordid`, `dt`, `account_id`, `student_name`, `reg_no`, `student_pwd`, `account_status`) VALUES
(9, 1667302343, 'e4j1KydvWEcL3YMXSF8rUb8z7JPmIz0b', 'MBABAZI GRACE', '19/U/BIT/0235/M/DAY', 'lhte3n5s6y8o406155c97f01f15510718c1c403a84c7d8', 1),
(10, 1667302374, 'YXUGHrDpTDQbMs5i3RpKXFB7KhgaZatV', 'TUMUHEIRWE Michael', '19/U/BIT/1154/M/DAY', 'bd73kd9jmvsckcf804bff3b989d789fe8b4ac7fe8b6ec1', 1),
(11, 1667302406, 'Tz0Q9MvyDxNqpa8cBnAlQ0Of4zweUCD6', 'KABUGO HERBERT', '19/U/BIT/0977/M/DAY', '8goc3uy69wg0ok9b9bc5ac17198615a95e60bd077b4106', 1),
(12, 1667302443, 'TQCYStvO9l6K3SPsTd4nuWhX51ytc8LL', 'KALANDA JOAKIM', '19/U/BIT/0954/M/DAY', 'ho8qqx7ml60o8ke95566174b3c44e504d35529e4f5d04c', 1),
(13, 1667302472, 'eCy9Lj2FGX39AluU415gaYUvinZuQ0Lt', 'BUSSULWA GODFREY', '19/U/BIT/0572/M/DAY', '8e16syg3u4kkc4be6c9268ada828effc81c7682e967e4b', 1),
(14, 1667302536, 'Qmr2ucvCpluV1TLoedDWYiXlq56PzwvG', 'SSEKITO ROBERT', '19/U/BIT/0346/M/DAY', 'ly7037qx5qoc0of80e363e8df4c5a4d610ed93960d2427', 1),
(15, 1667302559, 'eZRjQpAao8wDvTH8CZBf0GWsOqJ0DtpB', 'KABAALU RONALD', '19/U/BIT/1095/M/DAY', 'b4cvn93hlog08843d01086c66c166ef6eca873f2a41e27', 1),
(16, 1667302587, 'TFNemAf4wSYygnPE8sr3duhiApcLxYv0', 'LUBOWA MORGAN JONATHAN', '19/U/BIT/1499/M/DAY', '65na3fy4f44kocf734cda44ff697ed260d59c312ccd610', 1),
(19, 1669536154, 'YSvcRbW5jEmUxE4nzkQW9l62QRA10POT', 'Peace Sylvia', '20/U/BBA/2121/M', 'nnwnr7rw61c8g40c49b01fc4212f716af0f70240b67966', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sys_admin`
--

DROP TABLE IF EXISTS `sys_admin`;
CREATE TABLE IF NOT EXISTS `sys_admin` (
  `recordid` int(11) NOT NULL AUTO_INCREMENT,
  `adminID` varchar(100) NOT NULL,
  `accountID` varchar(100) NOT NULL,
  `adminName` varchar(100) NOT NULL,
  `adminPassword` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`recordid`),
  UNIQUE KEY `adminID` (`adminID`),
  UNIQUE KEY `accountID` (`accountID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_admin`
--

INSERT INTO `sys_admin` (`recordid`, `adminID`, `accountID`, `adminName`, `adminPassword`, `status`) VALUES
(1, 'admin', 'DDITI837T8OI3875VO83BO9BT4BOLMM', 'Herbert Kabugo', 'r6f9v2nio34s8o60fd32dcd424cdd98071cc0b89eeb233', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

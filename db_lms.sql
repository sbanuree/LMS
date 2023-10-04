-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 04, 2023 at 01:24 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_letterresponse`
--

DROP TABLE IF EXISTS `tbl_letterresponse`;
CREATE TABLE IF NOT EXISTS `tbl_letterresponse` (
  `cl_lRID` int(11) NOT NULL AUTO_INCREMENT,
  `cl_lID` int(11) NOT NULL,
  `cl_lRStatus` int(11) NOT NULL DEFAULT '1',
  `cl_lRComment` text NOT NULL,
  PRIMARY KEY (`cl_lRID`),
  KEY `cl_lID` (`cl_lID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_letterresponse`
--

INSERT INTO `tbl_letterresponse` (`cl_lRID`, `cl_lID`, `cl_lRStatus`, `cl_lRComment`) VALUES
(1, 1, 1, 'Newly Submitted'),
(2, 2, 1, 'Newly Submitted'),
(3, 3, 1, 'Newly Submitted');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_letters`
--

DROP TABLE IF EXISTS `tbl_letters`;
CREATE TABLE IF NOT EXISTS `tbl_letters` (
  `cl_lID` int(11) NOT NULL AUTO_INCREMENT,
  `cl_lToWhom` int(11) NOT NULL,
  `cl_lByWhom` int(11) NOT NULL,
  `cl_lSubject` text NOT NULL,
  `cl_lDate` date NOT NULL,
  `cl_lDescription` text NOT NULL,
  `cl_attachment` text NOT NULL,
  PRIMARY KEY (`cl_lID`),
  KEY `cl_lToWhom` (`cl_lToWhom`),
  KEY `cl_lByWhom` (`cl_lByWhom`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_letters`
--

INSERT INTO `tbl_letters` (`cl_lID`, `cl_lToWhom`, `cl_lByWhom`, `cl_lSubject`, `cl_lDate`, `cl_lDescription`, `cl_attachment`) VALUES
(1, 1, 1, 'Testing', '2023-10-04', 'Testing Body', 'assets/attachments/Testing.'),
(2, 1, 1, 'Testing', '2023-10-04', 'Testing Body', 'assets/attachments/Testing.'),
(3, 1, 1, 'Testing2', '2023-10-04', 'Testing Body', 'assets/attachments/Testing2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `cl_userID` int(11) NOT NULL AUTO_INCREMENT,
  `cl_uTypeID` int(11) NOT NULL,
  `cl_userName` varchar(500) NOT NULL,
  `cl_userLogin` varchar(50) NOT NULL,
  `cl_userPassword` varchar(50) NOT NULL,
  PRIMARY KEY (`cl_userID`),
  KEY `cl_uTypeID` (`cl_uTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`cl_userID`, `cl_uTypeID`, `cl_userName`, `cl_userLogin`, `cl_userPassword`) VALUES
(1, 1, 'IT', 'admin', 'admin'),
(2, 4, 'MCIT Archive', 'archive', 'archive'),
(3, 3, 'Finance', 'finance', 'finance'),
(4, 2, 'Dean of MCIT', 'dean', 'dean');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userassignedrights`
--

DROP TABLE IF EXISTS `tbl_userassignedrights`;
CREATE TABLE IF NOT EXISTS `tbl_userassignedrights` (
  `cl_uARightID` int(11) NOT NULL AUTO_INCREMENT,
  `cl_uTypeID` int(11) NOT NULL,
  `cl_uRightID` int(11) NOT NULL,
  `cl_uState` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cl_uARightID`),
  KEY `cl_uTypeID` (`cl_uTypeID`),
  KEY `cl_uRightID` (`cl_uRightID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userrights`
--

DROP TABLE IF EXISTS `tbl_userrights`;
CREATE TABLE IF NOT EXISTS `tbl_userrights` (
  `cl_uRightID` int(11) NOT NULL AUTO_INCREMENT,
  `cl_uRightName` varchar(500) NOT NULL,
  PRIMARY KEY (`cl_uRightID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usertype`
--

DROP TABLE IF EXISTS `tbl_usertype`;
CREATE TABLE IF NOT EXISTS `tbl_usertype` (
  `cl_uTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `cl_uType` varchar(500) NOT NULL,
  PRIMARY KEY (`cl_uTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_usertype`
--

INSERT INTO `tbl_usertype` (`cl_uTypeID`, `cl_uType`) VALUES
(1, 'Admin'),
(2, 'Senior'),
(3, 'Department'),
(4, 'Archive');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_letterresponse`
--
ALTER TABLE `tbl_letterresponse`
  ADD CONSTRAINT `tbl_letterresponse_ibfk_1` FOREIGN KEY (`cl_lID`) REFERENCES `tbl_letters` (`cl_lID`);

--
-- Constraints for table `tbl_letters`
--
ALTER TABLE `tbl_letters`
  ADD CONSTRAINT `tbl_letters_ibfk_1` FOREIGN KEY (`cl_lByWhom`) REFERENCES `tbl_user` (`cl_userID`),
  ADD CONSTRAINT `tbl_letters_ibfk_2` FOREIGN KEY (`cl_lToWhom`) REFERENCES `tbl_user` (`cl_userID`);

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`cl_uTypeID`) REFERENCES `tbl_usertype` (`cl_uTypeID`);

--
-- Constraints for table `tbl_userassignedrights`
--
ALTER TABLE `tbl_userassignedrights`
  ADD CONSTRAINT `tbl_userassignedrights_ibfk_1` FOREIGN KEY (`cl_uTypeID`) REFERENCES `tbl_usertype` (`cl_uTypeID`),
  ADD CONSTRAINT `tbl_userassignedrights_ibfk_2` FOREIGN KEY (`cl_uRightID`) REFERENCES `tbl_userrights` (`cl_uRightID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: localhost    Database: marklee
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Job`
--

DROP TABLE IF EXISTS `Job`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Job` (
  `JobID` int(11) NOT NULL AUTO_INCREMENT,
  `ClientTitle` varchar(8) DEFAULT NULL,
  `ClientName` varchar(32) DEFAULT NULL,
  `Company` varchar(32) DEFAULT NULL,
  `Email` varchar(64) DEFAULT NULL,
  `ContactNumber` varchar(16) DEFAULT NULL,
  `JobTitle` varchar(16) DEFAULT NULL,
  `JobType` varchar(16) DEFAULT NULL,
  `Address` varchar(32) DEFAULT NULL,
  `City` varchar(32) DEFAULT NULL,
  `Description` text,
  PRIMARY KEY (`JobID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `UserID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Email` varchar(64) NOT NULL,
  `FirstName` varchar(64) NOT NULL,
  `LastName` varchar(64) NOT NULL,
  `DOB` date NOT NULL,
  `Address` varchar(64) NOT NULL,
  `City` varchar(64) NOT NULL,
  `ZipCode` varchar(16) NOT NULL,
  `Suburb` varchar(32) NOT NULL,
  `PhoneNumber` varchar(32) NOT NULL,
  `Gender` varchar(8) NOT NULL,
  `UserPasswd` varchar(64) NOT NULL,
  `UserType` varchar(16) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-07-29 14:39:49

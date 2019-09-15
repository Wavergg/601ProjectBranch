-- MySQL dump 10.17  Distrib 10.3.16-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: marklee
-- ------------------------------------------------------
-- Server version	10.3.16-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Candidate`
--

DROP TABLE IF EXISTS `Candidate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Candidate` (
  `CandidateID` int(11) NOT NULL AUTO_INCREMENT,
  `JobInterest` varchar(64) DEFAULT NULL,
  `JobType` varchar(64) DEFAULT NULL,
  `JobCV` varchar(64) DEFAULT NULL,
  `Transportation` varchar(64) DEFAULT NULL,
  `LicenseNumber` varchar(64) DEFAULT NULL,
  `ClassLicense` varchar(64) DEFAULT NULL,
  `Endorsement` varchar(64) DEFAULT NULL,
  `Citizenship` varchar(64) DEFAULT NULL,
  `Nationality` varchar(64) DEFAULT NULL,
  `PassportCountry` varchar(64) DEFAULT NULL,
  `PassportNumber` varchar(64) DEFAULT NULL,
  `CompensationInjury` varchar(64) DEFAULT NULL,
  `CompensationDateFrom` varchar(64) DEFAULT NULL,
  `CompensationDateTo` varchar(64) DEFAULT NULL,
  `Asthma` varchar(8) DEFAULT NULL,
  `BlackOut` varchar(8) DEFAULT NULL,
  `Diabetes` varchar(8) DEFAULT NULL,
  `Bronchitis` varchar(8) DEFAULT NULL,
  `BackInjury` varchar(8) DEFAULT NULL,
  `Deafness` varchar(8) DEFAULT NULL,
  `Dermatitis` varchar(8) DEFAULT NULL,
  `SkinInfection` varchar(8) DEFAULT NULL,
  `Allergies` varchar(8) DEFAULT NULL,
  `Hernia` varchar(8) DEFAULT NULL,
  `HighBloodPressure` varchar(8) DEFAULT NULL,
  `HeartProblems` varchar(8) DEFAULT NULL,
  `UsingDrugs` varchar(8) DEFAULT NULL,
  `UsingContactLenses` varchar(8) DEFAULT NULL,
  `RSI` varchar(8) DEFAULT NULL,
  `Dependants` varchar(8) DEFAULT NULL,
  `Smoke` varchar(8) DEFAULT NULL,
  `Conviction` varchar(8) DEFAULT NULL,
  `ConvictionDetails` varchar(64) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `JobID` int(11) DEFAULT NULL,
  `CandidateHoursWorked` int(11) DEFAULT 0,
  `CandidateNotes` varchar(64) DEFAULT NULL,
  `CandidateEarnings` decimal(13,2) DEFAULT 0.00,
  `JobRate` decimal(13,2) DEFAULT 0.00,
  `WorkPermitNumber` varchar(45) DEFAULT NULL,
  `WorkPermitExpiry` date DEFAULT NULL,
  `Checked` varchar(8) DEFAULT NULL,
  `CandidateStatus` varchar(16) DEFAULT '',
  `UserPicture` varchar(64) DEFAULT NULL,
  `YoutubeURL` varchar(96) DEFAULT '',
  `ApplyDate` datetime DEFAULT NULL,
  PRIMARY KEY (`CandidateID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Candidate`
--

LOCK TABLES `Candidate` WRITE;
/*!40000 ALTER TABLE `Candidate` DISABLE KEYS */;
INSERT INTO `Candidate` VALUES (1,'Driver','FullTime',NULL,'','','','','','','','','','0000-00-00','0000-00-00','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',2,NULL,0,'',0.00,0.00,'','0000-00-00','true','removed',NULL,'','2019-09-15 18:07:34'),(2,'Stalker','FullTime','2CV.pdf','','','','','','','','','','0000-00-00','0000-00-00','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',3,NULL,0,'123',0.00,0.00,'','0000-00-00','true','removed',NULL,'','2019-09-15 16:14:22'),(3,'Bob','FullTime',NULL,'','','','','','','','','','0000-00-00','0000-00-00','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',4,NULL,0,'',0.00,0.00,'','0000-00-00','true','removed',NULL,'https://www.youtube.com/watch?v=4D3Xn0MmQmg','2019-09-15 16:14:22'),(4,'POP','FullTime',NULL,'','','','','','','','','','0000-00-00','0000-00-00','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',5,1,0,'SHIFT',0.00,0.00,'','0000-00-00',NULL,'',NULL,'','2019-09-15 14:51:34'),(5,'Driver','',NULL,'','','','','','','','','','0000-00-00','0000-00-00','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',6,0,0,'',0.00,0.00,'','0000-00-00',NULL,'',NULL,'','2019-09-15 15:33:22'),(6,'Sailor','',NULL,'','','','','','','','','','0000-00-00','0000-00-00','false','false','true','false','false','true','false','false','false','false','false','false','false','false','false','false','false','false','',7,NULL,0,'pepeog',0.00,0.00,'','0000-00-00',NULL,'',NULL,'https://www.youtube.com/watch?v=ki4l7ld8j4s&list=RDki4l7ld8j4s&start_radio=1','2019-09-15 20:25:24'),(7,'Driver','',NULL,'','','','','','','','0909asdf','','1999-03-03','0000-00-00','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',8,NULL,0,'',0.00,0.00,'','0000-00-00','true','removed',NULL,'','2019-09-15 18:22:17'),(8,'Chef','FullTime','8CV.pdf','','','','','','','','','','0000-00-00','0000-00-00','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',10,NULL,0,'',0.00,0.00,'','0000-00-00',NULL,'','8m69ca9z7sbk31.jpg','','2019-09-15 22:29:21');
/*!40000 ALTER TABLE `Candidate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Citizenship`
--

DROP TABLE IF EXISTS `Citizenship`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Citizenship` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Citizenship` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=245 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Citizenship`
--

LOCK TABLES `Citizenship` WRITE;
/*!40000 ALTER TABLE `Citizenship` DISABLE KEYS */;
INSERT INTO `Citizenship` VALUES (1,'Afghanistan'),(2,'Åland Islands'),(3,'Albania'),(4,'Algeria'),(5,'American Samoa'),(6,'Andorra'),(7,'Angola'),(8,'Anguilla'),(9,'Antarctica'),(10,'Antigua and Barbuda'),(11,'Argentina'),(12,'Armenia'),(13,'Aruba'),(14,'Australia'),(15,'Austria'),(16,'Azerbaijan'),(17,'Bahamas'),(18,'Bahrain'),(19,'Bangladesh'),(20,'Barbados'),(21,'Belarus'),(22,'Belgium'),(23,'Belize'),(24,'Benin'),(25,'Bermuda'),(26,'Bhutan'),(27,'Bolivia'),(28,'Bosnia and Herzegovina'),(29,'Botswana'),(30,'Bouvet Island'),(31,'Brazil'),(32,'British Indian Ocean Territory'),(33,'Brunei Darussalam'),(34,'Bulgaria'),(35,'Burkina Faso'),(36,'Burundi'),(37,'Cambodia'),(38,'Cameroon'),(39,'Canada'),(40,'Cape Verde'),(41,'Cayman Islands'),(42,'Central African Republic'),(43,'Chad'),(44,'Chile'),(45,'China'),(46,'Christmas Island'),(47,'Cocos (Keeling) Islands'),(48,'Colombia'),(49,'Comoros'),(50,'Congo'),(51,'Congo, The Democratic Republic of The'),(52,'Cook Islands'),(53,'Costa Rica'),(54,'Cote D\'ivoire'),(55,'Croatia'),(56,'Cuba'),(57,'Cyprus'),(58,'Czech Republic'),(59,'Denmark'),(60,'Djibouti'),(61,'Dominica'),(62,'Dominican Republic'),(63,'Ecuador'),(64,'Egypt'),(65,'El Salvador'),(66,'Equatorial Guinea'),(67,'Eritrea'),(68,'Estonia'),(69,'Ethiopia'),(70,'Falkland Islands (Malvinas)'),(71,'Faroe Islands'),(72,'Fiji'),(73,'Finland'),(74,'France'),(75,'French Guiana'),(76,'French Polynesia'),(77,'French Southern Territories'),(78,'Gabon'),(79,'Gambia'),(80,'Georgia'),(81,'Germany'),(82,'Ghana'),(83,'Gibraltar'),(84,'Greece'),(85,'Greenland'),(86,'Grenada'),(87,'Guadeloupe'),(88,'Guam'),(89,'Guatemala'),(90,'Guernsey'),(91,'Guinea'),(92,'Guinea-bissau'),(93,'Guyana'),(94,'Haiti'),(95,'Heard Island and Mcdonald Islands'),(96,'Holy See (Vatican City State)'),(97,'Honduras'),(98,'Hong Kong'),(99,'Hungary'),(100,'Iceland'),(101,'India'),(102,'Indonesia'),(103,'Iran, Islamic Republic of'),(104,'Iraq'),(105,'Ireland'),(106,'Isle of Man'),(107,'Israel'),(108,'Italy'),(109,'Jamaica'),(110,'Japan'),(111,'Jersey'),(112,'Jordan'),(113,'Kazakhstan'),(114,'Kenya'),(115,'Kiribati'),(116,'Korea, Democratic People\'s Republic of'),(117,'Korea, Republic of'),(118,'Kuwait'),(119,'Kyrgyzstan'),(120,'Lao People\'s Democratic Republic'),(121,'Latvia'),(122,'Lebanon'),(123,'Lesotho'),(124,'Liberia'),(125,'Libyan Arab Jamahiriya'),(126,'Liechtenstein'),(127,'Lithuania'),(128,'Luxembourg'),(129,'Macao'),(130,'Macedonia, The Former Yugoslav Republic of'),(131,'Madagascar'),(132,'Malawi'),(133,'Malaysia'),(134,'Maldives'),(135,'Mali'),(136,'Malta'),(137,'Marshall Islands'),(138,'Martinique'),(139,'Mauritania'),(140,'Mauritius'),(141,'Mayotte'),(142,'Mexico'),(143,'Micronesia, Federated States of'),(144,'Moldova, Republic of'),(145,'Monaco'),(146,'Mongolia'),(147,'Montenegro'),(148,'Montserrat'),(149,'Morocco'),(150,'Mozambique'),(151,'Myanmar'),(152,'Namibia'),(153,'Nauru'),(154,'Nepal'),(155,'Netherlands'),(156,'Netherlands Antilles'),(157,'New Caledonia'),(158,'New Zealand'),(159,'Nicaragua'),(160,'Niger'),(161,'Nigeria'),(162,'Niue'),(163,'Norfolk Island'),(164,'Northern Mariana Islands'),(165,'Norway'),(166,'Oman'),(167,'Pakistan'),(168,'Palau'),(169,'Palestinian Territory, Occupied'),(170,'Panama'),(171,'Papua New Guinea'),(172,'Paraguay'),(173,'Peru'),(174,'Philippines'),(175,'Pitcairn'),(176,'Poland'),(177,'Portugal'),(178,'Puerto Rico'),(179,'Qatar'),(180,'Reunion'),(181,'Romania'),(182,'Russian Federation'),(183,'Rwanda'),(184,'Saint Helena'),(185,'Saint Kitts and Nevis'),(186,'Saint Lucia'),(187,'Saint Pierre and Miquelon'),(188,'Saint Vincent and The Grenadines'),(189,'Samoa'),(190,'San Marino'),(191,'Sao Tome and Principe'),(192,'Saudi Arabia'),(193,'Senegal'),(194,'Serbia'),(195,'Seychelles'),(196,'Sierra Leone'),(197,'Singapore'),(198,'Slovakia'),(199,'Slovenia'),(200,'Solomon Islands'),(201,'Somalia'),(202,'South Africa'),(203,'South Georgia and The South Sandwich Islands'),(204,'Spain'),(205,'Sri Lanka'),(206,'Sudan'),(207,'Suriname'),(208,'Svalbard and Jan Mayen'),(209,'Swaziland'),(210,'Sweden'),(211,'Switzerland'),(212,'Syrian Arab Republic'),(213,'Taiwan, Province of China'),(214,'Tajikistan'),(215,'Tanzania, United Republic of'),(216,'Thailand'),(217,'Timor-leste'),(218,'Togo'),(219,'Tokelau'),(220,'Tonga'),(221,'Trinidad and Tobago'),(222,'Tunisia'),(223,'Turkey'),(224,'Turkmenistan'),(225,'Turks and Caicos Islands'),(226,'Tuvalu'),(227,'Uganda'),(228,'Ukraine'),(229,'United Arab Emirates'),(230,'United Kingdom'),(231,'United States'),(232,'United States Minor Outlying Islands'),(233,'Uruguay'),(234,'Uzbekistan'),(235,'Vanuatu'),(236,'Venezuela'),(237,'Viet Nam'),(238,'Virgin Islands, British'),(239,'Virgin Islands, U.S.'),(240,'Wallis and Futuna'),(241,'Western Sahara'),(242,'Yemen'),(243,'Zambia'),(244,'Zimbabwe');
/*!40000 ALTER TABLE `Citizenship` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `City`
--

DROP TABLE IF EXISTS `City`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `City` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CityName` varchar(24) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `City`
--

LOCK TABLES `City` WRITE;
/*!40000 ALTER TABLE `City` DISABLE KEYS */;
INSERT INTO `City` VALUES (1,'Auckland'),(2,'Christchurch'),(3,'Dunedin'),(4,'Gisborne'),(5,'Greymouth'),(6,'Hamilton'),(7,'Hawera'),(8,'Hokitika'),(9,'Invercargill'),(10,'Kerikeri'),(11,'Levin'),(12,'Lower Hutt'),(13,'Masterton'),(14,'Napier'),(15,'Nelson'),(16,'New Plymouth'),(17,'Northcote'),(18,'Palmerston North'),(19,'Paraparaumu beach'),(20,'Porirua Pa'),(21,'Pukekohe East'),(22,'Taupo'),(23,'Tauranga'),(24,'Te Anau'),(25,'Thames'),(26,'Timaru'),(27,'Tokoroa'),(28,'Turangi'),(29,'Waioruarangi'),(30,'Waitakere'),(31,'Waitangi'),(32,'Wanaka'),(33,'Wanganui'),(34,'Wellington'),(35,'Westport'),(36,'Whakatane'),(37,'Otago');
/*!40000 ALTER TABLE `City` ENABLE KEYS */;
UNLOCK TABLES;

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
  `JobTitle` varchar(32) DEFAULT NULL,
  `JobType` varchar(16) DEFAULT NULL,
  `Address` varchar(32) DEFAULT NULL,
  `City` varchar(32) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Suburb` varchar(32) DEFAULT NULL,
  `Editor1` varchar(2048) DEFAULT NULL,
  `ThumbnailText` varchar(255) DEFAULT NULL,
  `JobStatus` varchar(15) DEFAULT '',
  `PublishTitle` varchar(64) DEFAULT NULL,
  `PublishDate` date DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL,
  `Bookmark` varchar(5) DEFAULT 'false',
  `JobImage` blob DEFAULT NULL,
  `Checked` varchar(8) DEFAULT NULL,
  `JobSubmittedDate` date DEFAULT NULL,
  `TOB` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`JobID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Job`
--

LOCK TABLES `Job` WRITE;
/*!40000 ALTER TABLE `Job` DISABLE KEYS */;
INSERT INTO `Job` VALUES (1,'Mrs.','Robert','SmithJones','smitherens@gmail.com','02392011','Hitman','PartTime','Dee st 3','Invercargill','','Invercargill','<p>monka</p>','123','active','Experienced Truck Driver','2019-09-15','2019-09-15 22:57:13','false','1mdql1zd0wel31.jpg',NULL,NULL,NULL),(2,'Miss','July','Broker','bastion@gmail.com','1023912','sss','PartTime','5 Dee St','Auckland','','Potitika','<p>For further information please contact us or email us at <a href=\"mailto:mark@leerecruitment.co.nz\"><strong>mark@leerecruitment.co.nz</strong></a></p>','','completed','PartTime sss worker needed in Auckland','2019-09-15','2019-09-15 19:14:07','false','2DNSPAG.png','true',NULL,'MySig.png'),(3,'Dr.','powp','sdafasdf','klhjdljigcdbscjkdk@gts.com','+13012011','xxzsdfs','FullTime','012919 st','Napier','','Napier','<p>For further information please contact us or email us at <a href=\"mailto:mark@leerecruitment.co.nz\"><strong>mark@leerecruitment.co.nz</strong></a></p>','','published','FullTime xxzsdfs worker needed in Napier','2019-09-15','2019-09-15 16:44:53','false','3kappa.png',NULL,NULL,NULL),(4,'Miss','Kevin','tart','anyTeam@gmail.com','+13012011','sdaf','PartTime','5 Dee St','Invercargill','','Invercargill','For further information please contact us or email us at <a href=\"mailto:mark@leerecruitment.co.nz\"><strong>mark@leerecruitment.co.nz</strong></a>','','','PartTime sdaf worker needed in Invercargill','2019-09-15','2019-09-15 22:25:23','false','4MySig.PNG','true','2019-09-15','RiskIssues.pdf');
/*!40000 ALTER TABLE `Job` ENABLE KEYS */;
UNLOCK TABLES;

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
  `VisitedCandidate` datetime DEFAULT NULL,
  `VisitedClient` datetime DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES (1,'william@gmail.com','waver','edwin','1995-04-08','LithSt','Invercargill','9810','Gleggary','272727','male','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92','admin','2019-09-15 22:39:40','2019-09-15 22:57:17'),(2,'anyTeam@gmail.com','SIT','TEAM','0000-00-00','5 Dee St','Invercargill','9810','Invercargill','+13012011','','3a852f90bbc8896c884a7a9edcfacf5b1edc8841f9a8b10ea9d7f09b67df5168','candidate',NULL,'0000-00-00 00:00:00'),(3,'anyTeam@gmail.com','SIT','TEAM','0000-00-00','5 Dee St','Invercargill','9810','Invercargill','+13012011','','b60eb19eadf1d98e1489a3a94a7f1da40239814ecab265b08e2ebaaf03dc08d7','candidate',NULL,'0000-00-00 00:00:00'),(4,'anyTeam@gmail.com','SIT','TEAM','0000-00-00','5 Dee St','Invercargill','9810','Invercargill','+13012011','','f66ba21241552178cd412a3a36732d027e05aa7264bb6771768806cb55401111','candidate',NULL,'0000-00-00 00:00:00'),(5,'ivy@gmail.com','shift','poop','0000-00-00','stick 3 st','Palmerston North','9810','Invercargill','+13012011','male','0214916d2390d76ddf464ddb83e0b75128b55f790bd95d934fd260f6e05f47cd','candidate',NULL,'0000-00-00 00:00:00'),(6,'anyTeam@gmail.com','SIT','TEAM','0000-00-00','5 Dee St','Invercargill','9810','Invercargill','+13012011','','7eedb4033210a55b0aab364c2b19ada492723fd3a8b0b911cdc488410e3bbf27','candidate',NULL,'0000-00-00 00:00:00'),(7,'ivy@gmail.com','ivy','li','0000-00-00','5 Dee St','Invercargill','9810','Invercargill','','','c3a468b313023d3734c2ec3a9098852352e8ae7e0efb1aad3540fea457e6672e','candidate',NULL,'0000-00-00 00:00:00'),(8,'ultimateformj@gmail.com','William','Edwin','2000-11-12','Dee st 3','Invercargill','9810','Invercargill','0276245998','','5c2b46335ba69d08d543db4cf90c9b5d028bd357c42e36d8cf69c596035e0ff0','candidate',NULL,'0000-00-00 00:00:00'),(9,'waverdt@gmail.com','waver','list','0000-00-00','','','','','','','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92','staff','2019-09-15 18:45:51','2019-09-15 18:45:57'),(10,'ultimateformj@gmail.com','William','Edwin','0000-00-00','Dee st 3','Invercargill','9810','Invercargill','0276245998','male','c0637c74b7f1b18e625f68aff59d247d63914fe16916ae1913f9b822d3fa7171','candidate',NULL,NULL);
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-15 23:25:56

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
-- Table structure for table `candidate`
--

DROP TABLE IF EXISTS `candidate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `candidate` (
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
  `CandidateCV` blob DEFAULT NULL,
  `Checked` varchar(8) DEFAULT NULL,
  `ApplyDate` date DEFAULT '1920-10-10',
  PRIMARY KEY (`CandidateID`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candidate`
--

LOCK TABLES `candidate` WRITE;
/*!40000 ALTER TABLE `candidate` DISABLE KEYS */;
INSERT INTO `candidate` VALUES (70,'Sales','FullTime','70.docx','','','','','','','','','','','','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',141,NULL,0,'Good promising candidate',0.00,0.00,'','0000-00-00',NULL,'true','2019-09-02'),(71,'Sales','FullTime','71.pdf','Limousine','91239812','Class1 Learner','Bad driving habits','','','','','','','','false','false','false','false','false','false','false','false','true','false','false','false','false','false','false','false','false','false','',142,NULL,0,'',0.00,0.00,'','0000-00-00',NULL,'true','2019-09-02'),(72,'Lumberjack\'s','FullTime','72.png','Limousine','sl\'s<p>','Class1 Restricted','bad\'s','','','','','','','','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',142,NULL,0,'',0.00,0.00,'','0000-00-00',NULL,'true','2019-09-02'),(74,'Lumberjack\'s','PartTime','74.pdf','','','','','','','','','','','','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',144,NULL,0,'',0.00,0.00,'','0000-00-00',NULL,'true','2019-09-02');
/*!40000 ALTER TABLE `candidate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `citizenship`
--

DROP TABLE IF EXISTS `citizenship`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `citizenship` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Citizenship` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=245 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citizenship`
--

LOCK TABLES `citizenship` WRITE;
/*!40000 ALTER TABLE `citizenship` DISABLE KEYS */;
INSERT INTO `citizenship` VALUES (1,'Afghanistan'),(2,'Åland Islands'),(3,'Albania'),(4,'Algeria'),(5,'American Samoa'),(6,'Andorra'),(7,'Angola'),(8,'Anguilla'),(9,'Antarctica'),(10,'Antigua and Barbuda'),(11,'Argentina'),(12,'Armenia'),(13,'Aruba'),(14,'Australia'),(15,'Austria'),(16,'Azerbaijan'),(17,'Bahamas'),(18,'Bahrain'),(19,'Bangladesh'),(20,'Barbados'),(21,'Belarus'),(22,'Belgium'),(23,'Belize'),(24,'Benin'),(25,'Bermuda'),(26,'Bhutan'),(27,'Bolivia'),(28,'Bosnia and Herzegovina'),(29,'Botswana'),(30,'Bouvet Island'),(31,'Brazil'),(32,'British Indian Ocean Territory'),(33,'Brunei Darussalam'),(34,'Bulgaria'),(35,'Burkina Faso'),(36,'Burundi'),(37,'Cambodia'),(38,'Cameroon'),(39,'Canada'),(40,'Cape Verde'),(41,'Cayman Islands'),(42,'Central African Republic'),(43,'Chad'),(44,'Chile'),(45,'China'),(46,'Christmas Island'),(47,'Cocos (Keeling) Islands'),(48,'Colombia'),(49,'Comoros'),(50,'Congo'),(51,'Congo, The Democratic Republic of The'),(52,'Cook Islands'),(53,'Costa Rica'),(54,'Cote D\'ivoire'),(55,'Croatia'),(56,'Cuba'),(57,'Cyprus'),(58,'Czech Republic'),(59,'Denmark'),(60,'Djibouti'),(61,'Dominica'),(62,'Dominican Republic'),(63,'Ecuador'),(64,'Egypt'),(65,'El Salvador'),(66,'Equatorial Guinea'),(67,'Eritrea'),(68,'Estonia'),(69,'Ethiopia'),(70,'Falkland Islands (Malvinas)'),(71,'Faroe Islands'),(72,'Fiji'),(73,'Finland'),(74,'France'),(75,'French Guiana'),(76,'French Polynesia'),(77,'French Southern Territories'),(78,'Gabon'),(79,'Gambia'),(80,'Georgia'),(81,'Germany'),(82,'Ghana'),(83,'Gibraltar'),(84,'Greece'),(85,'Greenland'),(86,'Grenada'),(87,'Guadeloupe'),(88,'Guam'),(89,'Guatemala'),(90,'Guernsey'),(91,'Guinea'),(92,'Guinea-bissau'),(93,'Guyana'),(94,'Haiti'),(95,'Heard Island and Mcdonald Islands'),(96,'Holy See (Vatican City State)'),(97,'Honduras'),(98,'Hong Kong'),(99,'Hungary'),(100,'Iceland'),(101,'India'),(102,'Indonesia'),(103,'Iran, Islamic Republic of'),(104,'Iraq'),(105,'Ireland'),(106,'Isle of Man'),(107,'Israel'),(108,'Italy'),(109,'Jamaica'),(110,'Japan'),(111,'Jersey'),(112,'Jordan'),(113,'Kazakhstan'),(114,'Kenya'),(115,'Kiribati'),(116,'Korea, Democratic People\'s Republic of'),(117,'Korea, Republic of'),(118,'Kuwait'),(119,'Kyrgyzstan'),(120,'Lao People\'s Democratic Republic'),(121,'Latvia'),(122,'Lebanon'),(123,'Lesotho'),(124,'Liberia'),(125,'Libyan Arab Jamahiriya'),(126,'Liechtenstein'),(127,'Lithuania'),(128,'Luxembourg'),(129,'Macao'),(130,'Macedonia, The Former Yugoslav Republic of'),(131,'Madagascar'),(132,'Malawi'),(133,'Malaysia'),(134,'Maldives'),(135,'Mali'),(136,'Malta'),(137,'Marshall Islands'),(138,'Martinique'),(139,'Mauritania'),(140,'Mauritius'),(141,'Mayotte'),(142,'Mexico'),(143,'Micronesia, Federated States of'),(144,'Moldova, Republic of'),(145,'Monaco'),(146,'Mongolia'),(147,'Montenegro'),(148,'Montserrat'),(149,'Morocco'),(150,'Mozambique'),(151,'Myanmar'),(152,'Namibia'),(153,'Nauru'),(154,'Nepal'),(155,'Netherlands'),(156,'Netherlands Antilles'),(157,'New Caledonia'),(158,'New Zealand'),(159,'Nicaragua'),(160,'Niger'),(161,'Nigeria'),(162,'Niue'),(163,'Norfolk Island'),(164,'Northern Mariana Islands'),(165,'Norway'),(166,'Oman'),(167,'Pakistan'),(168,'Palau'),(169,'Palestinian Territory, Occupied'),(170,'Panama'),(171,'Papua New Guinea'),(172,'Paraguay'),(173,'Peru'),(174,'Philippines'),(175,'Pitcairn'),(176,'Poland'),(177,'Portugal'),(178,'Puerto Rico'),(179,'Qatar'),(180,'Reunion'),(181,'Romania'),(182,'Russian Federation'),(183,'Rwanda'),(184,'Saint Helena'),(185,'Saint Kitts and Nevis'),(186,'Saint Lucia'),(187,'Saint Pierre and Miquelon'),(188,'Saint Vincent and The Grenadines'),(189,'Samoa'),(190,'San Marino'),(191,'Sao Tome and Principe'),(192,'Saudi Arabia'),(193,'Senegal'),(194,'Serbia'),(195,'Seychelles'),(196,'Sierra Leone'),(197,'Singapore'),(198,'Slovakia'),(199,'Slovenia'),(200,'Solomon Islands'),(201,'Somalia'),(202,'South Africa'),(203,'South Georgia and The South Sandwich Islands'),(204,'Spain'),(205,'Sri Lanka'),(206,'Sudan'),(207,'Suriname'),(208,'Svalbard and Jan Mayen'),(209,'Swaziland'),(210,'Sweden'),(211,'Switzerland'),(212,'Syrian Arab Republic'),(213,'Taiwan, Province of China'),(214,'Tajikistan'),(215,'Tanzania, United Republic of'),(216,'Thailand'),(217,'Timor-leste'),(218,'Togo'),(219,'Tokelau'),(220,'Tonga'),(221,'Trinidad and Tobago'),(222,'Tunisia'),(223,'Turkey'),(224,'Turkmenistan'),(225,'Turks and Caicos Islands'),(226,'Tuvalu'),(227,'Uganda'),(228,'Ukraine'),(229,'United Arab Emirates'),(230,'United Kingdom'),(231,'United States'),(232,'United States Minor Outlying Islands'),(233,'Uruguay'),(234,'Uzbekistan'),(235,'Vanuatu'),(236,'Venezuela'),(237,'Viet Nam'),(238,'Virgin Islands, British'),(239,'Virgin Islands, U.S.'),(240,'Wallis and Futuna'),(241,'Western Sahara'),(242,'Yemen'),(243,'Zambia'),(244,'Zimbabwe');
/*!40000 ALTER TABLE `citizenship` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `city` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CityName` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (1,'Auckland'),(2,'Christchurch'),(3,'Dunedin'),(4,'Gisborne'),(5,'Greymouth'),(6,'Hamilton'),(7,'Hawera'),(8,'Hokitika'),(9,'Invercargill'),(10,'Kerikeri'),(11,'Levin'),(12,'Lower Hutt'),(13,'Masterton'),(14,'Napier'),(15,'Nelson'),(16,'New Plymouth'),(17,'Northcote'),(18,'Palmerston North'),(19,'Paraparaumu Beac'),(20,'Porirua Pa'),(21,'Pukekohe East'),(22,'Taupo'),(23,'Tauranga'),(24,'Te Anau'),(25,'Thames'),(26,'Timaru'),(27,'Tokoroa'),(28,'Turangi'),(29,'Waioruarangi'),(30,'Waitakere'),(31,'Waitangi'),(32,'Wanaka'),(33,'Wanganui'),(34,'Wellington'),(35,'Westport'),(36,'Whakatane'),(37,'Otago');
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job`
--

DROP TABLE IF EXISTS `job`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job` (
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
  `JobSubmittedDate` date DEFAULT NULL,
  `Bookmark` varchar(5) DEFAULT 'false',
  `JobImage` blob DEFAULT NULL,
  `Checked` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`JobID`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job`
--

LOCK TABLES `job` WRITE;
/*!40000 ALTER TABLE `job` DISABLE KEYS */;
INSERT INTO `job` VALUES (41,'-','Jonesmn\'s','Octopis\'s','ivy@gmail.com','+13012011','Driver','FullTime','5 Lomb\'s st','Invercargill','','Invercargill','<ul>\r\n <li>1</li>\r\n <li>3</li>\r\n <li>5</li>\r\n</ul>\r\n\r\n<p> </p>\r\n\r\n<p>pepego&#39;s</p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>','&lt;?php echo \'monkas\';?&gt;trihardmonk\'s<p xss=removed class=\"display-3\">ll</p>','published','trihard\'s monkas','2019-09-02','2019-09-02','false','41CarSales.jpg','true');
/*!40000 ALTER TABLE `job` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
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
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (54,'william@gmail.com','waver','edwin','1995-04-08','LithSt','Invercargill','9810','Gleggary','272727','male','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92','admin'),(140,'LeeRecruitment:pepothink@gmail.com','PepoThink','WeirdChamp','0000-00-00','Queen\'s drive 45 ','Invercargill','9810','Invercargill','027237222','male','2830478c54081a28a8f5ee577fcb18cae55e12daefc95b7b3dadd638717cd8cf','candidate'),(141,'LeeRecruitment:pepothink@gmail.com','pepothink','weirdchamp','0000-00-00','123 main st','Invercargill','9810','Invercargill','3012011','male','bcc90fec27692b84ca0dca97fa2425ef146ba1d972d138a6a05fe251603a6bc5','candidate'),(142,'ultimateformj@gmail.com','William\'s','Edwin\'just','1999-11-03','queen\'s drive 3','Invercargill','9810','Gleggary','0276245998','male','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92','candidate'),(143,'LeeRecruitment:greg@2gmail.com','miche','TEAM','0000-00-00','queen\'s drive 3','Invercargill','9810','Napier','0129319','male','2970330fb5d743da559e822a54fe7a385a3481e58518cb48aa880ff978bfa84f','candidate'),(144,'LeeRecruitment:ivy@gmail.com','miche\'s','bob\'s','0000-00-00','queen\'s drive 3','Invercargill','9180','pop\'d','12351231512','male','31cc878ac5121a3737db55a0b05c296080cc1ed8d8ec9a290e9a7b4cf9c49b4b','candidate');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-02 14:05:01

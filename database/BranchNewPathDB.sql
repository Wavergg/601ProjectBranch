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
  `Checked` varchar(8) DEFAULT NULL,
  `CandidateStatus` varchar(16) DEFAULT '',
  `UserPicture` varchar(64) DEFAULT NULL,
  `YoutubeURL` varchar(96) DEFAULT '',
  `ApplyDate` datetime DEFAULT NULL,
  `JobInterest2` varchar(64) NOT NULL DEFAULT '',
  `PictureHeight` int(11) DEFAULT 150,
  `PictureWidth` int(11) DEFAULT 150,
  PRIMARY KEY (`CandidateID`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candidate`
--

LOCK TABLES `candidate` WRITE;
/*!40000 ALTER TABLE `candidate` DISABLE KEYS */;
INSERT INTO `candidate` VALUES (1,'Driver','FullTime',NULL,'','','','','','','','','','0000-00-00','0000-00-00','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',2,NULL,0,'',0.00,0.00,'','0000-00-00','true','removed',NULL,'','2019-09-15 18:07:34','',150,150),(2,'Stalker','FullTime','2CV.pdf','','','','','','','','','','0000-00-00','0000-00-00','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',3,NULL,0,'',0.00,0.00,'','0000-00-00','true','removed',NULL,'','2019-09-15 16:14:22','',150,150),(3,'Bob','FullTime',NULL,'','','','','','','','','','0000-00-00','0000-00-00','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',4,0,0,'',0.00,0.00,'','0000-00-00','true','removed',NULL,'https://www.youtube.com/watch?v=4D3Xn0MmQmg','2019-09-15 16:14:22','',150,150),(4,'POP','FullTime',NULL,'','','','','','','','','','','','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',5,0,11,'enigma',121.00,11.00,'','0000-00-00',NULL,'',NULL,'','2019-09-26 11:48:27','nibber',100,100),(5,'Driver','',NULL,'','','','','','','','','','0000-00-00','0000-00-00','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',6,0,0,'pepeg',0.00,0.00,'','0000-00-00','true','removed',NULL,'','2019-09-24 11:30:45','',150,150),(6,'Sailor','',NULL,'','','','','','','','','','0000-00-00','0000-00-00','false','false','true','false','false','true','false','false','false','false','false','false','false','false','false','false','false','false','',7,NULL,0,'',0.00,0.00,'','0000-00-00',NULL,'',NULL,'https://www.youtube.com/watch?v=ki4l7ld8j4s&list=RDki4l7ld8j4s&start_radio=1','2019-09-15 20:25:24','',150,150),(7,'Driver','',NULL,'','','','','','','','0909asdf','','1999-03-03','0000-00-00','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',8,NULL,0,'',0.00,0.00,'','0000-00-00','true','removed',NULL,'','2019-09-15 18:22:17','',150,150),(8,'Chef','FullTime','8CV.pdf','','','','','','','','','','0000-00-00','0000-00-00','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',10,0,12,'asdasd',180.00,15.00,'','0000-00-00','true','removed','8m69ca9z7sbk31.jpg','','2019-09-24 11:30:19','',150,150),(9,'Pepegon','FullTime','pxb698no84m31.jpg','','','','','','','','','','0000-00-00','0000-00-00','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',11,0,0,'',0.00,0.00,'','0000-00-00',NULL,'','9lg7t2n40sgm31.jpg','https://www.youtube.com/watch?v=-HUE0oLb15c','2019-09-17 11:38:54','',150,150),(10,'peper','FullTime','mdql1zd0wel31.jpg','','','','','','','','','','0000-00-00','0000-00-00','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',12,0,0,'',0.00,0.00,'','0000-00-00',NULL,'','10pxb698no84m31.jpg','https://www.youtube.com/watch?v=ki4l7ld8j4s&list=RDki4l7ld8j4s&start_radio=1','2019-09-16 14:57:27','',150,150),(11,'Driver','FullTime','11CV.pdf','','','','','','','','','','0000-00-00','0000-00-00','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',13,NULL,0,'',0.00,0.00,'','0000-00-00','true','removed',NULL,'','2019-09-24 11:30:54','',150,150),(12,'Driver','FullTime','12CV.pdf','','','','','','','','','','0000-00-00','0000-00-00','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',14,NULL,0,'',0.00,0.00,'','0000-00-00','true','removed',NULL,'','2019-09-24 11:30:53','',150,150),(13,'Driver','FullTime',NULL,'','','','','','','','','','0000-00-00','0000-00-00','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',15,NULL,0,'',0.00,0.00,'','0000-00-00','true','removed',NULL,'','2019-09-24 11:30:52','',150,150),(14,'Driver','FullTime',NULL,'','','','','','','','','','0000-00-00','0000-00-00','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',16,NULL,0,'',0.00,0.00,'','0000-00-00','true','removed',NULL,'','2019-09-24 11:30:51','',150,150),(15,'Driver','FullTime','15CV.png','','','trihard','','','','','','','','','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',17,NULL,0,'dumbell',0.00,0.00,'','0000-00-00','true','removed',NULL,'','2019-09-24 11:30:42','',150,150),(16,'Chef','FullTime','16CV.pdf','','','','','','','','','','0000-00-00','0000-00-00','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',18,NULL,0,'trihard',0.00,0.00,'','0000-00-00',NULL,'',NULL,'','2019-09-21 23:50:43','',150,150),(17,'Chef','FullTime',NULL,'','','','','','','','','','0000-00-00','0000-00-00','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',19,NULL,0,'',0.00,0.00,'','0000-00-00',NULL,'',NULL,'','2019-09-18 21:55:37','',150,150),(18,'dsaf','',NULL,'','','','','','','','','','0000-00-00','0000-00-00','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',20,NULL,0,'pepeg',0.00,0.00,'','0000-00-00','true','removed',NULL,'','2019-09-23 23:34:54','',150,150),(19,'Robber','PartTime','19CV.png','','','','','','','','','','0000-00-00','0000-00-00','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',21,NULL,0,'',0.00,0.00,'','0000-00-00','true','removed',NULL,'','2019-09-24 11:30:50','',150,150),(20,'Robber','PartTime','20CV.png','','','','','','','','','','0000-00-00','0000-00-00','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',22,NULL,0,'',0.00,0.00,'','0000-00-00','true','removed',NULL,'','2019-09-24 11:30:50','',150,150),(21,'Chef','','21CV.png','','','','','','','','','','','','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',23,NULL,0,'',0.00,0.00,'','0000-00-00','true','removed',NULL,'','2019-09-24 13:15:30','pepe',150,150),(22,'','',NULL,'','','','','','','','','','0000-00-00','0000-00-00','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',24,NULL,0,'',0.00,0.00,'','0000-00-00',NULL,'',NULL,'','2019-09-18 22:21:55','',150,150),(23,'','','23CV.xlsm','','','','','','','','','','0000-00-00','0000-00-00','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',25,NULL,0,'',0.00,0.00,'','0000-00-00',NULL,'',NULL,'','2019-09-18 22:22:48','',150,150),(24,'','','24CV.png','','','','','','','','','','0000-00-00','0000-00-00','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',26,NULL,0,'',0.00,0.00,'','0000-00-00',NULL,'',NULL,'','2019-09-18 22:23:11','',150,150),(25,'','',NULL,'','','','','','','','','','0000-00-00','0000-00-00','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',27,NULL,0,'',0.00,0.00,'','0000-00-00',NULL,'',NULL,'','2019-09-18 23:15:54','',150,150),(27,'truck (driver)','',NULL,'','','','','','','','','','0000-00-00','0000-00-00','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',29,NULL,0,'',0.00,0.00,'','0000-00-00',NULL,'',NULL,'','2019-09-18 22:49:16','',150,150),(28,'','',NULL,'','','','','','','','','','0000-00-00','0000-00-00','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',30,NULL,0,'',0.00,0.00,'','0000-00-00',NULL,'',NULL,'','2019-09-19 00:02:40','',150,150),(29,'','',NULL,'','','','','','','','','','0000-00-00','0000-00-00','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',31,NULL,0,'',0.00,0.00,'','0000-00-00',NULL,'',NULL,'','2019-09-19 00:04:30','',150,150),(30,'','',NULL,'','','','','','','','','','0000-00-00','0000-00-00','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',32,NULL,0,'',0.00,0.00,'','0000-00-00',NULL,'',NULL,'','2019-09-19 00:14:31','',150,150),(31,'','',NULL,'','','','','','','','','','0000-00-00','0000-00-00','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',33,NULL,0,'',0.00,0.00,'','0000-00-00',NULL,'',NULL,'','2019-09-19 00:14:53','',150,150),(32,'','',NULL,'','','','','','','','','','0000-00-00','0000-00-00','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',34,NULL,0,'\'bore\\n\'',0.00,0.00,'','0000-00-00','true','removed',NULL,'','2019-09-24 11:30:18','',150,150),(33,'','',NULL,'','','','','','','','','','0000-00-00','0000-00-00','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','trihard\nkappa',35,NULL,0,'mom \nfat',0.00,0.00,'','0000-00-00','true','removed',NULL,'','2019-09-24 11:30:17','',150,150),(34,'Driver','FullTime',NULL,'','','','','','','','','','0000-00-00','0000-00-00','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',36,NULL,0,'bad\ntrihard\nadsf',0.00,0.00,'','0000-00-00','true','removed',NULL,'','2019-09-24 11:30:18','',150,150),(35,'Chef','',NULL,'','','','','','','','','','0000-00-00','0000-00-00','true','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',37,NULL,0,'',0.00,0.00,'','0000-00-00','true','removed',NULL,'','2019-09-24 11:30:18','',150,150),(36,'xxzsdfs','PartTime',NULL,'','','','','','','','','','0000-00-00','0000-00-00','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','',38,NULL,0,'',0.00,0.00,'','0000-00-00','true','removed',NULL,'','2019-09-24 11:30:19','',150,150),(37,'r','FullTime','37CV.docx','','','','','','','','','','','','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','minefield',39,NULL,0,'No jok',0.00,0.00,'','0000-00-00','true','removed','37DNSPAG.png','','2019-09-24 11:14:22','potter',150,150);
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
  `CityName` varchar(24) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (1,'Auckland'),(2,'Christchurch'),(3,'Dunedin'),(4,'Gisborne'),(5,'Greymouth'),(6,'Hamilton'),(7,'Hawera'),(8,'Hokitika'),(9,'Invercargill'),(10,'Kerikeri'),(11,'Levin'),(12,'Lower Hutt'),(13,'Masterton'),(14,'Napier'),(15,'Nelson'),(16,'New Plymouth'),(17,'Northcote'),(18,'Palmerston North'),(19,'Paraparaumu beach'),(20,'Porirua Pa'),(21,'Pukekohe East'),(22,'Taupo'),(23,'Tauranga'),(24,'Te Anau'),(25,'Thames'),(26,'Timaru'),(27,'Tokoroa'),(28,'Turangi'),(29,'Waioruarangi'),(30,'Waitakere'),(31,'Waitangi'),(32,'Wanaka'),(33,'Wanganui'),(34,'Wellington'),(35,'Westport'),(36,'Whakatane'),(37,'Otago');
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client` (
  `ClientID` int(11) NOT NULL AUTO_INCREMENT,
  `ClientTitle` varchar(8) DEFAULT NULL,
  `ClientName` varchar(32) DEFAULT NULL,
  `Company` varchar(32) DEFAULT NULL,
  `Email` varchar(64) DEFAULT NULL,
  `ContactNumber` varchar(16) DEFAULT NULL,
  `Address` varchar(32) DEFAULT NULL,
  `City` varchar(32) DEFAULT NULL,
  `Suburb` varchar(32) DEFAULT NULL,
  `ClientStatus` varchar(16) DEFAULT '',
  `UpdateDate` datetime DEFAULT NULL,
  PRIMARY KEY (`ClientID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
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
  `UpdateDate` datetime DEFAULT NULL,
  `Bookmark` varchar(5) DEFAULT 'false',
  `JobImage` blob DEFAULT NULL,
  `Checked` varchar(8) DEFAULT NULL,
  `JobSubmittedDate` date DEFAULT NULL,
  `TOB` varchar(64) DEFAULT NULL,
  `ClientID` int(11) DEFAULT NULL,
  PRIMARY KEY (`JobID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job`
--

LOCK TABLES `job` WRITE;
/*!40000 ALTER TABLE `job` DISABLE KEYS */;
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
  `VisitedCandidate` datetime DEFAULT NULL,
  `VisitedClient` datetime DEFAULT NULL,
  `PreferencePanel` varchar(16) DEFAULT 'default',
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'william@gmail.com','waver','edwin','1995-04-08','LithSt','Invercargill','9810','Gleggary','272727','male','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92','admin','2019-09-27 18:26:51','2019-09-27 18:53:11','2by2Small'),(2,'anyTeam@gmail.com','SIT','TEAM','0000-00-00','5 Dee St','Invercargill','9810','Invercargill','+13012011','','3a852f90bbc8896c884a7a9edcfacf5b1edc8841f9a8b10ea9d7f09b67df5168','candidate',NULL,'0000-00-00 00:00:00','default'),(3,'anyTeam@gmail.com','SIT','TEAM','0000-00-00','5 Dee St','Invercargill','9810','Invercargill','+13012011','','b60eb19eadf1d98e1489a3a94a7f1da40239814ecab265b08e2ebaaf03dc08d7','candidate',NULL,'0000-00-00 00:00:00','default'),(4,'anyTeam@gmail.com','SIT','TEAM','0000-00-00','5 Dee St','Invercargill','9810','Invercargill','+13012011','','f66ba21241552178cd412a3a36732d027e05aa7264bb6771768806cb55401111','candidate',NULL,'0000-00-00 00:00:00','default'),(5,'ivy@gmail.com','shift','poop','0000-00-00','stick 3 st','Palmerston North','9810','Invercargill','+13012011','male','0214916d2390d76ddf464ddb83e0b75128b55f790bd95d934fd260f6e05f47cd','candidate',NULL,'0000-00-00 00:00:00','default'),(6,'anyTeam@gmail.com','SIT','TEAM','0000-00-00','5 Dee St','Invercargill','9810','Invercargill','+13012011','','7eedb4033210a55b0aab364c2b19ada492723fd3a8b0b911cdc488410e3bbf27','candidate',NULL,'0000-00-00 00:00:00','default'),(7,'ivy@gmail.com','ivy','li','0000-00-00','5 Dee St','Invercargill','9810','Invercargill','','','c3a468b313023d3734c2ec3a9098852352e8ae7e0efb1aad3540fea457e6672e','candidate',NULL,'0000-00-00 00:00:00','default'),(8,'ultimateformj@gmail.com','William','Edwin','2000-11-12','Dee st 3','Invercargill','9810','Invercargill','0276245998','','5c2b46335ba69d08d543db4cf90c9b5d028bd357c42e36d8cf69c596035e0ff0','candidate',NULL,'0000-00-00 00:00:00','default'),(9,'waverdt@gmail.com','waver','list','0000-00-00','','','','','','','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92','staff','2019-09-19 00:32:30','2019-09-16 14:37:58','default'),(10,'ultimateformj@gmail.com','William','Edwin','0000-00-00','Dee st 3','Invercargill','9810','Invercargill','0276245998','male','c0637c74b7f1b18e625f68aff59d247d63914fe16916ae1913f9b822d3fa7171','candidate',NULL,NULL,'default'),(11,'ivy@gmail.com','Potato','li','0000-00-00','5 Dee St','Invercargill','9810','Invercargill','','female','4ca11bc5a230a49e92114a38153cf4f80b3ae8c4ef44255e7222553a68102b58','candidate',NULL,NULL,'default'),(12,'anyTeam@gmail.com','SIT','TEAM','0000-00-00','5 Dee St','Invercargill','9810','Invercargill','+13012011','','df51419f515e85f45b79ded82ecb6230390dfae010f10649775f8c2d74bddcdd','candidate',NULL,NULL,'default'),(13,'ultimateformj@gmail.com','William','Edwin','0000-00-00','Dee st 3','Invercargill','9810','Invercargill','0276245998','','9eea496e1a53c6b5b15659cf663194662078c870c57b37a6138afc6bbf9892fe','candidate',NULL,NULL,'default'),(14,'ultimateformj@gmail.com','William','Edwin','0000-00-00','Dee st 3','Invercargill','9810','Invercargill','0276245998','','49bdf9d3758163cb7641f781b99d49df647d4a5c65e1b4cf96f5d7fd5e05eec0','candidate',NULL,NULL,'default'),(15,'ivy@gmail.com','ivy','li','0000-00-00','5 Dee St','Invercargill','9810','Invercargill','','female','60c80a5bfdbf8a04799fe23ca0ecd716a5dc52299bee7f7071888b6b82a226df','candidate',NULL,NULL,'default'),(16,'ivy@gmail.com','ivy','li','0000-00-00','5 Dee St','Invercargill','9810','Invercargill','','female','4faf84bbd809e13750033dac0787430d8f823d32fb21b2bd4d693d6212bb56f5','candidate',NULL,NULL,'default'),(17,'ivy@gmail.com','ivy','li','0000-00-00','5 Dee St','Invercargill','9810','Invercargill','','female','592087c518ff275cdc47adb8917ccac8692126bd207d814216cff9d6ad331958','candidate',NULL,NULL,'default'),(18,'ultimateformj@gmail.com','William','Edwin','0000-00-00','Dee st 3','Invercargill','9810','Invercargill','0276245998','','efadca1ed384fc32b97d7a775bbe11c7d550c9a9d28d40fad3fe4fdd17f04876','candidate',NULL,NULL,'default'),(19,'ultimateformj@gmail.com','William','Edwin','0000-00-00','Dee st 3','Invercargill','9810','Invercargill','0276245998','','7551e2b77b951de5dcaeb1f610d9d5969ceb2184583a58c718d378e353d033ff','candidate',NULL,NULL,'default'),(20,'ultimateformj@gmail.com','William','Edwin','0000-00-00','Dee st 3','Invercargill','9810','Invercargill','0276245998','','c8f98c20c18143149e6e6851bc5aae8aaf6732c754469d36ed71fc3102b2e777','candidate',NULL,NULL,'default'),(21,'anyTeam@gmail.com','SIT','TEAM','0000-00-00','5 Dee St','Invercargill','9810','Invercargill','+13012011','','bfb0a95f33bda7a905725cd0beea0be1d85ca44f6c1b37ea5e05dd6b8cf4c4c6','candidate',NULL,NULL,'default'),(22,'anyTeam@gmail.com','SIT','TEAM','0000-00-00','5 Dee St','Invercargill','9810','Invercargill','+13012011','','b6575108909b2fee33d2c37ae8645ebe0aa6c4c024ddb51b6cfbfe8137f53bba','candidate',NULL,NULL,'default'),(23,'anyTeam@gmail.com','SIT','TEAM','0000-00-00','5 Dee St','Invercargill','9810','Invercargill','+13012011','','24922c0d5ed63cfe5b8fa715c3d906632c989dffc986d926f3d87357b611a34e','candidate',NULL,NULL,'default'),(24,'anyTeam@gmail.com','SIT','TEAM','0000-00-00','5 Dee St','Invercargill','9810','','+13012011','','11652b69f122bf2d25f62c22731cf55a3db71478b85c448b1bbd8e5a0912bdc9','candidate',NULL,NULL,'default'),(25,'ivy@gmail.com','ivy','li','0000-00-00','5 Dee St','Invercargill','9810','','','','0d2f59b5ab741f10bfe1f887c84dc45780d0c484c8c917c9d37e030f199403bb','candidate',NULL,NULL,'default'),(26,'ivy@gmail.com','ivy','li','0000-00-00','5 Dee St','Invercargill','9810','','','','f939c2ec9149cb98f80e5c2c8b2d92055daaaa2f99ce1ad8d7036cd7d9b82695','candidate',NULL,NULL,'default'),(27,'ivy@gmail.com','ivy','li','0000-00-00','5 Dee St','Invercargill','9810','','','','34c4ac0b00d1f212484021fbf7832cf33de586aa68e2fca6308a4fb2a2172efd','candidate',NULL,NULL,'default'),(28,'ivy@gmail.com','ivy','li','0000-00-00','5 Dee St','Invercargill','9810','','','','ca2521d3537d127b7529856a9d9cb06257ef0c38598b3a6f3b93bb7e98311933','candidate',NULL,NULL,'default'),(30,'ultimateformj@gmail.com','William','Edwin','0000-00-00','Dee st 3','Invercargill','9810','','0276245998','','81c6c5d3243634ee4a821ed33c87e6909af09296b04944263de806e2d0d13b1f','candidate',NULL,NULL,'default'),(31,'ultimateformj@gmail.com','William','Edwin','0000-00-00','Dee st 3','Invercargill','9810','','0276245998','','83955f5abd729e2ae87c5640f69967b6383a5f16f91906ebe193d19766ee5de4','candidate',NULL,NULL,'default'),(32,'anyTeam@gmail.com','SIT','TEAM','0000-00-00','5 Dee St','Invercargill','9810','','+13012011','','dcfa49a09b08dd12658a7995ef5edd8a8eb0e64b6ef700d62aaf446dc1539199','candidate',NULL,NULL,'default'),(33,'anyTeam@gmail.com','SIT','TEAM','0000-00-00','5 Dee St','Invercargill','9810','','+13012011','','4fee72755565a1ca2471c87fef0a140dcf8d4f3ca311ee2e1a47d5f6a7117809','candidate',NULL,NULL,'default'),(34,'ivy@gmail.com','ivy','li','0000-00-00','5 Dee St','Invercargill','9810','','','','2c78e858198d034c19b8be7c664985e5920241e9c976b2f97b99527884cb01d8','candidate',NULL,NULL,'default'),(35,'ultimateformj@gmail.com','William','Edwin','0000-00-00','Dee st 3','Invercargill','9810','','0276245998','','0e149f6a350ad38f147359a87a999fb67e3b7392539e62f6cddb4ea24abcf929','candidate',NULL,NULL,'default'),(36,'ultimateformj@gmail.com','William','Edwin','0000-00-00','Dee st 3','Invercargill','9810','Invercargill','0276245998','','00d72adb25603eda0d124a78a93e5ee0a0fac37641df7e88959ef24292931fa3','candidate',NULL,NULL,'default'),(37,'anyTeam@gmail.com','SIT','TEAM','0000-00-00','5 Dee St','Invercargill','9810','Invercargill','+13012011','','98bf8083d77a5990e04809a8c13ad4f86ac74d23a681debdc375bc7a81120dec','candidate',NULL,NULL,'default'),(38,'trivel@gmail.com','Vie','Grison','0000-00-00','Highway 34 st','Napier','0000','','1231231','','843a38d3759ce83f1b273328dbb98d3886ff5d7b1a034868c8fd6eb62549a564','candidate',NULL,NULL,'default'),(39,'anyTeam@gmail.com','SIT','TEAM','0000-00-00','5 Dee St','Invercargill','9810','Invercargill','3012011','','ca7df773639a303d42b42cf841aa5887a1c38d78a02079f5f8c35d761fbfcb0a','candidate',NULL,NULL,'default');
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

-- Dump completed on 2019-09-27 18:56:42

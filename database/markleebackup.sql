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
  `jobInterest` varchar(64) DEFAULT NULL,
  `jobType` varchar(64) DEFAULT NULL,
  `jobCV` varchar(64) DEFAULT NULL,
  `transportation` varchar(64) DEFAULT NULL,
  `LicenseNumber` varchar(64) DEFAULT NULL,
  `classLicense` varchar(64) DEFAULT NULL,
  `endorsement` varchar(64) DEFAULT NULL,
  `citizenship` varchar(64) DEFAULT NULL,
  `nationality` varchar(64) DEFAULT NULL,
  `passportCountry` varchar(64) DEFAULT NULL,
  `passportNumber` varchar(64) DEFAULT NULL,
  `compensationInjury` varchar(64) DEFAULT NULL,
  `compensationDateFrom` varchar(64) DEFAULT NULL,
  `compensationDateTo` varchar(64) DEFAULT NULL,
  `asthma` varchar(2) DEFAULT NULL,
  `blackOut` varchar(2) DEFAULT NULL,
  `diabetes` varchar(2) DEFAULT NULL,
  `bronchitis` varchar(2) DEFAULT NULL,
  `backInjury` varchar(2) DEFAULT NULL,
  `deafness` varchar(2) DEFAULT NULL,
  `dermatitis` varchar(2) DEFAULT NULL,
  `skinInfection` varchar(2) DEFAULT NULL,
  `allergies` varchar(2) DEFAULT NULL,
  `hernia` varchar(2) DEFAULT NULL,
  `highBloodPressure` varchar(2) DEFAULT NULL,
  `heartProblems` varchar(2) DEFAULT NULL,
  `usingDrugs` varchar(2) DEFAULT NULL,
  `usingContactLenses` varchar(2) DEFAULT NULL,
  `RSI` varchar(2) DEFAULT NULL,
  `dependants` varchar(2) DEFAULT NULL,
  `smoke` varchar(2) DEFAULT NULL,
  `conviction` varchar(2) DEFAULT NULL,
  `convictionDetails` varchar(64) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `JobID` int(11) DEFAULT NULL,
  PRIMARY KEY (`CandidateID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candidate`
--

LOCK TABLES `candidate` WRITE;
/*!40000 ALTER TABLE `candidate` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (1,'Auckland'),(2,'Christchurch'),(3,'Dunedin'),(4,'Gisborne'),(5,'Greymouth'),(6,'Hamilton'),(7,'Hawera'),(8,'Hokitika'),(9,'Invercargill'),(10,'Kerikeri'),(11,'Levin'),(12,'Lower Hutt'),(13,'Masterton'),(14,'Napier'),(15,'Nelson'),(16,'New Plymouth'),(17,'Northcote'),(18,'Palmerston North'),(19,'Paraparaumu Beac'),(20,'Porirua Pa'),(21,'Pukekohe East'),(22,'Taupo'),(23,'Tauranga'),(24,'Te Anau'),(25,'Thames'),(26,'Timaru'),(27,'Tokoroa'),(28,'Turangi'),(29,'Waioruarangi'),(30,'Waitakere'),(31,'Waitangi'),(32,'Wanaka'),(33,'Wanganui'),(34,'Wellington'),(35,'Westport'),(36,'Whakatane');
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
  `JobTitle` varchar(16) DEFAULT NULL,
  `JobType` varchar(16) DEFAULT NULL,
  `Address` varchar(32) DEFAULT NULL,
  `City` varchar(32) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  PRIMARY KEY (`JobID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
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
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'william@gmail.com','william','Edwin','1995-04-08','123123','New Plymouth','9811','Gleggaryss','200727','male','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92','admin'),(2,'waverdt@gmail.com','waver','123','1995-04-08','erere','Invercargill','9810','Gleggary','1245','male','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92','admin'),(47,'heuh@gmail.com','justin','lamo','0000-00-00','','','','','','','c65d69b2248dd8e851e8c31bdb84331077f1aa12ff7265acea7388e02ba6069e','staff'),(48,'carlabc@gmail.com','Carl','Lee','0000-00-00','','','','','','','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92','staff'),(49,'ultimateformj@gmail.com','william','Edwin','1995-04-08','Herbert St 84','Invercargill','9810','Gleggary','0276245998','male','5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5','candidate'),(50,'wwwisll@gmail.com','123','123','1995-03-12','123','Invercargill','9810','ss','123','male','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3','candidate'),(51,'anita@gmail.com','Anita','Murphy','1978-12-19','123','Invercargill','9810','Gleggary','23123','female','5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5','candidate'),(52,'greg@gmail.com','','','0000-00-00','','','','','','','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3','staff'),(53,'pepeja@gmail.com','','','0000-00-00','','','','','','','c65d69b2248dd8e851e8c31bdb84331077f1aa12ff7265acea7388e02ba6069e','staff');
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

-- Dump completed on 2019-08-09 15:59:52

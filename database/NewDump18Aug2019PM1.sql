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
  `asthma` varchar(8) DEFAULT NULL,
  `blackOut` varchar(8) DEFAULT NULL,
  `diabetes` varchar(8) DEFAULT NULL,
  `bronchitis` varchar(8) DEFAULT NULL,
  `backInjury` varchar(8) DEFAULT NULL,
  `deafness` varchar(8) DEFAULT NULL,
  `dermatitis` varchar(8) DEFAULT NULL,
  `skinInfection` varchar(8) DEFAULT NULL,
  `allergies` varchar(8) DEFAULT NULL,
  `hernia` varchar(8) DEFAULT NULL,
  `highBloodPressure` varchar(8) DEFAULT NULL,
  `heartProblems` varchar(8) DEFAULT NULL,
  `usingDrugs` varchar(8) DEFAULT NULL,
  `usingContactLenses` varchar(8) DEFAULT NULL,
  `RSI` varchar(8) DEFAULT NULL,
  `dependants` varchar(8) DEFAULT NULL,
  `smoke` varchar(8) DEFAULT NULL,
  `conviction` varchar(8) DEFAULT NULL,
  `convictionDetails` varchar(64) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `JobID` int(11) DEFAULT NULL,
  `CandidateHoursWorked` int(11) DEFAULT 0,
  `CandidateNotes` varchar(64) DEFAULT NULL,
  `CandidateEarnings` decimal(13,2) DEFAULT 0.00,
  `JobRate` decimal(13,2) DEFAULT 0.00,
  PRIMARY KEY (`CandidateID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candidate`
--

LOCK TABLES `candidate` WRITE;
/*!40000 ALTER TABLE `candidate` DISABLE KEYS */;
INSERT INTO `candidate` VALUES (2,'Java Development','Full Time',NULL,'Train','TR002','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','true','false','false','false','true','false','false','true','false','false','false','false','false','false','true','false','true','true','I punched a dog last week.',65,NULL,0,NULL,NULL,0.00),(3,'Python Development','Full Time',NULL,'Train','TR003','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','true','false','false','false','true','false','false','true','false','false','false','false','false','false','true','false','true','true','I punched a dog last week.',56,0,0,'lll',0.00,0.00),(4,'C Sharp Development','Full Time',NULL,'Train','TR004','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','true','false','false','false','true','false','false','true','false','false','false','false','false','false','true','false','true','true','I punched a dog last week.',65,NULL,0,NULL,NULL,0.00),(5,'C Development','Full Time',NULL,'Train','TR005','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','true','false','false','false','true','false','false','true','false','false','false','false','false','false','true','false','true','true','I punched a dog last week.',65,NULL,0,NULL,NULL,0.00),(6,'C Development','Full Time',NULL,'Train','TR006','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','true','false','false','false','true','false','false','true','false','false','false','false','false','false','true','false','true','true','I punched a dog last week.',6,6,0,'pepeg',0.00,0.00),(7,'C Development','Full Time',NULL,'Train','TR007','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','true','false','false','false','true','false','false','true','false','false','false','false','false','false','true','false','true','true','I punched a dog last week.',64,0,0,NULL,NULL,0.00),(8,'C Development','Full Time',NULL,'Train','TR008','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','true','false','false','false','true','false','false','true','false','false','false','false','false','false','true','false','true','true','I punched a dog last week.',65,NULL,0,NULL,NULL,0.00),(9,'C Development','Full Time',NULL,'Train','TR009','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','true','false','false','false','true','false','false','true','false','false','false','false','false','false','true','false','true','true','I punched a dog last week.',59,0,0,'asdfasdf',0.00,0.00),(10,'C Development','Full Time',NULL,'Train','TR010','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','true','false','false','false','true','false','false','true','false','false','false','false','false','false','true','false','true','true','I punched a dog last week.',65,NULL,0,NULL,NULL,0.00);
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
  `JobTitle` varchar(32) DEFAULT NULL,
  `JobType` varchar(16) DEFAULT NULL,
  `Address` varchar(32) DEFAULT NULL,
  `City` varchar(32) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Suburb` varchar(32) DEFAULT NULL,
  `Editor1` varchar(2048) DEFAULT NULL,
  `ThumbnailText` varchar(255) DEFAULT NULL,
  `JobStatus` varchar(15) DEFAULT NULL,
  `PublishTitle` varchar(64) DEFAULT NULL,
  `PublishDate` date DEFAULT NULL,
  `JobSubmittedDate` date DEFAULT NULL,
  PRIMARY KEY (`JobID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job`
--

LOCK TABLES `job` WRITE;
/*!40000 ALTER TABLE `job` DISABLE KEYS */;
INSERT INTO `job` VALUES (1,'Mrs.','July','Potter','olsked@gmail.com','1234','Contract Recruit','PartTime','asdfasf','Masterton','ss',NULL,'<p><strong><em>If you know you are a good recruiter but looking for more freedom than your current employment, we just might have the answer.</em>&nbsp;</strong></p>\r\n\r\n<p><strong>- Tired of being constrained by your employer?<br />\r\n- Looking for the freedom to recruit at your best?<br />\r\n- Want a bigger slice of what you generate?</strong>&nbsp;</p>\r\n\r\n<p>Lee Recruitment is seeking a professional recruiter who is a consistent performer to work on contract with complete freedom while having all the back end work taken care off. Temp payroll etc is completed by head office keeping you free to do what you do best - recruitment.&nbsp;</p>\r\n\r\n<p>For all this you will get a much bigger slice of what you achieve while still getting the infrastructure and support you need. This support will include additional start-up support as required to help ensure a smooth start.&nbsp;<br />\r\nThe freedom of self-employment with the support of being part of an organisation.&nbsp;</p>\r\n\r\n<p><br />\r\nThe biggest barrier that most people have to starting their own business is the cost and compliance related issues of payroll, health and safety, and communications systems. We can offer those things and support your progress along the way.&nbsp;</p>\r\n\r\n<p>Of course there are some rules, mostly around doing the job properly and professionally but otherwise you are free to target industry sectors etc that suit you.&nbsp;<br />\r\nIf this sounds interesting to you send me an email&nbsp;<a href=\"mailto:mark@leerecruitment.co.nz\"><strong>mark@leerecruitment.co.nz</strong></a>&nbsp;or give me a call&nbsp;<strong>021 08 323 373</strong>&nbsp;for a chat.&nbsp;<br />\r\nAll applications are treated in the strictest confidence.&nbsp;</p>\r\n','','published','Contract Recruiter - Masterton','2019-08-16',NULL),(4,'Mr.','Kkrikey','OpieOP','sen','123125','NetMaker','PartTime','asdfasf','Northcote','ss',NULL,NULL,NULL,NULL,NULL,'0000-00-00',NULL),(6,'Mr.','Johnny','HireTutor','potato@gmail.com','0276-245-998','Level 5 IT Tutor','PartTime','asdfasf','Nelson','',NULL,'<p>atleast 200 iq</p>\r\n','Smartest man in the world','','Tutor Publish','2019-08-12',NULL),(7,'-','James','Huang','Huang@comp.com','0276-245-998','Truck Driver','Full Time','I','Invercargill','dd',NULL,'For further information please contact us or email us at mark@leerecruitment.co.nz.','','published','Full Time Truck Driver worker Needed in Invercargill','2019-08-16',NULL),(11,'-','asfdasd','assdf','asdfas','0276-245-998','Contract Recruit','PartTime','asdf','Nelson','aaa',NULL,'<p>Enter the text for job</p>\r\n','','published','PartTime Contract Recruit worker Needed in Nelson','2019-08-16',NULL),(12,'-','Johann','Octopis','ultimateformj@gmail.com','029-28839','Truck Driver','Full Time','I','New Plymouth','ss',NULL,'<p>Qualifications:</p>\r\n\r\n<ul>\r\n	<li>Know the area quite well and able to read map / GPS</li>\r\n	<li>Having B Class License</li>\r\n	<li>Huge Concentration and power of will</li>\r\n	<li>Physically fit</li>\r\n</ul>\r\n','KAPOW','null','Experienced Truck Driver','2019-08-11',NULL),(13,'Mr.','Red','RedBull','Redbull@gmail.com','0372222123','xxzsdfs','PartTime','asdfasf','Christchurch','ss',NULL,'<p>Enter the text for job</p>\r\n','Enter text for thumbnail','null','','2019-08-12',NULL),(14,'Mr.','Tony','Hawkins','Tonyls@gmail.com','+6492232223','sss','PartTime','123','Gisborne','dd','CBD',NULL,NULL,NULL,NULL,'0000-00-00',NULL),(15,'Mr.','Johann','Liebert','Ensas@gmail.com','027624222212','Electronic Insta','PartTime','railway','Hokitika','Need someone that is experienced in installing electronics','CBD','<p>Someone with good aiblity is enough</p>\r\n','Enter text for thumbnail','null','','2019-08-12',NULL),(16,'Mr.','Steel','Robbery','robberbros@gmail.com','3229210','Clerk','FullTime','asdfasf','Gisborne','Need someone that has good backgorund','CBD','<p>Enter the text for job</p>\r\n','','published','FullTime Clerk worker Needed in Gisborne','2019-08-16','2019-08-12'),(17,'Mr.','11','11','Huang@comp.com','113456767','xxzsdfs','PartTime','asdfasf','Nelson','wwww','CBD','For further information please contact us or email us at <a href=\"mailto:mark@leerecruitment.co.nz\"><strong>mark@leerecruitment.co.nz</strong></a>','','published','PartTime xxzsdfs Needed in Nelson','2019-08-16','2019-08-13'),(18,'-','Huey','Jones','Huey2@gmail.com','+6412312','Hitman','PartTime','ss','New Plymouth','Clean the body','CBD','<p>Enter the text for job</p>\r\n','Enter text for thumbnail','null','','2019-08-13','2019-08-13'),(19,'Dr.','Einstein','Musk','Einstein2001IQ@gmail.com','+64023912','Scientist Assistant','FullTime','Hard','Gisborne','Just need someone that matches my IQ','CBD','<p><strong><em>Long term opportunity to move into commercial fishing. Plenty of down time with an excellent return for your hard work.</em></strong></p>\r\n\r\n<p>Our client is looking for a fit and enthusiastic individual to enter the Commercial Fishing Industry. Operating out of Riverton, you will be part of a small crew doing day work and also at times working away for up to 5 days straight. Plenty of downtime is also included.&nbsp;</p>\r\n\r\n<p>This is an exciting opportunity as full training will be provided.&nbsp;<br />\r\nTo be considered you will have the following skills and attributes:</p>\r\n\r\n<ul>\r\n	<li>Fit and willing to work on your feet all day,</li>\r\n	<li>Willing to learn and take instruction,</li>\r\n	<li>Able to work as part of a small team,</li>\r\n	<li>Motivated and committed to doing a good job,</li>\r\n	<li>Looking for a long term career,</li>\r\n	<li>Safety focused.</li>\r\n</ul>\r\n\r\n<p>Really it suits a person with a love of the sea and the outdoors in general. If you have some fishing industry experience&nbsp;&nbsp;is great but certainly not essential.&nbsp;</p>\r\n\r\n<p>If you&#39;ve got the skills and willing to to learn along with the right to work in New Zealand please email your CV to Mark Lee at&nbsp;<a href=\"mailto:mark@leerecruitment.co.nz\"><strong>mark@leerecruitment.co.nz</strong></a>.&nbsp;</p>\r\n\r\n<p>All applications are treated in the strictest confidence.&nbsp;</p>\r\n','A good man with a good heart','','FullTime Scientist Assistant worker Needed in Gisborne','2019-08-16','2019-08-15');
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
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (6,'enigma@gmail.com','Kaveve','Brian','2019-08-21','Ashland','HGrroas','20192','Hillside','1029311','Male','','candidate'),(54,'william@gmail.com','william','edwin','1995-04-08','LithSt','Invercargill','9810','Gleggary','272727','male','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92','admin'),(55,'waverdt@gmail.com','','','0000-00-00','','','','','','','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92','staff'),(56,'origin@gmail.com','123','ss','1984-04-04','123','Pukekohe East','123','123','123','male','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3','candidate'),(57,'tryhard@gmail.com','bob','ross','1998-12-12','122','Christchurch','9810','Gleggary','2123','male','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3','candidate'),(58,'babidi@gmail.com','baboon','real','4411-03-12','erere','Napier','9843','Westown','111','male','03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4','candidate'),(59,'babu@gmail','nix','as','3121-03-12','123123','Taupo','123','Westown','123','male','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92','candidate'),(61,'carlabc@gmail.com','','','0000-00-00','','','','','','','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3','staff'),(63,'heuh@gmail.com','','','0000-00-00','','','','','','','03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4','staff'),(64,'heuh@gmail.com','','','0000-00-00','','','','','','','03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4','staff');
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

-- Dump completed on 2019-08-18 13:10:43

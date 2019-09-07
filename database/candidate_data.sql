

DROP TABLE IF EXISTS `Candidate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Candidate` (
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
  `compensationDateFrom` date DEFAULT NULL,
  `compensationDateTo` date DEFAULT NULL,
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
  PRIMARY KEY (`CandidateID`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Candidate`
--

LOCK TABLES `Candidate` WRITE;
/*!40000 ALTER TABLE `Candidate` DISABLE KEYS */;
INSERT INTO `Candidate` VALUES (1,'Web Development','Full Time',NULL,'Train','TR001','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','true','false','false','false','true','false','false','true','false','false','false','false','false','false','true','false','true','true','I punched a dog last week.',65,NULL);
INSERT INTO `Candidate` VALUES (2,'Java Development','Full Time',NULL,'Train','TR002','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','true','false','false','false','true','false','false','true','false','false','false','false','false','false','true','false','true','true','I punched a dog last week.',65,NULL);
INSERT INTO `Candidate` VALUES (3,'Python Development','Full Time',NULL,'Train','TR003','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','true','false','false','false','true','false','false','true','false','false','false','false','false','false','true','false','true','true','I punched a dog last week.',65,NULL);
INSERT INTO `Candidate` VALUES (4,'C Sharp Development','Full Time',NULL,'Train','TR004','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','true','false','false','false','true','false','false','true','false','false','false','false','false','false','true','false','true','true','I punched a dog last week.',65,NULL);
INSERT INTO `Candidate` VALUES (5,'C Development','Part Time',NULL,'Bus','TR005','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','false','false','false','false','true','false','false','true','false','false','false','false','false','false','true','false','true','true','I punched a dog last week.',65,NULL);
INSERT INTO `Candidate` VALUES (6,'C Development','Full Time',NULL,'Train','TR006','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','false','false','false','false','true','false','false','true','false','false','false','false','false','false','true','false','true','true','I punched a dog last week.',65,NULL);
INSERT INTO `Candidate` VALUES (7,'C Development','Full Time',NULL,'Train','TR007','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','false','false','false','false','true','false','false','true','false','false','false','false','false','false','true','false','true','true','I punched a dog last week.',65,NULL);
INSERT INTO `Candidate` VALUES (8,'C Development','Full Time',NULL,'Train','TR008','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','false','false','false','false','true','false','false','true','false','false','false','false','false','false','true','false','true','true','I punched a dog last week.',65,NULL);
INSERT INTO `Candidate` VALUES (9,'C Development','Full Time',NULL,'Train','TR009','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','false','false','false','false','true','false','false','true','false','false','false','false','false','false','true','false','true','true','I punched a dog last week.',65,NULL);
INSERT INTO `Candidate` VALUES (10,'C Development','Full Time',NULL,'Train','TR010','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','false','false','false','false','true','false','false','true','false','false','false','false','false','false','true','false','true','true','I punched a dog last week.',65,NULL);
INSERT INTO `Candidate` VALUES (11,'C Development','Full Time',NULL,'Train','TR011','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','I punched a dog last week.',65,NULL);
INSERT INTO `Candidate` VALUES (12,'C Development','Full Time',NULL,'Train','TR012','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','I punched a dog last week.',65,NULL);
INSERT INTO `Candidate` VALUES (13,'C Development','Full Time',NULL,'Train','TR013','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','false','true','I punched a dog last week.',65,NULL);
INSERT INTO `Candidate` VALUES (14,'C Development','Full Time',NULL,'Train','TR014','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','true','false','false','false','true','false','false','true','false','false','false','false','false','false','true','false','true','true','I punched a dog last week.',65,NULL);
INSERT INTO `Candidate` VALUES (15,'C Development','Full Time',NULL,'Train','TR015','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','true','false','false','false','true','false','false','true','false','false','false','false','false','false','true','false','true','true','I punched a dog last week.',65,NULL);
INSERT INTO `Candidate` VALUES (16,'C Development','Full Time',NULL,'Train','TR016','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','true','false','false','false','true','false','false','true','false','false','false','false','false','false','true','false','true','true','I punched a dog last week.',65,NULL);
INSERT INTO `Candidate` VALUES (17,'C Development','Full Time',NULL,'Train','TR017','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','true','false','false','false','true','false','false','true','false','false','false','false','false','false','true','false','true','true','I punched a dog last week.',65,NULL);
INSERT INTO `Candidate` VALUES (18,'C Development','Full Time',NULL,'Train','TR018','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','true','false','false','false','true','false','false','true','false','false','false','false','false','false','true','false','true','true','I punched a dog last week.',65,NULL);
INSERT INTO `Candidate` VALUES (19,'C Development','Full Time',NULL,'Train','TR019','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','true','false','false','false','true','false','false','true','false','false','false','false','false','false','true','false','true','true','I punched a dog last week.',65,NULL);
INSERT INTO `Candidate` VALUES (20,'C Development','Full Time',NULL,'Train','TR020','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','true','false','false','false','true','false','false','true','false','false','false','false','false','false','true','false','true','true','I punched a dog last week.',65,NULL);
INSERT INTO `Candidate` VALUES (21,'C Development','Full Time',NULL,'Train','TR021','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','true','false','false','false','true','false','false','true','false','false','false','false','false','false','true','false','true','true','I punched a dog last week.',65,NULL);
INSERT INTO `Candidate` VALUES (22,'C Development','Full Time',NULL,'Train','TR022','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','true','false','false','false','true','false','false','true','false','false','false','false','false','false','true','false','true','true','I punched a dog last week.',65,NULL);
INSERT INTO `Candidate` VALUES (23,'C Development','Full Time',NULL,'Train','TR023','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','true','false','false','false','true','false','false','true','false','false','false','false','false','false','true','false','true','true','I punched a dog last week.',65,NULL);
INSERT INTO `Candidate` VALUES (24,'C Development','Full Time',NULL,'Train','TR024','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','true','false','false','false','true','false','false','true','false','false','false','false','false','false','true','false','true','true','I punched a dog last week.',65,NULL);
INSERT INTO `Candidate` VALUES (25,'C Development','Full Time',NULL,'Train','TR025','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','true','false','false','false','true','false','false','true','false','false','false','false','false','false','true','false','true','true','I punched a dog last week.',65,NULL);
INSERT INTO `Candidate` VALUES (26,'C Development','Full Time',NULL,'Train','TR026','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','true','false','false','false','true','false','false','true','false','false','false','false','false','false','true','false','true','true','I punched a dog last week.',65,NULL);
INSERT INTO `Candidate` VALUES (27,'C Development','Full Time',NULL,'Train','TR027','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','true','false','false','false','true','false','false','true','false','false','false','false','false','false','true','false','true','true','I punched a dog last week.',65,NULL);
INSERT INTO `Candidate` VALUES (28,'C Development','Full Time',NULL,'Train','TR028','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','true','false','false','false','true','false','false','true','false','false','false','false','false','false','true','false','true','true','I punched a dog last week.',65,NULL);
INSERT INTO `Candidate` VALUES (29,'C Development','Full Time',NULL,'Train','TR029','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','true','false','false','false','true','false','false','true','false','false','false','false','false','false','true','false','true','true','I punched a dog last week.',65,NULL);
INSERT INTO `Candidate` VALUES (30,'C Development','Full Time',NULL,'Train','TR030','TR','anything','Australia','Australia','Australia','AU123','Yes','2019-04-10','2019-05-09','true','false','false','false','true','false','false','true','false','false','false','false','false','false','true','false','true','true','I punched a dog last week.',65,NULL);


/*!40000 ALTER TABLE `Candidate` ENABLE KEYS */;
UNLOCK TABLES;

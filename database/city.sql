

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

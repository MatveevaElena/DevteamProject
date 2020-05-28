-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: projectexchange
-- ------------------------------------------------------
-- Server version	8.0.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1589369829),('m130524_201442_init',1589369832),('m190124_110200_add_verification_token_column_to_user_table',1589369832);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `person`
--

DROP TABLE IF EXISTS `person`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `person` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `LastName` varchar(45) NOT NULL,
  `FirstName` varchar(45) NOT NULL,
  `MiddleName` varchar(45) DEFAULT NULL,
  `BirthDate` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `idPerson_UNIQUE` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `person`
--

LOCK TABLES `person` WRITE;
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
INSERT INTO `person` VALUES (1,'La','sdkln','sdkgnskl','2001-01-20 00:00:00'),(2,'skfn','dskgn','dskgn','2001-01-20 00:00:00'),(3,'skfn','dskgn','dskgnsdagsdg','2001-01-20 00:00:00'),(4,'skfn','ewte','dgwag','2001-01-20 00:00:00'),(5,'La','sdkln','sdkgnskl','2001-01-20 00:00:00'),(6,'skfnsafsdf','dskgn','dskgnsdagsdg','2001-01-20 00:00:00'),(7,'skfnsafsdf','dskgnsadfsd','dskgnsdagsdg','2001-01-20 00:00:00'),(10,'LastName','FirstName','','2006-05-20 20:00:00'),(11,'Василенко','Григорий','Сергеевич','2006-05-20 20:00:00'),(13,'LastName','FirstName','MiddleName','2028-05-20 20:00:00'),(14,'Иванов','Иван','Иванович','2001-05-20 20:00:00'),(15,'Фамилия','Имя','Отчество','2001-05-20 20:00:00');
/*!40000 ALTER TABLE `person` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personlink_role`
--

DROP TABLE IF EXISTS `personlink_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personlink_role` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `idRole_UNIQUE` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personlink_role`
--

LOCK TABLES `personlink_role` WRITE;
/*!40000 ALTER TABLE `personlink_role` DISABLE KEYS */;
INSERT INTO `personlink_role` VALUES (1,'Руководитель'),(2,'Участник');
/*!40000 ALTER TABLE `personlink_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personlink_status`
--

DROP TABLE IF EXISTS `personlink_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personlink_status` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `idPerson_Status_UNIQUE` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personlink_status`
--

LOCK TABLES `personlink_status` WRITE;
/*!40000 ALTER TABLE `personlink_status` DISABLE KEYS */;
INSERT INTO `personlink_status` VALUES (1,'Действующий'),(2,'Покинул проект');
/*!40000 ALTER TABLE `personlink_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `project` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `BeginDate` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `PersonCount` int DEFAULT NULL,
  `ParentID` int NOT NULL,
  `IsActual` int DEFAULT NULL,
  `VersionDate` datetime DEFAULT NULL,
  `DeletedDate` datetime DEFAULT NULL,
  `TypeID` int NOT NULL,
  `StatusID` int NOT NULL,
  `RequestParentID` int DEFAULT NULL,
  `TeamID` int DEFAULT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `Img` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `idProject_UNIQUE` (`ID`),
  KEY `project_parentid` (`ParentID`),
  KEY `fk_project_project_type_idx` (`TypeID`),
  KEY `fk_project_project_status1_idx` (`StatusID`),
  KEY `fk_project_request_idx` (`RequestParentID`),
  CONSTRAINT `fk_project_project_status1` FOREIGN KEY (`StatusID`) REFERENCES `project_status` (`ID`),
  CONSTRAINT `fk_project_project_type` FOREIGN KEY (`TypeID`) REFERENCES `project_type` (`ID`),
  CONSTRAINT `fk_project_request` FOREIGN KEY (`RequestParentID`) REFERENCES `request` (`ParentID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` VALUES (1,'2001-01-20','2001-01-20','Имя проекта',10,1,0,'2020-04-29 18:01:31','2020-05-18 13:30:28',1,1,NULL,NULL,NULL,NULL),(2,'2002-02-20','2002-02-20','Project 2',111,2,0,'2020-04-29 18:02:07','2020-05-18 13:30:32',1,1,NULL,NULL,NULL,NULL),(3,'2003-03-20','2003-03-20','Проект 3',NULL,3,0,'2020-04-29 18:02:33','2020-05-18 13:30:36',1,1,NULL,NULL,NULL,NULL),(4,'2001-01-20','2003-03-20','Новый проект',10,4,0,'2020-05-15 15:04:42','2020-05-18 13:30:23',1,1,16,21,NULL,NULL),(5,'2001-01-20','2022-05-20','1111',111,5,0,'2020-05-15 15:09:46',NULL,1,1,25,22,NULL,NULL),(6,'2001-01-20','2022-05-20','Название проекта',111,5,1,'2020-05-16 10:38:04',NULL,1,1,25,22,NULL,NULL),(7,NULL,NULL,'Проект 3',NULL,7,1,'2020-05-18 13:31:47',NULL,1,1,28,23,NULL,NULL),(8,'2004-05-20','2011-05-20','Новый проект 2',10,8,1,'2020-05-24 19:20:46',NULL,1,1,37,24,NULL,NULL),(9,'2001-01-20','2003-03-20','Project',999,9,0,'2020-05-27 14:51:23',NULL,1,1,47,25,'weknglwengklwe','project/12.PNG-a7097b74c7.png'),(10,'2001-01-20','2003-03-20','Project',999,9,1,'2020-05-28 12:06:42',NULL,1,1,47,25,'weknglwengklwe','');
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_exchange_user`
--

DROP TABLE IF EXISTS `project_exchange_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `project_exchange_user` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `PersonID` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID_UNIQUE` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_exchange_user`
--

LOCK TABLES `project_exchange_user` WRITE;
/*!40000 ALTER TABLE `project_exchange_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `project_exchange_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_status`
--

DROP TABLE IF EXISTS `project_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `project_status` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `idProject_Status_UNIQUE` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_status`
--

LOCK TABLES `project_status` WRITE;
/*!40000 ALTER TABLE `project_status` DISABLE KEYS */;
INSERT INTO `project_status` VALUES (1,'FirstStatus');
/*!40000 ALTER TABLE `project_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_tag`
--

DROP TABLE IF EXISTS `project_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `project_tag` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `idTags_UNIQUE` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_tag`
--

LOCK TABLES `project_tag` WRITE;
/*!40000 ALTER TABLE `project_tag` DISABLE KEYS */;
INSERT INTO `project_tag` VALUES (1,'Тэг'),(2,'ЕщёТэг'),(3,'sdgsdgm\'as'),(4,'21j0192j');
/*!40000 ALTER TABLE `project_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_taglink`
--

DROP TABLE IF EXISTS `project_taglink`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `project_taglink` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `ProjectTagID` int NOT NULL,
  `ProjectParentID` int NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `idProgectTag_UNIQUE` (`ID`),
  KEY `fk_project_taglink_project_tag_idx` (`ProjectTagID`),
  KEY `fk_project_taglink_project1_idx` (`ProjectParentID`),
  CONSTRAINT `fk_project_taglink_project1` FOREIGN KEY (`ProjectParentID`) REFERENCES `project` (`ID`),
  CONSTRAINT `fk_project_taglink_project_tag` FOREIGN KEY (`ProjectTagID`) REFERENCES `project_tag` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_taglink`
--

LOCK TABLES `project_taglink` WRITE;
/*!40000 ALTER TABLE `project_taglink` DISABLE KEYS */;
INSERT INTO `project_taglink` VALUES (1,1,5),(2,1,5),(3,1,8),(4,2,8),(5,4,8);
/*!40000 ALTER TABLE `project_taglink` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_type`
--

DROP TABLE IF EXISTS `project_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `project_type` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `idType_UNIQUE` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_type`
--

LOCK TABLES `project_type` WRITE;
/*!40000 ALTER TABLE `project_type` DISABLE KEYS */;
INSERT INTO `project_type` VALUES (1,'First');
/*!40000 ALTER TABLE `project_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `request` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `PersonCount` int DEFAULT NULL,
  `Tasks` text,
  `Objective` text,
  `Issue` text,
  `ProductResults` text,
  `Cost` varchar(200) DEFAULT NULL,
  `TZ` varchar(500) DEFAULT NULL,
  `RequestDate` datetime DEFAULT NULL,
  `ParentID` int NOT NULL,
  `IsActual` int DEFAULT NULL,
  `VersionDate` datetime DEFAULT NULL,
  `DeletedDate` datetime DEFAULT NULL,
  `StatusID` int NOT NULL,
  `TypeID` int NOT NULL,
  `PersonID` int NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `idRequest_UNIQUE` (`ID`),
  KEY `request_parentid` (`ParentID`),
  KEY `fk_request_request_status1_idx` (`StatusID`),
  KEY `fk_request_request_type1_idx` (`TypeID`),
  CONSTRAINT `fk_request_request_status1` FOREIGN KEY (`StatusID`) REFERENCES `request_status` (`ID`),
  CONSTRAINT `fk_request_request_type1` FOREIGN KEY (`TypeID`) REFERENCES `request_type` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request`
--

LOCK TABLES `request` WRITE;
/*!40000 ALTER TABLE `request` DISABLE KEYS */;
INSERT INTO `request` VALUES (1,NULL,'','','','','',NULL,NULL,1,0,'2020-04-25 17:56:49',NULL,1,1,1),(2,10,'ds;agmlsdmg;lm','salmdl','sdalgms;dlmgl;sdm','sldamg;ldsm;glma','1000000000',NULL,NULL,1,0,'2020-04-25 17:58:31',NULL,1,1,1),(3,10,'ds;agmlsdmg;lm','salmdl','sdalgms;dlmgl;sdm','sldamg;ldsm;glma','1000000000',NULL,NULL,1,1,'2020-04-25 18:06:06',NULL,2,1,1),(4,123952,'sdgsd','sdgsadgsadg','<del></del><h1>sadgsadggasdgsdag</h1>','asdgasdgasdgasdg','1000000000',NULL,NULL,4,0,'2020-04-25 18:09:16',NULL,1,2,1),(5,123952,'sdgsd','sdgsadgsadg','<del></del><h1>sadgsadggasdgsdag</h1>','asdgasdgasdgasdg','1000000000',NULL,NULL,4,0,'2020-04-25 18:09:45',NULL,2,2,1),(6,1244,'','','','','',NULL,NULL,6,1,'2020-04-25 18:18:16',NULL,1,1,1),(7,312523,'','','','','',NULL,'2020-04-25 00:00:00',7,0,'2020-04-25 18:44:59',NULL,1,1,1),(8,12412,'','','','','124214',NULL,'2020-04-25 00:00:00',8,0,'2020-04-25 18:46:11',NULL,1,1,1),(9,12412,'','','','','124214',NULL,'2020-04-25 00:00:00',8,0,'2020-04-25 18:46:25',NULL,2,1,1),(10,12412,'','','','','124214',NULL,'2020-04-25 00:00:00',8,1,'2020-04-25 19:17:48',NULL,4,1,1),(11,123952,'sdgsd','sdgsadgsadg','<del></del><h1>sadgsadggasdgsdag</h1>','asdgasdgasdgasdg','1000000000',NULL,NULL,4,0,'2020-04-25 19:19:38',NULL,1,2,1),(12,123952,'sdgsd','sdgsadgsadg','<del></del><h1>sadgsadggasdgsdag</h1>','asdgasdgasdgasdg','1000000000',NULL,NULL,4,0,'2020-04-25 19:19:59',NULL,2,2,1),(13,123952,'sdgsd','sdgsadgsadg','<del></del><h1>sadgsadggasdgsdag</h1>','asdgasdgasdgasdg','1000000000',NULL,NULL,4,1,'2020-04-25 19:20:14',NULL,1,2,1),(14,NULL,'','','','','',NULL,'2015-04-20 20:00:00',14,0,'2020-04-25 19:33:18',NULL,1,1,1),(15,NULL,'','','','','',NULL,'2015-04-20 20:00:00',14,0,'2020-04-25 19:33:36',NULL,2,1,1),(16,1000,'154325','3454325','23454325','3452345','1000000000',NULL,'2008-05-20 20:00:00',16,0,'2020-05-15 13:17:53',NULL,1,1,4),(17,1000,'154325','3454325','23454325','3452345','1000000000',NULL,'2008-05-20 20:00:00',16,0,'2020-05-15 13:19:22',NULL,2,1,14),(23,1000,'154325','3454325','23454325','3452345','1000000000',NULL,'2008-05-20 20:00:00',16,1,'2020-05-15 15:04:42',NULL,3,1,14),(24,NULL,'','','','','',NULL,'2015-04-20 20:00:00',14,1,'2020-05-15 15:06:56',NULL,4,1,1),(25,NULL,'','','','','',NULL,NULL,25,0,'2020-05-15 15:08:58',NULL,1,1,11),(26,NULL,'','','','','',NULL,NULL,25,0,'2020-05-15 15:09:04',NULL,2,1,11),(27,NULL,'','','','','',NULL,NULL,25,1,'2020-05-15 15:09:46',NULL,3,1,11),(28,NULL,'','','','','',NULL,NULL,28,0,'2020-05-18 13:30:56',NULL,1,1,11),(29,NULL,'','','','','',NULL,NULL,28,0,'2020-05-18 13:31:00',NULL,2,1,11),(30,NULL,'','','','','',NULL,NULL,28,1,'2020-05-18 13:31:47',NULL,3,1,11),(31,NULL,'','','','','',NULL,NULL,31,0,'2020-05-18 14:07:11',NULL,1,1,11),(32,NULL,'','','','','',NULL,NULL,31,1,'2020-05-18 14:07:15',NULL,2,1,11),(33,NULL,'','','','','dsgfdg',NULL,NULL,33,1,'2020-05-22 14:28:07',NULL,1,1,11),(34,124124,'','','','','',NULL,NULL,34,0,'2020-05-22 15:26:51','2020-05-22 15:27:42',1,1,11),(35,NULL,'','','','','',NULL,'2020-05-22 00:00:00',35,0,'2020-05-22 15:29:00',NULL,1,1,11),(36,NULL,'','','','','',NULL,'2020-05-22 00:00:00',35,1,'2020-05-22 15:31:17',NULL,2,1,11),(37,NULL,'','','','','',NULL,'2020-05-24 00:00:00',37,0,'2020-05-24 19:19:49',NULL,1,1,15),(38,NULL,'','','','','',NULL,'2020-05-24 00:00:00',37,0,'2020-05-24 19:20:01',NULL,2,1,15),(39,NULL,'','','','','',NULL,'2020-05-24 00:00:00',37,1,'2020-05-24 19:20:46',NULL,3,1,15),(40,NULL,'','','','','',NULL,'2020-05-27 00:00:00',40,1,'2020-05-27 13:18:55',NULL,1,1,11),(41,NULL,'','','','','',NULL,'2020-05-27 00:00:00',41,1,'2020-05-27 13:30:12',NULL,1,1,11),(42,123952,'','','','','',NULL,'2020-05-27 00:00:00',42,0,'2020-05-27 13:31:28','2020-05-27 13:31:50',1,1,11),(43,NULL,'','','','','',NULL,'2020-05-27 00:00:00',43,0,'2020-05-27 13:32:08','2020-05-27 13:33:50',1,1,11),(44,NULL,'','','','','','0','2020-05-27 00:00:00',44,0,'2020-05-27 13:33:59','2020-05-27 13:37:03',1,1,11),(45,NULL,'','','','','','request/Расписание экзаменов_2020 _весна__Колледж СамГТУ (1)-ca5436f6cf.doc','2020-05-27 00:00:00',45,0,'2020-05-27 13:37:14',NULL,1,1,11),(46,NULL,'','','','','','request/124527-2584740416.jpg','2020-05-27 00:00:00',45,0,'2020-05-27 13:38:36','2020-05-27 13:38:42',1,1,11),(47,NULL,'','','','','','','2020-05-27 00:00:00',47,0,'2020-05-27 14:50:26',NULL,1,1,11),(48,NULL,'','','','','','','2020-05-27 00:00:00',47,0,'2020-05-27 14:50:30',NULL,2,1,11),(49,NULL,'','','','','','','2020-05-27 00:00:00',47,1,'2020-05-27 14:51:23',NULL,3,1,11),(50,NULL,'','','','','','','2020-05-27 00:00:00',50,0,'2020-05-27 20:22:04','2020-05-27 20:22:51',1,1,11),(51,100,'sldmgl<p>dlsamgl</p><p><br></p><p>sg;ldsm</p><p>gmsdlm</p>','sdlamg;lsdg<p><br></p><p>s;dgm;sladgm</p><p>;</p><p>sad;l</p><p>lsmlsadgl;m</p>','sdag ;dlsg<p>lsadmg;l</p>','asdgsdagasdg','124214','','2020-05-27 00:00:00',51,1,'2020-05-27 20:23:29',NULL,1,1,11),(52,NULL,'','','','','','','2020-05-27 00:00:00',52,1,'2020-05-27 22:36:37',NULL,1,1,11);
/*!40000 ALTER TABLE `request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request_entry`
--

DROP TABLE IF EXISTS `request_entry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `request_entry` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `RequestDate` datetime DEFAULT NULL,
  `Experience` text,
  `Target` text,
  `ParentID` int NOT NULL,
  `IsActual` int DEFAULT NULL,
  `VersionDate` datetime DEFAULT NULL,
  `DeletedDate` datetime DEFAULT NULL,
  `StoredFileID` varchar(200) DEFAULT NULL,
  `StatusID` int NOT NULL,
  `ProjectParentID` int DEFAULT NULL,
  `PersonID` int NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `idRequest_entry_UNIQUE` (`ID`),
  KEY `fk_request_entry_project_idx` (`ProjectParentID`),
  KEY `fk_request_entry_request_status1_idx` (`StatusID`),
  CONSTRAINT `fk_request_entry_project` FOREIGN KEY (`ProjectParentID`) REFERENCES `project` (`ParentID`),
  CONSTRAINT `fk_request_entry_request_status1` FOREIGN KEY (`StatusID`) REFERENCES `request_status` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request_entry`
--

LOCK TABLES `request_entry` WRITE;
/*!40000 ALTER TABLE `request_entry` DISABLE KEYS */;
INSERT INTO `request_entry` VALUES (1,'2013-05-20 20:00:00','dsavgasdg','sadgsadg',1,0,'2020-05-13 13:36:10',NULL,NULL,1,1,1),(2,'2013-05-20 20:00:00','dsavgasdg','sadgsadg',1,1,'2020-05-13 13:49:30',NULL,NULL,2,1,1),(3,NULL,'','',3,1,'2020-05-20 14:38:52',NULL,NULL,1,5,2),(4,NULL,'','',4,0,'2020-05-20 14:40:14','2020-05-20 14:44:17',NULL,1,5,2),(5,NULL,'','',5,1,'2020-05-20 14:53:38',NULL,NULL,1,NULL,11),(6,'2020-05-20 20:00:00','','',6,1,'2020-05-20 14:57:43',NULL,NULL,1,5,11),(7,'2022-05-20 20:00:00','','',7,1,'2020-05-22 15:32:33',NULL,NULL,1,5,11),(8,'2024-05-20 20:00:00','','',8,1,'2020-05-24 19:22:06',NULL,NULL,1,NULL,11),(9,'2027-05-20 20:00:00','','',9,1,'2020-05-27 18:27:58',NULL,'requestentry/app-11e5f13be9.log',1,5,11),(10,'2027-05-20 20:00:00','','',10,0,'2020-05-27 18:38:08',NULL,'',1,5,11),(11,'2027-05-20 20:00:00','<ul><li>2lm;l3mfs</li><li>sdfsd</li><li>sdg</li><li>dsag</li><li>asddgsag</li></ul>','s.dag .sdgsdag<p>asdgasdgasdsdgsdgmsd</p><ol><li>sdlagma;sg</li><li>sdlagm;l</li></ol>',10,0,'2020-05-27 19:06:28',NULL,'',1,5,11),(12,'2027-05-20 20:00:00','<ul><li>2lm;l3mfs</li><li>sdfsd</li><li>sdg</li><li>dsag</li><li>asddgsag</li></ul>','<ol><li>124</li><li>21</li><li>4</li><li>214</li><li>12</li><li>4</li><li></li></ol>',10,0,'2020-05-27 19:35:47',NULL,'',1,5,11),(13,'2027-05-20 20:00:00','<p><strong>fwqefwqfwf</strong></p><p><strong></strong>wefqewfqwef</p><p><strong>fwqefwefwqef<em>wefqf</em></strong></p><p><br></p><p><strong><em></em></strong>weqfwef<del>qwefqw</del></p><ul><li>213kf0-k</li><li>32f23f23</li><li>f223f23f</li></ul>','<ol><li>124</li><li>21</li><li>4</li><li>214</li><li>12</li><li>4</li><li></li></ol>',10,0,'2020-05-27 19:36:39',NULL,'',1,5,11),(14,'2027-05-20 20:00:00','<p><strong>fwqefwqfwf</strong></p><p><strong></strong>wefqewfqwef</p><p><strong>fwqefwefwqef<em>wefqf</em></strong></p><p><br></p><p><strong><em></em></strong>weqfwef<del>qwefqw</del></p><ul><li>213kf0-k</li><li>32f23f23</li><li>f223f23f</li></ul>','<ol><li>124</li><li>21</li><li>4</li><li>214</li><li>12</li><li>4</li><li></li></ol>',10,0,'2020-05-27 19:48:57',NULL,'',2,5,11),(15,'2027-05-20 20:00:00','<p><strong>fwqefwqfwf</strong></p><p><strong></strong>wefqewfqwef</p><p><strong>fwqefwefwqef<em>wefqf</em></strong></p><p><br></p><p><strong><em></em></strong>weqfwef<del>qwefqw</del></p><ul><li>213kf0-k</li><li>32f23f23</li><li>f223f23f</li></ul>','<ol><li>124</li><li>21</li><li>4</li><li>214</li><li>12</li><li>4</li><li></li></ol>',10,1,'2020-05-27 20:16:24',NULL,'',3,5,11),(16,'2027-05-20 20:00:00','','',16,0,'2020-05-27 20:36:59',NULL,'',1,9,11),(17,'2027-05-20 20:00:00','','',16,0,'2020-05-27 20:37:18',NULL,'',2,9,11),(18,'2027-05-20 20:00:00','','',16,1,'2020-05-27 20:37:45',NULL,'',3,9,11),(19,'2027-05-20 20:00:00','','',19,0,'2020-05-27 20:38:14',NULL,'',1,9,11),(20,'2027-05-20 20:00:00','','',19,0,'2020-05-27 20:38:20',NULL,'',2,9,11),(21,'2027-05-20 20:00:00','','',19,1,'2020-05-27 20:38:30',NULL,'',3,9,11),(22,'2027-05-20 20:00:00','','',22,0,'2020-05-27 22:34:47',NULL,'',1,7,11),(23,'2027-05-20 20:00:00','','',22,0,'2020-05-27 22:34:53',NULL,'',2,7,11),(24,'2027-05-20 20:00:00','','',22,1,'2020-05-27 22:35:13',NULL,'',3,7,11);
/*!40000 ALTER TABLE `request_entry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request_status`
--

DROP TABLE IF EXISTS `request_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `request_status` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `idrequest_status_UNIQUE` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request_status`
--

LOCK TABLES `request_status` WRITE;
/*!40000 ALTER TABLE `request_status` DISABLE KEYS */;
INSERT INTO `request_status` VALUES (1,'На редактировании'),(2,'На рассмотрении'),(3,'Утверждена'),(4,'Отклонена');
/*!40000 ALTER TABLE `request_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request_type`
--

DROP TABLE IF EXISTS `request_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `request_type` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `idType_request_UNIQUE` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request_type`
--

LOCK TABLES `request_type` WRITE;
/*!40000 ALTER TABLE `request_type` DISABLE KEYS */;
INSERT INTO `request_type` VALUES (1,'Идея'),(2,'Задача');
/*!40000 ALTER TABLE `request_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `team` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) DEFAULT NULL,
  `TeamCol` int DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `idTeam_UNIQUE` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team`
--

LOCK TABLES `team` WRITE;
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
INSERT INTO `team` VALUES (21,'Новый проект',NULL),(22,'1111',NULL),(23,'Проект 3',NULL),(24,'Новый проект 2',NULL),(25,'Project',NULL);
/*!40000 ALTER TABLE `team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_personlink`
--

DROP TABLE IF EXISTS `team_personlink`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `team_personlink` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `ParentID` int NOT NULL,
  `IsActual` int DEFAULT NULL,
  `VersionDate` datetime DEFAULT NULL,
  `DeletedDate` datetime DEFAULT NULL,
  `RoleID` int NOT NULL,
  `TeamID` int NOT NULL,
  `StatusID` int NOT NULL,
  `PersonID` int NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `idPerson_Project_UNIQUE` (`ID`),
  KEY `fk_team_personlink_personlink_role1_idx` (`RoleID`),
  KEY `fk_team_personlink_personlink_status1_idx` (`StatusID`),
  KEY `fk_team_personlink_team_idx` (`TeamID`),
  CONSTRAINT `fk_team_personlink_personlink_role1` FOREIGN KEY (`RoleID`) REFERENCES `personlink_role` (`ID`),
  CONSTRAINT `fk_team_personlink_personlink_status1` FOREIGN KEY (`StatusID`) REFERENCES `personlink_status` (`ID`),
  CONSTRAINT `fk_team_personlink_team` FOREIGN KEY (`TeamID`) REFERENCES `team` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_personlink`
--

LOCK TABLES `team_personlink` WRITE;
/*!40000 ALTER TABLE `team_personlink` DISABLE KEYS */;
INSERT INTO `team_personlink` VALUES (1,1,1,'2020-05-18 13:10:20',NULL,1,22,1,11),(2,2,1,'2020-05-18 13:44:05',NULL,2,22,1,11),(3,3,1,'2020-05-18 13:44:18',NULL,1,22,1,11),(4,4,0,'2020-05-18 13:45:13',NULL,1,23,1,11),(5,4,0,'2020-05-18 14:02:13',NULL,2,23,1,11),(6,4,1,'2020-05-18 14:03:16',NULL,2,23,2,11),(7,7,1,'2020-05-24 19:21:34',NULL,1,24,1,11),(8,8,1,'2020-05-27 20:16:24',NULL,1,22,1,11),(9,9,1,'2020-05-27 20:37:45',NULL,2,25,1,11),(10,10,1,'2020-05-27 20:38:30',NULL,1,25,1,11),(11,11,1,'2020-05-27 22:35:13',NULL,2,23,1,11);
/*!40000 ALTER TABLE `team_personlink` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint NOT NULL DEFAULT '10',
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  `verification_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `PersonID` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'Grisha','Q-lznVUfNeDnZRtj36QQ_qZqzWfmJADE','$2y$13$jDf3dJgEcNO4kyMNf.PtYeSteQ4GZT09Vu7QNSAAFWrPhKrDUiHv.',NULL,'1@1.com',10,1589370714,1589370714,'ZrtdVMwp0QhT7tdIOQdumO3hOHiN0CBQ_1589370714',11),(3,'Admin','QN7rhzxVyRxTzm_itHNJk7nyVnWx5mAO','$2y$13$YF8g2caPWAdgGEasbr7BwOtPHS4gQGxqO5jcnK9r2ENKQfbM/nwMa',NULL,'2@1.com',10,1589371284,1589371284,'lJ6AfduLF2cX3y6WmOlQgh0Rj3BYu_Wx_1589371284',13),(4,'project_owner','j25Z6VtykujirThA6K9MOFtzH8RdYSaT','$2y$13$GfhNdY0ohmhPhjlcelnKMeOv5urB4MLO76PdcZrYz5jffZgbZ8zum',NULL,'project_owner@1.com',10,1589534254,1589534254,'mxrSaWQo6JMJl7NE3bIhnju6MD219Ta6_1589534254',14),(5,'user1','ooZDDKGytXgsuzKpQzbbx791yfM5oKnb','$2y$13$m3LmtiVFbQBCxCvI1pcMOu690nWbVxi6oeYXs.93ggSV1Jfx6Mwiq',NULL,'2@2.com',10,1590337143,1590337143,'FNUfd-dJjctErNXrDotGYPLD6rRP_65c_1590337143',15);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_role` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Abbreviation` varchar(45) DEFAULT NULL,
  `Description` varchar(511) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Name_UNIQUE` (`Name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role`
--

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` VALUES (1,'admin','admin','Администратор'),(2,'moderator','mod','Просмотр и утверждение заявок на создание проектов и заявок на вступление в проект');
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role_link`
--

DROP TABLE IF EXISTS `user_role_link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_role_link` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `UserID` int NOT NULL,
  `RoleID` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role_link`
--

LOCK TABLES `user_role_link` WRITE;
/*!40000 ALTER TABLE `user_role_link` DISABLE KEYS */;
INSERT INTO `user_role_link` VALUES (11,3,1),(14,2,1),(15,2,2);
/*!40000 ALTER TABLE `user_role_link` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-28 14:01:41

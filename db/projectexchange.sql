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
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `person`
--

LOCK TABLES `person` WRITE;
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
INSERT INTO `person` VALUES (1,'La','sdkln','sdkgnskl','2001-01-20 00:00:00'),(2,'skfn','dskgn','dskgn','2001-01-20 00:00:00'),(3,'skfn','dskgn','dskgnsdagsdg','2001-01-20 00:00:00'),(4,'skfn','ewte','dgwag','2001-01-20 00:00:00'),(5,'La','sdkln','sdkgnskl','2001-01-20 00:00:00'),(6,'skfnsafsdf','dskgn','dskgnsdagsdg','2001-01-20 00:00:00'),(7,'skfnsafsdf','dskgnsadfsd','dskgnsdagsdg','2001-01-20 00:00:00'),(10,'LastName','FirstName','','2006-05-20 20:00:00'),(11,'Василенко','Григорий','Сергеевич','2006-05-20 20:00:00'),(13,'LastName','FirstName','MiddleName','2028-05-20 20:00:00'),(14,'Иванов','Иван','Иванович','2001-05-20 20:00:00'),(15,'Фамилия','Имя','Отчество','2001-05-20 20:00:00'),(16,'Толстенко','Александр',NULL,'2020-01-01 00:00:00'),(17,'Кирьяков','Федор',NULL,'2020-01-01 00:00:00'),(18,'Саушкин','Иван',NULL,'2020-01-01 00:00:00'),(19,'Богданов','Алексей',NULL,'2020-01-01 00:00:00'),(20,'Тютрин','Кирилл',NULL,'2020-01-01 00:00:00'),(21,'Матвеева','Елена',NULL,'2020-01-01 00:00:00'),(22,'Петров','Никита',NULL,'2020-01-01 00:00:00'),(23,'Афанасьева','Ирина',NULL,'2020-01-01 00:00:00'),(24,'Демяшкина','Наталья',NULL,'2020-01-01 00:00:00'),(25,'Круглов','Кирилл',NULL,'2020-01-01 00:00:00'),(26,'Железнова','Анна',NULL,'2020-01-01 00:00:00'),(27,'Иващенко','Антон',NULL,'2020-01-01 00:00:00'),(28,'Квятковский','Валерий',NULL,'2020-01-01 00:00:00'),(29,'Котляров','Аркадий',NULL,'2020-01-01 00:00:00'),(30,'Миняйленко','Виталий',NULL,'2020-01-01 00:00:00'),(31,'Наркулов','Дониёр',NULL,'2020-01-01 00:00:00'),(32,'Никонов','Евгений',NULL,'2020-01-01 00:00:00'),(33,'Никулина','Екатерина',NULL,'2020-01-01 00:00:00'),(34,'Пилецкая','Антонина',NULL,'2020-01-01 00:00:00'),(35,'Пирова','Диёра',NULL,'2020-01-01 00:00:00'),(36,'Шиндин','Александр',NULL,'2020-01-01 00:00:00'),(37,'Абишева','Любовь',NULL,'2020-01-01 00:00:00'),(38,'Большаков','Матвей',NULL,'2020-01-01 00:00:00'),(39,'Брагин','Дмитрий',NULL,'2020-01-01 00:00:00'),(40,'Бычек','Виктор',NULL,'2020-01-01 00:00:00'),(41,'Васильев','Игорь',NULL,'2020-01-01 00:00:00'),(42,'Горбунова','Юлия',NULL,'2020-01-01 00:00:00'),(43,'Еремин','Антон',NULL,'2020-01-01 00:00:00'),(44,'Есаян','Лусине',NULL,'2020-01-01 00:00:00'),(45,'Зверев','Илья',NULL,'2020-01-01 00:00:00'),(46,'Иванова','Валерия',NULL,'2020-01-01 00:00:00'),(47,'Иглина','Татьяна',NULL,'2020-01-01 00:00:00'),(48,'Игнатьев','Егор',NULL,'2020-01-01 00:00:00'),(49,'Марискин','Сергей',NULL,'2020-01-01 00:00:00'),(50,'Мишустин','Никита',NULL,'2020-01-01 00:00:00'),(51,'Пешкин','Кирилл',NULL,'2020-01-01 00:00:00'),(52,'Попов','Андрей',NULL,'2020-01-01 00:00:00'),(53,'Чирва','Денис',NULL,'2020-01-01 00:00:00'),(54,'Азаров','Михаил',NULL,'2020-01-01 00:00:00'),(55,'Арасланов','Евгений',NULL,'2020-01-01 00:00:00'),(56,'Гаврилова','Анастасия',NULL,'2020-01-01 00:00:00'),(57,'Озеркина','Ирина',NULL,'2020-01-01 00:00:00'),(58,'Соколов','Михаил',NULL,'2020-01-01 00:00:00'),(59,'Файницкий','Никита',NULL,'2020-01-01 00:00:00'),(60,'Филякина','Ольга',NULL,'2020-01-01 00:00:00'),(61,'Хожагульев','Амал',NULL,'2020-01-01 00:00:00'),(62,'Асейдулин','Ильсеяр',NULL,'2020-01-01 00:00:00'),(63,'Бабаняева','Марина',NULL,'2020-01-01 00:00:00'),(64,'Казимов','Никита',NULL,'2020-01-01 00:00:00'),(65,'Клок','Никита',NULL,'2020-01-01 00:00:00'),(66,'Кутейницына','Арина',NULL,'2020-01-01 00:00:00'),(67,'Мельников','Павел',NULL,'2020-01-01 00:00:00'),(68,'Ногачева','Эльвира',NULL,'2020-01-01 00:00:00'),(69,'Сыркина','Алиса',NULL,'2020-01-01 00:00:00'),(70,'Белов','Павел',NULL,'2020-01-01 00:00:00'),(71,'Горидько','Игорь',NULL,'2020-01-01 00:00:00'),(72,'Кирилин','Юрий',NULL,'2020-01-01 00:00:00'),(73,'Краснова','Наталья',NULL,'2020-01-01 00:00:00'),(74,'Мордвинова','Людмила',NULL,'2020-01-01 00:00:00'),(75,'Трошина','Ольга',NULL,'2020-01-01 00:00:00'),(76,'Шмельков','Максим',NULL,'2020-01-01 00:00:00'),(77,'Андрюхин','Сергей',NULL,'2020-01-01 00:00:00'),(78,'Бережнова','Ирина',NULL,'2020-01-01 00:00:00'),(79,'Берёзова','Евгения',NULL,'2020-01-01 00:00:00'),(80,'Егоркин','Александр',NULL,'2020-01-01 00:00:00'),(81,'Зарубин','Дмитрий',NULL,'2020-01-01 00:00:00'),(82,'Новиков','Илья',NULL,'2020-01-01 00:00:00'),(83,'Пахомова','Ольга',NULL,'2020-01-01 00:00:00'),(84,'Рыжова','Екатерина',NULL,'2020-01-01 00:00:00'),(85,'Сайынов','Гадильбек',NULL,'2020-01-01 00:00:00'),(86,'Середов','Андрей',NULL,'2020-01-01 00:00:00'),(87,'Ахтямов','Расим',NULL,'2020-01-01 00:00:00'),(88,'Баландин','Роман',NULL,'2020-01-01 00:00:00'),(89,'Короблёв','Сергей',NULL,'2020-01-01 00:00:00'),(90,'Крюков','Сергей',NULL,'2020-01-01 00:00:00'),(91,'Лопатов','Максим',NULL,'2020-01-01 00:00:00'),(92,'Макеев','Павел',NULL,'2020-01-01 00:00:00'),(93,'Николаев','Евгений',NULL,'2020-01-01 00:00:00'),(94,'Одинцов','Виталий',NULL,'2020-01-01 00:00:00'),(95,'Сидоренко','Константин',NULL,'2020-01-01 00:00:00'),(96,'Александрова','Виктория',NULL,'2020-01-01 00:00:00'),(97,'Алпатов','Денис',NULL,'2020-01-01 00:00:00'),(98,'Горшкодер','Анна',NULL,'2020-01-01 00:00:00'),(99,'Калматаев','Дамир',NULL,'2020-01-01 00:00:00'),(100,'Линьков','Владислав',NULL,'2020-01-01 00:00:00'),(101,'Марусин','Илья',NULL,'2020-01-01 00:00:00'),(102,'Осмаков','Никита',NULL,'2020-01-01 00:00:00'),(103,'Стаховский','Виктор',NULL,'2020-01-01 00:00:00'),(104,'Федотова','Дарья',NULL,'2020-01-01 00:00:00'),(105,'Цыганенко','Дарья',NULL,'2020-01-01 00:00:00'),(106,'Глыбина','Евгения',NULL,'2020-01-01 00:00:00'),(107,'Кенжебаев','Артем',NULL,'2020-01-01 00:00:00'),(108,'Ляшенко','Данила',NULL,'2020-01-01 00:00:00'),(109,'Панус','Сергей',NULL,'2020-01-01 00:00:00'),(110,'Пшенников','Денис',NULL,'2020-01-01 00:00:00'),(111,'Сизяков','Даниил',NULL,'2020-01-01 00:00:00'),(112,'Ярославкина','Екатерина',NULL,'2020-01-01 00:00:00'),(113,',Иващенко,',',Антон,',NULL,'2020-01-01 00:00:00'),(114,',Свечков,',',Никита,',NULL,'2020-01-01 00:00:00'),(115,',Свешников,',',Денис,',NULL,'2020-01-01 00:00:00'),(116,',Фещенко,',',Татьяна,',NULL,'2020-01-01 00:00:00'),(117,',Ханин,',',Ярослав,',NULL,'2020-01-01 00:00:00'),(118,',Шаталова,',',Ксения,',NULL,'2020-01-01 00:00:00'),(119,'Гайков','Никита',NULL,'2020-01-01 00:00:00'),(120,'Захарова','Дарья',NULL,'2020-01-01 00:00:00'),(121,'Клешнев','Денис',NULL,'2020-01-01 00:00:00'),(122,'Музюков','Игорь',NULL,'2020-01-01 00:00:00'),(123,'Шешулин','Кирилл',NULL,'2020-01-01 00:00:00');
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
  `Name` varchar(1000) DEFAULT NULL,
  `PersonCount` int DEFAULT NULL,
  `ParentID` int NOT NULL,
  `IsActual` int DEFAULT NULL,
  `VersionDate` datetime DEFAULT NULL,
  `DeletedDate` datetime DEFAULT NULL,
  `TypeID` int NOT NULL,
  `StatusID` int NOT NULL,
  `RequestParentID` int DEFAULT NULL,
  `TeamID` int DEFAULT NULL,
  `Description` varchar(5000) DEFAULT NULL,
  `Img` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `idProject_UNIQUE` (`ID`),
  KEY `project_parentid` (`ParentID`),
  KEY `fk_project_project_type_idx` (`TypeID`),
  KEY `fk_project_project_status1_idx` (`StatusID`),
  CONSTRAINT `fk_project_project_status1` FOREIGN KEY (`StatusID`) REFERENCES `project_status` (`ID`),
  CONSTRAINT `fk_project_project_type` FOREIGN KEY (`TypeID`) REFERENCES `project_type` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` VALUES (1,'2019-10-01','2020-06-01','Политех.NET_DevTeam',10,1,1,'2020-05-28 21:07:26',NULL,1,1,NULL,1,'Разработка платформы взаимодействия, управления, маркетингового продвижения междисциплинарных проектных команд университета, а также проектных команд, которые будут сформированы в результате внедрения новых форм обучения в образовательный процесс.','/project/Политех.NET_DevTeam.jpg'),(2,'2019-10-01','2020-06-01','Политех.NET_Devops',10,2,1,'2020-05-28 21:07:26',NULL,1,1,NULL,2,'Интенсив производится совместно со специалистами компании “Маджента Девелопмент”. Предусматривает прохождение профильных курсов, которые ведут высококвалифицированные преподаватели кафедры «Вычислительная техника» и НПК «Маджента Девелопмент», а также участие в реальных проектах компании с возможностью последующего трудоустройства.','/project/Политех.NET_Devops.jpg'),(3,'2019-10-01','2020-06-01','Политех.NET_DigitalEnterprise',10,3,1,'2020-05-28 21:07:26',NULL,1,1,NULL,3,'Проект интенсива направлен на разработку нового и/или модернизацию существующего программного обеспечения (на базе программных продуктов Zulu, Termis Engineering, ANSYS) для создания цифровых двойников объектов генерации тепловой и электрической энергии. Под цифровым двойником понимается компьютерная модель энергетических объектов (ТЭЦ, крупных котельных), устанавливающая взаимосвязь между основными режимными характеристиками их работы. Использование цифровых двойников, обладающих свойствами моделируемой системы, позволяет оптимизировать режимы работы энергетических объектов, повысить показатели эффективности их работы, определить характеристики используемого оборудования др.','/project/Политех.NET_DigitalEnterprise.jpg'),(4,'2019-10-01','2020-06-01','Политех.NET_Web-scada',10,4,1,'2020-05-28 21:07:26',NULL,1,1,NULL,4,'В рамках этого проекта будет создан программный комплекс (web-сервис), реализующий функции отображения текущего состояния технологических объектов в виде мнемосхем: анимированных объектов, графиков и т.п. Разработка ориентирована на применение в системах диспетчеризации территориально распределённых технологических объектов без постоянного присутствия персонала, где клиентами системы являются специалисты разного уровня (от руководителей и диспетчеров всей системы в целом до операторов отдельных объектов).','/project/Политех.NET_Web-scada.jpg'),(5,'2019-10-01','2020-06-01','Политех.NET_InteractiveNavigator',10,5,1,'2020-05-28 21:07:26',NULL,1,1,NULL,5,'\"Настоящий проект направлен на разработку интерактивного приложения, ориентированного на решение задачи планирования маршрута путешествия по достопримечательностям Самары и Самарской области в зависимости от выделенного времени и предпочтений пользователя. Пользователю предлагается осуществить выбор дат поездки, достопримечательностей, которые он хочет посетить и свободного времени на путешествие. Программа предоставит детальный план мероприятий на поездку, предлагающий посещение интересных мест города и области, и учитывающий время на осмотр достопримечательностей и время на перемещение между отдельными пунктами. Основными инструментами маршрутизации являются дорожный граф (сетка дорог) и алгоритм Дейкстры, который рассчитывает путь. Интерактивный навигатор будет реализован на основе современных веб-технологий, используемых для разработки навигационных приложений.\"','/project/Политех.NET_InteractiveNavigator.jpg'),(6,'2019-10-01','2020-06-01','Политех.NET_VR',10,6,1,'2020-05-28 21:07:26',NULL,1,1,NULL,6,'\"Проект направлен на создание инновационного обучающегося комплекса по ликвидации и локализации аварийных ситуациях на опасных производственных объектах (ОПО) нефтегазового комплекса с применением виртуальной реальности. Обучение с погружением в виртуальную реальность и отработка навыков действий обучающихся на данном комплексе позволит повысить эффективность тренировочных учений по локализации и ликвидации аварийных ситуаций, сформировать профессионально значимые компетенции по обеспечению безопасности при эксплуатации ОПО и повысить «надежность» оперативного персонала на производственных предприятиях. Реализация проекта требует междисциплинарного подхода, в связи с чем участники проекта будут иметь возможность расширить области компенсаций и направления деятельности.\"','/project/Политех.NET_VR.jpg'),(7,'2019-10-01','2020-06-01','Учебный лабораторный стенд для изучения основ автоматизации на основе приборов Mitsubishi',10,7,1,'2020-05-28 21:07:26',NULL,1,1,NULL,7,'\"В рамках этого проекта создается учебный лабораторный стенд на оборудовании компании Mitsubishi Electric. Участники проекта получат знания по всему циклу разработки лабораторного стенда. Будут рассмотрены вопросы использования современного программного обеспечения для управления технологическими процессами, обмена данными в автоматизированных системах управления и применения современных устройств нижнего и среднего уровня автоматизации.\"','/project/Mitsubishi.jpg'),(8,'2019-10-01','2020-06-01','Модуль для определения остаточного ресурса и предотказных состояний роботизированного транспортного средства',10,8,1,'2020-05-28 21:07:26',NULL,1,1,NULL,8,'Разработка платформы взаимодействия, управления, маркетингового продвижения междисциплинарных проектных команд университета, а также проектных команд, которые будут сформированы в результате внедрения новых форм обучения в образовательный процесс.','/project/kamaz.jpg'),(9,'2019-10-01','2020-06-01','Политех.NET_Building3Dmodels',10,9,1,'2020-05-28 21:07:26',NULL,1,1,NULL,9,'Построение 3D-моделей крупномасштабных объектов с ипользованием квадрокоптеров','/project/Политех.NET_Building3Dmodels.jpg'),(10,'2019-10-01','2020-06-01','Политех.NET_Additive',10,10,1,'2020-05-28 21:07:26',NULL,1,1,NULL,10,'В рамках этого проекта интенсива будет вестись проектирование, разработка, сборка и настройка 3D-принтера. Работа будет вестись в программном продукте TopSolid, который представляет из себя CAD\\CAM\\CAE&PDM-интегрированную параметрическую систему высокого уровня, охватывающую весь процесс проектирования и производства в масштабах предприятия. Моделирование функции 3D-печати в ANSYS Additive Print позволит сократить количество физических испытаний, сделать проектирование геометрии для более точной. Индустриальный партнёры: ООО \"ДС-ИНЖИНИРИНГ\", Аскон, АО «КАДФЕМ Си-Ай-Эс».','/project/Политех.NET_Additive.jpg'),(11,'2019-10-01','2020-06-01','Политех.NET_IntelligentSystem',10,11,1,'2020-05-28 21:07:26',NULL,1,1,NULL,11,'Разработка платформы взаимодействия, управления, маркетингового продвижения междисциплинарных проектных команд университета, а также проектных команд, которые будут сформированы в результате внедрения новых форм обучения в образовательный процесс.','/project/Политех.NET_IntelligentSystem.jpg'),(12,'2019-10-01','2020-06-01','Политех.NET_ComputerVision',10,12,1,'2020-05-28 21:07:26',NULL,1,1,NULL,12,'Проект направлен на освоение технологий машинного зрения, глубокого обучения, Big Data, нейронных сетей и баз знаний. Обучение ведётся на базе нейрокомпьютерного центра кафедры «Вычислительная техника». Преподаватели интенсива – ведущие специалисты-практики, выполняющие работы для РКЦ «Прогресс», НПЦ «Инфотранс», ООО «Открытый код». В рамках интенсива планируется углубленная теоретическая подготовка по тематике применения нейронных сетей, а также практикум на реальных примерах.','/project/Политех.NET_ComputerVision.jpg');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_status`
--

LOCK TABLES `project_status` WRITE;
/*!40000 ALTER TABLE `project_status` DISABLE KEYS */;
INSERT INTO `project_status` VALUES (1,'В разработке'),(2,'Завершен');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_type`
--

LOCK TABLES `project_type` WRITE;
/*!40000 ALTER TABLE `project_type` DISABLE KEYS */;
INSERT INTO `project_type` VALUES (1,'Интенсив 20.35'),(2,'Инженерный'),(3,'Исследовательский');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request`
--

LOCK TABLES `request` WRITE;
/*!40000 ALTER TABLE `request` DISABLE KEYS */;
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
  KEY `fk_request_entry_request_status1_idx` (`StatusID`),
  CONSTRAINT `fk_request_entry_request_status1` FOREIGN KEY (`StatusID`) REFERENCES `request_status` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request_entry`
--

LOCK TABLES `request_entry` WRITE;
/*!40000 ALTER TABLE `request_entry` DISABLE KEYS */;
INSERT INTO `request_entry` VALUES (1,'2013-05-20 20:00:00','dsavgasdg','sadgsadg',1,0,'2020-05-13 13:36:10',NULL,NULL,1,1,1),(2,'2013-05-20 20:00:00','dsavgasdg','sadgsadg',1,1,'2020-05-13 13:49:30',NULL,NULL,2,1,1),(3,NULL,'','',3,1,'2020-05-20 14:38:52',NULL,NULL,1,5,2),(4,NULL,'','',4,0,'2020-05-20 14:40:14','2020-05-20 14:44:17',NULL,1,5,2),(5,NULL,'','',5,1,'2020-05-20 14:53:38',NULL,NULL,1,NULL,11),(6,'2020-05-20 20:00:00','','',6,1,'2020-05-20 14:57:43',NULL,NULL,1,5,11),(7,'2022-05-20 20:00:00','','',7,1,'2020-05-22 15:32:33',NULL,NULL,1,5,11),(8,'2024-05-20 20:00:00','','',8,1,'2020-05-24 19:22:06',NULL,NULL,1,NULL,11),(9,'2027-05-20 20:00:00','','',9,1,'2020-05-27 18:27:58',NULL,'requestentry/app-11e5f13be9.log',1,5,11),(10,'2027-05-20 20:00:00','','',10,0,'2020-05-27 18:38:08',NULL,'',1,5,11),(11,'2027-05-20 20:00:00','<ul><li>2lm;l3mfs</li><li>sdfsd</li><li>sdg</li><li>dsag</li><li>asddgsag</li></ul>','s.dag .sdgsdag<p>asdgasdgasdsdgsdgmsd</p><ol><li>sdlagma;sg</li><li>sdlagm;l</li></ol>',10,0,'2020-05-27 19:06:28',NULL,'',1,5,11),(12,'2027-05-20 20:00:00','<ul><li>2lm;l3mfs</li><li>sdfsd</li><li>sdg</li><li>dsag</li><li>asddgsag</li></ul>','<ol><li>124</li><li>21</li><li>4</li><li>214</li><li>12</li><li>4</li><li></li></ol>',10,0,'2020-05-27 19:35:47',NULL,'',1,5,11),(13,'2027-05-20 20:00:00','<p><strong>fwqefwqfwf</strong></p><p><strong></strong>wefqewfqwef</p><p><strong>fwqefwefwqef<em>wefqf</em></strong></p><p><br></p><p><strong><em></em></strong>weqfwef<del>qwefqw</del></p><ul><li>213kf0-k</li><li>32f23f23</li><li>f223f23f</li></ul>','<ol><li>124</li><li>21</li><li>4</li><li>214</li><li>12</li><li>4</li><li></li></ol>',10,0,'2020-05-27 19:36:39',NULL,'',1,5,11),(14,'2027-05-20 20:00:00','<p><strong>fwqefwqfwf</strong></p><p><strong></strong>wefqewfqwef</p><p><strong>fwqefwefwqef<em>wefqf</em></strong></p><p><br></p><p><strong><em></em></strong>weqfwef<del>qwefqw</del></p><ul><li>213kf0-k</li><li>32f23f23</li><li>f223f23f</li></ul>','<ol><li>124</li><li>21</li><li>4</li><li>214</li><li>12</li><li>4</li><li></li></ol>',10,0,'2020-05-27 19:48:57',NULL,'',2,5,11),(15,'2027-05-20 20:00:00','<p><strong>fwqefwqfwf</strong></p><p><strong></strong>wefqewfqwef</p><p><strong>fwqefwefwqef<em>wefqf</em></strong></p><p><br></p><p><strong><em></em></strong>weqfwef<del>qwefqw</del></p><ul><li>213kf0-k</li><li>32f23f23</li><li>f223f23f</li></ul>','<ol><li>124</li><li>21</li><li>4</li><li>214</li><li>12</li><li>4</li><li></li></ol>',10,1,'2020-05-27 20:16:24',NULL,'',3,5,11),(16,'2027-05-20 20:00:00','','',16,0,'2020-05-27 20:36:59',NULL,'',1,9,11),(17,'2027-05-20 20:00:00','','',16,0,'2020-05-27 20:37:18',NULL,'',2,9,11),(18,'2027-05-20 20:00:00','','',16,1,'2020-05-27 20:37:45',NULL,'',3,9,11),(19,'2027-05-20 20:00:00','','',19,0,'2020-05-27 20:38:14',NULL,'',1,9,11),(20,'2027-05-20 20:00:00','','',19,0,'2020-05-27 20:38:20',NULL,'',2,9,11),(21,'2027-05-20 20:00:00','','',19,1,'2020-05-27 20:38:30',NULL,'',3,9,11),(22,'2027-05-20 20:00:00','','',22,0,'2020-05-27 22:34:47',NULL,'',1,7,11),(23,'2027-05-20 20:00:00','','',22,0,'2020-05-27 22:34:53',NULL,'',2,7,11),(24,'2027-05-20 20:00:00','','',22,1,'2020-05-27 22:35:13',NULL,'',3,7,11),(25,'2028-05-20 20:00:00','','',25,0,'2020-05-28 19:39:44','2020-05-28 19:41:05','',1,NULL,11),(26,'2028-05-20 20:00:00','','',26,0,'2020-05-28 19:41:22',NULL,'',1,NULL,11),(27,'2028-05-20 20:00:00','','',26,1,'2020-05-28 19:41:30',NULL,'',2,NULL,11);
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
  `Name` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `idTeam_UNIQUE` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team`
--

LOCK TABLES `team` WRITE;
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
INSERT INTO `team` VALUES (1,'Политех.NET_DevTeam'),(2,'Политех.NET_Devops'),(3,'Политех.NET_DigitalEnterprise'),(4,'Политех.NET_Web-scada'),(5,'Политех.NET_InteractiveNavigator'),(6,'Политех.NET_VR'),(7,'Учебный лабораторный стенд для изучения основ автоматизации на основе приборов Mitsubishi'),(8,'Модуль для определения остаточного ресурса и предотказных состояний роботизированного транспортного средства'),(9,'Политех.NET_Building3Dmodels'),(10,'Политех.NET_Additive'),(11,'Политех.NET_IntelligentSystem'),(12,'Политех.NET_ComputerVision');
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
  CONSTRAINT `fk_team_personlink_personlink_role1` FOREIGN KEY (`RoleID`) REFERENCES `personlink_role` (`ID`),
  CONSTRAINT `fk_team_personlink_personlink_status1` FOREIGN KEY (`StatusID`) REFERENCES `personlink_status` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_personlink`
--

LOCK TABLES `team_personlink` WRITE;
/*!40000 ALTER TABLE `team_personlink` DISABLE KEYS */;
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

-- Dump completed on 2020-05-28 22:20:53

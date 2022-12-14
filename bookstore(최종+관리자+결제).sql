CREATE DATABASE  IF NOT EXISTS `bookstoredb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bookstoredb`;
-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: localhost    Database: bookstoredb
-- ------------------------------------------------------
-- Server version	8.0.20

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
-- Table structure for table `basket`
--

DROP TABLE IF EXISTS `basket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `basket` (
  `basket_no` char(15) NOT NULL,
  `amount` int NOT NULL,
  `sum` int NOT NULL,
  `ID` char(15) NOT NULL,
  `gift_number` char(15) DEFAULT NULL,
  `record_number` char(15) DEFAULT NULL,
  `stationery_number` char(15) DEFAULT NULL,
  `foreign_number` char(15) DEFAULT NULL,
  `domestic_number` char(15) DEFAULT NULL,
  PRIMARY KEY (`basket_no`),
  KEY `fk_basket_member1_idx` (`ID`),
  KEY `fk_basket_giftcard1_idx` (`gift_number`),
  KEY `fk_basket_record1_idx` (`record_number`),
  KEY `fk_basket_foreignbook1_idx` (`foreign_number`),
  KEY `fk_basket_domesticbook1_idx` (`domestic_number`),
  KEY `fk_basket_pay_idx` (`sum`),
  CONSTRAINT `fk_basket_domesticbook1` FOREIGN KEY (`domestic_number`) REFERENCES `domesticbook` (`domestic_no`),
  CONSTRAINT `fk_basket_foreignbook1` FOREIGN KEY (`foreign_number`) REFERENCES `foreignbook` (`foreign_no`),
  CONSTRAINT `fk_basket_giftcard1` FOREIGN KEY (`gift_number`) REFERENCES `giftcard` (`gift_no`),
  CONSTRAINT `fk_basket_member1` FOREIGN KEY (`ID`) REFERENCES `member` (`ID`),
  CONSTRAINT `fk_basket_record1` FOREIGN KEY (`record_number`) REFERENCES `record` (`record_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `basket`
--

LOCK TABLES `basket` WRITE;
/*!40000 ALTER TABLE `basket` DISABLE KEYS */;
/*!40000 ALTER TABLE `basket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deletedmember`
--

DROP TABLE IF EXISTS `deletedmember`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `deletedmember` (
  `ID` char(15) NOT NULL,
  `PW` char(20) NOT NULL,
  `name` char(15) NOT NULL,
  `contact` char(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `birth` date NOT NULL,
  `joindate` date NOT NULL,
  `birthcoupon` int DEFAULT NULL,
  `deleteddate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deletedmember`
--

LOCK TABLES `deletedmember` WRITE;
/*!40000 ALTER TABLE `deletedmember` DISABLE KEYS */;
/*!40000 ALTER TABLE `deletedmember` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delivery`
--

DROP TABLE IF EXISTS `delivery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `delivery` (
  `delivery_no` int NOT NULL,
  `departure` date NOT NULL,
  `name` char(15) NOT NULL,
  `contact` char(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  PRIMARY KEY (`delivery_no`),
  KEY `fk_delivery_member_idx` (`name`),
  KEY `fk_delivery_member1_idx` (`contact`),
  KEY `fk_delivery_member2_idx` (`address`),
  CONSTRAINT `fk_delivery_member` FOREIGN KEY (`name`) REFERENCES `member` (`ID`),
  CONSTRAINT `fk_delivery_member1` FOREIGN KEY (`contact`) REFERENCES `member` (`ID`),
  CONSTRAINT `fk_delivery_member2` FOREIGN KEY (`address`) REFERENCES `member` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delivery`
--

LOCK TABLES `delivery` WRITE;
/*!40000 ALTER TABLE `delivery` DISABLE KEYS */;
/*!40000 ALTER TABLE `delivery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `domesticbook`
--

DROP TABLE IF EXISTS `domesticbook`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `domesticbook` (
  `domestic_no` char(15) NOT NULL,
  `name` varchar(80) NOT NULL,
  `price` int NOT NULL,
  `author` varchar(50) NOT NULL,
  `publisher` varchar(50) NOT NULL,
  `pages` int NOT NULL,
  `release` date NOT NULL,
  `status` char(5) NOT NULL,
  PRIMARY KEY (`domestic_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `domesticbook`
--

LOCK TABLES `domesticbook` WRITE;
/*!40000 ALTER TABLE `domesticbook` DISABLE KEYS */;
INSERT INTO `domesticbook` VALUES ('BZ7468996523','????????? ????????? ??????',13500,'???????????? ?????????','????????????',348,'2021-04-12','????????????'),('CC1032021456','????????? ??????',14800,'?????????','??????',272,'2021-02-25','??? ??????'),('EA7523652101','????????????',15000,'???????????','????????????',360,'2019-05-10','????????????'),('HM9788959407','???????????? ?????? ??????????????????',17500,'?????????','????????????',312,'2021-04-23','??? ??????'),('IN9788936438','????????? ?????????????????? ??????',14000,'?????????','??????',324,'2021-05-10','??? ??????'),('JM1202168125','??? ?????????',12000,'?????????','?????????',206,'2011-03-28','??? ??????'),('KG9963201548','????????? ??????',13320,'????????? ??????','????????????',208,'2021-05-04','??? ??????'),('LK9788997137','?????????',13000,'?????????','??????????????????',248,'2014-09-21','??? ??????'),('LM9788994242','????????? ????????????',18000,'???????????????','?????????',216,'2014-04-25','????????????'),('QM1002354785','??????????????? 1??? ????????? ???????????????(2021)',24300,'?????????,?????????','?????????',696,'2021-01-27','??? ??????'),('RT7513512021','???????????? ??? ?????????',12420,'?????????','???????????????',300,'2020-07-08','??? ??????'),('RV9788936434','?????????',12000,'?????????','??????',264,'2019-03-31','??? ??????'),('YJ4132503602','????????? ?????? ????????? ????????????',13950,'???????????? ?????????','??????',504,'2021-03-29','??? ??????'),('YU4515784523','??????',10000,'?????????','??????',296,'2021-05-21','????????????'),('ZC7858542123','??????',8000,'?????????','?????????',278,'2001-08-10','????????????');
/*!40000 ALTER TABLE `domesticbook` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event` (
  `event_no` char(15) NOT NULL,
  `name` varchar(45) NOT NULL,
  `content` varchar(45) NOT NULL,
  `beginning` date NOT NULL,
  `closing` date NOT NULL,
  `stationery_number` char(15) NOT NULL,
  PRIMARY KEY (`event_no`),
  KEY `stationery_number` (`stationery_number`),
  CONSTRAINT `event_ibfk_1` FOREIGN KEY (`stationery_number`) REFERENCES `stationery` (`stationery_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES ('E1111','??????????????? ????????? ????????????','???????????? ??? ????????? ????????? ????????? ??????','2021-06-07','2021-06-21','EVP1111'),('E2222','2021 ??????????????? ?????? ?????? ??????','2021 ??????????????? ??? ????????? ????????? ??????','2021-06-14','2021-06-28','EVP2222'),('E3333','???????????????????????????','????????? ???????????? ??????','2021-01-01','2021-12-31','EVP4444'),('E4444','?????? ?????? ???????????? ????????? ??????','?????? ?????? ????????? ????????? ??????','2021-06-01','2021-06-30','EVP3333');
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `foreignbook`
--

DROP TABLE IF EXISTS `foreignbook`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `foreignbook` (
  `foreign_no` char(15) NOT NULL,
  `name` varchar(80) NOT NULL,
  `price` int NOT NULL,
  `author` varchar(50) NOT NULL,
  `publisher` varchar(50) NOT NULL,
  `pages` int NOT NULL,
  `release` date NOT NULL,
  `status` char(5) NOT NULL,
  PRIMARY KEY (`foreign_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `foreignbook`
--

LOCK TABLES `foreignbook` WRITE;
/*!40000 ALTER TABLE `foreignbook` DISABLE KEYS */;
INSERT INTO `foreignbook` VALUES ('AA9781984825','How Democracies Die',10700,'Daniel Ziblatt, Steven Levitsky','Broadway Books ',385,'2019-01-15','????????????'),('AF4651236548','Wonder',6600,'R. J, Palacio','Random House USA Inc',320,'2014-06-01','????????????'),('AS7621003651','The Course of Love',26000,'?????? ??? ????????',' Penguin Export ',256,'2016-04-28','??? ??????'),('DS9780099590','Sapiens',15300,'Yuval Noah Harari','Vintage Books',512,'2015-04-30','??? ??????'),('EE9781786892','The Midnight Library',16200,'Matt Haig','Canongate Books',304,'2021-02-18','??? ??????'),('GD4512345415','Noise : A Flaw in Human Judgment (Paperback)??',22700,'???????????? ?????????,????????? ?????????,?????? R. ??????????????',' Little, Brown and Company ',384,'2021-05-18','??? ??????'),('HD7551745212','Dog Man #10 : Mothering Heights (Hardcover)??',15500,'Dav Pilkey??',' Graphix?? ',224,'2021-03-23','??? ??????'),('HF7842162489','Fire and Fury : Inside the Trump White House (Paperback, ?????????)??',25500,'????????? ??????',' Little, Brown ',336,'2018-01-09','????????????'),('JS7896354123','The Giving Tree',11950,'Shel Silverstein','Harper Collins College',64,'1964-06-01','??? ??????'),('KG9651232021','How to Steal a Dog',5300,'O\'Connor, Babara','Square Fish',170,'2009-04-28','??? ??????'),('LO7951236548','Bluebeard\'s First Wife',18920,'Seong-nan Ha, Hong, Janet','Open Letter',243,'2020-06-16','????????????'),('PY7898451354','Hiroshi Fujiwara: Fragment #2',60000,'Fujiwara, Hiroshi ','Rizzoli',256,'2020-10-13','??? ??????'),('QA9781786576','The World',41980,'Lonely Planet Publications (COR)','Lonely Planet',992,'2017-10-17','??? ??????'),('QE9780385496','Tuesdays With Morrie',9900,'Mitch Albom','Bantam Books',208,'2005-12-27','????????????'),('RS7123025874','The Girl Who Drank the Moon (Paperback, ?????????)??',19900,'?????? ??????',' templar publishing ',400,'2017-08-24','????????????');
/*!40000 ALTER TABLE `foreignbook` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `giftcard`
--

DROP TABLE IF EXISTS `giftcard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `giftcard` (
  `gift_no` char(15) NOT NULL,
  `name` varchar(45) NOT NULL,
  `price` int NOT NULL,
  `maker` varchar(45) NOT NULL,
  PRIMARY KEY (`gift_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `giftcard`
--

LOCK TABLES `giftcard` WRITE;
/*!40000 ALTER TABLE `giftcard` DISABLE KEYS */;
INSERT INTO `giftcard` VALUES ('GC1000','??????????????? 3?????????',3000,'????????????'),('GC1001','??????????????? 5?????????',5000,'????????????'),('GC1002','??????????????? 1?????????',10000,'????????????'),('GC1003','??????????????? 3?????????',30000,'????????????'),('GC1004','??????????????? 5?????????',50000,'????????????'),('GC2000','????????????????????? 3?????????',3000,'???????????????'),('GC2001','????????????????????? 5?????????',5000,'???????????????'),('GC2002','????????????????????? 1?????????',10000,'???????????????'),('GC2003','????????????????????? 3?????????',30000,'???????????????'),('GC2004','????????????????????? 5?????????',50000,'???????????????'),('GC3000','????????????????????? 3?????????',3000,'????????????'),('GC3001','????????????????????? 5?????????',5000,'????????????'),('GC3002','????????????????????? 1?????????',10000,'????????????'),('GC3003','????????????????????? 3?????????',30000,'????????????'),('GC3004','?????????????????????  5?????????',50000,'????????????');
/*!40000 ALTER TABLE `giftcard` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member` (
  `ID` char(15) NOT NULL,
  `PW` char(20) NOT NULL,
  `name` char(15) NOT NULL,
  `contact` char(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `birth` date NOT NULL,
  `joindate` date NOT NULL,
  `birthcoupon` int DEFAULT NULL,
  PRIMARY KEY (`ID`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES ('6djtev3','s8010m.uq&','?????????','010-2147-7152','??????????????? ????????? ?????????????????? 256-6','1990-02-23','2016-01-18',0),('77pjh','4900six59','?????????','0109502-4900','????????? ????????? ????????? ????????? 28 104??? 702???','1988-12-10','2020-10-21',1),('9wlgj0','7887wldnjs','?????????','010-6262-7960','???????????? ????????? ??????5??? 13 203??? 1101???','2001-08-23','2020-01-25',0),('axtiwfs40','t7qn5','?????????','010-1785-3654','??????????????? ????????? ????????? 167-9','1984-04-20','2020-11-13',1),('gkjk7q4','gldksd!!815','?????????','010-5875-6224','???????????? ????????? ????????? ????????????????????? 107??? 1202???','2001-02-11','2020-11-23',0),('jisu0112','passkn1212','?????????','010-6317-1384','??????????????? ?????? ?????????22?????? 25 113??? 402???','1995-01-12','2019-10-23',0),('kksskk1123','wrsdzcf!45','?????????','010-62848-6215','??????????????? ???????????? ???????????? 302???','1981-06-07','2006-12-08',0),('marads97','ionx99io','?????????','010-1683-0296','??????????????? ????????? ????????? 98 107??? 2201???','1997-03-30','2021-03-11',0),('mdddm74','ddggasd!74','??????','010-4711-1145','??????????????? ?????? ?????? ???????????? 202???','1985-08-27','2007-03-01',1),('nl3vt5jyg','qgxhe$','?????????','010-3697-8563','????????? ????????? ????????? ???????????? 207-1','1999-10-04','2021-05-15',1),('q1s2daa','rsdff@154','?????????','010-7451-5524','????????? ????????? ????????? ??????????????? 111??? 102???','1998-04-23','2018-01-13',0),('qsddsd48','azd!@4515','?????????','010-7125-6518','?????? ????????? ????????? ??????????????? 120??? 1102???','1984-10-15','2008-08-11',0),('upqs7541jx','5xc&@8um','?????????','010-6457-5368','??????????????? ????????? ????????? 741-6','1995-01-13','2018-06-01',0),('wis1000','pajh294850','?????????','010-3960-2911','???????????? ????????? ?????????181?????? 10 102??? 201???','1994-10-22','2021-02-19',1),('zgwv8','0rus961%$o','?????????','010-7894-9437','????????? ????????? ????????? ???????????? 654-1','2000-11-22','2016-10-22',0),('admin','0','?????????','0','0','0','0',0);
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `deletedmember` AFTER DELETE ON `member` FOR EACH ROW BEGIN    
      INSERT INTO deletedmember
         VALUES(OLD.ID, OLD.PW, OLD.`name`, OLD.contact, OLD.address, OLD.birth, OLD.joindate, OLD.birthcoupon, CURDATE());
   END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `trg_deletedmember` AFTER DELETE ON `member` FOR EACH ROW BEGIN    
      INSERT INTO deletedmember
         VALUES(OLD.ID, OLD.PW, OLD.`name`, OLD.contact, OLD.address, OLD.birth, OLD.joindate, OLD.birthcoupon, CURDATE());
   END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `pay`
--

DROP TABLE IF EXISTS `pay`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pay` (
  `pay_no` int(15) NOT NULL AUTO_INCREMENT,
  `couponuse` int DEFAULT NULL,
  `sum` int NOT NULL,
  `discount` int NOT NULL,
  `total` int NOT NULL,
  `paymentplan` char(10) NOT NULL,
  `basket_number` char(15) NOT NULL,
  PRIMARY KEY (`pay_no`),
  KEY `sum` (`sum`),
  KEY `basket_number` (`basket_number`),
  CONSTRAINT `pay_ibfk_1` FOREIGN KEY (`sum`) REFERENCES `basket` (`sum`),
  CONSTRAINT `pay_ibfk_2` FOREIGN KEY (`basket_number`) REFERENCES `basket` (`basket_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pay`
--

LOCK TABLES `pay` WRITE;
/*!40000 ALTER TABLE `pay` DISABLE KEYS */;
/*!40000 ALTER TABLE `pay` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `record`
--

DROP TABLE IF EXISTS `record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `record` (
  `record_no` char(15) NOT NULL,
  `artist` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `producer` varchar(45) NOT NULL,
  `label` varchar(45) NOT NULL,
  `price` int NOT NULL,
  `release` date NOT NULL,
  PRIMARY KEY (`record_no`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `record`
--

LOCK TABLES `record` WRITE;
/*!40000 ALTER TABLE `record` DISABLE KEYS */;
INSERT INTO `record` VALUES ('AS1548','Amy Shark (????????? ??????)','Cry Forever [?????? ?????? ?????? LP]','Sony Music','Sony Music',52600,'2021-05-12'),('BT9878','???????????????','??????????????? - ?????? 3??? LOVE YOURSELF','BIGHIT MUSIC',' YG PLUS',78400,'2018-05-18'),('BY8587','?????????','Every letter I sent you.','?????????????????????','???????????????',27500,'2020-01-13'),('ER1415','?????????','????????? special edition','????????????','????????????',20100,'2021-02-15'),('EX6547','??????','?????? - 12?????? ??????','SM??????????????????','SM??????????????????',15000,'2013-12-09'),('GR8786','??????','?????? ???????????? ?????? ???','????????? ?????????','???????????????',16700,'2021-03-19'),('IU4123','?????????','LILAC [?????? 5???] [HILAC VER]','KAKAO ENTERTAINMENT','????????????????????????',19300,'2021-03-26'),('KG1325','?????????','????????? - 2??? ??????????????? [180Gram LP]','???????????????','LP ??????',46000,'2016-01-12'),('LS1325','?????????','The Project','KAKAO ENTERTAINMENT','????????????????????????',18400,'2020-12-10'),('NC0235','?????????','????????? - 2??? RESONANCE Pt.2','SM??????????????????','????????????',23200,'2020-12-14'),('SN7786','?????????','ATLANTIS [?????? 7???] [????????????]','SM??????????????????','SM??????????????????',19300,'2021-04-15'),('ST0023','????????????','STAYDOM [?????? 2???]','KAKAO ENTERTAINMENT','???????????????????????????',13400,'2021-04-08'),('SY4954','????????????','???????????? 2??? - Oh!??','SM ??????????????????','SM??????????????????',15300,'2010-01-28'),('WE2021','??????','LIKE WATER [?????? 1???] [CASE VER]','SM??????????????????','SM??????????????????',19300,'2021-04-05'),('WI8752','??????','REDD [??????]','KAKAO ENTERTAINMENT','RBW',17800,'2021-04-13');
/*!40000 ALTER TABLE `record` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stationery`
--

DROP TABLE IF EXISTS `stationery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stationery` (
  `stationery_no` char(15) NOT NULL,
  `type` char(10) NOT NULL,
  `maker` varchar(20) NOT NULL,
  `name` varchar(45) NOT NULL,
  `price` int NOT NULL,
  `manuCountry` char(10) NOT NULL,
  `import` char(5) NOT NULL,
  PRIMARY KEY (`stationery_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stationery`
--

LOCK TABLES `stationery` WRITE;
/*!40000 ALTER TABLE `stationery` DISABLE KEYS */;
INSERT INTO `stationery` VALUES ('EVP1111','????????? ??????','??????','????????? ????????? ?????????',0,'??????','??????'),('EVP2222','????????? ??????','??????','??????????????? ????????? ?????????',0,'??????','??????'),('EVP3333','????????? ??????','??????','?????? ?????????',0,'??????','??????'),('EVP4444','????????? ??????','??????','?????? ????????????',-2000,'??????','??????'),('PR0651','??????','PLEPLE','2000 ?????? ?????? ??????',2000,'??????','??????'),('PR2234','?????????','?????????','????????? ????????? ????????? - 10??????',1300,'??????','????????????'),('PR4121','??????','?????????','????????? ?????? FLIP3',3000,'??????','??????'),('PR4124','??????/??????/??????','UNI','[??????] ?????? ???????????? ?????? ???????????????',8000,'??????','??????'),('PR4515','?????????','????????????','???????????? ??? ?????? ?????????',1500,'??????','??????'),('PR4578','??????/??????','?????????','?????? ????????????',700,'??????','??????'),('PR5874','??????','?????????','153 ?????? ?????? ????????? ?????? 5??? ?????? (0.5mm)',3600,'??????','??????'),('PR6654','?????????','?????????','?????????500 ?????????',250,'??????','????????????'),('PR7458','??????/??????/??????','PENTEL','?????? 0.5mm ???????????? ????????? GRAPH 1000 Pro PG1005',15310,'??????','??????'),('PR7848','?????????','TROIKA Germany','[TROIKA] ??????????????? ???????????? ???????????? (PIP25/BG)',22000,'??????','??????'),('PR8569','?????????','(???)?????????','???????????? ?????? ????????? 6??? (1set)',2970,'??????','??????'),('PR8710','??????/??????','?????????','????????? ?????????????????? ????????????',700,'??????','??????'),('PR8741','???????????????','PLEPLE','??????????????? ?????????',4500,'??????','??????'),('PR9634','??????','?????????','????????? FX ZETA ??????',800,'??????','??????'),('PR9645','??????/??????/??????','?????????','???????????? ????????? ?????? 1??????',3600,'??????','????????????');
/*!40000 ALTER TABLE `stationery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'bookstoredb'
--

--
-- Dumping routines for database 'bookstoredb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-30  1:46:13

create view v_member as 
select ID, `name`, contact, address, birth, joindate, birthcoupon
from `member`;
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
INSERT INTO `domesticbook` VALUES ('BZ7468996523','옆방에 킬러가 산다',13500,'나카야마 시치리','북플라자',348,'2021-04-12','중고상품'),('CC1032021456','이야기 나라',14800,'김선화','진영',272,'2021-02-25','새 상품'),('EA7523652101','가시고기',15000,'조창인 ','밝은나라',360,'2019-05-10','중고상품'),('HM9788959407','별자리로 읽는 조선왕조실록',17500,'김은주','시대의창',312,'2021-04-23','새 상품'),('IN9788936438','우리는 페퍼로니에서 왔어',14000,'김금희','창비',324,'2021-05-10','새 상품'),('JM1202168125','별 이야기',12000,'정상현','송문사',206,'2011-03-28','새 상품'),('KG9963201548','반란의 경제',13320,'제이슨 솅커','리드리판',208,'2021-05-04','새 상품'),('LK9788997137','햄스터',13000,'김정희','책공장더불어',248,'2014-09-21','새 상품'),('LM9788994242','가드너 다이어리',18000,'국립수목원','지오북',216,'2014-04-25','중고상품'),('QM1002354785','공인중개사 1차 단원별 기출문제집(2021)',24300,'이영방,심정욱','에듀윌',696,'2021-01-27','새 상품'),('RT7513512021','달러구트 꿈 백화점',12420,'이미예','팩토리나인',300,'2020-07-08','새 상품'),('RV9788936434','아몬드',12000,'손원평','창비',264,'2019-03-31','새 상품'),('YJ4132503602','우리는 모두 집으로 돌아간다',13950,'마쓰이에 마사시','비채',504,'2021-03-29','새 상품'),('YU4515784523','귀천',10000,'이수정','다솜',296,'2021-05-21','중고상품'),('ZC7858542123','수레',8000,'서정진','초현사',278,'2001-08-10','중고상품');
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
INSERT INTO `event` VALUES ('E1111','경제배우고 가계부 받아가자','경제관련 책 구매시 가계부 소책자 증정','2021-06-07','2021-06-21','EVP1111'),('E2222','2021 공인중개사 합격 플랜 시작','2021 공인중개사 책 구매시 플래너 증정','2021-06-14','2021-06-28','EVP2222'),('E3333','생일축하쿠폰이벤트','생일날 할인쿠폰 증정','2021-01-01','2021-12-31','EVP4444'),('E4444','팬텔 제품 구입하고 지우개 받자','팬텔 제품 구매시 지우개 증정','2021-06-01','2021-06-30','EVP3333');
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
INSERT INTO `foreignbook` VALUES ('AA9781984825','How Democracies Die',10700,'Daniel Ziblatt, Steven Levitsky','Broadway Books ',385,'2019-01-15','중고상품'),('AF4651236548','Wonder',6600,'R. J, Palacio','Random House USA Inc',320,'2014-06-01','중고상품'),('AS7621003651','The Course of Love',26000,'알랭 드 보통 ',' Penguin Export ',256,'2016-04-28','새 상품'),('DS9780099590','Sapiens',15300,'Yuval Noah Harari','Vintage Books',512,'2015-04-30','새 상품'),('EE9781786892','The Midnight Library',16200,'Matt Haig','Canongate Books',304,'2021-02-18','새 상품'),('GD4512345415','Noise : A Flaw in Human Judgment (Paperback) ',22700,'올리비에 시보니,대니얼 카너먼,캐스 R. 선스타인 ',' Little, Brown and Company ',384,'2021-05-18','새 상품'),('HD7551745212','Dog Man #10 : Mothering Heights (Hardcover) ',15500,'Dav Pilkey ',' Graphix  ',224,'2021-03-23','새 상품'),('HF7842162489','Fire and Fury : Inside the Trump White House (Paperback, 영국판) ',25500,'마이클 월프',' Little, Brown ',336,'2018-01-09','중고상품'),('JS7896354123','The Giving Tree',11950,'Shel Silverstein','Harper Collins College',64,'1964-06-01','새 상품'),('KG9651232021','How to Steal a Dog',5300,'O\'Connor, Babara','Square Fish',170,'2009-04-28','새 상품'),('LO7951236548','Bluebeard\'s First Wife',18920,'Seong-nan Ha, Hong, Janet','Open Letter',243,'2020-06-16','중고상품'),('PY7898451354','Hiroshi Fujiwara: Fragment #2',60000,'Fujiwara, Hiroshi ','Rizzoli',256,'2020-10-13','새 상품'),('QA9781786576','The World',41980,'Lonely Planet Publications (COR)','Lonely Planet',992,'2017-10-17','새 상품'),('QE9780385496','Tuesdays With Morrie',9900,'Mitch Albom','Bantam Books',208,'2005-12-27','중고상품'),('RS7123025874','The Girl Who Drank the Moon (Paperback, 영국판) ',19900,'켈리 반힐',' templar publishing ',400,'2017-08-24','중고상품');
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
INSERT INTO `giftcard` VALUES ('GC1000','문화상품권 3천원권',3000,'컬쳐랜드'),('GC1001','문화상품권 5천원권',5000,'컬쳐랜드'),('GC1002','문화상품권 1만원권',10000,'컬쳐랜드'),('GC1003','문화상품권 3만원권',30000,'컬쳐랜드'),('GC1004','문화상품권 5만원권',50000,'컬쳐랜드'),('GC2000','도서문화상품권 3천원권',3000,'북앤라이프'),('GC2001','도서문화상품권 5천원권',5000,'북앤라이프'),('GC2002','도서문화상품권 1만원권',10000,'북앤라이프'),('GC2003','도서문화상품권 3만원권',30000,'북앤라이프'),('GC2004','도서문화상품권 5만원권',50000,'북앤라이프'),('GC3000','해피머니상품권 3천원권',3000,'해피머니'),('GC3001','해피머니상품권 5천원권',5000,'해피머니'),('GC3002','해피머니상품권 1만원권',10000,'해피머니'),('GC3003','해피머니상품권 3만원권',30000,'해피머니'),('GC3004','해피머니상품권  5만원권',50000,'해피머니');
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
INSERT INTO `member` VALUES ('6djtev3','s8010m.uq&','정진영','010-2147-7152','서울특별시 금천구 가산디지털로 256-6','1990-02-23','2016-01-18',0),('77pjh','4900six59','박정훈','0109502-4900','경기도 성남시 수정구 태평로 28 104동 702호','1988-12-10','2020-10-21',1),('9wlgj0','7887wldnjs','허지원','010-6262-7960','경상북도 경주시 충효5길 13 203동 1101호','2001-08-23','2020-01-25',0),('axtiwfs40','t7qn5','송현수','010-1785-3654','서울특별시 관악구 청룡동 167-9','1984-04-20','2020-11-13',1),('gkjk7q4','gldksd!!815','이가은','010-5875-6224','전라북도 익산시 어양동 푸르지오아파트 107동 1202호','2001-02-11','2020-11-23',0),('jisu0112','passkn1212','김지수','010-6317-1384','대전광역시 중구 선화로22번길 25 113동 402호','1995-01-12','2019-10-23',0),('kksskk1123','wrsdzcf!45','박태수','010-62848-6215','부산광역시 해운대구 이투빌라 302호','1981-06-07','2006-12-08',0),('marads97','ionx99io','최준우','010-1683-0296','서울특별시 마포구 숭문길 98 107동 2201호','1997-03-30','2021-03-11',0),('mdddm74','ddggasd!74','김슬','010-4711-1145','울산광역시 남구 달동 루아빌라 202호','1985-08-27','2007-03-01',1),('nl3vt5jyg','qgxhe$','채왕태','010-3697-8563','경기도 안양시 동안구 관악대로 207-1','1999-10-04','2021-05-15',1),('q1s2daa','rsdff@154','김나을','010-7451-5524','강원도 원주시 학성동 삼성아파트 111동 102호','1998-04-23','2018-01-13',0),('qsddsd48','azd!@4515','신수현','010-7125-6518','충남 천안시 중앙동 하늘아파트 120동 1102호','1984-10-15','2008-08-11',0),('upqs7541jx','5xc&@8um','백지희','010-6457-5368','서울특별시 중랑구 신내동 741-6','1995-01-13','2018-06-01',0),('wis1000','pajh294850','이지혜','010-3960-2911','경상남도 진주시 모덕로181번길 10 102동 201호','1994-10-22','2021-02-19',1),('zgwv8','0rus961%$o','황봉오','010-7894-9437','경기도 성남시 분당구 정자일로 654-1','2000-11-22','2016-10-22',0),('admin','0','관리자','0','0','0','0',0);
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
INSERT INTO `record` VALUES ('AS1548','Amy Shark (에이미 샤크)','Cry Forever [실버 마블 컬러 LP]','Sony Music','Sony Music',52600,'2021-05-12'),('BT9878','방탄소년단','방탄소년단 - 정규 3집 LOVE YOURSELF','BIGHIT MUSIC',' YG PLUS',78400,'2018-05-18'),('BY8587','백예린','Every letter I sent you.','드림어스컴퍼니','블루바이닐',27500,'2020-01-13'),('ER1415','이날치','수궁가 special edition','뮤직앤뉴','뮤직앤뉴',20100,'2021-02-15'),('EX6547','엑소','엑소 - 12월의 기적','SM엔터테인먼트','SM엔터테인먼트',15000,'2013-12-09'),('GR8786','구름','많이 과정해서 하는 말','비스킷 사운드','블루바이닐',16700,'2021-03-19'),('IU4123','아이유','LILAC [정규 5집] [HILAC VER]','KAKAO ENTERTAINMENT','이담엔터테인먼트',19300,'2021-03-26'),('KG1325','김광석','김광석 - 2집 사랑했지만 [180Gram LP]','다락사운드','LP 체코',46000,'2016-01-12'),('LS1325','이승기','The Project','KAKAO ENTERTAINMENT','후크엔터테인먼트',18400,'2020-12-10'),('NC0235','엔시티','엔시티 - 2집 RESONANCE Pt.2','SM엔터테인먼트','키노앨범',23200,'2020-12-14'),('SN7786','샤이니','ATLANTIS [정규 7집] [리패키지]','SM엔터테인먼트','SM엔터테인먼트',19300,'2021-04-15'),('ST0023','스테이씨','STAYDOM [싱글 2집]','KAKAO ENTERTAINMENT','하이업엔터테인먼트',13400,'2021-04-08'),('SY4954','소녀시대','소녀시대 2집 - Oh! ','SM 엔터테인먼트','SM엔터테인먼트',15300,'2010-01-28'),('WE2021','웬디','LIKE WATER [미니 1집] [CASE VER]','SM엔터테인먼트','SM엔터테인먼트',19300,'2021-04-05'),('WI8752','휘인','REDD [미니]','KAKAO ENTERTAINMENT','RBW',17800,'2021-04-13');
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
INSERT INTO `stationery` VALUES ('EVP1111','이벤트 상품','기타','가계부 소책자 증정품',0,'중국','수입'),('EVP2222','이벤트 상품','기타','공인중개사 플래너 증정품',0,'중국','수입'),('EVP3333','이벤트 상품','기타','펜텔 지우개',0,'일본','수입'),('EVP4444','이벤트 상품','기타','생일 할인쿠폰',-2000,'기타','기타'),('PR0651','볼펜','PLEPLE','2000 당근 노크 볼펜',2000,'중국','수입'),('PR2234','형광펜','알앤비','제브라 옵텍스 형광펜 - 10칼라',1300,'일본','병행수입'),('PR4121','볼펜','모나미','모나미 플립 FLIP3',3000,'한국','국산'),('PR4124','연필/샤프/홀더','UNI','[한정] 유니 어드밴스 샤프 레트로모던',8000,'일본','수입'),('PR4515','북마크','푹프렌즈','빨간머리 앤 투명 책갈피',1500,'한국','국산'),('PR4578','마카/매직','자바펜','자바 유성매직',700,'한국','국산'),('PR5874','볼펜','모나미','153 나는 나로 살기로 했다 5종 세트 (0.5mm)',3600,'한국','국산'),('PR6654','사인펜','알앤비','어데나500 사인펜',250,'태국','병행수입'),('PR7458','연필/샤프/홀더','PENTEL','펜텔 0.5mm 샤프펜슬 그래프 GRAPH 1000 Pro PG1005',15310,'일본','수입'),('PR7848','멀티펜','TROIKA Germany','[TROIKA] 멀티태스킹 미니볼펜 블랙골드 (PIP25/BG)',22000,'중국','수입'),('PR8569','형광펜','(주)인디고','레인보우 블럭 형광펜 6개 (1set)',2970,'중국','국산'),('PR8710','마카/매직','모나미','모나미 유성매직슈퍼 유성마카',700,'한국','국산'),('PR8741','독서기록장','PLEPLE','독서기록함 베이직',4500,'한국','국산'),('PR9634','볼펜','모나미','모나미 FX ZETA 볼펜',800,'한국','국산'),('PR9645','연필/샤프/홀더','알앤비','스테들러 옐로우 연필 1다스',3600,'중국','병행수입');
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
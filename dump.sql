-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: billing
-- ------------------------------------------------------
-- Server version 	5.5.5-10.1.33-MariaDB
-- Date: Fri, 28 Jan 2022 14:07:48 +0100

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `admin` VALUES (1,'12345');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `admin` with 1 row(s)
--

--
-- Table structure for table `data`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `sell_date` date NOT NULL,
  `sell_time` time NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=450 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data`
--

LOCK TABLES `data` WRITE;
/*!40000 ALTER TABLE `data` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `data` VALUES (362,'xci','264','jakir','454',666,'2023-02-01','02:57:52','due'),(363,'sre','678','araf','444',555,'2022-01-12','02:59:25','cash'),(364,'mvy','448','abir','1234852',500,'2023-02-01','01:21:21','cash'),(365,'hhc','533','araf','4584545',500,'2022-01-13','01:21:31','cash'),(366,'ivi','399','arif','4554546',600,'2022-01-13','01:21:43','due'),(367,'izn','862','alislam khan','01787725824',500,'2022-01-13','05:25:57','due'),(368,'ytu','893','','',0,'2022-01-13','05:26:26','due'),(369,'kns','325','','',0,'2022-01-13','05:26:46','due'),(370,'pps','299','','',0,'2022-01-13','06:37:08','due'),(371,'wdc','532','','',0,'2022-01-13','06:38:13','cash'),(372,'ubv','868','','',0,'2022-01-13','06:38:45','cash'),(373,'xsa','496','','',0,'2022-01-13','06:42:11','cash'),(374,'trm','769','','',0,'2022-01-17','02:16:59','due'),(375,'wwr','442','','',0,'2022-01-17','02:16:59','due'),(376,'gez','369','','',0,'2022-01-17','02:17:00','due'),(377,'wkh','864','','',0,'2022-01-17','02:17:01','due'),(378,'idp','446','','',0,'2022-01-17','02:17:05','due'),(379,'hmx','256','','',0,'2022-01-17','02:17:05','due'),(380,'chn','633','','',0,'2022-01-17','02:17:06','due'),(381,'xad','586','','',0,'2022-01-17','02:17:06','due'),(382,'vis','852','','',0,'2022-01-17','02:24:03','due'),(383,'ihb','652','','',0,'2022-01-17','02:24:04','due'),(384,'whv','293','','',0,'2022-01-17','02:24:09','cash'),(385,'kwj','494','','',0,'2022-01-17','02:24:11','cash'),(386,'pyf','334','','',0,'2022-01-17','02:24:12','cash'),(389,'spb','236','','',0,'2022-01-17','02:24:18','due'),(390,'rwm','862','','',0,'2022-01-17','02:24:20','due'),(391,'vkb','676','','',0,'2022-01-17','02:24:22','cash'),(392,'phh','336','','',0,'2022-01-17','02:24:24','cash'),(393,'iei','953','','',0,'2022-01-17','02:44:43','due'),(395,'urk','736','','',0,'2022-01-17','02:46:57','due'),(396,'hji','489','','',0,'2022-01-17','02:48:11','due'),(398,'wbv','934','','',0,'2022-01-17','02:50:13','due'),(399,'bmn','457','','',0,'2022-01-17','02:52:07','cash'),(402,'xyh','667','','',0,'2022-01-17','02:53:07','cash'),(403,'tvy','656','','',0,'2022-01-17','02:54:50','cash'),(404,'she','329','','',0,'2022-01-17','02:56:00','due'),(407,'xci','264','','',0,'2022-01-17','02:59:52','due'),(409,'mvy','448','','',0,'2022-01-18','01:03:37','due'),(410,'hhc','533','','',0,'2022-01-18','01:06:42','due'),(412,'izn','862','Alislam khan','01787725824',500,'2022-01-18','02:32:29','cash'),(413,'ytu','893','alsikma','01787725824',500,'2022-01-18','02:35:06','cash'),(414,'kns','325','alislam khan','01787725824',500,'2022-01-18','02:36:16','due'),(415,'pps','299','alislam khan','01787725824',300,'2022-01-18','02:39:15','due'),(416,'wdc','532','alislam khan','01787725824',100,'2022-01-18','02:41:10','cash'),(417,'ubv','868','alislam khan','01787725824',200,'2022-01-18','02:41:44','due'),(418,'xsa','496','alislam khan','01787725824',300,'2022-01-18','02:42:26','cash'),(419,'trm','769','alislam khan','01787725824',400,'2022-01-18','02:43:06','due'),(420,'wwr','442','','',0,'2022-01-18','02:46:21','due'),(425,'chn','633','alislam khan','01787725824',100,'2022-01-18','02:50:03','cash'),(426,'xad','586','Prince islam','01727529248',200,'2022-01-18','02:51:07','cash'),(427,'vis','852','Prince islam','01727529248',500,'2022-01-18','02:51:33','cash'),(428,'ihb','652','','',0,'0000-00-00','00:00:00','available'),(429,'whv','293','','',0,'0000-00-00','00:00:00','available'),(430,'kwj','494','','',0,'0000-00-00','00:00:00','available'),(431,'pyf','334','','',0,'0000-00-00','00:00:00','available'),(432,'jtg','979','','',0,'0000-00-00','00:00:00','available'),(433,'wyb','483','','',0,'0000-00-00','00:00:00','available'),(434,'spb','236','','',0,'0000-00-00','00:00:00','available'),(435,'rwm','862','','',0,'0000-00-00','00:00:00','available'),(436,'vkb','676','','',0,'0000-00-00','00:00:00','available'),(437,'phh','336','','',0,'0000-00-00','00:00:00','available'),(438,'iei','953','','',0,'0000-00-00','00:00:00','available'),(439,'erc','664','','',0,'0000-00-00','00:00:00','available'),(440,'urk','736','','',0,'0000-00-00','00:00:00','available'),(441,'hji','489','','',0,'0000-00-00','00:00:00','available'),(442,'vby','965','','',0,'0000-00-00','00:00:00','available'),(443,'wbv','934','','',0,'0000-00-00','00:00:00','available'),(444,'bmn','457','','',0,'0000-00-00','00:00:00','available'),(445,'dva','754','','',0,'0000-00-00','00:00:00','available'),(446,'fiu','897','','',0,'0000-00-00','00:00:00','available'),(447,'xyh','667','','',0,'0000-00-00','00:00:00','available'),(448,'tvy','656','','',0,'0000-00-00','00:00:00','available'),(449,'she','329','','',0,'0000-00-00','00:00:00','available');
/*!40000 ALTER TABLE `data` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `data` with 74 row(s)
--

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on: Fri, 28 Jan 2022 14:07:49 +0100

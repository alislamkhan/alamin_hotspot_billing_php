-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: billing
-- ------------------------------------------------------
-- Server version 	5.5.5-10.1.33-MariaDB
-- Date: Mon, 31 Jan 2022 19:11:25 +0100

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
  `zone` varchar(5000) NOT NULL,
  `amount` int(255) NOT NULL,
  `sell_date` date NOT NULL,
  `sell_time` time NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=495 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data`
--

LOCK TABLES `data` WRITE;
/*!40000 ALTER TABLE `data` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `data` VALUES (448,'tvy','656','muhammad al islam','01787725824','keranigonj',400,'2022-01-31','18:50:13','cash'),(449,'she','329','alislam khan','01787725824','aganagar',300,'2022-01-31','18:50:46','cash'),(452,'sre','678','','','',0,'2022-02-01','00:08:46','due'),(453,'mvy','448','','','',0,'2022-02-01','00:10:12','due'),(454,'hhc','533','','','',0,'0000-00-00','00:00:00','available'),(455,'ivi','399','','','',0,'0000-00-00','00:00:00','available'),(456,'izn','862','','','',0,'0000-00-00','00:00:00','available'),(457,'ytu','893','','','',0,'0000-00-00','00:00:00','available'),(458,'kns','325','','','',0,'0000-00-00','00:00:00','available'),(459,'pps','299','','','',0,'0000-00-00','00:00:00','available'),(460,'wdc','532','','','',0,'0000-00-00','00:00:00','available'),(461,'ubv','868','','','',0,'0000-00-00','00:00:00','available'),(462,'xsa','496','','','',0,'0000-00-00','00:00:00','available'),(463,'trm','769','','','',0,'0000-00-00','00:00:00','available'),(464,'wwr','442','','','',0,'0000-00-00','00:00:00','available'),(465,'gez','369','','','',0,'0000-00-00','00:00:00','available'),(466,'wkh','864','','','',0,'0000-00-00','00:00:00','available'),(467,'idp','446','','','',0,'0000-00-00','00:00:00','available'),(468,'hmx','256','','','',0,'0000-00-00','00:00:00','available'),(469,'chn','633','','','',0,'0000-00-00','00:00:00','available'),(470,'xad','586','','','',0,'0000-00-00','00:00:00','available'),(471,'vis','852','','','',0,'0000-00-00','00:00:00','available'),(472,'ihb','652','','','',0,'0000-00-00','00:00:00','available'),(473,'whv','293','','','',0,'0000-00-00','00:00:00','available'),(474,'kwj','494','','','',0,'0000-00-00','00:00:00','available'),(475,'pyf','334','','','',0,'0000-00-00','00:00:00','available'),(476,'jtg','979','','','',0,'0000-00-00','00:00:00','available'),(477,'wyb','483','','','',0,'0000-00-00','00:00:00','available'),(478,'spb','236','','','',0,'0000-00-00','00:00:00','available'),(479,'rwm','862','','','',0,'0000-00-00','00:00:00','available'),(480,'vkb','676','','','',0,'0000-00-00','00:00:00','available'),(481,'phh','336','','','',0,'0000-00-00','00:00:00','available'),(482,'iei','953','','','',0,'0000-00-00','00:00:00','available'),(483,'erc','664','','','',0,'0000-00-00','00:00:00','available'),(484,'urk','736','','','',0,'0000-00-00','00:00:00','available'),(485,'hji','489','','','',0,'0000-00-00','00:00:00','available'),(486,'vby','965','','','',0,'0000-00-00','00:00:00','available'),(487,'wbv','934','','','',0,'0000-00-00','00:00:00','available'),(488,'bmn','457','','','',0,'0000-00-00','00:00:00','available'),(489,'dva','754','','','',0,'0000-00-00','00:00:00','available'),(490,'fiu','897','','','',0,'0000-00-00','00:00:00','available'),(491,'xyh','667','','','',0,'0000-00-00','00:00:00','available'),(492,'tvy','656','','','',0,'0000-00-00','00:00:00','available'),(493,'she','329','','','',0,'0000-00-00','00:00:00','available'),(494,'rcs','375','','','',0,'0000-00-00','00:00:00','available');
/*!40000 ALTER TABLE `data` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `data` with 45 row(s)
--

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on: Mon, 31 Jan 2022 19:11:25 +0100

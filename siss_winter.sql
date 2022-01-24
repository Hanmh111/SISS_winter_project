-- MariaDB dump 10.19  Distrib 10.4.22-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: siss_winter
-- ------------------------------------------------------
-- Server version	10.4.22-MariaDB

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
-- Table structure for table `community_information`
--

DROP TABLE IF EXISTS `community_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `community_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `author` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `community_information`
--

LOCK TABLES `community_information` WRITE;
/*!40000 ALTER TABLE `community_information` DISABLE KEYS */;
INSERT INTO `community_information` VALUES (1,'first 문제','first ...','2022-01-21 19:10:14','Anonymous');
/*!40000 ALTER TABLE `community_information` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `community_text`
--

DROP TABLE IF EXISTS `community_text`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `community_text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `author` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `community_text`
--

LOCK TABLES `community_text` WRITE;
/*!40000 ALTER TABLE `community_text` DISABLE KEYS */;
INSERT INTO `community_text` VALUES (3,'mysql','mysql is...','2022-01-21 05:35:00','Anonymous'),(4,'Oracle','Oracle is ...','2022-01-21 05:35:35','Anonymous'),(5,'SQL Server','SQL Server is ...','2022-01-21 05:35:55','Anonymous'),(6,'MongoDB','MongoDB is ...','2022-01-21 05:36:12','Anonymous'),(7,'hello','this is web page','2022-01-21 05:38:45','Anonymous'),(12,'hello2','hello2...','2022-01-22 01:21:41','Anonymous');
/*!40000 ALTER TABLE `community_text` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gamelogin`
--

DROP TABLE IF EXISTS `gamelogin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gamelogin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_pw` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gamelogin`
--

LOCK TABLES `gamelogin` WRITE;
/*!40000 ALTER TABLE `gamelogin` DISABLE KEYS */;
INSERT INTO `gamelogin` VALUES (1,'admin','0000','2022-01-21 19:14:13');
/*!40000 ALTER TABLE `gamelogin` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-24 19:27:10

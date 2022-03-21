-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: localhost    Database: website
-- ------------------------------------------------------
-- Server version	8.0.27

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
-- Table structure for table `employer_account`
--

DROP TABLE IF EXISTS `employer_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employer_account` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employer_account`
--

LOCK TABLES `employer_account` WRITE;
/*!40000 ALTER TABLE `employer_account` DISABLE KEYS */;
INSERT INTO `employer_account` VALUES (1,'tiendatvip1@gmail.com','$2y$10$Uw.s3eFQKMmrrX.NL6rZTux3/nmFgPsHkaoTDAwLyUxi2O695lZqG'),(2,'tiendatvip2@gmail.com','$2y$10$O2ZiVPNnK9bbDmqg4d3qg.Yimpz/ygN2.yfUPnABsYvepNpKw3Nee'),(3,'JohnKenedy112@gmail.com','$2y$10$Qk17BFqEMw2hbG02EXgWMuK.IrXgLQX3lSB2YphpAbp2vnD609GN2'),(4,'DatK12@gmail.com','$2y$10$RWQ2VX7w8ba.Ekjf2MGMoeAvoPI0QDrTnbenROFgejXwmza8htmTG'),(5,'TomHank12@gmail.com','$2y$10$mJS/9B47I3vHRi899xesuOsN5DUQNJte9C4sd5KMP2saq7f2R.waW'),(6,'tiendatvip3@gmail.com','$2y$10$4Iyw/oFpNWdS.BIbmgFrjusT0JLVR.0Rr9PO37SVMDu7ZHk4bVNaS');
/*!40000 ALTER TABLE `employer_account` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-27  9:15:24

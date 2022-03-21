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
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `salary` varchar(255) DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `requirement` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `status` bit(1) DEFAULT b'0',
  `employer_id` int DEFAULT NULL,
  `industry_id` int DEFAULT NULL,
  `level_id` int DEFAULT NULL,
  `city_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `industry_id` (`industry_id`),
  KEY `city_id` (`city_id`),
  KEY `level_id` (`level_id`),
  KEY `employer_id` (`employer_id`),
  CONSTRAINT `post_ibfk_1` FOREIGN KEY (`industry_id`) REFERENCES `industry` (`id`),
  CONSTRAINT `post_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  CONSTRAINT `post_ibfk_3` FOREIGN KEY (`level_id`) REFERENCES `level` (`id`),
  CONSTRAINT `post_ibfk_4` FOREIGN KEY (`employer_id`) REFERENCES `employer` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (11,'tiendat10002@gmail.com','Product Excutive','5000$','2022-02-25','CÔNG TY CỔ PHẦN DƯỢC PHẨM BOSTON VIỆT NAM','logo/11.png','description/11.txt','requirement/11.txt','643 Vo Hoang',_binary '',1,19,4,2),(12,'tiendat10002@gmail.com','QC Engineer','15,000,000 - 20,000,000 vnd','2022-02-24','SAIGON TECHNOLOGY SOLUTIONS','logo/12.png','description/12.txt','requirement/12.txt','M.I.D Building, 02 Nguyen The Loc Street, Ward 12, Tan Binh District, Ho Chi Minh',_binary '',1,18,3,2),(13,'Vinbrain@gmail.com','Front End Engineer (React JS, AngularJS)','Negotiate','2022-01-28','CÔNG TY TNHH VINBRAIN','logo/13.png','description/13.txt','requirement/13.txt','Tầng 7, Tòa Nhà phòng khám VinMec TimesCity, 458 Phố Minh Khai, Vĩnh Tuy, Hai Bà Trưng, Hà Nội',_binary '',2,18,3,1),(14,'zuelligpharma@gmail.com','Key Account Manager (Private Hospital)','20,000,000vnd','2022-01-22','ZUELLIG PHARMA VIET NAM','logo/14.png','description/14.txt','requirement/14.txt','TNR Tower, 180-192 Nguyen Cong Tru, Dist.1, HCMC',_binary '',2,19,3,2),(16,'tiendat10002@gmail.com','UX UI Designer','3000$','2022-01-29','MCKINSEY & COMPANY','logo/16.png','description/16.txt','requirement/16.txt','65 Đường Lê Lợi, Bến Nghé, District 1, Ho Chi Minh City, Vietnam',_binary '',2,18,3,2),(17,'USEMBASSY@gmail.com','Public Health Specialist (Health Information Advisor)','1900$','2022-03-03','U.S. MISSION VIETNAM – U.S. EMBASSY IN HANOI','logo/17.png','description/17.txt','requirement/17.txt','Ha Noi',_binary '',2,19,4,1),(18,'Masterise@gmail.com','Legal Senior Manager/director','Negotiate','2022-04-16','CÔNG TY CỔ PHẦN TẬP ĐOÀN MASTERISE','logo/18.png','description/18.txt','requirement/18.txt','Tầng 17, Friendship Tower, Lê Duẩn, Bến Nghé, Quận 1, Thành phố Hồ Chí Minh, Việt Nam',_binary '',3,6,4,2),(19,'JohnKenedy112@gmail.com','Nam Chuyên Viên Pháp Lý Dự Án','2000$','2022-01-29','CÔNG TY CỔ PHẦN ĐẦU TƯ VÀ PHÁT TRIỂN ĐÔ THỊ SÀI GÒN','logo/19.png','description/19.txt','requirement/19.txt','Long An, Vietnam',_binary '',3,6,3,49),(20,'vusdanang@gmail.com','English Teachers/ Giáo Viên Tiếng Anh','20,000,000vnd','2022-02-21','VUS - THE ENGLISH CENTER','logo/20.png','description/20.txt','requirement/20.txt','143-145 Nguyễn Văn Linh, Hải Châu District, Đà Nẵng, Việt Nam',_binary '',3,27,3,4),(22,'Mazarsvn@gmail.com','Senior Accountant','1500$','2022-03-05','MAZARS VIETNAM','logo/22.png','description/22.txt','requirement/22.txt','Hồ Chí Minh, Việt Nam',_binary '',3,1,3,2),(23,'Jaspal@gmai.com','AP and Inventory Accountant','2000$','2022-03-05','JASPAL COMPANY LIMITED','logo/23.png','description/23.txt','requirement/23.txt','Hồ Chí Minh, Việt Nam',_binary '',3,1,3,2),(24,'Masterise@gmail.com','Nhân Viên Kế Toán Bán Hàng','3000$','2022-03-09','CÔNG TY CỔ PHẦN TẬP ĐOÀN MASTERISE','logo/24.png','description/24.txt','requirement/24.txt','Masteri An Phú, Xa lộ Hà Nội, Thao Dien, District 2, Ho Chi Minh City, Vietnam',_binary '',3,1,4,2),(25,'RBEVN@gmail.com','Accountant (Korean and English Speaking)','2300$','2022-04-28','ROBERT BOSCH ENGINEERING VIETNAM','logo/25.png','description/25.txt','requirement/25.txt','364 Cộng Hòa, Phường 13, Tân Bình, Hồ Chí Minh, Vietnam',_binary '',2,1,3,2),(26,'Masterise@gmail.com','Project Secretary','26,000,000vnd','2022-03-03','CÔNG TY CỔ PHẦN TẬP ĐOÀN MASTERISE','logo/26.png','description/26.txt','requirement/26.txt','Masteri An Phú, Xa lộ Hà Nội, Thao Dien, District 2, Ho Chi Minh City, Vietnam',_binary '',2,29,3,2),(27,'MUFGbank@gmail.com','Cash Sale Staff - Transaction Banking','2000$','2022-03-05','MUFG BANK, LTD., HO CHI MINH CITY BRANCH','logo/27.jpg','description/27.txt','requirement/27.txt','5B Ton Duc Thang, P Ben Nghe. Quan 1.',_binary '',2,11,3,2),(28,'brenntagvn@gmail.com','Factory Director (Food & Nutrition)','1500$','2022-01-30','BRENNTAG VIETNAM CO, LTD','logo/28.jpg','description/28.txt','requirement/28.txt','Dong Nai, Vietnam',_binary '',2,12,5,48);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
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

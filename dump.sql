-- MySQL dump 10.13  Distrib 8.3.0, for macos14.2 (arm64)
--
-- Host: localhost    Database: projekcik
-- ------------------------------------------------------
-- Server version	8.3.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE = @@TIME_ZONE */;
/*!40103 SET TIME_ZONE = '+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS = @@UNIQUE_CHECKS, UNIQUE_CHECKS = 0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS = 0 */;
/*!40101 SET @OLD_SQL_MODE = @@SQL_MODE, SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES = @@SQL_NOTES, SQL_NOTES = 0 */;

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gallery`
(
    `img_id`          int          NOT NULL AUTO_INCREMENT,
    `img_path`        varchar(255) NOT NULL,
    `img_author`      int          NOT NULL,
    `img_description` text,
    PRIMARY KEY (`img_id`),
    KEY `img_author` (`img_author`),
    CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`img_author`) REFERENCES `users` (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 4
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery`
--

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery`
    DISABLE KEYS */;
INSERT INTO `gallery`
VALUES (1, 'NFTImg/661e90f03da9b9.70007620.png', 1, 'Here is my friend, Mr.Clippy!!!'),
       (2, 'NFTImg/661e91a9c452d1.28544719.png', 1,
        'My password is &quot;qwerty&quot;, don&#039;t tell this secret to anyone!'),
       (3, 'NFTImg/661e92a2119533.81159623.png', 2, 'Is anyone knows, where can I buy this shoes?');
/*!40000 ALTER TABLE `gallery`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profiles`
(
    `profiles_id`          int  NOT NULL AUTO_INCREMENT,
    `profiles_about`       text NOT NULL,
    `profiles_intro_title` text NOT NULL,
    `profiles_intro_text`  text NOT NULL,
    `users_id`             int          DEFAULT NULL,
    `profile_image`        varchar(255) DEFAULT NULL,
    PRIMARY KEY (`profiles_id`),
    KEY `users_id` (`users_id`),
    CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 3
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles`
    DISABLE KEYS */;
INSERT INTO `profiles`
VALUES (1, 'meow meow meow meow meow meow meow meow meow meow meow meow meow meow meow :3', 'Meow, meow ',
        'Drink more milk, it&#039;s good for your heath!', 1, 'img/661e90d81ac698.30548031.jpg'),
       (2, 'I worked as assistant for a long time!', 'Hi, my name is Mr. Clippy!!', 'How can I help you?', 2,
        'img/661e92885b2489.97218835.png');
/*!40000 ALTER TABLE `profiles`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users`
(
    `id`         int          NOT NULL AUTO_INCREMENT,
    `username`   varchar(30)  NOT NULL,
    `pwd`        varchar(255) NOT NULL,
    `email`      varchar(100) NOT NULL,
    `created_at` datetime     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 3
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users`
    DISABLE KEYS */;
INSERT INTO `users`
VALUES (1, 'qwerty', '$2y$12$5.d2sSvlyEgU/caFrH5Ou.j6RxFF1eOq9h7SyTWG1.Frc8M8OcWCi', 'qwe@qwe.qwe',
        '2024-04-16 16:51:53'),
       (2, 'mr_clippy', '$2y$12$i7QBGyaUHqWtEmI.o2IIPee1uc/mzxbyliHbgpm4ofiDtSsThzgq.', 'mr.clippy@icloud.com',
        '2024-04-16 16:57:36');
/*!40000 ALTER TABLE `users`
    ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE = @OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE = @OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS = @OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES = @OLD_SQL_NOTES */;

-- Dump completed on 2024-04-16 17:11:35

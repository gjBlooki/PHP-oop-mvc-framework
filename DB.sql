-- MySQL dump 10.13  Distrib 5.7.28, for Linux (x86_64)
--
-- Host: localhost    Database: MyProject
-- ------------------------------------------------------
-- Server version	5.7.28-0ubuntu0.18.04.4

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
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (36,19,'Post title','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu cursus euismod quis viverra. Consequat semper viverra nam libero. In egestas erat imperdiet sed euismod. Elementum pulvinar etiam non quam lacus suspendisse faucibus. Massa ultricies mi quis hendrerit. Eget felis eget nunc lobortis mattis aliquam faucibus. Morbi quis commodo odio aenean sed. Scelerisque mauris pellentesque pulvinar pellentesque habitant. Volutpat commodo sed egestas egestas fringilla phasellus faucibus scelerisque. Malesuada proin libero nunc consequat interdum varius sit amet. Amet est placerat in egestas erat imperdiet. Velit dignissim sodales ut eu. Nunc sed velit dignissim sodales ut eu sem integer vitae. Eleifend quam adipiscing vitae proin sagittis nisl rhoncus. Sit amet est placerat in. Duis at consectetur lorem donec massa sapien faucibus et molestie. Eget sit amet tellus cras adipiscing enim eu turpis. Et malesuada fames ac turpis egestas sed tempus.\r\n\r\nFeugiat scelerisque varius morbi enim nunc. Non enim praesent elementum facilisis. Vitae elementum curabitur vitae nunc. Ut pharetra sit amet aliquam id diam maecenas ultricies mi. Pellentesque habitant morbi tristique senectus. At urna condimentum mattis pellentesque id nibh. Sit amet consectetur adipiscing elit. In cursus turpis massa tincidunt dui ut ornare. Quis enim lobortis scelerisque fermentum dui faucibus in ornare quam. Volutpat commodo sed egestas egestas fringilla phasellus faucibus scelerisque. Dis parturient montes nascetur ridiculus mus mauris vitae. Facilisi nullam vehicula ipsum a arcu cursus vitae congue. Iaculis eu non diam phasellus vestibulum lorem sed risus. Turpis massa sed elementum tempus egestas sed. Eu volutpat odio facilisis mauris. Lorem sed risus ultricies tristique nulla aliquet enim tortor.\r\n\r\nIn aliquam sem fringilla ut morbi tincidunt augue interdum. Vitae congue mauris rhoncus aenean vel. Sed sed risus pretium quam vulputate dignissim suspendisse in. Ultrices in iaculis nunc sed augue lacus viverra vitae congue. Risus sed vulputate odio ut enim. Mattis vulputate enim nulla aliquet. Eget nunc lobortis mattis aliquam. Convallis aenean et tortor at risus viverra. Dictumst quisque sagittis purus sit amet. Bibendum ut tristique et egestas quis ipsum suspendisse ultrices. In tellus integer feugiat scelerisque varius morbi enim. Amet purus gravida quis blandit. Egestas sed tempus urna et pharetra pharetra. Pellentesque habitant morbi tristique senectus et. Risus quis varius quam quisque. Ullamcorper dignissim cras tincidunt lobortis feugiat vivamus at augue. Pretium fusce id velit ut tortor pretium viverra suspendisse. Aliquet nibh praesent tristique magna sit amet purus gravida quis. Augue interdum velit euismod in pellentesque massa placerat. Amet nulla facilisi morbi tempus iaculis urna.\r\n\r\nPulvinar etiam non quam lacus suspendisse faucibus. At volutpat diam ut venenatis. Orci sagittis eu volutpat odio facilisis mauris. Est ultricies integer quis auctor elit sed. Viverra vitae congue eu consequat ac felis donec et. Consectetur adipiscing elit ut aliquam purus sit. Condimentum vitae sapien pellentesque habitant morbi tristique senectus. Lectus proin nibh nisl condimentum. Libero nunc consequat interdum varius. Sed sed risus pretium quam. Velit aliquet sagittis id consectetur purus ut. At lectus urna duis convallis convallis tellus id interdum velit. In nibh mauris cursus mattis molestie a iaculis at. Morbi leo urna molestie at elementum. Sit amet venenatis urna cursus. Massa enim nec dui nunc.\r\n\r\nQuam id leo in vitae turpis massa. Molestie ac feugiat sed lectus vestibulum. Facilisi etiam dignissim diam quis enim lobortis. Mattis nunc sed blandit libero. Turpis nunc eget lorem dolor. Et netus et malesuada fames ac. Dui vivamus arcu felis bibendum ut tristique et egestas. Egestas integer eget aliquet nibh praesent tristique. Diam phasellus vestibulum lorem sed risus ultricies tristique nulla aliquet. Urna et pharetra pharetra massa massa ultricies mi quis. Sit amet consectetur adipiscing elit ut aliquam purus sit amet. Pellentesque pulvinar pellentesque habitant morbi tristique senectus et netus et. Lorem donec massa sapien faucibus et molestie. Elit duis tristique sollicitudin nibh sit amet commodo nulla. Pellentesque nec nam aliquam sem et tortor consequat id. Praesent elementum facilisis leo vel fringilla est. Aliquam ut porttitor leo a diam. Netus et malesuada fames ac turpis egestas maecenas. Eu scelerisque felis imperdiet proin fermentum leo vel orci porta. Amet justo donec enim diam vulputate ut pharetra sit amet.','2020-03-01 11:55:32');
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `author_id` varchar(50) NOT NULL,
  `content` varchar(250) NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (56,36,'19','I\'m glad to present you my new post!','2020-03-21 17:21:41'),(57,36,'20','Cool! Keep doing such a content!','2020-03-21 17:22:33');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `role` enum('admin','user') NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `auth_token` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nickname` (`nickname`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 COMMENT='Таблица с пользователями';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@gmail.com',1,'admin','hash1','token1','2019-12-31 22:44:32'),(19,'test','test@mail.com',1,'admin','$2y$10$N6a.QcQqBmf4CJSnhIVq4u99PvjbuEp6vv98uN1xe.P0tmMakHdEq','8ee2d5853e92d7b0ad0c8fa3ea69123824b0bdf08db4565f90a815022af12eb7592e07c12c4c8a68','2020-02-08 19:31:21'),(20,'user','user@mail.com',1,'user','$2y$10$zPyXZN/OZ3U7o1YrMi0peOhPTJqB9emdTavshYgMTYOYcNke9fZgq','56f6f147b8523d67280477dee1e1c9b0a1fdef3afcc9304f39071de3ed93be282cf4704876f83043','2020-02-13 07:54:49'),(21,'savenkover','savenkover@mail.ru',1,'user','$2y$10$n9sxCcYyETAyQL8bSOjFm.PDUk2dXUATGNRrAK7xT49bF0FW8Va.u','79d3a2331683faa0e203953e515eb4d485a861da6323ddce7c88b1c8251d248eac5907f2fbf181ca','2020-02-23 11:14:31');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_activation_codes`
--

DROP TABLE IF EXISTS `users_activation_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_activation_codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Таблица с ключами активации пользователей';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_activation_codes`
--

LOCK TABLES `users_activation_codes` WRITE;
/*!40000 ALTER TABLE `users_activation_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_activation_codes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-03-21 19:37:01

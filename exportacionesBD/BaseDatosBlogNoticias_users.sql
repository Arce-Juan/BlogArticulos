-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: localhost    Database: BaseDatosBlogNoticias
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.18.04.1

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `idUsers` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `imagen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activo` int(11) NOT NULL,
  `apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Perfil_idPerfil` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idUsers`),
  UNIQUE KEY `users_nickname_unique` (`name`),
  KEY `users_perfil_idperfil_foreign` (`Perfil_idPerfil`),
  CONSTRAINT `users_perfil_idperfil_foreign` FOREIGN KEY (`Perfil_idPerfil`) REFERENCES `Perfil` (`idPerfil`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'arcej','123','foxer',1,'Arce','Juan','arce.juan@mail.com',4,NULL,NULL,NULL),(2,'galvanj','123','artwork',1,'Galvan','Jose','galvan.jose@mail.com',4,NULL,NULL,NULL),(4,'arcem','','',0,'','','mili@mail.com',5,NULL,'2020-02-19 00:57:46','2020-02-19 00:57:46'),(5,'chanchi','','',0,'','','chanchi@chanchi.com',5,'rw9X8Dn9qpLVENtHPTeeEfQmY16cSPYxElz50LxEZFzbpx36KdLbpNvtmADk','2020-02-19 01:12:17','2020-02-19 01:12:17'),(6,'mili','$2y$10$k1jr53fi.c9vr9kWPXJITulHVXjupwCH0rv.sCLY3QGibrRk/GKa2','',1,'','','',5,'4ktt8nPkgpDXF95ci5JH2xw4EpHbaJzO6YxnXfivTahMmH22wMjTOrVettNW',NULL,NULL),(7,'Invitado','$2y$10$tsvPNoC6FXZCQV80SHDVzez7G3hO.Nd1ve08IUFT1YDr2hjeDqxO6','',1,'','','',5,'UcU8AxEcHkumlcKqHBLWOgdNdjHT1G6eQADeBAXHnrXrbH1m4maOqhks630r',NULL,NULL),(8,'hola','$2y$10$fBzv/Bqde9VcAU5nr8v/iOWXLXkAGmXJaeASA/RFb.u9bKMqlXb12','',1,'','','',5,'CykFBzjiHYZW9AMAOLTgtH1ZXDbto1nhTob9Y4qzCz2T8NJyRDp8feLyBmdI',NULL,NULL),(9,'chau','$2y$10$gASIe9tYO4Um3nUYApgLfuTgNJAWcfpfNdez405XyraLN9p1VGRwS','',1,'','','',5,'iyPVvCooVlCXlewRkTlkdOIxRmc37CsT7RKJD1SH5JyvEBnI4CzGr59TNpPc',NULL,NULL),(10,'buenas','$2y$10$Pu/mMqJDnPiZB6FMbL3U.u5i5Z9x01g4xhszVWTO0qhbSaheo7D/W','',1,'','','',5,'pLXtZgIf3eeUUp2Y2lWZhlS7LNw5DYqioWKAi2WditpDxOE84hOJ3OC79yPn',NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-20 22:51:10

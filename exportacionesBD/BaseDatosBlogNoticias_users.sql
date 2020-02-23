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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (6,'mili','$2y$10$GVcVQIUJiM99faVA1J9IX.jW3go.7mqbbmzMNI8yU4mApfF/1ShEK','usuario4.jpg',1,'vazques','mili','soyMili@mail.com',4,'O9kb8swFjEaeqmthKYyFDg50SzbGptXoHLoW0ZMUVglSJUwWtNUu4l73KT7i',NULL,NULL),(7,'Invitado','$2y$10$tsvPNoC6FXZCQV80SHDVzez7G3hO.Nd1ve08IUFT1YDr2hjeDqxO6','default.png',1,'invitado','invitado','invitado@invitado.com',6,'WJRjB0gTGHdmwg5QUJZWn5e7wThGSMDpmuBbcvXRsmYyyNbpA7QRpgbTqR19',NULL,NULL),(16,'admin','$2y$10$MNIExwchYZRQZlpZ/AZZ0eL2j2h45RNQte/XjuDUfn/W2djGvFTai','default.png',1,'admin','admin','admin@admin.com',5,'vbK2Rjlrkxblm1ptINgFLLiQhUrF1sgAy6YjbmOc5vwSJAV9V0blxUCJ9aNq',NULL,NULL),(18,'chanchi','$2y$10$WKYmz/SBImSK38U0dRXNK.MAp4NczA69R6ZQbg4e1ghbpKuJLtoG.','usuario6.jpg',1,'arce','chanchon','chanchi@chanchi.com',7,'hcATXUJeicrgUTdYQgi9quvETnqqSCDA4nmtcRuDl8ZGOG37Kpw5er1cRStd',NULL,NULL),(19,'arcej','$2y$10$4InxK57FM5lWzAQyMZ1nb.dMpqtsl2uB8AWYE1OBegKhYeaniGmzW','default.png',1,'arce','juan','juan@juan.com',4,'nRwygfxVX26mI0K6HtBs3xlyFqw8t6dVAZrsrUdXZSWbrzDqBXgkJdOvF9Mh',NULL,NULL);
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

-- Dump completed on 2020-02-23  0:59:37

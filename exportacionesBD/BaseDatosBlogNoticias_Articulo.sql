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
-- Table structure for table `Articulo`
--

DROP TABLE IF EXISTS `Articulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Articulo` (
  `idArticulo` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(40) NOT NULL,
  `cabecera` varchar(100) NOT NULL,
  `cuerpo` varchar(400) DEFAULT NULL,
  `imagen` varchar(800) DEFAULT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `TipoArticulo_idTipoArticulo` int(11) NOT NULL,
  `activo` int(1) NOT NULL,
  `fechaPublicacion` datetime NOT NULL,
  PRIMARY KEY (`idArticulo`,`Usuario_idUsuario`,`TipoArticulo_idTipoArticulo`),
  KEY `fk_Articulo_Ususario_idx` (`Usuario_idUsuario`),
  KEY `fk_Articulo_TipoArticulo1_idx` (`TipoArticulo_idTipoArticulo`),
  CONSTRAINT `fk_Articulo_TipoArticulo1` FOREIGN KEY (`TipoArticulo_idTipoArticulo`) REFERENCES `TipoArticulo` (`idTipoArticulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Articulo_Ususario` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `users` (`idUsers`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Articulo`
--

LOCK TABLES `Articulo` WRITE;
/*!40000 ALTER TABLE `Articulo` DISABLE KEYS */;
INSERT INTO `Articulo` VALUES (48,'Titulo 1','cabecera 1','cuerpo 1','actualidad.jpg',6,1,0,'2020-02-21 19:55:32'),(49,'Más terror inspirado en “El grito”','Después de que joven madre asesina a su familia en su propia casa, una madre soltera y un detective','Raimi, creador de la saga “Evil Dead” está entusiasmado de regresar a una de sus historias favoritas en una versión más adulta. “Cuando hicimos la original en 2004, el terror seguía siendo algo más bien marginal, para un público de culto. Pero ahora se ha popularizado entre el gran público”, afirmó.','espectaculo2.jpg',16,2,1,'2020-02-22 19:55:04'),(50,'Serían capacitados','Están analizando propuestas para contener a quienes realizan la tarea.','Durante una reunión mantenida entre las carteras de Trabajo y Empleo y Ambiente de la Provincia se analizaron y presentaron propuestas sobre la situación de los recuperadores informales que trabajan con acopios de materiales en basurales a cielo abierto en Jujuy.  directora de Fiscalización del Ministerio de Trabajo, Gabriela Ferreyra Jenks, sostuvo que, además de avanzar sobre los trabajos','social2.jpg',16,3,1,'2020-02-23 19:55:04'),(51,'Atlético retoma el triunfo ante Lanús','El encuentro fue programado para las 21.50. Dirigirá Fernando Espinoza. Televisará TNT Sports','En Atlético, la cuestión pasa por cortar rachas. Una, la de comenzar a revertir el historial desfavorable contra Lanús (tres empates e igual número de derrotas); otra, interrumpir la serie sin victorias que comprende siete partidos en la Superliga. Los equipos estarán frente a frente desde las 21','deporte2.jpg',16,4,1,'2020-02-22 19:55:04'),(55,'Sonic - La película: la Sega continúa','En los albores de los videojuegos infantiles, la criatura azul reaparece ahora en pantalla grande,','Sonic tuvo su primer videojuego en 1991 de la mano de Sega, quien lo adoptó como insignia para competir mano a mano con el éxito de la compañía rival, y quizás la figura más representativa de la historia de los 8 bits, Mario Bros. Desde entonces apareció en una veintena de juegos de las distintas evoluciones de la consola, además de varios cómics, dibujos animados','espectaculo.jpg',6,2,1,'2020-02-24 19:55:04'),(56,'Hicieron una \"gigantografía\".','mujeres encontró la manera de \"suplantar\" a una amiga que a último momento canceló viaje al Carnaval','Miles de historias se tejen alrededor del Carnaval. De amores, de desamores, de amistad, de encuentros y otro sin fin de posibilidades. Y el de este grupo de amigas que llegó desde Tucumán es una de esas tantas que engalanan las místicas carnestolendas. Sucede que desde hace meses un grupo de amigas viene palpitando la tradicional despedida de soltera de una de las integrantes.','social.jpg',16,3,1,'2020-02-22 20:00:27');
/*!40000 ALTER TABLE `Articulo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-24  1:50:56

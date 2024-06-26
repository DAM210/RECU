-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 10.0.22.39    Database: equipo3_intermodular_pruebas
-- ------------------------------------------------------
-- Server version	8.0.36-0ubuntu0.22.04.1

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
-- Table structure for table `incidencias_subtipos`
--

DROP TABLE IF EXISTS `incidencias_subtipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `incidencias_subtipos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tipo` enum('EQUIPOS','CUENTAS','WIFI','INTERNET','SOFTWARE') COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtipo_nombre` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_subtipo` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incidencias_subtipos`
--

LOCK TABLES `incidencias_subtipos` WRITE;
/*!40000 ALTER TABLE `incidencias_subtipos` DISABLE KEYS */;
INSERT INTO `incidencias_subtipos` VALUES (1,'EQUIPOS','PC','ORDENADOR'),(2,'EQUIPOS','PC','RATÓN'),(3,'EQUIPOS','PC','TECLADO'),(4,'EQUIPOS','ALTAVOCES',NULL),(5,'EQUIPOS','MONITOR',NULL),(6,'EQUIPOS','PROYECTOR',NULL),(7,'EQUIPOS','PANTALLA',NULL),(8,'EQUIPOS','PORTÁTIL','PROPORCIONADO POR CONSEJERÍA'),(9,'EQUIPOS','PORTÁTIL','DE AULA'),(10,'EQUIPOS','IMPRESORA',NULL),(11,'CUENTAS','EDUCANTABRIA',NULL),(12,'CUENTAS','GOOGLE CLASSROOM',NULL),(13,'CUENTAS','DOMINIO',NULL),(14,'CUENTAS','YEDRA','GESTIONA J.EST.'),(15,'WIFI','iesmiguelherrero',NULL),(16,'WIFI','WIECAN',NULL),(17,'SOFTWARE','INSTALACIÓN',NULL),(18,'SOFTWARE','ACTUALIZACIÓN',NULL);
/*!40000 ALTER TABLE `incidencias_subtipos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-06 14:52:49

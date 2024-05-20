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
-- Table structure for table `incidencias`
--

DROP TABLE IF EXISTS `incidencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `incidencias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tipo` enum('EQUIPOS','CUENTAS','WIFI','INTERNET','SOFTWARE') COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtipo_id` bigint unsigned DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_cierre` datetime DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('abierta','asignada','en proceso','enviada a Infortec','resuelta','cerrada') COLLATE utf8mb4_unicode_ci NOT NULL,
  `adjunto_url` text COLLATE utf8mb4_unicode_ci,
  `creador_id` bigint unsigned NOT NULL,
  `responsable_id` bigint unsigned DEFAULT NULL,
  `duracion` int DEFAULT NULL,
  `equipo_id` bigint unsigned DEFAULT NULL,
  `prioridad` enum('alta','media','baja') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actuaciones` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `incidencias_subtipo_id_foreign` (`subtipo_id`),
  KEY `incidencias_creador_id_foreign` (`creador_id`),
  KEY `incidencias_responsable_id_foreign` (`responsable_id`),
  KEY `incidencias_equipo_id_foreign` (`equipo_id`),
  CONSTRAINT `incidencias_creador_id_foreign` FOREIGN KEY (`creador_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `incidencias_equipo_id_foreign` FOREIGN KEY (`equipo_id`) REFERENCES `equipos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `incidencias_responsable_id_foreign` FOREIGN KEY (`responsable_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `incidencias_subtipo_id_foreign` FOREIGN KEY (`subtipo_id`) REFERENCES `incidencias_subtipos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incidencias`
--

LOCK TABLES `incidencias` WRITE;
/*!40000 ALTER TABLE `incidencias` DISABLE KEYS */;
INSERT INTO `incidencias` VALUES (6,'EQUIPOS',2,'2024-03-04 18:22:51',NULL,'incidencia de prueba 4','enviada a Infortec',NULL,3,1,NULL,3,'alta','sdsdsd'),(47,'EQUIPOS',5,'2024-03-04 18:32:53',NULL,'asdasdsadas','abierta',NULL,1,NULL,NULL,NULL,NULL,NULL),(53,'WIFI',16,'2024-03-05 14:55:55',NULL,'fsn<lfhasfh','resuelta','0',2,1,NULL,NULL,'media',NULL),(54,'CUENTAS',11,'2024-03-05 15:05:18',NULL,'asdasdasd','abierta','0',5,NULL,NULL,NULL,NULL,NULL),(55,'CUENTAS',11,'2024-03-05 15:10:10',NULL,'asdadadas','abierta','TD7Z3JfrPda7k9EFnzX5wF8PtUlJaiG19NiA2IfQ.jpg',5,NULL,NULL,NULL,NULL,NULL),(56,'CUENTAS',12,'2024-03-05 15:10:39',NULL,'asdasdasdasd','abierta','wqr6VOCUTzOAgwFNI6mJh5JXI1BUq2Iie4T05z3y.jpg',5,NULL,NULL,NULL,NULL,NULL),(57,'CUENTAS',12,'2024-03-05 15:22:31',NULL,'adasdasd','abierta','0',5,NULL,NULL,NULL,NULL,NULL),(58,'CUENTAS',12,'2024-03-05 15:23:56',NULL,'sdadsasdasd','abierta','kmvrOSj9y4VUtDVd2PhbmacWKmeHpYT2twE6ET69.jpg',5,NULL,NULL,NULL,NULL,NULL),(61,'CUENTAS',11,'2024-03-05 17:58:24',NULL,'incidencia','abierta','biPgoGcoEvfaCHzG6YlveN53rPxjV4jfDWo6Hhqc.pdf',2,NULL,NULL,NULL,NULL,NULL),(62,'CUENTAS',11,'2024-03-05 17:58:26',NULL,'ggggggggggggg','abierta','8nVaSBrPIniGzBRuQE7RxQuJgsFqFbZuNktriW1A.docx',5,NULL,NULL,NULL,NULL,NULL),(64,'CUENTAS',11,'2024-03-05 18:41:41',NULL,'prueba','abierta',NULL,5,NULL,NULL,NULL,NULL,NULL),(65,'EQUIPOS',1,'2024-03-05 19:06:40',NULL,'el raton no funciona','abierta','YCLHE7ZfroHeJLgGYGNhsIeoUqchqqcneXJaYYld.pdf',2,NULL,NULL,3,NULL,NULL);
/*!40000 ALTER TABLE `incidencias` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-06 14:52:50

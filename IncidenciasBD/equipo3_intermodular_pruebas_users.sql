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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre_completo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `departamento_id` bigint unsigned DEFAULT NULL,
  `guid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domain` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DistinguishedName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_usuario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_departamento_id_foreign` (`departamento_id`),
  CONSTRAINT `users_departamento_id_foreign` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Manuel Llano Rebanal','DAW207',NULL,NULL,'$2y$12$akcmGKXHuSRt6bA14fSsaOWlYSyR5AB7lcRlZEyU4ioYFidP803we',NULL,NULL,NULL,NULL,NULL,'2024-03-04 17:11:34','2024-03-05 18:09:33',NULL,'6432de4c-8565-4a26-94ae-24889ff15995','default','CN=DAW207,OU=DAW2,OU=AlumnosInformatica,OU=UsuariosInformatica,OU=IESMHP-Usuarios,DC=iesmhp,DC=local','DAW207','DAW207'),(2,'Efrén Gutiérrez Cantero','DAW215','efren@educantabria.es',NULL,'$2y$12$/Y6.iHO7LKhIO9jseloJAe4fzIbJpHI5DFrTp6sdOQFLr81xfuD9G',NULL,NULL,NULL,NULL,NULL,'2024-03-04 17:11:41','2024-03-05 18:08:38',NULL,'684ed1f7-5340-4db6-8c3c-a41c47f50df8','default','CN=DAW215,OU=DAW2,OU=AlumnosInformatica,OU=UsuariosInformatica,OU=IESMHP-Usuarios,DC=iesmhp,DC=local','DAW215','DAW215'),(3,'Tania Echevarría Fernández','DAW218','Tania@educantabria.es',NULL,'$2y$12$p/xtlKC6m6TagJt9a/5OPuOafMot/Vyk0gioO51bDKDRKcqm8oSIO',NULL,NULL,NULL,NULL,NULL,'2024-03-04 17:14:43','2024-03-05 16:06:59',2,'62fb268b-35c8-453a-950c-230ba9f1b284','default','CN=DAW218,OU=DAW2,OU=AlumnosInformatica,OU=UsuariosInformatica,OU=IESMHP-Usuarios,DC=iesmhp,DC=local','DAW218','DAW218'),(4,'Lucía Ferreras Fernández-Marcote','DAW203','Lucia@educantabria.es',NULL,'$2y$12$yK5Qo17Kl5Pp87aExCX0iO.volUnRbI4e3dyVwG2pUyt1UApzzqiO',NULL,NULL,NULL,NULL,NULL,'2024-03-04 17:16:25','2024-03-05 16:38:34',2,'e95186f9-6ceb-456d-bd6a-95436a45fbf9','default','CN=DAW203,OU=DAW2,OU=AlumnosInformatica,OU=UsuariosInformatica,OU=IESMHP-Usuarios,DC=iesmhp,DC=local','DAW203','DAW203'),(5,'David Prado Mejuto','DAW206',NULL,NULL,'$2y$12$XsZTiuH150J.VAvylzxmbeitFjil3mPLZbTVqmCcLdFBlt7OY98AW',NULL,NULL,NULL,NULL,NULL,'2024-03-04 17:30:00','2024-03-06 12:52:25',NULL,'3b3fa46c-9a8e-445f-b429-d5b726cdc9c1','default','CN=DAW206,OU=DAW2,OU=AlumnosInformatica,OU=UsuariosInformatica,OU=IESMHP-Usuarios,DC=iesmhp,DC=local','DAW206','DAW206'),(6,'Eloy Ruiz Linares','DAW210','Eloy@educantabria.es',NULL,'$2y$12$ryNQEvgWRE6F3jRFegFKkOi/shVFWgd.ReSuPpTuytBA6NmNqpO.W',NULL,NULL,NULL,NULL,NULL,'2024-03-05 14:53:00','2024-03-05 16:07:58',1,'730b9930-1d47-417e-b12e-4b1d9bd57269','default','CN=DAW210,OU=DAW2,OU=AlumnosInformatica,OU=UsuariosInformatica,OU=IESMHP-Usuarios,DC=iesmhp,DC=local','DAW210','DAW210'),(8,'Felipe Moreno Diaz','fmorenod',NULL,NULL,'$2y$12$iNcTlay/vZEhGWQYuAWQFujd6HBEHIGLXwC3jsjx50tnqvq9iiLvC',NULL,NULL,NULL,NULL,NULL,'2024-03-05 16:04:12','2024-03-05 16:04:12',NULL,'6327f733-c221-4f1c-85d5-c8b1bd2290b2','default','CN=Felipe Moreno Diaz,OU=ProfesoresInformatica,OU=UsuariosInformatica,OU=IESMHP-Usuarios,DC=iesmhp,DC=local','Felipe Moreno Diaz','fmorenod');
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

-- Dump completed on 2024-03-06 14:52:51

# Host: localhost  (Version: 5.5.5-10.4.22-MariaDB)
# Date: 2022-01-25 20:43:49
# Generator: MySQL-Front 5.3  (Build 2.42)

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE */;
/*!40101 SET SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES */;
/*!40103 SET SQL_NOTES='ON' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

#
# Source for table "forma_pagamentos"
#

DROP TABLE IF EXISTS `forma_pagamentos`;
CREATE TABLE `forma_pagamentos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipoPagamento` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "forma_pagamentos"
#

INSERT INTO `forma_pagamentos` VALUES (3,'A Prazo','2018-08-06 18:55:19','2018-09-05 00:34:32'),(4,'A Vista','2018-09-01 16:06:04','2018-09-01 16:06:04'),(5,'Outra','2018-09-05 00:35:43','2018-09-05 00:35:43');

#
# Source for table "migrations"
#

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "migrations"
#

INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_09_26_235536_create_Post_laravel_table',1),(4,'2016_09_28_005242_create_roles_table',1),(5,'2016_09_28_005317_create_permissions_table',1),(8,'2018_07_16_114832_create_notices_table',2),(9,'2018_07_17_192227_teste',2),(10,'2018_07_24_114256_add_empresa_e_name',2),(11,'2018_07_24_114828_add_alteracoes',3),(12,'2018_07_24_115133_add_empresa_e_name',4),(13,'2018_07_24_115308_adde',5),(14,'2018_07_24_121457_create_empresas_table',6),(16,'2018_08_06_004519_formapagamento',7),(18,'2018_08_07_120539_create_locadors_table',9),(19,'2018_08_06_132450_create_periodos_table',10),(20,'2018_08_08_110700_create_equipamentos_table',11),(21,'2018_08_14_110155_create_locacaos_table',11),(22,'2018_08_14_120952_create_itens_locacaos_table',11),(25,'2018_08_24_234817_create_itens_table',12);

#
# Source for table "password_resets"
#

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "password_resets"
#

INSERT INTO `password_resets` VALUES ('admin@laravel.com','$2y$10$2sYGiyJBO2630CUPit2EA.U8c.NJYcYJJwu022aE1JYI9fKwU/9cC','2018-07-25 23:31:28'),('admin@laravel.com','$2y$10$2sYGiyJBO2630CUPit2EA.U8c.NJYcYJJwu022aE1JYI9fKwU/9cC','2018-07-25 23:31:28'),('admin@laravel.com','$2y$10$2sYGiyJBO2630CUPit2EA.U8c.NJYcYJJwu022aE1JYI9fKwU/9cC','2018-07-25 23:31:28'),('admin@laravel.com','$2y$10$2sYGiyJBO2630CUPit2EA.U8c.NJYcYJJwu022aE1JYI9fKwU/9cC','2018-07-25 23:31:28');

#
# Source for table "periodos"
#

DROP TABLE IF EXISTS `periodos`;
CREATE TABLE `periodos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` double(15,8) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_user` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "periodos"
#

INSERT INTO `periodos` VALUES (16,'MENSAL','MENSAL',200.00000000,'2018-09-04 18:17:11','2018-09-05 02:00:24',13),(17,'Diario','Dia',50.00000000,'2018-09-05 00:46:50','2018-09-05 00:46:50',12),(18,'Semanal','Semana',90.00000000,'2018-09-05 00:47:28','2018-09-05 00:47:28',12),(19,'DIA','DIA',50.00000000,'2018-09-05 01:59:12','2018-09-05 01:59:12',13),(21,'SEMANAL','SEMANAL',90.00000000,'2018-09-05 02:01:49','2018-09-05 02:01:49',13),(22,'QUINZENA','QUINZENA',150.00000000,'2018-09-05 02:04:09','2018-09-05 02:04:09',13),(23,'MENSALL','MENSAL',100.00000000,'2018-09-06 02:21:37','2018-09-06 02:21:37',13);

#
# Source for table "permissions"
#

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "permissions"
#

INSERT INTO `permissions` VALUES (5,'View_user','Visualizar usuário','2018-07-14 01:27:37','2018-07-14 01:27:37'),(6,'Edit_user','Editar usuário','2018-07-14 01:27:37','2018-07-14 01:27:37'),(7,'Delete_user','Deletar usuário','2018-07-14 01:27:37','2018-07-14 01:27:37'),(8,'Insert_user','Adicionar usuário','2018-07-14 01:27:37','2018-07-14 01:27:37'),(9,'View_role','Visualizar role','2018-07-14 01:27:37','2018-07-14 01:27:37'),(10,'Insert_role','Adicionar role','2018-07-14 01:27:37','2018-07-14 01:27:37'),(11,'Role_permission','Relação role permission','2018-07-14 01:27:37','2018-07-14 01:27:37'),(12,'View_permission','Visualizar permission','2018-07-14 01:27:37','2018-07-14 01:27:37'),(13,'Insert_permission','Adicionar permission','2018-07-14 01:27:37','2018-07-14 01:27:37'),(18,'Delete_role','Deletar Role','2018-07-19 23:42:14','2018-07-19 23:42:14'),(20,'Autentica_user','Autenticar usuario','2018-07-20 23:27:01','2018-07-20 23:27:01'),(21,'Edit_user_logado','Editar usuário logado no sistema','2018-07-23 19:22:23','2018-07-23 19:22:23'),(22,'Edit_empresa','Editar uma empresa','2018-07-24 18:34:42','2018-07-24 18:34:42'),(23,'View_empresa','Visualiza uma empresa','2018-07-24 18:35:16','2018-07-24 18:35:16'),(24,'Insert_empresa','Insere uma nova empresa','2018-07-24 18:35:36','2018-07-24 18:35:36'),(25,'Delete_empresa','Apaga uma empresa determinada','2018-07-24 18:35:53','2018-07-24 18:35:53'),(27,'Edit_empresa_logado','O empresario pode editar informações relativas a sua empresa no sistema','2018-07-31 17:47:53','2018-07-31 17:47:53'),(28,'menu_cadastro','Aparece o menu cadastro na lateral esquerda da tela','2018-07-31 18:53:11','2018-07-31 18:53:11'),(29,'View_formaPagamento','Vizualiza forma de pagamento','2018-08-06 17:48:15','2018-08-06 17:48:15'),(30,'Insert_formaPagamento','Insere uma nova forma de pagamento','2018-08-06 17:48:38','2018-08-06 17:48:38'),(31,'Edit_formaPagamento','Edita uma forma de pagamento','2018-08-06 17:48:52','2018-08-06 17:48:52'),(32,'Delete_formaPagamento','Apaga forma de pagamento','2018-08-06 17:49:07','2018-08-06 17:49:07'),(33,'View_periodo','Visualiza um período de aluguel','2018-08-06 20:01:38','2018-08-06 20:01:38'),(34,'Insert_periodo','Insere um novo Período','2018-08-06 20:17:15','2018-08-06 20:17:15'),(35,'Edit_periodo','Edita um novo Periodo','2018-08-06 20:17:28','2018-08-06 20:17:28'),(36,'Delete_periodo','Apaga um periodo','2018-08-06 20:17:40','2018-08-06 20:17:40'),(37,'View_locador','Vizualiza os Locadores de Equipamentos','2018-08-07 23:09:38','2018-08-07 23:09:38'),(38,'Insert_locador','Insere um novo Locador','2018-08-07 23:13:54','2018-08-07 23:13:54'),(39,'Delete_locador','Apaga um locador','2018-08-07 23:14:14','2018-08-07 23:14:14'),(40,'Edit_locador','Edita um Locador','2018-08-07 23:15:26','2018-08-07 23:15:26'),(41,'View_equipamento','Visualiza','2018-08-08 23:02:46','2018-08-08 23:02:46'),(42,'Insert_equipamento','Insere','2018-08-08 23:02:59','2018-08-08 23:02:59'),(43,'Edit_equipamento','Edita','2018-08-08 23:03:12','2018-08-08 23:03:12'),(44,'Delete_equipamento','Apaga','2018-08-08 23:03:21','2018-08-08 23:03:21'),(45,'menu_cliente_logado','Menu cliente logado','2018-08-10 23:00:54','2018-08-10 23:00:54'),(46,'menu_empresa','Vizualiza o menu lateral da empresa logada','2018-08-13 18:55:20','2018-08-13 18:55:20'),(47,'View_Iten','Visualiza os itens locados até então','2018-08-27 19:34:34','2018-08-27 19:34:34'),(48,'Insert_locacao','Insere uma nova locação','2018-08-28 00:35:49','2018-08-28 00:35:49'),(49,'View_relatorio','Visualiza Relatórios','2018-09-06 14:00:21','2018-09-06 14:00:21'),(50,'View_peca','View_peca','2019-06-06 20:49:55','2019-06-06 20:49:55'),(51,'Edit_peca','Edit_peca','2019-06-06 20:50:26','2019-06-06 20:50:26'),(52,'Delete_peca','Delete_peca','2019-06-06 20:50:44','2019-06-06 20:50:44'),(53,'Insert_peca','Insert_peca','2019-06-06 20:51:10','2019-06-06 20:51:10');

#
# Source for table "roles"
#

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "roles"
#

INSERT INTO `roles` VALUES (1,'Admin','Administrador do sistema','2018-07-14 01:27:32','2018-07-14 01:27:32'),(2,'sem_permissao','Sem perissão','2018-07-21 01:05:15','2018-07-21 01:05:15'),(4,'Empresario','Empresario, tem acesso a informações relacionada a sua empresa e aos seus clientes','2018-07-24 22:14:24','2018-07-24 22:14:24');

#
# Source for table "permission_role"
#

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_foreign` (`permission_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "permission_role"
#

INSERT INTO `permission_role` VALUES (6,6,1,'2018-07-14 01:27:38','2018-07-14 01:27:38'),(7,7,1,'2018-07-14 01:27:38','2018-07-14 01:27:38'),(8,8,1,'2018-07-14 01:27:38','2018-07-14 01:27:38'),(9,9,1,'2018-07-14 01:27:38','2018-07-14 01:27:38'),(10,10,1,'2018-07-14 01:27:38','2018-07-14 01:27:38'),(11,11,1,'2018-07-14 01:27:38','2018-07-14 01:27:38'),(12,12,1,'2018-07-14 01:27:38','2018-07-14 01:27:38'),(13,13,1,'2018-07-14 01:27:38','2018-07-14 01:27:38'),(18,5,1,NULL,NULL),(34,18,1,NULL,NULL),(43,20,1,NULL,NULL),(44,21,2,NULL,NULL),(45,22,1,NULL,NULL),(46,23,1,NULL,NULL),(47,24,1,NULL,NULL),(48,25,1,NULL,NULL),(49,21,4,NULL,NULL),(50,27,4,NULL,NULL),(51,28,1,NULL,NULL),(52,29,1,NULL,NULL),(53,30,1,NULL,NULL),(54,31,1,NULL,NULL),(55,32,1,NULL,NULL),(59,35,1,NULL,NULL),(60,36,1,NULL,NULL),(61,37,4,NULL,NULL),(62,38,4,NULL,NULL),(63,39,4,NULL,NULL),(64,40,4,NULL,NULL),(65,41,4,NULL,NULL),(66,42,4,NULL,NULL),(67,43,4,NULL,NULL),(68,44,4,NULL,NULL),(69,41,1,NULL,NULL),(70,42,1,NULL,NULL),(71,45,4,NULL,NULL),(72,46,4,NULL,NULL),(73,33,4,NULL,NULL),(74,34,4,NULL,NULL),(75,35,4,NULL,NULL),(76,36,4,NULL,NULL),(77,47,4,NULL,NULL),(78,48,4,NULL,NULL),(79,49,4,NULL,NULL),(80,50,4,NULL,NULL),(81,51,4,NULL,NULL),(82,52,4,NULL,NULL),(83,53,4,NULL,NULL);

#
# Source for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "users"
#

INSERT INTO `users` VALUES (8,'Admin geral1','evento.tads@gmail.com','$2y$10$bimyrQusO028Hh.ms2..k.1Q1KFvEIDActfCyTY8Q5vJ68//TrLLG','9URAjPhrTxwKL5CulUSAQzg0lBcJ6m9D6GMGMyY3','2018-07-24 00:39:18','2018-09-04 13:54:06'),(10,'Mauricio de Assis','mauricioassisrt@gmail.com','$2y$10$HTXtN.DGU5jKpmt.wezoNOYYsP8FFELsN.3nrkMcLJnoW13yIRP9G','9zPUzo7AP9FUlIL0qWOLZaUiGdwDZeu1JyKOMYZNuQ0ocLnRxgw8prRwdUUM','2018-07-25 23:34:47','2019-06-03 22:02:26'),(12,'Teste novo Usuario','mauricioassishacker@hotmail.com','$2y$10$cvkTMCf6MP61NmgDKahWLe03801XhasjRJvv9giBpTZr5mdbiwe6e','eqgWQl5YhsCsAtp8Va3mpUp5q5R5gYsZUJJ6ft71c57GaEfnIsQsLPcwLNvR','2018-08-11 00:25:57','2018-08-11 00:25:57'),(13,'Sergio De Assis','sergiodeassis2005@hotmail.com','$2y$10$a8PUOSUxBInjMYwp..UzJOcbfJhLSvclKIspbIlZTDH2wXqtW9n4G','uSIOcCO1GWGOvuT7zAVRotdV4afTucvdDxyRTqMVR9qtKMlFbAnA8XavZ4SW','2018-09-01 16:20:09','2018-09-01 16:20:09');

#
# Source for table "role_user"
#

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_user_id_foreign` (`user_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "role_user"
#

INSERT INTO `role_user` VALUES (15,8,1,NULL,NULL),(18,12,4,NULL,NULL),(20,10,1,NULL,NULL),(22,13,4,NULL,NULL);

#
# Source for table "locadors"
#

DROP TABLE IF EXISTS `locadors`;
CREATE TABLE `locadors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefone` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `endereco` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnpj` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ie` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `locadors_email_unique` (`email`),
  KEY `locadors_user_id_foreign` (`user_id`),
  CONSTRAINT `locadors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "locadors"
#

INSERT INTO `locadors` VALUES (9,'PEDRO CORIEL',13,'xxxxxxxxxxxxxcxccxxx',NULL,'rua B jardim Italia 2','Paranavai','PR','87.750-000','../-',NULL,NULL,NULL,'2018-09-04 16:54:53','2018-09-05 03:06:30'),(10,'Raira Rodrigues Paes',12,'aaaaaaaaaaa',NULL,'Rua Rio de Janeiro','Terra Rica','PR','87.895-000',NULL,NULL,NULL,NULL,'2018-09-05 00:49:19','2018-09-05 00:49:19'),(11,'MANOEL RAIMUNDO GOMES BARBOSA',13,'XXXXXXXXXXXX',NULL,'RUA TAPEJARA 533','PARANAVAI','PR','87.750-000',NULL,NULL,NULL,NULL,'2018-09-05 02:46:45','2018-09-05 02:46:45'),(12,'MAYCON RODRIGUES DO SANTOS DE SOUZA',13,'XXXXXXXXXX','(11) 11111-1111','RUA JOAQUIM TONETE 1029','Paranavaí','PR','87.750-000','../-','062.100.639-42',NULL,NULL,'2018-09-05 03:00:45','2018-09-05 18:10:54'),(17,'asdasas',12,NULL,NULL,'asdasdas',NULL,'PR',NULL,NULL,NULL,NULL,NULL,'2018-09-05 03:45:38','2018-09-05 03:45:38'),(18,'asdsa',12,NULL,'(44) 99859-1826','ras','Paranavaí','PR',NULL,NULL,NULL,NULL,NULL,'2018-09-05 14:42:43','2018-09-05 14:42:43'),(19,'nome',12,NULL,'(13) 21312-3123','asdasdasdasdasd','Paranavaí','PR',NULL,NULL,NULL,NULL,NULL,'2018-09-05 14:54:10','2018-09-05 14:54:10'),(20,'LEU SOUZA',13,NULL,'(44) 99911-6459','AVENIDA MARTE LUTERKINCH','Paranavaí','PR',NULL,NULL,NULL,NULL,NULL,'2018-09-06 01:44:07','2018-09-06 01:44:07'),(21,'CLAUDIO SÃO JORGE',13,NULL,'(44) 99754-8535','SÃO JORGE','Paranavaí','PR',NULL,NULL,NULL,NULL,NULL,'2018-09-06 02:07:18','2018-09-06 02:07:18'),(22,'NELSON KENIDE',13,NULL,'(44) 99983-7140','POPULAR SÃO JORGE','Paranavaí','PR',NULL,NULL,NULL,NULL,NULL,'2018-09-06 02:09:14','2018-09-06 02:09:14'),(23,'JOSE LUIS',13,NULL,'(44) 99977-1725','MONTE CRISTO','Paranavaí','PR',NULL,NULL,NULL,NULL,NULL,'2018-09-06 02:10:45','2018-09-06 02:10:45'),(24,'ANTONIO SANTINI',13,NULL,'(44) 99730-2250','CHÁCARA JARAGUÁ','Paranavaí','PR',NULL,NULL,NULL,NULL,NULL,'2018-09-06 02:12:45','2018-09-06 02:12:45'),(25,'FERNANDO POSTO MM',13,NULL,'(44) 99121-9019','LUIS LORENZETI','Paranavaí','PR',NULL,NULL,NULL,NULL,NULL,'2018-09-06 02:25:57','2018-09-06 02:25:57'),(26,'VIA',13,NULL,'(44) 99708-8180','SAO JORGE','Paranavaí','PR',NULL,NULL,NULL,NULL,NULL,'2018-09-06 17:57:54','2018-09-06 17:57:54'),(27,'VALMIR',13,NULL,'(44) 99751-6772','RUA DA IGREJA SÃO PAULO','Paranavaí','PR',NULL,NULL,NULL,NULL,NULL,'2018-09-07 17:14:27','2018-09-07 17:14:27'),(28,'ALEXANDRE DE SOUZA DA COSTA',13,NULL,'(44) 99151-3322','RUA 3 NUMERO 356 MURUMBI','Paranavaí','PR',NULL,NULL,NULL,NULL,NULL,'2018-09-07 17:22:45','2018-09-07 17:22:45'),(29,'ROSIVALDO',13,NULL,'(44) 99137-7287','RUA MARECHAL RONDON CENTRO','Paranavaí','PR','87.750-000',NULL,NULL,NULL,NULL,'2018-09-07 17:25:33','2018-09-07 17:25:33'),(30,'ADRIANO',13,NULL,NULL,'MORUMBI','Paranavaí','PR','87.750-000',NULL,NULL,NULL,NULL,'2018-09-08 02:11:13','2018-09-08 02:11:13'),(31,'JONATA',13,NULL,NULL,'VILA CITY','Paranavaí','PR','87.750-000',NULL,NULL,NULL,NULL,'2018-09-08 02:16:28','2018-09-08 02:16:28'),(32,'WILSON ROSA SOARES',13,NULL,'(44) 99737-6864','EDUARDO RECHI DA SILVA 184','Paranavaí','PR','87.750-000',NULL,NULL,NULL,NULL,'2018-09-08 02:21:52','2018-09-08 02:21:52'),(33,'DAVI MOURA IRMÃO DO DIEGO',13,NULL,'(44) 99940-2392','SIMONE','Paranavaí','PR',NULL,NULL,NULL,NULL,NULL,'2018-09-08 02:26:22','2018-09-08 02:26:22'),(34,'Wagner silva pedreiro do douglas',13,NULL,'(44) 99842-4523','RUA INDEPENDÊNCIA 1265','Paranavaí','PR',NULL,NULL,NULL,NULL,NULL,'2018-09-13 00:27:46','2018-09-13 00:27:46'),(35,'ANTONIO CORREIA FERREIRA',13,NULL,'(44) 99736-6520','LEONIDAS DE BARROS 506','Paranavaí','PR',NULL,NULL,NULL,NULL,NULL,'2018-09-13 00:31:06','2018-09-13 00:31:06'),(36,'GILBERTO BONZANINI',13,NULL,'(44) 99805-8544','VILA MARIA SAO JORGE','Paranavaí','PR',NULL,NULL,NULL,NULL,NULL,'2018-09-13 00:34:07','2018-09-13 00:34:07'),(37,'RAIMUNDO',13,NULL,'(44) 99948-7776','FRANCISCO ALVES DO NASCIMENTO','Paranavaí','PR',NULL,NULL,NULL,NULL,NULL,'2018-09-13 00:36:23','2018-09-13 00:36:23'),(38,'HELITON DOS SANTOS PRIMO DO ZEZINHO',13,NULL,'(44) 99828-3158','FRANCISCO ALVES DO NASCIMENTO','Paranavaí','PR',NULL,NULL,NULL,NULL,NULL,'2018-09-13 00:38:08','2018-09-13 00:38:08'),(39,'SINVAL',13,NULL,'(44) 99998-9376','JARDIM SIMONE','Paranavaí','PR',NULL,NULL,NULL,NULL,NULL,'2018-09-13 00:40:03','2018-09-13 00:40:03'),(40,'FERNANDO APARECIDO SANTOS DE OLIVEIRA COMPRO TERRENO',13,NULL,'(44) 99872-9686','RUA HELIO DE FREITAS JARDIM ITALIA 1','Paranavaí','PR',NULL,NULL,'080.582.119-82',NULL,NULL,'2018-09-13 00:43:36','2018-09-13 00:43:36'),(41,'MARANHAO',13,NULL,'(44) 98409-2872','PRÓXIMO MUFFATO','Paranavaí','PR',NULL,NULL,NULL,NULL,NULL,'2018-09-13 01:24:23','2018-09-13 01:24:23');

#
# Source for table "equipamentos"
#

DROP TABLE IF EXISTS `equipamentos`;
CREATE TABLE `equipamentos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aquisicao` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `equipamentos_user_id_foreign` (`user_id`),
  CONSTRAINT `equipamentos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "equipamentos"
#

INSERT INTO `equipamentos` VALUES (10,13,'betoneira fischer','400 LT','0','19','0000-00-00','2018-09-04 16:43:29','2022-01-04 23:38:28'),(11,13,'betoneira csm','400lt','0','12','0000-00-00','2018-09-04 16:46:58','2019-06-06 20:43:14'),(12,12,'furadeira','bosh','1','20','0000-00-00','2018-09-05 00:45:18','2018-09-15 20:14:50'),(13,12,'Betoneira','menegoti','1','40','0000-00-00','2018-09-05 00:45:45','2018-09-05 15:21:42'),(14,12,'Betoneira','teste','1','23','0000-00-00','2018-09-05 00:56:32','2018-09-15 20:16:03'),(15,13,'BETONEIRA CSM','400LT','1','02','0000-00-00','2018-09-05 02:21:30','2018-09-13 01:03:50'),(16,13,'MOTOR','MOTOR','1','01','0000-00-00','2018-09-06 02:14:27','2018-09-06 02:23:15'),(17,13,'BETONEIRA CSM','400LT','1','24','0000-00-00','2018-09-06 02:15:37','2018-09-06 02:29:47'),(18,13,'BETONEIRA FISCHER','400LT','1','22','0000-00-00','2018-09-06 02:16:41','2018-09-06 02:32:49'),(19,13,'BETONEIRA FISCHER','400LT','1','10','0000-00-00','2018-09-06 02:17:37','2018-09-06 02:34:44'),(20,13,'BETONEIRA MAQTRON','400 LT','1','31','0000-00-00','2018-09-06 02:18:41','2018-09-06 02:36:27'),(21,12,'teste','teste','1','121','0000-00-00','2018-09-06 14:19:00','2018-09-07 14:35:22'),(22,13,'BETONEIRA CSM','400 LT','1','01','0000-00-00','2018-09-06 17:10:49','2018-09-13 00:48:45'),(23,13,'BETONEIRA CSM','400 LT','1','03','0000-00-00','2018-09-06 17:11:46','2018-09-13 01:11:44'),(24,13,'BETONEIRA CSM','400 LT','0','04','0000-00-00','2018-09-06 17:13:10','2019-06-03 22:06:54'),(25,13,'BETONEIRA FISCHER','400 LT','1','05','0000-00-00','2018-09-06 17:14:33','2018-09-13 01:27:30'),(26,13,'BETONEIRA FISCHER','400 LT','1','06','0000-00-00','2018-09-06 17:17:05','2018-09-07 17:27:53'),(27,13,'BETONEIRA FISCHER','400 LT','1','07','0000-00-00','2018-09-06 17:18:13','2022-01-25 23:34:28'),(28,13,'BETONEIRA FISCHER','400 LT','0','08','0000-00-00','2018-09-06 17:18:56','2018-09-06 17:18:56'),(29,13,'BETONEIRA FISCHER','400 LT','0','09','0000-00-00','2018-09-06 17:19:28','2018-09-06 17:19:28'),(30,13,'BETONEIRA FISCHER','400 LT','1','11','0000-00-00','2018-09-06 17:20:30','2018-09-13 01:07:04'),(31,13,'BETONEIRA CSM','400 LT','1','13','0000-00-00','2018-09-06 17:21:45','2018-09-08 02:06:35'),(32,13,'BETONEIRA CSM','400 LT','1','14','0000-00-00','2018-09-06 17:23:11','2018-09-13 01:16:27'),(33,13,'MENEGOTE','400 LT','0','15','0000-00-00','2018-09-06 17:25:00','2018-09-06 17:25:00'),(34,13,'BETONEIRA MENEGOTE','400 LT','0','16','0000-00-00','2018-09-06 17:25:59','2018-09-06 17:25:59'),(35,13,'BETONEIRA CSM','400 LT','1','17','0000-00-00','2018-09-06 17:28:41','2018-09-08 02:18:11'),(36,13,'BETONEIRA FISCHER','400 LT','0','19','0000-00-00','2018-09-06 17:30:28','2018-09-06 17:30:28'),(37,13,'BETONEIRA CSM','400 LT','0','20','0000-00-00','2018-09-06 17:31:24','2018-09-06 17:31:24'),(38,13,'BETONEIRA FISCHER','400 LT','1','21','0000-00-00','2018-09-06 17:32:20','2018-09-08 02:23:52'),(39,13,'BETONEIRA FISCHER','400 LT','1','23','0000-00-00','2018-09-06 17:47:01','2018-09-08 02:12:48'),(40,13,'BETONEIRA CSM','400 LT','0','25','0000-00-00','2018-09-06 17:47:45','2018-09-06 17:47:45'),(41,13,'BETONEIRA MENEGOTE','400 LT','1','26','0000-00-00','2018-09-06 17:49:18','2018-09-13 01:09:17'),(42,13,'BETONEIRA MENEGOTE','400 LT','1','27','0000-00-00','2018-09-06 17:50:32','2018-09-15 03:39:43'),(43,13,'BETONEIRA CSM','400 LT','1','28','0000-00-00','2018-09-06 17:52:43','2018-09-15 03:37:06'),(44,13,'BETONEIRA CSM','400 LT','1','30','0000-00-00','2018-09-06 17:53:23','2018-09-15 03:35:35'),(45,13,'BETONEIRA MAQTRON','400 LT','1','33','0000-00-00','2018-09-06 17:54:02','2018-09-15 03:35:06'),(46,13,'BETONEIRA MAQTRON','400 LT','1','34','0000-00-00','2018-09-06 17:54:50','2018-09-15 03:26:18'),(47,13,'BETONEIRA MAQTRON','400 LT','1','35','0000-00-00','2018-09-06 17:55:28','2018-09-15 03:25:33');

#
# Source for table "servicos"
#

DROP TABLE IF EXISTS `servicos`;
CREATE TABLE `servicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date DEFAULT NULL,
  `totalpecas` double DEFAULT NULL,
  `maodeobra` double DEFAULT NULL,
  `valorFinal` double DEFAULT NULL,
  `itens` double DEFAULT NULL,
  `equipamento_id` int(10) unsigned NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`,`equipamento_id`),
  KEY `equipamentos_id` (`equipamento_id`),
  CONSTRAINT `servicos_ibfk_1` FOREIGN KEY (`equipamento_id`) REFERENCES `equipamentos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

#
# Data for table "servicos"
#

INSERT INTO `servicos` VALUES (11,'2019-06-05',12,200,212,1,15,'2019-06-07 21:55:54','2019-06-07 21:55:54'),(12,'2019-06-03',24,50,74,2,16,'2019-06-07 21:57:22','2019-06-07 21:57:22'),(13,'2022-01-03',24,500,524,2,11,'2022-01-04 23:39:15','2022-01-04 23:39:15');

#
# Source for table "itens"
#

DROP TABLE IF EXISTS `itens`;
CREATE TABLE `itens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `equipamento_id` int(10) unsigned NOT NULL,
  `periodo_id` int(10) unsigned NOT NULL,
  `locador_id` int(10) unsigned NOT NULL,
  `forma_pagamento_id` int(10) unsigned NOT NULL,
  `data_aluguel` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `vencimento` date NOT NULL,
  `endereco` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `itens_equipamento_id_foreign` (`equipamento_id`),
  KEY `itens_periodo_id_foreign` (`periodo_id`),
  KEY `itens_locador_id_foreign` (`locador_id`),
  KEY `itens_forma_pagamento_id_foreign` (`forma_pagamento_id`),
  CONSTRAINT `itens_equipamento_id_foreign` FOREIGN KEY (`equipamento_id`) REFERENCES `equipamentos` (`id`),
  CONSTRAINT `itens_forma_pagamento_id_foreign` FOREIGN KEY (`forma_pagamento_id`) REFERENCES `forma_pagamentos` (`id`),
  CONSTRAINT `itens_locador_id_foreign` FOREIGN KEY (`locador_id`) REFERENCES `locadors` (`id`),
  CONSTRAINT `itens_periodo_id_foreign` FOREIGN KEY (`periodo_id`) REFERENCES `periodos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "itens"
#

INSERT INTO `itens` VALUES (11,12,18,10,4,'1970-01-01',0,-23.096901,0.000000,'1970-01-01','Rua Rio de Janeiro','87.895-000','2018-09-05 00:51:42','2018-09-10 14:06:04'),(12,13,17,10,5,'2018-08-18',0,0.000000,0.000000,'2018-09-04','Rua Rio de Janeiro','87.895-000','2018-09-05 00:53:47','2018-09-05 01:27:40'),(13,14,18,10,4,'1970-01-01',0,0.000000,0.000000,'1970-01-01','Rua Rio de Janeiro','87.895-000','2018-09-05 00:57:41','2018-09-09 14:44:48'),(15,15,19,11,4,'2018-09-04',0,-23.093731,-52.466141,'2018-09-04','RUA TAPEJARA 533','87.750-000','2018-09-05 02:49:00','2018-09-05 02:52:10'),(16,10,22,12,4,'2018-10-05',0,-23.073059,-52.465279,'2018-10-10','RUA JOAQUIM TONETE 1029','87.750-000','2018-09-05 03:04:33','2019-06-06 20:42:29'),(17,24,16,9,3,'2019-06-03',0,-23.080839,-52.454670,'2019-06-03','Avenida paraná  Paranavaí',NULL,'2019-06-03 22:06:14','2019-06-03 22:06:54'),(18,10,16,9,3,'2022-01-04',0,-23.058969,-52.457031,'2022-01-04','Rua Doutor José de Mattos Filho, Paranavaí, Paraná, 87706-000',NULL,'2022-01-04 23:38:07','2022-01-04 23:38:28'),(19,27,16,41,3,'2022-01-25',1,-23.098330,-52.459641,'2022-01-25','Rua Doutor José de Mattos Filho 1-119, Paranavaí, Paraná, 87711-350',NULL,'2022-01-25 23:34:28','2022-01-25 23:34:28');

#
# Source for table "empresas"
#

DROP TABLE IF EXISTS `empresas`;
CREATE TABLE `empresas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnpj` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ie` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `empresas_email_unique` (`email`),
  KEY `empresas_user_id_foreign` (`user_id`),
  CONSTRAINT `empresas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "empresas"
#

INSERT INTO `empresas` VALUES (4,'Mauricioaaaa',10,'a@a.com','rua doutor josé de matos filho, 200','Paranavaí','PR','87.711-350','../-','111.111.111-11','11.111.111','12345678910',0.000000,0.000000,'2018-07-25 01:33:50','2018-08-10 19:56:59'),(7,'hacker',12,'ettasdasda@asdad.com','12312312','12312312','PR','12.312-312','../-',NULL,'11.111.111',NULL,0.000000,0.000000,'2018-08-11 01:03:57','2018-08-11 01:07:03'),(8,'Sergio Locação de Betoneiras',13,'sergio@sergio.com','Rua Doutor José de Matos filho  200','Paranavaí','PR','87.701-040','../-',NULL,NULL,'11111111',-23.058109,-52.455811,'2018-09-02 04:41:39','2019-06-06 20:41:08');

#
# Source for table "pecas"
#

DROP TABLE IF EXISTS `pecas`;
CREATE TABLE `pecas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `preco` varchar(45) DEFAULT NULL,
  `empresa_id` int(10) unsigned NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`,`empresa_id`),
  KEY `fk_pecas_empresas1_idx` (`empresa_id`),
  CONSTRAINT `pecas_ibfk_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Data for table "pecas"
#

INSERT INTO `pecas` VALUES (4,'adasdas','asdasda','12',8,'2019-06-07 20:07:24','2019-06-07 20:07:24'),(5,'asdasdas','asdasda','4',7,'2019-06-07 20:07:44','2019-06-07 20:07:44');

#
# Source for table "servico_pecas"
#

DROP TABLE IF EXISTS `servico_pecas`;
CREATE TABLE `servico_pecas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade` double DEFAULT NULL,
  `valorSomaIten` double DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `peca_id` int(11) NOT NULL,
  `servico_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `servicos_id` (`servico_id`),
  KEY `pecas_id` (`peca_id`),
  CONSTRAINT `servico_pecas_ibfk_2` FOREIGN KEY (`servico_id`) REFERENCES `servicos` (`id`),
  CONSTRAINT `servico_pecas_ibfk_3` FOREIGN KEY (`peca_id`) REFERENCES `pecas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Data for table "servico_pecas"
#

INSERT INTO `servico_pecas` VALUES (3,1,12,'2019-06-07 21:55:54.000000','2019-06-07 21:55:54.000000',4,11),(4,2,24,'2019-06-07 21:57:22.000000','2019-06-07 21:57:22.000000',4,12),(5,2,24,'2022-01-04 23:39:15.000000','2022-01-04 23:39:15.000000',4,13);

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

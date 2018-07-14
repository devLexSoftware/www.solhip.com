-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: solhip
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.29-MariaDB

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
-- Table structure for table `avisos`
--

DROP TABLE IF EXISTS `avisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avisos` (
  `hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mensaje` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `accion` varchar(45) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avisos`
--

LOCK TABLES `avisos` WRITE;
/*!40000 ALTER TABLE `avisos` DISABLE KEYS */;
INSERT INTO `avisos` VALUES ('2018-01-12 22:24:23',15,'Se actualizo informacion del cliente Eliot Gabriel Criz','actualizado',NULL),('2018-01-12 22:26:40',16,'Se agrego el cliente: Julio Mosqueda','nuevo',NULL),('2018-01-12 23:46:03',17,'Se actualizo informacion del cliente: Eliot Gabriel Cruz','actualizado',NULL),('2018-01-18 22:03:29',18,'Se actualizo informacion del cliente: Julio Mosqueda','actualizado','lex'),('2018-01-19 18:14:18',19,'Se recibio nuevos documentos de cliente: Armando Hernandez','actualizado','lex'),('2018-01-19 18:16:54',20,'Se recibio nuevos documentos de cliente: Armando Hernandez','actualizado','lex'),('2018-01-19 18:21:52',21,'Se recibio nuevos documentos de cliente: Armando Hernandez','actualizado','lex'),('2018-01-19 18:22:49',22,'Se recibio nuevos documentos de cliente: Armando Hernandez','actualizado','lex'),('2018-01-19 18:23:54',23,'Se recibio nuevos documentos de cliente: Eliot Gabriel Cruz','actualizado','lex'),('2018-01-19 18:31:51',24,'Se recibio nuevos documentos de cliente: Eliot Gabriel Cruz','actualizado','lex'),('2018-01-19 18:32:10',25,'Se recibio nuevos documentos de cliente: Eliot Gabriel Cruz','actualizado','lex'),('2018-01-19 18:33:02',26,'Se recibio nuevos documentos de cliente: Eliot Gabriel Cruz','actualizado','lex'),('2018-01-19 18:34:58',27,'Se actualizo informacion del cliente: Armando Hernandez','actualizado','lex'),('2018-01-19 18:35:19',28,'Se recibio nuevos documentos de cliente: Armando Hernandez','actualizado','lex'),('2018-01-19 22:50:19',29,'Se recibio nuevos documentos de cliente: Armando Hernandez','actualizado','lex'),('2018-01-19 22:50:43',30,'Se recibio nuevos documentos de cliente: Armando Hernandez','actualizado','lex'),('2018-01-19 22:51:15',31,'Se recibio nuevos documentos de cliente: Armando Hernandez','actualizado','lex'),('2018-01-19 22:54:39',32,'Se recibio nuevos documentos de cliente: Armando Hernandez','actualizado','lex'),('2018-01-19 22:55:24',33,'Se recibio nuevos documentos de cliente: Armando Hernandez','actualizado','lex'),('2018-01-19 22:55:52',34,'Se recibio nuevos documentos de cliente: Armando Hernandez','actualizado','lex'),('2018-01-19 22:57:26',35,'Se recibio nuevos documentos de cliente: Armando Hernandez','actualizado','lex'),('2018-01-20 19:06:19',36,'Se recibio nuevos documentos de cliente: Armando Hernandez','actualizado','lex'),('2018-01-20 19:18:45',37,'Se recibio nuevos documentos de cliente: Armando Hernandez','actualizado','lex'),('2018-01-20 19:19:18',38,'Se recibio nuevos documentos de cliente: Armando Hernandez','actualizado','lex'),('2018-01-20 19:25:29',39,'Se recibio nuevos documentos de cliente: Armando Hernandez','actualizado','lex'),('2018-01-20 19:25:54',40,'Se recibio nuevos documentos de cliente: Armando Hernandez','actualizado','lex'),('2018-01-20 19:27:21',41,'Se recibio nuevos documentos de cliente: Armando Hernandez','actualizado','lex'),('2018-01-20 19:28:48',42,'Se recibio nuevos documentos de cliente: Armando Hernandez','actualizado','lex'),('2018-01-20 19:32:02',43,'Se recibio nuevos documentos de cliente: Armando Hernandez','actualizado','lex'),('2018-01-20 19:36:15',44,'Se recibio nuevos documentos de cliente: Armando Hernandez','actualizado','lex'),('2018-01-20 19:38:43',45,'Se recibio nuevos documentos de cliente: Armando Hernandez','actualizado','lex'),('2018-01-20 19:41:52',46,'Se recibio nuevos documentos de cliente: Armando Hernandez','actualizado','lex'),('2018-01-20 19:42:25',47,'Se recibio nuevos documentos de cliente: Armando Hernandez','actualizado','lex'),('2018-01-21 00:38:29',48,'Se actualizo informacion del cliente: Eliot Gabriel Cruz','actualizado','lex'),('2018-01-21 00:38:54',49,'Se actualizo informacion del cliente: Eliot Gabriel Cruz','actualizado','lex'),('2018-01-21 00:56:36',50,'Se recibio nuevos documentos de cliente: Armando Hernandez','actualizado','lex'),('2018-01-21 01:14:09',51,'Se actualizo informacion del cliente: Armando Hernandez','actualizado','lex'),('2018-01-21 01:14:30',52,'Se recibio nuevos documentos de cliente: Armando Hernandez','actualizado','lex'),('2018-01-21 01:14:49',53,'Se recibio nuevos documentos de cliente: Armando Hernandez','actualizado','lex'),('2018-01-21 01:15:19',54,'Se actualizo informacion del cliente: Armando Hernandez','actualizado','lex'),('2018-01-23 20:01:24',55,'Se recibio nuevos documentos de cliente: Armando Hernandez','actualizado','lex'),('2018-01-23 22:54:31',56,'Se actualizo informacion del cliente: Eliot Gabriel Cruz','actualizado','lex'),('2018-01-23 22:56:06',57,'Se actualizo informacion del cliente: Eliot Gabriel Cruz','actualizado','lex'),('2018-01-23 22:56:34',58,'Se actualizo informacion del cliente: Eliot Gabriel Cruz','actualizado','lex'),('2018-01-23 22:56:53',59,'Se actualizo informacion del cliente: Eliot Gabriel Cruz','actualizado','lex'),('2018-01-23 22:57:16',60,'Se actualizo informacion del cliente: Eliot Gabriel Cruz','actualizado','lex'),('2018-01-23 22:57:57',61,'Se actualizo informacion del cliente: Eliot Gabriel Cruz','actualizado','lex'),('2018-01-23 22:58:29',62,'Se actualizo informacion del cliente: Eliot Gabriel Cruz','actualizado','lex'),('2018-01-23 22:59:08',63,'Se actualizo informacion del cliente:  ','actualizado','lex'),('2018-01-23 22:59:35',64,'Se dio de baja el usuario:  ','baja','lex'),('2018-01-23 22:59:42',65,'Se actualizo informacion del cliente: Armando Hernandez','actualizado','lex'),('2018-01-23 22:59:59',66,'Se actualizo informacion del cliente: Armando Hernandez','actualizado','lex'),('2018-01-23 23:00:32',67,'Se actualizo informacion del cliente: Armando Hernandez','actualizado','lex'),('2018-01-23 23:03:48',68,'Se recibio nuevos documentos de cliente: Armando Hernandez','actualizado','lex'),('2018-01-24 19:20:13',69,'Se agrego el cliente: Paolo Sanchez','nuevo','lex'),('2018-01-24 19:20:51',70,'Se actualizo informacion del cliente: Paolo Sanchez','actualizado','lex'),('2018-01-24 19:21:08',71,'Se recibio nuevos documentos de cliente: Paolo Sanchez','actualizado','lex'),('2018-01-24 19:28:09',72,'Se agrego el cliente: Eduardo Perez','nuevo','lex'),('2018-01-25 00:05:24',73,'Se agrego el cliente: Steve Steel','nuevo','lex'),('2018-01-25 17:03:08',74,'Se actualizo informacion del cliente: Steve Steel','actualizado','lex'),('2018-01-25 17:03:42',75,'Se actualizo informacion del cliente: Steve Steel','actualizado','lex'),('2018-01-25 17:04:12',76,'Se actualizo informacion del cliente: Steve Steel','actualizado','lex'),('2018-01-25 17:57:26',77,'Se agrego el cliente: Eduardo Apellido','nuevo','lex'),('2018-01-25 23:17:02',78,'Se recibio nuevos documentos de cliente: Steve Steel','actualizado','lex'),('2018-01-25 23:17:10',79,'Se recibio nuevos documentos de cliente: Steve Steel','actualizado','lex'),('2018-01-25 23:23:07',80,'Se recibio nuevos documentos de cliente: Steve Steel','actualizado','lex');
/*!40000 ALTER TABLE `avisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `fechCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechActualizacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref` varchar(20) CHARACTER SET utf8 NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 NOT NULL,
  `apellido` varchar(100) CHARACTER SET utf8 NOT NULL,
  `curp` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `fechNacimiento` date DEFAULT NULL,
  `nss` varchar(11) CHARACTER SET utf8 DEFAULT NULL,
  `rfc` varchar(13) CHARACTER SET utf8 DEFAULT NULL,
  `nDependientes` int(11) DEFAULT NULL,
  `nContactos` int(11) DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL,
  `find` varchar(200) DEFAULT NULL,
  `nivAcademico` varchar(45) DEFAULT NULL,
  `usuCreacion` varchar(100) DEFAULT NULL,
  `notas` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `find` (`find`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES ('2018-01-12 16:58:09','2018-01-18 20:07:25',3,'Cli-CarRod-2013','Carlos','Rodriguez',NULL,'2013-03-07','1231231211',NULL,0,NULL,'Sin completar','Carlos Rodriguez','Licenciatura','otro','tiene notas pendientes'),('2018-01-12 18:34:07','2018-01-12 18:34:07',4,'Cli-MarHer-2015','Maria','Hernandez',NULL,'2015-02-26','1231231231',NULL,2,NULL,'Completo','Maria Hernandez','Licenciatura','otro',NULL),('2018-01-12 22:26:39','2018-01-18 22:03:29',5,'Cli-JulMos-2013','Julio','Mosqueda',NULL,'2013-06-06','1231231231',NULL,0,NULL,'Sin completar','Julio Mosqueda','Licenciatura','otro','Faltan campos pro completar'),('2018-01-18 17:41:56','2018-01-23 23:00:31',6,'Cli-ArmHer-180113','Armando','Hernandez',NULL,'2018-01-13','1212312312',NULL,0,NULL,'Sin completar','Armando Hernandez','','otro',''),('2018-01-18 18:28:11','2018-01-18 18:46:36',7,'Cli-KarSan-2018','Karen','Sanchez',NULL,'2018-01-03','1231211111',NULL,0,NULL,'Completo','Karen Sanchez','Licenciatura','otro','Sin notas'),('2018-01-18 18:55:57','2018-01-18 18:57:38',8,'Cli-MarHer-2018','Maria','Hernandez',NULL,'2018-01-03','1231231231',NULL,0,NULL,'Sin completar','Maria Hernandez','','otro','No hay notas, el cliente completo su informacion'),('2018-01-24 19:20:12','2018-01-24 19:20:12',9,'Cli-PaoSan-180111','Paolo','Sanchez',NULL,'2018-01-11','12312312312',NULL,0,NULL,'Completo','Paolo Sanchez','Licenciatura','otro',''),('2018-01-24 19:28:08','2018-01-24 19:28:08',10,'Cli-EduPer-180102','Eduardo','Perez',NULL,'2018-01-02','1312312111',NULL,0,NULL,'Sin completar','Eduardo Perez','','otro',''),('2018-01-25 00:05:23','2018-01-25 00:05:23',11,'Cli-SteSte-180118','Steve','Steel',NULL,'2018-01-18','2131231231',NULL,0,NULL,'Sin completar','Steve Steel','','otro',''),('2018-01-25 17:57:26','2018-01-25 17:57:26',12,'Cli-EduApe-180103','Eduardo','Apellido',NULL,'2018-01-03','1212312312',NULL,0,NULL,'Sin completar','Eduardo Apellido','','otro','');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contactos`
--

DROP TABLE IF EXISTS `contactos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contactos` (
  `fechCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechActualizacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuCreacion` varchar(100) CHARACTER SET utf8 NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pk_Cliente` int(11) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `apellido` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `parentezco` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `telCasa` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `telMovil` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pk_Cliente` (`pk_Cliente`),
  CONSTRAINT `Contactos_ibfk_1` FOREIGN KEY (`pk_Cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contactos`
--

LOCK TABLES `contactos` WRITE;
/*!40000 ALTER TABLE `contactos` DISABLE KEYS */;
INSERT INTO `contactos` VALUES ('2018-01-12 16:58:09','0000-00-00 00:00:00','otro',30,3,'','','Familiar',NULL,'','',NULL),('2018-01-12 16:58:09','0000-00-00 00:00:00','otro',31,3,'','','Familiar',NULL,'','',NULL),('2018-01-12 16:58:09','0000-00-00 00:00:00','otro',32,3,'','','Amigo',NULL,'','',NULL),('2018-01-12 16:58:09','0000-00-00 00:00:00','otro',33,3,'','','Amigo',NULL,'','',NULL),('2018-01-12 18:34:07','2018-01-12 18:34:07','otro',36,4,NULL,NULL,'Hijo',12,NULL,NULL,NULL),('2018-01-12 18:34:07','2018-01-12 18:34:07','otro',37,4,NULL,NULL,'Hijo',21,NULL,NULL,NULL),('2018-01-12 18:34:08','2018-01-12 18:34:08','otro',38,4,'','','Familiar',NULL,'','',NULL),('2018-01-12 18:34:08','2018-01-12 18:34:08','otro',39,4,'','','Familiar',NULL,'','',NULL),('2018-01-12 18:34:08','2018-01-12 18:34:08','otro',40,4,'','','Amigo',NULL,'','',NULL),('2018-01-12 18:34:08','2018-01-12 18:34:08','otro',41,4,'','','Amigo',NULL,'','',NULL),('2018-01-12 22:26:39','2018-01-12 22:26:39','otro',42,5,'','','Familiar',NULL,'','',NULL),('2018-01-12 22:26:39','2018-01-12 22:26:39','otro',43,5,'','','Familiar',NULL,'','',NULL),('2018-01-12 22:26:39','2018-01-12 22:26:39','otro',44,5,'','','Amigo',NULL,'','',NULL),('2018-01-12 22:26:39','2018-01-12 22:26:39','otro',45,5,'','','Amigo',NULL,'','',NULL),('2018-01-18 17:41:56','2018-01-18 17:41:56','otro',46,6,'','','Familiar',NULL,'','',NULL),('2018-01-18 17:41:56','2018-01-18 17:41:56','otro',47,6,'','','Familiar',NULL,'','',NULL),('2018-01-18 17:41:56','2018-01-18 17:41:56','otro',48,6,'','','Amigo',NULL,'','',NULL),('2018-01-18 17:41:56','2018-01-18 17:41:56','otro',49,6,'','','Amigo',NULL,'','',NULL),('2018-01-18 18:28:11','2018-01-18 18:38:24','otro',50,7,'Familiar ','Familiar apellido','Familiar',NULL,'123231','',NULL),('2018-01-18 18:28:11','2018-01-18 18:28:11','otro',51,7,'','','Familiar',NULL,'','',NULL),('2018-01-18 18:28:11','2018-01-18 18:28:11','otro',52,7,'','','Amigo',NULL,'','',NULL),('2018-01-18 18:28:11','2018-01-18 18:28:11','otro',53,7,'','','Amigo',NULL,'','',NULL),('2018-01-18 18:55:58','2018-01-18 18:55:58','otro',54,8,'','','Familiar',NULL,'','',NULL),('2018-01-18 18:55:58','2018-01-18 18:55:58','otro',55,8,'','','Familiar',NULL,'','',NULL),('2018-01-18 18:55:58','2018-01-18 18:55:58','otro',56,8,'','','Amigo',NULL,'','',NULL),('2018-01-18 18:55:58','2018-01-18 18:55:58','otro',57,8,'','','Amigo',NULL,'','',NULL),('2018-01-24 19:20:13','2018-01-24 19:20:13','otro',58,9,'','','Familiar',NULL,'','',NULL),('2018-01-24 19:20:13','2018-01-24 19:20:13','otro',59,9,'','','Familiar',NULL,'','',NULL),('2018-01-24 19:20:13','2018-01-24 19:20:13','otro',60,9,'','','Amigo',NULL,'','',NULL),('2018-01-24 19:20:13','2018-01-24 19:20:13','otro',61,9,'','','Amigo',NULL,'','',NULL),('2018-01-24 19:28:09','2018-01-24 19:28:09','otro',62,10,'','','Familiar',NULL,'','',NULL),('2018-01-24 19:28:09','2018-01-24 19:28:09','otro',63,10,'','','Familiar',NULL,'','',NULL),('2018-01-24 19:28:09','2018-01-24 19:28:09','otro',64,10,'','','Amigo',NULL,'','',NULL),('2018-01-24 19:28:09','2018-01-24 19:28:09','otro',65,10,'','','Amigo',NULL,'','',NULL),('2018-01-25 00:05:24','2018-01-25 00:05:24','otro',66,11,'','','Familiar',NULL,'','',NULL),('2018-01-25 00:05:24','2018-01-25 00:05:24','otro',67,11,'','','Familiar',NULL,'','',NULL),('2018-01-25 00:05:24','2018-01-25 00:05:24','otro',68,11,'','','Amigo',NULL,'','',NULL),('2018-01-25 00:05:24','2018-01-25 00:05:24','otro',69,11,'','','Amigo',NULL,'','',NULL),('2018-01-25 17:57:26','2018-01-25 17:57:26','otro',70,12,'','','Familiar',NULL,'','',NULL),('2018-01-25 17:57:26','2018-01-25 17:57:26','otro',71,12,'','','Familiar',NULL,'','',NULL),('2018-01-25 17:57:26','2018-01-25 17:57:26','otro',72,12,'','','Amigo',NULL,'','',NULL),('2018-01-25 17:57:26','2018-01-25 17:57:26','otro',73,12,'','','Amigo',NULL,'','',NULL);
/*!40000 ALTER TABLE `contactos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datoslaboral`
--

DROP TABLE IF EXISTS `datoslaboral`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datoslaboral` (
  `fechCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechActualizacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuCreacion` varchar(100) CHARACTER SET utf8 NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pk_Cliente` int(11) DEFAULT NULL,
  `nomEmpresa` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `pueEmpresa` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `antEmpresa` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `calle` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `numInt` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `numExt` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `colonia` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `ext` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `tel` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pk_Cliente` (`pk_Cliente`),
  CONSTRAINT `DatosLaboral_ibfk_1` FOREIGN KEY (`pk_Cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datoslaboral`
--

LOCK TABLES `datoslaboral` WRITE;
/*!40000 ALTER TABLE `datoslaboral` DISABLE KEYS */;
INSERT INTO `datoslaboral` VALUES ('2018-01-12 18:34:07','2018-01-12 18:34:07','otro',1,4,'Solidez','Sin puesto','1','Colombia','1','1','Sin colonia',12312,'1','112312'),('2018-01-18 18:28:11','2018-01-18 18:28:11','otro',2,7,'Sin empresa','Sin puesto','1','Sin calle','','1','sin colonia',1231231,'11','213123'),('2018-01-24 19:20:13','2018-01-24 19:20:13','otro',3,9,'Sin empresa','Sin puesto','11','Sin calle','1312','12','Sin colonia',42342,'11','12312');
/*!40000 ALTER TABLE `datoslaboral` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datoslocalizacion`
--

DROP TABLE IF EXISTS `datoslocalizacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datoslocalizacion` (
  `fechCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechActualizacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuCreacion` varchar(100) CHARACTER SET utf8 NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pk_Cliente` int(11) DEFAULT NULL,
  `calle` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `numInt` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `numExt` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `colonia` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `tipVivienda` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `antVivienda` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `telCasa` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `telMovil` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pk_Cliente` (`pk_Cliente`),
  CONSTRAINT `DatosLocalizacion_ibfk_1` FOREIGN KEY (`pk_Cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datoslocalizacion`
--

LOCK TABLES `datoslocalizacion` WRITE;
/*!40000 ALTER TABLE `datoslocalizacion` DISABLE KEYS */;
INSERT INTO `datoslocalizacion` VALUES ('2018-01-12 16:58:09','2018-01-12 19:44:51','otro',8,3,'Colombia','1','1','EspaÃ±a',11111,'Familiar','1','12312131','12321321','ca@gmail.com'),('2018-01-12 18:34:07','2018-01-12 18:34:07','otro',9,4,'Sin calle','1','1','Sin colonia',1231231,'Familiar','1','123123','13123','qqq@gmail.com'),('2018-01-12 22:26:39','2018-01-12 22:26:39','otro',10,5,'Sin calle','1','1','Sin colonia',1231,'Familiar','1','131231231','12312312','q@gmail.com'),('2018-01-18 17:41:56','2018-01-18 17:41:56','otro',11,6,'Colombia','','1','Sin colonia',36650,'Familiar','1','4621111111','','eli@gam.co'),('2018-01-18 18:28:11','2018-01-18 18:28:11','otro',12,7,'Barcelona','1','1','Sin colonia',1231,'Familiar','1','1231231','12313','qq@gmail.com'),('2018-01-18 18:55:57','2018-01-18 18:55:57','otro',13,8,'Sin calle','1','1','Sin colonia',11231,'Familiar','1','123123','1231231','aqq@gmail.co'),('2018-01-24 19:20:13','2018-01-24 19:20:13','otro',14,9,'Sin calle','1','1','Sin colonia',12312,'Familiar','1','1231231','131231','qqwe@gamil.com'),('2018-01-24 19:28:09','2018-01-24 19:28:09','otro',15,10,'Sin calle','1','1','sin colonia',131231,'Familiar','1','1312312','1231231','qq@gmail.co'),('2018-01-25 00:05:23','2018-01-25 00:05:23','otro',16,11,'Si calle','1','1','Sin coloni',1231,'Familiar','1','q1231','1231','aqeweq@gmail.co'),('2018-01-25 17:57:26','2018-01-25 17:57:26','otro',17,12,'Sin calle','1','1','sin colonia',121,'Familiar','1','1312','12312','qqq@gmail.com');
/*!40000 ALTER TABLE `datoslocalizacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `directorio`
--

DROP TABLE IF EXISTS `directorio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `directorio` (
  `fechCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechActualizacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `puesto` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `banco` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `telOficina` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `telMovil` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `direccion` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `notas` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `directorio`
--

LOCK TABLES `directorio` WRITE;
/*!40000 ALTER TABLE `directorio` DISABLE KEYS */;
INSERT INTO `directorio` VALUES ('2018-01-26 18:42:17','2018-01-26 18:59:38',1,'Ana Isabel Figueroa Viramontes','Ejecutiva Hipotecaria','Santander','01-449-149-2109 ext. 74605 ter 19','4492259369','afigueroav@santander.com.mx',NULL,NULL),('2018-01-26 19:28:19','2018-01-26 19:28:19',2,'Brisa Aracely Chávez Ureña','Gerente de Operaciones','Scotiabank','01-722-199-1008','045-722-590-6043','brisa@solidezhipotecaria.com','Artesanos 132 Providencia metepec MX 52177',NULL),('2018-01-26 19:28:19','2018-01-26 19:28:19',3,'Carlos Alberto Foglia Marengo','Corredor','La Giralda ','62-3-33-29','462-210-2537','ventaslagiralda@visionesurbanisticas.com',NULL,NULL),('2018-01-26 19:28:19','2018-01-26 19:28:19',4,'Janett','Ejecutiva Hipotecaria','Banregio','01-477-214-5101 ext.136','4777546625','alma.segura@banregio.com','Blvd. Adolfo López Mateos 1310, La Martinica, León, Gto.',NULL),('2018-01-26 19:28:19','2018-01-26 19:28:19',5,'Colinas del Río ','Colinas del Río ','Colinas del Río ','62-4-58-88',NULL,NULL,'Av. Juan Pablo II 155 Fracc Colinas del Río',NULL),('2018-01-26 19:28:19','2018-01-26 19:28:19',6,'Gaby Castañeda ','Abogada','No. 60','62-221-21',NULL,NULL,NULL,NULL),('2018-01-26 19:28:19','2018-01-26 19:28:19',7,'Giovanny Guevara','Ejecutivo Hipotecaria','Bancomer',NULL,'462-6214-282','giovanny.guevara@bbva.com',NULL,NULL),('2018-01-26 19:28:19','2018-01-26 19:28:19',8,'Guillermo Sánchez','Corredor','Ventas',NULL,'462-1946-431','luisguilermohs@hotmail.com',NULL,NULL),('2018-01-26 19:28:19','2018-01-26 19:28:19',9,'Ing. Cristian Vargas','Perito','Banorte ',NULL,'473-1390-500',NULL,NULL,NULL),('2018-01-26 19:28:19','2018-01-26 19:28:19',10,'Ivonne','Corredor','Ventas ',NULL,'462-1154-317',NULL,NULL,NULL),('2018-01-26 19:28:19','2018-01-26 19:28:19',11,'Javier García Barajas ','Subdirector de Zona Hipotecaria ','Banregio','01-333-880-1340 ext:108','331-1052-824','javier.garcia.bajaras@banregio.com',NULL,NULL),('2018-01-26 19:28:19','2018-01-26 19:28:19',12,'Jazmin Rivera ','Notaria ','No.53','462-114-1588 ext 102','462-625-3893','mrivera@notaria53irapuato.com.mx',NULL,NULL),('2018-01-26 19:41:11','2018-01-26 19:41:11',13,'Juan Pablo Macias Ibarra','Asesor de Gestoría y Titulación','S&B',NULL,'045-477-225-0147','jpmacias@s&b.com.mx',NULL,NULL),('2018-01-26 19:41:11','2018-01-26 19:41:11',14,'Judith Hernandez','Banregio','Banregio','114-45-00','462-210-0133','guadalupe.hernandez@banregio.com',NULL,NULL),('2018-01-26 19:41:11','2018-01-26 19:41:11',15,'Julieta Tavares','Corredora','S&B',NULL,'462-186-3761','jtavares@s6b.com.mx',NULL,NULL),('2018-01-26 19:41:11','2018-01-26 19:41:11',16,'Kena Gutiérrez Aguilar ','Grupo  K-SA ','Grupo KSA',NULL,'462-509-1005','kena64@hotmail.com',NULL,NULL),('2018-01-26 19:41:11','2018-01-26 19:41:11',17,'La Giralda','La Giralda','La Giralda','62-333-29',NULL,'www.visinesubanisticas.com','Plaza Santa Fe Av. Arandas 2268 esq. Cuarto cinturon vial, Irapuato, Gto',NULL),('2018-01-26 19:41:11','2018-01-26 19:41:11',18,'Leticia Mena ','Gerente Residencial San Marino ','MDM','62-477-94','462-107-9248','jtavares@syb.com.mx',NULL,NULL),('2018-01-26 19:41:11','2018-01-26 19:41:11',19,'Lucia Duque ','Inmobiliaria Alfa ','Inmobiliaria ',NULL,'462-2103-256',NULL,NULL,NULL),('2018-01-26 19:41:11','2018-01-26 19:41:11',20,'Luis Pérez','Abogado','Notaria No.98','01-477-470-7100',NULL,'lperez@toriellonotarias.com.mx',NULL,NULL),('2018-01-26 19:41:11','2018-01-26 19:41:11',21,'Lupita Silva ','Abogada','Notaria No.89','01-477-714-4441',NULL,'notpub89@prodigy.net.mx',NULL,NULL),('2018-01-26 19:41:11','2018-01-26 19:41:11',22,'Ma. Elena Chaverri','La Giralda','La Giralda ','62-333-29','462-2342-670','echaverri@visionesurbanisticas.com',NULL,NULL),('2018-01-26 19:41:11','2018-01-26 19:41:11',23,'Magda Tovar','Corredor','Ventas',NULL,'462-1104-649','magdatovargarcia@hotmail.com',NULL,NULL),('2018-01-26 19:41:11','2018-01-26 19:41:11',24,'Marco de la Vega ','Ejecutivo Hipotecario','Banorte y HSBC','01-722-199-1009','045-722-311-2941','marco@solidezhipotecaria.com',NULL,NULL),('2018-01-26 19:41:11','2018-01-26 19:41:11',25,'María Elena ','Corredora ','Vendedora ',NULL,'462-621-7247',NULL,NULL,NULL),('2018-01-26 19:41:11','2018-01-26 19:41:11',26,'María Guevara','Gerente de Residencial Cibeles','Residencial Cibeles',NULL,'462-189-4330','maria@promdes.com',NULL,NULL),('2018-01-26 19:57:59','2018-01-26 19:57:59',27,'Marichu Real ','Corredor','Ventas',NULL,'462-110-9728','marichu1940@hotmail.com ',NULL,NULL),('2018-01-26 19:57:59','2018-01-26 19:57:59',28,'Moises Navarrete','Corredor','Ventas',NULL,'462-631-1860','capitalbroker@hotmail.com',NULL,NULL),('2018-01-26 19:57:59','2018-01-26 19:57:59',29,'Monse García','La Giralda','La Giralda',NULL,'462-1917-157','claumon1986@hotmailcom',NULL,NULL),('2018-01-26 19:57:59','2018-01-26 19:57:59',30,'Oziel Corredor ','Corredor','S&B',NULL,'462-185-4395',NULL,NULL,NULL),('2018-01-26 19:57:59','2018-01-26 19:57:59',31,'Rocío Alfaro','Corredor','Ventas',NULL,'462-149-2432','ralfarov12@gmail.com',NULL,NULL),('2018-01-26 19:57:59','2018-01-26 19:57:59',32,'Rocío Álvarez','Arquitecta ','Perito Tinsa ',NULL,'462-164-4970','avaluos.alvarez@gmail.com ',NULL,NULL),('2018-01-26 19:57:59','2018-01-26 19:57:59',33,'Rodrigo Arbizu','Corredor','S&B',NULL,'462-175-3248',NULL,NULL,NULL),('2018-01-26 19:57:59','2018-01-26 19:57:59',34,'San Juana Apolinares León','Notaria ','No. 49','(462) 6242-556','(462) 6242-695','sanjuana49@gmail.com',NULL,'Ext. 103/6246822'),('2018-01-26 19:57:59','2018-01-26 19:57:59',35,'Sergio Miranda ','Ejecutivo Hipotecario','Banorte','60-73-111','462-4196-930','sergio.miranda@banorte.com',NULL,NULL),('2018-01-26 19:57:59','2018-01-26 19:57:59',36,'Simon Chávez',NULL,NULL,NULL,'462-187-0757',NULL,NULL,NULL),('2018-01-26 19:57:59','2018-01-26 19:57:59',37,'Tere Rincon ','Corredora','S&B',NULL,'462-1894-556',NULL,NULL,NULL),('2018-01-26 19:57:59','2018-01-26 19:57:59',38,'Tinsa ','Bufette de peritos ','Peritos ','01-55-50-809-090',NULL,NULL,NULL,NULL),('2018-01-26 19:57:59','2018-01-26 19:57:59',39,'Villas de Bernalejo','Villas de Bernalejo','Villas de Bernalejo','62-4-54-00',NULL,'recepcionbernalejo@syb.com.mx','Av. Juan pablo II 3343 Villas de bernalejo Irapuato gto',NULL),('2018-01-26 19:57:59','2018-01-26 19:57:59',40,'Infonatel',NULL,NULL,'01-800-008-3900',NULL,NULL,NULL,NULL),('2018-01-26 19:57:59','2018-01-26 19:57:59',41,'Buró de Crédito',NULL,NULL,'01-800-640-7920',NULL,NULL,NULL,NULL),('2018-01-26 19:57:59','2018-01-26 19:57:59',42,'Saraí Rodríguez','Asesor Hipotecario','Solidez Hipotecaria','63-5-1969','462-629-0225','srodriguez@solidezhipotecaria.com ',NULL,NULL),('2018-01-26 19:57:59','2018-01-26 19:57:59',43,'Jairo Campos','Asistente','Solidez Hipotecaria','63-5-1969','462-604-2407','asistente_solidez_hipotecaria@outlook.com',NULL,NULL),('2018-01-26 19:57:59','2018-01-26 19:57:59',44,'Daniela Zavala',NULL,'Solidez Hipotecaria','63-5-1969','462-601-0598','integracionzavala@gmail.com',NULL,NULL),('2018-01-26 19:57:59','2018-01-26 19:57:59',45,'Yadira Ayala, Sandra Centeno','Juridico','S&b','63-3-7250',NULL,NULL,NULL,NULL),('2018-01-26 19:57:59','2018-01-26 19:57:59',46,'AFIRME LEON','ERIKA RODRIGUEZ','HIPOTECARIO',NULL,'477-787-2665','ericka.rodriguez@afirme.com',NULL,NULL),('2018-01-26 19:57:59','2018-01-26 19:57:59',47,'AFIRME LEON','RAUL','PYME',NULL,'014771040900',NULL,NULL,NULL);
/*!40000 ALTER TABLE `directorio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documentoscliente`
--

DROP TABLE IF EXISTS `documentoscliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documentoscliente` (
  `fechCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechActualizacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pk_PerfilCliente` int(11) NOT NULL,
  `usuCreacion` varchar(45) DEFAULT NULL,
  `solCreBancarioORI` int(11) DEFAULT NULL,
  `solCreBancarioCOP` int(11) DEFAULT NULL,
  `autTraCreditoORI` int(11) DEFAULT NULL,
  `autTraCreditoCOP` int(11) DEFAULT NULL,
  `autBurCreditoORI` int(11) DEFAULT NULL,
  `autBurCreditoCOP` int(11) DEFAULT NULL,
  `docActNacimientoORI` int(11) DEFAULT NULL,
  `docActNacimientoCOP` int(11) DEFAULT '0',
  `docActNacimientoCAN` int(11) DEFAULT NULL,
  `docActMatrimonioORI` int(11) DEFAULT NULL,
  `docActMatrimonioCOP` int(11) DEFAULT NULL,
  `docActMatrimonioCAN` int(11) DEFAULT NULL,
  `docIdentificacionORI` int(11) DEFAULT NULL,
  `docIdentificacionCOP` int(11) DEFAULT NULL,
  `docRfcORI` int(11) DEFAULT NULL,
  `docRfcCOP` int(11) DEFAULT NULL,
  `docCurpORI` int(11) DEFAULT NULL,
  `docCurpCOP` int(11) DEFAULT NULL,
  `docComDomicilioORI` int(11) DEFAULT NULL,
  `docComDomicilioCOP` int(11) DEFAULT NULL,
  `docPatronalORI` int(11) DEFAULT NULL,
  `docPatronalCOP` int(11) DEFAULT NULL,
  `docNominaORI` int(11) DEFAULT NULL,
  `docNominaCOP` int(11) DEFAULT NULL,
  `docNominaCAN` int(11) DEFAULT NULL,
  `docEstCuentaORI` int(11) DEFAULT NULL,
  `docEstCuentaCOP` int(11) DEFAULT NULL,
  `docEstCuentaCAN` int(11) DEFAULT NULL,
  `autCreHipInfonavitORI` int(11) DEFAULT NULL,
  `autCreHipInfonavitCOP` int(11) DEFAULT NULL,
  `docAvaComercialORI` int(11) DEFAULT NULL,
  `docAvaComercialCOP` int(11) DEFAULT NULL,
  `solDicTecnicoORI` int(11) DEFAULT NULL,
  `solDicTecnicoCOP` int(11) DEFAULT NULL,
  `docIdeFirmadaORI` int(11) DEFAULT NULL,
  `docIdeFirmadaCOP` int(11) DEFAULT NULL,
  `docLisNominalORI` int(11) DEFAULT NULL,
  `docLisNominalCOP` int(11) DEFAULT NULL,
  `docConPropiedadORI` int(11) DEFAULT NULL,
  `docConPropiedadCOP` int(11) DEFAULT NULL,
  `docPreConfinavitORI` int(11) DEFAULT NULL,
  `docPreConfinavitCOP` int(11) DEFAULT NULL,
  `docEcoTecnologiasORI` int(11) DEFAULT NULL,
  `docEcoTecnologiasCOP` int(11) DEFAULT NULL,
  `docDetMovimientoORI` int(11) DEFAULT NULL,
  `docDetMovimientoCOP` int(11) DEFAULT NULL,
  `docConLaboralORI` int(11) DEFAULT NULL,
  `docConLaboralCOP` int(11) DEFAULT NULL,
  `docPredialORI` int(11) DEFAULT NULL,
  `docPredialCOP` int(11) DEFAULT NULL,
  `docMejoravitORI` int(11) DEFAULT NULL,
  `docMejoravitCOP` int(11) DEFAULT NULL,
  `docConTallerORI` int(11) DEFAULT NULL,
  `docConTallerCOP` int(11) DEFAULT NULL,
  `solCreInfonavitORI` int(11) DEFAULT NULL,
  `solCreInfonavitCOP` int(11) DEFAULT NULL,
  `docInsIrrevocableORI` int(11) DEFAULT NULL,
  `docInsIrrevocableCOP` int(11) DEFAULT NULL,
  `docAutBuroCreditoORI` int(11) DEFAULT NULL,
  `docAutBuroCreditoCOP` int(11) DEFAULT NULL,
  `docAutBuroCreditoCAN` int(11) DEFAULT NULL,
  `docManifiestoORI` int(11) DEFAULT NULL,
  `docManifiestoCOP` int(11) DEFAULT NULL,
  `docDecAnualORI` int(11) DEFAULT NULL,
  `docDecAnualCOP` int(11) DEFAULT NULL,
  `docDecParcialORI` int(11) DEFAULT NULL,
  `docDecParcialCOP` int(11) DEFAULT NULL,
  `solAltSecretariaORI` int(11) DEFAULT NULL,
  `solAltSecretariaCOP` int(11) DEFAULT NULL,
  `docConvenioORI` int(11) DEFAULT NULL,
  `docConvenioCOP` int(11) DEFAULT NULL,
  `docPenMensualORI` int(11) DEFAULT NULL,
  `docPenMensualCOP` int(11) DEFAULT NULL,
  `docPenMensualCAN` int(11) DEFAULT NULL,
  `docPenCuentaORI` int(11) DEFAULT NULL,
  `docPenCuentaCOP` int(11) DEFAULT NULL,
  `docPenCuentaCAN` int(11) DEFAULT NULL,
  `estatus` varchar(45) DEFAULT NULL,
  `notas` varchar(2000) DEFAULT NULL,
  `sol97ORI` int(11) DEFAULT NULL,
  `sol97COP` int(11) DEFAULT NULL,
  `docSitFiscalORI` int(11) DEFAULT NULL,
  `docSitFiscalCOP` int(11) DEFAULT NULL,
  `docActConstitutivaORI` int(11) DEFAULT NULL,
  `docActConstitutivaCOP` int(11) DEFAULT NULL,
  `docSaludORI` int(11) DEFAULT NULL,
  `docSaludCOP` int(11) DEFAULT NULL,
  `docCotizacionORI` int(11) DEFAULT NULL,
  `docCotizacionCOP` int(11) DEFAULT NULL,
  `docApoyoORI` int(11) DEFAULT NULL,
  `docApoyoCOP` int(11) DEFAULT NULL,
  `docRelPatrimonialORI` int(11) DEFAULT NULL,
  `docRelPatrimonialCOP` int(11) DEFAULT NULL,
  `docRepComercialORI` int(11) DEFAULT NULL,
  `docRepComercialCOP` int(11) DEFAULT NULL,
  `docLegalORI` int(11) DEFAULT NULL,
  `docLegalCOP` int(11) DEFAULT NULL,
  `docConComercialORI` int(11) DEFAULT NULL,
  `docConComercialCOP` int(11) DEFAULT NULL,
  `docConComercialCAN` int(11) DEFAULT NULL,
  `docTenenciasORI` int(11) DEFAULT NULL,
  `docTenenciasCOP` int(11) DEFAULT NULL,
  `docRecHonorariosORI` int(11) DEFAULT NULL,
  `docRecHonorariosCOP` int(11) DEFAULT NULL,
  `docRecHonorariosCAN` int(11) DEFAULT NULL,
  `docEstFinancierosORI` int(11) DEFAULT NULL,
  `docEstFinancierosCOP` int(11) DEFAULT NULL,
  `docEstFinancierosCAN` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pk_PerfilCliente` (`pk_PerfilCliente`),
  CONSTRAINT `DocumentosCliente_ibfk_1` FOREIGN KEY (`pk_PerfilCliente`) REFERENCES `perfilcliente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentoscliente`
--

LOCK TABLES `documentoscliente` WRITE;
/*!40000 ALTER TABLE `documentoscliente` DISABLE KEYS */;
INSERT INTO `documentoscliente` VALUES ('2018-01-12 16:58:09','2018-01-12 18:35:52',8,8,'otro',NULL,NULL,NULL,NULL,NULL,NULL,1,1,3,1,1,5,NULL,NULL,1,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,NULL,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Completo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('2018-01-12 18:34:08','2018-01-18 19:52:03',9,9,'otro',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Incompleto','Con alguna nota',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('2018-01-18 18:06:42','2018-01-18 19:59:27',15,11,'otro',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,1,1,0,0,0,1,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Sin completar','Sin notas. Faltan documentos',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('2018-01-18 18:28:11','2018-01-18 18:28:11',16,12,'otro',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('2018-01-18 18:55:58','2018-01-18 18:55:58',17,13,'otro',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('2018-01-18 22:03:29','2018-01-18 22:03:29',18,10,'otro',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('2018-01-24 19:20:13','2018-01-24 19:21:08',19,14,'otro',NULL,NULL,NULL,NULL,NULL,NULL,1,1,0,0,0,0,0,0,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Incompleto','',1,1,0,0,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('2018-01-24 19:28:09','2018-01-24 19:28:09',20,15,'otro',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('2018-01-25 17:04:12','2018-01-25 23:17:02',24,16,'otro',0,0,NULL,NULL,NULL,NULL,NULL,0,NULL,0,0,0,0,0,0,0,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Incompleto','',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,NULL,NULL,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0),('2018-01-25 17:57:26','2018-01-25 17:57:26',25,17,'otro',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `documentoscliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_login`
--

DROP TABLE IF EXISTS `failed_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_login` (
  `ip` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_login`
--

LOCK TABLES `failed_login` WRITE;
/*!40000 ALTER TABLE `failed_login` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfilcliente`
--

DROP TABLE IF EXISTS `perfilcliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfilcliente` (
  `fechCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechActualizacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pk_Cliente` int(11) NOT NULL,
  `nombre` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `estado` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `banco` varchar(45) DEFAULT NULL,
  `credito` varchar(45) DEFAULT NULL,
  `salario` varchar(45) DEFAULT NULL,
  `usuCreacion` varchar(45) DEFAULT NULL,
  `solicitud` varchar(45) DEFAULT NULL,
  `actividadEco` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pk_Cliente` (`pk_Cliente`),
  CONSTRAINT `PerfilCliente_ibfk_1` FOREIGN KEY (`pk_Cliente`) REFERENCES `clientes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfilcliente`
--

LOCK TABLES `perfilcliente` WRITE;
/*!40000 ALTER TABLE `perfilcliente` DISABLE KEYS */;
INSERT INTO `perfilcliente` VALUES ('2018-01-12 16:58:09','2018-01-25 17:58:51',8,3,'COFINAVIT',NULL,'Santander','1000000',NULL,'otro','800000',''),('2018-01-12 18:34:08','2018-01-25 17:58:51',9,4,'Hipotecario Persona Fisica con Actividad Empresarial',NULL,'Afirme','1000000',NULL,'otro','70000',''),('2018-01-12 22:26:39','2018-01-25 17:58:51',10,5,'Hipotecario Salario Fijo',NULL,'BanRegio','',NULL,'otro','',''),('2018-01-18 17:41:56','2018-01-25 17:58:51',11,6,'Hipotecario Salario Fijo',NULL,'BanRegio','1000000',NULL,'otro','10000000',''),('2018-01-18 18:28:11','2018-01-25 17:58:51',12,7,'Hipotecario en Confinanciamiento',NULL,'Cofinavit','12311',NULL,'otro','1231231231',''),('2018-01-18 18:55:58','2018-01-25 17:58:51',13,8,'Hipotecario Salario Fijo',NULL,'ScotianBank','10000',NULL,'otro','50000',''),('2018-01-24 19:20:13','2018-01-25 17:58:51',14,9,'Persona Moral',NULL,'Santander','1000000',NULL,'otro','10000',''),('2018-01-24 19:28:09','2018-01-25 17:58:51',15,10,'Persona Moral',NULL,'Afirme','',NULL,'otro','',''),('2018-01-25 00:05:24','2018-01-25 17:07:19',16,11,'Persona Moral',NULL,'BanRegio','11111',NULL,'otro','1111','Persona Fisica Actividad Emp'),('2018-01-25 17:57:26','2018-01-25 17:57:26',17,12,'Hipotecario Persona Fisica con Actividad Empresarial',NULL,'Cofinavit','1000',NULL,'otro','2000','');
/*!40000 ALTER TABLE `perfilcliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registrousuarios`
--

DROP TABLE IF EXISTS `registrousuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registrousuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pk_Usuarios` int(11) NOT NULL,
  `usuario` varchar(50) CHARACTER SET utf8 NOT NULL,
  `estatus` tinyint(1) DEFAULT NULL,
  `entrada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `salida` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `pk_Usuarios` (`pk_Usuarios`),
  CONSTRAINT `RegistroUsuarios_ibfk_1` FOREIGN KEY (`pk_Usuarios`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registrousuarios`
--

LOCK TABLES `registrousuarios` WRITE;
/*!40000 ALTER TABLE `registrousuarios` DISABLE KEYS */;
INSERT INTO `registrousuarios` VALUES (1,1,'lex',1,'2018-01-11 20:33:55','0000-00-00 00:00:00'),(2,1,'lex',1,'2018-01-12 00:15:16','0000-00-00 00:00:00'),(3,1,'lex',1,'2018-01-12 16:54:16','0000-00-00 00:00:00'),(4,1,'lex',0,'2018-01-12 17:41:13','2018-01-12 18:34:23'),(5,1,'lex',1,'2018-01-12 18:34:25','2018-01-12 18:34:25'),(6,1,'lex',0,'2018-01-12 19:02:39','2018-01-12 22:24:06'),(7,1,'lex',0,'2018-01-12 22:24:08','2018-01-12 23:51:15'),(8,1,'lex',0,'2018-01-12 23:51:17','2018-01-12 23:53:18'),(9,1,'lex',1,'2018-01-12 23:53:19','2018-01-12 23:53:19'),(10,1,'lex',0,'2018-01-13 18:23:38','2018-01-13 19:36:47'),(11,1,'lex',1,'2018-01-13 19:36:49','2018-01-13 19:36:49'),(12,1,'lex',0,'2018-01-15 16:28:11','2018-01-15 17:57:35'),(13,1,'lex',0,'2018-01-15 17:57:36','2018-01-15 17:58:43'),(14,1,'lex',1,'2018-01-15 17:58:51','2018-01-15 17:58:51'),(15,1,'lex',0,'2018-01-15 17:59:15','2018-01-15 18:03:30'),(16,1,'lex',1,'2018-01-15 18:03:38','2018-01-15 18:03:38'),(17,1,'lex',0,'2018-01-15 18:03:48','2018-01-15 18:15:15'),(18,1,'lex',0,'2018-01-15 18:15:16','2018-01-15 19:05:58'),(19,1,'lex',1,'2018-01-15 18:27:23','2018-01-15 18:27:23'),(20,1,'lex',0,'2018-01-15 19:06:00','2018-01-15 21:14:24'),(21,1,'lex',1,'2018-01-15 21:14:26','2018-01-15 21:14:26'),(22,1,'lex',0,'2018-01-16 16:11:54','2018-01-16 17:27:24'),(23,1,'lex',1,'2018-01-16 17:27:27','2018-01-16 17:27:27'),(24,1,'lex',1,'2018-01-16 19:07:38','2018-01-16 19:07:38'),(25,1,'lex',1,'2018-01-16 19:09:32','2018-01-16 19:09:32'),(26,1,'lex',1,'2018-01-16 19:10:05','2018-01-16 19:10:05'),(27,1,'lex',0,'2018-01-16 19:17:17','2018-01-16 20:04:55'),(28,1,'lex',1,'2018-01-16 20:05:00','2018-01-16 20:05:00'),(29,1,'lex',1,'2018-01-17 19:35:50','2018-01-17 19:35:50'),(30,1,'lex',0,'2018-01-17 23:57:26','2018-01-18 00:01:53'),(31,1,'lex',0,'2018-01-18 00:01:57','2018-01-18 00:07:16'),(32,1,'lex',1,'2018-01-18 00:07:21','2018-01-18 00:07:21'),(33,1,'lex',1,'2018-01-18 16:30:01','2018-01-18 16:30:01'),(34,1,'lex',0,'2018-01-19 17:03:44','2018-01-19 21:33:42'),(35,1,'lex',1,'2018-01-19 21:33:48','2018-01-19 21:33:48'),(36,1,'lex',1,'2018-01-20 18:25:05','2018-01-20 18:25:05'),(37,1,'lex',1,'2018-01-21 00:23:00','2018-01-21 00:23:00'),(38,1,'lex',0,'2018-01-21 00:36:39','2018-01-21 00:55:06'),(39,1,'lex',0,'2018-01-21 00:56:11','2018-01-21 01:07:21'),(40,1,'lex',0,'2018-01-21 01:08:42','2018-01-21 01:18:40'),(41,1,'lex',1,'2018-01-21 01:19:49','2018-01-21 01:19:49'),(42,1,'lex',0,'2018-01-22 19:04:33','2018-01-22 19:04:39'),(43,1,'lex',1,'2018-01-22 20:36:07','2018-01-22 20:36:07'),(44,1,'lex',1,'2018-01-22 20:36:53','2018-01-22 20:36:53'),(45,1,'lex',0,'2018-01-22 20:40:02','2018-01-22 20:40:08'),(46,1,'lex',0,'2018-01-22 20:41:53','2018-01-22 20:41:56'),(47,1,'lex',0,'2018-01-22 20:45:30','2018-01-22 20:45:33'),(48,1,'lex',0,'2018-01-23 16:19:35','2018-01-23 17:59:21'),(49,1,'lex',1,'2018-01-23 18:52:39','2018-01-23 18:52:39'),(50,1,'lex',1,'2018-01-23 18:56:06','2018-01-23 18:56:06'),(51,1,'lex',1,'2018-01-23 19:08:06','2018-01-23 19:08:06'),(52,1,'lex',0,'2018-01-23 19:11:14','2018-01-23 19:11:17'),(53,1,'lex',1,'2018-01-23 19:13:53','2018-01-23 19:13:53'),(54,1,'lex',1,'2018-01-23 19:15:33','2018-01-23 19:15:33'),(55,1,'lex',1,'2018-01-23 19:20:04','2018-01-23 19:20:04'),(56,1,'lex',1,'2018-01-23 19:21:07','2018-01-23 19:21:07'),(57,1,'lex',1,'2018-01-23 19:22:55','2018-01-23 19:22:55'),(58,1,'lex',1,'2018-01-23 19:23:54','2018-01-23 19:23:54'),(59,1,'lex',1,'2018-01-23 19:24:44','2018-01-23 19:24:44'),(60,1,'lex',1,'2018-01-23 19:25:09','2018-01-23 19:25:09'),(61,1,'lex',1,'2018-01-23 19:27:13','2018-01-23 19:27:13'),(62,1,'lex',1,'2018-01-23 19:29:42','2018-01-23 19:29:42'),(63,1,'lex',1,'2018-01-23 19:30:10','2018-01-23 19:30:10'),(64,1,'lex',1,'2018-01-23 19:33:13','2018-01-23 19:33:13'),(65,1,'lex',1,'2018-01-23 19:33:32','2018-01-23 19:33:32'),(66,1,'lex',0,'2018-01-23 19:38:04','2018-01-23 19:38:24'),(67,1,'lex',1,'2018-01-23 19:38:30','2018-01-23 19:38:30'),(68,1,'lex',0,'2018-01-23 19:39:14','2018-01-23 19:41:01'),(69,1,'lex',0,'2018-01-23 19:41:11','2018-01-23 19:43:16'),(70,1,'lex',1,'2018-01-23 19:43:22','2018-01-23 19:43:22'),(71,1,'lex',1,'2018-01-23 19:43:55','2018-01-23 19:43:55'),(72,1,'lex',1,'2018-01-23 19:44:36','2018-01-23 19:44:36'),(73,1,'lex',0,'2018-01-23 19:46:15','2018-01-23 19:48:04'),(74,1,'lex',0,'2018-01-23 19:48:15','2018-01-23 19:59:36'),(75,1,'lex',0,'2018-01-23 20:00:35','2018-01-23 20:15:16'),(76,1,'lex',1,'2018-01-23 20:15:24','2018-01-23 20:15:24'),(77,1,'lex',1,'2018-01-23 22:29:46','2018-01-23 22:29:46'),(78,1,'lex',0,'2018-01-23 22:30:44','2018-01-23 22:30:48'),(79,1,'lex',1,'2018-01-23 22:30:55','2018-01-23 22:30:55'),(80,1,'lex',1,'2018-01-24 17:00:57','2018-01-24 17:00:57'),(81,1,'lex',1,'2018-01-25 16:59:58','2018-01-25 16:59:58'),(82,1,'lex',1,'2018-01-26 17:03:55','2018-01-26 17:03:55');
/*!40000 ALTER TABLE `registrousuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `fechCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechActualizacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8 NOT NULL,
  `apellido` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `telCasa` int(11) DEFAULT NULL,
  `telMovil` int(11) DEFAULT NULL,
  `usuario` varchar(20) CHARACTER SET utf8 NOT NULL,
  `pass` varchar(100) CHARACTER SET utf8 NOT NULL,
  `tipo` varchar(20) CHARACTER SET utf8 NOT NULL,
  `img` longblob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES ('2018-01-11 19:01:22','0000-00-00 00:00:00',1,'','',NULL,NULL,NULL,'lex','123','',NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-30 18:36:52

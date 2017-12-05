-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: localhost    Database: db_dgcypa
-- ------------------------------------------------------
-- Server version	5.7.20-0ubuntu0.16.04.1

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
-- Current Database: `db_dgcypa`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `db_dgcypa` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_dgcypa`;

--
-- Table structure for table `period_activity`
--

DROP TABLE IF EXISTS `period_activity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `period_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `duration_id` int(11) DEFAULT NULL,
  `startdate` datetime NOT NULL,
  `enddate` datetime DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_activity_duration1_idx` (`duration_id`),
  CONSTRAINT `FK_C93F393937B987D8` FOREIGN KEY (`duration_id`) REFERENCES `period_duration` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `period_activity`
--

LOCK TABLES `period_activity` WRITE;
/*!40000 ALTER TABLE `period_activity` DISABLE KEYS */;
INSERT INTO `period_activity` VALUES (1,4,'2018-01-29 00:00:00','2018-02-23 00:00:00','<p>Receso de Verano</p>'),(2,4,'2018-02-26 00:00:00',NULL,'Inicio de actividades universitarias para el año académico 2018'),(3,NULL,'2018-02-28 00:00:00','2018-03-16 00:00:00','<p>Periodo de proped&eacute;utico para los estudiantes del ingreso 2018.</p>'),(4,NULL,'2018-03-19 00:00:00','2018-07-20 00:00:00','<p>Periodo acad&eacute;mico de los m&oacute;dulos del primer semestre del a&ntilde;o 2018</p>'),(5,NULL,'2018-03-19 00:00:00','2018-03-29 00:00:00','<p>Periodo de resoluci&oacute;n de solicitudes de excepci&oacute;n y cierre del proceso de inscripci&oacute;n de m&oacute;dulos anuales, trimestrales y semestrales del 2018.</p>'),(6,NULL,'2018-05-22 00:00:00',NULL,'<p>Fin del plazo para solicitar actas complementarias para&nbsp;los m&oacute;dulos semestrales y anuales finalizados el segundo semestre del a&ntilde;o 2017.</p>'),(7,NULL,'2018-07-23 00:00:00','2018-08-03 00:00:00','<p>Receso&nbsp;de vacaciones de invierno para los estudiantes.</p>'),(8,NULL,'2018-01-01 00:00:00',NULL,'<p>Feriado de A&ntilde;o Nuevo</p>'),(9,NULL,'2018-03-30 00:00:00',NULL,'<p>Feriado de Viernes Santo</p>'),(10,NULL,'2018-05-01 00:00:00',NULL,'<p>Feriado del D&iacute;a del Trabajo</p>'),(11,NULL,'2018-05-21 00:00:00',NULL,'<p>Feriado del D&iacute;a de las Glorias Navales</p>'),(13,NULL,'2018-07-02 00:00:00',NULL,'<p>Feriado de San Pedro y San Pablo</p>'),(14,NULL,'2018-07-16 00:00:00',NULL,'<p>Feriado del D&iacute;a de la Virgen del Carmen</p>'),(15,NULL,'2018-08-15 00:00:00',NULL,'<p>Feriado del D&iacute;a de Asunci&oacute;n de la Virgen</p>'),(17,NULL,'2018-10-15 00:00:00',NULL,'<p>Feriado del D&iacute;a del Encuentro de dos Mundos</p>'),(18,NULL,'2018-11-01 00:00:00',NULL,'<p>Feriado del D&iacute;a de Todos los Santos</p>'),(19,NULL,'2018-11-02 00:00:00',NULL,'<p>Feriado del D&iacute;a de las iglesias Evang&eacute;licas y Protestantes&nbsp;</p>'),(20,NULL,'2018-12-08 00:00:00',NULL,'<p>Feriado del D&iacute;a de la Inmaculada Concepci&oacute;n&nbsp;</p>'),(21,NULL,'2018-12-25 00:00:00',NULL,'<p>Feriado del D&iacute;a de Navidad</p>'),(22,NULL,'2018-08-13 00:00:00','2018-12-21 00:00:00','<p>Periodo acad&eacute;mico de los m&oacute;dulos del segundo&nbsp;semestre del a&ntilde;o 2018</p>'),(23,NULL,'2018-03-19 00:00:00','2018-12-21 00:00:00','<p>Periodo acad&eacute;mico de los m&oacute;dulos anuales del a&ntilde;o&nbsp;2018</p>'),(24,NULL,'2018-07-23 00:00:00','2018-08-03 00:00:00','<p>Periodo acad&eacute;mico para m&oacute;dulos intensivos de invierno 2018</p>'),(25,NULL,'2018-05-28 00:00:00','2018-05-31 00:00:00','<p>Proceso de revisi&oacute;n de las nominas de estudiantes para optar al beneficio de apoyo al aprendizaje (Notebook) con entrega para el a&ntilde;o 2018.&nbsp;&nbsp;</p>'),(31,NULL,'2018-10-10 00:00:00',NULL,'<p>Fin del plazo para solicitar actas complementarias para&nbsp;los m&oacute;dulos semestrales finalizados el primer semestre del a&ntilde;o 2018</p>'),(33,NULL,'2018-03-19 00:00:00','2018-06-15 00:00:00','<p>Periodo acad&eacute;mico de los m&oacute;dulos del primer trimestre del a&ntilde;o 2018</p>'),(34,NULL,'2018-07-03 00:00:00','2018-07-08 00:00:00','<p>Proceso de evaluaci&oacute;n de la docencia para los m&oacute;dulos del primer semestre&nbsp;</p>'),(35,NULL,'2018-01-08 00:00:00',NULL,'<p>Fin del plazo de env&iacute;o a la Vicerrector&iacute;a de Pregrado (VRP) del acta final de aprobaci&oacute;n o rechazo de las solicitudes ingreso especial: convenios especiales.</p>'),(36,NULL,'2018-01-12 00:00:00',NULL,'<p>Fin del plazo para emitir resoluciones&nbsp;sobre las solicitudes de ingreso especial: convenios especiales &nbsp;ingreso 2018.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Fin del plazo presentaci&oacute;n solicitudes ingreso especial: 2&deg; a&ntilde;o, traslado, &nbsp;transferencia y otros.</p>\r\n\r\n<p>&nbsp;</p>'),(37,NULL,'2018-01-22 00:00:00',NULL,'<p>Matr&iacute;cula alumnos nuevos ingreso especial: Talentos, convenios y Becas BEA.</p>'),(38,NULL,'2018-01-17 00:00:00',NULL,'<p>Fin plazo env&iacute;o a la Vicerrector&iacute;a de Pregrado del acta final de aprobaci&oacute;n o rechazo de las solicitudes ingreso especial: 2&deg; a&ntilde;o, traslado, transferencia y otros. (Comisi&oacute;n Art. 10 del &nbsp;Reglamento de R&eacute;gimen de Estudios).</p>'),(39,NULL,'2018-01-25 00:00:00',NULL,'<p>Fin del plazo de Emisi&oacute;n de Resoluci&oacute;n sobre las solicitudes ingreso especial para el primer semestre: 2&deg; a&ntilde;o, traslado, transferencia y otros. (VRP).</p>\r\n\r\n<p>Fin plazo presentaci&oacute;n solicitudes relacionadas con Art. 32 y Art. 42 del Reglamento de R&eacute;gimen de Estudios, para el primer semestre 2018.</p>'),(40,NULL,'2018-03-02 00:00:00',NULL,'<p>Fin del plazo para emitir resoluci&oacute;n&nbsp;de las solicitudes relacionadas con el Art.32 (Decanos) y Art. 42 (Directores de Escuelas) del Reglamento de R&eacute;gimen de Estudios.</p>'),(41,NULL,'2018-03-06 00:00:00',NULL,'<p>Fin del plazo recepci&oacute;n de solicitudes de equivalencia curricular para el primer semestre. (Art. 12 y Art. 13 del Reglamento de R&eacute;gimen de Estudios), para el caso de idioma extranjero los estudiantes deben haber rendido el test de diagn&oacute;stico.</p>'),(42,NULL,'2018-02-28 00:00:00','2018-03-02 00:00:00','<p>Matr&iacute;cula de estudiantes antiguos y regulares por Art. 32 y Art. 42 &nbsp;</p>'),(43,NULL,'2018-03-02 00:00:00',NULL,'<p>Matr&iacute;cula ingreso especial: 2&deg; a&ntilde;o, traslado, transferencia y otros.</p>'),(44,NULL,'2018-03-01 00:00:00',NULL,'<p>Inscripci&oacute;n autom&aacute;tica de m&oacute;dulos&nbsp;no aprobados del nivel m&aacute;s bajo trimestrales, semestrales y&nbsp;anuales por parte del DGCyPA para el primer semestre del a&ntilde;o 2018.</p>\r\n\r\n<p>Inscripci&oacute;n autom&aacute;tica de m&oacute;dulos para los estudiantes con ingreso 2018.</p>'),(45,NULL,'2018-01-15 00:00:00',NULL,'<p>Proceso de asignaci&oacute;n de salas para el primer semestre del a&ntilde;o 2018 (DGCyPA)</p>'),(46,NULL,'2018-03-09 00:00:00',NULL,'<p>Fin plazo para env&iacute;o a la VRP &nbsp;Actas de equivalencia curricular. (Comisi&oacute;n Art. 10 del Reglamento de R&eacute;gimen de Estudios).</p>'),(47,NULL,'2018-03-05 00:00:00','2018-03-08 00:00:00','<p>Proceso de inscripci&oacute;n de m&oacute;dulos para el primer semestre del a&ntilde;o 2018 e ingreso solicitudes de excepci&oacute;n por parte de los estudiantes.&nbsp;</p>'),(48,NULL,'2018-03-16 00:00:00',NULL,'<p>Fin plazo para emisi&oacute;n de resoluciones&nbsp;para solicitudes de equivalencias curriculares para alumnos de ingreso especial (VRP).</p>'),(49,NULL,'2018-03-23 00:00:00',NULL,'<p>Fin del plazo para informar cambio de idioma extranjero en el Programa de Idiomas.</p>'),(50,NULL,'2018-03-29 00:00:00',NULL,'<p>Fin plazo de presentaci&oacute;n en el Departamento de Registro Acad&eacute;mico de expedientes de titulaci&oacute;n para ceremonia de Titulaci&oacute;n y Graduaci&oacute;n del primer semestre de &nbsp;2018.</p>'),(52,NULL,'2018-04-04 00:00:00','2018-04-06 00:00:00','<p>Actividades de bienvenida estudiantes ingreso 2018. &nbsp;Suspensi&oacute;n de evaluaciones en los Campus Santiago, Curic&oacute;, Talca y Linares. Suspensi&oacute;n de clases de pregrado a partir de las 13:30 horas.&nbsp;Inauguraci&oacute;n del a&ntilde;o acad&eacute;mico, la fecha exacta &nbsp;y horario de &nbsp;suspensi&oacute;n de actividades se establecer&aacute; posteriormente por Resoluci&oacute;n Universitaria.</p>'),(53,NULL,'2018-04-13 00:00:00',NULL,'<p>Fin del plazo para informar Postergaci&oacute;n de Estudios.</p>'),(54,NULL,'2018-04-27 00:00:00',NULL,'<p>Fin del plazo de presentaci&oacute;n al Consejo Acad&eacute;mico, de solicitudes de modificaci&oacute;n de planes de formaci&oacute;n para para ser implementados en el segundo semestre del 2018 o&nbsp;creaci&oacute;n de planes para el a&ntilde;o 2019.</p>'),(55,NULL,'2018-06-29 00:00:00',NULL,'<p>Fin plazo para informar Retiro Temporal y para &nbsp;acogerse al Art. 21 del Reglamento de R&eacute;gimen de Estudios, m&oacute;dulos primer semestre</p>'),(60,NULL,'2018-07-20 00:00:00',NULL,'<p>Fin del plazo para el &nbsp;ingreso de calificaciones finales de los m&oacute;dulos impartidos en el primer semestre (semestre oto&ntilde;o 2018)</p>'),(61,NULL,'2018-07-20 00:00:00',NULL,'<p>Fin plazo presentaci&oacute;n solicitudes ingreso especial para el semestre primavera: traslado y &nbsp;transferencia</p>'),(62,NULL,'2018-07-24 00:00:00',NULL,'<p>Proceso de determinaci&oacute;n de situaciones acad&eacute;micas de los estudiantes por DGCyPA (termino del primer semestre).&nbsp;</p>'),(63,NULL,'2018-07-27 00:00:00',NULL,'<p>Inscripci&oacute;n autom&aacute;tica de m&oacute;dulos semestrales no aprobados del nivel m&aacute;s bajo para el semestre primavera 2018 por DGCyPA</p>'),(64,NULL,'2018-07-27 00:00:00',NULL,'<p>Fin plazo de env&iacute;o a la VRP de actas finales de aprobaci&oacute;n o rechazo de &nbsp;solicitudes ingreso especial para el semestre primavera: traslado transferencia; solicitudes de equivalencia curricular respectivas (Art. 10 del Reglamento de R&eacute;gimen de Estudios)</p>'),(65,NULL,'2018-07-27 00:00:00',NULL,'<p>Proceso de asignaci&oacute;n de salas para el segundo semestre del a&ntilde;o 2018 (DGCyPA)</p>'),(66,NULL,'2018-08-03 00:00:00',NULL,'<p>Fin plazo de emisi&oacute;n Resoluciones para solicitudes ingreso especial: traslado y transferencia; equivalencias curriculares para el semestre primavera (VRP).</p>'),(67,NULL,'2018-07-30 00:00:00','2018-08-02 00:00:00','<p>Proceso de inscripci&oacute;n de m&oacute;dulos para el segundo semestre&nbsp;2018 e ingreso solicitudes de excepci&oacute;n por parte de los estudiantes.</p>'),(69,NULL,'2018-08-17 00:00:00',NULL,'<p>Fin de plazo para informar cambio de idioma extranjero en el Programa de Idiomas.</p>'),(70,NULL,'2018-08-24 00:00:00',NULL,'<p>Fin plazo de presentaci&oacute;n en Departamento de Registro Acad&eacute;mico de expedientes de titulaci&oacute;n para ceremonia de Titulaci&oacute;n y &nbsp;Graduaci&oacute;n del a&ntilde;o &nbsp;2018, semestre primavera.</p>'),(71,NULL,'2018-08-31 00:00:00',NULL,'<p>Fin plazo para informar Postergaci&oacute;n de Estudios</p>'),(72,NULL,'2018-09-17 00:00:00','2018-09-22 00:00:00','<p>Receso de Fiestas Patrias</p>'),(74,NULL,'2018-10-25 00:00:00',NULL,'<p>Acto Acad&eacute;mico XXXVII Aniversario de Universidad &nbsp;de Talca, el horario de &nbsp;suspensi&oacute;n de actividades acad&eacute;micas y administrativas en cada uno de los Campus se establecer&aacute; posteriormente por Resoluci&oacute;n Universitaria.&nbsp;</p>'),(75,NULL,'2018-10-25 00:00:00','2018-10-26 00:00:00','<p>Suspensi&oacute;n de evaluaciones y actividades acad&eacute;micas&nbsp;de pregrado a partir de las 13:10 horas</p>'),(76,NULL,'2018-10-05 00:00:00',NULL,'<p>Fin plazo de presentaci&oacute;n al Consejo Acad&eacute;mico, de solicitudes de modificaci&oacute;n de planes de formaci&oacute;n para ser implementados en el primer semestre del a&ntilde;o 2019.</p>'),(80,NULL,'2018-12-04 00:00:00','2018-12-06 00:00:00','<p>Proceso de evaluaci&oacute;n de la docencia para los m&oacute;dulos anuales y semestrales impartidos en el segundo semestre del a&ntilde;o 2018</p>'),(81,NULL,'2018-12-04 00:00:00',NULL,'<p>Fin de plazo para recepci&oacute;n de solicitudes ingreso especial de Talentos para ingreso 2019</p>'),(82,NULL,'2018-12-11 00:00:00','2018-12-14 00:00:00','<p>Plazo para aplicar ex&aacute;menes de suficiencia para postulantes a ingreso especial Talentos, del &aacute;rea art&iacute;stico-musical y deportiva.</p>'),(83,NULL,'2018-12-21 00:00:00',NULL,'<p>Fin del plazo para el ingreso de calificaciones finales de los m&oacute;dulos&nbsp;anuales y semestrales.</p>'),(84,NULL,'2018-12-26 00:00:00',NULL,'<p>Proceso de determinaci&oacute;n de situaciones acad&eacute;micas de los estudiantes por DGCyPA (termino el periodo acad&eacute;mico anual y semestral para el a&ntilde;o 2018).</p>'),(85,NULL,'2018-12-28 00:00:00',NULL,'<p>Fin &nbsp;plazo para emitir Resoluci&oacute;n de preseleccionados &nbsp;por v&iacute;a ingreso especial de Talentos.</p>'),(88,NULL,'2018-03-29 00:00:00',NULL,'<p>Determinaci&oacute;n de eliminados por Art. 31&nbsp;letra b) del Reglamento de R&eacute;gimen de Estudios por el DGCyPA.</p>'),(89,NULL,'2018-07-20 00:00:00',NULL,'<p>Fin plazo recepci&oacute;n de solicitudes de equivalencia curricular para el segundo semestre del a&ntilde;o 2018<br />\r\n&nbsp;</p>'),(90,NULL,'2018-07-27 00:00:00',NULL,'<p>Fin plazo presentaci&oacute;n solicitudes relacionadas con Art. 32 y el Art. 42 del Reglamento R&eacute;gimen de Estudios, para el semestre primavera<br />\r\n&nbsp;</p>'),(91,NULL,'2018-08-03 00:00:00',NULL,'<p>Fin plazo emisi&oacute;n Resoluci&oacute;n de las solicitudes relacionadas con el Art. 32 (Decanos y VRP) y Art. 42 (Directores de Escuelas) del Reglamento de R&eacute;gimen de Estudios.</p>'),(92,NULL,'2018-11-23 00:00:00',NULL,'<p>Fin plazo para informar Retiro Temporal y acogerse al Art. 21 del Reglamento de R&eacute;gimen de Estudios, m&oacute;dulos segundo semestre y anuales.</p>'),(93,NULL,'2018-01-02 00:00:00',NULL,'<p>Fin del plazo para recepci&oacute;n de solicitudes ingreso por convenios especiales, para admisi&oacute;n 2018</p>'),(94,NULL,'2018-06-25 00:00:00','2018-10-05 00:00:00','<p>Periodo acad&eacute;mico de los m&oacute;dulos del segundo trimestre del a&ntilde;o 2018</p>'),(95,NULL,'2018-10-16 00:00:00','2019-01-04 00:00:00','<p>Periodo acad&eacute;mico de los m&oacute;dulos del tercer trimestre del a&ntilde;o 2018</p>'),(96,NULL,'2018-04-09 00:00:00',NULL,'<p>Fin del plazo para el ingreso de la calendarizaci&oacute;n de los m&oacute;dulos semestrales, trimestrales y anuales para el periodo 2018/1</p>'),(97,NULL,'2018-08-28 00:00:00',NULL,'<p>Fin del plazo para el ingreso de la calendarizaci&oacute;n de los m&oacute;dulos para el segundo semestre del a&ntilde;o 2018.</p>'),(100,NULL,'2018-06-25 00:00:00','2018-06-29 00:00:00','<p>Proceso de planificaci&oacute;n docente de m&oacute;dulos&nbsp;para el segundo semestre&nbsp;del&nbsp;2018&nbsp;(Directores de Escuela, Directores&nbsp;de Departamentos, Institutos y Programas).</p>'),(102,NULL,'2018-08-02 00:00:00','2018-08-03 00:00:00','<p>Proceso de evaluaci&oacute;n de la docencia para los m&oacute;dulos intensivos de invierno 2018</p>'),(103,NULL,'2018-07-13 00:00:00',NULL,'<p>Fin del plazo para el ingreso de la calendarizaci&oacute;n de los m&oacute;dulos para el segundo trimestre del a&ntilde;o&nbsp;2018.</p>'),(104,NULL,'2018-11-07 00:00:00',NULL,'<p>Fin del plazo para el ingreso de la calendarizaci&oacute;n de los m&oacute;dulos para el tercer&nbsp;trimestre del a&ntilde;o&nbsp;2018.</p>'),(105,NULL,'2019-01-01 00:00:00',NULL,'<p>Feriado de A&ntilde;o Nuevo</p>'),(106,NULL,'2018-06-15 00:00:00',NULL,'<p>Fin del plazo para el &nbsp;ingreso de calificaciones finales de los m&oacute;dulos impartidos en el primer trimestre&nbsp;del a&ntilde;o 2018.</p>'),(107,NULL,'2018-10-05 00:00:00',NULL,'<p>Fin del plazo para el &nbsp;ingreso de calificaciones finales de los m&oacute;dulos impartidos en el segundo trimestre&nbsp;del a&ntilde;o 2018.</p>'),(108,NULL,'2019-01-04 00:00:00',NULL,'<p>Fin del plazo para el &nbsp;ingreso de calificaciones finales de los m&oacute;dulos impartidos en el tercer trimestre&nbsp;del a&ntilde;o 2018.</p>'),(109,NULL,'2019-01-07 00:00:00',NULL,'<p>Proceso de determinaci&oacute;n de situaciones acad&eacute;micas de los estudiantes por DGCyPA&nbsp;(termino del tercer trimestre del el a&ntilde;o 2018).</p>'),(110,NULL,'2018-10-08 00:00:00',NULL,'<p>Proceso de determinaci&oacute;n de situaciones acad&eacute;micas de los estudiantes por DGCyPA (termino del segundo trimestre del a&ntilde;o 2018).&nbsp;</p>'),(111,NULL,'2018-06-18 00:00:00',NULL,'<p>Proceso de determinaci&oacute;n de situaciones acad&eacute;micas de los estudiantes por DGCyPA&nbsp;(termino del primer trimestre del a&ntilde;o 2018).&nbsp;</p>'),(112,NULL,'2018-05-28 00:00:00','2018-06-03 00:00:00','<p>Proceso de evaluaci&oacute;n de la docencia para los m&oacute;dulos del primer trimestre&nbsp;del a&ntilde;o 2018.</p>'),(113,NULL,'2018-09-10 00:00:00','2018-09-16 00:00:00','<p>Proceso de evaluaci&oacute;n de la docencia para los m&oacute;dulos del segundo trimestre&nbsp;del a&ntilde;o 2018.</p>'),(114,NULL,'2018-12-14 00:00:00','2018-12-23 00:00:00','<p>Proceso de evaluaci&oacute;n de la docencia para los m&oacute;dulos del tercer&nbsp;trimestre&nbsp;del a&ntilde;o 2018.</p>'),(115,NULL,'2018-06-21 00:00:00',NULL,'<p>Inscripci&oacute;n autom&aacute;tica de m&oacute;dulos trimestrales&nbsp;no aprobados del nivel m&aacute;s bajo para el segundo trimestre&nbsp;2018 por DGCyPA</p>'),(116,NULL,'2018-10-11 00:00:00',NULL,'<p>Inscripci&oacute;n autom&aacute;tica de m&oacute;dulos trimestrales&nbsp;no aprobados del nivel m&aacute;s bajo para el tercer trimestre&nbsp;2018 por DGCyPA</p>'),(118,NULL,'2018-11-19 00:00:00','2018-11-23 00:00:00','<p>Proceso de planificaci&oacute;n docente de m&oacute;dulos&nbsp;para el a&ntilde;o acad&eacute;mico 2019&nbsp;(Directores de Escuela, Directores&nbsp;de Departamentos, Institutos y Programas).</p>'),(119,NULL,'2018-05-28 00:00:00','2018-06-01 00:00:00','<p>Proceso de planificaci&oacute;n docente de m&oacute;dulos&nbsp;para el segundo trimestre&nbsp;del&nbsp;2018&nbsp;(Directores de Escuela, Directores&nbsp;de Departamentos, Institutos y Programas).</p>'),(120,NULL,'2018-09-03 00:00:00','2018-09-07 00:00:00','<p>Proceso de planificaci&oacute;n docente de m&oacute;dulos&nbsp;para el tercer trimestre&nbsp;del&nbsp;2018&nbsp;(Directores de Escuela, Directores&nbsp;de Departamentos, Institutos y Programas).</p>'),(121,NULL,'2018-07-06 00:00:00','2018-07-17 00:00:00','<p>Periodo de resoluci&oacute;n de solicitudes de excepci&oacute;n y cierre del proceso de inscripci&oacute;n de m&oacute;dulos para el&nbsp;segundo trimestre del 2018</p>'),(122,NULL,'2018-06-25 00:00:00','2018-06-29 00:00:00','<p>Periodo de resoluci&oacute;n de solicitudes de excepci&oacute;n y cierre del proceso de inscripci&oacute;n de m&oacute;dulos para el&nbsp;segundo trimestre del 2018</p>'),(123,NULL,'2018-10-16 00:00:00','2018-10-19 00:00:00','<p>Periodo de resoluci&oacute;n de solicitudes de excepci&oacute;n y cierre del proceso de inscripci&oacute;n de m&oacute;dulos para el&nbsp;tercer trimestre&nbsp;del 2018</p>'),(125,NULL,'2018-03-31 00:00:00',NULL,'<p>Feriado de S&aacute;bado Santo</p>'),(126,NULL,'2018-03-09 00:00:00',NULL,'<p>Proceso de inscripci&oacute;n de m&oacute;dulos para el primer semestre del a&ntilde;o 2018 para estudiantes que no realizaron evaluaci&oacute;n docente&nbsp;e ingreso solicitudes de excepci&oacute;n.</p>'),(127,NULL,'2018-04-02 00:00:00',NULL,'<p>Emisi&oacute;n de nominas oficiales de los m&oacute;dulos para el periodo 2018/1 por parte de las escuelas.</p>'),(128,NULL,'2018-01-19 00:00:00','2018-01-21 00:00:00','<p>Proceso de Matriculas: primer llamado.</p>'),(129,NULL,'2018-01-22 00:00:00','2018-01-26 00:00:00','<p>Proceso de Matriculas: segundo llamado.</p>'),(132,NULL,'2018-11-25 00:00:00','2018-11-27 00:00:00','<p>Receso en los campus Talca y Curic&oacute; por PSU.</p>'),(133,NULL,'2018-12-24 00:00:00',NULL,'<p>Receso&nbsp;</p>'),(134,NULL,'2018-12-31 00:00:00',NULL,'<p>Receso</p>'),(135,NULL,'2018-03-17 00:00:00',NULL,'<p>Fin periodo acad&eacute;mico 2017/8 para&nbsp;m&oacute;dulos intensivos de verano.</p>'),(136,NULL,'2018-08-06 00:00:00',NULL,'<p>Inicio de actividades acad&eacute;micas del segundo semestre para m&oacute;dulos anuales del a&ntilde;o 2018.&nbsp;</p>'),(137,NULL,'2019-01-28 00:00:00',NULL,'<p>Inicio de receso de verano</p>'),(138,NULL,'2019-01-16 00:00:00',NULL,'<p>Inicio del proceso de matricula para ingreso 2019 (por confirmar).</p>'),(139,NULL,'2018-12-26 00:00:00',NULL,'<p>Inicio de periodo acad&eacute;mico 2018/8 para m&oacute;dulos intensivos de verano.&nbsp;</p>'),(140,NULL,'2018-07-12 00:00:00','2018-07-13 00:00:00','<p>Receso&nbsp;</p>'),(141,NULL,'2018-08-03 00:00:00',NULL,'<p>Proceso de inscripci&oacute;n de m&oacute;dulos para el segundo semestre del a&ntilde;o 2018 para estudiantes que no realizaron evaluaci&oacute;n docente&nbsp;e ingreso solicitudes de excepci&oacute;n.</p>'),(142,NULL,'2019-01-02 00:00:00',NULL,'<p>Fin del plazo para recepci&oacute;n de solicitudes ingreso por convenios especiales, para admisi&oacute;n 2018</p>'),(143,NULL,'2019-01-07 00:00:00',NULL,'<p>Fin del plazo de env&iacute;o a la Vicerrector&iacute;a de Pregrado (VRP) del acta final de aprobaci&oacute;n o rechazo de las solicitudes ingreso especial: convenios especiales.</p>'),(144,NULL,'2019-01-11 00:00:00',NULL,'<p>Fin del plazo para emitir resoluciones&nbsp;sobre las solicitudes de ingreso especial: convenios especiales &nbsp;ingreso 2018.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Fin del plazo presentaci&oacute;n solicitudes ingreso especial: 2&deg; a&ntilde;o, traslado, &nbsp;transferencia y otros.</p>\r\n\r\n<p>&nbsp;</p>'),(145,NULL,'2019-01-16 00:00:00',NULL,'<p>Fin plazo env&iacute;o a la Vicerrector&iacute;a de Pregrado del acta final de aprobaci&oacute;n o rechazo de las solicitudes ingreso especial: 2&deg; a&ntilde;o, traslado, transferencia y otros. (Comisi&oacute;n Art. 10 del &nbsp;Reglamento de R&eacute;gimen de Estudios).</p>'),(146,NULL,'2019-01-24 00:00:00',NULL,'<p>Fin del plazo de Emisi&oacute;n de Resoluci&oacute;n sobre las solicitudes ingreso especial para el primer semestre: 2&deg; a&ntilde;o, traslado, transferencia y otros. (VRP).</p>\r\n\r\n<p>Fin plazo presentaci&oacute;n solicitudes relacionadas con Art. 32 y Art. 42 del Reglamento de R&eacute;gimen de Estudios, para el primer semestre 2018.</p>');
/*!40000 ALTER TABLE `period_activity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `period_duration`
--

DROP TABLE IF EXISTS `period_duration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `period_duration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `period_duration`
--

LOCK TABLES `period_duration` WRITE;
/*!40000 ALTER TABLE `period_duration` DISABLE KEYS */;
INSERT INTO `period_duration` VALUES (1,'Bimestre'),(2,'Trimestre'),(3,'Semestre'),(4,'Anual');
/*!40000 ALTER TABLE `period_duration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proccess`
--

DROP TABLE IF EXISTS `proccess`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proccess` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `id_parent` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proccess`
--

LOCK TABLES `proccess` WRITE;
/*!40000 ALTER TABLE `proccess` DISABLE KEYS */;
/*!40000 ALTER TABLE `proccess` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proccess_regulation_art`
--

DROP TABLE IF EXISTS `proccess_regulation_art`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proccess_regulation_art` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proccess_id` int(11) NOT NULL,
  `regulation_art_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_proccess_regulation_art_proccess1_idx` (`proccess_id`),
  KEY `fk_proccess_regulation_art_regulation_art1_idx` (`regulation_art_id`),
  CONSTRAINT `FK_FC4F39E36381E49` FOREIGN KEY (`proccess_id`) REFERENCES `proccess` (`id`),
  CONSTRAINT `FK_FC4F39E367FA045B` FOREIGN KEY (`regulation_art_id`) REFERENCES `regulation_art` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proccess_regulation_art`
--

LOCK TABLES `proccess_regulation_art` WRITE;
/*!40000 ALTER TABLE `proccess_regulation_art` DISABLE KEYS */;
/*!40000 ALTER TABLE `proccess_regulation_art` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proccess_rule`
--

DROP TABLE IF EXISTS `proccess_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proccess_rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proccess_id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_proccess_rule_proccess1_idx` (`proccess_id`),
  CONSTRAINT `FK_F401754D6381E49` FOREIGN KEY (`proccess_id`) REFERENCES `proccess` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proccess_rule`
--

LOCK TABLES `proccess_rule` WRITE;
/*!40000 ALTER TABLE `proccess_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `proccess_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proccess_system`
--

DROP TABLE IF EXISTS `proccess_system`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proccess_system` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proccess_id` int(11) NOT NULL,
  `system_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_proccess_system_proccess1_idx` (`proccess_id`),
  KEY `fk_proccess_system_system1_idx` (`system_id`),
  CONSTRAINT `FK_14DA60286381E49` FOREIGN KEY (`proccess_id`) REFERENCES `proccess` (`id`),
  CONSTRAINT `FK_14DA6028D0952FA5` FOREIGN KEY (`system_id`) REFERENCES `system` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proccess_system`
--

LOCK TABLES `proccess_system` WRITE;
/*!40000 ALTER TABLE `proccess_system` DISABLE KEYS */;
/*!40000 ALTER TABLE `proccess_system` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regulation`
--

DROP TABLE IF EXISTS `regulation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regulation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valid` tinyint(1) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `number` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regulation`
--

LOCK TABLES `regulation` WRITE;
/*!40000 ALTER TABLE `regulation` DISABLE KEYS */;
INSERT INTO `regulation` VALUES (1,1,'Reglamento de régimen de estudios','72','18 ENE. 2017','2017-10-16 16:06:13',NULL),(2,1,'Reglamento de pruebas y evaluaciones','1858','24 NOV. 2016','2017-10-16 16:07:00',NULL),(3,1,'Política de articulación de Pregrado y Postgrado','814','01 JUN. 2017','2017-10-16 17:16:56',NULL),(4,1,'Documento con las orientaciones generales y reglamento de funcionamiento del programa de Formación Idiomatica para carreras profesionales de la Universidad de Talca','297','14 MAR. 2016','2017-10-18 12:27:23',NULL);
/*!40000 ALTER TABLE `regulation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regulation_art`
--

DROP TABLE IF EXISTS `regulation_art`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regulation_art` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `regulation_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `detail` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `fk_regulation_art_regulation1_idx` (`regulation_id`),
  CONSTRAINT `FK_E3949F00C4F35D83` FOREIGN KEY (`regulation_id`) REFERENCES `regulation` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regulation_art`
--

LOCK TABLES `regulation_art` WRITE;
/*!40000 ALTER TABLE `regulation_art` DISABLE KEYS */;
/*!40000 ALTER TABLE `regulation_art` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system`
--

DROP TABLE IF EXISTS `system`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `shortdescription` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system`
--

LOCK TABLES `system` WRITE;
/*!40000 ALTER TABLE `system` DISABLE KEYS */;
INSERT INTO `system` VALUES (1,'Utalmatico','<p>2</p>','2017-10-16 17:53:38','2017-10-19 18:40:40','<p>El sistema de informaci&oacute;n conocido como &quot;<strong>Utalmatico</strong>&quot; que corresponde a una interfaz web donde el estudiante puede ver su informaci&oacute;n curricular.</p>'),(2,'SGC Docente',NULL,'2017-10-16 17:53:45','2017-11-07 18:20:54','<p>El sistema de informaci&oacute;n conocido como &quot;<strong>SGC Docente</strong>&quot; que corresponde a una interfaz web donde el docente encuentra informaci&oacute;n curricular y realiza la gesti&oacute;n de algunos procesos vinculados a la administraci&oacute;n de los m&oacute;dulos.</p>'),(3,'SGC 2.0',NULL,'2017-10-16 17:53:52','2017-11-08 18:34:21','<p>El sistema de informaci&oacute;n conocido como &quot;<strong>SGC 2.0</strong>&quot; que corresponde a una interfaz web los directores de escuela y departamento encuentra informaci&oacute;n relacionada con la gesti&oacute;n curricular junto con realizar el proceso de planificaci&oacute;n docente.</p>'),(4,'SGC 1.0',NULL,'2017-10-16 17:53:57','2017-11-08 18:34:44','<p>El sistema de informaci&oacute;n conocido como &quot;<strong>SGC 1.0 o Maquina Virtual</strong>&quot; que corresponde a una programa desarrollado en Oracle Forms donde los distintos tipos de roles encuentran informaci&oacute;n de la gesti&oacute;n Curricular. Este sistema solo funciona sobre Windows XP por lo que como alternativo a los usuarios que no tiene este SO se realizo la intalacion de VirtualBox con una Maquina Virtual de Windows XP para que pueda acceder al sistema.</p>'),(5,'Auditorias','<p>El sistema de informaci&oacute;n conocido como &quot;Auditorias&quot; corresponde a una interfaz web desarrollado en PL/SQL que tiene como finalidad entregar un conjunto de herramientas para realizar la revisi&oacute;n de la informaci&oacute;n de las tablas de auditorias creadas para realizar la revisi&oacute;n de las transacciones durante los procesos. Las tablas de las auditorias son alimentadas mediante TRIGGERS de ORACLE y tiene como proposito almacenar cada movimiento realizado durante los distintos procesos. Adem&aacute;s de la informaci&oacute;n de auditorias, tambi&eacute;n se encuentra algunos LINK que muestran distinto contenido el cual es le&iacute;do directamente desde las tablas de la base de datos. - FALTA LA LISTA DE AUDITORIAS - FALTA EL USUARIO y CONTRASE&Ntilde;A DEL ESQUEMA QUE SE UTILIZA PARA ESTO. El sistema de informaci&oacute;n conocido como &quot;Auditorias&quot; corresponde a una interfaz web que entrega el detalle de las tablas de auditorias creadas para realizar la revisi&oacute;n de las transacciones durante los procesos de Gesti&oacute;n Curricular.</p>','2017-10-16 17:55:03','2017-11-08 18:35:05','<p>El sistema de informaci&oacute;n conocido como &quot;<strong>Auditorias</strong>&quot; corresponde a una interfaz web que entrega el detalle de las tablas de auditorias creadas para realizar la revisi&oacute;n de las transacciones durante los procesos de Gesti&oacute;n Curricular.</p>');
/*!40000 ALTER TABLE `system` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_adjustment`
--

DROP TABLE IF EXISTS `system_adjustment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_adjustment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_adjustment`
--

LOCK TABLES `system_adjustment` WRITE;
/*!40000 ALTER TABLE `system_adjustment` DISABLE KEYS */;
INSERT INTO `system_adjustment` VALUES (1,'Error'),(2,'Actualización'),(3,'Nueva Funcionalidad');
/*!40000 ALTER TABLE `system_adjustment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_functionality`
--

DROP TABLE IF EXISTS `system_functionality`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_functionality` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `system_id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_functionality_system_idx` (`system_id`),
  CONSTRAINT `FK_869E10D1D0952FA5` FOREIGN KEY (`system_id`) REFERENCES `system` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_functionality`
--

LOCK TABLES `system_functionality` WRITE;
/*!40000 ALTER TABLE `system_functionality` DISABLE KEYS */;
/*!40000 ALTER TABLE `system_functionality` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_note`
--

DROP TABLE IF EXISTS `system_note`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adjustment_id` int(11) NOT NULL,
  `system_id` int(11) NOT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `year` decimal(10,0) DEFAULT NULL,
  `period` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_note_adjustment1_idx` (`adjustment_id`),
  KEY `fk_system_note_system1_idx` (`system_id`),
  CONSTRAINT `FK_DE7149E25D6DA33D` FOREIGN KEY (`adjustment_id`) REFERENCES `system_adjustment` (`id`),
  CONSTRAINT `FK_DE7149E2D0952FA5` FOREIGN KEY (`system_id`) REFERENCES `system` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_note`
--

LOCK TABLES `system_note` WRITE;
/*!40000 ALTER TABLE `system_note` DISABLE KEYS */;
INSERT INTO `system_note` VALUES (1,2,1,'Visualización de Notas Parciales','Se realiza la actualización de la interfaz gráfica del UTALMATICO para representar de mejor manera el detalle de las notas parciales en módulos que tiene calendarización por unidades/áreas.','2017-10-19 11:09:19','2017-10-19 11:09:19',2017,1);
/*!40000 ALTER TABLE `system_note` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_regulation_art`
--

DROP TABLE IF EXISTS `system_regulation_art`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_regulation_art` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `system_functionality_id` int(11) NOT NULL,
  `regulation_art_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_system_regulation_art_system_functionality1_idx` (`system_functionality_id`),
  KEY `fk_system_regulation_art_regulation_art1_idx` (`regulation_art_id`),
  CONSTRAINT `FK_638F5A8467FA045B` FOREIGN KEY (`regulation_art_id`) REFERENCES `regulation_art` (`id`),
  CONSTRAINT `FK_638F5A84B77F36A3` FOREIGN KEY (`system_functionality_id`) REFERENCES `system_functionality` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_regulation_art`
--

LOCK TABLES `system_regulation_art` WRITE;
/*!40000 ALTER TABLE `system_regulation_art` DISABLE KEYS */;
/*!40000 ALTER TABLE `system_regulation_art` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_role`
--

DROP TABLE IF EXISTS `system_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_role`
--

LOCK TABLES `system_role` WRITE;
/*!40000 ALTER TABLE `system_role` DISABLE KEYS */;
INSERT INTO `system_role` VALUES (1,'Estudiante',NULL,'2017-10-16 15:56:13',NULL),(2,'Docente',NULL,'2017-10-16 15:56:24',NULL),(3,'Director de Escuela',NULL,'2017-10-16 15:56:33',NULL),(4,'Asistente de Dirección',NULL,'2017-10-16 15:56:47',NULL),(5,'Director de Departamento',NULL,'2017-10-16 15:57:06',NULL);
/*!40000 ALTER TABLE `system_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_users`
--

DROP TABLE IF EXISTS `system_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `system_role_id` int(11) NOT NULL,
  `system_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_system_users_system1_idx` (`system_id`),
  KEY `fk_system_users_system_user1_idx` (`system_role_id`),
  CONSTRAINT `FK_404C3E733A705E3F` FOREIGN KEY (`system_role_id`) REFERENCES `system_role` (`id`),
  CONSTRAINT `FK_404C3E73D0952FA5` FOREIGN KEY (`system_id`) REFERENCES `system` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_users`
--

LOCK TABLES `system_users` WRITE;
/*!40000 ALTER TABLE `system_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `system_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `birthdate` date DEFAULT NULL,
  `gender` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-22 14:27:54

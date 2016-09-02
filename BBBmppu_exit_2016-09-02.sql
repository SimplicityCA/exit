# ************************************************************
# Sequel Pro SQL dump
# Versión 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: mysql1101.ixwebhosting.com (MySQL 5.1.68-community-log)
# Base de datos: BBBmppu_exit
# Tiempo de Generación: 2016-09-02 18:11:54 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla client
# ------------------------------------------------------------

DROP TABLE IF EXISTS `client`;

CREATE TABLE `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identity` varchar(10) NOT NULL,
  `names` varchar(45) NOT NULL,
  `lastnames` varchar(45) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `cellphone` varchar(10) NOT NULL,
  `email` varchar(150) NOT NULL,
  `reserve_id` int(11) NOT NULL,
  `number_players` smallint(2) NOT NULL,
  `pay_method` enum('PAYPAL','RESERVE') NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `total_price` double NOT NULL,
  `status` enum('PAYED','NOTPAYED') DEFAULT 'NOTPAYED',
  PRIMARY KEY (`id`),
  KEY `fk_client_reserve1_idx` (`reserve_id`),
  CONSTRAINT `fk_client_reserve1` FOREIGN KEY (`reserve_id`) REFERENCES `reserve` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;

INSERT INTO `client` (`id`, `identity`, `names`, `lastnames`, `phone`, `cellphone`, `email`, `reserve_id`, `number_players`, `pay_method`, `creation_date`, `total_price`, `status`)
VALUES
	(9,'0918043332','georgina','mirana','0987654332','0987654332','geirgi12@hotmail.com',22,6,'PAYPAL','2016-08-28 17:41:21',0,'NOTPAYED'),
	(10,'1715901086','test','test','022495310','0998130318','frankpaul142@gmail.com',24,4,'PAYPAL','2016-08-29 10:56:12',32,'NOTPAYED'),
	(11,'1715901086','test','test','022495310','0998130318','frankpaul142@gmail.com',24,4,'PAYPAL','2016-08-29 10:59:03',32,'NOTPAYED'),
	(12,'1715901086','test2 email','test2 email','022495310','0998130318','frankpaul142@gmail.com',14,5,'RESERVE','2016-08-29 11:27:49',50,'NOTPAYED'),
	(13,'1715901086','test2 email','test2 email','022495310','0998130318','frankpaul142@gmail.com',14,5,'RESERVE','2016-08-29 11:29:31',50,'NOTPAYED'),
	(14,'1715901086','test 3','test 3 email','022495310','0998130318','frankpaul142@gmail.com',15,5,'RESERVE','2016-08-29 11:31:37',50,'NOTPAYED'),
	(15,'1715901086','test 3','test 3 email','022495310','0998130318','frankpaul142@gmail.com',15,5,'RESERVE','2016-08-29 11:33:17',50,'NOTPAYED'),
	(16,'1715901086','tes42 email','test 4','022495310','0998130318','frankpaul142@gmail.com',16,5,'RESERVE','2016-08-29 11:44:16',50,'NOTPAYED'),
	(17,'1712631082','Alejandro','Pérez','998509353','0998509353','alejo.concept@gmail.com',41,4,'RESERVE','2016-08-29 22:57:13',40,'NOTPAYED'),
	(18,'1722554968','Estevan','Jativa','2486221','0996373936','E.jativa_easybac@hotmail.com',91,5,'PAYPAL','2016-08-30 00:30:55',0,'NOTPAYED'),
	(19,'4567566567','3453454534534','34534534534545','6565676766','dfgdfgdfdf','dfgdfgdfgdfgnfdfg',71,7,'RESERVE','2016-08-30 16:37:10',70,'NOTPAYED'),
	(20,'gfhgfhgfhg','454545','453453445','fdgdfgdfgd','dfgdfdfgdf','dfgdfgdfgdfg',70,5,'RESERVE','2016-08-30 16:41:02',50,'NOTPAYED'),
	(21,'1714261219','Jorge Andrés','Villacís Merino','022058473','0985491729','jamvillacis@udlanet.ec ',48,5,'RESERVE','2016-08-30 22:38:15',50,'NOTPAYED'),
	(22,'1723071153','Vanessa ','Leones','0995088990','0995088990','dennisseleones@hotmail.com',88,6,'RESERVE','2016-08-30 23:22:34',0,'NOTPAYED'),
	(23,'1716794555','María Alejandra','Martínez Vilalba','2897419','0992746801','alerchico@gmail.com',92,4,'PAYPAL','2016-09-01 09:38:18',32,'NOTPAYED'),
	(24,'1712631082','Alejandro','Pérez','2889424','0998509353','alejo.concept@gmail.com',75,4,'RESERVE','2016-09-01 11:09:12',30,'NOTPAYED'),
	(25,'1712631082','Alejandro','Pérez','2889424','0998509353','alejo.concept@gmail.com',75,4,'RESERVE','2016-09-01 11:09:14',30,'NOTPAYED');

/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla content
# ------------------------------------------------------------

DROP TABLE IF EXISTS `content`;

CREATE TABLE `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(150) NOT NULL,
  `picture` varchar(150) NOT NULL,
  `video` varchar(150) NOT NULL,
  `type` enum('HOME') NOT NULL DEFAULT 'HOME',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `content` WRITE;
/*!40000 ALTER TABLE `content` DISABLE KEYS */;

INSERT INTO `content` (`id`, `title`, `subtitle`, `picture`, `video`, `type`)
VALUES
	(1,'Tienes 60 minutos para escapar de nuestros cuartos temáticos. ¿Podrás lograrlo?','Será una experiencia inolvidable!','home.jpg','','HOME');

/*!40000 ALTER TABLE `content` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla game
# ------------------------------------------------------------

DROP TABLE IF EXISTS `game`;

CREATE TABLE `game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(150) DEFAULT NULL,
  `picture` varchar(150) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE',
  `landing_picture` varchar(150) DEFAULT '',
  `recordh` tinytext,
  `recordm` tinytext,
  `price` double DEFAULT NULL,
  `price_d` double NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `game` WRITE;
/*!40000 ALTER TABLE `game` DISABLE KEYS */;

INSERT INTO `game` (`id`, `title`, `subtitle`, `picture`, `description`, `video`, `status`, `landing_picture`, `recordh`, `recordm`, `price`, `price_d`)
VALUES
	(1,'ESCAPE DEL CUARTEL','REAL DE LIMA','lima.png','Es 1810, te encuentras en Quito durante el virreinato de Perú bajo el dominio de España, país al que Simón Bolivar declaró guerra a muerte cuando el Conde Ruiz de Castilla ordenó la masacre de los prisioneros del Cuartel Real de Lima, donde fueron asesinados los próceres de la patria que iniciaron el proceso revolucionario en 1809.<br/>\nNo todos murieron. Algunos patriotas, entre ellos el ex presidente Montufar, lograron escapar de los temidos calabozos del Cuartel y dejaron pistas en su camino para que otros compatriotas injustamente encarcelados como tú pudieran escapar.<br/>\nRuiz de Castilla te ha tomado prisionero y has sido declarado a muerte, la sentencia se cumple hoy mismo. Tu misión es escapar, para lo cual deberás encontrar la manera de llegar hasta la calle y salir disfrazado con el uniforme de la guardia Real.<br/>\nTienes 60 minutos antes de que los guardias regresen. ¿Podrás lograrlo?',NULL,'ACTIVE','lima2.jpg','Tiempo: 37 minutos 39 segundos <br/>\nEquipo: Enrique Pérez, Mireya Flor, Ana Pérez, Sebastián Dávalos <br/>\nFecha: 18 agosto 2016 <br/>','Tiempo: 37 minutos 39 segundos <br/>\nEquipo: Enrique Pérez, Mireya Flor, Ana Pérez, Sebastián Dávalos <br/>\nFecha: 18 agosto 2016 <br/>',10,8),
	(2,'ÁREA','51','area51.png','asddasdasasdasdads',NULL,'INACTIVE',NULL,NULL,NULL,NULL,0),
	(3,'EL INICIO DE LA','TERCERA GUERRA MUNDIAL ','proximamente.jpg','asddasdasasdasdads',NULL,'INACTIVE',NULL,NULL,NULL,NULL,0),
	(4,'EL LABORATORIO','DE TESLA','proximamente.jpg','asddasdasasdasdads',NULL,'INACTIVE',NULL,NULL,NULL,NULL,0),
	(7,'EN BUSCA','DEL TESORO PERDIDO','proximamente.jpg','asddasdasasdasdads',NULL,'INACTIVE',NULL,NULL,NULL,NULL,0);

/*!40000 ALTER TABLE `game` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla picture
# ------------------------------------------------------------

DROP TABLE IF EXISTS `picture`;

CREATE TABLE `picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(150) NOT NULL,
  `game_id` int(11) DEFAULT NULL,
  `type` enum('WINNERT','BANNER','WINNERM') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_picture_game_idx` (`game_id`),
  CONSTRAINT `fk_picture_game` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `picture` WRITE;
/*!40000 ALTER TABLE `picture` DISABLE KEYS */;

INSERT INTO `picture` (`id`, `description`, `game_id`, `type`)
VALUES
	(1,'gallery1.JPG',NULL,'BANNER'),
	(2,'gallery2.JPG',NULL,'BANNER'),
	(3,'gallery3.JPG',NULL,'BANNER'),
	(4,'gallery4.JPG',NULL,'BANNER');

/*!40000 ALTER TABLE `picture` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla reserve
# ------------------------------------------------------------

DROP TABLE IF EXISTS `reserve`;

CREATE TABLE `reserve` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `status` enum('OPEN','CLOSE') NOT NULL,
  `game_id` int(11) NOT NULL,
  `description` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_reserve_game1_idx` (`game_id`),
  CONSTRAINT `fk_reserve_game1` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `reserve` WRITE;
/*!40000 ALTER TABLE `reserve` DISABLE KEYS */;

INSERT INTO `reserve` (`id`, `start_date`, `end_date`, `status`, `game_id`, `description`)
VALUES
	(14,'2016-08-28 11:00:00','2016-08-28 12:00:00','CLOSE',1,'Horario'),
	(15,'2016-08-28 12:30:00','2016-08-28 13:30:00','CLOSE',1,'Horario'),
	(16,'2016-08-28 14:00:00','2016-08-28 15:00:00','CLOSE',1,'Horario'),
	(17,'2016-08-28 15:30:00','2016-08-28 16:30:00','OPEN',1,'Horario'),
	(18,'2016-08-28 17:00:00','2016-08-28 18:00:00','OPEN',1,'Horario'),
	(19,'2016-08-28 18:30:00','2016-08-28 19:30:00','OPEN',1,'Horario'),
	(20,'2016-08-28 20:00:00','2016-08-28 21:00:00','OPEN',1,'Horario'),
	(21,'2016-08-28 21:30:00','2016-08-28 22:30:00','OPEN',1,'Horario'),
	(22,'2016-08-28 23:00:00','2016-08-28 00:00:00','OPEN',1,'Horario'),
	(24,'2016-08-29 11:00:00','2016-08-29 12:00:00','CLOSE',1,'Horario'),
	(25,'2016-08-29 12:30:00','2016-08-29 13:30:00','OPEN',1,'Horario'),
	(26,'2016-08-29 14:00:00','2016-08-29 15:00:00','OPEN',1,'Horario'),
	(27,'2016-08-29 15:30:00','2016-08-29 16:30:00','OPEN',1,'Horario'),
	(28,'2016-08-29 17:00:00','2016-08-29 18:00:00','OPEN',1,'Horario'),
	(29,'2016-08-29 18:30:00','2016-08-29 19:30:00','OPEN',1,'Horario'),
	(30,'2016-08-29 20:00:00','2016-08-29 21:00:00','OPEN',1,'Horario'),
	(31,'2016-08-29 21:30:00','2016-08-29 22:30:00','OPEN',1,'Horario'),
	(32,'2016-08-29 23:00:00','2016-08-29 00:00:00','OPEN',1,'Horario'),
	(39,'2016-08-30 11:00:00','2016-08-30 12:00:00','OPEN',1,'Horario'),
	(40,'2016-08-30 12:30:00','2016-08-30 13:30:00','OPEN',1,'Horario'),
	(41,'2016-08-30 14:00:00','2016-08-30 15:00:00','CLOSE',1,'Horario'),
	(42,'2016-08-30 15:30:00','2016-08-30 16:30:00','OPEN',1,'Horario'),
	(43,'2016-08-30 17:00:00','2016-08-30 18:00:00','OPEN',1,'Horario'),
	(44,'2016-08-30 18:30:00','2016-08-30 19:30:00','OPEN',1,'Horario'),
	(45,'2016-08-30 20:00:00','2016-08-30 21:00:00','OPEN',1,'Horario'),
	(46,'2016-08-30 21:30:00','2016-08-30 22:30:00','OPEN',1,'Horario'),
	(47,'2016-08-30 23:00:00','2016-08-30 00:00:00','OPEN',1,'Horario'),
	(48,'2016-08-31 11:00:00','2016-08-31 12:00:00','CLOSE',1,'Horario'),
	(49,'2016-08-31 12:30:00','2016-08-31 13:30:00','OPEN',1,'Horario'),
	(50,'2016-08-31 14:00:00','2016-08-31 15:00:00','OPEN',1,'Horario'),
	(51,'2016-08-31 15:30:00','2016-08-31 16:30:00','OPEN',1,'Horario'),
	(52,'2016-08-31 17:00:00','2016-08-31 18:00:00','OPEN',1,'Horario'),
	(53,'2016-08-31 18:30:00','2016-08-31 19:30:00','OPEN',1,'Horario'),
	(54,'2016-08-31 20:00:00','2016-08-31 21:00:00','OPEN',1,'Horario'),
	(55,'2016-08-31 21:30:00','2016-08-31 22:30:00','OPEN',1,'Horario'),
	(56,'2016-08-31 23:00:00','2016-08-31 00:00:00','OPEN',1,'Horario'),
	(70,'2016-09-01 11:00:00','2016-09-01 12:00:00','CLOSE',1,'Horario'),
	(71,'2016-09-01 12:30:00','2016-09-01 13:30:00','CLOSE',1,'Horario'),
	(72,'2016-09-01 14:00:00','2016-09-01 15:00:00','OPEN',1,'Horario'),
	(73,'2016-09-01 15:30:00','2016-09-01 16:30:00','OPEN',1,'Horario'),
	(74,'2016-09-01 17:00:00','2016-09-01 18:00:00','OPEN',1,'Horario'),
	(75,'2016-09-01 18:30:00','2016-09-01 19:30:00','CLOSE',1,'Horario'),
	(76,'2016-09-01 20:00:00','2016-09-01 21:00:00','OPEN',1,'Horario'),
	(77,'2016-09-01 21:30:00','2016-09-01 22:30:00','OPEN',1,'Horario'),
	(78,'2016-09-01 23:00:00','2016-09-01 00:00:00','OPEN',1,'Horario'),
	(79,'2016-09-02 11:00:00','2016-09-02 12:00:00','OPEN',1,'Horario'),
	(80,'2016-09-02 12:30:00','2016-09-02 13:30:00','OPEN',1,'Horario'),
	(81,'2016-09-02 14:00:00','2016-09-02 15:00:00','OPEN',1,'Horario'),
	(82,'2016-09-02 15:30:00','2016-09-02 16:30:00','OPEN',1,'Horario'),
	(83,'2016-09-02 17:00:00','2016-09-02 18:00:00','OPEN',1,'Horario'),
	(84,'2016-09-02 18:30:00','2016-09-02 19:30:00','OPEN',1,'Horario'),
	(85,'2016-09-02 20:00:00','2016-09-02 21:00:00','OPEN',1,'Horario'),
	(86,'2016-09-02 21:30:00','2016-09-02 22:30:00','OPEN',1,'Horario'),
	(87,'2016-09-02 23:00:00','2016-09-02 00:00:00','OPEN',1,'Horario'),
	(88,'2016-09-03 11:00:00','2016-09-03 12:00:00','CLOSE',1,'Horario'),
	(89,'2016-09-03 12:30:00','2016-09-03 13:30:00','OPEN',1,'Horario'),
	(90,'2016-09-03 14:00:00','2016-09-03 15:00:00','OPEN',1,'Horario'),
	(91,'2016-09-03 15:30:00','2016-09-03 16:30:00','OPEN',1,'Horario'),
	(92,'2016-09-03 17:00:00','2016-09-03 18:00:00','CLOSE',1,'Horario'),
	(93,'2016-09-03 18:30:00','2016-09-03 19:30:00','OPEN',1,'Horario'),
	(94,'2016-09-03 20:00:00','2016-09-03 21:00:00','OPEN',1,'Horario'),
	(95,'2016-09-03 21:30:00','2016-09-03 22:30:00','OPEN',1,'Horario'),
	(96,'2016-09-03 23:00:00','2016-09-03 00:00:00','OPEN',1,'Horario'),
	(97,'2016-09-04 11:00:00','2016-09-04 12:00:00','OPEN',1,'Horario'),
	(98,'2016-09-04 12:30:00','2016-09-04 13:30:00','OPEN',1,'Horario'),
	(99,'2016-09-04 14:00:00','2016-09-04 15:00:00','OPEN',1,'Horario'),
	(100,'2016-09-04 15:30:00','2016-09-04 16:30:00','OPEN',1,'Horario'),
	(101,'2016-09-04 17:00:00','2016-09-04 18:00:00','OPEN',1,'Horario'),
	(102,'2016-09-04 18:30:00','2016-09-04 19:30:00','OPEN',1,'Horario'),
	(103,'2016-09-04 20:00:00','2016-09-04 21:00:00','OPEN',1,'Horario'),
	(104,'2016-09-04 21:30:00','2016-09-04 22:30:00','OPEN',1,'Horario'),
	(105,'2016-09-04 23:00:00','2016-08-04 00:00:00','OPEN',1,'Horario');

/*!40000 ALTER TABLE `reserve` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identity` varchar(10) NOT NULL,
  `names` varchar(90) NOT NULL,
  `lastnames` varchar(90) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

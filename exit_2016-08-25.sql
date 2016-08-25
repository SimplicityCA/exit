# ************************************************************
# Sequel Pro SQL dump
# Versión 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.9)
# Base de datos: exit
# Tiempo de Generación: 2016-08-25 20:40:42 +0000
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
  PRIMARY KEY (`id`),
  KEY `fk_client_reserve1_idx` (`reserve_id`),
  CONSTRAINT `fk_client_reserve1` FOREIGN KEY (`reserve_id`) REFERENCES `reserve` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;

INSERT INTO `client` (`id`, `identity`, `names`, `lastnames`, `phone`, `cellphone`, `email`, `reserve_id`, `number_players`, `pay_method`, `creation_date`, `total_price`)
VALUES
	(1,'1715901086','Franklin Paula','paula','022495310','0998130318','frankpaul142@gmail.com',5,5,'PAYPAL','2016-08-25 15:36:23',62.5),
	(2,'1715901086','Franklin Paula','paula','022495310','0998130318','frankpaul142@gmail.com',5,5,'RESERVE','2016-08-25 15:38:34',75);

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
	(1,'ESCAPE DEL CUARTEL','REAL DE LIMA','lima.jpg','Es 1810, te encuentras en Quito durante el virreinato de Perú bajo el dominio de España, país al que Simón Bolivar declaró guerra a muerte cuando el Conde Ruiz de Castilla ordenó la masacre de los prisioneros del Cuartel Real de Lima, donde fueron asesinados los próceres de la patria que iniciaron el proceso revolucionario en 1809.<br/>\nNo todos murieron. Algunos patriotas, entre ellos el ex presidente Montufar, lograron escapar de los temidos calabozos del Cuartel y dejaron pistas en su camino para que otros compatriotas injustamente encarcelados como tú pudieran escapar.<br/>\nRuiz de Castilla te ha tomado prisionero y has sido declarado a muerte, la sentencia se cumple hoy mismo. Tu misión es escapar, para lo cual deberás encontrar la manera de llegar hasta la calle y salir disfrazado con el uniforme de la guardia Real.<br/>\nTienes 60 minutos antes de que los guardias regresen. ¿Podrás lograrlo?',NULL,'ACTIVE','lima2.jpg','Tiempo: 37 minutos 39 segundos <br/>\nEquipo: Enrique Pérez, Mireya Flor, Ana Pérez, Sebastián Dávalos <br/>\nFecha: 18 agosto 2016 <br/>','Tiempo: 37 minutos 39 segundos <br/>\nEquipo: Enrique Pérez, Mireya Flor, Ana Pérez, Sebastián Dávalos <br/>\nFecha: 18 agosto 2016 <br/>',15,12.5),
	(2,'ASALTO','AL BANCO DEL HAMPA','proximamente.jpg','asddasdasasdasdads',NULL,'INACTIVE',NULL,NULL,NULL,NULL,0),
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
  `game_id` int(11) NOT NULL,
  `type` enum('WINNERT','BANNER','WINNERM') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_picture_game_idx` (`game_id`),
  CONSTRAINT `fk_picture_game` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



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
	(1,'2016-08-23 14:00:00','2016-08-23 11:00:00','OPEN',1,'Prueba'),
	(2,'2016-08-24 10:00:00','2016-08-24 11:00:00','OPEN',1,'Prueba'),
	(3,'2016-08-23 11:00:00','2016-08-23 11:00:00','OPEN',1,'Prueba'),
	(4,'2016-08-24 10:00:00','2016-08-24 11:00:00','OPEN',1,'Prueba'),
	(5,'2016-08-23 09:00:00','2016-08-23 11:00:00','CLOSE',1,'Prueba'),
	(6,'2016-08-24 10:00:00','2016-08-24 11:00:00','OPEN',1,'Prueba'),
	(7,'2016-08-23 12:00:00','2016-08-23 11:00:00','OPEN',1,'Prueba'),
	(8,'2016-08-24 10:00:00','2016-08-24 11:00:00','OPEN',1,'Prueba'),
	(9,'2016-08-23 10:00:00','2016-08-23 11:00:00','OPEN',1,'Prueba'),
	(10,'2016-08-24 10:00:00','2016-08-24 11:00:00','OPEN',1,'Prueba'),
	(11,'2016-08-23 13:00:00','2016-08-23 11:00:00','OPEN',1,'Prueba'),
	(12,'2016-08-24 10:00:00','2016-08-24 11:00:00','OPEN',1,'Prueba');

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

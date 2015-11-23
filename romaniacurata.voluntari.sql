/*
SQLyog Community v12.01 (64 bit)
MySQL - 5.6.17 : Database - romaniacurata_voluntari
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`romaniacurata_voluntari` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `romaniacurata_voluntari`;

/*Table structure for table `proiecte` */

DROP TABLE IF EXISTS `proiecte`;

CREATE TABLE `proiecte` (
  `pk_proiect_id` int(10) NOT NULL AUTO_INCREMENT,
  `proiect_nume` varchar(63) CHARACTER SET latin1 DEFAULT NULL,
  `descriere` longtext CHARACTER SET latin1,
  `pic` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `activ` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`pk_proiect_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Table structure for table `roluri` */

DROP TABLE IF EXISTS `roluri`;

CREATE TABLE `roluri` (
  `pk_rol_id` int(10) NOT NULL AUTO_INCREMENT,
  `fk_proiect_id` int(10) DEFAULT NULL,
  `rol_nume` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `sarcini` text CHARACTER SET latin1,
  `timp` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`pk_rol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Table structure for table `roluri_voluntari` */

DROP TABLE IF EXISTS `roluri_voluntari`;

CREATE TABLE `roluri_voluntari` (
  `pk_match_id` int(10) NOT NULL AUTO_INCREMENT,
  `fk_rol_id` int(10) DEFAULT NULL,
  `fk_voluntar_id` int(10) DEFAULT NULL,
  `validat` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`pk_match_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `pk_user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`pk_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Table structure for table `voluntari` */

DROP TABLE IF EXISTS `voluntari`;

CREATE TABLE `voluntari` (
  `pk_voluntar_id` int(11) NOT NULL AUTO_INCREMENT,
  `nume` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `judet` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `telefon` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `varsta` tinyint(10) DEFAULT NULL,
  `expertiza` varchar(90) CHARACTER SET latin1 DEFAULT NULL,
  `timp` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`pk_voluntar_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

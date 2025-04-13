/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.32-MariaDB : Database - nuevaeradb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`nuevaeradb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `nuevaeradb`;

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `usu_id` int(10) NOT NULL,
  `usu_nom1` varchar(20) NOT NULL,
  `usu_nom2` varchar(20) NOT NULL,
  `usu_ape1` varchar(20) NOT NULL,
  `usu_ape2` varchar(20) NOT NULL,
  `usu_tel` int(10) NOT NULL,
  `usu_correo` varchar(100) NOT NULL,
  `usu_pass` varchar(50) NOT NULL,
  `usu_token` varchar(255) DEFAULT NULL,
  `usu_token_expira` datetime DEFAULT NULL,
  PRIMARY KEY (`usu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `usuario` */

insert  into `usuario`(`usu_id`,`usu_nom1`,`usu_nom2`,`usu_ape1`,`usu_ape2`,`usu_tel`,`usu_correo`,`usu_pass`,`usu_token`,`usu_token_expira`) values 
(1043125848,'ALEX','JESUS','DOMINGUEZ','MERIÑO',2147483647,'dominguezalex287@gmail.com','alex123456789','828d8de637163bdde8dd9fa58c9ba62ff0489cb3','2025-04-13 19:01:09');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

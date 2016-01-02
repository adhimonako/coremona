/*
SQLyog Community v12.0 (32 bit)
MySQL - 5.1.41 : Database - mloppcom_ebook
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mloppcom_ebook` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `mloppcom_ebook`;

/*Table structure for table `ebook` */

DROP TABLE IF EXISTS `ebook`;

CREATE TABLE `ebook` (
  `ID_Buku` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ebook` */

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `role` */

insert  into `role`(`role_id`,`role_name`) values (1,'SU');
insert  into `role`(`role_id`,`role_name`) values (2,'Admin');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(15) NOT NULL AUTO_INCREMENT,
  `user_nama` varchar(255) DEFAULT NULL,
  `user_username` varchar(15) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`user_id`,`user_nama`,`user_username`,`user_pass`,`user_email`,`role_id`) values (3,'Adhi Monako','monako','52f7f46ca330c90e321fce10970382c1','adhimonako@gmail.com',NULL);
insert  into `user`(`user_id`,`user_nama`,`user_username`,`user_pass`,`user_email`,`role_id`) values (4,NULL,'susilo','asd',NULL,NULL);
insert  into `user`(`user_id`,`user_nama`,`user_username`,`user_pass`,`user_email`,`role_id`) values (5,NULL,'kabag','KBG',NULL,NULL);
insert  into `user`(`user_id`,`user_nama`,`user_username`,`user_pass`,`user_email`,`role_id`) values (13,'aa','aa','4124bc0a9335c27f086f24ba207a4912','a@a.bbom',1);
insert  into `user`(`user_id`,`user_nama`,`user_username`,`user_pass`,`user_email`,`role_id`) values (14,'kabag','kabag','','kabag@kabag.com',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

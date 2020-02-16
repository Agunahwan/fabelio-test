/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 10.1.37-MariaDB : Database - fabelio
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`fabelio` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `fabelio`;

/*Table structure for table `comment` */

DROP TABLE IF EXISTS `comment`;

CREATE TABLE `comment` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `comment` varchar(500) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `comment` */

insert  into `comment`(`id`,`product_id`,`title`,`comment`,`created_date`) values 
(1,24497,'baru','comment 1','2019-06-17 20:49:22'),
(2,24497,'baru','comment 1','2019-06-17 20:49:54'),
(3,24497,'comment 2','ini comment 2','2019-06-17 21:13:13'),
(4,5779,'Enak','Kursi nya empuk nih','2019-06-17 21:14:28'),
(5,5779,'kedua','Comment kedua','2019-06-17 21:15:23'),
(6,416,'Title 1','Comment 1','2019-06-26 06:55:03'),
(7,416,'Title 2','Comment 2','2019-06-27 07:52:21'),
(8,20097,'Ini comment','Comment pertama','2020-02-16 16:15:43');

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `description` varchar(10000) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `product` */

insert  into `product`(`id`,`name`,`price`,`description`,`image`,`url`,`created_date`,`updated_date`) values 
(416,'Rak Jon (White)',199000,'Rapikan koleksi buku kesayangan Anda dengan Jon Shelf yang digantung di dinding. Desainnya yang minimalis akan menghemat banyak ruang di rumah Anda. Alas rak terbuat dari kayu lapis yang ringan, sementara bagian penyangga rak terbuat dari kayu mahoni solid yang kokoh. Tata dengan rapi dan rak ini pun sekaligus jadi dekorasi ruangan yang fungsional. Produk rakitan, tersedia buku petunjuk NB:&nbsp;Untuk produk yang memerlukan perakitan, akan dilakukan beberapa hari setelah produk dikirim. Apabila telah melebih dari 7 (tujuh) hari setelah produk dikirim belum ada tim kami yang menghubungi jadwal perakitan, Mohon segera hubungi tim Customer Service kami.','https://fabelio.com/pub/media/catalog/product/j/o/Jon_Shelf_(White)_1.jpg','https://fabelio.com/ip/jon-shelf.html','2019-06-19 18:11:12',NULL),
(5779,'Kursi Makan Cessi',224250,'','https://fabelio.com/pub/media/catalog/product/c/e/Cessi_Dining_Chair_0.jpg','https://fabelio.com/ip/cessi-chair.html','2020-02-16 16:02:44',NULL),
(12050,'Kursi Ottoman Jobi Penyimpanan Mini',407150,'','https://fabelio.com/pub/media/catalog/product/j/a/Jabba_Storage_Mini_Ottoman_7.jpg','https://fabelio.com/ip/kursi-ottoman-jobi-penyimpanan-mini.html','2020-02-16 16:06:37',NULL),
(20097,'Set Tempat Tidur Tromso with Cloud Mattress',3767000,'','https://fabelio.com/pub/media/catalog/product/t/r/tromso-queen-bed-_5_.jpg','https://fabelio.com/ip/set-tempat-tidur-tromso.html','2020-02-16 16:15:20',NULL);

/*Table structure for table `vote_comment` */

DROP TABLE IF EXISTS `vote_comment`;

CREATE TABLE `vote_comment` (
  `comment_id` bigint(20) DEFAULT NULL,
  `up` bit(1) DEFAULT NULL,
  `down` bit(1) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `vote_comment` */

insert  into `vote_comment`(`comment_id`,`up`,`down`,`ip`,`created_date`) values 
(6,'','\0','::1','2019-06-27 10:36:41'),
(6,'','\0','::1','2019-06-27 10:37:39'),
(6,'','\0','::1','2019-06-27 10:37:51'),
(6,'','\0','::1','2019-06-27 10:48:47'),
(6,'','\0','::1','2019-06-27 10:49:47'),
(6,'','\0','::1','2019-06-27 10:50:51'),
(8,'\0','\0','::1','2020-02-16 16:25:39'),
(NULL,'\0','','::1','2020-02-16 16:26:13'),
(NULL,'\0','','::1','2020-02-16 16:26:19'),
(8,'','',NULL,NULL),
(8,'\0','',NULL,NULL),
(NULL,'','\0','::1','2020-02-16 16:28:12');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

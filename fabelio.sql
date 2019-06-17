/*
SQLyog Community v13.1.2 (64 bit)
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `comment` */

insert  into `comment`(`id`,`product_id`,`title`,`comment`,`created_date`) values 
(1,24497,'baru','comment 1','2019-06-17 20:49:22'),
(2,24497,'baru','comment 1','2019-06-17 20:49:54'),
(3,24497,'comment 2','ini comment 2','2019-06-17 21:13:13'),
(4,5779,'Enak','Kursi nya empuk nih','2019-06-17 21:14:28'),
(5,5779,'kedua','Comment kedua','2019-06-17 21:15:23');

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `product` */

insert  into `product`(`id`,`name`,`price`,`description`,`image`,`url`,`created_date`,`updated_date`) values 
(416,'Rak Jon (White)',199000,'Rapikan koleksi buku kesayangan Anda dengan Jon Shelf yang digantung di dinding. Desainnya yang minimalis akan menghemat banyak ruang di rumah Anda. Alas rak terbuat dari kayu lapis yang ringan, sementara bagian penyangga rak terbuat dari kayu mahoni solid yang kokoh. Tata dengan rapi dan rak ini pun sekaligus jadi dekorasi ruangan yang fungsional. Produk rakitan, tersedia buku petunjuk NB:&nbsp;Untuk produk yang memerlukan perakitan, akan dilakukan beberapa hari setelah produk dikirim. Apabila ','https://fabelio.com/pub/media/catalog/product/j/o/','https://fabelio.com/ip/jon-shelf.html','2019-06-17 19:52:32',NULL),
(5779,'Kursi Makan Cessi',379000,'Cessi Dining Chair memiliki tampilan minimalis dan warna-warna yang netral untuk ruangan Anda. Kursi yang akan cocok untuk suasana ruang makan apapun. Kaki kursi yang ramping dan tegas menyeimbangkan kesederhanaan yang tampak kental pada kursi ini. Letakkan kursi makan ini dengan gaya meja makan apapun, tampilannya akan memberikan suasana eksentrik di rumah Anda. Ayo pesan sebelum harga naik!','https://fabelio.com/pub/media/catalog/product/c/e/','https://fabelio.com/ip/cessi-chair.html','2019-06-17 19:52:52',NULL),
(22197,'Karpet Skandinavia Janne',219120,'Karpet Gaya Skandinavia dengan Desain Monokrom Tak punya banyak biaya untuk mendekorasi rumah? Jangan khawatir, aplikasikan saja karpet! Perkenalkan, aku karpet Skandinavia Janne. Aku memiliki gaya Skandinavia yang cantik dengan motif geometris berwarna monokrom. Aku terbuat dari material polypropylene yang lembut sehingga aku sangat nyaman ketika digunakan. Meskipun aku didominasi warna putih, tapi jangan khawatir, aku mudah dibersihkan, kok!','https://fabelio.com/pub/media/catalog/product/m/a/','https://fabelio.com/ip/karpet-skandinavia-janne.ht','2019-06-17 20:11:17',NULL),
(24497,'Keset Anti Slip Calisto Lines',89000,'Karpet Caline','https://fabelio.com/pub/media/catalog/product/k/a/','https://fabelio.com/ip/karpet-caline.html','2019-06-17 20:08:26',NULL);

/*Table structure for table `vote_comment` */

DROP TABLE IF EXISTS `vote_comment`;

CREATE TABLE `vote_comment` (
  `comment_id` bigint(20) DEFAULT NULL,
  `is_up` bit(1) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `vote_comment` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

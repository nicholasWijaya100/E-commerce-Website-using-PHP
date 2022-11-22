/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.4.22-MariaDB : Database - db_proyek_bwp_2022
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_proyek_bwp_2022` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_proyek_bwp_2022`;

/*Table structure for table `dtrans` */

DROP TABLE IF EXISTS `dtrans`;

CREATE TABLE `dtrans` (
  `dtrans_id` varchar(20) NOT NULL,
  `dtrans_menu_id` varchar(20) NOT NULL,
  `dtrans_quantity` int(5) NOT NULL,
  `dtrans_subtotal` int(10) NOT NULL,
  PRIMARY KEY (`dtrans_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `dtrans` */

/*Table structure for table `htrans` */

DROP TABLE IF EXISTS `htrans`;

CREATE TABLE `htrans` (
  `htrans_id` varchar(20) NOT NULL,
  `htrans_user_id` varchar(20) NOT NULL,
  `htrans_promo_id` varchar(20) NOT NULL,
  `htrans_tanggal_transaksi` date NOT NULL,
  `htrans_total` int(10) NOT NULL,
  `htrans_status` int(1) NOT NULL,
  PRIMARY KEY (`htrans_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `htrans` */

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `kategori_id` varchar(20) NOT NULL,
  `kategori_name` varchar(255) NOT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `kategori` */

insert  into `kategori`(`kategori_id`,`kategori_name`) values 
('KAT001','Aceh'),
('KAT002','Sumtara Utara'),
('KAT003','Jakarta'),
('KAT004','Jawa Barat');

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `menu_id` varchar(20) NOT NULL,
  `menu_kategori_id` varchar(20) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_price` int(10) NOT NULL,
  `menu_stok` int(6) NOT NULL,
  `menu_image` text NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `menu` */

insert  into `menu`(`menu_id`,`menu_kategori_id`,`menu_name`,`menu_price`,`menu_stok`,`menu_image`) values 
('MEN001','KAT001','Masam Keu’eueng',20000,0,''),
('MEN002','KAT002','Lappet Pohul-pohul',10000,0,''),
('MEN003','KAT003','Nasi Goreng Daun Mengkudu',15000,0,''),
('MEN004','KAT004','Tahu Kuningan',5000,0,''),
('MEN005','KAT004','Empal Gentong',10000,0,'');

/*Table structure for table `promo` */

DROP TABLE IF EXISTS `promo`;

CREATE TABLE `promo` (
  `promo_id` varchar(20) NOT NULL,
  `promo_name` varchar(255) NOT NULL,
  `promo_value` int(10) NOT NULL,
  `promo_type` int(1) NOT NULL,
  PRIMARY KEY (`promo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `promo` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` varchar(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `saldo` int(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `users` */

insert  into `users`(`user_id`,`username`,`password`,`saldo`) values 
('CUS001','a','a',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

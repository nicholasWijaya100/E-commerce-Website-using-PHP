CREATE DATABASE IF NOT EXISTS db_proyek_bwp_2022;
USE db_proyek_bwp_2022;

DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `menu`;
DROP TABLE IF EXISTS `dtrans`;
DROP TABLE IF EXISTS `htrans`;
DROP TABLE IF EXISTS `promo`;
DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `users` (
  `user_id` INT(10) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `saldo` INT(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=INNODB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `menu` (
  `menu_id` INT(10) NOT NULL AUTO_INCREMENT,
  `menu_kategori_id` INT(10) NOT NULL,
  `menu_name` VARCHAR(255) NOT NULL,
  `menu_price` INT(10) NOT NULL,
  `menu_stok` INT(6) NOT NULL,
  `menu_image` TEXT NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=INNODB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `dtrans` (
  `dtrans_id` INT(10) NOT NULL AUTO_INCREMENT,
  `dtrans_menu_id` INT(10) NOT NULL,
  `dtrans_quantity` INT(5) NOT NULL,
  `dtrans_subtotal` INT(10) NOT NULL,
  PRIMARY KEY (`dtrans_id`)
) ENGINE=INNODB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `htrans` (
  `htrans_id` INT(10) NOT NULL AUTO_INCREMENT,
  `htrans_user_id` INT(10) NOT NULL,
  `htrans_promo_id` INT(10) NOT NULL,
  `htrans_tanggal_transaksi` DATE NOT NULL,
  `htrans_total` INT(10) NOT NULL,
  `htrans_status` INT(1) NOT NULL,
  PRIMARY KEY (`htrans_id`)
) ENGINE=INNODB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `promo` (
  `promo_id` INT(10) NOT NULL AUTO_INCREMENT,
  `promo_name` VARCHAR(255) NOT NULL,
  `promo_value` INT(10) NOT NULL,
  `promo_type` INT(1) NOT NULL,
  PRIMARY KEY (`promo_id`)
) ENGINE=INNODB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `kategori` (
  `kategori_id` INT(10) NOT NULL AUTO_INCREMENT,
  `kategori_name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=INNODB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;
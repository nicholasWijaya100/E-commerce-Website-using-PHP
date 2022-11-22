CREATE DATABASE IF NOT EXISTS db_proyek_bwp_2022;
USE db_proyek_bwp_2022;

DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `menu`;
DROP TABLE IF EXISTS `dtrans`;
DROP TABLE IF EXISTS `htrans`;

CREATE TABLE `users` (
  `user_id` INT(10) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `saldo` INT(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=INNODB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `menu` (
  `menu_id` INT(10) NOT NULL AUTO_INCREMENT,
  `kategori_id` INT(10) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `price` INT(10) NOT NULL,
  `stok` INT(6) NOT NULL,
  `image` TEXT NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=INNODB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `dtrans` (
  `dtrans_id` INT(10) NOT NULL AUTO_INCREMENT,
  `menu_id` INT(10) NOT NULL,
  `quantity` INT(5) NOT NULL,
  `subtotal` INT(10) NOT NULL,
  PRIMARY KEY (`dtrans_id`)
) ENGINE=INNODB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `htrans` (
  `htrans_id` INT(10) NOT NULL AUTO_INCREMENT,
  `user_id` INT(10) NOT NULL,
  `promo_id` INT(10) NOT NULL,
  `tanggal_transaksi` DATE NOT NULL,
  `total` INT(10) NOT NULL,
  `status` INT(1) NOT NULL,
  PRIMARY KEY (`htrans_id`)
) ENGINE=INNODB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;
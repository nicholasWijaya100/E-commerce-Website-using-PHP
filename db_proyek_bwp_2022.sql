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
  `dtrans_htrans_id` INT(10) NOT NULL,
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

INSERT  INTO `users`(`user_id`,`username`,`password`) VALUES 
(1 ,'Jocelyn','989010'),
(2 ,'Brian','myHair1001'),
(3 ,'Elsa','121212');

INSERT  INTO `kategori`(`kategori_id`,`kategori_name`) VALUES 
(1 ,'Appetizer'),
(2 ,'Main Course'),
(3 ,'Drinks'),
(4 ,'Desert');

INSERT  INTO `menu`(`menu_id`, `menu_kategori_id`,`menu_name`, `menu_price`, `menu_stok`, `menu_image`) VALUES 
(1, 1, 'Ote-Ote', 15000, 12, ''),
(2, 1, 'Batagor', 20000, 34, ''),
(3, 1, 'Lentho', 18000, 17, ''),
(4, 1, 'Lumpia Goreng', 10000, 6, ''),
(5, 1, 'Lumpia Basah', 10000, 10, ''),
(6, 1, 'Martabak Telur', 30000, 32, ''),
(7, 1, 'Serabi', 10000, 20, ''),
(8, 1, 'Pastel', 14000, 123, ''),
(9, 1, 'Risoles', 12000, 56, ''),
(10, 1, 'Tahu Goreng Isi', 12000, 20, ''),
(11, 1, 'Cireng', 11000, 28, ''),
(12, 1, 'Onde-onde', 8000, 78, ''),
(13, 1, 'Pempek', 25000, 11, ''),
(14, 1, 'Lemper', 12000, 35, ''),
(15, 3, 'Mineral Water', 8000, 112, ''),
(16, 3, 'Es Cendol', 18000, 12, ''),
(17, 3, 'Kopi Jahe', 20000, 26, ''),
(18, 3, 'Es Campur Betawi', 26000, 19, ''),
(19, 3, 'Es Teh Manis', 12000, 50, ''),
(20, 3, 'Es Teh Tawar', 12000, 34, ''),
(21, 3, 'Kopi Luwak', 24000, 10, ''),
(22, 3, 'Arak Bali', 20000, 7, ''),
(23, 3, 'Es Kelapa Muda', 24000, 11, ''),
(24, 2, 'Gado-gado', 45000, 13, ''),
(25, 2, 'Rujak Cingur', 40000, 16, ''),
(26, 2, 'Tahu Telur', 43000, 10, ''),
(27, 2, 'Sate Ayam', 48000, 5, ''),
(28, 2, 'Sate Babi', 60000, 20, ''),
(29, 2, 'Sate Kambing', 55000, 17, ''),
(30, 2, 'Nasi Goreng Jawa', 40000, 19, ''),
(31, 2, 'Nasi Goreng Seafood', 42000, 11, ''),
(32, 2, 'Nasi Goreng Merah', 44000, 12, ''),
(33, 2, 'Nasi Kuning Spesial', 50000, 13, ''),
(34, 2, 'Ayam Goreng', 38000, 10, ''),
(35, 2, 'Gurami Goreng', 62000, 16, ''),
(36, 2, 'Gurami Bakar', 60000, 18, ''),
(37, 2, 'Sop Buntut', 40000, 10, ''),
(38, 2, 'Soto Betawi', 42000, 12, ''),
(39, 2, 'Soto Banjar', 46000, 13, ''),
(40, 2, 'Rawon', 43000, 11, ''),
(41, 2, 'Sayur Asem', 33000, 10, ''),
(42, 2, 'Coto Makassar', 46000, 20, ''),
(43, 2, 'Nasi Uduk', 35000, 34, ''),
(44, 2, 'Nasi Campur', 38000, 10, ''),
(45, 2, 'Gudeg', 38000, 16, ''),
(46, 2, 'Mie Goreng Jawa', 33000, 10, ''),
(47, 2, 'Mie Goreng Aceh', 34000, 11, ''),
(48, 4, 'Terang Bulan', 30000, 25, ''),
(49, 4, 'Klepon', 23000, 16, ''),
(50, 4, 'Pisang Goreng', 20000, 11, ''),
(51, 4, 'Kue Lumpur', 24000, 8, ''),
(52, 4, 'Kue Lapis', 25000, 12, ''),
(53, 4, 'Nagasari', 16000, 11, ''),
(54, 4, 'Sagu Melon', 30000, 19, '');






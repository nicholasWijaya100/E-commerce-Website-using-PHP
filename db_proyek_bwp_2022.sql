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
(1, 1, 'Ote-Ote', 15000, 12, 'ote-ote.jpeg'),
(2, 1, 'Batagor', 20000, 34, 'batagor.png'),
(3, 1, 'Lentho', 18000, 17, 'lentho.jpeg'),
(4, 1, 'Lumpia Goreng', 10000, 6, 'lumpia_goreng.jpg'),
(5, 1, 'Lumpia Basah', 10000, 10, 'lumpia_basah.png'),
(6, 1, 'Martabak Telur', 30000, 32, 'martabak_telur.jpg'),
(7, 1, 'Serabi', 10000, 20, 'serabi.webp'),
(8, 1, 'Pastel', 14000, 123, 'pastel.jpeg'),
(9, 1, 'Risoles', 12000, 56, 'risoles.jpeg'),
(10, 1, 'Tahu Goreng Isi', 12000, 20, 'tahu_goreng_isi.jpg'),
(11, 1, 'Cireng', 11000, 28, 'cireng.webp'),
(12, 1, 'Onde-onde', 8000, 78, 'onde_onde.jpg'),
(13, 1, 'Pempek', 25000, 11, 'pempek.jpg'),
(14, 1, 'Lemper', 12000, 35, 'lemper.jpg'),
(15, 3, 'Mineral Water', 8000, 112, 'mineral_water.jpg'),
(16, 3, 'Es Cendol', 18000, 12, 'es_cendol.jpg'),
(17, 3, 'Kopi Jahe', 20000, 26, 'kopi_jahe.jpg'),
(18, 3, 'Es Campur Betawi', 26000, 19, 'es_campur_betawi.jpg'),
(19, 3, 'Es Teh Manis', 12000, 50, 'es_teh_manis.jpg'),
(20, 3, 'Es Teh Tawar', 12000, 34, 'es_teh_manis.jpg'),
(21, 3, 'Kopi Luwak', 24000, 10, 'kopi_luwak.webp'),
(22, 3, 'Arak Bali', 20000, 7, 'arak_bali.jpg'),
(23, 3, 'Es Kelapa Muda', 24000, 11, 'es_kelapa_mudah.jpg'),
(24, 2, 'Gado-gado', 45000, 13, 'gado_gado.webp'),
(25, 2, 'Rujak Cingur', 40000, 16, 'rujak_cingur.jpg'),
(26, 2, 'Tahu Telur', 43000, 10, 'tahu_telur.jpg'),
(27, 2, 'Sate Ayam', 48000, 5, 'sate_ayam.jpg'),
(28, 2, 'Sate Babi', 60000, 20, 'sate_babi.jpg'),
(29, 2, 'Sate Kambing', 55000, 17, 'sate_kambing.jpg'),
(30, 2, 'Nasi Goreng Jawa', 40000, 19, 'nasi_goreng_jawa.jpg'),
(31, 2, 'Nasi Goreng Seafood', 42000, 11, 'nasi_goreng_seafood.jpg'),
(32, 2, 'Nasi Goreng Merah', 44000, 12, 'nasi_goreng_merah.webp'),
(33, 2, 'Nasi Kuning Spesial', 50000, 13, 'nasi_kuning.jpg'),
(34, 2, 'Ayam Goreng', 38000, 10, 'ayam_goreng.jpg'),
(35, 2, 'Gurami Goreng', 62000, 16, 'gurami_goreng.jpg'),
(36, 2, 'Gurami Bakar', 60000, 18, 'gurami_bakar.jpg'),
(37, 2, 'Sop Buntut', 40000, 10, 'sop_buntut.jpg'),
(38, 2, 'Soto Betawi', 42000, 12, 'soto_betawi.jpg'),
(39, 2, 'Soto Banjar', 46000, 13, 'soto_banjar.jpeg'),
(40, 2, 'Rawon', 43000, 11, 'rawon.jpg'),
(41, 2, 'Sayur Asem', 33000, 10, 'sayur_asem.webp'),
(42, 2, 'Coto Makassar', 46000, 20, 'soto_makassar.jpg'),
(43, 2, 'Nasi Uduk', 35000, 34, 'nasi_uduk.jpg'),
(44, 2, 'Nasi Campur', 38000, 10, 'nasi_campur.jpeg'),
(45, 2, 'Gudeg', 38000, 16, 'gudeg.jpeg'),
(46, 2, 'Mie Goreng Jawa', 33000, 10, 'mie_goreng_jawa.png'),
(47, 2, 'Mie Goreng Aceh', 34000, 11, 'mie_goreng_aceh.jpg'),
(48, 4, 'Terang Bulan', 30000, 25, 'terang_bulan.jpg'),
(49, 4, 'Klepon', 23000, 16, 'klepon.jpg'),
(50, 4, 'Pisang Goreng', 20000, 11, 'pisang_goreng.jpeg'),
(51, 4, 'Kue Lumpur', 24000, 8, 'kue_lumpur.webp'),
(52, 4, 'Kue Lapis', 25000, 12, 'kue_lapis.jpg'),
(53, 4, 'Nagasari', 16000, 11, 'nagasari.jpg'),
(54, 4, 'Sagu Melon', 30000, 19, 'sagu_melon.jpg');






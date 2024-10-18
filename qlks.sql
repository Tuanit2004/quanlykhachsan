-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table qlks.chitietdp
CREATE TABLE IF NOT EXISTS `chitietdp` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `datphong_id` bigint unsigned NOT NULL,
  `phong_id` bigint unsigned NOT NULL,
  `sophong` bigint NOT NULL DEFAULT '0',
  `gia` float NOT NULL,
  `chuthich` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table qlks.chitietdp: ~13 rows (approximately)
DELETE FROM `chitietdp`;
INSERT INTO `chitietdp` (`id`, `datphong_id`, `phong_id`, `sophong`, `gia`, `chuthich`, `created_at`, `updated_at`) VALUES
	(1, 1, 15, 2, 0, NULL, NULL, '2020-12-16 05:29:50'),
	(2, 2, 1, 1, 0, NULL, NULL, '2020-12-22 11:43:53'),
	(3, 1, 5, 1, 0, 'Huỷ', NULL, '2020-11-20 12:08:47'),
	(4, 2, 5, 10, 0, '', NULL, '2020-11-20 12:08:47'),
	(6, 11, 21, 1, 9786490, NULL, '2021-01-05 02:49:32', '2021-01-05 02:49:32'),
	(7, 11, 1, 8, 1500000, NULL, '2021-01-05 02:49:32', '2021-01-05 02:49:32'),
	(8, 11, 7, 1, 2500000, NULL, '2021-01-05 02:49:32', '2021-01-05 02:49:32'),
	(12, 14, 7, 1, 2500000, NULL, '2021-01-05 03:10:48', '2021-01-05 03:10:48'),
	(13, 15, 1, 1, 1500000, NULL, '2021-01-05 04:09:58', '2021-01-05 04:09:58'),
	(14, 16, 7, 4, 2500000, NULL, '2021-01-05 04:11:27', '2021-01-05 04:11:27'),
	(15, 17, 2, 3, 3000000, NULL, '2021-01-06 00:23:49', '2021-01-06 00:23:49'),
	(16, 18, 1, 4, 1500000, NULL, '2021-01-06 00:26:36', '2021-01-06 00:26:36'),
	(17, 19, 21, 3, 9786490, NULL, '2021-01-06 00:50:38', '2021-01-06 00:50:38'),
	(18, 20, 2, 1, 3000000, NULL, '2023-12-20 21:09:41', '2023-12-20 21:09:41');

-- Dumping structure for table qlks.datphong
CREATE TABLE IF NOT EXISTS `datphong` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `khachhang_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ngaydat` date DEFAULT NULL,
  `tongsophong` int NOT NULL,
  `tongtien` float NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `chuthich` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table qlks.datphong: ~8 rows (approximately)
DELETE FROM `datphong`;
INSERT INTO `datphong` (`id`, `khachhang_id`, `user_id`, `ngaydat`, `tongsophong`, `tongtien`, `start_date`, `end_date`, `chuthich`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, '2020-11-20', 0, 0, '2020-11-20', '2020-11-25', NULL, NULL, '2020-11-17 05:23:42'),
	(2, 2, 1, '2020-11-20', 0, 0, '2020-11-17', '2020-11-18', NULL, NULL, NULL),
	(14, 19, NULL, '2021-01-05', 1, 2500000, '2021-05-01', '2021-05-01', 'trghggf', '2021-01-05 03:10:48', '2021-01-05 03:10:48'),
	(15, 20, NULL, '2021-01-05', 1, 1500000, '2021-05-01', '2021-05-01', NULL, '2021-01-05 04:09:57', '2021-01-05 04:09:57'),
	(16, 21, NULL, '2021-01-05', 4, 10000000, NULL, NULL, NULL, '2021-01-05 04:11:27', '2021-01-05 04:11:27'),
	(17, 22, NULL, '2021-01-06', 3, 9000000, NULL, NULL, NULL, '2021-01-06 00:23:49', '2021-01-06 00:23:49'),
	(18, 23, NULL, '2021-01-06', 4, 6000000, NULL, NULL, NULL, '2021-01-06 00:26:36', '2021-01-06 00:26:36'),
	(19, 24, NULL, '2021-01-06', 3, 29359500, '2021-06-01', '2021-06-01', '12356', '2021-01-06 00:50:38', '2021-01-06 00:50:38'),
	(20, 25, NULL, '2023-12-21', 1, 3000000, '2023-12-14', '2023-12-22', '0123456789', '2023-12-20 21:09:41', '2023-12-20 21:09:41');

-- Dumping structure for table qlks.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table qlks.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;

-- Dumping structure for table qlks.kh
CREATE TABLE IF NOT EXISTS `kh` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ten_kh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table qlks.kh: ~9 rows (approximately)
DELETE FROM `kh`;
INSERT INTO `kh` (`id`, `ten_kh`, `sdt`, `email`, `diachi`, `created_at`, `updated_at`) VALUES
	(1, 'Nguyen Van ABSFDBVD', '01234567895678656', 'nguyenegdhfmngvana@gmail.comn', '', NULL, '2020-11-17 05:24:02'),
	(2, 'Tran Van BACA', '084564343565', 'bvantran@yahoo.com', '', NULL, '2020-11-20 09:29:35'),
	(4, 'Đỗ Thị Ngọc Ánh', '0123456789', 'anh@gmail.com', '', NULL, '2020-11-20 09:29:35'),
	(19, 'fgfhfjk', '3565u7iukj', 'dfsgh@gmail.com', 'ưeretgrhtyj', '2021-01-05 03:10:48', '2021-01-05 03:10:48'),
	(20, 'Nguyễn Tiến Anh', '123456789', 'ngyentienanh@gmail.com', 'Thái Bình', '2021-01-05 04:09:57', '2021-01-05 04:09:57'),
	(21, 'Trần Thị Nhung', '567686564', 'nhungthi@gmail.com', 'Hà Nội', '2021-01-05 04:11:27', '2021-01-05 04:11:27'),
	(22, 'Nguyễn Hải Long', '0123456789', 'hailong@gmail.com', 'Thái Thuỵ, Thái Bình', '2021-01-06 00:23:49', '2021-01-06 00:23:49'),
	(23, 'Trần Duy', '0378208439', 'tranduy@gmail.com', 'Hà Nội', '2021-01-06 00:26:35', '2021-01-06 00:26:35'),
	(24, 'Nguyễn Tiến Anh', '1234567', 'anhtien@gmail.com', '123467', '2021-01-06 00:50:38', '2021-01-06 00:50:38'),
	(25, 'Nguyễn Tiến Anh', '0123456789', 'romcoca251100@gmail.com', '0123456789', '2023-12-20 21:09:40', '2023-12-20 21:09:40');

-- Dumping structure for table qlks.loaiphong
CREATE TABLE IF NOT EXISTS `loaiphong` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tenloaiphong` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table qlks.loaiphong: ~4 rows (approximately)
DELETE FROM `loaiphong`;
INSERT INTO `loaiphong` (`id`, `tenloaiphong`, `slug`, `user_id`, `created_at`, `updated_at`) VALUES
	(6, 'Phòng V.I.P', 'phong-vip', 1, '2020-11-20 12:00:31', '2020-11-20 12:00:31'),
	(8, 'Phòng Thường', 'phong-thuong', 1, '2020-12-21 04:55:41', '2020-12-21 04:55:41'),
	(9, 'Phòng Luxury', 'phong-luxury', 1, '2020-12-21 04:55:47', '2020-12-21 04:55:47'),
	(10, 'PHÒNG SIÊU vIP', 'phong-sieu-vip', 1, '2021-01-06 00:58:28', '2021-01-06 00:58:28'),
	(11, '1231312', '1231312', 1, '2023-12-20 21:08:29', '2023-12-20 21:08:29');

-- Dumping structure for table qlks.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table qlks.migrations: ~10 rows (approximately)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(9, '2014_10_12_000000_create_users_table', 1),
	(10, '2014_10_12_100000_create_password_resets_table', 1),
	(11, '2019_08_19_000000_create_failed_jobs_table', 1),
	(12, '2020_11_13_212745_role', 1),
	(13, '2020_11_13_212856_loaiphong_table', 1),
	(14, '2020_11_13_212913_phong_table', 1),
	(15, '2020_11_13_212936_datphong_table', 1),
	(16, '2020_11_13_212947_chitietdatphong_table', 2),
	(17, '2020_11_13_213009_khachhang_table', 3),
	(18, '2020_11_20_205230_slide_table', 4);

-- Dumping structure for table qlks.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table qlks.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;

-- Dumping structure for table qlks.phong
CREATE TABLE IF NOT EXISTS `phong` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `loaiphong_id` bigint unsigned NOT NULL,
  `tenphong` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `chuthich` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `hinhanh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `user_id` bigint unsigned NOT NULL,
  `soluong` bigint NOT NULL DEFAULT '0',
  `gia` float NOT NULL,
  `slug` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `booked` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table qlks.phong: ~0 rows (approximately)
DELETE FROM `phong`;
INSERT INTO `phong` (`id`, `loaiphong_id`, `tenphong`, `chuthich`, `hinhanh`, `user_id`, `soluong`, `gia`, `slug`, `booked`, `created_at`, `updated_at`) VALUES
	(1, 9, 'Phòng Deluxe King', 'Với phòng Deluxe King quý khách sẽ được thưởng thức trọn vẹn vẻ ngay trong phòng ngủ của mình.', 'ZXris_nVjFu_duluxe1.jpg', 1, 0, 1500000, 'phong-deluxe-king', 4, NULL, '2021-01-06 00:51:31'),
	(2, 9, 'Phòng Deluxe Twin', 'Phòng Deluxe sẽ giúp quý khách quên đi sự mệt mỏi của cuộc sống vội vã ngoài kia.', 'Ae1lZ_XOm2L_1.jpg', 1, 9, 3000000, 'phong-deluxe-twin', 1, NULL, '2023-12-20 21:09:41'),
	(5, 6, 'Phòng Grand Suite', 'Phòng Grand Suite với sofa thư giãn, bồn tắm sụcvà một phòng ngủ giường đôi, sang trọng.', 'N5BCR_lf1fM_suites2.png', 1, 10, 1200000, 'phong-grand-suite', 0, '2020-11-20 11:30:26', '2021-01-06 00:16:30'),
	(7, 8, 'Phòng Superior Twin', 'Cảm nhận sự thư giãn và thoải mái với phòng Superior Twin với phong cách trang trí đương đại độc đáo', 'bedna_xDgpz_twin.jpg', 1, 5, 2500000, 'phong-superior-twin', 0, '2020-11-20 12:47:31', '2021-01-06 00:17:52'),
	(10, 6, 'Phòng 12 [V.I.P]', 'Phòng Grand Suite với sofa thư giãn, bồn tắm sụcvà một phòng ngủ giường đôi, sang trọng.', 'dVT5L_EXFFL_1.jpg', 1, 12, 4500000, 'phong-12-[v.i.p]', 0, '2020-11-20 13:12:50', '2021-01-06 00:16:55'),
	(20, 8, 'Phòng Superior Triple', 'Là sự lựa chọn tốt nhất cho chuyến du lịch với đồng nghiệp, bạn bè hoặc gia đình', 'e8lv1_kEa9z_triple.jpg', 1, 10, 1500000, 'phong-superior-triple', 0, '2020-12-22 11:45:11', '2021-01-06 00:18:54'),
	(21, 9, 'Phòng Premium Deluxe King', 'Với phòng Premium Deluxe King quý khách sẽ được thưởng thức trọn vẹn vẻ đẹp ấn tượng của thành phố .', 'cq6py_cmgmc_1.jpg', 1, 8, 9786490, 'phong-premium-deluxe-king', 3, '2020-12-22 11:45:47', '2021-01-06 00:50:38'),
	(22, 8, 'Phòng Apartment', 'Phòng căn hộ sang trọng và rộng rãi có 2 tầng trong đó có 3 phòng ngủ giường to.', 'YqaTJ_FQdzG_triple2.jpg', 1, 5, 900000, 'phong-apartment', 0, '2021-01-01 11:52:12', '2021-01-06 00:19:41'),
	(23, 8, 'Phòng Thường 123', NULL, 'SnXnn_wxCsm_1.jpg', 1, 12, 1234570, 'phong-thuong-123', 0, '2021-01-06 00:46:20', '2021-01-06 00:46:20'),
	(24, 6, '123123123123123', '11', '', 1, 1, 1, '123123123123123', 0, '2023-12-20 21:08:40', '2023-12-20 21:08:40');

-- Dumping structure for table qlks.role
CREATE TABLE IF NOT EXISTS `role` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table qlks.role: ~0 rows (approximately)
DELETE FROM `role`;
INSERT INTO `role` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', NULL, NULL),
	(2, 'Quản lý', NULL, NULL),
	(3, 'Nhân viên', NULL, NULL);

-- Dumping structure for table qlks.slide
CREATE TABLE IF NOT EXISTS `slide` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tieude` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table qlks.slide: ~0 rows (approximately)
DELETE FROM `slide`;
INSERT INTO `slide` (`id`, `ten`, `hinh`, `tieude`, `noidung`, `link`, `created_at`, `updated_at`) VALUES
	(6, 'Slide 1', 'KJRxP_y3XWp_1.jpg', 'Slide 1', 'Slide 1', 'http://google.com', '2020-12-30 03:33:55', '2020-12-30 03:33:55');

-- Dumping structure for table qlks.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_nv` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint unsigned NOT NULL,
  `gioitinh` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sdt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ngaysinh` date DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table qlks.users: ~0 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `ma_nv`, `role_id`, `gioitinh`, `sdt`, `ngaysinh`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin', NULL, '$2y$10$3OorqLBSppE2qbiM7i3cq.XcsltfEaVGNESnU11VEPL8v9.zXzi9K', NULL, 1, 'Nam', '037 830 8838', '2000-12-20', NULL, NULL, '2020-11-21 04:43:59'),
	(2, 'admin2', 'admin2', NULL, '$2y$10$3OorqLBSppE2qbiM7i3cq.XcsltfEaVGNESnU11VEPL8v9.zXzi9K', NULL, 2, '', '', NULL, NULL, NULL, NULL),
	(3, 'Nguyễn Tiến Anh', 'romcoca251100@gmail.com', NULL, '$2y$10$FyoBwIpummy3vJ86OGwOuO/Kh5jSdJuWJRjKgKrUB1DgYd4xNLmFi', 'NV1', 2, '', '', NULL, NULL, '2020-11-20 14:50:57', '2020-11-20 14:50:57'),
	(7, 'Đỗ Thị Ngọc Ánh', 'ngocanh@gmail.com', NULL, '$2y$10$dNDd2iD3e0mflDKej5Hs/.cQh.hWjE2/OiiaKCfxJS3At3fZiHriy', 'NV4', 2, NULL, NULL, NULL, NULL, '2020-12-13 06:59:10', '2020-12-13 06:59:10'),
	(8, 'Trịnh Thị Lan Anh', 'lanhanh@gmail.com', NULL, '$2y$10$qv8baZoahms/bSFuwswsV.S09JJRoP.f8zaulaus/vw5YOmerdzNi', 'NV5', 2, NULL, NULL, NULL, NULL, '2020-12-13 07:03:12', '2020-12-13 07:03:12'),
	(9, 'Tran Nhat Long', 'nhatlong@gmail.com', NULL, '$2y$10$cq7xujjDEbbDf5mR4JBMOuW92h8Ki5n4b/fkW0s0y38MHZ5R/F9TO', 'NV6', 2, NULL, NULL, NULL, NULL, '2020-12-13 07:23:18', '2020-12-13 07:23:18'),
	(11, 'do ngoc anh', 'ngocanh123@gmail.com', NULL, '$2y$10$wQxtRoCVPEl2F5L/wS0H4.jDC8baPRS.Zf1Jilzuf/EvG46rvSGdS', 'nv19', 2, NULL, NULL, NULL, NULL, '2021-01-06 00:55:31', '2021-01-06 00:55:31');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

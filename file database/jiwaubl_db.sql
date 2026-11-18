
-- ============================================================
-- DATABASE: jiwaubl_db
-- Original SQL Dump: phpMyAdmin 5.2.0
-- MariaDB 10.4.27
-- Perbaikan: Database selection dan VIEW syntax
-- Seluruh data asli dipertahankan
-- ============================================================

CREATE DATABASE IF NOT EXISTS `jiwaubl_db`
DEFAULT CHARACTER SET utf8mb4
COLLATE utf8mb4_general_ci;

USE `jiwaubl_db`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

START TRANSACTION;

SET NAMES utf8mb4;

-- ============================================================
-- TABLE: bidang_tb
-- ============================================================

CREATE TABLE `bidang_tb` (
    `idbidang` int(3) NOT NULL,
    `namabidang` varchar(100) NOT NULL,
    `statusbidang` enum('T','F') NOT NULL DEFAULT 'T'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `bidang_tb`
(`idbidang`, `namabidang`, `statusbidang`) VALUES
(1, 'Kemandirian Pangan', 'T'),
(2, 'Energi dan Sumber Daya Alam', 'T'),
(3, 'Kesehatan dan Farmasi', 'T'),
(4, 'Transportasi', 'T'),
(5, 'Informasi dan Komunikasi', 'T'),
(6, 'Pertahanan dan Keamanan', 'T'),
(7, 'Kemaritiman', 'T'),
(8, 'Penanggulangan Kebencanaan', 'T'),
(9, 'Sosial Humaniora', 'T'),
(10, 'Seni Budaya', 'T'),
(11, 'Pendidikan', 'T'),
(12, 'Ekonomi dan Bisnis', 'T'),
(13, 'Material Maju', 'T'),
(14, 'Pariwisata dan Ekonomi Kreatif', 'T'),
(15, 'Pengembangan Infrastruktur', 'T'),
(16, 'Perdagangan', 'T'),
(17, 'Industri Manufaktur', 'T'),
(18, 'Tekstil', 'T');

-- ============================================================
-- TABLE: failed_jobs
-- ============================================================

CREATE TABLE `failed_jobs` (
    `uuid` varchar(255) NOT NULL,
    `connection` text NOT NULL,
    `queue` text NOT NULL,
    `payload` longtext NOT NULL,
    `exception` longtext NOT NULL,
    `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- TABLE: inovasi_tb
-- ============================================================

CREATE TABLE `inovasi_tb` (
    `id_inovasi` int(4) NOT NULL,
    `judul` varchar(100) NOT NULL,
    `bidang` int(2) NOT NULL,
    `deskripsi_produk` text NOT NULL,
    `harga_produk` varchar(11) NOT NULL,
    `unggah_dokumen` varchar(100) NOT NULL,
    `jenis_inovasi` enum('produk','jasa') NOT NULL,
    `status_inovasi` enum('0','1','2','3') NOT NULL DEFAULT '0'
        COMMENT '0=menunggu konfirmasi,1=publish,2=perbaikan,3=ditolak',
    `catatan` text DEFAULT NULL,
    `created_by` int(3) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `inovasi_tb`
(
    `id_inovasi`,
    `judul`,
    `bidang`,
    `deskripsi_produk`,
    `harga_produk`,
    `unggah_dokumen`,
    `jenis_inovasi`,
    `status_inovasi`,
    `catatan`,
    `created_by`,
    `created_at`,
    `updated_at`
) VALUES
(1, 'Tes judul inovasi 1', 5, 'Tes deskripsi inovasi', '20000000', '846715030.jpg', 'produk', '0', NULL, 1, '2023-05-15 04:28:15', NULL),
(2, 'Tes judul 2', 16, 'Tes deksripsi 2', '1200000', '1572206922.png', 'produk', '0', NULL, 1, '2023-05-15 03:10:53', NULL),
(3, 'Tes judul 3', 7, 'Tes deskripsi produk 3', '8900000', '561431608.png', 'produk', '0', NULL, 1, '2023-05-15 03:16:22', NULL),
(4, 'Tes judul 4', 4, 'Tes deskripsi produk 4', '9800000', '775146152.png', 'produk', '0', NULL, 1, '2023-05-15 03:18:02', NULL),
(5, 'Tes inovasi 5', 9, 'Tes deskripsi produk 5', '30000000', '667089465.PNG', 'produk', '0', NULL, 1, '2023-05-15 04:27:01', NULL),
(6, 'COBA', 5, 'JAJAL', '300000', '618137087.jpg', 'produk', '1', NULL, 1, '2023-05-15 04:39:04', NULL);

-- ============================================================
-- TABLE: migrations
-- ============================================================

CREATE TABLE `migrations` (
    `id` int(10) UNSIGNED NOT NULL,
    `migration` varchar(255) NOT NULL,
    `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations`
(`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_000000_create_password_resets_table', 1);

-- ============================================================
-- TABLE: password_resets
-- ============================================================

CREATE TABLE `password_resets` (
    `email` varchar(255) NOT NULL,
    `token` varchar(255) NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- TABLE: users
-- ============================================================

CREATE TABLE `users` (
    `id` int(10) UNSIGNED NOT NULL,
    `name` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `email_verified_at` timestamp NULL DEFAULT NULL,
    `password` varchar(255) NOT NULL,
    `pasfoto` varchar(250) NOT NULL,
    `isAdmin` tinyint(1) NOT NULL,
    `roles` int(4) NOT NULL,
    `remember_token` varchar(100) DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users`
(
    `id`,
    `name`,
    `email`,
    `email_verified_at`,
    `password`,
    `pasfoto`,
    `isAdmin`,
    `roles`,
    `remember_token`,
    `created_at`,
    `updated_at`
) VALUES
(
    1,
    'Super Admin',
    'admin@gmail.com',
    NULL,
    '$2y$10$Lu0sCvUXnGTrS.8vz75jaunbwLgGbANZhzqB9xIYBy/l43xW6eQTC',
    '943279085.png',
    1,
    0,
    NULL,
    NULL,
    NULL
);

-- ============================================================
-- PRIMARY KEY DAN INDEX
-- ============================================================

ALTER TABLE `bidang_tb`
    ADD PRIMARY KEY (`idbidang`);

ALTER TABLE `inovasi_tb`
    ADD PRIMARY KEY (`id_inovasi`);

ALTER TABLE `migrations`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `password_resets`
    ADD PRIMARY KEY (`email`);

ALTER TABLE `users`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `users_email_unique` (`email`);

-- ============================================================
-- AUTO INCREMENT
-- ============================================================

ALTER TABLE `bidang_tb`
    MODIFY `idbidang` int(3) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT=19;

ALTER TABLE `inovasi_tb`
    MODIFY `id_inovasi` int(4) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT=7;

ALTER TABLE `migrations`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT=3;

ALTER TABLE `users`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT=2;

-- ============================================================
-- VIEW: v_inovasi
-- Perbaikan ORDER BY dan DEFINER
-- ============================================================

CREATE ALGORITHM=UNDEFINED
SQL SECURITY DEFINER
VIEW `v_inovasi` AS

SELECT
    `inovasi_tb`.`id_inovasi` AS `id_inovasi`,
    `inovasi_tb`.`judul` AS `judul`,
    `inovasi_tb`.`deskripsi_produk` AS `deskripsi_produk`,
    `inovasi_tb`.`harga_produk` AS `harga_produk`,
    `inovasi_tb`.`unggah_dokumen` AS `unggah_dokumen`,
    `inovasi_tb`.`jenis_inovasi` AS `jenis_inovasi`,
    `inovasi_tb`.`status_inovasi` AS `status_inovasi`,
    `inovasi_tb`.`catatan` AS `catatan`,
    `inovasi_tb`.`created_at` AS `created_at`,
    `inovasi_tb`.`updated_at` AS `updated_at`,
    `bidang_tb`.`idbidang` AS `idbidang`,
    `bidang_tb`.`namabidang` AS `namabidang`,
    `bidang_tb`.`statusbidang` AS `statusbidang`,
    `users`.`id` AS `id`,
    `users`.`name` AS `name`

FROM `inovasi_tb`

INNER JOIN `bidang_tb`
    ON `bidang_tb`.`idbidang` = `inovasi_tb`.`bidang`

INNER JOIN `users`
    ON `users`.`id` = `inovasi_tb`.`created_by`

WHERE `bidang_tb`.`statusbidang` = 'T'

ORDER BY `inovasi_tb`.`id_inovasi` DESC;

COMMIT;

-- ============================================================
-- VERIFIKASI DATA
-- ============================================================

SELECT COUNT(*) AS total_bidang FROM `bidang_tb`;

SELECT COUNT(*) AS total_inovasi FROM `inovasi_tb`;

SELECT COUNT(*) AS total_users FROM `users`;

SELECT COUNT(*) AS total_migrations FROM `migrations`;

SELECT * FROM `v_inovasi`;

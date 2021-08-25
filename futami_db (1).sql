-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2021 at 11:46 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `futami_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `iots`
--

CREATE TABLE `iots` (
  `id` int(10) UNSIGNED NOT NULL,
  `sensor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `channel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `iots`
--

INSERT INTO `iots` (`id`, `sensor`, `channel`, `value`, `created_at`, `updated_at`) VALUES
(5, 'mixing', '1', 2500, '2020-09-23 19:08:55', '2020-09-23 19:08:55'),
(6, 'mixing', '1', 1233, '2020-09-23 19:16:09', '2020-09-23 19:16:09'),
(7, 'mixing', '1', 1233, '2020-09-23 19:18:58', '2020-09-23 19:18:58'),
(8, 'mixing', '1', 2323, '2020-09-23 23:19:02', '2020-09-23 23:19:02'),
(9, 'mixing', '1', 2323, '2020-09-23 23:19:46', '2020-09-23 23:19:46'),
(10, 'mixing', '1', 2323, '2020-09-23 23:20:20', '2020-09-23 23:20:20'),
(11, 'MIXING', '1', 207, '2020-09-24 00:13:29', '2020-09-24 00:13:29'),
(12, 'mixing', '1', 1233, '2021-07-27 20:12:20', '2021-07-27 20:12:20'),
(13, 'mixing', '1', 321321, '2021-07-27 20:12:50', '2021-07-27 20:12:50');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_09_16_122354_create_products_table', 2),
(6, '2020_09_17_080826_create_iots_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_departement`
--

CREATE TABLE `tbl_departement` (
  `id` int(100) NOT NULL,
  `departemen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_departement`
--

INSERT INTO `tbl_departement` (`id`, `departemen`) VALUES
(3, 'ENGINEERING'),
(2, 'IT'),
(1, 'PRODUKSI'),
(4, 'QC'),
(5, 'WAREHOUSE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_downtime`
--

CREATE TABLE `tbl_downtime` (
  `id` int(11) NOT NULL,
  `id_produksi` int(100) NOT NULL,
  `id_jenis_downtime` int(11) NOT NULL,
  `id_unit_downtime` int(11) NOT NULL,
  `root_cause` text NOT NULL,
  `mulai_downtime` datetime NOT NULL,
  `selesai_downtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_downtime`
--

INSERT INTO `tbl_downtime` (`id`, `id_produksi`, `id_jenis_downtime`, `id_unit_downtime`, `root_cause`, `mulai_downtime`, `selesai_downtime`) VALUES
(1, 1, 2, 1, 'BOTOL JATUH, WL, B BAFFER CT PENUH,LLL', '2021-08-14 06:00:00', '2021-08-14 06:28:00'),
(2, 1, 2, 1, 'LLL, BUFFER CT PENUH, TROBLE MESIN LABEL\r\n', '2021-08-14 07:00:00', '2021-08-14 07:38:00'),
(3, 1, 2, 1, 'LLL, BUFFER CT PENUH, TROBLE MESIN LABEL, BOTOL TELAT\r\n', '2021-08-14 08:00:00', '2021-08-14 08:39:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_downtime`
--

CREATE TABLE `tbl_jenis_downtime` (
  `id` int(100) NOT NULL,
  `nama_jenis_downtime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenis_downtime`
--

INSERT INTO `tbl_jenis_downtime` (`id`, `nama_jenis_downtime`) VALUES
(2, 'FILLING'),
(1, 'PREPARATION');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_start_up_utility`
--

CREATE TABLE `tbl_start_up_utility` (
  `id` int(100) NOT NULL,
  `id_produksi` int(100) NOT NULL,
  `mulai` datetime NOT NULL,
  `selesai` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_start_up_utility`
--

INSERT INTO `tbl_start_up_utility` (`id`, `id_produksi`, `mulai`, `selesai`) VALUES
(1, 1, '2021-08-13 19:00:00', '2021-08-14 12:48:00'),
(2, 1, '2021-08-14 19:40:00', '2021-08-15 02:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_test`
--

CREATE TABLE `tbl_test` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unit_downtime`
--

CREATE TABLE `tbl_unit_downtime` (
  `id` int(100) NOT NULL,
  `nama_unit_downtime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_unit_downtime`
--

INSERT INTO `tbl_unit_downtime` (`id`, `nama_unit_downtime`) VALUES
(3, 'ELECTRIC'),
(6, 'HCI'),
(5, 'LAINNYA'),
(2, 'MEKANIK'),
(1, 'PRODUKSI'),
(4, 'UTILITY');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_varian`
--

CREATE TABLE `tbl_varian` (
  `id` int(100) NOT NULL,
  `id_customer` int(100) NOT NULL,
  `nama_variant` varchar(100) NOT NULL,
  `kode_variant` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_varian`
--

INSERT INTO `tbl_varian` (`id`, `id_customer`, `nama_variant`, `kode_variant`) VALUES
(1, 1, 'YUZU GREANT EA', 'YGT'),
(2, 1, 'YUZU ISOTONIC', 'YIS'),
(3, 1, 'YUZU TEA ORIGINAL', 'YTO');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_departemen` int(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `id_departemen`, `created_at`, `updated_at`) VALUES
(1, 'dimas', 'dimas', 'dimas@dimas.com', NULL, '$2y$10$wCoppiRO6Kkc4Vihmtc9P.b6S0s..SlLWD66ckqNu73piXBoDV6Ou', 'DKFmu6bQETzccvj9grGFacNpoGNRleaVio15Aw3u', 0, NULL, NULL),
(2, 'jhonny', 'jhonny', NULL, NULL, '$2y$10$gKsyfGNc5xjDjl01qDNEXO1Q0GC17uIFXpKaTxC5MvmGWdlGdxEXO', 'o0WOudm0N6emh7808UFHiOv0IUrB9ZlvcYuFJgzu', 3, NULL, NULL),
(3, 'agung', 'agung', NULL, NULL, '$2y$10$Q4oGHJJS4aUkXOqU2KyxNeyQLTE26JzMpWknAyi3iMQTGsJJq0TRy', 'o0WOudm0N6emh7808UFHiOv0IUrB9ZlvcYuFJgzu', 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iots`
--
ALTER TABLE `iots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tbl_departement`
--
ALTER TABLE `tbl_departement`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departemen` (`departemen`);

--
-- Indexes for table `tbl_downtime`
--
ALTER TABLE `tbl_downtime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jenis_downtime`
--
ALTER TABLE `tbl_jenis_downtime`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_jenis_downtime` (`nama_jenis_downtime`);

--
-- Indexes for table `tbl_start_up_utility`
--
ALTER TABLE `tbl_start_up_utility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_test`
--
ALTER TABLE `tbl_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_unit_downtime`
--
ALTER TABLE `tbl_unit_downtime`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_unit_downtime` (`nama_unit_downtime`);

--
-- Indexes for table `tbl_varian`
--
ALTER TABLE `tbl_varian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_variant` (`kode_variant`),
  ADD UNIQUE KEY `nama_variant` (`nama_variant`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `iots`
--
ALTER TABLE `iots`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_departement`
--
ALTER TABLE `tbl_departement`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_downtime`
--
ALTER TABLE `tbl_downtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_jenis_downtime`
--
ALTER TABLE `tbl_jenis_downtime`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_start_up_utility`
--
ALTER TABLE `tbl_start_up_utility`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_test`
--
ALTER TABLE `tbl_test`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_unit_downtime`
--
ALTER TABLE `tbl_unit_downtime`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_varian`
--
ALTER TABLE `tbl_varian`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

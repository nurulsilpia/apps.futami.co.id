-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Nov 2021 pada 06.07
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

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
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `iots`
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
-- Dumping data untuk tabel `iots`
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_08_24_144527_create_quantity_productions_table', 2),
(7, '2020_09_16_122354_create_products_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_departement`
--

CREATE TABLE `tbl_departement` (
  `id` int(100) NOT NULL,
  `departemen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_departement`
--

INSERT INTO `tbl_departement` (`id`, `departemen`) VALUES
(3, 'ENGINEERING'),
(2, 'IT'),
(1, 'PRODUKSI'),
(4, 'QC'),
(5, 'WAREHOUSE');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_downtime`
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
-- Dumping data untuk tabel `tbl_downtime`
--

INSERT INTO `tbl_downtime` (`id`, `id_produksi`, `id_jenis_downtime`, `id_unit_downtime`, `root_cause`, `mulai_downtime`, `selesai_downtime`) VALUES
(1, 1, 2, 1, 'BOTOL JATUH, WL, B BAFFER CT PENUH,LLL', '2021-08-14 06:00:00', '2021-08-14 06:28:00'),
(2, 1, 2, 1, 'LLL, BUFFER CT PENUH, TROBLE MESIN LABEL\r\n', '2021-08-14 07:00:00', '2021-08-14 07:38:00'),
(3, 3, 1, 4, 'LLL, BUFFER CT PENUH, TROBLE MESIN LABEL, BOTOL TELAT', '2021-09-23 10:03:00', '2021-09-23 10:09:00'),
(8, 3, 1, 6, 'BOTOL TIKUSRUK', '2021-09-23 10:57:00', '2021-09-23 10:00:00'),
(10, 4, 2, 3, 'BOTOL TIJULIMPAK', '2021-09-23 12:03:00', '2021-09-23 12:03:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_filling_perfomance`
--

CREATE TABLE `tbl_filling_perfomance` (
  `id_filling_perfomance` int(100) NOT NULL,
  `id_product` int(100) NOT NULL,
  `no_batch` varchar(100) NOT NULL,
  `start_filling` datetime NOT NULL,
  `stop_filling` datetime NOT NULL,
  `counter_filling` int(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_filling_perfomance`
--

INSERT INTO `tbl_filling_perfomance` (`id_filling_perfomance`, `id_product`, `no_batch`, `start_filling`, `stop_filling`, `counter_filling`, `created_at`, `updated_at`) VALUES
(1, 1, '2', '2021-09-23 09:42:00', '2021-09-23 15:48:00', 834, NULL, NULL),
(2, 2, '3', '2021-09-07 09:08:00', '2021-09-07 09:14:00', 456, NULL, NULL),
(3, 2, '1', '2021-09-27 07:51:00', '2021-09-27 13:57:00', 1321, NULL, NULL),
(4, 3, '3', '2021-09-07 08:57:02', '2021-09-08 18:57:02', 789, NULL, NULL),
(5, 4, '3', '2021-10-11 10:09:00', '2021-10-11 13:09:00', 319, NULL, NULL),
(6, 4, '2', '2021-11-14 14:57:00', '2021-11-14 23:57:00', 987, NULL, NULL),
(7, 3, '3', '2021-11-14 18:59:00', '2021-11-15 14:59:00', 999, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jenis_downtime`
--

CREATE TABLE `tbl_jenis_downtime` (
  `id` int(100) NOT NULL,
  `nama_jenis_downtime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jenis_downtime`
--

INSERT INTO `tbl_jenis_downtime` (`id`, `nama_jenis_downtime`) VALUES
(1, 'FILLING'),
(2, 'PREPARATION');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_po_produksi`
--

CREATE TABLE `tbl_po_produksi` (
  `id` int(11) NOT NULL,
  `id_varian` int(100) NOT NULL,
  `jumlah_po` int(100) NOT NULL,
  `status_po` varchar(100) NOT NULL,
  `standar_bph` varchar(100) NOT NULL,
  `note` text NOT NULL,
  `mulai_produksi` datetime NOT NULL,
  `selesai_produksi` datetime NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_po_produksi`
--

INSERT INTO `tbl_po_produksi` (`id`, `id_varian`, `jumlah_po`, `status_po`, `standar_bph`, `note`, `mulai_produksi`, `selesai_produksi`, `tanggal_dibuat`) VALUES
(1, 1, 123, 'PRODUKSI', '22800', 'test input data', '2021-09-22 16:36:00', '2021-09-23 16:36:00', '2021-09-23 04:10:23'),
(2, 2, 321, 'TRIAL', '22800', 'ini catatan', '2021-09-23 12:30:00', '2021-09-25 09:31:00', '2021-09-23 04:10:23'),
(3, 3, 31, 'PRODUKSI', '22800', 'ini catatan', '2021-09-23 13:34:00', '2021-09-25 09:34:00', '2021-09-23 04:10:23'),
(4, 4, 567, 'PRODUKSI', '22800', 'ini catatan', '2021-09-23 10:35:00', '2021-09-30 09:35:00', '2021-09-23 04:10:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_quantity_production`
--

CREATE TABLE `tbl_quantity_production` (
  `id_quantity_production` int(100) NOT NULL,
  `id_product` int(225) NOT NULL,
  `reject_defect` int(225) NOT NULL,
  `sample` int(225) NOT NULL,
  `reject_defect_hci` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_quantity_production`
--

INSERT INTO `tbl_quantity_production` (`id_quantity_production`, `id_product`, `reject_defect`, `sample`, `reject_defect_hci`) VALUES
(1, 1, 2, 3, 90),
(2, 2, 4, 5, 16),
(11, 1, 9, 8, 17),
(12, 3, 10, 8, 7),
(13, 1, 9, 8, 7),
(14, 4, 12, 11, 10),
(19, 1, 1, 2, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_quantity_release_qc`
--

CREATE TABLE `tbl_quantity_release_qc` (
  `id_quantity_release_qc` int(100) NOT NULL,
  `id_product` int(225) NOT NULL,
  `reject_defect_inspeksi` int(225) NOT NULL,
  `reject_defect_inspeksi_hci` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_quantity_release_qc`
--

INSERT INTO `tbl_quantity_release_qc` (`id_quantity_release_qc`, `id_product`, `reject_defect_inspeksi`, `reject_defect_inspeksi_hci`) VALUES
(12, 2, 339, 448),
(14, 1, 222, 333),
(15, 4, 87, 78),
(16, 1, 22, 33),
(17, 4, 33, 44),
(19, 1, 11, 22),
(20, 1, 11, 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_start_up_utility`
--

CREATE TABLE `tbl_start_up_utility` (
  `id` int(100) NOT NULL,
  `id_produksi` int(100) NOT NULL,
  `mulai` datetime NOT NULL,
  `selesai` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_start_up_utility`
--

INSERT INTO `tbl_start_up_utility` (`id`, `id_produksi`, `mulai`, `selesai`) VALUES
(1, 1, '2021-08-13 19:00:00', '2021-08-14 12:48:00'),
(2, 1, '2021-08-14 19:40:00', '2021-08-15 02:15:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_test`
--

CREATE TABLE `tbl_test` (
  `id` int(100) NOT NULL,
  `name` varchar(225) NOT NULL,
  `alamat` text NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_test`
--

INSERT INTO `tbl_test` (`id`, `name`, `alamat`, `updated_at`, `created_at`) VALUES
(2, 'Silpieu', 'Pluto', '2021-08-24 18:58:13', NULL),
(6, 'Zeus', 'Olympus', '2021-08-25 19:04:31', '2021-08-25 19:04:31'),
(7, 'Aprodhite', 'Mount Olympus', '2021-09-17 01:13:39', '2021-09-17 01:12:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_time_reparation`
--

CREATE TABLE `tbl_time_reparation` (
  `id_time_reparation` int(100) NOT NULL,
  `id_product` int(225) NOT NULL,
  `start` datetime NOT NULL,
  `stop` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_time_reparation`
--

INSERT INTO `tbl_time_reparation` (`id_time_reparation`, `id_product`, `start`, `stop`) VALUES
(1, 1, '2021-09-07 09:15:00', '2021-09-07 09:00:00'),
(2, 2, '2021-09-07 09:09:00', '2021-09-07 09:15:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_unit_downtime`
--

CREATE TABLE `tbl_unit_downtime` (
  `id` int(100) NOT NULL,
  `nama_unit_downtime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_unit_downtime`
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
-- Struktur dari tabel `tbl_varian`
--

CREATE TABLE `tbl_varian` (
  `id` int(100) NOT NULL,
  `id_customer` int(100) NOT NULL,
  `nama_variant` varchar(100) NOT NULL,
  `kode_variant` varchar(100) NOT NULL,
  `ukuran` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_varian`
--

INSERT INTO `tbl_varian` (`id`, `id_customer`, `nama_variant`, `kode_variant`, `ukuran`) VALUES
(1, 1, 'YUZU GREANT EA', 'YGT', 0),
(2, 1, 'YUZU ISOTONIC', 'YIS', 0),
(3, 1, 'YUZU TEA ORIGINAL', 'YTO', 0),
(4, 2, 'Yuzu Orange', 'YO', 500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `username`) VALUES
(1, 'piarus', 'piarus@gmail.com', NULL, '$2y$10$8TeCThYt7Y1Z/Lf4PgkEGeYJaDN6Fv9X9xJhbintpDAy/ucdQN3ea', 'orykvlbfE2Grvq8LGrLe3sBbITdppHVpLf1kezKu', NULL, NULL, 'piarus'),
(2, 'user', 'user@gmail.com', NULL, '$2y$10$HCGar77jNR5VAuYBBkSobOMUX.g7ntNa0Cndmy3qNtAphfJxoAbAK', 'ecZfQVRFMPvaim6XcUnCPFz6UyILq8VUGpW10LQT', NULL, NULL, 'user'),
(3, 'manger', 'manager@yahoo.com', NULL, '$2y$10$I2S66UALc9MTMpQChE86tOfGBMYN5tgvR.HHiXHci2rfEM1ixL2ka', 'ebfhQaU7sXfTmjRA7TQuNLnfNzr6KwNS0aSA921P', NULL, NULL, 'manger'),
(4, 'Hades', 'hades@gmail.com', NULL, '$2y$10$sp108voEdbMUbSzSZgk9zOaql6K4OcBBO2FU3pRqj6uLesqOvysge', '5iGrSCLiYPKv7l2JBl334abN37ygy3iBnGY0WEHY', NULL, NULL, 'Hades'),
(5, 'admin', 'admin@gmail.com', NULL, '$2y$10$WJdSD36hFlKO2NyKYZxNmOCl.mHW2oSjD4Hwx6gkrKsJhNHb82yoS', '5iGrSCLiYPKv7l2JBl334abN37ygy3iBnGY0WEHY', NULL, NULL, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `iots`
--
ALTER TABLE `iots`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_departement`
--
ALTER TABLE `tbl_departement`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departemen` (`departemen`);

--
-- Indeks untuk tabel `tbl_downtime`
--
ALTER TABLE `tbl_downtime`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_filling_perfomance`
--
ALTER TABLE `tbl_filling_perfomance`
  ADD PRIMARY KEY (`id_filling_perfomance`);

--
-- Indeks untuk tabel `tbl_jenis_downtime`
--
ALTER TABLE `tbl_jenis_downtime`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_jenis_downtime` (`nama_jenis_downtime`);

--
-- Indeks untuk tabel `tbl_po_produksi`
--
ALTER TABLE `tbl_po_produksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_quantity_production`
--
ALTER TABLE `tbl_quantity_production`
  ADD PRIMARY KEY (`id_quantity_production`);

--
-- Indeks untuk tabel `tbl_quantity_release_qc`
--
ALTER TABLE `tbl_quantity_release_qc`
  ADD PRIMARY KEY (`id_quantity_release_qc`);

--
-- Indeks untuk tabel `tbl_start_up_utility`
--
ALTER TABLE `tbl_start_up_utility`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_test`
--
ALTER TABLE `tbl_test`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_time_reparation`
--
ALTER TABLE `tbl_time_reparation`
  ADD PRIMARY KEY (`id_time_reparation`);

--
-- Indeks untuk tabel `tbl_unit_downtime`
--
ALTER TABLE `tbl_unit_downtime`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_unit_downtime` (`nama_unit_downtime`);

--
-- Indeks untuk tabel `tbl_varian`
--
ALTER TABLE `tbl_varian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_variant` (`kode_variant`),
  ADD UNIQUE KEY `nama_variant` (`nama_variant`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `iots`
--
ALTER TABLE `iots`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_departement`
--
ALTER TABLE `tbl_departement`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_downtime`
--
ALTER TABLE `tbl_downtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_filling_perfomance`
--
ALTER TABLE `tbl_filling_perfomance`
  MODIFY `id_filling_perfomance` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_jenis_downtime`
--
ALTER TABLE `tbl_jenis_downtime`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_po_produksi`
--
ALTER TABLE `tbl_po_produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_quantity_production`
--
ALTER TABLE `tbl_quantity_production`
  MODIFY `id_quantity_production` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tbl_quantity_release_qc`
--
ALTER TABLE `tbl_quantity_release_qc`
  MODIFY `id_quantity_release_qc` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tbl_start_up_utility`
--
ALTER TABLE `tbl_start_up_utility`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_test`
--
ALTER TABLE `tbl_test`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_time_reparation`
--
ALTER TABLE `tbl_time_reparation`
  MODIFY `id_time_reparation` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_unit_downtime`
--
ALTER TABLE `tbl_unit_downtime`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_varian`
--
ALTER TABLE `tbl_varian`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

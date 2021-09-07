-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Sep 2021 pada 14.29
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
(5, '2021_08_24_144527_create_quantity_productions_table', 2);

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
(3, 1, 2, 1, 'LLL, BUFFER CT PENUH, TROBLE MESIN LABEL, BOTOL TELAT\r\n', '2021-08-14 08:00:00', '2021-08-14 08:39:00');

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
(1, 1, 'YGT 001', '2021-08-24 10:02:37', '2021-08-24 10:02:37', 234561, NULL, NULL),
(5, 2, 'YGT 002', '2021-09-06 07:22:00', '2021-09-06 00:27:00', 1324356, NULL, NULL);

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
(2, 'FILLING'),
(1, 'PREPARATION');

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
(3, 3, 4, 5, 6);

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
(8, 6, 6, 7),
(9, 7, 6, 5),
(11, 5, 6, 2);

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
(5, 'Batozar', 'Bulan', NULL, NULL),
(6, 'Zeus', 'Olympus', '2021-08-25 19:04:31', '2021-08-25 19:04:31');

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
(1, 2, '2021-08-26 08:22:00', '2021-08-26 09:23:00'),
(3, 3, '2021-09-02 04:44:00', '2021-09-02 05:45:00');

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
  `kode_variant` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_varian`
--

INSERT INTO `tbl_varian` (`id`, `id_customer`, `nama_variant`, `kode_variant`) VALUES
(1, 1, 'YUZU GREANT EA', 'YGT'),
(2, 1, 'YUZU ISOTONIC', 'YIS'),
(3, 1, 'YUZU TEA ORIGINAL', 'YTO');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_departement`
--
ALTER TABLE `tbl_departement`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_downtime`
--
ALTER TABLE `tbl_downtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_jenis_downtime`
--
ALTER TABLE `tbl_jenis_downtime`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_quantity_production`
--
ALTER TABLE `tbl_quantity_production`
  MODIFY `id_quantity_production` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_start_up_utility`
--
ALTER TABLE `tbl_start_up_utility`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_test`
--
ALTER TABLE `tbl_test`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_unit_downtime`
--
ALTER TABLE `tbl_unit_downtime`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_varian`
--
ALTER TABLE `tbl_varian`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

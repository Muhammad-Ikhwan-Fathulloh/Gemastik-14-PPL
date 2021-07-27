-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2021 at 08:14 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `collabs`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inspirasis`
--

CREATE TABLE `inspirasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `inspirasi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_buat_inspirasi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_ubah_inspirasi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategoricollabs`
--

CREATE TABLE `kategoricollabs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_collabs` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoricollabs`
--

INSERT INTO `kategoricollabs` (`id`, `kategori_collabs`, `created_at`, `updated_at`) VALUES
(1, 'Peternakan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `komentarmasalahs`
--

CREATE TABLE `komentarmasalahs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_permasalahan` int(11) NOT NULL,
  `komentar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komentarsolusis`
--

CREATE TABLE `komentarsolusis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_solusi` int(11) NOT NULL,
  `komentar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `masalahs`
--

CREATE TABLE `masalahs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `latar_belakang` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi_masalah` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_buat` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `tanggal_ubah` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `masalahs`
--

INSERT INTO `masalahs` (`id`, `id_user`, `latar_belakang`, `deskripsi_masalah`, `kategori`, `tanggal_buat`, `tanggal_ubah`, `created_at`, `updated_at`) VALUES
(5, 1, 'Mayoritas peternakan ayam di Indonesia, baik ayam pedaging maupun petelur masih menggunakan metode (manual/konvensional) dalam proses perawatan ayam. Tentunya hal ini tidak efisien dari segi waktu, tenaga, dan biaya. Sebagai contoh, apabila letak kandang ayam dan rumah pemilik yang jauh mengakibatkan pemilik harus pulang pergi dari rumah ke kandang untuk melakukan perawatan terhadap ayam nya. Selain itu, pemberian pakan masih didistribusikan secara manual sehingga pegawai harus berkeliling kandang', 'posisi rumah dan kandang yang memiliki jarak yang cukup jauh, monitoring dan controlling suhu, keamanan kandang.', 'Peternakan', '2021-07-23 04:34:24', '2021-07-23 04:34:24', '2021-07-22 21:34:24', '2021-07-22 21:34:24');

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
(4, '2021_07_19_090236_create_masalahs_table', 1),
(5, '2021_07_19_090324_create_solusis_table', 1),
(6, '2021_07_19_090433_create_inspirasis_table', 1),
(7, '2021_07_19_090502_create_pesans_table', 1),
(8, '2021_07_19_092401_create_komentarmasalahs_table', 1),
(9, '2021_07_19_092445_create_komentarsolusis_table', 1),
(10, '2021_07_20_091214_create_kategoricollabs_table', 1);

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
-- Table structure for table `pesans`
--

CREATE TABLE `pesans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pesan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `pesan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_buat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_ubah` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `solusis`
--

CREATE TABLE `solusis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_permasalahan` int(11) NOT NULL,
  `deskripsi_solusi` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi_penerapan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harapan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_solusi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_penerapan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feedback` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_buat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_ubah` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `solusis`
--

INSERT INTO `solusis` (`id`, `id_user`, `id_permasalahan`, `deskripsi_solusi`, `deskripsi_penerapan`, `harapan`, `file_solusi`, `file_penerapan`, `feedback`, `kategori`, `tanggal_buat`, `tanggal_ubah`, `created_at`, `updated_at`) VALUES
(5, 1, 5, 'KEWAN PITIK merupakan teknologi yang dapat melakukan pemantauan suhu dan kelembapan kandang ayam. Sehingga bisa menjaga kondisi kandang sesuai dengan karakteristik suhu ayam secara realtime. Melakukan kontrol pemberian pakan ayam dengan conveyor dan mengecek kuantitas isi pakan, serta sistem keamanan kandang dengan RFID dengan kartu dan id kartu untuk dapat mengakses kandang ayam dan aplikasi android KEWAN PITIK. Memantau perkembangan peternakan ayam dengan aplikasi website KEWAN PITIK. ', 'Internet of Things', 'Memajukan Peternakan Ayam Indonesia', 'https://s.id/VideoKewanPitik', 'https://s.id/VideoKewanPitik', 'Kolaborasi', 'Peternakan', NULL, NULL, '2021-07-22 21:42:15', '2021-07-22 21:42:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nohp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL DEFAULT '3',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `foto`, `alamat`, `nohp`, `tempat_lahir`, `tanggal_lahir`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Ikhwan Fathulloh', 'Ikhwan', 'https://i.ibb.co/vXgH8Wr/Logopit-1619837910132.jpg', NULL, NULL, NULL, NULL, 'muhammadikhwanfathulloh17@gmail.com', NULL, '$2y$10$IVpHXI04N83v4ILEm1.8WOarYoFTimG4RyS2KipbHWPZQgDyHwzdG', 3, NULL, '2021-07-20 06:28:13', '2021-07-21 02:07:12'),
(2, 'Shalih Rizaldy', 'Shalih', 'https://i.ibb.co/nczf7mW/Logopit-1626925559368.jpg', NULL, NULL, NULL, NULL, 'shalihrizaldy@gmail.com', NULL, '$2y$10$t/0Q6IlWc8eOidec5buIiuACEWbWN6ybLEOjnsGlLyLu2xN5peQxm', 2, NULL, '2021-07-21 00:11:48', '2021-07-21 05:26:22'),
(3, 'Dimas Aji Permadi', NULL, 'https://i.ibb.co/CQr7t6n/Logopit-1626925514205.jpg', NULL, NULL, NULL, NULL, 'dajip569@gmail.com', NULL, '$2y$10$TpGEOxA9QaOt9kYImISFLuiyocaCQS.kj2PA5wrs.M7HSF/LIQNhW', 1, NULL, '2021-07-21 09:41:40', '2021-07-21 09:41:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inspirasis`
--
ALTER TABLE `inspirasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoricollabs`
--
ALTER TABLE `kategoricollabs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentarmasalahs`
--
ALTER TABLE `komentarmasalahs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentarsolusis`
--
ALTER TABLE `komentarsolusis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masalahs`
--
ALTER TABLE `masalahs`
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
-- Indexes for table `pesans`
--
ALTER TABLE `pesans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `solusis`
--
ALTER TABLE `solusis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
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
-- AUTO_INCREMENT for table `inspirasis`
--
ALTER TABLE `inspirasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoricollabs`
--
ALTER TABLE `kategoricollabs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `komentarmasalahs`
--
ALTER TABLE `komentarmasalahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komentarsolusis`
--
ALTER TABLE `komentarsolusis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `masalahs`
--
ALTER TABLE `masalahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pesans`
--
ALTER TABLE `pesans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `solusis`
--
ALTER TABLE `solusis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

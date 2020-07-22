-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2020 at 03:35 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_zainfarfume`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_parfum` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_parfum` int(10) UNSIGNED NOT NULL,
  `harga_pembelian` int(10) UNSIGNED DEFAULT NULL,
  `harga_penjualan` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `nama_parfum`, `jumlah_parfum`, `harga_pembelian`, `harga_penjualan`, `created_at`, `updated_at`) VALUES
(1, 'Axe', 46, 7000, 7500, '2020-07-13 15:47:04', '2020-07-18 09:07:30'),
(2, 'Oriflame', 862, 8000, 8250, '2020-07-13 16:47:40', '2020-07-15 02:58:30'),
(12, 'Casablanka', 1200, 7000, 12000, '2020-07-15 01:35:02', '2020-07-18 06:32:03'),
(13, 'Aqua', 900, 1200, 5000, '2020-07-15 01:49:33', '2020-07-15 03:16:56'),
(14, 'moca', 2000, 1000, 2000, '2020-07-18 07:01:19', '2020-07-18 07:01:50');

-- --------------------------------------------------------

--
-- Table structure for table `botols`
--

CREATE TABLE `botols` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_botol` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_botol` int(10) UNSIGNED NOT NULL,
  `harga_pembelian` int(10) UNSIGNED NOT NULL,
  `harga_penjualan` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `botols`
--

INSERT INTO `botols` (`id`, `nama_botol`, `jumlah_botol`, `harga_pembelian`, `harga_penjualan`, `created_at`, `updated_at`) VALUES
(4, 'Botol 16ml', 11, 5000, 6000, '2020-07-18 08:37:19', '2020-07-18 08:47:00');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2020_07_11_131716_create_barangs_table', 1),
(11, '2020_07_12_142421_create_pelanggans_table', 1),
(12, '2020_07_12_144804_create_suppliers_table', 1),
(16, '2020_07_12_153604_create_pengeluarans_table', 2),
(21, '2020_07_12_055741_create_pembelian_table', 4),
(22, '2020_07_18_141633_create_botols_table', 5),
(25, '2020_07_18_143539_create_pembelian_botols_table', 8),
(26, '2020_07_12_042925_create_penjualan_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggans`
--

CREATE TABLE `pelanggans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggans`
--

INSERT INTO `pelanggans` (`id`, `nama`, `alamat`, `no_telp`, `created_at`, `updated_at`) VALUES
(1, 'iwan', 'Bandung', '089666288087', '2020-07-13 15:46:40', '2020-07-13 15:46:40'),
(2, 'joko', 'Garut', '08621343123', '2020-07-13 16:46:44', '2020-07-13 16:46:44');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `id_barang` bigint(10) UNSIGNED NOT NULL,
  `jumlah` int(10) UNSIGNED NOT NULL,
  `total_pembelian` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `supplier_id`, `id_barang`, `jumlah`, `total_pembelian`, `created_at`, `updated_at`) VALUES
(21, 2, 12, 200, 0, '2020-07-15 01:53:36', '2020-07-15 01:53:36'),
(26, 1, 1, 70, 0, '2020-07-18 08:33:11', '2020-07-18 08:33:11');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_botols`
--

CREATE TABLE `pembelian_botols` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tgl_pembelian` date DEFAULT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `botol_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(10) UNSIGNED NOT NULL,
  `total_pembelian` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembelian_botols`
--

INSERT INTO `pembelian_botols` (`id`, `tgl_pembelian`, `supplier_id`, `botol_id`, `jumlah`, `total_pembelian`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 4, 12, 0, '2020-07-18 08:45:48', '2020-07-18 08:45:48');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluarans`
--

CREATE TABLE `pengeluarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_parfum` bigint(20) UNSIGNED NOT NULL,
  `penjualan_id` int(11) NOT NULL,
  `jumlah_terjual` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengeluarans`
--

INSERT INTO `pengeluarans` (`id`, `id_parfum`, `penjualan_id`, `jumlah_terjual`, `created_at`, `updated_at`) VALUES
(1, 13, 5, 20, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(10) UNSIGNED NOT NULL,
  `pelanggan_id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `botol_id` bigint(20) UNSIGNED DEFAULT NULL,
  `jumlah` int(10) UNSIGNED NOT NULL,
  `total_penjualan` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `nama`, `alamat`, `no_telp`, `created_at`, `updated_at`) VALUES
(1, 'zayn', 'Dago', '08213124521', '2020-07-14 01:00:07', '2020-07-14 01:00:07'),
(2, 'michael', 'Coblong', '0832123412', '2020-07-14 01:16:12', '2020-07-14 01:16:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin123@gmail.com', NULL, '$2y$10$a.2VxE1jbVp35sxrEge.WefB8VEcVCVv5wxOanXeaKlOFVy5BLZZu', NULL, '2020-07-12 19:53:15', '2020-07-12 19:53:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `botols`
--
ALTER TABLE `botols`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Indexes for table `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembelian_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `pembelian_botols`
--
ALTER TABLE `pembelian_botols`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembelian_botols_supplier_id_foreign` (`supplier_id`),
  ADD KEY `pembelian_botols_botol_id_foreign` (`botol_id`);

--
-- Indexes for table `pengeluarans`
--
ALTER TABLE `pengeluarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengeluarans_id_parfum_foreign` (`id_parfum`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penjualan_pelanggan_id_foreign` (`pelanggan_id`),
  ADD KEY `penjualan_barang_id_foreign` (`barang_id`),
  ADD KEY `penjualan_botol_id_foreign` (`botol_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
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
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `botols`
--
ALTER TABLE `botols`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pelanggans`
--
ALTER TABLE `pelanggans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pembelian_botols`
--
ALTER TABLE `pembelian_botols`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengeluarans`
--
ALTER TABLE `pengeluarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembelian_botols`
--
ALTER TABLE `pembelian_botols`
  ADD CONSTRAINT `pembelian_botols_botol_id_foreign` FOREIGN KEY (`botol_id`) REFERENCES `botols` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembelian_botols_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengeluarans`
--
ALTER TABLE `pengeluarans`
  ADD CONSTRAINT `pengeluarans_id_parfum_foreign` FOREIGN KEY (`id_parfum`) REFERENCES `barangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penjualan_botol_id_foreign` FOREIGN KEY (`botol_id`) REFERENCES `botols` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penjualan_pelanggan_id_foreign` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jul 2022 pada 16.09
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kemejakudb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(255) NOT NULL,
  `stok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barangs`
--

INSERT INTO `barangs` (`id`, `nama_barang`, `gambar`, `harga`, `stok`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Kemeja 1', 'kemeja1.jpg', 55000, '5', 'Ukuran L', '2019-11-13 17:00:00', '2019-11-13 17:00:00'),
(2, 'Kemeja 2', 'kemeja2.jpg', 60000, '10', 'Ukuran M', '2019-11-13 17:00:00', '2019-11-13 17:00:00'),
(3, 'Kemeja 3 ', 'kemeja3.jpg', 50000, '8', 'Ukuran M', '2019-11-13 17:00:00', '2019-11-13 17:00:00'),
(4, 'Kemeja 4', 'kemeja2.jpg', 70000, '4', 'Ukuran S, M, L, XL', NULL, NULL),
(5, 'Kemeja 4', 'kemeja2.jpg', 70000, '4', 'Ukuran S, M, L, XL', NULL, NULL),
(6, 'Kemeja 4', 'kemeja2.jpg', 70000, '4', 'Ukuran S, M, L, XL', NULL, NULL),
(7, 'Kemeja 4', 'kemeja2.jpg', 70000, '4', 'Ukuran S, M, L, XL', NULL, NULL),
(8, 'Kemeja 4', 'kemeja2.jpg', 70000, '4', 'Ukuran S, M, L, XL', NULL, NULL),
(9, 'Kemeja 4', 'kemeja2.jpg', 70000, '4', 'Ukuran S, M, L, XL', NULL, NULL),
(10, 'Kemeja 7', 'kemeja1.jpg', 50000, '2', 'Ukuran S, M, L, XL', NULL, NULL),
(11, 'Kemeja 7', 'kemeja1.jpg', 50000, '2', 'Ukuran S, M, L, XL', NULL, NULL),
(12, 'Kemeja 6', 'kemeja3.jpg', 40000, '5', 'Ukuran S, M, L, XL', NULL, NULL);

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
(3, '2022_07_14_205611_create_barangs_table', 1),
(5, '2022_07_14_210209_create_pesanan_details_table', 1),
(7, '2022_07_14_210044_create_pesanans_table', 2);

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
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tgl_order` date NOT NULL,
  `status` int(11) NOT NULL,
  `kode` int(11) NOT NULL,
  `jumlah_harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `user_id`, `tgl_order`, `status`, `kode`, `jumlah_harga`, `created_at`, `updated_at`) VALUES
(1, 4, '2022-07-21', 1, 954, 70000, '2022-07-21 15:51:44', '2022-07-21 16:14:32'),
(2, 4, '2022-07-21', 1, 835, 110000, '2022-07-21 16:35:03', '2022-07-21 16:35:11'),
(3, 4, '2022-07-21', 1, 778, 165000, '2022-07-21 16:49:33', '2022-07-21 16:50:59'),
(4, 4, '2022-07-21', 1, 588, 60000, '2022-07-21 16:51:42', '2022-07-21 16:51:50'),
(5, 4, '2022-07-21', 1, 606, 55000, '2022-07-21 16:53:15', '2022-07-21 16:53:22'),
(6, 12, '2022-07-22', 0, 652, 0, '2022-07-21 17:01:55', '2022-07-21 17:03:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan_detail`
--

CREATE TABLE `pesanan_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `jumlah_order` int(11) NOT NULL,
  `jumlah_harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pesanan_detail`
--

INSERT INTO `pesanan_detail` (`id`, `barang_id`, `pesanan_id`, `jumlah_order`, `jumlah_harga`, `created_at`, `updated_at`) VALUES
(42, 4, 1, 1, 70000, '2022-07-21 15:51:44', '2022-07-21 15:51:44'),
(43, 1, 2, 2, 110000, '2022-07-21 16:35:03', '2022-07-21 16:35:03'),
(44, 3, 3, 1, 50000, '2022-07-21 16:49:33', '2022-07-21 16:49:33'),
(45, 2, 3, 1, 60000, '2022-07-21 16:49:53', '2022-07-21 16:49:53'),
(46, 1, 3, 1, 55000, '2022-07-21 16:50:47', '2022-07-21 16:50:47'),
(47, 2, 4, 1, 60000, '2022-07-21 16:51:42', '2022-07-21 16:51:42'),
(48, 1, 5, 1, 55000, '2022-07-21 16:53:15', '2022-07-21 16:53:15');

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
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `alamat`, `no_hp`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Eko Prasetyo', 'eko@gmail.com', NULL, '$2y$10$5B95Ef3eOc5xHsatTOVVC.IoKVGDlj/np6vaW2ROhZh6DEyfGaAHG', NULL, NULL, NULL, '2022-07-14 14:32:44', '2022-07-14 14:32:44'),
(2, 'Amel', 'amel@gmail.com', NULL, '$2y$10$sC.a0Gee/G73rsaHyLa9wukZrs8iuL/rwAaaMMCbNVlBFNru0zVNS', NULL, NULL, NULL, '2022-07-16 17:53:52', '2022-07-16 17:53:52'),
(3, 'Eko Prasetyo', 'ekoo@gmail.com', NULL, '$2y$10$ND9iy1JPVpz5b785o220hebxj3ga9.n3Y/nYx62yflLFY6CEZGwrK', NULL, NULL, NULL, '2022-07-17 20:07:00', '2022-07-17 20:07:00'),
(4, 'widia', 'widia@gmail.com', NULL, '$2y$10$YA32mT5qMIQys56d0EUlXer6SL7PCf/VnWePBbLen4WtOZLMrrrWq', NULL, NULL, NULL, '2022-07-17 21:34:11', '2022-07-17 21:34:11'),
(5, 'Wawa', 'wawa@gmail.com', NULL, '$2y$10$PO88gzmpwi3hI/nB2q2eKuRwtTn40i9hYNfZ3fXlGPNfImVtBSsZy', NULL, NULL, NULL, '2022-07-18 06:40:24', '2022-07-18 06:40:24'),
(6, 'yogi', 'yogi@gmail.com', NULL, '$2y$10$Lb/LSnxbfbD4DTdRYwB7Bum.sDKKAI6xhq1ZVG6UDA7su1g2rDMMa', NULL, NULL, NULL, '2022-07-18 10:35:35', '2022-07-18 10:35:35'),
(7, 'bella', 'bella@gmail.com', NULL, '$2y$10$IXsZw8akl9JLF3r3XRMSYewhaqwvLEgFP85k2.JcXKbfJZTIutrdi', NULL, NULL, NULL, '2022-07-18 10:45:01', '2022-07-18 10:45:01'),
(8, 'wawan', 'wawan@gmail.com', NULL, '$2y$10$rHka.0kxCV03x8W2m2FCk.cQn4PR6Vbmcktuv7CsWdVlD5QqN6Sc.', NULL, '085625339933', NULL, '2022-07-18 12:27:22', '2022-07-21 12:40:57'),
(9, 'mamat', 'mamat@gmail.com', NULL, '$2y$10$nhOYoOFQe0O2MtEWgkpLdema72.tERrHmemv4g4Cy2G6WLTq2RIMu', NULL, NULL, NULL, '2022-07-20 02:41:56', '2022-07-20 02:41:56'),
(10, 'Sandi', 'sandi@gmail.com', NULL, '$2y$10$8jKeyD0VAEtgbY6pOg5LY.Qi5U88pv4cR5VcjTrixK29hYlkTUa72', NULL, NULL, NULL, '2022-07-20 11:12:27', '2022-07-20 11:12:27'),
(11, 'firda', 'firda@gmail.com', NULL, '$2y$10$t9kcZ.wJ.S4925D3IUD77.9arATIwwQfUgLoS3Agk/15DRJoqLAae', 'Wonosalam Demak', '0857243332211', NULL, '2022-07-21 15:37:01', '2022-07-21 15:38:31'),
(12, 'Eko Prasetyo', 'masukpak33@gmail.com', NULL, '$2y$10$I1483Nyrf5Ei5cNt2neMbevKp1uF3LSgufm3LZ99quFZSZOdbdzHa', NULL, NULL, NULL, '2022-07-21 16:58:08', '2022-07-21 16:58:08');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barangs`
--
ALTER TABLE `barangs`
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
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

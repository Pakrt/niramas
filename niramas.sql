-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Nov 2020 pada 10.12
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
-- Database: `niramas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bagians`
--

CREATE TABLE `bagians` (
  `id` int(11) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `spare` varchar(255) DEFAULT NULL,
  `spares` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bagians`
--

INSERT INTO `bagians` (`id`, `kode`, `nama`, `spare`, `spares`, `created_at`, `updated_at`) VALUES
(1, 'ENG', 'ENGINEERING', NULL, NULL, '2020-11-05 18:46:31', '2020-11-05 19:18:36'),
(2, 'PROD', 'PRODUKSI', NULL, NULL, '2020-11-09 18:57:46', '2020-11-09 18:57:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangs`
--

CREATE TABLE `barangs` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `spesifikasi` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `minim` int(10) DEFAULT NULL,
  `satuan_id` int(11) NOT NULL,
  `spare` varchar(255) DEFAULT NULL,
  `spares` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barangs`
--

INSERT INTO `barangs` (`id`, `kategori_id`, `nama`, `jumlah`, `spesifikasi`, `keterangan`, `minim`, `satuan_id`, `spare`, `spares`, `created_at`, `updated_at`) VALUES
(3, 3, 'KARTU NAMA', 0, 'RIA AYU WARDHANI', NULL, 0, 1, NULL, NULL, '2020-10-26 20:54:41', '2020-11-12 01:06:43'),
(4, 2, 'PAPAN TULIS', 5, '200x100', NULL, NULL, 1, NULL, NULL, '2020-10-26 21:08:54', '2020-10-27 21:12:17'),
(5, 4, 'PASIR PUTIH', 0, 'DI PINGGIR LAUT ARAFURU', NULL, NULL, 2, NULL, NULL, '2020-10-28 00:21:03', '2020-11-01 21:04:31'),
(6, 2, 'PULPEN', 0, 'STANDART CHARTERED', NULL, 0, 2, NULL, NULL, '2020-11-01 21:09:16', '2020-11-12 01:06:58'),
(7, 2, 'STABILO', 0, 'IJO MENTAH', NULL, NULL, 1, NULL, NULL, '2020-11-12 01:07:23', '2020-11-12 01:07:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bkeluars`
--

CREATE TABLE `bkeluars` (
  `id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `spare` varchar(255) DEFAULT NULL,
  `spares` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bkeluars`
--

INSERT INTO `bkeluars` (`id`, `barang_id`, `jumlah`, `keterangan`, `tanggal`, `user_id`, `spare`, `spares`, `created_at`, `updated_at`) VALUES
(1, 4, 5, 'Untuk Ruang Meeting', '2020-10-21', 1, NULL, NULL, '2020-10-27 21:12:17', '2020-10-27 21:12:17'),
(2, 6, 9, NULL, '2020-11-02', 1, NULL, NULL, '2020-11-01 21:27:04', '2020-11-01 21:27:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bmasuks`
--

CREATE TABLE `bmasuks` (
  `id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `spare` varchar(255) DEFAULT NULL,
  `spares` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bmasuks`
--

INSERT INTO `bmasuks` (`id`, `barang_id`, `jumlah`, `keterangan`, `tanggal`, `user_id`, `spare`, `spares`, `created_at`, `updated_at`) VALUES
(1, 4, 10, 'TOKOPEDIA', '2020-10-20', 1, NULL, NULL, '2020-10-27 20:28:01', '2020-10-27 20:28:01'),
(2, 3, 11, 'BUKALAPAK', '2020-10-22', 1, NULL, NULL, '2020-10-27 21:14:31', '2020-10-27 21:14:31'),
(3, 6, 10, 'BUKALAPAK', '2020-11-02', 1, NULL, NULL, '2020-11-01 21:10:17', '2020-11-01 21:10:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `karyawans`
--

CREATE TABLE `karyawans` (
  `id` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `user_id` int(10) NOT NULL,
  `bagian_id` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kontak` varchar(20) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `spare` varchar(255) DEFAULT NULL,
  `spares` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawans`
--

INSERT INTO `karyawans` (`id`, `nik`, `user_id`, `bagian_id`, `nama`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `kontak`, `avatar`, `spare`, `spares`, `created_at`, `updated_at`) VALUES
(2, '1461800043', 3, 1, 'RIZAL TAUFIQ', '2020-11-04', 'L', 'Perumahan Asabri blok A.05, Kecamatan Pandaan, Kabupaten Pasuruan, Jawa Timur, Indonesia', '82147777556', NULL, NULL, NULL, '2020-11-09 21:10:08', '2020-11-11 20:30:26'),
(3, '1461800028', 4, 2, 'Deny Prasetyo', '2020-11-03', 'L', 'Wonoayu, Surabaya, JawaTimur', '85736000508', NULL, NULL, NULL, '2020-11-10 19:42:25', '2020-11-10 19:42:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `spare` varchar(255) DEFAULT NULL,
  `spares` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `kode`, `nama`, `keterangan`, `spare`, `spares`, `created_at`, `updated_at`) VALUES
(2, 'ATKS', 'ALAT TULIS KANTOR', NULL, NULL, NULL, '2020-10-26 19:15:54', '2020-10-26 19:56:09'),
(3, 'KAR', 'KARYAWAN', NULL, NULL, NULL, '2020-10-26 20:52:37', '2020-10-26 20:52:37'),
(4, 'GA', 'GENERAL AFFAIR', NULL, NULL, NULL, '2020-10-26 20:52:57', '2020-10-26 20:52:57');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('lensa17.2018@gmail.com', '$2y$10$wdz.bz3XAzoj7glN2rhrpeyLZm4X3kx6c2WdFfdMq9ktuMZTFA7n.', '2020-11-11 18:44:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuans`
--

CREATE TABLE `satuans` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `spare` varchar(255) DEFAULT NULL,
  `spares` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `satuans`
--

INSERT INTO `satuans` (`id`, `kode`, `nama`, `keterangan`, `spare`, `spares`, `created_at`, `updated_at`) VALUES
(1, 'PCS', 'PCS', 'Contoh', NULL, NULL, '2020-10-26 20:49:33', '2020-10-26 20:51:38'),
(2, 'PACK', 'PACK', NULL, NULL, NULL, '2020-10-26 20:53:14', '2020-10-26 20:53:14'),
(3, 'KRT', 'KARTON', NULL, NULL, NULL, '2020-10-26 20:53:37', '2020-10-26 20:53:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'manager', 'Admin', 'admin@admin.com', NULL, NULL, '$2y$10$zH8pNsPCa9di0xYQOj4e1eITnvYucS17x6n0UFQAT1fQp3e3nqLty', NULL, '2020-09-17 20:11:10', '2020-09-17 20:11:10'),
(3, 'crew', 'RIZAL TAUFIQ', 'lensa17.2018@gmail.com', 'me.jpeg', NULL, '$2y$10$2ekXqtM1YzJ52zoKAE8TZ.xKV5p.EDGGUBnnyy9vHeXybFtfxPyOG', 'y5nJZprEkNQvtXJ0nwozZIOlLUwNs0z51xa1Q6GlrezXjxxP5SUZEawqqv4v', '2020-11-09 21:10:08', '2020-11-12 00:51:42'),
(4, 'crew', 'Deny Prasetyo', 'deny@deny.com', NULL, NULL, '$2y$10$0CP0wJ0l2PBNdSoOZ6HZ4eEGewo6DDLaPFKNikQqMuhfR3AXMiX/K', NULL, '2020-11-10 19:42:25', '2020-11-10 19:42:25');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bagians`
--
ALTER TABLE `bagians`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indeks untuk tabel `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bkeluars`
--
ALTER TABLE `bkeluars`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bmasuks`
--
ALTER TABLE `bmasuks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `karyawans`
--
ALTER TABLE `karyawans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

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
-- Indeks untuk tabel `satuans`
--
ALTER TABLE `satuans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

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
-- AUTO_INCREMENT untuk tabel `bagians`
--
ALTER TABLE `bagians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `bkeluars`
--
ALTER TABLE `bkeluars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `bmasuks`
--
ALTER TABLE `bmasuks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `karyawans`
--
ALTER TABLE `karyawans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `satuans`
--
ALTER TABLE `satuans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

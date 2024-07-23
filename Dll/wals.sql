-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jul 2024 pada 10.24
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wals`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) NOT NULL,
  `id_topik` int(11) NOT NULL,
  `id_percobaan` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2024_07_23_071219_create_feedback_table', 1),
(2, '2024_07_23_071350_create_password_resets_table', 1),
(3, '2024_07_23_071414_create_percobaan_table', 1),
(4, '2024_07_23_071437_create_std_submit_table', 1),
(5, '2024_07_23_071456_create_teachers_table', 1),
(6, '2024_07_23_071516_create_topik_table', 1),
(9, '2024_07_23_071531_create_users_table', 2),
(10, '2024_07_23_071546_create_validasi_table', 2);

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
-- Struktur dari tabel `percobaan`
--

CREATE TABLE `percobaan` (
  `id_percobaan` bigint(20) UNSIGNED NOT NULL,
  `id_topik` smallint(6) NOT NULL,
  `no_percobaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_percobaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `panduanpath` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filetest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `texteditor` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `std_submit`
--

CREATE TABLE `std_submit` (
  `id_submit` bigint(20) UNSIGNED NOT NULL,
  `id_topic` int(11) NOT NULL,
  `id_percobaan` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `checkstat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkresult` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student` bigint(20) NOT NULL,
  `teacher` bigint(20) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `topik`
--

CREATE TABLE `topik` (
  `id_topik` smallint(5) UNSIGNED NOT NULL,
  `bab` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `levelid` int(11) NOT NULL DEFAULT 0,
  `status_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `status`, `email`, `email_verified_at`, `password`, `remember_token`, `levelid`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'AdminWals', 'admin', 'adminwals@gmail.com', NULL, '$2y$10$tIZQdSS4Agd/Dw6L/SEfe.jQL3avyru9TB1tDuuZeXuBWRRDn/F2i', 'jJsRRN1EsSsRikK9oBRRwx6zXHV4s0jrmvoIfmNYevsiTDTB6PxpbxGZgcx5', 0, 'Active', '2024-02-10 04:12:17', '2024-05-31 15:55:44'),
(2, 'TeacherWals', 'teacher', 'teacherwals@gmail.com', NULL, '$2y$10$d.MgC66ykIKEU/iramDmDOVme2bbh5O2bjG4GNb33MXa6yBPoEE5S', 'FrmuUhr2TEftyaNsfANYXrofIezRoxJOGZ9nH3jOSOcXm7Oudy8VJzkQpSer', 0, 'Active', '2024-02-10 04:33:45', '2024-05-31 15:55:58'),
(3, 'StudentWals', 'student', 'studentwals@gmail.com', NULL, '$2y$10$oh7U/uqW255g/vizBuNnJ.0o1vdX3MrU1pspvQHCVAWnLLy57WCXy', NULL, 2, 'Active', '2024-07-19 15:38:27', '2024-07-19 15:38:27'),
(4, 'Anggit Agung', 'student', 'anggit@gmail.com', NULL, '$2y$10$R/IkZ/0i7kRFmUeOevvtaOiIiIrw3QEqBTiSvC1uAQS7oKCzN/Di6', NULL, 2, 'Active', '2024-07-22 13:35:48', '2024-07-22 13:35:48'),
(5, 'evasil', 'student', 'evasil@gmail.com', NULL, '$2y$10$sjQFmjW/SZCZAGsVLheE.OgBlSCpD0LmrK5g9Hjf3/wqvqViI.mBe', NULL, 2, 'Active', '2024-07-22 14:12:32', '2024-07-22 14:12:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `validasi`
--

CREATE TABLE `validasi` (
  `id_validation` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) NOT NULL,
  `id_percobaan` int(11) NOT NULL,
  `id_submit` bigint(20) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`);

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
-- Indeks untuk tabel `percobaan`
--
ALTER TABLE `percobaan`
  ADD PRIMARY KEY (`id_percobaan`);

--
-- Indeks untuk tabel `std_submit`
--
ALTER TABLE `std_submit`
  ADD PRIMARY KEY (`id_submit`);

--
-- Indeks untuk tabel `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `topik`
--
ALTER TABLE `topik`
  ADD PRIMARY KEY (`id_topik`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `validasi`
--
ALTER TABLE `validasi`
  ADD PRIMARY KEY (`id_validation`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `percobaan`
--
ALTER TABLE `percobaan`
  MODIFY `id_percobaan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `std_submit`
--
ALTER TABLE `std_submit`
  MODIFY `id_submit` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `topik`
--
ALTER TABLE `topik`
  MODIFY `id_topik` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `validasi`
--
ALTER TABLE `validasi`
  MODIFY `id_validation` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

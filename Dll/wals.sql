-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jul 2024 pada 08.05
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
  `id_feedback` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `id_topik` int(11) NOT NULL,
  `id_percobaan` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `id_percobaan` int(10) UNSIGNED NOT NULL,
  `id_topik` smallint(6) NOT NULL,
  `no_percobaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_percobaan` varchar(255) NOT NULL,
  `catatan` text DEFAULT NULL,
  `panduanpath` varchar(100) NOT NULL,
  `filetest` varchar(200) NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `texteditor` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `percobaan`
--

INSERT INTO `percobaan` (`id_percobaan`, `id_topik`, `no_percobaan`, `nama_percobaan`, `catatan`, `panduanpath`, `filetest`, `deskripsi`, `texteditor`, `created_at`, `updated_at`) VALUES
(1, 1, '1', 'Menampilkan kata Indonesia menggunkaan fungsi print()', 'Kerjakan praktikum percobaan 1 dengan mengikuti 2 langkah pada panduan bagian 1.3 hingga hasilnya passed. Selanjutnya isi feedback  pada percobaan ini dengan menekan tombol feedback.', 'python-resources/guidefiles/BAB 1 - Syntax.pdf', 'bab1_percobaan1.py', 'Mahasiswa diberikan percobaan untuk menampilkan kata Indonesia menggunakan fungsi print()', '# Tuliskan kode program dibawah ini', '2024-06-03 12:35:00', '2024-07-06 07:48:19'),
(2, 2, '1', 'Membuat dan menampilkan variabel', 'Kerjakan praktikum percobaan 1 dengan mengikuti 5 langkah pada panduan bagian 2.3 hingga hasilnya passed. Selanjutnya isi feedback  pada percobaan ini dengan menekan tombol feedback.', 'python-resources/guidefiles/BAB 2 - Variables - Percobaan 1.pdf', 'bab2_percobaan1.py', 'Mahasiswa diberikan percobaan untuk membuat dan menampilkan variabel', '# Tuliskan kode program dibawah ini', '2024-06-03 12:36:49', '2024-07-06 07:48:48'),
(3, 2, '2', 'Menentukan tipe data variabel menggunakan casting', 'Kerjakan praktikum percobaan 2 dengan mengikuti 5 langkah pada panduan bagian 2.3 hingga hasilnya passed. Selanjutnya isi feedback  pada percobaan ini dengan menekan tombol feedback.', 'python-resources/guidefiles/BAB 2 - Variables - Percobaan 2.pdf', 'bab2_percobaan2.py', 'Mahasiswa diberikan percobaan untuk menentukan tipe data variabel menggunakan casting', '# Tuliskan variabel dibawah ini\r\n\r\n\r\ndef konversi(umur):\r\n    #Tuliskan kode program dibawah ini', '2024-06-03 12:45:01', '2024-07-06 07:49:04'),
(4, 2, '3', 'Mengindentifikasi tipe dari sebuah variabel menggunakan type()', 'Kerjakan praktikum percobaan 3 dengan mengikuti 7 langkah pada panduan bagian 2.3 hingga hasilnya passed. Selanjutnya isi feedback  pada percobaan ini dengan menekan tombol feedback.', 'python-resources/guidefiles/BAB 2 - Variables - Percobaan 3.pdf', 'bab2_percobaan3.py', 'Mahasiswa diberikan percobaan untuk mengindentifikasi tipe dari sebuah variabel menggunakan type()', '# Tuliskan kode program dibawah ini', '2024-06-03 12:48:58', '2024-07-06 07:49:20'),
(5, 2, '4', 'Menampilkan banyak variabel menggunakan operator +', 'Kerjakan praktikum percobaan 4 dengan mengikuti 6 langkah pada panduan bagian 2.3 hingga hasilnya passed. Selanjutnya isi feedback  pada percobaan ini dengan menekan tombol feedback.', 'python-resources/guidefiles/BAB 2 - Variables - Percobaan 4.pdf', 'bab2_percobaan4.py', 'Mahasiswa diberikan percobaan untuk menampilkan banyak variabel menggunakan operator +', '# Tuliskan variabel dibawah ini\r\n\r\n\r\ndef hasil(nama, lengkap):\r\n    #Tuliskan kode program dibawah ini', '2024-06-03 12:52:24', '2024-07-06 07:49:40'),
(6, 3, '1', 'Menghitung panjang string menggunakan fungsi len()', 'Kerjakan praktikum percobaan 1 dengan mengikuti 5 langkah pada panduan bagian 3.3 hingga hasilnya passed. Selanjutnya isi feedback  pada percobaan ini dengan menekan tombol feedback.', 'python-resources/guidefiles/BAB 3 - String - Percobaan 1 (FIX).pdf', 'bab3_percobaan1.py', 'Mahasiswa diberikan percobaan untuk menghitung panjang string menggunakan fungsi len()', '# Tuliskan variabel dibawah ini\r\n\r\n\r\ndef panjang(tulis):\r\n    #Tuliskan kode program dibawah ini', '2024-06-03 12:55:09', '2024-06-03 12:57:33'),
(7, 3, '2', 'Mengubah string ke dalam huruf besar menggunakan method upper()', 'Kerjakan praktikum percobaan 2 dengan mengikuti 5 langkah pada panduan bagian 3.3 hingga hasilnya passed. Selanjutnya isi feedback  pada percobaan ini dengan menekan tombol feedback.', 'python-resources/guidefiles/BAB 3 - String - Percobaan 2 (FIX).pdf', 'bab3_percobaan2.py', 'Mahasiswa diberikan contoh untuk mengubah string ke dalam huruf besar menggunakan method upper()', '# Tuliskan variabel dibawah ini\r\n\r\n\r\ndef kapital(tulis):\r\n    #Tuliskan kode program dibawah ini', '2024-06-03 12:56:57', '2024-06-03 12:56:57'),
(8, 3, '3', 'Mengubah string ke dalam huruf kecil menggunakan method lower()', 'Kerjakan praktikum percobaan 3 dengan mengikuti 5 langkah pada panduan bagian 3.3 hingga hasilnya passed. Selanjutnya isi feedback  pada percobaan ini dengan menekan tombol feedback.', 'python-resources/guidefiles/BAB 3 - String - Percobaan 3 (FIX).pdf', 'bab3_percobaan3.py', 'Mahasiswa diberikan percobaan untuk mengubah string ke dalam huruf kecil menggunakan method lower()', '# Tuliskan variabel dibawah ini\r\n\r\n\r\ndef kecil(tulis):\r\n    #Tuliskan kode program dibawah ini', '2024-06-03 12:59:28', '2024-06-03 12:59:28'),
(9, 3, '4', 'Menggantikan string dengan string lain menggunakan method replace()', 'Kerjakan praktikum percobaan 4 dengan mengikuti 5 langkah pada panduan bagian 3.3 hingga hasilnya passed. Selanjutnya isi feedback  pada percobaan ini dengan menekan tombol feedback.', 'python-resources/guidefiles/BAB 3 - String - Percobaan 4 (FIX).pdf', 'bab3_percobaan4.py', 'Mahasiswa diberikan percobaan untuk menggantikan string dengan string lain menggunakan method replace()', '# Tuliskan variabel dibawah ini\r\n\r\n\r\ndef pengganti(tulis):\r\n    #Tuliskan kode program dibawah ini', '2024-06-03 13:05:11', '2024-06-03 13:05:11'),
(10, 3, '5', 'Memasukkan angka ke dalam string menggunakan method format()', 'Kerjakan praktikum percobaan 5 dengan mengikuti 6 langkah pada panduan bagian 3.3 hingga hasilnya passed. Selanjutnya isi feedback  pada percobaan ini dengan menekan tombol feedback.', 'python-resources/guidefiles/BAB 3 - String - Percobaan 5 (FIX).pdf', 'bab3_percobaan5.py', 'Mahasiswa diberikan percobaan untuk memasukkan angka ke dalam string menggunakan method format()', '# Tuliskan variabel dibawah ini\r\n\r\n\r\ndef penggabungan(tahun, teks):\r\n    #Tuliskan kode program dibawah ini', '2024-06-03 13:08:08', '2024-06-03 13:08:08'),
(11, 4, '1', 'Operator Aritmatika Python', 'Kerjakan praktikum percobaan 1 dengan mengikuti 6 langkah pada panduan bagian 4.3 hingga hasilnya passed. Selanjutnya isi feedback  pada percobaan ini dengan menekan tombol feedback.', 'python-resources/guidefiles/BAB 4 - Operators - Percobaan 1 (FIX).pdf', 'bab4_percobaan1.py', 'Mahasiswa diberikan percobaan mengenai pengurangan operator aritmatika', '# Tuliskan variabel dibawah ini\r\n\r\n\r\ndef perkalian(angka1, angka2):\r\n    #Tuliskan kode program dibawah ini', '2024-06-03 13:10:30', '2024-06-04 07:31:05'),
(12, 4, '2', 'Operator Comparison Python', 'Kerjakan praktikum percobaan 2 dengan mengikuti 6 langkah pada panduan bagian 4.3 hingga hasilnya passed. Selanjutnya isi feedback  pada percobaan ini dengan menekan tombol feedback.', 'python-resources/guidefiles/BAB 4 - Operators - Percobaan 2 (FIX).pdf', 'bab4_percobaan2.py', 'Mahasiswa diberikan percobaan untuk membandingkan menggunakan perbandingan persamaan operator comparison', '# Tuliskan variabel dibawah ini\r\n\r\n\r\ndef equal(angka1, angka2):\r\n    #Tuliskan kode program dibawah ini', '2024-06-03 13:14:17', '2024-06-03 13:14:17'),
(13, 5, '1', 'Print pesan berdasarkan kondisi True atau False', 'Kerjakan praktikum percobaan 1 dengan mengikuti 6 langkah pada panduan bagian 5.3 hingga hasilnya passed. Selanjutnya isi feedback  pada percobaan ini dengan menekan tombol feedback.', 'python-resources/guidefiles/BAB 5 - If ... Else, Boolean - Percobaan1 (FIX).pdf', 'bab5_percobaan1.py', 'Mahasiswa diberikan percobaan untuk print pesan berdasarkan kondisi True atau False', '# Tuliskan variabel dibawah ini\r\n\r\n\r\ndef pengecekan(angka1, angka2):\r\n    #Tuliskan kode program dibawah ini', '2024-06-03 13:17:37', '2024-06-03 13:17:37'),
(14, 5, '2', 'Kata kunci elif', 'Kerjakan praktikum percobaan 2 dengan mengikuti 6 langkah pada panduan bagian 5.3 hingga hasilnya passed. Selanjutnya isi feedback  pada percobaan ini dengan menekan tombol feedback.', 'python-resources/guidefiles/BAB 5 - If ... Else, Boolean - Percobaan2 (FIX).pdf', 'bab5_percobaan2.py', 'Mahasiswa diberikan percobaan mengenai kata kunci elif', '# Tuliskan variabel dibawah ini\r\n\r\n\r\ndef pengecekanelif(angka1, angka2):\r\n    #Tuliskan kode program dibawah ini', '2024-06-03 13:20:28', '2024-06-04 07:54:34'),
(15, 6, '1', 'While Loop', 'Kerjakan praktikum percobaan 1 dengan mengikuti 5 langkah pada panduan bagian 6.3 hingga hasilnya passed. Selanjutnya isi feedback  pada percobaan ini dengan menekan tombol feedback.', 'python-resources/guidefiles/BAB 6 - While Loops, For Loops - Percobaan1 (FIX).pdf', 'bab6_percobaan1.py', 'Mahasiswa diberikan percobaan mengenai while loop', '# Tuliskan kode program dibawah ini', '2024-06-03 13:23:02', '2024-06-03 13:23:02'),
(16, 6, '2', 'Perulangan menggunakan for', 'Kerjakan praktikum percobaan 2 dengan mengikuti 4 langkah pada panduan bagian 6.3 hingga hasilnya passed. Selanjutnya isi feedback  pada percobaan ini dengan menekan tombol feedback.', 'python-resources/guidefiles/BAB 6 - While Loops, For Loops - Percobaan2 (FIX).pdf', 'bab6_percobaan2.py', 'Mahasiswa diberikan percobaan mengenai perulangan menggunakan for', '# Tuliskan kode program dibawah ini', '2024-06-03 13:25:36', '2024-06-03 13:25:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `std_submit`
--

CREATE TABLE `std_submit` (
  `id_submit` int(11) NOT NULL,
  `id_topic` int(11) NOT NULL,
  `id_percobaan` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `checkstat` varchar(255) NOT NULL,
  `checkresult` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `std_submit`
--

INSERT INTO `std_submit` (`id_submit`, `id_topic`, `id_percobaan`, `userid`, `checkstat`, `checkresult`, `created_at`, `updated_at`) VALUES
(10, 2, 2, 7, 'PASSED', 'The system cannot find the path specified.\n<br>', '2024-07-20 05:44:03', '2024-07-20 05:44:03'),
(11, 1, 1, 7, 'PASSED', 'The system cannot find the path specified.\n<br>', '2024-07-20 05:45:45', '2024-07-20 05:45:45'),
(12, 2, 3, 7, 'PASSED', 'The system cannot find the path specified.\n<br>', '2024-07-20 05:59:28', '2024-07-20 05:59:28');

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
  `bab` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `topik`
--

INSERT INTO `topik` (`id_topik`, `bab`, `nama`, `deskripsi`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Syntax', 'Mahasiswa mengenal dasar-dasar sintaksis dalam bahasa pemrograman Python.', 1, '2024-08-03 05:18:00', '2024-07-06 07:44:29'),
(2, 2, 'Variables', 'Mahasiswa mengenal konsep dan penggunaan variabel untuk menyimpan nilai.', 1, '2024-08-03 05:18:38', '2024-07-06 07:44:43');

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
(1, 'StudentWals', 'student', 'studentwals@gmail.com', NULL, '$2y$10$MvH.4g8pNXlf7yjR3cyv1uoGr0tp.T7PLzZE5hM8nnzWGdd1g/WYW', NULL, 3, 'active', '2024-02-10 10:28:26', '2024-05-31 22:55:30'),
(2, 'AdminWals', 'admin', 'adminwals@gmail.com', NULL, '$2y$10$tIZQdSS4Agd/Dw6L/SEfe.jQL3avyru9TB1tDuuZeXuBWRRDn/F2i', 'FFWjl86L9wCj1gXJnzTGNyYPM4jwYi95Zc628UWfHAdKTpAkoxM26DdNiW6t', 0, 'active', '2024-02-10 11:12:17', '2024-05-31 22:55:44'),
(3, 'TeacherWals', 'teacher', 'teacherwals@gmail.com', NULL, '$2y$10$d.MgC66ykIKEU/iramDmDOVme2bbh5O2bjG4GNb33MXa6yBPoEE5S', 'wdV4uT6zzp6dnN4Qlvf4xy5UwOAxySaqYsImAdYLnFpwYRGZzO31UH5k9Y3v', 0, 'active', '2024-02-10 11:33:45', '2024-05-31 22:55:58'),
(7, 'rianto', 'student', 'rianto@gmail.com', NULL, '$2y$10$oh7U/uqW255g/vizBuNnJ.0o1vdX3MrU1pspvQHCVAWnLLy57WCXy', NULL, 3, 'Active', '2024-07-19 22:38:27', '2024-07-19 22:38:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `validasi`
--

CREATE TABLE `validasi` (
  `id_validation` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `id_percobaan` int(11) NOT NULL,
  `id_submit` bigint(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `time` int(11) DEFAULT NULL,
  `report` text NOT NULL,
  `file_submitted` varchar(70) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `validasi`
--

INSERT INTO `validasi` (`id_validation`, `userid`, `id_percobaan`, `id_submit`, `status`, `time`, `report`, `file_submitted`, `create_at`, `update_at`) VALUES
(10, 7, 2, 10, 'PASSED', NULL, '# Tuliskan kode program dibawah ini\nx=5\ny=\"jhon\"\nprint(x)\nprint(y)', '669b4ea3b18a7_1721454243', '2024-07-20 05:44:03', '2024-07-20 05:44:03'),
(11, 7, 1, 11, 'PASSED', NULL, '# Tuliskan kode program dibawah ini\nprint(\"Hello, World!\")', '669b4f09a8ed8_1721454345', '2024-07-20 05:45:45', '2024-07-20 05:45:45'),
(12, 7, 3, 12, 'PASSED', NULL, '# Tuliskan variabel dibawah ini\n\n\n\numur = 23\ndef konversi(umur):\n return str(umur)\nprint(umur)', '669b5240204e3_1721455168', '2024-07-20 05:59:28', '2024-07-20 05:59:28');

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
  MODIFY `id_feedback` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `percobaan`
--
ALTER TABLE `percobaan`
  MODIFY `id_percobaan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `std_submit`
--
ALTER TABLE `std_submit`
  MODIFY `id_submit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `topik`
--
ALTER TABLE `topik`
  MODIFY `id_topik` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `validasi`
--
ALTER TABLE `validasi`
  MODIFY `id_validation` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Des 2025 pada 15.41
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `custom_batik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin Batik', 'admin@custombtaik.com', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', '2025-12-23 14:20:01', '2025-12-23 14:20:01'),
(2, 'Manager Toko', 'manager@custombatik.com', '866485796cfa8d7c0cf7111640205b83076433547577511d81f8030ae99ecea5', '2025-12-23 14:20:01', '2025-12-23 14:20:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `batik`
--

CREATE TABLE `batik` (
  `id_batik` int(11) NOT NULL,
  `nama_batik` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar_batik` varchar(255) DEFAULT NULL,
  `harga` decimal(15,2) DEFAULT 0.00,
  `stok` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `batik`
--

INSERT INTO `batik` (`id_batik`, `nama_batik`, `deskripsi`, `gambar_batik`, `harga`, `stok`, `created_at`, `updated_at`) VALUES
(1, 'Batik Parang Rusak', 'Motif parang rusak tradisional dengan warna coklat elegan', NULL, 150000.00, 15, '2025-12-23 14:20:01', '2025-12-23 14:20:01'),
(2, 'Batik Ceplok Klasik', 'Pola ceplok klasik Indonesia dengan sentuhan modern', NULL, 120000.00, 20, '2025-12-23 14:20:01', '2025-12-23 14:20:01'),
(3, 'Batik Kawung', 'Motif kawung tradisional Yogyakarta yang timeless', NULL, 135000.00, 18, '2025-12-23 14:20:01', '2025-12-23 14:20:01'),
(4, 'Batik Sidoluhur', 'Motif sidoluhur dengan nuansa warna alam yang hangat', NULL, 140000.00, 12, '2025-12-23 14:20:01', '2025-12-23 14:20:01'),
(5, 'Batik Mega Mendung', 'Mega mendung dengan gradasi warna coklat dan emas', NULL, 155000.00, 10, '2025-12-23 14:20:01', '2025-12-23 14:20:01'),
(6, 'Batik Truntum', 'Motif truntum melambangkan kemakmuran dan keberuntungan', NULL, 125000.00, 22, '2025-12-23 14:20:01', '2025-12-23 14:20:01'),
(7, 'Batik Lasem', 'Batik lasem dengan warna merah dan coklat yang meriah', NULL, 160000.00, 8, '2025-12-23 14:20:01', '2025-12-23 14:20:01'),
(8, 'Batik Banji', 'Motif banji geometris dengan desain kontemporer', NULL, 130000.00, 16, '2025-12-23 14:20:01', '2025-12-23 14:20:01'),
(9, 'Batik Parang Rusak', 'Motif tradisional dari Yogyakarta dengan pola garis diagonal yang melambangkan kekuatan dan keteguhan hati.', NULL, 0.00, 0, '2025-12-23 07:27:55', '2025-12-23 07:27:55'),
(10, 'Batik Megamendung', 'Motif awan yang indah dan mengalun, mencerminkan keindahan alam dan kelancaran rezeki.', NULL, 0.00, 0, '2025-12-23 07:27:55', '2025-12-23 07:27:55'),
(11, 'Batik Kawung', 'Pola lingkaran bulat yang menyerupai buah kolang-kaling, melambangkan keabadian.', NULL, 0.00, 0, '2025-12-23 07:27:55', '2025-12-23 07:27:55'),
(12, 'Batik Garuda', 'Motif burung garuda yang gagah, simbol kewibawaan dan kehormatan bangsa Indonesia.', NULL, 0.00, 0, '2025-12-23 07:27:55', '2025-12-23 07:27:55'),
(13, 'Batik Sekar Jagad', 'Motif bunga-bunga indah yang saling berkaitan, mencerminkan keindahan alam ciptaan Tuhan.', NULL, 0.00, 0, '2025-12-23 07:27:55', '2025-12-23 07:27:55'),
(14, 'Batik Semen', 'Pola kecil yang rumit dengan berbagai elemen alam, melambangkan kesuburan dan kemakmuran.', NULL, 0.00, 0, '2025-12-23 07:27:55', '2025-12-23 07:27:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `custom_order`
--

CREATE TABLE `custom_order` (
  `id_custom` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `jenis_batik` varchar(100) DEFAULT NULL,
  `jenis_kain` varchar(100) DEFAULT NULL,
  `teknik` varchar(100) DEFAULT NULL,
  `teks_tambahan` text DEFAULT NULL,
  `ukuran` varchar(50) DEFAULT NULL,
  `warna_dominan` varchar(50) DEFAULT NULL,
  `status_order` enum('pending','in_progress','completed','cancelled') DEFAULT 'pending',
  `estimasi_selesai` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `custom_order`
--

INSERT INTO `custom_order` (`id_custom`, `id_pelanggan`, `jenis_batik`, `jenis_kain`, `teknik`, `teks_tambahan`, `ukuran`, `warna_dominan`, `status_order`, `estimasi_selesai`, `created_at`, `updated_at`) VALUES
(1, 1, 'Parang Rusak Custom', 'Kain Katun Premium', 'Tulis dan Cap', 'BS_2025', '2m x 1.5m', 'Coklat & Emas', 'in_progress', NULL, '2025-12-23 14:20:01', '2025-12-23 14:20:01'),
(2, 2, 'Ceplok Custom Wedding', 'Kain Silk', 'Tulis Tangan', 'Siti & Budi 2025', '3m x 2m', 'Merah Maroon', 'pending', NULL, '2025-12-23 14:20:01', '2025-12-23 14:20:01'),
(3, 3, 'Kawung Modern', 'Kain Katun', 'Cap Sogan', 'AW', '2.5m x 1.5m', 'Coklat Tua', 'completed', NULL, '2025-12-23 14:20:01', '2025-12-23 14:20:01'),
(4, 4, 'Batik Bunga Custom', 'Kain Rayon', 'Tulis Cap', 'RK_Design', '2m x 1.5m', 'Coklat & Emas', 'pending', NULL, '2025-12-23 14:20:01', '2025-12-23 14:20:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` text DEFAULT NULL,
  `nomor_telepon` varchar(20) DEFAULT NULL,
  `tanggal_daftar` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `email`, `password`, `alamat`, `nomor_telepon`, `tanggal_daftar`, `updated_at`) VALUES
(1, 'Budi Santoso', 'budi@email.com', 'e8979d2eb704c94fa2fa5044edba1c29232526eec3965ffc64308b6783f2de12', 'Jl. Merdeka No. 123, Jakarta', '081234567890', '2025-12-23 14:20:01', '2025-12-23 14:20:01'),
(2, 'Siti Nurhaliza', 'siti@email.com', '71c6e47969179c1e831fcf41f4979a3557290a65d7925e6760cfd316389f0729', 'Jl. Sudirman No. 456, Surabaya', '082345678901', '2025-12-23 14:20:01', '2025-12-23 14:20:01'),
(3, 'Ahmad Wijaya', 'ahmad@email.com', '306098fa01257f8e4809cbdfca258d8c22c7fb12937cc2616ef06aa20fd8008e', 'Jl. Ahmad Yani No. 789, Bandung', '083456789012', '2025-12-23 14:20:01', '2025-12-23 14:20:01'),
(4, 'Rina Kusuma', 'rina@email.com', '041e4e852c36528e050e1d979f30b59870a2353ae6a06a9606f7b353d8a0e8d5', 'Jl. Gatot Subroto No. 321, Yogyakarta', '084567890123', '2025-12-23 14:20:01', '2025-12-23 14:20:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_custom_batik`
--

CREATE TABLE `pembayaran_custom_batik` (
  `id_pembayaran` int(11) NOT NULL,
  `id_custom` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `tgl` date NOT NULL,
  `total_harga` decimal(15,2) NOT NULL,
  `metode_pembayaran` varchar(50) DEFAULT NULL,
  `status_pembayaran` enum('pending','completed','failed') DEFAULT 'pending',
  `catatan` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran_custom_batik`
--

INSERT INTO `pembayaran_custom_batik` (`id_pembayaran`, `id_custom`, `id_admin`, `tgl`, `total_harga`, `metode_pembayaran`, `status_pembayaran`, `catatan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-12-15', 850000.00, 'Transfer Bank', 'completed', NULL, '2025-12-23 14:20:01', '2025-12-23 14:20:01'),
(2, 3, 1, '2025-12-10', 650000.00, 'Tunai', 'completed', NULL, '2025-12-23 14:20:01', '2025-12-23 14:20:01'),
(3, 2, 2, '2025-12-20', 1200000.00, 'Transfer Bank', 'pending', NULL, '2025-12-23 14:20:01', '2025-12-23 14:20:01'),
(4, 4, 2, '2025-12-22', 750000.00, 'E-Wallet', 'pending', NULL, '2025-12-23 14:20:01', '2025-12-23 14:20:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `batik`
--
ALTER TABLE `batik`
  ADD PRIMARY KEY (`id_batik`),
  ADD KEY `idx_batik_nama` (`nama_batik`);

--
-- Indeks untuk tabel `custom_order`
--
ALTER TABLE `custom_order`
  ADD PRIMARY KEY (`id_custom`),
  ADD KEY `idx_custom_order_status` (`status_order`),
  ADD KEY `idx_custom_order_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idx_pelanggan_email` (`email`);

--
-- Indeks untuk tabel `pembayaran_custom_batik`
--
ALTER TABLE `pembayaran_custom_batik`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_custom` (`id_custom`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `idx_pembayaran_status` (`status_pembayaran`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `batik`
--
ALTER TABLE `batik`
  MODIFY `id_batik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `custom_order`
--
ALTER TABLE `custom_order`
  MODIFY `id_custom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pembayaran_custom_batik`
--
ALTER TABLE `pembayaran_custom_batik`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `custom_order`
--
ALTER TABLE `custom_order`
  ADD CONSTRAINT `custom_order_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran_custom_batik`
--
ALTER TABLE `pembayaran_custom_batik`
  ADD CONSTRAINT `pembayaran_custom_batik_ibfk_1` FOREIGN KEY (`id_custom`) REFERENCES `custom_order` (`id_custom`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_custom_batik_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

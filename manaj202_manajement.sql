-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 03 Jun 2025 pada 10.46
-- Versi server: 11.4.5-MariaDB-cll-lve
-- Versi PHP: 8.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manaj202_manajement`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bejana_tekans`
--

CREATE TABLE `bejana_tekans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `jenis_pesawat` varchar(255) NOT NULL,
  `tempat_pembuatan` varchar(255) NOT NULL,
  `no_seri` varchar(255) NOT NULL,
  `bentuk_bejana` varchar(255) NOT NULL,
  `tekanan_kerja` varchar(255) NOT NULL,
  `volume` varchar(255) NOT NULL,
  `bahan_diisi` varchar(255) NOT NULL,
  `no_izin_pemakaian` varchar(255) NOT NULL,
  `tanggal_berlaku` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bejana_tekans`
--

INSERT INTO `bejana_tekans` (`id`, `kode`, `jenis_pesawat`, `tempat_pembuatan`, `no_seri`, `bentuk_bejana`, `tekanan_kerja`, `volume`, `bahan_diisi`, `no_izin_pemakaian`, `tanggal_berlaku`, `tanggal_input`, `status`, `created_at`, `updated_at`) VALUES
(4, '919191919', '9191919', '9191919', '91919', '91919', '191919', '919191', '91919', '91919', '2025-05-17', '2025-05-17', 'active', '2025-05-17 00:23:24', '2025-05-17 00:23:24'),
(5, '231333', 'Pesawat', 'Pabrik', '565667', 'Bghhh', 'Ggggg', 'Cgggg', 'Ggggh', 'Fggggt', '2025-05-15', '2025-05-28', 'active', '2025-05-28 02:20:24', '2025-05-28 02:20:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('admin@mail.com|182.1.116.52', 'i:1;', 1748420862),
('admin@mail.com|182.1.116.52:timer', 'i:1748420862;', 1748420862),
('setting_address', 's:24:\"Jl.Rajawali Panti Jember\";', 2063782970),
('setting_email', 's:15:\"admin@gmail.com\";', 2063782970),
('setting_favicon', 's:52:\"setting/5mtjZ0ewrNbOavZ8v3cH7GHfwtOIvRAjAal5ibcn.jpg\";', 2063774083),
('setting_logo', 's:52:\"setting/Kj22f0gNZiwCn2R6N7oUi4ryzV4KDqnP1rlh9Hit.png\";', 2063773798),
('setting_phone', 's:12:\"081336920647\";', 2063782970),
('setting_site_name', 's:4:\"Nama\";', 2063774083),
('setting_website', 's:6:\"asssss\";', 2063782970);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Struktur dari tabel `ga_archive_data`
--

CREATE TABLE `ga_archive_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no` varchar(255) DEFAULT NULL,
  `filling_number` varchar(255) NOT NULL,
  `cabinet_number` varchar(255) NOT NULL,
  `document_name` varchar(255) NOT NULL,
  `document_file` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `is_generate_qrcode` tinyint(1) NOT NULL DEFAULT 1,
  `unique_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ga_archive_data`
--

INSERT INTO `ga_archive_data` (`id`, `no`, `filling_number`, `cabinet_number`, `document_name`, `document_file`, `date`, `category`, `is_generate_qrcode`, `unique_id`, `created_at`, `updated_at`) VALUES
(1, '01010 update', '0101010', '0101010', 'hahahah', '1747545343_list data master.pdf', '2025-05-18', 'Surat', 1, 'archive_6829774848b93', '2025-05-17 22:15:43', '2025-05-17 22:59:36'),
(2, 'aaa', 'aaa', '1010173936382628', 'aaa', '1747546328_TtrlAaE62qBWH93I3aF0drSbywittOyaxOl6M042.png', '2025-05-18', 'Surat', 1, 'archive_682d91e2c60f3', '2025-05-17 22:32:08', '2025-05-21 01:42:10'),
(3, 'aaaa', 'aaaa', '10172863816382', 'aaaa', 'documents/1748338897_Revisi website.pdf', '2025-05-18', 'Surat', 1, 'archive_683588d124588', '2025-05-17 22:32:55', '2025-05-27 02:41:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gensets`
--

CREATE TABLE `gensets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `jenis_alat` varchar(255) NOT NULL,
  `nama_pabrik_pembuatan` varchar(255) NOT NULL,
  `tempat_pembuatan` varchar(255) NOT NULL,
  `nomor_pabrik_pembuatan` varchar(255) NOT NULL,
  `daya` varchar(255) NOT NULL,
  `no_pengesahan` varchar(255) NOT NULL,
  `tanggal_berlaku` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `gensets`
--

INSERT INTO `gensets` (`id`, `kode`, `jenis_alat`, `nama_pabrik_pembuatan`, `tempat_pembuatan`, `nomor_pabrik_pembuatan`, `daya`, `no_pengesahan`, `tanggal_berlaku`, `tanggal_input`, `status`, `created_at`, `updated_at`) VALUES
(1, 'aaaa update', 'aaa', 'aaa', 'aaa', 'aaa', 'aaa', 'aaa', '2025-05-17', '2025-05-17', 'active', '2025-05-17 05:44:20', '2025-05-17 05:49:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `instalasi_hydrants`
--

CREATE TABLE `instalasi_hydrants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `kapasitas` varchar(255) NOT NULL,
  `pilar_hydrant` varchar(255) NOT NULL,
  `kontak_hydrant` varchar(255) NOT NULL,
  `selang` varchar(255) NOT NULL,
  `hose_reel` varchar(255) NOT NULL,
  `pipa_pancar` varchar(255) NOT NULL,
  `mesin_penggerak` varchar(255) NOT NULL,
  `pompa` varchar(255) NOT NULL,
  `tekanan_kerja_max` double NOT NULL,
  `no_ijin_pemakaian` varchar(255) NOT NULL,
  `tanggal_berlaku_sd` date NOT NULL,
  `tanggal_input` date NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `instalasi_hydrants`
--

INSERT INTO `instalasi_hydrants` (`id`, `kode`, `kapasitas`, `pilar_hydrant`, `kontak_hydrant`, `selang`, `hose_reel`, `pipa_pancar`, `mesin_penggerak`, `pompa`, `tekanan_kerja_max`, `no_ijin_pemakaian`, `tanggal_berlaku_sd`, `tanggal_input`, `status`, `created_at`, `updated_at`) VALUES
(3, '1111', '111', '111', '111', '111', '111', '111', '1111', '111', 111, '1111', '2025-05-17', '2025-05-17', 'active', '2025-05-17 04:07:43', '2025-05-17 04:07:43'),
(4, '1111', '111', '111', '111', '111', '111', '111', '1111', '111', 111, '1111', '2025-05-17', '2025-05-17', 'inactive', '2025-05-17 04:09:34', '2025-05-17 04:45:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `instalasi_listriks`
--

CREATE TABLE `instalasi_listriks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_arus` varchar(255) NOT NULL,
  `jumlah_daya` varchar(255) NOT NULL,
  `sumber_tenaga_listrik` varchar(255) NOT NULL,
  `no_pengasahaan` varchar(255) NOT NULL,
  `tanggal_berlaku` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `instalasi_listriks`
--

INSERT INTO `instalasi_listriks` (`id`, `jenis_arus`, `jumlah_daya`, `sumber_tenaga_listrik`, `no_pengasahaan`, `tanggal_berlaku`, `tanggal_input`, `status`, `created_at`, `updated_at`) VALUES
(1, 'aaaa update', 'aaaa', 'aaa', 'aaaa', '2025-05-17', '2025-05-17', 'active', '2025-05-17 05:19:53', '2025-05-17 05:26:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ketel_uaps`
--

CREATE TABLE `ketel_uaps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `akte_izin_no` varchar(255) NOT NULL,
  `tanggal_berlaku` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ketel_uaps`
--

INSERT INTO `ketel_uaps` (`id`, `kode`, `nama`, `akte_izin_no`, `tanggal_berlaku`, `created_at`, `updated_at`) VALUES
(2, 'aaaa', 'aaaa', 'aaaa', '2025-05-22', '2025-05-21 18:53:59', '2025-05-21 18:53:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lain_lains`
--

CREATE TABLE `lain_lains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama_perijinan` varchar(255) NOT NULL,
  `no_perijinan` varchar(255) NOT NULL,
  `di_terbitkan_oleh` varchar(255) NOT NULL,
  `tanggal_dikeluarkan` varchar(255) NOT NULL,
  `tanggal_berlaku` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lain_lains`
--

INSERT INTO `lain_lains` (`id`, `kode`, `nama_perijinan`, `no_perijinan`, `di_terbitkan_oleh`, `tanggal_dikeluarkan`, `tanggal_berlaku`, `created_at`, `updated_at`) VALUES
(1, 'aaaaa update', 'aaaa', 'aaaa', 'aaaa', '2025-05-18', '2025-05-18', '2025-05-17 21:45:14', '2025-05-17 21:47:23');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_16_153732_create_bejana_tekans_table', 2),
(5, '2025_05_17_072926_create_instalasi_hydrants_table', 3),
(6, '2025_05_17_115514_create_instalasi_listriks_table', 4),
(7, '2025_05_17_122808_create_gensets_table', 5),
(8, '2025_05_17_160541_create_ketel_uaps_table', 6),
(9, '2025_05_17_162524_create_penyalur_petirs_table', 7),
(10, '2025_05_18_043135_create_lain_lains_table', 8),
(11, '2025_05_18_044937_create_ga_archive_data_table', 9),
(12, '2025_05_18_060207_create_vendor_archive_data_table', 10),
(13, '2025_05_18_062641_add_column_to_vendor_achives_table', 11),
(14, '2025_05_18_154122_create_vendor_forms_table', 12),
(15, '2025_05_18_164705_add_columns_to_users_table', 13),
(16, '2025_05_18_165104_create_surat_izin_operators_table', 14),
(17, '2025_05_21_121135_create_settings_table', 15),
(18, '2025_05_28_075020_create_notifications_table', 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyalur_petirs`
--

CREATE TABLE `penyalur_petirs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) DEFAULT NULL,
  `jenis_penyalur_petir` varchar(255) NOT NULL,
  `radius_proteksi` varchar(255) NOT NULL,
  `panjang_bangunan` varchar(255) NOT NULL,
  `lebar_bangunan` varchar(255) NOT NULL,
  `tinggi_penyalur` varchar(255) NOT NULL,
  `bentuk_elektroda` varchar(255) NOT NULL,
  `alat_ukur` varchar(255) NOT NULL,
  `pelaksana_pemasangan` varchar(255) NOT NULL,
  `tanggal_berlaku_sampai` date NOT NULL,
  `tanggal_input` date DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penyalur_petirs`
--

INSERT INTO `penyalur_petirs` (`id`, `kode`, `jenis_penyalur_petir`, `radius_proteksi`, `panjang_bangunan`, `lebar_bangunan`, `tinggi_penyalur`, `bentuk_elektroda`, `alat_ukur`, `pelaksana_pemasangan`, `tanggal_berlaku_sampai`, `tanggal_input`, `status`, `created_at`, `updated_at`) VALUES
(1, 'aaa update', 'aaa', 'aaa', 'aaa', 'aaa', 'aaaa', 'aaa', 'aaaa', 'aaa', '2025-05-17', '2025-05-17', 'inactive', '2025-05-17 09:50:39', '2025-05-17 09:51:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('9yR1sipzEozZFRoUKph6B2GVSZhkiI4kLP55sL0E', NULL, '20.171.207.166', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.2; +https://openai.com/gptbot)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWEtHbU14U0tZVUtTWkRQQlhZN2tsUVVmSFpjWXNoVHFzeGk3d0pVbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vbWFuYWplbWVudC54eXoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1748922321),
('coz1yyzZZBk8cn7oBRiTQje92UUzg6TQ9w5toBos', NULL, '103.16.198.9', 'Python/3.11 aiohttp/3.9.2', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOFZobzBYZUFGWXVxNktnT0xIMlo5T2JLTEFVeWZ0Z3FXVzdqNVBhTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly9tYW5hZ2VtZW50LWszLmdlbmVyYS5teS5pZC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1748529329),
('h0K458aQAFULLrhWQG7RYE7xU6lZUKp6t7I7yUoS', 1, '182.3.38.211', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNWRBTExCWXNaV2Y2Tkl1Nk1WeFJWdjFJeUFkZzh6SGJNUXVwc3FsbiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHBzOi8vbWFuYWdlbWVudC1rMy5nZW5lcmEubXkuaWQvYmVqYW5hLXRla2FuLzMvZWRpdCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1748530133),
('KCCM41ZT4RXjPehKUkeeFgkAbSHOAIh4AbAuMHq2', 1, '182.1.119.122', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTVREY3pjZ09KNmpxOXh2c25rdTNkRU5GZmZ6cm1NVVJraWtHSDBRVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHBzOi8vbWFuYWdlbWVudC1rMy5nZW5lcmEubXkuaWQvYmVqYW5hLXRla2FuLzQvY2V0YWsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1748528611),
('l3z83rgi1fdOFK4ud431wuI8iRdo2kIBVnnkPvSW', NULL, '103.16.198.9', 'Python/3.11 aiohttp/3.9.2', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic1pDYThuSFJuUjJEMGcxa3dGUkgwZ20yZ0tRVnVsT2hqTThJUWwyMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly9tYW5hZ2VtZW50LWszLmdlbmVyYS5teS5pZC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1748525734),
('o5aGqtVEKFiA8GO2cdLshzARvIzZ5KORi7YiiEn9', NULL, '103.16.198.9', 'Python/3.11 aiohttp/3.9.2', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiemg3TmhmS2tRaTB6MW9vb2l1VUpnd3dMNmpEc3FNd0pENmxveDhkQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly9tYW5hZ2VtZW50LWszLmdlbmVyYS5teS5pZC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1748523934),
('Vg7GzHZ4KHqMtvRDTgyhHz8TExxsbBe8szJvqrSF', NULL, '103.16.198.9', 'Python/3.11 aiohttp/3.9.2', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWktQcmo0SjVIbjRORlBHdnBoSXNzTm1KTEJ1d2tCa1ZKb3JITXVYaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly9tYW5hZ2VtZW50LWszLmdlbmVyYS5teS5pZC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1748522129),
('XOWZMtjsjyZErTRsOza6aBogiShsPMRXlQjwN0Nb', NULL, '103.16.198.9', 'Python/3.11 aiohttp/3.9.2', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic1ZRYUpQbFQzMWpsRFRIZzRuanExcFBQZUhFOVdVZTFUY2t3U3VhbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly9tYW5hZ2VtZW50LWszLmdlbmVyYS5teS5pZC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1748520332),
('yc4tDzTIdssjd3eFyiqpb0okXxkkfUn0CVzdCQaa', NULL, '103.16.198.9', 'Python/3.11 aiohttp/3.9.2', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVzUyaXJSaXNma0M4Wm92cnczNnBZdEhuNkhzQmtjN0FFbnBlMWJWWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly9tYW5hZ2VtZW50LWszLmdlbmVyYS5teS5pZC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1748527530),
('ZG1Aj9nCQ3iNKVquDIK4ayDlqD4ATRNShD3KNdwb', NULL, '182.3.37.82', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSVUxb1VtZXVBd1NyVGw4Wm9VUENGQ0VLVFNLbU00RVNMZHh1cVc3ZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vbWFuYWplbWVudC54eXoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1748922323),
('zqpqpv61QB0KjyKmTEgO36DHBo9JUpJc3mmULMJF', NULL, '103.189.123.8', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.6312.118 Mobile Safari/537.36 XiaoMi/MiuiBrowser/14.32.0-gn', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSHU0a3VQMmZRbHBDNko5dmxwTVVUaVRxeU14cnRxZDVYTzg2V0wyUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHBzOi8vbWFuYWdlbWVudC1rMy5nZW5lcmEubXkuaWQvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1748528526);

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'Nama', NULL, NULL),
(2, 'phone', '081336920647', NULL, NULL),
(3, 'address', 'Jl.Rajawali Panti Jember', NULL, NULL),
(4, 'email', 'admin@gmail.com', NULL, NULL),
(5, 'website', 'asssss', NULL, NULL),
(6, 'logo', 'setting/Kj22f0gNZiwCn2R6N7oUi4ryzV4KDqnP1rlh9Hit.png', NULL, NULL),
(7, 'favicon', 'setting/5mtjZ0ewrNbOavZ8v3cH7GHfwtOIvRAjAal5ibcn.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_izin_operators`
--

CREATE TABLE `surat_izin_operators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `no_sertifikat` varchar(255) NOT NULL,
  `jenis_sertifikat` varchar(255) NOT NULL,
  `tanggal_berlaku` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `surat_izin_operators`
--

INSERT INTO `surat_izin_operators` (`id`, `user_id`, `no_sertifikat`, `jenis_sertifikat`, `tanggal_berlaku`, `created_at`, `updated_at`) VALUES
(1, 1, 'asasas', 'aaaaa', '2025-05-19', '2025-05-18 10:15:00', '2025-05-18 10:15:00');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','user','manajer') NOT NULL DEFAULT 'user',
  `nik` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `departemen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `nik`, `jabatan`, `departemen`) VALUES
(1, 'Test User update', 'admin@gmail.com', '2025-05-16 08:06:46', '$2y$12$XsV7aQO51SLIqSCB/Z3WKuASqg2.ub676VaneCiQdvZRh/m5jVnxi', 'QpYTyk1WvxMFZ24Dhk4kVsnGYnuoku8DCnAxoSAXoAmdfmpAyDVZiuZT20fY', '2025-05-16 08:06:47', '2025-05-21 02:36:44', 'admin', '11111', 'manajer', 'manaja'),
(2, 'abdul mukti', 'abdulmukti40390@gmail.com', NULL, '$2y$12$ci/retsmEn.4flXR2LVtNu2w/41./LpgRq03e7ZVNbrUBxFPOb.Rm', NULL, '2025-05-21 02:52:14', '2025-05-21 02:52:14', 'user', '011011919', 'mahasisiwa', 'Developer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor_archive_data`
--

CREATE TABLE `vendor_archive_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no` varchar(255) DEFAULT NULL,
  `filling_number` varchar(255) NOT NULL,
  `cabinet_number` varchar(255) NOT NULL,
  `document_number` varchar(255) NOT NULL,
  `file_document` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `is_generate_qrcode` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unique_id` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vendor_archive_data`
--

INSERT INTO `vendor_archive_data` (`id`, `no`, `filling_number`, `cabinet_number`, `document_number`, `file_document`, `date`, `company_name`, `is_generate_qrcode`, `created_at`, `updated_at`, `unique_id`) VALUES
(1, 'aaaa update', 'aaa update', '017382637272', 'aa', '1747580268_TtrlAaE62qBWH93I3aF0drSbywittOyaxOl6M042.png', '2025-04-18', 'aaaaaa', 1, '2025-05-18 07:57:48', '2025-05-21 04:52:41', 'vendor_archive_682dbe89e01ac');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor_forms`
--

CREATE TABLE `vendor_forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no` varchar(255) NOT NULL,
  `core_of_business` varchar(255) NOT NULL,
  `full_company_name` varchar(255) NOT NULL,
  `npwd` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `trading_term` varchar(255) NOT NULL,
  `payment_term` varchar(255) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_position` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `document_expiry_date` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vendor_forms`
--

INSERT INTO `vendor_forms` (`id`, `no`, `core_of_business`, `full_company_name`, `npwd`, `address`, `postal_code`, `city`, `region`, `country`, `phone`, `fax`, `website`, `state`, `trading_term`, `payment_term`, `contact_name`, `contact_position`, `email_address`, `mobile_number`, `document_expiry_date`, `status`, `created_at`, `updated_at`) VALUES
(2, 'aaa', 'aa', 'aa', 'aaa', 'aa', 'aaa', 'aaa', 'aaa', 'aaa', 'aa', 'aaa', 'aaa', 'aaa', 'aaa', 'aaa', 'aaa', 'aaa', 'admin@gmail.com', 'aaa', '2025-05-19', 'active', '2025-05-18 10:23:20', '2025-05-18 10:23:20');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bejana_tekans`
--
ALTER TABLE `bejana_tekans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `ga_archive_data`
--
ALTER TABLE `ga_archive_data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gensets`
--
ALTER TABLE `gensets`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `instalasi_hydrants`
--
ALTER TABLE `instalasi_hydrants`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `instalasi_listriks`
--
ALTER TABLE `instalasi_listriks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ketel_uaps`
--
ALTER TABLE `ketel_uaps`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lain_lains`
--
ALTER TABLE `lain_lains`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `penyalur_petirs`
--
ALTER TABLE `penyalur_petirs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indeks untuk tabel `surat_izin_operators`
--
ALTER TABLE `surat_izin_operators`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surat_izin_operators_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `vendor_archive_data`
--
ALTER TABLE `vendor_archive_data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vendor_forms`
--
ALTER TABLE `vendor_forms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bejana_tekans`
--
ALTER TABLE `bejana_tekans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ga_archive_data`
--
ALTER TABLE `ga_archive_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `gensets`
--
ALTER TABLE `gensets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `instalasi_hydrants`
--
ALTER TABLE `instalasi_hydrants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `instalasi_listriks`
--
ALTER TABLE `instalasi_listriks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ketel_uaps`
--
ALTER TABLE `ketel_uaps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `lain_lains`
--
ALTER TABLE `lain_lains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `penyalur_petirs`
--
ALTER TABLE `penyalur_petirs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `surat_izin_operators`
--
ALTER TABLE `surat_izin_operators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `vendor_archive_data`
--
ALTER TABLE `vendor_archive_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `vendor_forms`
--
ALTER TABLE `vendor_forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `surat_izin_operators`
--
ALTER TABLE `surat_izin_operators`
  ADD CONSTRAINT `surat_izin_operators_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

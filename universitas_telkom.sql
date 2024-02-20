-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2023 at 08:19 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `universitas_telkom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `foto` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_id`, `nama`, `telepon`, `foto`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Admin Kampus TU', '085737125437', 'user.png', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `current_semester`
--

CREATE TABLE `current_semester` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun_ajaran` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `current_semester`
--

INSERT INTO `current_semester` (`id`, `tahun_ajaran`, `semester`, `created_at`, `updated_at`) VALUES
(1, '2022-2023', 'Genap', '2023-03-10 15:56:09', '2023-06-13 04:28:14');

-- --------------------------------------------------------

--
-- Table structure for table `deadline_prasidang`
--

CREATE TABLE `deadline_prasidang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prodi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `periode_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deadline_prasidang`
--

INSERT INTO `deadline_prasidang` (`id`, `prodi_id`, `periode_id`, `deadline`, `created_at`, `updated_at`) VALUES
(1, 1, 9, '2022-11-26', NULL, '2022-11-10 07:04:25'),
(2, 1, 10, '2022-04-10', NULL, '2023-05-30 16:26:06'),
(3, 1, 12, '2023-08-11', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `deadline_proposal`
--

CREATE TABLE `deadline_proposal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prodi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `periode_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deadline_proposal`
--

INSERT INTO `deadline_proposal` (`id`, `prodi_id`, `periode_id`, `deadline`, `created_at`, `updated_at`) VALUES
(1, 1, 13, '2022-11-26', NULL, NULL),
(2, 1, 10, '2022-02-09', NULL, NULL),
(3, 1, 12, '2023-08-11', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `deadline_sidang`
--

CREATE TABLE `deadline_sidang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prodi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `periode_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deadline_sidang`
--

INSERT INTO `deadline_sidang` (`id`, `prodi_id`, `periode_id`, `deadline`, `created_at`, `updated_at`) VALUES
(1, 1, 11, '2022-11-26', NULL, NULL),
(2, 1, 10, '2022-08-10', NULL, NULL),
(3, 1, 12, '2023-08-11', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_nilai_prasidang`
--

CREATE TABLE `detail_nilai_prasidang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nilai_prasidang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `komponen_prasidang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nilai` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_nilai_proposal`
--

CREATE TABLE `detail_nilai_proposal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nilai_proposal_id` bigint(20) UNSIGNED DEFAULT NULL,
  `komponen_proposal_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nilai` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_nilai_proposal`
--

INSERT INTO `detail_nilai_proposal` (`id`, `nilai_proposal_id`, `komponen_proposal_id`, `nilai`, `created_at`, `updated_at`, `deleted_at`) VALUES
(89, 10, 27, 15, '2023-06-17 15:41:52', '2023-06-17 15:41:52', NULL),
(90, 10, 28, 15, '2023-06-17 15:41:52', '2023-06-17 15:41:52', NULL),
(91, 10, 29, 7, '2023-06-17 15:41:52', '2023-06-17 15:41:52', NULL),
(92, 10, 30, 15, '2023-06-17 15:41:52', '2023-06-17 15:41:52', NULL),
(93, 10, 31, 15, '2023-06-17 15:41:52', '2023-06-17 15:41:52', NULL),
(94, 11, 27, 10, '2023-06-17 17:53:01', '2023-06-17 18:06:20', NULL),
(95, 11, 28, 10, '2023-06-17 17:53:01', '2023-06-17 18:06:20', NULL),
(96, 11, 29, 10, '2023-06-17 17:53:01', '2023-06-17 18:06:20', NULL),
(97, 11, 30, 15, '2023-06-17 17:53:01', '2023-06-17 18:06:20', NULL),
(98, 11, 31, 25, '2023-06-17 17:53:01', '2023-06-17 18:06:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_nilai_sidang`
--

CREATE TABLE `detail_nilai_sidang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nilai_sidang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `komponen_sidang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nilai` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `periode_id` bigint(20) UNSIGNED DEFAULT NULL,
  `dosen_import_id` bigint(20) UNSIGNED DEFAULT NULL,
  `prodi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nama_gelar` varchar(255) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `kode` varchar(255) DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `foto` longtext DEFAULT NULL,
  `tahun_ajaran` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `user_id`, `periode_id`, `dosen_import_id`, `prodi_id`, `nama`, `nama_gelar`, `nip`, `kode`, `telepon`, `alamat`, `foto`, `tahun_ajaran`, `semester`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 9, 2, NULL, 'Patrick Adolf Telnoni', 'Patrick Adolf Telnoni, S.T., M.T.', '5171', 'PTI', '+62 822-1928-7517', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-08-16 09:34:30', '2022-08-16 09:34:30', NULL),
(2, 3, 9, 2, NULL, 'Dedy Rahman Wijaya', 'Dr. Dedy Rahman Wijaya, S.T., M.T.', '5172', 'DRW', '+62 822-1914-7349', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-08-16 09:34:30', '2022-08-16 09:34:30', NULL),
(3, 4, 9, 2, NULL, 'Hanung Nindito Prasetyo', 'Hanung Nindito Prasetyo, S.Si, M.T.', '5173', 'HNP', '+62 812-2059-9883', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-08-16 09:34:30', '2022-08-16 09:34:30', NULL),
(4, 5, 9, 2, NULL, 'M. Barja Sanjaya', 'M. Barja Sanjaya, S.T., M.T., OCA.', '5174', 'MBS', '+62 813-1314-1120', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-08-16 09:34:30', '2022-08-16 09:34:30', NULL),
(5, 6, 9, 2, NULL, 'Siska Komala Sari', 'Siska Komala Sari, S.T., M.T.', '5175', 'SKS', '+62 813-2019-8038', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-08-16 09:34:30', '2022-08-16 09:34:30', NULL),
(6, 7, 9, 2, NULL, 'Wawa Wikusna', 'Wawa Wikusna, S.T., M.Kom.', '5176', 'WIU', '+62 813-2060-4160', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-08-16 09:34:30', '2022-08-16 09:34:30', NULL),
(7, 8, 9, 2, NULL, 'Elis Hernawati', 'Elis Hernawati, S.T., M.Kom.', '5177', 'ELT', '+62 822-4003-5983', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-08-16 09:34:31', '2022-08-16 09:34:31', NULL),
(8, 9, 9, 2, NULL, 'Inne Gartina Husein', 'Dr. Inne Gartina Husein, S.Kom., M.T.', '5178', 'INE', '+62 813-9509-6162', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-08-16 09:34:31', '2022-08-16 09:34:31', NULL),
(9, 10, 9, 2, NULL, 'Pramuko Aji', 'Pramuko Aji, S.T., M.T.', '5179', 'PRA', '+62 821-8008-5050', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-08-16 09:34:31', '2022-08-16 09:34:31', NULL),
(10, 11, 9, 2, NULL, 'Suryatiningsih', 'Suryatiningsih, S.T., M.T., OCA., C.Ht.', '5180', 'SYN', '+62 813-2077-6520', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-08-16 09:34:31', '2022-08-16 09:34:31', NULL),
(11, 12, 9, 2, NULL, 'Tedi Gunawan', 'Tedi Gunawan, S.T., M.Kom.', '5181', 'TGN', '+62 812-2199-440', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-08-16 09:34:31', '2022-08-16 09:34:31', NULL),
(12, 13, 9, 2, NULL, 'Pikir Wisnu Wijayanto', 'Dr. Pikir Wisnu Wijayanto, S.E., S.Pd.Ing., M.Hum.', '5182', 'PWW', '+62 851-0387-9393', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-08-16 09:34:31', '2022-08-16 09:34:31', NULL),
(13, 14, 9, 2, NULL, 'Ely Rosely', 'Ir. Ely Rosely, M.B.S.', '5183', 'ELR', '+62 815-1324-4609', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-08-16 09:34:31', '2022-08-16 09:34:31', NULL),
(14, 15, 9, 2, NULL, 'Mutia Qana\'a', 'Mutia Qana\'a, S.Psi., M.Psi.', '5184', 'MQA', '+62 852-2279-7846', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-08-16 09:34:31', '2022-08-16 09:34:31', NULL),
(15, 16, 9, 2, NULL, 'Wahyu Hidayat', 'Wahyu Hidayat, S.T., M.T., OCA.', '5185', 'WHY', '+62 813-2207-2099', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-08-16 09:34:31', '2022-08-16 09:34:31', NULL),
(16, 17, 9, 2, NULL, 'Robbi Hendriyanto', 'Robbi Hendriyanto, S.T., M.T.', '5186', 'RHN', '+62 823-1604-9294', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-08-16 09:34:31', '2022-08-16 09:34:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dosen_import`
--

CREATE TABLE `dosen_import` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `periode_id` bigint(20) UNSIGNED DEFAULT NULL,
  `prodi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tahun_ajaran` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosen_import`
--

INSERT INTO `dosen_import` (`id`, `periode_id`, `prodi_id`, `tahun_ajaran`, `semester`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 9, 1, '2021-2022', 'Genap', '2022-08-16 09:34:28', '2022-08-16 09:34:28', NULL),
(4, 9, 3, '2021-2022', 'Genap', '2022-08-16 10:52:58', '2022-08-16 10:52:58', NULL),
(5, 9, 1, '2021-2022', 'Genap', '2022-08-16 11:37:51', '2022-08-16 11:37:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dosen_kaprodi`
--

CREATE TABLE `dosen_kaprodi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `periode_id` bigint(20) UNSIGNED DEFAULT NULL,
  `dosen_id` bigint(20) UNSIGNED DEFAULT NULL,
  `prodi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tahun_ajaran` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `awal_menjabat` date DEFAULT NULL,
  `akhir_menjabat` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosen_kaprodi`
--

INSERT INTO `dosen_kaprodi` (`id`, `periode_id`, `dosen_id`, `prodi_id`, `tahun_ajaran`, `semester`, `awal_menjabat`, `akhir_menjabat`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 9, 13, 1, '2021-2022', 'Ganjil', '2022-08-01', '2023-03-15', '2022-08-16 09:35:06', '2023-06-13 01:59:15', '2023-06-13 01:59:15'),
(2, 11, 3, 2, '2022-2023', 'Ganjil', '2022-08-01', '2023-03-15', '2022-08-16 09:46:54', '2022-08-16 09:46:54', NULL),
(3, 12, 7, 1, '2022-2023', 'Genap', '2023-06-13', NULL, '2023-06-13 01:59:40', '2023-06-13 01:59:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dosen_koordinator_pa`
--

CREATE TABLE `dosen_koordinator_pa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `periode_id` bigint(20) UNSIGNED DEFAULT NULL,
  `dosen_id` bigint(20) UNSIGNED DEFAULT NULL,
  `prodi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tahun_ajaran` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosen_koordinator_pa`
--

INSERT INTO `dosen_koordinator_pa` (`id`, `periode_id`, `dosen_id`, `prodi_id`, `tahun_ajaran`, `semester`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 9, 1, 1, '2021-2022', 'Ganjil', '2022-08-16 14:18:58', '2022-08-16 14:18:58', NULL),
(2, 11, 2, 1, '2022-2023', 'Ganjil', '2022-11-10 05:00:41', '2022-11-10 05:00:41', NULL),
(3, 12, 8, 1, '2022-2023', 'Genap', '2022-11-10 06:51:18', '2022-11-10 06:51:18', NULL),
(4, 13, 8, 1, '2023-2024', 'Ganjil', '2022-11-16 04:13:18', '2023-06-13 01:56:18', '2023-06-13 01:56:18'),
(5, 10, 7, 1, '2021-2022', 'Genap', '2023-06-13 03:43:00', '2023-06-13 03:43:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `histori_judul_prasidang`
--

CREATE TABLE `histori_judul_prasidang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prasidang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `judul_indo_lama` varchar(255) DEFAULT NULL,
  `judul_indo_baru` varchar(255) DEFAULT NULL,
  `judul_inggris_lama` varchar(255) DEFAULT NULL,
  `judul_inggris_baru` varchar(255) DEFAULT NULL,
  `aksi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `histori_judul_proposal`
--

CREATE TABLE `histori_judul_proposal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `proposal_id` bigint(20) UNSIGNED DEFAULT NULL,
  `judul_indo_lama` varchar(255) DEFAULT NULL,
  `judul_indo_baru` varchar(255) DEFAULT NULL,
  `judul_inggris_lama` varchar(255) DEFAULT NULL,
  `judul_inggris_baru` varchar(255) DEFAULT NULL,
  `aksi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_prasidang`
--

CREATE TABLE `jadwal_prasidang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prasidang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ruangan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tanggal_prasidang` date DEFAULT NULL,
  `bulan` int(11) DEFAULT NULL,
  `jam_mulai_prasidang` time DEFAULT NULL,
  `jam_selesai_prasidang` time DEFAULT NULL,
  `ruangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_sidang`
--

CREATE TABLE `jadwal_sidang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sidang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ruangan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tanggal_sidang` date DEFAULT NULL,
  `bulan` int(11) DEFAULT NULL,
  `jam_mulai_sidang` time DEFAULT NULL,
  `jam_selesai_sidang` time DEFAULT NULL,
  `ruangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komponen`
--

CREATE TABLE `komponen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prodi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_komponen` varchar(255) DEFAULT NULL,
  `jenis_komponen` enum('proposal','prasidang','sidang') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komponen_prasidang`
--

CREATE TABLE `komponen_prasidang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prodi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `periode_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deadline_prasidang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_komponen` varchar(255) DEFAULT NULL,
  `persentase` double DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tanggal_deadline_input_nilai` date DEFAULT NULL,
  `tahun_ajaran` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komponen_prasidang`
--

INSERT INTO `komponen_prasidang` (`id`, `prodi_id`, `periode_id`, `deadline_prasidang_id`, `nama_komponen`, `persentase`, `keterangan`, `tanggal_deadline_input_nilai`, `tahun_ajaran`, `semester`, `created_at`, `updated_at`, `deleted_at`) VALUES
(16, 1, 12, 3, 'Penguasaan Materi', 35, NULL, NULL, '2023', 'Genap', '2023-06-13 02:32:29', '2023-06-13 02:32:29', NULL),
(17, 1, 12, 3, 'Penguasaan Aplikasi / Implementasi Produk', 35, NULL, NULL, '2023', 'Genap', '2023-06-13 02:32:49', '2023-06-13 02:32:49', NULL),
(18, 1, 12, 3, 'Tata Tulis', 20, NULL, NULL, '2023', 'Genap', '2023-06-13 02:33:13', '2023-06-13 02:33:13', NULL),
(19, 1, 12, 3, 'Teknik Presentasi', 10, NULL, NULL, '2023', 'Genap', '2023-06-13 02:33:30', '2023-06-13 02:33:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `komponen_proposal`
--

CREATE TABLE `komponen_proposal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prodi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `periode_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deadline_proposal_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_komponen` varchar(255) DEFAULT NULL,
  `persentase` double DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tanggal_deadline_input_nilai` date DEFAULT NULL,
  `tahun_ajaran` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komponen_proposal`
--

INSERT INTO `komponen_proposal` (`id`, `prodi_id`, `periode_id`, `deadline_proposal_id`, `nama_komponen`, `persentase`, `keterangan`, `tanggal_deadline_input_nilai`, `tahun_ajaran`, `semester`, `created_at`, `updated_at`, `deleted_at`) VALUES
(27, 1, 12, 3, 'Latar Belakang', 20, NULL, NULL, '2023', 'Genap', '2023-06-13 02:28:47', '2023-06-13 02:28:47', NULL),
(28, 1, 12, 3, 'Studi Pustaka', 20, NULL, NULL, '2023', 'Genap', '2023-06-13 02:29:08', '2023-06-13 02:29:08', NULL),
(29, 1, 12, 3, 'Perbandingan Sistem', 10, NULL, NULL, '2023', 'Genap', '2023-06-13 02:29:29', '2023-06-13 02:29:29', NULL),
(30, 1, 12, 3, 'Gambaran Proses Bisnis', 25, NULL, NULL, '2023', 'Genap', '2023-06-13 02:29:49', '2023-06-13 02:29:49', NULL),
(31, 1, 12, 3, 'Lampiran Hasil Kuisioner', 25, NULL, NULL, '2023', 'Genap', '2023-06-13 02:30:02', '2023-06-13 02:30:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `komponen_sidang`
--

CREATE TABLE `komponen_sidang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prodi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `periode_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deadline_sidang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_komponen` varchar(255) DEFAULT NULL,
  `persentase` double DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tanggal_deadline_input_nilai` date DEFAULT NULL,
  `tahun_ajaran` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komponen_sidang`
--

INSERT INTO `komponen_sidang` (`id`, `prodi_id`, `periode_id`, `deadline_sidang_id`, `nama_komponen`, `persentase`, `keterangan`, `tanggal_deadline_input_nilai`, `tahun_ajaran`, `semester`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 11, NULL, 'Nilai Pembimbing 1', 24, 'Keterangan Nilai Pembimbing 1', '2022-08-16', '2022', 'Ganjil', NULL, NULL, NULL),
(2, 1, 11, NULL, 'Nilai Pembimbing 2', 24, 'Keterangan Nilai Pembimbing 2', '2022-08-16', '2022', 'Ganjil', NULL, NULL, NULL),
(3, 1, 11, NULL, 'Nilai Penguji 1', 16, 'Keterangan Nilai Penguji 1', '2022-08-16', '2022', 'Ganjil', NULL, NULL, NULL),
(4, 1, 11, NULL, 'Nilai Penguji 2', 16, 'Keterangan Nilai Penguji 2', '2022-08-16', '2022', 'Ganjil', NULL, NULL, NULL),
(5, 1, 11, NULL, 'Nilai Proposal', 20, 'Keterangan Nilai Proposal', '2022-08-16', '2022', 'Ganjil', NULL, NULL, NULL),
(12, 1, 12, 3, 'Nilai Pembimbing 1', 24, NULL, NULL, '2023', 'Genap', '2023-06-13 02:34:55', '2023-06-13 02:34:55', NULL),
(13, 1, 12, 3, 'Nilai Pembimbing 2', 24, NULL, NULL, '2023', 'Genap', '2023-06-13 02:35:29', '2023-06-13 02:35:29', NULL),
(14, 1, 12, 3, 'Nilai Penguji 1', 16, NULL, NULL, '2023', 'Genap', '2023-06-13 02:35:41', '2023-06-13 02:35:41', NULL),
(15, 1, 12, 3, 'Nilai Penguji 2', 16, NULL, NULL, '2023', 'Genap', '2023-06-13 02:35:54', '2023-06-13 02:35:54', NULL),
(16, 1, 12, 3, 'Nilai Proposal', 10, NULL, NULL, '2023', 'Genap', '2023-06-13 02:36:10', '2023-06-13 02:36:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `periode_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mahasiswa_import_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nim` varchar(255) DEFAULT NULL,
  `angkatan` int(11) DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `foto` longtext DEFAULT NULL,
  `tahun_ajaran` varchar(255) DEFAULT NULL,
  `madusem` BOOLEAN DEFAULT false,
  `semester` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `user_id`, `periode_id`, `mahasiswa_import_id`, `nama`, `nim`, `angkatan`, `telepon`, `alamat`, `foto`, `tahun_ajaran`, `semester`, `created_at`, `updated_at`, `deleted_at`) VALUES
(39, 84, 10, 28, 'Agustine', '150030676', NULL, '085737125123', 'Bandung', 'user.png', '2022-2023', 'Genap', '2023-06-14 15:24:35', '2023-06-14 15:24:35', NULL),
(40, 86, 10, 30, 'Emung Zakaria ', '6701204092', NULL, '085737125121', 'Denpasar', 'user.png', '2022-2023', 'Genap', '2023-06-14 15:34:22', '2023-06-14 15:34:22', NULL),
(41, 87, 10, 30, 'Esya Oktariani', '6701200037', NULL, '085737125122', 'Denpasar', 'user.png', '2022-2023', 'Genap', '2023-06-14 15:34:22', '2023-06-14 15:34:22', NULL),
(42, 88, 10, 30, 'Ahmad Ridho Maulana', '6701200042', NULL, '085737125124', 'Denpasar', 'user.png', '2022-2023', 'Genap', '2023-06-14 15:34:23', '2023-06-14 15:34:23', NULL),
(43, 89, 10, 30, 'Anggun Shinta Prasella Dinata', '6701200045', NULL, '085737125125', 'Denpasar', 'user.png', '2022-2023', 'Genap', '2023-06-14 15:34:23', '2023-06-14 15:34:23', NULL),
(44, 90, 10, 30, 'Derisa', '6701200066', NULL, '085737125126', 'Denpasar', 'user.png', '2022-2023', 'Genap', '2023-06-14 15:34:23', '2023-06-14 15:34:23', NULL),
(45, 91, 10, 30, 'Fildzah Nabilah Putri ', '6701200071', NULL, '085737125127', 'Denpasar', 'user.png', '2022-2023', 'Genap', '2023-06-14 15:34:23', '2023-06-14 15:34:23', NULL),
(46, 92, 10, 30, 'Feby Rahma Chayaningrum', '6701200073', NULL, '085737125128', 'Denpasar', 'user.png', '2022-2023', 'Genap', '2023-06-14 15:34:23', '2023-06-14 15:34:23', NULL),
(47, 93, 10, 30, 'Gabriella Angelina', '6701200081', NULL, '085737125129', 'Denpasar', 'user.png', '2022-2023', 'Genap', '2023-06-14 15:34:24', '2023-06-14 15:34:24', NULL),
(48, 94, 10, 30, 'Farhan Abdullah Rynold', '6701201098', NULL, '085737125130', 'Denpasar', 'user.png', '2022-2023', 'Genap', '2023-06-14 15:34:24', '2023-06-14 15:34:24', NULL),
(49, 95, 10, 30, 'Gusnita Pratiwi', '6701201128', NULL, '085737125131', 'Denpasar', 'user.png', '2022-2023', 'Genap', '2023-06-14 15:34:24', '2023-06-14 15:34:24', NULL),
(50, 96, 10, 30, 'Nyayu Najla Apritia', '6701201129', NULL, '085737125132', 'Denpasar', 'user.png', '2022-2023', 'Genap', '2023-06-14 15:34:24', '2023-06-14 15:34:24', NULL),
(51, 97, 10, 30, 'Rayhana Alya Azzara ', '6701201142', NULL, '085737125133', 'Denpasar', 'user.png', '2022-2023', 'Genap', '2023-06-14 15:34:24', '2023-06-14 15:34:24', NULL),
(52, 98, 10, 30, 'Diego Prayudha', '6701202021', NULL, '085737125134', 'Denpasar', 'user.png', '2022-2023', 'Genap', '2023-06-14 15:34:25', '2023-06-14 15:34:25', NULL),
(53, 99, 10, 30, 'Amelia Ramahani ', '6701202029', NULL, '085737125135', 'Denpasar', 'user.png', '2022-2023', 'Genap', '2023-06-14 15:34:25', '2023-06-14 15:34:25', NULL),
(54, 100, 10, 30, 'Fayza Alana', '6701202055', NULL, '085737125136', 'Denpasar', 'user.png', '2022-2023', 'Genap', '2023-06-14 15:34:25', '2023-06-14 15:34:25', NULL),
(55, 101, 10, 30, 'Destiny sabila fitriamita dewi', '6701202060', NULL, '085737125137', 'Denpasar', 'user.png', '2022-2023', 'Genap', '2023-06-14 15:34:25', '2023-06-14 15:34:25', NULL),
(56, 102, 10, 30, 'Tapa Kumbara Nasution', '6701202121', NULL, '085737125138', 'Denpasar', 'user.png', '2022-2023', 'Genap', '2023-06-14 15:34:25', '2023-06-14 15:34:25', NULL),
(57, 103, 10, 30, 'Kamilia Putri Afifah R', '6701202124', NULL, '085737125139', 'Denpasar', 'user.png', '2022-2023', 'Genap', '2023-06-14 15:34:25', '2023-06-14 15:34:25', NULL),
(58, 104, 10, 30, 'Raden Fachry Azwar', '6701202132', NULL, '085737125140', 'Denpasar', 'user.png', '2022-2023', 'Genap', '2023-06-14 15:34:26', '2023-06-14 15:34:26', NULL),
(59, 105, 10, 30, 'Mahdhor Fauzi Hakiki', '6701202139', NULL, '085737125141', 'Denpasar', 'user.png', '2022-2023', 'Genap', '2023-06-14 15:34:26', '2023-06-14 15:34:26', NULL),
(60, 106, 10, 30, 'Muhammad Fachrur Rasyid', '6701202143', NULL, '085737125142', 'Denpasar', 'user.png', '2022-2023', 'Genap', '2023-06-14 15:34:26', '2023-06-14 15:34:26', NULL),
(61, 107, 10, 30, 'Endar Sulistyaningsih', '6701203107', NULL, '085737125143', 'Denpasar', 'user.png', '2022-2023', 'Genap', '2023-06-14 15:34:26', '2023-06-14 15:34:26', NULL),
(62, 108, 10, 30, 'Husni Falah', '6701204007', NULL, '085737125144', 'Denpasar', 'user.png', '2022-2023', 'Genap', '2023-06-14 15:34:26', '2023-06-14 15:34:26', NULL),
(63, 109, 10, 30, 'Zitha Ailsa Vashti Ali', '6701204008', NULL, '085737125145', 'Denpasar', 'user.png', '2022-2023', 'Genap', '2023-06-14 15:34:27', '2023-06-14 15:34:27', NULL),
(64, 110, 10, 30, 'Viona Mustika Putri Zaelani', '6701204018', NULL, '085737125146', 'Denpasar', 'user.png', '2022-2023', 'Genap', '2023-06-14 15:34:27', '2023-06-14 15:34:27', NULL),
(65, 111, 10, 30, 'Yoland Anggreyani Kendek', '6701204035', NULL, '085737125147', 'Denpasar', 'user.png', '2022-2023', 'Genap', '2023-06-14 15:34:27', '2023-06-14 15:34:27', NULL),
(66, 112, 10, 30, 'Nailatul Fadhilah Syarwan', '6701204053', NULL, '085737125148', 'Denpasar', 'user.png', '2022-2023', 'Genap', '2023-06-14 15:34:27', '2023-06-14 15:34:27', NULL),
(67, 113, 10, 30, 'Refka Maulana Sidik', '6701204054', NULL, '085737125149', 'Denpasar', 'user.png', '2022-2023', 'Genap', '2023-06-14 15:34:27', '2023-06-14 15:34:27', NULL),
(68, 114, 10, 30, 'Rahmad Fitrananda H', '6701204069', NULL, '085737125150', 'Denpasar', 'user.png', '2022-2023', 'Genap', '2023-06-14 15:34:28', '2023-06-14 15:34:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa_import`
--

CREATE TABLE `mahasiswa_import` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `periode_id` bigint(20) UNSIGNED DEFAULT NULL,
  `prodi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tahun_ajaran` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswa_import`
--

INSERT INTO `mahasiswa_import` (`id`, `periode_id`, `prodi_id`, `tahun_ajaran`, `semester`, `created_at`, `updated_at`, `deleted_at`) VALUES
(28, 10, 1, '2022-2023', 'Genap', '2023-06-14 15:24:35', '2023-06-14 15:24:35', NULL),
(30, 10, 1, '2022-2023', 'Genap', '2023-06-14 15:34:22', '2023-06-14 15:34:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_04_12_122944_create_role_table', 1),
(2, '2014_09_12_144210_create_periode_table', 1),
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2014_10_13_141356_create_dosen_table', 1),
(6, '2014_10_14_141403_create_mahasiswa_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2022_04_12_144205_create_admin_table', 1),
(9, '2022_04_14_094002_create_ruangan_table', 1),
(10, '2022_04_14_130438_create_prodi_table', 1),
(11, '2022_04_14_130439_add_prodi_id_to_users_table', 1),
(12, '2022_04_14_130520_create_nilai_mutu_table', 1),
(13, '2022_04_14_132505_create_deadline_sidangs_table', 1),
(14, '2022_04_14_132535_create_deadline_proposals_table', 1),
(15, '2022_04_14_132550_create_deadline_prasidangs_table', 1),
(16, '2022_04_14_132641_create_komponen_table', 1),
(17, '2022_04_14_133439_create_komponen_prasidang_table', 1),
(18, '2022_04_14_133449_create_komponen_proposal_table', 1),
(19, '2022_04_14_133500_create_komponen_sidang_table', 1),
(20, '2022_04_14_141512_create_prasidang_table', 1),
(21, '2022_04_14_141522_create_proposal_table', 1),
(22, '2022_04_14_142105_create_pendaftaran_sidang_table', 1),
(23, '2022_04_14_143719_create_sidang_table', 1),
(24, '2022_04_14_143720_create_jadwal_sidang_table', 1),
(25, '2022_04_14_144640_create_revisi_table', 1),
(26, '2022_04_14_144832_create_nilai_prasidang_table', 1),
(27, '2022_04_14_144839_create_nilai_proposal_table', 1),
(28, '2022_04_14_144849_create_nilai_sidang_table', 1),
(29, '2022_04_14_150424_create_detail_nilai_prasidang_table', 1),
(30, '2022_04_14_150432_create_detail_nilai_proposal_table', 1),
(31, '2022_04_14_150439_create_detail_nilai_sidang_table', 1),
(32, '2022_04_21_080919_create_dosen_koordinator_pa', 1),
(33, '2022_04_21_122152_create_role_dosen_table', 1),
(34, '2022_04_21_132742_create_dosen_kaprodi_table', 1),
(35, '2022_04_21_141300_create_mahasiswa_import_table', 1),
(36, '2022_04_21_141710_add_mahasiswa_import_id_to_mahasiswa_table', 1),
(37, '2022_04_21_171321_create_dosen_import_table', 1),
(38, '2022_04_21_171509_add_dosen_import_id_to_dosen_table', 1),
(39, '2022_04_22_195717_create_nilai_proposal_final_table', 1),
(40, '2022_04_22_195725_create_nilai_prasidang_final_table', 1),
(41, '2022_04_22_195731_create_nilai_sidang_final_table', 1),
(42, '2022_04_23_113708_create_jadwal_prasidang_table', 1),
(43, '2022_08_13_184141_create_histori_judul_proposals_table', 1),
(44, '2022_08_13_184514_create_histori_judul_prasidangs_table', 1),
(45, '2022_08_13_184515_create_nilai_madusem', 1),
(46, '2022_08_13_184516_create_komponen_madusem', 1),
(47, '2022_08_13_184517_create_komponen_madusem_pivot', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_mutu`
--

CREATE TABLE `nilai_mutu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `periode_id` bigint(20) UNSIGNED DEFAULT NULL,
  `index` varchar(255) DEFAULT NULL,
  `nilai_min` double DEFAULT NULL,
  `nilai_maks` double DEFAULT NULL,
  `tahun_ajaran` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai_mutu`
--

INSERT INTO `nilai_mutu` (`id`, `periode_id`, `index`, `nilai_min`, `nilai_maks`, `tahun_ajaran`, `semester`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 9, 'A', 81, 100, '2021-2022', 'Ganjil', NULL, '2022-11-10 06:52:39', NULL),
(2, 9, 'AB', 71, 80, '2021-2022', 'Ganjil', NULL, NULL, NULL),
(3, 9, 'B', 66, 70, '2021-2022', 'Ganjil', NULL, NULL, NULL),
(4, 9, 'BC', 61, 65, '2021-2022', 'Ganjil', NULL, NULL, NULL),
(5, 9, 'C', 51, 60, '2021-2022', 'Ganjil', NULL, NULL, NULL),
(6, 9, 'D', 41, 50, '2021-2022', 'Ganjil', NULL, NULL, NULL),
(7, 9, 'E', 0, 40, '2021-2022', 'Ganjil', NULL, NULL, NULL),
(8, 10, 'A', 80, 100, '2021-2022', 'Genap', NULL, NULL, NULL),
(9, 10, 'AB', 70, 80, '2021-2022', 'Genap', NULL, NULL, NULL),
(10, 10, 'B', 65, 70, '2021-2022', 'Genap', NULL, NULL, NULL),
(11, 10, 'BC', 60, 65, '2021-2022', 'Genap', NULL, NULL, NULL),
(12, 10, 'C', 50, 60, '2021-2022', 'Genap', NULL, NULL, NULL),
(13, 10, 'D', 40, 50, '2021-2022', 'Genap', NULL, NULL, NULL),
(14, 10, 'E', 0, 40, '2021-2022', 'Genap', NULL, NULL, NULL),
(16, 12, 'A', 81, 100, '2022-2023', 'Genap', '2023-06-13 04:33:35', '2023-06-13 04:33:35', NULL),
(17, 12, 'AB', 71, 84, '2022-2023', 'Genap', '2023-06-13 04:36:22', '2023-06-13 04:36:22', NULL),
(18, 12, 'B', 66, 70, '2022-2023', 'Genap', '2023-06-13 04:36:46', '2023-06-13 04:36:46', NULL),
(19, 12, 'BC', 61, 65, '2022-2023', 'Genap', '2023-06-13 04:37:13', '2023-06-13 04:37:13', NULL),
(20, 12, 'C', 51, 60, '2022-2023', 'Genap', '2023-06-13 04:37:54', '2023-06-13 04:37:54', NULL),
(21, 12, 'D', 41, 50, '2022-2023', 'Genap', '2023-06-13 04:38:17', '2023-06-13 04:38:17', NULL),
(22, 12, 'E', 0, 40, '2022-2023', 'Genap', '2023-06-13 04:38:41', '2023-06-13 04:38:41', NULL);

-- --------------------------------------------------------



--
-- Table structure for table `nilai_prasidang`
--

CREATE TABLE `nilai_prasidang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prasidang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ruangan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `penguji` enum('1','2') NOT NULL,
  `tanggal_penilaian` datetime DEFAULT NULL,
  `ruangan` varchar(255) DEFAULT NULL,
  `nilai_akhir` double DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `file` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_prasidang_final`
--

CREATE TABLE `nilai_prasidang_final` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prasidang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nilai_final` double DEFAULT NULL,
  `nilai_mutu` varchar(255) DEFAULT NULL,
  `status` enum('Lulus','Tidak Lulus') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_proposal`
--

CREATE TABLE `nilai_proposal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `proposal_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ruangan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `penguji` enum('1','2') NOT NULL,
  `tanggal_penilaian` datetime DEFAULT NULL,
  `ruangan` varchar(255) DEFAULT NULL,
  `nilai_akhir` double DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `file` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai_proposal`
--

INSERT INTO `nilai_proposal` (`id`, `proposal_id`, `ruangan_id`, `penguji`, `tanggal_penilaian`, `ruangan`, `nilai_akhir`, `catatan`, `file`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 91, NULL, '1', NULL, NULL, 67, NULL, NULL, '2023-06-17 15:41:52', '2023-06-17 15:41:52', NULL),
(11, 90, NULL, '1', NULL, NULL, 70, NULL, NULL, '2023-06-17 17:53:01', '2023-06-17 18:06:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_proposal_final`
--

CREATE TABLE `nilai_proposal_final` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `proposal_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nilai_final` double DEFAULT NULL,
  `nilai_mutu` varchar(255) DEFAULT NULL,
  `status` enum('Lulus','Tidak Lulus') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_sidang`
--

CREATE TABLE `nilai_sidang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sidang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ruangan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `penguji` enum('1','2') NOT NULL,
  `tanggal_penilaian` datetime DEFAULT NULL,
  `ruangan` varchar(255) DEFAULT NULL,
  `nilai_akhir` double DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `file` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_sidang_final`
--

CREATE TABLE `nilai_sidang_final` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sidang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nilai_final` double DEFAULT NULL,
  `nilai_mutu` varchar(255) DEFAULT NULL,
  `status` enum('Lulus','Tidak Lulus') NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran_sidang`
--

CREATE TABLE `pendaftaran_sidang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `periode_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mahasiswa_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tanggal_maksimal_daftar` date DEFAULT NULL,
  `transkip_nilai` varchar(255) DEFAULT NULL,
  `ksm` varchar(255) DEFAULT NULL,
  `ktp` varchar(255) DEFAULT NULL,
  `ijazah` varchar(255) DEFAULT NULL,
  `surat_pernyataan` varchar(255) DEFAULT NULL,
  `status_pendaftaran` enum('Belum dikonfirmasi','Diterima','Ditolak') NOT NULL,
  `tahun_ajaran` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `periode_semester_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tahun_ajaran` varchar(255) DEFAULT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL,
  `bulan` varchar(255) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `jenis_periode` enum('Umum','Proposal','Prasidang','Sidang') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id`, `periode_semester_id`, `tahun_ajaran`, `semester`, `bulan`, `tahun`, `jenis_periode`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, '2021-2022', 'Genap', 'Juni', 2022, 'Prasidang', NULL, '2023-06-13 01:55:38', '2023-06-13 01:55:38'),
(2, NULL, '2021-2022', 'Ganjil', 'Desember', 2022, 'Proposal', NULL, '2023-06-13 01:55:31', '2023-06-13 01:55:31'),
(3, NULL, '2022-2023', 'Ganjil', 'September', 2022, 'Prasidang', '2022-11-10 04:54:24', '2023-06-13 01:55:24', '2023-06-13 01:55:24'),
(4, NULL, '2022-2023', 'Genap', 'Februari', 2023, 'Prasidang', '2022-11-10 04:54:40', '2023-06-13 01:55:17', '2023-06-13 01:55:17'),
(5, NULL, '2023-2024', 'Ganjil', 'September', 2023, 'Sidang', '2022-11-10 06:48:52', '2023-06-13 01:55:02', '2023-06-13 01:55:02'),
(6, NULL, '2023-2024', 'Genap', 'Februari', 2023, 'Proposal', '2022-11-10 06:50:27', '2023-06-13 01:54:55', '2023-06-13 01:54:55'),
(7, NULL, '2024-2025', 'Ganjil', 'Februari', 2024, 'Prasidang', '2022-11-16 04:09:58', '2023-06-13 01:54:46', '2023-06-13 01:54:46'),
(8, NULL, '2024-2025', 'Genap', 'Februari', 2024, 'Sidang', '2022-11-23 15:38:30', '2023-06-13 01:54:17', '2023-06-13 01:54:17'),
(9, NULL, '2021-2022', 'Ganjil', NULL, 2021, 'Umum', '2023-03-11 10:24:20', '2023-03-11 10:24:20', NULL),
(10, NULL, '2021-2022', 'Genap', NULL, 2022, 'Umum', '2023-03-11 10:24:20', '2023-03-11 10:24:20', NULL),
(11, NULL, '2022-2023', 'Ganjil', NULL, 2022, 'Umum', '2023-03-11 10:27:53', '2023-03-11 10:29:45', NULL),
(12, NULL, '2022-2023', 'Genap', NULL, 2023, 'Umum', '2023-03-11 10:28:12', '2023-03-11 10:29:37', NULL),
(13, NULL, '2023-2024', 'Ganjil', NULL, 2023, 'Umum', '2023-03-11 10:29:19', '2023-03-11 10:30:02', NULL),
(14, NULL, '2023-2024', 'Genap', NULL, 2024, 'Umum', '2023-03-11 10:28:45', '2023-03-11 10:30:08', NULL),
(15, NULL, '2024-2025', 'Ganjil', NULL, 2024, 'Umum', '2023-03-11 10:29:31', '2023-06-13 01:55:54', '2023-06-13 01:55:54'),
(16, NULL, '2024-2025', 'Genap', NULL, 2025, 'Umum', '2023-03-11 10:28:55', '2023-06-13 01:55:49', '2023-06-13 01:55:49'),
(17, NULL, '2024-2025', 'Ganjil', 'Maret', NULL, 'Proposal', '2023-04-22 19:56:54', '2023-06-13 01:54:09', '2023-06-13 01:54:09'),
(18, NULL, '2022-2023', 'Genap', 'Agustus', 2023, 'Proposal', '2023-04-22 19:59:36', '2023-06-13 01:54:37', NULL),
(19, NULL, '2022-2023', 'Ganjil', 'Juli', 2023, 'Proposal', '2023-04-22 20:02:37', '2023-06-13 01:54:02', NULL),
(20, NULL, '2022-2023', 'Genap', 'Juni', 2023, 'Proposal', '2023-04-22 20:03:46', '2023-06-13 01:53:35', NULL),
(21, NULL, '2022-2023', 'Genap', 'Mei', 2023, 'Prasidang', '2023-04-22 20:58:50', '2023-06-13 01:53:10', NULL),
(22, NULL, '2021-2022', 'Ganjil', 'November', 2021, 'Prasidang', '2023-04-22 17:00:00', '2023-04-22 21:10:52', NULL),
(23, NULL, '2022-2023', 'Genap', 'Juli', NULL, 'Proposal', '2023-06-13 02:40:50', '2023-06-13 04:19:10', '2023-06-13 04:19:10'),
(24, NULL, '2022-2023', 'Ganjil', 'Januari', NULL, 'Proposal', '2023-06-14 15:37:51', '2023-06-14 15:37:51', NULL),
(25, NULL, '2022-2023', 'Genap', 'Juli', NULL, 'Proposal', '2023-06-17 15:41:11', '2023-06-17 15:41:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `periode_semester`
--

CREATE TABLE `periode_semester` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun_ajaran` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prasidang`
--

CREATE TABLE `prasidang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mahasiswa_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pembimbing1_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pembimbing2_id` bigint(20) UNSIGNED DEFAULT NULL,
  `penguji1_id` bigint(20) UNSIGNED DEFAULT NULL,
  `penguji2_id` bigint(20) UNSIGNED DEFAULT NULL,
  `periode_id` bigint(20) UNSIGNED DEFAULT NULL,
  `judul_indo` varchar(255) DEFAULT NULL,
  `judul_inggris` varchar(255) DEFAULT NULL,
  `tahun_ajaran` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `bulan` varchar(25) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `jumlah_penguji` int(11) NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `periode_id` bigint(20) UNSIGNED DEFAULT NULL,
  `koor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kaprodi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kode` varchar(255) DEFAULT NULL,
  `singkatan` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `tahun_ajaran` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `periode_id`, `koor_id`, `kaprodi_id`, `kode`, `singkatan`, `nama`, `keterangan`, `tahun_ajaran`, `semester`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, NULL, NULL, 'D3SI', 'D3SI', 'D3 Sistem Informasi', 'Akreditasi A', '2021-2022', 'Genap', NULL, NULL, NULL),
(2, 1, NULL, NULL, 'D3TE', 'D3TE', 'D3 Digital Connectivity', 'Akreditasi Unggul', '2021-2022', 'Genap', NULL, NULL, NULL),
(3, 1, NULL, NULL, 'D3TI', 'D3TI', 'D3 Teknik Informatika', 'Akreditasi Unggul', '2021-2022', 'Genap', NULL, NULL, NULL),
(4, 1, NULL, NULL, 'D3SIA', 'D3SIA', 'D3 Sistem Informasi Akuntansi', 'Akreditasi A', '2021-2022', 'Genap', NULL, NULL, NULL),
(5, 1, NULL, NULL, 'D3TK', 'D3TK', 'D3 Teknik Komputer', 'Akreditasi Unggul', '2021-2022', 'Genap', NULL, NULL, NULL),
(6, 1, NULL, NULL, 'D3DM', 'D3DM', 'D3 Digital Marketing', 'Akreditasi B', '2021-2022', 'Genap', NULL, NULL, NULL),
(7, 1, NULL, NULL, 'DCA', 'DCA', 'S1 Terapan Digital Creative Multimedia', 'Akreditasi C', '2021-2022', 'Genap', NULL, NULL, NULL),
(8, 1, NULL, NULL, 'D4KP', 'D4KP', 'D4 Keperewatan', 'Keperawatan', '2021-2022', NULL, '2022-08-16 09:05:40', '2022-08-16 09:05:40', NULL),
(9, 1, NULL, NULL, 'T-01267', 'D3AP', 'Analisis Perancangan', 'Analisis Perancangan', '2021-2022', 'Genap', '2022-08-16 09:22:45', '2022-08-16 09:22:45', NULL),
(10, 1, NULL, NULL, 'D3 RPLA', 'D3 RPLA', 'D3 Rekayasa Perangkat Lunak', 'Akreditasi A', '2021-2022', 'Genap', '2022-11-10 06:52:07', '2022-11-10 06:52:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mahasiswa_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pembimbing1_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pembimbing2_id` bigint(20) UNSIGNED DEFAULT NULL,
  `penguji1_id` bigint(20) UNSIGNED DEFAULT NULL,
  `penguji2_id` bigint(20) UNSIGNED DEFAULT NULL,
  `periode_id` bigint(20) UNSIGNED DEFAULT NULL,
  `judul_indo` varchar(255) DEFAULT NULL,
  `judul_inggris` varchar(255) DEFAULT NULL,
  `tahun_ajaran` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `bulan` varchar(25) DEFAULT NULL,
  `jumlah_penguji` int(11) NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`id`, `mahasiswa_id`, `pembimbing1_id`, `pembimbing2_id`, `penguji1_id`, `penguji2_id`, `periode_id`, `judul_indo`, `judul_inggris`, `tahun_ajaran`, `semester`, `bulan`, `jumlah_penguji`, `created_at`, `updated_at`, `deleted_at`) VALUES
(90, 42, 7, 9, 2, 14, 20, 'Pengujian Aplikasi', 'Testing Application', '2022-2023', 'Ganjil', 'Januari', 2, '2023-06-14 15:37:51', '2023-06-14 15:42:30', NULL),
(91, 53, 3, 4, 2, 7, 25, 'Pengujian Aplikasi', 'Testing Application', '2022-2023', 'Genap', 'Juli', 2, '2023-06-17 15:41:11', '2023-06-17 15:41:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `revisi`
--

CREATE TABLE `revisi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sidang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `catatan_revisi` text DEFAULT NULL,
  `nilai_akhir` double DEFAULT NULL,
  `tanggal_pengumpulan_revisi` datetime DEFAULT NULL,
  `tanggal_approve_pembimbing1` datetime DEFAULT NULL,
  `tanggal_approve_pembimbing2` datetime DEFAULT NULL,
  `tanggal_approve_penguji1` datetime DEFAULT NULL,
  `tanggal_approve_penguji2` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', NULL, NULL, NULL),
(2, 'Dosen', NULL, NULL, NULL),
(3, 'Mahasiswa', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_dosen`
--

CREATE TABLE `role_dosen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `periode_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kode` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tahun_ajaran` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id`, `kode`, `nama`, `keterangan`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'R1', 'Ruangan 1', 'Keterangan Ruangan 1', 1, NULL, NULL, NULL),
(2, 'R2', 'Ruangan 2', 'Keterangan Ruangan 2', 1, NULL, NULL, NULL),
(3, 'R3', 'Ruangan 3', 'Keterangan Ruangan 3', 0, NULL, '2022-08-16 14:12:47', NULL),
(4, 'R4', 'Ruang FIT', 'Di gedung FIT', 1, '2022-11-10 06:56:49', '2022-11-10 06:56:49', NULL),
(5, 'R5', 'Ruangan Aula', 'Aula di Lt 4 FIT', 1, '2023-06-13 02:23:43', '2023-06-13 02:23:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ruangan_terpakai`
--

CREATE TABLE `ruangan_terpakai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ruangan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ruangan_terpakai`
--

INSERT INTO `ruangan_terpakai` (`id`, `ruangan_id`, `tanggal`, `jam_mulai`, `jam_selesai`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '2022-09-15', '21:30:00', '22:30:00', '2022-08-16 16:38:27', '2022-08-16 16:38:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sidang`
--

CREATE TABLE `sidang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pendaftaran_sidang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mahasiswa_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pembimbing1_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pembimbing2_id` bigint(20) UNSIGNED DEFAULT NULL,
  `penguji1_id` bigint(20) UNSIGNED DEFAULT NULL,
  `penguji2_id` bigint(20) UNSIGNED DEFAULT NULL,
  `periode_id` bigint(20) UNSIGNED DEFAULT NULL,
  `judul_indo` varchar(255) DEFAULT NULL,
  `judul_inggris` varchar(255) DEFAULT NULL,
  `tahun_ajaran` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `bulan` varchar(25) DEFAULT NULL,
  `jumlah_penguji` int(11) NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun_ajaran` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id`, `tahun_ajaran`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2020-2021', 0, '2023-04-22 15:51:56', '2023-04-22 15:51:56', NULL),
(2, '2021-2022', 0, '2023-04-22 15:51:56', '2023-06-13 04:28:22', NULL),
(3, '2022-2023', 1, '2023-04-22 15:51:56', '2023-06-13 04:28:18', NULL),
(4, '2023-2024', 0, '2023-04-22 15:51:56', '2023-06-13 01:52:37', NULL),
(5, '2024-2025', 0, '2023-04-22 15:51:56', '2023-04-22 15:51:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `prodi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `prodi_id`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, NULL, 'admin', 'admin@gmail.com', '$2y$10$X0D.vB4XfdWT4HCg1WqiN.heapCi/H/lZAYVR7yTw7ctX8fL/UjQe', NULL, NULL, NULL, NULL),
(2, 2, 1, 'patrick.telnoni', 'patrick.telnoni@tass.telkomuniversity.ac.id ', '$2y$10$CUc/O5YBj0fUtXIrXGO7JOZ.KQgIUB6txFvCiL.56rk/tAcesVbXi', NULL, '2022-08-16 09:34:30', '2022-08-16 09:34:30', NULL),
(3, 2, 1, 'dedyrw', 'dedyrw@tass.telkomuniversity.ac.id ', '$2y$10$98eYI6ZKOfFMipgzge4MJ.GApNZoVi84m4ZgOxKObxDSItGkae6P2', NULL, '2022-08-16 09:34:30', '2022-08-16 09:34:30', NULL),
(4, 2, 1, 'hanungnp', 'hanungnp@tass.telkomuniversity.ac.id ', '$2y$10$FKtNBWJABIOOzfon2VSowuh9LeVbPkUFNc0DWeYOSty9eJf2qkFuy', NULL, '2022-08-16 09:34:30', '2022-08-16 09:34:30', NULL),
(5, 2, 1, 'mbarja', 'mbarja@tass.telkomuniversity.ac.id ', '$2y$10$nm1uCj3hXJ5NbGUXjEPr8eu/l1pCRzq4m06ycE9WhXep5LTI0nBqi', NULL, '2022-08-16 09:34:30', '2022-08-16 09:34:30', NULL),
(6, 2, 1, 'siska', 'siska@tass.telkomuniversity.ac.id ', '$2y$10$nlLLfAu9WYLBVHMWAqNCruT3dQoPLaZnVDEM8MEnr8hSCPiTy0nta', NULL, '2022-08-16 09:34:30', '2022-08-16 09:34:30', NULL),
(7, 2, 1, 'wawa_wikusna', 'wawa_wikusna@tass.telkomuniversity.ac.id ', '$2y$10$JMeQkDPLCItwr1gS0JG8XOAM8a29aRNxGpHwN2KF.HdyKlxeCus5O', NULL, '2022-08-16 09:34:30', '2022-08-16 09:34:30', NULL),
(8, 2, 1, 'elishernawati', 'elishernawati@tass.telkomuniversity.ac.id', '$2y$10$dX8g51RFIveEgaq.lAHj4.z86bklhVe9ff/OADeEHW6OemyACMdnC', NULL, '2022-08-16 09:34:31', '2022-08-16 09:34:31', NULL),
(9, 2, 1, 'inne', 'inne@tass.telkomuniversity.ac.id', '$2y$10$S7hGOZg3Z.RFyUXTq2h6R.oZnZIa1Rkd96Wo81zjxXa6DQvd5Ny9q', NULL, '2022-08-16 09:34:31', '2022-08-16 09:34:31', NULL),
(10, 2, 1, 'pramukoaji', 'pramukoaji@tass.telkomuniversity.ac.id', '$2y$10$ANhqEcCxs6SAkjQmatWqXe6sRsVP65FB8LxZyNcu1d4CVzzphY38e', NULL, '2022-08-16 09:34:31', '2022-08-16 09:34:31', NULL),
(11, 2, 1, 'suryatiningsih', 'suryatiningsih@tass.telkomuniversity.ac.id ', '$2y$10$G7NuY/9mUKZLR5JJ7yu0y.lOnnfesXjDAXmmtet1nGxxAng.mViQG', NULL, '2022-08-16 09:34:31', '2022-08-16 09:34:31', NULL),
(12, 2, 1, 'tedi', 'tedi@tass.telkomuniversity.ac.id ', '$2y$10$jE1RItR80Fl1TDWSKCgmlujYKD3w5rRDZvgoPuOfZ/BHsNFTCtn2S', NULL, '2022-08-16 09:34:31', '2022-08-16 09:34:31', NULL),
(13, 2, 1, 'pikirwisnu', 'pikirwisnu@tass.telkomuniversity.ac.id ', '$2y$10$bCf1M.GKM9TrW6waS8rKIeX5Q6yCWnqVZFQnvcFTfg/ZQgaLx68MW', NULL, '2022-08-16 09:34:31', '2022-08-16 09:34:31', NULL),
(14, 2, 1, 'ely.rosely', 'ely.rosely@tass.telkomuniversity.ac.id', '$2y$10$.n2b63ryJfQdcDsO5sA84uM/wLtOA.Cb5JtJwWdVpkkAcT7H0SAtm', NULL, '2022-08-16 09:34:31', '2022-08-16 09:34:31', NULL),
(15, 2, 1, 'mutia', 'mutia@tass.telkomuniversity.ac.id', '$2y$10$gJ7Lyg/RP6ocoPkPXyMCo.peqNiQWjeHIs1NOKAtoRgrI/R1gLdGS', NULL, '2022-08-16 09:34:31', '2022-08-16 09:34:31', NULL),
(16, 2, 1, 'wahyuhidayat', 'wahyuhidayat@telkomuniversity.ac.id', '$2y$10$TV2kpfqM4hXacOSpslbGAuFvKfv6.KbE8cDWoqCi5ThkSMVd2TQj.', NULL, '2022-08-16 09:34:31', '2022-08-16 09:34:31', NULL),
(17, 2, 1, 'robbi', 'robbi@tass.telkomuniversity.ac.id', '$2y$10$dvoO3hV1Ih0.6hNSIGu2iOhsyZhhZ9Gi8A8aVSp9Hc9R9fH8ydDnW', NULL, '2022-08-16 09:34:31', '2022-08-16 09:34:31', NULL),
(84, 3, 1, 'agustine', 'agustinesalvatru@gmail.com', '$2y$10$inpFOOzpPp05Tw14Ufni8eqqMsqkw.hX7M.57hbrcSmsJtbQi8jAe', NULL, '2023-06-14 15:24:35', '2023-06-14 15:24:35', NULL),
(86, 3, 1, 'emung', 'emung@gmail.com', '$2y$10$wWu.hQ6sKcXer0p9MutfeO348QKT8QhSuhEwYbkuwcZsLcEEEwjXW', NULL, '2023-06-14 15:34:22', '2023-06-14 15:34:22', NULL),
(87, 3, 1, 'esya', 'esya@gmail.com', '$2y$10$y78nZTm2uDe42wtZ39XFYuxqk/qB1uKlUSK8.PtsJ/3wR/Cul3Pb6', NULL, '2023-06-14 15:34:22', '2023-06-14 15:34:22', NULL),
(88, 3, 1, 'ridho', 'ridho@gmail.com', '$2y$10$0vt8KkBkCxowtE1pt4zG8OyhQD3.G8YIbFrB8q678/abTVl6fLe1W', NULL, '2023-06-14 15:34:23', '2023-06-14 15:34:23', NULL),
(89, 3, 1, 'anggun', 'anggun@gmail.com', '$2y$10$OtU1UWTh/QXnFq4DG09A8.WGuPs1b2rfmBEmzPAQzKP1iFUY.XgBG', NULL, '2023-06-14 15:34:23', '2023-06-14 15:34:23', NULL),
(90, 3, 1, 'derisa', 'derisa@gmail.com', '$2y$10$10v.9ReUxTCDgHrh/WE7euc9eLsgMoT.7CFITm9HR30z6S5kWMHry', NULL, '2023-06-14 15:34:23', '2023-06-14 15:34:23', NULL),
(91, 3, 1, 'nabilah', 'nabilah@gmail.com', '$2y$10$ue9DOMUIl9c1yWdGwyTzdOeL.tqKd/6GVVhpX4kihjOK6YI1ZURy2', NULL, '2023-06-14 15:34:23', '2023-06-14 15:34:23', NULL),
(92, 3, 1, 'rahma', 'rahma@gmail.com', '$2y$10$l3gc9WOus0Cdz6P1K8tLT.uxvQ.6IA9pdp0teHK1Ba6m.Qabets6i', NULL, '2023-06-14 15:34:23', '2023-06-14 15:34:23', NULL),
(93, 3, 1, 'gabriella', 'gabriella@gmail.com', '$2y$10$1gAjFNuEwDe5kpU2CgoIm.qONyB.XYwbJ8ei0SXZR2MFfzDbJDHyS', NULL, '2023-06-14 15:34:24', '2023-06-14 15:34:24', NULL),
(94, 3, 1, 'abdullah', 'abdullah@gmail.com', '$2y$10$Bf.SozOzbcSGImYUPzJ/ZeOjIu4BEY/bQXb3o0ePAG0XZSONHhcF6', NULL, '2023-06-14 15:34:24', '2023-06-14 15:34:24', NULL),
(95, 3, 1, 'gusnita', 'gusnita@gmail.com', '$2y$10$arxjlUPhkPMNJg2125Iqm.OhKpU5OaNuQzqVAbUUxqBKjLpcHSase', NULL, '2023-06-14 15:34:24', '2023-06-14 15:34:24', NULL),
(96, 3, 1, 'najla', 'najla@gmail.com', '$2y$10$MGTFYh5C2/yrw9xk/3nd0.9cTYXufy9LHtFzE5d/ubsGzWkelRKvm', NULL, '2023-06-14 15:34:24', '2023-06-14 15:34:24', NULL),
(97, 3, 1, 'alya', 'alya@gmail.com', '$2y$10$VazrzoZHBd8La3cwtvBPCu4GR6UrUtWjU2MG3IppWB3XewVXzL4Fq', NULL, '2023-06-14 15:34:24', '2023-06-14 15:34:24', NULL),
(98, 3, 1, 'diego', 'diego@gmail.com', '$2y$10$xlxTm5kEH21hPT/Zv8fXm.oc8IdOHdBRYc/zcGldrFicMs79JsHYW', NULL, '2023-06-14 15:34:25', '2023-06-14 15:34:25', NULL),
(99, 3, 1, 'amelia', 'amelia@gmail.com', '$2y$10$bF83VGgwgktC9./BMHYVruqDPHIO7vwTqssYCt4KOhbopx/i0Xdsu', NULL, '2023-06-14 15:34:25', '2023-06-14 15:34:25', NULL),
(100, 3, 1, 'fayza', 'fayza@gmail.com', '$2y$10$.I0NmaFhKRgKFxgfYppG4elx1u7ivTxK3XATRlEz29oyABqTKNvZO', NULL, '2023-06-14 15:34:25', '2023-06-14 15:34:25', NULL),
(101, 3, 1, 'destiny', 'destiny@gmail.com', '$2y$10$n2BfVnD8WZjny64x4nFR4OJ5Mif71xym9wktiKd//UiHXyR6jUToK', NULL, '2023-06-14 15:34:25', '2023-06-14 15:34:25', NULL),
(102, 3, 1, 'kumbara', 'kumbara@gmail.com', '$2y$10$V1Z73qvKIokAbxraI3ejzOYUwJcmQAgV8CRvFoAqx6OVB0jLGykWG', NULL, '2023-06-14 15:34:25', '2023-06-14 15:34:25', NULL),
(103, 3, 1, 'kamilia', 'kamilia@gmail.com', '$2y$10$PAkxwgCD7nJb/0jj0WP0hO0Xp82fCmS7FqyIRYtNIQF.hzkQ7/DTK', NULL, '2023-06-14 15:34:25', '2023-06-14 15:34:25', NULL),
(104, 3, 1, 'fachry', 'fachry@gmail.com', '$2y$10$jIJNhgWkp7VqN.pNjcO2TeRzIFlKA9EjkkjgPbzn5AC0QfpjIPCHy', NULL, '2023-06-14 15:34:26', '2023-06-14 15:34:26', NULL),
(105, 3, 1, 'fauzi', 'fauzi@gmail.com', '$2y$10$wzPDu6qeh94RLCPDz1lMju10Ekv.wBTlKANdhDZebHII6wRE1BMS2', NULL, '2023-06-14 15:34:26', '2023-06-14 15:34:26', NULL),
(106, 3, 1, 'fachrur', 'fachrur@gmail.com', '$2y$10$9lp/9rBsJvlm4MJx2dWuJuxk6lzgqPeu0hJMzhIQ46WfHfsdjiM8K', NULL, '2023-06-14 15:34:26', '2023-06-14 15:34:26', NULL),
(107, 3, 1, 'endar', 'endar@gmail.com', '$2y$10$FKSun8d/CW04XdyKK0lMd.pOUq5eTeDHa1TpQkQjGBM9ongg7GOQ2', NULL, '2023-06-14 15:34:26', '2023-06-14 15:34:26', NULL),
(108, 3, 1, 'husni', 'husni@gmail.com', '$2y$10$nCWPlYuuw2MrIZDpkABQXu/tXmRVLZiqpjTxdeSbn607nQK.XbUQO', NULL, '2023-06-14 15:34:26', '2023-06-14 15:34:26', NULL),
(109, 3, 1, 'zitha', 'zitha@gmail.com', '$2y$10$66Qo6oh8Kc41PgrCbXWa/ud3JoWyV6QOF6VMxIkocbpArPF7pF4j2', NULL, '2023-06-14 15:34:27', '2023-06-14 15:34:27', NULL),
(110, 3, 1, 'viona', 'viona@gmail.com', '$2y$10$u9s7F6d72KK1ovNY3ZZYH.rOQ/gVMAV1bv11XIJGnpgCaWymFdpM6', NULL, '2023-06-14 15:34:27', '2023-06-14 15:34:27', NULL),
(111, 3, 1, 'anggreyani', 'anggreyani@gmail.com', '$2y$10$dd2jVoyJi7nSrQXTWlScXO9dEfBvkEepO43FvNj.Mt/HiF2jUgs9q', NULL, '2023-06-14 15:34:27', '2023-06-14 15:34:27', NULL),
(112, 3, 1, 'fadhilah', 'fadhilah@gmail.com', '$2y$10$zW7wzmLYO23Z86wbjdwA5uZAPFvdAf5F7qOd8GDrRyDQ4xtvfKVH2', NULL, '2023-06-14 15:34:27', '2023-06-14 15:34:27', NULL),
(113, 3, 1, 'maulana', 'maulana@gmail.com', '$2y$10$AWBSXG76EW/VXTKF5f43X.SnEkJBr5ezqkmxdx4W7h7J0R26waURy', NULL, '2023-06-14 15:34:27', '2023-06-14 15:34:27', NULL),
(114, 3, 1, 'fitrananda', 'fitrananda@gmail.com', '$2y$10$xHz3ZYU/Tz1Et8GzjQxT/u0aViVzTqRXeCn7oVK54YCZ9VI0tvjya', NULL, '2023-06-14 15:34:28', '2023-06-14 15:34:28', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_user_id_foreign` (`user_id`);

--
-- Indexes for table `current_semester`
--
ALTER TABLE `current_semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deadline_prasidang`
--
ALTER TABLE `deadline_prasidang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deadline_prasidang_prodi_id_foreign` (`prodi_id`),
  ADD KEY `deadline_prasidang_periode_id_foreign` (`periode_id`);

--
-- Indexes for table `deadline_proposal`
--
ALTER TABLE `deadline_proposal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deadline_proposal_prodi_id_foreign` (`prodi_id`),
  ADD KEY `deadline_proposal_periode_id_foreign` (`periode_id`);

--
-- Indexes for table `deadline_sidang`
--
ALTER TABLE `deadline_sidang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deadline_sidang_prodi_id_foreign` (`prodi_id`),
  ADD KEY `deadline_sidang_periode_id_foreign` (`periode_id`);

--
-- Indexes for table `detail_nilai_prasidang`
--
ALTER TABLE `detail_nilai_prasidang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_nilai_prasidang_nilai_prasidang_id_foreign` (`nilai_prasidang_id`),
  ADD KEY `detail_nilai_prasidang_komponen_prasidang_id_foreign` (`komponen_prasidang_id`);

--
-- Indexes for table `detail_nilai_proposal`
--
ALTER TABLE `detail_nilai_proposal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_nilai_proposal_nilai_proposal_id_foreign` (`nilai_proposal_id`),
  ADD KEY `detail_nilai_proposal_komponen_proposal_id_foreign` (`komponen_proposal_id`);

--
-- Indexes for table `detail_nilai_sidang`
--
ALTER TABLE `detail_nilai_sidang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_nilai_sidang_nilai_sidang_id_foreign` (`nilai_sidang_id`),
  ADD KEY `detail_nilai_sidang_komponen_sidang_id_foreign` (`komponen_sidang_id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dosen_nip_unique` (`nip`),
  ADD UNIQUE KEY `dosen_kode_unique` (`kode`),
  ADD KEY `dosen_user_id_foreign` (`user_id`),
  ADD KEY `dosen_periode_id_foreign` (`periode_id`),
  ADD KEY `dosen_dosen_import_id_foreign` (`dosen_import_id`);

--
-- Indexes for table `dosen_import`
--
ALTER TABLE `dosen_import`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dosen_import_periode_id_foreign` (`periode_id`),
  ADD KEY `dosen_import_prodi_id_foreign` (`prodi_id`);

--
-- Indexes for table `dosen_kaprodi`
--
ALTER TABLE `dosen_kaprodi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dosen_kaprodi_periode_id_foreign` (`periode_id`),
  ADD KEY `dosen_kaprodi_dosen_id_foreign` (`dosen_id`),
  ADD KEY `dosen_kaprodi_prodi_id_foreign` (`prodi_id`);

--
-- Indexes for table `dosen_koordinator_pa`
--
ALTER TABLE `dosen_koordinator_pa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dosen_koordinator_pa_periode_id_foreign` (`periode_id`),
  ADD KEY `dosen_koordinator_pa_dosen_id_foreign` (`dosen_id`),
  ADD KEY `dosen_koordinator_pa_prodi_id_foreign` (`prodi_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `histori_judul_prasidang`
--
ALTER TABLE `histori_judul_prasidang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `histori_judul_prasidang_prasidang_id_foreign` (`prasidang_id`);

--
-- Indexes for table `histori_judul_proposal`
--
ALTER TABLE `histori_judul_proposal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `histori_judul_proposal_proposal_id_foreign` (`proposal_id`);

--
-- Indexes for table `jadwal_prasidang`
--
ALTER TABLE `jadwal_prasidang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_prasidang_prasidang_id_foreign` (`prasidang_id`),
  ADD KEY `jadwal_prasidang_ruangan_id_foreign` (`ruangan_id`);

--
-- Indexes for table `jadwal_sidang`
--
ALTER TABLE `jadwal_sidang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_sidang_sidang_id_foreign` (`sidang_id`),
  ADD KEY `jadwal_sidang_ruangan_id_foreign` (`ruangan_id`);

--
-- Indexes for table `komponen`
--
ALTER TABLE `komponen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komponen_prodi_id_foreign` (`prodi_id`);

--
-- Indexes for table `komponen_prasidang`
--
ALTER TABLE `komponen_prasidang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komponen_prasidang_prodi_id_foreign` (`prodi_id`),
  ADD KEY `komponen_prasidang_periode_id_foreign` (`periode_id`),
  ADD KEY `komponen_prasidang_deadline_prasidang_id_foreign` (`deadline_prasidang_id`);

--
-- Indexes for table `komponen_proposal`
--
ALTER TABLE `komponen_proposal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komponen_proposal_prodi_id_foreign` (`prodi_id`),
  ADD KEY `komponen_proposal_periode_id_foreign` (`periode_id`),
  ADD KEY `komponen_proposal_deadline_proposal_id_foreign` (`deadline_proposal_id`);

--
-- Indexes for table `komponen_sidang`
--
ALTER TABLE `komponen_sidang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komponen_sidang_prodi_id_foreign` (`prodi_id`),
  ADD KEY `komponen_sidang_periode_id_foreign` (`periode_id`),
  ADD KEY `komponen_sidang_deadline_sidang_id_foreign` (`deadline_sidang_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mahasiswa_nim_unique` (`nim`),
  ADD KEY `mahasiswa_user_id_foreign` (`user_id`),
  ADD KEY `mahasiswa_periode_id_foreign` (`periode_id`),
  ADD KEY `mahasiswa_mahasiswa_import_id_foreign` (`mahasiswa_import_id`);

--
-- Indexes for table `mahasiswa_import`
--
ALTER TABLE `mahasiswa_import`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswa_import_periode_id_foreign` (`periode_id`),
  ADD KEY `mahasiswa_import_prodi_id_foreign` (`prodi_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_mutu`
--
ALTER TABLE `nilai_mutu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_mutu_periode_id_foreign` (`periode_id`);

--
-- Indexes for table `nilai_prasidang`
--
ALTER TABLE `nilai_prasidang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_prasidang_prasidang_id_foreign` (`prasidang_id`),
  ADD KEY `nilai_prasidang_ruangan_id_foreign` (`ruangan_id`);

--
-- Indexes for table `nilai_prasidang_final`
--
ALTER TABLE `nilai_prasidang_final`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_prasidang_final_prasidang_id_foreign` (`prasidang_id`);

--
-- Indexes for table `nilai_proposal`
--
ALTER TABLE `nilai_proposal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_proposal_proposal_id_foreign` (`proposal_id`),
  ADD KEY `nilai_proposal_ruangan_id_foreign` (`ruangan_id`);

--
-- Indexes for table `nilai_proposal_final`
--
ALTER TABLE `nilai_proposal_final`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_proposal_final_proposal_id_foreign` (`proposal_id`);

--
-- Indexes for table `nilai_sidang`
--
ALTER TABLE `nilai_sidang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_sidang_sidang_id_foreign` (`sidang_id`),
  ADD KEY `nilai_sidang_ruangan_id_foreign` (`ruangan_id`);

--
-- Indexes for table `nilai_sidang_final`
--
ALTER TABLE `nilai_sidang_final`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_sidang_final_sidang_id_foreign` (`sidang_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pendaftaran_sidang`
--
ALTER TABLE `pendaftaran_sidang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pendaftaran_sidang_periode_id_foreign` (`periode_id`),
  ADD KEY `pendaftaran_sidang_mahasiswa_id_foreign` (`mahasiswa_id`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periode_semester`
--
ALTER TABLE `periode_semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prasidang`
--
ALTER TABLE `prasidang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prasidang_mahasiswa_id_foreign` (`mahasiswa_id`),
  ADD KEY `prasidang_pembimbing1_id_foreign` (`pembimbing1_id`),
  ADD KEY `prasidang_pembimbing2_id_foreign` (`pembimbing2_id`),
  ADD KEY `prasidang_penguji1_id_foreign` (`penguji1_id`),
  ADD KEY `prasidang_penguji2_id_foreign` (`penguji2_id`),
  ADD KEY `prasidang_periode_id_foreign` (`periode_id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `prodi_kode_unique` (`kode`),
  ADD KEY `prodi_periode_id_foreign` (`periode_id`),
  ADD KEY `prodi_koor_id_foreign` (`koor_id`),
  ADD KEY `prodi_kaprodi_id_foreign` (`kaprodi_id`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proposal_mahasiswa_id_foreign` (`mahasiswa_id`),
  ADD KEY `proposal_pembimbing1_id_foreign` (`pembimbing1_id`),
  ADD KEY `proposal_pembimbing2_id_foreign` (`pembimbing2_id`),
  ADD KEY `proposal_penguji1_id_foreign` (`penguji1_id`),
  ADD KEY `proposal_penguji2_id_foreign` (`penguji2_id`),
  ADD KEY `proposal_periode_id_foreign` (`periode_id`);

--
-- Indexes for table `revisi`
--
ALTER TABLE `revisi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `revisi_sidang_id_foreign` (`sidang_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_dosen`
--
ALTER TABLE `role_dosen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_dosen_kode_unique` (`kode`),
  ADD KEY `role_dosen_periode_id_foreign` (`periode_id`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ruangan_kode_unique` (`kode`);

--
-- Indexes for table `ruangan_terpakai`
--
ALTER TABLE `ruangan_terpakai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sidang`
--
ALTER TABLE `sidang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sidang_pendaftaran_sidang_id_foreign` (`pendaftaran_sidang_id`),
  ADD KEY `sidang_mahasiswa_id_foreign` (`mahasiswa_id`),
  ADD KEY `sidang_pembimbing1_id_foreign` (`pembimbing1_id`),
  ADD KEY `sidang_pembimbing2_id_foreign` (`pembimbing2_id`),
  ADD KEY `sidang_penguji1_id_foreign` (`penguji1_id`),
  ADD KEY `sidang_penguji2_id_foreign` (`penguji2_id`),
  ADD KEY `sidang_periode_id_foreign` (`periode_id`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_prodi_id_foreign` (`prodi_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `current_semester`
--
ALTER TABLE `current_semester`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deadline_prasidang`
--
ALTER TABLE `deadline_prasidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deadline_proposal`
--
ALTER TABLE `deadline_proposal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deadline_sidang`
--
ALTER TABLE `deadline_sidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detail_nilai_prasidang`
--
ALTER TABLE `detail_nilai_prasidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detail_nilai_proposal`
--
ALTER TABLE `detail_nilai_proposal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `detail_nilai_sidang`
--
ALTER TABLE `detail_nilai_sidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `dosen_import`
--
ALTER TABLE `dosen_import`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dosen_kaprodi`
--
ALTER TABLE `dosen_kaprodi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dosen_koordinator_pa`
--
ALTER TABLE `dosen_koordinator_pa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `histori_judul_prasidang`
--
ALTER TABLE `histori_judul_prasidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `histori_judul_proposal`
--
ALTER TABLE `histori_judul_proposal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal_prasidang`
--
ALTER TABLE `jadwal_prasidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jadwal_sidang`
--
ALTER TABLE `jadwal_sidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `komponen`
--
ALTER TABLE `komponen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komponen_prasidang`
--
ALTER TABLE `komponen_prasidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `komponen_proposal`
--
ALTER TABLE `komponen_proposal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `komponen_sidang`
--
ALTER TABLE `komponen_sidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `mahasiswa_import`
--
ALTER TABLE `mahasiswa_import`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `nilai_mutu`
--
ALTER TABLE `nilai_mutu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `nilai_prasidang`
--
ALTER TABLE `nilai_prasidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nilai_prasidang_final`
--
ALTER TABLE `nilai_prasidang_final`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai_proposal`
--
ALTER TABLE `nilai_proposal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `nilai_proposal_final`
--
ALTER TABLE `nilai_proposal_final`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai_sidang`
--
ALTER TABLE `nilai_sidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai_sidang_final`
--
ALTER TABLE `nilai_sidang_final`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pendaftaran_sidang`
--
ALTER TABLE `pendaftaran_sidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `periode_semester`
--
ALTER TABLE `periode_semester`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prasidang`
--
ALTER TABLE `prasidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `revisi`
--
ALTER TABLE `revisi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role_dosen`
--
ALTER TABLE `role_dosen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ruangan_terpakai`
--
ALTER TABLE `ruangan_terpakai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sidang`
--
ALTER TABLE `sidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `deadline_prasidang`
--
ALTER TABLE `deadline_prasidang`
  ADD CONSTRAINT `deadline_prasidang_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `deadline_prasidang_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `deadline_proposal`
--
ALTER TABLE `deadline_proposal`
  ADD CONSTRAINT `deadline_proposal_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `deadline_proposal_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `deadline_sidang`
--
ALTER TABLE `deadline_sidang`
  ADD CONSTRAINT `deadline_sidang_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `deadline_sidang_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `detail_nilai_prasidang`
--
ALTER TABLE `detail_nilai_prasidang`
  ADD CONSTRAINT `detail_nilai_prasidang_komponen_prasidang_id_foreign` FOREIGN KEY (`komponen_prasidang_id`) REFERENCES `komponen_prasidang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_nilai_prasidang_nilai_prasidang_id_foreign` FOREIGN KEY (`nilai_prasidang_id`) REFERENCES `nilai_prasidang` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `detail_nilai_proposal`
--
ALTER TABLE `detail_nilai_proposal`
  ADD CONSTRAINT `detail_nilai_proposal_komponen_proposal_id_foreign` FOREIGN KEY (`komponen_proposal_id`) REFERENCES `komponen_proposal` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_nilai_proposal_nilai_proposal_id_foreign` FOREIGN KEY (`nilai_proposal_id`) REFERENCES `nilai_proposal` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `detail_nilai_sidang`
--
ALTER TABLE `detail_nilai_sidang`
  ADD CONSTRAINT `detail_nilai_sidang_komponen_sidang_id_foreign` FOREIGN KEY (`komponen_sidang_id`) REFERENCES `komponen_sidang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_nilai_sidang_nilai_sidang_id_foreign` FOREIGN KEY (`nilai_sidang_id`) REFERENCES `nilai_sidang` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_dosen_import_id_foreign` FOREIGN KEY (`dosen_import_id`) REFERENCES `dosen_import` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dosen_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dosen_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dosen_import`
--
ALTER TABLE `dosen_import`
  ADD CONSTRAINT `dosen_import_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dosen_import_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dosen_kaprodi`
--
ALTER TABLE `dosen_kaprodi`
  ADD CONSTRAINT `dosen_kaprodi_dosen_id_foreign` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dosen_kaprodi_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dosen_kaprodi_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dosen_koordinator_pa`
--
ALTER TABLE `dosen_koordinator_pa`
  ADD CONSTRAINT `dosen_koordinator_pa_dosen_id_foreign` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dosen_koordinator_pa_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dosen_koordinator_pa_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `histori_judul_prasidang`
--
ALTER TABLE `histori_judul_prasidang`
  ADD CONSTRAINT `histori_judul_prasidang_prasidang_id_foreign` FOREIGN KEY (`prasidang_id`) REFERENCES `prasidang` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `histori_judul_proposal`
--
ALTER TABLE `histori_judul_proposal`
  ADD CONSTRAINT `histori_judul_proposal_proposal_id_foreign` FOREIGN KEY (`proposal_id`) REFERENCES `proposal` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jadwal_prasidang`
--
ALTER TABLE `jadwal_prasidang`
  ADD CONSTRAINT `jadwal_prasidang_prasidang_id_foreign` FOREIGN KEY (`prasidang_id`) REFERENCES `prasidang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jadwal_prasidang_ruangan_id_foreign` FOREIGN KEY (`ruangan_id`) REFERENCES `ruangan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jadwal_sidang`
--
ALTER TABLE `jadwal_sidang`
  ADD CONSTRAINT `jadwal_sidang_ruangan_id_foreign` FOREIGN KEY (`ruangan_id`) REFERENCES `ruangan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jadwal_sidang_sidang_id_foreign` FOREIGN KEY (`sidang_id`) REFERENCES `sidang` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `komponen`
--
ALTER TABLE `komponen`
  ADD CONSTRAINT `komponen_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `komponen_prasidang`
--
ALTER TABLE `komponen_prasidang`
  ADD CONSTRAINT `komponen_prasidang_deadline_prasidang_id_foreign` FOREIGN KEY (`deadline_prasidang_id`) REFERENCES `deadline_prasidang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `komponen_prasidang_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `komponen_prasidang_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `komponen_proposal`
--
ALTER TABLE `komponen_proposal`
  ADD CONSTRAINT `komponen_proposal_deadline_proposal_id_foreign` FOREIGN KEY (`deadline_proposal_id`) REFERENCES `deadline_proposal` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `komponen_proposal_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `komponen_proposal_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `komponen_sidang`
--
ALTER TABLE `komponen_sidang`
  ADD CONSTRAINT `komponen_sidang_deadline_sidang_id_foreign` FOREIGN KEY (`deadline_sidang_id`) REFERENCES `deadline_sidang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `komponen_sidang_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `komponen_sidang_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_mahasiswa_import_id_foreign` FOREIGN KEY (`mahasiswa_import_id`) REFERENCES `mahasiswa_import` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mahasiswa_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mahasiswa_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mahasiswa_import`
--
ALTER TABLE `mahasiswa_import`
  ADD CONSTRAINT `mahasiswa_import_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mahasiswa_import_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nilai_mutu`
--
ALTER TABLE `nilai_mutu`
  ADD CONSTRAINT `nilai_mutu_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nilai_prasidang`
--
ALTER TABLE `nilai_prasidang`
  ADD CONSTRAINT `nilai_prasidang_prasidang_id_foreign` FOREIGN KEY (`prasidang_id`) REFERENCES `prasidang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilai_prasidang_ruangan_id_foreign` FOREIGN KEY (`ruangan_id`) REFERENCES `ruangan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nilai_prasidang_final`
--
ALTER TABLE `nilai_prasidang_final`
  ADD CONSTRAINT `nilai_prasidang_final_prasidang_id_foreign` FOREIGN KEY (`prasidang_id`) REFERENCES `prasidang` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nilai_proposal`
--
ALTER TABLE `nilai_proposal`
  ADD CONSTRAINT `nilai_proposal_proposal_id_foreign` FOREIGN KEY (`proposal_id`) REFERENCES `proposal` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilai_proposal_ruangan_id_foreign` FOREIGN KEY (`ruangan_id`) REFERENCES `ruangan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nilai_proposal_final`
--
ALTER TABLE `nilai_proposal_final`
  ADD CONSTRAINT `nilai_proposal_final_proposal_id_foreign` FOREIGN KEY (`proposal_id`) REFERENCES `proposal` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nilai_sidang`
--
ALTER TABLE `nilai_sidang`
  ADD CONSTRAINT `nilai_sidang_ruangan_id_foreign` FOREIGN KEY (`ruangan_id`) REFERENCES `ruangan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilai_sidang_sidang_id_foreign` FOREIGN KEY (`sidang_id`) REFERENCES `sidang` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nilai_sidang_final`
--
ALTER TABLE `nilai_sidang_final`
  ADD CONSTRAINT `nilai_sidang_final_sidang_id_foreign` FOREIGN KEY (`sidang_id`) REFERENCES `sidang` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pendaftaran_sidang`
--
ALTER TABLE `pendaftaran_sidang`
  ADD CONSTRAINT `pendaftaran_sidang_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pendaftaran_sidang_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `prasidang`
--
ALTER TABLE `prasidang`
  ADD CONSTRAINT `prasidang_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prasidang_pembimbing1_id_foreign` FOREIGN KEY (`pembimbing1_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prasidang_pembimbing2_id_foreign` FOREIGN KEY (`pembimbing2_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prasidang_penguji1_id_foreign` FOREIGN KEY (`penguji1_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prasidang_penguji2_id_foreign` FOREIGN KEY (`penguji2_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prasidang_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_kaprodi_id_foreign` FOREIGN KEY (`kaprodi_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prodi_koor_id_foreign` FOREIGN KEY (`koor_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prodi_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `proposal`
--
ALTER TABLE `proposal`
  ADD CONSTRAINT `proposal_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `proposal_pembimbing1_id_foreign` FOREIGN KEY (`pembimbing1_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `proposal_pembimbing2_id_foreign` FOREIGN KEY (`pembimbing2_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `proposal_penguji1_id_foreign` FOREIGN KEY (`penguji1_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `proposal_penguji2_id_foreign` FOREIGN KEY (`penguji2_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `proposal_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `revisi`
--
ALTER TABLE `revisi`
  ADD CONSTRAINT `revisi_sidang_id_foreign` FOREIGN KEY (`sidang_id`) REFERENCES `sidang` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_dosen`
--
ALTER TABLE `role_dosen`
  ADD CONSTRAINT `role_dosen_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sidang`
--
ALTER TABLE `sidang`
  ADD CONSTRAINT `sidang_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sidang_pembimbing1_id_foreign` FOREIGN KEY (`pembimbing1_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sidang_pembimbing2_id_foreign` FOREIGN KEY (`pembimbing2_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sidang_pendaftaran_sidang_id_foreign` FOREIGN KEY (`pendaftaran_sidang_id`) REFERENCES `pendaftaran_sidang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sidang_penguji1_id_foreign` FOREIGN KEY (`penguji1_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sidang_penguji2_id_foreign` FOREIGN KEY (`penguji2_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sidang_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE;
COMMIT;

CREATE TABLE madusem (
    id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    mahasiswa_id bigint(20) UNSIGNED,
    pbb_1_id bigint(20) UNSIGNED,
    pbb_2_id bigint(20) UNSIGNED,
    puj_1_id bigint(20) UNSIGNED,
    puj_2_id bigint(20) UNSIGNED,
    tanggal_selesai DATE,
    keterangan TEXT,
    file_revisi VARCHAR(255),
    created_at timestamp NULL DEFAULT NULL,
    updated_at timestamp NULL DEFAULT NULL,
    deleted_at timestamp NULL DEFAULT NULL,
    PRIMARY KEY (id),
    INDEX (mahasiswa_id),
    INDEX (pbb_1_id),
    INDEX (pbb_2_id),
    INDEX (puj_1_id),
    INDEX (puj_2_id),
    FOREIGN KEY (mahasiswa_id) REFERENCES mahasiswa(id) ON DELETE CASCADE,
    FOREIGN KEY (pbb_1_id) REFERENCES dosen(id) ON DELETE CASCADE,
    FOREIGN KEY (pbb_2_id) REFERENCES dosen(id) ON DELETE CASCADE,
    FOREIGN KEY (puj_1_id) REFERENCES dosen(id) ON DELETE CASCADE,
    FOREIGN KEY (puj_2_id) REFERENCES dosen(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE komponen_madusem (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_komponen VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL,
    presentase INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
    UNIQUE KEY (slug) -- Tambahkan constraint UNIQUE pada kolom slug
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE komponen_madusem_pivot (
    id INT AUTO_INCREMENT PRIMARY KEY,
    madusem_id bigint(20) UNSIGNED,
    komponen_madusem_id INT,
    nilai_komponen INT NULL DEFAULT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (madusem_id) REFERENCES madusem(id) ON DELETE CASCADE,
    FOREIGN KEY (komponen_madusem_id) REFERENCES komponen_madusem(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

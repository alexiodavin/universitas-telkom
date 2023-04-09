-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2023 at 07:42 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

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
(1, '2022-2023', 'Genap', '2023-03-10 15:56:09', '2023-03-10 17:27:37');

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
(1, 1, 3, '2022-11-26', NULL, '2022-11-10 07:04:25'),
(2, 1, 10, '2022-04-10', NULL, NULL);

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
(1, 1, 6, '2022-11-26', NULL, NULL),
(2, 1, 10, '2022-02-09', NULL, NULL);

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
(1, 1, 3, '2022-11-26', NULL, NULL);

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

--
-- Dumping data for table `detail_nilai_prasidang`
--

INSERT INTO `detail_nilai_prasidang` (`id`, `nilai_prasidang_id`, `komponen_prasidang_id`, `nilai`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 30, '2022-11-10 07:22:53', '2022-11-10 07:22:53', NULL),
(2, 1, 2, 29, '2022-11-10 07:22:53', '2022-11-10 07:22:53', NULL),
(3, 1, 3, 17, '2022-11-10 07:22:53', '2022-11-10 07:22:53', NULL),
(4, 1, 4, 9, '2022-11-10 07:22:53', '2022-11-10 07:22:53', NULL);

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
(1, 1, 1, 15, '2022-11-10 05:31:39', '2022-11-10 05:31:39', NULL),
(2, 1, 2, 15, '2022-11-10 05:31:39', '2022-11-10 05:31:39', NULL),
(3, 1, 3, 7, '2022-11-10 05:31:39', '2022-11-10 05:31:39', NULL),
(4, 1, 4, 19, '2022-11-10 05:31:39', '2022-11-10 05:31:39', NULL),
(5, 1, 5, 19, '2022-11-10 05:31:39', '2022-11-10 05:31:39', NULL),
(6, 2, 1, 15, '2022-11-10 07:20:08', '2022-11-10 07:20:08', NULL),
(7, 2, 2, 15, '2022-11-10 07:20:08', '2022-11-10 07:20:08', NULL),
(8, 2, 3, 5, '2022-11-10 07:20:08', '2022-11-10 07:20:08', NULL),
(9, 2, 4, 15, '2022-11-10 07:20:08', '2022-11-10 07:20:08', NULL),
(10, 2, 5, 15, '2022-11-10 07:20:08', '2022-11-10 07:20:08', NULL),
(11, 2, 6, 15, '2022-11-10 07:20:08', '2022-11-10 07:20:08', NULL),
(12, 2, 7, 15, '2022-11-10 07:20:08', '2022-11-10 07:20:08', NULL),
(13, 2, 8, 15, '2022-11-10 07:20:08', '2022-11-10 07:20:08', NULL),
(14, 2, 9, 15, '2022-11-10 07:20:08', '2022-11-10 07:20:08', NULL),
(15, 3, 1, 18, '2022-11-16 05:35:11', '2022-11-16 05:35:11', NULL),
(16, 3, 2, 18, '2022-11-16 05:35:11', '2022-11-16 05:35:11', NULL),
(17, 3, 3, 7, '2022-11-16 05:35:11', '2022-11-16 05:35:11', NULL),
(18, 3, 4, 23, '2022-11-16 05:35:11', '2022-11-16 05:35:11', NULL),
(19, 3, 5, 21, '2022-11-16 05:35:11', '2022-11-16 05:35:11', NULL),
(20, 3, 16, 21, '2022-11-16 05:35:11', '2022-11-16 05:35:11', NULL),
(21, 3, 17, 20, '2022-11-16 05:35:11', '2022-11-16 05:35:11', NULL),
(22, 3, 18, 20, '2022-11-16 05:35:11', '2022-11-16 05:35:11', NULL),
(23, 3, 19, 20, '2022-11-16 05:35:11', '2022-11-16 05:35:11', NULL),
(24, 3, 20, 20, '2022-11-16 05:35:11', '2022-11-16 05:35:11', NULL),
(25, 3, 21, 20, '2022-11-16 05:35:11', '2022-11-16 05:35:11', NULL),
(26, 4, 1, 16, '2022-11-16 05:38:17', '2022-11-16 05:38:17', NULL),
(27, 4, 2, 16, '2022-11-16 05:38:17', '2022-11-16 05:38:17', NULL),
(28, 4, 3, 7, '2022-11-16 05:38:17', '2022-11-16 05:38:17', NULL),
(29, 4, 4, 15, '2022-11-16 05:38:17', '2022-11-16 05:38:17', NULL),
(30, 4, 5, 16, '2022-11-16 05:38:17', '2022-11-16 05:38:17', NULL),
(31, 4, 16, 20, '2022-11-16 05:38:17', '2022-11-16 05:38:17', NULL),
(32, 4, 17, 20, '2022-11-16 05:38:17', '2022-11-16 05:38:17', NULL),
(33, 4, 18, 20, '2022-11-16 05:38:17', '2022-11-16 05:38:17', NULL),
(34, 4, 19, 20, '2022-11-16 05:38:17', '2022-11-16 05:38:17', NULL),
(35, 4, 20, 20, '2022-11-16 05:38:17', '2022-11-16 05:38:17', NULL),
(36, 4, 21, 20, '2022-11-16 05:38:17', '2022-11-16 05:38:17', NULL);

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

INSERT INTO `dosen` (`id`, `user_id`, `periode_id`, `dosen_import_id`, `nama`, `nama_gelar`, `nip`, `kode`, `telepon`, `alamat`, `foto`, `tahun_ajaran`, `semester`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, 2, 'Patrick Adolf Telnoni', 'Patrick Adolf Telnoni, S.T., M.T.', '5171', 'PTI', '+62 822-1928-7517', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-08-16 09:34:30', '2022-08-16 09:34:30', NULL),
(2, 3, 1, 2, 'Dedy Rahman Wijaya', 'Dr. Dedy Rahman Wijaya, S.T., M.T.', '5172', 'DRW', '+62 822-1914-7349', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-08-16 09:34:30', '2022-08-16 09:34:30', NULL),
(3, 4, 1, 2, 'Hanung Nindito Prasetyo', 'Hanung Nindito Prasetyo, S.Si, M.T.', '5173', 'HNP', '+62 812-2059-9883', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-08-16 09:34:30', '2022-08-16 09:34:30', NULL),
(4, 5, 1, 2, 'M. Barja Sanjaya', 'M. Barja Sanjaya, S.T., M.T., OCA.', '5174', 'MBS', '+62 813-1314-1120', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-08-16 09:34:30', '2022-08-16 09:34:30', NULL),
(5, 6, 1, 2, 'Siska Komala Sari', 'Siska Komala Sari, S.T., M.T.', '5175', 'SKS', '+62 813-2019-8038', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-08-16 09:34:30', '2022-08-16 09:34:30', NULL),
(6, 7, 1, 2, 'Wawa Wikusna', 'Wawa Wikusna, S.T., M.Kom.', '5176', 'WIU', '+62 813-2060-4160', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-08-16 09:34:30', '2022-08-16 09:34:30', NULL),
(7, 8, 1, 2, 'Elis Hernawati', 'Elis Hernawati, S.T., M.Kom.', '5177', 'ELT', '+62 822-4003-5983', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-08-16 09:34:31', '2022-08-16 09:34:31', NULL),
(8, 9, 1, 2, 'Inne Gartina Husein', 'Dr. Inne Gartina Husein, S.Kom., M.T.', '5178', 'INE', '+62 813-9509-6162', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-08-16 09:34:31', '2022-08-16 09:34:31', NULL),
(9, 10, 1, 2, 'Pramuko Aji', 'Pramuko Aji, S.T., M.T.', '5179', 'PRA', '+62 821-8008-5050', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-08-16 09:34:31', '2022-08-16 09:34:31', NULL),
(10, 11, 1, 2, 'Suryatiningsih', 'Suryatiningsih, S.T., M.T., OCA., C.Ht.', '5180', 'SYN', '+62 813-2077-6520', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-08-16 09:34:31', '2022-08-16 09:34:31', NULL),
(11, 12, 1, 2, 'Tedi Gunawan', 'Tedi Gunawan, S.T., M.Kom.', '5181', 'TGN', '+62 812-2199-440', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-08-16 09:34:31', '2022-08-16 09:34:31', NULL),
(12, 13, 1, 2, 'Pikir Wisnu Wijayanto', 'Dr. Pikir Wisnu Wijayanto, S.E., S.Pd.Ing., M.Hum.', '5182', 'PWW', '+62 851-0387-9393', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-08-16 09:34:31', '2022-08-16 09:34:31', NULL),
(13, 14, 1, 2, 'Ely Rosely', 'Ir. Ely Rosely, M.B.S.', '5183', 'ELR', '+62 815-1324-4609', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-08-16 09:34:31', '2022-08-16 09:34:31', NULL),
(14, 15, 1, 2, 'Mutia Qana\'a', 'Mutia Qana\'a, S.Psi., M.Psi.', '5184', 'MQA', '+62 852-2279-7846', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-08-16 09:34:31', '2022-08-16 09:34:31', NULL),
(15, 16, 1, 2, 'Wahyu Hidayat', 'Wahyu Hidayat, S.T., M.T., OCA.', '5185', 'WHY', '+62 813-2207-2099', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-08-16 09:34:31', '2022-08-16 09:34:31', NULL),
(16, 17, 1, 2, 'Robbi Hendriyanto', 'Robbi Hendriyanto, S.T., M.T.', '5186', 'RHN', '+62 823-1604-9294', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-08-16 09:34:31', '2022-08-16 09:34:31', NULL),
(17, 22, 1, 4, 'Olivia Istianah', 'Olivia Istianah Amd.Kom', '1222', 'opi', '08131213123', 'Bandung', 'user.png', '2021-2022', 'Genap', '2022-08-16 10:53:00', '2022-08-16 10:53:00', NULL),
(18, 23, 1, 4, 'Rania Athala', 'Rania Athala Amd.Kom', '1235', 'tat', '08121312321', 'Bandung', 'user.png', '2021-2022', 'Genap', '2022-08-16 10:53:00', '2022-08-16 10:53:00', NULL),
(19, 24, 1, 4, 'Rusyda Hanifan', 'Rusyda Hanifan Amd.Kom', '1236', 'han', '8121312326', 'Bandung', 'user.png', '2021-2022', 'Genap', '2022-08-16 10:53:00', '2022-08-16 10:53:00', NULL),
(20, 25, 1, 5, 'ejakkk', 'Ejak Amd.Kom', '1229', 'ejk', '8131213120', 'Bandung', 'user.png', '2021-2022', 'Genap', '2022-08-16 11:37:53', '2022-08-16 11:37:53', NULL);

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
(2, 1, 1, '2021-2022', 'Genap', '2022-08-16 09:34:28', '2022-08-16 09:34:28', NULL),
(4, 1, 3, '2021-2022', 'Genap', '2022-08-16 10:52:58', '2022-08-16 10:52:58', NULL),
(5, 1, 1, '2021-2022', 'Genap', '2022-08-16 11:37:51', '2022-08-16 11:37:51', NULL);

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
(1, 9, 13, 1, '2021-2022', 'Ganjil', '2022-08-01', '2023-03-15', '2022-08-16 09:35:06', '2022-08-16 09:35:06', NULL),
(2, 11, 3, 2, '2022-2023', 'Ganjil', '2022-08-01', '2023-03-15', '2022-08-16 09:46:54', '2022-08-16 09:46:54', NULL);

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
(1, 10, 1, 1, '2021-2022', 'Genap', '2022-08-16 14:18:58', '2022-08-16 14:18:58', NULL),
(2, 11, 2, 1, '2022-2023', 'Ganjil', '2022-11-10 05:00:41', '2022-11-10 05:00:41', NULL),
(3, 12, 8, 1, '2022-2023', 'Genap', '2022-11-10 06:51:18', '2022-11-10 06:51:18', NULL),
(4, 13, 8, 1, '2023-2024', 'Ganjil', '2022-11-16 04:13:18', '2022-11-16 04:13:18', NULL);

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

--
-- Dumping data for table `jadwal_prasidang`
--

INSERT INTO `jadwal_prasidang` (`id`, `prasidang_id`, `ruangan_id`, `tanggal_prasidang`, `bulan`, `jam_mulai_prasidang`, `jam_selesai_prasidang`, `ruangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, NULL, '2022-09-15', 9, '21:30:00', '22:30:00', 'http://zoom.us.com', '2022-08-16 14:23:04', '2022-11-16 04:43:12', NULL),
(4, 2, 4, '2023-06-12', NULL, '13:30:00', '15:30:00', 'Ruang FIT', '2022-11-10 06:29:12', '2022-11-10 06:58:27', NULL),
(5, 1, NULL, '2022-11-26', 11, '21:30:00', '22:30:00', NULL, '2022-11-10 07:08:48', '2022-11-10 07:08:48', NULL),
(6, 4, NULL, '2022-11-28', 1, '15:30:00', '18:00:00', NULL, '2022-11-16 05:15:24', '2022-12-15 19:02:26', NULL),
(7, 4, NULL, '2022-11-28', 1, '23:30:00', '23:59:00', NULL, '2022-11-23 16:03:47', '2022-12-15 19:11:47', NULL),
(8, 4, NULL, '2022-11-28', NULL, '12:30:00', '15:00:00', NULL, '2022-11-23 16:05:18', '2022-11-23 16:05:18', NULL),
(9, 5, NULL, '2022-12-24', 1, '18:30:00', '21:00:00', NULL, '2022-12-15 18:34:49', '2022-12-15 19:12:09', NULL),
(10, 5, NULL, '2022-12-24', NULL, '16:30:00', '18:00:00', NULL, '2022-12-15 18:37:37', '2022-12-15 18:37:37', NULL),
(11, 6, NULL, '2022-12-26', NULL, '15:40:00', '17:40:00', NULL, '2022-12-15 18:38:48', '2022-12-15 18:38:48', NULL);

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

--
-- Dumping data for table `jadwal_sidang`
--

INSERT INTO `jadwal_sidang` (`id`, `sidang_id`, `ruangan_id`, `tanggal_sidang`, `bulan`, `jam_mulai_sidang`, `jam_selesai_sidang`, `ruangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, NULL, '2022-06-24', 7, '09:30:00', '10:30:00', 'http://zoom.us.com', '2022-08-16 16:34:48', '2022-11-10 06:58:53', NULL),
(2, 1, NULL, '2022-07-25', 7, '14:30:00', '15:00:00', NULL, '2022-11-10 07:11:07', '2022-11-16 05:23:26', NULL),
(3, 1, NULL, '2023-01-09', 1, '09:30:00', '10:30:00', NULL, '2022-11-16 05:18:43', '2022-11-16 05:18:43', NULL),
(4, 1, NULL, '2022-06-24', 1, '09:30:00', '10:30:00', NULL, '2022-12-15 18:37:03', '2022-12-15 18:37:03', NULL),
(5, 1, NULL, '2022-06-24', NULL, '09:30:00', '10:30:00', NULL, '2022-12-15 18:37:17', '2022-12-15 18:37:17', NULL);

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
(1, 1, 2, NULL, 'Penguasaan Materi', 35, 'Keterangan Penguasaan Materi', '2022-08-16', '2022', 'Ganjil', NULL, NULL, NULL),
(2, 1, 2, NULL, 'Penguasaan Aplikasi / Implementasi Produk', 35, 'Keterangan Penguasaan Aplikasi / Implementasi Produk', '2022-08-16', '2022', 'Ganjil', NULL, NULL, NULL),
(3, 1, 2, NULL, 'Tata Tulis', 20, 'Keterangan Tata Tulis', '2022-08-16', '2022', 'Ganjil', NULL, NULL, NULL),
(4, 1, 2, NULL, 'Teknik Presentasi', 10, 'Keterangan Teknik Presentasi', '2022-08-16', '2022', 'Ganjil', NULL, NULL, NULL),
(5, 1, 2, NULL, 'testing 1', 25, NULL, '2022-08-16', '2022', 'Ganjil', '2022-11-14 04:34:33', '2022-11-14 04:35:36', '2022-11-14 04:35:36'),
(6, 1, 2, NULL, 'testing 2', 25, NULL, '2022-08-16', '2022', 'Ganjil', '2022-11-14 04:34:33', '2022-11-14 04:35:42', '2022-11-14 04:35:42'),
(7, 1, 2, NULL, 'testing 1', 25, NULL, '2022-08-16', '2022', 'Ganjil', '2022-11-14 04:36:14', '2022-11-14 07:34:28', '2022-11-14 07:34:28'),
(8, 1, 2, NULL, 'testing 2', 25, NULL, '2022-08-16', '2022', 'Ganjil', '2022-11-14 04:36:14', '2022-11-14 07:34:33', '2022-11-14 07:34:33'),
(9, 1, 2, NULL, 'testing 1', 25, NULL, '2022-08-16', '2022', 'Ganjil', '2022-11-15 14:10:52', '2022-11-15 14:10:52', NULL),
(10, 1, 2, NULL, 'testing 2', 25, NULL, '2022-08-16', '2022', 'Ganjil', '2022-11-15 14:10:52', '2022-11-15 14:10:52', NULL),
(11, 1, 2, NULL, 'testing 1', 25, NULL, '2022-08-16', '2022', 'Ganjil', '2022-11-16 04:59:33', '2022-11-16 04:59:33', NULL),
(12, 1, 2, NULL, 'testing 2', 25, NULL, '2022-08-16', '2022', 'Ganjil', '2022-11-16 04:59:33', '2022-11-16 04:59:33', NULL),
(13, 1, 10, 2, 'BAB 1', 50, NULL, NULL, '2022', 'Genap', '2023-04-09 17:39:32', '2023-04-09 17:39:32', NULL),
(14, 1, 10, 2, 'BAB 2', 10, NULL, NULL, '2022', 'Genap', '2023-04-09 17:39:52', '2023-04-09 17:39:52', NULL);

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
(1, 1, 2, NULL, 'Latar Belakang', 20, 'Keterangan Latar Belakang', '2022-08-16', '2022', 'Ganjil', NULL, NULL, NULL),
(2, 1, 2, NULL, 'Studi Pustaka', 20, 'Keterangan Studi Pustaka', '2022-08-16', '2022', 'Ganjil', NULL, NULL, NULL),
(3, 1, 2, NULL, 'Perbandingan Sistem', 10, 'Keterangan Perbandingan Sistem', '2022-08-16', '2022', 'Ganjil', NULL, NULL, NULL),
(4, 1, 2, NULL, 'Gambaran Proses Bisnis', 25, 'Keterangan Gambaran Proses Bisnis', '2022-08-16', '2022', 'Ganjil', NULL, NULL, NULL),
(5, 1, 2, NULL, 'Lampiran Hasil Kuisioner', 25, 'Keterangan Lampiran Hasil Kuisioner', '2022-08-16', '2022', 'Ganjil', NULL, NULL, NULL),
(6, 1, 2, NULL, 'testing 1', 25, NULL, '2022-08-16', '2022', 'Ganjil', '2022-11-10 07:01:41', '2022-11-14 04:25:57', '2022-11-14 04:25:57'),
(7, 1, 2, NULL, 'testing 2', 25, NULL, '2022-08-16', '2022', 'Ganjil', '2022-11-10 07:01:41', '2022-11-14 04:26:03', '2022-11-14 04:26:03'),
(8, 1, 6, 1, 'Latar Belakang', 20, NULL, NULL, '2023', 'Genap', '2022-11-10 07:02:31', '2022-11-14 07:22:49', '2022-11-14 07:22:49'),
(9, 1, 6, 1, 'Bab 1', 25, NULL, NULL, '2023', 'Genap', '2022-11-10 07:02:47', '2022-11-14 07:22:54', '2022-11-14 07:22:54'),
(10, 1, 2, NULL, 'testing 1', 25, NULL, '2022-08-16', '2022', 'Ganjil', '2022-11-14 04:28:07', '2022-11-14 04:28:23', '2022-11-14 04:28:23'),
(11, 1, 2, NULL, 'testing 2', 25, NULL, '2022-08-16', '2022', 'Ganjil', '2022-11-14 04:28:07', '2022-11-14 04:28:30', '2022-11-14 04:28:30'),
(12, 1, 2, NULL, 'testing 1', 25, NULL, '2022-08-16', '2022', 'Ganjil', '2022-11-14 04:29:45', '2022-11-14 07:20:43', '2022-11-14 07:20:43'),
(13, 1, 2, NULL, 'testing 2', 25, NULL, '2022-08-16', '2022', 'Ganjil', '2022-11-14 04:29:45', '2022-11-14 07:20:49', '2022-11-14 07:20:49'),
(14, 1, 2, NULL, 'testing 1', 25, NULL, '2022-08-16', '2022', 'Ganjil', '2022-11-14 07:30:33', '2022-11-14 07:32:27', '2022-11-14 07:32:27'),
(15, 1, 2, NULL, 'testing 2', 25, NULL, '2022-08-16', '2022', 'Ganjil', '2022-11-14 07:30:33', '2022-11-14 07:32:32', '2022-11-14 07:32:32'),
(16, 1, 2, NULL, 'testing 1', 25, NULL, '2022-08-16', '2022', 'Ganjil', '2022-11-14 07:34:56', '2022-11-14 07:34:56', NULL),
(17, 1, 2, NULL, 'testing 2', 25, NULL, '2022-08-16', '2022', 'Ganjil', '2022-11-14 07:34:56', '2022-11-14 07:34:56', NULL),
(18, 1, 2, NULL, 'testing 1', 25, NULL, '2022-08-16', '2022', 'Ganjil', '2022-11-15 14:11:39', '2022-11-15 14:11:39', NULL),
(19, 1, 2, NULL, 'testing 2', 25, NULL, '2022-08-16', '2022', 'Ganjil', '2022-11-15 14:11:39', '2022-11-15 14:11:39', NULL),
(20, 1, 2, NULL, 'testing 1', 25, NULL, '2022-08-16', '2022', 'Ganjil', '2022-11-16 04:58:19', '2022-11-16 04:58:19', NULL),
(21, 1, 2, NULL, 'testing 2', 25, NULL, '2022-08-16', '2022', 'Ganjil', '2022-11-16 04:58:19', '2022-11-16 04:58:19', NULL),
(22, 1, 10, 2, 'BAB 1', 20, NULL, NULL, '2022', 'Genap', '2023-04-09 08:49:12', '2023-04-09 08:49:12', NULL),
(24, 1, 10, NULL, 'testing 1', 25, NULL, NULL, '2022', 'Genap', '2023-04-09 10:20:37', '2023-04-09 10:20:37', NULL),
(25, 1, 10, NULL, 'testing 2', 25, NULL, NULL, '2022', 'Genap', '2023-04-09 10:20:37', '2023-04-09 10:20:37', NULL);

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
(1, 1, 2, NULL, 'Nilai Pembimbing 1', 24, 'Keterangan Nilai Pembimbing 1', '2022-08-16', '2022', 'Ganjil', NULL, NULL, NULL),
(2, 1, 2, NULL, 'Nilai Pembimbing 2', 24, 'Keterangan Nilai Pembimbing 2', '2022-08-16', '2022', 'Ganjil', NULL, NULL, NULL),
(3, 1, 2, NULL, 'Nilai Penguji 1', 16, 'Keterangan Nilai Penguji 1', '2022-08-16', '2022', 'Ganjil', NULL, NULL, NULL),
(4, 1, 2, NULL, 'Nilai Penguji 2', 16, 'Keterangan Nilai Penguji 2', '2022-08-16', '2022', 'Ganjil', NULL, NULL, NULL),
(5, 1, 2, NULL, 'Nilai Proposal', 20, 'Keterangan Nilai Proposal', '2022-08-16', '2022', 'Ganjil', NULL, NULL, NULL),
(6, 1, 3, 1, 'Latar Belakang', 20, 'Nilai Prasidang', NULL, '2022', 'Ganjil', '2022-11-10 07:06:01', '2022-11-10 07:06:14', NULL),
(7, 1, 3, 1, 'Nilai Tambahan', 50, 'Nilai Baru', NULL, '2022', 'Ganjil', '2022-11-14 06:35:10', '2022-11-14 06:35:10', NULL),
(8, 1, 2, NULL, 'testing 1', 25, 'keterangan', '2022-08-16', '2022', 'Ganjil', '2022-11-14 06:42:24', '2022-11-14 06:42:24', NULL),
(9, 1, 2, NULL, 'testing 2', 25, 'keterangan', '2022-08-16', '2022', 'Ganjil', '2022-11-14 06:42:24', '2022-11-14 06:42:24', NULL);

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
  `semester` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `user_id`, `periode_id`, `mahasiswa_import_id`, `nama`, `nim`, `angkatan`, `telepon`, `alamat`, `foto`, `tahun_ajaran`, `semester`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 18, 1, 2, 'Olivia Istianah', '6701194000', NULL, '08213123121', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-08-16 10:34:27', '2022-08-16 10:34:27', NULL),
(2, 19, 1, 2, 'Rania Athala', '6701194001', NULL, '08123123412', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-08-16 10:34:27', '2022-08-16 10:34:27', NULL),
(3, 20, 1, 2, 'Rusyda Hanifan', '6701194002', NULL, '08121314124', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-08-16 10:34:27', '2022-08-16 10:34:27', NULL),
(4, 26, 1, 2, 'Emung Zakaria ', '6701204092', NULL, '085737125437', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-11-10 04:52:40', '2022-11-10 04:52:40', NULL),
(5, 27, 1, 2, 'Esya Oktariani', '6701200037', NULL, '085737125437', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-11-10 04:52:41', '2022-11-10 04:52:41', NULL),
(6, 28, 1, 2, 'Ahmad Ridho Maulana', '6701200042', NULL, '085737125437', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-11-10 04:52:41', '2022-11-10 04:52:41', NULL),
(7, 29, 1, 2, 'Anggun Shinta Prasella Dinata', '6701200045', NULL, '085737125437', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-11-10 04:52:41', '2022-11-10 04:52:41', NULL),
(8, 30, 1, 2, 'Derisa', '6701200066', NULL, '085737125437', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-11-10 04:52:41', '2022-11-10 04:52:41', NULL),
(9, 31, 1, 2, 'Fildzah Nabilah Putri ', '6701200071', NULL, '085737125437', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-11-10 04:52:41', '2022-11-10 04:52:41', NULL),
(10, 32, 1, 2, 'Feby Rahma Chayaningrum', '6701200073', NULL, '085737125437', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-11-10 04:52:41', '2022-11-10 04:52:41', NULL),
(11, 33, 1, 2, 'Gabriella Angelina', '6701200081', NULL, '085737125437', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-11-10 04:52:41', '2022-11-10 04:52:41', NULL),
(12, 34, 1, 2, 'Farhan Abdullah Rynold', '6701201098', NULL, '085737125437', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-11-10 04:52:41', '2022-11-10 04:52:41', NULL),
(13, 35, 1, 2, 'Gusnita Pratiwi', '6701201128', NULL, '085737125437', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-11-10 04:52:41', '2022-11-10 04:52:41', NULL),
(14, 36, 1, 2, 'Nyayu Najla Apritia', '6701201129', NULL, '085737125437', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-11-10 04:52:41', '2022-11-10 04:52:41', NULL),
(15, 37, 1, 2, 'Rayhana Alya Azzara ', '6701201142', NULL, '085737125437', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-11-10 04:52:41', '2022-11-10 04:52:41', NULL),
(16, 38, 1, 2, 'Diego Prayudha', '6701202021', NULL, '085737125437', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-11-10 04:52:41', '2022-11-10 04:52:41', NULL),
(17, 39, 1, 2, 'Amelia Ramahani ', '6701202029', NULL, '085737125437', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-11-10 04:52:41', '2022-11-10 04:52:41', NULL),
(18, 40, 1, 2, 'Fayza Alana', '6701202055', NULL, '085737125437', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-11-10 04:52:41', '2022-11-10 04:52:41', NULL),
(19, 41, 1, 2, 'Destiny sabila fitriamita dewi', '6701202060', NULL, '085737125437', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-11-10 04:52:41', '2022-11-10 04:52:41', NULL),
(20, 42, 1, 2, 'Tapa Kumbara Nasution', '6701202121', NULL, '085737125437', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-11-10 04:52:41', '2022-11-10 04:52:41', NULL),
(21, 43, 1, 2, 'Kamilia Putri Afifah R', '6701202124', NULL, '085737125437', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-11-10 04:52:41', '2022-11-10 04:52:41', NULL),
(22, 44, 1, 2, 'Raden Fachry Azwar', '6701202132', NULL, '085737125437', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-11-10 04:52:41', '2022-11-10 04:52:41', NULL),
(23, 45, 1, 2, 'Mahdhor Fauzi Hakiki', '6701202139', NULL, '085737125437', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-11-10 04:52:42', '2022-11-10 04:52:42', NULL),
(24, 46, 1, 2, 'Muhammad Fachrur Rasyid', '6701202143', NULL, '085737125437', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-11-10 04:52:42', '2022-11-10 04:52:42', NULL),
(25, 47, 1, 2, 'Endar Sulistyaningsih', '6701203107', NULL, '085737125437', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-11-10 04:52:42', '2022-11-10 04:52:42', NULL),
(26, 48, 1, 2, 'Husni Falah', '6701204007', NULL, '085737125437', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-11-10 04:52:42', '2022-11-10 04:52:42', NULL),
(27, 49, 1, 2, 'Zitha Ailsa Vashti Ali', '6701204008', NULL, '085737125437', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-11-10 04:52:42', '2022-11-10 04:52:42', NULL),
(28, 50, 1, 2, 'Viona Mustika Putri Zaelani', '6701204018', NULL, '085737125437', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-11-10 04:52:42', '2022-11-10 04:52:42', NULL),
(29, 51, 1, 2, 'Yoland Anggreyani Kendek', '6701204035', NULL, '085737125437', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-11-10 04:52:42', '2022-11-10 04:52:42', NULL),
(30, 52, 1, 2, 'Nailatul Fadhilah Syarwan', '6701204053', NULL, '085737125437', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-11-10 04:52:42', '2022-11-10 04:52:42', NULL),
(31, 53, 1, 2, 'Refka Maulana Sidik', '6701204054', NULL, '085737125437', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-11-10 04:52:42', '2022-11-10 04:52:42', NULL),
(32, 54, 1, 2, 'Rahmad Fitrananda H', '6701204069', NULL, '085737125437', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-11-10 04:52:42', '2022-11-10 04:52:42', NULL);

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
(1, 10, 1, '2021-2022', 'Genap', '2022-08-16 10:34:25', '2022-08-16 10:34:25', NULL),
(2, 10, 1, '2021-2022', 'Ganjil', '2022-11-10 04:52:40', '2022-11-10 04:52:40', NULL),
(3, 10, 1, '2022-2023', 'Genap', '2022-11-10 06:54:02', '2022-11-16 04:32:13', '2022-11-16 04:32:13');

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
(44, '2022_08_13_184514_create_histori_judul_prasidangs_table', 1);

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
(1, 9, 'A', 85, 100, '2021-2022', 'Ganjil', NULL, '2022-11-10 06:52:39', NULL),
(2, 9, 'AB', 70, 80, '2021-2022', 'Ganjil', NULL, NULL, NULL),
(3, 9, 'B', 65, 70, '2021-2022', 'Ganjil', NULL, NULL, NULL),
(4, 9, 'BC', 60, 65, '2021-2022', 'Ganjil', NULL, NULL, NULL),
(5, 9, 'C', 50, 60, '2021-2022', 'Ganjil', NULL, NULL, NULL),
(6, 9, 'D', 40, 50, '2021-2022', 'Ganjil', NULL, NULL, NULL),
(7, 9, 'E', 0, 40, '2021-2022', 'Ganjil', NULL, NULL, NULL),
(8, 10, 'A', 80, 100, '2021-2022', 'Genap', NULL, NULL, NULL),
(9, 10, 'AB', 70, 80, '2021-2022', 'Genap', NULL, NULL, NULL),
(10, 10, 'B', 65, 70, '2021-2022', 'Genap', NULL, NULL, NULL),
(11, 10, 'BC', 60, 65, '2021-2022', 'Genap', NULL, NULL, NULL),
(12, 10, 'C', 50, 60, '2021-2022', 'Genap', NULL, NULL, NULL),
(13, 10, 'D', 40, 50, '2021-2022', 'Genap', NULL, NULL, NULL),
(14, 10, 'E', 0, 40, '2021-2022', 'Genap', NULL, NULL, NULL),
(15, 11, 'A', 80, 99, '2022-2023', 'Ganjil', '2022-11-16 04:18:54', '2022-11-16 04:18:54', NULL);

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

--
-- Dumping data for table `nilai_prasidang`
--

INSERT INTO `nilai_prasidang` (`id`, `prasidang_id`, `ruangan_id`, `penguji`, `tanggal_penilaian`, `ruangan`, `nilai_akhir`, `catatan`, `file`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, NULL, '1', '2022-11-10 14:23:08', NULL, 85, 'sudah bagus', '20221110142308-1668064988-Hs8RiaBf6ATpc3HAjX5VTqW8oofwMTjkkZfKfXrn0uqiF7divr.pdf', '2022-11-10 07:22:53', '2022-11-10 07:23:08', NULL);

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
(1, 1, NULL, '1', NULL, NULL, 75, NULL, NULL, '2022-11-10 05:31:39', '2022-11-10 05:31:39', NULL),
(2, 21, NULL, '1', '2022-11-10 14:22:18', NULL, 125, 'sudah bagus', '20221110142218-1668064938-d8d562iGO9ms6MIpl2ELMRSNt5DGKpPLAdOSSZMokDEpPRDF6Y.pdf', '2022-11-10 07:20:08', '2022-11-10 07:22:18', NULL),
(3, 2, NULL, '1', '2022-11-16 12:36:34', NULL, 208, 'sudah bagus', '20221116123634-1668576994-KIynRKHWXIAKTSU6yxbzbICcgxZjKAdMpUnLmyiW1BCl6FyB9D.pdf', '2022-11-16 05:35:11', '2022-11-16 05:36:34', NULL),
(4, 2, NULL, '2', '2022-11-16 12:38:36', NULL, 190, 'cukup bagus', '20221116123836-1668577116-BclyBTWC9PMYuQfL9WyyjH4J1gfgLBB6JR6EAZjYUenKBfPZlA.pdf', '2022-11-16 05:38:17', '2022-11-16 05:38:36', NULL);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id`, `periode_semester_id`, `tahun_ajaran`, `semester`, `bulan`, `tahun`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, '2021-2022', 'Genap', 'Juni', 2022, NULL, NULL, NULL),
(2, NULL, '2021-2022', 'Ganjil', 'Desember', 2022, NULL, NULL, NULL),
(3, NULL, '2022-2023', 'Ganjil', 'September', 2022, '2022-11-10 04:54:24', '2022-11-10 04:54:24', NULL),
(4, NULL, '2022-2023', 'Genap', 'Februari', 2023, '2022-11-10 04:54:40', '2022-11-10 04:54:40', NULL),
(5, NULL, '2023-2024', 'Ganjil', 'September', 2023, '2022-11-10 06:48:52', '2022-11-10 06:48:52', NULL),
(6, NULL, '2023-2024', 'Genap', 'Februari', 2023, '2022-11-10 06:50:27', '2022-11-10 06:50:42', NULL),
(7, NULL, '2024-2025', 'Ganjil', 'Februari', 2024, '2022-11-16 04:09:58', '2022-11-16 04:10:39', NULL),
(8, NULL, '2024-2025', 'Genap', 'Februari', 2024, '2022-11-23 15:38:30', '2022-11-23 15:38:30', NULL),
(9, NULL, '2021-2022', 'Ganjil', NULL, 2021, '2023-03-11 10:24:20', '2023-03-11 10:24:20', NULL),
(10, NULL, '2021-2022', 'Genap', NULL, 2022, '2023-03-11 10:24:20', '2023-03-11 10:24:20', NULL),
(11, NULL, '2022-2023', 'Ganjil', NULL, 2022, '2023-03-11 10:27:53', '2023-03-11 10:29:45', NULL),
(12, NULL, '2022-2023', 'Genap', NULL, 2023, '2023-03-11 10:28:12', '2023-03-11 10:29:37', NULL),
(13, NULL, '2023-2024', 'Ganjil', NULL, 2023, '2023-03-11 10:29:19', '2023-03-11 10:30:02', NULL),
(14, NULL, '2023-2024', 'Genap', NULL, 2024, '2023-03-11 10:28:45', '2023-03-11 10:30:08', NULL),
(15, NULL, '2024-2025', 'Ganjil', NULL, 2024, '2023-03-11 10:29:31', '2023-03-11 10:30:12', NULL),
(16, NULL, '2024-2025', 'Genap', NULL, 2025, '2023-03-11 10:28:55', '2023-03-11 10:30:18', NULL),
(17, NULL, '2022-2024', 'Genap', NULL, 2024, '2023-03-13 17:14:07', '2023-03-13 17:14:19', '2023-03-13 17:14:19');

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
  `keterangan` varchar(255) DEFAULT NULL,
  `jumlah_penguji` int(11) NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prasidang`
--

INSERT INTO `prasidang` (`id`, `mahasiswa_id`, `pembimbing1_id`, `pembimbing2_id`, `penguji1_id`, `penguji2_id`, `periode_id`, `judul_indo`, `judul_inggris`, `tahun_ajaran`, `semester`, `keterangan`, `jumlah_penguji`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 2, 1, 2, 1, 1, 'Test', 'Test', '2022', 'Genap', NULL, 2, '2022-08-16 14:20:40', '2022-08-16 14:20:40', NULL),
(2, 4, 10, 8, 10, 8, 2, 'Aplikasi Mobile', 'Mobile Application', '2021-2022', 'Ganjil', NULL, 2, '2022-11-10 05:26:01', '2022-11-10 05:26:01', NULL),
(3, 4, 10, 8, 10, 8, 2, 'Aplikasi Mobile', 'Mobile Application', '2021-2022', 'Ganjil', NULL, 2, '2022-11-16 05:01:45', '2022-11-16 05:01:45', NULL),
(4, 5, 10, 8, 10, 8, 2, 'Machine Learning', 'Machine Learning', '2021-2022', 'Ganjil', NULL, 2, '2022-11-16 05:01:45', '2022-11-16 05:01:45', NULL),
(5, 6, 10, 8, 10, 8, 2, 'Aplikasi Website', 'Website Application', '2021-2022', 'Ganjil', NULL, 2, '2022-12-15 18:31:46', '2022-12-15 18:31:46', NULL),
(6, 7, 10, 8, 10, 8, 2, 'Aplikasi Mobile', 'Mobile Application', '2021-2022', 'Ganjil', NULL, 2, '2022-12-15 18:37:50', '2022-12-15 18:37:50', NULL);

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
  `jumlah_penguji` int(11) NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`id`, `mahasiswa_id`, `pembimbing1_id`, `pembimbing2_id`, `penguji1_id`, `penguji2_id`, `periode_id`, `judul_indo`, `judul_inggris`, `tahun_ajaran`, `semester`, `jumlah_penguji`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 10, 8, 10, 8, 2, 'Aplikasi Mobile', 'Mobile Application', '2021-2022', 'Ganjil', 2, '2022-11-10 04:56:38', '2022-11-10 04:56:38', NULL),
(2, 5, 10, 8, 10, 8, 2, 'Machine Learning', 'Machine Learning', '2021-2022', 'Ganjil', 2, '2022-11-10 04:56:38', '2022-11-10 04:56:38', NULL),
(3, 6, 10, 8, 10, 8, 2, 'Aplikasi Website', 'Website Application', '2021-2022', 'Ganjil', 2, '2022-11-10 04:56:38', '2022-11-10 04:56:38', NULL),
(4, 7, 10, 8, 10, 8, 2, 'Aplikasi Mobile', 'Mobile Application', '2021-2022', 'Ganjil', 2, '2022-11-10 04:56:38', '2022-11-10 04:56:38', NULL),
(5, 8, 10, 8, 10, 8, 2, 'Machine Learning', 'Machine Learning', '2021-2022', 'Ganjil', 2, '2022-11-10 04:56:38', '2022-11-10 04:56:38', NULL),
(6, 9, 10, 8, 10, 8, 2, 'Aplikasi Website', 'Website Application', '2021-2022', 'Ganjil', 2, '2022-11-10 04:56:38', '2022-11-10 04:56:38', NULL),
(7, 10, 10, 8, 10, 8, 2, 'Machine Learning', 'Machine Learning', '2021-2022', 'Ganjil', 2, '2022-11-10 04:56:38', '2022-11-10 04:56:38', NULL),
(8, 11, 10, 8, 10, 8, 2, 'Machine Learning', 'Machine Learning', '2021-2022', 'Ganjil', 2, '2022-11-10 04:56:38', '2022-11-10 04:56:38', NULL),
(9, 12, 10, 8, 10, 8, 2, 'Aplikasi Mobile', 'Mobile Application', '2021-2022', 'Ganjil', 2, '2022-11-10 04:56:38', '2022-11-10 04:56:38', NULL),
(10, 13, 10, 8, 10, 8, 2, 'Aplikasi Website', 'Website Application', '2021-2022', 'Ganjil', 2, '2022-11-10 04:56:38', '2022-11-10 04:56:38', NULL),
(11, 14, 10, 8, 10, 8, 2, 'Sistem Informasi', 'Information System', '2021-2022', 'Ganjil', 2, '2022-11-10 04:56:38', '2022-11-10 04:56:38', NULL),
(12, 15, 10, 8, 10, 8, 2, 'Aplikasi Website', 'Website Application', '2021-2022', 'Ganjil', 2, '2022-11-10 04:56:38', '2022-11-10 04:56:38', NULL),
(13, 16, 10, 8, 10, 8, 2, 'Sistem Informasi', 'Information System', '2021-2022', 'Ganjil', 2, '2022-11-10 04:56:38', '2022-11-10 04:56:38', NULL),
(14, 17, 10, 8, 10, 8, 2, 'Sistem Informasi', 'Information System', '2021-2022', 'Ganjil', 2, '2022-11-10 04:56:38', '2022-11-10 04:56:38', NULL),
(15, 18, 10, 8, 10, 8, 2, 'Sistem Informasi', 'Information System', '2021-2022', 'Ganjil', 2, '2022-11-10 04:56:38', '2022-11-10 04:56:38', NULL),
(16, 19, 10, 8, 10, 8, 2, 'Machine Learning', 'Machine Learning', '2021-2022', 'Ganjil', 2, '2022-11-10 04:56:38', '2022-11-10 04:56:38', NULL),
(17, 20, 10, 8, 10, 8, 2, 'Machine Learning', 'Machine Learning', '2021-2022', 'Ganjil', 2, '2022-11-10 04:56:38', '2022-11-10 04:56:38', NULL),
(18, 21, 10, 8, 10, 8, 2, 'Aplikasi Website', 'Website Application', '2021-2022', 'Ganjil', 2, '2022-11-10 04:56:38', '2022-11-10 04:56:38', NULL),
(19, 22, 10, 8, 10, 8, 2, 'Aplikasi Website', 'Website Application', '2021-2022', 'Ganjil', 2, '2022-11-10 04:56:38', '2022-11-10 04:56:38', NULL),
(20, 23, 10, 8, 10, 8, 2, 'Sistem Informasi', 'Information System', '2021-2022', 'Ganjil', 2, '2022-11-10 04:56:38', '2022-11-10 04:56:38', NULL),
(21, 24, 10, 8, 10, 8, 2, 'Machine Learning', 'Machine Learning', '2021-2022', 'Ganjil', 2, '2022-11-10 04:56:38', '2022-11-10 04:56:38', NULL),
(22, 25, 10, 8, 10, 8, 2, 'Sistem Informasi', 'Information System', '2021-2022', 'Ganjil', 2, '2022-11-10 04:56:38', '2022-11-10 04:56:38', NULL),
(23, 26, 10, 8, 10, 8, 2, 'Aplikasi Website', 'Website Application', '2021-2022', 'Ganjil', 2, '2022-11-10 04:56:38', '2022-11-10 04:56:38', NULL),
(24, 27, 10, 8, 10, 8, 2, 'Aplikasi Website', 'Website Application', '2021-2022', 'Ganjil', 2, '2022-11-10 04:56:38', '2022-11-10 04:56:38', NULL),
(25, 28, 10, 8, 10, 8, 2, 'Machine Learning', 'Machine Learning', '2021-2022', 'Ganjil', 2, '2022-11-10 04:56:38', '2022-11-10 04:56:38', NULL),
(26, 29, 10, 8, 10, 8, 2, 'Sistem Informasi', 'Information System', '2021-2022', 'Ganjil', 2, '2022-11-10 04:56:38', '2022-11-10 04:56:38', NULL),
(27, 30, 10, 8, 10, 8, 2, 'Sistem Informasi', 'Information System', '2021-2022', 'Ganjil', 2, '2022-11-10 04:56:38', '2022-11-10 04:56:38', NULL),
(28, 31, 10, 8, 10, 8, 2, 'Aplikasi Mobile', 'Mobile Application', '2021-2022', 'Ganjil', 2, '2022-11-10 04:56:38', '2022-11-10 04:56:38', NULL),
(29, 32, 10, 8, 10, 8, 2, 'Machine Learning', 'Machine Learning', '2021-2022', 'Ganjil', 2, '2022-11-10 04:56:38', '2022-11-10 04:56:38', NULL),
(30, 4, 10, 8, 10, 8, 3, 'Aplikasi Mobile', 'Mobile Application', '2022-2023', 'Ganjil', 2, '2022-11-16 05:09:40', '2022-11-16 05:09:40', NULL),
(31, 5, 10, 8, 10, 8, 3, 'Machine Learning', 'Machine Learning', '2022-2023', 'Ganjil', 2, '2022-11-16 05:09:40', '2022-11-16 05:09:40', NULL),
(32, 6, 10, 8, 10, 8, 3, 'Aplikasi Website', 'Website Application', '2022-2023', 'Ganjil', 2, '2022-11-16 05:09:40', '2022-11-16 05:09:40', NULL),
(33, 7, 10, 8, 10, 8, 3, 'Aplikasi Mobile', 'Mobile Application', '2022-2023', 'Ganjil', 2, '2022-11-16 05:09:40', '2022-11-16 05:09:40', NULL),
(34, 8, 10, 8, 10, 8, 3, 'Machine Learning', 'Machine Learning', '2022-2023', 'Ganjil', 2, '2022-11-16 05:09:40', '2022-11-16 05:09:40', NULL),
(35, 9, 10, 8, 10, 8, 3, 'Aplikasi Website', 'Website Application', '2022-2023', 'Ganjil', 2, '2022-11-16 05:09:40', '2022-11-16 05:09:40', NULL),
(36, 10, 10, 8, 10, 8, 3, 'Machine Learning', 'Machine Learning', '2022-2023', 'Ganjil', 2, '2022-11-16 05:09:40', '2022-11-16 05:09:40', NULL),
(37, 11, 10, 8, 10, 8, 3, 'Machine Learning', 'Machine Learning', '2022-2023', 'Ganjil', 2, '2022-11-16 05:09:40', '2022-11-16 05:09:40', NULL),
(38, 12, 10, 8, 10, 8, 3, 'Aplikasi Mobile', 'Mobile Application', '2022-2023', 'Ganjil', 2, '2022-11-16 05:09:40', '2022-11-16 05:09:40', NULL),
(39, 13, 10, 8, 10, 8, 3, 'Aplikasi Website', 'Website Application', '2022-2023', 'Ganjil', 2, '2022-11-16 05:09:40', '2022-11-16 05:09:40', NULL),
(40, 14, 10, 8, 10, 8, 3, 'Sistem Informasi', 'Information System', '2022-2023', 'Ganjil', 2, '2022-11-16 05:09:40', '2022-11-16 05:09:40', NULL),
(41, 15, 10, 8, 10, 8, 3, 'Aplikasi Website', 'Website Application', '2022-2023', 'Ganjil', 2, '2022-11-16 05:09:40', '2022-11-16 05:09:40', NULL),
(42, 16, 10, 8, 10, 8, 3, 'Sistem Informasi', 'Information System', '2022-2023', 'Ganjil', 2, '2022-11-16 05:09:40', '2022-11-16 05:09:40', NULL),
(43, 17, 10, 8, 10, 8, 3, 'Sistem Informasi', 'Information System', '2022-2023', 'Ganjil', 2, '2022-11-16 05:09:40', '2022-11-16 05:09:40', NULL),
(44, 18, 10, 8, 10, 8, 3, 'Sistem Informasi', 'Information System', '2022-2023', 'Ganjil', 2, '2022-11-16 05:09:40', '2022-11-16 05:09:40', NULL),
(45, 19, 10, 8, 10, 8, 3, 'Machine Learning', 'Machine Learning', '2022-2023', 'Ganjil', 2, '2022-11-16 05:09:40', '2022-11-16 05:09:40', NULL),
(46, 20, 10, 8, 10, 8, 3, 'Machine Learning', 'Machine Learning', '2022-2023', 'Ganjil', 2, '2022-11-16 05:09:40', '2022-11-16 05:09:40', NULL),
(47, 21, 10, 8, 10, 8, 3, 'Aplikasi Website', 'Website Application', '2022-2023', 'Ganjil', 2, '2022-11-16 05:09:40', '2022-11-16 05:09:40', NULL),
(48, 22, 10, 8, 10, 8, 3, 'Aplikasi Website', 'Website Application', '2022-2023', 'Ganjil', 2, '2022-11-16 05:09:40', '2022-11-16 05:09:40', NULL),
(49, 23, 10, 8, 10, 8, 3, 'Sistem Informasi', 'Information System', '2022-2023', 'Ganjil', 2, '2022-11-16 05:09:40', '2022-11-16 05:09:40', NULL),
(50, 24, 10, 8, 10, 8, 3, 'Machine Learning', 'Machine Learning', '2022-2023', 'Ganjil', 2, '2022-11-16 05:09:40', '2022-11-16 05:09:40', NULL),
(51, 25, 10, 8, 10, 8, 3, 'Sistem Informasi', 'Information System', '2022-2023', 'Ganjil', 2, '2022-11-16 05:09:40', '2022-11-16 05:09:40', NULL),
(52, 26, 10, 8, 10, 8, 3, 'Aplikasi Website', 'Website Application', '2022-2023', 'Ganjil', 2, '2022-11-16 05:09:40', '2022-11-16 05:09:40', NULL),
(53, 27, 10, 8, 10, 8, 3, 'Aplikasi Website', 'Website Application', '2022-2023', 'Ganjil', 2, '2022-11-16 05:09:40', '2022-11-16 05:09:40', NULL),
(54, 28, 10, 8, 10, 8, 3, 'Machine Learning', 'Machine Learning', '2022-2023', 'Ganjil', 2, '2022-11-16 05:09:40', '2022-11-16 05:09:40', NULL),
(55, 29, 10, 8, 10, 8, 3, 'Sistem Informasi', 'Information System', '2022-2023', 'Ganjil', 2, '2022-11-16 05:09:40', '2022-11-16 05:09:40', NULL),
(56, 30, 10, 8, 10, 8, 3, 'Sistem Informasi', 'Information System', '2022-2023', 'Ganjil', 2, '2022-11-16 05:09:40', '2022-11-16 05:09:40', NULL),
(57, 31, 10, 8, 10, 8, 3, 'Aplikasi Mobile', 'Mobile Application', '2022-2023', 'Ganjil', 2, '2022-11-16 05:09:40', '2022-11-16 05:09:40', NULL),
(58, 32, 10, 8, 10, 8, 3, 'Machine Learning', 'Machine Learning', '2022-2023', 'Ganjil', 2, '2022-11-16 05:09:40', '2022-11-16 05:09:40', NULL),
(59, 4, 10, 8, 10, 8, 3, 'Aplikasi Mobile', 'Mobile Application', '2022-2023', 'Ganjil', 2, '2022-11-16 05:10:58', '2022-11-16 05:10:58', NULL),
(60, 5, 10, 8, 10, 8, 3, 'Machine Learning', 'Machine Learning', '2022-2023', 'Ganjil', 2, '2022-11-16 05:10:58', '2022-11-16 05:10:58', NULL),
(61, 6, 10, 8, 10, 8, 3, 'Aplikasi Website', 'Website Application', '2022-2023', 'Ganjil', 2, '2022-11-16 05:10:58', '2022-11-16 05:10:58', NULL),
(62, 7, 10, 8, 10, 8, 3, 'Aplikasi Mobile', 'Mobile Application', '2022-2023', 'Ganjil', 2, '2022-11-16 05:10:58', '2022-11-16 05:10:58', NULL),
(63, 8, 10, 8, 10, 8, 3, 'Machine Learning', 'Machine Learning', '2022-2023', 'Ganjil', 2, '2022-11-16 05:10:58', '2022-11-16 05:10:58', NULL),
(64, 9, 10, 8, 10, 8, 3, 'Aplikasi Website', 'Website Application', '2022-2023', 'Ganjil', 2, '2022-11-16 05:10:58', '2022-11-16 05:10:58', NULL),
(65, 10, 10, 8, 10, 8, 3, 'Machine Learning', 'Machine Learning', '2022-2023', 'Ganjil', 2, '2022-11-16 05:10:58', '2022-11-16 05:10:58', NULL),
(66, 11, 10, 8, 10, 8, 3, 'Machine Learning', 'Machine Learning', '2022-2023', 'Ganjil', 2, '2022-11-16 05:10:58', '2022-11-16 05:10:58', NULL),
(67, 12, 10, 8, 10, 8, 3, 'Aplikasi Mobile', 'Mobile Application', '2022-2023', 'Ganjil', 2, '2022-11-16 05:10:58', '2022-11-16 05:10:58', NULL),
(68, 13, 10, 8, 10, 8, 3, 'Aplikasi Website', 'Website Application', '2022-2023', 'Ganjil', 2, '2022-11-16 05:10:58', '2022-11-16 05:10:58', NULL),
(69, 14, 10, 8, 10, 8, 3, 'Sistem Informasi', 'Information System', '2022-2023', 'Ganjil', 2, '2022-11-16 05:10:58', '2022-11-16 05:10:58', NULL),
(70, 15, 10, 8, 10, 8, 3, 'Aplikasi Website', 'Website Application', '2022-2023', 'Ganjil', 2, '2022-11-16 05:10:58', '2022-11-16 05:10:58', NULL),
(71, 16, 10, 8, 10, 8, 3, 'Sistem Informasi', 'Information System', '2022-2023', 'Ganjil', 2, '2022-11-16 05:10:58', '2022-11-16 05:10:58', NULL),
(72, 17, 10, 8, 10, 8, 3, 'Sistem Informasi', 'Information System', '2022-2023', 'Ganjil', 2, '2022-11-16 05:10:58', '2022-11-16 05:10:58', NULL),
(73, 18, 10, 8, 10, 8, 3, 'Sistem Informasi', 'Information System', '2022-2023', 'Ganjil', 2, '2022-11-16 05:10:58', '2022-11-16 05:10:58', NULL),
(74, 19, 10, 8, 10, 8, 3, 'Machine Learning', 'Machine Learning', '2022-2023', 'Ganjil', 2, '2022-11-16 05:10:58', '2022-11-16 05:10:58', NULL),
(75, 20, 10, 8, 10, 8, 3, 'Machine Learning', 'Machine Learning', '2022-2023', 'Ganjil', 2, '2022-11-16 05:10:58', '2022-11-16 05:10:58', NULL),
(76, 21, 10, 8, 10, 8, 3, 'Aplikasi Website', 'Website Application', '2022-2023', 'Ganjil', 2, '2022-11-16 05:10:58', '2022-11-16 05:10:58', NULL),
(77, 22, 10, 8, 10, 8, 3, 'Aplikasi Website', 'Website Application', '2022-2023', 'Ganjil', 2, '2022-11-16 05:10:58', '2022-11-16 05:10:58', NULL),
(78, 23, 10, 8, 10, 8, 3, 'Sistem Informasi', 'Information System', '2022-2023', 'Ganjil', 2, '2022-11-16 05:10:58', '2022-11-16 05:10:58', NULL),
(79, 24, 10, 8, 10, 8, 3, 'Machine Learning', 'Machine Learning', '2022-2023', 'Ganjil', 2, '2022-11-16 05:10:58', '2022-11-16 05:10:58', NULL),
(80, 25, 10, 8, 10, 8, 3, 'Sistem Informasi', 'Information System', '2022-2023', 'Ganjil', 2, '2022-11-16 05:10:58', '2022-11-16 05:10:58', NULL),
(81, 26, 10, 8, 10, 8, 3, 'Aplikasi Website', 'Website Application', '2022-2023', 'Ganjil', 2, '2022-11-16 05:10:58', '2022-11-16 05:10:58', NULL),
(82, 27, 10, 8, 10, 8, 3, 'Aplikasi Website', 'Website Application', '2022-2023', 'Ganjil', 2, '2022-11-16 05:10:58', '2022-11-16 05:10:58', NULL),
(83, 28, 10, 8, 10, 8, 3, 'Machine Learning', 'Machine Learning', '2022-2023', 'Ganjil', 2, '2022-11-16 05:10:58', '2022-11-16 05:10:58', NULL),
(84, 29, 10, 8, 10, 8, 3, 'Sistem Informasi', 'Information System', '2022-2023', 'Ganjil', 2, '2022-11-16 05:10:59', '2022-11-16 05:10:59', NULL),
(85, 30, 10, 8, 10, 8, 3, 'Sistem Informasi', 'Information System', '2022-2023', 'Ganjil', 2, '2022-11-16 05:10:59', '2022-11-16 05:10:59', NULL),
(86, 31, 10, 8, 10, 8, 3, 'Aplikasi Mobile', 'Mobile Application', '2022-2023', 'Ganjil', 2, '2022-11-16 05:10:59', '2022-11-16 05:10:59', NULL),
(87, 32, 10, 8, 10, 8, 3, 'Machine Learning', 'Machine Learning', '2022-2023', 'Ganjil', 2, '2022-11-16 05:10:59', '2022-11-16 05:10:59', NULL);

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
(4, 'R4', 'Ruang FIT', 'Di gedung FIT', 1, '2022-11-10 06:56:49', '2022-11-10 06:56:49', NULL);

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
  `jumlah_penguji` int(11) NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sidang`
--

INSERT INTO `sidang` (`id`, `pendaftaran_sidang_id`, `mahasiswa_id`, `pembimbing1_id`, `pembimbing2_id`, `penguji1_id`, `penguji2_id`, `periode_id`, `judul_indo`, `judul_inggris`, `tahun_ajaran`, `semester`, `jumlah_penguji`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 2, 2, 1, 2, 1, 1, 'Test', 'Test', '2022', 'Genap', 2, '2022-08-16 14:21:10', '2022-08-16 14:21:10', NULL);

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
(18, 3, 1, 'olivia', 'oliviaistianah9@gmail.com', '$2y$10$6BxmDS8jUJeD/F0EwRNkge2KtTKqMv8qz.TwcNiJThDmTF3bZddui', NULL, '2022-08-16 10:34:27', '2022-08-16 10:34:27', NULL),
(19, 3, 1, 'rania', 'rania.athala28@gmail.com', '$2y$10$S/fbCOUt95VAOaDOX8exAuNE1ZJE1tH9RFbZH/Lw2rd7byS0tQRhy', NULL, '2022-08-16 10:34:27', '2022-08-16 10:34:27', NULL),
(20, 3, 1, 'hanif', 'rusydahanifan@gmail.com', '$2y$10$DGWwPj5EJFncy8.sbJVvwuFgCAgvBUx7dAnC4JokCw.pg3RmSLK1S', NULL, '2022-08-16 10:34:27', '2022-08-16 10:34:27', NULL),
(22, 2, 3, 'opi', 'olivia@gmail.com', '$2y$10$Ku82mSWifSJCTvbRTxC8FuQoUHx7u9sAxhl4pIiSo9pLxu8ToJtPS', NULL, '2022-08-16 10:53:00', '2022-08-16 10:53:00', NULL),
(23, 2, 3, 'tata', 'rania@gmail.com', '$2y$10$VJ./BvpIdk0SDg9yZbxMzuA0ZUVyLkpVBP.74tYBN7Z6FngDU789K', NULL, '2022-08-16 10:53:00', '2022-08-16 10:53:00', NULL),
(24, 2, 3, 'hanip', 'hanip@gmail.com', '$2y$10$7JikKT1fZis/okSN2Sf2f.p6Ibu7Neu9SHGqFYZtwPG7sfDCamOta', NULL, '2022-08-16 10:53:00', '2022-08-16 10:53:00', NULL),
(25, 2, 1, 'ejak', 'ejak@gmail.com', '$2y$10$6F6twwKfhMVhR4/Ei8QX5.aAw0Iz6NRLS0u/MbfzJSk1ltUgS9jsS', NULL, '2022-08-16 11:37:53', '2022-08-16 11:37:53', NULL),
(26, 3, 1, 'emung', 'emung@gmail.com', '$2y$10$xdtKdinCs/eFO9BlPyWvCO7VENp3K/DePxdA2agcMeVpDED5H8K6u', NULL, '2022-11-10 04:52:40', '2022-11-10 04:52:40', NULL),
(27, 3, 1, 'esya', 'esya@gmail.com', '$2y$10$7Kjdvhjwq4Do6U/XK1U/WOIeR7.atXd74/qJQ1TVq26ldMZjSNo1e', NULL, '2022-11-10 04:52:41', '2022-11-10 04:52:41', NULL),
(28, 3, 1, 'ridho', 'ridho@gmail.com', '$2y$10$SKo18i/kYcTg.yc0sioVkucfRR/Fpp0es2zX5KJkst9GmwH2vEHG.', NULL, '2022-11-10 04:52:41', '2022-11-10 04:52:41', NULL),
(29, 3, 1, 'anggun', 'anggun@gmail.com', '$2y$10$sJyeCV.58Y1790cj1dWJyOPRhJUFgx8SJ6PQiyXgcDILrNRUDYQhC', NULL, '2022-11-10 04:52:41', '2022-11-10 04:52:41', NULL),
(30, 3, 1, 'derisa', 'derisa@gmail.com', '$2y$10$FH6XCmi6B9iYCx3g.Giz1OPuSD2nHjv03tdQLgeSnxdbmjqkOspZ2', NULL, '2022-11-10 04:52:41', '2022-11-10 04:52:41', NULL),
(31, 3, 1, 'nabilah', 'nabilah@gmail.com', '$2y$10$fye4tNDbkwByit3T.Entl.hJP5w1Xhrl1JPfo77IlKJWj.TN3rfLi', NULL, '2022-11-10 04:52:41', '2022-11-10 04:52:41', NULL),
(32, 3, 1, 'rahma', 'rahma@gmail.com', '$2y$10$A9MpYIMKTedIeBVsIFU6VOm4P8pWbvRWd17ry5tZ91/TcBL.KjGtS', NULL, '2022-11-10 04:52:41', '2022-11-10 04:52:41', NULL),
(33, 3, 1, 'gabriella', 'gabriella@gmail.com', '$2y$10$EMtnOovfxzDajGwqZ4pv.O95aoYc7pXP1aD2lMaeqZ9ymqZiqnLA6', NULL, '2022-11-10 04:52:41', '2022-11-10 04:52:41', NULL),
(34, 3, 1, 'abdullah', 'abdullah@gmail.com', '$2y$10$4zXs11UDSfcGWQDPhrrGruypvdeP8rj63WjLin2hd4qySMeWOmdxm', NULL, '2022-11-10 04:52:41', '2022-11-10 04:52:41', NULL),
(35, 3, 1, 'gusnita', 'gusnita@gmail.com', '$2y$10$i0u.Tg8ZH0PRLXuIAG6Sv.ZGZMGkJNqkXH9sRaKCIgugWc0pOSM4u', NULL, '2022-11-10 04:52:41', '2022-11-10 04:52:41', NULL),
(36, 3, 1, 'najla', 'najla@gmail.com', '$2y$10$XgaiMQc5je0XIqYuurj3kOS2Kj9pNpGIFJoqYqLDqnN.y6EoM501O', NULL, '2022-11-10 04:52:41', '2022-11-10 04:52:41', NULL),
(37, 3, 1, 'alya', 'alya@gmail.com', '$2y$10$OePJq21HCZyQ0t8EyFxF.O/njGn2o1Y0aNaLv.STHJg4bHe6tAaJq', NULL, '2022-11-10 04:52:41', '2022-11-10 04:52:41', NULL),
(38, 3, 1, 'diego', 'diego@gmail.com', '$2y$10$FOFSMrrAuagAYSEdJ/Y0GucDK5ffX0l6X1hUm0.qhmNdorBbbEAxC', NULL, '2022-11-10 04:52:41', '2022-11-10 04:52:41', NULL),
(39, 3, 1, 'amelia', 'amelia@gmail.com', '$2y$10$PxeyBpgNeBmTRozopZjJeO0lggq2qo4uFXuKgP2OvEnq.g6q2fSTy', NULL, '2022-11-10 04:52:41', '2022-11-10 04:52:41', NULL),
(40, 3, 1, 'fayza', 'fayza@gmail.com', '$2y$10$zT6RzPzv46lfmvb16EpcoOuSlFfDmLp9rYXSOkooko5ZO6VxKUAeO', NULL, '2022-11-10 04:52:41', '2022-11-10 04:52:41', NULL),
(41, 3, 1, 'destiny', 'destiny@gmail.com', '$2y$10$.Li5q8DTVWyXIso6flly9uFC.42PuDAS2cUYeBQM39nvDPS7h/acq', NULL, '2022-11-10 04:52:41', '2022-11-10 04:52:41', NULL),
(42, 3, 1, 'kumbara', 'kumbara@gmail.com', '$2y$10$/jcEEioOXNTC/MUoiAvMneNPp7YHppau1NbrLnVf56eJmUKoJmmMu', NULL, '2022-11-10 04:52:41', '2022-11-10 04:52:41', NULL),
(43, 3, 1, 'kamilia', 'kamilia@gmail.com', '$2y$10$EBS305x3pepBzJM7rRvvie358XiK3pKEebCE9dgmmLtIvjRudcNe2', NULL, '2022-11-10 04:52:41', '2022-11-10 04:52:41', NULL),
(44, 3, 1, 'fachry', 'fachry@gmail.com', '$2y$10$gkTzLEtx01kO0MopPcM3s.QwWsvPiY7IxWV5iOH3hwKUGa/pv9.7y', NULL, '2022-11-10 04:52:41', '2022-11-10 04:52:41', NULL),
(45, 3, 1, 'fauzi', 'fauzi@gmail.com', '$2y$10$Hwj0TKObcXmt3XEVH18saOtIuWRhBfcjjw0KdYkDAxjbdFeEvpK2O', NULL, '2022-11-10 04:52:42', '2022-11-10 04:52:42', NULL),
(46, 3, 1, 'fachrur', 'fachrur@gmail.com', '$2y$10$zTPq3NBZQCGJR6ooLT7V/u1yyysBMugYLrjJSsf9HYML.ZsTNilpy', NULL, '2022-11-10 04:52:42', '2022-11-10 04:52:42', NULL),
(47, 3, 1, 'endar', 'endar@gmail.com', '$2y$10$WsBfFBsTD5ci9X3rGd63v.Blb8ocjwhbX2X1z87VQAbmykhtsb1Ce', NULL, '2022-11-10 04:52:42', '2022-11-10 04:52:42', NULL),
(48, 3, 1, 'husni', 'husni@gmail.com', '$2y$10$njk8fsCWmIXgQ14mwG99aOy8fXij1FHaP8/Gw3GzEfj5ylRVOsHB6', NULL, '2022-11-10 04:52:42', '2022-11-10 04:52:42', NULL),
(49, 3, 1, 'zitha', 'zitha@gmail.com', '$2y$10$e13wiGOZrlfM5bxrsRXHkOfePM3iF4ONFxvR0TAk3AY2RcEfggaqi', NULL, '2022-11-10 04:52:42', '2022-11-10 04:52:42', NULL),
(50, 3, 1, 'viona', 'viona@gmail.com', '$2y$10$tbVPaql0JJ/ugGP07urxW.1M89l/E2Y/Pz8KrynQBV2EsHRWfZhT6', NULL, '2022-11-10 04:52:42', '2022-11-10 04:52:42', NULL),
(51, 3, 1, 'anggreyani', 'anggreyani@gmail.com', '$2y$10$rUKIFkLfxrPKFa048fsUX.OxIJKHrbV6gLWxBSbOthxO3XkMwg9K.', NULL, '2022-11-10 04:52:42', '2022-11-10 04:52:42', NULL),
(52, 3, 1, 'fadhilah', 'fadhilah@gmail.com', '$2y$10$ae92/bC6E0dlAB/Sks4el.fhJAl1KDlHB7zJKds3H6/jZ5IU2/y0a', NULL, '2022-11-10 04:52:42', '2022-11-10 04:52:42', NULL),
(53, 3, 1, 'maulana', 'maulana@gmail.com', '$2y$10$xcIU63rtGDW5sJZjuJE8EumKz/hmxFBteMPf5qvx3citvF5DvvC4y', NULL, '2022-11-10 04:52:42', '2022-11-10 04:52:42', NULL),
(54, 3, 1, 'fitrananda', 'fitrananda@gmail.com', '$2y$10$ALVoZPNPy3WNatnXAEF9jOSUcF8GIQKibfkjqDTYvazYdXxygX/be', NULL, '2022-11-10 04:52:42', '2022-11-10 04:52:42', NULL);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deadline_proposal`
--
ALTER TABLE `deadline_proposal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deadline_sidang`
--
ALTER TABLE `deadline_sidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_nilai_prasidang`
--
ALTER TABLE `detail_nilai_prasidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detail_nilai_proposal`
--
ALTER TABLE `detail_nilai_proposal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dosen_koordinator_pa`
--
ALTER TABLE `dosen_koordinator_pa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `komponen_proposal`
--
ALTER TABLE `komponen_proposal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `komponen_sidang`
--
ALTER TABLE `komponen_sidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `mahasiswa_import`
--
ALTER TABLE `mahasiswa_import`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `nilai_mutu`
--
ALTER TABLE `nilai_mutu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `periode_semester`
--
ALTER TABLE `periode_semester`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prasidang`
--
ALTER TABLE `prasidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

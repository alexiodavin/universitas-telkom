-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2022 at 04:00 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

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
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_gelar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, 1, 13, 1, '2021-2022', 'Genap', '2022-08-01', NULL, '2022-08-16 09:35:06', '2022-08-16 09:35:06', NULL),
(2, 1, 3, 2, '2021-2022', 'Genap', '2022-08-01', NULL, '2022-08-16 09:46:54', '2022-08-16 09:46:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dosen_koordinator_pa`
--

CREATE TABLE `dosen_koordinator_pa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `periode_id` bigint(20) UNSIGNED DEFAULT NULL,
  `dosen_id` bigint(20) UNSIGNED DEFAULT NULL,
  `prodi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosen_koordinator_pa`
--

INSERT INTO `dosen_koordinator_pa` (`id`, `periode_id`, `dosen_id`, `prodi_id`, `tahun_ajaran`, `semester`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, '2021-2022', 'Genap', '2022-08-16 14:18:58', '2022-08-16 14:18:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `histori_judul_prasidang`
--

CREATE TABLE `histori_judul_prasidang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prasidang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `judul_indo_lama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul_indo_baru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul_inggris_lama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul_inggris_baru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `judul_indo_lama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul_indo_baru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul_inggris_lama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul_inggris_baru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `ruangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_prasidang`
--

INSERT INTO `jadwal_prasidang` (`id`, `prasidang_id`, `ruangan_id`, `tanggal_prasidang`, `bulan`, `jam_mulai_prasidang`, `jam_selesai_prasidang`, `ruangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2022-09-15', 9, '21:30:00', '22:30:00', NULL, '2022-08-16 14:23:04', '2022-08-16 14:23:04', NULL);

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
  `ruangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_sidang`
--

INSERT INTO `jadwal_sidang` (`id`, `sidang_id`, `ruangan_id`, `tanggal_sidang`, `bulan`, `jam_mulai_sidang`, `jam_selesai_sidang`, `ruangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, NULL, '2022-06-24', 7, '09:30:00', '10:30:00', NULL, '2022-08-16 16:34:48', '2022-08-16 16:34:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `komponen`
--

CREATE TABLE `komponen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prodi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_komponen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_komponen` enum('proposal','prasidang','sidang') COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `nama_komponen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `persentase` double DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_deadline_input_nilai` date DEFAULT NULL,
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(4, 1, 2, NULL, 'Teknik Presentasi', 10, 'Keterangan Teknik Presentasi', '2022-08-16', '2022', 'Ganjil', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `komponen_proposal`
--

CREATE TABLE `komponen_proposal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prodi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `periode_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deadline_proposal_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_komponen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `persentase` double DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_deadline_input_nilai` date DEFAULT NULL,
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(5, 1, 2, NULL, 'Lampiran Hasil Kuisioner', 25, 'Keterangan Lampiran Hasil Kuisioner', '2022-08-16', '2022', 'Ganjil', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `komponen_sidang`
--

CREATE TABLE `komponen_sidang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prodi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `periode_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deadline_sidang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_komponen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `persentase` double DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_deadline_input_nilai` date DEFAULT NULL,
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(5, 1, 2, NULL, 'Nilai Proposal', 20, 'Keterangan Nilai Proposal', '2022-08-16', '2022', 'Ganjil', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `periode_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mahasiswa_import_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `angkatan` int(11) DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `user_id`, `periode_id`, `mahasiswa_import_id`, `nama`, `nim`, `angkatan`, `telepon`, `alamat`, `foto`, `tahun_ajaran`, `semester`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 18, 1, 1, 'Olivia Istianah', '6701194000', NULL, '08213123121', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-08-16 10:34:27', '2022-08-16 10:34:27', NULL),
(2, 19, 1, 1, 'Rania Athala', '6701194001', NULL, '08123123412', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-08-16 10:34:27', '2022-08-16 10:34:27', NULL),
(3, 20, 1, 1, 'Rusyda Hanifan', '6701194002', NULL, '08121314124', 'Denpasar', 'user.png', '2021-2022', 'Genap', '2022-08-16 10:34:27', '2022-08-16 10:34:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa_import`
--

CREATE TABLE `mahasiswa_import` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `periode_id` bigint(20) UNSIGNED DEFAULT NULL,
  `prodi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswa_import`
--

INSERT INTO `mahasiswa_import` (`id`, `periode_id`, `prodi_id`, `tahun_ajaran`, `semester`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2021-2022', 'Genap', '2022-08-16 10:34:25', '2022-08-16 10:34:25', NULL);

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
  `index` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai_min` double DEFAULT NULL,
  `nilai_maks` double DEFAULT NULL,
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai_mutu`
--

INSERT INTO `nilai_mutu` (`id`, `periode_id`, `index`, `nilai_min`, `nilai_maks`, `tahun_ajaran`, `semester`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'A', 80, 100, '2021-2022', 'Genap', NULL, NULL, NULL),
(2, 1, 'AB', 70, 80, '2021-2022', 'Genap', NULL, NULL, NULL),
(3, 1, 'B', 65, 70, '2021-2022', 'Genap', NULL, NULL, NULL),
(4, 1, 'BC', 60, 65, '2021-2022', 'Genap', NULL, NULL, NULL),
(5, 1, 'C', 50, 60, '2021-2022', 'Genap', NULL, NULL, NULL),
(6, 1, 'D', 40, 50, '2021-2022', 'Genap', NULL, NULL, NULL),
(7, 1, 'E', 0, 40, '2021-2022', 'Genap', NULL, NULL, NULL),
(8, 2, 'A', 80, 100, '2021-2022', 'Genap', NULL, NULL, NULL),
(9, 2, 'AB', 70, 80, '2021-2022', 'Genap', NULL, NULL, NULL),
(10, 2, 'B', 65, 70, '2021-2022', 'Genap', NULL, NULL, NULL),
(11, 2, 'BC', 60, 65, '2021-2022', 'Genap', NULL, NULL, NULL),
(12, 2, 'C', 50, 60, '2021-2022', 'Genap', NULL, NULL, NULL),
(13, 2, 'D', 40, 50, '2021-2022', 'Genap', NULL, NULL, NULL),
(14, 2, 'E', 0, 40, '2021-2022', 'Genap', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_prasidang`
--

CREATE TABLE `nilai_prasidang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prasidang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ruangan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `penguji` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_penilaian` datetime DEFAULT NULL,
  `ruangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai_akhir` double DEFAULT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `nilai_mutu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Lulus','Tidak Lulus') COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `penguji` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_penilaian` datetime DEFAULT NULL,
  `ruangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai_akhir` double DEFAULT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_proposal_final`
--

CREATE TABLE `nilai_proposal_final` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `proposal_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nilai_final` double DEFAULT NULL,
  `nilai_mutu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Lulus','Tidak Lulus') COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `penguji` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_penilaian` datetime DEFAULT NULL,
  `ruangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai_akhir` double DEFAULT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `nilai_mutu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Lulus','Tidak Lulus') COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `pendaftaran_sidang`
--

CREATE TABLE `pendaftaran_sidang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `periode_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mahasiswa_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tanggal_maksimal_daftar` date DEFAULT NULL,
  `transkip_nilai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ksm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ijazah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surat_pernyataan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pendaftaran` enum('Belum dikonfirmasi','Diterima','Ditolak') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester` enum('Ganjil','Genap') COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id`, `tahun_ajaran`, `semester`, `bulan`, `tahun`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2021-2022', 'Genap', 'Juni', 2022, NULL, NULL, NULL),
(2, '2021-2022', 'Ganjil', 'Desember', 2022, NULL, NULL, NULL);

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
  `judul_indo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul_inggris` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_penguji` int(11) NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prasidang`
--

INSERT INTO `prasidang` (`id`, `mahasiswa_id`, `pembimbing1_id`, `pembimbing2_id`, `penguji1_id`, `penguji2_id`, `periode_id`, `judul_indo`, `judul_inggris`, `tahun_ajaran`, `semester`, `keterangan`, `jumlah_penguji`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 2, 1, 2, 1, 1, 'Test', 'Test', '2022', 'Genap', NULL, 2, '2022-08-16 14:20:40', '2022-08-16 14:20:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `periode_id` bigint(20) UNSIGNED DEFAULT NULL,
  `koor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kaprodi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `singkatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(9, 1, NULL, NULL, 'T-01267', 'D3AP', 'Analisis Perancangan', 'Analisis Perancangan', '2021-2022', 'Genap', '2022-08-16 09:22:45', '2022-08-16 09:22:45', NULL);

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
  `judul_indo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul_inggris` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_penguji` int(11) NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `revisi`
--

CREATE TABLE `revisi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sidang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `catatan_revisi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(3, 'R3', 'Ruangan 3', 'Keterangan Ruangan 3', 0, NULL, '2022-08-16 14:12:47', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `judul_indo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul_inggris` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(25, 2, 1, 'ejak', 'ejak@gmail.com', '$2y$10$6F6twwKfhMVhR4/Ei8QX5.aAw0Iz6NRLS0u/MbfzJSk1ltUgS9jsS', NULL, '2022-08-16 11:37:53', '2022-08-16 11:37:53', NULL);

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
-- AUTO_INCREMENT for table `deadline_prasidang`
--
ALTER TABLE `deadline_prasidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deadline_proposal`
--
ALTER TABLE `deadline_proposal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deadline_sidang`
--
ALTER TABLE `deadline_sidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_nilai_prasidang`
--
ALTER TABLE `detail_nilai_prasidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_nilai_proposal`
--
ALTER TABLE `detail_nilai_proposal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dosen_kaprodi`
--
ALTER TABLE `dosen_kaprodi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dosen_koordinator_pa`
--
ALTER TABLE `dosen_koordinator_pa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jadwal_sidang`
--
ALTER TABLE `jadwal_sidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `komponen`
--
ALTER TABLE `komponen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komponen_prasidang`
--
ALTER TABLE `komponen_prasidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `komponen_proposal`
--
ALTER TABLE `komponen_proposal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `komponen_sidang`
--
ALTER TABLE `komponen_sidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mahasiswa_import`
--
ALTER TABLE `mahasiswa_import`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `nilai_mutu`
--
ALTER TABLE `nilai_mutu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nilai_prasidang`
--
ALTER TABLE `nilai_prasidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai_prasidang_final`
--
ALTER TABLE `nilai_prasidang_final`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai_proposal`
--
ALTER TABLE `nilai_proposal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prasidang`
--
ALTER TABLE `prasidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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

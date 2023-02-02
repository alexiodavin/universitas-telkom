-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jul 2022 pada 22.47
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

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
-- Struktur dari tabel `admin`
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
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `user_id`, `nama`, `telepon`, `foto`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Admin Kampus TU', '085737125437', 'user.png', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_nilai_prasidang`
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
-- Struktur dari tabel `detail_nilai_proposal`
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
-- Struktur dari tabel `detail_nilai_sidang`
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
-- Struktur dari tabel `dosen`
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
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `user_id`, `periode_id`, `dosen_import_id`, `nama`, `nama_gelar`, `nip`, `kode`, `telepon`, `alamat`, `foto`, `tahun_ajaran`, `semester`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 2, 1, 'Patrick Adolf Telnoni', 'Patrick Adolf Telnoni, S.T., M.T.', '5171', 'PTI', '+62 822-1928-7517', 'Denpasar', 'user.png', '2021-2022', 'Ganjil', '2022-07-28 19:46:13', '2022-07-28 19:46:13', NULL),
(2, 3, 2, 1, 'Dedy Rahman Wijaya', 'Dr. Dedy Rahman Wijaya, S.T., M.T.', '5172', 'DRW', '+62 822-1914-7349', 'Denpasar', 'user.png', '2021-2022', 'Ganjil', '2022-07-28 19:46:13', '2022-07-28 19:46:13', NULL),
(3, 4, 2, 1, 'Hanung Nindito Prasetyo', 'Hanung Nindito Prasetyo, S.Si, M.T.', '5173', 'HNP', '+62 812-2059-9883', 'Denpasar', 'user.png', '2021-2022', 'Ganjil', '2022-07-28 19:46:13', '2022-07-28 19:46:13', NULL),
(4, 5, 2, 1, 'M. Barja Sanjaya', 'M. Barja Sanjaya, S.T., M.T., OCA.', '5174', 'MBS', '+62 813-1314-1120', 'Denpasar', 'user.png', '2021-2022', 'Ganjil', '2022-07-28 19:46:13', '2022-07-28 19:46:13', NULL),
(5, 6, 2, 1, 'Siska Komala Sari', 'Siska Komala Sari, S.T., M.T.', '5175', 'SKS', '+62 813-2019-8038', 'Denpasar', 'user.png', '2021-2022', 'Ganjil', '2022-07-28 19:46:13', '2022-07-28 19:46:13', NULL),
(6, 7, 2, 1, 'Wawa Wikusna', 'Wawa Wikusna, S.T., M.Kom.', '5176', 'WIU', '+62 813-2060-4160', 'Denpasar', 'user.png', '2021-2022', 'Ganjil', '2022-07-28 19:46:13', '2022-07-28 19:46:13', NULL),
(7, 8, 2, 1, 'Elis Hernawati', 'Elis Hernawati, S.T., M.Kom.', '5177', 'ELT', '+62 822-4003-5983', 'Denpasar', 'user.png', '2021-2022', 'Ganjil', '2022-07-28 19:46:13', '2022-07-28 19:46:13', NULL),
(8, 9, 2, 1, 'Inne Gartina Husein', 'Dr. Inne Gartina Husein, S.Kom., M.T.', '5178', 'INE', '+62 813-9509-6162', 'Denpasar', 'user.png', '2021-2022', 'Ganjil', '2022-07-28 19:46:13', '2022-07-28 19:46:13', NULL),
(9, 10, 2, 1, 'Pramuko Aji', 'Pramuko Aji, S.T., M.T.', '5179', 'PRA', '+62 821-8008-5050', 'Denpasar', 'user.png', '2021-2022', 'Ganjil', '2022-07-28 19:46:14', '2022-07-28 19:46:14', NULL),
(10, 11, 2, 1, 'Suryatiningsih', 'Suryatiningsih, S.T., M.T., OCA., C.Ht.', '5180', 'SYN', '+62 813-2077-6520', 'Denpasar', 'user.png', '2021-2022', 'Ganjil', '2022-07-28 19:46:14', '2022-07-28 19:46:14', NULL),
(11, 12, 2, 1, 'Tedi Gunawan', 'Tedi Gunawan, S.T., M.Kom.', '5181', 'TGN', '+62 812-2199-440', 'Denpasar', 'user.png', '2021-2022', 'Ganjil', '2022-07-28 19:46:14', '2022-07-28 19:46:14', NULL),
(12, 13, 2, 1, 'Pikir Wisnu Wijayanto', 'Dr. Pikir Wisnu Wijayanto, S.E., S.Pd.Ing., M.Hum.', '5182', 'PWW', '+62 851-0387-9393', 'Denpasar', 'user.png', '2021-2022', 'Ganjil', '2022-07-28 19:46:14', '2022-07-28 19:46:14', NULL),
(13, 14, 2, 1, 'Ely Rosely', 'Ir. Ely Rosely, M.B.S.', '5183', 'ELR', '+62 815-1324-4609', 'Denpasar', 'user.png', '2021-2022', 'Ganjil', '2022-07-28 19:46:14', '2022-07-28 19:46:14', NULL),
(14, 15, 2, 1, 'Mutia Qana\'a', 'Mutia Qana\'a, S.Psi., M.Psi.', '5184', 'MQA', '+62 852-2279-7846', 'Denpasar', 'user.png', '2021-2022', 'Ganjil', '2022-07-28 19:46:14', '2022-07-28 19:46:14', NULL),
(15, 16, 2, 1, 'Wahyu Hidayat', 'Wahyu Hidayat, S.T., M.T., OCA.', '5185', 'WHY', '+62 813-2207-2099', 'Denpasar', 'user.png', '2021-2022', 'Ganjil', '2022-07-28 19:46:14', '2022-07-28 19:46:14', NULL),
(16, 17, 2, 1, 'Robbi Hendriyanto', 'Robbi Hendriyanto, S.T., M.T.', '5186', 'RHN', '+62 823-1604-9294', 'Denpasar', 'user.png', '2021-2022', 'Ganjil', '2022-07-28 19:46:14', '2022-07-28 19:46:14', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen_import`
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
-- Dumping data untuk tabel `dosen_import`
--

INSERT INTO `dosen_import` (`id`, `periode_id`, `prodi_id`, `tahun_ajaran`, `semester`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, '2021-2022', 'Ganjil', '2022-07-28 19:46:13', '2022-07-28 19:46:13', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen_kaprodi`
--

CREATE TABLE `dosen_kaprodi` (
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
-- Dumping data untuk tabel `dosen_kaprodi`
--

INSERT INTO `dosen_kaprodi` (`id`, `periode_id`, `dosen_id`, `prodi_id`, `tahun_ajaran`, `semester`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, 1, '2021-2022', 'Ganjil', '2022-07-28 19:46:38', '2022-07-28 19:46:38', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen_koordinator_pa`
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
-- Dumping data untuk tabel `dosen_koordinator_pa`
--

INSERT INTO `dosen_koordinator_pa` (`id`, `periode_id`, `dosen_id`, `prodi_id`, `tahun_ajaran`, `semester`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, 1, '2021-2022', 'Ganjil', '2022-07-28 19:46:50', '2022-07-28 19:46:50', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `jadwal_prasidang`
--

CREATE TABLE `jadwal_prasidang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prasidang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ruangan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tanggal_prasidang` date DEFAULT NULL,
  `jam_mulai_prasidang` time DEFAULT NULL,
  `jam_selesai_prasidang` time DEFAULT NULL,
  `ruangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_sidang`
--

CREATE TABLE `jadwal_sidang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sidang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ruangan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tanggal_sidang` date DEFAULT NULL,
  `jam_mulai_sidang` time DEFAULT NULL,
  `jam_selesai_sidang` time DEFAULT NULL,
  `ruangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `komponen`
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
-- Struktur dari tabel `komponen_prasidang`
--

CREATE TABLE `komponen_prasidang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prodi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `periode_id` bigint(20) UNSIGNED DEFAULT NULL,
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
-- Dumping data untuk tabel `komponen_prasidang`
--

INSERT INTO `komponen_prasidang` (`id`, `prodi_id`, `periode_id`, `nama_komponen`, `persentase`, `keterangan`, `tanggal_deadline_input_nilai`, `tahun_ajaran`, `semester`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, 'Penguasaan Materi', 35, 'Keterangan Penguasaan Materi', '2022-07-29', '2022', 'Ganjil', NULL, NULL, NULL),
(2, 1, 2, 'Penguasaan Aplikasi / Implementasi Produk', 35, 'Keterangan Penguasaan Aplikasi / Implementasi Produk', '2022-07-29', '2022', 'Ganjil', NULL, NULL, NULL),
(3, 1, 2, 'Tata Tulis', 20, 'Keterangan Tata Tulis', '2022-07-29', '2022', 'Ganjil', NULL, NULL, NULL),
(4, 1, 2, 'Teknik Presentasi', 10, 'Keterangan Teknik Presentasi', '2022-07-29', '2022', 'Ganjil', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komponen_proposal`
--

CREATE TABLE `komponen_proposal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prodi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `periode_id` bigint(20) UNSIGNED DEFAULT NULL,
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
-- Dumping data untuk tabel `komponen_proposal`
--

INSERT INTO `komponen_proposal` (`id`, `prodi_id`, `periode_id`, `nama_komponen`, `persentase`, `keterangan`, `tanggal_deadline_input_nilai`, `tahun_ajaran`, `semester`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, 'Latar Belakang', 20, 'Keterangan Latar Belakang', '2022-07-29', '2022', 'Ganjil', NULL, NULL, NULL),
(2, 1, 2, 'Studi Pustaka', 20, 'Keterangan Studi Pustaka', '2022-07-29', '2022', 'Ganjil', NULL, NULL, NULL),
(3, 1, 2, 'Perbandingan Sistem', 10, 'Keterangan Perbandingan Sistem', '2022-07-29', '2022', 'Ganjil', NULL, NULL, NULL),
(4, 1, 2, 'Gambaran Proses Bisnis', 25, 'Keterangan Gambaran Proses Bisnis', '2022-07-29', '2022', 'Ganjil', NULL, NULL, NULL),
(5, 1, 2, 'Lampiran Hasil Kuisioner', 25, 'Keterangan Lampiran Hasil Kuisioner', '2022-07-29', '2022', 'Ganjil', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komponen_sidang`
--

CREATE TABLE `komponen_sidang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prodi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `periode_id` bigint(20) UNSIGNED DEFAULT NULL,
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
-- Dumping data untuk tabel `komponen_sidang`
--

INSERT INTO `komponen_sidang` (`id`, `prodi_id`, `periode_id`, `nama_komponen`, `persentase`, `keterangan`, `tanggal_deadline_input_nilai`, `tahun_ajaran`, `semester`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, 'Nilai Pembimbing 1', 24, 'Keterangan Nilai Pembimbing 1', '2022-07-29', '2022', 'Ganjil', NULL, NULL, NULL),
(2, 1, 2, 'Nilai Pembimbing 2', 24, 'Keterangan Nilai Pembimbing 2', '2022-07-29', '2022', 'Ganjil', NULL, NULL, NULL),
(3, 1, 2, 'Nilai Penguji 1', 16, 'Keterangan Nilai Penguji 1', '2022-07-29', '2022', 'Ganjil', NULL, NULL, NULL),
(4, 1, 2, 'Nilai Penguji 2', 16, 'Keterangan Nilai Penguji 2', '2022-07-29', '2022', 'Ganjil', NULL, NULL, NULL),
(5, 1, 2, 'Nilai Proposal', 20, 'Keterangan Nilai Proposal', '2022-07-29', '2022', 'Ganjil', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `periode_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mahasiswa_import_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `user_id`, `periode_id`, `mahasiswa_import_id`, `nama`, `nim`, `telepon`, `alamat`, `foto`, `tahun_ajaran`, `semester`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 18, 2, 1, 'Agus', '150030681', '085737125437', 'Denpasar', 'user.png', '2021-2022', 'Ganjil', '2022-07-28 19:46:26', '2022-07-28 19:46:26', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa_import`
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
-- Dumping data untuk tabel `mahasiswa_import`
--

INSERT INTO `mahasiswa_import` (`id`, `periode_id`, `prodi_id`, `tahun_ajaran`, `semester`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, '2021-2022', 'Ganjil', '2022-07-28 19:46:26', '2022-07-28 19:46:26', NULL);

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
(13, '2022_04_14_132641_create_komponen_table', 1),
(14, '2022_04_14_133439_create_komponen_prasidang_table', 1),
(15, '2022_04_14_133449_create_komponen_proposal_table', 1),
(16, '2022_04_14_133500_create_komponen_sidang_table', 1),
(17, '2022_04_14_141512_create_prasidang_table', 1),
(18, '2022_04_14_141522_create_proposal_table', 1),
(19, '2022_04_14_142105_create_pendaftaran_sidang_table', 1),
(20, '2022_04_14_143719_create_sidang_table', 1),
(21, '2022_04_14_143720_create_jadwal_sidang_table', 1),
(22, '2022_04_14_144640_create_revisi_table', 1),
(23, '2022_04_14_144832_create_nilai_prasidang_table', 1),
(24, '2022_04_14_144839_create_nilai_proposal_table', 1),
(25, '2022_04_14_144849_create_nilai_sidang_table', 1),
(26, '2022_04_14_150424_create_detail_nilai_prasidang_table', 1),
(27, '2022_04_14_150432_create_detail_nilai_proposal_table', 1),
(28, '2022_04_14_150439_create_detail_nilai_sidang_table', 1),
(29, '2022_04_21_080919_create_dosen_koordinator_pa', 1),
(30, '2022_04_21_122152_create_role_dosen_table', 1),
(31, '2022_04_21_132742_create_dosen_kaprodi_table', 1),
(32, '2022_04_21_141300_create_mahasiswa_import_table', 1),
(33, '2022_04_21_141710_add_mahasiswa_import_id_to_mahasiswa_table', 1),
(34, '2022_04_21_171321_create_dosen_import_table', 1),
(35, '2022_04_21_171509_add_dosen_import_id_to_dosen_table', 1),
(36, '2022_04_22_195717_create_nilai_proposal_final_table', 1),
(37, '2022_04_22_195725_create_nilai_prasidang_final_table', 1),
(38, '2022_04_22_195731_create_nilai_sidang_final_table', 1),
(39, '2022_04_23_113708_create_jadwal_prasidang_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_mutu`
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
-- Dumping data untuk tabel `nilai_mutu`
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
-- Struktur dari tabel `nilai_prasidang`
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
-- Struktur dari tabel `nilai_prasidang_final`
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
-- Struktur dari tabel `nilai_proposal`
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
-- Struktur dari tabel `nilai_proposal_final`
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
-- Struktur dari tabel `nilai_sidang`
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
-- Struktur dari tabel `nilai_sidang_final`
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
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran_sidang`
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
-- Struktur dari tabel `periode`
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
-- Dumping data untuk tabel `periode`
--

INSERT INTO `periode` (`id`, `tahun_ajaran`, `semester`, `bulan`, `tahun`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2021-2022', 'Genap', 'Juni', 2022, NULL, NULL, NULL),
(2, '2021-2022', 'Ganjil', 'Desember', 2022, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prasidang`
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
  `jumlah_penguji` int(11) NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
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
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id`, `periode_id`, `koor_id`, `kaprodi_id`, `kode`, `singkatan`, `nama`, `keterangan`, `tahun_ajaran`, `semester`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, NULL, NULL, 'D3SI', 'D3SI', 'D3 Sistem Informasi', 'Akreditasi A', '2021-2022', 'Genap', NULL, NULL, NULL),
(2, 1, NULL, NULL, 'D3TE', 'D3TE', 'D3 Digital Connectivity', 'Akreditasi Unggul', '2021-2022', 'Genap', NULL, NULL, NULL),
(3, 1, NULL, NULL, 'D3TI', 'D3TI', 'D3 Teknik Informatika', 'Akreditasi Unggul', '2021-2022', 'Genap', NULL, NULL, NULL),
(4, 1, NULL, NULL, 'D3SIA', 'D3SIA', 'D3 Sistem Informasi Akuntansi', 'Akreditasi A', '2021-2022', 'Genap', NULL, NULL, NULL),
(5, 1, NULL, NULL, 'D3TK', 'D3TK', 'D3 Teknik Komputer', 'Akreditasi Unggul', '2021-2022', 'Genap', NULL, NULL, NULL),
(6, 1, NULL, NULL, 'D3DM', 'D3DM', 'D3 Digital Marketing', 'Akreditasi B', '2021-2022', 'Genap', NULL, NULL, NULL),
(7, 1, NULL, NULL, 'DCA', 'DCA', 'S1 Terapan Digital Creative Multimedia', 'Akreditasi C', '2021-2022', 'Genap', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `proposal`
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
-- Struktur dari tabel `revisi`
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
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', NULL, NULL, NULL),
(2, 'Dosen', NULL, NULL, NULL),
(3, 'Mahasiswa', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_dosen`
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
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`id`, `kode`, `nama`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'R1', 'Ruangan 1', 'Keterangan Ruangan 1', NULL, NULL, NULL),
(2, 'R2', 'Ruangan 2', 'Keterangan Ruangan 2', NULL, NULL, NULL),
(3, 'R3', 'Ruangan 3', 'Keterangan Ruangan 3', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sidang`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role_id`, `prodi_id`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, NULL, 'admin', 'admin@gmail.com', '$2y$10$DMq3ulyGOhdIPTcWjtEDsutn7AaJMJNgjarrGx9kzD856Hyx9cRZO', NULL, NULL, NULL, NULL),
(2, 2, 1, 'patrick.telnoni', 'patrick.telnoni@tass.telkomuniversity.ac.id ', '$2y$10$.KbNS1rjfrWeUhHRkHbix.7KpVZlRpl1uUxBVblb74Z.9bkZzxTyS', NULL, '2022-07-28 19:46:13', '2022-07-28 19:46:13', NULL),
(3, 2, 1, 'dedyrw', 'dedyrw@tass.telkomuniversity.ac.id ', '$2y$10$2ZuzRRHcpEVSKBTk0ABsd.W6Q4xY0xOP/YYmCGcoMkxoLP2ox0HCa', NULL, '2022-07-28 19:46:13', '2022-07-28 19:46:13', NULL),
(4, 2, 1, 'hanungnp', 'hanungnp@tass.telkomuniversity.ac.id ', '$2y$10$XomeYgQRNyXhN9UiKZZlSukLiwgoBiImtQmyVKFkU6mf5MI6ly2VK', NULL, '2022-07-28 19:46:13', '2022-07-28 19:46:13', NULL),
(5, 2, 1, 'mbarja', 'mbarja@tass.telkomuniversity.ac.id ', '$2y$10$m9GEQxz6zYxgM9taQC20XeCMD5XabCBd9MAMeUOFiygVJOxwihWfy', NULL, '2022-07-28 19:46:13', '2022-07-28 19:46:13', NULL),
(6, 2, 1, 'siska', 'siska@tass.telkomuniversity.ac.id ', '$2y$10$NSyhABanzLVHRC0S0.pW.emDKqMsNnY8QEsSE5Pl1dn82pLfNnSoS', NULL, '2022-07-28 19:46:13', '2022-07-28 19:46:13', NULL),
(7, 2, 1, 'wawa_wikusna', 'wawa_wikusna@tass.telkomuniversity.ac.id ', '$2y$10$3bPu/Ph1ESkH0YXUj89mvuqAPnJTEdSQ4/IlYGjtPNMcZKUvq2j9.', NULL, '2022-07-28 19:46:13', '2022-07-28 19:46:13', NULL),
(8, 2, 1, 'elishernawati', 'elishernawati@tass.telkomuniversity.ac.id', '$2y$10$H7UP4ItuQhn1IY3OhgBWDumx7oPTM/7FPpa.win/ysCB7gUQIHWsm', NULL, '2022-07-28 19:46:13', '2022-07-28 19:46:13', NULL),
(9, 2, 1, 'inne', 'inne@tass.telkomuniversity.ac.id', '$2y$10$A9ATQGklFkNq6YVQXYD7kuf9/xFV7PEKnVCJSpH5F/cKR33UIHwf2', NULL, '2022-07-28 19:46:13', '2022-07-28 19:46:13', NULL),
(10, 2, 1, 'pramukoaji', 'pramukoaji@tass.telkomuniversity.ac.id', '$2y$10$QDLzyHoqAjr.A1DBxfggiuqd4sQPCegbQaFF9/iPwF0Omsr3CdboG', NULL, '2022-07-28 19:46:14', '2022-07-28 19:46:14', NULL),
(11, 2, 1, 'suryatiningsih', 'suryatiningsih@tass.telkomuniversity.ac.id ', '$2y$10$WJQNNl8PLpjsNyBDfRYVPe7oz/tnZz7G2/Poh8ZX9tXR2G0B.12AK', NULL, '2022-07-28 19:46:14', '2022-07-28 19:46:14', NULL),
(12, 2, 1, 'tedi', 'tedi@tass.telkomuniversity.ac.id ', '$2y$10$snBr.i/raEOj.2L/KS/3q.DhXFQMvoYZ85lqDe8dUbRjZUFqoqeQm', NULL, '2022-07-28 19:46:14', '2022-07-28 19:46:14', NULL),
(13, 2, 1, 'pikirwisnu', 'pikirwisnu@tass.telkomuniversity.ac.id ', '$2y$10$klMC2rFN2/VQ.xqWxM9K1OmStrEIJn/dF7G0YNlPDaFQFeOOiuQ22', NULL, '2022-07-28 19:46:14', '2022-07-28 19:46:14', NULL),
(14, 2, 1, 'ely.rosely', 'ely.rosely@tass.telkomuniversity.ac.id', '$2y$10$B3eqElqqZdIjyZN9k4/tQOoMY4tlrr4HFU0BuEJfK4J9ZPsIl/sm.', NULL, '2022-07-28 19:46:14', '2022-07-28 19:46:14', NULL),
(15, 2, 1, 'mutia', 'mutia@tass.telkomuniversity.ac.id', '$2y$10$ZuGV5ges7trOVVMGY5NL9e3e.7wY8v/3kd3fdxHs.s1RUV0Oq1UWW', NULL, '2022-07-28 19:46:14', '2022-07-28 19:46:14', NULL),
(16, 2, 1, 'wahyuhidayat', 'wahyuhidayat@telkomuniversity.ac.id', '$2y$10$ZUXeH3INFFlwLc0JwLeTfeH3W8fSS8GZWfwrQD2Re0Jdzhiwtb2Hi', NULL, '2022-07-28 19:46:14', '2022-07-28 19:46:14', NULL),
(17, 2, 1, 'robbi', 'robbi@tass.telkomuniversity.ac.id', '$2y$10$LG7Ih.9eav0Q44jaz.ylcOo7Hhwcsa3EKxRHFU7T9t88fg9ixIJcC', NULL, '2022-07-28 19:46:14', '2022-07-28 19:46:14', NULL),
(18, 3, 1, 'agus', 'agussalvatru@gmail.com', '$2y$10$S8YFyq1Ugfe5ZARp5ho2NeVKv.J7yqnGVHs8axTewFmR5Q1/An/0K', NULL, '2022-07-28 19:46:26', '2022-07-28 19:46:26', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `detail_nilai_prasidang`
--
ALTER TABLE `detail_nilai_prasidang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_nilai_prasidang_nilai_prasidang_id_foreign` (`nilai_prasidang_id`),
  ADD KEY `detail_nilai_prasidang_komponen_prasidang_id_foreign` (`komponen_prasidang_id`);

--
-- Indeks untuk tabel `detail_nilai_proposal`
--
ALTER TABLE `detail_nilai_proposal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_nilai_proposal_nilai_proposal_id_foreign` (`nilai_proposal_id`),
  ADD KEY `detail_nilai_proposal_komponen_proposal_id_foreign` (`komponen_proposal_id`);

--
-- Indeks untuk tabel `detail_nilai_sidang`
--
ALTER TABLE `detail_nilai_sidang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_nilai_sidang_nilai_sidang_id_foreign` (`nilai_sidang_id`),
  ADD KEY `detail_nilai_sidang_komponen_sidang_id_foreign` (`komponen_sidang_id`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dosen_nip_unique` (`nip`),
  ADD UNIQUE KEY `dosen_kode_unique` (`kode`),
  ADD KEY `dosen_user_id_foreign` (`user_id`),
  ADD KEY `dosen_periode_id_foreign` (`periode_id`),
  ADD KEY `dosen_dosen_import_id_foreign` (`dosen_import_id`);

--
-- Indeks untuk tabel `dosen_import`
--
ALTER TABLE `dosen_import`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dosen_import_periode_id_foreign` (`periode_id`),
  ADD KEY `dosen_import_prodi_id_foreign` (`prodi_id`);

--
-- Indeks untuk tabel `dosen_kaprodi`
--
ALTER TABLE `dosen_kaprodi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dosen_kaprodi_periode_id_foreign` (`periode_id`),
  ADD KEY `dosen_kaprodi_dosen_id_foreign` (`dosen_id`),
  ADD KEY `dosen_kaprodi_prodi_id_foreign` (`prodi_id`);

--
-- Indeks untuk tabel `dosen_koordinator_pa`
--
ALTER TABLE `dosen_koordinator_pa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dosen_koordinator_pa_periode_id_foreign` (`periode_id`),
  ADD KEY `dosen_koordinator_pa_dosen_id_foreign` (`dosen_id`),
  ADD KEY `dosen_koordinator_pa_prodi_id_foreign` (`prodi_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jadwal_prasidang`
--
ALTER TABLE `jadwal_prasidang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_prasidang_prasidang_id_foreign` (`prasidang_id`),
  ADD KEY `jadwal_prasidang_ruangan_id_foreign` (`ruangan_id`);

--
-- Indeks untuk tabel `jadwal_sidang`
--
ALTER TABLE `jadwal_sidang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_sidang_sidang_id_foreign` (`sidang_id`),
  ADD KEY `jadwal_sidang_ruangan_id_foreign` (`ruangan_id`);

--
-- Indeks untuk tabel `komponen`
--
ALTER TABLE `komponen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komponen_prodi_id_foreign` (`prodi_id`);

--
-- Indeks untuk tabel `komponen_prasidang`
--
ALTER TABLE `komponen_prasidang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komponen_prasidang_prodi_id_foreign` (`prodi_id`),
  ADD KEY `komponen_prasidang_periode_id_foreign` (`periode_id`);

--
-- Indeks untuk tabel `komponen_proposal`
--
ALTER TABLE `komponen_proposal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komponen_proposal_prodi_id_foreign` (`prodi_id`),
  ADD KEY `komponen_proposal_periode_id_foreign` (`periode_id`);

--
-- Indeks untuk tabel `komponen_sidang`
--
ALTER TABLE `komponen_sidang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komponen_sidang_prodi_id_foreign` (`prodi_id`),
  ADD KEY `komponen_sidang_periode_id_foreign` (`periode_id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mahasiswa_nim_unique` (`nim`),
  ADD KEY `mahasiswa_user_id_foreign` (`user_id`),
  ADD KEY `mahasiswa_periode_id_foreign` (`periode_id`),
  ADD KEY `mahasiswa_mahasiswa_import_id_foreign` (`mahasiswa_import_id`);

--
-- Indeks untuk tabel `mahasiswa_import`
--
ALTER TABLE `mahasiswa_import`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswa_import_periode_id_foreign` (`periode_id`),
  ADD KEY `mahasiswa_import_prodi_id_foreign` (`prodi_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai_mutu`
--
ALTER TABLE `nilai_mutu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_mutu_periode_id_foreign` (`periode_id`);

--
-- Indeks untuk tabel `nilai_prasidang`
--
ALTER TABLE `nilai_prasidang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_prasidang_prasidang_id_foreign` (`prasidang_id`),
  ADD KEY `nilai_prasidang_ruangan_id_foreign` (`ruangan_id`);

--
-- Indeks untuk tabel `nilai_prasidang_final`
--
ALTER TABLE `nilai_prasidang_final`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_prasidang_final_prasidang_id_foreign` (`prasidang_id`);

--
-- Indeks untuk tabel `nilai_proposal`
--
ALTER TABLE `nilai_proposal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_proposal_proposal_id_foreign` (`proposal_id`),
  ADD KEY `nilai_proposal_ruangan_id_foreign` (`ruangan_id`);

--
-- Indeks untuk tabel `nilai_proposal_final`
--
ALTER TABLE `nilai_proposal_final`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_proposal_final_proposal_id_foreign` (`proposal_id`);

--
-- Indeks untuk tabel `nilai_sidang`
--
ALTER TABLE `nilai_sidang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_sidang_sidang_id_foreign` (`sidang_id`),
  ADD KEY `nilai_sidang_ruangan_id_foreign` (`ruangan_id`);

--
-- Indeks untuk tabel `nilai_sidang_final`
--
ALTER TABLE `nilai_sidang_final`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_sidang_final_sidang_id_foreign` (`sidang_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pendaftaran_sidang`
--
ALTER TABLE `pendaftaran_sidang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pendaftaran_sidang_periode_id_foreign` (`periode_id`),
  ADD KEY `pendaftaran_sidang_mahasiswa_id_foreign` (`mahasiswa_id`);

--
-- Indeks untuk tabel `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `prasidang`
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
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `prodi_kode_unique` (`kode`),
  ADD KEY `prodi_periode_id_foreign` (`periode_id`),
  ADD KEY `prodi_koor_id_foreign` (`koor_id`),
  ADD KEY `prodi_kaprodi_id_foreign` (`kaprodi_id`);

--
-- Indeks untuk tabel `proposal`
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
-- Indeks untuk tabel `revisi`
--
ALTER TABLE `revisi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `revisi_sidang_id_foreign` (`sidang_id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role_dosen`
--
ALTER TABLE `role_dosen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_dosen_kode_unique` (`kode`),
  ADD KEY `role_dosen_periode_id_foreign` (`periode_id`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ruangan_kode_unique` (`kode`);

--
-- Indeks untuk tabel `sidang`
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
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_prodi_id_foreign` (`prodi_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `detail_nilai_prasidang`
--
ALTER TABLE `detail_nilai_prasidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_nilai_proposal`
--
ALTER TABLE `detail_nilai_proposal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_nilai_sidang`
--
ALTER TABLE `detail_nilai_sidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `dosen_import`
--
ALTER TABLE `dosen_import`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `dosen_kaprodi`
--
ALTER TABLE `dosen_kaprodi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `dosen_koordinator_pa`
--
ALTER TABLE `dosen_koordinator_pa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwal_prasidang`
--
ALTER TABLE `jadwal_prasidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwal_sidang`
--
ALTER TABLE `jadwal_sidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `komponen`
--
ALTER TABLE `komponen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `komponen_prasidang`
--
ALTER TABLE `komponen_prasidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `komponen_proposal`
--
ALTER TABLE `komponen_proposal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `komponen_sidang`
--
ALTER TABLE `komponen_sidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa_import`
--
ALTER TABLE `mahasiswa_import`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `nilai_mutu`
--
ALTER TABLE `nilai_mutu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `nilai_prasidang`
--
ALTER TABLE `nilai_prasidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `nilai_prasidang_final`
--
ALTER TABLE `nilai_prasidang_final`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `nilai_proposal`
--
ALTER TABLE `nilai_proposal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `nilai_proposal_final`
--
ALTER TABLE `nilai_proposal_final`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `nilai_sidang`
--
ALTER TABLE `nilai_sidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `nilai_sidang_final`
--
ALTER TABLE `nilai_sidang_final`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran_sidang`
--
ALTER TABLE `pendaftaran_sidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `periode`
--
ALTER TABLE `periode`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `prasidang`
--
ALTER TABLE `prasidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `revisi`
--
ALTER TABLE `revisi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `role_dosen`
--
ALTER TABLE `role_dosen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sidang`
--
ALTER TABLE `sidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_nilai_prasidang`
--
ALTER TABLE `detail_nilai_prasidang`
  ADD CONSTRAINT `detail_nilai_prasidang_komponen_prasidang_id_foreign` FOREIGN KEY (`komponen_prasidang_id`) REFERENCES `komponen_prasidang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_nilai_prasidang_nilai_prasidang_id_foreign` FOREIGN KEY (`nilai_prasidang_id`) REFERENCES `nilai_prasidang` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_nilai_proposal`
--
ALTER TABLE `detail_nilai_proposal`
  ADD CONSTRAINT `detail_nilai_proposal_komponen_proposal_id_foreign` FOREIGN KEY (`komponen_proposal_id`) REFERENCES `komponen_proposal` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_nilai_proposal_nilai_proposal_id_foreign` FOREIGN KEY (`nilai_proposal_id`) REFERENCES `nilai_proposal` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_nilai_sidang`
--
ALTER TABLE `detail_nilai_sidang`
  ADD CONSTRAINT `detail_nilai_sidang_komponen_sidang_id_foreign` FOREIGN KEY (`komponen_sidang_id`) REFERENCES `komponen_sidang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_nilai_sidang_nilai_sidang_id_foreign` FOREIGN KEY (`nilai_sidang_id`) REFERENCES `nilai_sidang` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_dosen_import_id_foreign` FOREIGN KEY (`dosen_import_id`) REFERENCES `dosen_import` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dosen_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dosen_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dosen_import`
--
ALTER TABLE `dosen_import`
  ADD CONSTRAINT `dosen_import_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dosen_import_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dosen_kaprodi`
--
ALTER TABLE `dosen_kaprodi`
  ADD CONSTRAINT `dosen_kaprodi_dosen_id_foreign` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dosen_kaprodi_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dosen_kaprodi_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dosen_koordinator_pa`
--
ALTER TABLE `dosen_koordinator_pa`
  ADD CONSTRAINT `dosen_koordinator_pa_dosen_id_foreign` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dosen_koordinator_pa_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dosen_koordinator_pa_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwal_prasidang`
--
ALTER TABLE `jadwal_prasidang`
  ADD CONSTRAINT `jadwal_prasidang_prasidang_id_foreign` FOREIGN KEY (`prasidang_id`) REFERENCES `prasidang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jadwal_prasidang_ruangan_id_foreign` FOREIGN KEY (`ruangan_id`) REFERENCES `ruangan` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwal_sidang`
--
ALTER TABLE `jadwal_sidang`
  ADD CONSTRAINT `jadwal_sidang_ruangan_id_foreign` FOREIGN KEY (`ruangan_id`) REFERENCES `ruangan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jadwal_sidang_sidang_id_foreign` FOREIGN KEY (`sidang_id`) REFERENCES `sidang` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komponen`
--
ALTER TABLE `komponen`
  ADD CONSTRAINT `komponen_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komponen_prasidang`
--
ALTER TABLE `komponen_prasidang`
  ADD CONSTRAINT `komponen_prasidang_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `komponen_prasidang_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komponen_proposal`
--
ALTER TABLE `komponen_proposal`
  ADD CONSTRAINT `komponen_proposal_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `komponen_proposal_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komponen_sidang`
--
ALTER TABLE `komponen_sidang`
  ADD CONSTRAINT `komponen_sidang_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `komponen_sidang_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_mahasiswa_import_id_foreign` FOREIGN KEY (`mahasiswa_import_id`) REFERENCES `mahasiswa_import` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mahasiswa_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mahasiswa_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mahasiswa_import`
--
ALTER TABLE `mahasiswa_import`
  ADD CONSTRAINT `mahasiswa_import_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mahasiswa_import_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai_mutu`
--
ALTER TABLE `nilai_mutu`
  ADD CONSTRAINT `nilai_mutu_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai_prasidang`
--
ALTER TABLE `nilai_prasidang`
  ADD CONSTRAINT `nilai_prasidang_prasidang_id_foreign` FOREIGN KEY (`prasidang_id`) REFERENCES `prasidang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilai_prasidang_ruangan_id_foreign` FOREIGN KEY (`ruangan_id`) REFERENCES `ruangan` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai_prasidang_final`
--
ALTER TABLE `nilai_prasidang_final`
  ADD CONSTRAINT `nilai_prasidang_final_prasidang_id_foreign` FOREIGN KEY (`prasidang_id`) REFERENCES `prasidang` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai_proposal`
--
ALTER TABLE `nilai_proposal`
  ADD CONSTRAINT `nilai_proposal_proposal_id_foreign` FOREIGN KEY (`proposal_id`) REFERENCES `proposal` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilai_proposal_ruangan_id_foreign` FOREIGN KEY (`ruangan_id`) REFERENCES `ruangan` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai_proposal_final`
--
ALTER TABLE `nilai_proposal_final`
  ADD CONSTRAINT `nilai_proposal_final_proposal_id_foreign` FOREIGN KEY (`proposal_id`) REFERENCES `proposal` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai_sidang`
--
ALTER TABLE `nilai_sidang`
  ADD CONSTRAINT `nilai_sidang_ruangan_id_foreign` FOREIGN KEY (`ruangan_id`) REFERENCES `ruangan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilai_sidang_sidang_id_foreign` FOREIGN KEY (`sidang_id`) REFERENCES `sidang` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai_sidang_final`
--
ALTER TABLE `nilai_sidang_final`
  ADD CONSTRAINT `nilai_sidang_final_sidang_id_foreign` FOREIGN KEY (`sidang_id`) REFERENCES `sidang` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pendaftaran_sidang`
--
ALTER TABLE `pendaftaran_sidang`
  ADD CONSTRAINT `pendaftaran_sidang_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pendaftaran_sidang_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `prasidang`
--
ALTER TABLE `prasidang`
  ADD CONSTRAINT `prasidang_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prasidang_pembimbing1_id_foreign` FOREIGN KEY (`pembimbing1_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prasidang_pembimbing2_id_foreign` FOREIGN KEY (`pembimbing2_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prasidang_penguji1_id_foreign` FOREIGN KEY (`penguji1_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prasidang_penguji2_id_foreign` FOREIGN KEY (`penguji2_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prasidang_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_kaprodi_id_foreign` FOREIGN KEY (`kaprodi_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prodi_koor_id_foreign` FOREIGN KEY (`koor_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prodi_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `proposal`
--
ALTER TABLE `proposal`
  ADD CONSTRAINT `proposal_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `proposal_pembimbing1_id_foreign` FOREIGN KEY (`pembimbing1_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `proposal_pembimbing2_id_foreign` FOREIGN KEY (`pembimbing2_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `proposal_penguji1_id_foreign` FOREIGN KEY (`penguji1_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `proposal_penguji2_id_foreign` FOREIGN KEY (`penguji2_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `proposal_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `revisi`
--
ALTER TABLE `revisi`
  ADD CONSTRAINT `revisi_sidang_id_foreign` FOREIGN KEY (`sidang_id`) REFERENCES `sidang` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_dosen`
--
ALTER TABLE `role_dosen`
  ADD CONSTRAINT `role_dosen_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sidang`
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
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

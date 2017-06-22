-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22 Jun 2017 pada 11.31
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoringworkshop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `assembly`
--

CREATE TABLE `assembly` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ID_PANEL` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PROGRESS` double(6,2) NOT NULL,
  `ID_WORKER` int(11) NOT NULL,
  `WORKER_NAME` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ATTENDANCE` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PROCESS` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OPERATOR` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MACHINE` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MACHINE_WORKING` double(6,2) NOT NULL,
  `MACHINE_ADD_HOURS` double(6,2) NOT NULL,
  `WORKING_HOURS` double(6,2) NOT NULL DEFAULT '0.00',
  `PROBLEM` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `WASTE_TIME` double(6,2) NOT NULL,
  `SHIFT` int(11) NOT NULL,
  `USER` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `assembly`
--

INSERT INTO `assembly` (`ID`, `ID_PANEL`, `PROGRESS`, `ID_WORKER`, `WORKER_NAME`, `ATTENDANCE`, `PROCESS`, `OPERATOR`, `MACHINE`, `MACHINE_WORKING`, `MACHINE_ADD_HOURS`, `WORKING_HOURS`, `PROBLEM`, `WASTE_TIME`, `SHIFT`, `USER`, `created_at`, `updated_at`) VALUES
(1, '1', 0.00, 3, 'Abc', 'Present', 'Fitting', 'no', 'Machine Fitting', 0.00, 0.00, 0.00, 'No Problem', 0.00, 1, 'admin', '2017-06-15 07:51:12', '2017-06-15 07:51:12'),
(2, '1', 0.00, 4, 'Def', 'Present', 'Fitting', 'no', 'Machine Fitting', 0.00, 0.00, 0.00, 'No Problem', 0.00, 1, 'admin', '2017-06-15 07:51:12', '2017-06-15 07:51:12'),
(3, '1', 0.00, 5, 'Ghi', 'Present', 'Fitting', 'no', 'Machine Fitting', 0.00, 0.00, 0.00, 'No Problem', 0.00, 1, 'admin', '2017-06-15 07:51:12', '2017-06-15 07:51:12'),
(4, '1', 0.00, 3, 'Abc', 'Present', 'Fitting', 'no', 'Machine Fitting', 0.00, 0.00, 0.00, 'No Problem', 0.00, 1, 'admin', '2017-06-15 07:51:20', '2017-06-15 07:51:20'),
(5, '1', 0.00, 4, 'Def', 'Present', 'Fitting', 'no', 'Machine Fitting', 0.00, 0.00, 0.00, 'No Problem', 0.00, 1, 'admin', '2017-06-15 07:51:20', '2017-06-15 07:51:20'),
(6, '1', 0.00, 5, 'Ghi', 'Present', 'Fitting', 'no', 'Machine Fitting', 0.00, 0.00, 0.00, 'No Problem', 0.00, 1, 'admin', '2017-06-15 07:51:20', '2017-06-15 07:51:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bbs`
--

CREATE TABLE `bbs` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ID_MATERIAL` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PROGRESS` double(6,2) NOT NULL,
  `ID_WORKER` int(11) NOT NULL,
  `WORKER_NAME` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ATTENDANCE` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PROCESS` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `WORKING_HOURS` double(6,2) NOT NULL,
  `ADD_WORKING_HOURS` double(6,2) NOT NULL,
  `PROBLEM` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `WASTE_TIME` double(6,2) NOT NULL,
  `SHIFT` int(11) NOT NULL,
  `USER` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `blocks`
--

CREATE TABLE `blocks` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ID_PROJECT` int(11) NOT NULL,
  `PROJECT_NAME` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NAME` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MATERIAL` double(10,2) NOT NULL DEFAULT '0.00',
  `MATERIAL_COMING` double(10,2) NOT NULL DEFAULT '0.00',
  `PART` double(10,2) NOT NULL DEFAULT '0.00',
  `PART_COMING` double(10,2) NOT NULL DEFAULT '0.00',
  `PANEL` double NOT NULL DEFAULT '0',
  `PANEL_DONE` double NOT NULL DEFAULT '0',
  `LOADING` double(6,2) NOT NULL DEFAULT '0.00',
  `LOADING_DATE` date DEFAULT NULL,
  `ADJUSTING` double(6,2) NOT NULL DEFAULT '0.00',
  `ADJUSTING_DATE` date DEFAULT NULL,
  `FITTING` double(6,2) NOT NULL DEFAULT '0.00',
  `FITTING_DATE` date DEFAULT NULL,
  `WELDING` double(6,2) NOT NULL DEFAULT '0.00',
  `WELDING_LENGTH` double(6,2) NOT NULL DEFAULT '0.00',
  `WELDING_FINISH` double(6,2) NOT NULL DEFAULT '0.00',
  `WELDING_DATE` date DEFAULT NULL,
  `ERECTION_START` date DEFAULT NULL,
  `ERECTION_FINISH` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `blocks`
--

INSERT INTO `blocks` (`ID`, `ID_PROJECT`, `PROJECT_NAME`, `NAME`, `MATERIAL`, `MATERIAL_COMING`, `PART`, `PART_COMING`, `PANEL`, `PANEL_DONE`, `LOADING`, `LOADING_DATE`, `ADJUSTING`, `ADJUSTING_DATE`, `FITTING`, `FITTING_DATE`, `WELDING`, `WELDING_LENGTH`, `WELDING_FINISH`, `WELDING_DATE`, `ERECTION_START`, `ERECTION_FINISH`, `created_at`, `updated_at`) VALUES
(1, 2, 'Strategic Sealift Vessel 293', 'NV1', 0.00, 0.00, 0.00, 0.00, 0, 0, 0.00, NULL, 0.00, NULL, 0.00, NULL, 0.00, 0.00, 0.00, NULL, NULL, NULL, '2017-06-06 20:15:28', '2017-06-06 20:15:28'),
(2, 2, 'Strategic Sealift Vessel 293', 'DH', 0.00, 0.00, 0.00, 0.00, 0, 0, 0.00, NULL, 0.00, NULL, 0.00, NULL, 0.00, 0.00, 0.00, NULL, NULL, NULL, '2017-06-06 20:15:38', '2017-06-06 20:15:38'),
(3, 2, 'Strategic Sealift Vessel 293', 'FU-(P/S)', 0.00, 0.00, 0.00, 0.00, 0, 0, 0.00, NULL, 0.00, NULL, 0.00, NULL, 0.00, 0.00, 0.00, NULL, NULL, NULL, '2017-06-06 20:15:45', '2017-06-06 20:15:45'),
(4, 2, 'Strategic Sealift Vessel 293', 'RD-(P/S)', 0.00, 0.00, 0.00, 0.00, 0, 0, 0.00, NULL, 0.00, NULL, 0.00, NULL, 0.00, 0.00, 0.00, NULL, NULL, NULL, '2017-06-06 20:15:53', '2017-06-06 20:15:53'),
(5, 2, 'Strategic Sealift Vessel 293', 'BR2-(P/S)', 8438.31, 0.00, 996.58, 0.00, 2, 0, 0.00, NULL, 0.00, NULL, 0.00, NULL, 0.00, 0.00, 0.00, NULL, NULL, NULL, '2017-06-06 20:21:33', '2017-06-15 02:07:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `erections`
--

CREATE TABLE `erections` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ID_BLOCK` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PROGRESS` double(6,2) NOT NULL,
  `ID_WORKER` int(11) NOT NULL,
  `WORKER_NAME` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ATTENDANCE` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PROCESS` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `WORKING_HOURS` double(6,2) NOT NULL,
  `ADD_WORKING_HOURS` double(6,2) NOT NULL,
  `PROBLEM` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `WASTE_TIME` double(6,2) NOT NULL,
  `SHIFT` int(11) NOT NULL,
  `USER` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fabrications`
--

CREATE TABLE `fabrications` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ID_MATERIAL` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_WORKER` int(11) NOT NULL,
  `WORKER_NAME` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ATTENDANCE` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PROCESS` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OPERATOR` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MACHINE` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MACHINE_WORKING` double(6,2) NOT NULL,
  `MACHINE_ADD_HOURS` double(6,2) NOT NULL,
  `WORKING_HOURS` double(6,2) NOT NULL DEFAULT '0.00',
  `PROBLEM` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `WASTE_TIME` double(6,2) NOT NULL,
  `SHIFT` int(11) NOT NULL,
  `USER` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `machines`
--

CREATE TABLE `machines` (
  `ID` int(10) UNSIGNED NOT NULL,
  `NAME` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ACTIVITY` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `WORKSHOP` varchar(17) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OPERATIONAL_HOUR` int(11) NOT NULL,
  `CAPACITY` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `machines`
--

INSERT INTO `machines` (`ID`, `NAME`, `ACTIVITY`, `WORKSHOP`, `OPERATIONAL_HOUR`, `CAPACITY`, `created_at`, `updated_at`) VALUES
(1, 'Straightening Roller', 'Straightening', 'SSH', 4, 1.33, '2017-05-26 01:00:14', '2017-05-26 01:00:14'),
(2, 'Shot Blasting&Painting', 'Blasting&ShopPrimer', 'SSH', 4, 0.94, '2017-05-26 01:01:25', '2017-05-26 01:01:25'),
(3, 'Saffro Cutting', 'Cutting', 'Fabrication', 5, 20.37, '2017-05-26 01:05:55', '2017-05-26 01:06:10'),
(4, 'CNC Cutting Plasma', 'Cutting', 'Fabrication', 5, 20.37, '2017-05-26 01:06:50', '2017-05-26 01:06:50'),
(5, 'CNC Gas', 'Marking', 'Fabrication', 5, 20.37, '2017-05-26 01:07:27', '2017-05-26 01:07:27'),
(6, 'Bending Machine', 'Bending', 'Fabrication', 6, 25.92, '2017-05-26 01:08:40', '2017-05-26 01:08:40'),
(7, 'Flame Cutting', 'Cutting', 'Fabrication', 6, 3.7, '2017-05-26 01:09:42', '2017-05-26 01:09:42'),
(8, 'FCAW Welding', 'Fitting', 'Sub Assembly', 5, 0, '2017-05-26 01:12:56', '2017-05-26 01:12:56'),
(9, 'Fairing Heating', 'Welding', 'Sub Assembly', 6, 64, '2017-05-26 01:14:55', '2017-05-26 01:14:55'),
(10, 'FCAW Grinding', 'Grinding', 'Sub Assembly', 5, 0, '2017-05-26 01:21:48', '2017-05-26 01:21:48'),
(11, 'FCAW Fairing', 'Fairing', 'Sub Assembly', 5, 0, '2017-05-26 01:21:48', '2017-05-26 01:21:48'),
(12, 'FCAW Fitting', 'Fitting', 'Assembly', 5, 0, '2017-05-26 01:21:48', '2017-05-26 01:21:48'),
(13, 'FCAW Welding', 'Welding', 'Assembly', 5, 0, '2017-05-26 01:21:48', '2017-05-26 01:21:48'),
(14, 'FCAW Grinding', 'Grinding', 'Assembly', 5, 0, '2017-05-26 01:21:48', '2017-05-26 01:21:48'),
(15, 'Fairing Heating', 'Fairing', 'Assembly', 6, 64, '2017-05-26 01:22:17', '2017-05-26 01:22:17');

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
(143, '2014_10_12_000000_create_users_table', 1),
(144, '2014_10_12_100000_create_password_resets_table', 1),
(145, '2017_04_02_144630_create_ship_projects_table', 1),
(146, '2017_04_05_063120_create_workers_table', 1),
(147, '2017_04_05_063128_create_machines_table', 1),
(148, '2017_04_12_105302_create_plates_table', 1),
(149, '2017_04_12_105310_create_profiles_table', 1),
(150, '2017_04_12_105315_create_parts_table', 1),
(151, '2017_04_12_105321_create_panels_table', 1),
(152, '2017_04_12_105327_create_blocks_table', 1),
(188, '2017_05_16_071224_create_s_s_hs_table', 2),
(189, '2017_05_16_071314_create_fabrications_table', 2),
(190, '2017_05_16_071325_create_sub_assemblies_table', 2),
(191, '2017_05_16_071332_create_assemblies_table', 2),
(192, '2017_05_16_071343_create_b_b_s_table', 2),
(193, '2017_05_16_071517_create_erections_table', 2),
(194, '2017_05_16_082438_create_rooms_table', 2),
(197, '2017_06_02_080129_create_percentages_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `panels`
--

CREATE TABLE `panels` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ID_PROJECT` int(11) NOT NULL,
  `PROJECT_NAME` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_BLOCK` int(11) NOT NULL,
  `BLOCK_NAME` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NAME` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PART` double(10,2) NOT NULL DEFAULT '0.00',
  `PART_COMING` double(10,2) NOT NULL DEFAULT '0.00',
  `PART_DONE` double(10,2) NOT NULL DEFAULT '0.00',
  `FITTING` double(6,2) NOT NULL DEFAULT '0.00',
  `FITTING_DATE` date DEFAULT NULL,
  `FITTING_MACHINE` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `WELDING` double(6,2) NOT NULL DEFAULT '0.00',
  `WELDING_DATE` date DEFAULT NULL,
  `WELDING_MACHINE` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GRINDING` double(6,2) NOT NULL DEFAULT '0.00',
  `GRINDING_DATE` date DEFAULT NULL,
  `GRINDING_MACHINE` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FAIRING` double(6,2) NOT NULL DEFAULT '0.00',
  `FAIRING_DATE` date DEFAULT NULL,
  `FAIRING_MACHINE` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `panels`
--

INSERT INTO `panels` (`ID`, `ID_PROJECT`, `PROJECT_NAME`, `ID_BLOCK`, `BLOCK_NAME`, `NAME`, `PART`, `PART_COMING`, `PART_DONE`, `FITTING`, `FITTING_DATE`, `FITTING_MACHINE`, `WELDING`, `WELDING_DATE`, `WELDING_MACHINE`, `GRINDING`, `GRINDING_DATE`, `GRINDING_MACHINE`, `FAIRING`, `FAIRING_DATE`, `FAIRING_MACHINE`, `created_at`, `updated_at`) VALUES
(1, 2, 'Strategic Sealift Vessel 293', 5, 'BR2-(P/S)', 'K13-0-101', 996.58, 0.00, 0.00, 0.00, '2017-06-15', NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, '2017-06-06 20:29:59', '2017-06-15 07:51:20'),
(2, 2, 'Strategic Sealift Vessel 293', 5, 'BR2-(P/S)', 'K14-0-101', 0.00, 0.00, 0.00, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, '2017-06-06 20:30:23', '2017-06-06 20:30:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `parts`
--

CREATE TABLE `parts` (
  `ID` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_PROJECT` int(11) NOT NULL,
  `PROJECT_NAME` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_BLOCK` int(11) NOT NULL,
  `BLOCK_NAME` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_PANEL` int(11) NOT NULL,
  `PANEL_NAME` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NAME` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LENGTH` double(8,2) NOT NULL,
  `BREADTH` double(6,2) NOT NULL,
  `THICKNESS` double(6,2) NOT NULL,
  `PORT` double(6,2) NOT NULL,
  `CENTER` double(6,2) NOT NULL,
  `STARBOARD` double(6,2) NOT NULL,
  `WEIGHT` double(6,2) NOT NULL,
  `STAGE` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DATE_COMING` date DEFAULT NULL,
  `FITTING` double(6,2) NOT NULL DEFAULT '0.00',
  `FITTING_DATE` date DEFAULT NULL,
  `FITTING_MACHINE` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `WELDING` double(6,2) NOT NULL DEFAULT '0.00',
  `WELDING_DATE` date DEFAULT NULL,
  `WELDING_MACHINE` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GRINDING` double(6,2) NOT NULL DEFAULT '0.00',
  `GRINDING_DATE` date DEFAULT NULL,
  `GRINDING_MACHINE` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FAIRING` double(6,2) NOT NULL DEFAULT '0.00',
  `FAIRING_DATE` date DEFAULT NULL,
  `FAIRING_MACHINE` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `parts`
--

INSERT INTO `parts` (`ID`, `ID_PROJECT`, `PROJECT_NAME`, `ID_BLOCK`, `BLOCK_NAME`, `ID_PANEL`, `PANEL_NAME`, `NAME`, `LENGTH`, `BREADTH`, `THICKNESS`, `PORT`, `CENTER`, `STARBOARD`, `WEIGHT`, `STAGE`, `DATE_COMING`, `FITTING`, `FITTING_DATE`, `FITTING_MACHINE`, `WELDING`, `WELDING_DATE`, `WELDING_MACHINE`, `GRINDING`, `GRINDING_DATE`, `GRINDING_MACHINE`, `FAIRING`, `FAIRING_DATE`, `FAIRING_MACHINE`, `created_at`, `updated_at`) VALUES
('343', 2, 'Strategic Sealift Vessel 293', 5, 'BR2-(P/S)', 1, 'K13-0-101', 'K13-0-101 P101', 0.00, 0.00, 6.00, 1.00, 0.00, 0.00, 996.58, 'S', NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, '2017-06-06 21:09:12', '2017-06-06 21:09:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `USERNAME` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `percentages`
--

CREATE TABLE `percentages` (
  `id` int(10) UNSIGNED NOT NULL,
  `WORKSHOP` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ACTIVITY` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PERCENT` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `percentages`
--

INSERT INTO `percentages` (`id`, `WORKSHOP`, `ACTIVITY`, `PERCENT`, `created_at`, `updated_at`) VALUES
(1, 'SSH', 'STRAIGHTENING', 50, NULL, '2017-06-02 23:35:53'),
(2, 'SSH', 'BLASTING', 50, NULL, '2017-06-02 23:35:53'),
(3, 'FABRICATION', 'MARKING', 40, NULL, '2017-06-02 23:38:53'),
(4, 'FABRICATION', 'CUTTING', 40, NULL, NULL),
(5, 'FABRICATION', 'BENDING', 20, NULL, '2017-06-02 23:38:53'),
(6, 'SUBASSEMBLY', 'FITTING', 30, NULL, '2017-06-02 23:46:10'),
(7, 'SUBASSEMBLY', 'WELDING', 30, NULL, '2017-06-02 23:46:10'),
(8, 'SUBASSEMBLY', 'GRINDING', 30, NULL, '2017-06-02 23:46:11'),
(9, 'SUBASSEMBLY', 'FAIRING', 10, NULL, '2017-06-02 23:46:11'),
(10, 'ASSEMBLY', 'FITTING', 30, NULL, '2017-06-02 23:46:27'),
(11, 'ASSEMBLY', 'WELDING', 30, NULL, '2017-06-02 23:46:27'),
(12, 'ASSEMBLY', 'GRINDING', 30, NULL, '2017-06-02 23:46:27'),
(13, 'ASSEMBLY', 'FAIRING', 10, NULL, '2017-06-02 23:46:27'),
(14, 'BBS', 'BLASTING', 50, NULL, NULL),
(15, 'BBS', 'PAINTING', 50, NULL, NULL),
(16, 'ERECTION', 'LOADING', 25, NULL, NULL),
(17, 'ERECTION', 'ADJUSTING', 25, NULL, NULL),
(18, 'ERECTION', 'FITTING', 25, NULL, NULL),
(19, 'ERECTION', 'WELDING', 25, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `plates`
--

CREATE TABLE `plates` (
  `ID` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_PROJECT` int(11) NOT NULL,
  `PROJECT_NAME` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_BLOCK` int(11) NOT NULL,
  `BLOCK_NAME` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LENGTH` double(8,2) NOT NULL,
  `BREADTH` double(6,2) NOT NULL,
  `THICKNESS` double(6,2) NOT NULL,
  `PORT` double(6,2) NOT NULL,
  `CENTER` double(6,2) NOT NULL,
  `STARBOARD` double(6,2) NOT NULL,
  `WEIGHT` double(6,2) NOT NULL,
  `DATE_COMING` date DEFAULT NULL,
  `STRAIGHTENING` int(11) NOT NULL DEFAULT '0',
  `STRAIGHTENING_DATE` date DEFAULT NULL,
  `STRAIGHTENING_MACHINE` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BLASTING` int(11) NOT NULL DEFAULT '0',
  `BLASTING_DATE` date DEFAULT NULL,
  `BLASTING_MACHINE` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MARKING` int(11) NOT NULL DEFAULT '0',
  `MARKING_DATE` date DEFAULT NULL,
  `MARKING_MACHINE` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CUTTING` int(11) NOT NULL DEFAULT '0',
  `CUTTING_DATE` date DEFAULT NULL,
  `CUTTING_MACHINE` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BLENDING` int(11) NOT NULL DEFAULT '0',
  `BLENDING_DATE` date DEFAULT NULL,
  `BLENDING_MACHINE` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `plates`
--

INSERT INTO `plates` (`ID`, `ID_PROJECT`, `PROJECT_NAME`, `ID_BLOCK`, `BLOCK_NAME`, `LENGTH`, `BREADTH`, `THICKNESS`, `PORT`, `CENTER`, `STARBOARD`, `WEIGHT`, `DATE_COMING`, `STRAIGHTENING`, `STRAIGHTENING_DATE`, `STRAIGHTENING_MACHINE`, `BLASTING`, `BLASTING_DATE`, `BLASTING_MACHINE`, `MARKING`, `MARKING_DATE`, `MARKING_MACHINE`, `CUTTING`, `CUTTING_DATE`, `CUTTING_MACHINE`, `BLENDING`, `BLENDING_DATE`, `BLENDING_MACHINE`, `created_at`, `updated_at`) VALUES
('BR2-1', 2, 'Strategic Sealift Vessel 293', 5, 'BR2-(P/S)', 12192.00, 1829.00, 6.00, 1.00, 0.00, 1.00, 2100.58, '2017-06-07', 1, '2017-06-07', 'Straightening Roller', 1, '2017-06-08', 'Straightening Roller', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-06-06 20:33:40', '2017-06-08 00:09:05'),
('BR2-2', 2, 'Strategic Sealift Vessel 293', 5, 'BR2-(P/S)', 12192.00, 1524.00, 6.00, 1.00, 0.00, 1.00, 1750.29, '2017-06-07', 1, '2017-06-15', 'Straightening Roller', 1, '2017-06-15', 'Straightening Roller', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-06-06 20:36:25', '2017-06-14 22:29:06'),
('BR2-3', 2, 'Strategic Sealift Vessel 293', 5, 'BR2-(P/S)', 1.00, 1.00, 1.00, 1.00, 1.00, 1.00, 1.00, NULL, 1, '2017-06-15', 'Straightening Roller', 1, '2017-06-15', 'Straightening Roller', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-06-14 22:31:11', '2017-06-14 22:35:40'),
('BR2-3', 2, 'Strategic Sealift Vessel 293', 5, 'BR2-(P/S)', 1.00, 1.00, 1.00, 1.00, 1.00, 1.00, 1.00, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-06-15 02:07:32', '2017-06-15 02:07:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profiles`
--

CREATE TABLE `profiles` (
  `ID` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_PROJECT` int(11) NOT NULL,
  `PROJECT_NAME` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_BLOCK` int(11) NOT NULL,
  `BLOCK_NAME` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LENGTH` double(8,2) NOT NULL,
  `BREADTH` double(6,2) NOT NULL,
  `THICKNESS` double(6,2) NOT NULL,
  `HEIGHT` double(6,2) NOT NULL,
  `PORT` double(6,2) NOT NULL,
  `CENTER` double(6,2) NOT NULL,
  `STARBOARD` double(6,2) NOT NULL,
  `WEIGHT` double(6,2) NOT NULL,
  `FORM` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DATE_COMING` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `profiles`
--

INSERT INTO `profiles` (`ID`, `ID_PROJECT`, `PROJECT_NAME`, `ID_BLOCK`, `BLOCK_NAME`, `LENGTH`, `BREADTH`, `THICKNESS`, `HEIGHT`, `PORT`, `CENTER`, `STARBOARD`, `WEIGHT`, `FORM`, `DATE_COMING`, `created_at`, `updated_at`) VALUES
('BR2-Pro1', 2, 'Strategic Sealift Vessel 293', 5, 'BR2-(P/S)', 6000.00, 75.00, 7.00, 100.00, 54.00, 0.00, 28.00, 4585.44, 'Profil L', NULL, '2017-06-06 20:35:19', '2017-06-06 20:35:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rooms`
--

CREATE TABLE `rooms` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ID_PROJECT` int(11) NOT NULL,
  `PROJECT_NAME` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_BLOCK` int(11) NOT NULL,
  `BLOCK_NAME` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ROOM` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SIDE` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FRAME` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DECK` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AREA` int(11) NOT NULL,
  `TOTAL_LAYER` int(11) NOT NULL,
  `PAINT_TYPE` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `VOLUME_SOLID` double(6,2) NOT NULL,
  `PAINT_NEEDS` double(8,2) NOT NULL,
  `BLASTING` double(6,2) NOT NULL DEFAULT '0.00',
  `BLASTING_DATE` date DEFAULT NULL,
  `PAINTING` double(6,2) NOT NULL DEFAULT '0.00',
  `PAINTING_DATE` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rooms`
--

INSERT INTO `rooms` (`ID`, `ID_PROJECT`, `PROJECT_NAME`, `ID_BLOCK`, `BLOCK_NAME`, `ROOM`, `SIDE`, `FRAME`, `DECK`, `AREA`, `TOTAL_LAYER`, `PAINT_TYPE`, `VOLUME_SOLID`, `PAINT_NEEDS`, `BLASTING`, `BLASTING_DATE`, `PAINTING`, `PAINTING_DATE`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kapal Api', 1, 'NV1', '1', '1', '1', '1', 1, 1, '1', 0.00, 1.00, 0.00, NULL, 0.00, NULL, '2017-06-15 02:13:09', '2017-06-15 02:13:09'),
(2, 1, 'Kapal Api', 1, 'NV1', '2', '1', '1', '1', 12, 20, '1', 34.00, 405.88, 0.00, NULL, 0.00, NULL, '2017-06-15 07:56:29', '2017-06-15 07:56:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ship_projects`
--

CREATE TABLE `ship_projects` (
  `ID` int(10) UNSIGNED NOT NULL,
  `PROJECT_NAME` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OWNER` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SHIP_TYPE` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LWL` double(6,2) NOT NULL,
  `LPP` double(6,2) NOT NULL,
  `BREADTH` double(6,2) NOT NULL,
  `DEPTH` double(6,2) NOT NULL,
  `DRAFT` double(6,2) NOT NULL,
  `DISPLACEMENT` double(6,2) NOT NULL,
  `DESIGNED_SPEED` double(6,2) NOT NULL,
  `MATERIAL` double(10,2) NOT NULL DEFAULT '0.00',
  `MATERIAL_COMING` double(10,2) NOT NULL DEFAULT '0.00',
  `PART` double(10,2) NOT NULL DEFAULT '0.00',
  `PART_COMING` double(10,2) NOT NULL DEFAULT '0.00',
  `PANEL` double NOT NULL DEFAULT '0',
  `PANEL_DONE` double NOT NULL DEFAULT '0',
  `BLOCK` double NOT NULL DEFAULT '0',
  `BLOCK_DONE` double NOT NULL DEFAULT '0',
  `START` date NOT NULL,
  `FINISH` date NOT NULL,
  `FINISHED` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ship_projects`
--

INSERT INTO `ship_projects` (`ID`, `PROJECT_NAME`, `OWNER`, `SHIP_TYPE`, `LWL`, `LPP`, `BREADTH`, `DEPTH`, `DRAFT`, `DISPLACEMENT`, `DESIGNED_SPEED`, `MATERIAL`, `MATERIAL_COMING`, `PART`, `PART_COMING`, `PANEL`, `PANEL_DONE`, `BLOCK`, `BLOCK_DONE`, `START`, `FINISH`, `FINISHED`, `created_at`, `updated_at`) VALUES
(1, 'Kapal Api', 'Steven Kurniawan', 'Kopi', 12.00, 12.00, 1.00, 2.00, 3.00, 100.00, 100.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, '2017-06-06', '2017-06-30', NULL, '2017-06-06 19:50:19', '2017-06-06 19:50:19'),
(2, 'Strategic Sealift Vessel 293', 'Philippines Goverment', 'Development of LPD', 114.64, 107.49, 21.80, 11.30, 5.00, 4516.00, 16.00, 8438.31, 0.00, 996.58, 0.00, 2, 0, 5, 0, '2017-06-20', '2018-12-19', NULL, '2017-06-06 19:50:36', '2017-06-15 02:07:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ssh`
--

CREATE TABLE `ssh` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ID_MATERIAL` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_WORKER` int(11) NOT NULL,
  `WORKER_NAME` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ATTENDANCE` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PROCESS` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OPERATOR` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MACHINE` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MACHINE_WORKING` double(6,2) NOT NULL,
  `MACHINE_ADD_HOURS` double(6,2) NOT NULL,
  `WORKING_HOURS` double(6,2) NOT NULL DEFAULT '0.00',
  `PROBLEM` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `WASTE_TIME` double(6,2) NOT NULL,
  `SHIFT` int(11) NOT NULL,
  `USER` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ssh`
--

INSERT INTO `ssh` (`ID`, `ID_MATERIAL`, `ID_WORKER`, `WORKER_NAME`, `ATTENDANCE`, `PROCESS`, `OPERATOR`, `MACHINE`, `MACHINE_WORKING`, `MACHINE_ADD_HOURS`, `WORKING_HOURS`, `PROBLEM`, `WASTE_TIME`, `SHIFT`, `USER`, `created_at`, `updated_at`) VALUES
(1, 'BR2-1', 1, 'Bambang Pamungkas', 'Present', 'Straightening', 'ok', 'Straightening Roller', 4.00, 0.00, 0.00, 'No Problem', 0.00, 1, 'admin', '2017-06-06 20:41:26', '2017-06-06 20:41:26'),
(2, 'BR2-1', 2, 'Evandi Dwi K.', 'Present', 'Straightening', 'no', 'Straightening Roller', 4.00, 0.00, 0.00, 'No Problem', 0.00, 1, 'admin', '2017-06-06 20:41:26', '2017-06-06 20:41:26'),
(3, 'BR2-1', 1, 'Bambang Pamungkas', 'Present', 'Blasting & Shop Primer', 'no', 'Straightening Roller', 4.00, 0.00, 0.00, 'No Problem', 0.00, 1, 'admin', '2017-06-08 00:09:05', '2017-06-08 00:09:05'),
(4, 'BR2-1', 2, 'Evandi Dwi K.', 'Present', 'Blasting & Shop Primer', 'ok', 'Straightening Roller', 4.00, 0.00, 0.00, 'No Problem', 0.00, 1, 'admin', '2017-06-08 00:09:05', '2017-06-08 00:09:05'),
(5, 'BR2-2', 1, 'Bambang Pamungkas', 'Present', 'Straightening', 'no', 'Straightening Roller', 0.00, 0.00, 0.00, 'No Problem', 0.00, 1, 'admin', '2017-06-14 22:27:57', '2017-06-14 22:27:57'),
(6, 'BR2-2', 2, 'Evandi Dwi K.', 'Present', 'Straightening', 'no', 'Straightening Roller', 0.00, 0.00, 0.00, 'No Problem', 0.00, 1, 'admin', '2017-06-14 22:27:57', '2017-06-14 22:27:57'),
(7, 'BR2-2', 1, 'Bambang Pamungkas', 'Present', 'Blasting & Shop Primer', 'ok', 'Straightening Roller', 0.00, 0.00, 0.00, 'No Problem', 0.00, 1, 'admin', '2017-06-14 22:29:06', '2017-06-14 22:29:06'),
(8, 'BR2-2', 2, 'Evandi Dwi K.', 'Present', 'Blasting & Shop Primer', 'no', 'Straightening Roller', 0.00, 0.00, 0.00, 'No Problem', 0.00, 1, 'admin', '2017-06-14 22:29:06', '2017-06-14 22:29:06'),
(9, 'BR2-3', 1, 'Bambang Pamungkas', 'Present', 'Straightening', 'no', 'Straightening Roller', 0.00, 0.00, 8.00, 'No Problem', 0.00, 1, 'admin', '2017-06-14 22:35:19', '2017-06-14 22:35:19'),
(10, 'BR2-3', 2, 'Evandi Dwi K.', 'Present', 'Straightening', 'no', 'Straightening Roller', 0.00, 0.00, 0.00, 'No Problem', 0.00, 1, 'admin', '2017-06-14 22:35:19', '2017-06-14 22:35:19'),
(11, 'BR2-3', 1, 'Bambang Pamungkas', 'Present', 'Blasting & Shop Primer', 'ok', 'Straightening Roller', 8.00, 0.00, 8.00, 'No Problem', 0.00, 1, 'admin', '2017-06-14 22:35:39', '2017-06-14 22:35:39'),
(12, 'BR2-3', 2, 'Evandi Dwi K.', 'Present', 'Blasting & Shop Primer', 'no', 'Straightening Roller', 8.00, 0.00, 4.00, 'No Problem', 0.00, 1, 'admin', '2017-06-14 22:35:39', '2017-06-14 22:35:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_assembly`
--

CREATE TABLE `sub_assembly` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ID_PART` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PROGRESS` double(6,2) NOT NULL,
  `ID_WORKER` int(11) NOT NULL,
  `WORKER_NAME` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ATTENDANCE` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PROCESS` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OPERATOR` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MACHINE` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MACHINE_WORKING` double(6,2) NOT NULL,
  `MACHINE_ADD_HOURS` double(6,2) NOT NULL,
  `WORKING_HOURS` double(6,2) NOT NULL DEFAULT '0.00',
  `PROBLEM` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `WASTE_TIME` double(6,2) NOT NULL,
  `SHIFT` int(11) NOT NULL,
  `USER` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `USERNAME` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PASSWORD` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FULL_NAME` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PHONE_NUMBER` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DIVISION` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `POSITION` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NIK` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`USERNAME`, `PASSWORD`, `FULL_NAME`, `PHONE_NUMBER`, `DIVISION`, `POSITION`, `NIK`, `remember_token`, `created_at`, `updated_at`) VALUES
('prasetyon', 'qwe123', 'Prasetyo Nugrohadi', '+6287854444653', 'PPC/Admin', 'Administrator', '5114100070', NULL, '2017-05-13 00:38:03', '2017-05-14 08:32:22'),
('ssh', 'qwe123', 'SSH', '0000000000', 'Steel Stock House', 'Manager', '11111', NULL, '2017-06-03 01:14:08', '2017-06-03 01:14:31'),
('fabrication', 'qwe123', 'FABRICATION', '0000000000', 'Fabrication', 'Manager', '22222', NULL, '2017-06-03 01:14:58', '2017-06-03 01:14:58'),
('subassembly', 'qwe123', 'SUBASSEMBLY', '0000000000', 'Sub Assembly', 'Manager', '33333', NULL, '2017-06-03 01:15:24', '2017-06-03 01:15:24'),
('assembly', 'qwe123', 'ASSEMBLY', '0000000000', 'Assembly', 'Manager', '44444', NULL, '2017-06-03 01:15:44', '2017-06-03 01:16:33'),
('bbs', 'qwe123', 'BBS', '0000000000', 'Block Blasting Structure', 'Manager', '55555', NULL, '2017-06-03 01:16:09', '2017-06-03 01:16:09'),
('erection', 'qwe123', 'ERECTION', '0000000000', 'Erection', 'Manager', '66666', NULL, '2017-06-03 01:16:25', '2017-06-03 01:16:25'),
('panduaudityap', 'kapal', 'Pandu Auditya P', '08123456789', 'PPC/Admin', 'Manager', '4112100075', NULL, '2017-06-06 19:44:14', '2017-06-06 19:44:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `workers`
--

CREATE TABLE `workers` (
  `ID` int(10) UNSIGNED NOT NULL,
  `NAME` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DIVISION` varchar(17) COLLATE utf8mb4_unicode_ci NOT NULL,
  `POSITION` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NIK` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `workers`
--

INSERT INTO `workers` (`ID`, `NAME`, `DIVISION`, `POSITION`, `NIK`, `created_at`, `updated_at`) VALUES
(1, 'Bambang Pamungkas', 'SSH', 'Staf', '21231219', '2017-06-06 20:39:07', '2017-06-06 20:39:07'),
(2, 'Evandi Dwi K.', 'SSH', 'Staf', '21231217', '2017-06-06 20:39:30', '2017-06-06 20:39:30'),
(3, 'Abc', 'Assembly', 'Staf', '123', '2017-06-15 07:44:16', '2017-06-15 07:44:16'),
(4, 'Def', 'Assembly', 'Staf', '456', '2017-06-15 07:44:26', '2017-06-15 07:44:26'),
(5, 'Ghi', 'Assembly', 'Staf', '789', '2017-06-15 07:44:43', '2017-06-15 07:44:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assembly`
--
ALTER TABLE `assembly`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `bbs`
--
ALTER TABLE `bbs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `erections`
--
ALTER TABLE `erections`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `fabrications`
--
ALTER TABLE `fabrications`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `machines`
--
ALTER TABLE `machines`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panels`
--
ALTER TABLE `panels`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_username_index` (`USERNAME`);

--
-- Indexes for table `percentages`
--
ALTER TABLE `percentages`
  ADD KEY `id` (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ship_projects`
--
ALTER TABLE `ship_projects`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ssh`
--
ALTER TABLE `ssh`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sub_assembly`
--
ALTER TABLE `sub_assembly`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assembly`
--
ALTER TABLE `assembly`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `bbs`
--
ALTER TABLE `bbs`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `erections`
--
ALTER TABLE `erections`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fabrications`
--
ALTER TABLE `fabrications`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `machines`
--
ALTER TABLE `machines`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;
--
-- AUTO_INCREMENT for table `panels`
--
ALTER TABLE `panels`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ship_projects`
--
ALTER TABLE `ship_projects`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ssh`
--
ALTER TABLE `ssh`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `sub_assembly`
--
ALTER TABLE `sub_assembly`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

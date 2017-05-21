-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2017 at 08:58 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoring_workshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `assembly`
--

CREATE TABLE `assembly` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ID_PANEL` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PROGRESS` double NOT NULL,
  `ID_WORKER` int(11) NOT NULL,
  `WORKER_NAME` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ATTENDANCE` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PROCESS` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OPERATOR` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MACHINE` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MACHINE_WORKING` double(6,2) NOT NULL,
  `MACHINE_ADD_HOURS` double(6,2) NOT NULL,
  `PROBLEM` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `WASTE_TIME` double(6,2) NOT NULL,
  `SHIFT` int(11) NOT NULL,
  `USER` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assembly`
--

INSERT INTO `assembly` (`ID`, `ID_PANEL`, `PROGRESS`, `ID_WORKER`, `WORKER_NAME`, `ATTENDANCE`, `PROCESS`, `OPERATOR`, `MACHINE`, `MACHINE_WORKING`, `MACHINE_ADD_HOURS`, `PROBLEM`, `WASTE_TIME`, `SHIFT`, `USER`, `created_at`, `updated_at`) VALUES
(1, '1', 35, 16, 'Worker Assembly 1', 'Present', 'Fitting', 'no', 'MACHINE FITTING 002', 7.00, 0.00, 'No Problem', 0.00, 1, 'admin', '2017-05-20 23:21:43', '2017-05-20 23:21:43'),
(2, '1', 35, 17, 'Worker Assembly 2', 'Present', 'Fitting', 'ok', 'MACHINE FITTING 002', 7.00, 0.00, 'No Problem', 0.00, 1, 'admin', '2017-05-20 23:21:43', '2017-05-20 23:21:43'),
(3, '1', 35, 18, 'Worker Assembly 3', 'Present', 'Fitting', 'no', 'MACHINE FITTING 002', 7.00, 0.00, 'No Problem', 0.00, 1, 'admin', '2017-05-20 23:21:43', '2017-05-20 23:21:43'),
(4, '1', 35, 19, 'Worker Assembly 4', 'Was Sick/Accident', 'Fitting', 'no', 'MACHINE FITTING 002', 7.00, 0.00, 'No Problem', 0.00, 1, 'admin', '2017-05-20 23:21:43', '2017-05-20 23:21:43'),
(5, '1', 35, 20, 'Worker Assembly 5', 'Was Sick/Accident', 'Fitting', 'no', 'MACHINE FITTING 002', 7.00, 0.00, 'No Problem', 0.00, 1, 'admin', '2017-05-20 23:21:43', '2017-05-20 23:21:43');

-- --------------------------------------------------------

--
-- Table structure for table `bbs`
--

CREATE TABLE `bbs` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ID_BLOCK` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_WORKER` int(11) NOT NULL,
  `WORKER_NAME` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ATTENDANCE` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PROCESS` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PROBLEM` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `WASTE_TIME` double(6,2) NOT NULL,
  `SHIFT` int(11) NOT NULL,
  `USER` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
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
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`ID`, `ID_PROJECT`, `PROJECT_NAME`, `NAME`, `MATERIAL`, `MATERIAL_COMING`, `PART`, `PART_COMING`, `PANEL`, `PANEL_DONE`, `LOADING`, `LOADING_DATE`, `ADJUSTING`, `ADJUSTING_DATE`, `FITTING`, `FITTING_DATE`, `WELDING`, `WELDING_LENGTH`, `WELDING_FINISH`, `WELDING_DATE`, `ERECTION_START`, `ERECTION_FINISH`, `created_at`, `updated_at`) VALUES
(1, 2, 'SSV 293', 'NV1', 5749.69, 0.00, 1909.00, 0.00, 1, 0, 0.00, NULL, 0.00, NULL, 0.00, NULL, 0.00, 0.00, 0.00, NULL, NULL, NULL, '2017-04-19 17:31:42', '2017-05-13 00:29:52'),
(3, 2, 'SSV 293', 'DH', 9999.99, 0.00, 0.00, 0.00, 0, 0, 0.00, NULL, 0.00, NULL, 0.00, NULL, 0.00, 0.00, 0.00, NULL, NULL, NULL, '2017-04-22 16:02:04', '2017-04-22 16:13:01'),
(4, 2, 'SSV 293', 'FU-(P/S)', 9999.99, 0.00, 0.00, 0.00, 0, 0, 0.00, NULL, 0.00, NULL, 0.00, NULL, 0.00, 0.00, 0.00, NULL, NULL, NULL, '2017-04-22 16:15:20', '2017-04-22 16:26:45'),
(5, 2, 'SSV 293', 'RD-(P/S)', 7614.00, 0.00, 0.00, 0.00, 0, 0, 0.00, NULL, 0.00, NULL, 0.00, NULL, 0.00, 0.00, 0.00, NULL, NULL, NULL, '2017-04-22 16:29:55', '2017-04-22 16:35:39'),
(6, 2, 'SSV 293', 'BR2-(P/S)', 9999.99, 0.00, 0.00, 0.00, 0, 0, 0.00, NULL, 0.00, NULL, 0.00, NULL, 0.00, 0.00, 0.00, NULL, NULL, NULL, '2017-04-22 17:01:55', '2017-04-22 17:48:48');

-- --------------------------------------------------------

--
-- Table structure for table `erections`
--

CREATE TABLE `erections` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ID_BLOCK` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_WORKER` int(11) NOT NULL,
  `WORKER_NAME` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ATTENDANCE` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PROBLEM` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `WASTE_TIME` double(6,2) NOT NULL,
  `SHIFT` int(11) NOT NULL,
  `USER` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fabrications`
--

CREATE TABLE `fabrications` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ID_MATERIAL` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_WORKER` int(11) NOT NULL,
  `WORKER_NAME` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ATTENDANCE` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PROCESS` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OPERATOR` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MACHINE` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MACHINE_WORKING` double(6,2) NOT NULL,
  `MACHINE_ADD_HOURS` double(6,2) NOT NULL,
  `PROBLEM` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `WASTE_TIME` double(6,2) NOT NULL,
  `SHIFT` int(11) NOT NULL,
  `USER` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fabrications`
--

INSERT INTO `fabrications` (`ID`, `ID_MATERIAL`, `ID_WORKER`, `WORKER_NAME`, `ATTENDANCE`, `PROCESS`, `OPERATOR`, `MACHINE`, `MACHINE_WORKING`, `MACHINE_ADD_HOURS`, `PROBLEM`, `WASTE_TIME`, `SHIFT`, `USER`, `created_at`, `updated_at`) VALUES
(1, 'BR2-1', 6, 'Worker Fabrication 1', 'Present', 'Marking', 'ok', 'MACHINE MARKING 001', 6.00, 0.00, 'No Problem', 0.00, 1, 'admin', '2017-05-20 06:56:17', '2017-05-20 06:56:17'),
(2, 'BR2-1', 7, 'Worker Fabrication 2', 'Present', 'Marking', 'no', 'MACHINE MARKING 001', 6.00, 0.00, 'No Problem', 0.00, 1, 'admin', '2017-05-20 06:56:17', '2017-05-20 06:56:17'),
(3, 'BR2-1', 8, 'Worker Fabrication 3', 'Was Sick/Accident', 'Marking', 'no', 'MACHINE MARKING 001', 6.00, 0.00, 'No Problem', 0.00, 1, 'admin', '2017-05-20 06:56:17', '2017-05-20 06:56:17'),
(4, 'BR2-1', 9, 'Worker Fabrication 4', 'Was Absent', 'Marking', 'no', 'MACHINE MARKING 001', 6.00, 0.00, 'No Problem', 0.00, 1, 'admin', '2017-05-20 06:56:17', '2017-05-20 06:56:17'),
(5, 'BR2-1', 10, 'Worker Fabrication 5', 'Was Absent', 'Marking', 'no', 'MACHINE MARKING 001', 6.00, 0.00, 'No Problem', 0.00, 1, 'admin', '2017-05-20 06:56:17', '2017-05-20 06:56:17');

-- --------------------------------------------------------

--
-- Table structure for table `machines`
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
-- Dumping data for table `machines`
--

INSERT INTO `machines` (`ID`, `NAME`, `ACTIVITY`, `WORKSHOP`, `OPERATIONAL_HOUR`, `CAPACITY`, `created_at`, `updated_at`) VALUES
(1, 'MACHINE STR 001', 'Straightening', 'SSH', 10, 500, NULL, '2017-05-14 08:22:23'),
(2, 'MACHINE STR 002', 'Straightening', 'SSH', 15, 1500, NULL, NULL),
(3, 'MACHINE BLAST 001', 'Blasting', 'SSH', 15, 1500, NULL, NULL),
(4, 'MACHINE BLAST 002', 'Blasting', 'SSH', 13, 3500, NULL, NULL),
(5, 'MACHINE MARKING 001', 'Marking', 'Fabrication', 11, 3500, NULL, NULL),
(6, 'MACHINE MARKING 002', 'Marking', 'Fabrication', 9, 5500, NULL, NULL),
(7, 'MACHINE CUTTING 001', 'Cutting', 'Fabrication', 9, 5500, NULL, NULL),
(8, 'MACHINE CUTTING 002', 'Cutting', 'Fabrication', 10, 7500, NULL, NULL),
(9, 'MACHINE BLENDING 001', 'Bending', 'Fabrication', 9, 5500, NULL, NULL),
(10, 'MACHINE BLENDING 002', 'Bending', 'Fabrication', 10, 7500, NULL, NULL),
(11, 'MACHINE FITTING 001', 'Fitting', 'Sub Assembly', 10, 7500, NULL, NULL),
(12, 'MACHINE WELDING 001', 'Welding', 'Sub Assembly', 10, 7500, NULL, NULL),
(13, 'MACHINE GRINDING 001', 'Grindng', 'Sub Assembly', 10, 7500, NULL, NULL),
(14, 'MACHINE FAIRING 001', 'Fairing', 'Sub Assembly', 10, 7500, NULL, NULL),
(15, 'MACHINE FITTING 002', 'Fitting', 'Assembly', 10, 7500, NULL, NULL),
(16, 'MACHINE WELDING 002', 'Welding', 'Assembly', 10, 7500, NULL, NULL),
(17, 'MACHINE GRINDING 002', 'Grindng', 'Assembly', 10, 7500, NULL, NULL),
(18, 'MACHINE FAIRING 002', 'Fairing', 'Assembly', 10, 7500, NULL, NULL),
(19, 'MACHINE BLAST 001', 'Blasting', 'BBS', 15, 1500, NULL, NULL),
(20, 'MACHINE PAINTING 001', 'Painting', 'BBS', 15, 1500, NULL, NULL),
(21, 'MACHINE LOADING 003', 'Loading', 'Erection', 10, 7500, NULL, NULL),
(22, 'MACHINE ADJUSTING 003', 'Adjusting', 'Erection', 10, 7500, NULL, NULL),
(23, 'MACHINE FITTING 003', 'Fitting', 'Erection', 10, 7500, NULL, NULL),
(24, 'MACHINE WELDING 003', 'Welding', 'Erection', 10, 7500, NULL, NULL);

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
(167, '2017_05_16_071224_create_s_s_hs_table', 2),
(168, '2017_05_16_071314_create_fabrications_table', 2),
(169, '2017_05_16_071325_create_sub_assemblies_table', 2),
(170, '2017_05_16_071332_create_assemblies_table', 2),
(171, '2017_05_16_071343_create_b_b_s_table', 2),
(172, '2017_05_16_071517_create_erections_table', 2),
(173, '2017_05_16_082438_create_rooms_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `panels`
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
-- Dumping data for table `panels`
--

INSERT INTO `panels` (`ID`, `ID_PROJECT`, `PROJECT_NAME`, `ID_BLOCK`, `BLOCK_NAME`, `NAME`, `PART`, `PART_COMING`, `PART_DONE`, `FITTING`, `FITTING_DATE`, `FITTING_MACHINE`, `WELDING`, `WELDING_DATE`, `WELDING_MACHINE`, `GRINDING`, `GRINDING_DATE`, `GRINDING_MACHINE`, `FAIRING`, `FAIRING_DATE`, `FAIRING_MACHINE`, `created_at`, `updated_at`) VALUES
(1, 2, 'SSV 293', 1, 'NV1', '201', 1909.00, 0.00, 0.00, 0.35, '2017-05-21', NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, '2017-04-19 17:45:54', '2017-05-20 23:21:43');

-- --------------------------------------------------------

--
-- Table structure for table `parts`
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
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`ID`, `ID_PROJECT`, `PROJECT_NAME`, `ID_BLOCK`, `BLOCK_NAME`, `ID_PANEL`, `PANEL_NAME`, `NAME`, `LENGTH`, `BREADTH`, `THICKNESS`, `PORT`, `CENTER`, `STARBOARD`, `WEIGHT`, `STAGE`, `DATE_COMING`, `FITTING`, `FITTING_DATE`, `FITTING_MACHINE`, `WELDING`, `WELDING_DATE`, `WELDING_MACHINE`, `GRINDING`, `GRINDING_DATE`, `GRINDING_MACHINE`, `FAIRING`, `FAIRING_DATE`, `FAIRING_MACHINE`, `created_at`, `updated_at`) VALUES
('201-1', 2, 'SSV 293', 1, 'NV1', 1, '201', 'P101', 0.00, 0.00, 7.00, 0.00, 1.00, 0.00, 972.62, 'A', NULL, 0.40, '2017-05-21', NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, NULL, '2017-05-20 21:11:14'),
('201-2', 2, 'SSV 293', 1, 'NV1', 1, '201', 'P102', 0.00, 0.00, 7.00, 0.00, 0.00, 1.00, 583.57, 'A', NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, NULL, NULL),
('201-9', 2, 'SSV 293', 1, 'NV1', 1, '201', 'S201 (L)', 75.00, 75.00, 6.00, 6.00, 0.00, 6.00, 352.30, 'A', NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `USERNAME` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plates`
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
  `BLASTING` int(11) NOT NULL DEFAULT '0',
  `BLASTING_DATE` date DEFAULT NULL,
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
-- Dumping data for table `plates`
--

INSERT INTO `plates` (`ID`, `ID_PROJECT`, `PROJECT_NAME`, `ID_BLOCK`, `BLOCK_NAME`, `LENGTH`, `BREADTH`, `THICKNESS`, `PORT`, `CENTER`, `STARBOARD`, `WEIGHT`, `DATE_COMING`, `STRAIGHTENING`, `STRAIGHTENING_DATE`, `BLASTING`, `BLASTING_DATE`, `MARKING`, `MARKING_DATE`, `MARKING_MACHINE`, `CUTTING`, `CUTTING_DATE`, `CUTTING_MACHINE`, `BLENDING`, `BLENDING_DATE`, `BLENDING_MACHINE`, `created_at`, `updated_at`) VALUES
('BR2-1', 2, 'SSV 293', 6, 'BR2-(P/S)', 12192.00, 1829.00, 6.00, 1.00, 0.00, 1.00, 2100.58, '2017-05-04', 1, '2017-05-20', 0, NULL, 1, '2017-05-20', NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 17:09:42', '2017-05-20 06:56:32'),
('BR2-10', 2, 'SSV 293', 6, 'BR2-(P/S)', 12192.00, 1524.00, 6.00, 1.00, 0.00, 0.00, 875.15, '2017-05-04', 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 17:19:13', '2017-05-03 22:07:09'),
('BR2-11', 2, 'SSV 293', 6, 'BR2-(P/S)', 12192.00, 1524.00, 6.00, 1.00, 0.00, 0.00, 875.15, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 17:19:42', '2017-04-22 17:19:42'),
('BR2-12', 2, 'SSV 293', 6, 'BR2-(P/S)', 9144.00, 1524.00, 6.00, 1.00, 0.00, 0.00, 656.36, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 17:21:11', '2017-04-22 17:21:11'),
('BR2-13', 2, 'SSV 293', 6, 'BR2-(P/S)', 9144.00, 1524.00, 6.00, 1.00, 0.00, 0.00, 656.36, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 17:25:49', '2017-04-22 17:25:49'),
('BR2-14', 2, 'SSV 293', 6, 'BR2-(P/S)', 12192.00, 1829.00, 6.00, 1.00, 0.00, 0.00, 1050.29, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 17:26:35', '2017-04-22 17:26:35'),
('BR2-15', 2, 'SSV 293', 6, 'BR2-(P/S)', 12192.00, 1829.00, 6.00, 1.00, 0.00, 0.00, 1050.29, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 17:27:09', '2017-04-22 17:27:09'),
('BR2-16', 2, 'SSV 293', 6, 'BR2-(P/S)', 12192.00, 1829.00, 6.00, 1.00, 0.00, 0.00, 1050.29, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 17:27:46', '2017-04-22 17:27:46'),
('BR2-17', 2, 'SSV 293', 6, 'BR2-(P/S)', 12192.00, 1524.00, 7.00, 1.00, 0.00, 0.00, 1021.00, '2017-05-04', 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 17:28:22', '2017-05-03 22:07:11'),
('BR2-18', 2, 'SSV 293', 6, 'BR2-(P/S)', 12192.00, 1524.00, 7.00, 1.00, 0.00, 0.00, 1021.00, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 17:29:03', '2017-04-22 17:29:03'),
('BR2-19', 2, 'SSV 293', 6, 'BR2-(P/S)', 12192.00, 1829.00, 7.00, 1.00, 0.00, 1.00, 2450.68, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 17:29:41', '2017-04-22 17:29:41'),
('BR2-2', 2, 'SSV 293', 6, 'BR2-(P/S)', 12192.00, 1524.00, 6.00, 1.00, 0.00, 1.00, 1750.29, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 17:10:43', '2017-04-22 17:10:43'),
('BR2-20', 2, 'SSV 293', 6, 'BR2-(P/S)', 12192.00, 1829.00, 7.00, 1.00, 0.00, 1.00, 2450.68, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 17:30:48', '2017-04-22 17:30:48'),
('BR2-21', 2, 'SSV 293', 6, 'BR2-(P/S)', 12192.00, 1829.00, 7.00, 1.00, 0.00, 0.00, 1225.34, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 17:44:31', '2017-04-22 17:44:31'),
('BR2-22', 2, 'SSV 293', 6, 'BR2-(P/S)', 12192.00, 1829.00, 7.00, 1.00, 0.00, 0.00, 1225.34, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 17:45:14', '2017-04-22 17:45:14'),
('BR2-23', 2, 'SSV 293', 6, 'BR2-(P/S)', 12192.00, 1829.00, 7.00, 1.00, 0.00, 0.00, 1225.34, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 17:45:42', '2017-04-22 17:45:42'),
('BR2-24', 2, 'SSV 293', 6, 'BR2-(P/S)', 12192.00, 1829.00, 7.00, 1.00, 0.00, 0.00, 1225.34, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 17:46:09', '2017-04-22 17:46:09'),
('BR2-25', 2, 'SSV 293', 6, 'BR2-(P/S)', 12192.00, 1829.00, 7.00, 1.00, 0.00, 0.00, 1225.34, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 17:46:41', '2017-04-22 17:46:41'),
('BR2-26', 2, 'SSV 293', 6, 'BR2-(P/S)', 12192.00, 1829.00, 7.00, 1.00, 0.00, 0.00, 1225.34, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 17:47:15', '2017-04-22 17:47:15'),
('BR2-27', 2, 'SSV 293', 6, 'BR2-(P/S)', 12192.00, 1829.00, 8.00, 1.00, 0.00, 0.00, 1400.39, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 17:47:55', '2017-04-22 17:47:55'),
('BR2-28', 2, 'SSV 293', 6, 'BR2-(P/S)', 12192.00, 1829.00, 8.00, 1.00, 0.00, 0.00, 1400.39, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 17:48:48', '2017-04-22 17:48:48'),
('BR2-3', 2, 'SSV 293', 6, 'BR2-(P/S)', 12192.00, 1524.00, 6.00, 1.00, 0.00, 0.00, 875.15, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 17:11:21', '2017-04-22 17:11:21'),
('BR2-4', 2, 'SSV 293', 6, 'BR2-(P/S)', 12192.00, 1829.00, 6.00, 1.00, 0.00, 1.00, 2100.58, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 17:12:02', '2017-04-22 17:12:02'),
('BR2-5', 2, 'SSV 293', 6, 'BR2-(P/S)', 12192.00, 1524.00, 6.00, 1.00, 0.00, 1.00, 1750.29, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 17:13:03', '2017-04-22 17:13:03'),
('BR2-6', 2, 'SSV 293', 6, 'BR2-(P/S)', 12192.00, 1524.00, 6.00, 1.00, 0.00, 1.00, 1750.29, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 17:13:51', '2017-04-22 17:13:51'),
('BR2-7', 2, 'SSV 293', 6, 'BR2-(P/S)', 12192.00, 1524.00, 6.00, 1.00, 0.00, 1.00, 1750.29, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 17:14:38', '2017-04-22 17:14:38'),
('BR2-8', 2, 'SSV 293', 6, 'BR2-(P/S)', 12192.00, 1524.00, 6.00, 1.00, 0.00, 0.00, 875.15, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 17:15:28', '2017-04-22 17:15:28'),
('BR2-9', 2, 'SSV 293', 6, 'BR2-(P/S)', 9144.00, 1829.00, 6.00, 1.00, 0.00, 0.00, 787.72, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 17:18:34', '2017-04-22 17:18:34'),
('DH-1', 2, 'SSV 293', 3, 'DH', 9144.00, 1524.00, 6.00, 1.00, 0.00, 1.00, 1312.72, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 16:03:16', '2017-04-22 16:03:16'),
('DH-10', 2, 'SSV 293', 3, 'DH', 9144.00, 1524.00, 8.00, 1.00, 0.00, 0.00, 875.15, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 16:11:39', '2017-04-22 16:11:39'),
('DH-11', 2, 'SSV 293', 3, 'DH', 850.00, 1524.00, 10.00, 1.00, 0.00, 0.00, 101.69, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 16:13:01', '2017-04-22 16:13:01'),
('DH-2', 2, 'SSV 293', 3, 'DH', 9144.00, 1524.00, 6.00, 1.00, 0.00, 1.00, 1312.72, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 16:04:14', '2017-04-22 16:04:14'),
('DH-3', 2, 'SSV 293', 3, 'DH', 12192.00, 1829.00, 6.00, 1.00, 0.00, 0.00, 1050.29, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 16:05:20', '2017-04-22 16:05:20'),
('DH-4', 2, 'SSV 293', 3, 'DH', 9144.00, 1829.00, 6.00, 1.00, 0.00, 0.00, 787.72, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 16:06:11', '2017-04-22 16:06:11'),
('DH-5', 2, 'SSV 293', 3, 'DH', 9144.00, 1829.00, 6.00, 1.00, 0.00, 0.00, 787.72, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 16:07:12', '2017-04-22 16:07:12'),
('DH-6', 2, 'SSV 293', 3, 'DH', 9144.00, 1829.00, 6.00, 1.00, 0.00, 0.00, 787.72, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 16:07:59', '2017-04-22 16:07:59'),
('DH-7', 2, 'SSV 293', 3, 'DH', 9144.00, 1524.00, 7.00, 1.00, 0.00, 0.00, 765.75, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 16:09:15', '2017-04-22 16:09:15'),
('DH-8', 2, 'SSV 293', 3, 'DH', 9144.00, 1524.00, 7.00, 1.00, 0.00, 1.00, 1531.51, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 16:10:17', '2017-04-22 16:10:17'),
('DH-9', 2, 'SSV 293', 3, 'DH', 9144.00, 1524.00, 7.00, 1.00, 0.00, 0.00, 765.75, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 16:11:02', '2017-04-22 16:11:02'),
('FU-1', 2, 'SSV 293', 4, 'FU-(P/S)', 9144.00, 1524.00, 7.00, 1.00, 0.00, 1.00, 1531.51, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 16:16:59', '2017-04-22 16:16:59'),
('FU-2', 2, 'SSV 293', 4, 'FU-(P/S)', 12192.00, 1524.00, 7.00, 1.00, 0.00, 1.00, 2042.01, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 16:20:27', '2017-04-22 16:20:27'),
('FU-3', 2, 'SSV 293', 4, 'FU-(P/S)', 12192.00, 1524.00, 7.00, 1.00, 0.00, 1.00, 2042.01, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 16:21:20', '2017-04-22 16:21:20'),
('FU-4', 2, 'SSV 293', 4, 'FU-(P/S)', 12192.00, 1829.00, 7.00, 1.00, 0.00, 1.00, 2450.68, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 16:22:04', '2017-04-22 16:22:04'),
('FU-5', 2, 'SSV 293', 4, 'FU-(P/S)', 12192.00, 1524.00, 7.00, 1.00, 0.00, 1.00, 2042.01, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 16:22:53', '2017-04-22 16:22:53'),
('FU-6', 2, 'SSV 293', 4, 'FU-(P/S)', 9144.00, 1524.00, 7.00, 1.00, 0.00, 0.00, 765.75, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 16:23:36', '2017-04-22 16:23:36'),
('FU-7', 2, 'SSV 293', 4, 'FU-(P/S)', 9144.00, 1524.00, 7.00, 1.00, 0.00, 0.00, 765.75, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 16:25:52', '2017-04-22 16:25:52'),
('FU-8', 2, 'SSV 293', 4, 'FU-(P/S)', 12192.00, 1524.00, 7.00, 1.00, 0.00, 1.00, 2042.01, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 16:26:45', '2017-04-22 16:26:45'),
('NV1-1', 2, 'SSV 293', 1, 'NV1', 12192.00, 1524.00, 6.00, 0.00, 1.00, 0.00, 875.15, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-19 18:05:35', '2017-04-19 18:05:35'),
('NV1-10', 2, 'SSV 293', 1, 'NV1', 12192.00, 1524.00, 6.00, 0.00, 1.00, 0.00, 875.15, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 15:46:17', '2017-04-22 15:46:17'),
('NV1-11', 2, 'SSV 293', 1, 'NV1', 12192.00, 1524.00, 6.00, 0.00, 1.00, 0.00, 875.15, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 15:47:39', '2017-04-22 15:47:39'),
('NV1-12', 2, 'SSV 293', 1, 'NV1', 12192.00, 1524.00, 6.00, 0.00, 1.00, 0.00, 875.15, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 15:48:07', '2017-04-22 15:48:07'),
('NV1-13', 2, 'SSV 293', 1, 'NV1', 12192.00, 1524.00, 6.00, 0.00, 1.00, 0.00, 875.15, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 15:48:36', '2017-04-22 15:48:36'),
('NV1-14', 2, 'SSV 293', 1, 'NV1', 12192.00, 1524.00, 6.00, 0.00, 1.00, 0.00, 875.15, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 15:49:16', '2017-04-22 15:49:16'),
('NV1-15', 2, 'SSV 293', 1, 'NV1', 12192.00, 1524.00, 6.00, 0.00, 1.00, 0.00, 875.15, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 15:49:45', '2017-04-22 15:49:45'),
('NV1-16', 2, 'SSV 293', 1, 'NV1', 12192.00, 1524.00, 7.00, 0.00, 1.00, 0.00, 1021.00, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 15:50:59', '2017-04-22 15:50:59'),
('NV1-17', 2, 'SSV 293', 1, 'NV1', 12192.00, 1524.00, 7.00, 0.00, 1.00, 0.00, 1021.00, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 15:51:46', '2017-04-22 15:51:46'),
('NV1-19', 2, 'SSV 293', 1, 'NV1', 12192.00, 1524.00, 7.00, 0.00, 1.00, 0.00, 1021.00, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 15:55:33', '2017-04-22 15:55:33'),
('NV1-2', 2, 'SSV 293', 1, 'NV1', 12192.00, 1524.00, 6.00, 0.00, 1.00, 0.00, 875.15, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 15:22:15', '2017-04-22 15:22:15'),
('NV1-20', 2, 'SSV 293', 1, 'NV1', 12192.00, 1829.00, 7.00, 0.00, 1.00, 0.00, 1225.34, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 15:56:26', '2017-04-22 15:56:26'),
('NV1-21', 2, 'SSV 293', 1, 'NV1', 12192.00, 1829.00, 7.00, 0.00, 1.00, 0.00, 1225.34, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 15:57:37', '2017-04-22 15:57:37'),
('NV1-22', 2, 'SSV 293', 1, 'NV1', 12192.00, 1829.00, 7.00, 0.00, 1.00, 0.00, 1225.34, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 15:58:14', '2017-04-22 15:58:14'),
('NV1-23', 2, 'SSV 293', 1, 'NV1', 12192.00, 1829.00, 7.00, 0.00, 1.00, 0.00, 1225.34, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 15:59:30', '2017-04-22 15:59:30'),
('NV1-24', 2, 'SSV 293', 1, 'NV1', 550.00, 1524.00, 8.00, 0.00, 1.00, 0.00, 52.64, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 16:00:27', '2017-04-22 16:00:27'),
('NV1-3', 2, 'SSV 293', 1, 'NV1', 12192.00, 1524.00, 6.00, 0.00, 1.00, 0.00, 875.15, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 15:22:58', '2017-04-22 15:22:58'),
('NV1-4', 2, 'SSV 293', 1, 'NV1', 12192.00, 1524.00, 6.00, 0.00, 1.00, 0.00, 875.15, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 15:23:38', '2017-04-22 15:23:38'),
('NV1-5', 2, 'SSV 293', 1, 'NV1', 12192.00, 1524.00, 6.00, 0.00, 1.00, 0.00, 875.15, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 15:24:18', '2017-04-22 15:24:18'),
('NV1-6', 2, 'SSV 293', 1, 'NV1', 12192.00, 1524.00, 6.00, 0.00, 1.00, 0.00, 875.15, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 15:30:05', '2017-04-22 15:30:05'),
('NV1-7', 2, 'SSV 293', 1, 'NV1', 12192.00, 1524.00, 6.00, 0.00, 1.00, 0.00, 875.15, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 15:31:37', '2017-04-22 15:31:37'),
('NV1-8', 2, 'SSV 293', 1, 'NV1', 12192.00, 1524.00, 6.00, 0.00, 1.00, 0.00, 875.15, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 15:32:15', '2017-04-22 15:32:15'),
('NV1-9', 2, 'SSV 293', 1, 'NV1', 12192.00, 1524.00, 6.00, 0.00, 1.00, 0.00, 875.15, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 15:45:43', '2017-04-22 15:45:43'),
('RD-1', 2, 'SSV 293', 5, 'RD-(P/S)', 9144.00, 1829.00, 14.00, 1.00, 0.00, 1.00, 3676.02, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 16:32:02', '2017-04-22 16:32:02'),
('RD-2', 2, 'SSV 293', 5, 'RD-(P/S)', 9144.00, 1524.00, 16.00, 1.00, 0.00, 0.00, 1750.29, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 16:34:35', '2017-04-22 16:34:35'),
('RD-3', 2, 'SSV 293', 5, 'RD-(P/S)', 9144.00, 1524.00, 20.00, 1.00, 0.00, 0.00, 2187.87, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-04-22 16:35:39', '2017-04-22 16:35:39');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
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
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`ID`, `ID_PROJECT`, `PROJECT_NAME`, `ID_BLOCK`, `BLOCK_NAME`, `LENGTH`, `BREADTH`, `THICKNESS`, `HEIGHT`, `PORT`, `CENTER`, `STARBOARD`, `WEIGHT`, `FORM`, `DATE_COMING`, `created_at`, `updated_at`) VALUES
('NV1-PRO1', 2, 'SSV 293', 1, 'NV1', 16460.00, 1515.00, 6.00, 6.00, 1.00, 1.00, 0.00, 2500.00, 'L', NULL, '2017-05-10 00:30:24', '2017-05-10 00:30:24'),
('NV1-PRO1', 2, 'SSV 293', 1, 'NV1', 16460.00, 1515.00, 6.00, 6.00, 1.00, 1.00, 0.00, 2500.00, 'L', NULL, '2017-05-10 00:31:22', '2017-05-10 00:31:22');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
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
  `PAINT_NEEDS` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`ID`, `ID_PROJECT`, `PROJECT_NAME`, `ID_BLOCK`, `BLOCK_NAME`, `ROOM`, `SIDE`, `FRAME`, `DECK`, `AREA`, `TOTAL_LAYER`, `PAINT_TYPE`, `PAINT_NEEDS`, `created_at`, `updated_at`) VALUES
(1, 2, 'SSV 293', 1, 'NV 1', 'A', 'B', 'C', 'D', 13333, 12, 'ABC', 151.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ship_projects`
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
-- Dumping data for table `ship_projects`
--

INSERT INTO `ship_projects` (`ID`, `PROJECT_NAME`, `OWNER`, `SHIP_TYPE`, `LWL`, `LPP`, `BREADTH`, `DEPTH`, `DRAFT`, `DISPLACEMENT`, `DESIGNED_SPEED`, `MATERIAL`, `MATERIAL_COMING`, `PART`, `PART_COMING`, `PANEL`, `PANEL_DONE`, `BLOCK`, `BLOCK_DONE`, `START`, `FINISH`, `FINISHED`, `created_at`, `updated_at`) VALUES
(1, 'Tanker Pertamina', 'PT Pertamina Persero', 'Tanker', 250.00, 75.00, 250.00, 64.00, 350.00, 2500.00, 75.00, 25.00, 0.00, 0.00, 0.00, -1, 0, -1, 0, '2017-04-20', '2017-06-30', NULL, '2017-04-19 16:59:55', '2017-05-16 00:57:18'),
(2, 'SSV 293', 'Philippines Government', 'Development of LPD', 114.64, 107.49, 21.80, 11.30, 5.00, 4516.00, 16.00, 3249.69, 0.00, 1909.00, 0.00, 1, 0, 0, 0, '2015-08-05', '2016-09-05', NULL, '2017-04-19 17:26:31', '2017-05-13 00:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `ssh`
--

CREATE TABLE `ssh` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ID_MATERIAL` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_WORKER` int(11) NOT NULL,
  `WORKER_NAME` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ATTENDANCE` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PROCESS` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OPERATOR` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MACHINE` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MACHINE_WORKING` double(6,2) NOT NULL,
  `MACHINE_ADD_HOURS` double(6,2) NOT NULL,
  `PROBLEM` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `WASTE_TIME` double(6,2) NOT NULL,
  `SHIFT` int(11) NOT NULL,
  `USER` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ssh`
--

INSERT INTO `ssh` (`ID`, `ID_MATERIAL`, `ID_WORKER`, `WORKER_NAME`, `ATTENDANCE`, `PROCESS`, `OPERATOR`, `MACHINE`, `MACHINE_WORKING`, `MACHINE_ADD_HOURS`, `PROBLEM`, `WASTE_TIME`, `SHIFT`, `USER`, `created_at`, `updated_at`) VALUES
(16, 'BR2-1', 1, 'Worker SSH 1', 'Present', 'Straightening', 'ok', 'MACHINE STR 001', 7.00, 0.00, 'No Problem', 0.00, 1, 'admin', '2017-05-20 05:58:38', '2017-05-20 05:58:38'),
(17, 'BR2-1', 2, 'Worker SSH 2', 'Present', 'Straightening', 'no', 'MACHINE STR 001', 7.00, 0.00, 'No Problem', 0.00, 1, 'admin', '2017-05-20 05:58:38', '2017-05-20 05:58:38'),
(18, 'BR2-1', 3, 'Worker SSH 3', 'Present', 'Straightening', 'no', 'MACHINE STR 001', 7.00, 0.00, 'No Problem', 0.00, 1, 'admin', '2017-05-20 05:58:38', '2017-05-20 05:58:38'),
(19, 'BR2-1', 4, 'Worker SSH 4', 'Was Sick/Accident', 'Straightening', 'no', 'MACHINE STR 001', 7.00, 0.00, 'No Problem', 0.00, 1, 'admin', '2017-05-20 05:58:38', '2017-05-20 05:58:38'),
(20, 'BR2-1', 5, 'Worker SSH 5', 'Was Absent', 'Straightening', 'no', 'MACHINE STR 001', 7.00, 0.00, 'No Problem', 0.00, 1, 'admin', '2017-05-20 05:58:38', '2017-05-20 05:58:38');

-- --------------------------------------------------------

--
-- Table structure for table `sub_assembly`
--

CREATE TABLE `sub_assembly` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ID_PART` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PROGRESS` double NOT NULL,
  `ID_WORKER` int(11) NOT NULL,
  `WORKER_NAME` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ATTENDANCE` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PROCESS` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OPERATOR` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MACHINE` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MACHINE_WORKING` double(6,2) NOT NULL,
  `MACHINE_ADD_HOURS` double(6,2) NOT NULL,
  `PROBLEM` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `WASTE_TIME` double(6,2) NOT NULL,
  `SHIFT` int(11) NOT NULL,
  `USER` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_assembly`
--

INSERT INTO `sub_assembly` (`ID`, `ID_PART`, `PROGRESS`, `ID_WORKER`, `WORKER_NAME`, `ATTENDANCE`, `PROCESS`, `OPERATOR`, `MACHINE`, `MACHINE_WORKING`, `MACHINE_ADD_HOURS`, `PROBLEM`, `WASTE_TIME`, `SHIFT`, `USER`, `created_at`, `updated_at`) VALUES
(1, '201-1', 40, 11, 'Worker Sub Assembly 1', 'Present', 'Fitting', 'no', 'MACHINE FITTING 001', 7.00, 0.00, 'No Problem', 0.00, 1, 'admin', '2017-05-20 21:11:14', '2017-05-20 21:11:14'),
(2, '201-1', 40, 12, 'Worker Sub Assembly 2', 'Present', 'Fitting', 'no', 'MACHINE FITTING 001', 7.00, 0.00, 'No Problem', 0.00, 1, 'admin', '2017-05-20 21:11:14', '2017-05-20 21:11:14'),
(3, '201-1', 40, 13, 'Worker Sub Assembly 3', 'Present', 'Fitting', 'no', 'MACHINE FITTING 001', 7.00, 0.00, 'No Problem', 0.00, 1, 'admin', '2017-05-20 21:11:14', '2017-05-20 21:11:14'),
(4, '201-1', 40, 14, 'Worker Sub Assembly 4', 'Present', 'Fitting', 'no', 'MACHINE FITTING 001', 7.00, 0.00, 'No Problem', 0.00, 1, 'admin', '2017-05-20 21:11:14', '2017-05-20 21:11:14'),
(5, '201-1', 40, 15, 'Worker Sub Assembly 5', 'Present', 'Fitting', 'no', 'MACHINE FITTING 001', 7.00, 0.00, 'No Problem', 0.00, 1, 'admin', '2017-05-20 21:11:14', '2017-05-20 21:11:14');

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`USERNAME`, `PASSWORD`, `FULL_NAME`, `PHONE_NUMBER`, `DIVISION`, `POSITION`, `NIK`, `remember_token`, `created_at`, `updated_at`) VALUES
('prasetyon', 'qwe123', 'Prasetyo Nugrohadi', '+6287854444653', 'PPC/Admin', 'Administrator', '5114100070', NULL, '2017-05-13 00:38:03', '2017-05-14 08:32:22');

-- --------------------------------------------------------

--
-- Table structure for table `workers`
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
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`ID`, `NAME`, `DIVISION`, `POSITION`, `NIK`, `created_at`, `updated_at`) VALUES
(1, 'Worker SSH 1', 'SSH', 'WORKER', '1965100219125901', NULL, '2017-05-14 08:30:20'),
(2, 'Worker SSH 2', 'SSH', 'WORKER', '1965100219125921', NULL, NULL),
(3, 'Worker SSH 3', 'SSH', 'WORKER', '1965100219125301', NULL, NULL),
(4, 'Worker SSH 4', 'SSH', 'WORKER', '1965100219124901', NULL, NULL),
(5, 'Worker SSH 5', 'SSH', 'WORKER', '1965100219155901', NULL, NULL),
(6, 'Worker Fabrication 1', 'Fabrication', 'WORKER', '1965100219125901', NULL, NULL),
(7, 'Worker Fabrication 2', 'Fabrication', 'WORKER', '1965200219125921', NULL, NULL),
(8, 'Worker Fabrication 3', 'Fabrication', 'WORKER', '1965300219125301', NULL, NULL),
(9, 'Worker Fabrication 4', 'Fabrication', 'WORKER', '1965400219124901', NULL, NULL),
(10, 'Worker Fabrication 5', 'Fabrication', 'WORKER', '1965500219155901', NULL, NULL),
(11, 'Worker Sub Assembly 1', 'Sub Assembly', 'WORKER', '1965100219125901', NULL, NULL),
(12, 'Worker Sub Assembly 2', 'Sub Assembly', 'WORKER', '2965200219125921', NULL, NULL),
(13, 'Worker Sub Assembly 3', 'Sub Assembly', 'WORKER', '3965300219125301', NULL, NULL),
(14, 'Worker Sub Assembly 4', 'Sub Assembly', 'WORKER', '4965400219124901', NULL, NULL),
(15, 'Worker Sub Assembly 5', 'Sub Assembly', 'WORKER', '5965500219155901', NULL, NULL),
(16, 'Worker Assembly 1', 'Assembly', 'WORKER', '1965120219125901', NULL, NULL),
(17, 'Worker Assembly 2', 'Assembly', 'WORKER', '2965203219125921', NULL, NULL),
(18, 'Worker Assembly 3', 'Assembly', 'WORKER', '3965304219125301', NULL, NULL),
(19, 'Worker Assembly 4', 'Assembly', 'WORKER', '4965405219124901', NULL, NULL),
(20, 'Worker Assembly 5', 'Assembly', 'WORKER', '5965506219155901', NULL, NULL),
(21, 'Worker BBS 1', 'BBS', 'WORKER', '1965120219125901', NULL, NULL),
(22, 'Worker BBS 2', 'BBS', 'WORKER', '2965203319125921', NULL, NULL),
(23, 'Worker BBS 3', 'BBS', 'WORKER', '3965304419125301', NULL, NULL),
(24, 'Worker BBS 4', 'BBS', 'WORKER', '4965405519124901', NULL, NULL),
(25, 'Worker BBS 5', 'BBS', 'WORKER', '5965506619155901', NULL, NULL),
(26, 'Worker Erection Process 1', 'Erection Process', 'WORKER', '1965120219125901', NULL, NULL),
(27, 'Worker Erection Process 2', 'Erection Process', 'WORKER', '2965203319125921', NULL, NULL),
(28, 'Worker Erection Process 3', 'Erection Process', 'WORKER', '3965304419125301', NULL, NULL),
(29, 'Worker Erection Process 4', 'Erection Process', 'WORKER', '4965405519124901', NULL, NULL),
(30, 'Worker Erection Process 5', 'Erection Process', 'WORKER', '5965506619155901', NULL, NULL);

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
-- Indexes for table `plates`
--
ALTER TABLE `plates`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `plates_id_index` (`ID`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD KEY `profiles_id_index` (`ID`);

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD KEY `user_username_index` (`USERNAME`);

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
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `bbs`
--
ALTER TABLE `bbs`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `erections`
--
ALTER TABLE `erections`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fabrications`
--
ALTER TABLE `fabrications`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `machines`
--
ALTER TABLE `machines`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;
--
-- AUTO_INCREMENT for table `panels`
--
ALTER TABLE `panels`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ship_projects`
--
ALTER TABLE `ship_projects`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ssh`
--
ALTER TABLE `ssh`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `sub_assembly`
--
ALTER TABLE `sub_assembly`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

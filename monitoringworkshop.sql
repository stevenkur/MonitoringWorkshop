-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 09, 2017 at 12:28 PM
-- Server version: 5.6.35-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mworksho_MonitoringWorkshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `assembly`
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
  `PHOTO` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assembly`
--

INSERT INTO `assembly` (`ID`, `ID_PANEL`, `PROGRESS`, `ID_WORKER`, `WORKER_NAME`, `ATTENDANCE`, `PROCESS`, `OPERATOR`, `MACHINE`, `MACHINE_WORKING`, `MACHINE_ADD_HOURS`, `WORKING_HOURS`, `PROBLEM`, `WASTE_TIME`, `SHIFT`, `USER`, `PHOTO`, `created_at`, `updated_at`) VALUES
(1, '1', 100.00, 7, 'Afandi', 'Present', 'Fitting', 'ok', 'FCAW Welding', 2.00, 0.00, 2.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-24 22:27:27', '2017-06-24 22:27:27'),
(2, '1', 100.00, 8, 'Khoirul Alam', 'Present', 'Fitting', 'ok', 'FCAW Welding', 2.00, 0.00, 2.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-24 22:27:27', '2017-06-24 22:27:27'),
(3, '1', 50.00, 7, 'Afandi', 'Present', 'Welding', 'ok', 'FCAW Welding', 0.00, 0.00, 4.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-29 09:26:23', '2017-06-29 09:26:23'),
(4, '1', 50.00, 8, 'Khoirul Alam', 'Present', 'Welding', 'no', 'FCAW Welding', 0.00, 0.00, 4.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-29 09:26:23', '2017-06-29 09:26:23'),
(5, '1', 100.00, 7, 'Afandi', 'Present', 'Welding', 'no', 'FCAW Welding', 4.00, 0.00, 4.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-29 09:26:38', '2017-06-29 09:26:38'),
(6, '1', 100.00, 8, 'Khoirul Alam', 'Present', 'Welding', 'no', 'FCAW Welding', 4.00, 0.00, 4.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-29 09:26:38', '2017-06-29 09:26:38'),
(7, '1', 50.00, 7, 'Afandi', 'Present', 'Grinding', 'ok', 'Ass_Grinding', 4.00, 0.00, 4.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-29 09:27:00', '2017-06-29 09:27:00'),
(8, '1', 50.00, 8, 'Khoirul Alam', 'Present', 'Grinding', 'no', 'Ass_Grinding', 4.00, 0.00, 4.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-29 09:27:00', '2017-06-29 09:27:00'),
(9, '1', 100.00, 7, 'Afandi', 'Present', 'Grinding', 'ok', 'Ass_Grinding', 4.00, 0.00, 4.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-29 09:27:29', '2017-06-29 09:27:29'),
(10, '1', 100.00, 8, 'Khoirul Alam', 'Present', 'Grinding', 'no', 'Ass_Grinding', 4.00, 0.00, 4.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-29 09:27:29', '2017-06-29 09:27:29'),
(11, '1', 100.00, 7, 'Afandi', 'Present', 'Fairing', 'no', 'Fairing Heating', 6.00, 0.00, 6.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-29 09:27:43', '2017-06-29 09:27:43'),
(12, '1', 100.00, 8, 'Khoirul Alam', 'Present', 'Fairing', 'no', 'Fairing Heating', 6.00, 0.00, 6.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-29 09:27:43', '2017-06-29 09:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `bbs`
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
  `PHOTO` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bbs`
--

INSERT INTO `bbs` (`ID`, `ID_MATERIAL`, `PROGRESS`, `ID_WORKER`, `WORKER_NAME`, `ATTENDANCE`, `PROCESS`, `WORKING_HOURS`, `ADD_WORKING_HOURS`, `PROBLEM`, `WASTE_TIME`, `SHIFT`, `USER`, `PHOTO`, `created_at`, `updated_at`) VALUES
(1, '2', 1.00, 9, 'M.Sholeh', 'Present', 'Blasting', 3.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-24 22:32:29', '2017-06-24 22:32:29'),
(2, '2', 1.00, 10, 'Azis Siswanto', 'Present', 'Blasting', 3.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-24 22:32:29', '2017-06-24 22:32:29'),
(3, '2', 1.00, 9, 'M.Sholeh', 'Present', 'Blasting', 4.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-25 07:27:16', '2017-06-25 07:27:16'),
(4, '2', 1.00, 10, 'Azis Siswanto', 'Present', 'Blasting', 4.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-25 07:27:16', '2017-06-25 07:27:16'),
(5, '2', 1.00, 9, 'M.Sholeh', 'Present', 'Blasting', 5.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-25 07:27:31', '2017-06-25 07:27:31'),
(6, '2', 1.00, 10, 'Azis Siswanto', 'Present', 'Blasting', 5.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-25 07:27:31', '2017-06-25 07:27:31'),
(7, '2', 2.00, 9, 'M.Sholeh', 'Present', 'Blasting', 4.00, 4.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-25 07:35:03', '2017-06-25 07:35:03'),
(8, '2', 2.00, 10, 'Azis Siswanto', 'Present', 'Blasting', 4.00, 4.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-25 07:35:03', '2017-06-25 07:35:03'),
(9, '2', 2.00, 9, 'M.Sholeh', 'Present', 'Painting', 6.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-25 07:36:20', '2017-06-25 07:36:20'),
(10, '2', 2.00, 10, 'Azis Siswanto', 'Present', 'Painting', 6.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-25 07:36:20', '2017-06-25 07:36:20'),
(11, '1', 1.00, 9, 'M.Sholeh', 'Present', 'Blasting', 4.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-25 07:43:14', '2017-06-25 07:43:14'),
(12, '1', 1.00, 10, 'Azis Siswanto', 'Present', 'Blasting', 4.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-25 07:43:14', '2017-06-25 07:43:14'),
(13, '3', 2.00, 9, 'M.Sholeh', 'Present', 'Blasting', 3.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-02 01:48:09', '2017-07-02 01:48:09'),
(14, '3', 2.00, 10, 'Azis Siswanto', 'Present', 'Blasting', 3.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-02 01:48:09', '2017-07-02 01:48:09'),
(15, '4', 2.00, 9, 'M.Sholeh', 'Present', 'Blasting', 4.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-02 01:50:17', '2017-07-02 01:50:17'),
(16, '4', 2.00, 10, 'Azis Siswanto', 'Present', 'Blasting', 4.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-02 01:50:17', '2017-07-02 01:50:17'),
(17, '12', 5.00, 9, 'M.Sholeh', 'Present', 'Blasting', 4.00, 0.00, 'Power Failure', 1.00, 1, 'admin', '', '2017-07-03 07:14:20', '2017-07-03 07:14:20'),
(18, '12', 5.00, 10, 'Azis Siswanto', 'Present', 'Blasting', 4.00, 0.00, 'Power Failure', 1.00, 1, 'admin', '', '2017-07-03 07:14:20', '2017-07-03 07:14:20'),
(19, '12', 5.00, 25, 'Supriono', 'Present', 'Blasting', 4.00, 0.00, 'Power Failure', 1.00, 1, 'admin', '', '2017-07-03 07:14:20', '2017-07-03 07:14:20'),
(20, '12', 5.00, 26, 'Sunaryo', 'Present', 'Blasting', 4.00, 0.00, 'Power Failure', 1.00, 1, 'admin', '', '2017-07-03 07:14:20', '2017-07-03 07:14:20'),
(21, '12', 5.00, 28, 'Ginanjar Basuki', 'Present', 'Blasting', 4.00, 0.00, 'Power Failure', 1.00, 1, 'admin', '', '2017-07-03 07:14:20', '2017-07-03 07:14:20'),
(22, '12', 2.00, 9, 'M.Sholeh', 'Present', 'Painting', 5.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 07:16:26', '2017-07-03 07:16:26'),
(23, '12', 2.00, 10, 'Azis Siswanto', 'Present', 'Painting', 5.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 07:16:26', '2017-07-03 07:16:26'),
(24, '12', 2.00, 25, 'Supriono', 'Present', 'Painting', 5.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 07:16:26', '2017-07-03 07:16:26'),
(25, '12', 2.00, 26, 'Sunaryo', 'Present', 'Painting', 5.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 07:16:26', '2017-07-03 07:16:26'),
(26, '12', 2.00, 28, 'Ginanjar Basuki', 'Present', 'Painting', 5.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 07:16:26', '2017-07-03 07:16:26');

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
(1, 2, 'Strategic Sealift Vessel 293', 'NV1', 0.00, 0.00, 0.00, 0.00, 0, 0, 0.00, NULL, 0.00, NULL, 0.00, NULL, 0.00, 0.00, 0.00, NULL, NULL, NULL, '2017-06-06 20:15:28', '2017-06-06 20:15:28'),
(2, 2, 'Strategic Sealift Vessel 293', 'DH', 12386.46, 0.00, 0.00, 0.00, 0, 0, 0.00, NULL, 0.00, NULL, 0.00, NULL, 0.00, 0.00, 0.00, NULL, NULL, NULL, '2017-06-06 20:15:38', '2017-06-14 22:00:30'),
(3, 2, 'Strategic Sealift Vessel 293', 'FU-(P/S)', 0.00, 0.00, 0.00, 0.00, 0, 0, 0.00, NULL, 0.00, NULL, 0.00, NULL, 0.00, 0.00, 0.00, NULL, NULL, NULL, '2017-06-06 20:15:45', '2017-06-06 20:15:45'),
(4, 2, 'Strategic Sealift Vessel 293', 'RD-(P/S)', 0.00, 0.00, 0.00, 0.00, 0, 0, 0.00, NULL, 0.00, NULL, 0.00, NULL, 0.00, 0.00, 0.00, NULL, NULL, NULL, '2017-06-06 20:15:53', '2017-06-06 20:15:53'),
(5, 2, 'Strategic Sealift Vessel 293', 'BR2-(P/S)', 19836.78, 0.00, 6692.55, 0.00, 2, 0, 0.00, NULL, 0.00, NULL, 0.00, NULL, 0.00, 0.00, 0.00, NULL, NULL, NULL, '2017-06-06 20:21:33', '2017-07-03 15:08:36'),
(8, 2, 'Strategic Sealift Vessel 293', 'DB 1 P', 0.00, 0.00, 0.00, 0.00, 0, 0, 1.00, '2017-07-03', 0.00, NULL, 0.00, NULL, 0.00, 0.00, 0.00, NULL, NULL, NULL, '2017-07-03 06:43:43', '2017-07-03 15:48:49'),
(9, 2, 'Strategic Sealift Vessel 293', 'DB 1 S', 0.00, 0.00, 0.00, 0.00, 0, 0, 1.00, '2017-07-04', 0.00, NULL, 0.00, NULL, 0.00, 0.00, 0.00, NULL, NULL, NULL, '2017-07-03 06:43:57', '2017-07-03 19:46:24'),
(10, 2, 'Strategic Sealift Vessel 293', 'DB 2 P', 0.00, 0.00, 0.00, 0.00, 0, 0, 0.00, NULL, 0.00, NULL, 0.00, NULL, 0.00, 0.00, 0.00, NULL, NULL, NULL, '2017-07-03 06:44:06', '2017-07-03 06:44:06'),
(11, 2, 'Strategic Sealift Vessel 293', 'DB 2 S', 0.00, 0.00, 0.00, 0.00, 0, 0, 0.00, NULL, 0.00, NULL, 0.00, NULL, 0.00, 0.00, 0.00, NULL, NULL, NULL, '2017-07-03 06:44:17', '2017-07-03 06:44:17'),
(12, 3, 'KIP Block 120', 'Block 120', 612.70, 0.00, 0.00, 0.00, 0, 0, 0.00, NULL, 0.00, NULL, 0.00, NULL, 0.00, 0.00, 0.00, NULL, NULL, NULL, '2017-07-03 19:41:49', '2017-07-03 19:43:32');

-- --------------------------------------------------------

--
-- Table structure for table `erections`
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
  `PHOTO` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `erections`
--

INSERT INTO `erections` (`ID`, `ID_BLOCK`, `PROGRESS`, `ID_WORKER`, `WORKER_NAME`, `ATTENDANCE`, `PROCESS`, `WORKING_HOURS`, `ADD_WORKING_HOURS`, `PROBLEM`, `WASTE_TIME`, `SHIFT`, `USER`, `PHOTO`, `created_at`, `updated_at`) VALUES
(1, '6', 100.00, 11, 'Agus Puryono', 'Present', 'Loading', 4.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-24 22:47:48', '2017-06-24 22:47:48'),
(2, '6', 100.00, 12, 'Sugeng Riono', 'Present', 'Loading', 4.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-24 22:47:48', '2017-06-24 22:47:48'),
(3, '6', 100.00, 11, 'Agus Puryono', 'Present', 'Adjusting', 4.00, 0.00, 'Worker Sick/Acident', 1.00, 1, 'admin', '', '2017-06-24 22:48:36', '2017-06-24 22:48:36'),
(4, '6', 100.00, 12, 'Sugeng Riono', 'Present', 'Adjusting', 4.00, 0.00, 'Worker Sick/Acident', 1.00, 1, 'admin', '', '2017-06-24 22:48:36', '2017-06-24 22:48:36'),
(5, '6', 100.00, 11, 'Agus Puryono', 'Present', 'Adjusting', 4.00, 0.00, 'Worker Sick/Acident', 1.00, 1, 'admin', '', '2017-06-24 22:49:33', '2017-06-24 22:49:33'),
(6, '6', 100.00, 12, 'Sugeng Riono', 'Present', 'Adjusting', 4.00, 0.00, 'Worker Sick/Acident', 1.00, 1, 'admin', '', '2017-06-24 22:49:33', '2017-06-24 22:49:33'),
(7, '6', 100.00, 11, 'Agus Puryono', 'Present', 'Adjusting', 4.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-24 22:49:53', '2017-06-24 22:49:53'),
(8, '6', 100.00, 12, 'Sugeng Riono', 'Present', 'Adjusting', 4.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-24 22:49:53', '2017-06-24 22:49:53'),
(9, '6', 100.00, 11, 'Agus Puryono', 'Present', 'Adjusting', 4.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-24 22:52:44', '2017-06-24 22:52:44'),
(10, '6', 100.00, 12, 'Sugeng Riono', 'Present', 'Adjusting', 4.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-24 22:52:44', '2017-06-24 22:52:44'),
(11, '6', 100.00, 11, 'Agus Puryono', 'Present', 'Adjusting', 0.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-25 07:54:10', '2017-06-25 07:54:10'),
(12, '6', 100.00, 12, 'Sugeng Riono', 'Present', 'Adjusting', 0.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-25 07:54:10', '2017-06-25 07:54:10'),
(13, '6', 100.00, 11, 'Agus Puryono', 'Present', 'Fitting', 0.00, 0.00, 'Broken Machine', 0.00, 1, 'admin', '', '2017-06-25 07:57:15', '2017-06-25 07:57:15'),
(14, '6', 100.00, 12, 'Sugeng Riono', 'Present', 'Fitting', 0.00, 0.00, 'Broken Machine', 0.00, 1, 'admin', '', '2017-06-25 07:57:15', '2017-06-25 07:57:15'),
(15, '6', 100.00, 11, 'Agus Puryono', 'Present', 'Welding', 0.00, 0.00, 'Worker Sick/Acident', 0.00, 1, 'admin', '', '2017-06-25 07:57:26', '2017-06-25 07:57:26'),
(16, '6', 100.00, 12, 'Sugeng Riono', 'Present', 'Welding', 0.00, 0.00, 'Worker Sick/Acident', 0.00, 1, 'admin', '', '2017-06-25 07:57:26', '2017-06-25 07:57:26'),
(17, '7', 100.00, 11, 'Agus Puryono', 'Present', 'Loading', 3.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-28 22:54:56', '2017-06-28 22:54:56'),
(18, '7', 100.00, 12, 'Sugeng Riono', 'Present', 'Loading', 3.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-28 22:54:56', '2017-06-28 22:54:56'),
(19, '7', 100.00, 11, 'Agus Puryono', 'Present', 'Adjusting', 3.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-28 22:55:12', '2017-06-28 22:55:12'),
(20, '7', 100.00, 12, 'Sugeng Riono', 'Present', 'Adjusting', 3.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-28 22:55:12', '2017-06-28 22:55:12'),
(21, '7', 100.00, 11, 'Agus Puryono', 'Present', 'Fitting', 5.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-28 22:55:27', '2017-06-28 22:55:27'),
(22, '7', 100.00, 12, 'Sugeng Riono', 'Present', 'Fitting', 5.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-28 22:55:27', '2017-06-28 22:55:27'),
(23, '8', 100.00, 11, 'Agus Puryono', 'Present', 'Loading', 5.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 15:48:49', '2017-07-03 15:48:49'),
(24, '8', 100.00, 12, 'Sugeng Riono', 'Present', 'Loading', 5.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 15:48:49', '2017-07-03 15:48:49'),
(25, '8', 100.00, 27, 'Tryawan', 'Present', 'Loading', 5.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 15:48:49', '2017-07-03 15:48:49'),
(26, '9', 100.00, 11, 'Agus Puryono', 'Present', 'Loading', 3.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 19:46:24', '2017-07-03 19:46:24'),
(27, '9', 100.00, 12, 'Sugeng Riono', 'Present', 'Loading', 3.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 19:46:24', '2017-07-03 19:46:24'),
(28, '9', 100.00, 27, 'Tryawan', 'Present', 'Loading', 3.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 19:46:24', '2017-07-03 19:46:24');

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
  `PHOTO` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fabrications`
--

INSERT INTO `fabrications` (`ID`, `ID_MATERIAL`, `ID_WORKER`, `WORKER_NAME`, `ATTENDANCE`, `PROCESS`, `OPERATOR`, `MACHINE`, `MACHINE_WORKING`, `MACHINE_ADD_HOURS`, `WORKING_HOURS`, `PROBLEM`, `WASTE_TIME`, `SHIFT`, `USER`, `PHOTO`, `created_at`, `updated_at`) VALUES
(1, 'BR2-3', 3, 'Susilo Winasis', 'Present', 'Marking', 'no', 'CNC Gas', 5.00, 0.00, 5.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-24 22:06:27', '2017-06-24 22:06:27'),
(2, 'BR2-3', 4, 'Handoyo', 'Present', 'Marking', 'ok', 'CNC Gas', 5.00, 0.00, 5.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-24 22:06:27', '2017-06-24 22:06:27'),
(3, 'BR2-1', 3, 'Susilo Winasis', 'Present', 'Marking', 'no', 'Saffro Cutting', 4.00, 0.00, 4.00, 'Worker Sick/Acident', 1.00, 1, 'admin', '', '2017-06-28 22:52:43', '2017-06-28 22:52:43'),
(4, 'BR2-1', 4, 'Handoyo', 'Present', 'Marking', 'ok', 'Saffro Cutting', 4.00, 0.00, 4.00, 'Worker Sick/Acident', 1.00, 1, 'admin', '', '2017-06-28 22:52:43', '2017-06-28 22:52:43'),
(5, 'BR2-1', 3, 'Susilo Winasis', 'Present', 'Cutting', 'no', 'Saffro Cutting', 4.00, 0.00, 4.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-29 09:24:27', '2017-06-29 09:24:27'),
(6, 'BR2-1', 4, 'Handoyo', 'Present', 'Cutting', 'no', 'Saffro Cutting', 4.00, 0.00, 4.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-29 09:24:27', '2017-06-29 09:24:27'),
(7, 'BR2-1', 3, 'Susilo Winasis', 'Present', 'Bending', 'no', 'CNC Gas', 0.00, 0.00, 4.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-29 09:24:37', '2017-06-29 09:24:37'),
(8, 'BR2-1', 4, 'Handoyo', 'Present', 'Bending', 'no', 'CNC Gas', 0.00, 0.00, 4.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-29 09:24:37', '2017-06-29 09:24:37'),
(9, 'BR2-10', 3, 'Susilo Winasis', 'Present', 'Marking', 'no', 'CNC Cutting Plasma', 1.00, 0.00, 1.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 19:51:40', '2017-07-03 19:51:40'),
(10, 'BR2-10', 4, 'Handoyo', 'Present', 'Marking', 'no', 'CNC Cutting Plasma', 1.00, 0.00, 1.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 19:51:40', '2017-07-03 19:51:40'),
(11, 'BR2-10', 16, 'Abdur Kholiq', 'Present', 'Marking', 'ok', 'CNC Cutting Plasma', 1.00, 0.00, 1.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 19:51:40', '2017-07-03 19:51:40'),
(12, 'BR2-10', 17, 'Muhammad Arsetyawan', 'Present', 'Marking', 'no', 'CNC Cutting Plasma', 1.00, 0.00, 1.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 19:51:40', '2017-07-03 19:51:40'),
(13, 'BR2-10', 18, 'Hasbi Ade S.', 'Present', 'Marking', 'no', 'CNC Cutting Plasma', 1.00, 0.00, 1.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 19:51:40', '2017-07-03 19:51:40'),
(14, 'BR2-10', 3, 'Susilo Winasis', 'Present', 'Cutting', 'no', 'Saffro Cutting', 1.00, 0.00, 1.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 19:52:41', '2017-07-03 19:52:41'),
(15, 'BR2-10', 4, 'Handoyo', 'Present', 'Cutting', 'ok', 'Saffro Cutting', 1.00, 0.00, 1.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 19:52:41', '2017-07-03 19:52:41'),
(16, 'BR2-10', 16, 'Abdur Kholiq', 'Present', 'Cutting', 'no', 'Saffro Cutting', 1.00, 0.00, 1.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 19:52:41', '2017-07-03 19:52:41'),
(17, 'BR2-10', 17, 'Muhammad Arsetyawan', 'Present', 'Cutting', 'no', 'Saffro Cutting', 1.00, 0.00, 1.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 19:52:41', '2017-07-03 19:52:41'),
(18, 'BR2-10', 18, 'Hasbi Ade S.', 'Present', 'Cutting', 'no', 'Saffro Cutting', 1.00, 0.00, 1.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 19:52:41', '2017-07-03 19:52:41'),
(19, 'BR2-10', 3, 'Susilo Winasis', 'Present', 'Bending', 'no', 'Bending Machine', 1.00, 0.00, 1.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 19:53:09', '2017-07-03 19:53:09'),
(20, 'BR2-10', 4, 'Handoyo', 'Present', 'Bending', 'no', 'Bending Machine', 1.00, 0.00, 1.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 19:53:09', '2017-07-03 19:53:09'),
(21, 'BR2-10', 16, 'Abdur Kholiq', 'Present', 'Bending', 'no', 'Bending Machine', 1.00, 0.00, 1.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 19:53:09', '2017-07-03 19:53:09'),
(22, 'BR2-10', 17, 'Muhammad Arsetyawan', 'Present', 'Bending', 'ok', 'Bending Machine', 1.00, 0.00, 1.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 19:53:09', '2017-07-03 19:53:09'),
(23, 'BR2-10', 18, 'Hasbi Ade S.', 'Present', 'Bending', 'no', 'Bending Machine', 1.00, 0.00, 1.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 19:53:09', '2017-07-03 19:53:09');

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
(1, 'Straightening Roller', 'Straightening', 'SSH', 4, 1.33, '2017-05-26 01:00:14', '2017-05-26 01:00:14'),
(2, 'Shot Blasting&Painting', 'Blasting&ShopPrimer', 'SSH', 4, 0.94, '2017-05-26 01:01:25', '2017-05-26 01:01:25'),
(3, 'Saffro Cutting', 'Cutting', 'Fabrication', 5, 20.37, '2017-05-26 01:05:55', '2017-05-26 01:06:10'),
(4, 'CNC Cutting Plasma', 'Cutting', 'Fabrication', 5, 20.37, '2017-05-26 01:06:50', '2017-05-26 01:06:50'),
(5, 'CNC Gas', 'Marking', 'Fabrication', 5, 20.37, '2017-05-26 01:07:27', '2017-05-26 01:07:27'),
(6, 'Bending Machine', 'Bending', 'Fabrication', 6, 25.92, '2017-05-26 01:08:40', '2017-05-26 01:08:40'),
(7, 'Flame Cutting', 'Cutting', 'Fabrication', 6, 3.7, '2017-05-26 01:09:42', '2017-05-26 01:09:42'),
(8, 'FCAW Welding', 'Fitting', 'Sub Assembly', 5, 0, '2017-05-26 01:12:56', '2017-05-26 01:12:56'),
(9, 'Fairing Heating', 'Fairing', 'Sub Assembly', 6, 64, '2017-05-26 01:14:55', '2017-06-23 08:55:05'),
(11, 'FCAW Welding', 'Welding', 'Sub Assembly', 5, 0, '2017-05-26 01:21:48', '2017-06-23 08:55:30'),
(13, 'FCAW Welding', 'Welding', 'Assembly', 5, 0, '2017-05-26 01:21:48', '2017-05-26 01:21:48'),
(15, 'Fairing Heating', 'Fairing', 'Assembly', 6, 64, '2017-05-26 01:22:17', '2017-05-26 01:22:17'),
(18, 'Grinding', 'Grinding', 'Sub Assembly', 5, 0, '2017-06-25 07:19:09', '2017-06-25 07:19:09'),
(19, 'Ass_Fit', 'Fitting', 'Assembly', 5, 0, '2017-06-25 07:19:47', '2017-06-25 07:19:47'),
(20, 'Ass_Grinding', 'Grinding', 'Assembly', 5, 0, '2017-06-25 07:20:04', '2017-06-25 07:20:16');

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
(1, 2, 'Strategic Sealift Vessel 293', 5, 'BR2-(P/S)', 'K13-0-101', 4687.81, 0.00, 0.00, 1.00, '2017-06-25', NULL, 1.00, '2017-06-29', NULL, 1.00, '2017-06-29', NULL, 1.00, '2017-06-29', NULL, '2017-06-06 20:29:59', '2017-07-03 15:08:36'),
(2, 2, 'Strategic Sealift Vessel 293', 5, 'BR2-(P/S)', 'K14-0-101', 2004.74, 0.00, 0.00, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, '2017-06-06 20:30:23', '2017-07-03 07:33:04');

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
('Part 1 K13', 2, 'Strategic Sealift Vessel 293', 5, 'BR2-(P/S)', 1, 'K13-0-101', 'P101', 0.00, 0.00, 6.00, 1.00, 0.00, 0.00, 996.58, 'S', NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, '2017-07-03 15:05:27', '2017-07-03 15:05:27'),
('Part 1 K14', 2, 'Strategic Sealift Vessel 293', 5, 'BR2-(P/S)', 2, 'K14-0-101', 'P101', 0.00, 0.00, 6.00, 0.00, 0.00, 1.00, 996.58, 'S', NULL, 1.00, '2017-07-03', NULL, 1.00, '2017-07-04', NULL, 1.00, '2017-07-04', NULL, 0.00, '2017-07-04', NULL, '2017-07-03 07:29:40', '2017-07-03 21:03:07'),
('Part 2 K13', 2, 'Strategic Sealift Vessel 293', 5, 'BR2-(P/S)', 1, 'K13-0-101', 'P102', 0.00, 0.00, 6.00, 0.00, 0.00, 1.00, 653.31, 'S', NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, '2017-07-03 15:06:33', '2017-07-03 15:06:33'),
('Part 2 K14', 2, 'Strategic Sealift Vessel 293', 5, 'BR2-(P/S)', 2, 'K14-0-101', 'P102', 0.00, 0.00, 6.00, 0.00, 0.00, 1.00, 653.31, 'S', NULL, 1.00, '2017-07-03', NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, '2017-07-03 07:31:07', '2017-07-03 07:37:51'),
('Part 3 K13', 2, 'Strategic Sealift Vessel 293', 5, 'BR2-(P/S)', 1, 'K13-0-101', 'S201 (L)', 100.00, 75.00, 7.00, 14.00, 0.00, 0.00, 367.45, 'S', NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, '2017-07-03 15:07:39', '2017-07-03 15:07:39'),
('Part 3 K14', 2, 'Strategic Sealift Vessel 293', 5, 'BR2-(P/S)', 2, 'K14-0-101', 'S201 (L)', 100.00, 75.00, 7.00, 0.00, 0.00, 11.00, 342.85, 'S', NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, '2017-07-03 07:32:02', '2017-07-03 07:32:02'),
('Part 4 K13', 2, 'Strategic Sealift Vessel 293', 5, 'BR2-(P/S)', 1, 'K13-0-101', 'B301', 0.00, 0.00, 8.00, 14.00, 0.00, 0.00, 14.00, 'A', NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, '2017-07-03 15:08:36', '2017-07-03 15:08:36'),
('Part 4 K14', 2, 'Strategic Sealift Vessel 293', 5, 'BR2-(P/S)', 2, 'K14-0-101', 'B301', 0.00, 0.00, 8.00, 0.00, 0.00, 12.00, 11.00, 'A', NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, 0.00, NULL, NULL, '2017-07-03 07:33:04', '2017-07-03 07:33:04');

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
-- Table structure for table `percentages`
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
-- Dumping data for table `percentages`
--

INSERT INTO `percentages` (`id`, `WORKSHOP`, `ACTIVITY`, `PERCENT`, `created_at`, `updated_at`) VALUES
(0, 'SSH', 'MATERIAL_COMING', 0, NULL, '2017-07-02 00:35:15'),
(1, 'SSH', 'STRAIGHTENING', 50, NULL, '2017-07-02 00:35:15'),
(2, 'SSH', 'BLASTING', 50, NULL, '2017-07-02 00:35:15'),
(3, 'FABRICATION', 'MARKING', 40, NULL, '2017-06-02 23:38:53'),
(4, 'FABRICATION', 'CUTTING', 40, NULL, NULL),
(5, 'FABRICATION', 'BENDING', 20, NULL, '2017-06-02 23:38:53'),
(6, 'SUBASSEMBLY', 'FITTING', 40, NULL, '2017-06-02 23:46:10'),
(7, 'SUBASSEMBLY', 'WELDING', 40, NULL, '2017-06-02 23:46:10'),
(8, 'SUBASSEMBLY', 'GRINDING', 10, NULL, '2017-06-02 23:46:11'),
(9, 'SUBASSEMBLY', 'FAIRING', 10, NULL, '2017-06-02 23:46:11'),
(10, 'ASSEMBLY', 'FITTING', 40, NULL, '2017-06-02 23:46:27'),
(11, 'ASSEMBLY', 'WELDING', 40, NULL, '2017-06-02 23:46:27'),
(12, 'ASSEMBLY', 'GRINDING', 10, NULL, '2017-06-02 23:46:27'),
(13, 'ASSEMBLY', 'FAIRING', 10, NULL, '2017-06-02 23:46:27'),
(14, 'BBS', 'BLASTING', 50, NULL, NULL),
(15, 'BBS', 'PAINTING', 50, NULL, NULL),
(16, 'ERECTION', 'LOADING', 10, NULL, NULL),
(17, 'ERECTION', 'ADJUSTING', 15, NULL, NULL),
(18, 'ERECTION', 'FITTING', 30, NULL, NULL),
(19, 'ERECTION', 'WELDING', 45, NULL, NULL);

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
-- Dumping data for table `plates`
--

INSERT INTO `plates` (`ID`, `ID_PROJECT`, `PROJECT_NAME`, `ID_BLOCK`, `BLOCK_NAME`, `LENGTH`, `BREADTH`, `THICKNESS`, `PORT`, `CENTER`, `STARBOARD`, `WEIGHT`, `DATE_COMING`, `STRAIGHTENING`, `STRAIGHTENING_DATE`, `STRAIGHTENING_MACHINE`, `BLASTING`, `BLASTING_DATE`, `BLASTING_MACHINE`, `MARKING`, `MARKING_DATE`, `MARKING_MACHINE`, `CUTTING`, `CUTTING_DATE`, `CUTTING_MACHINE`, `BLENDING`, `BLENDING_DATE`, `BLENDING_MACHINE`, `created_at`, `updated_at`) VALUES
('120 - 1', 3, 'KIP Block 120', 12, 'Block 120', 6096.00, 1829.00, 7.00, 0.00, 1.00, 0.00, 612.70, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-07-03 19:43:32', '2017-07-03 19:43:32'),
('BR2-1', 2, 'Strategic Sealift Vessel 293', 5, 'BR2-(P/S)', 12192.00, 1829.00, 6.00, 1.00, 0.00, 1.00, 2100.58, '2017-06-07', 1, '2017-06-07', 'Straightening Roller', 1, '2017-06-15', 'Straightening Roller', 1, '2017-06-29', 'Saffro Cutting', 1, '2017-06-29', 'Saffro Cutting', 1, '2017-06-29', 'CNC Gas', '2017-06-06 20:33:40', '2017-06-29 09:24:37'),
('BR2-10', 2, 'Strategic Sealift Vessel 293', 5, 'BR2-(P/S)', 12192.00, 1524.00, 6.00, 1.00, 0.00, 0.00, 875.15, '2017-07-01', 1, '2017-06-25', 'Straightening Roller', 1, '2017-06-25', 'Shot Blasting&Painting', 1, '2017-07-04', 'CNC Cutting Plasma', 1, '2017-07-04', 'Saffro Cutting', 1, '2017-07-04', 'Bending Machine', '2017-06-15 00:31:37', '2017-07-03 19:53:09'),
('BR2-2', 2, 'Strategic Sealift Vessel 293', 5, 'BR2-(P/S)', 12192.00, 1524.00, 6.00, 1.00, 0.00, 1.00, 1750.29, '2017-06-07', 1, '2017-06-11', 'Straightening Roller', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-06-06 20:36:25', '2017-06-10 23:43:27'),
('BR2-3', 2, 'Strategic Sealift Vessel 293', 5, 'BR2-(P/S)', 12192.00, 1524.00, 6.00, 1.00, 0.00, 0.00, 875.15, '2017-06-25', 1, '2017-06-25', 'Straightening Roller', 1, '2017-06-25', 'Shot Blasting&Painting', 1, '2017-06-25', 'CNC Gas', 0, NULL, NULL, 0, NULL, NULL, '2017-06-14 21:20:13', '2017-06-24 22:06:27'),
('BR2-4', 2, 'Strategic Sealift Vessel 293', 5, 'BR2-(P/S)', 12192.00, 1829.00, 6.00, 1.00, 0.00, 1.00, 2100.58, '2017-06-25', 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-06-14 21:21:02', '2017-06-24 21:52:34'),
('BR2-5', 2, 'Strategic Sealift Vessel 293', 5, 'BR2-(P/S)', 12192.00, 1524.00, 6.00, 1.00, 0.00, 1.00, 1750.29, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-06-14 21:21:50', '2017-06-14 21:21:50'),
('BR2-6', 2, 'Strategic Sealift Vessel 293', 5, 'BR2-(P/S)', 12192.00, 1524.00, 6.00, 1.00, 0.00, 1.00, 1750.29, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-06-14 21:23:30', '2017-06-14 21:23:30'),
('BR2-7', 2, 'Strategic Sealift Vessel 293', 5, 'BR2-(P/S)', 12192.00, 1524.00, 6.00, 1.00, 0.00, 1.00, 1750.29, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-06-14 21:24:04', '2017-06-14 21:24:04'),
('BR2-8', 2, 'Strategic Sealift Vessel 293', 5, 'BR2-(P/S)', 12192.00, 1524.00, 6.00, 1.00, 0.00, 0.00, 875.15, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-06-15 00:29:32', '2017-06-15 00:29:32'),
('BR2-9', 2, 'Strategic Sealift Vessel 293', 5, 'BR2-(P/S)', 9144.00, 1829.00, 6.00, 1.00, 0.00, 0.00, 787.72, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-06-15 00:30:38', '2017-06-15 00:30:38'),
('DH-1', 2, 'Strategic Sealift Vessel 293', 2, 'DH', 9144.00, 1524.00, 6.00, 1.00, 0.00, 1.00, 1312.72, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-06-14 21:29:16', '2017-06-14 21:29:16'),
('DH-10', 2, 'Strategic Sealift Vessel 293', 2, 'DH', 9144.00, 1524.00, 8.00, 1.00, 0.00, 1.00, 875.15, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-06-14 21:55:10', '2017-06-14 21:55:10'),
('DH-11', 2, 'Strategic Sealift Vessel 293', 2, 'DH', 850.00, 1524.00, 10.00, 1.00, 0.00, 0.00, 101.69, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-06-14 21:55:50', '2017-06-14 21:55:50'),
('DH-2', 2, 'Strategic Sealift Vessel 293', 2, 'DH', 9144.00, 1524.00, 6.00, 1.00, 0.00, 1.00, 1312.72, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-06-14 21:35:29', '2017-06-14 21:35:29'),
('DH-3', 2, 'Strategic Sealift Vessel 293', 2, 'DH', 12192.00, 1829.00, 6.00, 1.00, 0.00, 0.00, 1050.29, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-06-14 21:36:54', '2017-06-14 21:36:54'),
('DH-4', 2, 'Strategic Sealift Vessel 293', 2, 'DH', 9144.00, 1829.00, 6.00, 1.00, 0.00, 0.00, 787.72, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-06-14 21:37:34', '2017-06-14 21:37:34'),
('DH-5', 2, 'Strategic Sealift Vessel 293', 2, 'DH', 9144.00, 1829.00, 6.00, 1.00, 0.00, 0.00, 787.72, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-06-14 21:50:47', '2017-06-14 21:50:47'),
('DH-6', 2, 'Strategic Sealift Vessel 293', 2, 'DH', 9144.00, 1829.00, 6.00, 1.00, 0.00, 0.00, 787.72, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-06-14 21:51:50', '2017-06-14 21:51:50'),
('DH-7', 2, 'Strategic Sealift Vessel 293', 2, 'DH', 9144.00, 1524.00, 7.00, 1.00, 0.00, 0.00, 765.75, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-06-14 21:52:43', '2017-06-14 21:52:43'),
('DH-8', 2, 'Strategic Sealift Vessel 293', 2, 'DH', 9144.00, 1524.00, 7.00, 1.00, 0.00, 1.00, 1531.51, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-06-14 21:53:27', '2017-06-14 21:53:27'),
('DH-9', 2, 'Strategic Sealift Vessel 293', 2, 'DH', 9144.00, 1524.00, 7.00, 1.00, 0.00, 0.00, 765.75, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, '2017-06-14 21:54:41', '2017-06-14 21:54:41');

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
('BR2-Pro1', 2, 'Strategic Sealift Vessel 293', 5, 'BR2-(P/S)', 6000.00, 75.00, 7.00, 100.00, 54.00, 0.00, 28.00, 4585.44, 'Profil L', '2017-06-25', '2017-06-06 20:35:19', '2017-06-24 21:57:06'),
('BR2-Pro2', 2, 'Strategic Sealift Vessel 293', 5, 'BR2-(P/S)', 12000.00, 150.00, 15.00, 0.00, 3.00, 0.00, 0.00, 635.85, 'Flat Bar', NULL, '2017-06-14 21:27:55', '2017-06-14 21:27:55'),
('DH-Pro1', 2, 'Strategic Sealift Vessel 293', 2, 'DH', 6000.00, 90.00, 14.00, 200.00, 2.00, 0.00, 0.00, 294.00, 'Profil L', NULL, '2017-06-14 21:31:44', '2017-06-14 21:31:44'),
('DH-Pro2', 2, 'Strategic Sealift Vessel 293', 2, 'DH', 6000.00, 75.00, 7.00, 100.00, 5.00, 0.00, 4.00, 503.28, 'Profil L', NULL, '2017-06-14 21:57:05', '2017-06-14 21:57:05'),
('DH-Pro3', 2, 'Strategic Sealift Vessel 293', 2, 'DH', 6000.00, 75.00, 6.00, 75.00, 19.00, 0.00, 12.00, 1209.00, 'Profil L', NULL, '2017-06-14 21:58:00', '2017-06-14 21:58:00'),
('DH-Pro4', 2, 'Strategic Sealift Vessel 293', 2, 'DH', 6000.00, 150.00, 10.00, 0.00, 1.00, 0.00, 0.00, 70.65, 'Flat Bar', NULL, '2017-06-14 21:58:56', '2017-06-14 21:58:56'),
('DH-Pro5', 2, 'Strategic Sealift Vessel 293', 2, 'DH', 6000.00, 125.00, 10.00, 0.00, 2.00, 0.00, 0.00, 117.75, 'Flat Bar', NULL, '2017-06-14 21:59:43', '2017-06-14 21:59:43'),
('DH-Pro6', 2, 'Strategic Sealift Vessel 293', 2, 'DH', 6000.00, 75.00, 8.00, 0.00, 3.00, 0.00, 1.00, 113.04, 'Flat Bar', NULL, '2017-06-14 22:00:30', '2017-06-14 22:00:30');

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
  `VOLUME_SOLID` int(11) NOT NULL,
  `PAINT_TYPE` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PAINT_NEEDS` double(8,2) NOT NULL,
  `BLASTING` double(6,2) NOT NULL DEFAULT '0.00',
  `BLASTING_DATE` date DEFAULT NULL,
  `PAINTING` double(6,2) NOT NULL DEFAULT '0.00',
  `PAINTING_DATE` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`ID`, `ID_PROJECT`, `PROJECT_NAME`, `ID_BLOCK`, `BLOCK_NAME`, `ROOM`, `SIDE`, `FRAME`, `DECK`, `AREA`, `TOTAL_LAYER`, `VOLUME_SOLID`, `PAINT_TYPE`, `PAINT_NEEDS`, `BLASTING`, `BLASTING_DATE`, `PAINTING`, `PAINTING_DATE`, `created_at`, `updated_at`) VALUES
(11, 2, 'Strategic Sealift Vessel 293', 9, 'DB 1 S', 'DB 1 S - Bottom Zone', 'P-S', '97+300 - 116+100', 'BL-B', 105, 5, 73, 'Intertuf 262', 5390.75, 0.00, NULL, 0.00, NULL, '2017-07-03 06:58:29', '2017-07-03 06:58:29'),
(12, 2, 'Strategic Sealift Vessel 293', 8, 'DB 1 P', 'Db 1 P - Bottom Zone', 'P-S', '97+300 - 116+100', 'BL-B', 119, 5, 73, 'Intertuf 262', 6116.61, 5.00, '2017-07-03', 2.00, '2017-07-03', '2017-07-03 07:00:24', '2017-07-03 07:16:26'),
(13, 2, 'Strategic Sealift Vessel 293', 8, 'DB 1 P', 'DB 1 P - No.2 Void', 'P-S(C)', '113-116+100', 'BL', 169, 2, 68, 'Intergard 403', 9306.62, 0.00, NULL, 0.00, NULL, '2017-07-03 07:03:02', '2017-07-03 07:03:02');

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
(1, 'Kapal Api', 'Steven Kurniawan', 'Kopi', 12.00, 12.00, 1.00, 2.00, 3.00, 100.00, 100.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, '2017-06-06', '2017-06-30', NULL, '2017-06-06 19:50:19', '2017-06-06 19:50:19'),
(2, 'Strategic Sealift Vessel 293', 'Philippines Goverment', 'Development of LPD', 114.64, 107.49, 21.80, 11.30, 5.00, 4516.00, 16.00, 32223.24, 0.00, 5031.66, 0.00, -1, 0, 3, 0, '2017-06-20', '2018-12-19', NULL, '2017-06-06 19:50:36', '2017-07-03 15:08:36'),
(3, 'KIP Block 120', 'Dumas', '-', 0.00, 60.00, 0.00, 0.00, 0.00, 9999.99, 0.00, 612.70, 0.00, 0.00, 0.00, 0, 0, 1, 0, '2017-06-21', '2017-08-07', NULL, '2017-07-03 19:35:51', '2017-07-03 19:43:32');

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
  `PHOTO` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ssh`
--

INSERT INTO `ssh` (`ID`, `ID_MATERIAL`, `ID_WORKER`, `WORKER_NAME`, `ATTENDANCE`, `PROCESS`, `OPERATOR`, `MACHINE`, `MACHINE_WORKING`, `MACHINE_ADD_HOURS`, `WORKING_HOURS`, `PROBLEM`, `WASTE_TIME`, `SHIFT`, `USER`, `PHOTO`, `created_at`, `updated_at`) VALUES
(1, 'BR2-1', 1, 'Bambang Pamungkas', 'Present', 'Straightening', 'ok', 'Straightening Roller', 4.00, 0.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-06 20:41:26', '2017-06-06 20:41:26'),
(2, 'BR2-1', 2, 'Evandi Dwi K.', 'Present', 'Straightening', 'no', 'Straightening Roller', 4.00, 0.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-06 20:41:26', '2017-06-06 20:41:26'),
(3, 'BR2-2', 1, 'Bambang Pamungkas', 'Present', 'Straightening', 'ok', 'Straightening Roller', 4.00, 0.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-10 23:43:27', '2017-06-10 23:43:27'),
(4, 'BR2-2', 2, 'Evandi Dwi K.', 'Present', 'Straightening', 'no', 'Straightening Roller', 4.00, 0.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-10 23:43:27', '2017-06-10 23:43:27'),
(5, 'BR2-1', 1, 'Bambang Pamungkas', 'Present', 'Blasting & Shop Primer', 'ok', 'Straightening Roller', 6.00, 0.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-14 21:54:23', '2017-06-14 21:54:23'),
(6, 'BR2-1', 2, 'Evandi Dwi K.', 'Present', 'Blasting & Shop Primer', 'no', 'Straightening Roller', 6.00, 0.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-14 21:54:23', '2017-06-14 21:54:23'),
(7, 'BR2-3', 1, 'Bambang Pamungkas', 'Present', 'Straightening', 'ok', 'Straightening Roller', 5.00, 0.00, 5.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-24 21:59:07', '2017-06-24 21:59:07'),
(8, 'BR2-3', 2, 'Evandi Dwi K.', 'Present', 'Straightening', 'no', 'Straightening Roller', 5.00, 0.00, 5.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-24 21:59:07', '2017-06-24 21:59:07'),
(9, 'BR2-3', 1, 'Bambang Pamungkas', 'Present', 'Blasting & Shop Primer', 'ok', 'Shot Blasting&Painti', 5.00, 0.00, 5.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-24 22:00:11', '2017-06-24 22:00:11'),
(10, 'BR2-3', 2, 'Evandi Dwi K.', 'Present', 'Blasting & Shop Primer', 'no', 'Shot Blasting&Painti', 5.00, 0.00, 5.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-24 22:00:11', '2017-06-24 22:00:11'),
(11, 'BR2-10', 1, 'Bambang Pamungkas', 'Present', 'Straightening', 'no', 'Straightening Roller', 4.00, 0.00, 4.00, 'Power Failure', 0.00, 1, 'admin', '', '2017-06-25 07:57:58', '2017-06-25 07:57:58'),
(12, 'BR2-10', 2, 'Evandi Dwi K.', 'Present', 'Straightening', 'no', 'Straightening Roller', 4.00, 0.00, 4.00, 'Power Failure', 0.00, 1, 'admin', '', '2017-06-25 07:57:58', '2017-06-25 07:57:58'),
(13, 'BR2-10', 1, 'Bambang Pamungkas', 'Present', 'Blasting & Shop Primer', 'ok', 'Shot Blasting&Painti', 4.00, 2.00, 4.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-25 07:58:13', '2017-06-25 07:58:13'),
(14, 'BR2-10', 2, 'Evandi Dwi K.', 'Present', 'Blasting & Shop Primer', 'no', 'Shot Blasting&Painti', 4.00, 2.00, 4.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-25 07:58:13', '2017-06-25 07:58:13');

-- --------------------------------------------------------

--
-- Table structure for table `sub_assembly`
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
  `PHOTO` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_assembly`
--

INSERT INTO `sub_assembly` (`ID`, `ID_PART`, `PROGRESS`, `ID_WORKER`, `WORKER_NAME`, `ATTENDANCE`, `PROCESS`, `OPERATOR`, `MACHINE`, `MACHINE_WORKING`, `MACHINE_ADD_HOURS`, `WORKING_HOURS`, `PROBLEM`, `WASTE_TIME`, `SHIFT`, `USER`, `PHOTO`, `created_at`, `updated_at`) VALUES
(1, 'br2', 0.00, 5, 'M.Sugianto', 'Present', 'Fitting', 'no', 'FCAW Welding', 1.00, 0.00, 1.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-24 22:20:25', '2017-06-24 22:20:25'),
(2, 'br2', 0.00, 6, 'Eko Fendy S.', 'Present', 'Fitting', 'ok', 'FCAW Welding', 1.00, 0.00, 1.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-24 22:20:25', '2017-06-24 22:20:25'),
(3, 'br2', 0.00, 5, 'M.Sugianto', 'Present', 'Fitting', 'no', 'FCAW Welding', 2.00, 0.00, 2.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-24 22:25:44', '2017-06-24 22:25:44'),
(4, 'br2', 0.00, 6, 'Eko Fendy S.', 'Present', 'Fitting', 'ok', 'FCAW Welding', 2.00, 0.00, 2.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-24 22:25:44', '2017-06-24 22:25:44'),
(5, 'br2', 100.00, 5, 'M.Sugianto', 'Present', 'Fitting', 'no', 'FCAW Welding', 2.00, 0.00, 2.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-24 22:26:13', '2017-06-24 22:26:13'),
(6, 'br2', 100.00, 6, 'Eko Fendy S.', 'Present', 'Fitting', 'ok', 'FCAW Welding', 2.00, 0.00, 2.00, 'No Problem', 0.00, 1, 'admin', '', '2017-06-24 22:26:13', '2017-06-24 22:26:13'),
(7, 'P01', 100.00, 5, 'M.Sugianto', 'Present', 'Fitting', 'no', 'FCAW Welding', 4.00, 0.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-02 02:04:23', '2017-07-02 02:04:23'),
(8, 'P01', 100.00, 6, 'Eko Fendy S.', 'Present', 'Fitting', 'ok', 'FCAW Welding', 4.00, 0.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-02 02:04:24', '2017-07-02 02:04:24'),
(9, 'Part 1 K14', 0.00, 5, 'M.Sugianto', 'Present', 'Fitting', 'no', 'FCAW Welding', 1.00, 0.00, 1.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 07:34:42', '2017-07-03 07:34:42'),
(10, 'Part 1 K14', 0.00, 6, 'Eko Fendy S.', 'Present', 'Fitting', 'no', 'FCAW Welding', 1.00, 0.00, 1.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 07:34:42', '2017-07-03 07:34:42'),
(11, 'Part 1 K14', 0.00, 19, 'Ilham Jaya Kusuma', 'Present', 'Fitting', 'no', 'FCAW Welding', 1.00, 0.00, 1.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 07:34:42', '2017-07-03 07:34:42'),
(12, 'Part 1 K14', 0.00, 5, 'M.Sugianto', 'Present', 'Fitting', 'no', 'FCAW Welding', 1.00, 0.00, 1.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 07:34:46', '2017-07-03 07:34:46'),
(13, 'Part 1 K14', 0.00, 6, 'Eko Fendy S.', 'Present', 'Fitting', 'no', 'FCAW Welding', 1.00, 0.00, 1.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 07:34:46', '2017-07-03 07:34:46'),
(14, 'Part 1 K14', 0.00, 19, 'Ilham Jaya Kusuma', 'Present', 'Fitting', 'no', 'FCAW Welding', 1.00, 0.00, 1.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 07:34:46', '2017-07-03 07:34:46'),
(15, 'Part 1 K14', 100.00, 5, 'M.Sugianto', 'Present', 'Fitting', 'no', 'FCAW Welding', 2.00, 0.00, 2.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 07:35:46', '2017-07-03 07:35:46'),
(16, 'Part 1 K14', 100.00, 6, 'Eko Fendy S.', 'Present', 'Fitting', 'no', 'FCAW Welding', 2.00, 0.00, 2.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 07:35:46', '2017-07-03 07:35:46'),
(17, 'Part 1 K14', 100.00, 19, 'Ilham Jaya Kusuma', 'Present', 'Fitting', 'no', 'FCAW Welding', 2.00, 0.00, 2.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 07:35:46', '2017-07-03 07:35:46'),
(18, 'Part 1 K14', 100.00, 20, 'Kateno', 'Present', 'Fitting', 'no', 'FCAW Welding', 2.00, 0.00, 2.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 07:35:46', '2017-07-03 07:35:46'),
(19, 'Part 1 K14', 100.00, 21, 'Dudi Hartanto', 'Present', 'Fitting', 'ok', 'FCAW Welding', 2.00, 0.00, 2.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 07:35:46', '2017-07-03 07:35:46'),
(20, 'Part 2 K14', 100.00, 5, 'M.Sugianto', 'Present', 'Fitting', 'no', 'FCAW Welding', 1.00, 0.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 07:37:51', '2017-07-03 07:37:51'),
(21, 'Part 2 K14', 100.00, 6, 'Eko Fendy S.', 'Present', 'Fitting', 'no', 'FCAW Welding', 1.00, 0.00, 1.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 07:37:51', '2017-07-03 07:37:51'),
(22, 'Part 2 K14', 100.00, 19, 'Ilham Jaya Kusuma', 'Present', 'Fitting', 'no', 'FCAW Welding', 1.00, 0.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 07:37:51', '2017-07-03 07:37:51'),
(23, 'Part 2 K14', 100.00, 20, 'Kateno', 'Present', 'Fitting', 'no', 'FCAW Welding', 1.00, 0.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 07:37:51', '2017-07-03 07:37:51'),
(24, 'Part 2 K14', 100.00, 21, 'Dudi Hartanto', 'Present', 'Fitting', 'ok', 'FCAW Welding', 1.00, 0.00, 1.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 07:37:51', '2017-07-03 07:37:51'),
(25, 'Part 1 K14', 100.00, 5, 'M.Sugianto', 'Present', 'Welding', 'no', 'FCAW Welding', 2.00, 0.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 21:02:06', '2017-07-03 21:02:06'),
(26, 'Part 1 K14', 100.00, 6, 'Eko Fendy S.', 'Present', 'Welding', 'no', 'FCAW Welding', 2.00, 0.00, 2.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 21:02:06', '2017-07-03 21:02:06'),
(27, 'Part 1 K14', 100.00, 19, 'Ilham Jaya Kusuma', 'Present', 'Welding', 'no', 'FCAW Welding', 2.00, 0.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 21:02:06', '2017-07-03 21:02:06'),
(28, 'Part 1 K14', 100.00, 20, 'Kateno', 'Present', 'Welding', 'no', 'FCAW Welding', 2.00, 0.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 21:02:06', '2017-07-03 21:02:06'),
(29, 'Part 1 K14', 100.00, 21, 'Dudi Hartanto', 'Present', 'Welding', 'ok', 'FCAW Welding', 2.00, 0.00, 2.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 21:02:06', '2017-07-03 21:02:06'),
(30, 'Part 1 K14', 100.00, 5, 'M.Sugianto', 'Present', 'Grinding', 'no', 'Grinding', 1.00, 0.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 21:02:42', '2017-07-03 21:02:42'),
(31, 'Part 1 K14', 100.00, 6, 'Eko Fendy S.', 'Present', 'Grinding', 'no', 'Grinding', 1.00, 0.00, 1.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 21:02:42', '2017-07-03 21:02:42'),
(32, 'Part 1 K14', 100.00, 19, 'Ilham Jaya Kusuma', 'Present', 'Grinding', 'no', 'Grinding', 1.00, 0.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 21:02:42', '2017-07-03 21:02:42'),
(33, 'Part 1 K14', 100.00, 20, 'Kateno', 'Present', 'Grinding', 'no', 'Grinding', 1.00, 0.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 21:02:42', '2017-07-03 21:02:42'),
(34, 'Part 1 K14', 100.00, 21, 'Dudi Hartanto', 'Present', 'Grinding', 'ok', 'Grinding', 1.00, 0.00, 1.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 21:02:42', '2017-07-03 21:02:42'),
(35, 'Part 1 K14', 0.00, 5, 'M.Sugianto', 'Present', 'Fairing', 'no', 'Fairing Heating', 1.00, 0.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 21:03:07', '2017-07-03 21:03:07'),
(36, 'Part 1 K14', 0.00, 6, 'Eko Fendy S.', 'Present', 'Fairing', 'no', 'Fairing Heating', 1.00, 0.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 21:03:07', '2017-07-03 21:03:07'),
(37, 'Part 1 K14', 0.00, 19, 'Ilham Jaya Kusuma', 'Present', 'Fairing', 'no', 'Fairing Heating', 1.00, 0.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 21:03:07', '2017-07-03 21:03:07'),
(38, 'Part 1 K14', 0.00, 20, 'Kateno', 'Present', 'Fairing', 'no', 'Fairing Heating', 1.00, 0.00, 0.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 21:03:07', '2017-07-03 21:03:07'),
(39, 'Part 1 K14', 0.00, 21, 'Dudi Hartanto', 'Present', 'Fairing', 'ok', 'Fairing Heating', 1.00, 0.00, 1.00, 'No Problem', 0.00, 1, 'admin', '', '2017-07-03 21:03:07', '2017-07-03 21:03:07');

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
('prasetyon', 'qwe123', 'Prasetyo Nugrohadi', '+6287854444653', 'PPC/Admin', 'Administrator', '5114100070', NULL, '2017-05-13 00:38:03', '2017-05-14 08:32:22'),
('ssh', 'qwe123', 'SSH', '0000000000', 'Steel Stock House', 'Manager', '11111', NULL, '2017-06-03 01:14:08', '2017-06-03 01:14:31'),
('fabrication', 'qwe123', 'FABRICATION', '0000000000', 'Fabrication', 'Manager', '22222', NULL, '2017-06-03 01:14:58', '2017-06-03 01:14:58'),
('subassembly', 'qwe123', 'SUBASSEMBLY', '0000000000', 'Sub Assembly', 'Manager', '33333', NULL, '2017-06-03 01:15:24', '2017-06-03 01:15:24'),
('assembly', 'qwe123', 'ASSEMBLY', '0000000000', 'Assembly', 'Manager', '44444', NULL, '2017-06-03 01:15:44', '2017-06-03 01:16:33'),
('bbs', 'qwe123', 'BBS', '0000000000', 'Block Blasting Structure', 'Manager', '55555', NULL, '2017-06-03 01:16:09', '2017-06-03 01:16:09'),
('erection', 'qwe123', 'ERECTION', '0000000000', 'Erection', 'Manager', '66666', NULL, '2017-06-03 01:16:25', '2017-06-03 01:16:25'),
('panduaudityap', 'kapal', 'Pandu Auditya P', '08123456789', 'PPC/Admin', 'Manager', '4112100075', NULL, '2017-06-06 19:44:14', '2017-06-06 19:44:14'),
('kurniawan', 'kurkur', 'kurniawan dwi', '0929293', 'Steel Stock House', 'PKWT', '32323', NULL, '2017-06-10 23:35:02', '2017-06-10 23:35:02');

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
(1, 'Bambang Pamungkas', 'SSH', 'Staf', '21231219', '2017-06-06 20:39:07', '2017-06-06 20:39:07'),
(2, 'Evandi Dwi K.', 'SSH', 'Staf', '21231217', '2017-06-06 20:39:30', '2017-06-06 20:39:30'),
(3, 'Susilo Winasis', 'Fabrication', 'PKWT', '21231217', '2017-06-19 06:54:55', '2017-06-19 06:54:55'),
(4, 'Handoyo', 'Fabrication', 'Staf', '103953837', '2017-06-23 08:59:28', '2017-06-23 08:59:28'),
(5, 'M.Sugianto', 'Sub Assembly', 'Staf', '103964058', '2017-06-23 08:59:59', '2017-06-23 08:59:59'),
(6, 'Eko Fendy S.', 'Sub Assembly', 'Staf', '103154385', '2017-06-23 09:01:02', '2017-06-23 09:01:02'),
(7, 'Afandi', 'Assembly', 'PKWT', '015065277', '2017-06-23 09:02:18', '2017-06-23 09:02:18'),
(8, 'Khoirul Alam', 'Assembly', 'PKWT', '015065275', '2017-06-23 09:02:44', '2017-06-23 09:02:44'),
(9, 'M.Sholeh', 'BBS', 'Staf', '103154364', '2017-06-23 09:03:26', '2017-06-23 09:03:26'),
(10, 'Azis Siswanto', 'BBS', 'Staf', '103154389', '2017-06-23 09:04:04', '2017-06-23 09:04:04'),
(11, 'Agus Puryono', 'Erection Process', 'Staf', '103963983', '2017-06-23 09:04:45', '2017-06-23 09:04:45'),
(12, 'Sugeng Riono', 'Erection Process', 'Staf', '103902863', '2017-06-23 09:05:04', '2017-06-23 09:05:04'),
(13, 'Joko Pramono', 'SSH', 'Staf', '12123343', '2017-07-03 07:03:53', '2017-07-03 07:03:53'),
(14, 'Budi Sannita', 'SSH', 'Staf', '12343434', '2017-07-03 07:04:15', '2017-07-03 07:04:15'),
(15, 'Fendy Bagus', 'SSH', 'PKWT', '344442', '2017-07-03 07:04:49', '2017-07-03 07:04:49'),
(16, 'Abdur Kholiq', 'Fabrication', 'Kepala Bengkel', '23323', '2017-07-03 07:05:23', '2017-07-03 07:05:23'),
(17, 'Muhammad Arsetyawan', 'Fabrication', 'PKWT', '133434', '2017-07-03 07:06:04', '2017-07-03 07:06:04'),
(18, 'Hasbi Ade S.', 'Fabrication', 'Staf', '422133', '2017-07-03 07:06:31', '2017-07-03 07:06:31'),
(19, 'Ilham Jaya Kusuma', 'Sub Assembly', 'PKWT', '112323', '2017-07-03 07:07:06', '2017-07-03 07:07:06'),
(20, 'Kateno', 'Sub Assembly', 'Kepala Bengkel', '292302', '2017-07-03 07:07:34', '2017-07-03 07:07:34'),
(21, 'Dudi Hartanto', 'Sub Assembly', 'PKWT', '23355', '2017-07-03 07:08:04', '2017-07-03 07:08:04'),
(22, 'Ferry Huda', 'Assembly', 'Staf', '12344', '2017-07-03 07:08:47', '2017-07-03 07:08:47'),
(23, 'Tulus', 'Assembly', 'Kepala Bengkel', '233922', '2017-07-03 07:09:07', '2017-07-03 07:09:07'),
(24, 'Hardy Pratama', 'Assembly', 'Staf', '782824', '2017-07-03 07:09:54', '2017-07-03 07:09:54'),
(25, 'Supriono', 'BBS', 'Kepala Bengkel', '21919', '2017-07-03 07:10:22', '2017-07-03 07:10:22'),
(26, 'Sunaryo', 'BBS', 'Staf', '918133', '2017-07-03 07:11:24', '2017-07-03 07:11:24'),
(27, 'Tryawan', 'Erection Process', 'Staf', '1123127', '2017-07-03 07:12:20', '2017-07-03 07:12:20'),
(28, 'Ginanjar Basuki', 'BBS', 'Staf', '56678', '2017-07-03 07:12:54', '2017-07-03 07:12:54');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `plates`
--
ALTER TABLE `plates`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`ID`);

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
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `bbs`
--
ALTER TABLE `bbs`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `erections`
--
ALTER TABLE `erections`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `fabrications`
--
ALTER TABLE `fabrications`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `machines`
--
ALTER TABLE `machines`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
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
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `ship_projects`
--
ALTER TABLE `ship_projects`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ssh`
--
ALTER TABLE `ssh`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `sub_assembly`
--
ALTER TABLE `sub_assembly`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

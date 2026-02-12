-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2026 at 08:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magang_websitesurat`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `pengendali`
--

CREATE TABLE `pengendali` (
  `no_urut` int(2) NOT NULL,
  `klas` varchar(100) NOT NULL,
  `plus` varchar(100) NOT NULL,
  `tanggal_manual` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengendali`
--

INSERT INTO `pengendali` (`no_urut`, `klas`, `plus`, `tanggal_manual`, `created_at`) VALUES
(1, '005', 'Bidang Perpustakaan', NULL, '2026-02-11 07:37:29'),
(2, '005', 'Bidang Arsip', NULL, '2026-02-11 07:37:29'),
(3, '005', 'Bidang PSP', NULL, '2026-02-11 07:37:29'),
(4, '100.2', 'Sub Bagian KPE', NULL, '2026-02-11 07:37:29'),
(5, '100.2', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-11 07:37:29'),
(6, '400.1', 'Bidang Perpustakaan', NULL, '2026-02-11 07:37:29'),
(7, '400.1', 'Bidang Arsip', NULL, '2026-02-11 07:37:29'),
(9, '767', 'Bidang Perpustakaan', NULL, '2026-02-09 06:45:52'),
(10, '999', 'Bidang Perpustakaan', NULL, '2026-02-09 07:37:40'),
(11, '000.5.4.3', 'Bidang Perpustakaan', NULL, '2026-02-10 01:00:30'),
(12, '9999.01', 'Bidang Perpustakaan', NULL, '2026-02-10 01:54:45'),
(13, '999', 'Bidang Arsip', NULL, '2026-02-10 03:54:09'),
(14, '765', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-10 07:43:42'),
(15, '985', 'Bidang PSP', NULL, '2026-02-11 07:12:27'),
(16, '005', 'Bidang Arsip', NULL, '2026-02-11 07:24:09'),
(17, '005', 'Bidang PSP', NULL, '2026-02-11 07:24:09'),
(18, '005', 'Sub Bagian KPE', NULL, '2026-02-11 07:24:09'),
(19, '005', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-11 07:24:09'),
(20, '400.1', 'Bidang Perpustakaan', NULL, '2026-02-11 07:24:09'),
(21, '400.1', 'Bidang Arsip', NULL, '2026-02-11 07:24:09'),
(22, '400.1', 'Bidang PSP', NULL, '2026-02-11 07:24:09'),
(23, '400.1', 'Sub Bagian KPE', NULL, '2026-02-11 07:24:09'),
(24, '400.1', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-11 07:24:09'),
(25, '800.3', 'Bidang Perpustakaan', NULL, '2026-02-11 07:24:09'),
(26, '800.3', 'Bidang Arsip', NULL, '2026-02-11 07:24:09'),
(27, '800.3', 'Bidang PSP', NULL, '2026-02-11 07:24:09'),
(28, '800.3', 'Sub Bagian KPE', NULL, '2026-02-11 07:24:09'),
(29, '800.3', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-11 07:24:09'),
(30, '900', 'Bidang Perpustakaan', NULL, '2026-02-11 07:24:09'),
(31, '900', 'Bidang Arsip', NULL, '2026-02-11 07:24:09'),
(32, '900', 'Bidang PSP', NULL, '2026-02-11 07:24:09'),
(33, '900', 'Sub Bagian KPE', NULL, '2026-02-11 07:24:09'),
(34, '900', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-11 07:24:09'),
(35, '100.2', 'Bidang Perpustakaan', NULL, '2026-02-11 07:24:09'),
(36, '100.2', 'Bidang Arsip', NULL, '2026-02-11 07:24:09'),
(37, '100.2', 'Bidang PSP', NULL, '2026-02-11 07:24:09'),
(38, '100.2', 'Sub Bagian KPE', NULL, '2026-02-11 07:24:09'),
(39, '100.2', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-11 07:24:09'),
(40, '005', 'Bidang Perpustakaan', NULL, '2026-02-11 07:32:39'),
(41, '005', 'Bidang Arsip', NULL, '2026-02-11 07:32:39'),
(42, '005', 'Bidang PSP', NULL, '2026-02-11 07:32:39'),
(43, '005', 'Sub Bagian KPE', NULL, '2026-02-11 07:32:39'),
(44, '005', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-11 07:32:39'),
(45, '400.1', 'Bidang Perpustakaan', NULL, '2026-02-11 07:32:39'),
(46, '400.1', 'Bidang Arsip', NULL, '2026-02-11 07:32:39'),
(47, '400.1', 'Bidang PSP', NULL, '2026-02-11 07:32:39'),
(48, '400.1', 'Sub Bagian KPE', NULL, '2026-02-11 07:32:39'),
(49, '400.1', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-11 07:32:39'),
(50, '800.3', 'Bidang Perpustakaan', NULL, '2026-02-11 07:32:39'),
(51, '800.3', 'Bidang Arsip', NULL, '2026-02-11 07:32:39'),
(52, '800.3', 'Bidang PSP', NULL, '2026-02-11 07:32:39'),
(53, '800.3', 'Sub Bagian KPE', NULL, '2026-02-11 07:32:39'),
(54, '800.3', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-11 07:32:39'),
(55, '900', 'Bidang Perpustakaan', NULL, '2026-02-11 07:32:39'),
(56, '900', 'Bidang Arsip', NULL, '2026-02-11 07:32:39'),
(57, '900', 'Bidang PSP', NULL, '2026-02-11 07:32:39'),
(58, '900', 'Sub Bagian KPE', NULL, '2026-02-11 07:32:39'),
(59, '900', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-11 07:32:39'),
(60, '100.2', 'Bidang Perpustakaan', NULL, '2026-02-11 07:32:39'),
(61, '100.2', 'Bidang Arsip', NULL, '2026-02-11 07:32:39'),
(62, '100.2', 'Bidang PSP', NULL, '2026-02-11 07:32:39'),
(63, '100.2', 'Sub Bagian KPE', NULL, '2026-02-11 07:32:39'),
(64, '100.2', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-11 07:32:39'),
(65, '005', 'Bidang Perpustakaan', NULL, '2026-02-11 07:32:39'),
(66, '005', 'Bidang Arsip', NULL, '2026-02-11 07:32:39'),
(67, '005', 'Bidang PSP', NULL, '2026-02-11 07:32:39'),
(68, '005', 'Sub Bagian KPE', NULL, '2026-02-11 07:32:39'),
(69, '005', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-11 07:32:39'),
(70, '400.1', 'Bidang Perpustakaan', NULL, '2026-02-11 07:32:39'),
(71, '400.1', 'Bidang Arsip', NULL, '2026-02-11 07:32:39'),
(72, '400.1', 'Bidang PSP', NULL, '2026-02-11 07:32:39'),
(73, '400.1', 'Sub Bagian KPE', NULL, '2026-02-11 07:32:39'),
(74, '400.1', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-11 07:32:39'),
(75, '800.3', 'Bidang Perpustakaan', NULL, '2026-02-11 07:32:39'),
(76, '800.3', 'Bidang Arsip', NULL, '2026-02-11 07:32:39'),
(77, '800.3', 'Bidang PSP', NULL, '2026-02-11 07:32:39'),
(78, '800.3', 'Sub Bagian KPE', NULL, '2026-02-11 07:32:39'),
(79, '800.3', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-11 07:32:39'),
(80, '900', 'Bidang Perpustakaan', NULL, '2026-02-11 07:32:39'),
(81, '900', 'Bidang Arsip', NULL, '2026-02-11 07:32:39'),
(82, '900', 'Bidang PSP', NULL, '2026-02-11 07:32:39'),
(83, '900', 'Sub Bagian KPE', NULL, '2026-02-11 07:32:39'),
(84, '900', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-11 07:32:39'),
(85, '100.2', 'Bidang Perpustakaan', NULL, '2026-02-11 07:32:39'),
(86, '100.2', 'Bidang Arsip', NULL, '2026-02-11 07:32:39'),
(87, '100.2', 'Bidang PSP', NULL, '2026-02-11 07:32:39'),
(88, '100.2', 'Sub Bagian KPE', NULL, '2026-02-11 07:32:39'),
(89, '100.2', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-11 07:32:39'),
(90, '005', 'Bidang Perpustakaan', NULL, '2026-02-11 07:32:39'),
(91, '005', 'Bidang Arsip', NULL, '2026-02-11 07:32:39'),
(92, '005', 'Bidang PSP', NULL, '2026-02-11 07:32:39'),
(93, '005', 'Sub Bagian KPE', NULL, '2026-02-11 07:32:39'),
(94, '005', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-11 07:32:39'),
(95, '400.1', 'Bidang Perpustakaan', NULL, '2026-02-11 07:32:39'),
(96, '400.1', 'Bidang Arsip', NULL, '2026-02-11 07:32:39'),
(97, '400.1', 'Bidang PSP', NULL, '2026-02-11 07:32:39'),
(98, '400.1', 'Sub Bagian KPE', NULL, '2026-02-11 07:32:39'),
(99, '245', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-12 07:41:34');

-- --------------------------------------------------------

--
-- Table structure for table `pengendali_sisipan`
--

CREATE TABLE `pengendali_sisipan` (
  `no_urut` varchar(20) NOT NULL,
  `klas` varchar(100) NOT NULL,
  `plus` varchar(100) NOT NULL,
  `tanggal_manual` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengendali_sisipan`
--

INSERT INTO `pengendali_sisipan` (`no_urut`, `klas`, `plus`, `tanggal_manual`, `created_at`) VALUES
('000.5.1', 'tes jaaa', 'Bidang Arsip', NULL, '2026-02-04 02:26:09'),
('10.1', '654', 'Sub Bagian Umum dan Kepegawaian', '2026-02-09', '2026-02-11 06:30:47'),
('12.1', '999', 'Sub Bagian Umum dan Kepegawaian', '2026-02-10', '2026-02-10 07:11:53'),
('12.A', '123', 'Bidang Perpustakaan', '2026-02-10', '2026-02-11 04:20:42'),
('13.c', '005', 'Bidang Perpustakaan', '2026-02-11', '2026-02-11 07:25:15'),
('13.d', '005', 'Bidang Arsip', '2026-02-11', '2026-02-11 07:25:15'),
('14.a', '400', 'Bidang PSP', '2026-02-11', '2026-02-11 07:25:15'),
('14.b', '400', 'Sub Bagian KPE', '2026-02-11', '2026-02-11 07:25:15'),
('15.a', '800', 'Sub Bagian Umum dan Kepegawaian', '2026-02-11', '2026-02-11 07:25:15'),
('15.b', '800', 'Bidang Perpustakaan', '2026-02-11', '2026-02-11 07:25:15'),
('16.a', '900', 'Bidang Arsip', '2026-02-11', '2026-02-11 07:25:15'),
('16.b', '900', 'Bidang PSP', '2026-02-11', '2026-02-11 07:25:15'),
('17.a', '100', 'Sub Bagian KPE', '2026-02-11', '2026-02-11 07:25:15'),
('17.b', '100', 'Sub Bagian Umum dan Kepegawaian', '2026-02-11', '2026-02-11 07:25:15'),
('18.a', '005', 'Bidang Perpustakaan', '2026-02-11', '2026-02-11 07:25:15'),
('18.b', '005', 'Bidang Arsip', '2026-02-11', '2026-02-11 07:25:15'),
('19.a', '400', 'Bidang PSP', '2026-02-11', '2026-02-11 07:25:15'),
('19.b', '400', 'Sub Bagian KPE', '2026-02-11', '2026-02-11 07:25:15'),
('20.a', '800', 'Sub Bagian Umum dan Kepegawaian', '2026-02-11', '2026-02-11 07:25:15'),
('20.b', '800', 'Bidang Perpustakaan', '2026-02-11', '2026-02-11 07:25:15'),
('21.a', '900', 'Bidang Arsip', '2026-02-11', '2026-02-11 07:25:15'),
('21.b', '900', 'Bidang PSP', '2026-02-11', '2026-02-11 07:25:15'),
('22.a', '100', 'Sub Bagian KPE', '2026-02-11', '2026-02-11 07:25:15'),
('23.a', '005', 'Bidang Perpustakaan', '2026-02-11', '2026-02-11 07:25:15'),
('23.b', '005', 'Bidang Arsip', '2026-02-11', '2026-02-11 07:25:15'),
('24.a', '400', 'Bidang PSP', '2026-02-11', '2026-02-11 07:25:15'),
('25.a', '800', 'Sub Bagian Umum dan Kepegawaian', '2026-02-11', '2026-02-11 07:25:15'),
('26.A', '765', 'Bidang Arsip', '2026-02-11', '2026-02-12 04:25:28'),
('50.A', '9999', 'Sub Bagian Umum dan Kepegawaian', '2026-02-11', '2026-02-12 07:42:19'),
('8.1', '900.9.9', 'Sub Bagian Umum dan Kepegawaian', '2026-02-09', '2026-02-10 01:15:45'),
('9.A', '126', 'Sub Bagian Umum dan Kepegawaian', '2026-02-09', '2026-02-11 07:11:55');

-- --------------------------------------------------------

--
-- Table structure for table `pengendali_sisipan_spt`
--

CREATE TABLE `pengendali_sisipan_spt` (
  `no_urut` varchar(20) NOT NULL,
  `klas` varchar(100) NOT NULL,
  `plus` varchar(100) NOT NULL,
  `tanggal_manual` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengendali_sisipan_spt`
--

INSERT INTO `pengendali_sisipan_spt` (`no_urut`, `klas`, `plus`, `tanggal_manual`, `created_at`) VALUES
('1.1', '123', 'Sub Bagian Umum dan Kepegawaian', '2026-02-10', '2026-02-10 07:14:31'),
('1.2', '090', 'Bidang Perpustakaan', '2026-02-11', '2026-02-11 07:26:43'),
('1.3', '090', 'Bidang Arsip', '2026-02-11', '2026-02-11 07:26:43'),
('10.1', '094', 'Sub Bagian KPE', '2026-02-11', '2026-02-11 07:26:43'),
('10.2', '094', 'Sub Bagian Umum dan Kepegawaian', '2026-02-11', '2026-02-11 07:26:43'),
('11.1', '090', 'Bidang Perpustakaan', '2026-02-11', '2026-02-11 07:26:43'),
('11.2', '090', 'Bidang Arsip', '2026-02-11', '2026-02-11 07:26:43'),
('12.1', '094', 'Bidang PSP', '2026-02-11', '2026-02-11 07:26:43'),
('12.2', '094', 'Sub Bagian KPE', '2026-02-11', '2026-02-11 07:26:43'),
('13.1', '090', 'Sub Bagian Umum dan Kepegawaian', '2026-02-11', '2026-02-11 07:26:43'),
('2.1', '094', 'Bidang PSP', '2026-02-11', '2026-02-11 07:26:43'),
('2.2', '094', 'Sub Bagian KPE', '2026-02-11', '2026-02-11 07:26:43'),
('27.1', '765', 'Sub Bagian KPE', '2026-02-09', '2026-02-12 07:42:52'),
('3.1', '090', 'Sub Bagian Umum dan Kepegawaian', '2026-02-11', '2026-02-11 07:26:43'),
('3.2', '090', 'Bidang Perpustakaan', '2026-02-11', '2026-02-11 07:26:43'),
('4.1', '094', 'Bidang Arsip', '2026-02-11', '2026-02-11 07:26:43'),
('4.2', '094', 'Bidang PSP', '2026-02-11', '2026-02-11 07:26:43'),
('5.1', '090', 'Sub Bagian KPE', '2026-02-11', '2026-02-11 07:26:43'),
('5.2', '090', 'Sub Bagian Umum dan Kepegawaian', '2026-02-11', '2026-02-11 07:26:43'),
('6.1', '094', 'Bidang Perpustakaan', '2026-02-11', '2026-02-11 07:26:43'),
('6.2', '094', 'Bidang Arsip', '2026-02-11', '2026-02-11 07:26:43'),
('7.1', '090', 'Bidang PSP', '2026-02-11', '2026-02-11 07:26:43'),
('7.2', '090', 'Sub Bagian KPE', '2026-02-11', '2026-02-11 07:26:43'),
('8.1', '094', 'Sub Bagian Umum dan Kepegawaian', '2026-02-11', '2026-02-11 07:26:43'),
('8.2', '094', 'Bidang Perpustakaan', '2026-02-11', '2026-02-11 07:26:43'),
('9.1', '090', 'Bidang Arsip', '2026-02-11', '2026-02-11 07:26:43'),
('9.2', '090', 'Bidang PSP', '2026-02-11', '2026-02-11 07:26:43');

-- --------------------------------------------------------

--
-- Table structure for table `pengendali_spt`
--

CREATE TABLE `pengendali_spt` (
  `no_urut` int(2) NOT NULL,
  `klas` varchar(100) NOT NULL,
  `plus` varchar(100) NOT NULL,
  `tanggal_manual` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengendali_spt`
--

INSERT INTO `pengendali_spt` (`no_urut`, `klas`, `plus`, `tanggal_manual`, `created_at`) VALUES
(1, '123', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-10 07:14:05'),
(2, '090', 'Bidang Perpustakaan', NULL, '2026-02-11 07:26:00'),
(3, '090', 'Bidang Arsip', NULL, '2026-02-11 07:26:00'),
(4, '090', 'Bidang PSP', NULL, '2026-02-11 07:26:00'),
(5, '090', 'Sub Bagian KPE', NULL, '2026-02-11 07:26:00'),
(6, '090', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-11 07:26:00'),
(7, '094', 'Bidang Perpustakaan', NULL, '2026-02-11 07:26:00'),
(8, '094', 'Bidang Arsip', NULL, '2026-02-11 07:26:00'),
(9, '094', 'Bidang PSP', NULL, '2026-02-11 07:26:00'),
(10, '094', 'Sub Bagian KPE', NULL, '2026-02-11 07:26:00'),
(11, '094', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-11 07:26:00'),
(12, '090', 'Bidang Perpustakaan', NULL, '2026-02-11 07:26:00'),
(13, '090', 'Bidang Arsip', NULL, '2026-02-11 07:26:00'),
(14, '090', 'Bidang PSP', NULL, '2026-02-11 07:26:00'),
(15, '090', 'Sub Bagian KPE', NULL, '2026-02-11 07:26:00'),
(16, '090', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-11 07:26:00'),
(17, '094', 'Bidang Perpustakaan', NULL, '2026-02-11 07:26:00'),
(18, '094', 'Bidang Arsip', NULL, '2026-02-11 07:26:00'),
(19, '094', 'Bidang PSP', NULL, '2026-02-11 07:26:00'),
(20, '094', 'Sub Bagian KPE', NULL, '2026-02-11 07:26:00'),
(21, '094', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-11 07:26:00'),
(22, '090', 'Bidang Perpustakaan', NULL, '2026-02-11 07:26:00'),
(23, '090', 'Bidang Arsip', NULL, '2026-02-11 07:26:00'),
(24, '090', 'Bidang PSP', NULL, '2026-02-11 07:26:00'),
(25, '090', 'Sub Bagian KPE', NULL, '2026-02-11 07:26:00'),
(26, '090', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-11 07:26:00'),
(27, '090', 'Bidang Perpustakaan', NULL, '2026-02-11 07:33:26'),
(28, '090', 'Bidang Arsip', NULL, '2026-02-11 07:33:26'),
(29, '090', 'Bidang PSP', NULL, '2026-02-11 07:33:26'),
(30, '090', 'Sub Bagian KPE', NULL, '2026-02-11 07:33:26'),
(31, '090', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-11 07:33:26'),
(32, '094', 'Bidang Perpustakaan', NULL, '2026-02-11 07:33:26'),
(33, '094', 'Bidang Arsip', NULL, '2026-02-11 07:33:26'),
(34, '094', 'Bidang PSP', NULL, '2026-02-11 07:33:26'),
(35, '094', 'Sub Bagian KPE', NULL, '2026-02-11 07:33:26'),
(36, '094', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-11 07:33:26'),
(37, '090', 'Bidang Perpustakaan', NULL, '2026-02-11 07:33:26'),
(38, '090', 'Bidang Arsip', NULL, '2026-02-11 07:33:26'),
(39, '090', 'Bidang PSP', NULL, '2026-02-11 07:33:26'),
(40, '090', 'Sub Bagian KPE', NULL, '2026-02-11 07:33:26'),
(41, '090', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-11 07:33:26'),
(42, '094', 'Bidang Perpustakaan', NULL, '2026-02-11 07:33:26'),
(43, '094', 'Bidang Arsip', NULL, '2026-02-11 07:33:26'),
(44, '094', 'Bidang PSP', NULL, '2026-02-11 07:33:26'),
(45, '094', 'Sub Bagian KPE', NULL, '2026-02-11 07:33:26'),
(46, '094', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-11 07:33:26'),
(47, '090', 'Bidang Perpustakaan', NULL, '2026-02-11 07:33:26'),
(48, '090', 'Bidang Arsip', NULL, '2026-02-11 07:33:26'),
(49, '090', 'Bidang PSP', NULL, '2026-02-11 07:33:26'),
(50, '090', 'Sub Bagian KPE', NULL, '2026-02-11 07:33:26'),
(51, '090', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-11 07:33:26'),
(52, '094', 'Bidang Perpustakaan', NULL, '2026-02-11 07:33:26'),
(53, '094', 'Bidang Arsip', NULL, '2026-02-11 07:33:26'),
(54, '094', 'Bidang PSP', NULL, '2026-02-11 07:33:26'),
(55, '094', 'Sub Bagian KPE', NULL, '2026-02-11 07:33:26'),
(56, '094', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-11 07:33:26'),
(57, '090', 'Bidang Perpustakaan', NULL, '2026-02-11 07:33:26'),
(58, '090', 'Bidang Arsip', NULL, '2026-02-11 07:33:26'),
(59, '090', 'Bidang PSP', NULL, '2026-02-11 07:33:26'),
(60, '090', 'Sub Bagian KPE', NULL, '2026-02-11 07:33:26'),
(61, '090', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-11 07:33:26'),
(62, '094', 'Bidang Perpustakaan', NULL, '2026-02-11 07:33:26'),
(63, '094', 'Bidang Arsip', NULL, '2026-02-11 07:33:26'),
(64, '094', 'Bidang PSP', NULL, '2026-02-11 07:33:26'),
(65, '094', 'Sub Bagian KPE', NULL, '2026-02-11 07:33:26'),
(66, '094', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-11 07:33:26'),
(67, '090', 'Bidang Perpustakaan', NULL, '2026-02-11 07:33:26'),
(68, '090', 'Bidang Arsip', NULL, '2026-02-11 07:33:26'),
(69, '090', 'Bidang PSP', NULL, '2026-02-11 07:33:26'),
(70, '090', 'Sub Bagian KPE', NULL, '2026-02-11 07:33:26'),
(71, '090', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-11 07:33:26'),
(72, '094', 'Bidang Perpustakaan', NULL, '2026-02-11 07:33:26'),
(73, '094', 'Bidang Arsip', NULL, '2026-02-11 07:33:26'),
(74, '094', 'Bidang PSP', NULL, '2026-02-11 07:33:26'),
(75, '094', 'Sub Bagian KPE', NULL, '2026-02-11 07:33:26'),
(76, '094', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-11 07:33:26'),
(77, '090', 'Bidang Perpustakaan', NULL, '2026-02-11 07:33:26'),
(78, '090', 'Bidang Arsip', NULL, '2026-02-11 07:33:26'),
(79, '090', 'Bidang PSP', NULL, '2026-02-11 07:33:26'),
(80, '090', 'Sub Bagian KPE', NULL, '2026-02-11 07:33:26'),
(81, '090', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-11 07:33:26'),
(82, '094', 'Bidang Perpustakaan', NULL, '2026-02-11 07:33:26'),
(83, '094', 'Bidang Arsip', NULL, '2026-02-11 07:33:26'),
(84, '094', 'Bidang PSP', NULL, '2026-02-11 07:33:26'),
(85, '094', 'Sub Bagian KPE', NULL, '2026-02-11 07:33:26'),
(86, '094', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-11 07:33:26'),
(87, '090', 'Bidang Perpustakaan', NULL, '2026-02-11 07:33:26'),
(88, '090', 'Bidang Arsip', NULL, '2026-02-11 07:33:26'),
(89, '090', 'Bidang PSP', NULL, '2026-02-11 07:33:26'),
(90, '090', 'Sub Bagian KPE', NULL, '2026-02-11 07:33:26'),
(91, '090', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-11 07:33:26'),
(92, '094', 'Bidang Perpustakaan', NULL, '2026-02-11 07:33:26'),
(93, '094', 'Bidang Arsip', NULL, '2026-02-11 07:33:26'),
(94, '094', 'Bidang PSP', NULL, '2026-02-11 07:33:26'),
(95, '094', 'Sub Bagian KPE', NULL, '2026-02-11 07:33:26'),
(96, '094', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-11 07:33:26'),
(97, '090', 'Bidang Perpustakaan', NULL, '2026-02-11 07:33:26'),
(98, '090', 'Bidang Arsip', NULL, '2026-02-11 07:33:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengendali`
--
ALTER TABLE `pengendali`
  ADD PRIMARY KEY (`no_urut`);

--
-- Indexes for table `pengendali_sisipan`
--
ALTER TABLE `pengendali_sisipan`
  ADD PRIMARY KEY (`no_urut`);

--
-- Indexes for table `pengendali_sisipan_spt`
--
ALTER TABLE `pengendali_sisipan_spt`
  ADD PRIMARY KEY (`no_urut`);

--
-- Indexes for table `pengendali_spt`
--
ALTER TABLE `pengendali_spt`
  ADD PRIMARY KEY (`no_urut`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

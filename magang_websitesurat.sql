-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2026 at 08:22 AM
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
(4, '765', 'Sub Bagian Umum dan Kepegawaian', NULL, '2026-02-05 01:19:36'),
(6, '765', 'Sub Bagian KPE', NULL, '2026-02-05 02:21:16'),
(7, '123', 'Bidang Arsip', NULL, '2026-02-05 02:21:35'),
(8, '999', 'Bidang Perpustakaan', NULL, '2026-02-06 06:58:49');

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
('1.a', '123', 'Bidang PSP', '2026-02-02', '2026-02-05 06:52:03'),
('4.a', '1000', 'Sub Bagian Umum dan Kepegawaian', '2026-02-06', '2026-02-06 06:58:08');

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

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2026 at 03:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
-- Table structure for table `pengendali`
--

CREATE TABLE `pengendali` (
  `no_urut` int(2) NOT NULL,
  `klas` varchar(50) NOT NULL,
  `plus` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengendali_sisipan`
--

CREATE TABLE `pengendali_sisipan` (
  `no_urut` varchar(10) NOT NULL,
  `klas` varchar(50) NOT NULL,
  `plus` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengendali_sisipan`
--

INSERT INTO `pengendali_sisipan` (`no_urut`, `klas`, `plus`, `created_at`) VALUES
('1', '1000', 'Sub Bagian Umum dan Kepegawaian', '2026-01-28 02:23:08'),
('2', '0000', 'Sub Bagian KPE', '2026-01-28 02:23:32');

--
-- Indexes for dumped tables
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

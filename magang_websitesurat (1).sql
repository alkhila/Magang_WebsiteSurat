-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2026 at 07:13 AM
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
